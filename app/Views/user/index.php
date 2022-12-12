<?= $this->extend('layout/index'); ?>
<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">My Profile</h1>
    </div>

    <!-- session -->
    <?php if (session()->get('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h6> Data berhasil <?= session()->getFlashdata('pesan') ?></h6>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card" style="max-width: 100%;">
                    <div class="row g-0">
                        <div class="col-md-8">
                            <div class="card-body">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <h4>
                                                <th>Nama</th>
                                            </h4>
                                            <td><span>: <?= user()->fullname; ?></span></td>
                                        </tr>
                                        <tr>
                                            <h4>
                                                <th>Username/NIS</th>
                                            </h4>
                                            <td><span>: <?= user()->username; ?></span></td>
                                        </tr>
                                        <tr>
                                            <h4>
                                                <th>Email</th>
                                            </h4>
                                            <td><span>: <?= user()->email; ?></span></td>
                                        </tr>
                                        <tr>
                                            <h4>
                                                <th>No. HP Santri</th>
                                            </h4>
                                            <td><span>: <?= user()->no_telp; ?></span></td>
                                        </tr>
                                        <tr>
                                            <h4>
                                                <th>Jenis Kelamin</th>
                                            </h4>
                                            <td><span>: <?= user()->gender_id; ?></span></td>
                                        </tr>
                                        <tr>
                                            <h4>
                                                <th>Kamar Santri</th>
                                            </h4>
                                            <td><span>: <?= user()->kamar; ?></span></td>
                                        </tr>
                                        <h4>
                                            <th>Tahun Masuk</th>
                                        </h4>
                                        <td><span>: <?= user()->thn_masuk; ?></span></td>
                                        </tr>
                                        <tr>
                                            <h4>
                                                <th>Nama Wali Santri</th>
                                            </h4>
                                            <td><span>: <?= user()->wali; ?></span></td>
                                        </tr>
                                        <tr>
                                            <h4>
                                                <th>No. HP Wali Santri</th>
                                            </h4>
                                            <td><span>: <?= user()->no_wali; ?></span></td>
                                        </tr>
                                        <tr>
                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-warning py-1 .col-auto ml-4 my-2" data-toggle="modal" data-target="#modal_edit"><i class="fa-solid fa-fw fa-pencil mr-2"></i>Edit</button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <img src="<?= base_url('/img/' . user()->user_image); ?>" class="rounded mx-auto d-block mt-5" style="max-width: 70%;" alt="<?= user()->fullname; ?>">
                        </div>
                    </div>
                </div>
            </div>

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
                                    <form action="/user/updateProfile/<?= user_id(); ?>" method="post">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="id" id="id-santri" value="<?= user()->userid ?>">
                                        <div class="row justify-content-center mt-3 mb-4">
                                            <div class="col">
                                                <label for="nama" class="form-label">Nama Santri
                                                </label>
                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Santri" value="<?= user()->fullname ?>" required>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center mb-4">
                                            <div class="col">
                                                <label for="email" class="form-label">Email
                                                </label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" value="<?= user()->email ?>" required>
                                            </div>
                                            <div class="col">
                                                <label for="no_tlp" class="form-label">No Telepon Santri
                                                </label>
                                                <input type="number" class="form-control" id="no_tlp" name="no_tlp" placeholder="Masukkan No Telepon Santri" value="<?= user()->no_telp ?>" required>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center mb-3">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="gender">Jenis Kelamin</label>
                                                    <select id="gender" name="gender" class="form-control" required>
                                                        <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                                        <?php foreach ($genders as $gender) { ?>
                                                            <option value="<?php echo $gender->id_gender; ?>"><?php echo $gender->sex; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="kamar">Kamar</label>
                                                    <select id="kamar" name="kamar" class="form-control" required>
                                                        <option value="" selected disabled>-- Pilih Jenis Kelamin --</option>
                                                        <!-- script for ajax in layout/index -->
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center mb-4">
                                            <div class="col">
                                                <label for="text" class="form-label">Nama Wali Santri
                                                </label>
                                                <input type="wali" class="form-control" id="wali" name="wali" placeholder="Masukkan Nama Wali Santri" value="<?= user()->wali ?>" required>
                                            </div>
                                            <div class="col">
                                                <label for="no_wali" class="form-label">No Telepon Wali Santri
                                                </label>
                                                <input type="number" class="form-control" id="no_wali" name="no_wali" placeholder="Masukkan No Telepon Wali Santri" value="<?= user()->no_wali ?>" required>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center mb-4">
                                            <div class="col-3">
                                                <label for="datepicker" class="form-label">Tahun Masuk
                                                </label>
                                                <input type="text" class="form-control" id="datepicker" name="datepicker" placeholder="Pilih Tahun Masuk" value="<?= user()->thn_masuk ?>" required>
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

        </div>
    </div>
</div>

<?= $this->endSection(); ?>