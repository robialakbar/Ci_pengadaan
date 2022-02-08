<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm mb-4 border-bottom-primary">
	<div class="card-header bg-white py-3">
		<div class="row">
			<div class="col">
				<h4 class="h5 align-middle m-0 font-weight-bold text-primary">
					Slider
				</h4>
			</div>
			<div class="col-auto">
				<a href="<?= base_url('slider/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
					<span class="icon">
						<i class="fas fa-image"></i>
					</span>
					<span class="text">
						Tambah Slider
					</span>
				</a>
			</div>
		</div>
	</div>
	<div class="table-responsive">
		<table class="table table-striped dt-responsive nowrap" id="dataTable">
			<thead>
				<tr>
					<th width="20%">Foto</th>
					<th width="10%">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($slider as $key => $value): ?>
					
					<tr>
						<td><img src="<?= base_url() ?>assets/img/slider/<?= $value['foto']; ?>" class="img-thumbnail" width="200px" ></td>
						<td>                                
							<a href="<?= base_url('slider/edit/') . $value['id'] ?>" class="btn btn-sm btn-warning"><i class="fa fa-fw fa-edit"></i>Edit</a>
							<a onclick="return confirm('Yakin ingin menghapus data?')" href="<?= base_url('slider/hapus/') . $value['id'] ?>" class="btn btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i>Hapus</a>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>