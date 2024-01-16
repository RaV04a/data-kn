<html>

<head>

  <title>Export Laporan Stock Keeper</title>
  <style type="text/css">
  body{
    font-family: sans-serif;
  }
  table{
    width: 100%;
    margin: 20px auto;
    border-collapse: collapse;
  }
  table th,
  table td{
    border: 1px solid #3c3c3c;
    padding: 3px 8px;
  }
  table td{
    vertical-align: top;
  }
  a{
    background: blue;
    color: #fff;
    padding: 8px 10px;
    text-decoration: none;
    border-radius: 2px;
  }
  .hh tr td{
    border: 0;
    padding: 0
  }
  .hh{
    margin-bottom: 2px;
  }
  </style>
</head>
<body>
  <?php 
  if ($tgl == null & $tgl2 == null) {
    $per = "";
  }else{
    $periode =  explode('-', $tgl)[2]."/".explode('-', $tgl)[1]."/".explode('-', $tgl)[0];
    $periode2= explode('-', $tgl2)[2]."/".explode('-', $tgl2)[1]."/".explode('-', $tgl2)[0];
    $per = "Periode : ".$periode." - ".$periode2;
  }
    
    ?>
  
    <table class="hh">
      <tr>
        <td>
          
        </td>
        <td style="text-align: center;padding-left: -20px;">
          <?php $src = base_url('assets/images/icon.png'); ?>
          <!-- <?=$src?> -->
          <img style="width: 60px;height: 100px;" src="<?=$src?>">
        </td>
        <td style="width: 460px;">
    <h2 style="line-height: 0.01; font-size: 30px;">PT KAPSULINDO NUSANTARA</h2>
    <h3 style="line-height: 0.01; font-size: 23px;">Pedagang Besar Bahan Baku Farmasi</h3>
    <p style="line-height: 0.01;font-size: 12px;">Jl. Pancasila 1 Cicadas Gunung Putrri - Kab. Bogor 16964, Indonesia</p>
    <p style="line-height: 0.01;font-size: 12px;">Tlp:(021) 8671165. Fax:(021) 8671168,86861734. Email: pbbbf@kapsulindo.co.id</p>
        </td>
        <td style="padding-center:-10px; ">
          <img style="width: 120px;height: 100px;">
        </td>
          
        </td>]
      </tr>
    </table>
    <hr style="line-height: 0.01;">
  <div style="text-align: center;padding-top: 5px;">
    <h3 style="float: center;line-height: 0.2;">Report Stock Keeper</h3>
    <p style="line-height: 0.1;font-size: 12px;"></p>
  </div>

    

                                                <table style="width: 1000px;font-size: 18px;">
                                                    <thead>
                                                        <tr>
                                                          <th>No</th>
                                                          <th>Size</th>
                                                          <th>Kode C</th>
                                                          <th>kode B</th>
                                                          <th>Warna C</th>
                                                          <th>Warna B</th>
                                                          <th>Packing</th>
                                                          <th>Batch</th>
                                                          <th>Print</th>
                                                          <th>Jumlah</th>
                                                          <th>Sak/Los</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                      <?php 
                                                      foreach($result as $k){ 
                                                      ?>
                                                      <tr>
                                                      <td><?= $k['no_msk'] ?></td>
                                                        <td><?= $k['size'] ?></td>
                                                        <td><?= $k['kw_cap'] ?></td>
                                                        <td><?= $k['kw_body'] ?></td>
                                                        <td><?= $k['warna_cap'] ?></td>
                                                        <td><?= $k['warna_body'] ?></td>
                                                        <td><?= $k['no_packing'] ?></td>
                                                        <td><?= $k['no_batch'] ?></td>
                                                        <td><?= $k['print'] ?></td>
                                                        <td><?= $k['jumlah'] ?></td>
                                                        <td><?= $k['jenis_pack'] ?></td>
                                                        </tr>
                                                      <?php
                                                      }
                                                      ?>
                                                    </tbody>
                                                </table>
  </body>
</html>