<div id="menghilang">
    <?= $this->session->flashdata('alert') ?>
</div>

<div class="">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userModal">
        + Tambah Kategori
    </button>

    <!-- Modal -->
    <div class="modal fade" id="userModal" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" role="document">

        <form action="<?= base_url('admin/kategori/simpan') ?>" method="post"> <!-- lari ke Controller admin/kategori/simpan -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Tambah Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <div class="col mb-3">
                        <label class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" placeholder="Nama Kategori" name="nama_kategori">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
        </form>
            </div>
        </div>
    </div>


<div class="card mt-3">
    <h5 class="card-header">Data Kategori</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr class="text-nowrap">
                    <th>No</th>
                    <th>Kategori Bus</th>
                    <th>Hapus/Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach ($kategori as $aa) { ?>
                    <tr>
                        <th scope="row"><?= $no; ?></th>
                        <td>
                            <?= $aa['nama_kategori'] ?>
                        </td>
                        <td>
                            <a href="<?php echo site_url('admin/kategori/delete_data/'.$aa['id_kategori']);?>"
                            class="btn btn-sm rounded-pill btn-danger" onclick="return confirm('yakin deck, mau hapus?')">
                            <span class="tf-icons bx bx-trash"></span></a>


                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-sm rounded-pill btn-warning" data-bs-toggle="modal"
                        data-bs-target="#useredit<?= $aa['id_kategori'] ?>">
                        <span class="tf-icons bx bx-edit"></span>
                        </button>

                            <!-- Modal -->
                            <div class="modal fade" id="useredit<?= $aa['id_kategori'] ?>" tabindex="-1" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog" role="document">

                                <form action="<?= base_url('admin/kategori/update') ?>" method="post"> <!-- lari ke Controller admin/kategori/update -->
                                <input type="hidden" name="id_kategori" value="<?= $aa['id_kategori'] ?>">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel1">Perbarui Nama Kategori</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col mb-3">
                                                <label class="form-label">Nama Kategori</label>
                                                <input type="text" class="form-control" value="<?= $aa['nama_kategori'] ?>" name="nama_kategori">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                </form>
                                </div>
                            </div>


                        </td>
                    </tr>
                <?php $no++; } ?>
            </tbody>
        </table>
    </div>
</div>
