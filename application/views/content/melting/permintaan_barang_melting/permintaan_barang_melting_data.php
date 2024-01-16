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
                  <!-- <h5 class="m-b-10">Data Barang masuk</h5> -->
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Melting</a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Kelola Barang</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('melting/Permintaan_barang_melting') ?>">Permintaan Barang Melting</a></li>
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
                    <h5>Data Permintaan Barang Melting</h5>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#add">
                      <i class="feather icon-plus"></i>Tambah Data
                    </button>
                  </div>
                  <div class="card-block table-border-style">
                    <div class="table-responsive">
                      <table class="table datatable table-hover table-striped table-sm">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Tanggal Permintaan</th>
                            <th>No Transfer Slip</th>
                            <th>Nama Operator</th>
                            <th>Status</th>
                            <th class="text-center">Details</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $level = $this->session->userdata('level');
                          $jabatan = $this->session->userdata('jabatan');
                          $no = 1;
                          foreach ($result as $k) {
                            $tgl =  explode('-', $k['tgl'])[2] . "/" . explode('-', $k['tgl'])[1] . "/" . explode('-', $k['tgl'])[0];
                            // $exp =  explode('-', $k['exp'])[2]."/".explode('-', $k['exp'])[1]."/".explode('-', $k['exp'])[0];
                          ?>
                            <tr>
                              <th scope="row"><?= $no++ ?></th>
                              <td><?= $tgl ?></td>
                              <td><?= $k['no_transfer_slip'] ?></td>
                              <td><?= $k['nama_operator'] ?></td>
                              <td><?= $k['status'] ?></td>
                              <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <button type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#view" data-no_transfer_slip="<?= $k['no_transfer_slip'] ?>" data-l-no_transfer_slip="<?= urlencode($k['no_transfer_slip']) ?>" data-tgl="<?= $tgl ?>" data-nama_operator="<?= $k['nama_operator'] ?>">
                                    <i class="feather icon-eye"></i>Detail
                                  </button>
                                </div>
                              </td>
                              <td class="text-center">
                                <?php if ($jabatan === "admin" || $jabatan === "supervisor") { ?>
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#edit" data-no_transfer_slip="<?= $k['no_transfer_slip'] ?>" data-l-no_transfer_slip="<?= urlencode($k['no_transfer_slip']) ?>" data-tgl="<?= $tgl ?>" data-nama_operator="<?= $k['nama_operator'] ?>">
                                      <i class="feather icon-edit-2"></i>Edit
                                    </button>
                                  </div>
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                    <a type="button" class="btn btn-danger btn-square text-light btn-sm" href="<?= base_url() ?>melting/permintaan_barang_melting/delete/<?= str_replace('/', '--', $k['no_transfer_slip']) ?>" onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
                                      <i class="feather icon-trash-2"></i>Delete
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
    $('#export').click(function() {
      var filter_tgl = $('#filter_tgl').val();
      if (filter_tgl == '') {
        window.location = "<?= base_url() ?>laporan_barang_stok/pdf_laporan_barang_stok";
      } else {
        var url = "<?= base_url() ?>laporan_barang_stok/pdf_laporan_barang_stok/" + filter_tgl.split("/")[2] + "-" + filter_tgl.split("/")[1] + "-" + filter_tgl.split("/")[0];
        window.open(url, 'pdf_laporan_barang_stok', 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
      }
    })

  })
</script>
<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Permintaan Barang Melting</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>melting/Permintaan_barang_melting/add">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="no_transfer_slip">No Transfer Slip</label>
                <!-- <input type="text" class="form-control" id="no_transfer_slip" name="no_transfer_slip" placeholder="No Surat Jalan" maxlength="20" required> -->
                <input type="text" class="form-control text-uppercase" id="no_transfer_slip" name="no_transfer_slip" Value="../XII/2023" maxlength="20" aria-describedby="validationServer03Feedback" autocomplete="off" required>
                <div id="validationServer03Feedback" class="invalid-feedback">
                  Maaf nomor transfer slip sudah ada.
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="tgl">Tanggal Permintaan</label>
                <input type="text" class="form-control datepicker" id="tgl" name="tgl" placeholder="Tanggal Permintaan" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="nama_operator">Nama Operator</label>
                <input type="text" class="form-control" id="nama_operator" name="nama_operator" value="<?= $this->session->userdata('nama_operator') ?>" maxlength="20" readonly>
              </div>
            </div>
          </div>
          <input type="hidden" id="jumlah_batch" name="jumlah_batch" value="1">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="no_batch">No Batch & Nama Barang & Mfg & Exp</label>
                <select class="form-control chosen-select" id="no_batch_add" name="no_batch_add" required>
                  <option disabled selected hidden value="">- Pilih No Batch & Nama Barang & Nama Supplier & Mfg & Exp -</option>
                  <?php
                  foreach ($bm as $s) {
                    $mfg =  explode('-', $s['mfg'])[2] . "/" . explode('-', $s['mfg'])[1] . "/" . explode('-', $s['mfg'])[0];
                    $exp =  explode('-', $s['exp'])[2] . "/" . explode('-', $s['exp'])[1] . "/" . explode('-', $s['exp'])[0];
                  ?>
                    <option data-satuan="<?= $s['satuan'] ?>" value="<?= $s['no_batch'] ?>,<?= $s['nama_barang'] ?>,<?= $s['stok'] ?>,<?= $s['mfg'] ?>,<?= $s['exp'] ?>,<?= $s['id_barang_masuk'] ?>,<?= $s['id_barang'] ?>,<?= $s['id_supplier'] ?>">
                      <?php if ($s['stok'] > 0) { ?>
                        <?= $s['no_batch'] ?> | <?= $s['nama_barang'] ?> | <?= $s['nama_supplier'] ?> | <?= $mfg ?> | <?= $exp ?> </option>
                  <?php } ?>
                <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-2" style="padding-left: 0px;">
              <div class="form-group">
                <label for="qty">Quantity</label>
                <input type="text" class="form-control" id="qty_add" name="qty_add" placeholder="Quantity" onkeypress="return hanyaAngka(event)" maxlength="15" autocomplete="off" required>
              </div>
            </div>
            <div class="col-1" style="padding-left: 0px;">
              <div class="form-group">
                <label for="satuan">Satuan</label>
                <input type="text" class="form-control" id="satuan_add" name="satuan_add" placeholder="Satuan" onkeypress="return hanyaAngka(event)" maxlength="15" autocomplete="off" readonly>
              </div>
            </div>
            <div class="col-1 text-right">
              <a href="javascript:void(0)" id="input" class="btn btn-primary" style="margin-left:-20px;margin-top: 31px;"><b class="text">Input</b></a>
            </div>
          </div>

          <div class="table-responsive">
            <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  <th>No Batch</th>
                  <th>Nama Barang</th>
                  <th>Qty</th>
                  <th>Mfg date</th>
                  <th>Exp date</th>
                  <th class="text-right">Hapus</th>
                </tr>
              </thead>
              <tbody id="insert_batch">
              </tbody>
            </table>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="simpan" class="btn btn-primary" onclick="if (! confirm('Apakah Anda Yakin Untuk Menimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya')) { return false; }">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    uppercase('#no_transfer_slip');

    $("#no_transfer_slip").keyup(function() {
      var no_transfer_slip = $("#no_transfer_slip").val();
      jQuery.ajax({
        url: "<?= base_url() ?>melting/permintaan_barang_melting/cek_transfer_slip",
        dataType: 'text',
        type: "post",
        data: {
          no_transfer_slip: no_transfer_slip
        },
        success: function(response) {
          if (response == "true") {
            $("#no_transfer_slip").addClass("is-invalid");
            $("#simpan").attr("disabled", "disabled");
          } else {
            $("#no_transfer_slip").removeClass("is-invalid");
            $("#simpan").removeAttr("disabled");
          }
        }
      });
    })

    $("select").on('change', function() {
      const selected = $(this).find(':selected').attr('data-satuan')
      satuan = selected.replaceAll(' ', '')
      $('#satuan_add').val(satuan)
    });

    $("#input").click(function() {
      // alert()
      var jumlah = parseInt($("#jumlah_batch").val()); // Ambil jumlah data form pada textbox jumlah-form      
      var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya
      $("#jumlah_batch").val(nextform)

      var batch = $("#no_batch_add").val();
      var no_batch = batch.split(",")[0];
      var nama_barang = batch.split(",")[1];
      var stok = batch.split(",")[2];
      var qty = $("#qty_add").val();
      var mfg = batch.split(",")[3];
      var exp = batch.split(",")[4];
      var id_barang_masuk = batch.split(",")[5];
      var id_barang = batch.split(",")[6];
      var id_supplier = batch.split(",")[7];

      if (qty == '' || qty == '') {
        alert("Quantity tidak Boleh Kosong");
      } else if (batch == '') {
        alert("No Batch tidak Boleh Kosong");
      } else if (stok == '0') {
        alert("Stok Kosong");
      } else if (Number(qty) > Number(stok)) {
        alert("stock tidak mencukupi");
      } else if (insert_batch == '') {
        alert("tidak Boleh Kosong");
      } else {
        // Mfg Format Date
        var e_mfg = mfg.split('-');
        var newMfg = e_mfg[2] + '-' + e_mfg[1] + '-' + e_mfg[0];
        // Exp Format Date
        var e_exp = exp.split('-');
        var newExp = e_exp[2] + '-' + e_exp[1] + '-' + e_exp[0];
        $("#insert_batch").append(`
          <tr id="tr_` + nextform + `">
            <input type="hidden" name="id_barang_masuk[]" value="` + id_barang_masuk + `">
            <input type="hidden" name="id_barang[]" value="` + id_barang + `">
            <input type="hidden" name="id_supplier[]" value="` + id_supplier + `">
            <td>` + no_batch + `<input type="hidden" name="no_batch[]" value="` + no_batch + `"></td>
            <td>` + nama_barang + `</td>
            <td>` + qty + `<input type="hidden" name="qty[]" value="` + qty + `"></td>
            <td>` + newMfg + `</td>
            <td>` + newExp + `</td>
            <td class="text-right"><a href="javascript:void(0)" onclick="remove(` + nextform + `)" class="text-danger"><i class="feather icon-trash-2"></i></a></td>
          </tr>
        `);
      }


      remove = function(param) {
        var p = document.getElementById('insert_batch');
        var e = document.getElementById('tr_' + param);
        p.removeChild(e); //menghapus elemen child dengan id error bila kita menginput nama
      }
    })
    $('#add').on('hidden.bs.modal', function() {
      $(this).find('form')[0].reset();
    });
  })
</script>

<!-- Modal -->
<div class="modal fade" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Permintaan Barang Melting</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>melting/permintaan_barang_melting/update">
        <input type="hidden" id="e_id_barang_masuk" name="id_barang_masuk">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="v-no_transfer_slip">No Transfer Slip</label>
                <input type="text" class="form-control" id="v-no_transfer_slip" name="v-no_transfer_slip" placeholder="No Surat Jalan" maxlength="20" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="tgl">Tanggal Permintaan</label>
                <input type="text" class="form-control" id="v-tgl" name="tgl" placeholder="Tanggal Permintaan" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="v-nama_operator">Nama Operator</label>
                <input type="text" class="form-control" id="v-nama_operator" name="v-nama_operator" placeholder="Nama operator" maxlength="20" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <!-- <div class="form-group">
              <label for="tgl">Tanggal Kadaluarsa</label>
              <input type="text" class="form-control" id="v-exp" name="exp"  placeholder="Tanggal Kadaluarsa" readonly>
            </div> -->
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  <th>No Batch</th>
                  <th>Nama Barang</th>
                  <th>Nama Supplier</th>
                  <th class="text-right">Qty</th>
                  <th class="text-right">Mfg date</th>
                  <th class="text-right">Exp date</th>
                </tr>
              </thead>
              <tbody id="v-barang_keluar">
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('#view').on('show.bs.modal', function(event) {
      var no_transfer_slip = $(event.relatedTarget).data('no_transfer_slip')
      var l_no_transfer_slip = $(event.relatedTarget).data('l-no_transfer_slip')
      var tgl = $(event.relatedTarget).data('tgl')
      var nama_operator = $(event.relatedTarget).data('nama_operator')
      var note = $(event.relatedTarget).data('note')


      $(this).find('#v-no_transfer_slip').val(no_transfer_slip)
      $(this).find('#v-tgl').val(tgl)
      $(this).find('#v-nama_operator').val(nama_operator)
      $(this).find('#v-note').val(note)
      jQuery.ajax({
        url: "<?= base_url() ?>melting/permintaan_barang_melting/data_permintaan_barang",
        dataType: 'json',
        type: "post",
        data: {
          no_transfer_slip: no_transfer_slip
        },
        success: function(response) {
          var data = response;
          var $id = $('#v-barang_keluar');
          $id.empty();
          for (var i = 0; i < data.length; i++) {
            var exp = data[i].exp.split("-")[2] + "/" + data[i].exp.split("-")[1] + "/" + data[i].exp.split("-")[0]
            var mfg = data[i].mfg.split("-")[2] + "/" + data[i].mfg.split("-")[1] + "/" + data[i].mfg.split("-")[0]
            $id.append(`
              <tr>
                <td>` + data[i].no_batch + `</td>
                <td>` + data[i].nama_barang + `</td>
                <td>` + data[i].nama_supplier + `</td>
                <td class="text-right">` + data[i].qty + data[i].satuan + `</td>
                <td class="text-right">` + mfg + `</td>
                <td class="text-right">` + exp + `</td>
              </tr>
            `);
          }
        }
      });
    })
  })
</script>

<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Permintaan Barang Melting</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>melting/Permintaan_barang_melting/update">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="no_transfer_slip">No Transfer Slip</label>
                <input type="text" class="form-control" id="e-no_transfer_slip" name="no_transfer_slip" maxlength="20" aria-describedby="validationServer03Feedback" autocomplete="off" required>
                <div id="validationServer03Feedback" class="invalid-feedback">
                  Maaf nomor transfer slip sudah ada.
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="tgl">Tanggal masuk</label>
                <input type="text" class="form-control datepicker" id="e-tgl" name="tgl" placeholder="Tanggal masuk" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="nama_operator">Nama Operator</label>
                <input type="text" class="form-control" id="nama_operator" name="nama_operator" value="<?= $this->session->userdata('nama_operator') ?>" maxlength="20" readonly>
              </div>
            </div>
          </div>

          <div class="table-responsive">
            <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  <th>No Batch</th>
                  <th>Nama Barang</th>
                  <th>Qty</th>
                  <th>Mfg date</th>
                  <th>exp date</th>
                  <th class="text-right">Hapus</th>
                </tr>
              </thead>
              <tbody id="e-barang_melting">
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="simpan" class="btn btn-primary" onclick="if (! confirm('Apakah Anda Yakin Untuk Menimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya')) { return false; }">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#edit').on('show.bs.modal', function(event) {
      var no_transfer_slip = $(event.relatedTarget).data('no_transfer_slip')
      var l_no_transfer_slip = $(event.relatedTarget).data('l-no_transfer_slip')
      var tgl = $(event.relatedTarget).data('tgl')
      var nama_operator = $(event.relatedTarget).data('nama_operator')
      var note = $(event.relatedTarget).data('note')

      $(this).find('#e-no_transfer_slip').val(no_transfer_slip)
      $(this).find('#e-tgl').val(tgl)
      $(this).find('#e-nama_operator').val(nama_operator)
      $(this).find('#e-note').val(note)
      $(this).find('#e-tgl').datepicker().on('show.bs.modal', function(event) {
        event.stopImmediatePropagation();
      });
      jQuery.ajax({
        url: "<?= base_url() ?>melting/Permintaan_barang_melting/data_permintaan_barang",
        dataType: 'json',
        type: "post",
        data: {
          no_transfer_slip: no_transfer_slip
        },
        success: function(response) {
          var data = response;
          var $id = $('#e-barang_melting');
          $id.empty();
          for (var i = 0; i < data.length; i++) {
            var exp = data[i].exp.split("-")[2] + "/" + data[i].exp.split("-")[1] + "/" + data[i].exp.split("-")[0]
            var mfg = data[i].mfg.split("-")[2] + "/" + data[i].mfg.split("-")[1] + "/" + data[i].mfg.split("-")[0]
            $id.append(`
              <tr>
                <td>` + data[i].no_batch + `</td>
                <td>` + data[i].nama_barang + `</td>
                <td>` + data[i].nama_supplier + `</td>
                <td class="text-right">` + data[i].qty + data[i].satuan + `</td>
                <td class="text-right">` + mfg + `</td>
                <td class="text-right">` + exp + `</td>
              </tr>
            `);
          }
        }
      });
    })
  })
</script>