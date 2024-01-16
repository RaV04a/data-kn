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
                  <!-- <h5 class="m-b-10">Data Barang Keluar</h5> -->
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Marketing</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('Print_schedule') ?>">Print Schedule</a></li>
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
                    <h5>Data Schedule <b>(Marketing)</b></h5>
                    <div class="float-right">
                      <div class="input-group">
                        <?php
                        function newDate($date)
                        {
                          return explode('-', $date)[2] . "/" . explode('-', $date)[1] . "/" . explode('-', $date)[0];
                        }
                        ?>
                        <input type="text" id="filter_tgl" value="<?= $tgl == null ? '' : newDate($tgl) ?>" class="form-control datepicker" autocomplete="off" placeholder="Fiter Dari Tanggal" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <input type="text" id="filter_tgl2" value="<?= $tgl2 == null ? '' : newDate($tgl2) ?>" class="form-control datepicker" autocomplete="off" placeholder="Fiter Sampai Tanggal" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="btn-group">
                          <button class="btn btn-secondary" id="lihat" type="button">Lihat</button>
                        </div>
                        <div class="btn-group">
                          <button class="btn btn-primary" id="export" type="button">Cetak</button>
                        </div>
                        <div class="btn-group">
                          <a href="<?= base_url() ?>Marketing/Print_schedule" style="width: 40px;" class="btn btn-warning" id="export" type="button"><i class="feather icon-refresh-ccw"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-block table-border-style">
                    <div class="table-responsive">
                      <table class="table datatable table-hover table-striped table-sm">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Tgl Sch</th>
                            <th>Mesin</th>
                            <th>No CR</th>
                            <th>No Batch</th>
                            <th>Negara Cus.</th>
                            <th>Jumlah</th>
                            <th>Sisa</th>
                            <th class="text-center">Detail</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $level = $this->session->userdata('level');
                          $no = 1;
                          foreach ($result as $k) {
                            $tgl_sch =  explode('-', $k['tgl_sch'])[2] . "/" . explode('-', $k['tgl_sch'])[1] . "/" . explode('-', $k['tgl_sch'])[0];
                            $tgl_kirim =  explode('-', $k['tgl_kirim'])[2] . "/" . explode('-', $k['tgl_kirim'])[1] . "/" . explode('-', $k['tgl_kirim'])[0];
                            $tgl_prd =  explode('-', $k['tgl_prd'])[2] . "/" . explode('-', $k['tgl_prd'])[1] . "/" . explode('-', $k['tgl_prd'])[0];
                            if ($k['sisa'] != 0) { ?>
                              <tr id="tabel_data">
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $tgl_sch ?></td>
                                <td><?= $k['mesin'] ?></td>
                                <td><?= $k['no_cr'] ?></td>
                                <td><?= $k['no_batch'] ?></td>
                                <td><?= $k['negara'] ?></td>
                                <td><?= $k['jumlah'] ?></td>
                                <td><?= $k['sisa'] ?></td>
                                <td class="text-center">
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#view" data-id_sch="<?= $k['id_sch'] ?>" data-id_customer="<?= $k['id_customer'] ?>" data-id_kw_cap="<?= $k['id_kw_cap'] ?>" data-id_kw_body="<?= $k['id_kw_body'] ?>" data-no_cr="<?= $k['no_cr'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-tgl_sch="<?= $tgl_sch ?>" data-size="<?= $k['size'] ?>" data-kode_warna_cap="<?= $k['kode_warna_cap'] ?>" data-kode_warna_body="<?= $k['kode_warna_body'] ?>" data-warna_cap="<?= $k['warna_cap'] ?>" data-warna_body="<?= $k['warna_body'] ?>" data-mesin="<?= $k['mesin'] ?>" data-jumlah="<?= $k['jumlah'] ?>" data-cek_print="<?= $k['cek_print'] ?>" data-print="<?= $k['print'] ?>" data-tinta="<?= $k['tinta'] ?>" data-nama_customer="<?= $k['nama_customer'] ?>" data-jenis_box="<?= $k['jenis_box'] ?>" data-jenis_zak="<?= $k['jenis_zak'] ?>" data-tgl_kirim="<?= $tgl_kirim ?>" data-tgl_prd="<?= $tgl_prd ?>" data-minyak="<?= $k['minyak'] ?>" data-keterangan="<?= $k['keterangan'] ?>">
                                      <i class="feather icon-eye"></i>Detail
                                    </button>
                                  </div>
                                </td>
                              </tr>
                            <?php } ?>
                          <?php
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Modal -->
<div class="modal fade" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Entry Schedule</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <form>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="no_cr">Nomor CR</label>
              <input type="hidden" id="id_sch" name="id_sch">
              <div class="input-group">
                <input type="text" class="form-control" id="v-no_cr" name="no_cr" placeholder="Nomor CR" readonly>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="no_batch">Nomor Batch</label>
              <input type="text" class="form-control" id="v-no_batch" name="no_batch" placeholder="No. Batch" autocomplete="off" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="tgl_sch">Tanggal Schedule</label>
              <input type="text" class="form-control" id="v-tgl_sch" name="tgl_sch" placeholder="Tanggal Schedule" autocomplete="off" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="size">Size</label>
              <input type="text" class="form-control" id="v-size" name="size" placeholder="Size" autocomplete="off" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="kode_warna">Kode Warna Cap</label>
              <div class="input-group">
                <input type="text" class="form-control" id="v-kode_warna_cap" name="kode_warna_cap" placeholder="Cap" autocomplete="off" readonly>
                <input type="text" class="form-control" id="v-warna_cap" name="warna_body" placeholder="Body" autocomplete="off" readonly>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="kode_warna">Kode Warna Body</label>
              <div class="input-group">
                <input type="text" class="form-control" id="v-kode_warna_body" name="kode_warna_body" placeholder="Cap" autocomplete="off" readonly>
                <input type="text" class="form-control" id="v-warna_body" name="warna_body" placeholder="Body" autocomplete="off" readonly>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="mesin">Mesin</label>
              <input type="text" class="form-control" id="v-mesin" name="mesin" placeholder="Mesin" autocomplete="off" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="jumlah">Jumlah</label>
              <input type="text" class="form-control" id="v-jumlah" name="jumlah" placeholder="Jumlah" autocomplete="off" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="print">Print</label>
              <input style="width: 17%;" class="form-check-input" id="v-cek_print" type="checkbox" name="Print" disabled>
              <div id="form_print" class="input-group" style="display: none;">
                <input type="text" class="form-control" id="v-print" name="print" placeholder="Print" autocomplete="off" readonly>
                <input type="text" class="form-control" id="v-tinta" name="tinta" placeholder="Tinta" autocomplete="off" readonly>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="customer">Customer</label>
              <input type="text" class="form-control" id="v-customer" name="customer" placeholder="Customer" autocomplete="off" readonly>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label for="jenis_box">Jenis Box</label>
              <input type="text" class="form-control" id="v-jenis_box" name="jenis_box" placeholder="Jenis Box" autocomplete="off" readonly>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="jenis_zak">Jenis Zak</label>
              <input type="text" class="form-control" id="v-jenis_zak" name="jenis_zak" placeholder="Jenis Zak" autocomplete="off" readonly>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="minyak">Minyak N-M</label>
              <input type="text" class="form-control" id="v-minyak" name="minyak" placeholder="Minyak" autocomplete="off" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="tgl_kirim">Tanggal Kirim</label>
              <input type="text" class="form-control" id="v-tgl_kirim" name="tgl_kirim" placeholder="Tanggal Kirim" autocomplete="off" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="tgl_prd">Tanggal PRD</label>
              <input type="text" class="form-control" id="v-tgl_prd" name="tgl_prd" placeholder="Tanggal PRD" autocomplete="off" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="keterangan">Keterangan</label>
              <textarea type="text" class="form-control" id="v-keterangan" name="keterangan" placeholder="Keterangan" autocomplete="off" readonly></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="simpan" class="btn btn-primary" onclick="if (! confirm('Apakah Anda Yakin Untuk Menimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya')) { return false; }">Simpan</button>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#view').on('show.bs.modal', function(event) {
      var id_sch = $(event.relatedTarget).data('id_sch')
      var no_cr = $(event.relatedTarget).data('no_cr')
      var no_batch = $(event.relatedTarget).data('no_batch')
      var tgl_sch = $(event.relatedTarget).data('tgl_sch')
      var size = $(event.relatedTarget).data('size')
      var kode_warna_cap = $(event.relatedTarget).data('kode_warna_cap')
      var kode_warna_body = $(event.relatedTarget).data('kode_warna_body')
      var warna_cap = $(event.relatedTarget).data('warna_cap')
      var warna_body = $(event.relatedTarget).data('warna_body')
      var mesin = $(event.relatedTarget).data('mesin')
      var jumlah = $(event.relatedTarget).data('jumlah')
      var cek_print = $(event.relatedTarget).data('cek_print')
      var print = $(event.relatedTarget).data('print')
      var tinta = $(event.relatedTarget).data('tinta')
      var customer = $(event.relatedTarget).data('nama_customer')
      var jenis_box = $(event.relatedTarget).data('jenis_box')
      var jenis_zak = $(event.relatedTarget).data('jenis_zak')
      var minyak = $(event.relatedTarget).data('minyak')
      var tgl_kirim = $(event.relatedTarget).data('tgl_kirim')
      var tgl_prd = $(event.relatedTarget).data('tgl_prd')
      var keterangan = $(event.relatedTarget).data('keterangan')

      $(this).find('#v-id_sch').val(id_sch)
      $(this).find('#v-no_cr').val(no_cr)
      $(this).find('#v-no_batch').val(no_batch)
      $(this).find('#v-tgl_sch').val(tgl_sch)
      $(this).find('#v-size').val(size)
      $(this).find('#v-kode_warna_cap').val(kode_warna_cap)
      $(this).find('#v-kode_warna_body').val(kode_warna_body)
      $(this).find('#v-warna_cap').val(warna_cap)
      $(this).find('#v-warna_body').val(warna_body)
      $(this).find('#v-mesin').val(mesin)
      $(this).find('#v-jumlah').val(jumlah)
      $(this).find('#v-cek_print').val(cek_print)
      $(this).find('#v-cek_print').trigger("chosen:updated")
      $(this).find('#v-print').val(print)
      $(this).find('#v-tinta').val(tinta)
      $(this).find('#v-customer').val(customer)
      $(this).find('#v-jenis_box').val(jenis_box)
      $(this).find('#v-jenis_zak').val(jenis_zak)
      $(this).find('#v-minyak').val(minyak)
      $(this).find('#v-tgl_kirim').val(tgl_kirim)
      $(this).find('#v-tgl_prd').val(tgl_prd)
      $(this).find('#v-keterangan').val(keterangan)
      if (cek_print === 1) {
        $('#view #form_print').show()
        $('#v-cek_print').attr('checked', true)
      }
      if (cek_print === 0) {
        $('#view #form_print').hide()
        $('#v-cek_print').attr('checked', false)
      }
    })
  })
</script>

<script type="text/javascript">
  $(document).ready(function() {


    $('#lihat').click(function() {

      var filter_tgl = $('#filter_tgl').val();
      var filter_tgl2 = $('#filter_tgl2').val();

      var newFilterTgl = filter_tgl.split("/")[2] + "-" + filter_tgl.split("/")[1] + "-" + filter_tgl.split("/")[0];
      var newFilterTgl2 = filter_tgl2.split("/")[2] + "-" + filter_tgl2.split("/")[1] + "-" + filter_tgl2.split("/")[0];

      if (filter_tgl == '' && filter_tgl2 != '') {
        window.location = "<?= base_url() ?>Marketing/Print_schedule?alert=warning&msg=dari tanggal belum diisi";
        alert("dari tanggal belum diisi")
      } else if (filter_tgl != '' && filter_tgl2 == '') {
        window.location = "<?= base_url() ?>Marketing/Print_schedule?alert=warning&msg=sampai tanggal belum diisi";
      } else if (filter_tgl == '' && filter_tgl2 == '') {
        window.location = "<?= base_url() ?>Marketing/Print_schedule?alert=warning&msg=form periode harus diisi";
      } else {

        window.location = "<?= base_url() ?>Marketing/Print_schedule/index/" + newFilterTgl + "/" + newFilterTgl2;

      }
    })
    $('#export').click(function() {

      var filter_tgl = $('#filter_tgl').val();
      var filter_tgl2 = $('#filter_tgl2').val();

      var newFilterTgl = filter_tgl.split("/")[2] + "-" + filter_tgl.split("/")[1] + "-" + filter_tgl.split("/")[0];
      var newFilterTgl2 = filter_tgl2.split("/")[2] + "-" + filter_tgl2.split("/")[1] + "-" + filter_tgl2.split("/")[0];

      if (filter_tgl == '' && filter_tgl2 != '') {
        window.location = "<?= base_url() ?>Marketing/Print_schedule?alert=warning&msg=dari tanggal belum diisi";
        alert("dari tanggal belum diisi")
      } else if (filter_tgl != '' && filter_tgl2 == '') {
        window.location = "<?= base_url() ?>Marketing/Print_schedule?alert=warning&msg=sampai tanggal belum diisi";
      } else if (filter_tgl == '' && filter_tgl2 == '') {
        var url = "<?= base_url() ?>Marketing/Print_schedule/pdf_print_schedule";
        window.open(url, 'pdf_print_schedule', 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
      } else {

        var url = "<?= base_url() ?>Marketing/Print_schedule/pdf_print_schedule/" + newFilterTgl + "/" + newFilterTgl2;
        window.open(url, 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
      }
    })
  })
</script>