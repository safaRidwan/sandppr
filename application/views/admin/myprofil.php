<div class="col-xl py-4">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">My Profil *(tidak bisa di ubah)</h5>
            <small class="text-muted float-end">sandpaperholidaytrans.id</small>
        </div>
        <div class="card-body">
            <form action="<?= base_url('admin/konfigurasi/update') ?>" method="post">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <div class="input-group input-group-merge">
                        <input type="text" class="form-control" readonly value="<?= $this->session->userdata('username'); ?>">
                    </div>
                    <label class="form-label">Nama</label>
                    <div class="input-group input-group-merge">
                        <input type="text" class="form-control" readonly value="<?= $this->session->userdata('nama'); ?>">
                    </div>
                    <label class="form-label">Sebagai</label>
                    <div class="input-group input-group-merge">
                        <input type="text" class="form-control" readonly value="<?= $this->session->userdata('level'); ?>">
                    </div>
                </div>
                
            </div>
            </form>
        </div>
    </div>