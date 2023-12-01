<div id="menghilang">
    <?= $this->session->flashdata('alert') ?>
</div>


<div class="col-xl-12">
    <div class="card">
        <form action="<?= base_url('admin/detail/simpan') ?>" method="post" enctype="multipart/form-data">
            <!-- lari ke Controller admin/detail/simpan -->
            <h5 class="card-header">Foto Detail Armada
                <?php echo $konten->judul; ?>
            </h5>

            <input type="hidden" name="id_konten" value="<?= $konten->id_konten; ?>">
            <div class="card-body">
                <div class="col mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" class="form-control" placeholder="Judul Foto" name="judul_detail">
                </div>
                <div class="mb-3">
                    <label class="form-label">Pilih Foto</label>
                    <input class="form-control" required type="file" name="foto_detail">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <?php foreach ($detail as $aa) { ?>
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card h-100">
                        <img class="card-img-top" src="<?= base_url('asset/upload/detail/' . $aa['foto_detail']); ?>">
                        <div class="card-body">
                        <h5 class="card-title">
                                <?= $aa['judul_detail'] ?>
                            </h5>
                            <a href="<?php echo site_url('admin/detail/delete_data/' . $aa['foto_detail'] . '/' . $aa['id_konten']); ?>"
                                class="btn btn-outline-danger" onclick="return confirm('yakin deck, mau hapus?')">
                                <span class="tf-icons bx bx-trash">Hapus</span>
                            </a>
                            
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>