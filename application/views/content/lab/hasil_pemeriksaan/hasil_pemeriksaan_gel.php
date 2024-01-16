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
                                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Lab/QC</a></li>
                                    <li class="breadcrumb-item"><a href="<?= base_url('lab/Hasil_pemeriksaan') ?>">Hasil Pemeriksaan</a></li>
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
                                                <a class="dropdown-item" href="<?= base_url('lab/Hasil_pemeriksaan_lab/Bahan_tambahan/Hasil_pemeriksaan_bt_nb') ?>">Bahan Tambahan</a>
                                            </div>
                                        </div><br>
                                        <h5><b>Bahan Baku</b></h5>
                                    </div>

                                    <!-- Tabel Hasil Bahan Baku -->
                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">
                                            <table id="bahan_baku" class="table datatable table-hover table-striped table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Tanggal Uji</th>
                                                        <th>No. Po</th>
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
                                                                    <button type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#detail" data-id_pb="<?= $k['id_pb'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-no_surat_jalan="<?= $k['no_surat_jalan'] ?>" data-tgl="<?= $tgl_msk ?>" data-tgl_uji="<?= $tgl_uji ?>" data-no_analis="<?= $k['no_analis'] ?>" data-nama_barang="<?= $k['nama_barang'] ?>" data-nama_supplier="<?= $k['nama_supplier'] ?>" data-op_gudang="<?= $k['op_gudang'] ?>" data-dok_pendukung="<?= $k['dok_pendukung'] ?>" data-jenis_kemasan="<?= $k['jenis_kemasan'] ?>" data-jml_kemasan="<?= $k['jml_kemasan'] ?>" data-ditolak_kemasan="<?= $k['ditolak_kemasan'] ?>" data-qty="<?= $k['qty'] ?>" data-ditolak_qty="<?= $k['ditolak_qty'] ?>" data-exp="<?= $tgl_exp ?>" data-mfg="<?= $tgl_mfg ?>" data-tutup="<?= $k['tutup'] ?>" data-wadah="<?= $k['wadah'] ?>" data-label="<?= $k['label'] ?>" data-pemerian="<?= $k['pemerian'] ?>" data-kelarutan="<?= $k['kelarutan'] ?>" data-identifikasi="<?= $k['identifikasi'] ?>" data-bauzat_tl_air="<?= $k['bauzat_tl_air'] ?>" data-trans_larutan="<?= $k['trans_larutan'] ?>" data-s_pengeringan="<?= $k['s_pengeringan'] ?>" data-bloom_st="<?= $k['bloom_st'] ?>" data-viscost="<?= $k['viscost'] ?>" data-viscost_bd="<?= $k['viscost_bd'] ?>" data-ph="<?= $k['ph'] ?>" data-t_isl="<?= $k['t_isl'] ?>" data-sett_point="<?= $k['sett_point'] ?>" data-keasaman="<?= $k['keasaman'] ?>" data-sulfur_do="<?= $k['sulfur_do'] ?>" data-sisa_pmj="<?= $k['sisa_pmj'] ?>" data-uk_part_mesh4="<?= $k['uk_part_mesh4'] ?>" data-uk_part_mesh40="<?= $k['uk_part_mesh40'] ?>" data-kndtv="<?= $k['kndtv'] ?>" data-arsen="<?= $k['arsen'] ?>" data-timbal="<?= $k['timbal'] ?>" data-peroksida="<?= $k['peroksida'] ?>" data-besi="<?= $k['besi'] ?>" data-cromium="<?= $k['cromium'] ?>" data-zinc="<?= $k['zinc'] ?>" data-cm_dna_babi="<?= $k['cm_dna_babi'] ?>" data-m_tb="<?= $k['m_tb'] ?>" data-m_akk="<?= $k['m_akk'] ?>" data-m_ec="<?= $k['m_ec'] ?>" data-m_salmon="<?= $k['m_salmon'] ?>" data-wd_py="<?= $k['wd_py'] ?>" data-penguji="<?= $k['penguji'] ?>">
                                                                        <i class="feather icon-eye"></i>Details
                                                                    </button>
                                                                </div>
                                                            </td>
                                                            <!-- Aksi Approval -->
                                                            <td class="text-center">
                                                                <?php if ($jabatan === "supervisor" || $jabatan === "admin" && $k['status'] === "Proses") { ?>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#released" data-id_ujigel="<?= $k['id_ujigel'] ?>" data-id_pb="<?= $k['id_pb'] ?>" data-id_barang="<?= $k['id_barang'] ?>" data-id_supplier="<?= $k['id_supplier'] ?>" data-id_pb="<?= $k['id_pb'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-no_surat_jalan="<?= $k['no_surat_jalan'] ?>" data-tgl="<?= $tgl_msk ?>" data-tgl_uji="<?= $tgl_uji ?>" data-no_analis="<?= $k['no_analis'] ?>" data-nama_barang="<?= $k['nama_barang'] ?>" data-nama_supplier="<?= $k['nama_supplier'] ?>" data-op_gudang="<?= $k['op_gudang'] ?>" data-dok_pendukung="<?= $k['dok_pendukung'] ?>" data-jenis_kemasan="<?= $k['jenis_kemasan'] ?>" data-jml_kemasan="<?= $k['jml_kemasan'] ?>" data-ditolak_kemasan="<?= $k['ditolak_kemasan'] ?>" data-qty="<?= $k['qty'] ?>" data-ditolak_qty="<?= $k['ditolak_qty'] ?>" data-exp="<?= $tgl_exp ?>" data-mfg="<?= $tgl_mfg ?>" data-tutup="<?= $k['tutup'] ?>" data-wadah="<?= $k['wadah'] ?>" data-label="<?= $k['label'] ?>" data-pemerian="<?= $k['pemerian'] ?>" data-kelarutan="<?= $k['kelarutan'] ?>" data-identifikasi="<?= $k['identifikasi'] ?>" data-bauzat_tl_air="<?= $k['bauzat_tl_air'] ?>" data-trans_larutan="<?= $k['trans_larutan'] ?>" data-s_pengeringan="<?= $k['s_pengeringan'] ?>" data-bloom_st="<?= $k['bloom_st'] ?>" data-viscost="<?= $k['viscost'] ?>" data-viscost_bd="<?= $k['viscost_bd'] ?>" data-ph="<?= $k['ph'] ?>" data-t_isl="<?= $k['t_isl'] ?>" data-sett_point="<?= $k['sett_point'] ?>" data-keasaman="<?= $k['keasaman'] ?>" data-sulfur_do="<?= $k['sulfur_do'] ?>" data-sisa_pmj="<?= $k['sisa_pmj'] ?>" data-uk_part_mesh4="<?= $k['uk_part_mesh4'] ?>" data-uk_part_mesh40="<?= $k['uk_part_mesh40'] ?>" data-kndtv="<?= $k['kndtv'] ?>" data-arsen="<?= $k['arsen'] ?>" data-timbal="<?= $k['timbal'] ?>" data-peroksida="<?= $k['peroksida'] ?>" data-besi="<?= $k['besi'] ?>" data-cromium="<?= $k['cromium'] ?>" data-zinc="<?= $k['zinc'] ?>" data-cm_dna_babi="<?= $k['cm_dna_babi'] ?>" data-m_tb="<?= $k['m_tb'] ?>" data-m_akk="<?= $k['m_akk'] ?>" data-m_ec="<?= $k['m_ec'] ?>" data-m_salmon="<?= $k['m_salmon'] ?>" data-wd_py="<?= $k['wd_py'] ?>" data-penguji="<?= $k['penguji'] ?>">
                                                                            <i class="feather icon-edit-2"></i>Released
                                                                        </button>
                                                                    </div>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <button type="button" class="btn btn-danger btn-square btn-sm" data-toggle="modal" data-target="#reject" data-id_ujigel="<?= $k['id_ujigel'] ?>" data-id_pb="<?= $k['id_pb'] ?>" data-id_barang="<?= $k['id_barang'] ?>" data-id_supplier="<?= $k['id_supplier'] ?>" data-id_pb="<?= $k['id_pb'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-no_surat_jalan="<?= $k['no_surat_jalan'] ?>" data-tgl="<?= $tgl_msk ?>" data-tgl_uji="<?= $tgl_uji ?>" data-no_analis="<?= $k['no_analis'] ?>" data-nama_barang="<?= $k['nama_barang'] ?>" data-nama_supplier="<?= $k['nama_supplier'] ?>" data-op_gudang="<?= $k['op_gudang'] ?>" data-dok_pendukung="<?= $k['dok_pendukung'] ?>" data-jenis_kemasan="<?= $k['jenis_kemasan'] ?>" data-jml_kemasan="<?= $k['jml_kemasan'] ?>" data-ditolak_kemasan="<?= $k['ditolak_kemasan'] ?>" data-qty="<?= $k['qty'] ?>" data-ditolak_qty="<?= $k['ditolak_qty'] ?>" data-exp="<?= $tgl_exp ?>" data-mfg="<?= $tgl_mfg ?>" data-tutup="<?= $k['tutup'] ?>" data-wadah="<?= $k['wadah'] ?>" data-label="<?= $k['label'] ?>" data-pemerian="<?= $k['pemerian'] ?>" data-kelarutan="<?= $k['kelarutan'] ?>" data-identifikasi="<?= $k['identifikasi'] ?>" data-bauzat_tl_air="<?= $k['bauzat_tl_air'] ?>" data-trans_larutan="<?= $k['trans_larutan'] ?>" data-s_pengeringan="<?= $k['s_pengeringan'] ?>" data-bloom_st="<?= $k['bloom_st'] ?>" data-viscost="<?= $k['viscost'] ?>" data-viscost_bd="<?= $k['viscost_bd'] ?>" data-ph="<?= $k['ph'] ?>" data-t_isl="<?= $k['t_isl'] ?>" data-sett_point="<?= $k['sett_point'] ?>" data-keasaman="<?= $k['keasaman'] ?>" data-sulfur_do="<?= $k['sulfur_do'] ?>" data-sisa_pmj="<?= $k['sisa_pmj'] ?>" data-uk_part_mesh4="<?= $k['uk_part_mesh4'] ?>" data-uk_part_mesh40="<?= $k['uk_part_mesh40'] ?>" data-kndtv="<?= $k['kndtv'] ?>" data-arsen="<?= $k['arsen'] ?>" data-timbal="<?= $k['timbal'] ?>" data-peroksida="<?= $k['peroksida'] ?>" data-besi="<?= $k['besi'] ?>" data-cromium="<?= $k['cromium'] ?>" data-zinc="<?= $k['zinc'] ?>" data-cm_dna_babi="<?= $k['cm_dna_babi'] ?>" data-m_tb="<?= $k['m_tb'] ?>" data-m_akk="<?= $k['m_akk'] ?>" data-m_ec="<?= $k['m_ec'] ?>" data-m_salmon="<?= $k['m_salmon'] ?>" data-wd_py="<?= $k['wd_py'] ?>" data-penguji="<?= $k['penguji'] ?>">
                                                                            <i class="feather icon-edit-2"></i>Reject
                                                                        </button>
                                                                    </div>
                                                                <?php } ?>

                                                                <!-- Print Label Released -->
                                                                <?php if ($k['status'] === "Released") { ?>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <a type="button" class="btn btn-success btn-square btn-sm text-light" onclick="window.open(`<?= base_url() ?>lab/Hasil_pemeriksaan_lab/Hasil_pemeriksaan_gel/pdf_label_released/<?= str_replace('/', '--', $k['no_surat_jalan']) ?>`, 'location=yes,height=700,width=1300,scrollbars=yes,status=yes'); " data-id_pb="<?= $k['id_pb'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-no_surat_jalan="<?= $k['no_surat_jalan'] ?>">
                                                                            <i class="feather icon-file"></i>Print Label
                                                                        </a>
                                                                    </div>
                                                                <?php } ?>
                                                                <!-- Print Label Ditolak -->
                                                                <?php if ($k['status'] === "Di Tolak") { ?>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <a type="button" class="btn btn-danger btn-square btn-sm text-light" onclick="window.open(`<?= base_url() ?>lab/Hasil_pemeriksaan_lab/Hasil_pemeriksaan_gel/pdf_label_reject/<?= str_replace('/', '--', $k['no_surat_jalan']) ?>`, 'location=yes,height=700,width=1300,scrollbars=yes,status=yes'); " data-id_pb="<?= $k['id_pb'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-no_surat_jalan="<?= $k['no_surat_jalan'] ?>">
                                                                            <i class="feather icon-file"></i>Print Label
                                                                        </a>
                                                                    </div>
                                                                <?php } ?>
                                                            </td>
                                                            <!-- Print Hasil -->
                                                            <td class="text-center">
                                                                <?php if ($k['status'] === "Di Tolak" || $k['status'] === "Released") { ?>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <a type="button" class="btn btn-warning btn-square btn-sm text-light" onclick="window.open(`<?= base_url() ?>lab/Hasil_pemeriksaan_lab/Hasil_pemeriksaan_gel/pdf_label_hasil/<?= str_replace('/', '--', $k['no_surat_jalan']) ?>`, 'location=yes,height=700,width=1300,scrollbars=yes,status=yes'); " data-id_pb="<?= $k['id_pb'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-no_surat_jalan="<?= $k['no_surat_jalan'] ?>">
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
                <h5 class="modal-title" id="exampleModalLabel">Detail Hasil Pemeriksaan Bahan Baku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <form>
                    <input type="hidden" id="v-id_ujigel" name="id_ujigel">
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
                            <label for="v-pemerian" class="mt-2">Pemerian</label>
                            <input type="text" class="form-control" id="v-pemerian" name="pemerian" placeholder="Pemerian" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-kelarutan" class="mt-2">Kelarutan</label>
                            <input type="text" class="form-control" id="v-kelarutan" name="kelarutan" placeholder="Kelarutan" maxlength="20" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-identifikasi" class="mt-2">Identifikasi</label>
                            <input type="text" class="form-control" id="v-identifikasi" name="identifikasi" placeholder="Identifikasi" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-bauzat_tl_air" class="mt-2">Bau dan Zat Tak Larut dalam Air</label>
                            <input type="text" class="form-control mt-4" id="v-bauzat_tl_air" name="bauzat_tl_air" placeholder="Bau dan Zat" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-trans_larutan" class="mt-2">Transmittance Larutan 1% pada λ 510nm</label>
                            <input type="text" class="form-control" id="v-trans_larutan" name="trans_larutan" placeholder="Transmittance Larutan" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-s_pengeringan" class="mt-2">Susut Pengeringan</label>
                            <input type="text" class="form-control mt-4" id="v-s_pengeringan" name="s_pengeringan" placeholder="Susut Pengeringan" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-bloom_st" class="mt-2">Bloom Strength</label>
                            <input type="text" class="form-control" id="v-bloom_st" name="bloom_st" placeholder="Bloom Strength" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-viscost" class="mt-2">Viscositas 30%</label>
                            <input type="text" class="form-control" id="v-viscost" name="viscost" placeholder="Viscositas 30%" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-viscost_bd" class="mt-2">Viscositas Breakdown</label>
                            <input type="text" class="form-control" id="v-viscost_bd" name="viscost_bd" placeholder="Viscositas Breakdown" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-ph" class="mt-2">pH</label>
                            <input type="text" class="form-control" id="v-ph" name="ph" placeholder="pH" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-t_isl" class="mt-2">Titik Isoelektrik</label>
                            <input type="text" class="form-control" id="v-t_isl" name="t_isl" placeholder="Titik Isoelektrik" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-sett_point" class="mt-2">Setting Point</label>
                            <input type="text" class="form-control" id="v-sett_point" name="sett_point" placeholder="Setting Point" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-keasaman" class="mt-2">Keasaman</label><br>
                            <input type="text" class="form-control" id="v-keasaman" name="keasaman" placeholder="Keasaman" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-sulfur_do" class="mt-2">Sulfur Dioksida</label><br>
                            <input type="text" class="form-control" id="v-sulfur_do" name="sulfur_do" placeholder="Sulfur Dioksida" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-sisa_pmj" class="mt-2">Sisa Pemijaran</label><br>
                            <input type="text" class="form-control" id="v-sisa_pmj" name="sisa_pmj" placeholder="Sisa Pemijaran" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-uk_part_mesh4" class="mt-2">Ukuran Partikel Mesh 4</label><br>
                            <input type="text" class="form-control" id="v-uk_part_mesh4" name="uk_part_mesh4" placeholder="Ukuran Partikel Mesh 4" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-uk_part_mesh40" class="mt-2">Ukuran Partikel Mesh 40</label><br>
                            <input type="text" class="form-control" id="v-uk_part_mesh40" name="uk_part_mesh40" placeholder="Ukuran Partikel Mesh 40" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-kndtv" class="mt-2">Konduktivitas</label><br>
                            <input type="text" class="form-control" id="v-kndtv" name="kndtv" placeholder="Konduktivitas" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-arsen" class="mt-2">Arsen (As) *)</label><br>
                            <input type="text" class="form-control" id="v-arsen" name="arsen" placeholder="Arsen" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-timbal" class="mt-2">Timbal (Pb) *)</label><br>
                            <input type="text" class="form-control" id="v-timbal" name="timbal" placeholder="Timbal" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-peroksida" class="mt-2">Peroksida *)</label><br>
                            <input type="text" class="form-control" id="v-peroksida" name="peroksida" placeholder="Peroksida" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-besi" class="mt-2">Besi *)</label><br>
                            <input type="text" class="form-control" id="v-besi" name="besi" placeholder="Besi" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-cromium" class="mt-2">Cromium *)</label><br>
                            <input type="text" class="form-control" id="v-cromium" name="cromium" placeholder="Cromium" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-zinc" class="mt-2">Zinc *)</label><br>
                            <input type="text" class="form-control" id="v-zinc" name="zinc" placeholder="Zinc" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-cm_dna_babi" class="mt-2">Cemaran DNA Babi/Porcine *)</label><br>
                            <input type="text" class="form-control mt-4" id="v-cm_dna_babi" name="cm_dna_babi" placeholder="Cemaran DNA Babi/Porcine" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-m_tb" class="mt-2">Mikrobiologi (Total Bakteri)</label><br>
                            <input type="text" class="form-control mt-4" id="v-m_tb" name="m_tb" placeholder="M. Total Bakteri" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-m_akk" class="mt-2">Mikrobiologi (Angka Kapang dan Khamir)</label><br>
                            <input type="text" class="form-control" id="v-m_akk" name="m_akk" placeholder="M. Angka Kapang dan Khamir" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-m_ec" class="mt-2">Mikrobiologi (Escherrichia coli)</label><br>
                            <input type="text" class="form-control" id="v-m_ec" name="m_ec" placeholder="M. Escherrichia coli" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-m_salmon" class="mt-2">Mikrobiologi (Salmonella)</label><br>
                            <input type="text" class="form-control" id="v-m_salmon" name="m_salmon" placeholder="M. Salmonella" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-wd_py" class="mt-2">Wadah dan Penyimpanan</label><br>
                            <input type="text" class="form-control" id="v-wd_py" name="wd_py" placeholder="Wadah dan Penyimpanan" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="submit" class="btn btn-info">Update</button> -->
            </div>
            </form>
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
                <form method="post" action="<?= base_url() ?>lab/Hasil_pemeriksaan_lab/Hasil_pemeriksaan_gel/add">
                    <input type="hidden" id="r-id_ujigel" name="id_ujigel">
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
                            <label for="r-pemerian" class="mt-2">Pemerian</label>
                            <input type="text" class="form-control" id="r-pemerian" name="pemerian" placeholder="Pemerian" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-kelarutan" class="mt-2">Kelarutan</label>
                            <input type="text" class="form-control" id="r-kelarutan" name="kelarutan" placeholder="Kelarutan" maxlength="20" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-identifikasi" class="mt-2">Identifikasi</label>
                            <input type="text" class="form-control" id="r-identifikasi" name="identifikasi" placeholder="Identifikasi" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-bauzat_tl_air" class="mt-2">Bau dan Zat Tak Larut dalam Air</label>
                            <input type="text" class="form-control mt-4" id="r-bauzat_tl_air" name="bauzat_tl_air" placeholder="Bau dan Zat" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-trans_larutan" class="mt-2">Transmittance Larutan 1% pada λ 510nm</label>
                            <input type="text" class="form-control" id="r-trans_larutan" name="trans_larutan" placeholder="Transmittance Larutan" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-s_pengeringan" class="mt-2">Susut Pengeringan</label>
                            <input type="text" class="form-control mt-4" id="r-s_pengeringan" name="s_pengeringan" placeholder="Susut Pengeringan" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-bloom_st" class="mt-2">Bloom Strength</label>
                            <input type="text" class="form-control" id="r-bloom_st" name="bloom_st" placeholder="Bloom Strength" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-viscost" class="mt-2">Viscositas 30%</label>
                            <input type="text" class="form-control" id="r-viscost" name="viscost" placeholder="Viscositas 30%" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-viscost_bd" class="mt-2">Viscositas Breakdown</label>
                            <input type="text" class="form-control" id="r-viscost_bd" name="viscost_bd" placeholder="Viscositas Breakdown" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-ph" class="mt-2">pH</label>
                            <input type="text" class="form-control" id="r-ph" name="ph" placeholder="pH" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-t_isl" class="mt-2">Titik Isoelektrik</label>
                            <input type="text" class="form-control" id="r-t_isl" name="t_isl" placeholder="Titik Isoelektrik" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-sett_point" class="mt-2">Setting Point</label>
                            <input type="text" class="form-control" id="r-sett_point" name="sett_point" placeholder="Setting Point" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-keasaman" class="mt-2">Keasaman</label><br>
                            <input type="text" class="form-control" id="r-keasaman" name="keasaman" placeholder="Keasaman" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-sulfur_do" class="mt-2">Sulfur Dioksida</label><br>
                            <input type="text" class="form-control" id="r-sulfur_do" name="sulfur_do" placeholder="Sulfur Dioksida" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-sisa_pmj" class="mt-2">Sisa Pemijaran</label><br>
                            <input type="text" class="form-control" id="r-sisa_pmj" name="sisa_pmj" placeholder="Sisa Pemijaran" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-uk_part_mesh4" class="mt-2">Ukuran Partikel Mesh 4</label><br>
                            <input type="text" class="form-control" id="r-uk_part_mesh4" name="uk_part_mesh4" placeholder="Ukuran Partikel Mesh 4" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-uk_part_mesh40" class="mt-2">Ukuran Partikel Mesh 40</label><br>
                            <input type="text" class="form-control" id="r-uk_part_mesh40" name="uk_part_mesh40" placeholder="Ukuran Partikel Mesh 40" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-kndtv" class="mt-2">Konduktivitas</label><br>
                            <input type="text" class="form-control" id="r-kndtv" name="kndtv" placeholder="Konduktivitas" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-arsen" class="mt-2">Arsen (As) *)</label><br>
                            <input type="text" class="form-control" id="r-arsen" name="arsen" placeholder="Arsen" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-timbal" class="mt-2">Timbal (Pb) *)</label><br>
                            <input type="text" class="form-control" id="r-timbal" name="timbal" placeholder="Timbal" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-peroksida" class="mt-2">Peroksida *)</label><br>
                            <input type="text" class="form-control" id="r-peroksida" name="peroksida" placeholder="Peroksida" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-besi" class="mt-2">Besi *)</label><br>
                            <input type="text" class="form-control" id="r-besi" name="besi" placeholder="Besi" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-cromium" class="mt-2">Cromium *)</label><br>
                            <input type="text" class="form-control" id="r-cromium" name="cromium" placeholder="Cromium" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-zinc" class="mt-2">Zinc *)</label><br>
                            <input type="text" class="form-control" id="r-zinc" name="zinc" placeholder="Zinc" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-cm_dna_babi" class="mt-2">Cemaran DNA Babi/Porcine *)</label><br>
                            <input type="text" class="form-control mt-4" id="r-cm_dna_babi" name="cm_dna_babi" placeholder="Cemaran DNA Babi/Porcine" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-m_tb" class="mt-2">Mikrobiologi (Total Bakteri)</label><br>
                            <input type="text" class="form-control mt-4" id="r-m_tb" name="m_tb" placeholder="M. Total Bakteri" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-m_akk" class="mt-2">Mikrobiologi (Angka Kapang dan Khamir)</label><br>
                            <input type="text" class="form-control" id="r-m_akk" name="m_akk" placeholder="M. Angka Kapang dan Khamir" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-m_ec" class="mt-2">Mikrobiologi (Escherrichia coli)</label><br>
                            <input type="text" class="form-control" id="r-m_ec" name="m_ec" placeholder="M. Escherrichia coli" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-m_salmon" class="mt-2">Mikrobiologi (Salmonella)</label><br>
                            <input type="text" class="form-control" id="r-m_salmon" name="m_salmon" placeholder="M. Salmonella" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-wd_py" class="mt-2">Wadah dan Penyimpanan</label><br>
                            <input type="text" class="form-control" id="r-wd_py" name="wd_py" placeholder="Wadah dan Penyimpanan" readonly>
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
                <form method="post" action="<?= base_url() ?>lab/Hasil_pemeriksaan_lab/Hasil_pemeriksaan_gel/ditolak">
                    <input type="hidden" id="t-id_ujigel" name="id_ujigel">
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
                            <label for="t-pemerian" class="mt-2">Pemerian</label>
                            <input type="text" class="form-control" id="t-pemerian" name="pemerian" placeholder="Pemerian" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-kelarutan" class="mt-2">Kelarutan</label>
                            <input type="text" class="form-control" id="t-kelarutan" name="kelarutan" placeholder="Kelarutan" maxlength="20" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-identifikasi" class="mt-2">Identifikasi</label>
                            <input type="text" class="form-control" id="t-identifikasi" name="identifikasi" placeholder="Identifikasi" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-bauzat_tl_air" class="mt-2">Bau dan Zat Tak Larut dalam Air</label>
                            <input type="text" class="form-control" id="t-bauzat_tl_air" name="bauzat_tl_air" placeholder="Bau dan Zat" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-trans_larutan" class="mt-2">Transmittance Larutan 1% pada λ 510nm</label>
                            <input type="text" class="form-control" id="t-trans_larutan" name="trans_larutan" placeholder="Transmittance Larutan" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-s_pengeringan" class="mt-2">Susut Pengeringan</label>
                            <input type="text" class="form-control mt-4" id="t-s_pengeringan" name="s_pengeringan" placeholder="Susut Pengeringan" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-bloom_st" class="mt-2">Bloom Strength</label>
                            <input type="text" class="form-control" id="t-bloom_st" name="bloom_st" placeholder="Bloom Strength" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-viscost" class="mt-2">Viscositas 30%</label>
                            <input type="text" class="form-control" id="t-viscost" name="viscost" placeholder="Viscositas 30%" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-viscost_bd" class="mt-2">Viscositas Breakdown</label>
                            <input type="text" class="form-control" id="t-viscost_bd" name="viscost_bd" placeholder="Viscositas Breakdown" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-ph" class="mt-2">pH</label>
                            <input type="text" class="form-control" id="t-ph" name="ph" placeholder="pH" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-t_isl" class="mt-2">Titik Isoelektrik</label>
                            <input type="text" class="form-control" id="t-t_isl" name="t_isl" placeholder="Titik Isoelektrik" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-sett_point" class="mt-2">Setting Point</label>
                            <input type="text" class="form-control" id="t-sett_point" name="sett_point" placeholder="Setting Point" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-keasaman" class="mt-2">Keasaman</label><br>
                            <input type="text" class="form-control" id="t-keasaman" name="keasaman" placeholder="Keasaman" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-sulfur_do" class="mt-2">Sulfur Dioksida</label><br>
                            <input type="text" class="form-control" id="t-sulfur_do" name="sulfur_do" placeholder="Sulfur Dioksida" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-sisa_pmj" class="mt-2">Sisa Pemijaran</label><br>
                            <input type="text" class="form-control" id="t-sisa_pmj" name="sisa_pmj" placeholder="Sisa Pemijaran" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-uk_part_mesh4" class="mt-2">Ukuran Partikel Mesh 4</label><br>
                            <input type="text" class="form-control" id="t-uk_part_mesh4" name="uk_part_mesh4" placeholder="Ukuran Partikel Mesh 4" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-uk_part_mesh40" class="mt-2">Ukuran Partikel Mesh 40</label><br>
                            <input type="text" class="form-control" id="t-uk_part_mesh40" name="uk_part_mesh40" placeholder="Ukuran Partikel Mesh 40" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-kndtv" class="mt-2">Konduktivitas</label><br>
                            <input type="text" class="form-control" id="t-kndtv" name="kndtv" placeholder="Konduktivitas" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-arsen" class="mt-2">Arsen (As) *)</label><br>
                            <input type="text" class="form-control" id="t-arsen" name="arsen" placeholder="Arsen" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-timbal" class="mt-2">Timbal (Pb) *)</label><br>
                            <input type="text" class="form-control" id="t-timbal" name="timbal" placeholder="Timbal" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-peroksida" class="mt-2">Peroksida *)</label><br>
                            <input type="text" class="form-control" id="t-peroksida" name="peroksida" placeholder="Peroksida" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-besi" class="mt-2">Besi *)</label><br>
                            <input type="text" class="form-control" id="t-besi" name="besi" placeholder="Besi" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-cromium" class="mt-2">Cromium *)</label><br>
                            <input type="text" class="form-control" id="t-cromium" name="cromium" placeholder="Cromium" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-zinc" class="mt-2">Zinc *)</label><br>
                            <input type="text" class="form-control" id="t-zinc" name="zinc" placeholder="Zinc" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-cm_dna_babi" class="mt-2">Cemaran DNA Babi/Porcine *)</label><br>
                            <input type="text" class="form-control mt-4" id="t-cm_dna_babi" name="cm_dna_babi" placeholder="Cemaran DNA Babi/Porcine" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-m_tb" class="mt-2">Mikrobiologi (Total Bakteri)</label><br>
                            <input type="text" class="form-control mt-4" id="t-m_tb" name="m_tb" placeholder="M. Total Bakteri" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-m_akk" class="mt-2">Mikrobiologi (Angka Kapang dan Khamir)</label><br>
                            <input type="text" class="form-control" id="t-m_akk" name="m_akk" placeholder="M. Angka Kapang dan Khamir" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-m_ec" class="mt-2">Mikrobiologi (Escherrichia coli)</label><br>
                            <input type="text" class="form-control" id="t-m_ec" name="m_ec" placeholder="M. Escherrichia coli" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-m_salmon" class="mt-2">Mikrobiologi (Salmonella)</label><br>
                            <input type="text" class="form-control" id="t-m_salmon" name="m_salmon" placeholder="M. Salmonella" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-wd_py" class="mt-2">Wadah dan Penyimpanan</label><br>
                            <input type="text" class="form-control" id="t-wd_py" name="wd_py" placeholder="Wadah dan Penyimpanan" readonly>
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
            var id_pb = $(event.relatedTarget).data('id_pb')
            var no_surat_jalan = $(event.relatedTarget).data('no_surat_jalan')
            var no_batch = $(event.relatedTarget).data('no_batch')
            var tgl = $(event.relatedTarget).data('tgl')
            var tgl_uji = $(event.relatedTarget).data('tgl_uji')
            var no_analis = $(event.relatedTarget).data('no_analis')
            var dok_pendukung = $(event.relatedTarget).data('dok_pendukung')
            var jenis_kemasan = $(event.relatedTarget).data('jenis_kemasan')
            var jml_kemasan = $(event.relatedTarget).data('jml_kemasan')
            var ditolak_kemasan = $(event.relatedTarget).data('ditolak_kemasan')
            var qty = $(event.relatedTarget).data('qty')
            var ditolak_qty = $(event.relatedTarget).data('ditolak_qty')
            var exp = $(event.relatedTarget).data('exp')
            var mfg = $(event.relatedTarget).data('mfg')
            var nama_barang = $(event.relatedTarget).data('nama_barang')
            var nama_supplier = $(event.relatedTarget).data('nama_supplier')
            var op_gudang = $(event.relatedTarget).data('op_gudang')
            var pemerian = $(event.relatedTarget).data('pemerian')
            var kelarutan = $(event.relatedTarget).data('kelarutan')
            var identifikasi = $(event.relatedTarget).data('identifikasi')
            var bauzat_tl_air = $(event.relatedTarget).data('bauzat_tl_air')
            var trans_larutan = $(event.relatedTarget).data('trans_larutan')
            var s_pengeringan = $(event.relatedTarget).data('s_pengeringan')
            var bloom_st = $(event.relatedTarget).data('bloom_st')
            var viscost = $(event.relatedTarget).data('viscost')
            var viscost_bd = $(event.relatedTarget).data('viscost_bd')
            var ph = $(event.relatedTarget).data('ph')
            var t_isl = $(event.relatedTarget).data('t_isl')
            var sett_point = $(event.relatedTarget).data('sett_point')
            var keasaman = $(event.relatedTarget).data('keasaman')
            var sulfur_do = $(event.relatedTarget).data('sulfur_do')
            var sisa_pmj = $(event.relatedTarget).data('sisa_pmj')
            var uk_part_mesh4 = $(event.relatedTarget).data('uk_part_mesh4')
            var uk_part_mesh40 = $(event.relatedTarget).data('uk_part_mesh40')
            var kndtv = $(event.relatedTarget).data('kndtv')
            var arsen = $(event.relatedTarget).data('arsen')
            var timbal = $(event.relatedTarget).data('timbal')
            var peroksida = $(event.relatedTarget).data('peroksida')
            var besi = $(event.relatedTarget).data('besi')
            var cromium = $(event.relatedTarget).data('cromium')
            var zinc = $(event.relatedTarget).data('zinc')
            var cm_dna_babi = $(event.relatedTarget).data('cm_dna_babi')
            var m_tb = $(event.relatedTarget).data('m_tb')
            var m_akk = $(event.relatedTarget).data('m_akk')
            var m_ec = $(event.relatedTarget).data('m_ec')
            var m_salmon = $(event.relatedTarget).data('m_salmon')
            var wd_py = $(event.relatedTarget).data('wd_py')
            var penguji = $(event.relatedTarget).data('penguji')
            var tutup = $(event.relatedTarget).data('tutup')
            var wadah = $(event.relatedTarget).data('wadah')
            var label = $(event.relatedTarget).data('label')

            $(this).find('#v-id_pb').val(id_pb)
            $(this).find('#v-no_surat_jalan').val(no_surat_jalan)
            $(this).find('#v-no_batch').val(no_batch)
            $(this).find('#v-tgl').val(tgl)
            $(this).find('#v-tgl_uji').val(tgl_uji)
            $(this).find('#v-no_analis').val(no_analis)
            $(this).find('#v-dok_pendukung').val(dok_pendukung)
            $(this).find('#v-jenis_kemasan').val(jenis_kemasan)
            $(this).find('#v-jml_kemasan').val(jml_kemasan)
            $(this).find('#v-ditolak_kemasan').val(ditolak_kemasan)
            $(this).find('#v-qty').val(qty)
            $(this).find('#v-ditolak_qty').val(ditolak_qty)
            $(this).find('#v-exp').val(exp)
            $(this).find('#v-mfg').val(mfg)
            $(this).find('#v-nama_barang').val(nama_barang)
            $(this).find('#v-nama_supplier').val(nama_supplier)
            $(this).find('#v-op_gudang').val(op_gudang)
            $(this).find('#v-pemerian').val(pemerian)
            $(this).find('#v-kelarutan').val(kelarutan)
            $(this).find('#v-identifikasi').val(identifikasi)
            $(this).find('#v-bauzat_tl_air').val(bauzat_tl_air)
            $(this).find('#v-trans_larutan').val(trans_larutan)
            $(this).find('#v-s_pengeringan').val(s_pengeringan)
            $(this).find('#v-bloom_st').val(bloom_st)
            $(this).find('#v-viscost').val(viscost)
            $(this).find('#v-bauzat_tl_air').val(bauzat_tl_air)
            $(this).find('#v-trans_larutan').val(trans_larutan)
            $(this).find('#v-s_pengeringan').val(s_pengeringan)
            $(this).find('#v-bloom_st').val(bloom_st)
            $(this).find('#v-viscost').val(viscost)
            $(this).find('#v-viscost_bd').val(viscost_bd)
            $(this).find('#v-ph').val(ph)
            $(this).find('#v-t_isl').val(t_isl)
            $(this).find('#v-sett_point').val(sett_point)
            $(this).find('#v-keasaman').val(keasaman)
            $(this).find('#v-sulfur_do').val(sulfur_do)
            $(this).find('#v-sisa_pmj').val(sisa_pmj)
            $(this).find('#v-uk_part_mesh4').val(uk_part_mesh4)
            $(this).find('#v-uk_part_mesh40').val(uk_part_mesh40)
            $(this).find('#v-kndtv').val(kndtv)
            $(this).find('#v-arsen').val(arsen)
            $(this).find('#v-timbal').val(timbal)
            $(this).find('#v-peroksida').val(peroksida)
            $(this).find('#v-besi').val(besi)
            $(this).find('#v-cromium').val(cromium)
            $(this).find('#v-zinc').val(zinc)
            $(this).find('#v-cm_dna_babi').val(cm_dna_babi)
            $(this).find('#v-m_tb').val(m_tb)
            $(this).find('#v-m_akk').val(m_akk)
            $(this).find('#v-m_ec').val(m_ec)
            $(this).find('#v-m_salmon').val(m_salmon)
            $(this).find('#v-wd_py').val(wd_py)
            $(this).find('#v-penguji').val(penguji)
            $(this).find('#v-tutup').val(tutup)
            $(this).find('#v-wadah').val(wadah)
            $(this).find('#v-label').val(label)

        })

    })
</script>

<!-- Script Modal Approval Released-->
<script type="text/javascript">
    $(document).ready(function() {
        $('#released').on('show.bs.modal', function(event) {
            var id_ujigel = $(event.relatedTarget).data('id_ujigel')
            var id_barang = $(event.relatedTarget).data('id_barang')
            var id_supplier = $(event.relatedTarget).data('id_supplier')
            var id_pb = $(event.relatedTarget).data('id_pb')
            var no_surat_jalan = $(event.relatedTarget).data('no_surat_jalan')
            var no_batch = $(event.relatedTarget).data('no_batch')
            var tgl = $(event.relatedTarget).data('tgl')
            var tgl_uji = $(event.relatedTarget).data('tgl_uji')
            var no_analis = $(event.relatedTarget).data('no_analis')
            var dok_pendukung = $(event.relatedTarget).data('dok_pendukung')
            var jenis_kemasan = $(event.relatedTarget).data('jenis_kemasan')
            var jml_kemasan = $(event.relatedTarget).data('jml_kemasan')
            var ditolak_kemasan = $(event.relatedTarget).data('ditolak_kemasan')
            var qty = $(event.relatedTarget).data('qty')
            var ditolak_qty = $(event.relatedTarget).data('ditolak_qty')
            var exp = $(event.relatedTarget).data('exp')
            var mfg = $(event.relatedTarget).data('mfg')
            var nama_barang = $(event.relatedTarget).data('nama_barang')
            var nama_supplier = $(event.relatedTarget).data('nama_supplier')
            var op_gudang = $(event.relatedTarget).data('op_gudang')
            var pemerian = $(event.relatedTarget).data('pemerian')
            var kelarutan = $(event.relatedTarget).data('kelarutan')
            var identifikasi = $(event.relatedTarget).data('identifikasi')
            var bauzat_tl_air = $(event.relatedTarget).data('bauzat_tl_air')
            var trans_larutan = $(event.relatedTarget).data('trans_larutan')
            var s_pengeringan = $(event.relatedTarget).data('s_pengeringan')
            var bloom_st = $(event.relatedTarget).data('bloom_st')
            var viscost = $(event.relatedTarget).data('viscost')
            var viscost_bd = $(event.relatedTarget).data('viscost_bd')
            var ph = $(event.relatedTarget).data('ph')
            var t_isl = $(event.relatedTarget).data('t_isl')
            var sett_point = $(event.relatedTarget).data('sett_point')
            var keasaman = $(event.relatedTarget).data('keasaman')
            var sulfur_do = $(event.relatedTarget).data('sulfur_do')
            var sisa_pmj = $(event.relatedTarget).data('sisa_pmj')
            var uk_part_mesh4 = $(event.relatedTarget).data('uk_part_mesh4')
            var uk_part_mesh40 = $(event.relatedTarget).data('uk_part_mesh40')
            var kndtv = $(event.relatedTarget).data('kndtv')
            var arsen = $(event.relatedTarget).data('arsen')
            var timbal = $(event.relatedTarget).data('timbal')
            var peroksida = $(event.relatedTarget).data('peroksida')
            var besi = $(event.relatedTarget).data('besi')
            var cromium = $(event.relatedTarget).data('cromium')
            var zinc = $(event.relatedTarget).data('zinc')
            var cm_dna_babi = $(event.relatedTarget).data('cm_dna_babi')
            var m_tb = $(event.relatedTarget).data('m_tb')
            var m_akk = $(event.relatedTarget).data('m_akk')
            var m_ec = $(event.relatedTarget).data('m_ec')
            var m_salmon = $(event.relatedTarget).data('m_salmon')
            var wd_py = $(event.relatedTarget).data('wd_py')
            var penguji = $(event.relatedTarget).data('penguji')
            var tutup = $(event.relatedTarget).data('tutup')
            var wadah = $(event.relatedTarget).data('wadah')
            var label = $(event.relatedTarget).data('label')

            $(this).find('#r-id_ujigel').val(id_ujigel)
            $(this).find('#r-id_barang').val(id_barang)
            $(this).find('#r-id_supplier').val(id_supplier)
            $(this).find('#r-id_pb').val(id_pb)
            $(this).find('#r-no_surat_jalan').val(no_surat_jalan)
            $(this).find('#r-no_batch').val(no_batch)
            $(this).find('#r-tgl').val(tgl)
            $(this).find('#r-tgl_uji').val(tgl_uji)
            $(this).find('#r-no_analis').val(no_analis)
            $(this).find('#r-dok_pendukung').val(dok_pendukung)
            $(this).find('#r-jenis_kemasan').val(jenis_kemasan)
            $(this).find('#r-jml_kemasan').val(jml_kemasan)
            $(this).find('#r-ditolak_kemasan').val(ditolak_kemasan)
            $(this).find('#r-qty').val(qty)
            $(this).find('#r-ditolak_qty').val(ditolak_qty)
            $(this).find('#r-exp').val(exp)
            $(this).find('#r-mfg').val(mfg)
            $(this).find('#r-nama_barang').val(nama_barang)
            $(this).find('#r-nama_supplier').val(nama_supplier)
            $(this).find('#r-op_gudang').val(op_gudang)
            $(this).find('#r-pemerian').val(pemerian)
            $(this).find('#r-kelarutan').val(kelarutan)
            $(this).find('#r-identifikasi').val(identifikasi)
            $(this).find('#r-bauzat_tl_air').val(bauzat_tl_air)
            $(this).find('#r-trans_larutan').val(trans_larutan)
            $(this).find('#r-s_pengeringan').val(s_pengeringan)
            $(this).find('#r-bloom_st').val(bloom_st)
            $(this).find('#r-viscost').val(viscost)
            $(this).find('#r-bauzat_tl_air').val(bauzat_tl_air)
            $(this).find('#r-trans_larutan').val(trans_larutan)
            $(this).find('#r-s_pengeringan').val(s_pengeringan)
            $(this).find('#r-bloom_st').val(bloom_st)
            $(this).find('#r-viscost').val(viscost)
            $(this).find('#r-viscost_bd').val(viscost_bd)
            $(this).find('#r-ph').val(ph)
            $(this).find('#r-t_isl').val(t_isl)
            $(this).find('#r-sett_point').val(sett_point)
            $(this).find('#r-keasaman').val(keasaman)
            $(this).find('#r-sulfur_do').val(sulfur_do)
            $(this).find('#r-sisa_pmj').val(sisa_pmj)
            $(this).find('#r-uk_part_mesh4').val(uk_part_mesh4)
            $(this).find('#r-uk_part_mesh40').val(uk_part_mesh40)
            $(this).find('#r-kndtv').val(kndtv)
            $(this).find('#r-arsen').val(arsen)
            $(this).find('#r-timbal').val(timbal)
            $(this).find('#r-peroksida').val(peroksida)
            $(this).find('#r-besi').val(besi)
            $(this).find('#r-cromium').val(cromium)
            $(this).find('#r-zinc').val(zinc)
            $(this).find('#r-cm_dna_babi').val(cm_dna_babi)
            $(this).find('#r-m_tb').val(m_tb)
            $(this).find('#r-m_akk').val(m_akk)
            $(this).find('#r-m_ec').val(m_ec)
            $(this).find('#r-m_salmon').val(m_salmon)
            $(this).find('#r-wd_py').val(wd_py)
            $(this).find('#r-penguji').val(penguji)
            $(this).find('#r-tutup').val(tutup)
            $(this).find('#r-wadah').val(wadah)
            $(this).find('#r-label').val(label)
            $(this).find('#tgl_rilis').datepicker({
                autoclose: true,
                format: "dd/mm/yyyy"
            }).on('show.bs.modal', function(event) {
                // prevent datepicker from firing bootstrap modal "show.bs.modal"
                event.stopPropagation();

            });
        })

        $('#tgl_rilis').on('change', function() {
            const tgl_rilis = $(this).val()
            const tgl_uu = moment(tgl_rilis, "DD/MM/YYYY").add('months', 6).format('DD/MM/YYYY')
            $('#tgl_uu').val(tgl_uu)
        })
    })
</script>

<!-- Script Modal Approval Reject -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#reject').on('show.bs.modal', function(event) {
            var id_ujigel = $(event.relatedTarget).data('id_ujigel')
            var id_barang = $(event.relatedTarget).data('id_barang')
            var id_supplier = $(event.relatedTarget).data('id_supplier')
            var id_pb = $(event.relatedTarget).data('id_pb')
            var no_surat_jalan = $(event.relatedTarget).data('no_surat_jalan')
            var no_batch = $(event.relatedTarget).data('no_batch')
            var tgl = $(event.relatedTarget).data('tgl')
            var tgl_uji = $(event.relatedTarget).data('tgl_uji')
            var no_analis = $(event.relatedTarget).data('no_analis')
            var tgl_reject = $(event.relatedTarget).data('tgl_reject')
            var dok_pendukung = $(event.relatedTarget).data('dok_pendukung')
            var jenis_kemasan = $(event.relatedTarget).data('jenis_kemasan')
            var jml_kemasan = $(event.relatedTarget).data('jml_kemasan')
            var ditolak_kemasan = $(event.relatedTarget).data('ditolak_kemasan')
            var qty = $(event.relatedTarget).data('qty')
            var ditolak_qty = $(event.relatedTarget).data('ditolak_qty')
            var exp = $(event.relatedTarget).data('exp')
            var mfg = $(event.relatedTarget).data('mfg')
            var nama_barang = $(event.relatedTarget).data('nama_barang')
            var nama_supplier = $(event.relatedTarget).data('nama_supplier')
            var op_gudang = $(event.relatedTarget).data('op_gudang')
            var pemerian = $(event.relatedTarget).data('pemerian')
            var kelarutan = $(event.relatedTarget).data('kelarutan')
            var identifikasi = $(event.relatedTarget).data('identifikasi')
            var bauzat_tl_air = $(event.relatedTarget).data('bauzat_tl_air')
            var trans_larutan = $(event.relatedTarget).data('trans_larutan')
            var s_pengeringan = $(event.relatedTarget).data('s_pengeringan')
            var bloom_st = $(event.relatedTarget).data('bloom_st')
            var viscost = $(event.relatedTarget).data('viscost')
            var viscost_bd = $(event.relatedTarget).data('viscost_bd')
            var ph = $(event.relatedTarget).data('ph')
            var t_isl = $(event.relatedTarget).data('t_isl')
            var sett_point = $(event.relatedTarget).data('sett_point')
            var keasaman = $(event.relatedTarget).data('keasaman')
            var sulfur_do = $(event.relatedTarget).data('sulfur_do')
            var sisa_pmj = $(event.relatedTarget).data('sisa_pmj')
            var uk_part_mesh4 = $(event.relatedTarget).data('uk_part_mesh4')
            var uk_part_mesh40 = $(event.relatedTarget).data('uk_part_mesh40')
            var kndtv = $(event.relatedTarget).data('kndtv')
            var arsen = $(event.relatedTarget).data('arsen')
            var timbal = $(event.relatedTarget).data('timbal')
            var peroksida = $(event.relatedTarget).data('peroksida')
            var besi = $(event.relatedTarget).data('besi')
            var cromium = $(event.relatedTarget).data('cromium')
            var zinc = $(event.relatedTarget).data('zinc')
            var cm_dna_babi = $(event.relatedTarget).data('cm_dna_babi')
            var m_tb = $(event.relatedTarget).data('m_tb')
            var m_akk = $(event.relatedTarget).data('m_akk')
            var m_ec = $(event.relatedTarget).data('m_ec')
            var m_salmon = $(event.relatedTarget).data('m_salmon')
            var wd_py = $(event.relatedTarget).data('wd_py')
            var penguji = $(event.relatedTarget).data('penguji')
            var tutup = $(event.relatedTarget).data('tutup')
            var wadah = $(event.relatedTarget).data('wadah')
            var label = $(event.relatedTarget).data('label')

            $(this).find('#t-id_ujigel').val(id_ujigel)
            $(this).find('#t-id_barang').val(id_barang)
            $(this).find('#t-id_supplier').val(id_supplier)
            $(this).find('#t-id_pb').val(id_pb)
            $(this).find('#t-no_surat_jalan').val(no_surat_jalan)
            $(this).find('#t-no_batch').val(no_batch)
            $(this).find('#t-tgl').val(tgl)
            $(this).find('#t-tgl_uji').val(tgl_uji)
            $(this).find('#t-no_analis').val(no_analis)
            $(this).find('#t-dok_pendukung').val(dok_pendukung)
            $(this).find('#t-jenis_kemasan').val(jenis_kemasan)
            $(this).find('#t-jml_kemasan').val(jml_kemasan)
            $(this).find('#t-ditolak_kemasan').val(ditolak_kemasan)
            $(this).find('#t-jenis_kemasan').val(jenis_kemasan)
            $(this).find('#t-qty').val(qty)
            $(this).find('#t-ditolak_qty').val(ditolak_qty)
            $(this).find('#t-exp').val(exp)
            $(this).find('#t-mfg').val(mfg)
            $(this).find('#t-nama_barang').val(nama_barang)
            $(this).find('#t-nama_supplier').val(nama_supplier)
            $(this).find('#t-op_gudang').val(op_gudang)
            $(this).find('#t-pemerian').val(pemerian)
            $(this).find('#t-kelarutan').val(kelarutan)
            $(this).find('#t-identifikasi').val(identifikasi)
            $(this).find('#t-bauzat_tl_air').val(bauzat_tl_air)
            $(this).find('#t-trans_larutan').val(trans_larutan)
            $(this).find('#t-s_pengeringan').val(s_pengeringan)
            $(this).find('#t-bloom_st').val(bloom_st)
            $(this).find('#t-viscost').val(viscost)
            $(this).find('#t-bauzat_tl_air').val(bauzat_tl_air)
            $(this).find('#t-trans_larutan').val(trans_larutan)
            $(this).find('#t-s_pengeringan').val(s_pengeringan)
            $(this).find('#t-bloom_st').val(bloom_st)
            $(this).find('#t-viscost').val(viscost)
            $(this).find('#t-viscost_bd').val(viscost_bd)
            $(this).find('#t-ph').val(ph)
            $(this).find('#t-t_isl').val(t_isl)
            $(this).find('#t-sett_point').val(sett_point)
            $(this).find('#t-keasaman').val(keasaman)
            $(this).find('#t-sulfur_do').val(sulfur_do)
            $(this).find('#t-sisa_pmj').val(sisa_pmj)
            $(this).find('#t-uk_part_mesh4').val(uk_part_mesh4)
            $(this).find('#t-uk_part_mesh40').val(uk_part_mesh40)
            $(this).find('#t-kndtv').val(kndtv)
            $(this).find('#t-arsen').val(arsen)
            $(this).find('#t-timbal').val(timbal)
            $(this).find('#t-peroksida').val(peroksida)
            $(this).find('#t-besi').val(besi)
            $(this).find('#t-cromium').val(cromium)
            $(this).find('#t-zinc').val(zinc)
            $(this).find('#t-cm_dna_babi').val(cm_dna_babi)
            $(this).find('#t-m_tb').val(m_tb)
            $(this).find('#t-m_akk').val(m_akk)
            $(this).find('#t-m_ec').val(m_ec)
            $(this).find('#t-m_salmon').val(m_salmon)
            $(this).find('#t-wd_py').val(wd_py)
            $(this).find('#t-penguji').val(penguji)
            $(this).find('#t-tutup').val(tutup)
            $(this).find('#t-wadah').val(wadah)
            $(this).find('#t-label').val(label)
            $(this).find('#tgl_reject').datepicker({
                autoclose: true,
                format: "dd/mm/yyyy"
            }).on('show.bs.modal', function(event) {
                // prevent datepicker from firing bootstrap modal "show.bs.modal"
                event.stopPropagation();
            });
        })
    })
</script>
</div>