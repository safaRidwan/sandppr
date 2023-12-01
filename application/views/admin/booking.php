
<div id="menghilang">
    <?= $this->session->flashdata('alert') ?>
</div>


<div class="col-xl">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Booking Armada <?php echo $konten->judul; ?> ?</h5>
            <small class="text-muted float-end">www.sandpaper.com</small>
        </div>
        <div class="card-body">
            <form action="<?= base_url('admin/booking/simpan') ?>" method="post">
            <input type="hidden" name="id_konten" value="<?= $konten->id_konten; ?>">
                        <div class="mb-3 row">
                            <label for="html5-date-input" class="col-md-2 col-form-label">Tgl Mulai</label>
                            <div class="col-md-10">
                                <input
                                class="form-control"
                                type="date"
                                name="tgl_mulai" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-date-input" class="col-md-2 col-form-label">Tgl Berakhir</label>
                            <div class="col-md-10">
                                <input
                                class="form-control"
                                type="date"
                                name="tgl_berakhir" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">Client</label>
                            <div class="col-md-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" name="nama_client" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">Keterangan</label>
                            <div class="col-md-10">
                                <div class="input-group input-group-merge">
                                    <textarea name="keterangan_booking" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
            </form>
        </div>
    </div>
</div>



<div class="card">
    <h5 class="card-header">Tanggal yang sudah di Booking</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr class="text-nowrap">
                    <th>No</th>
                    <th>Armada</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Berakhir</th>
                    <th>Client</th>
                    <th>Kerengan</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach ($booking as $aa) { ?>
                    <tr>
                        <th scope="row"><?= $no; ?></th>
                        <td><?= $aa['judul'] ?></td>
                        <td><?= $aa['tgl_mulai'] ?></td>
                        <td><?= $aa['tgl_berakhir'] ?></td>
                        <td><?= $aa['nama_client'] ?></td>
                        <td><?= $aa['keterangan_booking'] ?></td>
                        <td>
                            <a href="<?php echo site_url('admin/booking/delete_data/'.$aa['id_booking'].'/'.$konten->id_konten);?>"
                            class="btn btn-sm rounded-pill btn-danger" onclick="return confirm('yakin deck, mau hapus?')">
                            <span class="tf-icons bx bx-trash"></span></a>
                        </td>
                    </tr>
                <?php $no++; } ?>
            </tbody>
        </table>
    </div>
</div>

