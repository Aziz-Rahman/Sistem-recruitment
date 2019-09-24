<?php
include "includes/conn.php";
include "includes/functions.php";

if ( empty( $_SESSION['admin_id_recruitment'] ) ) {
    echo '<script>document.location="login.php";</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sistem Informasi Karyawan (SDM)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
    <!-- CSS Libs -->
    <link rel="stylesheet" type="text/css" href="lib/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="lib/css/jquery-ui.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="lib/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="lib/css/animate.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="lib/css/bootstrap3/bootstrap-switch.min.css"> -->
    <link rel="stylesheet" type="text/css" href="lib/css/checkbox3.min.css">
    <link rel="stylesheet" type="text/css" href="lib/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="lib/css/dataTables.bootstrap.css">
    <!-- <link rel="stylesheet" type="text/css" href="lib/css/select2.min.css"> -->
    <link rel="stylesheet" type="text/css" href="lib/css/sweetalert.css">
    <!-- CSS App -->
    <link rel="stylesheet" type="text/css" href="lib/css/style.css">
    <link rel="stylesheet" type="text/css" href="lib/css/themes/flat-blue.css">

    <script type="text/javascript" src="lib/js/jquery.min.js"></script>
    <script type="text/javascript" src="lib/js/bootstrap.min.js"></script>
</head>

<body class="flat-blue">
    
    <!-- <div id="preloader"> -->
        <!-- <img src="img/assets/loading.gif" alt="Preloader"> -->
    <!-- </div> -->

    <div class="app-container">
        <div class="row content-container">
            <?php
            include 'includes/top-navigation.php';
            // if ( $_SESSION['admin_id_recruitment'] != '2' ) {
            //     include 'includes/sidebar.php';
            // }
            include "includes/load-pages.php"; 
            ?>
        </div>
        
        <!-- start: footer -->
        <footer class="app-footer my-app-ft">
            <div class="wrapper">
                <span class="pull-right"><a href="#" class="back-to-top"><i class="fa fa-angle-double-up"></i></a></span>Copyright <?php echo '© '. date('Y') ?> by IT Programmer Sekolah Pahtsung.
            </div>
        </footer>
        <!-- end: footer -->
    <div> <!-- end: .app-container -->

    <!-- Javascript Libs -->
    <script type="text/javascript" src="lib/js/jquery.ui.min.js"></script>
    <script type="text/javascript" src="lib/js/sweetalert.min.js"></script>
    <!-- <script type="text/javascript" src="lib/js/Chart.min.js"></script> -->
    <!-- <script type="text/javascript" src="lib/js/bootstrap-switch.min.js"></script> -->
    <!-- <script type="text/javascript" src="lib/js/jquery.matchHeight-min.js"></script> -->
    <script type="text/javascript" src="lib/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="lib/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="lib/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="lib/js/validation-script.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="webcam/webcam.js"></script>
    <!-- <script type="text/javascript" src="lib/js/select2.full.min.js"></script> -->
    <!-- <script type="text/javascript" src="lib/js/ace.js"></script> -->
    <!-- <script type="text/javascript" src="lib/js/mode-html.js"></script> -->
    <!-- <script type="text/javascript" src="lib/js/theme-github.js"></script> -->
    <!-- Javascript -->
    <script type="text/javascript" src="lib/js/functions.js"></script>
    <!-- <script type="text/javascript" src="lib/js/index.js"></script> -->
    <script>
        /*
        * -----------------
        * Webcam
        * -----------------
        */
        // preload shutter audio clip
        var shutter = new Audio();
        shutter.autoplay = false;
        shutter.src = navigator.userAgent.match(/Firefox/) ? 'shutter.ogg' : 'webcam/shutter2.mp3';

        $(document).on('click', '.take-first', function() {
            Webcam.set({
                // live preview size
                width: 640,
                height: 480,
                // device capture size
                // dest_width: 320,
                // dest_height: 240,
                // final cropped size
                // crop_width: 240,
                // crop_height: 240,

                flip_horiz: true,
                image_format: 'png',
                jpeg_quality: 90
            });
            Webcam.attach( '#my_camera' );
        });

        $(document).on('click', '.close', function() {
            Webcam.reset();
        });
          
        function take_snapshot() {
            // play sound effect
            shutter.play();
            // take snapshot and get image data
            Webcam.snap( function(data_uri) {
                // display results in page
                document.getElementById('results').innerHTML = 
                '<img src="' + data_uri + '">'+
                '<input type="hidden" name="img1" id="img1" value="' + data_uri + '">'
                ;
            });
        }
        // end: webcame
    </script>
    
</body>
</html>