<html>

<head>

    <title>Print Schedule Marketing</title>
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
        }

        table td {
            /* vertical-align: top; */
        }

        a {
            background: blue;
            color: #fff;
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
        }

        table #jj {
            margin-left: 20% auto;
        }

        table #hh {
            margin-left: 20% auto;
        }

        .periode {
            text-align: center;
            font-size: 13px;
            line-height: 0.1;
        }

        #jj th {
            border: 0px;
            font-size: 15px;
            padding-bottom: 15px;
        }

        #jj td {
            border: 0px;
        }

        #jj .jdl {
            font-size: 11px;
            /* padding-right: 0; */
            width: 35%;
        }

        #jj .hsl {
            font-size: 11px;
            /* padding-right: 0; */
        }

        #jj .ti {
            font-size: 11px;
            width: 3%;
        }

        #hh .tgl {
            text-align: left;
            font-size: 12px;
            font-weight: bold;
            padding-left: 5%;
            border: 0px;
        }

        #hh .no {
            text-align: center;
            font-size: 10px;
            font-weight: bold;
            color: darkblue;
            background-color: lightsalmon;
        }

        #hh .jdl {
            text-align: center;
            font-size: 10px;
            font-weight: bold;
            color: darkblue;
            background-color: lightsalmon;
        }

        #hh .cus {
            text-align: left;
            font-size: 9px;
            font-weight: bold;
            padding-left: 3px;
        }

        #hh .teks {
            text-align: center;
            font-size: 9px;
            font-weight: bold;
        }

        #hh .note {
            text-align: center;
            font-size: 11px;
            font-weight: bold;
            color: red;
        }

        #hh .bi-bt {
            font-size: 11px;
            border-top: 0px;
            border-left: 0px;
            border-right: 0px;
        }

        #hh .bi {
            color: white;
            font-size: 11px;
            border-top: 0px;
            border-bottom: 0px;
            border-left: 0px;
            border-right: 0px;
        }

        #hh .mesin {
            text-align: center;
            font-weight: bold;
            font-size: 11px;
            border-top: 0px;
            border-bottom: 0px;
            border-left: 0px;
            border-right: 0px;
        }
    </style>
</head>

<body>

    <?php
    function bulan($bulan)
    {
        if ($bulan == '01') {
            return "Januari";
        } elseif ($bulan == '02') {
            return "Februari";
        } elseif ($bulan == '03') {
            return "Maret";
        } elseif ($bulan == '04') {
            return "April";
        } elseif ($bulan == '05') {
            return "Mei";
        } elseif ($bulan == '06') {
            return "Juni";
        } elseif ($bulan == '07') {
            return "Juli";
        } elseif ($bulan == '08') {
            return "Agustus";
        } elseif ($bulan == '09') {
            return "September";
        } elseif ($bulan == '10') {
            return "Oktober";
        } elseif ($bulan == '11') {
            return "November";
        } elseif ($bulan == '12') {
            return "Desember";
        } else {
            return "No Month";
        }
    } ?>
    <?php
    if ($tgl == null & $tgl2 == null) {
        $per = "";
    } else {
        $new_tgl = explode('-', $tgl)[2] . " " . bulan(explode('-', $tgl)[1]) . " " . explode('-', $tgl)[0];
        $new_tgl2 = explode('-', $tgl2)[2] . " " . bulan(explode('-', $tgl2)[1]) . " " . explode('-', $tgl2)[0];
        $per = "Periode : " . $new_tgl . " - " . $new_tgl2;
    }

    ?>
    <div style="text-align: center;padding-top: 5px;">
        <h3 style="float: center;line-height: 0.2;">SCHEDULE</h3>
        <p class="periode"><?= $per ?></p>
    </div>
    <!-- Tabel Hasil -->
    <table id="hh">
        <tr>
            <td class="bi" style="width: 3%;"></td>
            <td class="no" style="width: 2%;">NO</td>
            <td class="jdl" style="width: 15%;">NAMA CUSTOMER</td>
            <td class="jdl" style="width: 4%;">SIZE</td>
            <td class="jdl" style="width: 7%;">KODE</td>
            <td class="jdl" style="width: 12%;">WARNA</td>
            <td class="jdl" style="width: 12%;">PRINT</td>
            <td class="jdl" style="width: 2%;">TIN</td>
            <td class="jdl" style="width: 5%;">JENIS</td>
            <td class="jdl" style="width: 4%;">JML</td>
            <td class="jdl" style="width: 4%;">SISA</td>
            <td class="jdl" style="width: 7%;">TGL SCH</td>
            <td class="jdl" style="width: 4%;">CR</td>
            <td class="jdl" style="width: 6%;">DELIVERY</td>
            <td class="jdl" style="width: 2%;"></td>
            <td class="jdl" style="width: 6%;">KEMASAN</td>
            <td class="jdl" style="width: 6%;">NO BATCH</td>
        </tr>

        <!-- Mesin A -->
        <?php
        $mesins = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I');
        foreach ($mesins as $mesin) {
            $no = 1;
            $detail_per_mesin = array_filter($detail, function ($k) use ($detail, $mesin) {
                return $detail[$k]['mesin'] === $mesin;
            }, ARRAY_FILTER_USE_KEY);

            if (count($detail_per_mesin) === 0) {
        ?>
                <tr>
                    <td class="mesin"><?= $mesin ?></td>
                    <?php if ($mesin === "A") { ?>
                        <td class="note" colspan="16">NOTE : MC. A STOP OPERASIONAL</td>
                    <?php } ?>
                    <?php if ($mesin === "B") { ?>
                        <td class="note" colspan="16">NOTE : MC. B STOP OPERASIONAL</td>
                    <?php } ?>
                    <?php if ($mesin === "C") { ?>
                        <td class="note" colspan="16">NOTE : MC. C STOP OPERASIONAL</td>
                    <?php } ?>
                    <?php if ($mesin === "D") { ?>
                        <td class="note" colspan="16">NOTE : MC. D STOP OPERASIONAL</td>
                    <?php } ?>
                    <?php if ($mesin === "E") { ?>
                        <td class="note" colspan="16">NOTE : MC. E STOP OPERASIONAL</td>
                    <?php } ?>
                    <?php if ($mesin === "F") { ?>
                        <td class="note" colspan="16">NOTE : MC. F STOP OPERASIONAL</td>
                    <?php } ?>
                    <?php if ($mesin === "G") { ?>
                        <td class="note" colspan="16">NOTE : MC. G STOP OPERASIONAL</td>
                    <?php } ?>
                    <?php if ($mesin === "H") { ?>
                        <td class="note" colspan="16">NOTE : MC. H STOP OPERASIONAL</td>
                    <?php } ?>
                    <?php if ($mesin === "I") { ?>
                        <td class="note" colspan="16">NOTE : MC. I STOP OPERASIONAL</td>
                    <?php } ?>
                </tr>
            <?php
            }

            foreach ($detail_per_mesin as $k) {
                $tgl_sch = explode('-', $k['tgl_sch'])[2] . "-" . explode('-', $k['tgl_sch'])[1] . "-" . explode('-', $k['tgl_sch'])[0];
                $tgl_kirim = explode('-', $k['tgl_kirim'])[2] . "-" . explode('-', $k['tgl_kirim'])[1] . "-" . explode('-', $k['tgl_kirim'])[0];
            ?>
                <tr>
                    <?php if ($no <= 1) { ?>
                        <td class="mesin"><?= $k['mesin'] ?></td>
                    <?php } else { ?>
                        <td class="mesin"></td>
                    <?php } ?>
                    <td class="teks"><?= $no++ ?></td>
                    <td class="cus"><?= $k['nama_customer'] ?></td>
                    <td class="teks"><?= $k['size'] ?></td>
                    <td class="teks"><?= $k['kode_warna_cap'] ?>-<?= $k['kode_warna_body'] ?></td>
                    <td class="teks"><?= $k['warna_cap'] ?>-<?= $k['warna_body'] ?></td>
                    <td class="teks"><?= $k['print'] ?></td>
                    <td class="teks"><?= $k['tinta'] ?></td>
                    <td class="teks"></td>
                    <td class="teks"><?= $k['jumlah'] ?></td>
                    <td class="teks"><?= $k['sisa'] ?></td>
                    <td class="teks"><?= $tgl_sch ?></td>
                    <td class="teks"><?= $k['no_cr'] ?></td>
                    <td class="teks"><?= $tgl_kirim ?></td>
                    <td class="teks"><?= $k['jenis_box'] ?></td>
                    <td class="teks"><?= $k['jenis_zak'] ?></td>
                    <td class="teks"><?= $k['no_batch'] ?></td>
                </tr>
            <?php } ?>
            <tr>
                <td class="bi" style="height: 15px"></td>
            </tr>
        <?php }
        ?>
    </table>
</body>

</html>