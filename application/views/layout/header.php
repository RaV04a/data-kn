<?php
$notif = $this->M_barang_masuk->get()->result_array();
?>
<!-- [ Header ] start -->
<header class="navbar pcoded-header navbar-expand-lg navbar-light">
    <div class="m-header">
        <a class="mobile-menu" id="mobile-collapse1" href="javascript:"><span></span></a>
        <a href="index.html" class="b-brand">
            <div class="b-bg">
                <i class="feather icon-trending-up"></i>
            </div>
            <span class="b-title">Data Table</span>
        </a>
    </div>
    <a class="mobile-menu" id="mobile-header" href="javascript:">
        <i class="feather icon-more-horizontal"></i>
    </a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li><a href="javascript:" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i></a></li>
            <!-- <li class="nav-item dropdown">
                    <a class="dropdown-toggle" href="javascript:" data-toggle="dropdown">Dropdown</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="javascript:">Action</a></li>
                        <li><a class="dropdown-item" href="javascript:">Another action</a></li>
                        <li><a class="dropdown-item" href="javascript:">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <div class="main-search">
                        <div class="input-group">
                            <input type="text" id="m-search" class="form-control" placeholder="Search . . .">
                            <a href="javascript:" class="input-group-append search-close">
                                <i class="feather icon-x input-group-text"></i>
                            </a>
                            <span class="input-group-append search-btn btn btn-primary">
                                <i class="feather icon-search input-group-text"></i>
                            </span>
                        </div>
                    </div>
                </li> -->
        </ul>
        <ul class="navbar-nav ml-auto">
            <li>
                <div class="dropdown">
                    <a class="dropdown-toggle" href="javascript:" data-toggle="dropdown"><i class="icon feather icon-bell"></i></a>
                    <div class="dropdown-menu dropdown-menu-right notification">
                        <div class="noti-head">
                            <h6 class="d-inline-block m-b-0">Notifications</h6>
                            <div class="float-right">
                                <a href="javascript:" class="m-r-10">Mark As Read</a>
                                <a href="javascript:">Clear All</a>
                            </div>
                        </div>
                        <ul class="noti-body">
                            <li class="n-title">
                                <p class="m-b-0">NEW</p>
                            </li>
                            <li class="notification">
                                <div class="media">
                                    <img class="img-radius" src="assets/images/user/avatar-1.jpg" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <?php foreach ($notif as $k) {
                                            $waktu = $k['created_at'];
                                            $waktu_baru = explode(" ", $waktu);
                                            if ($k['status'] === "Proses") {
                                        ?>
                                                <p><strong><?= $k['op_gudang'] ?></strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>30 min</span></p>
                                                <p>New ticket Added</p>
                                        <?php }
                                        } ?>
                                    </div>
                                </div>
                            </li>
                            <li class="n-title">
                                <p class="m-b-0">EARLIER</p>
                            </li>
                            <li class="notification">
                                <div class="media">
                                    <img class="img-radius" src="assets/images/user/avatar-2.jpg" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <p><strong>Joseph William</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>30 min</span></p>
                                        <p>Prchace New Theme and make payment</p>
                                    </div>
                                </div>
                            </li>
                            <li class="notification">
                                <div class="media">
                                    <img class="img-radius" src="assets/images/user/avatar-3.jpg" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <p><strong>Sara Soudein</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>30 min</span></p>
                                        <p>currently login</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="noti-footer">
                            <a href="javascript:">show all</a>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="dropdown drp-user">
                    <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon feather icon-settings"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            <?php $nama = $this->session->userdata('nama_operator');
                            $level = $this->session->userdata('level') ?>
                            <?php if ($level === "lab") { ?>
                                <img src="<?= base_url('assets/images/user/avatar-1.jpg') ?>" class="img-radius" alt="User-Profile-Image">
                            <?php }
                            if ($level === "gudang") { ?>
                                <img src="<?= base_url('assets/images/user/avatar-4.jpg') ?>" class="img-radius" alt="User-Profile-Image">
                            <?php }
                            if ($level === "marketing") { ?>
                                <img src="<?= base_url('assets/images/user/avatar-5.jpg') ?>" class="img-radius" alt="User-Profile-Image">
                            <?php }
                            if ($level === "melting") { ?>
                                <img src="<?= base_url('assets/images/user/avatar-2.jpg') ?>" class="img-radius" alt="User-Profile-Image">
                            <?php }
                            if ($level === "utility") { ?>
                                <img src="<?= base_url('assets/images/user/avatar-3.jpg') ?>" class="img-radius" alt="User-Profile-Image">
                            <?php } ?>
                            <span><?= $nama; ?></span>
                            <a href="<?= base_url('auth/signout') ?>" class="dud-logout" title="Logout">
                                <i class="feather icon-log-out"></i>
                            </a>
                        </div>
                        <ul class="pro-body">
                        
                            <li><a href="javascript:" data-toggle="modal" data-target="#profil" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>
<!-- [ Header ] end -->

<!-- Modal -->
<div class="modal fade" id="profil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url() ?>users/update_sendiri">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama</label>
                        <input type="hidden" id="e_id_user" name="id_user" value="<?= $this->session->userdata('id_user') ?>">
                        <input type="text" class="form-control" id="e_nama" name="nama" value="<?= $this->session->userdata('nama_operator') ?>" maxlength="100" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Username</label>
                        <input type="text" class="form-control" id="e_username" name="username" value="<?= $this->session->userdata('username') ?>" placeholder="Username" maxlength="100" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Level</label>
                        <input type="text" class="form-control" id="e_level" name="level" value="<?= $this->session->userdata('level') ?>" placeholder="Level" maxlength="100" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Jabatan</label>
                        <input type="text" class="form-control" id="e_jabatan" name="jabatan" value="<?= $this->session->userdata('jabatan') ?>" placeholder="Jabatan" maxlength="100" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Alamat</label>
                        <textarea class="form-control" id="e_alamat" name="alamat" rows="3" readonly><?= $this->session->userdata('alamat') ?> </textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#profil').on('show.bs.modal', function(event) {
            var level = "<?= $this->session->userdata('level') ?>"
            $(this).find('#e_level').val(level)
        })
    })
</script>
<!-- Modal -->
<div class="modal fade" id="ganti_password" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url() ?>users/ganti_password">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Password Baru</label>
                        <input type="text" class="form-control" id="" name="password_baru" placeholder="Password Baru anda disini" maxlength="100" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Ulang Password Baru</label>
                        <input type="text" class="form-control" id="" name="ulang_password_baru" placeholder="Ulang Password Baru anda disini" maxlength="100" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Password Lama</label>
                        <input type="hidden" id="" name="id_user" value="<?= $this->session->userdata('id_user') ?>">
                        <input type="hidden" id="" name="username" value="<?= $this->session->userdata('username') ?>">
                        <input type="password" class="form-control" id="e_nama" name="password" placeholder="Masukan password lama anda" maxlength="100" required>
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