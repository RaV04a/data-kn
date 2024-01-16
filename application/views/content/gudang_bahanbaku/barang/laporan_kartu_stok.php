<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
  <div class="pcoded-wrapper">
    <div class="pcoded-content">
      <div class="pcoded-inner-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <div class="page-header-title">
                  <!-- <h5 class="m-b-10">Laporan Stok Barang</h5> -->
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Gudang Bahan Baku</a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Laporan</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('gudang_bahanbaku/Laporan_kartu_stok') ?>">Kartu Stok</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <div class="main-body">
          <div class="page-wrapper">
            <!-- [ Main Content ] start -->
            <div class="row">
              <!-- [ basic-table ] start -->
              <div class="col-xl-12">
                <div class="card">
                  <div class="card-header">
                    <h5>Laporan Kartu Stok</h5>
                    <div class="float-right">
                      <div class="input-group">
                        <?php
                        function newDate($date)
                        {
                          return explode('-', $date)[2] . "/" . explode('-', $date)[1] . "/" . explode('-', $date)[0];
                        }
                        ?>
                        <input type="text" id="filter_tgl" value="<?= $tgl == null ? '' : newDate($tgl) ?>" class="form-control datepicker" autocomplete="off" placeholder="Fiter Tanggal Disini" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <input type="text" id="filter_tgl2" value="<?= $tgl2 == null ? '' : newDate($tgl2) ?>" class="form-control datepicker" autocomplete="off" placeholder="Fiter Sampai Tanggal" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                          <div class="btn-group">
                            <button class="btn btn-secondary" id="lihat" type="button">Lihat</button>
                          </div>
                          <div class="btn-group">
                            <button class="btn btn-primary" id="export" type="button">Cetak</button>
                          </div>
                          <div class="btn-group">
                            <a href="<?= base_url() ?>gudang_bahanbaku/Laporan_kartu_stok" style="width: 40px;" class="btn btn-warning" id="export" type="button"><i class="feather icon-refresh-ccw"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-block table-border-style">

                    <?php
                    if ($tgl == null) {
                      echo '<div class="text-center font-weight-bold">Isi Form Periode Terlebih Dahulu</div>';
                    } else {
                    ?>
                      <div class="table-responsive">
                        <table class="table datatable table-bordered table-hover table-striped table-sm">
                          <thead>
                            <tr>
                              <th rowspan="2">#</th>
                              <th rowspan="2">Kode</th>
                              <th rowspan="2">Nama</th>
                              <th rowspan="2" class="text-right">Stok Sebelum <?= $tgl == null ? '' : newDate($tgl) ?></th>
                              <th colspan="3" class="text-center"><?= $tgl == null ? '' : newDate($tgl) ?> - <?= $tgl2 == null ? '' : newDate($tgl2) ?></th>
                            </tr>
                            <tr>
                              <th class="text-right">Masuk</th>
                              <th class="text-right">Keluar</th>
                              <th class="text-right">Stok Aktual</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $no = 1;
                            foreach ($result as $k) {
                              $aktual = $k['stok'] + $k['masuk'] - $k['keluar'];
                            ?>
                              <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $k['kode_barang'] ?></td>
                                <td><?= $k['nama_barang'] ?></td>
                                <td class="text-right"><?= number_format($k['stok'], 0, ",", ".") ?><?= $k['satuan'] ?></td>
                                <td class="text-right"><?= number_format($k['masuk'], 0, ",", ".") ?><?= $k['satuan'] ?></td>
                                <td class="text-right"><?= number_format($k['keluar'], 0, ",", ".") ?><?= $k['satuan'] ?></td>
                                <td class="text-right"><?= number_format($aktual, 0, ",", ".") ?><?= $k['satuan'] ?></td>

                              </tr>
                            <?php
                            }
                            ?>
                          </tbody>
                        </table>
                      </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
              <!-- [ basic-table ] end -->

            </div>
            <!-- [ Main Content ] end -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script type="text/javascript">
  $(document).ready(function() {
    $('#lihat').click(function() {
      var filter_tgl = $('#filter_tgl').val();
      var filter_tgl2 = $('#filter_tgl2').val();

      var newFilterTgl = filter_tgl.split("/")[2] + "-" + filter_tgl.split("/")[1] + "-" + filter_tgl.split("/")[0];
      var newFilterTgl2 = filter_tgl2.split("/")[2] + "-" + filter_tgl2.split("/")[1] + "-" + filter_tgl2.split("/")[0];

      if (filter_tgl == '' && filter_tgl2 != '') {
        window.location = "<?= base_url() ?>gudang_bahanbaku/Laporan_kartu_stok?alert=warning&msg=dari tanggal belum diisi";
        alert("dari tanggal belum diisi")
      } else if (filter_tgl != '' && filter_tgl2 == '') {
        window.location = "<?= base_url() ?>gudang_bahanbaku/Laporan_kartu_stok?alert=warning&msg=sampai tanggal belum diisi";
      } else if (filter_tgl == '' && filter_tgl2 == '') {
        window.location = "<?= base_url() ?>gudang_bahanbaku/Laporan_kartu_stok?alert=warning&msg=form periode harus diisi";
      } else {

        window.location = "<?= base_url() ?>gudang_bahanbaku/Laporan_kartu_stok/index/" + newFilterTgl + "/" + newFilterTgl2;
      }
    })
    $('#export').click(function() {
      var filter_tgl = $('#filter_tgl').val();
      var filter_tgl2 = $('#filter_tgl2').val();

      var newFilterTgl = filter_tgl.split("/")[2] + "-" + filter_tgl.split("/")[1] + "-" + filter_tgl.split("/")[0];
      var newFilterTgl2 = filter_tgl2.split("/")[2] + "-" + filter_tgl2.split("/")[1] + "-" + filter_tgl2.split("/")[0];

      if (filter_tgl == '' && filter_tgl2 != '') {
        window.location = "<?= base_url() ?>gudang_bahanbaku/Laporan_kartu_stok?alert=warning&msg=dari tanggal belum diisi";
        alert("dari tanggal belum diisi")
      } else if (filter_tgl != '' && filter_tgl2 == '') {
        window.location = "<?= base_url() ?>gudang_bahanbaku/Laporan_kartu_stok?alert=warning&msg=sampai tanggal belum diisi";
      } else if (filter_tgl == '' && filter_tgl2 == '') {
        window.location = "<?= base_url() ?>gudang_bahanbaku/Laporan_kartu_stok?alert=warning&msg=form periode harus diisi";
      } else {
        var url = "<?= base_url() ?>gudang_bahanbaku/Laporan_kartu_stok/pdf_laporan_kartu_stok/" + newFilterTgl + "/" + newFilterTgl2;
        window.open(url, 'pdf_laporan_kartu_stok', 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
      }
    })

  })
</script>