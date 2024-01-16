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
                  <li class="breadcrumb-item"><a href="javascript:">QA</a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Laporan Batch</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('Batch') ?>">Batch</a></li>
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
                    <h5>Data Barang</h5>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#add">
                      <i class="feather icon-plus"></i>Tambah Data
                    </button>
                  </div>
                  <?php $level = $this->session->userdata('level');
                  if ($level === "utility" || $level === "admin") { ?>
                      <div class="card-header">
                          <button type="button" class="btn btn-light btn-outline-dark float-right btn-sm" onClick="window.open(`<?= base_url() ?>Qa/Batch/pdf_page_print/`)">
                              <i class="feather icon-file"></i>Print
                          </button>
                      </div>
                  <?php } ?>
                  <div class="card-block table-border-style">
                    <?php
                    // print_r($result);
                    ?>
                    <div class="table-responsive">
                      <table class="table datatable table-hover table-striped table-sm">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Nama Produsen</th>
                            <th>Negara Produsen</th>
                            <th>Jenis Bahan</th>
                            <th class="text-center">Detail</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $level = $this->session->userdata('level');
                          $no = 1;
                          foreach ($result as $k) {
                            $ed_sertif =  explode('-', $k['ed_sertif'])[2] . "/" . explode('-', $k['ed_sertif'])[1] . "/" . explode('-', $k['ed_sertif'])[0];
                          ?>
                            <tr>
                              <th scope="row"><?= $no++ ?></th>
                              <td><?= $k['kode_barang'] ?></td>
                              <td><?= $k['nama_barang'] ?></td>
                              <td><?= $k['nama_produsen'] ?></td>
                              <td><?= $k['negara_produsen'] ?></td>
                              <td><?= $k['jenis_bahan'] ?></td>
                              <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <button type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#view" data-id_barang="<?= $k['id_barang'] ?>" data-kode_barang="<?= $k['kode_barang'] ?>" data-nama_barang="<?= $k['nama_barang'] ?>" data-nama_produsen="<?= $k['nama_produsen'] ?>" data-negara_produsen="<?= $k['negara_produsen'] ?>" data-satuan="<?= $k['satuan'] ?>" data-jenis_bahan="<?= $k['jenis_bahan'] ?>" data-jenis_gel="<?= $k['jenis_gel'] ?>" data-qty_pack="<?= $k['qty_pack'] ?>" data-sertif_halal="<?= $k['sertif_halal'] ?>" data-no_seri="<?= $k['no_seri'] ?>" data-ed_sertif="<?= $ed_sertif ?>" data-penerbit_halal="<?= $k['penerbit_halal'] ?>">
                                    <i class="feather icon-eye"></i>Detail
                                  </button>
                                </div>
                              </td>
                              <td class="text-center">
                                <?php if ($level === "admin" || $level === "purchasing") { ?>
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#edit" data-id_barang="<?= $k['id_barang'] ?>" data-kode_barang="<?= $k['kode_barang'] ?>" data-nama_barang="<?= $k['nama_barang'] ?>" data-nama_produsen="<?= $k['nama_produsen'] ?>" data-negara_produsen="<?= $k['negara_produsen'] ?>" data-satuan="<?= $k['satuan'] ?>" data-jenis_bahan="<?= $k['jenis_bahan'] ?>" data-jenis_gel="<?= $k['jenis_gel'] ?>" data-qty_pack="<?= $k['qty_pack'] ?>" data-sertif_halal="<?= $k['sertif_halal'] ?>" data-no_seri="<?= $k['no_seri'] ?>" data-ed_sertif="<?= $ed_sertif ?>" data-penerbit_halal="<?= $k['penerbit_halal'] ?>">
                                      <i class="feather icon-edit-2"></i>Edit
                                    </button>
                                  </div>
                                  <div class="btn-group" role="group">
                                    <a href="<?= base_url() ?>Barang/delete/<?= $k['id_barang'] ?>" class="btn btn-danger btn-square text-light btn-sm" onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
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
<script type="text/javascript">
    $(document).ready(function() {

        $('#export').click(function() {
            var filter_nama = $('#filter_mesin').val();

            if (filter_tgl == '' && filter_tgl2 != '') {
                window.location = "<?= base_url() ?>Utility/Ahu?alert=warning&msg=dari tanggal belum diisi";
                alert("dari tanggal belum diisi")
            } else if (filter_tgl != '' && filter_tgl2 == '') {
                window.location = "<?= base_url() ?>Utility/Ahu?alert=warning&msg=sampai tanggal belum diisi";
            } else if (filter_tgl == '' && filter_tgl2 == '') {
                var url = "<?= base_url() ?>Utility/Ahu/pdf_page_print";
                window.open(url, 'pdf_page_print', 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
            } else {
                const query = new URLSearchParams({
                    name: filter_nama,
                    date_from: filter_tgl,
                    date_until: filter_tgl2
                })
                var url = "<?= base_url() ?>Utility/Ahu/pdf_page_print?" + query.toString();
                window.open(url, 'pdf_page_print', 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
            }
        })
    })
</script>

<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>Barang/add">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="kode_barang">Kode Barang</label>
                <input type="hidden" id="id_barang" name="id_barang">
                <input type="text" class="form-control text-uppercase" id="kode_barang" name="kode_barang" placeholder="Kode Barang" autocomplete="off" aria-describedby="validationServer03Feedback" required>
                <div id="validationServer03Feedback" class="invalid-feedback">
                Maaf Kode Barang sudah ada.
              </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" class="form-control text-uppercase" id="nama_barang" name="nama_barang" placeholder="Nama Barang" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="nama_produsen">Nama produsen</label>
                <input type="text" class="form-control text-uppercase" id="nama_produsen" name="nama_produsen" placeholder="Nama Produsen" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="negara_produsen">Negara Produsen</label>
                <input type="text" class="form-control text-uppercase" id="negara_produsen" name="negara_produsen" placeholder="Negara Produsen" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="satuan">Satuan</label>
                <select class="form-control chosen-select" id="satuan" name="satuan" required>
                  <option value="" disabled selected hidden>- Pilih Satuan -</option>
                  <option value="L">Liter</option>
                  <option value="Kg">Kilogram</option>
                  <option value="g">Gram</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="jenis_bahan">Jenis Bahan</label>
                <select class="form-control chosen-select" id="jenis_bahan" name="jenis_bahan" required>
                  <option value="" disabled selected hidden>- Pilih Jenis Bahan -</option>
                  <option value="Bahan Baku">Bahan Baku</option>
                  <option value="Pewarna">Pewarna</option>
                  <option value="Bahan Tambahan">Bahan Tambahan</option>
                  <option value="Pelarut">Pelarut</option>
                  <option value="Tinta Print">Tinta Print</option>
                </select>
              </div>
            </div>
            <div id="form_gel" class="col-md-6" style="display: none">
              <div class="form-group">
                <label for="jenis_gel">Jenis Gelatin (* Bloom)</label>
                <input type="text" class="form-control" id="jenis_gel" name="jenis_gel" value="Bloom " autocomplete="off">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="qty_pack">Quantity Pack (1x ...)</label>
                <input type="text" class="form-control" id="qty_pack" name="qty_pack" placeholder="Quantity Pack" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="sertif_halal">Sertifikat Halal</label>
                <input type="text" class="form-control" id="sertif_halal" name="sertif_halal" value="Ada" disabled>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="penerbit_halal">Penerbit Halal</label>
                <input type="text" class="form-control text-uppercase" id="penerbit_halal" name="penerbit_halal" placeholder="Penerbit Halal" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="no_seri">No Seri</label>
                <input type="text" class="form-control text-uppercase" id="no_seri" name="no_seri" placeholder="No Seri" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="ed_sertif">Exp Date Sertifikat</label>
                <input type="text" class="form-control datepicker" id="ed_sertif" name="ed_sertif" placeholder="E.D Sertifikat" autocomplete="off" required>
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

    $("#kode_barang").keyup(function(){
      var kode_barang =  $("#kode_barang").val();
      jQuery.ajax({
        url: "<?=base_url()?>barang/cek_kode_barang",
        dataType:'text',
        type: "post",
        data:{kode_barang:kode_barang},
        success:function(response){
          if (response =="true") {
            $("#kode_barang").addClass("is-invalid");
            $("#simpan").attr("disabled","disabled");
          }else{
            $("#kode_barang").removeClass("is-invalid");
            $("#simpan").removeAttr("disabled");
          }
        }            
      });
    })

    $('#add').on('hidden.bs.modal', function() {
      $(this).find('form')[0].reset();
    });

    uppercase('#kode_barang');
    uppercase('#nama_barang');
    uppercase('#nama_produsen');
    uppercase('#negara_produsen');
    uppercase('#penerbit_halal');
    uppercase('#no_seri');

    $('#jenis_bahan').on('change', function() {
      const value = $(this).val()
      if (value === 'Bahan Baku') {
        $('#form_gel').show()
        $('#jenis_gel').prop('required', true);
      } else {
        $('#form_gel').hide()
        $('#jenis_gel').prop('required', false);
      }
    });
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
              <label for="kode_barang">Kode Barang</label>
              <input type="text" class="form-control" id="v-kode_barang" name="kode_barang" placeholder="Kode Barang" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="nama_barang">Nama Barang</label>
              <input type="text" class="form-control" id="v-nama_barang" name="nama_barang" placeholder="Nama Barang" autocomplete="off" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="nama_produsen">Nama Produsen</label>
              <input type="text" class="form-control" id="v-nama_produsen" name="nama_produsen" placeholder="Nama Produsen" autocomplete="off" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="negara_produsen">Negara Produsen</label>
              <input type="text" class="form-control" id="v-negara_produsen" name="negara_produsen" placeholder="Negara Produsen" autocomplete="off" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="satuan">Satuan</label>
              <input type="text" class="form-control" id="v-satuan" name="satuan" placeholder="Satuan" autocomplete="off" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="jenis_bahan">Jenis Bahan</label>
              <input type="text" class="form-control" id="v-jenis_bahan" name="jenis_bahan" placeholder="Jenis Bahan" autocomplete="off" readonly>
            </div>
          </div>
          <div id="form_gel" class="col-md-6" style="display: none;">
            <div class="form-group">
              <label for="jenis_gel">Jenis Gelatin</label>
              <input type="text" class="form-control" id="v-jenis_gel" name="jenis_gel" placeholder="Jenis Gelatin" autocomplete="off" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="qty_pack">Quantity Pack (1x ...)</label>
              <input type="text" class="form-control" id="v-qty_pack" name="qty_pack" placeholder="Quantity Pack" autocomplete="off" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="sertif_halal">Sertifikat Halal</label>
              <input type="text" class="form-control" id="v-sertif_halal" name="sertif_halal" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="penerbit_halal">Penerbit Halal</label>
              <input type="text" class="form-control" id="v-penerbit_halal" name="penerbit_halal" placeholder="Penerbit Halal" autocomplete="off" readonly>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="no_seri">No Seri</label>
              <input type="text" class="form-control" id="v-no_seri" name="no_seri" placeholder="No Seri" autocomplete="off" readonly>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="ed_sertif">Exp Date Sertifikat</label>
              <input type="text" class="form-control" id="v-ed_sertif" name="ed_sertif" placeholder="E.D Sertifikat" autocomplete="off" readonly>
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
      var id_barang = $(event.relatedTarget).data('id_barang')
      var kode_barang = $(event.relatedTarget).data('kode_barang')
      var nama_barang = $(event.relatedTarget).data('nama_barang')
      var nama_produsen = $(event.relatedTarget).data('nama_produsen')
      var negara_produsen = $(event.relatedTarget).data('negara_produsen')
      var jenis_bahan = $(event.relatedTarget).data('jenis_bahan')
      var satuan = $(event.relatedTarget).data('satuan')
      var jenis_gel = $(event.relatedTarget).data('jenis_gel')
      var qty_pack = $(event.relatedTarget).data('qty_pack')
      var sertif_halal = $(event.relatedTarget).data('sertif_halal')
      var no_seri = $(event.relatedTarget).data('no_seri')
      var ed_sertif = $(event.relatedTarget).data('ed_sertif')
      var penerbit_halal = $(event.relatedTarget).data('penerbit_halal')

      $(this).find('#v-id_barang').val(id_barang)
      $(this).find('#v-kode_barang').val(kode_barang)
      $(this).find('#v-nama_barang').val(nama_barang)
      $(this).find('#v-nama_produsen').val(nama_produsen)
      $(this).find('#v-negara_produsen').val(negara_produsen)
      $(this).find('#v-jenis_bahan').val(jenis_bahan)
      $(this).find('#v-satuan').val(satuan)
      $(this).find('#v-jenis_gel').val(jenis_gel)
      $(this).find('#v-qty_pack').val(qty_pack)
      $(this).find('#v-sertif_halal').val(sertif_halal)
      $(this).find('#v-no_seri').val(no_seri)
      $(this).find('#v-ed_sertif').val(ed_sertif)
      $(this).find('#v-penerbit_halal').val(penerbit_halal)
      if (jenis_bahan === 'Bahan Baku') {
        $('#view #form_gel').show()
        $('#view #form_gel').prop('required', true);
      } else {
        $('#view #form_gel').hide()
        $('#view #form_gel').prop('required', false);
      }
    })
  })
</script>

< <!-- Modal Edit-->
  <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="<?= base_url() ?>Barang/update">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="kode_barang">Kode Barang</label>
                  <input type="hidden" id="e-id_barang" name="id_barang">
                  <input type="text" class="form-control text-uppercase" id="e-kode_barang" name="kode_barang" placeholder="Kode Barang" require>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nama_barang">Nama Barang</label>
                  <input type="text" class="form-control text-uppercase" id="e-nama_barang" name="nama_barang" placeholder="Nama Barang" autocomplete="off" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nama_produsen">Nama Produsen</label>
                  <input type="text" class="form-control text-uppercase" id="e-nama_produsen" name="nama_produsen" placeholder="Nama Produsen" autocomplete="off" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="negara_produsen">Negara Produsen</label>
                  <input type="text" class="form-control text-uppercase" id="e-negara_produsen" name="negara_produsen" placeholder="Negara Produsen" autocomplete="off" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="satuan">Satuan</label>
                  <select class="form-control chosen-select" id="e-satuan" name="satuan" required>
                    <option value="" disabled selected hidden>- Pilih Satuan -</option>
                    <option value="L">Liter</option>
                    <option value="Kg">Kilogram</option>
                    <option value="g">Gram</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="jenis_bahan">Jenis Bahan</label>
                  <select class="form-control chosen-select" id="e-jenis_bahan" name="jenis_bahan" required>
                    <option value="" disabled selected hidden>- Pilih Jenis Bahan -</option>
                    <option value="Bahan Baku">Bahan Baku</option>
                    <option value="Pewarna">Pewarna</option>
                    <option value="Bahan Tambahan">Bahan Tambahan</option>
                    <option value="Pelarut">Pelarut</option>
                    <option value="Tinta Print">Tinta Print</option>
                  </select>
                </div>
              </div>
              <div id="e-form_gel" class="col-md-6" style="display: none;">
                <div class="form-group">
                  <label for="jenis_gel">Jenis Gelatin</label>
                  <input type="text" class="form-control" id="e-jenis_gel" name="jenis_gel" placeholder="Jenis Gelatin" autocomplete="off" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="qty_pack">Quantity Pack (1x ...)</label>
                  <input type="text" class="form-control" id="e-qty_pack" name="qty_pack" placeholder="Quantity Pack" autocomplete="off" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="sertif_halal">Sertifikat Halal</label>
                  <input type="text" class="form-control" id="e-sertif_halal" name="sertif_halal" readonly>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="penerbit_halal">Penerbit Halal</label>
                  <input type="text" class="form-control text-uppercase" id="e-penerbit_halal" name="penerbit_halal" placeholder="Penerbit Halal" autocomplete="off" required>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="no_seri">No Seri</label>
                  <input type="text" class="form-control text-uppercase" id="e-no_seri" name="no_seri" placeholder="No Seri" autocomplete="off" required>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="ed_sertif">Exp Date Sertifikat</label>
                  <input type="text" class="form-control datepicker" id="e-ed_sertif" name="ed_sertif" placeholder="E.D Sertifikat" autocomplete="off" required>
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
        var id_barang = $(event.relatedTarget).data('id_barang')
        var kode_barang = $(event.relatedTarget).data('kode_barang')
        var nama_barang = $(event.relatedTarget).data('nama_barang')
        var nama_produsen = $(event.relatedTarget).data('nama_produsen')
        var negara_produsen = $(event.relatedTarget).data('negara_produsen')
        var jenis_bahan = $(event.relatedTarget).data('jenis_bahan')
        var satuan = $(event.relatedTarget).data('satuan')
        var jenis_gel = $(event.relatedTarget).data('jenis_gel')
        var qty_pack = $(event.relatedTarget).data('qty_pack')
        var sertif_halal = $(event.relatedTarget).data('sertif_halal')
        var no_seri = $(event.relatedTarget).data('no_seri')
        var ed_sertif = $(event.relatedTarget).data('ed_sertif')
        var penerbit_halal = $(event.relatedTarget).data('penerbit_halal')

        $(this).find('#e-id_barang').val(id_barang)
        $(this).find('#e-kode_barang').val(kode_barang)
        $(this).find('#e-nama_barang').val(nama_barang)
        $(this).find('#e-nama_produsen').val(nama_produsen)
        $(this).find('#e-negara_produsen').val(negara_produsen)
        $(this).find('#e-jenis_bahan').val(jenis_bahan)
        $(this).find('#e-jenis_bahan').trigger("chosen:updated");
        $(this).find('#e-satuan').val(satuan)
        $(this).find('#e-satuan').trigger("chosen:updated");
        $(this).find('#e-jenis_gel').val(jenis_gel)
        $(this).find('#e-qty_pack').val(qty_pack)
        $(this).find('#e-sertif_halal').val(sertif_halal)
        $(this).find('#e-no_seri').val(no_seri)
        $(this).find('#e-ed_sertif').val(ed_sertif)
        $(this).find('#e-penerbit_halal').val(penerbit_halal)
        $(this).find('#e-ed_sertif').datepicker().on('show.bs.modal', function(event) {
          event.stopImmediatePropagation();
        });
        if (jenis_bahan === 'Bahan Baku') {
          $('#e-form_gel').show()
          $('#e-jenis_gel').prop('required', true);
        } else {
          $('#e-form_gel').hide()
          $('#e-jenis_gel').prop('required', false);
        }
      });

      uppercase('#e-kode_barang');
      uppercase('#e-nama_barang');
      uppercase('#e-nama_produsen');
      uppercase('#e-negara_produsen');
      uppercase('#e-penerbit_halal');
      uppercase('#e-no_seri');

      $('#edit #e-jenis_bahan').on('change', function() {
        const value = $(this).val()
        console.log(value)
        if (value === 'Bahan Baku') {
          $('#e-form_gel').show()
          $('#e-jenis_gel').prop('required', true);
        } else {
          $('#e-form_gel').hide()
          $('#e-jenis_gel').prop('required', false);
        }
      });
    })
  </script>