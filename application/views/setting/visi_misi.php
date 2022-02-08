<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm mb-4 border-bottom-primary">
	<div class="card-header bg-white py-3">
		<div class="row">
			<div class="col">
				<h4 class="h5 align-middle m-0 font-weight-bold text-primary">
					Setting Web
				</h4>
			</div>
		</div>
	</div>
	<div class="table-responsive">
		<table class="table table-striped dt-responsive nowrap" id="dataTable">
			<thead>
				<tr>
					<th width="20%">Visi</th>
					<th width="20%">Misi</th>
					<th width="10%">Action</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?= $setting['visi'] ?></td>
					<td><?= $setting['misi'] ?></td>
					<td>                                
						<a href="<?= base_url('SettingWeb/editvisimisi/') . $setting['id'] ?>" class="btn btn-sm btn-warning"><i class="fa fa-fw fa-edit"></i>Edit</a>
					</tr>
				</tbody>
			</table>
		</div>
	</div>