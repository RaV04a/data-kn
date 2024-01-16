<html>

<head>

    <title>Export Laporan Barang Keluar</title>
    <style type="text/css">
        body {
            font-family: sans-serif;
        }

        table {
            width: 100%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #3c3c3c;
            padding: 3px 8px;
        }

        table td {
            vertical-align: top;
        }

        a {
            background: blue;
            color: #fff;
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
        }

        .hh tr td {
            border: 0;
            padding: 0
        }

        .hh {
            margin-bottom: 2px;
        }
    </style>
</head>

<body>
    <?php
    if ($tgl == NULL & $tgl2 == NULL) {
        $per = "";
    } else {
        $periode =  explode('-', $tgl)[2] . "/" . explode('-', $tgl)[1] . "/" . explode('-', $tgl)[0];
        $periode2 = explode('-', $tgl2)[2] . "/" . explode('-', $tgl2)[1] . "/" . explode('-', $tgl2)[0];
        $per = "Periode : " . $periode . " - " . $periode2;
    }

    ?>

    <table class="hh">
        <tr>
            <td>

            </td>
            <td style="text-align: center;padding-center: -20px;">
                <?php $src = base_url('assets/images/icon.png'); ?>
                <!-- <?= $src ?> -->
                <img style="width: 60px;height: 100px;" src="<?= $src ?>">
            </td>
            <td style="width: 460px;">
                <h2 style="line-height: 0.01; font-size: 30px;">PT KAPSULINDO NUSANTARA</h2>
                <h3 style="line-height: 0.01; font-size: 23px;">Pedagang Besar Bahan Baku Farmasi</h3>
                <p style="line-height: 0.01;font-size: 12px;">Jl. Pancasila 1 Cicadas Gunung Putrri - Kab. Bogor 16964, Indonesia</p>
                <p style="line-height: 0.01;font-size: 12px;">Tlp:(021) 8671165. Fax:(021) 8671168,86861734. Email: pbbbf@kapsulindo.co.id</p>
            </td>
            <td style="padding-center:-10px; ">
                <?php $src = base_url('assets/images/pom.jpeg'); ?>
                <!-- <?= $src ?> -->
                <img style="width: 120px;height: 100px;" src="<?= $src ?>">
            </td>
            <td>

            </td>
        </tr>
    </table>
    <hr style="line-height: 0.01;">
    <div style="text-align: center;padding-top: 5px;">
        <h3 style="float: center;line-height: 0.2;">Report Stock Out</h3>
        <p style="line-height: 0.1;font-size: 12px;"><?= $per ?></p>
    </div>

    <?php
    if (count($result) == 0) {
        echo "<center style='text-align: center;'><h3>Data Kosong</h3></center>";
        $d = "display:none;";
    } else {
    ?>



        <table style="width: 1000px;<?= $d ?>">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tanggal</th>
                    <th>No Batch</th>
                    <th>Nama Barang</th>
                    <th>Nama Customer</th>
                    <th>No Surat Jalan</th>
                    <th>No SPPB</th>
                    <th>Qty</th>
                    <!-- <th>Detail Batch</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $jml = 0;
                foreach ($result as $k) {
                    $tgl =  explode('-', $k['tgl'])[2] . "/" . explode('-', $k['tgl'])[1] . "/" . explode('-', $k['tgl'])[0];
                    $exp =  explode('-', $k['exp'])[2] . "/" . explode('-', $k['exp'])[1] . "/" . explode('-', $k['exp'])[0];
                    $jml += $k['qty'];
                ?>
                    <tr>
                        <th scope="row"><?= $no++ ?></th>
                        <td><?= $tgl ?></td>
                        <td><?= $k['no_batch'] ?></td>
                        <td><?= $k['nama_barang'] ?></td>
                        <td><?= $k['nama_customer'] ?></td>
                        <td><?= $k['no_surat_jalan'] ?></td>
                        <td><?= $k['no_sppb'] ?></td>
                        <td style="text-align: right;"><?= number_format($k['qty'], 0, ",", ".") ?>&nbsp;<?= $k['satuan'] ?></td>
                        <!-- <td style="padding: 0;">
                                                              <?php
                                                                if (isset($k['detail'])) {
                                                                ?>
                                                              <table style="margin: -1px;">
                                                                <thead>
                                                                  <tr>
                                                                    <th>No Batch</th><th>Nama Barang</th><th>Nama Supplier</th><th class="text-right">Qty</th>
                                                                  </tr>
                                                                </thead>
                                                                <tbody >
                                                                  <?php
                                                                    $dd = $k['detail'];
                                                                    foreach ($dd as $ddd) {
                                                                    ?>
                                                                    <tr>
                                                                      <td><?= $ddd['no_batch'] ?></td>
                                                                      <td><?= $ddd['nama_barang'] ?></td>
                                                                      <td><?= $ddd['nama_suplier'] ?></td>
                                                                      <td class="text-right"><?= $ddd['qty'] ?>&nbsp;<?= $ddd['satuan'] ?></td>
                                                                    </tr>
                                                                  <?php
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                              </table>
                                                              <?php }

                                                                ?>
                                                            </td> -->
                    </tr>
                <?php
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="7" class="center">Jumlah</th>
                    <th style="text-align: right;"><?= $jml ?>&nbsp;<?= $k['satuan'] ?></th>
                </tr>
            </tfoot>
        </table>
    <?php
    }
    ?>
</body>

</html>