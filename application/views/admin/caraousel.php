<div id="menghilang">
    <?= $this->session->flashdata('alert') ?>
</div>


<div class="col-xl-12">
    <div class="card">
        <form action="<?= base_url('admin/caraousel/simpan') ?>" method="post" enctype="multipart/form-data">
            <!-- lari ke Controller admin/caraousel/simpan -->

            <label class="card-header">File input</label>
            <div class="card-body">
                <div class="col mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" class="form-control" placeholder="Judul Foto" name="judul">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Pilih Foto dengan ukuran 1:3</label>
                    <input class="form-control" type="file" name="foto" required>
                </div>
                <div class="card-footer mt-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>

        </form>
    </div>
</div>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <?php foreach ($caraousel as $aa) { ?>
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card h-100">
                        <img class="card-img-top" src="<?= base_url('asset/upload/caraousel/' . $aa['foto']) ?>">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?= $aa['judul'] ?>
                            </h5>
                            <a href="<?php echo site_url('admin/caraousel/delete_data/' . $aa['foto']); ?>"
                                class="btn btn-outline-danger" onclick="return confirm('yakin deck, mau hapus?')">
                                <span class="tf-icons bx bx-trash">Hapus</span>
                            </a>

                                <!-- modal EDIT JONNN -->
                                <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal"
                                    data-bs-target="#Editkonten<?= $aa['id_caraousel']; ?>">
                                    <span class="tf-icons bx bx-edit">Edit</span>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="Editkonten<?= $aa['id_caraousel']; ?>" tabindex="-1" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-lg" role="document">

                                    <form action="<?= base_url('admin/caraousel/update') ?>" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="nama_foto" value="<?= $aa['foto'] ?>">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Ngedit bang?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                
                                                <div class="col mb-3">
                                                    <label class="form-label">Judul</label>
                                                    <input type="text" class="form-control" value="<?= $aa['judul'] ?>" name="judul">
                                                </div>

                                                <div class="col mb-3">
                                                    <label class="form-label">Ganti Foto ga?</label>
                                                    <input type="file" class="form-control" name="foto"
                                                    accept="image/png, image/jpeg, image/jpg">
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                        </div>
                                    </div>

                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>