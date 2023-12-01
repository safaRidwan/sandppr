<div id="menghilang">
    <?= $this->session->flashdata('alert') ?>
</div>

<div class="">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userModal">
        + Tambah User
    </button>

    <!-- Modal -->
    <div class="modal fade" id="userModal" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" role="document">

        <form action="<?= base_url('admin/user/simpan') ?>" method="post"> <!-- lari ke Controller admin/user/simpan -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" placeholder="Username" required name="username">
                    </div>
                    <div class="col mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" placeholder="Nama" required name="nama">
                    </div>
                    <div class="col mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" placeholder="Password" required name="password">
                    </div>
                    <label class="form-label">Pangkat</label>
                    <select class="form-select" name="level">
                        <option value="Admin">Admin</option>
                        <option value="Kontributor">Kontributor</option>
                    </select>
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
    <h5 class="card-header">Data Pengguna</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr class="text-nowrap">
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Level</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach ($user as $aa) { ?>
                    <tr>
                        <th scope="row"><?= $no; ?></th>
                        <td>
                            <?= $aa['username'] ?>
                        </td>
                        <td>
                            <?= $aa['nama'] ?>
                        </td>
                        <td>
                            <?= $aa['level'] ?>
                        </td>
                        <td>
                            <a href="<?php echo site_url('admin/user/delete_data/'.$aa['id_user']);?>"
                            class="btn btn-sm rounded-pill btn-danger" onclick="return confirm('yakin deck, mau hapus?')">
                            <span class="tf-icons bx bx-trash"></span></a>


                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-sm rounded-pill btn-warning" data-bs-toggle="modal"
                        data-bs-target="#useredit<?= $aa['id_user'] ?>">
                        <span class="tf-icons bx bx-edit"></span>
                        </button>

                            <!-- Modal -->
                            <div class="modal fade" id="useredit<?= $aa['id_user'] ?>" tabindex="-1" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog" role="document">

                                <form action="<?= base_url('admin/user/update') ?>" method="post"> <!-- lari ke Controller admin/user/simpan -->
                                <input type="hidden" name="id_user" value="<?= $aa['id_user'] ?>">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel1">Perbarui Nama User</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col mb-3">
                                                <label class="form-label">Username</label>
                                                <input type="text" class="form-control" value="<?= $aa['username'] ?>" name="username" readonly>
                                            </div>
                                            <div class="col mb-3">
                                                <label class="form-label">Nama</label>
                                                <input type="text" class="form-control" value="<?= $aa['nama'] ?>" name="nama">
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
