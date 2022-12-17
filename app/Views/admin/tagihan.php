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
        <h1 class="h3 mb-0 text-gray-800">Tagihan Santri</h1>
    </div>
    <p class="mb-4">Pondok Pesantren Al-Jihad Surabaya</a>.</p>
    <!-- End of Page Heading -->

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-end">
            <button type="button" class="btn btn-primary py-1 .col-auto mx-1" data-toggle="modal" data-target="#tambah_tagihan"><i class="fa-solid fa-fw fa-plus mr-2"></i>Tambah Tagihan</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nis</th>
                            <th scope="col">Jenis Pembayaran</th>
                            <th scope="col">Tahun</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($tagihan as $bill) : ?>
                            <tr>
                                <th scope="row"><?= $i++ ?></th>
                                <td><?= $bill->nis ?></td>
                                <td><?= $bill->jenis_pembayaran ?></td>
                                <td><?= $bill->tahun_ajaran ?></td>
                                <td>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus_tagihan"><i class="fa-solid fa-fw fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- Modal Santri -->
            <div id="tambah_tagihan" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Tagihan</h4>
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col">
                                    <form action="/admin/tambahTagihan" method="post">
                                        <?= csrf_field() ?>

                                        <div class="row justify-content-center mt-3 mb-4">
                                            <div class="col">
                                                <label for="nis" class="form-label">NIS</label>
                                                <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukkan NIS" required>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center mt-3 mb-4">
                                            <div class="col">
                                                <label for="j_pem" class="form-label">Jenis Pembayaran</label>
                                                <input type="text" class="form-control" id="j_pem" name="j_pem" placeholder="Masukkan Jenis Pembayaran" required>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center mt-3 mb-4">
                                            <div class="col">
                                                <label for="tahun" class="form-label">Tahun</label>
                                                <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Masukkan Tahun" required>
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

            <?= $this->endSection() ?>
