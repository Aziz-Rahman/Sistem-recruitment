<?php $class_nav = '';
if ( $_SESSION['admin_id_recruitment'] == '2' ) {
    $class_nav = 'my-nav-top';
}
?>

<nav class="navbar navbar-default navbar-fixed-top navbar-top <?php echo $class_nav; ?>">
    <div class="container-fluid">
        <div class="navbar-header">
                <a class="navbar-brand" href="./" style="margin-left: 30px;">
                    <div class="icon "><img src="img/assets/logo.png" alt="img-logo" width="40"></div>
                    <!-- <div class="title title-brand">Sistem Informasi Karyawan</div> -->
                </a>
            <?php // if ( $_SESSION['admin_id_recruitment'] != '2' ) { ?>
                <!-- <button type="button" class="navbar-expand-toggle">
                    <i class="fa fa-bars icon"></i>
                </button> -->
            <?php // } ?>
           <!--  <ol class="breadcrumb navbar-breadcrumb">
                <li class="active">Dashboard</li>
            </ol> -->
            <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
                <i class="fa fa-th icon"></i>
            </button>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
                <i class="fa fa-times icon"></i>
            </button>
            <!-- <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-comments-o"></i></a>
                <ul class="dropdown-menu animated fadeInDown">
                    <li class="title">
                        Notification <span class="badge pull-right">0</span>
                    </li>
                    <li class="message">
                        No new notification
                    </li>
                </ul>
            </li> -->
            <!-- <li class="dropdown danger">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-star-half-o"></i> 4</a>
                <ul class="dropdown-menu danger  animated fadeInDown">
                    <li class="title">
                        Notification <span class="badge pull-right">4</span>
                    </li>
                    <li>
                        <ul class="list-group notifications">
                            <a href="#">
                                <li class="list-group-item">
                                    <span class="badge">1</span> <i class="fa fa-exclamation-circle icon"></i> new registration
                                </li>
                            </a>
                            <a href="#">
                                <li class="list-group-item">
                                    <span class="badge success">1</span> <i class="fa fa-check icon"></i> new orders
                                </li>
                            </a>
                            <a href="#">
                                <li class="list-group-item">
                                    <span class="badge danger">2</span> <i class="fa fa-comments icon"></i> customers messages
                                </li>
                            </a>
                            <a href="#">
                                <li class="list-group-item message">
                                    view all
                                </li>
                            </a>
                        </ul>
                    </li>
                </ul>
            </li> -->
            <li class="dropdown profile">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php if ( !empty( $_SESSION['admin_id_recruitment'] ) ) echo $_SESSION['admin_name_recruitment']; ?><span class="caret"></span></a>
                <ul class="dropdown-menu animated fadeInDown">
                    <!-- <li class="profile-img">
                        <img src="img/profile/picjumbo.com_HNCK4153_resize.jpg" class="profile-img">
                    </li> -->
                    <li>
                        <div class="profile-info">
                            <!-- <h4 class="username">Emily Hart</h4> -->
                            <!-- <p>emily_hart@email.com</p> -->
                            <div class="btn-group margin-bottom-2x" role="group">
                                <!-- <button type="button" class="btn btn-default"><i class="fa fa-user"></i> Profile</button> -->
                                <a href="logout.php" title="Keluar"><button type="button" class="btn btn-info"><i class="fa fa-sign-out"></i> Logout System</button></a>
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>