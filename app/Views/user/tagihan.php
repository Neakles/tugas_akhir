<?= $this->extend('layout/index'); ?>
<?= $this->section('page-content'); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Tagihan Santri</h1>
    </div>
    <p class="mb-4">Pondok Pesantren Al-Jihad Surabaya</a>.</p>
    <!-- End of Page Heading -->

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
                            <th scope="col" style="width:13%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($tagihan as $bill) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $bill->tahun; ?></td>
                                <td><?= $bill->bulan; ?></td>
                                <td>Rp <?= $bill->biaya; ?></td>
                                <td></td>
                                <td class="d-flex justify-content-center">
                                    <a href="<?= base_url('user/santri/'); ?>" class="btn btn-success"><i class="fas fa-money-bills mr-2"></i>bayar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>