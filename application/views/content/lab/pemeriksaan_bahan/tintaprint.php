<!-- Modal Uji Tinta Print -->
<div class="modal fade" id="add_ujitp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pemeriksaan Uji Tinta Print</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url() ?>lab/Hasil_pemeriksaan_lab/Hasil_pemeriksaan_tp/add_ujitp">
                <input type="hidden" id="e_id_pb" name="id_pb">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="no_batch">No Batch</label>
                                <input type="text" class="form-control" id="e_no_batch" name="no_batch" placeholder="No Batch" maxlength="20" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="text" class="form-control" id="e_nama_barang" name="nama_barang" readonly>
                                <input type="hidden" class="form-control" id="e_id_barang" name="id_barang" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama_supplier">Nama Supllier</label>
                                <input type="text" class="form-control" id="e_nama_supplier" name="nama_supplier" readonly>
                                <input type="hidden" class="form-control" id="e_id_supplier" name="id_supplier" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama_operator" class="mt-2">Operator Penguji</label><br>
                                <input type="text" class="form-control" id="nama_operator" name="nama_operator" value="<?= $this->session->userdata('nama_operator') ?>" placeholder="Nama Operator" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="no_surat_jalan" class="mt-2">No. Po</label>
                                <input type="text" class="form-control" id="e_no_surat_jalan" name="no_surat_jalan" placeholder="No. Po" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tgl" class="mt-2">Tanggal Pengujian</label><br>
                                <input type="text" class="form-control datepicker" id="tgl_uji" name="tgl_uji" autocomplete="off" placeholder="Tanggal Pengujian" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="no_analis" class="mt-2">No. Analisa</label><br>
                                <input type="text" class="form-control text-uppercase" id="no_analis_tp" name="no_analis" placeholder="No. Analisa" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <center><label for="pemerian"><b>Pemerian</b></label></center>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="pemerian1" class="mt-2">Hasil Pemeriksaan Botol Ke 1 </label><br>
                                            <select class="form-control chosen-select" id="pemerian1" name="pemerian1" required>
                                                <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                                <option value="Sesuai">Sesuai</option>
                                                <option value="Tidak Sesuai">Tidak Sesuai</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="pemerian2" class="mt-2">Hasil Pemeriksaan Botol Ke 2 </label><br>
                                            <select class="form-control chosen-select" id="pemerian2" name="pemerian2" required>
                                                <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                                <option value="Sesuai">Sesuai</option>
                                                <option value="Tidak Sesuai">Tidak Sesuai</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="pemerian3" class="mt-2">Hasil Pemeriksaan Botol Ke 3 </label><br>
                                            <select class="form-control chosen-select" id="pemerian3" name="pemerian3" required>
                                                <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                                <option value="Sesuai">Sesuai</option>
                                                <option value="Tidak Sesuai">Tidak Sesuai</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="pemerian4" class="mt-2">Hasil Pemeriksaan Botol Ke 4 </label><br>
                                            <select class="form-control chosen-select" id="pemerian4" name="pemerian4" required>
                                                <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                                <option value="Sesuai">Sesuai</option>
                                                <option value="Tidak Sesuai">Tidak Sesuai</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <center><label for="b_bruto"><b>Berat Bruto (gram)</b></label></center>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="b_bruto1" class="mt-2">Hasil Pemeriksaan Botol Ke 1 </label><br>
                                            <input type="text" class="form-control" id="b_bruto1" name="b_bruto1" autocomplete="off" placeholder="Berat Bruto 1">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="b_bruto2" class="mt-2">Hasil Pemeriksaan Botol Ke 2 </label><br>
                                            <input type="text" class="form-control" id="b_bruto2" name="b_bruto2" autocomplete="off" placeholder="Berat Bruto 2">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="b_bruto3" class="mt-2">Hasil Pemeriksaan Botol Ke 3 </label><br>
                                            <input type="text" class="form-control" id="b_bruto3" name="b_bruto3" autocomplete="off" placeholder="Berat Bruto 3">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="b_bruto4" class="mt-2">Hasil Pemeriksaan Botol Ke 4 </label><br>
                                            <input type="text" class="form-control" id="b_bruto4" name="b_bruto4" autocomplete="off" placeholder="Berat Bruto 4">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <center><label for="kekentalan"><b>Kekentalan (cPs)</b></label></center>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kekentalan1" class="mt-2">Hasil Pemeriksaan Botol Ke 1 </label><br>
                                            <input type="text" class="form-control" id="kekentalan1" name="kekentalan1" autocomplete="off" placeholder="Kekentalan 1">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kekentalan2" class="mt-2">Hasil Pemeriksaan Botol Ke 2 </label><br>
                                            <input type="text" class="form-control" id="kekentalan2" name="kekentalan2" autocomplete="off" placeholder="Kekentalan 2">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kekentalan3" class="mt-2">Hasil Pemeriksaan Botol Ke 3 </label><br>
                                            <input type="text" class="form-control" id="kekentalan3" name="kekentalan3" autocomplete="off" placeholder="Kekentalan 3">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kekentalan4" class="mt-2">Hasil Pemeriksaan Botol Ke 4 </label><br>
                                            <input type="text" class="form-control" id="kekentalan4" name="kekentalan4" autocomplete="off" placeholder="Kekentalan 4">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <center><label for="waktu_p"><b>Waktu Pengeringan</b></label></center>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="waktu_p1" class="mt-2">Hasil Pemeriksaan Botol Ke 1 </label><br>
                                            <input type="text" class="form-control" id="waktu_p1" name="waktu_p1" autocomplete="off" placeholder="Waktu Pengeringan 1">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="waktu_p2" class="mt-2">Hasil Pemeriksaan Botol Ke 2 </label><br>
                                            <input type="text" class="form-control" id="waktu_p2" name="waktu_p2" autocomplete="off" placeholder="Waktu Pengeringan 2">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="waktu_p3" class="mt-2">Hasil Pemeriksaan Botol Ke 3 </label><br>
                                            <input type="text" class="form-control" id="waktu_p3" name="waktu_p3" autocomplete="off" placeholder="Waktu Pengeringan 3">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="waktu_p4" class="mt-2">Hasil Pemeriksaan Botol Ke 4 </label><br>
                                            <input type="text" class="form-control" id="waktu_p4" name="waktu_p4" autocomplete="off" placeholder="Waktu Pengeringan 4">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <center><label for="kondisi_sp"><b>Kondisi Suhu Pemeriksaan</b></label></center>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kondisi_sp1" class="mt-2">Hasil Pemeriksaan Botol Ke 1 </label><br>
                                            <input type="text" class="form-control" id="kondisi_sp1" name="kondisi_sp1" autocomplete="off" placeholder="Kondisi Suhu Pemeriksaan 1">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kondisi_sp2" class="mt-2">Hasil Pemeriksaan Botol Ke 2 </label><br>
                                            <input type="text" class="form-control" id="kondisi_sp2" name="kondisi_sp2" autocomplete="off" placeholder="Kondisi Suhu Pemeriksaan 2">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kondisi_sp3" class="mt-2">Hasil Pemeriksaan Botol Ke 3 </label><br>
                                            <input type="text" class="form-control" id="kondisi_sp3" name="kondisi_sp3" autocomplete="off" placeholder="Kondisi Suhu Pemeriksaan 3">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kondisi_sp4" class="mt-2">Hasil Pemeriksaan Botol Ke 4 </label><br>
                                            <input type="text" class="form-control" id="kondisi_sp4" name="kondisi_sp4" autocomplete="off" placeholder="Kondisi Suhu Pemeriksaan 4">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <center><label for="kondisi_py"><b>Kondisi Penyimpanan</b></label></center>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kondisi_py1" class="mt-2">Hasil Pemeriksaan Botol Ke 1 </label><br>
                                            <select class="form-control chosen-select" id="kondisi_py1" name="kondisi_py1" required>
                                                <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                                <option value="Sesuai">Sesuai</option>
                                                <option value="Tidak Sesuai">Tidak Sesuai</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kondisi_py2" class="mt-2">Hasil Pemeriksaan Botol Ke 2 </label><br>
                                            <select class="form-control chosen-select" id="kondisi_py2" name="kondisi_py2" required>
                                                <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                                <option value="Sesuai">Sesuai</option>
                                                <option value="Tidak Sesuai">Tidak Sesuai</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kondisi_py3" class="mt-2">Hasil Pemeriksaan Botol Ke 3 </label><br>
                                            <select class="form-control chosen-select" id="kondisi_py3" name="kondisi_py3" required>
                                                <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                                <option value="Sesuai">Sesuai</option>
                                                <option value="Tidak Sesuai">Tidak Sesuai</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kondisi_py4" class="mt-2">Hasil Pemeriksaan Botol Ke 4 </label><br>
                                            <select class="form-control chosen-select" id="kondisi_py4" name="kondisi_py4" required>
                                                <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                                <option value="Sesuai">Sesuai</option>
                                                <option value="Tidak Sesuai">Tidak Sesuai</option>
                                            </select>
                                        </div>
                                    </div>
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

<!-- Script Uji Tinta Print -->
<script type="text/javascript">
    $(document).ready(function() {
        $("#no_surat_jalan").keyup(function() {
            var no_surat_jalan = $("#no_surat_jalan").val();
            jQuery.ajax({
                url: "<?= base_url() ?>gudang_bahanbaku/barang_masuk/cek_surat_jalan",
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
    })

    $(document).ready(function() {
        $('#add_ujitp').on('show.bs.modal', function(event) {
            var id_pb = $(event.relatedTarget).data('id_pb')
            var id_barang = $(event.relatedTarget).data('id_barang')
            var id_supplier = $(event.relatedTarget).data('id_supplier')
            var no_surat_jalan = $(event.relatedTarget).data('no_surat_jalan')
            var no_batch = $(event.relatedTarget).data('no_batch')
            var tgl = $(event.relatedTarget).data('tgl')
            var nama_barang = $(event.relatedTarget).data('nama_barang')
            var nama_supplier = $(event.relatedTarget).data('nama_supplier')
            var op_gudang = $(event.relatedTarget).data('op_gudang')
            var dok_pendukung = $(event.relatedTarget).data('dok_pendukung')
            var jenis_kemasan = $(event.relatedTarget).data('jenis_kemasan')
            var jml_kemasan = $(event.relatedTarget).data('jml_kemasan')
            var tutup = $(event.relatedTarget).data('tutup')
            var wadah = $(event.relatedTarget).data('wadah')
            var label = $(event.relatedTarget).data('label')
            var qty = $(event.relatedTarget).data('qty')
            var exp = $(event.relatedTarget).data('exp')
            var mfg = $(event.relatedTarget).data('mfg')

            $(this).find('#e_id_pb').val(id_pb)
            $(this).find('#e_id_barang').val(id_barang)
            $(this).find('#e_id_supplier').val(id_supplier)
            $(this).find('#e_no_surat_jalan').val(no_surat_jalan)
            $(this).find('#e_no_batch').val(no_batch)
            $(this).find('#e_tgl').val(tgl)
            $(this).find('#e_nama_barang').val(nama_barang)
            $(this).find('#e_nama_supplier').val(nama_supplier)
            $(this).find('#e_op_gudang').val(op_gudang)
            $(this).find('#e_dok_pendukung').val(dok_pendukung)
            $(this).find('#e_jenis_kemasan').val(jenis_kemasan)
            $(this).find('#e_jml_kemasan').val(jml_kemasan)
            $(this).find('#e_tutup').val(tutup)
            $(this).find('#e_wadah').val(wadah)
            $(this).find('#e_label').val(label)
            $(this).find('#e_qty').val(qty)
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
            $(this).find('#tgl_uji').datepicker().on('show.bs.modal', function(event) {
                event.stopImmediatePropagation();
            });

            uppercase('#no_analis_tp');
        })
    })
</script>