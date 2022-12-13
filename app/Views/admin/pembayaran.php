<?= $this->extend('layout/index') ?>
<?= $this->section('page-content') ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Pembayaran </h1>
    </div>
    <p class="mb-4">Pondok Pesantren Al-Jihad Surabaya</a>.</p>
    <!-- End of Page Heading -->

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-end">
            <!-- <button type="button" class="btn btn-primary py-1 .col-auto mx-1" data-toggle="modal" data-target="#tambah_tagihan"><i class="fa-solid fa-fw fa-plus mr-2"></i>Tambah Tagihan</button> -->
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nis</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        // foreach ($users as $a) : ?>
                            <tr>
                            <?php // dd($users); ?>
                                <th scope="row"><?= $i++ ?></th>
                                <td><?= $users->nis ?></td>
                                <td><?= $users->fullname ?></td>
                                <td><?php echo anchor(
                                        'pembayaran/detail/' . $users->nis,
                                        '<input type=reset class="btn btn-info" value=\'Detail\'>'
                                    ); ?></td>
                            </tr>
                        <?php //endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>