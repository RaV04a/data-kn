<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kapsulindo Nusantara</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Datta Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, datta able, datta able bootstrap admin template, free admin theme, free dashboard template"/>
    <meta name="author" content="CodedThemes"/>

    <!-- Favicon icon -->
    <link rel="icon" href="<?=base_url('assets/images/icon.ico')?>" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="<?=base_url()?>assets/fonts/fontawesome/css/fontawesome-all.min.css">
    <!-- animation css -->
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/animation/css/animate.min.css">
    <!-- vendor css -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/style.css">
    <!-- toastr -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/toastr/toastr.min.css">

</head>

<body>
    <div class="auth-wrapper">
        <div class="auth-content">
            <div class="auth-bg">
                <span class="r"></span>
                <span class="r s"></span>
                <span class="r s"></span>
                <span class="r"></span>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-4">
                        <i class="feather icon-unlock auth-icon"></i>
                    </div>
                    <h3 class="mb-4">Login</h3>
                    <form method="POST" action="<?=base_url()?>auth/psignin">
                        <div class="input-group mb-3">
                            <input type="text" name="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="input-group mb-4">
                            <input type="password" id="password" name="password" class="form-control" placeholder="password">
                              <div class="input-group-append">

                                <!-- kita pasang onclick untuk merubah icon buka/tutup mata setiap diklik  -->
                                  <span id="mybutton" onclick="change()" class="input-group-text">

                                <!-- icon mata bawaan bootstrap  -->
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                        <path fill-rule="evenodd"
                                        d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                    </svg>
                                  </span>
                              </div>
                        </div>
                        <!-- <div class="form-group text-left">
                            <div class="checkbox checkbox-fill d-inline">
                                <input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-a1" checked="">
                                <label for="checkbox-fill-a1" class="cr"> Save Details</label>
                            </div>
                        </div> -->
                        <button type="submit" class="btn btn-primary shadow-2 mb-4">Login</button>
                        <!-- <p class="mb-2 text-muted">Forgot password? <a href="auth-reset-password.html">Reset</a></p>
                        <p class="mb-0 text-muted">Don’t have an account? <a href="auth-signup.html">Signup</a></p> -->
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Required Js -->
<script src="<?=base_url()?>assets/js/vendor-all.min.js"></script>
	<script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/toastr/toastr.min.js"></script>
<script type="text/javascript">
    function setLocation(curLoc){
      try {
        history.pushState(null, null, curLoc);
        return false;
      } catch(e) {}
      location.hash = '#' + curLoc;
    }
    $(document).ready(function(){  
      toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }
      <?php
      if (empty($_GET['msg'])) {
        $msg = "";
      }else{
        $msg = $_GET['msg'];
      }
      ?>

      var msg = "<?=$msg?>";
      var alert = "<?=@$_GET['alert']?>";
      if (msg !="") {
        Command: toastr[alert](msg);
        setLocation($(location).attr('href').split("?")[0]);
      }else{
        setLocation($(location).attr('href').split("?")[0]);
      } 
    });
  </script>

<script>
            // membuat fungsi change
            function change() {
    
                // membuat variabel berisi tipe input dari id='pass', id='pass' adalah form input password 
                var x = document.getElementById('password').type;
    
                //membuat if kondisi, jika tipe x adalah password maka jalankan perintah di bawahnya
                if (x == 'password') {
    
                    //ubah form input password menjadi text
                    document.getElementById('password').type = 'text';
                    
                    //ubah icon mata terbuka menjadi tertutup
                    document.getElementById('mybutton').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-slash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M10.79 12.912l-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                                                    <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708l-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829z"/>
                                                                    <path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z"/>
                                                                    </svg>`;
                }
                else {
    
                    //ubah form input password menjadi text
                    document.getElementById('password').type = 'password';
    
                    //ubah icon mata terbuka menjadi tertutup
                    document.getElementById('mybutton').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                                    <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                                    </svg>`;
                }
            }
        </script>

</body>
</html>
