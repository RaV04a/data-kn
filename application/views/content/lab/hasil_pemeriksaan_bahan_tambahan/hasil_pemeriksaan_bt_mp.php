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
                                    <!-- <h5 class="m-b-10">Data Barang Masuk</h5> -->
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="javascript:">Lab/QC</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:">Hasil Pemeriksaan</a></li>
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
                                        <h5>Data Hasil Pemeriksaan</h5>
                                        <!-- Example single danger button -->
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Jenis Bahan
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="<?= base_url('lab/Hasil_pemeriksaan_lab/Hasil_pemeriksaan_gel') ?>">Bahan Baku</a>
                                                <a class="dropdown-item" href="<?= base_url('lab/Hasil_pemeriksaan_lab/Hasil_pemeriksaan_pel') ?>">Pelarut</a>
                                                <a class="dropdown-item" href="<?= base_url('lab/Hasil_pemeriksaan_lab/Hasil_pemeriksaan_pw') ?>">Pewarna</a>
                                                <a class="dropdown-item" href="<?= base_url('lab/Hasil_pemeriksaan_lab/Hasil_pemeriksaan_tp') ?>">Tinta Print</a>
                                                <a class="dropdown-item" href="<?= base_url('lab/Hasil_pemeriksaan_lab/Hasil_pemeriksaan_bt_nb') ?>">Bahan Tambahan</a>
                                            </div>
                                        </div><br>
                                        <h5><b>Bahan Tambahan (Methyl Paraben)</b></h5> <br>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-dark btn-outline-warning btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Jenis Bahan Tambahan
                                            </button>
                                            <div class="dropdown-menu scrollable-menu" role="menu">
                                                <a class="dropdown-item" href="<?= base_url('lab/Hasil_pemeriksaan_lab/Bahan_tambahan/Hasil_pemeriksaan_bt_nb') ?>">Natrium Benzoat</a>
                                                <a class="dropdown-item" href="<?= base_url('lab/Hasil_pemeriksaan_lab/Bahan_tambahan/Hasil_pemeriksaan_bt_mp') ?>">Methyl Paraben</a>
                                                <a class="dropdown-item" href="<?= base_url('lab/Hasil_pemeriksaan_lab/Bahan_tambahan/Hasil_pemeriksaan_bt_la') ?>">Lecithin Adlec</a>
                                                <a class="dropdown-item" href="<?= base_url('lab/Hasil_pemeriksaan_lab/Bahan_tambahan/Hasil_pemeriksaan_bt_csf') ?>">Candurin Silver Fine</a>
                                                <a class="dropdown-item" href="<?= base_url('lab/Hasil_pemeriksaan_lab/Bahan_tambahan/Hasil_pemeriksaan_bt_sls') ?>">Sodium Launil Sulfat</a>
                                                <a class="dropdown-item" href="<?= base_url('lab/Hasil_pemeriksaan_lab/Bahan_tambahan/Hasil_pemeriksaan_bt_td') ?>">Titanium Dioxide</a>
                                            </div>
                                        </div><br>
                                    </div>

                                    <!-- Tabel Hasil Bahan Baku -->
                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">
                                            <table id="pelarut" class="table datatable table-hover table-striped table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Tanggal Uji</th>
                                                        <th>No Batch</th>
                                                        <th>Nama Barang</th>
                                                        <th>Nama Penguji</th>
                                                        <th>Status</th>
                                                        <th class="text-center">Details</th>
                                                        <th class="text-center">Aksi</th>
                                                        <th class="text-center">Print Hasil</th>
                                                        <!-- <th class="text-center">Print</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $level = $this->session->userdata('level');
                                                    $jabatan = $this->session->userdata('jabatan');
                                                    $no = 1;
                                                    foreach ($result as $k) {
                                                        $tgl_uji =  explode('-', $k['tgl_uji'])[2] . "/" . explode('-', $k['tgl_uji'])[1] . "/" . explode('-', $k['tgl_uji'])[0];
                                                        $tgl_msk =  explode('-', $k['tgl'])[2] . "/" . explode('-', $k['tgl'])[1] . "/" . explode('-', $k['tgl'])[0];
                                                        $tgl_mfg =  explode('-', $k['mfg'])[2] . "/" . explode('-', $k['mfg'])[1] . "/" . explode('-', $k['mfg'])[0];
                                                        $tgl_exp =  explode('-', $k['exp'])[2] . "/" . explode('-', $k['exp'])[1] . "/" . explode('-', $k['exp'])[0];
                                                    ?>
                                                        <tr>
                                                            <th scope="row"><?= $no++ ?></th>
                                                            <td><?= $tgl_uji ?></td>
                                                            <td><?= $k['no_batch'] ?></td>
                                                            <td><?= $k['nama_barang'] ?></td>
                                                            <td><?= $k['penguji'] ?></td>
                                                            <td><?= $k['status'] ?></td>
                                                            <td class="text-center">
                                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                                    <button type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#detail" data-id_barang="<?= $k['id_barang'] ?>" data-id_pb="<?= $k['id_pb'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-no_surat_jalan="<?= $k['no_surat_jalan'] ?>" data-tgl="<?= $tgl_msk ?>" data-tgl_uji="<?= $tgl_uji ?>" data-no_analis="<?= $k['no_analis'] ?>" data-nama_barang="<?= $k['nama_barang'] ?>" data-nama_supplier="<?= $k['nama_supplier'] ?>" data-op_gudang="<?= $k['op_gudang'] ?>" data-dok_pendukung="<?= $k['dok_pendukung'] ?>" data-jenis_kemasan="<?= $k['jenis_kemasan'] ?>" data-jml_kemasan="<?= $k['jml_kemasan'] ?>" data-ditolak_kemasan="<?= $k['ditolak_kemasan'] ?>" data-qty="<?= $k['qty'] ?>" data-ditolak_qty="<?= $k['ditolak_qty'] ?>" data-exp="<?= $tgl_exp ?>" data-mfg="<?= $tgl_mfg ?>" data-tutup="<?= $k['tutup'] ?>" data-wadah="<?= $k['wadah'] ?>" data-label="<?= $k['label'] ?>" data-pemerian="<?= $k['pemerian'] ?>" data-kelarutan="<?= $k['kelarutan'] ?>" data-identifikasi="<?= $k['identifikasi'] ?>" data-jarak_lebur="<?= $k['jarak_lebur'] ?>" data-keasaman="<?= $k['keasaman'] ?>" data-s_pengeringan="<?= $k['s_pengeringan'] ?>" data-s_pemijaran="<?= $k['s_pemijaran'] ?>" data-p_kadar="<?= $k['p_kadar'] ?>" data-kondisi_py="<?= $k['kondisi_py'] ?>" data-penguji="<?= $k['penguji'] ?>">
                                                                        <i class="feather icon-eye"></i>Details
                                                                    </button>
                                                                </div>
                                                            </td>
                                                            <!-- Aksi Approval -->
                                                            <td class="text-center">
                                                                <?php if ($jabatan === "supervisor" || $jabatan === "admin" && $k['status'] === "Proses") { ?>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#released" data-id_ujibt="<?= $k['id_ujibt'] ?>" data-id_pb="<?= $k['id_pb'] ?>" data-id_barang="<?= $k['id_barang'] ?>" data-id_supplier="<?= $k['id_supplier'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-no_surat_jalan="<?= $k['no_surat_jalan'] ?>" data-tgl="<?= $tgl_msk ?>" data-tgl_uji="<?= $tgl_uji ?>" data-no_analis="<?= $k['no_analis'] ?>" data-nama_barang="<?= $k['nama_barang'] ?>" data-nama_supplier="<?= $k['nama_supplier'] ?>" data-op_gudang="<?= $k['op_gudang'] ?>" data-dok_pendukung="<?= $k['dok_pendukung'] ?>" data-jenis_kemasan="<?= $k['jenis_kemasan'] ?>" data-jml_kemasan="<?= $k['jml_kemasan'] ?>" data-ditolak_kemasan="<?= $k['ditolak_kemasan'] ?>" data-qty="<?= $k['qty'] ?>" data-ditolak_qty="<?= $k['ditolak_qty'] ?>" data-exp="<?= $tgl_exp ?>" data-mfg="<?= $tgl_mfg ?>" data-tutup="<?= $k['tutup'] ?>" data-wadah="<?= $k['wadah'] ?>" data-label="<?= $k['label'] ?>" data-pemerian="<?= $k['pemerian'] ?>" data-kelarutan="<?= $k['kelarutan'] ?>" data-identifikasi="<?= $k['identifikasi'] ?>" data-jarak_lebur="<?= $k['jarak_lebur'] ?>" data-keasaman="<?= $k['keasaman'] ?>" data-s_pengeringan="<?= $k['s_pengeringan'] ?>" data-s_pemijaran="<?= $k['s_pemijaran'] ?>" data-p_kadar="<?= $k['p_kadar'] ?>" data-kondisi_py="<?= $k['kondisi_py'] ?>" data-penguji="<?= $k['penguji'] ?>">
                                                                            <i class="feather icon-edit-2"></i>Released
                                                                        </button>
                                                                    </div>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <button type="button" class="btn btn-danger btn-square btn-sm" data-toggle="modal" data-target="#reject" data-id_ujibt="<?= $k['id_ujibt'] ?>" data-id_pb="<?= $k['id_pb'] ?>" data-id_barang="<?= $k['id_barang'] ?>" data-id_supplier="<?= $k['id_supplier'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-no_surat_jalan="<?= $k['no_surat_jalan'] ?>" data-tgl="<?= $tgl_msk ?>" data-tgl_uji="<?= $tgl_uji ?>" data-no_analis="<?= $k['no_analis'] ?>" data-nama_barang="<?= $k['nama_barang'] ?>" data-nama_supplier="<?= $k['nama_supplier'] ?>" data-op_gudang="<?= $k['op_gudang'] ?>" data-dok_pendukung="<?= $k['dok_pendukung'] ?>" data-jenis_kemasan="<?= $k['jenis_kemasan'] ?>" data-jml_kemasan="<?= $k['jml_kemasan'] ?>" data-ditolak_kemasan="<?= $k['ditolak_kemasan'] ?>" data-qty="<?= $k['qty'] ?>" data-ditolak_qty="<?= $k['ditolak_qty'] ?>" data-exp="<?= $tgl_exp ?>" data-mfg="<?= $tgl_mfg ?>" data-tutup="<?= $k['tutup'] ?>" data-wadah="<?= $k['wadah'] ?>" data-label="<?= $k['label'] ?>" data-pemerian="<?= $k['pemerian'] ?>" data-kelarutan="<?= $k['kelarutan'] ?>" data-identifikasi="<?= $k['identifikasi'] ?>" data-jarak_lebur="<?= $k['jarak_lebur'] ?>" data-keasaman="<?= $k['keasaman'] ?>" data-s_pengeringan="<?= $k['s_pengeringan'] ?>" data-s_pemijaran="<?= $k['s_pemijaran'] ?>" data-p_kadar="<?= $k['p_kadar'] ?>" data-kondisi_py="<?= $k['kondisi_py'] ?>" data-penguji="<?= $k['penguji'] ?>">
                                                                            <i class="feather icon-edit-2"></i>Reject
                                                                        </button>
                                                                    </div>
                                                                <?php } ?>

                                                                <!-- Print Label Released -->
                                                                <?php if ($k['status'] === "Released") { ?>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <a type="button" class="btn btn-success btn-square btn-sm text-light" onclick="window.open(`<?= base_url() ?>lab/Hasil_pemeriksaan_lab/Bahan_tambahan/Hasil_pemeriksaan_bt_mp/pdf_label_released/<?= str_replace('/', '--', $k['no_surat_jalan']) ?>`, 'location=yes,height=700,width=1300,scrollbars=yes,status=yes'); " data-id_pb="<?= $k['id_pb'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-no_surat_jalan="<?= $k['no_surat_jalan'] ?>">
                                                                            <i class="feather icon-file"></i>Print Label
                                                                        </a>
                                                                    </div>
                                                                <?php } ?>


                                                                <!-- Print Label Ditolak -->
                                                                <?php if ($k['status'] === "Di Tolak") { ?>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <a type="button" class="btn btn-danger btn-square btn-sm text-light" onclick="window.open(`<?= base_url() ?>lab/Hasil_pemeriksaan_lab/Bahan_tambahan/Hasil_pemeriksaan_bt_mp/pdf_label_reject/<?= str_replace('/', '--', $k['no_surat_jalan']) ?>`, 'location=yes,height=700,width=1300,scrollbars=yes,status=yes'); " data-id_pb="<?= $k['id_pb'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-no_surat_jalan="<?= $k['no_surat_jalan'] ?>">
                                                                            <i class="feather icon-file"></i>Print Label
                                                                        </a>
                                                                    </div>
                                                                <?php } ?>
                                                            </td>
                                                            <td class="text-center">

                                                                <?php if ($k['status'] === "Released" || $k['status'] === "Di Tolak") { ?>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <a type="button" class="btn btn-warning btn-square btn-sm text-light" onclick="window.open(`<?= base_url() ?>lab/Hasil_pemeriksaan_lab/Bahan_tambahan/Hasil_pemeriksaan_bt_mp/pdf_label_hasil/<?= str_replace('/', '--', $k['no_surat_jalan']) ?>`, 'location=yes,height=700,width=1300,scrollbars=yes,status=yes'); " data-id_pb="<?= $k['id_pb'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-no_surat_jalan="<?= $k['no_surat_jalan'] ?>">
                                                                            <i class="feather icon-file"></i>Print Hasil
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

<!-- Modal Detail -->
<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Hasil Pemeriksaan Bahan Tambahan<br><b>(Methyl Paraben)</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <form>
                    <input type="hidden" id="v-id_ujibt" name="id_ujibt">
            </div>
            <div class="modal-body">
                <center><label for="pemeriksaan" class="font-weight-bold">Keterangan Bahan</label></center>
                <table class="mt-2">
                    <tr>
                        <td class="px-1 py-2">
                            No Batch
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="v-no_batch" name="no_batch" placeholder="No Batch" maxlength="20" readonly>
                        </td>
                        <td class="px-1 py-2">
                            Tanggal Masuk
                        </td>
                        <td class="px-4">
                            <input type="text" class="form-control form-control-sm" id="v-tgl" name="tgl" placeholder="Tanggal Masuk" maxlength="20" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-1 py-2">
                            No. Po
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="v-no_surat_jalan" name="no_surat_jalan" placeholder="No. Po" maxlength="20" readonly>
                        </td>
                        <td class="px-1 py-2">
                            Dokumen Pendukung
                        </td>
                        <td class="px-4">
                            <input type="text" class="form-control form-control-sm" id="v-dok_pendukung" name="dok_pendukung" placeholder="Dokumen Pendukung" maxlength="20" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-1 py-2">
                            Nama Barang
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="v-nama_barang" name="nama_barang" placeholder="Nama Barang" maxlength="20" readonly>
                        </td>
                        <td class="px-1 py-2">
                            Operator Penerima
                        </td>
                        <td class="px-4">
                            <input type="text" class="form-control form-control-sm" id="v-op_gudang" name="op_gudang" placeholder="Nama Operator" maxlength="20" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-1 py-2">
                            Nama Supllier
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="v-nama_supplier" name="nama_supplier" placeholder="Nama Supllier" maxlength="20" readonly>
                        </td>
                        <td class="px-1 py-2">
                            Jenis Kemasan
                        </td>
                        <td class="px-4">
                            <input type="text" class="form-control form-control-sm" id="v-jenis_kemasan" name="jenis_kemasan" placeholder="Jenis Kemasan" maxlength="20" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-1 py-2">
                            Jumlah Bahan <br> (Di Terima)
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="v-qty" name="qty" placeholder="Jumlah Bahan (Di Terima)" maxlength="20" readonly>
                        </td>
                        <td class="px-1 py-2">
                            Jumlah Bahan <br> (Di Tolak)
                        </td>
                        <td class="px-4">
                            <input type="text" class="form-control form-control-sm" id="v-ditolak_qty" name="ditolak_qty" placeholder="Jumlah Bahan (Di Tolak)" maxlength="20" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-1 py-2">
                            Jumlah Kemasan <br> (Di Terima)
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="v-jml_kemasan" name="jml_kemasan" placeholder="Jumlah Kemasan (Di Terima)" maxlength="20" readonly>
                        </td>
                        <td class="px-1 py-2">
                            Jumlah Kemasan <br> (Di Tolak)
                        </td>
                        <td class="px-4">
                            <input type="text" class="form-control form-control-sm" id="v-ditolak_kemasan" name="ditolak_kemasan" placeholder="Jumlah Kemasan (Di Tolak)" maxlength="20" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-1 py-2">
                            Mfg. date
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="v-mfg" name="mfg" placeholder="Mfg. date" maxlength="20" readonly>
                        </td>
                        <td class="px-1 py-2">
                            Expired
                        </td>
                        <td class="px-4">
                            <input type="text" class="form-control form-control-sm" id="v-exp" name="exp" placeholder="Expire" maxlength="20" readonly>
                        </td>
                    </tr>
                </table>
                <div class="row">
                    <div class="col-md-12 mt-5">
                        <div class="form-group">
                            <center><label for="pemeriksaan" class="font-weight-bold">Hasil Pemeriksaan Fisik Kemasan</label></center>
                            <table class="mt-2">
                                <tr>
                                    <td class="px-1 py-2">
                                        Tutup
                                    </td>
                                    <td class="px-3">
                                        <input type="text" class="form-control form-control-sm" id="v-tutup" name="tutup" placeholder="Tutup" size="15" maxlength="20" readonly>
                                    </td>
                                    <td class="px-2 py-2">
                                        Wadah
                                    </td>
                                    <td class="px-3">
                                        <input type="text" class="form-control form-control-sm" id="v-wadah" name="wadah" placeholder="Wadah" size="15" maxlength="20" readonly>
                                    </td>
                                    <td class="px-2 py-2">
                                        Label
                                    </td>
                                    <td class="px-3">
                                        <input type="text" class="form-control form-control-sm" id="v-label" name="label" placeholder="Label" size="15" maxlength="20" readonly>
                                    </td>
                                </tr>
                            </table>

                        </div>
                    </div>
                </div>
                <center><label for="pemeriksaan" class="font-weight-bold mt-1">Hasil Pengujian</label></center>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-tgl_uji" class="mt-2">Tanggal Pengujian</label><br>
                            <input type="text" class="form-control" id="v-tgl_uji" name="tgl_uji" placeholder="Tanggal Uji" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-penguji" class="mt-2">Penguji</label><br>
                            <input type="text" class="form-control" id="v-penguji" name="penguji" placeholder="Nama Penguji" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-no_analis" class="mt-2">No. Analisa</label><br>
                            <input type="text" class="form-control" id="v-no_analis" name="no_analis" placeholder="No. Analisa" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pemerian" class="mt-2">Pemerian</label>
                            <input type="text" class="form-control" id="v-pemerian" name="pemerian" placeholder="Pemerian" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kelarutan" class="mt-2">Kelarutan</label>
                            <input type="text" class="form-control" id="v-kelarutan" name="kelarutan" placeholder="Kelarutan (Dalam air)" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="identifikasi" class="mt-2">Identifikasi *)</label>
                            <input type="text" class="form-control" id="v-identifikasi" name="identifikasi" placeholder="Kelarutan (Dalam ethanol)" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="jarak_lebur" class="mt-2">Jarak Lebur *)</label>
                            <input type="text" class="form-control" id="v-jarak_lebur" name="jarak_lebur" placeholder="Identifikasi Natrium" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="keasaman" class="mt-2">Keasaman</label>
                            <input type="text" class="form-control" id="v-keasaman" name="keasaman" placeholder="Identifikasi Benzoat" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="s_pengeringan" class="mt-2">Susut Pengeringan</label>
                            <input type="text" class="form-control" id="v-s_pengeringan" name="s_pengeringan" placeholder="Kebasaan" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="s_pemijaran" class="mt-2">Sisa Pemijaran</label>
                            <input type="text" class="form-control" id="v-s_pemijaran" name="s_pemijaran" placeholder="Penetapan Kadar" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="p_kadar" class="mt-2">Penetapan Kadar</label>
                            <input type="text" class="form-control" id="v-p_kadar" name="p_kadar" placeholder="Penetapan Kadar" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kondisi_py" class="mt-2">Kondisi Penyimpanan</label>
                            <input type="text" class="form-control" id="v-kondisi_py" name="kondisi_py" placeholder="Penetapan Kadar" readonly>
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

<!-- Modal Approval Released-->
<div class="modal fade" id="released" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Approval Released Hasil Pemeriksaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <form method="post" action="<?= base_url() ?>lab/Hasil_pemeriksaan_lab/Bahan_tambahan/Hasil_pemeriksaan_bt_mp/add">
                    <input type="hidden" id="r-id_ujibt" name="id_ujibt">
                    <input type="hidden" id="r-id_pb" name="id_pb">
                    <input type="hidden" id="r-id_barang" name="id_barang">
                    <input type="hidden" id="r-id_supplier" name="id_supplier">
            </div>
            <div class="modal-body">
                <center><label for="pemeriksaan" class="font-weight-bold">Keterangan Bahan</label></center>
                <table class="mt-2">
                    <tr>
                        <td class="px-1 py-2">
                            No Batch
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="r-no_batch" name="no_batch" placeholder="No Batch" maxlength="20" readonly>
                        </td>
                        <td class="px-1 py-2">
                            Tanggal Masuk
                        </td>
                        <td class="px-4">
                            <input type="text" class="form-control form-control-sm" id="r-tgl" name="tgl" placeholder="Tanggal Masuk" maxlength="20" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-1 py-2">
                            No. Po
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="r-no_surat_jalan" name="no_surat_jalan" placeholder="No. Po" maxlength="20" readonly>
                        </td>
                        <td class="px-1 py-2">
                            Dokumen Pendukung
                        </td>
                        <td class="px-4">
                            <input type="text" class="form-control form-control-sm" id="r-dok_pendukung" name="dok_pendukung" placeholder="Dokumen Pendukung" maxlength="20" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-1 py-2">
                            Nama Barang
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="r-nama_barang" name="nama_barang" placeholder="Nama Barang" maxlength="20" readonly>
                        </td>
                        <td class="px-1 py-2">
                            Operator Penerima
                        </td>
                        <td class="px-4">
                            <input type="text" class="form-control form-control-sm" id="r-op_gudang" name="op_gudang" placeholder="Nama Operator" maxlength="20" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-1 py-2">
                            Nama Supllier
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="r-nama_supplier" name="nama_supplier" placeholder="Nama Supllier" maxlength="20" readonly>
                        </td>
                        <td class="px-1 py-2">
                            Jenis Kemasan
                        </td>
                        <td class="px-4">
                            <input type="text" class="form-control form-control-sm" id="r-jenis_kemasan" name="jenis_kemasan" placeholder="Jenis Kemasan" maxlength="20" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-1 py-2">
                            Jumlah Bahan <br> (Di Terima)
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="r-qty" name="qty" placeholder="Jumlah Bahan (Di Terima)" maxlength="20" readonly>
                        </td>
                        <td class="px-1 py-2">
                            Jumlah Bahan <br> (Di Tolak)
                        </td>
                        <td class="px-4">
                            <input type="text" class="form-control form-control-sm" id="r-ditolak_qty" name="ditolak_qty" placeholder="Jumlah Bahan (Di Tolak)" maxlength="20" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-1 py-2">
                            Jumlah Kemasan <br> (Di Terima)
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="r-jml_kemasan" name="jml_kemasan" placeholder="Jumlah Kemasan (Di Terima)" maxlength="20" readonly>
                        </td>
                        <td class="px-1 py-2">
                            Jumlah Kemasan <br> (Di Tolak)
                        </td>
                        <td class="px-4">
                            <input type="text" class="form-control form-control-sm" id="r-ditolak_kemasan" name="ditolak_kemasan" placeholder="Jumlah Kemasan (Di Tolak)" maxlength="20" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-1 py-2">
                            Mfg. date
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="r-mfg" name="mfg" placeholder="Mfg. date" maxlength="20" readonly>
                        </td>
                        <td class="px-1 py-2">
                            Expired
                        </td>
                        <td class="px-4">
                            <input type="text" class="form-control form-control-sm" id="r-exp" name="exp" placeholder="Expire" maxlength="20" readonly>
                        </td>
                    </tr>
                </table>
                <div class="row">
                    <div class="col-md-12 mt-5">
                        <div class="form-group">
                            <center><label for="pemeriksaan" class="font-weight-bold">Hasil Pemeriksaan Fisik Kemasan</label></center>
                            <table class="mt-2">
                                <tr>
                                    <td class="px-1 py-2">
                                        Tutup
                                    </td>
                                    <td class="px-3">
                                        <input type="text" class="form-control form-control-sm" id="r-tutup" name="tutup" placeholder="Tutup" size="15" maxlength="20" readonly>
                                    </td>
                                    <td class="px-2 py-2">
                                        Wadah
                                    </td>
                                    <td class="px-3">
                                        <input type="text" class="form-control form-control-sm" id="r-wadah" name="wadah" placeholder="Wadah" size="15" maxlength="20" readonly>
                                    </td>
                                    <td class="px-2 py-2">
                                        Label
                                    </td>
                                    <td class="px-3">
                                        <input type="text" class="form-control form-control-sm" id="r-label" name="label" placeholder="Label" size="15" maxlength="20" readonly>
                                    </td>
                                </tr>
                            </table>

                        </div>
                    </div>
                </div>
                <center><label for="pemeriksaan" class="font-weight-bold mt-1">Hasil Pengujian</label></center>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-tgl_uji" class="mt-2">Tanggal Pengujian</label><br>
                            <input type="text" class="form-control" id="r-tgl_uji" name="tgl_uji" placeholder="Tanggal Uji" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-penguji" class="mt-2">Penguji</label><br>
                            <input type="text" class="form-control" id="r-penguji" name="penguji" placeholder="Nama Penguji" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-no_analis" class="mt-2">No. Analisa</label><br>
                            <input type="text" class="form-control" id="r-no_analis" name="no_analis" placeholder="No. Analisa" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pemerian" class="mt-2">Pemerian</label>
                            <input type="text" class="form-control" id="r-pemerian" name="pemerian" placeholder="Pemerian" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kelarutan" class="mt-2">Kelarutan</label>
                            <input type="text" class="form-control" id="r-kelarutan" name="kelarutan" placeholder="Kelarutan (Dalam air)" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="identifikasi" class="mt-2">Identifikasi *)</label>
                            <input type="text" class="form-control" id="r-identifikasi" name="identifikasi" placeholder="Kelarutan (Dalam ethanol)" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="jarak_lebur" class="mt-2">Jarak Lebur *)</label>
                            <input type="text" class="form-control" id="r-jarak_lebur" name="jarak_lebur" placeholder="Identifikasi Natrium" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="keasaman" class="mt-2">Keasaman</label>
                            <input type="text" class="form-control" id="r-keasaman" name="keasaman" placeholder="Identifikasi Benzoat" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="s_pengeringan" class="mt-2">Susut Pengeringan</label>
                            <input type="text" class="form-control" id="r-s_pengeringan" name="s_pengeringan" placeholder="Kebasaan" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="s_pemijaran" class="mt-2">Sisa Pemijaran</label>
                            <input type="text" class="form-control" id="r-s_pemijaran" name="s_pemijaran" placeholder="Penetapan Kadar" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="p_kadar" class="mt-2">Penetapan Kadar</label>
                            <input type="text" class="form-control" id="r-p_kadar" name="p_kadar" placeholder="Penetapan Kadar" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kondisi_py" class="mt-2">Kondisi Penyimpanan</label>
                            <input type="text" class="form-control" id="r-kondisi_py" name="kondisi_py" placeholder="Penetapan Kadar" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tgl_rilis" class="mt-2 font-weight-bold">Tanggal Released</label><br>
                            <input type="text" class="form-control datepicker" id="tgl_rilis" name="tgl_rilis" placeholder="Tanggal Released" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tgl_uu" class="mt-2 font-weight-bold">Tanggal Uji Ulang</label><br>
                            <input type="text" class="form-control" id="tgl_uu" name="tgl_uu" placeholder="Tanggal Uji Ulang" autocomplete="off" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="simpan" class="btn btn-success" onclick="if (! confirm('Apakah Anda Yakin Untuk Menyimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Tanggalnya')) { return false; }">Released</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Approval Reject -->
<div class="modal fade" id="reject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Approval Reject Hasil Pemeriksaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <form method="post" action="<?= base_url() ?>lab/Hasil_pemeriksaan_lab/Bahan_tambahan/Hasil_pemeriksaan_bt_mp/ditolak">
                    <input type="hidden" id="t-id_ujibt" name="id_ujibt">
                    <input type="hidden" id="t-id_pb" name="id_pb">
                    <input type="hidden" id="t-id_barang" name="id_barang">
                    <input type="hidden" id="t-id_supplier" name="id_supplier">
            </div>
            <div class="modal-body">
                <center><label for="pemeriksaan" class="font-weight-bold">Keterangan Bahan</label></center>
                <table class="mt-2">
                    <tr>
                        <td class="px-1 py-2">
                            No Batch
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="t-no_batch" name="no_batch" placeholder="No Batch" maxlength="20" readonly>
                        </td>
                        <td class="px-1 py-2">
                            Tanggal Masuk
                        </td>
                        <td class="px-4">
                            <input type="text" class="form-control form-control-sm" id="t-tgl" name="tgl" placeholder="Tanggal Masuk" maxlength="20" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-1 py-2">
                            No. Po
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="t-no_surat_jalan" name="no_surat_jalan" placeholder="No. Po" maxlength="20" readonly>
                        </td>
                        <td class="px-1 py-2">
                            Dokumen Pendukung
                        </td>
                        <td class="px-4">
                            <input type="text" class="form-control form-control-sm" id="t-dok_pendukung" name="dok_pendukung" placeholder="Dokumen Pendukung" maxlength="20" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-1 py-2">
                            Nama Barang
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="t-nama_barang" name="nama_barang" placeholder="Nama Barang" maxlength="20" readonly>
                        </td>
                        <td class="px-1 py-2">
                            Operator Penerima
                        </td>
                        <td class="px-4">
                            <input type="text" class="form-control form-control-sm" id="t-op_gudang" name="op_gudang" placeholder="Nama Operator" maxlength="20" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-1 py-2">
                            Nama Supllier
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="t-nama_supplier" name="nama_supplier" placeholder="Nama Supllier" maxlength="20" readonly>
                        </td>
                        <td class="px-1 py-2">
                            Jenis Kemasan
                        </td>
                        <td class="px-4">
                            <input type="text" class="form-control form-control-sm" id="t-jenis_kemasan" name="jenis_kemasan" placeholder="Jenis Kemasan" maxlength="20" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-1 py-2">
                            Jumlah Bahan <br> (Di Terima)
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="t-qty" name="qty" placeholder="Jumlah Bahan (Di Terima)" maxlength="20" readonly>
                        </td>
                        <td class="px-1 py-2">
                            Jumlah Bahan <br> (Di Tolak)
                        </td>
                        <td class="px-4">
                            <input type="text" class="form-control form-control-sm" id="t-ditolak_qty" name="ditolak_qty" placeholder="Jumlah Bahan (Di Tolak)" maxlength="20" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-1 py-2">
                            Jumlah Kemasan <br> (Di Terima)
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="t-jml_kemasan" name="jml_kemasan" placeholder="Jumlah Kemasan (Di Terima)" maxlength="20" readonly>
                        </td>
                        <td class="px-1 py-2">
                            Jumlah Kemasan <br> (Di Tolak)
                        </td>
                        <td class="px-4">
                            <input type="text" class="form-control form-control-sm" id="t-ditolak_kemasan" name="ditolak_kemasan" placeholder="Jumlah Kemasan (Di Tolak)" maxlength="20" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-1 py-2">
                            Mfg. date
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="t-mfg" name="mfg" placeholder="Mfg. date" maxlength="20" readonly>
                        </td>
                        <td class="px-1 py-2">
                            Expired
                        </td>
                        <td class="px-4">
                            <input type="text" class="form-control form-control-sm" id="t-exp" name="exp" placeholder="Expire" maxlength="20" readonly>
                        </td>
                    </tr>
                </table>
                <div class="row">
                    <div class="col-md-12 mt-5">
                        <div class="form-group">
                            <center><label for="pemeriksaan" class="font-weight-bold">Hasil Pemeriksaan Fisik Kemasan</label></center>
                            <table class="mt-2">
                                <tr>
                                    <td class="px-1 py-2">
                                        Tutup
                                    </td>
                                    <td class="px-3">
                                        <input type="text" class="form-control form-control-sm" id="t-tutup" name="tutup" placeholder="Tutup" size="15" maxlength="20" readonly>
                                    </td>
                                    <td class="px-2 py-2">
                                        Wadah
                                    </td>
                                    <td class="px-3">
                                        <input type="text" class="form-control form-control-sm" id="t-wadah" name="wadah" placeholder="Wadah" size="15" maxlength="20" readonly>
                                    </td>
                                    <td class="px-2 py-2">
                                        Label
                                    </td>
                                    <td class="px-3">
                                        <input type="text" class="form-control form-control-sm" id="t-label" name="label" placeholder="Label" size="15" maxlength="20" readonly>
                                    </td>
                                </tr>
                            </table>

                        </div>
                    </div>
                </div>
                <center><label for="pemeriksaan" class="font-weight-bold">Hasil Pengujian</label></center>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-tgl_uji" class="mt-2">Tanggal Pengujian</label><br>
                            <input type="text" class="form-control" id="t-tgl_uji" name="tgl_uji" placeholder="Tanggal Uji" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-penguji" class="mt-2">Penguji</label><br>
                            <input type="text" class="form-control" id="t-penguji" name="penguji" placeholder="Nama Penguji" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-no_analis" class="mt-2">No. Analisa</label><br>
                            <input type="text" class="form-control" id="t-no_analis" name="no_analis" placeholder="No. Analisa" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pemerian" class="mt-2">Pemerian</label>
                            <input type="text" class="form-control" id="t-pemerian" name="pemerian" placeholder="Pemerian" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kelarutan" class="mt-2">Kelarutan</label>
                            <input type="text" class="form-control" id="t-kelarutan" name="kelarutan" placeholder="Kelarutan (Dalam air)" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="identifikasi" class="mt-2">Identifikasi *)</label>
                            <input type="text" class="form-control" id="t-identifikasi" name="identifikasi" placeholder="Kelarutan (Dalam ethanol)" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="jarak_lebur" class="mt-2">Jarak Lebur *)</label>
                            <input type="text" class="form-control" id="t-jarak_lebur" name="jarak_lebur" placeholder="Identifikasi Natrium" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="keasaman" class="mt-2">Keasaman</label>
                            <input type="text" class="form-control" id="t-keasaman" name="keasaman" placeholder="Identifikasi Benzoat" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="s_pengeringan" class="mt-2">Susut Pengeringan</label>
                            <input type="text" class="form-control" id="t-s_pengeringan" name="s_pengeringan" placeholder="Kebasaan" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="s_pemijaran" class="mt-2">Sisa Pemijaran</label>
                            <input type="text" class="form-control" id="t-s_pemijaran" name="s_pemijaran" placeholder="Penetapan Kadar" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="p_kadar" class="mt-2">Penetapan Kadar</label>
                            <input type="text" class="form-control" id="t-p_kadar" name="p_kadar" placeholder="Penetapan Kadar" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kondisi_py" class="mt-2">Kondisi Penyimpanan</label>
                            <input type="text" class="form-control" id="t-kondisi_py" name="kondisi_py" placeholder="Penetapan Kadar" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tgl_reject" class="mt-2 font-weight-bold">Tanggal Reject</label><br>
                            <input type="text" class="form-control datepicker" id="tgl_reject" name="tgl_reject" placeholder="Tanggal Reject" autocomplete="off" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger" onclick="if (! confirm('Apakah Anda Yakin Untuk Merejct Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Tanggalnya')) { return false; }">Di Tolak</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Script Modal Detail -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#detail').on('show.bs.modal', function(event) {
            var id_barang = $(event.relatedTarget).data('id_barang')
            var id_pb = $(event.relatedTarget).data('id_pb')
            var no_batch = $(event.relatedTarget).data('no_batch')
            var nama_barang = $(event.relatedTarget).data('nama_barang')
            var nama_supplier = $(event.relatedTarget).data('nama_supplier')
            var no_surat_jalan = $(event.relatedTarget).data('no_surat_jalan')
            var op_gudang = $(event.relatedTarget).data('op_gudang')
            var dok_pendukung = $(event.relatedTarget).data('dok_pendukung')
            var tgl = $(event.relatedTarget).data('tgl')
            var jml_kemasan = $(event.relatedTarget).data('jml_kemasan')
            var ditolak_kemasan = $(event.relatedTarget).data('ditolak_kemasan')
            var jenis_kemasan = $(event.relatedTarget).data('jenis_kemasan')
            var qty = $(event.relatedTarget).data('qty')
            var ditolak_qty = $(event.relatedTarget).data('ditolak_qty')
            var mfg = $(event.relatedTarget).data('mfg')
            var exp = $(event.relatedTarget).data('exp')
            var tutup = $(event.relatedTarget).data('tutup')
            var wadah = $(event.relatedTarget).data('wadah')
            var label = $(event.relatedTarget).data('label')
            var tgl_uji = $(event.relatedTarget).data('tgl_uji')
            var penguji = $(event.relatedTarget).data('penguji')
            var no_analis = $(event.relatedTarget).data('no_analis')
            var pemerian = $(event.relatedTarget).data('pemerian')
            var kelarutan = $(event.relatedTarget).data('kelarutan')
            var identifikasi = $(event.relatedTarget).data('identifikasi')
            var jarak_lebur = $(event.relatedTarget).data('jarak_lebur')
            var keasaman = $(event.relatedTarget).data('keasaman')
            var s_pengeringan = $(event.relatedTarget).data('s_pengeringan')
            var s_pemijaran = $(event.relatedTarget).data('s_pemijaran')
            var p_kadar = $(event.relatedTarget).data('p_kadar')
            var kondisi_py = $(event.relatedTarget).data('kondisi_py')

            $(this).find('#v-id_barang').val(id_barang)
            $(this).find('#v-id_pb').val(id_pb)
            $(this).find('#v-no_batch').val(no_batch)
            $(this).find('#v-nama_barang').val(nama_barang)
            $(this).find('#v-nama_supplier').val(nama_supplier)
            $(this).find('#v-no_surat_jalan').val(no_surat_jalan)
            $(this).find('#v-op_gudang').val(op_gudang)
            $(this).find('#v-dok_pendukung').val(dok_pendukung)
            $(this).find('#v-tgl').val(tgl)
            $(this).find('#v-jml_kemasan').val(jml_kemasan)
            $(this).find('#v-ditolak_kemasan').val(ditolak_kemasan)
            $(this).find('#v-jenis_kemasan').val(jenis_kemasan)
            $(this).find('#v-qty').val(qty)
            $(this).find('#v-ditolak_qty').val(ditolak_qty)
            $(this).find('#v-mfg').val(mfg)
            $(this).find('#v-exp').val(exp)
            $(this).find('#v-tutup').val(tutup)
            $(this).find('#v-wadah').val(wadah)
            $(this).find('#v-label').val(label)
            $(this).find('#v-tgl_uji').val(tgl_uji)
            $(this).find('#v-penguji').val(penguji)
            $(this).find('#v-no_analis').val(no_analis)
            $(this).find('#v-pemerian').val(pemerian)
            $(this).find('#v-kelarutan').val(kelarutan)
            $(this).find('#v-identifikasi').val(identifikasi)
            $(this).find('#v-jarak_lebur').val(jarak_lebur)
            $(this).find('#v-keasaman').val(keasaman)
            $(this).find('#v-s_pengeringan').val(s_pengeringan)
            $(this).find('#v-s_pemijaran').val(s_pemijaran)
            $(this).find('#v-p_kadar').val(p_kadar)
            $(this).find('#v-kondisi_py').val(kondisi_py)

        })

    })
</script>

<!-- Script Modal Approval Released-->
<script type="text/javascript">
    $(document).ready(function() {
        $('#released').on('show.bs.modal', function(event) {
            var id_ujibt = $(event.relatedTarget).data('id_ujibt')
            var id_barang = $(event.relatedTarget).data('id_barang')
            var id_supplier = $(event.relatedTarget).data('id_supplier')
            var id_pb = $(event.relatedTarget).data('id_pb')
            var no_batch = $(event.relatedTarget).data('no_batch')
            var nama_barang = $(event.relatedTarget).data('nama_barang')
            var nama_supplier = $(event.relatedTarget).data('nama_supplier')
            var no_surat_jalan = $(event.relatedTarget).data('no_surat_jalan')
            var op_gudang = $(event.relatedTarget).data('op_gudang')
            var dok_pendukung = $(event.relatedTarget).data('dok_pendukung')
            var tgl = $(event.relatedTarget).data('tgl')
            var jml_kemasan = $(event.relatedTarget).data('jml_kemasan')
            var ditolak_kemasan = $(event.relatedTarget).data('ditolak_kemasan')
            var jenis_kemasan = $(event.relatedTarget).data('jenis_kemasan')
            var qty = $(event.relatedTarget).data('qty')
            var ditolak_qty = $(event.relatedTarget).data('ditolak_qty')
            var mfg = $(event.relatedTarget).data('mfg')
            var exp = $(event.relatedTarget).data('exp')
            var tutup = $(event.relatedTarget).data('tutup')
            var wadah = $(event.relatedTarget).data('wadah')
            var label = $(event.relatedTarget).data('label')
            var tgl_uji = $(event.relatedTarget).data('tgl_uji')
            var penguji = $(event.relatedTarget).data('penguji')
            var no_analis = $(event.relatedTarget).data('no_analis')
            var pemerian = $(event.relatedTarget).data('pemerian')
            var kelarutan = $(event.relatedTarget).data('kelarutan')
            var identifikasi = $(event.relatedTarget).data('identifikasi')
            var jarak_lebur = $(event.relatedTarget).data('jarak_lebur')
            var keasaman = $(event.relatedTarget).data('keasaman')
            var s_pengeringan = $(event.relatedTarget).data('s_pengeringan')
            var s_pemijaran = $(event.relatedTarget).data('s_pemijaran')
            var p_kadar = $(event.relatedTarget).data('p_kadar')
            var kondisi_py = $(event.relatedTarget).data('kondisi_py')

            $(this).find('#r-id_ujibt').val(id_ujibt)
            $(this).find('#r-id_barang').val(id_barang)
            $(this).find('#r-id_supplier').val(id_supplier)
            $(this).find('#r-id_pb').val(id_pb)
            $(this).find('#r-no_batch').val(no_batch)
            $(this).find('#r-nama_barang').val(nama_barang)
            $(this).find('#r-nama_supplier').val(nama_supplier)
            $(this).find('#r-no_surat_jalan').val(no_surat_jalan)
            $(this).find('#r-op_gudang').val(op_gudang)
            $(this).find('#r-dok_pendukung').val(dok_pendukung)
            $(this).find('#r-tgl').val(tgl)
            $(this).find('#r-jml_kemasan').val(jml_kemasan)
            $(this).find('#r-ditolak_kemasan').val(ditolak_kemasan)
            $(this).find('#r-jenis_kemasan').val(jenis_kemasan)
            $(this).find('#r-qty').val(qty)
            $(this).find('#r-ditolak_qty').val(ditolak_qty)
            $(this).find('#r-mfg').val(mfg)
            $(this).find('#r-exp').val(exp)
            $(this).find('#r-tutup').val(tutup)
            $(this).find('#r-wadah').val(wadah)
            $(this).find('#r-label').val(label)
            $(this).find('#r-tgl_uji').val(tgl_uji)
            $(this).find('#r-penguji').val(penguji)
            $(this).find('#r-no_analis').val(no_analis)
            $(this).find('#r-pemerian').val(pemerian)
            $(this).find('#r-kelarutan').val(kelarutan)
            $(this).find('#r-identifikasi').val(identifikasi)
            $(this).find('#r-jarak_lebur').val(jarak_lebur)
            $(this).find('#r-keasaman').val(keasaman)
            $(this).find('#r-s_pengeringan').val(s_pengeringan)
            $(this).find('#r-s_pemijaran').val(s_pemijaran)
            $(this).find('#r-p_kadar').val(p_kadar)
            $(this).find('#r-kondisi_py').val(kondisi_py)
            $(this).find('#tgl_rilis').datepicker({
                autoclose: true,
                format: "dd/mm/yyyy"
            }).on('show.bs.modal', function(event) {
                // prevent datepicker from firing bootstrap modal "show.bs.modal"
                event.stopPropagation();

            });
            $('#tgl_rilis').on('change', function() {
                const tgl_rilis = $(this).val()
                const tgl_uu = moment(tgl_rilis, "DD/MM/YYYY").add('months', 6).format('DD/MM/YYYY')
                $('#tgl_uu').val(tgl_uu)
            })
        })

    })
</script>

<!-- Script Modal Approval Reject -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#reject').on('show.bs.modal', function(event) {
            var id_ujibt = $(event.relatedTarget).data('id_ujibt')
            var id_barang = $(event.relatedTarget).data('id_barang')
            var id_supplier = $(event.relatedTarget).data('id_supplier')
            var id_pb = $(event.relatedTarget).data('id_pb')
            var no_batch = $(event.relatedTarget).data('no_batch')
            var nama_barang = $(event.relatedTarget).data('nama_barang')
            var nama_supplier = $(event.relatedTarget).data('nama_supplier')
            var no_surat_jalan = $(event.relatedTarget).data('no_surat_jalan')
            var op_gudang = $(event.relatedTarget).data('op_gudang')
            var dok_pendukung = $(event.relatedTarget).data('dok_pendukung')
            var tgl = $(event.relatedTarget).data('tgl')
            var jml_kemasan = $(event.relatedTarget).data('jml_kemasan')
            var ditolak_kemasan = $(event.relatedTarget).data('ditolak_kemasan')
            var jenis_kemasan = $(event.relatedTarget).data('jenis_kemasan')
            var qty = $(event.relatedTarget).data('qty')
            var ditolak_qty = $(event.relatedTarget).data('ditolak_qty')
            var mfg = $(event.relatedTarget).data('mfg')
            var exp = $(event.relatedTarget).data('exp')
            var tutup = $(event.relatedTarget).data('tutup')
            var wadah = $(event.relatedTarget).data('wadah')
            var label = $(event.relatedTarget).data('label')
            var tgl_uji = $(event.relatedTarget).data('tgl_uji')
            var penguji = $(event.relatedTarget).data('penguji')
            var no_analis = $(event.relatedTarget).data('no_analis')
            var pemerian = $(event.relatedTarget).data('pemerian')
            var kelarutan = $(event.relatedTarget).data('kelarutan')
            var identifikasi = $(event.relatedTarget).data('identifikasi')
            var jarak_lebur = $(event.relatedTarget).data('jarak_lebur')
            var keasaman = $(event.relatedTarget).data('keasaman')
            var s_pengeringan = $(event.relatedTarget).data('s_pengeringan')
            var s_pemijaran = $(event.relatedTarget).data('s_pemijaran')
            var p_kadar = $(event.relatedTarget).data('p_kadar')
            var kondisi_py = $(event.relatedTarget).data('kondisi_py')

            $(this).find('#t-id_ujibt').val(id_ujibt)
            $(this).find('#t-id_barang').val(id_barang)
            $(this).find('#t-id_supplier').val(id_supplier)
            $(this).find('#t-id_pb').val(id_pb)
            $(this).find('#t-no_batch').val(no_batch)
            $(this).find('#t-nama_barang').val(nama_barang)
            $(this).find('#t-nama_supplier').val(nama_supplier)
            $(this).find('#t-no_surat_jalan').val(no_surat_jalan)
            $(this).find('#t-op_gudang').val(op_gudang)
            $(this).find('#t-dok_pendukung').val(dok_pendukung)
            $(this).find('#t-tgl').val(tgl)
            $(this).find('#t-jml_kemasan').val(jml_kemasan)
            $(this).find('#t-ditolak_kemasan').val(ditolak_kemasan)
            $(this).find('#t-jenis_kemasan').val(jenis_kemasan)
            $(this).find('#t-qty').val(qty)
            $(this).find('#t-ditolak_qty').val(ditolak_qty)
            $(this).find('#t-mfg').val(mfg)
            $(this).find('#t-exp').val(exp)
            $(this).find('#t-tutup').val(tutup)
            $(this).find('#t-wadah').val(wadah)
            $(this).find('#t-label').val(label)
            $(this).find('#t-tgl_uji').val(tgl_uji)
            $(this).find('#t-penguji').val(penguji)
            $(this).find('#t-no_analis').val(no_analis)
            $(this).find('#t-pemerian').val(pemerian)
            $(this).find('#t-kelarutan').val(kelarutan)
            $(this).find('#t-identifikasi').val(identifikasi)
            $(this).find('#t-jarak_lebur').val(jarak_lebur)
            $(this).find('#t-keasaman').val(keasaman)
            $(this).find('#t-s_pengeringan').val(s_pengeringan)
            $(this).find('#t-s_pemijaran').val(s_pemijaran)
            $(this).find('#t-p_kadar').val(p_kadar)
            $(this).find('#t-kondisi_py').val(kondisi_py)
            $(this).find('#tgl_reject').datepicker({
                autoclose: true,
                format: "dd/mm/yyyy"
            }).on('show.bs.modal', function(event) {
                event.stopPropagation();
            });
        })
    })
</script>