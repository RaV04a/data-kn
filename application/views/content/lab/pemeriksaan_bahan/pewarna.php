<!-- Modal Uji Pewarna -->
<div class="modal fade" id="add_ujipw" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pemeriksaan Uji Pewarna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url() ?>lab/Hasil_pemeriksaan_lab/Hasil_pemeriksaan_pw/add_ujipw">
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
                                <input type="text" class="form-control text-uppercase" id="no_analis_pw" name="no_analis" placeholder="No. Analisa" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pemerian" class="mt-2">Pemerian</label>
                                <select class="form-control chosen-select" id="pemerian" name="pemerian" required>
                                    <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                    <option value="Sesuai">Sesuai</option>
                                    <option value="Tidak Sesuai">Tidak Sesuai</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kelarutan" class="mt-2">Kelarutan</label>
                                <select class="form-control chosen-select" id="kelarutan" name="kelarutan" required>
                                    <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                    <option value="Sesuai">Sesuai</option>
                                    <option value="Tidak Sesuai">Tidak Sesuai</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <center><label for="pemeriksaan" class="mt-4"><b>Identifikasi</b></label></center>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="ident_air" class="mt-2">50 mg + 100 ml air</label><br>
                                            <div class="mt-4">
                                                <select class="form-control chosen-select" id="ident_air" name="ident_air" required>
                                                    <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                                    <option value="Sesuai">Sesuai</option>
                                                    <option value="Tidak Sesuai">Tidak Sesuai</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="ident_hcip" class="mt-2">5 ml larutan zat (1:1000) + 1ml HCI P</label><br>
                                            <select class="form-control chosen-select" id="ident_hcip" name="ident_hcip" required>
                                                <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                                <option value="Sesuai">Sesuai</option>
                                                <option value="Tidak Sesuai">Tidak Sesuai</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="ident_naohp" class="mt-2">5 ml larutan zat (1:1000) + 1ml NAOH P</label><br>
                                            <select class="form-control chosen-select" id="ident_naohp" name="ident_naohp" required>
                                                <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                                <option value="Sesuai">Sesuai</option>
                                                <option value="Tidak Sesuai">Tidak Sesuai</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="ident_h2so4p" class="mt-2">0,1 gr zat + 10 ml H2SO4 P (larutan a)</label><br>
                                            <select class="form-control chosen-select" id="ident_h2so4p" name="ident_h2so4p" required>
                                                <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                                <option value="Sesuai">Sesuai</option>
                                                <option value="Tidak Sesuai">Tidak Sesuai</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="ident_t_larutan" class="mt-2">5 ml air + 1 tetes larutan (a)</label><br>
                                            <div class="mt-4">
                                                <select class="form-control chosen-select" id="ident_t_larutan" name="ident_t_larutan" required>
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
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="s_pengeringan" class="mt-4">Susut Pengeringan</label>
                                <input type="text" class="form-control text-uppercase" id="s_pengeringan_pw" name="s_pengeringan" placeholder="Susut Pengeringan" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="p_kadar" class="mt-4">Penetapan Kadar</label>
                                <input type="text" class="form-control text-uppercase" id="p_kadar" name="p_kadar" placeholder="Penetapan Kadar" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kesamaan_std" class="mt-4">Kesamaan terhadap Standar</label>
                                <select class="form-control chosen-select" id="kesamaan_std" name="kesamaan_std" required>
                                    <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                    <option value="Sesuai">Sesuai</option>
                                    <option value="Tidak Sesuai">Tidak Sesuai</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kondisi_py">Kondisi Penyimpanan</label>
                                <select class="form-control chosen-select" id="kondisi_py" name="kondisi_py" required>
                                    <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                    <option value="Sesuai">Sesuai</option>
                                    <option value="Tidak Sesuai">Tidak Sesuai</option>
                                </select>
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

<!-- Script Uji Pewarna -->
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
        $('#add_ujipw').on('show.bs.modal', function(event) {
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

            uppercase('#no_analis_pw');
            uppercase('#s_pengeringan_pw');
            uppercase('#p_kadar');
            checkKoma('#s_pengeringan_pw');
            checkKoma('#p_kadar');
        })
    })
</script>