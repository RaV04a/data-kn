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
                  <!-- <h5 class="m-b-10">Stok Barang</h5> -->
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Gudang Bahan Baku</a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Kelola Barang</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('Barang_stok') ?>">Stok Barang</a></li>
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
                    <h5>Stok Barang</h5>
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
                            <th>Kode</th>
                            <th>Nama</th>
                            <th class="text-center">Masuk</th>
                            <th class="text-center">Keluar</th>
                            <th class="text-center">Stok</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $no = 1;
                          foreach ($result as $k) {
                          ?>
                            <tr>
                              <th scope="row"><?= $no++ ?></th>
                              <td><?= $k['kode_barang'] ?></td>
                              <td><?= $k['nama_barang'] ?></td>
                              <td class="text-center"><?= $k['qty'] ?><?= $k['satuan'] ?></td>
                              <td class="text-center"><?= $k['tot_permintaan_barang'] ?><?= $k['satuan'] ?></td>
                              <td class="text-center"><?= $k['sisa'] ?><?= $k['satuan'] ?></td>
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


<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>barang/update">
        <div class="modal-body">
          <div class="form-group">
            <label for="exampleFormControlInput1">Kode</label>
            <input type="hidden" id="e_id_barang" name="id_barang">
            <input type="text" class="form-control" id="e_kode" name="kode" placeholder="Kode Barang" maxlength="20">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Nama</label>
            <input type="text" class="form-control" id="e_nama" name="nama" placeholder="Nama Barang" maxlength="100">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Satuan</label>
            <select class="form-control chosen-select" id="e_satuan" name="satuan" required>
              <option value="">- Satuan -</option>
              <option value="Gram">Gram</option>
            </select>
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
      var id_barang = $(event.relatedTarget).data('id_barang')
      var kode = $(event.relatedTarget).data('kode')
      var nama = $(event.relatedTarget).data('nama')
      var satuan = $(event.relatedTarget).data('satuan')

      $(this).find('#e_id_barang').val(id_barang)
      $(this).find('#e_kode').val(kode)
      $(this).find('#e_nama').val(nama)
      $(this).find('#e_satuan').val(satuan)
    })

  })
</script>










<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="exampleFormControlInput1">Text</label>
            <input type="text" class="form-control datepicker" id="" placeholder="text">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Email address</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Example select</label>
            <select class="form-control chosen-select" id="exampleFormControlSelect1">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="1">1</option>
              <option value="2">2</option>

              <option value="1">1</option>
              <option value="2">2</option>
              <option value="1">1</option>
              <option value="2">2</option>

            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect2">Example multiple select</label>
            <select multiple class="form-control" id="exampleFormControlSelect2">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Example textarea</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>