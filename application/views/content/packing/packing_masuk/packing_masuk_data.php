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
                  <li class="breadcrumb-item"><a href="javascript:">Packing</a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Kelola Barang</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('packing/packing_masuk') ?>">Packing Masuk</a></li>
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
                    <h5>Data Packing Masuk</h5>

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
                            <th>No</th>
                            <th>Size</th>
                            <th>Kode C</th>
                            <th>kode B</th>
                            <th>Warna C</th>
                            <th>Warna B</th>
                            <th>Packing</th>
                            <th>Batch</th>
                            <th>Print</th>
                            <th class="text-right">Jumlah</th>
                            <th class="text-center">Sak/Los</th>
                            <th class="text-center">Status SK</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $level = $this->session->userdata('level');
                          $no = 1;
                          foreach ($result as $k) {
                        
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
                              <td><?= $k['status_sk'] ?></td>
                              <td class="text-center">
                                  <?php if ($k['status_sk'] === "blm_sk") {?>
                                      <div class="btn-group" role="group" aria-label="Basic example">
                                          <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#stock_keeper" data-id_pack="<?= $k['id_pack'] ?>" data-no_msk="<?= $k['no_msk'] ?>" data-size="<?= $k['size'] ?>" data-kw_cap="<?= $k['kw_cap'] ?>" data-kw_body="<?= $k['kw_body'] ?>" data-warna_cap="<?= $k['warna_cap'] ?>" data-warna_body="<?= $k['warna_body'] ?>" data-no_packing="<?= $k['no_packing'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-print="<?= $k['print'] ?>" data-jumlah="<?= $k['jumlah'] ?>" data-jenis_pack="<?= $k['jenis_pack'] ?>" data-status_sk="<?= $k['status_sk'] ?>">
                                            <i class="feather icon-edit-2"></i>SK
                                          </button>
                                      </div>
                                      <?php } ?>
                                      <?php if ($k['status_sk'] === "admin") {?>
                                      <div class="btn-group" role="group" aria-label="Basic example">
                                          <a type="button" class="btn btn-danger btn-square text-light btn-sm" href="<?= base_url() ?>packing/packing_masuk/pm_approval/<?= str_replace('/', '--', $k['id_pack']) ?>" data-id_pack="<?= $k['id_pack'] ?>" data-no_msk="<?= $k['no_msk'] ?>" data-size="<?= $k['size'] ?>" data-kw_cap="<?= $k['kw_cap'] ?>" data-kw_body="<?= $k['kw_body'] ?>" data-warna_cap="<?= $k['warna_cap'] ?>" data-warna_body="<?= $k['warna_body'] ?>" data-no_packing="<?= $k['no_packing'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-print="<?= $k['print'] ?>" data-jumlah="<?= $k['jumlah'] ?>" data-jenis_pack="<?= $k['jenis_pack'] ?>" data-status_sk="<?= $k['status_sk'] ?>">
                                            <i class="feather icon-trash-2"></i>test
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Barang Masuk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" id="form_add" action="<?= base_url() ?>packing/packing_masuk/add">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="no_msk">No</label>
                <input type="text" class="form-control" id="no_msk" name="no_msk" placeholder="No Masuk" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="size">Size</label>
                <input type="text" class="form-control" id="size" name="size" placeholder="No. Po"  autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="kw_cap">Kode Warna Cap</label>
                <input type="text" class="form-control" id="kw_cap" name="kw_cap" placeholder="Kode Warna Cap" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="kw_body">Kode Warna body</label>
                <input type="text" class="form-control" id="kw_body" name="kw_body" placeholder="Kode Warna Body" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="warna_cap">Warna cap</label>
                <input type="text" class="form-control" id="warna_cap" name="warna_cap" placeholder="Warna Cap" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="warna_body">Warna body</label>
                <input type="text" class="form-control" id="warna_body" name="warna_body" placeholder="Warna Body" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="no_packing">No Packing</label>
                <input type="text" class="form-control" id="no_packing" name="no_packing"  placeholder="No Packing" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="no_batch">No Batch</label>
                <input type="text" class="form-control" id="no_batch" name="no_batch" placeholder="No Batch" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="print">Print</label>
                <input type="text" class="form-control" id="print" name="print" placeholder="Print" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="jenis_pack">Jenis Pack</label>
                <select class="form-control chosen-select" id="jenis_pack" name="jenis_pack" required>
                  <option value="" disabled selected hidden>- Pilih Jenis Pack -</option>
                  <option value="SAK">SAK</option>
                  <option value="LOS">LOS</option>
                </select>
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

<!-- Modal Edit-->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Barang Masuk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>gudang_bahanbaku/Barang_masuk/update">
        <input type="hidden" id="e_id_barang_masuk" name="id_barang_masuk">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="no_batch">No Batch</label>
                <input type="text" class="form-control text-uppercase" id="e_no_batch" name="no_batch" placeholder="No Batch" maxlength="20" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="no_surat_jalan">No. Po</label>
                <input type="text" class="form-control text-uppercase" id="e_no_surat_jalan" name="no_surat_jalan" maxlength="20" aria-describedby="validationServer03Feedback" autocomplete="off" required>
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
                <label for="nama_barang">Nama Barang</label>
                <select class="form-control chosen-select" id="e_nama_barang" name="nama_barang" required>
                  <option value="" disabled selected hidden>- Pilih Nama Barang -</option>
                  <?php
                  foreach ($res_barang as $b) { ?>
                    <option value="<?= $b['id_barang'] ?>">(<?= $b['kode_barang'] ?>) <?= $b['nama_barang'] ?> (<?= $b['satuan'] ?>)</option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="nama_supplier">Nama Supllier</label>
                <!-- <input type="text" class="form-control" id="e_nama_supplier" name="nama_supplier" placeholder="Nama supplier" autocomplete="off" readonly> -->
                <select class="form-control chosen-select" id="e_nama_supplier" name="nama_supplier" required>
                  <option value="" disabled selected hidden>- Pilih Nama Supplier -</option>
                  <?php
                  foreach ($res_supplier as $s) {
                  ?>
                    <option value="<?= $s['id_supplier'] ?>">(<?= $s['kode_supplier'] ?>) <?= $s['nama_supplier'] ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="op_gudang">OP Gudang</label>
                <input type="text" class="form-control" id="e_op_gudang" name="op_gudang" value="<?= $this->session->userdata('op_gudang') ?>" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="dok_pendukung">Dokumen Pendukung</label>
                <input type="text" class="form-control" id="e_dok_pendukung" name="dok_pendukung[]" readonly>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="qty_pack">Qty Pack</label>
                <input type="text" class="form-control" id="e_qty_pack" name="qty_pack" placeholder="Qty Pack" autocomplete="off" readonly>
              </div>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="jenis_kemasan">Jenis Kemasan</label>
                <select class="form-control chosen-select" id="e_jenis_kemasan" name="jenis_kemasan" required>
                  <option value="" disabled selected hidden>- Pilih Jenis Kemasan -</option>
                  <option value="ZAK">ZAK</option>
                  <option value="Metalize">Metalize</option>
                  <option value="CAN">CAN</option>
                  <option value="Drum">Drum</option>
                </select>
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
                <label for="jml_kemasan">Jumlah Kemasan</label>
                <input type="text" class="form-control" id="e_jml_kemasan" name="jml_kemasan" placeholder="Jumlah Kemasan" onkeypress="return hanyaAngka(event)" maxlength="15" autocomplete="off" readonly>
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
            <div id="hasil_kemasan" class="col-md-4 form-group">
              <div>
                <label class="">Hasil Kemasan</label>
                <div>
                  <table id="hasil_kemasan">
                    <tr>
                      <td style="width: 5%;">Di Terima</td>
                      <td style="width: 20%;"><input type="text" class="form-control form-control-sm w-25" id="e_diterima_kemasan" name="diterima_kemasan" readonly></td>
                    </tr>
                    <tr>
                      <td style="width: 5%;"><span class="">Di Tolak</span> </td>
                      <td><input type="text" class="form-control form-control-sm w-25" id="e_ditolak_kemasan" name="ditolak_kemasan"></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <div id="hasil_bahan" class="col-md-4 form-group">
              <div>
                <label class="">Hasil Bahan</label>
                <div>
                  <table id="hasil_bahan">
                    <tr>
                      <td style="width: 5%;">Di Terima</td>
                      <td style="width: 20%;"><input type="text" class="form-control form-control-sm w-50" id="e_diterima_bahan" name="diterima_bahan" readonly></td>
                    </tr>
                    <tr>
                      <td style="width: 5%;"><span class="">Di Tolak</span> </td>
                      <td style="width: 20%"><input type="text" class="form-control form-control-sm w-50" id="e_ditolak_bahan" name="ditolak_bahan" readonly></td>
                    </tr>
                  </table>
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
    $("#e_no_surat_jalan").keyup(function() {
      var no_surat_jalan = $("#e_no_surat_jalan").val();
      jQuery.ajax({
        url: "<?= base_url() ?>barang_masuk/cek_surat_jalan",
        dataType: 'text',
        type: "post",
        data: {
          no_surat_jalan: no_surat_jalan
        },
        success: function(response) {
          if (response == "true") {
            $("#e_no_surat_jalan").addClass("is-invalid");
            $("#simpan").attr("disabled", "disabled");
          } else {
            $("#e_no_surat_jalan").removeClass("is-invalid");
            $("#simpan").removeAttr("disabled");
          }
        }
      });
    })
  })

  $(document).ready(function() {
    $('#edit').on('show.bs.modal', function(event) {

      var id_barang = $(event.relatedTarget).data('id_barang')
      var id_barang_masuk = $(event.relatedTarget).data('id_barang_masuk')
      var no_surat_jalan = $(event.relatedTarget).data('no_surat_jalan')
      var no_batch = $(event.relatedTarget).data('no_batch')
      var tgl = $(event.relatedTarget).data('tgl')
      var nama_barang = $(event.relatedTarget).data('id_barang')
      var nama_supplier = $(event.relatedTarget).data('id_supplier')
      var op_gudang = $(event.relatedTarget).data('op_gudang')
      var dok_pendukung = $(event.relatedTarget).data('dok_pendukung')
      var jenis_kemasan = $(event.relatedTarget).data('jenis_kemasan')
      var jml_kemasan = $(event.relatedTarget).data('jml_kemasan')
      var diterima_kemasan = $(event.relatedTarget).data('jml_kemasan')
      var ditolak_kemasan = $(event.relatedTarget).data('ditolak_kemasan')
      var tutup = $(event.relatedTarget).data('tutup')
      var wadah = $(event.relatedTarget).data('wadah')
      var label = $(event.relatedTarget).data('label')
      var qty = $(event.relatedTarget).data('qty')
      var qty_pack = $(event.relatedTarget).data('qty_pack')
      var diterima_qty = $(event.relatedTarget).data('qty')
      var ditolak_qty = $(event.relatedTarget).data('ditolak_qty')
      var exp = $(event.relatedTarget).data('exp')
      var mfg = $(event.relatedTarget).data('mfg')

      $(this).find('#e_id_barang').val(id_barang)
      $(this).find('#e_id_barang_masuk').val(id_barang_masuk)
      $(this).find('#e_no_surat_jalan').val(no_surat_jalan)
      $(this).find('#e_no_batch').val(no_batch)
      $(this).find('#e_tgl').val(tgl)
      $(this).find('#e_nama_barang').val(nama_barang)
      $(this).find('#e_nama_barang').trigger("chosen:updated");
      $(this).find('#e_nama_supplier').val(nama_supplier)
      $(this).find('#e_nama_supplier').trigger("chosen:updated");
      $(this).find('#e_op_gudang').val(op_gudang)
      $(this).find('#e_dok_pendukung').val(dok_pendukung)
      $(this).find('#e_jenis_kemasan').val(jenis_kemasan)
      $(this).find('#e_jenis_kemasan').trigger("chosen:updated");
      $(this).find('#e_jml_kemasan').val(jml_kemasan)
      $(this).find('#e_diterima_kemasan').val(diterima_kemasan)
      $(this).find('#e_ditolak_kemasan').val(ditolak_kemasan)
      $(this).find('#e_tutup').val(tutup)
      $(this).find('#e_wadah').val(wadah)
      $(this).find('#e_label').val(label)
      $(this).find('#e_qty').val(qty)
      $(this).find('#e_qty_pack').val(qty_pack)
      $(this).find('#e_diterima_bahan').val(diterima_qty)
      $(this).find('#e_ditolak_bahan').val(ditolak_qty)
      $(this).find('#e_exp').val(exp)
      $(this).find('#e_mfg').val(mfg)
      $(this).find('#e_tgl').datepicker().on('show.bs.modal', function(event) {
        event.stopImmediatePropagation();
      });
      $(this).find('#e_exp').datepicker().on('show.bs.modal', function(event) {
        event.stopImmediatePropagation();
      });
      $(this).find('#e_mfg').datepicker().on('show.bs.modal', function(event) {
        event.stopImmediatePropagation();
      });

      uppercase('#e_no_batch');
      uppercase('#e_no_surat_jalan');
    })
    $('#e_nama_barang').on('change', function() {
      const qtypack = $('#e_qty_pack').val();
      const qty = $('#e_qty').val();
      if (qty === "" || qtypack === undefined) {
        $('#e_jml_kemasan').val(qty)
      } else {
        const hasil = parseInt(qty) / parseInt(qtypack);
        $('#e_jml_kemasan').val(hasil);
      }
    })

    $('#e_qty').on('keyup', function() {
      const qtypack = $('#e_qty_pack').val();
      const qty = $('#e_qty').val();
      const hasil = parseInt(qty) / parseInt(qtypack);
      if (qty === "" || qtypack === undefined) {
        $('#e_jml_kemasan').val("")
        $('#e_diterima_kemasan').val("")
        $('#e_diterima_bahan').val("")
      } else {
        $('#e_jml_kemasan').val(hasil);
        $('#e_diterima_kemasan').val(hasil)
        $('#e_diterima_bahan').val(qty)
      }
    })

    $('#e_ditolak_kemasan').on('keyup', function() {
      const diterima_kem = $('#e_jml_kemasan').val();
      const ditolak_kem = $('#e_ditolak_kemasan').val();
      const hasil_kem = parseInt(diterima_kem) - parseInt(ditolak_kem);

      const qtypack = $('#e_qty_pack').val();
      const diterima_bhn = $('#e_qty').val();
      const ditolak_bhn = parseInt(ditolak_kem) * parseInt(qtypack);
      const hasil_bhn = parseInt(diterima_bhn) - parseInt(ditolak_bhn);
      if (ditolak_kem === "") {
        $('#e_diterima_kemasan').val(diterima_kem)
        $('#e_diterima_bahan').val(diterima_bhn)
        $('#e_ditolak_bahan').val("");
      } else {
        $('#e_diterima_kemasan').val(hasil_kem);
        $('#e_ditolak_bahan').val(ditolak_bhn);
        $('#e_diterima_bahan').val(hasil_bhn);
      }
    })

    $('#e_ditolak_bahan').on('keyup', function() {
      const qtypack = $('#e_qty_pack').val();
      const diterima_bhn = $('#e_qty').val();
      const ditolak_bhn = $('#e_ditolak_bahan').val();
      const hasil_bhn = parseInt(diterima_bhn) - parseInt(ditolak_bhn)

      const diterima_kem = $('#e_jml_kemasan').val();
      const ditolak_kem = $('#e_ditolak_bahan').val() / qtypack;
      const hasil_kem = parseInt(diterima_kem) - parseInt(ditolak_kem);
      if (ditolak_bhn === "") {
        $('#e_diterima_bahan').val(diterima_bhn)
        $('#e_diterima_kemasan').val(diterima_kem);
        $('#e_ditolak_kemasan').val("");
      } else {
        $('#e_diterima_bahan').val(hasil_bhn)
        $('#e_ditolak_kemasan').val(ditolak_kem)
        $('#e_diterima_kemasan').val(hasil_kem);
      }
    })
  })
</script>


<div class="modal fade" id="stock_keeper" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Approval Stock Keeper</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <form method="post" action="<?= base_url() ?>packing/packing_masuk/add_sk">
            </div>
            <div class="modal-body">
            <input type="hidden" id="sk-id_pack" name="id_pack">
                <center><label for="pemeriksaan" class="font-weight-bold">Keterangan Packing</label></center>
                <table class="mt-2">
                    <tr>
                        <td class="px-1 py-2">
                            No
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="sk-no_msk" name="no_msk" maxlength="20" readonly>
                        </td>
                        <td class="px-1 py-2">
                            Size
                        </td>
                        <td class="px-4">
                            <input type="text" class="form-control form-control-sm" id="sk-size" name="size" maxlength="20" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-1 py-2">
                            Kode Warna Cap
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="sk-kw_cap" name="kw_cap" maxlength="20" readonly>
                        </td>
                        <td class="px-1 py-2">
                            Kode Warna Body
                        </td>
                        <td class="px-4">
                            <input type="text" class="form-control form-control-sm" id="sk-kw_body" name="kw_body" maxlength="20" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-1 py-2">
                            Warna Cap
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="sk-warna_cap" name="warna_cap" maxlength="20" readonly>
                        </td>
                        <td class="px-1 py-2">
                            Warna Body
                        </td>
                        <td class="px-4">
                            <input type="text" class="form-control form-control-sm" id="sk-warna_body" name="warna_body" maxlength="20" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-1 py-2">
                            No Packing
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="sk-no_packing" name="no_pack" maxlength="20" readonly>
                        </td>
                        <td class="px-1 py-2">
                            No Batch
                        </td>
                        <td class="px-4">
                            <input type="text" class="form-control form-control-sm" id="sk-no_batch" name="no_batch" maxlength="20" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-1 py-2">
                            Print
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="sk-print" name="print" maxlength="20" readonly>
                        </td>
                        <td class="px-1 py-2">
                            Jumlah
                        </td>
                        <td class="px-4">
                            <input type="text" class="form-control form-control-sm" id="sk-jumlah" name="jumlah" maxlength="20" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-1 py-2">
                            Sak/Los
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="sk-jenis_pack" name="jenis_pack" maxlength="20" readonly>
                        </td>
                    </tr>
                </table>
                
                <center><label for="pemeriksaan" class="font-weight-bold mt-1">Status Stock Keeper</label></center>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tahun_sk">Tahun Stock Keeper</label>
                            <select class="form-control chosen-select" id="tahun_sk" name="tahun_sk" required>
                              <option value="" disabled selected hidden>- Pilih Tahun Stock Keeper -</option>
                              <option value="2023">2023</option>
                              <option value="2024">2024</option>
                              <option value="2025">2025</option>
                              <option value="2026">2026</option>
                              <option value="2027">2027</option>
                              <option value="2028">2028</option>
                              <option value="2029">2029</option>
                              <option value="2030">2030</option>
                              </select>
                          </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="simpan" class="btn btn-success" onclick="if (! confirm('Apakah Anda Yakin Untuk Menyimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Tanggalnya')) { return false; }">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Script Modal Approval Released-->
<script type="text/javascript">
    $(document).ready(function() {
        $('#stock_keeper').on('show.bs.modal', function(event) {
            var id_pack = $(event.relatedTarget).data('id_pack')
            var no_msk = $(event.relatedTarget).data('no_msk')
            var size = $(event.relatedTarget).data('size')
            var kw_cap = $(event.relatedTarget).data('kw_cap')
            var kw_body = $(event.relatedTarget).data('kw_body')
            var warna_cap = $(event.relatedTarget).data('warna_cap')
            var warna_body = $(event.relatedTarget).data('warna_body')
            var no_packing = $(event.relatedTarget).data('no_packing')
            var no_batch = $(event.relatedTarget).data('no_batch')
            var print = $(event.relatedTarget).data('print')
            var jumlah = $(event.relatedTarget).data('jumlah')
            var jenis_pack = $(event.relatedTarget).data('jenis_pack')

            $(this).find('#sk-id_pack').val(id_pack)
            $(this).find('#sk-no_msk').val(no_msk)
            $(this).find('#sk-size').val(size)
            $(this).find('#sk-kw_cap').val(kw_cap)
            $(this).find('#sk-kw_body').val(kw_body)
            $(this).find('#sk-warna_cap').val(warna_cap)
            $(this).find('#sk-warna_body').val(warna_body)
            $(this).find('#sk-no_packing').val(no_packing)
            $(this).find('#sk-no_batch').val(no_batch)
            $(this).find('#sk-print').val(print)
            $(this).find('#sk-jumlah').val(jumlah)
            $(this).find('#sk-jenis_pack').val(jenis_pack)
        })

    })
</script>