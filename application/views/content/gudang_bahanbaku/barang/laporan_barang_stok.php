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
                                    <!-- <h5 class="m-b-10">Laporan Stok Barang</h5> -->
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="javascript:">Laporan</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:">Stok Barang</a></li>
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
                                        <h5>Laporan Stok Barang</h5>
                                        <div class="float-right">
                                            <div class="input-group">
                                                <?php
                                                function newDate($date)
                                                {
                                                    return explode('-', $date)[2] . "/" . explode('-', $date)[1] . "/" . explode('-', $date)[0];
                                                }
                                                ?>
                                                <input type="text" id="filter_tgl" value="<?= $tgl == null ? '' : newDate($tgl) ?>" class="form-control datepicker" autocomplete="off" placeholder="Fiter Tanggal Disini" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary" id="lihat" type="button">Lihat</button>
                                                    <button class="btn btn-primary" id="export" type="button">Cetak</button>
                                                    <a href="<?= base_url() ?>gudang_bahanbaku/laporan_barang_stok" style="width: 40px;" class="btn btn-warning" id="export" type="button"><i class="feather icon-refresh-ccw"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">
                                            <table class="table datatable table-bordered table-hover table-striped table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Kode</th>
                                                        <th>Nama</th>
                                                        <th>Masuk</th>
                                                        <th>Keluar</th>
                                                        <th>Stok</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($result as $k) {
                                                        $keluar = $k['qty'] - $k['stok'];
                                                        $qty = $k['qty'];
                                                        $stok = $k['stok'];
                                                    ?>
                                                        <tr>
                                                            <th scope="row"><?= $no++ ?></th>
                                                            <td><?= $k['kode_barang'] ?></td>
                                                            <td><?= $k['nama_barang'] ?></td>
                                                            <td><?= isset($qty) ? $qty : 0; ?><?= $k['satuan'] ?></td>
                                                            <td><?= $keluar ?><?= $k['satuan'] ?></td>
                                                            <td><?= isset($stok) ? $stok : 0; ?><?= $k['satuan'] ?></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
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
        $('#lihat').click(function() {
            var filter_tgl = $('#filter_tgl').val();
            var newFilter = filter_tgl.split("/")[2] + "-" + filter_tgl.split("/")[1] + "-" + filter_tgl.split("/")[0];
            if (filter_tgl == '') {
                window.location = "<?= base_url() ?>gudang_bahanbaku/Laporan_barang_stok";
            } else {
                window.location = "<?= base_url() ?>gudang_bahanbaku/Laporan_barang_stok/index/" + newFilter;
            }
        })
        $('#export').click(function() {
            var filter_tgl = $('#filter_tgl').val();
            var newFilter = filter_tgl.split("/")[2] + "-" + filter_tgl.split("/")[1] + "-" + filter_tgl.split("/")[0];
            if (filter_tgl == '') {
                // window.location = "<?= base_url() ?>laporan_barang_stok/pdf_laporan_barang_stok";
                var url = "<?= base_url() ?>gudang_bahanbaku/Laporan_barang_stok/pdf_laporan_barang_stok";
                window.open(url, 'pdf_laporan_barang_stok', 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
            } else {
                var url = "<?= base_url() ?>gudang_bahanbaku/Laporan_barang_stok/pdf_laporan_barang_stok/" + newFilter;
                window.open(url, 'pdf_laporan_barang_stok', 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
            }
        })

    })
</script>