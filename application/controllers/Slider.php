<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cek_login();
		if (!is_admin()) {
			redirect('dashboard');
		}
		$this->load->model('Admin_model', 'admin');
		$this->load->library('form_validation');
	}

	private function _validasi()
	{
		$this->form_validation->set_rules('aktif', 'Aktif', 'required');
	}

	private function _config()
	{
		$config['upload_path']      = "./assets/img/slider/";
		$config['allowed_types']    = 'gif|jpg|jpeg|png';
		$config['encrypt_name']     = TRUE;
		$config['max_size']         = '2048';

		$this->load->library('upload', $config);
	}

	public function index()
	{
		$data['title'] = "Slider";
		$data['slider'] = $this->admin->get('slider');

		$this->template->load('templates/dashboard', 'slider/data', $data);
	}

	public function add()
	{

		$this->_validasi();
		$this->_config();
		if ($this->form_validation->run() == false) {
			$data['title'] = "Tambah Slider";
			$this->template->load('templates/dashboard', 'slider/add', $data);
		} else {
			// $input = $this->input->post(null, true);
			if ($this->upload->do_upload('foto') == false) {
				echo $this->upload->display_errors();
				die;
			} else {
				$input['foto'] = $this->upload->data('file_name');
				$update = $this->admin->insert('slider', $input);
				if ($update) {
					set_pesan('perubahan berhasil disimpan.');
				} else {
					set_pesan('gagal menyimpan perubahan');
				}
				redirect('slider');                
			}

		}
	}

	public function edit($id)
	{

		$this->_validasi();
		$this->_config();
		if ($this->form_validation->run() == false) {
			$data['title'] = "Ubah Slider";
			$data['slider'] = $this->admin->get('slider',['id'=>$id],'');

			$this->template->load('templates/dashboard', 'slider/edit', $data);
		} else {

		   $input = $this->input->post(null, true);
            if (empty($_FILES['foto']['name'])) {
                redirect('slider');
            } else {
                if ($this->upload->do_upload('foto') == false) {
                    echo $this->upload->display_errors();
                    die;
                } else {
                    $old_image = FCPATH . '/assets/img/slider/' . $input['old_image'];
                    if(file_exists($old_image)){
                        if (!unlink($old_image)) {
                            set_pesan('gagal hapus foto lama.');
                            redirect('slider');
                        }
                    }
                    // var_dump($input);  die;
                    $dataInput['foto'] = $this->upload->data('file_name');
                    $update = $this->admin->update('slider', 'id', $input['id'], $dataInput);
                    if ($update) {
                        set_pesan('perubahan berhasil disimpan.');
                    } else {
                        set_pesan('gagal menyimpan perubahan');
                    }
                    redirect('slider');
                }
            }

		}
	}

	public function hapus($id)
	{
		$id = encode_php_tags($id);
		$slider = $this->admin->get('slider',['id'=>$id],'');
        if ($this->admin->delete('slider', 'id', $id)) {
        	$old_image = FCPATH . '/assets/img/slider/' . $slider['foto'];
                    if(file_exists($old_image)){
                        if (!unlink($old_image)) {
                            set_pesan('gagal hapus foto lama.');
                            redirect('slider');
                        }
                    }
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('slider');
	}
}
