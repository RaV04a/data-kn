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
                  <li class="breadcrumb-item"><a href="<?= base_url('Marketing/Tambah_schedule') ?>">Tambah Schedule</a></li>
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

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#add">
                      <i class="feather icon-plus"></i>Tambah Data
                    </button>
                  </div>
                  <div class="card-block table-border-style">

                    <?php
                    // print_r($result);
                    ?>
                    <div class="table-responsive">
                      <table class="table datatable table-hover table-striped table-sm">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Tanggal Schedule</th>
                            <th>No CR</th>
                            <th>No Batch</th>
                            <th>Nama Customer</th>
                            <th>Sisa</th>
                            <th class="text-center">Detail</th>
                            <th class="text-center">Aksi</th>
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

                          ?>
                            <tr>
                              <th scope="row"><?= $no++ ?></th>
                              <td><?= $tgl_sch ?></td>
                              <td><?= $k['no_cr'] ?></td>
                              <td><?= $k['no_batch'] ?></td>
                              <td><?= $k['nama_customer'] ?></td>
                              <td><?= $k['sisa'] ?></td>
                              <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <button type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#view" data-id_sch="<?= $k['id_sch'] ?>" data-id_customer="<?= $k['id_customer'] ?>" data-id_kw_cap="<?= $k['id_kw_cap'] ?>" data-id_kw_body="<?= $k['id_kw_body'] ?>" data-no_cr="<?= $k['no_cr'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-tgl_sch="<?= $tgl_sch ?>" data-size="<?= $k['size'] ?>" data-kode_warna_cap="<?= $k['kode_warna_cap'] ?>" data-kode_warna_body="<?= $k['kode_warna_body'] ?>" data-warna_cap="<?= $k['warna_cap'] ?>" data-warna_body="<?= $k['warna_body'] ?>" data-mesin="<?= $k['mesin'] ?>" data-jumlah="<?= $k['jumlah'] ?>" data-sisa="<?= $k['sisa'] ?>" data-cek_print="<?= $k['cek_print'] ?>" data-print="<?= $k['print'] ?>" data-tinta="<?= $k['tinta'] ?>" data-nama_customer="<?= $k['nama_customer'] ?>" data-jenis_box="<?= $k['jenis_box'] ?>" data-jenis_zak="<?= $k['jenis_zak'] ?>" data-tgl_kirim="<?= $tgl_kirim ?>" data-tgl_prd="<?= $tgl_prd ?>" data-minyak="<?= $k['minyak'] ?>" data-keterangan="<?= $k['keterangan'] ?>">
                                    <i class="feather icon-eye"></i>Detail
                                  </button>
                                </div>
                              </td>
                              <td class="text-center">
                                <?php if ($level === "admin") { ?>
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#edit" data-id_sch="<?= $k['id_sch'] ?>" data-id_customer="<?= $k['id_customer'] ?>" data-id_kw_cap="<?= $k['id_kw_cap'] ?>" data-id_kw_body="<?= $k['id_kw_body'] ?>" data-no_cr="<?= $k['no_cr'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-tgl_sch="<?= $tgl_sch ?>" data-size="<?= $k['size'] ?>" data-kode_warna_cap="<?= $k['kode_warna_cap'] ?>" data-kode_warna_body="<?= $k['kode_warna_body'] ?>" data-warna_cap="<?= $k['warna_cap'] ?>" data-warna_body="<?= $k['warna_body'] ?>" data-mesin="<?= $k['mesin'] ?>" data-jumlah="<?= $k['jumlah'] ?>" data-sisa="<?= $k['sisa'] ?>" data-cek_print="<?= $k['cek_print'] ?>" data-print="<?= $k['print'] ?>" data-tinta="<?= $k['tinta'] ?>" data-nama_customer="<?= $k['nama_customer'] ?>" data-jenis_box="<?= $k['jenis_box'] ?>" data-jenis_zak="<?= $k['jenis_zak'] ?>" data-tgl_kirim="<?= $tgl_kirim ?>" data-tgl_prd="<?= $tgl_prd ?>" data-minyak="<?= $k['minyak'] ?>" data-keterangan="<?= $k['keterangan'] ?>">
                                      <i class="feather icon-edit-2"></i>Edit
                                    </button>
                                  </div>
                                  <div class="btn-group" role="group">
                                    <a href="<?= base_url() ?>Marketing/Tambah_schedule/delete/<?= $k['id_sch'] ?>" class="btn btn-danger btn-square text-light btn-sm" onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
                                      <i class="feather icon-trash-2"></i>Hapus
                                    </a>
                                  </div>
                                <?php } ?>
                              </td>
                            </tr>
                          <?php } ?>
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
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Schedule <br> <b>Entry Schedule</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>Marketing/Tambah_schedule/add">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="no_cr">Nomor CR</label>
                <input type="hidden" id="id_sch" name="id_sch">
                <div class="input-group">
                  <input type="text" class="form-control text-uppercase" id="no_cr" name="no_cr" autocomplete="off" placeholder="Nomor CR" required>
                  <div id="validationServer03Feedback" class="invalid-feedback">
                    Maaf No. CR sudah ada.
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="no_batch">Nomor Batch</label>
                <input type="text" class="form-control text-uppercase" id="no_batch" name="no_batch" placeholder="No. Batch" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="tgl_sch">Tanggal Schedule</label>
                <input type="text" class="form-control datepicker" id="tgl_sch" name="tgl_sch" placeholder="Tanggal Schedule" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="size">Size</label>
                <select class="form-control chosen-select" id="size" name="size" required>
                  <option value="" disabled selected hidden>- Size -</option>
                  <?php $size = ["00", "0N", "1N", "2N", "3N", "0RL"];
                  foreach ($size as $sz) { ?>
                    <option value="<?= $sz ?>"><?= $sz ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="kode_warna">Kode Warna Cap</label>
                <!-- <input type="text" class="form-control" id="kode_warna_cap" name="kode_warna" placeholder="Cap" autocomplete="off" required> -->
                <!-- <input type="text" class="form-control" id="kode_warna_body" name="kode_warna" placeholder="Body" autocomplete="off" required> -->
                <select class="form-control chosen-select" id="id_kw_cap" name="id_kw_cap" required>
                  <option value="" disabled selected hidden>- Cap -</option>
                  <?php
                  foreach ($res_kodewarna_cap as $c) {
                  ?>
                    <option data-warna_cap="<?= $c['warna_cap'] ?>" value="<?= $c['id_kw_cap'] ?>"> <?= $c['kode_warna_cap'] ?> | <?= $c['warna_cap'] ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="kode_warna">Kode Warna Body</label>
                <!-- <input type="text" class="form-control" id="kode_warna_cap" name="kode_warna" placeholder="Cap" autocomplete="off" required> -->
                <!-- <input type="text" class="form-control" id="kode_warna_body" name="kode_warna" placeholder="Body" autocomplete="off" required> -->
                <select class="form-control chosen-select" id="id_kw_body" name="id_kw_body" required>
                  <option value="" disabled selected hidden>- Body -</option>
                  <?php
                  foreach ($res_kodewarna_body as $b) {
                  ?>
                    <option data-warna_body="<?= $b['warna_body'] ?>" value="<?= $b['id_kw_body'] ?>"> <?= $b['kode_warna_body'] ?> | <?= $b['warna_body'] ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="mesin">Mesin</label>
                <select class="form-control chosen-select" id="mesin" name="mesin" required>
                  <option value="" disabled selected hidden>- Pilih Mesin -</option>
                  <?php $nama_mesin = ["A", "B", "C", "D", "E", "F", "G", "H", "I"];
                  foreach ($nama_mesin as $nm) { ?>
                    <option value="<?= $nm ?>"><?= $nm ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="print">Print</label>
                <input style="width: 17%;" class="form-check-input" id="cek_print" type="checkbox" name="cek_print">
                <!-- <input class="form-control" id="cek_print1" type="text" name="cek_print1"> -->
                <div id="form_print" class="input-group" style="display: none;">
                  <input type="text" class="form-control text-uppercase" id="print" name="print" placeholder="Print" autocomplete="off">
                  <select class="form-control chosen-select" id="tinta" name="tinta">
                    <option value="" disabled selected hidden>- Pilih Jenis Tinta -</option>
                    <option value="H">Hitam</option>
                    <option value="P">Putih</option>
                    <option value="M">Merah</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="customer">Customer</label>
                <select class="form-control chosen-select" id="id_customer" name="id_customer" required>
                  <option value="" disabled selected hidden>- Pilih Nama Customer -</option>
                  <?php
                  foreach ($res_customer as $s) {
                  ?>
                    <option value="<?= $s['id_customer'] ?>">(<?= $s['kode_customer'] ?>) <?= $s['nama_customer'] ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="jenis_box">Jenis Box</label>
                <select class="form-control chosen-select" id="jenis_box" name="jenis_box" required>
                  <option value="" disabled selected hidden>- Pilih Jenis Box -</option>
                  <option value="C2">C2</option>
                  <option value="D1">D1</option>
                  <option value="D2">D2</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="jenis_zak">Jenis Zak</label>
                <select class="form-control chosen-select" id="jenis_zak" name="jenis_zak" required>
                  <option value="" disabled selected hidden>- Pilih Jenis Zak -</option>
                  <option value="ZAK PLS">Polos</option>
                  <option value="ZAK BRT">Brataco</option>
                  <option value="LOSS">Los</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="minyak">Minyak N-M</label>
                <select class="form-control chosen-select" id="minyak" name="minyak" required>
                  <option value="" disabled selected hidden>- Pilih Minyak -</option>
                  <option value="Non Minyak">Non Minyak</option>
                  <option value="Minyak">Minyak</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="tgl_kirim">Tanggal Kirim</label>
                <input type="text" class="form-control datepicker" id="tgl_kirim" name="tgl_kirim" placeholder="Tanggal Kirim" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="tgl_prd">Tanggal PRD</label>
                <input type="text" class="form-control datepicker" id="tgl_prd" name="tgl_prd" placeholder="Tanggal PRD" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea type="text" class="form-control text-uppercase" id="keterangan" name="keterangan" placeholder="Keterangan" autocomplete="off" required></textarea>
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
    $('#add').on('hidden.bs.modal', function() {
      $(this).find('form')[0].reset();
    });

    uppercase('#no_cr');
    uppercase('#no_batch');
    uppercase('#print');
    uppercase('#keterangan');

    $("#no_cr").keyup(function() {
      var no_cr = $("#no_cr").val();
      jQuery.ajax({
        url: "<?= base_url() ?>Marketing/Tambah_schedule/cek_no_cr",
        dataType: 'text',
        type: "post",
        data: {
          no_cr: no_cr
        },
        success: function(response) {
          if (response == "true") {
            console.log(response);
            $("#no_cr").addClass("is-invalid");
            $("#simpan").attr("disabled", "disabled");
          } else {
            $("#no_cr").removeClass("is-invalid");
            $("#simpan").removeAttr("disabled");
          }
        }
      });
    })

    $('#cek_print').on('click', function() {
      const cek = 1
      const nocek = 0
      if ($('#cek_print').is(':checked')) {
        $('#cek_print').val(cek)
        $('#form_print').show()
        $('#print').attr("required", true);
        $('#tinta').attr("required", true);
      } else {
        $('#cek_print').val(nocek)
        $('#form_print').hide()
        $('#print').attr("required", false);
        $('#tinta').attr("required", false);
      }
    });

    // $('#cek_print').on('click', function() {
    //   const cek = 1
    //   const nocek = 0
    //   if ($('#cek_print').on(':checked')) {
    //     $('#cek_print1').val(cek)
    //   } else {
    //     $('#cek_print1').val(nocek)
    //   }
    // })

    $('#id_kw_cap').on('change', function() {
      const warna = $('#id_kw_cap').find(':selected').attr('data-warna_cap');
      $('#warna_cap').val(warna);
    })

    $('#id_kw_body').on('change', function() {
      const warna = $('#id_kw_body').find(':selected').attr('data-warna_body');
      $('#warna_body').val(warna);
    })

    // $('#kode_warna_cap').on('keyup', function() {
    //   const kodewarna = $(this).val()

    //   if (kodewarna != "") {
    //     jQuery.ajax({
    //       url: `<?= base_url() ?>kode_warna/findcap/${kodewarna}`,
    //       type: 'get',
    //       success: function(response) {
    //         const kode_warna_cap = $('#kode_warna_cap').val()
    //         if (response) {
    //           const data = JSON.parse(response);
    //           $('#warna_cap').val(data.warna)
    //         } else {
    //           $('#warna_cap').val("Not Found Color")
    //         }
    //       }
    //     })
    //   }
    // })

    // $('#kode_warna_body').on('keyup', function() {
    //   const kodewarna = $(this).val()

    //   if (kodewarna != "") {
    //     jQuery.ajax({
    //       url: `<?= base_url() ?>kode_warna/findbody/${kodewarna}`,
    //       type: 'get',
    //       success: function(response) {
    //         const kode_warna_body = $('#kode_warna_body').val()
    //         if (response) {
    //           const data = JSON.parse(response);
    //           $('#warna_body').val(data.warna)
    //         } else {
    //           $('#warna_body').val("Not Found Color")
    //         }
    //       }
    //     })
    //   }
    // })
  })
</script>



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
          <div class="col-md-3">
            <div class="form-group">
              <label for="jumlah">Jumlah</label>
              <input type="text" class="form-control" id="v-jumlah" name="jumlah" placeholder="Jumlah" autocomplete="off" readonly>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="jumlah">Sisa</label>
              <input type="text" class="form-control" id="v-sisa" name="sisa" placeholder="Sisa" autocomplete="off" readonly>
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
          <div class="col-md-3">
            <div class="form-group">
              <label for="jenis_box">Jenis Box</label>
              <input type="text" class="form-control" id="v-jenis_box" name="jenis_box" placeholder="Jenis Box" autocomplete="off" readonly>
            </div>
          </div>
          <div class="col-md-3">
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
          <div class="col-md-3">
            <div class="form-group">
              <label for="tgl_kirim">Tanggal Kirim</label>
              <input type="text" class="form-control" id="v-tgl_kirim" name="tgl_kirim" placeholder="Tanggal Kirim" autocomplete="off" readonly>
            </div>
          </div>
          <div class="col-md-3">
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
      var sisa = $(event.relatedTarget).data('sisa')
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
      $(this).find('#v-sisa').val(sisa)
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

<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Entry Schedule</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>Marketing/Tambah_schedule/update">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="no_cr">Nomor CR</label>
                <input type="hidden" id="e_id_sch" name="id_sch">
                <div class="input-group">
                  <input type="text" class="form-control text-uppercase" id="e_no_cr" name="no_cr" placeholder="Nomor CR" required>
                  <div id="validationServer03Feedback" class="invalid-feedback">
                    Maaf No. CR sudah ada.
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="no_batch">Nomor Batch</label>
                <input type="text" class="form-control text-uppercase" id="e_no_batch" name="no_batch" placeholder="No. Batch" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="tgl_sch">Tanggal Schedule</label>
                <input type="text" class="form-control datepicker" id="e_tgl_sch" name="tgl_sch" placeholder="Tanggal Schedule" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="size">Size</label>
                <select class="form-control chosen-select" id="e_size" name="size" required>
                  <option value="" disabled selected hidden>- Size -</option>
                  <?php $size = ["00", "0N", "1N", "2N", "3N", "0RL"];
                  foreach ($size as $sz) { ?>
                    <option value="<?= $sz ?>"><?= $sz ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="kode_warna">Kode Warna Cap</label>
                <!-- <input type="text" class="form-control" id="kode_warna_cap" name="kode_warna" placeholder="Cap" autocomplete="off" required> -->
                <!-- <input type="text" class="form-control" id="kode_warna_body" name="kode_warna" placeholder="Body" autocomplete="off" required> -->
                <select class="form-control chosen-select" id="e_id_kw_cap" name="id_kw_cap" required>
                  <option value="" disabled selected hidden>- Cap -</option>
                  <?php
                  foreach ($res_kodewarna_cap as $c) {
                  ?>
                    <option data-warna_cap="<?= $c['warna_cap'] ?>" value="<?= $c['id_kw_cap'] ?>"> <?= $c['kode_warna_cap'] ?> | <?= $c['warna_cap'] ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="kode_warna">Kode Warna Body</label>
                <!-- <input type="text" class="form-control" id="kode_warna_cap" name="kode_warna" placeholder="Cap" autocomplete="off" required> -->
                <!-- <input type="text" class="form-control" id="kode_warna_body" name="kode_warna" placeholder="Body" autocomplete="off" required> -->
                <select class="form-control chosen-select" id="e_id_kw_body" name="id_kw_body" required>
                  <option value="" disabled selected hidden>- Body -</option>
                  <?php
                  foreach ($res_kodewarna_body as $b) {
                  ?>
                    <option data-warna_body="<?= $b['warna_body'] ?>" value="<?= $b['id_kw_body'] ?>"> <?= $b['kode_warna_body'] ?> | <?= $b['warna_body'] ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="mesin">Mesin</label>
                <select class="form-control chosen-select" id="e_mesin" name="mesin">
                  <option value="" disabled selected hidden>- Pilih Mesin -</option>
                  <?php $nama_mesin = ["A", "B", "C", "D", "E", "F", "G", "H", "I"];
                  foreach ($nama_mesin as $nm) { ?>
                    <option value="<?= $nm ?>"><?= $nm ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="text" class="form-control" id="e_jumlah" name="jumlah" placeholder="Jumlah" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="jumlah">Sisa</label>
                <input type="text" class="form-control" id="e_sisa" name="sisa" placeholder="Sisa" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="print">Print</label>
                <input type="checkbox" style="width: 17%;" class="form-check-input" id="e_cek_print" name="cek_print">
                <div id="form_print" class="input-group" style="display: none;">
                  <input type="text" class="form-control" id="e_print" name="print" placeholder="Print" autocomplete="off" required>
                  <select class="form-control chosen-select" id="e_tinta" name="tinta" required>
                    <option value="" disabled selected hidden>- Pilih Jenis Tinta -</option>
                    <option value="H">Hitam</option>
                    <option value="P">Putih</option>
                    <option value="M">Merah</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="customer">Customer</label>
                <select class="form-control chosen-select" id="e_id_customer" name="id_customer" required>
                  <option value="" disabled selected hidden>- Pilih Nama Customer -</option>
                  <?php
                  foreach ($res_customer as $s) {
                  ?>
                    <option value="<?= $s['id_customer'] ?>">(<?= $s['kode_customer'] ?>) <?= $s['nama_customer'] ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="jenis_box">Jenis Box</label>
                <select class="form-control chosen-select" id="e_jenis_box" name="jenis_box" required>
                  <option value="" disabled selected hidden>- Pilih Jenis Box -</option>
                  <option value="C2">C2</option>
                  <option value="D1">D1</option>
                  <option value="D2">D2</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="jenis_zak">Jenis Zak</label>
                <select class="form-control chosen-select" id="e_jenis_zak" name="jenis_zak" required>
                  <option value="" disabled selected hidden>- Pilih Jenis Zak -</option>
                  <option value="ZAK PLS">Polos</option>
                  <option value="ZAK BRT">Brataco</option>
                  <option value="LOSS">Los</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="minyak">Minyak N-M</label>
                <select class="form-control chosen-select" id="e_minyak" name="minyak" required>
                  <option value="" disabled selected hidden>- Pilih Minyak -</option>
                  <option value="Non Minyak">Non Minyak</option>
                  <option value="Minyak">Minyak</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="tgl_kirim">Tanggal Kirim</label>
                <input type="text" class="form-control datepicker" id="e_tgl_kirim" name="tgl_kirim" placeholder="Tanggal Kirim" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="tgl_prd">Tanggal PRD</label>
                <input type="text" class="form-control datepicker" id="e_tgl_prd" name="tgl_prd" placeholder="Tanggal PRD" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea type="text" class="form-control text-uppercase" id="e_keterangan" name="keterangan" placeholder="Keterangan" autocomplete="off" required></textarea>
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
    $('#edit').on('show.bs.modal', function(event) {
      var id_sch = $(event.relatedTarget).data('id_sch')
      var no_cr = $(event.relatedTarget).data('no_cr')
      var no_batch = $(event.relatedTarget).data('no_batch')
      var tgl_sch = $(event.relatedTarget).data('tgl_sch')
      var size = $(event.relatedTarget).data('size')
      var id_kw_cap = $(event.relatedTarget).data('id_kw_cap')
      var id_kw_body = $(event.relatedTarget).data('id_kw_body')
      var mesin = $(event.relatedTarget).data('mesin')
      var jumlah = $(event.relatedTarget).data('jumlah')
      var sisa = $(event.relatedTarget).data('sisa')
      var cek_print = $(event.relatedTarget).data('cek_print')
      var print = $(event.relatedTarget).data('print')
      var tinta = $(event.relatedTarget).data('tinta')
      var id_customer = $(event.relatedTarget).data('id_customer')
      var customer = $(event.relatedTarget).data('nama_customer')
      var jenis_box = $(event.relatedTarget).data('jenis_box')
      var jenis_zak = $(event.relatedTarget).data('jenis_zak')
      var minyak = $(event.relatedTarget).data('minyak')
      var tgl_kirim = $(event.relatedTarget).data('tgl_kirim')
      var tgl_prd = $(event.relatedTarget).data('tgl_prd')
      var keterangan = $(event.relatedTarget).data('keterangan')

      $(this).find('#e_id_sch').val(id_sch)
      $(this).find('#e_no_cr').val(no_cr)
      $(this).find('#e_no_batch').val(no_batch)
      $(this).find('#e_tgl_sch').val(tgl_sch)
      $(this).find('#e_size').val(size)
      $(this).find('#e_size').trigger("chosen:updated")
      $(this).find('#e_id_kw_cap').val(id_kw_cap)
      $(this).find('#e_id_kw_cap').trigger("chosen:updated")
      $(this).find('#e_id_kw_body').val(id_kw_body)
      $(this).find('#e_id_kw_body').trigger("chosen:updated")
      $(this).find('#e_mesin').val(mesin)
      $(this).find('#e_mesin').trigger("chosen:updated")
      $(this).find('#e_jumlah').val(jumlah)
      $(this).find('#e_sisa').val(sisa)
      $(this).find('#e_cek_print').val(cek_print)
      $(this).find('#e_cek_print').trigger("chosen:updated")
      $(this).find('#e_print').val(print)
      $(this).find('#e_tinta').val(tinta)
      $(this).find('#e_tinta').trigger("chosen:updated")
      $(this).find('#e_id_customer').val(id_customer)
      $(this).find('#e_id_customer').trigger("chosen:updated")
      $(this).find('#e_jenis_box').val(jenis_box)
      $(this).find('#e_jenis_box').trigger("chosen:updated")
      $(this).find('#e_jenis_zak').val(jenis_zak)
      $(this).find('#e_jenis_zak').trigger("chosen:updated")
      $(this).find('#e_minyak').val(minyak)
      $(this).find('#e_minyak').trigger("chosen:updated")
      $(this).find('#e_tgl_kirim').val(tgl_kirim)
      $(this).find('#e_tgl_prd').val(tgl_prd)
      $(this).find('#e_keterangan').val(keterangan)
      $(this).find('#e_tgl_sch').datepicker().on('show.bs.modal', function(event) {
        event.stopImmediatePropagation();
      });
      $(this).find('#e_tgl_kirim').datepicker().on('show.bs.modal', function(event) {
        event.stopImmediatePropagation();
      });
      $(this).find('#e_tgl_prd').datepicker().on('show.bs.modal', function(event) {
        event.stopImmediatePropagation();
      });
      // $("#e_no_cr").keyup(function() {
      //   var no_cr = $("#e_no_cr").val();
      //   jQuery.ajax({
      //     url: "<?= base_url() ?>tambah_schedule/cek_no_cr",
      //     dataType: 'text',
      //     type: "post",
      //     data: {
      //       no_cr: no_cr
      //     },
      //     success: function(response) {
      //       if (response == "true") {
      //         $("#e_no_cr").addClass("is-invalid");
      //         $("#simpan").attr("disabled", "disabled");
      //       } else {
      //         $("#e_no_cr").removeClass("is-invalid");
      //         $("#simpan").removeAttr("disabled");
      //       }
      //     }
      //   });
      // })
      if (cek_print === 1) {
        $('#edit #form_print').show()
        $('#e_cek_print').attr('checked', true)
      }
      if (cek_print === 0) {
        $('#edit #form_print').hide()
        $('#e_cek_print').attr('checked', false)
      }
    })
    $('#e_id_kw_cap').on('change', function() {
      const warna = $('#e_id_kw_cap').find(':selected').attr('data-warna_cap');
      $('#e_warna_cap').val(warna)
    })

    $('#e_id_kw_body').on('change', function() {
      const warna = $('#e_id_kw_body').find(':selected').attr('data-warna_body');
      $('#e_warna_body').val(warna)
    })

    $('#e_cek_print').on('click', function() {
      const cek = 1
      const nocek = 0
      if ($('#e_cek_print').is(':checked')) {
        $('#e_cek_print').val(cek)
        $('#edit #form_print').show()
        $('#e_print').attr("required", true);
        $('#e_tinta').attr("required", true);
      } else {
        $('#e_cek_print').val(nocek)
        $('#edit #form_print').hide()
        $('#e_print').attr("required", false);
        $('#e_print').val("");
        $('#e_tinta').attr("required", false);
        $('#e_tinta').val("");
      }
    });
  })
</script>