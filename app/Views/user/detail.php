<?= $this->extend('layout/index') ?>
<?= $this->section('page-content') ?>

<div class="card-body">
    <div class="card shadow mb-4 border-bottom-success" id="infosantri" value="0">
        <!-- Card Header - Accordion -->
        <a href="#informasisantri" class="d-block bg-success border border-success card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-white">Informasi Siswa</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="informasisantri">
            <div class="card-body">
                <table class="table table-striped">
                    <tbody>
                        <?php foreach ($users as $a) { ?>
                            <tr>
                                <td>Nis </td>
                                <td>: <?php echo $a->nis; ?></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>: <span id="nm-santri"><?php echo $a->fullname; ?></span></td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="card-body">
    <div class="card shadow mb-4 border-bottom-warning" id="tagihanbulanan" value="0">
        <!-- Card Header - Accordion -->
        <a href="#tagihanbulan" class="d-block bg-warning border border-warning card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-white">Tagihan Bulanan</h6>
        </a>
        <!-- Card Content - Collapse -->

        <div class="collapse show" id="tagihanbulan">

            <div class="table-responsive">
                <div class="card-body">
                    <table class="table table-striped" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Tahun Ajaran</th>
                                <th>Jenis Pembayaran</th>
                                <th>Status Bayar</th>
                                <th>Bayar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $id = 1;
                            foreach ($pembayaran_bulanan as $u) { ?>
                                <tr>
                                    <td><?php echo $id++; ?></td>
                                    <td><?php echo $u->tahun_ajaran; ?></td>
                                    <td><?php echo $u->jenis_pembayaran; ?></td>
                                    <td>Belum Lunas</td>
                                    <td><?php echo anchor(
                                            'pembayaran/spp_bulanan/' .
                                                $u->id_pem_bulan .
                                                '/' .
                                                $u->nis,
                                            '<input type=submit class="btn btn-warning" value=\'bayar\'>'
                                        ); ?></td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>