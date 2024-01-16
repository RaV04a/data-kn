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
                  <li class="breadcrumb-item"><a href="<?= base_url('Marketing/Kode_warna') ?>">Input Kode Warna</a></li>
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
                    <h5>Data Kode Warna</h5>

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
                            <th>Kode Warna</th>
                            <th>Nama Warna</th>
                            <th class="text-center">Detail</th>
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
                              <th scope="row"><?= $no++ ?></th>
                              <td><?= $k['kode_warna_cap'] ?></td>
                              <td><?= $k['warna_cap'] ?></td>
                              <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <button type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#view" data-id_kw_cap="<?= $k['id_kw_cap'] ?>" data-kode_warna_cap="<?= $k['kode_warna_cap'] ?>" data-warna_cap="<?= $k['warna_cap'] ?>" data-ti02="<?= $k['ti02'] ?>" data-r1="<?= $k['r1'] ?>" data-r3="<?= $k['r3'] ?>" data-y5="<?= $k['y5'] ?>" data-b1="<?= $k['b1'] ?>" data-y10="<?= $k['y10'] ?>" data-sf="<?= $k['sf'] ?>">
                                    <i class="feather icon-eye"></i>Detail
                                  </button>
                                </div>
                              </td>
                              <td class="text-center">
                                <?php if ($level === "admin") { ?>
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#edit" data-id_kw_cap="<?= $k['id_kw_cap'] ?>" data-kode_warna_cap="<?= $k['kode_warna_cap'] ?>" data-warna_cap="<?= $k['warna_cap'] ?>" data-ti02="<?= $k['ti02'] ?>" data-r1="<?= $k['r1'] ?>" data-r3="<?= $k['r3'] ?>" data-y5="<?= $k['y5'] ?>" data-b1="<?= $k['b1'] ?>" data-y10="<?= $k['y10'] ?>" data-sf="<?= $k['sf'] ?>">
                                      <i class="feather icon-edit-2"></i>Edit
                                    </button>
                                  </div>
                                  <div class="btn-group" role="group">
                                    <a href="<?= base_url() ?>Marketing/Kode_warna/delete/<?= $k['id_kw_cap'] ?>" class="btn btn-danger btn-square text-light btn-sm" onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kode Warna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>Marketing/Kode_warna/add">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="kode_warna">Kode Warna</label>
                <input type="hidden" id="id_kw_cap" name="id_kw_cap">
                <input type="hidden" id="id_kw_body" name="id_kw_body">
                <div class="input-group">
                  <input type="number" maxlength="4" class="form-control text-uppercase" id="kode_warna" name="kode_warna" placeholder="Kode Warna" autocomplete="off" required>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="warna">Nama Warna</label>
                <input type="text" class="form-control text-uppercase" id="warna" name="warna" placeholder="Nama Warna" autocomplete="off" required>
              </div>
            </div>
          </div>

          <center><label for="formula_warna" class="font-weight-bold mt-3">Komposisi Formula</label></center>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="ti02" class="">Titanium Dioksida (Ti02)</label><br>
                <div class="input-group-append">
                  <input type="number" class="form-control" id="ti02" name="ti02" placeholder="0.00 %" autocomplete="off" required>
                  <span class="input-group-text">%</span>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="r1" class="">Carmoisine (R1)</label><br>
                <div class="input-group-append">
                  <input type="number" class="form-control" id="r1" name="r1" placeholder="0.00 ml" autocomplete="off" required>
                  <span class="input-group-text">ml</span>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="r3" class="">Eritrhosine (R3)</label><br>
                <div class="input-group-append">
                  <input type="number" class="form-control" id="r3" name="r3" placeholder="0.00 ml" autocomplete="off" required>
                  <span class="input-group-text">ml</span>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="y5" class="">Tartrazine (Y5)</label><br>
                <div class="input-group-append">
                  <input type="number" class="form-control" id="y5" name="y5" placeholder="0.00 ml" autocomplete="off" required>
                  <span class="input-group-text">ml</span>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="b1" class="">Brilliant Blue (B1)</label><br>
                <div class="input-group-append">
                  <input type="number" class="form-control" id="b1" name="b1" placeholder="0.00 ml" autocomplete="off" required>
                  <span class="input-group-text">ml</span>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="y10" class="">Quinoline Yellow (Y10)</label><br>
                <div class="input-group-append">
                  <input type="number" class="form-control" id="y10" name="y10" placeholder="0.00 ml" autocomplete="off" required>
                  <span class="input-group-text">ml</span>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="sf" class="">Silver F (SF)</label><br>
                <div class="input-group-append">
                  <input type="number" class="form-control" id="sf" name="sf" placeholder="0.00 ml" autocomplete="off" required>
                  <span class="input-group-text">ml</span>
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
    uppercase('#kode_warna');
    uppercase('#warna');
    
    $('#add').on('hidden.bs.modal', function() {
      $(this).find('form')[0].reset();
    });
  })

  $(document).ready(function () {
    $("#kode_warna").keypress(function () {
      if (this.value.length == 4) {
        return false;
      }
    })
  })

  $(document).ready(function () {
    $("#ti02").keypress(function () {
      if (this.value.length == 5) {
        return false;
      }
    })
  })

  $(document).ready(function () {
    $("#r1").keypress(function () {
      if (this.value.length == 5 ) {
        return false;
      }
    })
  })

  $(document).ready(function () {
    $("#r3").keypress(function () {
      if (this.value.length == 5) {
        return false;
      }
    })
  })

  $(document).ready(function () {
    $("#y5").keypress(function () {
      if (this.value.length == 5) {
        return false;
      }
    })
  })

  $(document).ready(function () {
    $("#b1").keypress(function () {
      if (this.value.length == 5) {
        return false;
      }
    })
  })

  $(document).ready(function () {
    $("#y10").keypress(function () {
      if (this.value.length == 5) {
        return false;
      }
    })
  })

  $(document).ready(function () {
    $("#sf").keypress(function () {
      if (this.value.length == 5) {
        return false;
      }
    })
  })

</script>



<!-- Modal -->
<div class="modal fade" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Kode Warna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <form>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="kode_warna">Kode Warna</label>
              <div class="input-group">
                <input type="text" class="form-control" id="v-kode_warna" name="kode_warna" placeholder="Kode Warna" readonly>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="warna">Nama Warna</label>
              <input type="text" class="form-control" id="v-warna" name="warna" placeholder="Nama Warna" autocomplete="off" readonly>
            </div>
          </div>
        </div>

        <center><label for="formula_warna" class="font-weight-bold mt-3">Komposisi Formula</label></center>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="ti02" class="">Titanium Dioksida (Ti02)</label><br>
              <input type="text" class="form-control" id="v-ti02" name="ti02" placeholder="Titanium Dioksida" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="r1" class="">Carmoisine (R1)</label><br>
              <input type="text" class="form-control" id="v-r1" name="r1" placeholder="Carmoisine" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="r3" class="">Eritrhosine (R3)</label><br>
              <input type="text" class="form-control" id="v-r3" name="r3" placeholder="Eritrhosine" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="y5" class="">Tartrazine (Y5)</label><br>
              <input type="text" class="form-control" id="v-y5" name="y5" placeholder="Tartrazine" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="b1" class="">Brilliant Blue (B1)</label><br>
              <input type="text" class="form-control" id="v-b1" name="b1" placeholder="Brilliant Blue" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="y10" class="">Quinoline Yellow (Y10)</label><br>
              <input type="text" class="form-control" id="v-y10" name="y10" placeholder="Quinoline Yellow" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="sf" class="">Silver F (SF)</label><br>
              <input type="text" class="form-control" id="v-sf" name="sf" placeholder="Silver F" readonly>
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
      var id_kw_cap = $(event.relatedTarget).data('id_kw_cap')
      var id_kw_body = $(event.relatedTarget).data('id_kw_body')
      var kode_warna = $(event.relatedTarget).data('kode_warna_cap')
      var warna = $(event.relatedTarget).data('warna_cap')
      var ti02 = $(event.relatedTarget).data('ti02')
      var r1 = $(event.relatedTarget).data('r1')
      var r3 = $(event.relatedTarget).data('r3')
      var y5 = $(event.relatedTarget).data('y5')
      var b1 = $(event.relatedTarget).data('b1')
      var y10 = $(event.relatedTarget).data('y10')
      var sf = $(event.relatedTarget).data('sf')

      $(this).find('#v-id_kw_cap').val(id_kw_cap)
      $(this).find('#v-id_kw_body').val(id_kw_body)
      $(this).find('#v-kode_warna').val(kode_warna)
      $(this).find('#v-warna').val(warna)
      $(this).find('#v-ti02').val(ti02 + " %")
      $(this).find('#v-r1').val(r1 + " ml")
      $(this).find('#v-r3').val(r3 + " ml")
      $(this).find('#v-y5').val(y5 + " ml")
      $(this).find('#v-b1').val(b1 + " ml")
      $(this).find('#v-y10').val(y10 + " ml")
      $(this).find('#v-sf').val(sf + " ml")
    })
  })
</script>

<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Kode Warna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>Marketing/Kode_warna/update">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="kode_warna">Kode Warna</label>
                <input type="hidden" id="e-id_kw_cap" name="id_kw_cap">
                <input type="hidden" id="e-id_kw_body" name="id_kw_body">
                <div class="input-group">
                  <input type="number" class="form-control" id="e-kode_warna" name="kode_warna" placeholder="Kode Warna" required>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="warna">Nama Warna</label>
                <input type="text" class="form-control" id="e-warna" name="warna" placeholder="Nama Warna" autocomplete="off" required>
              </div>
            </div>
          </div>

          <center><label for="formula_warna" class="font-weight-bold mt-3">Komposisi Formula</label></center>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="ti02" class="">Titanium Dioksida (Ti02)</label><br>
                <div class="input-group-append">
                  <input type="text" class="form-control" id="e-ti02" name="ti02" autocomplete="off" placeholder="Titanium Dioksida" required>
                  <span class="input-group-text">%</span>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="r1" class="">Carmoisine (R1)</label><br>
                <div class="input-group-append">
                  <input type="text" class="form-control" id="e-r1" name="r1" autocomplete="off" placeholder="Carmoisine" required>
                  <span class="input-group-text">ml</span>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="r3" class="">Eritrhosine (R3)</label><br>
                <div class="input-group-append">
                  <input type="text" class="form-control" id="e-r3" name="r3" autocomplete="off" placeholder="Eritrhosine" required>
                  <span class="input-group-text">ml</span>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="y5" class="">Tartrazine (Y5)</label><br>
                <div class="input-group-append">
                  <input type="text" class="form-control" id="e-y5" name="y5" autocomplete="off" placeholder="Tartrazine" required>
                  <span class="input-group-text">ml</span>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="b1" class="">Brilliant Blue (B1)</label><br>
                <div class="input-group-append">
                  <input type="text" class="form-control" id="e-b1" name="b1" autocomplete="off" placeholder="Brilliant Blue" required>
                  <span class="input-group-text">ml</span>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="y10" class="">Quinoline Yellow (Y10)</label><br>
                <div class="input-group-append">
                  <input type="text" class="form-control" id="e-y10" name="y10" autocomplete="off" placeholder="Quinoline Yellow" required>
                  <span class="input-group-text">ml</span>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="sf" class="">Silver F (SF)</label><br>
                <div class="input-group-append">
                  <input type="text" class="form-control" id="e-sf" name="sf" autocomplete="off" placeholder="Silver F" required>
                  <span class="input-group-text">ml</span>
                </div>
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
      var id_kw_cap = $(event.relatedTarget).data('id_kw_cap')
      var id_kw_body = $(event.relatedTarget).data('id_kw_body')
      var kode_warna = $(event.relatedTarget).data('kode_warna_cap')
      var warna = $(event.relatedTarget).data('warna_cap')
      var ti02 = $(event.relatedTarget).data('ti02')
      var r1 = $(event.relatedTarget).data('r1')
      var r3 = $(event.relatedTarget).data('r3')
      var y5 = $(event.relatedTarget).data('y5')
      var b1 = $(event.relatedTarget).data('b1')
      var y10 = $(event.relatedTarget).data('y10')
      var sf = $(event.relatedTarget).data('sf')

      $(this).find('#e-id_kw_cap').val(id_kw_cap)
      $(this).find('#e-id_kw_body').val(id_kw_body)
      $(this).find('#e-kode_warna').val(kode_warna)
      $(this).find('#e-warna').val(warna)
      $(this).find('#e-ti02').val(ti02)
      $(this).find('#e-r1').val(r1)
      $(this).find('#e-r3').val(r3)
      $(this).find('#e-y5').val(y5)
      $(this).find('#e-b1').val(b1)
      $(this).find('#e-y10').val(y10)
      $(this).find('#e-sf').val(sf)
    })

    checkKoma('#e-ti02');
    checkKoma('#e-r1');
    checkKoma('#e-r3');
    checkKoma('#e-y5');
    checkKoma('#e-b1');
    checkKoma('#e-y10');
    checkKoma('#e-sf');
    $('#add').on('hidden.bs.modal', function() {
      $(this).find('form')[0].reset();
    });
  })
</script>