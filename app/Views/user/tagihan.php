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
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Kamar</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        // foreach ($users as $user_list) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td>Tri Cahyo</td>
                                <td>Laki-laki</td>
                                <td>Sunan Kalijaga</td>
                                <td class="d-flex">
                                    <a href="<?= base_url('user/santri/'); ?>" class="btn btn-success"><i class="fas fa-money-bills mr-2"></i>bayar</a>
                                </td>
                            </tr>
                        <?php // endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>