<?php
if (empty($this->session->userdata('nama_operator'))) {
    header('location:' . base_url('auth/signin') . '?alert=info&msg=Anda belum login');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kapsulindo Nusantara</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Free Datta Able Admin Template come up with latest Bootstrap 4 framework with basic components, form elements and lots of pre-made layout options" />
    <meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, datta able, datta able bootstrap admin template, free admin theme, free dashboard template" />
    <meta name="author" content="CodedThemes" />

    <!-- Favicon icon -->
    <link rel="icon" href="<?= base_url('assets/images/icon.ico') ?>" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/fonts/fontawesome/css/fontawesome-all.min.css">
    <!-- animation css -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/animation/css/animate.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/bs-datepicker/css/bootstrap-datepicker.min.css">
    <!-- vendor css -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
    <!-- <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/chosen/docsupport/style.css"> -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/chosen/docsupport/prism.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/chosen/component-chosen.css">

    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css"/> -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.6.0/dt-1.11.3/datatables.min.css"/> -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/bootstrap/css/twitter-bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatable/css/dataTables.bootstrap4.min.css">

    <!-- toastr -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/toastr/toastr.min.css">
    <!-- toastify -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/toastify/toastify.css">
    <!-- timepicker -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/bs-timepicker/css/bootstrap-timepicker.min.css">
    <!-- datetimepicker -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/bs-datetimepicker/css/bootstrap-datetimepicker.min.css">


    <style type="text/css">
        /*body {
            padding: 20px !important;
        }*/

        /*.datepicker, .table-condensed {
            width: 400px;
            margin: 10px;
        }*/
        .table-condensed {
            /*width: 400px;*/
            margin: 10px;
        }

        .table-condensed td {
            padding: 10px !important;
        }

        ::-webkit-input-placeholder {
            text-transform: initial;
        }
    </style>
    <script src="<?= base_url() ?>assets/plugins/jQuery-3.6.0/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body style="background-color: #F0F8FF;">

    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <?php $this->load->view('layout/left_sidebar'); ?>
    <?php $this->load->view('layout/header'); ?>


    <?= $contents ?>

    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 11]>
        <div class="ie-warning">
            <h1>Warning!!</h1>
            <p>You are using an outdated version of Internet Explorer, please upgrade
               <br/>to any of the following web browsers to access this website.
            </p>
            <div class="iew-container">
                <ul class="iew-download">
                    <li>
                        <a href="http://www.google.com/chrome/">
                            <img src="assets/images/browser/chrome.png" alt="Chrome">
                            <div>Chrome</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.mozilla.org/en-US/firefox/new/">
                            <img src="assets/images/browser/firefox.png" alt="Firefox">
                            <div>Firefox</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.opera.com">
                            <img src="assets/images/browser/opera.png" alt="Opera">
                            <div>Opera</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.apple.com/safari/">
                            <img src="assets/images/browser/safari.png" alt="Safari">
                            <div>Safari</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                            <img src="assets/images/browser/ie.png" alt="">
                            <div>IE (11 & above)</div>
                        </a>
                    </li>
                </ul>
            </div>
            <p>Sorry for the inconvenience!</p>
        </div>
    <![endif]-->
    <!-- Warning Section Ends -->

    <!-- Required Js -->
    <script src="<?= base_url() ?>assets/js/vendor-all.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/bs-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/bs-datepicker/locales/bootstrap-datepicker.id.min.js"></script>
    <script src="<?= base_url() ?>assets/js/pcoded.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.6.0/dt-1.11.3/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <!-- <script src="<?= base_url() ?>assets/plugins/datatable/js/datatables.min.js"></script> -->
    <!-- <script src="<?= base_url() ?>assets/plugins/datatable/js/dataTables.bootstrap4.min.js"></script> -->
    <!-- <script src="<?= base_url() ?>assets/plugins/bootstrap/js/twitter-bootstrap.min.js"></script> -->

    <script src="<?= base_url() ?>assets/plugins/moment/moment.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/plugins/chosen/chosen.jquery.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/plugins/chosen/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?= base_url() ?>assets/plugins/chosen/docsupport/init.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?= base_url() ?>assets/plugins/toastr/toastr.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/toastify/toastify.js"></script>
    <script src="<?= base_url() ?>assets/plugins/bs-timepicker/js/bootstrap-timepicker.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/bs-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script>
        function hanyaAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))

                return false;
            return true;
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.datatable').DataTable();
            $('.datepicker').datepicker({
                autoclose: true,
                forceParse: false,
                todayBtn: true,
                format: 'dd/mm/yyyy',
                // startDate: '-3d',
                language: 'id'
            });
            $(".chosen-select").chosen({
                disable_search_threshold: 10
            });

        })

        window.formatInput = function(id) {
            $(id).on('blur', function() {
                const input = $(this).val();
                if (!input.includes('.')) {
                    const output = input.slice(0, -2) + "." + input.slice(-2);
                    $(this).val(output);
                    return
                }
                $(this).val(input);
            })
        }

        window.checkKoma = function(id) {
            $(id).on('keyup', function() {
                const input = $(this).val();
                if (input.includes(',')) {
                    const output = input.replaceAll(",", ".");
                    $(this).val(output);
                    return
                }
                $(this).val(input);
            })
        }

        window.uppercase = function(id) {
            $(id).on('keyup', function() {
                const input = $(this).val();
                const output = input.toUpperCase();
                $(this).val(output);
            })
        }
    </script>
    <script type="text/javascript">
        function setLocation(curLoc) {
            try {
                history.pushState(null, null, curLoc);
                return false;
            } catch (e) {}
            location.hash = '#' + curLoc;
        }
        $(document).ready(function() {
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
            } else {
                $msg = $_GET['msg'];
            }
            ?>

            var msg = "<?= $msg ?>";
            var alert = "<?= @$_GET['alert'] ?>";
            if (msg != "") {
                Command: toastr[alert](msg);
                setLocation($(location).attr('href').split("?")[0]);
            }
        });
    </script>
</body>

</html>