<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card shadow-sm mb-4 border-bottom-primary">
			<div class="card-header bg-white py-3">
				<div class="row">
					<div class="col">
						<h4 class="h5 align-middle m-0 font-weight-bold text-primary">
							Ubah Slider
						</h4>
					</div>
					<div class="col-auto">
						<a href="<?= base_url('slider') ?>" class="btn btn-sm btn-secondary btn-icon-split">
							<span class="icon">
								<i class="fa fa-arrow-left"></i>
							</span>
							<span class="text">
								Kembali
							</span>
						</a>
					</div>
				</div>
			</div>
			<div class="card-body pb-2">
				<?= $this->session->flashdata('pesan'); ?>
				 <?= form_open_multipart('', [], ['id' => $slider['id']]); ?>
				<div class="row form-group">
					<label class="col-md-3 text-md-right" for="foto">Logo</label>
					<div class="col-md-9">
						<div class="row">
							<div class="row">
								<div class="col-12">
									<img src="<?= base_url() ?>assets/img/slider/<?= $slider['foto']; ?>" alt="<?= $slider['foto']; ?>" class="img-thumbnail">
								</div>
								<div class="col-12">
									<input type="file" name="foto" id="foto">
									<?= form_error('foto', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
						</div>
						<input type="hidden" name="aktif" value="1">
						<input type="hidden" name="old_image" value="<?= $slider['foto']; ?>">
					</div>
				</div>
				<br>
				<div class="row form-group justify-content-end">
					<div class="col-md-8">
						<button type="submit" class="btn btn-primary btn-icon-split">
							<span class="icon"><i class="fa fa-save"></i></span>
							<span class="text">Simpan</span>
						</button>
						<button type="reset" class="btn btn-secondary">
							Reset
						</button>
					</div>
				</div>
				<?= form_close(); ?>
			</div>
		</div>
	</div>
</div>