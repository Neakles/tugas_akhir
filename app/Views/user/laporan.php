<?= $this->extend('layout/index') ?>
<?= $this->section('page-content') ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tabel <?= $title ?></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="container">
                <link rel="stylesheet" href="<?php echo base_url(
                    'assets/vendor/jquery/jquery-ui.min.css'
                ); ?>" />
                <script src="<?php echo base_url(
                    'assets/vendor/jquery/jquery.min.js'
                ); ?>"></script> <!-- Load file jquery -->
                <form method="get" action="" class="form">
                    <div class="form-group">
                        <label>Filter Berdasarkan</label>
                        <select class="form-control" name="filter" id="filter" style="width: 50%">
                            <option value="">Pilih</option>
                            <option value="1">Per Tanggal</option>
                            <option value="2">Per Santri</option>
                            <option value="3">Per Tahun Ajaran</option>
                        </select>
                    </div>
                    <div class="form-group" id="form-tanggal">
                        <label>Dari Tanggal</label>
                        <input type="date" name="tanggal" class="form-control input-tanggal" style="width: 50%" />
                    </div>
                    <div class="form-group" id="form-tanggal2">
                        <label>Sampai Tanggal</label>
                        <input type="date" name="tanggal2" class="form-control input-tanggal2" style="width: 50%" />
                    </div>
                    <div class="form-group" id="form-nis">
                        <label>NIS/Nama Santri</label>
                        <select name="nis" class="form-control" style="width: 50%">
                            <option value="">Pilih</option>
                            <?php foreach ($nis as $data) {
                                // Ambil data tahun dari model yang dikirim dari controller
                                echo '<option value="' .
                                    $data->nis .
                                    '">' .
                                    $data->nis .
                                    ' | ' .
                                    $data->fullname .
                                    '</option>';
                            } ?>
                        </select>
                    </div>
                    <div class="form-group" id="form-tahun">
                        <label>Tahun Ajaran</label>
                        <select name="tahun" class="form-control" style="width: 50%">
                            <option value="">Pilih</option>
                            <?php foreach ($tahun as $data) {
                                // Ambil data tahun dari model yang dikirim dari controller
                                echo '<option value="' .
                                    $data->id_tahun .
                                    '">' .
                                    $data->tahun_ajaran .
                                    '</option>';
                            } ?>
                        </select>
                    </div>
                    <button class="btn btn-primary" type="submit">Tampilkan</button>
                    <a href="<?php echo base_url() .
                        'laporan/laporan_spp'; ?>">Reset Filter</a>
                </form>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo $ket; ?></h6>
        </div>
        <div class="card-body">
            <a href="<?php echo $url_cetak; ?>" class=" btn btn-danger mb-3"><i class="fas fa-file-pdf"></i>CETAK PDF</a>
            <!-- <a href="<?php echo $url_cetak; ?> class=" btn btn-danger mb-4"><i class="fas fa-file-pdf"></i> Download pdf</a> -->
            <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead style="text-align: center">
                        <tr>
                            <th style="text-align: center;">NO</th>
                            <th style="text-align: center;">ID Transaksi</th>
                            <th style="text-align: center;">NIS</th>
                            <th style="text-align: center;">Nama</th>
                            <th style="text-align: center;">Bulan</th>
                            <th style="text-align: center;">Tanggal Bayar</th>
                            <th style="text-align: center;">Besar SPP</th>
                            <th style="text-align: center;">Metode Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($spp_bulanan)) {
                            $no = 1;
                            foreach ($spp_bulanan as $data) { ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $no++; ?></td>
                                    <td style="text-align: center;"><?php echo $data->id_transaksi; ?></td>
                                    <td style="text-align: center;"><?php echo $data->nis; ?></td>
                                    <td style="text-align: center;"><?php echo $data->nama_santri; ?></td>
                                    <?php if ($data->id_bulan <= 12) {
                                        $tahun = substr(
                                            $data->tahun_ajaran,
                                            0,
                                            4
                                        );
                                    } else {
                                        $tahun = substr(
                                            $data->tahun_ajaran,
                                            0,
                                            4
                                        );
                                    } ?>
                                    <td style="text-align: center;"><?php echo $data->nama_bulan .
                                        ' ' .
                                        $tahun; ?></td>
                                    <td style="text-align: center;"><?php echo date(
                                        'd-m-Y',
                                        strtotime($data->tanggal_bayar)
                                    ); ?></td>
                                    <td style="text-align: center;"><?php echo 'Rp. ' .
                                        number_format(
                                            $data->besar_spp,
                                            0,
                                            ',',
                                            '.'
                                        ); ?></td>
                                    <td style="text-align: center;"><?php echo $data->metode_pembayaran; ?></td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                    <script src="<?php echo base_url(
                        'assets/vendor/jquery/jquery-ui.min.js'
                    ); ?>"></script> <!-- Load file plugin js jquery-ui -->
                    <script>
                        $(document).ready(function() { // Ketika halaman selesai di load
                            $('#form-tanggal, #form-tanggal2, #form-nis, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya
                            $('#filter').change(function() { // Ketika user memilih filter
                                if ($(this).val() == '1') { // Jika filter nya 1 (per tanggal)
                                    $('#form-nis, #form-tahun').hide();
                                    $('#form-tanggal').show(); // Tampilkan form tanggal
                                    $('#form-tanggal2').show(); // Tampilkan form tanggal
                                } else if ($(this).val() == '2') { // Jika filter nya 2 (per bulan)
                                    $('#form-tanggal, #form-tanggal2, #form-bulan, #form-tahun').hide();
                                    $('#form-nis').show(); // Tampilkan form bulan dan tahun
                                } else if ($(this).val() == '3') { // Jika filter nya 2 (per bulan)
                                    $('#form-tanggal, #form-tanggal2, #form-nis').hide();
                                    $('#form-tahun').show(); // Tampilkan form bulan dan tahun
                                } else { // Jika filternya 3 (per tahun)
                                    $('#form-tanggal, #form-tanggal2, #form-nis, #form-tahun').hide();
                                }
                                $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
                            })
                        })
                    </script>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<!-- /.container-fluid -->