<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SettingWeb extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function __construct()
	{
		parent::__construct();
		cek_login();
		if (!is_admin()) {
			redirect('dashboard');
		}
		$this->load->model('Admin_model', 'admin');
		$this->load->library('form_validation');
		$data['logo'] =  $this->admin->getSetting();

	}

	private function _validasi()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
	}

	private function _config()
	{
		$config['upload_path']      = "./assets/img/logo/";
		$config['allowed_types']    = 'gif|jpg|jpeg|png';
		$config['encrypt_name']     = TRUE;
		$config['max_size']         = '2048';

		$this->load->library('upload', $config);
	}
	public function index()
	{
		$data['title'] = "Setting App";
		$data['setting'] = $this->admin->getSetting();

		$this->template->load('templates/dashboard', 'setting/data', $data);
	}

	public function edit($id)
	{
		$this->_validasi();
		$this->_config();

		if ($this->form_validation->run() == false) {
			$data['title'] = "Profile";
			$data['setting'] = $this->admin->getSetting();

			$this->template->load('templates/dashboard', 'setting/edit', $data);
		}else{
		   $input = $this->input->post(null, true);
            if (empty($_FILES['foto']['name'])) {
                $insert = $this->admin->update('setting_app', 'id', $input['id'], $input);
                if ($insert) {
                    set_pesan('perubahan berhasil disimpan.');
                } else {
                    set_pesan('perubahan tidak disimpan.');
                }
                redirect('SettingWeb');
            } else {
                if ($this->upload->do_upload('foto') == false) {
                    echo $this->upload->display_errors();
                    die;
                } else {
                    if (userdata('foto') != 'user.png') {
                        $old_image = FCPATH . 'assets/img/logo/' . userdata('foto');
                        if(file_exists($old_image)){
	                        if (!unlink($old_image)) {
	                            set_pesan('gagal hapus foto lama.');
	                            redirect('SettingWeb');
	                        }
                        }
                    }

                    $input['logo'] = $this->upload->data('file_name');
                    $update = $this->admin->update('setting_app', 'id', $input['id'], $input);
                    if ($update) {
                        set_pesan('perubahan berhasil disimpan.');
                    } else {
                        set_pesan('gagal menyimpan perubahan');
                    }
				  redirect('SettingWeb');                }
            }
		}
	}

	public function visimisi()
	{
		$data['title'] = "Visi Dan Misi";
		$data['setting'] = $this->admin->getSetting();

		$this->template->load('templates/dashboard', 'setting/visi_misi', $data);
	}

	public function editvisimisi($id)
	{
		$this->form_validation->set_rules('visi', 'Visi', 'required|trim');
		$this->form_validation->set_rules('misi', 'Misi', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['title'] = "Ubah Visi Misi";
			$data['setting'] = $this->admin->getSetting();

			$this->template->load('templates/dashboard', 'setting/edit_visi_misi', $data);
		}else{
		   $input = $this->input->post(null, true);
    
            $update = $this->admin->update('setting_app', 'id', $input['id'], $input);
                if ($update) {
                    set_pesan('perubahan berhasil disimpan.');
                } else {
                    set_pesan('perubahan tidak disimpan.');
                }
                redirect('SettingWeb/visimisi');
		}
	}
}
