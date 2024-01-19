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
                  <li class="breadcrumb-item"><a href="javascript:">Gudang Bahan Baku</a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Kelola Barang</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('gudang_bahanbaku/Barang_masuk') ?>">Barang Keluar</a></li>
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
                    <h5>Data Barang Keluar <b>(Approval)</b></h5>

                  </div>
                  <div class="card-block table-border-style">
                    <div class="table-responsive">
                      <table class="table datatable table-hover table-striped table-sm">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>No Transfer Slip</th>
                            <th>No Batch</th>
                            <th>Nama Barang</th>
                            <th class="text-right">Qty</th>
                            <th class="text-right">Details</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $level = $this->session->userdata('level');
                          $no = 1;
                          foreach ($result as $k) {
                            $tgl =  explode('-', $k['tgl'])[2] . "/" . explode('-', $k['tgl'])[1] . "/" . explode('-', $k['tgl'])[0];
                            $exp =  explode('-', $k['exp'])[2] . "/" . explode('-', $k['exp'])[1] . "/" . explode('-', $k['exp'])[0];
                            $mfg =  explode('-', $k['mfg'])[2] . "/" . explode('-', $k['mfg'])[1] . "/" . explode('-', $k['mfg'])[0];
                          ?>
                            <tr>
                              <th scope="row"><?= $no++ ?></th>
                              <td><?= $tgl ?></td>
                              <td><?= $k['no_transfer_slip'] ?></td>
                              <td><?= $k['no_batch'] ?></td>
                              <td><?= $k['nama_barang'] ?></td>
                              <td class="text-right"><?= number_format($k['qty'], 0, ",", ".") ?></td>
                              <td class="text-right">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <button type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#detail" data-id_barang="<?= $k['id_barang'] ?>" data-id_supplier="<?= $k['id_supplier'] ?>" data-id_barang_masuk="<?= $k['id_barang_masuk'] ?>"  data-no_batch="<?= $k['no_batch'] ?>" data-tgl="<?= $tgl ?>"   data-qty="<?= $k['qty'] ?>"  data-mfg="<?= $mfg ?>">
                                    <i class="feather icon-eye"></i>Details
                                  </button>
                                </div>
                              </td> 
                              <td class="text-center">
                                <?php if ($level === "admin" && $k['tot_permintaan_barang'] == 0) { ?>
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#edit" data-id_barang="<?= $k['id_barang'] ?>" data-id_supplier="<?= $k['id_supplier'] ?>" data-id_barang_masuk="<?= $k['id_barang_masuk'] ?>" data-no_surat_jalan="<?= $k['no_surat_jalan'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-tgl="<?= $tgl ?>" data-op_gudang="<?= $k['op_gudang'] ?>" data-dok_pendukung="<?= $k['dok_pendukung'] ?>" data-jenis_kemasan="<?= $k['jenis_kemasan'] ?>" data-jml_kemasan="<?= $k['jml_kemasan'] ?>" data-ditolak_kemasan="<?= $k['ditolak_kemasan'] ?>" data-tutup="<?= $k['tutup'] ?>" data-wadah="<?= $k['wadah'] ?>" data-label="<?= $k['label'] ?>" data-qty="<?= $k['qty'] ?>" data-qty_pack="<?= $k['qty_pack'] ?>" data-diterima_qty="<?= $k['qty'] ?>" data-ditolak_qty="<?= $k['ditolak_qty'] ?>" data-exp="<?= $exp ?>" data-mfg="<?= $mfg ?>">
                                      <i class="feather icon-edit-2"></i>Edit
                                    </button>
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
      <form method="post" id="form_add" action="<?= base_url() ?>gudang_bahanbaku/barang_masuk/add">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="no_batch">No Batch</label>
                <input type="text" class="form-control text-uppercase" id="no_batch" name="no_batch" placeholder="No Batch" maxlength="20" autocomplete="off" required>
                <div id="validationServer03Feedback" class="invalid-feedback">
                  Maaf Nomor Batch sudah ada.
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="no_surat_jalan">No. Po</label>
                <input type="text" class="form-control text-uppercase" id="no_surat_jalan" name="no_surat_jalan" maxlength="20" placeholder="No. Po" aria-describedby="validationServer03Feedback" autocomplete="off" required>
                <div id="validationServer03Feedback" class="invalid-feedback">
                  Maaf Nomor PO. sudah ada.
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="tgl">Tanggal Masuk</label>
                <input type="text" class="form-control datepicker" id="tgl" name="tgl" placeholder="Tanggal Masuk" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="id_barang">Nama Barang</label>
                <select class="form-control chosen-select" id="id_barang" name="id_barang" required>
                  <option value="" disabled selected hidden>- Pilih Nama Barang -</option>
                  <?php
                  foreach ($res_barang as $b) {
                  ?>
                    <option data-qtypack="<?= $b['qty_pack'] ?>" value="<?= $b['id_barang'] ?> ">(<?= $b['kode_barang'] ?>) <?= $b['nama_barang'] ?> (<?= $b['satuan'] ?>)</option>
                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="id_supplier">Nama Supplier</label>
                <select class="form-control chosen-select" id="id_supplier" name="id_supplier" required>
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
                <input type="text" class="form-control" id="op_gudang" name="op_gudang" value="<?= $this->session->userdata('nama_operator') ?>" placeholder="OP Gudang" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="dok_pendukung">Dokumen Pendukung</label>
                <div class="form-check mr-2">
                  <input class="form-check-input" name="dok_pendukung[]" type="checkbox" value="COA" required>
                  <label class="form-check-label">COA</label>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="qty_pack">QTY Pack</label>
                <input type="text" class="form-control" id="qty_pack" name="qty_pack" placeholder="QTY Pack" readonly>
              </div>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="jenis_kemasan">Jenis Kemasan</label>
                <select class="form-control chosen-select" id="jenis_kemasan" name="jenis_kemasan" required>
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
                <input type="text" class="form-control" id="qty" name="qty" placeholder="Jumlah Bahan" onkeypress="return hanyaAngka(event)" maxlength="15" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="jml_kemasan">Jumlah Kemasan</label>
                <input type="text" class="form-control" id="jml_kemasan" name="jml_kemasan" placeholder="Jumlah Kemasan" onkeypress="return hanyaAngka(event)" maxlength="15" autocomplete="off" readonly>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <center><label for="pemeriksaan"><b>Hasil Pemeriksaan Fisik Kemasan</b></label></center>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="form-check-label">Tutup</label>
                      <div class="form-check" id="form_tutup">
                        <input disabled class="form-check-input radio-pemeriksaan" id="rapat" type="radio" name="tutup" value="true"> Rapat <br>
                        <input disabled class="form-check-input radio-pemeriksaan" id="tidak_rapat" type="radio" name="tutup" value="false"> Tidak Rapat <br>
                      </div>
                    </div>
                    <div id="form_tutup_tidakrapat" class="col-md-4" style="display: none;">
                      <div>
                        <input type="text" id="jml_tutup_tidakrapat" name="jml_tutup_tidakrapat" class="form-control form-calculate"> <br>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="form-check-label">Wadah</label>
                      <div class="form-check" id="form_wadah">
                        <input disabled class="form-check-input radio-pemeriksaan" id="tidakrusak" type="radio" name="wadah" value="true"> Utuh <br>
                        <input disabled class="form-check-input radio-pemeriksaan" id="rusak" type="radio" name="wadah" value="false"> Rusak
                      </div>
                    </div>
                    <div id="form_wadah_rusak" class="col-md-4" style="display: none;">
                      <div>
                        <input type="text" id="jml_wadah_rusak" name="jml_wadah_rusak" class="form-control form-calculate"> <br>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="form-check-label">Label</label>
                      <div class="form-check" id="form_label">
                        <input disabled class="form-check-input radio-pemeriksaan" id="terbaca" type="radio" name="label" value="true"> Terbaca <br>
                        <input disabled class="form-check-input radio-pemeriksaan" id="tidakterbaca" type="radio" name="label" value="false"> Tidak Terbaca
                      </div>
                    </div>
                    <div id="form_label_tidakterbaca" class="col-md-4" style="display: none;">
                      <div>
                        <input type="text" id="jml_label_tidakterbaca" name="jml_label_tidakterbaca" class="form-control form-calculate"> <br>
                      </div>
                    </div>
                  </div>
                  <div id="hasil_kemasan" class="col-md-4 form-group" style="display: none;">
                    <div>
                      <label class="">Hasil Kemasan</label>
                      <div>
                        <table id="hasil_kemasan">
                          <tr>
                            <td style="width: 5%;">Di Terima</td>
                            <td style="width: 20%;"><input type="text" class="form-control form-control-sm w-25" id="diterima_kemasan" name="diterima_kemasan"></td>
                          </tr>
                          <tr>
                            <td style="width: 5%;"><span class="">Di Tolak</span> </td>
                            <td><input class="form-control form-control-sm w-25" type="text" id="ditolak_kemasan" name="ditolak_kemasan"></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div id="hasil_bahan" class="col-md-4 form-group" style="display: none;">
                    <div>
                      <label class="">Hasil Bahan</label>
                      <div>
                        <table id="hasil_bahan">
                          <tr>
                            <td style="width: 5%;">Di Terima</td>
                            <td style="width: 20%;"><input type="text" class="form-control form-control-sm w-50" id="diterima_bahan" name="diterima_bahan"></td>
                          </tr>
                          <tr>
                            <td style="width: 5%;"><span class="">Di Tolak</span> </td>
                            <td style="width: 20%"><input type="text" class="form-control form-control-sm w-50" id="ditolak_bahan" name="ditolak_bahan"></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="mfg">Mfg. Date</label>
                <input type="text" class="form-control datepicker" id="mfg" name="mfg" placeholder="Tanggal Kadaluarsa" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="exp">Exp Date</label>
                <input type="text" class="form-control datepicker" id="exp" name="exp" placeholder="Tanggal Kadaluarsa" autocomplete="off" required>
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
    $('#add').on('show.bs.modal', function(event) {
      var op_gudang = $(event.relatedTarget).data('op_gudang')
      $(this).find('#v-op_gudang').val(op_gudang)
    })

    uppercase('#no_batch');
    uppercase('#no_surat_jalan');

    // Tutup
    $('#tidak_rapat').on('click', function() {
      $('#form_tutup_tidakrapat').show()
      $('#jml_tutup_tidakrapat').prop('required', true);
      // const value = $(this).val()
      // if (value === 'Tidak Rapat') {} else {}
    })
    $('#rapat').on('click', function() {
      $('#form_tutup_tidakrapat').hide()
      $('#jml_tutup_tidakrapat').prop('required', false);
    })

    // Wadah
    $('#rusak').on('click', function() {
      $('#form_wadah_rusak').show()
      $('#jml_wadah_rusak').prop('required', true);
    })
    $('#tidakrusak').on('click', function() {
      $('#form_wadah_rusak').hide()
      $('#jml_wadah_rusak').prop('required', false);
    })

    // Label
    $('#tidakterbaca').on('click', function() {
      $('#form_label_tidakterbaca').show()
      $('#jml_label_tidakterbaca').prop('required', true);
    })
    $('#terbaca').on('click', function() {
      $('#form_label_tidakterbaca').hide()
      $('#jml_label_tidakterbaca').prop('required', false);
    })

    $('#qty').on('keyup', function() {
      const qtypack = $('#id_barang').find(':selected').attr('data-qtypack');
      const qty = $('#qty').val();
      if (qty === "" || qtypack === undefined) {
        $('#jml_kemasan').val("");
      } else {
        const hasil = parseInt(qty) / parseInt(qtypack);
        $('#jml_kemasan').val(hasil);
      }

      if (qty === "" || qtypack === undefined) {
        $(".radio-pemeriksaan").attr("disabled", true);
        $(".radio-pemeriksaan").prop("checked", false);
      } else {
        $(".radio-pemeriksaan").attr("disabled", false);
      }

      calculate()
    })

    $('#id_barang').on('change', function() {
      const qtypack = $('#id_barang').find(':selected').attr('data-qtypack');
      $('#qty_pack').val(qtypack);
      const qty = $('#qty').val();
      calculate();

      if (qty === "" || qtypack === undefined) {
        $(".radio-pemeriksaan").attr("disabled", true);
        $(".radio-pemeriksaan").prop("checked", false);
      } else {
        $(".radio-pemeriksaan").attr("disabled", false);
      }

    })

    $('.form-calculate').on('keyup', function() {
      calculate()
    })

    $(".radio-pemeriksaan").on("change", function() {
      const checkeds = $(".radio-pemeriksaan:checked")
      const value = []

      checkeds.each((i, el) => {
        value.push(el.value)
      })


      if (value.includes("false")) {
        $('#hasil_kemasan').show()
        $('#hasil_bahan').show()
      } else {
        $('#hasil_kemasan').hide()
        $('#hasil_bahan').hide()
      }

      calculate();
    });

    function calculate() {
      const qtypack = $('#id_barang').find(':selected').attr('data-qtypack');
      const qty = $('#qty').val();
      let qty_kemasan = 0
      if (qty != "" && qtypack != undefined) {
        qty_kemasan = parseInt(qty) / parseInt(qtypack)
      }
      $('#jml_kemasan').val(qty_kemasan);


      let jml_tutup_tidakrapat = 0;
      let jml_wadah_rusak = 0;
      let jml_label_tidak_terbaca = 0;

      if ($('#tidak_rapat').is(':checked')) {
        jml_tutup_tidakrapat = $('#jml_tutup_tidakrapat').val()
        jml_tutup_tidakrapat = jml_tutup_tidakrapat || 0
      } else {
        jml_tutup_tidakrapat = 0;
        $('#jml_tutup_tidakrapat').val(0)
      }


      if ($('#rusak').is(':checked')) {
        jml_wadah_rusak = $('#jml_wadah_rusak').val()
        jml_wadah_rusak = jml_wadah_rusak || 0
      } else {
        jml_wadah_rusak = 0
        $('#jml_wadah_rusak').val(0)
      }

      if ($('#tidakterbaca').is(':checked')) {
        jml_label_tidak_terbaca = $('#jml_label_tidakterbaca').val()
        jml_label_tidak_terbaca = jml_label_tidak_terbaca || 0
      } else {
        jml_label_tidak_terbaca = 0
        $('#jml_label_tidakterbaca').val(0)
      }


      const ditolak_kemasan = parseInt(jml_tutup_tidakrapat) + parseInt(jml_wadah_rusak) + parseInt(jml_label_tidak_terbaca)
      const diterima_kemasan = parseInt(qty_kemasan) - ditolak_kemasan;
      $('#ditolak_kemasan').val(ditolak_kemasan)
      $('#diterima_kemasan').val(diterima_kemasan)

      const diterima_bahan = parseInt(diterima_kemasan) * parseInt(qtypack)
      const ditolak_bahan = parseInt(ditolak_kemasan) * parseInt(qtypack)
      $('#diterima_bahan').val(diterima_bahan)
      $('#ditolak_bahan').val(ditolak_bahan)
    }

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

    $("#no_batch").keyup(function() {
      var no_batch = $("#no_batch").val();
      jQuery.ajax({
        url: "<?= base_url() ?>barang_masuk/cek_no_batch",
        dataType: 'text',
        type: "post",
        data: {
          no_batch: no_batch
        },
        success: function(response) {
          if (response == "true") {
            $("#no_batch").addClass("is-invalid");
            $("#simpan").attr("disabled", "disabled");
          } else {
            $("#no_batch").removeClass("is-invalid");
            $("#simpan").removeAttr("disabled");
          }
        }
      });
    })
  })
</script>

<!-- Modal Detail -->
<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Barang Masuk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" id="form_add">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="no_batch">No Batch</label>
                <input type="text" class="form-control" id="v-no_batch" name="no_batch" placeholder="No Batch" maxlength="20" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="no_surat_jalan">No. Po</label>
                <input type="text" class="form-control" id="v-no_surat_jalan" name="no_surat_jalan" maxlength="20" placeholder="No. Po" aria-describedby="validationServer03Feedback" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="tgl">Tanggal Masuk</label>
                <input type="text" class="form-control" id="v-tgl" name="tgl" placeholder="Tanggal Masuk" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="id_barang">Nama Barang</label>
                <input type="text" class="form-control" id="v-nama_barang" name="nama_barang" placeholder="Nama Barang" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="id_supplier">Nama Supplier</label>
                <input type="text" class="form-control" id="v-nama_supplier" name="nama_supplier" placeholder="Nama Supplier" readonly>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="op_gudang">OP Gudang</label>
                <input type="text" class="form-control" id="v-op_gudang" name="op_gudang" placeholder="OP Gudang" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="dok_pendukung">Dokumen Pendukung</label>
                <input type="text" class="form-control" id="v-dok_pendukung" name="dok_pendukung" readonly>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="qty_pack">QTY Pack</label>
                <input type="text" class="form-control" id="v-qty_pack" name="qty_pack" placeholder="QTY Pack" readonly>
              </div>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="jenis_kemasan">Jenis Kemasan</label>
                <input type="text" class="form-control" id="v-jenis_kemasan" name="jenis_kemasan" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="qty">Jumlah Bahan</label>
                <input type="text" class="form-control" id="v-qty" name="qty" placeholder="Jumlah Bahan" maxlength="15" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="jml_kemasan">Jumlah Kemasan</label>
                <input type="text" class="form-control" id="v-jml_kemasan" name="jml_kemasan" placeholder="Jumlah Kemasan" maxlength="15" readonly>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <center><label for="pemeriksaan"><b>Hasil Pemeriksaan Fisik Kemasan</b></label></center>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Tutup</label>
                      <input type="text" class="form-control" id="v-tutup" name="tutup" readonly>
                    </div>
                    <!-- <div class="col-md-4">
                                            <div>
                                                <input type="text" id="jml_tutup_tidakrapat" name="jml_tutup_tidakrapat" class="form-control form-calculate" readonly> <br>
                                            </div>
                                        </div> -->
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Wadah</label>
                      <input type="text" class="form-control" id="v-wadah" name="wadah" readonly>
                    </div>
                    <!-- <div id="form_wadah_rusak" class="col-md-4">
                                            <div>
                                                <input type="text" id="jml_wadah_rusak" name="jml_wadah_rusak" class="form-control form-calculate" readonly> <br>
                                            </div>
                                        </div> -->
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Label</label>
                      <input type="text" class="form-control" id="v-label" name="label" readonly>
                    </div>
                    <!-- <div id="form_label_tidakterbaca" class="col-md-4">
                                            <div>
                                                <input type="text" id="jml_label_tidakterbaca" name="jml_label_tidakterbaca" class="form-control form-calculate" readonly> <br>
                                            </div>
                                        </div> -->
                  </div>
                  <div id="hasil_kemasan" class="col-md-4 form-group">
                    <div>
                      <label class="">Hasil Kemasan</label>
                      <div>
                        <table id="hasil_kemasan">
                          <tr>
                            <td style="width: 5%;">Di Terima</td>
                            <td style="width: 20%;"><input type="text" class="form-control form-control-sm w-25" id="v-diterima_kemasan" name="diterima_kemasan" readonly></td>
                          </tr>
                          <tr>
                            <td style="width: 5%;"><span class="">Di Tolak</span> </td>
                            <td><input type="text" class="form-control form-control-sm w-25" id="v-ditolak_kemasan" name="ditolak_kemasan" readonly></td>
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
                            <td style="width: 20%;"><input type="text" class="form-control form-control-sm w-50" id="v-diterima_bahan" name="diterima_bahan" readonly></td>
                          </tr>
                          <tr>
                            <td style="width: 5%;"><span class="">Di Tolak</span> </td>
                            <td style="width: 20%"><input type="text" class="form-control form-control-sm w-50" id="v-ditolak_bahan" name="ditolak_bahan" readonly></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="mfg">Mfg. Date</label>
                <input type="text" class="form-control" id="v-mfg" name="mfg" placeholder="Tanggal Kadaluarsa" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="exp">Exp Date</label>
                <input type="text" class="form-control" id="v-exp" name="exp" placeholder="Tanggal Kadaluarsa" readonly>
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

<script type="text/javascript">
  $(document).ready(function() {
    $('#detail').on('show.bs.modal', function(event) {
      // var id_barang_masuk = $(event.relatedTarget).data('id_barang_masuk')
      // jQuery.ajax({
      //   url: `<?= base_url() ?>barang_masuk/getOne/${id_barang_masuk}`,
      //   type: "get",
      //   success: function(response) {
      //     const detail = JSON.parse(response).detail
      //     let tgl = detail.tgl.split('-');
      //     tgl = `${tgl[2]}/${tgl[1]}/${tgl[0]}`;
      //     let exp = detail.exp.split('-');
      //     exp = `${exp[2]}/${exp[1]}/${exp[0]}`;
      //     let mfg = detail.mfg.split('-');
      //     mfg = `${mfg[2]}/${mfg[1]}/${mfg[0]}`;
      //     $('#detail').find('#v-id_barang_masuk').val(detail.id_barang_masuk)
      //     $('#detail').find('#v-no_surat_jalan').val(detail.no_surat_jalan)
      //     $('#detail').find('#v-no_batch').val(detail.no_batch)
      //     $('#detail').find('#v-tgl').val(tgl)
      //     $('#detail').find('#v-nama_barang').val(detail.nama_barang)
      //     $('#detail').find('#v-nama_supplier').val(detail.nama_supplier)
      //     $('#detail').find('#v-op_gudang').val(detail.op_gudang)
      //     $('#detail').find('#v-dok_pendukung').val(detail.dok_pendukung)
      //     $('#detail').find('#v-jenis_kemasan').val(detail.jenis_kemasan)
      //     $('#detail').find('#v-jml_kemasan').val(detail.jml_kemasan)
      //     $('#detail').find('#v-tutup').val(detail.tutup)
      //     $('#detail').find('#v-wadah').val(detail.wadah)
      //     $('#detail').find('#v-label').val(detail.label)
      //     $('#detail').find('#v-qty').val(detail.qty)
      //     $('#detail').find('#v-exp').val(exp)
      //     $('#detail').find('#v-mfg').val(mfg)
      //   },
      // });

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

      $(this).find('#v-id_barang').val(id_barang)
      $(this).find('#v-id_barang_masuk').val(id_barang_masuk)
      $(this).find('#v-no_surat_jalan').val(no_surat_jalan)
      $(this).find('#v-no_batch').val(no_batch)
      $(this).find('#v-tgl').val(tgl)
      $(this).find('#v-nama_barang').val(nama_barang)
      $(this).find('#v-nama_barang').trigger("chosen:updated");
      $(this).find('#v-nama_supplier').val(nama_supplier)
      $(this).find('#v-nama_supplier').trigger("chosen:updated");
      $(this).find('#v-op_gudang').val(op_gudang)
      $(this).find('#v-dok_pendukung').val(dok_pendukung)
      $(this).find('#v-jenis_kemasan').val(jenis_kemasan)
      $(this).find('#v-jenis_kemasan').trigger("chosen:updated");
      $(this).find('#v-jml_kemasan').val(jml_kemasan)
      $(this).find('#v-diterima_kemasan').val(diterima_kemasan)
      $(this).find('#v-ditolak_kemasan').val(ditolak_kemasan)
      $(this).find('#v-tutup').val(tutup)
      $(this).find('#v-wadah').val(wadah)
      $(this).find('#v-label').val(label)
      $(this).find('#v-qty').val(qty)
      $(this).find('#v-qty_pack').val(qty_pack)
      $(this).find('#v-diterima_bahan').val(diterima_qty)
      $(this).find('#v-ditolak_bahan').val(ditolak_qty)
      $(this).find('#v-exp').val(exp)
      $(this).find('#v-mfg').val(mfg)
    })
  })
</script>

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
      // var id_barang_masuk = $(event.relatedTarget).data('id_barang_masuk')
      // jQuery.ajax({
      //   url: `<?= base_url() ?>barang_masuk/getOne/${id_barang_masuk}`,
      //   type: "get",
      //   success: function(response) {
      //     const edit = JSON.parse(response).detail
      //     const detail = JSON.parse(response).detail
      //     let tgl = detail.tgl.split('-');
      //     tgl = `${tgl[2]}/${tgl[1]}/${tgl[0]}`;
      //     let exp = detail.exp.split('-');
      //     exp = `${exp[2]}/${exp[1]}/${exp[0]}`;
      //     let mfg = detail.mfg.split('-');
      //     mfg = `${mfg[2]}/${mfg[1]}/${mfg[0]}`;
      //     $('#edit').find('#e_id_barang').val(edit.id_barang)
      //     $('#edit').find('#e_id_barang_masuk').val(edit.id_barang_masuk)
      //     $('#edit').find('#e_no_surat_jalan').val(edit.no_surat_jalan)
      //     $('#edit').find('#e_no_batch').val(edit.no_batch)
      //     $('#edit').find('#e_tgl').val(tgl)
      //     $('#edit').find('#e_nama_barang').val(edit.id_barang)
      //     $('#edit').find('#e_nama_barang').trigger("chosen:updated");
      //     $('#edit').find('#e_nama_supplier').val(edit.nama_supplier);
      //     $('#edit').find('#e_nama_supplier').trigger("chosen:updated");
      //     $('#edit').find('#e_op_gudang').val(edit.op_gudang)
      //     $('#edit').find('#e_dok_pendukung').val(edit.dok_pendukung)
      //     $('#edit').find('#e_jenis_kemasan').val(edit.jenis_kemasan)
      //     $('#edit').find('#e_jenis_kemasan').trigger("chosen:updated");
      //     $('#edit').find('#e_jml_kemasan').val(edit.jml_kemasan)
      //     $('#edit').find('#e_diterima_kemasan').val(edit.jml_kemasan)
      //     $('#edit').find('#e_ditolak_kemasan').val(edit.ditolak_kemasan)
      //     $('#edit').find('#e_tutup').val(edit.tutup)
      //     $('#edit').find('#e_wadah').val(edit.wadah)
      //     $('#edit').find('#e_label').val(edit.label)
      //     $('#edit').find('#e_qty').val(edit.qty)
      //     $('#edit').find('#e_qty_pack').val(edit.qty_pack)
      //     $('#edit').find('#e_diterima_bahan').val(edit.qty)
      //     $('#edit').find('#e_ditolak_bahan').val(edit.ditolak_qty)
      //     $('#edit').find('#e_exp').val(exp)
      //     $('#edit').find('#e_mfg').val(mfg)
      //   }
      // });

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