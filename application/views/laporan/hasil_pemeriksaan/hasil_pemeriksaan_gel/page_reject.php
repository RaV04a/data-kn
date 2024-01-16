<html>

<head>

    <title>Label Reject Uji Gelatin</title>
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
            /* vertical-align: top; */
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

        #tbreject .jdl {
            font-size: 9px;
            font-weight: bold;
            width: 30%;
            border-right: 0px;
            border-top: 0px;
            border-bottom: 0px;
        }

        #tbreject .hsl {
            font-size: 9px;
            border-left: 0px;
            border-top: 0px;
            border-bottom: 0px;
        }

        #tbreject .ti {
            font-size: 9px;
            width: 3%;
            text-align: center;
            border-right: 0px;
            border-left: 0px;
            border-top: 0px;
            border-bottom: 0px;
        }

        #tbreject .ttd {
            font-size: 9px;
            /* width: 3%; */
            text-align: right;
            padding-right: 3%;
            padding-top: 1%;
            border-top: 0px;
            border-left: 0px;
            border-bottom: 0px;
        }

        #tbreject .bi {
            border: 0px;
        }

        #tbreject .bi-lf {
            border-top: 0px;
            border-bottom: 0px;
            border-right: 0px;
        }

        #tbreject .bi-1 {
            border-top: 0px;
            border-right: 0px;
        }

        #tbreject .bi-2 {
            border-top: 0px;
            border-right: 0px;
            border-left: 0px;
        }

        #tbreject .bi-3 {
            font-size: 9px;
            text-align: right;
            padding-right: 3%;
            border-top: 0px;
            border-left: 0px;
        }
    </style>
</head>

<body>
    <table class="bg" id="tbreject" style="width:350px;">
        <thead>
            <tr>
                <th colspan="3" style="font-size: 12px;">
                    PT. KAPSULINDO NUSANTARA <br>
                    <span style="font-size: 8px; text-align:center;"> CICADAS - GUNUNG PUTRI</span>
                </th>
            </tr>
            <tr>
                <th colspan="3" style="font-size: 11px;">
                    LABORATORIUM QUALITY CONTROL<br>
                    <span style="font-size: 11px;">DITOLAK</span>
                </th>
            </tr>
        </thead>
        <tbody>
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
            }
            foreach ($detail as $key) {
                $tgl_msk =  explode('-', $key['tgl'])[2] . " " . bulan(explode('-', $key['tgl'])[1]) . " " . explode('-', $key['tgl'])[0];
                $tgl_reject =  explode('-', $key['tgl_reject'])[2] . " " . bulan(explode('-', $key['tgl_reject'])[1]) . " " . explode('-', $key['tgl_reject'])[0];
            ?>
                <tr>
                    <td class="jdl">Nama Bahan Baku</td>
                    <td class="ti">:</td>
                    <td class="hsl"><?= $key['nama_barang'] ?></td>
                </tr>
                <tr>
                    <td class="jdl">Pabrik / Supplier</td>
                    <td class="ti">:</td>
                    <td class="hsl"><?= $key['nama_supplier'] ?></td>
                </tr>
                <tr>
                    <td class="jdl">Tanggal Masuk</td>
                    <td class="ti">:</td>
                    <td class="hsl"><?= $tgl_msk ?></td>
                </tr>
                <tr>
                    <td class="jdl">Lot / Batch</td>
                    <td class="ti">:</td>
                    <td class="hsl"><?= $key['no_batch'] ?></td>
                </tr>
                <tr>
                    <td class="jdl">Tanggal Riject</td>
                    <td class="ti">:</td>
                    <td class="hsl"><?= $tgl_reject ?></td>
                </tr>
                <tr>
                    <td class="bi-lf"></td>
                    <td class="bi"></td>
                    <td class="ttd"><b>Kepala L.Q.C</b></td>
                </tr>
                <tr>
                    <td class="bi-lf"></td>
                    <td class="bi"></td>
                    <td class="ttd"></td>
                </tr>
                <tr>
                    <td class="bi-1"></td>
                    <td class="bi-2"></td>
                    <td class="bi-3">(....................)</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>

</html>