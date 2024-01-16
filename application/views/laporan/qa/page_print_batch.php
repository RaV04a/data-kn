<html>

<head>

    <title>Laporan Pengolahan Batch</title>
    <style type="text/css">
        body {
            font-family: sans-serif;
        }

        table {
            width: 100%;
            margin: 20px;
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
            padding: 0;
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
            font-size: 13px;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php 
    function bulan($bulan)
    {
        if ($bulan == "01") {
            return "Januari";
        } elseif ($bulan == "02") {
            return "Februari";
        } elseif ($bulan == "03") {
            return "Maret";
        } elseif ($bulan == "04") {
            return "April";
        } elseif ($bulan == "05") {
            return "Mei";
        } elseif ($bulan == "06") {
            return "Juni";
        } elseif ($bulan == "07") {
            return "Juli";
        } elseif ($bulan == "08") {
            return "Agustus";
        } elseif ($bulan == "09") {
            return "September";
        } elseif ($bulan == "10") {
            return "Oktober";
        } elseif ($bulan == "11") {
            return "November";
        } elseif ($bulan == "12") {
            return "Desember";
        } else {
            return "No Month";
        }
    } ?>
            <table align="center">
                <tr>
                    <th colspan="3">
                        LAPORAN PENGOLAHAN BATCH
                    </th>
                </tr>
                <tr>
                    <td>Disusun Oleh :
                        <br/>
                        <br/>
                        <br/>
                        Supervisor/Kasie
                    </td>
                    <td>Diperiksa Oleh :
                        <br/>
                        <br/>
                        <br/>
                        Manager Dept.
                    </td>
                    <td>Disetujui Oleh :
                        <br/>
                        <br/>
                        <br/>
                        Manager QA
                    </td>
                </tr>
            </table>
            <table id="hm">
                    <tr>
                        <td class="judul">Nama Mesin</td>
                        <td class="judul">Size</td>
                        <td class="judul">Kode Warna</td>
                        <td class="judul">Print</td>
                        <td class="judul">Customer</td>
                        <td class="judul">Order</td>
                        <td class="judul">CR</td>
                        <td class="judul">Batch Kapsul</td>
                    </tr>
                    <tr>
                        <td class="judul">E</td>
                        <td class="judul">ON</td>
                        <td class="judul">5610-5160</td>
                        <td class="judul">SOLAS</td>
                        <td class="judul">PT. SOLAS LANGGENG</td>
                        <td class="judul">1,000,000</td>
                        <td class="judul">D0027 5</td>
                        <td class="judul">1060223EB</td>
                    </tr>
                </thead>
            </tbody>
        </table>
        <div><b>I. MELTING</b></div>
        <div class="MsoNormal" style="text-align: justify; text-indent: 0.5in;">1.1 proses</div> 
        <div class="MsoNormal" style="text-align: justify; text-indent: 1in;">Pengecekan kesiapan & kebersihan alat-alat yang digunakan</div> 
        <div class="MsoNormal" style="text-align: justify; text-indent: 1in;">1. Periksa suhu dan kelembapan ruangan melting</div> 
        <head>
        <style>
            /* Gunakan CSS untuk mengatur tata letak tabel */
            table {
                border-collapse: collapse;
            }
            th, td {
                border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        </style>
</head>
<body>
    <table>
        <tr>
            <th>Tanggal</th><td>07-02-2023</td><td>08-02-2023</td><td>09-02-2023</td><th class="judul">Persyaratan</th><th class="judul">Penyimpanan</th>
        </tr>
        <tr>
            <th>Suhu Ruangan</th><td>24</td><td>24</td><td>27</td><th>23 - 30 *C</th><th>-</th>
        </tr>
        <tr>
            <th>Kelembapan Ruangan</th><td>60</td><td>55</td><td>30</td><th>45 - 70 %</th><th>-</th>
        </tr>
        <tr>
            <th>Dilakukan Oleh</th><td>6968</td><td>6975</td><td>6988</td><th>-</th><th>-</th>
        </tr>
        <tr>
            <th>Diperiksa Oleh</th><td>0945</td><td>6903</td><td>0945</td><th>-</th><th>-</th>
        </tr>
    </table>
    <div class="MsoNormal" style="text-align: justify; text-indent: 1in;">2. Periksa kebersihan melter</div>
    <style>
        table {
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
    <body>
        <table>
            <tr>
                <th>tanggal</th><td>07-02-2023</td><td>07-02023</td><td>08-02-2023</td><td>08-02-2023</td><td>09-02-2023</td><th class="judul">Persyaratan</th><th class="judul">Penyimpanan</th>
            </tr>
            <tr>
                <th>Shift</th><td>1</td><td>3</td><td>1</td><td>2</td><td>2</td><th>Bersih</th><th>-</th>
            </tr>
            <tr>
                <th>Melter</th><td>Bersih</td><td>Bersih</td><td>Bersih</td><td>Bersih</td><td>Bersih</td><th>Ada</th><th>-</th>
            </tr>
            <tr>
                <th>Label Bersih</th><td>Ada</td><td>Ada</td><td>Ada</td><td>Ada</td><td>Ada</td><th>-</th><th>-</th>
            </tr>
            <tr>
                <th>Nip Opr 1</th><td>6974</td><td>6968</td><td>6974</td><td>6903</td><td>6903</td><th>-</th><th>-</th>
            </tr>
            <tr>
                <th>Nip Opr 2</th><td>6984</td><td>7034</td><td>6984</td><td>6996</td><td>6988</td><th>-</th><th>-</th>
            </tr>
            <tr>
                <th>Nip Spv</th><td>6903</td><td>6903</td><td>6903</td><td>6903</td><td>0945</td><th>-</th><th>-</th>
            </tr>
        </table>
        <br/>
        <br/>
        <br/>
        <table align="center">
                <tr>
                    <th colspan="3">
                        LAPORAN PENGOLAHAN BATCH
                    </th>
                </tr>
                <tr>
                    <td>Disusun Oleh :
                        <br/>
                        <br/>
                        <br/>
                        Supervisor/Kasie
                    </td>
                    <td>Diperiksa Oleh :
                        <br/>
                        <br/>
                        <br/>
                        Manager Dept.
                    </td>
                    <td>Disetujui Oleh :
                        <br/>
                        <br/>
                        <br/>
                        Manager QA
                    </td>
                </tr>
            </table>
            <table id="hm">
                    <tr>
                        <td class="judul">Nama Mesin</td>
                        <td class="judul">Size</td>
                        <td class="judul">Kode Warna</td>
                        <td class="judul">Print</td>
                        <td class="judul">Customer</td>
                        <td class="judul">Order</td>
                        <td class="judul">CR</td>
                        <td class="judul">Batch Kapsul</td>
                    </tr>
                    <tr>
                        <td class="judul">E</td>
                        <td class="judul">ON</td>
                        <td class="judul">5610-5160</td>
                        <td class="judul">SOLAS</td>
                        <td class="judul">PT. SOLAS LANGGENG</td>
                        <td class="judul">1,000,000</td>
                        <td class="judul">D0027 5</td>
                        <td class="judul">1060223EB</td>
                    </tr>
                </thead>
            </tbody>
        </table>
        <div class="MsoNormal" style="text-align: justify; text-indent: 1in;">3. Komposisi Masak Gelatin</div>
        <head>
        <style>
            /* Gunakan CSS untuk mengatur tata letak tabel */
            table {
                border-collapse: collapse;
            }
            th, td {
                border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        </style>
    </head>
    <body>
        <table>
            <tr>
                <th colspan="2">Tanggal</th><td colspan="3">07-02-2023</td><td colspan="3">07-02-2023</td><td colspan="3">08-02-2023</td><td colspan="3">08-02-2023</td><td colspan="3">09-02-2023</td><th colspan="3">Persyaratan</th><th colspan="3">Penyimpanan</th>
            </tr>
            <tr>
                <th colspan="2">shift</th><td colspan="3">1</td><td colspan="3">3</td><td colspan="3">1</td><td colspan="3">2</td><td colspan="3">2</td><th colspan="3">-</th><th colspan="3">-</th>
            </tr>
            <tr>
                <th colspan="2">Batch Masak</th><td colspan="3">113</td><td colspan="3">114</td><td colspan="3">115</td colspan="3"><td colspan="3">116</td><td colspan="3">117</td><th colspan="3">-</th><th colspan="3">-</th>
            </tr>
            <tr>
                <th rowspan="5" colspan="2">Gelatin</th><th>Nama</th><th>Bloom/LOT</th><th>Jml</th><th>Nama</th><th>Bloom/LOT</th><th>Jml</th><th>Nama</th><th>Bloom/LOT</th><th>Jml</th><th>Nama</th><th>Bloom/LOT</th><th>Jml</th><th>Nama</th><th>Bloom/LOT</th><th>Jml</th><th colspan="3">-</th><th colspan="3">-</th>
            </tr>
            <tr>
                <td>Global</td><td>200/GKJ001</td><td>50.00</td><td>Global</td><td>200/GKJ001</td><td>50.00</td><td>Global</td><td>200/GKJ001</td><td>50.00</td><td>Global</td><td>200/GKJ001</td><td>50.00</td><td>Global</td><td>200/GKJ001</td><td>50.00</td><th colspan="3"></th><th colspan="3">-</th>
            </tr>
            <tr>
                <td>Gelita</td><td>200/5132211832</td><td>250.00</td><td>Gelita</td><td>200/5132211832</td><td>250.00</td><td>Gelita</td><td>200/5132211832</td><td>250.00</td><td>Gelita</td><td>200/5132211832</td><td>250.00</td><td>Gelita</td><td>200/5132211832</td><td>250.00</td><th colspan="3">-</th><th colspan="3">-</th>
            </tr>
            <tr>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><th colspan="3">-</th><th colspan="3">-</th>
            </tr>
            <tr>
                <th colspan="2">Total (KG)</th><td>300.00</td><th colspan="2">Total (KG)</th><td>300.00</td><th colspan="2">Total (KG)</th><td>300.00</td><th colspan="2">Total (KG)</th><td>300.00</td><th colspan="2">Total (KG)</th><td>300.00</td><th colspan="3">-</th><th colspan="3">-</th>
            </tr>
            <tr>
                <th rowspan="4" colspan="2"> Bahan Tambahan</th><th>Nama</th><th>Bloom/LOT</th><th>Jml</th><th>Nama</th><th>Bloom/LOT</th><th>Jml</th><th>Nama</th><th>Bloom/LOT</th><th>Jml</th><th>Nama</th><th>Bloom/LOT</th><th>Jml</th><th>Nama</th><th>Bloom/LOT</th><th>Jml</th><th colspan="3">-</th><th colspan="3">-</th>
            </tr>
            <tr>
                <td>Methyl Paraben</td><td>JA 2011</td><td>300.00</td><td>Methyl Paraben</td><td>JA 2011</td><td>300.00</td><td>Methyl Paraben</td><td>JA 2011</td><td>300.00</td><td>Methyl Paraben</td><td>JA 2011</td><td>300.00</td><td>Methyl Paraben</td><td>JA 2011</td><td>300.00</td><th colspan="3">-</th><th colspan="3">-</th>
            </tr>
            <tr>
                <td>Sodium lautyl Sulfat</td><td>00025280251</td><td>168.00</td><td>Sodium lautyl Sulfat</td><td>00025280251</td><td>168.00</td><td>Sodium lautyl Sulfat</td><td>00025280251</td><td>168.00</td><td>Sodium lautyl Sulfat</td><td>00025280251</td><td>168.00</td><td>Sodium lautyl Sulfat</td><td>00025280251</td><td>168.00</td><th colspan="3">-</th><th colspan="3">-</th>
            </tr>
            <tr>
                <th>Natrium Benzoat</th><th>KASBP1521</th><th>60.00</th><th>Natrium Benzoat</th><th>KASBP1521</th><th>60.00</th><th>Natrium Benzoat</th><th>KASBP1521</th><th>60.00</th><th>Natrium Benzoat</th><th>KASBP1521</th><th>60.00</th><th>Natrium Benzoat</th><th>KASBP1521</th><th>60.00</th><th colspan="3">-</th><th colspan="3">-</th>
            </tr>
            <tr>
                <th colspan="2">Jumlah Air(L)</th><td colspan="3">600</td><td colspan="3">600</td><td colspan="3">600</td><td colspan="3">600</td><td colspan="3">600</td><th colspan="3">2 X Total Gelatin</th><th colspan="3">-</th>
            </tr>
            <tr>
                <th colspan="2">Temp Air Pelarut</th><td colspan="3">90 C</td><td colspan="3">90 C</td><td colspan="3">90 C</td><td colspan="3">90 C</td><td colspan="3">90 C</td><th colspan="3">70 - 90 C</th><th colspan="3">-</th>
            </tr>
            <tr>
                <th colspan="2">Jam msk Gelatin(WIB)</th><td colspan="3">01.00</td><td colspan="3">19.00</td><td colspan="3">01.00</td><td colspan="3">14.00</td><td colspan="3">10.30</td><th colspan="3">-</th><th colspan="3">-</th>
            </tr>
            <tr>
                <th colspan="2">Jam msk MP/PP/SLS(wib)</th><td colspan="3">01.00</td><td colspan="3">19.00</td><td colspan="3">01.00</td><td colspan="3">14.00</td><td colspan="3">10.30</td><th colspan="3">-</th><th colspan="3">-</th>
            </tr>
            <tr>
                <th colspan="2">Mixing (wib)</th><td colspan="3">01.00 s/d 02.00</td><td colspan="3">19.00 s/d 20.00</td><td colspan="3">01.00 s/d 02.00</td><td colspan="3">14.00 s/d 15.00</td><td colspan="3">10.30 s/d 11.30</td><th colspan="3">60 Menit</th><th colspan="3">-</th>
            </tr>
            <tr>
                <th colspan="2">Vaccum (wib)</th><td colspan="3">02.00 s/d 04.00</td><td colspan="3">20.00 s/d 21.00</td><td colspan="3">02.00 s/d 05.00</td><td colspan="3">15.00 s/d 17.00</td><td colspan="3">11.30 s/d 13.30</td><th colspan="3">120 Menit</th><th colspan="3">-</th>
            </tr>
            <tr>
                <th colspan="2">Scalla Vaccum</th><td colspan="3">1200.0 CPS / 56 C</td><td colspan="3">1200.0 CPS / 56 C</td><td colspan="3">1200.0 CPS / 56 C</td><td colspan="3">1200.0 CPS / 56 C</td><td colspan="3">1200.0 CPS / 56 C</td><th colspan="3">1200 - 2000 Cps / 50 - 70 C</th><th colspan="3"></th>
            </tr>
        </table>
    </body>
    </body>
</body>
</html>