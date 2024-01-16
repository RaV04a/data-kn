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
                  <li class="breadcrumb-item"><a href="javascript:">Gudang Bahan Baku</a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Kelola Barang</a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Permintaan Barang Gudang</a></li>
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
                    <h5>Data Permintaan Barang Gudang</h5>
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
                            <th>Tanggal Keluar</th>
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
                                  <button type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#view" data-no_transfer_slip="<?= $k['no_transfer_slip'] ?>" ; data-l-no_transfer_slip="<?= urlencode($k['no_transfer_slip']) ?>" data-tgl="<?= $tgl ?>" data-nama_operator="<?= $k['nama_operator'] ?>" data-note="<?= $k['note'] ?>">
                                    <i class="feather icon-eye"></i>Detail
                                  </button>
                                </div>
                              </td>
                              <td class="text-center">
                                <?php if ($jabatan === "supervisor" || $jabatan === "admin") { ?>
                                  <?php if ($k['status'] === "Proses") { ?>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                      <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#disetujui" data-no_transfer_slip="<?= $k['no_transfer_slip'] ?>" ; data-l-no_transfer_slip="<?= urlencode($k['no_transfer_slip']) ?>" data-tgl="<?= $tgl ?>" data-nama_operator="<?= $k['nama_operator'] ?>" data-note="<?= $k['note'] ?>">
                                        <i class=" feather icon-edit-2"></i>DiSetujui
                                      </button>
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                      <button type="button" class="btn btn-danger btn-square btn-sm" data-toggle="modal" data-target="#tidakdisetujui" data-no_transfer_slip="<?= $k['no_transfer_slip'] ?>" ; data-l-no_transfer_slip="<?= urlencode($k['no_transfer_slip']) ?>" data-tgl="<?= $tgl ?>" data-nama_operator="<?= $k['nama_operator'] ?>" data-note="<?= $k['note'] ?>">
                                        <i class=" feather icon-edit-2"></i>Tidak DiSetujui
                                      </button>
                                    </div>
                                  <?php } ?>
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
<!-- Modal -->
<div class="modal fade" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Permintaan Barang Gudang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>">
        <input type="hidden" id="e_id_barang_masuk" name="id_barang_masuk">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="v-no_transfer_slip">No Transfer Slip</label>
                <input type="text" class="form-control" id="v-no_transfer_slip" name="no_transfer_slip" placeholder="No Surat Jalan" maxlength="20" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="tgl">Tanggal Keluar</label>
                <input type="text" class="form-control" id="v-tgl" name="tgl" placeholder="Tanggal Keluar" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="v-nama_operator">Nama Operator</label>
                <input type="text" class="form-control" id="v-nama_operator" name="nama_operator" placeholder="No Surat Jalan" maxlength="20" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <!-- <div class="form-group">
              <label for="tgl">Tanggal Kadaluarsa</label>
              <input type="text" class="form-control" id="v-exp" name="exp"  placeholder="Tanggal Kadaluarsa" readonly>
            </div> -->
            </div>
            <!-- <div class="col-md-12">
              <div class="form-group">
                <label for="v-note">Keterangan</label>
                <textarea class="form-control" id="v-note" name="note" rows="3" readonly></textarea>
              </div>
            </div> -->
          </div>
          <div class="table-responsive">
            <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  <th>No Batch</th>
                  <th>Nama Barang</th>
                  <th>Nama Supplier</th>
                  <th class="text-center">Qty</th>
                  <th class="text-center">Mfg.</th>
                  <th class="text-center">Exp.</th>
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
      // var exp = $(event.relatedTarget).data('exp') 
      var note = $(event.relatedTarget).data('note')


      $(this).find('#v-no_transfer_slip').val(no_transfer_slip)
      $(this).find('#v-tgl').val(tgl)
      $(this).find('#v-nama_operator').val(nama_operator)
      // $(this).find('#v-exp').val(exp)
      $(this).find('#v-note').val(note)
      jQuery.ajax({
        url: "<?= base_url() ?>gudang_bahanbaku/permintaan_barang_gudang/data_permintaan_barang",
        dataType: 'json',
        type: "post",
        data: {
          no_transfer_slip: no_transfer_slip
        },
        success: function(response) {
          var data = response;
          // alert(JSON.stringify(data))
          var $id = $('#v-barang_keluar');
          $id.empty();
          // $id.append('<option value=0>- Pilih Prioritas Kegiatan -</option>');
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
      // $(this).find('#e_tgl').datepicker().on('show.bs.modal', function(event) {
      //   // prevent datepicker from firing bootstrap modal "show.bs.modal"
      //   event.stopPropagation();
      // });
    })

  })
</script>

<div class="modal fade" id="disetujui" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DiSetujui Permintaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>gudang_bahanbaku/Permintaan_barang_gudang/disetujui">
        <input type="hidden" id="e_id_barang_masuk" name="id_barang_masuk">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="v-no_transfer_slip">No Transfer Slip</label>
                <input type="text" class="form-control" id="v-no_transfer_slip" name="no_transfer_slip" placeholder="No Surat Jalan" maxlength="20" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="tgl">Tanggal Keluar</label>
                <input type="text" class="form-control" id="v-tgl" name="tgl" placeholder="Tanggal Keluar" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="v-nama_operator">Nama Operator</label>
                <input type="text" class="form-control" id="v-nama_operator" name="nama_operator" placeholder="No Surat Jalan" maxlength="20" readonly>
              </div>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  <th>No Batch</th>
                  <th>Nama Barang</th>
                  <th>Nama Supplier</th>
                  <th class="text-center">Qty</th>
                  <th class="text-center">Mfg.</th>
                  <th class="text-center">Exp.</th>
                </tr>
              </thead>
              <tbody id="approv_per">
              </tbody>
            </table>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="tgl_rilis" class="mt-2 font-weight-bold">Tanggal DiSetujui</label><br>
              <input type="text" class="form-control datepicker" id="tgl_rilis" name="tgl_rilis" placeholder="Tanggal DiSetujui" autocomplete="off" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="simpan" class="btn btn-success" onclick="if (! confirm('Apakah Anda Yakin Untuk Menyimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Tanggalnya')) { return false; }">DiSetujui</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#disetujui').on('show.bs.modal', function(event) {
      var id_barang_masuk = $(event.relatedTarget).data('id_barang_masuk')
      var no_transfer_slip = $(event.relatedTarget).data('no_transfer_slip')
      var l_no_transfer_slip = $(event.relatedTarget).data('l-no_transfer_slip')
      var tgl = $(event.relatedTarget).data('tgl')
      var nama_operator = $(event.relatedTarget).data('nama_operator')
      // var exp = $(event.relatedTarget).data('exp') 
      var note = $(event.relatedTarget).data('note')


      $(this).find('#e_id_barang_masuk').val(id_barang_masuk)
      $(this).find('#v-no_transfer_slip').val(no_transfer_slip)
      $(this).find('#v-tgl').val(tgl)
      $(this).find('#v-nama_operator').val(nama_operator)
      // $(this).find('#v-exp').val(exp)
      $(this).find('#v-note').val(note)
      $(this).find('#tgl_rilis').datepicker({
        autoclose: true,
        format: "dd/mm/yyyy"
      }).on('show.bs.modal', function(event) {
        event.stopPropagation();
      });
      jQuery.ajax({
        url: "<?= base_url() ?>gudang_bahanbaku/permintaan_barang_gudang/data_permintaan_barang",
        dataType: 'json',
        type: "post",
        data: {
          no_transfer_slip: no_transfer_slip
        },
        success: function(response) {
          var data = response;
          // alert(JSON.stringify(data))
          var $id = $('#approv_per');
          $id.empty();
          // $id.append('<option value=0>- Pilih Prioritas Kegiatan -</option>');
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
      // $(this).find('#e_tgl').datepicker().on('show.bs.modal', function(event) {
      //   // prevent datepicker from firing bootstrap modal "show.bs.modal"
      //   event.stopPropagation();
      // });
    })

  })
</script>

<div class="modal fade" id="tidakdisetujui" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tidak DiSetujui Permintaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>gudang_bahanbaku/Permintaan_barang_gudang/ditolak">
        <input type="hidden" id="e_id_barang_masuk" name="id_barang_masuk">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="v-no_transfer_slip">No Transfer Slip</label>
                <input type="text" class="form-control" id="v-no_transfer_slip" name="no_transfer_slip" placeholder="No Surat Jalan" maxlength="20" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="tgl">Tanggal Keluar</label>
                <input type="text" class="form-control" id="v-tgl" name="tgl" placeholder="Tanggal Keluar" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="v-nama_operator">Nama Operator</label>
                <input type="text" class="form-control" id="v-nama_operator" name="nama_operator" placeholder="No Surat Jalan" maxlength="20" readonly>
              </div>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  <th>No Batch</th>
                  <th>Nama Barang</th>
                  <th>Nama Supplier</th>
                  <th class="text-center">Qty</th>
                  <th class="text-center">Mfg.</th>
                  <th class="text-center">Exp.</th>
                </tr>
              </thead>
              <tbody id="reject_per">
              </tbody>
            </table>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="tgl_rilis" class="mt-2 font-weight-bold">Tanggal Tidak DiSetujui</label><br>
              <input type="text" class="form-control datepicker" id="tgl_reject" name="tgl_reject" placeholder="Tanggal Tidak DiSetujui" autocomplete="off" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="simpan" class="btn btn-danger" onclick="if (! confirm('Apakah Anda Yakin Untuk Menyimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Tanggalnya')) { return false; }">Tidak DiSetujui</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#tidakdisetujui').on('show.bs.modal', function(event) {
      var no_transfer_slip = $(event.relatedTarget).data('no_transfer_slip')
      var l_no_transfer_slip = $(event.relatedTarget).data('l-no_transfer_slip')
      var tgl = $(event.relatedTarget).data('tgl')
      var nama_operator = $(event.relatedTarget).data('nama_operator')
      // var exp = $(event.relatedTarget).data('exp') 
      var note = $(event.relatedTarget).data('note')


      $(this).find('#v-no_transfer_slip').val(no_transfer_slip)
      $(this).find('#v-tgl').val(tgl)
      $(this).find('#v-nama_operator').val(nama_operator)
      // $(this).find('#v-exp').val(exp)
      $(this).find('#v-note').val(note)
      $(this).find('#tgl_reject').datepicker({
        autoclose: true,
        format: "dd/mm/yyyy"
      }).on('show.bs.modal', function(event) {
        event.stopPropagation();
      });
      jQuery.ajax({
        url: "<?= base_url() ?>gudang_bahanbaku/permintaan_barang_gudang/data_permintaan_barang",
        dataType: 'json',
        type: "post",
        data: {
          no_transfer_slip: no_transfer_slip
        },
        success: function(response) {
          var data = response;
          // alert(JSON.stringify(data))
          var $id = $('#reject_per');
          $id.empty();
          // $id.append('<option value=0>- Pilih Prioritas Kegiatan -</option>');
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
      // $(this).find('#e_tgl').datepicker().on('show.bs.modal', function(event) {
      //   // prevent datepicker from firing bootstrap modal "show.bs.modal"
      //   event.stopPropagation();
      // });
    })

  })
</script>