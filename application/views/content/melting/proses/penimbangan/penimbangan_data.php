<style>
  .scrollable-menu {
    height: auto;
    max-height: 200px;
    overflow-x: hidden;
  }
</style>
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
                  <li class="breadcrumb-item"><a href="javascript:">Melting</a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Proses</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('Penimbangan') ?>">Penimbangan</a></li>
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
                    <h5>Penimbangan</h5>

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
                            <th>Tanggal Timbang</th>
                            <th>Nama Barang</th>
                            <th>Nama Alat</th>
                            <th class="text-center">Detail</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $nama_operator = $this->session->userdata('nama_operator');
                          $level = $this->session->userdata('level');
                          $jabatan = $this->session->userdata('jabatan');
                          $no = 1;
                          foreach ($result as $k) {
                            $tgl_timbang =  explode('-', $k['tgl_timbang'])[2] . "/" . explode('-', $k['tgl_timbang'])[1] . "/" . explode('-', $k['tgl_timbang'])[0];
                          ?>
                            <tr>
                              <th scope="row"><?= $no++ ?></th>
                              <td><?= $tgl_timbang ?></td>
                              <td><?= $k['nama_barang'] ?></td>
                              <td><?= $k['nama_alat'] ?></td>
                              <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <button type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#view" data-id_penimbangan="<?= $k['id_penimbangan'] ?>" data-nama_barang="<?= $k['nama_barang'] ?>" data-no_transfer_slip="<?= $k['no_transfer_slip'] ?>" data-nama_alat="<?= $k['nama_alat'] ?>" data-qty_dibutuhkan="<?= $k['qty_dibutuhkan'] ?>" data-qty_ditimbang="<?= $k['qty_ditimbang'] ?>" data-tgl_timbang="<?= $tgl_timbang ?>" data-op_penimbangan="<?= $k['op_penimbangan'] ?>" data-suhu_ruangan="<?= $k['suhu_ruangan'] ?>" data-kelembapan_ruangan="<?= $k['kelembapan_ruangan'] ?>" data-kebersihan_ruangan="<?= $k['kebersihan_ruangan'] ?>" data-label_kebersihan="<?= $k['label_kebersihan'] ?>" data-label_kalibrasi="<?= $k['label_kalibrasi'] ?>">
                                    <i class=" feather icon-eye"></i>Detail
                                  </button>
                                </div>
                              </td>
                              <td class="text-center">
                                <?php if ($level === "admin") { ?>
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#edit" data-id_penimbangan="<?= $k['id_penimbangan'] ?>" data-id_ts_melt="<?= $k['id_ts_melt'] ?>" data-id_mm="<?= $k['id_mm'] ?>" data-id_kalibrasi="<?= $k['id_kalibrasi'] ?>" data-nama_barang="<?= $k['nama_barang'] ?>" data-nama_alat="<?= $k['nama_alat'] ?>" data-qty_dibutuhkan="<?= $k['qty_dibutuhkan'] ?>" data-qty_ditimbang="<?= $k['qty_ditimbang'] ?>" data-tgl_timbang="<?= $tgl_timbang ?>" data-op_penimbangan="<?= $k['op_penimbangan'] ?>" data-suhu_ruangan="<?= $k['suhu_ruangan'] ?>" data-kelembapan_ruangan="<?= $k['kelembapan_ruangan'] ?>" data-kebersihan_ruangan="<?= $k['kebersihan_ruangan'] ?>" data-label_kebersihan="<?= $k['label_kebersihan'] ?>" data-label_kalibrasi="<?= $k['label_kalibrasi'] ?>">
                                      <i class=" feather icon-edit-2"></i>Edit
                                    </button>
                                  </div>
                                  <div class="btn-group" role="group">
                                    <a href="<?= base_url() ?>Penimbangan/delete/<?= $k['id_ts_melt'] ?>" class="btn btn-danger btn-square text-light btn-sm" onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
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
              <!-- [ basic-table ] end -->

            </div>
            <!-- [ Main Content ] end -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modal Add -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Bahan DiTimbang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>Penimbangan/add">
        <div class="modal-body">
          <center><label for="pemeriksaan" class="font-weight-bold mt-3">Input Penimbangan</label></center>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="id_mm">Nama Barang</label>
                <select class="form-control scrollable-menu chosen-select" role="menu" id="id_mm" name="id_mm" required>
                  <option value="" disabled selected hidden>- Nama Barang -</option>
                  <?php
                  foreach ($res_mm as $mm) { ?>
                    <option value="<?= $mm['id_mm'] ?>" data-stok="<?= $mm['stok'] ?>"> <?= $mm['nama_barang'] ?> | <?= $mm['no_transfer_slip'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="id_kalibrasi">Alat Kalibrasi</label>
                <select class="form-control scrollable-menu chosen-select" role="menu" id="id_kalibrasi" name="id_kalibrasi" required>
                  <option value="" disabled selected hidden>- Alat Kalibrasi -</option>
                  <?php foreach ($res_alat as $al) { ?>
                    <option value="<?= $al['id_kalibrasi'] ?>"> <?= $al['nama_alat'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="qty_dibutuhkan">Bahan Dibutuhkan</label>
                <div class="input-group">
                  <input type="number" class="form-control" id="qty_dibutuhkan" name="qty_dibutuhkan" placeholder="Bahan Dibutuhkan" autocomplete="off" required>
                  <div id="validationServer03Feedback" class="invalid-feedback">
                    Maaf Stok tidak mencukupi.
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="qty_ditimbang">Bahan Ditimbang</label>
                <div class="input-group">
                  <input type="number" class="form-control" id="qty_ditimbang" name="qty_ditimbang" placeholder="Bahan Ditimbang" autocomplete="off" aria-describedby="validationServer03Feedback" required>
                  <div id="validationServer03Feedback" class="invalid-feedback">
                    Maaf Stok tidak mencukupi.
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="tgl_timbang">Tanggal Ditimbang</label>
                <input type="text" class="form-control datepicker" id="tgl_timbang" name="tgl_timbang" placeholder="Tanggal Ditimbang" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="op_penimbangan">Operator Penimbang</label>
                <input type="text" class="form-control" id="op_penimbangan" name="op_penimbangan" placeholder="OP Penimbang" value="<?= $nama_operator ?>" autocomplete="off" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="suhu_ruangan">Suhu Ruangan</label>
                <input type="text" class="form-control" id="suhu_ruangan" name="suhu_ruangan" placeholder="Suhu Ruangan" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="kelembapan_ruangan"> Kelembapan Ruangan</label>
                <input type="text" class="form-control" id="kelembapan_ruangan" name="kelembapan_ruangan" placeholder="Kelembapan ruangan" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <div class="form-check mr-2">
                  <input class="form-check-input" name="kebersihan_ruangan" type="checkbox" value="Bersih">
                  <label class="form-check-label">Kebersihan Ruangan</label>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <div class="form-check mr-2">
                  <input class="form-check-input" name="label_kebersihan" type="checkbox" value="Ada">
                  <label class="form-check-label">Label Kebersihan</label>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <div class="form-check mr-2">
                  <input class="form-check-input" name="label_kalibrasi" type="checkbox" value="Ada">
                  <label class="form-check-label">Label Kalibrasi</label>
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
    $("#qty_dibutuhkan").keyup(function() {
      const id_mm = $('#id_mm').find(':selected').val();
      const stok = parseInt($('#id_mm').find(':selected').attr('data-stok'));
      var qty = parseInt($("#qty_dibutuhkan").val());

      if (qty > stok) {
        $("#qty_dibutuhkan").addClass("is-invalid");
        $("#simpan").attr("disabled", "disabled");
      } else {
        $("#qty_dibutuhkan").removeClass("is-invalid");
        $("#simpan").removeAttr("disabled");
      }
    })
    $("#qty_ditimbang").keyup(function() {
      const stok = parseInt($('#id_mm').find(':selected').attr('data-stok'));
      var qty = parseInt($("#qty_ditimbang").val());

      if (qty > stok) {
        $("#qty_ditimbang").addClass("is-invalid");
        $("#simpan").attr("disabled", "disabled");
      } else {
        $("#qty_ditimbang").removeClass("is-invalid");
        $("#simpan").removeAttr("disabled");
      }
    })

    $('#add').on('hidden.bs.modal', function() {
      $(this).find('form')[0].reset();
      $(this).find('#tgl_timbang').datepicker().on('show.bs.modal', function(event) {
        event.stopImmediatePropagation();
      });
    });

  })
</script>



<!-- Modal Detail -->
<div class="modal fade" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Bahan Penimbangan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <form>
      </div>
      <div class="modal-body">
        <center><label for="pemeriksaan" class="font-weight-bold mt-3">Input Penimbangan</label></center>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="nama_barang">Nama Barang</label>
              <div class="input-group">
                <input type="text" class="form-control" id="v-nama_barang" name="nama_barang" placeholder="Nama Barang" readonly>
                <input type="text" class="form-control" id="v-no_transfer_slip" name="no_transfer_slip" placeholder="No Transfer Slip" readonly>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="nama_alat">Alat Kalibrasi</label>
              <input type="text" class="form-control" id="v-nama_alat" name="nama_alat" placeholder="Nama Alat" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="qty_dibutuhkan">Bahan Dibutuhkan</label>
              <input type="text" class="form-control" id="v-qty_dibutuhkan" name="qty_dibutuhkan" placeholder="Bahan Dibutuhkan" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="qty_ditimbang">Bahan Ditimbang</label>
              <input type="text" class="form-control" id="v-qty_ditimbang" name="qty_ditimbang" placeholder="Bahan Ditimbang" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="tgl_timbang">Tanggal Ditimbang</label>
              <input type="text" class="form-control" id="v-tgl_timbang" name="tgl_timbang" placeholder="Tanggal Ditimbang" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="op_penimbangan">Operator Penimbang</label>
              <input type="text" class="form-control" id="v-op_penimbangan" name="op_penimbangan" placeholder="OP Penimbang" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="suhu_ruangan">Suhu Ruangan</label>
              <input type="text" class="form-control" id="v-suhu_ruangan" name="suhu_ruangan" placeholder="Suhu Ruangan" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="kelembapan_ruangan">Kelembapan Ruangan</label>
              <input type="text" class="form-control" id="v-kelembapan_ruangan" name="kelembapan_ruangan" placeholder="Kelembapan Ruangan" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="kebersihan_ruangan">Kebersihan Ruangan</label>
              <input type="text" class="form-control" id="v-kebersihan_ruangan" name="kebersihan_ruangan" readonly>
            </div> 
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="label_kebersihan">Label Kebersihan</label>
              <input type="text" class="form-control" id="v-label_kebersihan" name="label_kebersihan" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="label_kalibrasi">Label Kalibrasi</label>
              <input type="text" class="form-control" id="v-label_kalibrasi" name="label_kalibrasi" readonly>
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
      var nama_barang = $(event.relatedTarget).data('nama_barang')
      var no_transfer_slip = $(event.relatedTarget).data('no_transfer_slip')
      var nama_alat = $(event.relatedTarget).data('nama_alat')
      var qty_dibutuhkan = $(event.relatedTarget).data('qty_dibutuhkan')
      var qty_ditimbang = $(event.relatedTarget).data('qty_ditimbang')
      var tgl_timbang = $(event.relatedTarget).data('tgl_timbang')
      var op_penimbangan = $(event.relatedTarget).data('op_penimbangan')
      var suhu_ruangan = $(event.relatedTarget).data('suhu_ruangan')
      var kelembapan_ruangan = $(event.relatedTarget).data('kelembapan_ruangan')
      var kebersihan_ruangan = $(event.relatedTarget).data('kebersihan_ruangan')
      var label_kebersihan = $(event.relatedTarget).data('label_kebersihan')
      var label_kalibrasi = $(event.relatedTarget).data('label_kalibrasi')

      $(this).find('#v-nama_barang').val(nama_barang)
      $(this).find('#v-no_transfer_slip').val(no_transfer_slip)
      $(this).find('#v-nama_alat').val(nama_alat)
      $(this).find('#v-qty_dibutuhkan').val(qty_dibutuhkan)
      $(this).find('#v-qty_ditimbang').val(qty_ditimbang)
      $(this).find('#v-tgl_timbang').val(tgl_timbang)
      $(this).find('#v-op_penimbangan').val(op_penimbangan)
      $(this).find('#v-suhu_ruangan').val(suhu_ruangan)
      $(this).find('#v-kelembapan_ruangan').val(kelembapan_ruangan)
      $(this).find('#v-kebersihan_ruangan').val(kebersihan_ruangan)
      $(this).find('#v-label_kebersihan').val(label_kebersihan)
      $(this).find('#v-label_kalibrasi').val(label_kalibrasi)
    })
  })
</script>

<!-- Modal Edit-->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Penimbangan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>Penimbangan/update">
        <div class="modal-body">
          <center><label for="pemeriksaan" class="font-weight-bold mt-3">Input Penimbangan</label></center>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="id_barang">Nama Barang</label>
                <input type="hidden" id="e-id_penimbangan" name="id_penimbangan">
                <select class="form-control scrollable-menu chosen-select" role="menu" id="e-id_mm" name="id_mm" required>
                  <option value="" disabled selected hidden>- Nama Barang -</option>
                  <?php
                  foreach ($res_mm as $mm) { ?>
                    <option value="<?= $mm['id_mm'] ?>"> <?= $mm['nama_barang'] ?> | <?= $mm['no_transfer_slip'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="id_kalibrasi">Alat Kalibrasi</label>
                <select class="form-control scrollable-menu chosen-select" role="menu" id="e-id_kalibrasi" name="id_kalibrasi" required>
                  <option value="" disabled selected hidden>- Alat Kalibrasi -</option>
                  <?php foreach ($res_alat as $al) { ?>
                    <option value="<?= $al['id_kalibrasi'] ?>"> <?= $al['nama_alat'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="qty_dibutuhkan">Bahan Dibutuhkan</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="e-qty_dibutuhkan" name="qty_dibutuhkan" placeholder="Bahan Dibutuhkan" autocomplete="off" required>
                  <div id="validationServer03Feedback" class="invalid-feedback">
                    Maaf Stok tidak mencukupi.
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="qty_ditimbang">Bahan Ditimbang</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="e-qty_ditimbang" name="qty_ditimbang" placeholder="Bahan Ditimbang" autocomplete="off" required>
                  <div id="validationServer03Feedback" class="invalid-feedback">
                    Maaf Stok tidak mencukupi.
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="tgl_timbang">Tanggal Ditimbang</label>
                <input type="text" class="form-control datepicker" id="e-tgl_timbang" name="tgl_timbang" placeholder="Tanggal Ditimbang" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="op_penimbangan">Operator Penimbang</label>
                <input type="text" class="form-control" id="e-op_penimbangan" name="op_penimbangan" placeholder="OP Penimbang" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="suhu_ruangan">Suhu Ruangan</label>
                <input type="text" class="form-control" id="e-suhu_ruangan" name="suhu_ruangan" placeholder="Suhu Ruangan" autocomplete="off" required> 
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group"> 
                <label for="kelembapan_ruangan">Kelembapan Ruangan</label>
                <input type="text" class="form-control" id="e-kelembapan_ruangan" name="kelembapan_ruangan" placeholder="Kelembapan Ruangan" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-check mr-2">
                <input class="form-check-input" id="e-kebersihan_ruangan" name="kebersihan_ruangan" value="Bersih" type="checkbox">
                <label class="form-check-kebersihan">Kebersihan Ruangan</label>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-check mr-2">
                <input class="form-check-input" id="e-label_kebersihan" name="label_kebersihan" value="Ada" type="checkbox">
                <label class="form-check-label">Label Kebersihan</label>
                <!-- <select class="form-control scrollable-menu chosen-select" role="menu" id="e-label_timbang" name="label_timbang" required>
                  <option value="Ada">Ada</option>
                  <option value="Tidak Ada">Tidak Ada</option>
                </select> -->
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-check mr-2">
                <input class="form-check-input" id="e-label_kalibrasi" name="label_kalibrasi" value="Ada" type="checkbox">
                <label class="form-check-label">Label Kalibrasi</label>
                <!-- <select class="form-control scrollable-menu chosen-select" role="menu" id="e-label_kalibrasi" name="label_kalibrasi" required>
                  <option value="Ada">Ada</option>
                  <option value="Tidak Ada">Tidak Ada</option>
                </select> -->
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
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('#edit').on('show.bs.modal', function(event) {
      var id_penimbangan = $(event.relatedTarget).data('id_penimbangan')
      var id_ts_melt = $(event.relatedTarget).data('id_ts_melt')
      var id_mm = $(event.relatedTarget).data('id_mm')
      var id_kalibrasi = $(event.relatedTarget).data('id_kalibrasi')
      var nama_barang = $(event.relatedTarget).data('nama_barang')
      var nama_alat = $(event.relatedTarget).data('nama_alat')
      var qty_dibutuhkan = $(event.relatedTarget).data('qty_dibutuhkan')
      var qty_ditimbang = $(event.relatedTarget).data('qty_ditimbang')
      var tgl_timbang = $(event.relatedTarget).data('tgl_timbang')
      var op_penimbangan = $(event.relatedTarget).data('op_penimbangan')
      var suhu_ruangan = $(event.relatedTarget).data('suhu_ruangan')
      var kelembapan_ruangan = $(event.relatedTarget).data('kelembapan_ruangan')
      var kebersihan_ruangan = $(event.relatedTarget).data('kebersihan_ruangan')
      var label_kebersihan = $(event.relatedTarget).data('label_kebersihan')
      var label_kalibrasi = $(event.relatedTarget).data('label_kalibrasi')

      $(this).find('#e-id_penimbangan').val(id_penimbangan)
      $(this).find('#e-id_ts_melt').val(id_ts_melt)
      $(this).find('#e-id_mm').val(id_mm)
      $(this).find('#e-id_mm').trigger("chosen:updated");
      $(this).find('#e-id_kalibrasi').val(id_kalibrasi)
      $(this).find('#e-id_kalibrasi').trigger("chosen:updated");
      $(this).find('#e-nama_barang').val(nama_barang)
      $(this).find('#e-nama_alat').val(nama_alat)
      $(this).find('#e-qty_dibutuhkan').val(qty_dibutuhkan)
      $(this).find('#e-qty_ditimbang').val(qty_ditimbang)
      $(this).find('#e-tgl_timbang').val(tgl_timbang)
      $(this).find('#e-op_penimbangan').val(op_penimbangan)
      $(this).find('#e-suhu_ruangan').val(suhu_ruangan)
      $(this).find('#e-kelembapan_ruangan').val(kelembapan_ruangan)
      $(this).find('#e-kebersihan_ruangan').val(kebersihan_ruangan)
      $(this).find('#e-label_kebersihan').val(label_kebersihan)
      $(this).find('#e-label_kebersihan').trigger("chosen:updated")
      $(this).find('#e-label_kalibrasi').val(label_kalibrasi)
      $(this).find('#e-label_kalibrasi').trigger("chosen:updated")
      $(this).find('#e-tgl_timbang').datepicker().on('show.bs.modal', function(event) {
        event.stopImmediatePropagation();
      });
      if (kebersihan_ruangan === "Bersih") {
        $('#e-kebersihan_ruangan').attr('checked', true);
      } else {
        $('#e-kebersihan_ruangan').attr('checked', false);
      }
      if (label_kebersihan === "Ada") {
        $('#e-label_kebersihan').attr('checked', true);
      } else {
        $('#e-label_kebersihan').attr('checked', false);
      }
      if (label_kalibrasi === "Ada") {
        $('#e-label_kalibrasi').attr('checked', true);
      } else {
        $('#e-label_kalibrasi').attr('checked', false);
      }

    });
  })
</script>