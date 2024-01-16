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
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="javascript:">Utility</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:">History Mesin</a></li>
                                    <li class="breadcrumb-item"><a href="<?= base_url('Utility/Panel_listrik_hcm') ?>">PANEL LISTRIK HCM</a></li>
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
                                        <h5>History Mesin</h5> <br>
                                        <h5><b>PANEL LISTRIK HCM</b></h5>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-dark btn-outline-warning btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Jenis Mesin
                                            </button>
                                            <div class="dropdown-menu scrollable-menu" role="menu">
                                                <a class="dropdown-item" href="<?= base_url('Utility/Ahu') ?>">AHU</a>
                                                <a class="dropdown-item" href="<?= base_url('Utility/Boiler') ?>">BOILER</a>
                                                <a class="dropdown-item" href="<?= base_url('Utility/Chiller') ?>">CHILLER</a>
                                                <a class="dropdown-item" href="<?= base_url('Utility/Compressor') ?>">COMPRESSOR</a>
                                                <a class="dropdown-item" href="<?= base_url('Utility/Cwp_hwp') ?>">CWP & HWP</a>
                                                <a class="dropdown-item" href="<?= base_url('Utility/Feeding_tank') ?>">FEEDING TANK</a>
                                                <a class="dropdown-item" href="<?= base_url('Utility/Genset') ?>">GENSET</a>
                                                <a class="dropdown-item" href="<?= base_url('Utility/Holding_tank') ?>">HOLDING TANK</a>
                                                <a class="dropdown-item" href="<?= base_url('Utility/Panel_listrik') ?>">PANEL LISTRIK</a>
                                                <a class="dropdown-item" href="<?= base_url('Utility/Panel_listrik_hcm') ?>">PANEL LISTRIK HCM</a>
                                                <a class="dropdown-item" href="<?= base_url('Utility/Pompa_sumur') ?>">POMPA SUMUR</a>
                                                <a class="dropdown-item" href="<?= base_url('Utility/Vacuum') ?>">VACUUM</a>
                                                <a class="dropdown-item" href="<?= base_url('Utility/Water_treatment') ?>">WATER TREATMENT</a>
                                            </div>
                                        </div>
                                        <!-- Button trigger modal -->
                                        <?php $level = $this->session->userdata('level');
                                        if ($level === "utility" || $level === "admin") { ?>
                                            <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#add">
                                                <i class="feather icon-plus"></i>Tambah History Mesin
                                            </button> <br> <br>
                                        <?php } ?>
                                        <div class="float-right">
                                            <div class="input-group">
                                                <?php
                                                $nama_mesin = [
                                                    "PANEL HCM A", "PANEL HCM B", "PANEL HCM C", "PANEL HCM D", "PANEL HCM E",
                                                    "PANEL HCM F", "PANEL HCM G", "PANEL HCM H"
                                                ];
                                                ?>
                                                <select class="form-control chosen-select" id="filter_mesin" name="filter_mesin">
                                                    <option value="" disabled selected hidden>- Pilih Nama Mesin -</option>
                                                    <?php foreach ($nama_mesin as $nm) { ?>
                                                        <option <?= $name === $nm ? 'selected' : '' ?> value="<?= $nm ?>"><?= $nm ?></option>
                                                    <?php } ?>
                                                </select>
                                                <input type="text" id="filter_tgl" value="<?= $tgl == null ? '' : $tgl ?>" class="form-control datepicker" autocomplete="off" placeholder="Fiter Dari Tanggal" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                <input type="text" id="filter_tgl2" value="<?= $tgl2 == null ? '' : $tgl2 ?>" class="form-control datepicker" autocomplete="off" placeholder="Fiter Sampai Tanggal" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                <div class="btn-group">
                                                    <button class="btn btn-secondary" id="lihat" type="button">Lihat</button>
                                                </div>
                                                <div class="btn-group">
                                                    <button class="btn btn-primary" id="export" type="button">Cetak</button>
                                                </div>
                                                <div class="btn-group">
                                                    <a href="<?= base_url() ?>Utility/Panel_listrik_hcm" style="width: 40px;" class="btn btn-warning" id="export" type="button"><i class="feather icon-refresh-ccw"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <td class="text-right">
                                        <?php $level = $this->session->userdata('level');
                                        if ($level === "utility") { ?>
                                            <div class="card-header">
                                                <button type="button" class="btn btn-light btn-outline-dark float-right btn-sm" onClick="window.open(`<?= base_url() ?>Utility/Panel_listrik_hcm/pdf_page_print/`)">
                                                    <i class="feather icon-file"></i>Print
                                                </button>
                                            </div>
                                        <?php } ?>
                                    </td>
                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">
                                            <table class="table datatable table-hover table-striped table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Tanggal</th>
                                                        <th>Nama Mesin</th>
                                                        <th>Jenis Mesin</th>
                                                        <th>Masalah</th>
                                                        <th>Pelaksana</th>
                                                        <th class="text-center">Detail</th>
                                                        <th class="text-center">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $level = $this->session->userdata('level');
                                                    $no = 1;
                                                    foreach ($result as $k) {
                                                        $tglnew =  explode('-', $k['tgl'])[2] . "/" . explode('-', $k['tgl'])[1] . "/" . explode('-', $k['tgl'])[0];
                                                    ?>
                                                        <tr>
                                                            <th scope="row"><?= $no++ ?></th>
                                                            <td><?= $tglnew ?></td>
                                                            <td><?= $k['nama_mesin'] ?></td>
                                                            <td><?= $k['jenis_mesin'] ?></td>
                                                            <td><?= $k['masalah'] ?></td>
                                                            <td><?= $k['nama_operator'] ?></td>
                                                            <td class="text-center">
                                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                                    <button type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#detail" data-id_hmu="<?= $k['id_hmu'] ?>" data-tgl="<?= $tglnew ?>" data-nama_mesin="<?= $k['nama_mesin'] ?>" data-jenis_mesin="<?= $k['jenis_mesin'] ?>" data-masalah="<?= $k['masalah'] ?>" data-penyebab="<?= $k['penyebab'] ?>" data-tindakan="<?= $k['tindakan'] ?>" data-nama_operator="<?= $k['nama_operator'] ?>">
                                                                        <i class="feather icon-eye"></i>Details
                                                                    </button>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <?php if ($level == "admin") { ?>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#edit" data-id_hmu="<?= $k['id_hmu'] ?>" data-tgl="<?= $tglnew ?>" data-nama_mesin="<?= $k['nama_mesin'] ?>" data-jenis_mesin="<?= $k['jenis_mesin'] ?>" data-masalah="<?= $k['masalah'] ?>" data-penyebab="<?= $k['penyebab'] ?>" data-tindakan="<?= $k['tindakan'] ?>" data-nama_operator="<?= $k['nama_operator'] ?>">
                                                                            <i class="feather icon-edit-2"></i>Edit
                                                                        </button>
                                                                    </div>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <a href="<?= base_url() ?>Utility/Panel_listrik_hcm/delete/<?= $k['id_hmu'] ?>" class="btn btn-danger btn-square text-light btn-sm" onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function() {


        $('#lihat').click(function() {
            var filter_nama = $('#filter_mesin').find(':selected').val();
            var filter_tgl = $('#filter_tgl').val();
            var filter_tgl2 = $('#filter_tgl2').val();

            var newFilterTgl = filter_tgl.split("/")[2] + "-" + filter_tgl.split("/")[1] + "-" + filter_tgl.split("/")[0];
            var newFilterTgl2 = filter_tgl2.split("/")[2] + "-" + filter_tgl2.split("/")[1] + "-" + filter_tgl2.split("/")[0];

            if (filter_tgl == '' && filter_tgl2 != '') {
                window.location = "<?= base_url() ?>Utility/Panel_listrik_hcm?alert=warning&msg=dari tanggal belum diisi";
                alert("dari tanggal belum diisi")
            } else if (filter_tgl != '' && filter_tgl2 == '') {
                window.location = "<?= base_url() ?>Utility/Panel_listrik_hcm?alert=warning&msg=sampai tanggal belum diisi";
            } else if (filter_tgl == '' && filter_tgl2 == '') {
                window.location = "<?= base_url() ?>Utility/Panel_listrik_hcm?alert=warning&msg=form periode harus diisi";
            } else {
                const query = new URLSearchParams({
                    name: filter_nama,
                    date_from: filter_tgl,
                    date_until: filter_tgl2
                })
                window.location = "<?= base_url() ?>Utility/Panel_listrik_hcm/index?" + query.toString();

            }
        })
        $('#export').click(function() {
            var filter_nama = $('#filter_mesin').find(':selected').val();
            var filter_tgl = $('#filter_tgl').val();
            var filter_tgl2 = $('#filter_tgl2').val();

            var newFilterTgl = filter_tgl.split("/")[2] + "-" + filter_tgl.split("/")[1] + "-" + filter_tgl.split("/")[0];
            var newFilterTgl2 = filter_tgl2.split("/")[2] + "-" + filter_tgl2.split("/")[1] + "-" + filter_tgl2.split("/")[0];

            if (filter_tgl == '' && filter_tgl2 != '') {
                window.location = "<?= base_url() ?>Utility/Panel_listrik_hcm?alert=warning&msg=dari tanggal belum diisi";
                alert("dari tanggal belum diisi")
            } else if (filter_tgl != '' && filter_tgl2 == '') {
                window.location = "<?= base_url() ?>Utility/Panel_listrik_hcm?alert=warning&msg=sampai tanggal belum diisi";
            } else if (filter_tgl == '' && filter_tgl2 == '') {
                var url = "<?= base_url() ?>Utility/Panel_listrik_hcm/pdf_page_print";
                window.open(url, 'pdf_page_print', 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
            } else {
                const query = new URLSearchParams({
                    name: filter_nama,
                    date_from: filter_tgl,
                    date_until: filter_tgl2
                })
                var url = "<?= base_url() ?>Utility/Panel_listrik_hcm/pdf_page_print?" + query.toString();
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah History Mesin PANEL LISTRIK HCM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url() ?>Utility/Panel_listrik_hcm/add">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tgl">Tanggal</label>
                                <input type="text" class="form-control datepicker" id="tgl" name="tgl" placeholder="Tanggal" required autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_operator">Nama Operator</label>
                                <input type="text" class="form-control" id="nama_operator" name="nama_operator" value="<?= $this->session->userdata('nama_operator') ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_mesin">Nama Mesin</label>
                                <select class="form-control chosen-select" id="nama_mesin" name="nama_mesin" required>
                                    <option value="" disabled selected hidden>- Pilih Nama Mesin -</option>
                                    <?php foreach ($nama_mesin as $nm) { ?>
                                        <option value="<?= $nm ?>"><?= $nm ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jenis_mesin">Jenis Mesin</label>
                                <input type="text" class="form-control " id="jenis_mesin" name="jenis_mesin" value="PANEL LISTRIK HCM" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="masalah">Masalah</label>
                                <textarea type="text" class="form-control" id="masalah" name="masalah" rows="3" autocomplete="off" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="penyebab">Penyebab</label>
                                <textarea type="text" class="form-control" id="penyebab" name="penyebab" rows="3" autocomplete="off" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tindakan">Tindakan</label>
                                <textarea type="text" class="form-control" id="tindakan" name="tindakan" rows="3" autocomplete="off" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="simpan" class="btn btn-primary" onclick="if (! confirm('Apakah Anda Yakin Untuk Menimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya')) { return false; }">Simpan</button>
                        </div>
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

        $(this).find('#tgl').datepicker({
            autoclose: true,
            format: "dd/mm/yyyy"
        }).on('show.bs.modal', function(event) {
            event.stopPropagation();
        });
    })
</script>

<!-- Modal -->
<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail History Mesin PANEL LISTRIK HCM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tgl">Tanggal</label>
                                <input type="text" class="form-control" id="v-tgl" name="tgl" autocomplete="off" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_operator">Pelaksana</label>
                                <input type="text" class="form-control" id="v-nama_operator" name="nama_operator" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_mesin">Nama Mesin</label>
                                <input type="text" class="form-control" id="v-nama_mesin" name="nama_mesin" rows="3" autocomplete="off" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jenis_mesin">Jenis Mesin</label>
                                <input type="text" class="form-control " id="v-jenis_mesin" name="jenis_mesin" value="PANEL LISTRIK HCM" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="masalah">Masalah</label>
                                <textarea class="form-control" id="v-masalah" name="masalah" rows="3" readonly></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="penyebab">Penyebab</label>
                                <textarea class="form-control" id="v-penyebab" name="penyebab" rows="3" readonly></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tindakan">Tindakan</label>
                                <textarea class="form-control" id="v-tindakan" name="tindakan" rows="3" readonly></textarea>
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
        $('#detail').on('show.bs.modal', function(event) {
            var id_hmu = $(event.relatedTarget).data('id_hmu')
            var tgl = $(event.relatedTarget).data('tgl')
            var nama_mesin = $(event.relatedTarget).data('nama_mesin')
            var jenis_mesin = $(event.relatedTarget).data('jenis_mesin')
            var masalah = $(event.relatedTarget).data('masalah')
            var penyebab = $(event.relatedTarget).data('penyebab')
            var tindakan = $(event.relatedTarget).data('tindakan')
            var nama_operator = $(event.relatedTarget).data('nama_operator')

            $(this).find('#v-id_hmu').val(id_hmu)
            $(this).find('#v-tgl').val(tgl)
            $(this).find('#v-nama_mesin').val(nama_mesin)
            $(this).find('#v-jenis_mesin').val(jenis_mesin)
            $(this).find('#v-masalah').val(masalah)
            $(this).find('#v-penyebab').val(penyebab)
            $(this).find('#v-tindakan').val(tindakan)
            $(this).find('#v-nama_operator').val(nama_operator)
        })
    })
</script>

<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit History Mesin PANEL LISTRIK HCM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url() ?>Utility/Panel_listrik_hcm/update">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="e-tgl">Tanggal</label>
                                <input type="hidden" id="e-id_hmu" name="id_hmu">
                                <input type="text" class="form-control datepicker" id="e-tgl" name="tgl" placeholder="Tanggal" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_operator">Nama Operator</label>
                                <input type="text" class="form-control" id="e-nama_operator" name="nama_operator" value="<?= $this->session->userdata('nama_operator') ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_mesin">Nama Mesin</label>
                                <select class="form-control chosen-select" id="e-nama_mesin" name="nama_mesin" required>
                                    <option value="" disabled selected hidden>- Pilih Nama Mesin -</option>
                                    <?php foreach ($nama_mesin as $nm) { ?>
                                        <option value="<?= $nm ?>"><?= $nm ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jenis_mesin">Jenis Mesin</label>
                                <input type="text" class="form-control " id="e-jenis_mesin" name="jenis_mesin" value="PANEL LISTRIK HCM" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="masalah">Masalah</label>
                                <textarea type="text" class="form-control" id="e-masalah" name="masalah" rows="3" autocomplete="off" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="penyebab">Penyebab</label>
                                <textarea type="text" class="form-control" id="e-penyebab" name="penyebab" rows="3" autocomplete="off" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tindakan">Tindakan</label>
                                <textarea type="text" class="form-control" id="e-tindakan" name="tindakan" rows="3" autocomplete="off" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="simpan" class="btn btn-primary" onclick="if (! confirm('Apakah Anda Yakin Untuk Mengedit Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya')) { return false; }">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#edit').on('show.bs.modal', function(event) {
            var id_hmu = $(event.relatedTarget).data('id_hmu')
            var tgl = $(event.relatedTarget).data('tgl')
            var nama_mesin = $(event.relatedTarget).data('nama_mesin')
            var jenis_mesin = $(event.relatedTarget).data('jenis_mesin')
            var masalah = $(event.relatedTarget).data('masalah')
            var penyebab = $(event.relatedTarget).data('penyebab')
            var tindakan = $(event.relatedTarget).data('tindakan')
            var nama_operator = $(event.relatedTarget).data('nama_operator')

            $(this).find('#e-id_hmu').val(id_hmu)
            $(this).find('#e-tgl').val(tgl)
            $(this).find('#e-nama_mesin').val(nama_mesin)
            $(this).find('#e-nama_mesin').trigger("chosen:updated")
            $(this).find('#e-jenis_mesin').val(jenis_mesin)
            $(this).find('#e-masalah').val(masalah)
            $(this).find('#e-penyebab').val(penyebab)
            $(this).find('#e-tindakan').val(tindakan)
            $(this).find('#e-nama_operator').val(nama_operator)
            $(this).find('#e-tgl').datepicker().on('show.bs.modal', function(event) {
                event.stopImmediatePropagation();
            });
        })
    })
</script>