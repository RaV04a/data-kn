<html>

<head>

  <title>Export Laporan Stok Barang</title>
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
  $periode =  explode('-', $tgl)[2] . "/" . explode('-', $tgl)[1] . "/" . explode('-', $tgl)[0];
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

    </tr>
  </table>

  <hr style="line-height: 0.01;">
  <div style="text-align: center;padding-top: 5px;">
    <h3 style="float: center;line-height: 0.2;">Laporan Stok Barang</h3>
    <p style="line-height: 0.1;font-size: 12px;">Per Tanggal : <?= $periode ?></p>
  </div>


  <table style="width: 1000px;font-size: 18px;">
    <thead>
      <tr>
        <th>No</th>
        <th>Kode</th>
        <th>Nama</th>
        <th class="text-right">Masuk</th>
        <th class="text-right">Keluar</th>
        <th class="text-right">Stok</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      foreach ($result as $k) {
        $keluar = $k['qty'] - $k['stok'];
      ?>
        <tr>
          <th scope="row"><?= $no++ ?></th>
          <td><?= $k['kode_barang'] ?></td>
          <td><?= $k['nama_barang'] ?></td>
          <td style="text-align: right;"><?= $k['qty'] ?>&nbsp;<?= $k['satuan'] ?></td>
          <td style="text-align: right;"><?= $keluar ?>&nbsp;<?= $k['satuan'] ?></td>
          <td style="text-align: right;"><?= $k['stok'] ?>&nbsp;<?= $k['satuan'] ?></td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>

</body>

</html>