<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Cetak Angsuran </title>
    <base href="<?php echo base_url(); ?>" />
    <link rel="icon" type="image/png" href="assets/images/favicon.png" />
    <style>
        table {
            border-collapse: collapse;
        }

        thead>tr {
            background-color: #0070C0;
            color: #f1f1f1;
        }

        thead>tr>th {
            background-color: #0070C0;
            color: #fff;
            padding: 10px;
            border-color: #fff;
        }

        th,
        td {
            padding: 2px;
        }

        th {
            color: #222;
        }

        body {
            font-family: Calibri;
        }
    </style>
</head>

<body onload="window.print();">

    <h4 align="center" style="margin-top:0px;"><u>BUKTI ANGSURAN</u></h4>
    <b>

    </b>
    <br>
    <h2>Data Angsuran</h2>
    <table id="datatable" class="display table table-striped table-hover">
        <thead class="center">
            <tr>
                <th>NO</th>
                <th>Bulan</th>
                <th>Tagihan</th>
                <th>Tgl Bayar</th>
                <th>Opsi</th>
                <th>Status</th>

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
                    <td><?php if ($a->status == 0) { ?>
                            Lunas
                        <?php } elseif ($a->status == 1) { ?>
                            Pending
                        <?php } else { ?>
                            Gagal
                        <?php } ?></td>

                </tr>
            <?php }
            ?>

        </tbody>
    </table>








</body>

</html>