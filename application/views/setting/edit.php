<div class="row justify-content-center">
    <div class="col-md-8">
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
                    <label class="col-md-3 text-md-right" for="foto">Logo</label>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-3">
                                <img src="<?= base_url() ?>assets/img/logo/<?= $setting['logo']; ?>" alt="<?= $setting['nama']; ?>" class=" shadow-sm img-thumbnail">
                            </div>
                            <div class="col-9">
                                <input type="file" name="foto" id="foto">
                                <?= form_error('foto', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="nama">Nama Web</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <input value="<?= set_value('nama', $setting['nama']); ?>" name="nama" id="nama" type="text" class="form-control" placeholder="Nama...">
                        </div>
                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <hr>
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