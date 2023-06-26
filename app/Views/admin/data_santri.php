<?= $this->extend('layout/index') ?>
<?= $this->section('page-content') ?>

<div class="container-fluid">
    <!-- session -->
    <?php if (session()->get('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h6> Data berhasil <?= session()->getFlashdata('pesan') ?></h6>
        </div>
    <?php endif; ?>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Data Santri</h1>
    </div>
    <p class="mb-4">Data Santri Pondok Pesantren Al-Jihad Surabaya</a>.</p>
    <!-- End of Page Heading -->

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-end">
            <!-- <a href="/admin/tambah_santri" class="btn btn-warning .btn-icon-split py-1 .col-auto mr-2"><i class="fa-solid fa-file-pdf mr-2"></i>Export PDF</a> -->
            <button type="button" class="btn btn-primary py-1 .col-auto mx-1" data-toggle="modal" data-target="#modal_tambah"><i class="fa-solid fa-fw fa-user-plus mr-2"></i>Tambah Santri</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NIS</th>
                            <th scope="col">Nama</th>
                            <th scope="col">No HP</th>
                            <th scope="col">Email</th>
                            <th scope="col">Kamar</th>
                            <th scope="col">Jenis Syahriyah</th>
                            <!-- <th scope="col">Nominal</th> -->
                            <th scope="col" width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $i = 1;
                        foreach ($users as $user_list) : ?>
                            <tr>
                                <th scope="row"><?= $i++ ?></th>
                                <td><?= $user_list->nis ?></td>
                                <td><?= $user_list->fullname ?></td>
                                <td><?= $user_list->no_telp ?></td>
                                <td><?= $user_list->email ?></td>
                                <td><?= $user_list->kamar ?></td>
                                <td> <!-- untuk menampilkan jenis syahriyah sebagai normal atau khusus-->
                                    <?php if ($user_list->nominal == 250000) { ?>
                                        Normal
                                    <?php } elseif ($user_list->nominal == 100000) { ?>
                                        Khusus
                                    <?php } ?>
                                </td>

                                <td class="d-flex justify-content-end">
                                    <a href="<?= base_url('admin/detail/' . $user_list->userid) ?>" class="btn btn-info rounded-circle mx-1"><i class="fas fa-eye"></i></a>
                                    <button type="button" class="btn btn-warning rounded-circle" data-toggle="modal" data-target="#modal_edit" id="btn-edit" 
                                        data-id         = "<?= $user_list->userid ?>" 
                                        data-nis        = "<?= $user_list->nis ?>" 
                                        data-fullname   = "<?= $user_list->fullname ?>" 
                                        data-email      = "<?= $user_list->email ?>" 
                                        data-no_telp    = "<?= $user_list->no_telp ?>" 
                                        data-gender     = "<?= $user_list->gender_id ?>" 
                                        data-wali       = "<?= $user_list->wali ?>" 
                                        data-no_wali    = "<?= $user_list->no_wali ?>" 
                                        data-thn_masuk  = "<?= $user_list->thn_masuk ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    <a href="<?= base_url('admin/delete/' . $user_list->userid) ?>" class="btn btn-danger rounded-circle mx-1"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>

                            <!-- Modal Tambah Santri -->
                            <div id="modal_tambah" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Masukkan Data Santri</h4>
                                            <button type="button" class="close" data-dismiss="modal">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col">
                                                    <form action="/admin/save" method="post">
                                                        <?= csrf_field() ?>
                                                        <div class="row justify-content-center mt-3 mb-4">
                                                            <div class="col">
                                                                <label for="nis" class="form-label">Nomor Induk Santri
                                                                </label>
                                                                <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukkan Nomor Induk Santri" required>
                                                            </div>
                                                            <div class="col">
                                                            </div>
                                                        </div>

                                                        <div class="row justify-content-center mt-3 mb-4">
                                                            <div class="col">
                                                                <label for="nama" class="form-label">Nama Santri</label>
                                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Santri" required>
                                                            </div>
                                                            <div class="col">
                                                                <label for="j_syahriyah">Jenis Syahriyah</label>
                                                                <select id="j_syahriyah" name="j_syahriyah" class="form-control" required>
                                                                    <option value="" selected disabled>Pilih Jenis Syahriyah</option>
                                                                    <option value="1">Normal</option>
                                                                    <option value="2">Khusus</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row justify-content-center mb-4">
                                                            <div class="col">
                                                                <label for="no_tlp" class="form-label">No HP Santri</label>
                                                                <input type="number" class="form-control" id="no_tlp" name="no_tlp" placeholder="Masukkan No Telepon Santri" required>
                                                            </div>
                                                            <div class="col">
                                                                <label for="email" class="form-label">Email</label>
                                                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" required>
                                                            </div>
                                                        </div>

                                                        <div class="row justify-content-center mb-3">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label for="gender">Jenis Kelamin</label>
                                                                    <select id="gender" name="gender" class="form-control" required>
                                                                        <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                                                        <?php foreach ($genders as $gender) { ?>
                                                                            <option value="<?= $gender->id_gender; ?>"><?= $gender->sex; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label for="kamar">Kamar</label>
                                                                    <select id="kamar" name="kamar" class="form-control" required>
                                                                        <option value="" selected disabled>Pilih Kamar</option>
                                                                        <!-- script for ajax in layout/index -->
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row justify-content-center mb-4">
                                                            <div class="col">
                                                                <label for="text" class="form-label">Nama Wali Santri
                                                                </label>
                                                                <input type="wali" class="form-control" id="wali" name="wali" placeholder="Masukkan Nama Wali Santri" required>
                                                            </div>
                                                            <div class="col">
                                                                <label for="no_wali" class="form-label">No Telepon Wali Santri
                                                                </label>
                                                                <input type="number" class="form-control" id="no_wali" name="no_wali" placeholder="Masukkan No Telepon Wali Santri" required>
                                                            </div>
                                                        </div>

                                                        <div class="row justify-content-center mb-4">
                                                            <div class="col-3">
                                                                <label for="datepicker" class="form-label">Tahun Masuk
                                                                </label>
                                                                <input type="text" class="form-control" id="datepicker" name="datepicker" placeholder="Pilih Tahun Masuk" required>
                                                            </div>
                                                            <div class="col-9">
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Modal Tambah Santri -->

                            <!-- Modal Delete -->
                            <div id="modal_delete" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Hapus Data Santri</h4>
                                            <button type="button" class="close" data-dismiss="modal">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <p>Apakah Anda yakin ingin menghapus <strong><?= $user_list->fullname ?></strong>?</p>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            <a href="/admin/delete/<?= $user_list->userid ?>" class="btn btn-primary"> Yakin</a>
                                            <?= d($user_list->userid) ?>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Modal Delete -->

                            <!-- Modal Edit -->
                            <div id="modal_edit" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit Data Santri</h4>
                                            <button type="button" class="close" data-dismiss="modal">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col">
                                                    <form action="/admin/edit" method="post">
                                                        <?= csrf_field() ?>
                                                        <input type="hidden" name="id" id="id-santri" value="<?= $user_list->userid ?>">
                                                        <div class="row justify-content-center mt-3 mb-4">
                                                            <div class="col">
                                                                <label for="nis" class="form-label">Nomor Induk Santri</label>
                                                                <input type="text" class="form-control" id="nis" name="nis" placeholder="" value="<?= $user_list->nis ?>" required>
                                                            </div>
                                                            <div class="col">
                                                            </div>
                                                        </div>

                                                        <div class="row justify-content-center mt-3 mb-4">
                                                            <div class="col">
                                                                <label for="nama" class="form-label">Nama Santri</label>
                                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="" required>
                                                            </div>
                                                            <div class="col">
                                                                <label for="j_syahriyah">Jenis Syahriyah</label>
                                                                <select id="j_syahriyah" name="j_syahriyah" class="form-control" required>
                                                                    <option value="" disabled>Pilih Jenis Syahriyah</option>
                                                                    <option value="250000" <?= ($user_list->j_syahriyah == 250000) ? 'selected' : ''; ?>>Normal</option>
                                                                    <option value="100000" <?= ($user_list->j_syahriyah == 100000) ? 'selected' : ''; ?>>Khusus</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row justify-content-center mb-4">
                                                            <div class="col">
                                                                <label for="no_tlp" class="form-label">No HP Santri</label>
                                                                <input type="number" class="form-control" id="no_tlp" name="no_tlp" placeholder="" required>
                                                            </div>
                                                            <div class="col">
                                                                <label for="email" class="form-label">Email</label>
                                                                <input type="email" class="form-control" id="email" name="email" placeholder="" required>
                                                            </div>
                                                        </div>

                                                        <div class="row justify-content-center mb-3">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label for="gender">Jenis Kelamin</label>
                                                                    <select id="gender" name="gender" class="form-control" required>
                                                                        <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                                                        <?php foreach ($genders as $gender) { ?>
                                                                            <option value="<?= $gender->id_gender; ?>"><?= $gender->sex; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label for="kamar">Kamar</label>
                                                                    <select id="kamar" name="kamar" class="form-control" required>
                                                                        <option value="" selected disabled>Pilih Kamar</option>
                                                                        <!-- script for ajax in layout/index -->
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row justify-content-center mb-4">
                                                            <div class="col">
                                                                <label for="text" class="form-label">Nama Wali Santri
                                                                </label>
                                                                <input type="wali" class="form-control" id="wali" name="wali" placeholder="Masukkan Nama Wali Santri" required>
                                                            </div>
                                                            <div class="col">
                                                                <label for="no_wali" class="form-label">No Telepon Wali Santri
                                                                </label>
                                                                <input type="number" class="form-control" id="no_wali" name="no_wali" placeholder="Masukkan No Telepon Wali Santri" required>
                                                            </div>
                                                        </div>

                                                        <div class="row justify-content-center mb-4">
                                                            <div class="col-3">
                                                                <label for="datepicker" class="form-label">Tahun Masuk
                                                                </label>
                                                                <input type="text" class="form-control" id="datepicker" name="datepicker" placeholder="Pilih Tahun Masuk" required>
                                                            </div>
                                                            <div class="col-9">
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Modal Edit -->

                        <?php endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>