<?= $this->extend('layout/index'); ?>
<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <div class="row">
        <!-- Informasi Santri -->
        <div class="card-body">
            <div class="card shadow mb-4 border-bottom-primary">
                <!-- Card Header - Accordion -->
                <a href="#informasisantri" class="d-block bg-primary card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-white">Informasi Santri</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="informasisantri">
                    <div class="card-body">
                        <table class="table table-striped table-sm">
                            <tbody>
                                <tr>
                                    <h4>
                                        <th>Nama</th>
                                    </h4>
                                    <td><span>: <?= $user->fullname; ?></span></td>
                                </tr>
                                <tr>
                                    <h4>
                                        <th>Username/NIS</th>
                                    </h4>
                                    <td><span>: <?= $user->username; ?></span></td>
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tahun</th>
                            <th scope="col">Bulan</th>
                            <th scope="col">Biaya</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        // foreach ($user as $user) : 
                        ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td>2022</td>
                            <td>Januari</td>
                            <td>Rp 250.000</td>
                            <td>Belum Lunas</td>
                            <td class="d-flex">
                                <a href="<?= base_url('admin/santri/' . $user->id); ?>" class="btn btn-success"><i class="fas fa-money-bills mr-2"></i>bayar</a>
                            </td>
                        </tr>
                        <?php // endforeach; 
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>