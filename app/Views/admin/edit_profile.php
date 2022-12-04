<?= $this->extend('layout/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-0 text-gray-800">Tambah Santri</h1>
    <div class="row">
        <div class="col-lg-8">

            <form action="/admin/save" method="post">
                <?= csrf_field(); ?>

                <div class="row justify-content-center mt-3 mb-4">
                    <div class="col">
                        <label for="nama" class="form-label">Nama Santri
                        </label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Santri" value="<?= $user_list->fullname; ?>" required>
                    </div>
                    <div class="col">
                        <label for="username" class="form-label">Username / NIS
                        </label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username / NIS" value="<?= $user_list->username; ?>" required>
                    </div>
                </div>

                <div class="row justify-content-center mb-4">
                    <div class="col">
                        <label for="email" class="form-label">Email
                        </label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" value="<?= $user_list->email; ?>" required>
                    </div>
                    <div class="col">
                        <label for="no_tlp" class="form-label">No Telepon Santri
                        </label>
                        <input type="number" class="form-control" id="no_tlp" name="no_tlp" placeholder="Masukkan No Telepon Santri" value="<?= $user_list->no_telp; ?>" required>
                    </div>
                </div>

                <div class="row justify-content-center mb-3">
                    <div class="col">
                        <div class="form-group">
                            <label for="gender">Jenis Kelamin</label>
                            <select id="gender" name="gender" class="form-control" required>
                                <option value="<?= $user_list->jk; ?>" selected disabled>Pilih Jenis Kelamin</option>
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
                                <option value="<?= $user_list->kamar; ?>" selected disabled>-- Pilih Jenis Kelamin --</option>
                                <!-- script for ajax in layout/index -->
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center mb-4">
                    <div class="col">
                        <label for="text" class="form-label">Nama Wali Santri
                        </label>
                        <input type="wali" class="form-control" id="wali" name="wali" placeholder="Masukkan Nama Wali Santri" value="<?= $user_list->wali; ?>" required>
                    </div>
                    <div class="col">
                        <label for="no_wali" class="form-label">No Telepon Wali Santri
                        </label>
                        <input type="number" class="form-control" id="no_wali" name="no_wali" placeholder="Masukkan No Telepon Wali Santri" value="<?= $user_list->no_wali; ?>" required>
                    </div>
                </div>

                <div class="row justify-content-center mb-4">
                    <div class="col-3">
                        <label for="datepicker" class="form-label">Tahun Masuk
                        </label>
                        <input type="text" class="form-control" id="datepicker" name="datepicker" placeholder="Pilih Tahun Masuk" value="<?= $user_list->thn_masuk; ?>" required>
                    </div>
                    <div class="col-9">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>