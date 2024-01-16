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
                                    <!-- <h5 class="m-b-10">Data Supplier</h5> -->
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="javascript:">Marketing</a></li>
                                    <li class="breadcrumb-item"><a href="<?= base_url('purchasing/Supplier') ?>">supplier</a></li>
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
                                        <h5>Data supplier</h5>

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#add">
                                            <i class="feather icon-user-plus"></i>Tambah supplier
                                        </button>
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
                                                        <th>Kode supplier</th>
                                                        <th>Nama supplier</th>
                                                        <th>Negara</th>
                                                        <th>Alamat</th>
                                                        <th class="text-center">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $level = $this->session->userdata('level');
                                                    $no = 1;
                                                    foreach ($result as $k) {
                                                    ?>
                                                        <tr>
                                                            <th scope="row"><?= $no++ ?></th>
                                                            <td><?= $k['kode_supplier'] ?></td>
                                                            <td><?= $k['nama_supplier'] ?></td>
                                                            <td><?= $k['negara'] ?></td>
                                                            <td><?= $k['alamat'] ?></td>
                                                            <td class="text-center">
                                                                <?php if ($level === "admin") { ?>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <button type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#edit" data-id_supplier="<?= $k['id_supplier'] ?>" data-kode_supplier="<?= $k['kode_supplier'] ?>" data-nama_supplier="<?= $k['nama_supplier'] ?>" data-negara="<?= $k['negara'] ?>" data-alamat="<?= $k['alamat'] ?>">
                                                                            <i class="feather icon-edit-2"></i>Edit
                                                                        </button>
                                                                    </div>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <a type="button" class="btn btn-danger btn-square text-light btn-sm" href="<?= base_url() ?>purchasing/supplier/delete/<?= $k['id_supplier'] ?>" onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
                                                                            <i class="feather icon-trash-2"></i>Hapus
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

<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url() ?>purchasing/supplier/add">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="kode">Kode supplier</label>
                        <input type="text" class="form-control text-uppercase" id="kode_supplier" name="kode_supplier" autocomplete="off" placeholder="Kode supplier" aria-describedby="validationServer03Feedback" required>
                        <div id="validationServer03Feedback" class="invalid-feedback">
                        Maaf Kode supplier sudah ada.
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama supplier</label>
                        <input type="text" class="form-control text-uppercase" id="nama_supplier" name="nama_supplier" autocomplete="off" placeholder="Nama supplier" required>
                    </div>
                    <div class="form-group">
                        <label for="negara">Negara</label>
                        <input type="text" class="form-control text-uppercase" id="negara" name="negara" autocomplete="off" placeholder="Negara supplier" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control text-uppercase" id="alamat" name="alamat" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        uppercase('#kode_supplier');
        uppercase('#nama_supplier');
        uppercase('#negara');
        uppercase('#alamat');
    })

    $("#kode_supplier").keyup(function(){
      var kode_supplier =  $("#kode_supplier").val();
      jQuery.ajax({
        url: "<?=base_url()?>supplier/cek_kode_supplier",
        dataType:'text',
        type: "post",
        data:{kode_supplier:kode_supplier},
        success:function(response){
          if (response =="true") {
            $("#kode_supplier").addClass("is-invalid");
            $("#simpan").attr("disabled","disabled");
          }else{
            $("#kode_supplier").removeClass("is-invalid");
            $("#simpan").removeAttr("disabled");
          }
        }            
      });
    })
</script>

<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url() ?>purchasing/supplier/update">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kode">Kode supplier</label>
                        <input type="hidden" id="e_id_supplier" name="id_supplier">
                        <input type="text" class="form-control text-uppercase" id="e_kode_supplier" name="kode_supplier" autocomplete="off" placeholder="Kode supplier" required>
                    <div class="form-group">
                        <label for="nama">Nama supplier</label>
                        <input type="text" class="form-control text-uppercase" id="e_nama_supplier" name="nama_supplier" autocomplete="off" placeholder="Nama supplier" required>
                    </div>
                    <div class="form-group">
                        <label for="negara">Negara</label>
                        <input type="text" class="form-control text-uppercase" id="e_negara" name="negara" autocomplete="off" placeholder="Negara supplier" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control text-uppercase" id="e_alamat" name="alamat" autocomplete="off" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#edit').on('show.bs.modal', function(event) {
            var id_supplier = $(event.relatedTarget).data('id_supplier')
            var kode_supplier = $(event.relatedTarget).data('kode_supplier')
            var nama_supplier = $(event.relatedTarget).data('nama_supplier')
            var negara = $(event.relatedTarget).data('negara')
            var alamat = $(event.relatedTarget).data('alamat')

            $(this).find('#e_id_supplier').val(id_supplier)
            $(this).find('#e_kode_supplier').val(kode_supplier)
            $(this).find('#e_nama_supplier').val(nama_supplier)
            $(this).find('#e_negara').val(negara)
            $(this).find('#e_alamat').val(alamat)

            uppercase('#e_kode_supplier');
            uppercase('#e_nama_supplier');
            uppercase('#e_negara');
            uppercase('#e_alamat');
        })
    })
</script>