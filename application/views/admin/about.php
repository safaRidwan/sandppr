<div id="menghilang">
    <?= $this->session->flashdata('alert') ?>
</div>


<div class="mb-4">
    <div class="">
        <!-- Button trigger modal -->

        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#fotoAbout">
            <span class="tf-icons bx bx-edit"></span> Foto About
        </button>
        

        <!-- Modal Leader -->
        <div class="modal fade" id="leader" tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg" role="document">

                <form action="<?= base_url('admin/about/simpan') ?>" method="post" enctype="multipart/form-data">
                    <!-- lari ke Controller admin/kategori/simpan -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">Tambah Leader</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"></span>
                                    </span>
                                    <input type="text" class="form-control" name="nama" placeholder="Nama" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jabatan</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"></span>
                                    </span>
                                    <input type="text" class="form-control" name="jabatan" required
                                        placeholder="Jabatan">
                                </div>
                            </div>
                                <div class="col mb-3">
                                    <label class="form-label">Foto profil</label>
                                    <input type="file" class="form-control" name="foto_profil"
                                        accept="image/png, image/jpeg, image/jpg" required>
                                        <div class="form-text">Ukuran Foto 1:1</div>
                                </div>
                            <div class="mb-3">
                                <label class="form-label">Instagram</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bxl-instagram"></i></span>
                                    <input type="url" class="form-control" name="instagram" value=""
                                        placeholder="link Instagram">
                                    <span class="input-group-text">https://</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Facebook</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bxl-facebook-circle"></i></span>
                                    <input type="url" class="form-control" name="facebook" value=""
                                        placeholder="link Facebook">
                                    <span class="input-group-text">https://</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tiktok</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bxl-tiktok"></i></span>
                                    <input type="url" class="form-control" name="tiktok" value=""
                                        placeholder="link TikTok">
                                    <span class="input-group-text">https://</span>
                                </div>
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

                                                                                


        <!-- Modal Leader -->
        <div class="modal fade" id="fotoAbout" tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg" role="document">

                <form action="<?= base_url('admin/about/updateFoto') ?>" method="post" enctype="multipart/form-data">
                    <!-- lari ke Controller admin/kategori/simpan -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">Ganti Foto Halaman About</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <?php foreach ($foto_about as $ab) { ?>
                                <a href="<?= base_url('asset/upload/about/'.$ab['foto_about']) ?>" target="_blank">
                                    <span class="btn rounded-pill btn-info tf-icons bx bx-search-alt-2"> Lihat Foto</span>
                                </a>
                            <?php } ?>

                            <div class="col mb-3 mt-3">
                                <label class="form-label">Ganti Foto Ga?</label>
                                <input type="file" class="form-control" name="foto_about"
                                    accept="image/png, image/jpeg, image/jpg" required>
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



<div class="card mb-4">
    <h5 class="card-header">Data Tabel Leader</h5>
    <div class="mb-4" style="margin-left: 30px;">
            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#leader">
                + Tambah Leader
            </button>
        </div>
    <div class="table-responsive text-nowrap">
        <table class="table table-striped">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Foto</th>
                    <th>Edit/Hapus</th>
                </tr>
            </thead>
            <?php $no=1; foreach ($profil as $aa) { ?>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <td><?= $no; ?></td>
                        <td><strong><?= $aa['nama'] ?></strong></td>
                        <td>
                            <strong><?= $aa['jabatan'] ?></strong>
                        </td>
                        <td>
                            <a href="<?= base_url('asset/upload/profil/'.$aa['foto_profil']) ?>" target="_blank">
                                <span class="tf-icons bx bx-search-alt-2"></span> Lihat Foto
                            </a>
                        </td>

                        <td>

                        <!-- modal EDIT JONNN -->
                        <button type="button" class="btn btn-sm rounded-pill btn-warning" data-bs-toggle="modal"
                                data-bs-target="#EditLeader<?= $no; ?>">
                                    <span class="tf-icons bx bx-edit"></span>
                                </button>

                                <!-- Modal -->
                            <div class="modal fade" id="EditLeader<?= $no; ?>" tabindex="-1" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-lg" role="document">

                                    <form action="<?= base_url('admin/about/edit_leader') ?>" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="nama_foto" value="<?= $aa['foto_profil'] ?>">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel1">Edit Data Leader</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                
                                            <div class="mb-3">
                                                <label class="form-label">Nama</label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"></span>
                                                    </span>
                                                    <input type="text" class="form-control" name="nama" value="<?= $aa['nama'] ?>">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Jabatan</label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"></span>
                                                    </span>
                                                    <input type="text" class="form-control" name="jabatan" value="<?= $aa['jabatan'] ?>">
                                                </div>
                                            </div>
                                            <div class="col mb-3">
                                                <label class="form-label">Foto profil (1:1)*</label>
                                                <input type="file" class="form-control" name="foto_profil"
                                                    accept="image/png, image/jpeg, image/jpg">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Instagram</label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i class="bx bxl-instagram"></i></span>
                                                    <input type="url" class="form-control" name="instagram" value="<?= $aa['instagram'] ?>"
                                                        placeholder="link Instagram">
                                                    <span class="input-group-text">https://</span>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Facebook</label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i class="bx bxl-facebook-circle"></i></span>
                                                    <input type="url" class="form-control" name="facebook" value="<?= $aa['facebook'] ?>"
                                                        placeholder="link Facebook">
                                                    <span class="input-group-text">https://</span>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Tiktok</label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i class="bx bxl-tiktok"></i></span>
                                                    <input type="url" class="form-control" name="tiktok" value="<?= $aa['tiktok'] ?>"
                                                        placeholder="link TikTok">
                                                    <span class="input-group-text">https://</span>
                                                </div>
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

                        <a href="<?php echo site_url('admin/about/delete_leader/'.$aa['foto_profil']);?>"
                            class="btn btn-sm rounded-pill btn-danger" onclick="return confirm('yakin deck, mau hapus?')">
                            <span class="tf-icons bx bx-trash"></span></a>
                        </td>
                    </tr>
                </tbody>
            <?php $no++; } ?>
        </table>
    </div>
</div>



<div class="col-xl">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Profil Prusahaan</h5>
            <small class="text-muted float-end">www.sandpaper.com</small>
        </div>
        <div class="card-body">
            <form action="<?= base_url('admin/about/perbarui') ?>" method="post" enctype="multipart/form-data">

                <div class="mb-3">
                    <label class="form-label">Jumlah Member</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text">
                            <i class='bx bxs-group'></i></span>
                        </span>
                        <input type="number" class="form-control" name="member" value="<?= $konfigabout->member; ?>"
                            placeholder="Jumlah Member">
                        <span class="input-group-text">Jumlah Member</span>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jumlah Armada</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text">
                            <i class='bx bxs-bus'></i></span>
                        </span>
                        <input type="number" class="form-control" name="armada" value="<?= $konfigabout->armada; ?>"
                            placeholder="Jumlah Armada">
                        <span class="input-group-text">Jumlah Armada</span>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jumlah Perjalanan</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text">
                            <i class='bx bxs-car-crash'></i></i></span>
                        </span>
                        <input type="number" class="form-control" name="perjalanan"
                            value="<?= $konfigabout->perjalanan; ?>" placeholder="Jumlah Perjalanan">
                        <span class="input-group-text">Jumlah Perjalanan</span>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Visi</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text">
                            <i class="bx bx-buildings"></i></span>
                        <textarea class="form-control" rows="6" name="visi"><?= $konfigabout->visi; ?></textarea>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Misi</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text">
                            <i class="bx bx-buildings"></i></span>
                        <textarea class="form-control" rows="12" name="misi"><?= $konfigabout->misi; ?></textarea>
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>