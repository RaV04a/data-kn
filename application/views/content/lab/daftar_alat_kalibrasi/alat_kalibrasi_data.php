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
                  <li class="breadcrumb-item"><a href="javascript:">Lab/QC</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('lab/Alat_kalibrasi') ?>">Alat Kalibrasi</a></li>
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
                    <h5>Daftar Alat Kalibrasi</h5>

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
                            <th>Kode Alat</th>
                            <th>Nama Alat</th>
                            <th>No Sertifikat</th>
                            <th>Tanggal Kalibrasi</th>
                            <th>E.D Kalibrasi</th>
                            <th class="text-center">Detail</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $level = $this->session->userdata('level');
                          $jabatan = $this->session->userdata('jabatan');
                          $no = 1;
                          foreach ($result as $k) {
                            $tgl_kalibrasi =  explode('-', $k['tgl_kalibrasi'])[2] . "/" . explode('-', $k['tgl_kalibrasi'])[1] . "/" . explode('-', $k['tgl_kalibrasi'])[0];
                            $ed_kalibrasi =  explode('-', $k['ed_kalibrasi'])[2] . "/" . explode('-', $k['ed_kalibrasi'])[1] . "/" . explode('-', $k['ed_kalibrasi'])[0]; ?>
                            <tr class="table-row">
                              <th scope="row"><?= $no++ ?></th>
                              <td><?= $k['kode_alat'] ?></td>
                              <td><?= $k['nama_alat'] ?></td>
                              <td><?= $k['no_sertif'] ?></td>
                              <td><?= $tgl_kalibrasi ?></td>
                              <td id="ed"><?= $ed_kalibrasi ?></td>
                              <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <button type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#view" data-id_kalibrasi="<?= $k['id_kalibrasi'] ?>" data-kode_alat="<?= $k['kode_alat'] ?>" data-nama_alat="<?= $k['nama_alat'] ?>" data-no_sertif="<?= $k['no_sertif'] ?>" data-tgl_kalibrasi="<?= $tgl_kalibrasi ?>" data-ed_kalibrasi="<?= $ed_kalibrasi ?>">
                                    <i class="feather icon-eye"></i>Detail
                                  </button>
                                </div>
                              </td>
                              <td class="text-center">
                                <?php if ($jabatan === "admin" || $jabatan === "operator" || $jabatan === "supervisor") { ?>
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#edit" data-id_kalibrasi="<?= $k['id_kalibrasi'] ?>" data-kode_alat="<?= $k['kode_alat'] ?>" data-nama_alat="<?= $k['nama_alat'] ?>" data-no_sertif="<?= $k['no_sertif'] ?>" data-tgl_kalibrasi="<?= $tgl_kalibrasi ?>" data-ed_kalibrasi="<?= $ed_kalibrasi ?>">
                                      <i class=" feather icon-edit-2"></i>Edit
                                    </button>
                                  </div>
                                  <div class="btn-group" role="group">
                                    <a href="<?= base_url() ?>lab/Alat_kalibrasi/delete/<?= $k['id_kalibrasi'] ?>" class="btn btn-danger btn-square text-light btn-sm" onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
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


<script type="text/javascript">
  $(document).ready(function() {
    $('.table-row').each((index, row) => {
      let tgl = $(row).find('#ed').text()
      const now = moment()
      tgl = moment(tgl, "DD/MM/YYYY")
      const duration = moment.duration(tgl.diff(now)).asDays()
      if (duration <= 0) {
        $(row).addClass('table-danger')
      } else if (duration <= 7) {
        $(row).addClass('table-warning')
      }
    })


    if ($('.table-row.table-danger').length > 0) {
      Toastify({
        text: "Waktu ED Kalibrasi sudah habis waktu",
        duration: 5000,
        close: true,
        gravity: "top", // `top` or `bottom`
        position: "center", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
          background: "#BD362F",
        },
        onClick: function() {} // Callback after click
      }).showToast();
    }

    if ($('.table-row.table-warning').length > 0) {
      Toastify({
        text: "Waktu ED Kalibrasi tersisa beberapa hari lagi",
        duration: 5000,
        close: true,
        gravity: "top", // `top` or `bottom`
        position: "center", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
          background: "#F89406",
        },
        onClick: function() {} // Callback after click
      }).showToast();
    }
  })
</script>

<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Alat Kalibrasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>lab/Alat_kalibrasi/add">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="kode_alat">Kode Alat</label>
                <input type="hidden" id="id_kalibrasi" name="id_kalibrasi">
                <input type="text" class="form-control text-uppercase" id="kode_alat" name="kode_alat" placeholder="Kode Alat" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="nama_alat">Nama Alat</label>
                <input type="text" class="form-control text-uppercase" id="nama_alat" name="nama_alat" placeholder="Nama Alat" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="no_sertif">No Sertif</label>
                <input type="text" class="form-control text-uppercase" id="no_sertif" name="no_sertif" placeholder="No Sertifikat" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="tgl_kalibrasi">Tanggal Kalibrasi</label>
                <input type="text" class="form-control datepicker" id="tgl_kalibrasi" name="tgl_kalibrasi" placeholder="Tanggal Kalibrasi" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="ed_kalibrasi">E.D Kalibrasi</label>
                <input type="text" class="form-control datepicker" id="ed_kalibrasi" name="ed_kalibrasi" placeholder="E.D Kalibrasi" autocomplete="off" required>
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
    uppercase('#kode_alat');
    uppercase('#nama_alat');
    uppercase('#no_sertif');

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
        <h5 class="modal-title" id="exampleModalLabel">Detail Alat Kalibrasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <form>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="kode_alat">Kode Alat</label>
              <input type="hidden" id="id_kalibrasi" name="id_kalibrasi">
              <input type="text" class="form-control" id="v-kode_alat" name="kode_alat" placeholder="Kode Alat" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="nama_alat">Nama Alat</label>
              <input type="text" class="form-control" id="v-nama_alat" name="nama_alat" placeholder="Nama Alat" autocomplete="off" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="no_sertif">No Sertif</label>
              <input type="text" class="form-control" id="v-no_sertif" name="no_sertif" placeholder="No Sertifikat" autocomplete="off" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="tgl_kalibrasi">Tanggal Kalibrasi</label>
              <input type="text" class="form-control" id="v-tgl_kalibrasi" name="tgl_kalibrasi" placeholder="Tanggal Kalibrasi" autocomplete="off" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="ed_kalibrasi">E.D Kalibrasi</label>
              <input type="text" class="form-control" id="v-ed_kalibrasi" name="ed_kalibrasi" placeholder="E.D Kalibrasi" autocomplete="off" readonly>
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
      var id_kalibrasi = $(event.relatedTarget).data('id_kalibrasi')
      var kode_alat = $(event.relatedTarget).data('kode_alat')
      var nama_alat = $(event.relatedTarget).data('nama_alat')
      var no_sertif = $(event.relatedTarget).data('no_sertif')
      var tgl_kalibrasi = $(event.relatedTarget).data('tgl_kalibrasi')
      var ed_kalibrasi = $(event.relatedTarget).data('ed_kalibrasi')

      $(this).find('#v-id_kalibrasi').val(id_kalibrasi)
      $(this).find('#v-kode_alat').val(kode_alat)
      $(this).find('#v-nama_alat').val(nama_alat)
      $(this).find('#v-no_sertif').val(no_sertif)
      $(this).find('#v-tgl_kalibrasi').val(tgl_kalibrasi)
      $(this).find('#v-ed_kalibrasi').val(ed_kalibrasi)
    })
  })
</script>

<!-- Modal Edit-->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Alat Kalibrasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>lab/Alat_kalibrasi/update">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="kode_alat">Kode Alat</label>
                <input type="hidden" id="e-id_kalibrasi" name="id_kalibrasi">
                <input type="text" class="form-control" id="e-kode_alat" name="kode_alat" placeholder="Kode Alat" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="nama_alat">Nama Alat</label>
                <input type="text" class="form-control" id="e-nama_alat" name="nama_alat" placeholder="Nama Alat" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="no_sertif">No Sertif</label>
                <input type="text" class="form-control" id="e-no_sertif" name="no_sertif" placeholder="No Sertifikat" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="tgl_kalibrasi">Tanggal Kalibrasi</label>
                <?php
                if ($jabatan === "supervisor") { ?>
                  <input type="text" class="form-control datepicker" id="e-tgl_kalibrasi" name="tgl_kalibrasi" placeholder="Tanggal Kalibrasi" autocomplete="off" required>
                <?php } else { ?>
                  <input type="text" class="form-control" id="e-tgl_kalibrasi" name="tgl_kalibrasi" placeholder="Tanggal Kalibrasi" autocomplete="off" readonly>
                <?php } ?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="ed_kalibrasi">E.D Kalibrasi</label>
                <?php if ($jabatan === "supervisor") { ?>
                  <input type="text" class="form-control datepicker" id="e-ed_kalibrasi" name="ed_kalibrasi" placeholder="E.D Kalibrasi" autocomplete="off" required>
                <?php } else { ?>
                  <input type="text" class="form-control" id="e-ed_kalibrasi" name="ed_kalibrasi" placeholder="E.D Kalibrasi" autocomplete="off" readonly>
                <?php } ?>
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
      var id_kalibrasi = $(event.relatedTarget).data('id_kalibrasi')
      var kode_alat = $(event.relatedTarget).data('kode_alat')
      var nama_alat = $(event.relatedTarget).data('nama_alat')
      var no_sertif = $(event.relatedTarget).data('no_sertif')
      var tgl_kalibrasi = $(event.relatedTarget).data('tgl_kalibrasi')
      var ed_kalibrasi = $(event.relatedTarget).data('ed_kalibrasi')

      $(this).find('#e-id_kalibrasi').val(id_kalibrasi)
      $(this).find('#e-kode_alat').val(kode_alat)
      $(this).find('#e-nama_alat').val(nama_alat)
      $(this).find('#e-no_sertif').val(no_sertif)
      $(this).find('#e-tgl_kalibrasi').val(tgl_kalibrasi)
      $(this).find('#e-ed_kalibrasi').val(ed_kalibrasi)

      var jabatan = "<?= $jabatan ?>"
      if (jabatan === "supervisor") {
        $(this).find('#e-ed_kalibrasi').datepicker().on('show.bs.modal', function(event) {
          // prevent datepicker from firing bootstrap modal "show.bs.modal"
          event.stopPropagation();
        });
        $(this).find('#e-tgl_kalibrasi').datepicker().on('show.bs.modal', function(event) {
          // prevent datepicker from firing bootstrap modal "show.bs.modal"
          event.stopPropagation();
        });
      }
    });
  })
</script>