
<div id="menghilang">
    <?= $this->session->flashdata('alert') ?>
</div>

        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#fotoHome">
            <span class="tf-icons bx bx-edit"></span> Foto Home
        </button>

        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#fotologo">
            <span class="tf-icons bx bx-edit"></span> Logo
        </button>

        <!-- Modal Leader -->
        <div class="modal fade" id="fotoHome" tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg" role="document">

                <form action="<?= base_url('admin/home/updateFoto') ?>" method="post" enctype="multipart/form-data">
                    <!-- lari ke Controller admin/kategori/simpan -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">Ganti Foto Halaman Home</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <?php foreach ($foto_home as $hh) { ?>
                                <a href="<?= base_url('asset/upload/home/'.$hh['foto_home']) ?>" target="_blank">
                                    <span class="btn rounded-pill btn-info tf-icons bx bx-search-alt-2"> Lihat Foto</span>
                                </a>
                            <?php } ?>

                            <div class="col mb-3 mt-3">
                                <label class="form-label">Ganti Foto ga?</label>
                                <input type="file" class="form-control" name="foto_home"
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



        <!-- Modal Leader -->
        <div class="modal fade" id="fotologo" tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg" role="document">

                <form action="<?= base_url('admin/home/logo') ?>" method="post" enctype="multipart/form-data">
                    <!-- lari ke Controller admin/kategori/simpan -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Ganti Logo ga?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <?php foreach ($foto_logo as $logo) { ?>
                                <a href="<?= base_url('asset/upload/logo/'.$logo['foto_logo']) ?>" target="_blank">
                                    <span class="btn rounded-pill btn-info tf-icons bx bx-search-alt-2"> Lihat Foto</span>
                                </a>
                            <?php } ?>

                            <div class="col mb-3 mt-3">
                                <label class="form-label">Foto Logo</label>
                                <input type="file" class="form-control" name="foto_logo"
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






<div class="col-xl py-4">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Konfigurasi</h5>
            <small class="text-muted float-end">www.sandpaper.com</small>
        </div>
        <div class="card-body">
            <form action="<?= base_url('admin/konfigurasi/update') ?>" method="post">
                <div class="mb-3">
                    <label class="form-label">Judul Website</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i
                                class="bx bx-edit"></i></span>
                        <input type="text" class="form-control" name="judul_website" value="<?= $konfig->judul_website; ?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Profil Website</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text">
                            <i class="bx bx-buildings"></i></span>
                        <textarea class="form-control" rows="6" name="profil_website"><?= $konfig->profil_website; ?></textarea>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text">
                        <i class="bx bx-map"></i></span>
                        <input type="text" class="form-control" name="alamat" value="<?= $konfig->alamat; ?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">No WhatsApp</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text">
                        <i class="bx bxl-whatsapp"></i></span>
                        <input type="text" class="form-control" name="no_wa" value="<?= $konfig->no_wa; ?>">
                        <span class="input-group-text">+62</span>
                    </div>
                    <div class="form-text">Dicek dulu min nomernya</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text">
                        <i class="bx bx-envelope"></i></span>
                        <input type="text" class="form-control" name="email" value="<?= $konfig->email; ?>">
                        <span class="input-group-text">@gmail.com</span>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Instagram</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bxl-instagram"></i></span>
                        <input type="url" class="form-control" name="instagram" value="<?= $konfig->instagram; ?>" placeholder="link Instagram">
                        <span class="input-group-text">https://</span>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Facebook</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bxl-facebook-circle"></i></span>
                        <input type="url" class="form-control" name="facebook" value="<?= $konfig->facebook; ?>" placeholder="link Facebook">
                        <span class="input-group-text">https://</span>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tiktok</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bxl-tiktok"></i></span>
                        <input type="url" class="form-control" name="tiktok" value="<?= $konfig->tiktok; ?>" placeholder="link TikTok">
                        <span class="input-group-text">https://</span>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Youtube</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text">
                        <i class="bx bxl-youtube"></i></span>
                        </span>
                        <input type="url" class="form-control" name="youtube" value="<?= $konfig->youtube; ?>" placeholder="link Youtube">
                        <span class="input-group-text">https://</span>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Hari Buka</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text">
                        <i class="bx bxs-book-content"></i></span>
                        </span>
                        <input type="text" class="form-control" placeholder="Senin - Jumat" name="hari_buka" value="<?= $konfig->hari_buka; ?>">
                        <span class="input-group-text">buka hari apa aja min?</span>
                        <span class="input-group-text" placeholder="senin - jumat"></span>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jam Buka</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text">
                        <i class="bx bxs-time"></i></span>
                        </span>
                        <input type="text" class="form-control" placeholder="07.00 - 22.00" name="waktu_buka" value="<?= $konfig->waktu_buka; ?>">
                        <span class="input-group-text">jam berapa sampai jam berapa?</span>
                        <span class="input-group-text" ></span>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Contact Us</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text">
                            <i class="bx bx-paper-plane"></i></span>
                        <textarea class="form-control" rows="5" name="contact_us"><?= $konfig->contact_us; ?></textarea>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Link Google Maps</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text">
                        <i class="bx bx-map"></i></span>
                        <input type="url" class="form-control" name="maps" value="<?= $konfig->maps; ?>" placeholder="link Google Maps">
                        <span class="input-group-text">https://</span>
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>