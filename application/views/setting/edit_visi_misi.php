<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="card shadow-sm border-bottom-primary">
			<div class="card-header bg-white py-3">
				<h4 class="h5 align-middle m-0 font-weight-bold text-primary">
					Setting Web
				</h4>
			</div>
			<div class="card-body">
				<?= $this->session->flashdata('pesan'); ?>
				<?= form_open_multipart('', [], ['id' => $setting['id']]); ?>
				<div class="row form-group">
					<label class="col-md-4 text-md-right" for="username">Visi</label>
					<div class="col-md-6">
						<textarea class="summernote" name="visi"></textarea>
						<?= form_error('username', '<span class="text-danger small">', '</span>'); ?>
					</div>
				</div>
				<div class="row form-group">
					<label class="col-md-4 text-md-right" for="username">Misi</label>
					<div class="col-md-6">
						<textarea class="summernote" name="misi"></textarea>
						<?= form_error('username', '<span class="text-danger small">', '</span>'); ?>
					</div>
				</div>
				<hr>
				<div class="row form-group">
					<div class="col-md-9 offset-md-3">
						<button type="submit" class="btn btn-primary">Simpan</button>
						<button type="reset" class="btn btn-secondary">Reset</button>
					</div>
				</div>
				<?= form_close(); ?>
			</div>
		</div>
	</div>
</div>