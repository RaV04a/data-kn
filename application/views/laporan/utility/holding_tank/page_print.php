<html>

<head>

    <title>History Mesin Holding Tank</title>
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

        .jj tr td {
            border: 0;
            padding: 0
        }

        .judul {
            font-size: 13px;
            font-weight: bold;
            text-align: center;
        }

        .no {
            font-size: 13px;
            font-weight: bold;
            text-align: center;
        }

        .hasil {
            font-size: 12px;
            text-align: left;
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
        $periode =  explode('/', $tgl)[0] . " " . bulan(explode('/', $tgl)[1]) . " " . explode('/', $tgl)[2];
        $periode2 =  explode('/', $tgl2)[0] . " " . bulan(explode('/', $tgl2)[1]) . " " . explode('/', $tgl2)[2];
        $per = "Periode : " . $periode . " - " . $periode2;
    }

    ?>
    <table class="jj">
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
            <td>
                <?php $src = base_url('assets/images/pom.jpeg'); ?>
                <!-- <?= $src ?> -->
                <img style="width: 120px;height: 100px;" src="<?= $src ?>">
            </td>

            </td>]
        </tr>
    </table>
    <hr style="line-height: 0.01;">
    <div style="text-align: center;padding-top: 5px;">
        <h3 style="float: center;line-height: 0.2;">HISTORY MESIN HOLDING TANK</h3>
        <p style="line-height: 0.1;font-size: 13px;"><?= $per ?></p>
    </div>

    <table id="hm">
        <thead>
            <tr>
                <td class="no">No</td>
                <td class="judul">Tanggal</td>
                <td class="judul">Nama Mesin</td>
                <td class="judul">Jenis Mesin</td>
                <td class="judul">Masalah</td>
                <td class="judul">Penyebab</td>
                <td class="judul">Tindakan</td>
                <td class="judul">Pelaksana</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($detail as $key) {
                $tgl =  explode('-', $key['tgl'])[2] . " " . bulan(explode('-', $key['tgl'])[1]) . " " . explode('-', $key['tgl'])[0]; ?>
                <tr>
                    <td class="no" style="width: 4%;"><?= $no++ ?></td>
                    <td class="hasil"><?= $tgl ?></td>
                    <td class="hasil"><?= $key['nama_mesin'] ?></td>
                    <td class="hasil"><?= $key['jenis_mesin'] ?></td>
                    <td class="hasil"><?= $key['masalah'] ?></td>
                    <td class="hasil"><?= $key['penyebab'] ?></td>
                    <td class="hasil"><?= $key['tindakan'] ?></td>
                    <td class="hasil"><?= $key['nama_operator'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>

</html>