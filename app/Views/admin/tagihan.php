<?= $this->extend('layout/index') ?>
<?= $this->section('page-content') ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Tagihan</h1>
    </div>
    <p class="mb-4">Pondok Pesantren Al-Jihad Surabaya</a>.</p>
    <!-- End of Page Heading -->

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Bulan</th>
                            <th scope="col">Tahun</th>
                            <!-- <th scope="col">Aksi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($tagihan as $bill) : ?>
                            <tr>
                                <th scope="row"><?= $i++ ?></th>
                                <td><?= $bill->bulan ?></td>
                                <td><?= $bill->tahun ?></td>
                                <!-- <td>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus_tagihan"><i class="fa-solid fa-fw fa-trash"></i></button>
                                </td> -->
                            </tr>
                        <?php endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
            <?= $this->endSection() ?>
