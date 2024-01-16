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
                  <!-- <h5 class="m-b-10">Data Barang Masuk</h5> -->
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Melting</a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Kelola Barang</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('melting/Barang_masuk_melting/Bm_bahan_tambahan/Mm_bt_td') ?>">Barang Masuk Melting</a></li>
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
                    <h5>Data Barang Masuk <b>(Melting)</b></h5>
                    <div class="btn-group">
                      <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Jenis Bahan
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?= base_url('melting/Barang_masuk_melting/mm_bahan_baku') ?>">Bahan Baku</a>
                        <a class="dropdown-item" href="<?= base_url('melting/Barang_masuk_melting/mm_pel') ?>">Pelarut</a>
                        <a class="dropdown-item" href="<?= base_url('melting/Barang_masuk_melting/mm_pw') ?>">Pewarna</a>
                        <a class="dropdown-item" href="<?= base_url('melting/Barang_masuk_melting/mm_tp') ?>">Tinta Print</a>
                        <a class="dropdown-item" href="<?= base_url('melting/Barang_masuk_melting/Bm_bahan_tambahan/mm_bt_nb') ?>">Bahan Tambahan</a>
                      </div>
                    </div><br>
                    <h5><b>Bahan Tambahan (Titanium Dioxide)</b></h5> <br>
                    <div class="btn-group">
                      <button type="button" class="btn btn-dark btn-outline-warning btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Jenis Bahan Tambahan
                      </button>
                      <div class="dropdown-menu scrollable-menu" role="menu">
                        <a class="dropdown-item" href="<?= base_url('melting/Barang_masuk_melting/Bm_bahan_tambahan/mm_bt_nb') ?>">Natrium Benzoat</a>
                        <a class="dropdown-item" href="<?= base_url('melting/Barang_masuk_melting/Bm_bahan_tambahan/mm_bt_mp') ?>">Methyl Paraben</a>
                        <a class="dropdown-item" href="<?= base_url('melting/Barang_masuk_melting/Bm_bahan_tambahan/mm_bt_la') ?>">Lecithin Adlec</a>
                        <a class="dropdown-item" href="<?= base_url('melting/Barang_masuk_melting/Bm_bahan_tambahan/mm_bt_csf') ?>">Candurin Silver Fine</a>
                        <a class="dropdown-item" href="<?= base_url('melting/Barang_masuk_melting/Bm_bahan_tambahan/mm_bt_sls') ?>">Sodium Launil Sulfat</a>
                        <a class="dropdown-item" href="<?= base_url('melting/Barang_masuk_melting/Bm_bahan_tambahan/mm_bt_td') ?>">Titanium Dioxide</a>
                      </div>
                    </div><br>
                  </div>
                  <div class="card-block table-border-style">
                    <div class="table-responsive">
                      <table class="table datatable table-hover table-striped table-sm">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>No. Transfer Slip</th>
                            <th>No Batch</th>
                            <th>Nama Barang</th>
                            <th class="text-right">Qty</th>
                            <th class="text-right">Barang Keluar</th>
                            <th class="text-right">Stok</th>
                            <th class="text-right">Details</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $no = 1;
                          foreach ($result as $k) {
                            $tgl =  explode('-', $k['tgl'])[2] . "/" . explode('-', $k['tgl'])[1] . "/" . explode('-', $k['tgl'])[0];
                            $exp =  explode('-', $k['exp'])[2] . "/" . explode('-', $k['exp'])[1] . "/" . explode('-', $k['exp'])[0];
                            $mfg =  explode('-', $k['mfg'])[2] . "/" . explode('-', $k['mfg'])[1] . "/" . explode('-', $k['mfg'])[0];
                          ?>
                            <?php if ($k['sisa'] !== 0) { ?>
                              <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $tgl ?></td>
                                <td><?= $k['no_transfer_slip'] ?></td>
                                <td><?= $k['no_batch'] ?></td>
                                <td><?= $k['nama_barang'] ?></td>
                                <td class="text-right"><?= $k['masuk'] ?><?= $k['satuan'] ?></td>
                                <td class="text-right"><?= $k['keluar'] ?><?= $k['satuan'] ?></td>
                                <td class="text-right"><?= $k['sisa'] ?><?= $k['satuan'] ?></td>
                                <td class="text-right">
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#detail" data-no_surat_jalan="<?= $k['no_surat_jalan'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-tgl="<?= $tgl ?>" data-nama_barang="<?= $k['nama_barang'] ?>" data-nama_supplier="<?= $k['nama_supplier'] ?>" data-op_gudang="<?= $k['op_gudang'] ?>" data-dok_pendukung="<?= $k['dok_pendukung'] ?>" data-jenis_kemasan="<?= $k['jenis_kemasan'] ?>" data-jml_kemasan="<?= $k['jml_kemasan'] ?>" data-tutup="<?= $k['tutup'] ?>" data-wadah="<?= $k['wadah'] ?>" data-label="<?= $k['label'] ?>" data-qty="<?= $k['qty'] ?>" data-exp="<?= $exp ?>" data-mfg="<?= $mfg ?>">
                                      <i class="feather icon-eye"></i>Details
                                    </button>
                                  </div>
                                </td>
                              </tr>
                            <?php } ?>
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
<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Barang Masuk <b>Melting</b> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <form>
          <input type="hidden" id="v-id_barang_masuk" name="id_barang_masuk">
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="v-no_batch">No Batch</label>
              <input type="text" class="form-control" id="v-no_batch" name="v-no_batch" placeholder="No Batch" maxlength="20" readonly>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="no_surat_jalan">No. Po</label>
              <input type="text" class="form-control" id="v-no_surat_jalan" name="no_surat_jalan" placeholder="No. Po" readonly>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="v-tgl">Tanggal Masuk</label>
              <input type="text" class="form-control" id="v-tgl" name="tgl" placeholder="Tanggal Masuk" maxlength="20" readonly>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="nama_barang">Nama Barang</label>
              <input type="text" class="form-control" id="v-nama_barang" name="nama_barang" placeholder="Nama Barang" readonly>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="nama_supplier">Nama Supllier</label>
              <input type="text" class="form-control" id="v-nama_supplier" name="nama_supplier" placeholder="Nama Supplier" readonly>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="op_gudang">Nama Operator</label>
              <input type="text" class="form-control" id="v-op_gudang" name="op_gudang" placeholder="Nama Operator" readonly>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="dok_pendukung">Dokumen Pendukung</label>
              <input type="text" class="form-control" id="v-dok_pendukung" name="dok_pendukung[]" placeholder="Dok. Pendukung" readonly>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="jenis_kemasan">Jenis Kemasan</label>
              <input type="text" class="form-control" id="v-jenis_kemasan" name="jenis_kemasan" placeholder="Jenis Kemasan" readonly>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="jml_kemasan">Jumlah Kemasan</label>
              <input type="text" class="form-control" id="v-jml_kemasan" name="jml_kemasan" placeholder="Jumlah Kemasan" readonly>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="qty">Jumlah Bahan</label>
              <input type="text" class="form-control" id="v-qty" name="qty" placeholder="Jumlah Bahan" readonly>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="v-exp">Expaired</label>
              <input type="text" class="form-control" id="v-exp" name="exp" placeholder="Expired" readonly>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="mfg">Mfg. date</label>
              <input type="text" class="form-control" id="v-mfg" name="mfg" placeholder="Mfg" readonly>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#detail').on('show.bs.modal', function(event) {
      var id_barang_masuk = $(event.relatedTarget).data('id_barang_masuk')
      var no_surat_jalan = $(event.relatedTarget).data('no_surat_jalan')
      var no_batch = $(event.relatedTarget).data('no_batch')
      var tgl = $(event.relatedTarget).data('tgl')
      var nama_barang = $(event.relatedTarget).data('nama_barang')
      var nama_supplier = $(event.relatedTarget).data('nama_supplier')
      var op_gudang = $(event.relatedTarget).data('op_gudang')
      var dok_pendukung = $(event.relatedTarget).data('dok_pendukung')
      var jenis_kemasan = $(event.relatedTarget).data('jenis_kemasan')
      var jml_kemasan = $(event.relatedTarget).data('jml_kemasan')
      var tutup = $(event.relatedTarget).data('tutup')
      var wadah = $(event.relatedTarget).data('wadah')
      var label = $(event.relatedTarget).data('label')
      var qty = $(event.relatedTarget).data('qty')
      var exp = $(event.relatedTarget).data('exp')
      var mfg = $(event.relatedTarget).data('mfg')

      $(this).find('#v-id_barang_masuk').val(id_barang_masuk)
      $(this).find('#v-no_surat_jalan').val(no_surat_jalan)
      $(this).find('#v-no_batch').val(no_batch)
      $(this).find('#v-tgl').val(tgl)
      $(this).find('#v-nama_barang').val(nama_barang)
      $(this).find('#v-nama_supplier').val(nama_supplier)
      $(this).find('#v-op_gudang').val(op_gudang)
      $(this).find('#v-dok_pendukung').val(dok_pendukung)
      $(this).find('#v-jenis_kemasan').val(jenis_kemasan)
      $(this).find('#v-jml_kemasan').val(jml_kemasan)
      $(this).find('#v-tutup').val(tutup)
      $(this).find('#v-wadah').val(wadah)
      $(this).find('#v-label').val(label)
      $(this).find('#v-qty').val(qty)
      $(this).find('#v-exp').val(exp)
      $(this).find('#v-mfg').val(mfg)

    })

  })
</script>

<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Barang Masuk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>barang_masuk/update">
        <input type="hidden" id="e_id_barang_masuk" name="id_barang_masuk">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="no_batch">No Batch</label>
                <input type="text" class="form-control" id="e_no_batch" name="no_batch" placeholder="No Batch" maxlength="20" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="no_surat_jalan">No. Po</label>
                <!-- <input type="text" class="form-control" id="no_surat_jalan" name="no_surat_jalan" placeholder="No Surat Jalan" maxlength="20" required> -->
                <input type="text" class="form-control" id="e_no_surat_jalan" name="no_surat_jalan" maxlength="20" aria-describedby="validationServer03Feedback" autocomplete="off" required>
                <div id="validationServer03Feedback" class="invalid-feedback">
                  Maaf nomor transfer slip sudah ada.
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="tgl">Tanggal Masuk</label>
                <input type="text" class="form-control datepicker" id="e_tgl" name="tgl" placeholder="Tanggal Masuk" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="id_barang">Nama Barang</label>
                <input type="text" class="form-control" id="e_id_barang" name="id_barang" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="id_supplier">Nama Supllier</label>
                <input type="text" class="form-control" id="e_id_supplier" name="id_supplier" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="op_gudang">Nama Operator</label>
                <input type="text" class="form-control" id="e_op_gudang" name="op_gudang" value="<?= $this->session->userdata('op_gudang') ?>" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="dok_pendukung">Dokumen Pendukung</label>
                <input type="text" class="form-control" id="e_dok_pendukung" name="dok_pendukung[]" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="jenis_kemasan">Jenis Kemasan</label>
                <input type="text" class="form-control" id="e_jenis_kemasan" name="jenis_kemasan" readonly>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="jml_kemasan">Jumlah Kemasan</label>
                <input type="text" class="form-control" id="e_jml_kemasan" name="jml_kemasan" placeholder="Jumlah Kemasan" onkeypress="return hanyaAngka(event)" maxlength="15" autocomplete="off" required>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="qty">Jumlah Bahan</label>
                <input type="text" class="form-control" id="e_qty" name="qty" placeholder="Jumlah Kemasan" onkeypress="return hanyaAngka(event)" maxlength="15" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exp">Exp Date</label>
                <input type="text" class="form-control datepicker" id="e_exp" name="exp" placeholder="Tanggal Kadaluarsa" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="mfg">Mfg. Date</label>
                <input type="text" class="form-control datepicker" id="e_mfg" name="mfg" placeholder="Tanggal Kadaluarsa" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <center><label for="pemeriksaan"><b>Hasil Pemeriksaan Fisik Kemasan</b></label></center>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="form-check-label">Tutup</label><br>
                      <input type="text" class="form-control" id="e_tutup" name="tutup" readonly>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="form-check-label">Wadah</label><br>
                      <input type="text" class="form-control" id="e_wadah" name="wadah" readonly>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="form-check-label">Label</label><br>
                      <input type="text" class="form-control" id="e_label" name="label" readonly>
                    </div>
                  </div>
                </div>
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
    $("#no_surat_jalan").keyup(function() {
      var no_surat_jalan = $("#no_surat_jalan").val();
      jQuery.ajax({
        url: "<?= base_url() ?>barang_masuk/cek_surat_jalan",
        dataType: 'text',
        type: "post",
        data: {
          no_surat_jalan: no_surat_jalan
        },
        success: function(response) {
          if (response == "true") {
            $("#no_surat_jalan").addClass("is-invalid");
            $("#simpan").attr("disabled", "disabled");
          } else {
            $("#no_surat_jalan").removeClass("is-invalid");
            $("#simpan").removeAttr("disabled");
          }
        }
      });
    })
  })

  $(document).ready(function() {
    $('#edit').on('show.bs.modal', function(event) {
      var id_barang_masuk = $(event.relatedTarget).data('id_barang_masuk')
      var no_surat_jalan = $(event.relatedTarget).data('no_surat_jalan')
      var no_batch = $(event.relatedTarget).data('no_batch')
      var tgl = $(event.relatedTarget).data('tgl')
      var id_barang = $(event.relatedTarget).data('id_barang')
      var id_supplier = $(event.relatedTarget).data('id_supplier')
      var op_gudang = $(event.relatedTarget).data('op_gudang')
      var dok_pendukung = $(event.relatedTarget).data('dok_pendukung')
      var jenis_kemasan = $(event.relatedTarget).data('jenis_kemasan')
      var jml_kemasan = $(event.relatedTarget).data('jml_kemasan')
      var tutup = $(event.relatedTarget).data('tutup')
      var wadah = $(event.relatedTarget).data('wadah')
      var label = $(event.relatedTarget).data('label')
      var qty = $(event.relatedTarget).data('qty')
      var exp = $(event.relatedTarget).data('exp')
      var mfg = $(event.relatedTarget).data('mfg')

      $(this).find('#e_id_barang_masuk').val(id_barang_masuk)
      $(this).find('#e_no_surat_jalan').val(no_surat_jalan)
      $(this).find('#e_no_batch').val(no_batch)
      $(this).find('#e_tgl').val(tgl)
      $(this).find('#e_id_barang').val(id_barang)
      $(this).find('#e_id_supplier').val(id_supplier)
      $(this).find('#e_op_gudang').val(op_gudang)
      $(this).find('#e_dok_pendukung').val(dok_pendukung)
      $(this).find('#e_jenis_kemasan').val(jenis_kemasan)
      $(this).find('#e_jml_kemasan').val(jml_kemasan)
      $(this).find('#e_tutup').val(tutup)
      $(this).find('#e_wadah').val(wadah)
      $(this).find('#e_label').val(label)
      $(this).find('#e_qty').val(qty)
      $(this).find('#e_exp').val(exp)
      $(this).find('#e_mfg').val(mfg)
      $(this).find('#e_tgl').datepicker().on('show.bs.modal', function(event) {
        // prevent datepicker from firing bootstrap modal "show.bs.modal"
        event.stopPropagation();
      });
      $(this).find('#e_exp').datepicker().on('show.bs.modal', function(event) {
        // prevent datepicker from firing bootstrap modal "show.bs.modal"
        event.stopPropagation();
      });
      $(this).find('#e_mfg').datepicker().on('show.bs.modal', function(event) {
        // prevent datepicker from firing bootstrap modal "show.bs.modal"
        event.stopPropagation();

      });


    })
  })
</script>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="exampleFormControlInput1">Text</label>
            <input type="text" class="form-control datepicker" id="" placeholder="text">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Email address</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Example select</label>
            <select class="form-control chosen-select" id="exampleFormControlSelect1">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="1">1</option>
              <option value="2">2</option>

              <option value="1">1</option>
              <option value="2">2</option>
              <option value="1">1</option>
              <option value="2">2</option>

            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect2">Example multiple select</label>
            <select multiple class="form-control" id="exampleFormControlSelect2">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Example textarea</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>