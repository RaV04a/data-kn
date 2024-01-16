<html>

<head>

    <title>Hasil Data Pemeriksaan Gelatin</title>
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

        #judul .atas {
            font-size: 11px;
            vertical-align: top;
        }

        #judul .bawah {
            font-size: 11px;
            vertical-align: bottom;
        }

        #judul .bi {
            border: 0px;
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

        #hh .jdl {
            text-align: center;
            font-size: 13px;
            font-weight: bold;
        }

        #hh .namapmr {
            font-size: 11px;
            /* vertical-align: top; */
        }

        #hh .hsl {
            text-align: center;
            font-size: 11px;
        }

        #hh .teks {
            text-align: left;
            font-size: 11px;
            border: 0px;
        }

        #hh .ttd {
            text-align: center;
            vertical-align: top;
            font-size: 11px;
            border: 0px;
        }

        #hh .bi-bt {
            font-size: 11px;
            border-top: 0px;
            border-left: 0px;
            border-right: 0px;
        }

        #hh .ket {
            font-size: 11px;
            vertical-align: bottom;
            border: 0px;
            padding-left: 2%;
        }

        #hh .ket-hsl {
            font-size: 11px;
            vertical-align: bottom;
            border: 0px;
        }
    </style>
</head>

<body>
    <table id="judul">
        <tr>
            <td class="bi" rowspan="3" style="text-align:left; width:60%;">
                <?php $src = base_url('assets/images/knlogo.png'); ?>
                <img style="width:30%;" src="<?= $src ?>">
            </td>
            <td height="10" class="bawah">
                Form – QCA – 01 / R2
            </td>
        </tr>
        <tr>
            <td height="10" class="atas">
                Mulai Berlaku : 01 November 2019
            </td>
        </tr>
        <tr>
            <td class="bi">
            </td>
        </tr>
    </table>
    <table style="width:80%;" id="jj">
        <thead>
            <tr>
                <th colspan="3">
                    DATA PEMERIKSAAN GELATIN<br>
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
            foreach ($detail as $key) { ?>
                <tr>
                    <?php if ($key['status'] === "Released") {
                        $tgl_rilis =  explode('-', $key['tgl_rilis'])[2] . " " . bulan(explode('-', $key['tgl_rilis'])[1]) . " " . explode('-', $key['tgl_rilis'])[0];
                    ?>
                        <td class="jdl">Tanggal Released</td>
                        <td class="ti">:</td>
                        <td class="hsl"><?= $tgl_rilis ?></td>
                    <?php } ?>
                    <?php if ($key['status'] === "Di Tolak") {
                        $tgl_reject =  explode('-', $key['tgl_reject'])[2] . " " . bulan(explode('-', $key['tgl_reject'])[1]) . " " . explode('-', $key['tgl_reject'])[0];
                    ?>
                        <td class="jdl">Tanggal Reject</td>
                        <td class="ti">:</td>
                        <td class="hsl"><?= $tgl_reject ?></td>
                    <?php } ?>
                </tr>
                <tr>
                    <td class="jdl">Nama Bahan Baku</td>
                    <td class="ti">:</td>
                    <td class="hsl"><?= $key['nama_barang'] ?></td>
                </tr>
                <tr>
                    <td class="jdl">Supplier</td>
                    <td class="ti">:</td>
                    <td class="hsl"><?= $key['nama_supplier'] ?></td>
                </tr>
                <tr>
                    <td class="jdl">Nama Produsen/Negara</td>
                    <td class="ti">:</td>
                    <td class="hsl"><?= $key['nama_produsen'] ?> / <?= $key['negara_produsen'] ?></td>
                </tr>
                <tr>
                    <td class="jdl">No. Batch/Lot</td>
                    <td class="ti">:</td>
                    <td class="hsl"><?= $key['no_batch'] ?></td>
                </tr>
                <tr>
                    <td class="jdl">No. Analisa</td>
                    <td class="ti">:</td>
                    <td class="hsl"><?= $key['no_analis'] ?></td>
                </tr>
                <tr>
                    <td class="jdl">Jenis Gelatin</td>
                    <td class="ti">:</td>
                    <td class="hsl"><?= $key['jenis_gel'] ?></td>
                </tr>
                <tr>
                    <td class="jdl">Total</td>
                    <td class="ti">:</td>
                    <td class="hsl"><?= $key['qty'] ?> <?= $key['satuan'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- Tabel Hasil -->
    <?php
    $no = 1;
    ?>
    <table style="width:100%;" id="hh">
        <?php foreach ($detail as $key) { ?>
            <tr>
                <td class="jdl" style="width: 10%;">No.</td>
                <td class="jdl" style="width: 25%;">Pemeriksaan</td>
                <td class="jdl" style="width: 8%;">Unit</td>
                <td class="jdl" style="width: 10%;">Hasil</td>
                <td class="jdl">Persyaratan</td>
            </tr>
            <tr>
                <td class="hsl"><?= $no++ ?></td>
                <td class="namapmr">Pemerian</td>
                <td></td>
                <td class="hsl"><?= $key['pemerian'] ?></td>
                <td class="namapmr">Lembaran, kepingan atau potongan, atau serbuk kasar sampai halus, kuning lemah atau coklat terang, warna bervariasi tergantung ukuran partikel. Larutannya berbau lemah seperti kaldu. Jika kering stabil di udara, tetapi mudah terurai oleh mikroba jika lembab atau dalam bentuk larutan.</td>
            </tr>
            <tr>
                <td class="hsl"><?= $no++ ?></td>
                <td class="namapmr">Kelarutan</td>
                <td></td>
                <td class="hsl"><?= $key['kelarutan'] ?></td>
                <td class="namapmr">Tidak larut dalam air dingin, mengembang dan lunak bila dicelup dalam air, menyerap air secara bertahap sebanyak 5-10 kali beratnya; larut dalam air panas, dalam asam asetat 6N dan dalam campuran panas gliserin dan dalam air, tidak larut dalam etanol, dalam kloroform, dalam eter, dalam minyak lemak dan dalam minyak menguap.</td>
            </tr>
            <tr>
                <td class="hsl"><?= $no++ ?></td>
                <td class="namapmr">Identifikasi</td>
                <td></td>
                <td class="hsl"><?= $key['identifikasi'] ?></td>
                <td class="namapmr">a. Terbentuk endapan kuning dengan trinitro fenol LP atau larutan kalium dikromat P ( 1 : 15).
                    <br>b. Terjadi kekeruhan dengan penambahan asam tanat LP
                </td>
            </tr>
            <tr>
                <td class="hsl"><?= $no++ ?></td>
                <td class="namapmr">Bau dan Zat Tak Larut dalam Air</td>
                <td></td>
                <td class="hsl"><?= $key['bauzat_tl_air'] ?></td>
                <td class="namapmr">Larutan (1 dalam 40): tidak tercium bau tidak enak dan larutan setebal 2 cm hanya menunjukkan sedikit opalesensi.</td>
            </tr>
            <tr>
                <td class="hsl"><?= $no++ ?></td>
                <td class="namapmr">Transmittance Larutan 1% pada λ 510nm</td>
                <td class="hsl">%</td>
                <td class="hsl"><?= $key['bauzat_tl_air'] ?></td>
                <td class="namapmr">80 – 100 %</td>
            </tr>
            <tr>
                <td class="hsl"><?= $no++ ?></td>
                <td class="namapmr">Susut Pengeringan</td>
                <td class="hsl">%</td>
                <td class="hsl"><?= $key['s_pengeringan'] ?></td>
                <td class="namapmr">Tidak lebih dari 15 %</td>
            </tr>
            <tr>
                <td class="hsl"><?= $no++ ?></td>
                <td class="namapmr">Bloom Strength</td>
                <td class="hsl">g</td>
                <td class="hsl"><?= $key['bloom_st'] ?></td>
                <td class="namapmr">Tidak kurang dari 180 gr</td>
            </tr>
            <tr>
                <td class="hsl"><?= $no++ ?></td>
                <td class="namapmr">Viscositas 30%</td>
                <td class="hsl">cPs</td>
                <td class="hsl"><?= $key['viscost'] ?></td>
                <td class="namapmr">400 – 1200 cPs</td>
            </tr>
            <tr>
                <td class="hsl"><?= $no++ ?></td>
                <td class="namapmr">Viscositas Breakdown</td>
                <td class="hsl">%</td>
                <td class="hsl"><?= $key['viscost_bd'] ?></td>
                <td class="namapmr">Tidak lebih dari 0,5 % per jam</td>
            </tr>
            <tr>
                <td class="hsl"><?= $no++ ?></td>
                <td class="namapmr">pH</td>
                <td class="hsl"></td>
                <td class="hsl"><?= $key['ph'] ?></td>
                <td class="namapmr">3.80-7.60 pada suhu 55 °C</td>
            </tr>
            <tr>
                <td class="hsl"><?= $no++ ?></td>
                <td class="namapmr">Titik Isoelektrik</td>
                <td class="hsl">pH</td>
                <td class="hsl"><?= $key['t_isl'] ?></td>
                <td class="namapmr">4,70 – 5,20</td>
            </tr>
            <tr>
                <td class="hsl"><?= $no++ ?></td>
                <td class="namapmr">Setting Point</td>
                <td class="hsl">°C</td>
                <td class="hsl"><?= $key['sett_point'] ?></td>
                <td class="namapmr">24,0 – 27,0 °C</td>
            </tr>
            <tr>
                <td class="hsl"><?= $no++ ?></td>
                <td class="namapmr">Keasaman</td>
                <td class="hsl">%</td>
                <td class="hsl"><?= $key['keasaman'] ?></td>
                <td class="namapmr">Tidak lebih dari 0,6 % sebagai HCl</td>
            </tr>
            <tr>
                <td class="hsl"><?= $no++ ?></td>
                <td class="namapmr">Sulfur Dioksida</td>
                <td class="hsl">ppm</td>
                <td class="hsl"><?= $key['sulfur_do'] ?></td>
                <td class="namapmr">Tidak lebih dari 150 ppm</td>
            </tr>
            <tr>
                <td class="hsl"><?= $no++ ?></td>
                <td class="namapmr">Sisa Pemijaran</td>
                <td class="hsl">%</td>
                <td class="hsl"><?= $key['sisa_pmj'] ?></td>
                <td class="namapmr">Tidak lebih dari 2.0 %</td>
            </tr>
            <tr>
                <td class="hsl"><?= $no++ ?></td>
                <td class="namapmr">Ukuran Partikel Mesh 4</td>
                <td class="hsl">%</td>
                <td class="hsl"><?= $key['uk_part_mesh4'] ?></td>
                <td class="namapmr">100 % melewati mesh 4</td>
            </tr>
            <tr>
                <td class="hsl"><?= $no++ ?></td>
                <td class="namapmr">Ukuran Partikel Mesh 40</td>
                <td class="hsl">%</td>
                <td class="hsl"><?= $key['uk_part_mesh40'] ?></td>
                <td class="namapmr">Tidak lebih dari 0,5% melewati mesh 40</td>
            </tr>
            <tr>
                <td class="hsl"><?= $no++ ?></td>
                <td class="namapmr">Konduktivitas</td>
                <td class="hsl">mS.cm 1</td>
                <td class="hsl"><?= $key['kndtv'] ?></td>
                <td class="namapmr">Tidak lebih dari 1 mS.cm-1 pada suhu 30˚C ±1.0˚C</td>
            </tr>
            <tr>
                <td class="hsl"><?= $no++ ?></td>
                <td class="namapmr">Arsen (As) *)</td>
                <td class="hsl">ppm</td>
                <td class="hsl"><?= $key['arsen'] ?></td>
                <td class="namapmr">Tidak lebih dari 0,8 ppm</td>
            </tr>
            <tr>
                <td class="hsl"><?= $no++ ?></td>
                <td class="namapmr">Timbal (Pb) *)</td>
                <td class="hsl">ppm</td>
                <td class="hsl"><?= $key['timbal'] ?></td>
                <td class="namapmr">Tidak lebih dari 50 ppm</td>
            </tr>
            <tr>
                <td class="hsl"><?= $no++ ?></td>
                <td class="namapmr">Peroksida *)</td>
                <td class="hsl">ppm</td>
                <td class="hsl"><?= $key['peroksida'] ?></td>
                <td class="namapmr">Tidak lebih dari 10 ppm</td>
            </tr>
            <tr>
                <td class="hsl"><?= $no++ ?></td>
                <td class="namapmr">Besi *)</td>
                <td class="hsl">ppm</td>
                <td class="hsl"><?= $key['besi'] ?></td>
                <td class="namapmr">Tidak lebih dari 30 ppm</td>
            </tr>
            <tr>
                <td class="hsl"><?= $no++ ?></td>
                <td class="namapmr">Cromium *)</td>
                <td class="hsl">ppm</td>
                <td class="hsl"><?= $key['cromium'] ?></td>
                <td class="namapmr">Tidak lebih dari 10 ppm</td>
            </tr>
            <tr>
                <td class="hsl"><?= $no++ ?></td>
                <td class="namapmr">Zinc *)</td>
                <td class="hsl">ppm</td>
                <td class="hsl"><?= $key['zinc'] ?></td>
                <td class="namapmr">Tidak lebih dari 30 ppm</td>
            </tr>
            <tr>
                <td class="hsl"><?= $no++ ?></td>
                <td class="namapmr">Cemaran DNA Babi/Porcine *)</td>
                <td class="hsl"></td>
                <td class="hsl"><?= $key['cm_dna_babi'] ?></td>
                <td class="namapmr">Negatif</td>
            </tr>
            <tr>
                <td class="hsl"><?= $no++ ?></td>
                <td class="namapmr">Mikrobiologi *)</td>
                <td class="hsl"></td>
                <td class="hsl"></td>
                <td class="namapmr"></td>
            </tr>
            <tr>
                <td class="hsl"></td>
                <td class="namapmr">a. Total Bakteri</td>
                <td class="hsl">cfu/g</td>
                <td class="hsl"><?= $key['m_tb'] ?></td>
                <td class="namapmr">Kurang dari 1000 cfu/g</td>
            </tr>
            <tr>
                <td class="hsl"></td>
                <td class="namapmr">b. Angka Kapang dan Khamir</td>
                <td class="hsl">cfu/g</td>
                <td class="hsl"><?= $key['m_akk'] ?></td>
                <td class="namapmr">Kurang dari 100 cfu/g</td>
            </tr>
            <tr>
                <td class="hsl"></td>
                <td class="namapmr">c. <i>Escherrichia coli</i></td>
                <td class="hsl">/1g</td>
                <td class="hsl"><?= $key['m_ec'] ?></td>
                <td class="namapmr">Negatif</td>
            </tr>
            <tr>
                <td class="hsl"></td>
                <td class="namapmr">c. <i>Salmonella</i></td>
                <td class="hsl">/25g</td>
                <td class="hsl"><?= $key['m_salmon'] ?></td>
                <td class="namapmr">Negatif</td>
            </tr>
            <tr>
                <td class="hsl"><?= $no++ ?></td>
                <td class="namapmr">Wadah dan Penyimpanan</td>
                <td class="hsl"></td>
                <td class="hsl"><?= $key['wd_py'] ?></td>
                <td class="namapmr">Dalam wadah tertutup baik, di tempat kering.</td>
            </tr>
            <tr>
                <td colspan="2" class="teks" style="padding-left: 6%;">Ket : *) diperiksa oleh pihak ketiga.</td>
            </tr>
            <tr>
                <td class="ttd" style="text-align: center; padding-top: 1%">Analis:</td>
                <td class="teks"></td>
                <td class="teks"></td>
                <td class="teks"></td>
                <td class="teks" style="padding-top: 1%;">Diperiksa oleh:</td>
            </tr>
            <br>
            <tr>
                <td class="bi-bt" style="text-align: center; padding-top: 1%;">
                    <?= $key['penguji'] ?>
                </td>
                <td class="bi-bt"></td>
                <td class="bi-bt"></td>
                <td class="bi-bt"></td>
                <td class="bi-bt" style="font-weight: bold; padding-top: 1%; padding-left: 1%;">Dewi Linda</td>
            </tr>
            <tr>
                <td class="ket"></td>
                <td class="ket" style="padding-top: 1%;">Keterangan</td>
                <td class="ket-hsl" colspan="3">: Sudah Tervalidasi *</td>
            </tr>
            <tr>
                <td class="ket"></td>
                <td class="ket">Kesimpulan</td>
                <td class="ket-hsl" colspan="3">: Gelatin dapat digunakan</td>
            </tr>
        <?php } ?>
    </table>

    <!-- <table style="width:100%;" id="hh">
        <tr>
            <td class="jdl" style="width: 10%;">No.</td>
            <td class="jdl" style="width: 25%;">Pemeriksaan</td>
            <td class="jdl" style="width: 8%;">Unit</td>
            <td class="jdl" style="width: 10%;">Hasil</td>
            <td class="jdl">Persyaratan</td>
        </tr>
        <tr>
            <td class="jdl" height="10"></td>
            <td class="jdl"></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table> -->

</body>

</html>