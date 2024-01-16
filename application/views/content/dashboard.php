<!--[ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- [ breadcrumb ] start -->

                <!-- [ breadcrumb ] end -->
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ Main Content ] start -->
                        <div class="row">
                            <!--[social-media section] start-->
                            <div class="col-md-12 col-xl-4">
                                <div class="card card-social">
                                    <div class="card-block border-bottom">
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-auto">
                                                <i class="fas fa-box text-success f-36"></i>
                                            </div>
                                            <div class="col text-right">
                                                <h3><?= $tot_barang_masuk ?> Batch</h3>
                                                <h5 class="text-c-green mb-0">Total Barang Masuk <span class="text-muted">Hari ini</span></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-xl-4">
                                <div class="card card-social">
                                    <div class="card-block border-bottom">
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-auto">
                                                <i class="fas fa-file text-primary f-36"></i>
                                            </div>
                                            <div class="col text-right">
                                                <h3><?= $tot_transfer_slip ?> Transfer Slip</h3>
                                                <h5 class="text-c-green mb-0 pl-3">Total Transfer Slip <span class="text-muted">Hari ini</span></h5>
                                                <!-- <h5 class="text-c-green mb-0">Total Transfer Slip <span class="text-muted">Hari ini </span></h5> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-xl-4">
                                <div class="card card-social">
                                    <div class="card-block border-bottom">
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-auto">
                                                <i class="fas fa-box-open text-danger f-36"></i>
                                            </div>
                                            <div class="col text-right">
                                                <h3><?= $tot_permintaan_barang ?> Batch</h3>
                                                <h5 class="text-c-green mb-0">Total Barang Keluar <span class="text-muted">Hari ini </span></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-xl-4">
                                <div class="row">
                                    <div class="col-md-6 col-xl-12">
                                        <div class="card daily-sales">
                                            <div class="card-block">
                                                <h6 class="mb-4">Total Surat Jalan</h6>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-9">
                                                        <h3 class="f-w-300 d-flex align-items-center m-b-0"><i class="fas fa-file text-primary f-36 m-r-10 "></i><?= $tot_barang_masuk ?></h3>
                                                    </div>

                                                    <div class="col-3 text-right">
                                                        <p class="m-b-0">Surat Jalan</p>
                                                    </div>
                                                </div>
                                                <!-- <div class="progress m-t-30" style="height: 7px;">
                                                        <div class="progress-bar progress-c-theme" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-12">
                                        <div class="card daily-sales">
                                            <div class="card-block">
                                                <h6 class="mb-4">Total Barang</h6>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-9">
                                                        <h3 class="f-w-300 d-flex align-items-center m-b-0"><i class="feather icon-box text-c-yellow f-30 m-r-10"></i><?= $tot_barang ?></h3>
                                                    </div>

                                                    <div class="col-3 text-right" style="padding-right: 1%;">
                                                        <p class="m-b-0">Barang</p>
                                                    </div>
                                                </div>
                                                <!-- <div class="progress m-t-30" style="height: 7px;">
                                                        <div class="progress-bar progress-c-theme" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-12">
                                        <div class="card daily-sales">
                                            <div class="card-block">
                                                <h6 class="mb-4">Total Supplier</h6>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-9">
                                                        <h3 class="f-w-300 d-flex align-items-center m-b-0"><i class="feather icon-download text-c-green f-30 m-r-10"></i><?= $tot_supplier ?></h3>
                                                    </div>

                                                    <div class="col-3 text-right" style="padding-right: 1%;">
                                                        <p class="m-b-0">Supplier</p>
                                                    </div>
                                                </div>
                                                <!-- <div class="progress m-t-30" style="height: 7px;">
                                                        <div class="progress-bar progress-c-theme" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-xl-8">
                                <div class="row">
                                    <!--[ Recent Users ] start-->
                                    <?php if ($this->session->userdata('level') == 'admin') { ?>
                                        <div class="col-xl-12 col-md-12">
                                            <div class="card Recent-Users">
                                                <div class="card-header">
                                                    <h5>Users</h5>
                                                </div>
                                                <div class="card-block px-0 py-3">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover">
                                                            <tbody>
                                                                <?php
                                                                foreach ($users as $key) {
                                                                    if ($key['level'] === 'admin') {
                                                                        $level = '<a href="#!" class="label theme-bg text-white f-12">Admin</a>';
                                                                        // $o = 'green';
                                                                    }
                                                                    if ($key['level'] === 'lab') {
                                                                        $level = '<a href="#!" class="label theme-bg2 text-white f-12">Lab</a>';
                                                                        // $o = 'blue';
                                                                    }
                                                                    if ($key['level'] === 'gudang') {
                                                                        $level = '<a href="#!" class="label theme-bg2 text-white f-12">Gudang</a>';
                                                                        // $o = 'blue';
                                                                    }
                                                                ?>
                                                                    <tr class="unread">
                                                                        <td><img class="rounded-circle" style="width:40px;" src="assets/images/user/avatar-1.jpg" alt="activity-user"></td>
                                                                        <td>
                                                                            <h6 class="mb-1"><?= $key['nama_operator'] ?></h6>
                                                                            <p class="m-0">Username : <?= $key['username'] ?></p>
                                                                        </td>
                                                                        <td>
                                                                            <h6 class="text-muted"></i><?= $key['alamat'] ?></h6>
                                                                        </td>
                                                                        <td><?= $key['level'] ?></td>
                                                                    </tr>
                                                                <?php
                                                                }
                                                                ?>
                                                            <?php
                                                        }
                                                            ?>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--[ Recent Users ] end-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end