<!-- Pengujian Uji Gel -->
<div class="modal fade" id="add_ujigel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pemeriksaan Uji Gelatin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url() ?>lab/Hasil_pemeriksaan_lab/Hasil_pemeriksaan_gel/add_ujigel">
                <input type="hidden" id="e_id_pb" name="id_pb">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="no_batch" class="mt-4">No Batch</label>
                                <input type="text" class="form-control" id="e_no_batch" name="no_batch" maxlength="20" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama_barang" class="mt-4">Nama Barang</label>
                                <input type="text" class="form-control" id="e_nama_barang" name="nama_barang" readonly>
                                <input type="hidden" class="form-control" id="e_id_barang" name="id_barang" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama_supplier" class="mt-4">Nama Supllier</label>
                                <input type="text" class="form-control" id="e_nama_supplier" name="nama_supplier" readonly>
                                <input type="hidden" class="form-control" id="e_id_supplier" name="id_supplier" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama_operator" class="mt-4">Operator Penguji</label><br>
                                <input type="text" class="form-control" id="nama_operator" name="nama_operator" value="<?= $this->session->userdata('nama_operator') ?>" placeholder="Nama Operator" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="no_surat_jalan" class="mt-4">No. Po</label><br>
                                <input type="text" class="form-control" id="e_no_surat_jalan" name="no_surat_jalan" placeholder="No. Po" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tgl" class="mt-4">Tanggal Pengujian</label><br>
                                <input type="text" class="form-control datepicker" id="tgl_uji" name="tgl_uji" placeholder="Tanggal Pengujian" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="no_analis" class="mt-4">No. Analisa</label><br>
                                <input type="text" class="form-control text-uppercase" id="no_analis_gel" name="no_analis" placeholder="No. Analisa" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pemerian" class="mt-4">Pemerian</label>
                                <select class="form-control chosen-select" id="pemerian" name="pemerian" required>
                                    <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                    <option value="Sesuai">Sesuai</option>
                                    <option value="Tidak Sesuai">Tidak Sesuai</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kelarutan" class="mt-4">Kelarutan</label>
                                <select class="form-control chosen-select" id="kelarutan" name="kelarutan" required>
                                    <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                    <option value="Sesuai">Sesuai</option>
                                    <option value="Tidak Sesuai">Tidak Sesuai</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="identifikasi" class="mt-4">Identifikasi</label>
                                <div class="mt-4">
                                    <select class="form-control chosen-select" id="identifikasi" name="identifikasi" required>
                                        <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                        <option value="Sesuai">Sesuai</option>
                                        <option value="Tidak Sesuai">Tidak Sesuai</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="bauzat_tl_air" class="mt-4">Bau dan Zat Tak Larut dalam Air</label>
                                <div class="mt-4">
                                    <select class="form-control chosen-select" id="bauzat_tl_air" name="bauzat_tl_air" required>
                                        <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                        <option value="Sesuai">Sesuai</option>
                                        <option value="Tidak Sesuai">Tidak Sesuai</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="trans_larutan" class="mt-4">Transmittance Larutan 1% pada 510nm</label>
                                <input type="number" class="form-control" id="trans_larutan" name="trans_larutan" autocomplete="off" placeholder="%" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="s_pengeringan" class="mt-4">Susut Pengeringan</label>
                                <input type="number" class="form-control" id="s_pengeringan_gel" name="s_pengeringan" autocomplete="off" placeholder="%" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="bloom_st" class="mt-4">Bloom Strength</label>
                                <input type="number" class="form-control" id="bloom_st" name="bloom_st" autocomplete="off" placeholder="g" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="viscost" class="mt-4">Viscositas 30%</label>
                                <input type="number" class="form-control" id="viscost" name="viscost" autocomplete="off" placeholder="cPs" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="viscost_bd" class="mt-4">Viscositas Breakdown</label>
                                <input type="number" class="form-control" id="viscost_bd" name="viscost_bd" autocomplete="off" placeholder="%" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ph" class="mt-4">pH</label>
                                <input type="number" class="form-control" id="ph_gel" name="ph" autocomplete="off" placeholder="pH" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="t_isl" class="mt-4">Titik Isoelektrik</label>
                                <input type="number" class="form-control" id="t_isl" name="t_isl" autocomplete="off" placeholder="pH" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="sett_point" class="mt-4">Setting Point</label>
                                <input type="number" class="form-control" id="sett_point" name="sett_point" autocomplete="off" placeholder="°C" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="keasaman" class="mt-4">Keasaman</label><br>
                                <input type="number" class="form-control" id="keasaman" name="keasaman" autocomplete="off" placeholder="%" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="sulfur_do" class="mt-4">Sulfur Dioksida</label><br>
                                <input type="number" class="form-control" id="sulfur_do" name="sulfur_do" autocomplete="off" placeholder="ppm" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="sisa_pmj" class="mt-4">Sisa Pemijaran</label><br>
                                <input type="number" class="form-control" id="sisa_pmj" name="sisa_pmj" autocomplete="off" placeholder="%" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="uk_part_mesh4" class="mt-4">Ukuran Partikel Mesh 4</label><br>
                                <input type="number" class="form-control" id="uk_part_mesh4" name="uk_part_mesh4" autocomplete="off" placeholder="%" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="uk_part_mesh40" class="mt-4">Ukuran Partikel Mesh 40</label><br>
                                <input type="number" class="form-control" id="uk_part_mesh40" name="uk_part_mesh40" autocomplete="off" placeholder="%" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kndtv" class="mt-4">Konduktivitas</label><br>
                                <input type="number" class="form-control" id="kndtv" name="kndtv" autocomplete="off" placeholder="mS.cm 1" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="arsen" class="mt-4">Arsen (As) *)</label><br>
                                <select class="form-control chosen-select" id="arsen" name="arsen" required>
                                    <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                    <option value="Sesuai">Sesuai</option>
                                    <option value="Tidak Sesuai">Tidak Sesuai</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="timbal" class="mt-4">Timbal (Pb) *)</label><br>
                                <select class="form-control chosen-select" id="timbal" name="timbal" required>
                                    <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                    <option value="Sesuai">Sesuai</option>
                                    <option value="Tidak Sesuai">Tidak Sesuai</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="peroksida" class="mt-4">Peroksida *)</label><br>
                                <select class="form-control chosen-select" id="peroksida" name="peroksida" required>
                                    <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                    <option value="Sesuai">Sesuai</option>
                                    <option value="Tidak Sesuai">Tidak Sesuai</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="besi" class="mt-4">Besi *)</label><br>
                                <select class="form-control chosen-select" id="besi" name="besi" required>
                                    <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                    <option value="Sesuai">Sesuai</option>
                                    <option value="Tidak Sesuai">Tidak Sesuai</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cromium" class="mt-4">Cromium *)</label><br>
                                <select class="form-control chosen-select" id="cromium" name="cromium" required>
                                    <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                    <option value="Sesuai">Sesuai</option>
                                    <option value="Tidak Sesuai">Tidak Sesuai</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="zinc" class="mt-4">Zinc *)</label><br>
                                <select class="form-control chosen-select" id="zinc" name="zinc" required>
                                    <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                    <option value="Sesuai">Sesuai</option>
                                    <option value="Tidak Sesuai">Tidak Sesuai</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cm_dna_babi" class="mt-4">Cemaran DNA Babi/Porcine *)</label><br>
                                <select class="form-control chosen-select" id="cm_dna_babi" name="cm_dna_babi" required>
                                    <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                    <option value="Negatif">Negatif</option>
                                    <option value="Positif">Positif</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="m_tb" class="mt-4">Mikrobiologi (Total Bakteri)</label><br>
                                <input type="number" class="form-control" id="m_tb" name="m_tb" autocomplete="off" placeholder="cfu/g" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="m_akk" class="mt-4">Mikrobiologi (Angka Kapang dan Khamir)</label><br>
                                <input type="number" class="form-control" id="m_akk" name="m_akk" autocomplete="off" placeholder="cfu/g" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="m_ec" class="mt-4">Mikrobiologi (Escherrichia coli)</label><br>
                                <div class="mt-4">
                                    <select class="form-control chosen-select" id="m_ec" name="m_ec" required>
                                        <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                        <option value="Negatif">Negatif</option>
                                        <option value="Positif">Positif</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="m_salmon" class="mt-4">Mikrobiologi (Salmonella)</label><br>
                                <div class="mt-4">
                                    <select class="form-control chosen-select mt-4" id="m_salmon" name="m_salmon" required>
                                        <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                        <option value="Negatif">Negatif</option>
                                        <option value="Positif">Positif</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="wd_py" class="mt-4">Wadah dan Penyimpanan</label><br>
                                <select class="form-control chosen-select" id="wd_py" name="wd_py" required>
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

<!-- Script Uji Gel -->
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
        $('#add_ujigel').on('show.bs.modal', function(event) {
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

            uppercase('#no_analis_gel');
            checkKoma('#trans_larutan');
            checkKoma('#s_pengeringan_gel');
            checkKoma('#viscost_bd');
            checkKoma('#ph_gel');
            checkKoma('#t_isl');
            checkKoma('#keasaman');
            checkKoma('#sulfur_do');
            checkKoma('#sisa_pmj');
            checkKoma('#uk_part_mesh40');
            checkKoma('#kndtv');
        })
    })
</script>