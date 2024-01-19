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
                                    <li class="breadcrumb-item"><a href="">Lab/QC</a></li>
                                    <li class="breadcrumb-item"><a href="<?= base_url('lab/Pemeriksaan_bahan') ?>">Pemeriksaan Bahan</a></li>
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
                                        <h5>Data Pemeriksaan Bahan</h5>

                                    </div>
                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">
                                            <table class="table datatable table-hover table-striped table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Tanggal Masuk</th>
                                                        <th>No. Po</th>
                                                        <th>No Batch</th>
                                                        <th>Nama Barang</th>
                                                        <th class="text-right">Qty</th>
                                                        <th class="">Jenis Bahan</th>
                                                        <th class="text-center">Status</th>
                                                        <th class="text-center">Details</th>
                                                        <th class="text-center">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($result as $k) {
                                                        $tgl_msk =  explode('-', $k['tgl'])[2] . "/" . explode('-', $k['tgl'])[1] . "/" . explode('-', $k['tgl'])[0];
                                                        $exp =  explode('-', $k['exp'])[2] . "/" . explode('-', $k['exp'])[1] . "/" . explode('-', $k['exp'])[0];
                                                        $mfg =  explode('-', $k['mfg'])[2] . "/" . explode('-', $k['mfg'])[1] . "/" . explode('-', $k['mfg'])[0]; ?>
                                                        <?php if ($k['status'] === "Karantina") { ?>
                                                            <tr class="table-info">
                                                            <?php } else { ?>
                                                            <tr>
                                                            <?php } ?>
                                                            <th scope="row"><?= $no++ ?></th>
                                                            <td><?= $tgl_msk ?></td>
                                                            <td><?= $k['no_surat_jalan'] ?></td>
                                                            <td><?= $k['no_batch'] ?></td>
                                                            <td><?= $k['nama_barang'] ?></td>
                                                            <td class="text-right"><?= number_format($k['qty'], 0, ",", ".") ?><?= $k['satuan'] ?></td>
                                                            <td><?= $k['jenis_bahan'] ?></td>
                                                            <td class="text-center"><?= $k['status'] ?></td>
                                                            <td class="text-right">
                                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                                    <button type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#detail" data-id_pb="<?= $k['id_pb'] ?>" data-no_surat_jalan="<?= $k['no_surat_jalan'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-tgl="<?= $tgl_msk ?>" data-nama_barang="<?= $k['nama_barang'] ?>" data-nama_supplier="<?= $k['nama_supplier'] ?>" data-op_gudang="<?= $k['op_gudang'] ?>" data-dok_pendukung="<?= $k['dok_pendukung'] ?>" data-qty_pack="<?= $k['qty_pack'] ?>" data-jenis_kemasan="<?= $k['jenis_kemasan'] ?>" data-qty="<?= $k['qty'] ?>" data-jml_kemasan="<?= $k['jml_kemasan'] ?>" data-tutup="<?= $k['tutup'] ?>" data-wadah="<?= $k['wadah'] ?>" data-label="<?= $k['label'] ?>" data-ditolak_qty="<?= $k['ditolak_qty'] ?>" data-ditolak_kemasan="<?= $k['ditolak_kemasan'] ?>" data-exp="<?= $exp ?>" data-mfg="<?= $mfg ?>">
                                                                        <i class="feather icon-eye"></i>Details
                                                                    </button>
                                                                </div>
                                                                </td>
                                                    
                                                                <?php if ($k['status'] === "Proses") { ?> 
                                                                <td>
                                                                    <center>
                                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#edit" data-id_pb="<?= $k['id_pb'] ?>" data-no_surat_jalan="<?= $k['no_surat_jalan'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-tgl="<?= $tgl_msk ?>" data-nama_barang="<?= $k['nama_barang'] ?>" data-nama_supplier="<?= $k['nama_supplier'] ?>" data-op_gudang="<?= $k['op_gudang'] ?>" data-dok_pendukung="<?= $k['dok_pendukung'] ?>" data-qty_pack="<?= $k['qty_pack'] ?>" data-jenis_kemasan="<?= $k['jenis_kemasan'] ?>" data-qty="<?= $k['qty'] ?>" data-jml_kemasan="<?= $k['jml_kemasan'] ?>" data-tutup="<?= $k['tutup'] ?>" data-wadah="<?= $k['wadah'] ?>" data-label="<?= $k['label'] ?>" data-ditolak_qty="<?= $k['ditolak_qty'] ?>" data-ditolak_kemasan="<?= $k['ditolak_kemasan'] ?>" data-exp="<?= $exp ?>" data-mfg="<?= $mfg ?>">
                                                                            <i class="feather icon-edit-2"></i>Edit
                                                                        </button>
                                                                    </div>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <a href="<?= base_url() ?>/lab/pemeriksaan_bahan/delete/<?= $k['id_pb'] ?>" class="btn btn-danger btn-square text-light btn-sm" onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
                                                                        <i class="feather icon-trash-2"></i>Hapus
                                                                        </a>
                                                                    </div>
                                                                    </center>
                                                                    </td>
                                                             <?php } ?>
                                                            <td class="text-right">
                                                                <center>
                                                                <?php if ($k['jenis_bahan'] === "Bahan Baku" && $k['status'] === "Karantina" || $k['jenis_bahan'] === "BAHAN BAKU" && $k['status'] === "Karantina") { ?>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#add_ujigel" data-id_pb="<?= $k['id_pb'] ?>" data-id_barang="<?= $k['id_barang'] ?>" data-id_supplier="<?= $k['id_supplier'] ?>" data-no_surat_jalan="<?= $k['no_surat_jalan'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-tgl="<?= $tgl_msk ?>" data-nama_barang="<?= $k['nama_barang'] ?>" data-nama_supplier="<?= $k['nama_supplier'] ?>" data-op_gudang="<?= $k['op_gudang'] ?>" data-dok_pendukung="<?= $k['dok_pendukung'] ?>" data-jenis_kemasan="<?= $k['jenis_kemasan'] ?>" data-jml_kemasan="<?= $k['jml_kemasan'] ?>" data-tutup="<?= $k['tutup'] ?>" data-wadah="<?= $k['wadah'] ?>" data-label="<?= $k['label'] ?>" data-qty="<?= $k['qty'] ?>" data-exp="<?= $exp ?>" data-mfg="<?= $mfg ?>">
                                                                            <i class="feather icon-edit-2"></i>Uji BB
                                                                        </button>
                                                                    </div>
                                                                <?php }
                                                                if ($k['jenis_bahan'] === "Pelarut" && $k['status'] === "Karantina" || $k['jenis_bahan'] === "PELARUT" && $k['status'] === "Karantina") { ?>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#add_ujipel" data-id_pb="<?= $k['id_pb'] ?>" data-id_barang="<?= $k['id_barang'] ?>" data-id_supplier="<?= $k['id_supplier'] ?>" data-no_surat_jalan="<?= $k['no_surat_jalan'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-tgl="<?= $tgl_msk ?>" data-nama_barang="<?= $k['nama_barang'] ?>" data-nama_supplier="<?= $k['nama_supplier'] ?>" data-op_gudang="<?= $k['op_gudang'] ?>" data-dok_pendukung="<?= $k['dok_pendukung'] ?>" data-jenis_kemasan="<?= $k['jenis_kemasan'] ?>" data-jml_kemasan="<?= $k['jml_kemasan'] ?>" data-tutup="<?= $k['tutup'] ?>" data-wadah="<?= $k['wadah'] ?>" data-label="<?= $k['label'] ?>" data-qty="<?= $k['qty'] ?>" data-exp="<?= $exp ?>" data-mfg="<?= $mfg ?>">
                                                                            <i class="feather icon-edit-2"></i>Uji Pel
                                                                        </button>
                                                                    </div>
                                                                <?php }
                                                                if ($k['jenis_bahan'] === "Pewarna" && $k['status'] === "Karantina" || $k['jenis_bahan'] === "PEWARNA" && $k['status'] === "Karantina") { ?>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#add_ujipw" data-id_pb="<?= $k['id_pb'] ?>" data-id_barang="<?= $k['id_barang'] ?>" data-id_supplier="<?= $k['id_supplier'] ?>" data-no_surat_jalan="<?= $k['no_surat_jalan'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-tgl="<?= $tgl_msk ?>" data-nama_barang="<?= $k['nama_barang'] ?>" data-nama_supplier="<?= $k['nama_supplier'] ?>" data-op_gudang="<?= $k['op_gudang'] ?>" data-dok_pendukung="<?= $k['dok_pendukung'] ?>" data-jenis_kemasan="<?= $k['jenis_kemasan'] ?>" data-jml_kemasan="<?= $k['jml_kemasan'] ?>" data-tutup="<?= $k['tutup'] ?>" data-wadah="<?= $k['wadah'] ?>" data-label="<?= $k['label'] ?>" data-qty="<?= $k['qty'] ?>" data-exp="<?= $exp ?>" data-mfg="<?= $mfg ?>">
                                                                            <i class="feather icon-edit-2"></i>Uji Pw
                                                                        </button>
                                                                    </div>
                                                                <?php }
                                                                if ($k['jenis_bahan'] === "Tinta Print" && $k['status'] === "Karantina" || $k['jenis_bahan'] === "TINTA PRINT" && $k['status'] === "Karantina") { ?>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#add_ujitp" data-id_pb="<?= $k['id_pb'] ?>" data-id_barang="<?= $k['id_barang'] ?>" data-id_supplier="<?= $k['id_supplier'] ?>" data-no_surat_jalan="<?= $k['no_surat_jalan'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-tgl="<?= $tgl_msk ?>" data-nama_barang="<?= $k['nama_barang'] ?>" data-nama_supplier="<?= $k['nama_supplier'] ?>" data-op_gudang="<?= $k['op_gudang'] ?>" data-dok_pendukung="<?= $k['dok_pendukung'] ?>" data-jenis_kemasan="<?= $k['jenis_kemasan'] ?>" data-jml_kemasan="<?= $k['jml_kemasan'] ?>" data-tutup="<?= $k['tutup'] ?>" data-wadah="<?= $k['wadah'] ?>" data-label="<?= $k['label'] ?>" data-qty="<?= $k['qty'] ?>" data-exp="<?= $exp ?>" data-mfg="<?= $mfg ?>">
                                                                            <i class="feather icon-edit-2"></i>Uji TP
                                                                        </button>
                                                                    </div>
                                                                <?php }

                                                                // Bahan Tambahan Natrium Benzoat
                                                                if ($k['nama_barang'] === "Natrium Benzoat" && $k['status'] === "Karantina" || $k['nama_barang'] === "NATRIUM BENZOAT" && $k['status'] === "Karantina") { ?>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#add_ujinb" data-id_pb="<?= $k['id_pb'] ?>" data-id_barang="<?= $k['id_barang'] ?>" data-id_supplier="<?= $k['id_supplier'] ?>" data-no_surat_jalan="<?= $k['no_surat_jalan'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-tgl="<?= $tgl_msk ?>" data-nama_barang="<?= $k['nama_barang'] ?>" data-nama_supplier="<?= $k['nama_supplier'] ?>" data-op_gudang="<?= $k['op_gudang'] ?>" data-dok_pendukung="<?= $k['dok_pendukung'] ?>" data-jenis_kemasan="<?= $k['jenis_kemasan'] ?>" data-jml_kemasan="<?= $k['jml_kemasan'] ?>" data-tutup="<?= $k['tutup'] ?>" data-wadah="<?= $k['wadah'] ?>" data-label="<?= $k['label'] ?>" data-qty="<?= $k['qty'] ?>" data-exp="<?= $exp ?>" data-mfg="<?= $mfg ?>">
                                                                            <i class="feather icon-edit-2"></i>Uji BT
                                                                        </button>
                                                                    </div>
                                                                <?php }

                                                                // Bahan Tambahan Methyl Paraben
                                                                if ($k['nama_barang'] === "Methyl Paraben" && $k['status'] === "Karantina" || $k['jenis_bahan'] === "METHYL PARABEN" && $k['status'] === "Karantina") { ?>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#add_ujimp" data-id_pb="<?= $k['id_pb'] ?>" data-id_barang="<?= $k['id_barang'] ?>" data-id_supplier="<?= $k['id_supplier'] ?>" data-no_surat_jalan="<?= $k['no_surat_jalan'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-tgl="<?= $tgl_msk ?>" data-nama_barang="<?= $k['nama_barang'] ?>" data-nama_supplier="<?= $k['nama_supplier'] ?>" data-op_gudang="<?= $k['op_gudang'] ?>" data-dok_pendukung="<?= $k['dok_pendukung'] ?>" data-jenis_kemasan="<?= $k['jenis_kemasan'] ?>" data-jml_kemasan="<?= $k['jml_kemasan'] ?>" data-tutup="<?= $k['tutup'] ?>" data-wadah="<?= $k['wadah'] ?>" data-label="<?= $k['label'] ?>" data-qty="<?= $k['qty'] ?>" data-exp="<?= $exp ?>" data-mfg="<?= $mfg ?>">
                                                                            <i class="feather icon-edit-2"></i>Uji BT
                                                                        </button>
                                                                    </div>
                                                                <?php }

                                                                // Bahan Tambahan Lecithin Adlec
                                                                if ($k['nama_barang'] === "LECITHIN ADLEC" && $k['status'] === "Karantina" || $k['jenis_bahan'] === "LECITHIN ADLEC" && $k['status'] === "Karantina") { ?>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#add_ujila" data-id_pb="<?= $k['id_pb'] ?>" data-id_barang="<?= $k['id_barang'] ?>" data-id_supplier="<?= $k['id_supplier'] ?>" data-no_surat_jalan="<?= $k['no_surat_jalan'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-tgl="<?= $tgl_msk ?>" data-nama_barang="<?= $k['nama_barang'] ?>" data-nama_supplier="<?= $k['nama_supplier'] ?>" data-op_gudang="<?= $k['op_gudang'] ?>" data-dok_pendukung="<?= $k['dok_pendukung'] ?>" data-jenis_kemasan="<?= $k['jenis_kemasan'] ?>" data-jml_kemasan="<?= $k['jml_kemasan'] ?>" data-tutup="<?= $k['tutup'] ?>" data-wadah="<?= $k['wadah'] ?>" data-label="<?= $k['label'] ?>" data-qty="<?= $k['qty'] ?>" data-exp="<?= $exp ?>" data-mfg="<?= $mfg ?>">
                                                                            <i class="feather icon-edit-2"></i>Uji BT
                                                                        </button>
                                                                    </div>
                                                                <?php }

                                                                // Bahan Tambahan Candurin Silver Fine
                                                                if ($k['nama_barang'] === "Candurin Silver Fine" && $k['status'] === "Karantina" || $k['jenis_bahan'] === "CANDURIN SILVER FINE" && $k['status'] === "Karantina") { ?>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#add_ujicsf" data-id_pb="<?= $k['id_pb'] ?>" data-id_barang="<?= $k['id_barang'] ?>" data-id_supplier="<?= $k['id_supplier'] ?>" data-no_surat_jalan="<?= $k['no_surat_jalan'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-tgl="<?= $tgl_msk ?>" data-nama_barang="<?= $k['nama_barang'] ?>" data-nama_supplier="<?= $k['nama_supplier'] ?>" data-op_gudang="<?= $k['op_gudang'] ?>" data-dok_pendukung="<?= $k['dok_pendukung'] ?>" data-jenis_kemasan="<?= $k['jenis_kemasan'] ?>" data-jml_kemasan="<?= $k['jml_kemasan'] ?>" data-tutup="<?= $k['tutup'] ?>" data-wadah="<?= $k['wadah'] ?>" data-label="<?= $k['label'] ?>" data-qty="<?= $k['qty'] ?>" data-exp="<?= $exp ?>" data-mfg="<?= $mfg ?>">
                                                                            <i class="feather icon-edit-2"></i>Uji BT
                                                                        </button>
                                                                    </div>
                                                                <?php }

                                                                // Bahan Tambahan Sodium Launil Sulfat
                                                                if ($k['nama_barang'] === "SODIUM LAUNIL SULFAT" && $k['status'] === "Karantina" || $k['jenis_bahan'] === "SODIUM LAUNIL SULFAT" && $k['status'] === "Karantina") { ?>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#add_ujisls" data-id_pb="<?= $k['id_pb'] ?>" data-id_barang="<?= $k['id_barang'] ?>" data-id_supplier="<?= $k['id_supplier'] ?>" data-no_surat_jalan="<?= $k['no_surat_jalan'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-tgl="<?= $tgl_msk ?>" data-nama_barang="<?= $k['nama_barang'] ?>" data-nama_supplier="<?= $k['nama_supplier'] ?>" data-op_gudang="<?= $k['op_gudang'] ?>" data-dok_pendukung="<?= $k['dok_pendukung'] ?>" data-jenis_kemasan="<?= $k['jenis_kemasan'] ?>" data-jml_kemasan="<?= $k['jml_kemasan'] ?>" data-tutup="<?= $k['tutup'] ?>" data-wadah="<?= $k['wadah'] ?>" data-label="<?= $k['label'] ?>" data-qty="<?= $k['qty'] ?>" data-exp="<?= $exp ?>" data-mfg="<?= $mfg ?>">
                                                                            <i class="feather icon-edit-2"></i>Uji BT
                                                                        </button>
                                                                    </div>
                                                                <?php }

                                                                // Bahan Tambahan Titanium Dioxide
                                                                if ($k['nama_barang'] === "TITANIUM DIOXIDE" && $k['status'] === "Karantina" || $k['jenis_bahan'] === "TITANIUM DIOXIDE" && $k['status'] === "Karantina") { ?>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#add_ujitd" data-id_pb="<?= $k['id_pb'] ?>" data-id_barang="<?= $k['id_barang'] ?>" data-id_supplier="<?= $k['id_supplier'] ?>" data-no_surat_jalan="<?= $k['no_surat_jalan'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-tgl="<?= $tgl_msk ?>" data-nama_barang="<?= $k['nama_barang'] ?>" data-nama_supplier="<?= $k['nama_supplier'] ?>" data-op_gudang="<?= $k['op_gudang'] ?>" data-dok_pendukung="<?= $k['dok_pendukung'] ?>" data-jenis_kemasan="<?= $k['jenis_kemasan'] ?>" data-jml_kemasan="<?= $k['jml_kemasan'] ?>" data-tutup="<?= $k['tutup'] ?>" data-wadah="<?= $k['wadah'] ?>" data-label="<?= $k['label'] ?>" data-qty="<?= $k['qty'] ?>" data-exp="<?= $exp ?>" data-mfg="<?= $mfg ?>">
                                                                            <i class="feather icon-edit-2"></i>Uji BT
                                                                        </button>
                                                                    </div>
                                                                <?php } ?>
                                                            </td>
                                                            </center>
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

<?php
// Modal Form Gelatin/Bahan Baku
$this->view('content/lab/pemeriksaan_bahan/gelatin');
// Modal Form Pelarut
$this->view('content/lab/pemeriksaan_bahan/pelarut');
// Modal Form Pewarna
$this->view('content/lab/pemeriksaan_bahan/pewarna');
// Modal Form Tinta Print
$this->view('content/lab/pemeriksaan_bahan/tintaprint');
// Modal Form Natrium Benzoat
$this->view('content/lab/pemeriksaan_bahan_tambahan/natriumbenzoat');
// Modal Form Methyl Paraben
$this->view('content/lab/pemeriksaan_bahan_tambahan/methylparaben');
// Modal Form Methyl Paraben
$this->view('content/lab/pemeriksaan_bahan_tambahan/lecithinadlec');
// Modal Form Candurin Silver Fine
$this->view('content/lab/pemeriksaan_bahan_tambahan/candurinsilverfine');
// Modal Form Candurin Sodium Launil Sulfat
$this->view('content/lab/pemeriksaan_bahan_tambahan/sodiumlaunilsulfat');
// Modal Form Candurin Titanium Dioxide
$this->view('content/lab/pemeriksaan_bahan_tambahan/titaniumdioxide');
?>

<!-- Modal Detail -->
<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Pemeriksaan Bahan</h5>
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
                                <input type="text" class="form-control datepicker" id="v-tgl" name="tgl" placeholder="Tanggal Masuk" readonly>
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
            var id_pb = $(event.relatedTarget).data('id_pb')
            var no_surat_jalan = $(event.relatedTarget).data('no_surat_jalan')
            var no_batch = $(event.relatedTarget).data('no_batch')
            var tgl = $(event.relatedTarget).data('tgl')
            var nama_barang = $(event.relatedTarget).data('nama_barang')
            var nama_supplier = $(event.relatedTarget).data('nama_supplier')
            var op_gudang = $(event.relatedTarget).data('op_gudang')
            var dok_pendukung = $(event.relatedTarget).data('dok_pendukung')
            var qty_pack = $(event.relatedTarget).data('qty_pack')
            var jenis_kemasan = $(event.relatedTarget).data('jenis_kemasan')
            var qty = $(event.relatedTarget).data('qty')
            var jml_kemasan = $(event.relatedTarget).data('jml_kemasan')
            var tutup = $(event.relatedTarget).data('tutup')
            var wadah = $(event.relatedTarget).data('wadah')
            var label = $(event.relatedTarget).data('label')
            var ditolak_qty = $(event.relatedTarget).data('ditolak_qty')
            var ditolak_kemasan = $(event.relatedTarget).data('ditolak_kemasan')
            var exp = $(event.relatedTarget).data('exp')
            var mfg = $(event.relatedTarget).data('mfg')

            $(this).find('#v-id_pb').val(id_pb)
            $(this).find('#v-no_surat_jalan').val(no_surat_jalan)
            $(this).find('#v-no_batch').val(no_batch)
            $(this).find('#v-tgl').val(tgl)
            $(this).find('#v-nama_barang').val(nama_barang)
            $(this).find('#v-nama_supplier').val(nama_supplier)
            $(this).find('#v-op_gudang').val(op_gudang)
            $(this).find('#v-dok_pendukung').val(dok_pendukung)
            $(this).find('#v-qty_pack').val(qty_pack)
            $(this).find('#v-jenis_kemasan').val(jenis_kemasan)
            $(this).find('#v-qty').val(qty)
            $(this).find('#v-jml_kemasan').val(jml_kemasan)
            $(this).find('#v-tutup').val(tutup)
            $(this).find('#v-wadah').val(wadah)
            $(this).find('#v-label').val(label)
            $(this).find('#v-diterima_bahan').val(qty)
            $(this).find('#v-ditolak_bahan').val(ditolak_qty)
            $(this).find('#v-diterima_kemasan').val(jml_kemasan)
            $(this).find('#v-ditolak_kemasan').val(ditolak_kemasan)
            $(this).find('#v-exp').val(exp)
            $(this).find('#v-mfg').val(mfg)
        })
    })
</script>

