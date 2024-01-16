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
                                    <li class="breadcrumb-item"><a href="javascript:">Gudang Bahan Baku</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:">Laporan</a></li>
                                    <li class="breadcrumb-item"><a href="<?= base_url('gudang_bahanbaku/Laporan_barang_keluar') ?>">Barang Keluar</a></li>
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
                                        <h5>Laporan Barang Keluar</h5>
                                        <div class="float-right">
                                            <div class="input-group">
                                                <select class="form-control chosen-select" id="filter_barang" name="filter_barang">
                                                    <option value="" disabled selected hidden>- Nama Barang -</option>
                                                    <?php
                                                    // $barang = [];
                                                    // foreach ($fil_barang as $nm) {
                                                    //     $nama_barang = $nm['nama_barang'];
                                                    //     if (!in_array($nama_barang, $barang)) {
                                                    //         array_push($barang, $nama_barang);
                                                    //     }
                                                    // }
                                                    foreach ($res_keluar as $hsl_barang) {
                                                    ?>
                                                        <!-- <option <?= $name === $hsl_barang ? 'selected' : '' ?> value="<?= $hsl_barang ?>"><?= $hsl_barang ?></option> -->
                                                        <option <?= $name === $hsl_barang['nama_barang'] ? 'selected' : '' ?> value="<?= $hsl_barang['nama_barang'] ?>"><?= $hsl_barang['nama_barang'] ?></option>
                                                    <?php } ?>
                                                </select>
                                                <input type="text" id="filter_tgl" value="<?= $tgl == null ? '' : $tgl ?>" class="form-control datepicker" placeholder="Fiter Dari Tanggal" autocomplete="off" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                <input type="text" id="filter_tgl2" value="<?= $tgl2 == null ? '' : $tgl2 ?>" class="form-control datepicker" placeholder="Fiter Sampai Tanggal" autocomplete="off" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                <div class="btn-group">
                                                    <button class="btn btn-secondary" id="lihat" type="button">Lihat</button>
                                                </div>
                                                <div class="btn-group">
                                                    <button class="btn btn-primary" id="export" type="button">Cetak</button>
                                                </div>
                                                <div class="btn-group">
                                                    <a href="<?= base_url() ?>gudang_bahanbaku/Laporan_barang_keluar" style="width: 40px;" class="btn btn-warning" id="export" type="button"><i class="feather icon-refresh-ccw"></i></a>
                                                </div>
                                            </div>
                                        </div> <br> <br>
                                    </div>
                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">
                                            <table class="table datatable table-bordered table-hover table-striped table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Tanggal</th>
                                                        <th>No. Po</th>
                                                        <th>No Batch</th>
                                                        <th>Nama Barang</th>
                                                        <th>Qty</th>
                                                        <th class="text-center">Details</th>
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
                                                            <td><?= $k['no_surat_jalan'] ?></td>
                                                            <td><?= $k['no_batch'] ?></td>
                                                            <td><?= $k['nama_barang'] ?></td>
                                                            <td><?= ($k['qty']) ?><?= $k['satuan'] ?></td>
                                                            <td class="text-center">
                                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                                    <button type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#detail" data-id_barang="<?= $k['id_barang'] ?>" data-id_supplier="<?= $k['id_supplier'] ?>" data-id_barang_masuk="<?= $k['id_barang_masuk'] ?>" data-no_surat_jalan="<?= $k['no_surat_jalan'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-tgl="<?= $tgl ?>" data-op_gudang="<?= $k['op_gudang'] ?>" data-dok_pendukung="<?= $k['dok_pendukung'] ?>" data-jenis_kemasan="<?= $k['jenis_kemasan'] ?>" data-jml_kemasan="<?= $k['jml_kemasan'] ?>" data-ditolak_kemasan="<?= $k['ditolak_kemasan'] ?>" data-tutup="<?= $k['tutup'] ?>" data-wadah="<?= $k['wadah'] ?>" data-label="<?= $k['label'] ?>" data-qty="<?= $k['qty'] ?>" data-qty_pack="<?= $k['qty_pack'] ?>" data-diterima_qty="<?= $k['qty'] ?>" data-ditolak_qty="<?= $k['ditolak_qty'] ?>" data-exp="<?= $exp ?>" data-mfg="<?= $mfg ?>">
                                                                        <i class="feather icon-eye"></i>Details
                                                                    </button>
                                                                </div>
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

<script type="text/javascript">
    $(document).ready(function() {
        $('#lihat').click(function() {

            var filter_nama = $('#filter_barang').find(':selected').val();
            var filter_tgl = $('#filter_tgl').val();
            var filter_tgl2 = $('#filter_tgl2').val();

            var newFilterTgl = filter_tgl.split("/")[2] + "-" + filter_tgl.split("/")[1] + "-" + filter_tgl.split("/")[0];
            var newFilterTgl2 = filter_tgl2.split("/")[2] + "-" + filter_tgl2.split("/")[1] + "-" + filter_tgl2.split("/")[0];

            if (filter_tgl == '' && filter_tgl2 != '') {
                window.location = "<?= base_url() ?>gudang_bahanbaku/Laporan_barang_keluar?alert=warning&msg=dari tanggal belum diisi";
                alert("dari tanggal belum diisi")
            } else if (filter_tgl != '' && filter_tgl2 == '') {
                window.location = "<?= base_url() ?>gudang_bahanbaku/Laporan_barang_keluar?alert=warning&msg=sampai tanggal belum diisi";
            } else if (filter_tgl == '' && filter_tgl2 == '') {
                window.location = "<?= base_url() ?>gudang_bahanbaku/Laporan_barang_keluar?alert=warning&msg=form periode harus diisi";
            } else {
                const query = new URLSearchParams({
                    name: filter_nama,
                    date_from: filter_tgl,
                    date_until: filter_tgl2
                })
                window.location = "<?= base_url() ?>gudang_bahanbaku/Laporan_barang_keluar/index?" + query.toString()

            }
        })
        $('#export').click(function() {

            var filter_nama = $('#filter_barang').find(':selected').val();
            var filter_tgl = $('#filter_tgl').val();
            var filter_tgl2 = $('#filter_tgl2').val();

            var newFilterTgl = filter_tgl.split("/")[2] + "-" + filter_tgl.split("/")[1] + "-" + filter_tgl.split("/")[0];
            var newFilterTgl2 = filter_tgl2.split("/")[2] + "-" + filter_tgl2.split("/")[1] + "-" + filter_tgl2.split("/")[0];

            if (filter_tgl == '' && filter_tgl2 != '') {
                window.location = "<?= base_url() ?>gudang_bahanbaku/Laporan_barang_keluar?alert=warning&msg=dari tanggal belum diisi";
                alert("dari tanggal belum diisi")
            } else if (filter_tgl != '' && filter_tgl2 == '') {
                window.location = "<?= base_url() ?>gudang_bahanbaku/Laporan_barang_keluar?alert=warning&msg=sampai tanggal belum diisi";
            } else if (filter_tgl == '' && filter_tgl2 == '') {
                var url = "<?= base_url() ?>gudang_bahanbaku/Laporan_barang_keluar/pdf_laporan_barang_keluar";
                window.open(url, 'pdf_laporan_barang_keluar', 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
            } else {
                const query = new URLSearchParams({
                    name: filter_nama,
                    date_from: filter_tgl,
                    date_until: filter_tgl2
                })
                var url = "<?= base_url() ?>gudang_bahanbaku/Laporan_barang_keluar/pdf_laporan_barang_keluar?" + query.toString();
                window.open(url, 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
            }
        })
    })
</script>