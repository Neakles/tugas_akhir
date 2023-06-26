<?= $this->extend('layout/index'); ?>
<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Detail Santri</h1>
    <div class="row">

        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-1">
                    <button type="button" class="btn btn-warning py-1 .col-auto mx-1 my-2" data-toggle="modal" data-target="#modal_tambah"><i class="fa-solid fa-fw fa-edit mr-2"></i>Edit</button>
                </div>
                <div class="card" style="max-width: 100%;">
                    <div class="row g-0">
                        <div class="col-md-8">
                            <div class="card-body">
                                <table class="table">
                                    <tbody>
                                    <?php // dd($user); ?>
                                        <tr>
                                            <h4>
                                                <th>NIS</th>
                                            </h4>
                                            <td><span>: <?= $user->nis; ?></span></td>
                                        </tr>
                                        <tr>
                                            <h4>
                                                <th>Nama</th>
                                            </h4>
                                            <td><span>: <?= $user->fullname; ?></span></td>
                                        </tr>
                                        <tr>
                                            <h4>
                                                <th>Email</th>
                                            </h4>
                                            <td><span>: <?= $user->email; ?></span></td>
                                        </tr>
                                        <tr>
                                            <h4>
                                                <th>No. HP Santri</th>
                                            </h4>
                                            <td><span>: <?= $user->no_telp; ?></span></td>
                                        </tr>
                                        <tr>
                                            <h4>
                                                <th>Jenis Kelamin</th>
                                            </h4>
                                            <td><span>: <?= $user->jk; ?></span></td>
                                        </tr>
                                        <tr>
                                            <h4>
                                                <th>Kamar Santri</th>
                                            </h4>
                                            <td><span>: <?= $user->kamar; ?></span></td>
                                        </tr>
                                        <tr>
                                            <h4>
                                                <th>Tahun Masuk</th>
                                            </h4>
                                            <td><span>: <?= $user->thn_masuk; ?></span></td>
                                        </tr>
                                        <tr>
                                            <h4>
                                                <th>Nama Wali Santri</th>
                                            </h4>
                                            <td><span>: <?= $user->wali; ?></span></td>
                                        </tr>
                                        <tr>
                                            <h4>
                                                <th>No. HP Wali Santri</th>
                                            </h4>
                                            <td><span>: <?= $user->no_wali; ?></span></td>
                                        </tr>
                                        <tr>
                                            <h4>
                                                <th>Jenis Syahriyah</th>
                                            </h4>
                                            <td><span>:                                             
                                                <?php if ($user->j_syahriyah == 1) { ?>
                                                    Normal
                                                <?php } elseif ($user->j_syahriyah == 2) { ?>
                                                    Khusus
                                                <?php } ?>
                                            </span></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <small><a href="<?= base_url('admin/data_santri'); ?>">&laquo; back to data santri</a></small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <img src="<?= base_url('/img/' . $user->user_image); ?>" class="rounded mx-auto d-block mt-5" style="max-width: 70%;" alt="<?= $user->fullname; ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>