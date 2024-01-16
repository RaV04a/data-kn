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
                  <li class="breadcrumb-item"><a href="javascript:">Packing</a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Kelola Barang</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('packing/packing_masuk') ?>">Packing Masuk</a></li>
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
                            <form action="<?= base_url() ?>packing/packing_masuk/add_sk" method="post">
                                <center><label for="pemeriksaan" class="font-weight-bold">Keterangan Packing</label></center>
                                    <center><table class="mt-2"></center>
                                    
                                    <?php

                                    foreach ($result as $k) {
                        
                                    ?>
                                    <tr>
                                        <td class="px-1 py-2">
                                            No
                                        </td>
                                        <td class="px-3">
                                            <input type="text" class="form-control form-control-sm" id="no_msk" value="<?= $k['no_msk'];?>" name="no_msk" maxlength="20" readonly>
                                        </td>
                                        <td class="px-1 py-2">
                                            Size
                                        </td>
                                        <td class="px-4">
                                            <input type="text" class="form-control form-control-sm" id="size" value="<?= $k['size'];?>"name="size" maxlength="20" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-1 py-2">
                                            Kode Warna Cap
                                        </td>
                                        <td class="px-3">
                                            <input type="text" class="form-control form-control-sm" id="kw_cap" value="<?= $k['kw_cap'];?>" name="kw_cap" maxlength="20" readonly>
                                        </td>
                                        <td class="px-1 py-2">
                                            Kode Warna Body
                                        </td>
                                        <td class="px-4">
                                            <input type="text" class="form-control form-control-sm" id="kw_body" value="<?= $k['kw_body'];?>" name="kw_body" maxlength="20" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-1 py-2">
                                            Warna Cap
                                        </td>
                                        <td class="px-3">
                                            <input type="text" class="form-control form-control-sm" id="warna_cap" value="<?= $k['warna_cap'];?>" name="warna_cap" maxlength="20" readonly>
                                        </td>
                                        <td class="px-1 py-2">
                                            Warna Body
                                        </td>
                                        <td class="px-4">
                                            <input type="text" class="form-control form-control-sm" id="warna_body" value="<?= $k['warna_body'];?>" name="warna_body" maxlength="20" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-1 py-2">
                                            No Packing
                                    </td>
                                    <td class="px-3">
                                        <input type="text" class="form-control form-control-sm" id="no_packing" value="<?= $k['no_packing'];?>" name="no_pack" maxlength="20" readonly>
                                    </td>
                                    <td class="px-1 py-2">
                                        No Batch
                                    </td>
                                    <td class="px-4">
                                        <input type="text" class="form-control form-control-sm" id="no_batch" value="<?= $k['no_batch'];?>" name="no_batch" maxlength="20" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-1 py-2">
                                        Print
                                    </td>
                                    <td class="px-3">
                                        <input type="text" class="form-control form-control-sm" id="print" value="<?= $k['print'];?>" name="print" maxlength="20" readonly>
                                    </td>
                                    <td class="px-1 py-2">
                                        Jumlah
                                    </td>
                                    <td class="px-4">
                                        <input type="text" class="form-control form-control-sm" id="jumlah" value="<?= $k['jumlah'];?>" name="jumlah" maxlength="20" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-1 py-2">
                                        Sak/Los
                                    </td>
                                    <td class="px-3">
                                        <input type="text" class="form-control form-control-sm" id="jenis_pack" value="<?= $k['jenis_pack'];?>" name="jenis_pack" maxlength="20" readonly>
                                    </td>
                                    <td class="px-1 py-2">
                                    
                                    </td>
                                    <td class="px-4">
                                        <input type="hidden" class="form-control form-control-sm" id="id_pack" value="<?= $k['id_pack'];?>" name="id_pack" maxlength="20" readonly>
                                    </td>
                                    
                                </tr>
                                </table>
                                <?php if ($k['status_sk'] === "blm_sk") {?>
                    <center><label for="pemeriksaan" class="font-weight-bold mt-1">Status Stock Keeper</label></center>
                        <center><div class="row"></center>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="tahun_sk">Tahun Stock Keeper</label>
                                                <select class="form-control chosen-select" id="tahun_sk" name="tahun_sk" required>
                                                    <option value="" disabled selected hidden>- Pilih Tahun Stock Keeper -</option>
                                                    <option value="2023">2023</option>
                                                    <option value="2024">2024</option>
                                                    <option value="2025">2025</option>
                                                    <option value="2026">2026</option>
                                                    <option value="2027">2027</option>
                                                    <option value="2028">2028</option>
                                                    <option value="2029">2029</option>
                                                    <option value="2030">2030</option>
                                                </select>
                                        </div>
                                    </div>
                                    <?php } ?>
                                <div class="mb-3">
                                    <?php if ($k['status_sk'] === "blm_sk") {?>
                                    <button type="submit" id="simpan" class="btn btn-success" onclick="if (! confirm('Apakah Anda Yakin Untuk Menyimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Tanggalnya')) { return false; }">Simpan</button>
                                </div>
                                <?php } ?>
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>