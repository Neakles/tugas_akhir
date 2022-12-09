<!-- Latest compiled and minified CSS -->
<?= $this->extend('layout/index') ?>
<?= $this->section('page-content') ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Detail SPP</h4>
                            </div>
                        </div>

                        <div class="card-body">
                            <!-- Modal -->
                            <div class="table-responsive">
                                <table id="datatable" class="display table table-striped table-hover">
                                    <thead class="center">
                                        <tr>
                                            <th>NO</th>
                                            <th>Bulan</th>
                                            <th>Tagihan</th>
                                            <th>Tgl Bayar</th>
                                            <th>Opsi</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="center">
                                        <?php
                                        $no = 1;
                                        foreach ($spp_bulanan as $a) { ?>

                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $a->nama_bulan ?></td>
                                                <td><?= $a->jumlah ?></td>
                                                <td><?= $a->tanggal_bayar ?></td>
                                                <td><?= $a->metode_pembayaran ?></td>
                                                <td><?= $a->status ?></td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <a href="<?= base_url(
                                                            'admin/cetak_perangsuran/' .
                                                                $a->id
                                                        ) ?>" class="btn btn-link btn-primary btn-lg"><i class="fa fa-print"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Are you sure?
                                                            </h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">Data yang dihapus tidak akan bisa
                                                            dikembalikan.</div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                            <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Tambah Pembayaran</div>
                        </div>
                         <?php foreach ($users as $u) { ?>
                        <form id="payment-form" method="post" action="<?= site_url() ?>/admin/insert_angsuran_ang">
                            <div class="card-body">
                                <div class="row">
                                <input name="nis" id="nis" class="form-control" type="text" value="<?php echo $u->nis; ?>" hidden>
                                <input name="fullname" id="fullname" class="form-control" type="text" value="<?php echo $u->fullname; ?>" hidden>
                                <input name="id_transaksi" class="form-control" type="text" value="<?php echo $id_transaksi; ?>" hidden>
                                <input name="tgl_bayar" class="form-control" type="text" value="<?php echo $tgl_bayar; ?>" hidden>
                                <input name="id_pem_bulan" class="form-control" type="text" value="<?php echo $id_pem_bulan; ?>" hidden>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <label>Bulan</label>
                                <select class="bootstrap-select strings selectpicker form-control" title="Jumlah Bulan" name="bulan[]" id="bulan" data-actions-box="true" data-virtual-scroll="false" data-live-search="true" multiple required>
                                    <?php foreach ($bln as $bulan) { ?>
                                    <option name="jumbulan" id="jumbulan" value="<?php echo $bulan->id_bulan; ?>"> <?php echo $bulan->nama_bulan; ?> </option>
                                <?php } ?>
                                </select>
                            </div>
                           
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="jumlah">Jumlah</label>
                                    

                                    <small id="emailHelp2" class="form-text text-muted"></small>
                                </div>
                            </div>
                            <input type="text" hidden class="form-control" id="metode-pembayaran" name="metode_pembayaran" value="Online" placeholder="Masukan No Angsuran">

                        </form>
                       
                        <div class="card-action">
                            <button id="pay-button" name="bayar" value="BAYAR" class="btn btn-success">Submit</button>
                            <a href="<?= base_url(
                                'admin'
                            ) ?>" class="btn btn-danger">Kembali</a>
                        </div>
                         <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                            </div>


