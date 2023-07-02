<?= $this->extend('layout/index') ?>
<?= $this->section('page-content') ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="col-xl col-md-6 mb-4">
        <div class="card border-bottom-success shadow mb-4">
            <div class="card-body">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h1 class="h3 mb-0 text-gray-800">Syahriyah</h1>
                </div>
                <p class="">Pondok Pesantren Al-Jihad Surabaya</a>.</p>
            </div>
        </div>
    </div>
    <!-- End of Page Heading -->

    <div class="col-xl col-md-6 mb-4">
        <div class="card border-left-success shadow py-2">
            <div class="card-body">
                <div class="col mr-2">
                    <div class="text-s font-weight-bold text-success mb-1">NIS</div>
                        <td><span>: <?= user()->nis; ?></span></td>
                    <div class="text-s font-weight-bold text-success mb-1">Nama</div>
                        <td><span>: <?= user()->fullname; ?></span></td>
                    <div class="text-s font-weight-bold text-success mb-1">Kamar</div>
                        <td><span>: <?= user()->kamar; ?></span></td>
                    <div class="text-s font-weight-bold text-success mb-1">Jenis Syahriyah</div>
                        <td><span>: <?= user()->j_syahriyah; ?></span></td>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header flex">
            <form id="proses" method="post" action="<?= site_url()?>user/prosesPembayaran" > 
                <div class="row">
                    <div class="col-xl-3 mb-2 mt-3 text-center">
                        <td scope="row">Syahriyah yang belum dibayar :</td>
                    </div>
                    <div class="col-xl-2 mb-2 mt-2 text-center">
                        <input name="totalBulan" id="totalBulan" class="form-control text-center" type="text" value="<?= $bulan;?>" readonly>
                    </div>
                    <div class="col-xl-2 mb-2 mt-2 text-center">
                        <input name="totalNominal" id="totalNominal" class="form-control text-center" type="text" value="<?= $nominal;?>" readonly>
                    </div>
                    <div class="col-xl-3 mb-2 mt-2 text-center">
                        <div class="card-action">
                            <button type="button" id="pay-button" name="bayar" value="BAYAR" class="btn btn-success">Bayar</button>
                        </div>
                    </div>
                    <input type="hidden" name="result_type" id="result-type" value="">
                    <input type="hidden" name="result_data" id="result-data" value="">
                </div>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Bulan</th>
                            <th scope="col">Tahun</th>
                            <th scope="col">Nominal</th>
                            <th scope="col">Tanggal Bayar</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach($pembayaran as $val) : ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $val->bulan; ?></td>
                            <td><?= $val->tahun; ?></td>
                            <td><?= $val->nominal_format ?></td>
                            <td><?= $val->tanggal_bayar ?></td>
                            <td> 
                                <?php if ($val->status == 0) { ?>
                                    Belum Dibayar
                                <?php } elseif ($val->status == 1) { ?>
                                    Pending
                                <?php } elseif ($val->status == 2) { ?>
                                    Lunas
                                <?php } elseif ($val->status == 3) { ?>
                                    Error
                                <?php } ?>
                            </td>
                        </tr>
                        <?php endforeach;  ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- ajax for button pembayaran -->
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-D2FxyeuTkS3Fgqjx"></script>
<script type="text/javascript">
    $("#pay-button").click(function(e) {
        e.preventDefault();
        $(this).attr("disabled", "disabled");

        var fullname = $('#fullname').val();
        var total_nominal = $('#totalNominal').val();
        var total_bulan = $('#totalBulan').val();
        
        $.ajax({
            method: "POST",
            url: '<?= site_url() ?>/snap/token',
            cache: false,
            data: {
                fullname: fullname,
                total_nominal: total_nominal,
                total_bulan: total_bulan,
            },
            success: function(data) {
                console.log('token = ' + data);
                var resultType = document.getElementById('result-type');
                var resultData = document.getElementById('result-data');

                function changeResult(type, data) {
                    $("#result-type").val(type);
                    $("#result-data").val(JSON.stringify(data));
                }
                snap.pay(data, {
                    onSuccess: function(result) {
                        changeResult('success', result);
                        console.log(result.status_message);
                        console.log(result);
                        $("#proses").submit();
                    },
                    onPending: function(result) {
                        changeResult('pending', result);
                        console.log(result.status_message);
                        $("#proses").submit();
                    },
                    onError: function(result) {
                        changeResult('error', result);
                        console.log(result.status_message);
                        $("#proses").submit();
                    }
                });
            }
        });
    });
</script>
<?= $this->endSection() ?>