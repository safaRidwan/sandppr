<div id="menghilang">
    <?= $this->session->flashdata('alert') ?>
</div>

<div class="">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userModal">
        + Tambah Armada
    </button>

    <!-- Modal -->
    <div class="modal fade" id="userModal" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg" role="document">

        <form action="<?= base_url('admin/konten/simpan') ?>" method="post" enctype="multipart/form-data"> <!-- lari ke Controller admin/kategori/simpan -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Tambah Armada</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <div class="col mb-3">
                        <label class="form-label">Armada</label>
                        <input type="text" class="form-control" placeholder="Nama Armada" required name="judul">
                    </div>
                    <div class="col mb-3">
                        <label class="form-label">Kategori</label>
                        <select name="id_kategori" class="form-select">
                        <?php foreach ($kategori as $aa) { ?>
                            <option value="<?= $aa['id_kategori'] ?>"><?= $aa['nama_kategori'] ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="col mb-3">
                        <label class="form-label">Merk</label>
                        <input type="text" class="form-control" placeholder="Merk Bus" required name="merk">
                    </div>
                    <div class="col mb-3">
                        <label class="form-label">Kursi</label>
                        <input type="text" class="form-control" placeholder="Jumlah Kursi" required name="kursi">
                    </div>
                    <div class="col mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea name="keterangan" class="form-control" required></textarea>
                    </div>

                    <div class="col mb-3">
                        <label class="form-label">Foto</label>
                        <input type="file" class="form-control" name="foto"
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


<div class="card mt-3">
    <h5 class="card-header">Konten Armada</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr class="text-nowrap">
                    <th>No</th>
                    <th>Armada</th>
                    <th>Merk</th>
                    <th>Kategori</th>
                    <th>Kursi</th>
                    <th>Foto</th>
                    <th>Kreator</th>
                    <th>Tanggal</th>
                    <th>Hapus/Edit/Booking</th>

                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach ($konten as $aa) { ?>
                    <tr>
                        <th scope="row"><?= $no; ?></th>
                        <td>
                            <?= $aa['judul'] ?>
                        </td>
                        <td><?= $aa['merk'] ?></td>
                        <td><?= $aa['nama_kategori'] ?></td>
                        <td><?= $aa['kursi'] ?></td>
                        <td>
                            <a href="<?= base_url('asset/upload/konten/'.$aa['foto']) ?>" target="_blank">
                                <span class="tf-icons bx bx-search-alt-2"></span> Lihat Foto
                            </a>
                        </td>
                        <td>
                            <?= $aa['nama'] ?>
                        </td>
                        <td>
                            <?= $aa['tanggal'] ?>
                        </td>
                        <td>
                            <a href="<?php echo site_url('admin/konten/delete_data/'.$aa['foto'].'/'.$aa['id_konten']);?>"
                            class="btn btn-sm rounded-pill btn-danger" onclick="return confirm('yakin deck, mau hapus?')">
                            <span class="tf-icons bx bx-trash"></span></a>

                                <!-- modal EDIT JONNN -->
                                <button type="button" class="btn btn-sm rounded-pill btn-warning" data-bs-toggle="modal"
                                data-bs-target="#Editkonten<?= $no; ?>">
                                    <span>Edit</span>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="Editkonten<?= $no; ?>" tabindex="-1" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-lg" role="document">

                                    <form action="<?= base_url('admin/konten/update') ?>" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="nama_foto" value="<?= $aa['foto'] ?>">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel1"><?= $aa['judul'] ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                
                                                <div class="col mb-3">
                                                    <label class="form-label">Armada</label>
                                                    <input type="text" class="form-control" value="<?= $aa['judul'] ?>" name="judul">
                                                </div>
                                                <div class="col mb-3">
                                                    <label class="form-label">Merk</label>
                                                    <input type="text" class="form-control" value="<?= $aa['merk'] ?>" name="merk">
                                                </div>
                                                <div class="col mb-3">
                                                    <label class="form-label">Kursi</label>
                                                    <input type="text" class="form-control" value="<?= $aa['kursi'] ?>" name="kursi">
                                                </div>
                                                <div class="col mb-3">
                                                    <label class="form-label">Kategori</label>
                                                    <select name="id_kategori" class="form-select">
                                                    <?php foreach ($kategori as $uu) { ?>
                                                        <option
                                                            <?php if($uu['id_kategori']==$aa['id_kategori']){ echo"selected"; } ?>    
                                                            value="<?= $uu['id_kategori'] ?>">
                                                            <?= $uu['nama_kategori'] ?>
                                                        </option>
                                                    <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col mb-3">
                                                    <label class="form-label">Keterangan</label>
                                                    <textarea name="keterangan" class="form-control"><?= $aa['keterangan'] ?></textarea>
                                                </div>

                                                <div class="col mb-3">
                                                    <label class="form-label">Foto (wajib diisi)*</label>
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

                                    <a href="<?= site_url('admin/booking/jadwal/'.$aa['id_konten']); ?>" class="btn btn-sm rounded-pill btn-info">
                                        <span>+ Booking</span>
                                    </a>

                                    <a href="<?= site_url('admin/detail/detail_armada/'.$aa['id_konten']); ?>" class="btn btn-sm rounded-pill btn-primary">
                                        <span class='bx bxs-image-add'></span>
                                    </a>
                        </td>
                    </tr>
                <?php $no++; } ?>
            </tbody>
        </table>
    </div>
</div>
