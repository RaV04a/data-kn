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
                                    <li class="breadcrumb-item"><a href="<?= base_url('gudang_bahanbaku/Karantina') ?>">Barang Karantina</a></li>
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
                                        <h5>Data Barang Karantina</h5>

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
                                                        <th>Tanggal</th>
                                                        <th>No Surat Jalan</th>
                                                        <th>No Batch</th>
                                                        <th>Nama Barang</th>
                                                        <th class="text-right">Qty</th>
                                                        <th class="text-center">Status</th>
                                                        <th class="text-center">Details</th>
                                                        <th class="text-center">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($result as $k) {
                                                        $tgl =  explode('-', $k['tgl'])[2] . "/" . explode('-', $k['tgl'])[1] . "/" . explode('-', $k['tgl'])[0];
                                                        $exp =  explode('-', $k['exp'])[2] . "/" . explode('-', $k['exp'])[1] . "/" . explode('-', $k['exp'])[0];
                                                        $mfg =  explode('-', $k['mfg'])[2] . "/" . explode('-', $k['mfg'])[1] . "/" . explode('-', $k['mfg'])[0];
                                                    ?>
                                                        <?php if ($k['status'] === "Karantina") { ?>
                                                            <tr>
                                                                <th scope="row"><?= $no++ ?></th>
                                                                <td><?= $tgl ?></td>
                                                                <td><?= $k['no_surat_jalan'] ?></td>
                                                                <td><?= $k['no_batch'] ?></td>
                                                                <td><?= $k['nama_barang'] ?></td>
                                                                <td class="text-right"><?= number_format($k['qty'], 0, ",", ".") ?><?= $k['satuan'] ?></td>
                                                                <td class="text-center"><?= $k['status'] ?></td>
                                                                <td class="text-center">
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <button type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#detail" data-id_pb="<?= $k['id_pb'] ?>" data-no_surat_jalan="<?= $k['no_surat_jalan'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-tgl="<?= $tgl ?>" data-id_barang="<?= $k['nama_barang'] ?>" data-id_supplier="<?= $k['nama_supplier'] ?>" data-op_gudang="<?= $k['op_gudang'] ?>" data-dok_pendukung="<?= $k['dok_pendukung'] ?>" data-qty_pack="<?= $k['qty_pack'] ?>" data-jenis_kemasan="<?= $k['jenis_kemasan'] ?>" data-jml_kemasan="<?= $k['jml_kemasan'] ?>" data-ditolak_kemasan="<?= $k['ditolak_kemasan'] ?>" data-tutup="<?= $k['tutup'] ?>" data-wadah="<?= $k['wadah'] ?>" data-label="<?= $k['label'] ?>" data-qty="<?= $k['qty'] ?>" data-diterima_qty="<?= $k['qty'] ?>" data-ditolak_qty="<?= $k['ditolak_qty'] ?>" data-exp="<?= $exp ?>" data-mfg="<?= $mfg ?>">
                                                                            <i class="feather icon-eye"></i>Details
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <a type="button" class="btn btn-success btn-square text-light btn-sm" onclick="window.open(`<?= base_url() ?>gudang_bahanbaku/karantina/pdf_label_karantina/<?= str_replace('/', '--', $k['no_surat_jalan']) ?>`, 'location=yes,height=700,width=1300,scrollbars=yes,status=yes'); ">
                                                                            <i class="feather icon-file"></i>Print
                                                                        </a>
                                                                    </div>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#edit" data-id_pb="<?= $k['id_pb'] ?>" data-no_surat_jalan="<?= $k['no_surat_jalan'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-tgl="<?= $tgl ?>" data-id_barang="<?= $k['id_barang'] ?>" data-id_supplier="<?= $k['id_supplier'] ?>" data-op_gudang="<?= $k['op_gudang'] ?>" data-dok_pendukung="<?= $k['dok_pendukung'] ?>" data-qty_pack="<?= $k['qty_pack'] ?>" data-jenis_kemasan="<?= $k['jenis_kemasan'] ?>" data-jml_kemasan="<?= $k['jml_kemasan'] ?>" data-ditolak_kemasan="<?= $k['ditolak_kemasan'] ?>" data-tutup="<?= $k['tutup'] ?>" data-wadah="<?= $k['wadah'] ?>" data-label="<?= $k['label'] ?>" data-qty="<?= $k['qty'] ?>" data-diterima_qty="<?= $k['qty'] ?>" data-ditolak_qty="<?= $k['ditolak_qty'] ?>" data-exp="<?= $exp ?>" data-mfg="<?= $mfg ?>">
                                                                            <i class="feather icon-edit-2"></i>Edit
                                                                        </button>
                                                                    </div>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <a href="<?= base_url() ?>gudang_bahanbaku/karantina/delete/<?= $k['id_pb'] ?>" class="btn btn-danger btn-square text-light btn-sm" onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
                                                                        <i class="feather icon-trash-2"></i>Delete
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
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


<!-- Modal -->
<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Barang Karantina</h5>
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
                                <input type="text" class="form-control" id="v-id_barang" name="id_barang" placeholder="Nama Barang" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="id_supplier">Nama Supplier</label>
                                <input type="text" class="form-control" id="v-id_supplier" name="id_supplier" placeholder="Nama Supplier" readonly>
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
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Wadah</label>
                                            <input type="text" class="form-control" id="v-wadah" name="wadah" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Label</label>
                                            <input type="text" class="form-control" id="v-label" name="label" readonly>
                                        </div>
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
                                                        <td style="width: 20%;"><input type="text" class="form-control form-control-sm w-50" id="v-diterima_qty" name="diterima_qty" readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 5%;"><span class="">Di Tolak</span> </td>
                                                        <td style="width: 20%"><input type="text" class="form-control form-control-sm w-50" id="v-ditolak_qty" name="ditolak_qty" readonly></td>
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
            var id_barang_masuk = $(event.relatedTarget).data('id_barang_masuk')
            var no_surat_jalan = $(event.relatedTarget).data('no_surat_jalan')
            var no_batch = $(event.relatedTarget).data('no_batch')
            var tgl = $(event.relatedTarget).data('tgl')
            var id_barang = $(event.relatedTarget).data('id_barang')
            var id_supplier = $(event.relatedTarget).data('id_supplier')
            var op_gudang = $(event.relatedTarget).data('op_gudang')
            var dok_pendukung = $(event.relatedTarget).data('dok_pendukung')
            var qty_pack = $(event.relatedTarget).data('qty_pack')
            var jenis_kemasan = $(event.relatedTarget).data('jenis_kemasan')
            var jml_kemasan = $(event.relatedTarget).data('jml_kemasan')
            var ditolak_kemasan = $(event.relatedTarget).data('ditolak_kemasan')
            var tutup = $(event.relatedTarget).data('tutup')
            var wadah = $(event.relatedTarget).data('wadah')
            var label = $(event.relatedTarget).data('label')
            var qty = $(event.relatedTarget).data('qty')
            var diterima_qty = $(event.relatedTarget).data('qty')
            var ditolak_qty = $(event.relatedTarget).data('ditolak_qty')
            var exp = $(event.relatedTarget).data('exp')
            var mfg = $(event.relatedTarget).data('mfg')

            $(this).find('#v-id_barang_masuk').val(id_barang_masuk)
            $(this).find('#v-no_surat_jalan').val(no_surat_jalan)
            $(this).find('#v-no_batch').val(no_batch)
            $(this).find('#v-tgl').val(tgl)
            $(this).find('#v-id_barang').val(id_barang)
            $(this).find('#v-id_supplier').val(id_supplier)
            $(this).find('#v-op_gudang').val(op_gudang)
            $(this).find('#v-dok_pendukung').val(dok_pendukung)
            $(this).find('#v-qty_pack').val(qty_pack)
            $(this).find('#v-jenis_kemasan').val(jenis_kemasan)
            $(this).find('#v-jml_kemasan').val(jml_kemasan)
            $(this).find('#v-ditolak_kemasan').val(ditolak_kemasan)
            $(this).find('#v-tutup').val(tutup)
            $(this).find('#v-wadah').val(wadah)
            $(this).find('#v-label').val(label)
            $(this).find('#v-qty').val(qty)
            $(this).find('#v-diterima_qty').val(diterima_qty)
            $(this).find('#v-ditolak_qty').val(ditolak_qty)
            $(this).find('#v-exp').val(exp)
            $(this).find('#v-mfg').val(mfg)
        })
    })
</script>

<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Barang Karantina</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url() ?>gudang_bahanbaku/Karantina/update">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="no_batch">No Batch</label>
                                <input type="hidden" id="e_id_pb" name="id_pb">
                                <input type="text" class="form-control" id="e_no_batch" name="no_batch" placeholder="No Batch" maxlength="20" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="no_surat_jalan">No. Po</label>
                                <input type="text" class="form-control" id="e_no_surat_jalan" name="no_surat_jalan" maxlength="20" placeholder="No. Po" aria-describedby="validationServer03Feedback" required>
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
                                <label for="id_barang">Barang</label>
                                    <select class="form-control chosen-select" id="e_id_barang" name="id_barang" required>
                                        <option value="" disabled selected hidden>- Pilih Barang -</option>
                                        <?php
                                            foreach ($res_barang as $b) {
                                            ?>
                                            <option value="<?= $b['id_barang'] ?>">(<?= $b['kode_barang'] ?>) <?= $b['nama_barang'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="id_supplier">Supplier</label>
                                    <select class="form-control chosen-select" id="e_id_supplier" name="id_supplier" required>
                                        <option value="" disabled selected hidden>- Pilih Supplier -</option>
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
                <input type="text" class="form-control" id="e_op_gudang" name="op_gudang" value="<?= $this->session->userdata('op_gudang') ?>" placeholder="OP Gudang" readonly>
              </div>
            </div>
            <div class="col-md-4">
                            <div class="form-group">
                                <label for="dok_pendukung">Dokumen Pendukung</label>
                                <input type="text" class="form-control" id="e_dok_pendukung" name="dok_pendukung" readonly>
                            </div>
                        </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="qty_pack">QTY Pack</label>
                <input type="text" class="form-control" id="e_qty_pack" name="qty_pack" placeholder="QTY Pack" readonly>
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
                        <input type="text" class="form-control" id="e_qty" name="qty" placeholder="Jumlah Bahan" maxlength="15" readonly>
                </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="jml_kemasan">Jumlah Kemasan</label>
                <input type="text" class="form-control" id="e_jml_kemasan" name="jml_kemasan" placeholder="Jumlah Kemasan" onkeypress="return hanyaAngka(event)" maxlength="15" autocomplete="off" readonly>
              </div>
            </div>
            <div class="col-md-12">
                            <div class="form-group">
                                <center><label for="pemeriksaan"><b>Hasil Pemeriksaan Fisik Kemasan</b></label></center>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Tutup</label>
                                            <input type="text" class="form-control" id="e_tutup" name="tutup" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Wadah</label>
                                            <input type="text" class="form-control" id="e_wadah" name="wadah" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Label</label>
                                            <input type="text" class="form-control" id="e_label" name="label" readonly>
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
                                                        <td><input type="text" class="form-control form-control-sm w-25" id="e_ditolak_kemasan" name="ditolak_kemasan" readonly></td>
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
                                                        <td style="width: 20%;"><input type="text" class="form-control form-control-sm w-50" id="e_diterima_qty" name="diterima_qty" readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 5%;"><span class="">Di Tolak</span> </td>
                                                        <td style="width: 20%"><input type="text" class="form-control form-control-sm w-50" id="e_ditolak_qty" name="ditolak_qty" readonly></td>
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
                <input type="text" class="form-control datepicker" id="e_mfg" name="mfg" placeholder="Tanggal Kadaluarsa" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="exp">Exp Date</label>
                <input type="text" class="form-control datepicker" id="e_exp" name="exp" placeholder="Tanggal Kadaluarsa" autocomplete="off" required>
              </div>
            </div>
          </div>
        </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="simpan" class="btn btn-primary" onclick="if (! confirm('Apakah Anda Yakin Untuk Menyimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya')) { return false; }">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#edit').on('show.bs.modal', function(event) {
            var id_pb = $(event.relatedTarget).data('id_pb')
            var no_surat_jalan = $(event.relatedTarget).data('no_surat_jalan')
            var no_batch = $(event.relatedTarget).data('no_batch')
            var tgl = $(event.relatedTarget).data('tgl')
            var id_barang = $(event.relatedTarget).data('id_barang')
            var id_supplier = $(event.relatedTarget).data('id_supplier')
            var op_gudang = $(event.relatedTarget).data('op_gudang')
            var dok_pendukung = $(event.relatedTarget).data('dok_pendukung')
            var qty_pack = $(event.relatedTarget).data('qty_pack')
            var jenis_kemasan = $(event.relatedTarget).data('jenis_kemasan')
            var jml_kemasan = $(event.relatedTarget).data('jml_kemasan')
            var ditolak_kemasan = $(event.relatedTarget).data('ditolak_kemasan')
            var tutup = $(event.relatedTarget).data('tutup')
            var wadah = $(event.relatedTarget).data('wadah')
            var label = $(event.relatedTarget).data('label')
            var qty = $(event.relatedTarget).data('qty')
            var diterima_qty = $(event.relatedTarget).data('qty')
            var ditolak_qty = $(event.relatedTarget).data('ditolak_qty')
            var exp = $(event.relatedTarget).data('exp')
            var mfg = $(event.relatedTarget).data('mfg')

            $(this).find('#e_id_pb').val(id_pb)
            $(this).find('#e_no_surat_jalan').val(no_surat_jalan)
            $(this).find('#e_no_batch').val(no_batch)
            $(this).find('#e_tgl').val(tgl)
            $(this).find('#e_id_barang').val(id_barang)
            $(this).find('#e_id_barang').trigger("chosen:updated")
            $(this).find('#e_id_supplier').val(id_supplier)
            $(this).find('#e_id_supplier').trigger("chosen:updated")
            $(this).find('#e_op_gudang').val(op_gudang)
            $(this).find('#e_dok_pendukung').val(dok_pendukung)
            $(this).find('#e_dok_pendukung').trigger("chosen:updated")
            $(this).find('#e_qty_pack').val(qty_pack)
            $(this).find('#e_jenis_kemasan').val(jenis_kemasan)
            $(this).find('#e_jenis_kemasan').trigger("chosen:updated")
            $(this).find('#e_jml_kemasan').val(jml_kemasan)
            $(this).find('#e_diterima_kemasan').val(jml_kemasan)
            $(this).find('#e_ditolak_kemasan').val(ditolak_kemasan)
            $(this).find('#e_tutup').val(tutup)
            $(this).find('#e_wadah').val(wadah)
            $(this).find('#e_label').val(label)
            $(this).find('#e_qty').val(qty)
            $(this).find('#e_diterima_qty').val(diterima_qty)
            $(this).find('#e_ditolak_qty').val(ditolak_qty)
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
            })
        })
    
</script>