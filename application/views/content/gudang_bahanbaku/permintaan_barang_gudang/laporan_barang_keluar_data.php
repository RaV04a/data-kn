

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
                                        <!-- <h5 class="m-b-10">Data Barang Keluar</h5> -->
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="javascript:">Barang Keluar</a></li>
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
                                            <h5>Data Barang Keluar</h5>
                                            <div class="float-right">
                                              <div class="input-group">
                                                <?php 
                                                  function newDate($date){
                                                    return explode('-', $date)[2]."/".explode('-', $date)[1]."/".explode('-', $date)[0];
                                                  }
                                                ?>
                                                        <input type="text" id="filter_tgl" value="<?=$tgl==null?'':newDate($tgl)?>" class="form-control datepicker" placeholder="Fiter Tanggal Disini" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                        <input type="text" id="filter_tgl2" value="<?=$tgl2==null?'':newDate($tgl2)?>" class="form-control datepicker" placeholder="Fiter Sampai Tanggal" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-secondary" id="lihat" type="button">Lihat</button>
                                                            <button class="btn btn-primary" id="export" type="button">Cetak</button>
                                                            <a href="<?=base_url()?>laporan_barang_keluar" style="width: 40px;" class="btn btn-warning" id="export" type="button"><i class="feather icon-refresh-ccw"></i></a>
                                                        </div>
                                                    </div>
                                            </div>
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
                                                            <th>No Batch</th>
                                                            <th>Nama Barang</th>
                                                            <th>Nama Operator</th>
                                                            <th>No transfer Surat/th>
                                                            <th>Qty</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    	<?php 
                                                    	$no=1;
                                                    	foreach($result as $k){ 
                                                        $tgl =  explode('-', $k['tgl'])[2]."/".explode('-', $k['tgl'])[1]."/".explode('-', $k['tgl'])[0];
                                                        $exp =  explode('-', $k['exp'])[2]."/".explode('-', $k['exp'])[1]."/".explode('-', $k['exp'])[0];
                                                                
                                                    	?>
                                                    	<tr>
                                                            <th scope="row"><?=$no++?></th>
                                                            <td><?=$tgl?></td>
                                                            <td><?=$k['no_batch']?></td>
                                                            <td><?=$k['nama_barang']?></td>
                                                            <td><?=$k['nama_operator']?></td>
                                                            <td><?=$k['no_transfer_slip']?></td>
                                                            <td style="text-align: right;"><?=number_format($k['qty'],0,",",".")?><?=$k['satuan']?></td>
                                                            <!-- <td class="text-right">
                                                              <div class="btn-group" role="group" aria-label="Basic example">
                                                                <button type="button" 
                                                                  class="btn btn-info btn-square btn-sm" 
                                                                  data-toggle="modal" 
                                                                  data-target="#view" 

                                                                  data-no_transfer_slip="<?=$k['no_transfer_slip']?>";
                                                                  data-l-no_transfer_slip="<?=urlencode($k['no_transfer_slip'])?>"
                                                                  data-tgl="<?=$tgl?>"
                                                                  data-nama_operator="<?=$k['nama_operator']?>"
                                                                  data-exp="<?=$exp?>"
                                                                  data-note="<?=$k['note']?>"

                                                                >
                                                                  <i class="feather icon-eye"></i>Detail
                                                                </button>
                                                                <a  
                                                                  href="<?=base_url()?>barang_masuk/delete/<?=$k['id_barang_masuk']?>" 
                                                                  class="btn btn-danger btn-square text-light btn-sm" 
                                                                  onclick = "if (! confirm('Apakah Anda Yakin?')) { return false; }"
                                                                >
                                                                  <i class="feather icon-trash-2"></i>hapus
                                                                </a> 
                                                              </div>
                                                            </td>-->
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
    $('#lihat').click(function () {
      var filter_tgl = $('#filter_tgl').val();
      var filter_tgl2 = $('#filter_tgl2').val();
      if (filter_tgl =='' && filter_tgl2 !='') {
        window.location = "<?=base_url()?>laporan_barang_keluar?alert=warning&msg=dari tanggal belum diisi";
      alert("dari tanggal belum diisi")
      }else if (filter_tgl !='' && filter_tgl2=='') {
        window.location = "<?=base_url()?>laporan_barang_keluar?alert=warning&msg=sampai tanggal belum diisi";
      }else if (filter_tgl =='' && filter_tgl2=='') {
        window.location = "<?=base_url()?>laporan_barang_keluar?alert=warning&msg=form periode harus diisi";
      }else{
        var newFilterTgl = filter_tgl.split("/")[2]+"-"+filter_tgl.split("/")[1]+"-"+filter_tgl.split("/")[0];
        var newFilterTgl2 = filter_tgl2.split("/")[2]+"-"+filter_tgl2.split("/")[1]+"-"+filter_tgl2.split("/")[0];

        window.location = "<?=base_url()?>laporan_barang_keluar/index/"+newFilterTgl+"/"+newFilterTgl2;
      }
    })
    $('#export').click(function () {
      var filter_tgl = $('#filter_tgl').val();
      var filter_tgl2 = $('#filter_tgl2').val();
     if (filter_tgl =='' && filter_tgl2 !='') {
        window.location = "<?=base_url()?>laporan_barang_keluar?alert=warning&msg=dari tanggal belum diisi";
      alert("dari tanggal belum diisi")
      }else if (filter_tgl !='' && filter_tgl2=='') {
        window.location = "<?=base_url()?>laporan_barang_keluar?alert=warning&msg=sampai tanggal belum diisi";
      }else if (filter_tgl =='' && filter_tgl2=='') {
        var url = "<?=base_url()?>laporan_barang_keluar/pdf_laporan_barang_keluar";
        window.open(url, 'pdf_laporan_barang_keluar', 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
      }else{
        var url = "<?=base_url()?>laporan_barang_keluar/pdf_laporan_barang_keluar/"+filter_tgl.split("/")[2]+"-"+filter_tgl.split("/")[1]+"-"+filter_tgl.split("/")[0]+"/"+filter_tgl2.split("/")[2]+"-"+filter_tgl2.split("/")[1]+"-"+filter_tgl2.split("/")[0];
        window.open(url, 'pdf_laporan_barang_keluar', 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
      }
    })
    
  })
</script>


<!-- Modal -->
<div class="modal fade" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Barang Masuk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?=base_url()?>barang_masuk/update">
        <input type="hidden" id="e_id_barang_masuk" name="id_barang_masuk">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="v-no_transfer_slip">No Transfer Slip/label>
              <input type="text" class="form-control" id="v-no_transfer_slip" name="v-no_transfer_slip" placeholder="No Transfer Surat" maxlength="20" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="tgl">Tanggal Keluar</label>
              <input type="text" class="form-control" id="v-tgl" name="tgl"  placeholder="Tanggal Keluar" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="v-nama_operator">Nama Operator</label>
              <input type="text" class="form-control" id="v-nama_operator" name="v-nama_operator" placeholder="Nama Operator" maxlength="20" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="tgl">Tanggal Kadaluarsa</label>
              <input type="text" class="form-control" id="v-exp" name="exp"  placeholder="Tanggal Kadaluarsa" readonly>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="v-note">Keterangan</label>
              <textarea class="form-control" id="v-note" name="note" rows="3" readonly></textarea>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered table-sm">
            <thead>
              <tr>
                <th>No Batch</th><th>Nama Barang</th><th>Nama Supplier</th><th class="text-right">Qty</th>
              </tr>
            </thead>
            <tbody id="v-barang_keluar">
            </tbody>
          </table>
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

<script type="text/javascript">
$(document).ready(function() {
    $('#view').on('show.bs.modal', function (event) {
  var no_transfer_slip = $(event.relatedTarget).data('no_transfer_slip')
  var l_no_transfer_slip = $(event.relatedTarget).data('l-no_transfer_slip')
  var tgl = $(event.relatedTarget).data('tgl') 
  var nama_operator = $(event.relatedTarget).data('nama_operator') 
  var exp = $(event.relatedTarget).data('exp') 
  var note = $(event.relatedTarget).data('note')  



  $(this).find('#v-no_transfer_slip').val(no_transfer_slip)
  $(this).find('#v-tgl').val(tgl)
  $(this).find('#v-nama_operator').val(nama_operator)
  $(this).find('#v-exp').val(exp)
  $(this).find('#v-note').val(note)
    jQuery.ajax({
        url: "<?=base_url()?>barang_keluar/data_barang_keluar",
        dataType:'json',
        type: "post",
        data:{no_transfer_slip:no_transfer_slip},
        success:function(response){
          var data = response;
          // alert(JSON.stringify(data))
          var $id = $('#v-barang_keluar');
          $id.empty();
          // $id.append('<option value=0>- Pilih Prioritas Kegiatan -</option>');
          for (var i = 0; i < data.length; i++) {
            $id.append(`
              <tr>
                <td>`+data[i].no_batch+`</td>
                <td>`+data[i].nama_barang+`</td>
                <td>`+data[i].nama_supplier+`</td>
                <td class="text-right">`+data[i].qty+data[i].satuan+`</td>
              </tr>
            `);
          }        
        }            
      });
  // $(this).find('#e_tgl').datepicker().on('show.bs.modal', function(event) {
  //   // prevent datepicker from firing bootstrap modal "show.bs.modal"
  //   event.stopPropagation();
  // });
})

})

</script>




