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
                  <h5 class="m-b-10">Data Proses Pewarnaan</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Melting</a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Proses</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('Pewarnaan') ?>">Pewarnaan</a></li>
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
                    <h5>Data Pewarnaan</h5>

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
                            <th>No CR</th>
                            <th>Batch Kapsul</th>
                            <th>Kode Warna</th>
                            <th>Viscositas</th>
                            <th>No Batch Gelatin</th>
                            <th>Operator</th>
                            <th class="text-center">Detail</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $level = $this->session->userdata('level');
                          $no = 1;
                          foreach ($result as $k) {
                            // $ed_sertif =  explode('-', $k['ed_sertif'])[2] . "/" . explode('-', $k['ed_sertif'])[1] . "/" . explode('-', $k['ed_sertif'])[0];
                          ?>
                            <tr>
                              <th scope="row"><?= $no++ ?></th>
                              <td><?= $k['no_cr'] ?></td>
                              <td><?= $k['batch_kapsul'] ?></td>
                              <td><?= $k['kode_warna'] ?></td>
                              <td><?= $k['visc'] ?></td>
                              <td><?= $k['no_bg'] ?></td>
                              <td><?= $k['nama_operator'] ?></td>
                              <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <button type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#view" data-id_pewarna="<?= $k['id_pewarna'] ?>" data-no_cr="<?= $k['no_cr'] ?>" data-batch_kapsul="<?= $k['batch_kapsul'] ?>" data-stock_mesin="<?= $k['stock_mesin'] ?>" data-kode_warna="<?= $k['kode_warna'] ?>" data-juml_gel="<?= $k['juml_gel'] ?>" data-no_bg="<?= $k['no_bg'] ?>" data-recyc="<?= $k['recyc'] ?>" data-juml_ex_gw="<?= $k['juml_ex_gw'] ?>" data-batch_ex_gw="<?= $k['batch_ex_gw'] ?>" data-berat_recyc="<?= $k['berat_recyc'] ?>" data-batch_recyc="<?= $k['batch_recyc'] ?>" data-jam_pewar="<?= $k['jam_pewar'] ?>" data-visc="<?= $k['visc'] ?>" data-juml_akhir="<?= $k['juml_akhir'] ?>" data-no_trans="<?= $k['no_trans'] ?>" nama_operator="<?= $k['nama_operator'] ?>">
                                    <i class="feather icon-eye"></i>Detail
                                  </button>
                                </div>
                              </td>
                              <td class="text-center">
                                <?php if ($level === "admin" || $level === "purchasing") { ?>
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#edit" data-id_pewarna="<?= $k['id_pewarna'] ?>" data-no_cr="<?= $k['no_cr'] ?>" data-batch_kapsul="<?= $k['batch_kapsul'] ?>" data-stock_mesin="<?= $k['stock_mesin'] ?>" data-kode_warna="<?= $k['kode_warna'] ?>" data-juml_gel="<?= $k['juml_gel'] ?>" data-no_bg="<?= $k['no_bg'] ?>" data-recyc="<?= $k['recyc'] ?>" data-juml_ex_gw="<?= $k['juml_ex_gw'] ?>" data-batch_ex_gw="<?= $k['batch_ex_gw'] ?>" data-berat_recyc="<?= $k['berat_recyc'] ?>" data-batch_recyc="<?= $k['batch_recyc'] ?>" data-jam_pewar="<?= $k['jam_pewar'] ?>" data-visc="<?= $k['visc'] ?>" data-juml_akhir="<?= $k['juml_akhir'] ?>" data-no_trans="<?= $k['no_trans'] ?>" nama_operator="<?= $k['nama_operator'] ?>">
                                      <i class="feather icon-edit-2"></i>Edit
                                    </button>
                                  </div>
                                  <div class="btn-group" role="group">
                                    <a href="<?= base_url() ?>Pewarnaan/delete/<?= $k['id_pewarna'] ?>" class="btn btn-danger btn-square text-light btn-sm" onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
                                      <i class="feather icon-trash-2"></i>Hapus
                                    </a>
                                  </div>
                                <?php } ?>
                              </td>
                            </tr>
                          <?php
                          }
                          ?>
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
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pewarnaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>Pewarnaan/add">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="no_cr">No. CR</label>
                <input type="hidden" id="id_pewarna" name="id_pewarna">
                <input type="text" class="form-control text-uppercase" id="kode_barang" name="no_cr" placeholder="No. CR" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="batch_kapsul">Batch Kapsul</label>
                <input type="text" class="form-control text-uppercase" id="batch_kapsul" name="batch_kapsul" placeholder="Batch Kapsul" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="stock_mesin">Stock Mesin Feeding tank</label>
                <input type="text" class="form-control text-uppercase" id="stock_mesin" name="stock_mesin" placeholder="Stock Mesin Feeding Tank" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="kode_warna">Kode Warna</label>
                <input type="text" class="form-control text-uppercase" id="kode_warna" name="kode_warna" placeholder="Kode Warna" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="juml_gel">Jumlah Gelatin (Ltr)</label>
                <input type="number" class="form-control text-uppercase" id="juml_gel" name="juml_gel" placeholder="Jumlah Gelatin (Ltr)" autocomplete="off" pattern="[0-999]{1,3}" title="MASUKKAN HANYA ANGKA" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="no_bg">No. Batch Gelatin</label>
                <input type="text" class="form-control text-uppercase" id="no_bg" name="no_bg" placeholder="No. Batch Gelatin" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="recyc">% Recycle</label>
                <input type="text" class="form-control text-uppercase" id="recyc" name="recyc" placeholder="Recycle" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="juml_ex_gw">Jumlah Ex GW (Ltr)</label>
                <input type="number" class="form-control text-uppercase" id="juml_ex_gw" name="juml_ex_gw" placeholder="Jumlah Ex GW (Ltr)" autocomplete="off" pattern="[0-999]{1,3}" title="MASUKKAN HANYA ANGKA" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="batch_ex_gw">Batch Ex GW</label>
                <input type="text" class="form-control text-uppercase" id="batch_ex_gw" name="batch_ex_gw" placeholder="Batch Ex GW" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="berat_recyc">Berat Recycle (Kg)</label>
                <input type="number" class="form-control text-uppercase" id="berat_recyc" name="berat_recyc" placeholder="Berat Recycle (Kg)" autocomplete="off" pattern="[0-999]{1,3}" title="MASUKKAN HANYA ANGKA" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="batch_recyc">Batch Recycle (Kg)</label>
                <input type="number" class="form-control text-uppercase" id="batch_recyc" name="batch_recyc" placeholder="Batch Recycle (Kg)" autocomplete="off" pattern="[0-999]{1,3}" title="MASUKKAN HANYA ANGKA" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="jam_pewar">Jam Pewarnaan</label>
                <input type="text" class="form-control text-uppercase" id="jam_pewar" name="jam_pewar" placeholder="00.00" autocomplete="off" pattern="[0-9,.]{0,5}" title="FORMAT JAM 'xx.xx'" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="visc">Visc (cps) 45-46°C</label>
                <input type="number" class="form-control text-uppercase" id="visc" name="visc" placeholder="Viscositas" autocomplete="off" pattern="[0-999]{1,3}" title="MASUKKAN HANYA ANGKA" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="juml_akhir">Jumlah Akhir (Ltr)</label>
                <input type="number" class="form-control text-uppercase" id="juml_akhir" name="juml_akhir" placeholder="Jumlah Akhir (Ltr)" autocomplete="off" pattern="[0-999]{1,3}" title="MASUKKAN HANYA ANGKA" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="no_trans">No. Transfer</label>
                <input type="text" class="form-control text-uppercase" id="no_trans" name="no_trans" placeholder="No. Transfer" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="nama_operator">Nama Operator</label>
                <input type="text" class="form-control" id="nama_operator" name="nama_operator" value="<?= $this->session->userdata('nama_operator') ?>" maxlength="20" readonly>
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

    uppercase('#batch_kapsul');
    uppercase('#kode_warna');
    uppercase('#stock_mesin');
    uppercase('#juml_gel');
    uppercase('#no_bg');
  })
</script>



<!-- Modal -->
<div class="modal fade" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Barang</h5>
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
                <input type="text" class="form-control text-uppercase" id="v-no_cr" name="no_cr" placeholder="Nomor CR" autocomplete="off" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="batch_kapsul">Batch Kapsul</label>
                <input type="text" class="form-control text-uppercase" id="v-batch_kapsul" name="batch_kapsul" placeholder="Batch Kapsul" autocomplete="off" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="stock_mesin">Stock Mesin Feeding tank</label>
                <input type="text" class="form-control text-uppercase" id="v-stock_mesin" name="stock_mesin" placeholder="Stock Mesin Feeding Tank" autocomplete="off" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="kode_warna">Kode Warna</label>
                <input type="text" class="form-control text-uppercase" id="v-kode_warna" name="kode_warna" placeholder="Kode Warna" autocomplete="off" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="juml_gel">Jumlah Gelatin (Ltr)</label>
                <input type="text" class="form-control text-uppercase" id="v-juml_gel" name="juml_gel" placeholder="Jumlah Gelatin (Ltr)" autocomplete="off" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="no_bg">No. Batch Gelatin</label>
                <input type="text" class="form-control text-uppercase" id="v-no_bg" name="no_bg" placeholder="No. Batch Gelatin" autocomplete="off" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="recyc">% Recycle</label>
                <input type="text" class="form-control text-uppercase" id="v-recyc" name="recyc" placeholder="Recycle" autocomplete="off" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="juml_ex_gw">Jumlah Ex GW (Ltr)</label>
                <input type="text" class="form-control text-uppercase" id="v-juml_ex_gw" name="juml_ex_gw" placeholder="Jumlah Ex GW (Ltr)" autocomplete="off" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="batch_ex_gw">Batch Ex GW</label>
                <input type="text" class="form-control text-uppercase" id="v-batch_ex_gw" name="batch_ex_gw" placeholder="Batch Ex GW" autocomplete="off" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="berat_recyc">Berat Recycle (Kg)</label>
                <input type="text" class="form-control text-uppercase" id="v-berat_recyc" name="berat_recyc" placeholder="Berat Recycle (Kg)" autocomplete="off" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="batch_recyc">Batch Recycle (Kg)</label>
                <input type="text" class="form-control text-uppercase" id="v-batch_recyc" name="batch_recyc" placeholder="Batch Recycle (Kg)" autocomplete="off" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="jam_pewar">Jam Pewarnaan</label>
                <input type="text" class="form-control text-uppercase" id="v-jam_pewar" name="jam_pewar" placeholder="Jam Pewarnaan" autocomplete="off" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="visc">Visc (cps) 45-46°C</label>
                <input type="text" class="form-control text-uppercase" id="v-visc" name="visc" placeholder="Viscositas" autocomplete="off" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="juml_akhir">Jumlah Akhir (Ltr)</label>
                <input type="text" class="form-control text-uppercase" id="v-juml_akhir" name="juml_akhir" placeholder="Jumlah Akhir (Ltr)" autocomplete="off" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="nama_operator">Nama Operator</label>
                <input type="text" class="form-control" id="v-nama_operator" name="nama_operator" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="no_trans">No. Transfer</label>
                <input type="text" class="form-control text-uppercase" id="v-no_trans" name="no_trans" placeholder="No. Transfer" autocomplete="off" readonly>
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

      var id_pewarna = $(event.relatedTarget).data('id_pewarna')
      var no_cr = $(event.relatedTarget).data('no_cr')
      var batch_kapsul = $(event.relatedTarget).data('batch_kapsul')
      var stock_mesin = $(event.relatedTarget).data('stock_mesin')
      var kode_warna = $(event.relatedTarget).data('kode_warna')
      var juml_gel = $(event.relatedTarget).data('juml_gel')
      var no_bg = $(event.relatedTarget).data('no_bg')
      var recyc = $(event.relatedTarget).data('recyc')
      var juml_ex_gw = $(event.relatedTarget).data('juml_ex_gw')
      var batch_ex_gw = $(event.relatedTarget).data('batch_ex_gw')
      var berat_recyc = $(event.relatedTarget).data('berat_recyc')
      var batch_recyc = $(event.relatedTarget).data('batch_recyc')
      var jam_pewar = $(event.relatedTarget).data('jam_pewar')
      var visc = $(event.relatedTarget).data('visc')
      var juml_akhir = $(event.relatedTarget).data('juml_akhir')
      var no_trans = $(event.relatedTarget).data('no_trans')
      var nama_operator = $(event.relatedTarget).data('nama_operator')
      

      $(this).find('#v-id_pewarna').val(id_pewarna)
      $(this).find('#v-no_cr').val(no_cr)
      $(this).find('#v-batch_kapsul').val(batch_kapsul)
      $(this).find('#v-stock_mesin').val(stock_mesin)
      $(this).find('#v-kode_warna').val(kode_warna)
      $(this).find('#v-juml_gel').val(juml_gel)
      $(this).find('#v-no_bg').val(no_bg)
      $(this).find('#v-recyc').val(recyc)
      $(this).find('#v-juml_ex_gw').val(juml_ex_gw)
      $(this).find('#v-batch_ex_gw').val(batch_ex_gw)
      $(this).find('#v-berat_recyc').val(berat_recyc)
      $(this).find('#v-batch_recyc').val(batch_recyc)
      $(this).find('#v-jam_pewar').val(jam_pewar)
      $(this).find('#v-visc').val(visc)
      $(this).find('#v-juml_akhir').val(juml_akhir)
      $(this).find('#v-no_trans').val(no_trans)
      $(this).find('#v-nama_operator').val(nama_operator)
    })
  })
</script>

  <!-- Modal Edit-->
  <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content"> 
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="<?= base_url() ?>Pewarnaan/update">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="no_cr">Nomor CR</label>
                  <input type="hidden" id="e-id_pewarna" name="id_pewarna">
                  <input type="text" class="form-control text-uppercase" id="e-no_cr" name="no_cr" placeholder="Nomor CR" autocomplete="off" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="batch_kapsul">Batch Kapsul</label>
                  <input type="text" class="form-control text-uppercase" id="e-batch_kapsul" name="batch_kapsul" placeholder="Batch Kapsul" autocomplete="off" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="stock_mesin">Stock Mesin Feeding tank</label>
                  <input type="text" class="form-control text-uppercase" id="e-stock_mesin" name="stock_mesin" placeholder="Stock Mesin Feeding Tank" autocomplete="off" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="kode_warna">Kode Warna</label>
                  <input type="text" class="form-control text-uppercase" id="e-kode_warna" name="kode_warna" placeholder="Kode Warna" autocomplete="off" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="juml_gel">Jumlah Gelatin (Ltr)</label>
                  <input type="number" class="form-control text-uppercase" id="e-juml_gel" name="juml_gel" placeholder="Jumlah Gelatin (Ltr)" autocomplete="off" pattern="[0-999]{1,3}" title="MASUKKAN HANYA ANGKA" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="no_bg">No. Batch Gelatin</label>
                  <input type="text" class="form-control text-uppercase" id="e-no_bg" name="no_bg" placeholder="No. Batch Gelatin" autocomplete="off" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="recyc">% Recycle</label>
                  <input type="text" class="form-control text-uppercase" id="e-recyc" name="recyc" placeholder="Recycle" autocomplete="off" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="juml_ex_gw">Jumlah Ex GW (Ltr)</label>
                  <input type="number" class="form-control text-uppercase" id="e-juml_ex_gw" name="juml_ex_gw" placeholder="Jumlah Ex GW (Ltr)" autocomplete="off" pattern="[0-999]{1,3}" title="MASUKKAN HANYA ANGKA" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="batch_ex_gw">Batch Ex GW</label>
                  <input type="text" class="form-control text-uppercase" id="e-batch_ex_gw" name="batch_ex_gw" placeholder="Batch Ex GW" autocomplete="off" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="berat_recyc">Berat Recycle (Kg)</label>
                  <input type="number" class="form-control text-uppercase" id="e-berat_recyc" name="berat_recyc" placeholder="Berat Recycle (Kg)" autocomplete="off" pattern="[0-999]{1,3}" title="MASUKKAN HANYA ANGKA" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="batch_recyc">Batch Recycle (Kg)</label>
                  <input type="number" class="form-control text-uppercase" id="e-batch_recyc" name="batch_recyc" placeholder="Batch Recycle (Kg)" autocomplete="off" pattern="[0-999]{1,3}" title="MASUKKAN HANYA ANGKA" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="jam_pewar">Jam Pewarnaan</label>
                  <input type="text" class="form-control text-uppercase" id="e-jam_pewar" name="jam_pewar" placeholder="00.00" autocomplete="off" pattern="[0-9,.]{0,5}" title="FORMAT JAM 'xx.xx'" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="visc">Visc (cps) 45-46°C</label>
                  <input type="number" class="form-control text-uppercase" id="e-visc" name="visc" placeholder="Viscositas" autocomplete="off" pattern="[0-999]{1,3}" title="MASUKKAN HANYA ANGKA" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="juml_akhir">Jumlah Akhir (Ltr)</label>
                  <input type="number" class="form-control text-uppercase" id="e-juml_akhir" name="juml_akhir" placeholder="Jumlah Akhir (Ltr)" pattern="[0-999]{1,3}" title="MASUKKAN HANYA ANGKA" autocomplete="off" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="no_trans">No. Transfer</label>
                  <input type="text" class="form-control text-uppercase" id="e-no_trans" name="no_trans" placeholder="No. Transfer" autocomplete="off" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nama_operator">Nama Operator</label>
                  <input type="text" class="form-control" id="e-nama_operator" name="nama_operator" value="<?= $this->session->userdata('nama_operator') ?>" maxlength="20" readonly>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" id="simpan" class="btn btn-primary" onclick="if (! confirm('Apakah Anda Yakin Untuk Mengedit Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya')) { return false; }">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#edit').on('show.bs.modal', function(event) {

      var id_pewarna = $(event.relatedTarget).data('id_pewarna')
      var no_cr = $(event.relatedTarget).data('no_cr')
      var batch_kapsul = $(event.relatedTarget).data('batch_kapsul')
      var stock_mesin = $(event.relatedTarget).data('stock_mesin')
      var kode_warna = $(event.relatedTarget).data('kode_warna')
      var juml_gel = $(event.relatedTarget).data('juml_gel')
      var no_bg = $(event.relatedTarget).data('no_bg')
      var recyc = $(event.relatedTarget).data('recyc')
      var juml_ex_gw = $(event.relatedTarget).data('juml_ex_gw')
      var batch_ex_gw = $(event.relatedTarget).data('batch_ex_gw')
      var berat_recyc = $(event.relatedTarget).data('berat_recyc')
      var batch_recyc = $(event.relatedTarget).data('batch_recyc')
      var jam_pewar = $(event.relatedTarget).data('jam_pewar')
      var visc = $(event.relatedTarget).data('visc')
      var juml_akhir = $(event.relatedTarget).data('juml_akhir')
      var no_trans = $(event.relatedTarget).data('no_trans')
      var nama_operator = $(event.relatedTarget).data('nama_operator')

      $(this).find('#e-id_pewarna').val(id_pewarna)
      $(this).find('#e-no_cr').val(no_cr)
      $(this).find('#e-batch_kapsul').val(batch_kapsul)
      $(this).find('#e-stock_mesin').val(stock_mesin)
      $(this).find('#e-kode_warna').val(kode_warna)
      $(this).find('#e-juml_gel').val(juml_gel)
      $(this).find('#e-no_bg').val(no_bg)
      $(this).find('#e-recyc').val(recyc)
      $(this).find('#e-juml_ex_gw').val(juml_ex_gw)
      $(this).find('#e-batch_ex_gw').val(batch_ex_gw)
      $(this).find('#e-berat_recyc').val(berat_recyc)
      $(this).find('#e-batch_recyc').val(batch_recyc)
      $(this).find('#e-jam_pewar').val(jam_pewar)
      $(this).find('#e-visc').val(visc)
      $(this).find('#e-juml_akhir').val(juml_akhir)
      $(this).find('#e-no_trans').val(no_trans)
      $(this).find('#e-nama_operator').val(nama_operator)

      });

    uppercase('#e-no_cr');
    uppercase('#e-batch_kapsul');
    uppercase('#e-kode_warna');
    uppercase('#e-stock_mesin');
    uppercase('#e-juml_gel');
    uppercase('#e-no_bg');

    })
  </script>