<?php
include "includes/conn.php";

// check if any session
if ( ! empty( $_SESSION['admin_id_recruitment'] ) ) {
    echo "<script>window.location.href='./';</script>";
}

if ( isset( $_POST['login-admin'] ) ) :
    include "includes/functions.php";

    $username = $sdm->real_escape_string( anti_injection( $_POST['username'] ) );
    $encyript_password = $sdm->real_escape_string( encyript_password( anti_injection( $_POST['password'] ) ) ); // encyription password

    $sql = $sdm->query( "SELECT * FROM user WHERE email = '$username' AND password = '$encyript_password' OR username = '$username' AND password = '$encyript_password'" );
    $check = $sql->num_rows;
    $data = $sql->fetch_assoc();


  if ( $check > 0 ) {
    // session_start();
    $_SESSION['admin_id_recruitment'] = $data['id_user'];
    $_SESSION['admin_name_recruitment'] = $data['nama'];
    $_SESSION['admin_email_recruitment'] = $data['email'];
    $_SESSION['admin_username_recruitment'] = $data['username'];
    $_SESSION['admin_password_recruitment'] = $data['password'];
    // menu / link
    $_SESSION['m_tambah_pelamar'] = $data['m_tambah_pelamar'];
    $_SESSION['m_detail_pelamar'] = $data['m_detail_pelamar'];

    // unset sessi
    unset( $_SESSION['username_recruitment'] );


    $id_user = $_SESSION['admin_id_recruitment'];
    // update status user offline
    $get_data = $sdm->query( "UPDATE user SET user_online = '1' WHERE id_user = '$id_user'" );


    if ( $data['level'] == '2' ) { // recruitment
        header( 'location:./' ); // redirect to homepage
    } else { // pelamar
        echo "<script>alert('Username atau password salah, silahkan ulangi.'); top.location='./';</script>"; 
        session_destroy();
    }
    
  } else {
    $_SESSION['username_recruitment'] = $username;
    echo "<script>alert('Username atau password salah, silahkan ulangi.'); top.location='./';</script>";
  }

  $sdm->close();

endif;
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
    <!-- CSS Libs -->
    <link rel="stylesheet" type="text/css" href="lib/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="lib/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="lib/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="lib/css/bootstrap3/bootstrap-switch.min.css">
    <link rel="stylesheet" type="text/css" href="lib/css/checkbox3.min.css">
    <link rel="stylesheet" type="text/css" href="lib/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="lib/css/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="lib/css/select2.min.css">
    <!-- CSS App -->
    <link rel="stylesheet" type="text/css" href="lib/css/style.css">
    <link rel="stylesheet" type="text/css" href="lib/css/themes/flat-blue.css">
</head>

<body class="flat-blue login-page">
    <div class="container">
        <div class="login-box">
            <div>
                <div class="login-form row">
                    <div class="col-sm-12 text-center login-header">
                        <i class="login-logo fa fa-connectdevelop fa-5x"></i>
                        <h4 class="login-title">Login System Recruitment</h4>
                    </div>
                    <div class="col-sm-12">
                        <div class="login-body">
                        
                            <form action="" method="post" role="form">
                                <!-- <h1 class="login-title">Login Administrator</h1> -->
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control" placeholder="Username or email" autocomplete="off" value="<?php if ( !empty( $_SESSION['username_recruitment'] ) ) echo $_SESSION['username_recruitment']; ?>">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="off">
                                </div>
                                <div>
                                    <button type="submit" name="login-admin" class="btn btn-info">Login</button>
                                    <!-- <a class="forgot-pass" href="#" style="margin-left: 10px;">Lupa password ?</a> -->
                                </div>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                        <div class="login-footer">
                            <!-- <span class="text-right"><a href="#" class="color-white">Forgot password?</a></span> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Javascript Libs -->
    <script type="text/javascript" src="lib/js/jquery.min.js"></script>
    <script type="text/javascript" src="lib/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="lib/js/Chart.min.js"></script>
    <script type="text/javascript" src="lib/js/bootstrap-switch.min.js"></script>
    <script type="text/javascript" src="lib/js/jquery.matchHeight-min.js"></script>
    <script type="text/javascript" src="lib/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="lib/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="lib/js/select2.full.min.js"></script>
    <script type="text/javascript" src="lib/js/ace.js"></script>
    <script type="text/javascript" src="lib/js/mode-html.js"></script>
    <script type="text/javascript" src="lib/js/theme-github.js"></script>
    <!-- Javascript -->
    <script type="text/javascript" src="lib/js/app.js"></script>
    <script type="text/javascript" src="lib/js/index.js"></script>

</body>

</html>
