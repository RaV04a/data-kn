<html>

<head>

  <title>Transfer Surat</title>
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

    #jj td {
      border: 0px;
      font-size: 13px;
      padding: 0
    }

    #jj .jdl {
      width: 30px;
      line-height: 20px;
      font-size: 14px;
    }

    #jj .td {
      width: 1px;
    }

    .hh tr td {
      border: 0;
      padding: 0;
    }

    .hh {
      margin-bottom: 2px;
    }
  </style>
</head>

<body>

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


      </td>
    </tr>
  </table>
  <hr style="line-height: 0.01;">
  <div style="text-align: center;padding-top: 5px;">
    <h3 style="float: center;line-height: 0.2;font-size: 24px;"><u>&nbsp;TRANSFER SURAT&nbsp;</u></h3>
    <p style="line-height: 0.1;font-size: 14px;"><?= $row['no_surat_jalan'] ?></p>
  </div>


  <?php
  $tgl =  explode('-', $row['tgl'])[2] . "-" . explode('-', $row['tgl'])[1] . "-" . explode('-', $row['tgl'])[0];
  // $exp =  explode('-', $row['exp'])[2]."/".explode('-', $row['exp'])[1]."/".explode('-', $row['exp'])[0];
  ?>
  <br>

  <div style="border: 0; width: 70%;padding: 0;">
    <table id="jj" style="margin:0">
      <tr>
        <td class="jdl"></td>
        <td class="td">&nbsp;&nbsp;</td>
        <td class="jdl"></td>
      </tr>
      <tr>
        <td class="jdl">Nama Operator</td>
        <td>:&nbsp;&nbsp;</td>
        <td class="jdl"><?= $row['nama_operator'] ?></td>
      </tr><br>
      <tr>
        <td class="jdl">Alamat</td>
        <td>:&nbsp;&nbsp;</td>
        <td class="jdl"><?= $row['alamat'] ?></td>
      </tr><br>
      <tr>
        <td class="jdl">No. PO</td>
        <td>:&nbsp;&nbsp;</td>
        <td class="jdl"><?= $row['no_po'] ?></td>
      </tr>
    </table>
  </div>
  <br>
  <table style="width: 1000px;font-size: 20px;text-align: center;">
    <thead>
      <tr>
        <td><b>No</b></td>
        <td><b>Nama Barang</b></td>
        <td><b>No Batch</b></td>
        <td><b>Expired Date</b></td>
        <td><b>Qty</b></td>
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
      $no = 1;
      $jml = 0;
      $zak = 0;
      foreach ($detail as $key) {
        $exp =  bulan(explode('-', $key['exp'])[1]) . " " . explode('-', $key['exp'])[0];
        $jml += $key['qty'];
        $zak = $key['qty'] / 25;
        $tzak = $jml / 25;
      ?>
        <tr>
          <td><?= $no++ ?></td>
          <td style="text-align: left;"><?= $key['nama_barang'] ?></td>
          <td><?= $key['no_batch'] ?></td>

          <td><?= $exp ?></td>
          <td style="text-align: right;"><?= $key['qty'] ?>&nbsp;<?= $key['satuan'] ?></td>
        </tr>
      <?php
      }
      ?>

    </tbody>
    <tfoot>
      <tr>
        <td colspan="3"><b>Jumlah</b></td>
        <td style="text-align: center;"><b><?= $tzak ?></b></td>
        <td style="text-align: right;"><b><?= $jml ?>&nbsp;<?= $key['satuan'] ?></b></td>
      </tr>
    </tfoot>
  </table>
  <p style="line-height: 0.1;font-size: 12px;">NOTE : COA & Sertifikat HALAL Terlampir</p>
  <!-- <div style="text-align:right;font-size: 12px;">
            .....................,...................20....
          </div> -->
  <table style="border: 0;font-size: 14px;">
    <tr>
      <td style="border: 0;text-align: center;width: 40%;">
        <br>
        Diterima Oleh
        <br><br><br><br><br><br><br>
        ______________________
        <br>
        Pharmacist
      </td>
      <td style="border: 0;text-align: center;width: 20%;"></td>
      <td style="border: 0;text-align: center;width: 40%;">
        Bogor, <?= $tgl ?> <br>
        Diserahkan Oleh <br>
        <?php $src = base_url('assets/images/ttd2.png'); ?>
        <!-- <?= $src ?> -->
        <img style="width: 120px;height: 100px;" src="<?= $src ?>"> <br>
        (<u>Apt. Ahmad Farhan, S.Farm.</u>)<br>

        <div style="margin-left: -100px;font-size: 10px;">
          SIPA : 199911112/SIPA_32.01/DPMPTSP/2018/1-00040
        </div>
      </td>
    </tr>
  </table>
  <br><br><br><br><br><br><br><br><br><br><br><br>


</html>