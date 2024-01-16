

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
                                        <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="javascript:">Stock Keeper</a></li>
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
                                            <h5>Data Stock Keeper</h5>
                                            <div class="float-right">
                                              <div class="input-group">
                                                <?php 
                                                  function newDate($date){
                                                    return explode('-', $date)[2]."/".explode('-', $date)[1]."/".explode('-', $date)[0];
                                                  }
                                                ?>
                                                        <input type="text" id="filter_tgl" value="<?=$tgl==null?'':newDate($tgl)?>" class="form-control datepicker" placeholder="Fiter Dari Tanggal" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                        <input type="text" id="filter_tgl2" value="<?=$tgl2==null?'':newDate($tgl2)?>" class="form-control datepicker" placeholder="Fiter Sampai Tanggal" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-secondary" id="lihat" type="button">Lihat</button>
                                                            <button class="btn btn-primary" id="export" type="button">Cetak</button>
                                                            <a href="<?=base_url()?>accounting/stock_keeper" style="width: 40px;" class="btn btn-warning" id="export" type="button"><i class="feather icon-refresh-ccw"></i></a>
                                                        </div>
                                                    </div>
                                        </div>
                                        </div>

                                        <div class="card-block table-border-style">
                                            <div class="table-responsive">
                                                <table class="table datatable table-hover table-striped table-sm">
                                                    <thead>
                                                        <th>No</th>
                                                        <th>Size</th>
                                                        <th>Kode C</th>
                                                        <th>kode B</th>
                                                        <th>Warna C</th>
                                                        <th>Warna B</th>
                                                        <th>Packing</th>
                                                        <th>Batch</th>
                                                        <th>Print</th>
                                                        <th class="text-right">Jumlah</th>
                                                        <th class="text-center">Sak/Los</th>
                                                        <th class="text-center">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    	<?php 
                                                    	foreach($result as $k){ 
                                                    	?>
                                                    	<tr>
                                                        <td><?= $k['no_msk'] ?></td>
                                                        <td><?= $k['size'] ?></td>
                                                        <td><?= $k['kw_cap'] ?></td>
                                                        <td><?= $k['kw_body'] ?></td>
                                                        <td><?= $k['warna_cap'] ?></td>
                                                        <td><?= $k['warna_body'] ?></td>
                                                        <td><?= $k['no_packing'] ?></td>
                                                        <td><?= $k['no_batch'] ?></td>
                                                        <td><?= $k['print'] ?></td>
                                                        <td><?= $k['jumlah'] ?></td>
                                                        <td><?= $k['jenis_pack'] ?></td>
                                                        <td class="text-center">
                                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                                <a href="<?= base_url() ?>accounting/stock_keeper/delete/<?= $k['id_pack'] ?>" class="btn btn-danger btn-square text-light btn-sm" onclick="if (! confirm('Aapakah Anda Yakin')) { return false; }">
                                                                    <i class="feather icon-trash-2"></i>Hapus
                                                                <a>
                                                            </div>
                                                        </td>
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
    

    $('#export').click(function () {
      
      var filter_tgl = $('#filter_tgl').val();
        var filter_tgl2 = $('#filter_tgl2').val();
      if (filter_tgl =='' && filter_tgl2 !='') {
        window.location = "<?=base_url()?>laporan_barang_masuk?alert=warning&msg=dari tanggal belum diisi";
      alert("dari tanggal belum diisi")
      }else if (filter_tgl !='' && filter_tgl2=='') {
        window.location = "<?=base_url()?>laporan_barang_masuk?alert=warning&msg=sampai tanggal belum diisi";
      }else if (filter_tgl =='' && filter_tgl2=='') {
        var url = "<?=base_url()?>accounting/stock_keeper/pdf_laporan_stock_keeper";
        window.open(url, 'pdf_laporan_stock_keeper', 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
      }else{
        var url = "<?=base_url()?>accounting/stock_kepeer/pdf_laporan_stock_keeper/"+filter_tgl.split("/")[2]+"-"+filter_tgl.split("/")[1]+"-"+filter_tgl.split("/")[0]+"/"+filter_tgl2.split("/")[2]+"-"+filter_tgl2.split("/")[1]+"-"+filter_tgl2.split("/")[0];
        window.open(url, 'pdf_laporan_stock_keeper', 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
      }
    })
    
  })
</script>