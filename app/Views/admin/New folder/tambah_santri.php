<?= $this->extend('layout/index'); ?>
<?= $this->section('page-content'); ?>

<!-- END THEMES STYLES -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-0 text-gray-800 mb-4">Tambah Santri</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <h5 class="col font-weight-bold text-primary">Masukkan data santri</h5>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="/admin/save" method="post">
                    <?= csrf_field(); ?>

                    <div class="row justify-content-center mt-3">
                        <div class="col-5 mb-3">
                            <label for="nama" class="form-label">Nama<span> *</span>
                            </label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
                        </div>
                        <div class="col-5 mb-3">
                            <label for="username" class="form-label">Username / NIS<span> *</span>
                            </label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username / NIS" required>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-5 mb-3">
                            <label for="email" class="form-label">Email<span> *</span>
                            </label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="col-5 mb-3">
                            <label for="no_tlp" class="form-label">No Telepon<span> *</span>
                            </label>
                            <input type="number" class="form-control" id="no_tlp" name="no_tlp" placeholder="No Telepon" required>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-5 mb-3">
                            <div class="form-group">
                                <label for="gender" class="form-label">Jenis Kelamin<span> *</span></label>
                                <select class="form-control" id="gender" name="gender" required>
                                    <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                    <?php foreach ($genders as $gender) { ?>
                                        <option value="<?php echo $gender->id_gender; ?>"><?php echo $gender->sex; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-5 mb-3">
                            <div class="form-group">
                                <label for="kamar" class="form-label">Kamar<span> *</span></label>
                                <select class="form-control" id="kamar" name="kamar" required>
                                    <!-- <option value="" selected disabled>Pilih Kamar</option> -->
                                </select>
                                <!-- script for ajax below -->
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-5 mb-3">
                                <label for="text" class="form-label">Nama Wali Santri<span> *</span>
                                </label>
                                <input type="wali" class="form-control" id="wali" name="wali" placeholder="Nama Wali Santri" required>
                            </div>
                            <div class="col-5 mb-3">
                                <label for="no_wali" class="form-label">No Telepon Wali Santri<span> *</span>
                                </label>
                                <input type="number" class="form-control" id="no_wali" name="no_wali" placeholder="No Telepon Wali Santri" required>
                            </div>
                        </div>

                        
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-2 mb-3">
                            <label for="datepicker" class="form-label">Tahun Masuk<span> *</span>
                            </label>
                            <input type="text" class="form-control" id="datepicker" name="datepicker" placeholder="Tahun Masuk" required>
                        </div>
                        <div class="col-8 mb-3">
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-9 mb-5">
                        </div>
                        <div class="col-2 mb-5">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection(); ?>