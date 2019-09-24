
<!-- start: sidebar -->
<div class="side-menu sidebar-inverse">
    <nav class="navbar navbar-default" role="navigation">
        <div class="side-menu-container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    <div class="icon "><img src="img/assets/logo.png" alt="img-logo" width="40"></div>
                    <div class="title title-brand">Sistem Informasi Karyawan</div>
                </a>
                <button type="button" class="navbar-expand-toggle pull-right visible-xs">
                    <i class="fa fa-times icon"></i>
                </button>
            </div>
            <ul class="nav navbar-nav">
                <?php if ( $_SESSION['m_dashboard1'] == 1 ) { ?>
                    <li><a href="./"><span class="icon fa fa-tachometer"></span><span class="title">Dashboard</span></a></li>
                <?php } ?>

                <?php if ( $_SESSION['m_dashboard2'] == 1 ) { ?>
                    <li><a href="./"><span class="icon fa fa-tachometer"></span><span class="title">Dashboard</span></a></li>
                <?php } ?>

                <?php if ( $_SESSION['m_user'] == 1 ) { ?>
                    <li><a href="./?p=user"><span class="icon fa fa-user"></span><span class="title">User</span></a></li>
                <?php } ?>

                <?php if ( $_SESSION['m_master_pelamar'] == 1 ) { ?>
                    <li class="panel panel-default dropdown">
                        <a data-toggle="collapse" href="#dropdown-master-pelamar">
                            <span class="icon fa fa-table"></span><span class="title">Master Data</span>
                        </a>
                        <!-- Dropdown level 1 -->
                        <div id="dropdown-master-pelamar" class="panel-collapse collapse">
                            <div class="panel-body">
                                <ul class="nav navbar-nav">
                                    <li><a href="./?p=master-kelengkapan-berkas">Kelengkapan Berkas</a></li>
                                    <li><a href="./?p=master-pertanyaan-pelamar">Pertanyaan</a></li>
                                    <li><a href="./?p=master-unit">Master Unit</a></li>
                                    <li><a href="./?p=master-jabatan&act=jabatan">Master Jabatan</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                 <?php } ?>

                <?php if ( $_SESSION['m_pelamar'] == 1 ) { ?>
                    <li><a href="./?p=pelamar"><span class="icon fa fa-tachometer"></span><span class="title">Data Pelamar</span></a></li>
                <?php } ?>

                <?php if ( $_SESSION['m_induk_karyawan'] == 1 ) { ?>
                    <li><a href="./?p=karyawan"><span class="icon fa fa-table"></span><span class="title">Buku Induk Karyawan</span></a></li> 
                <?php } ?>               
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
</div>
<!-- end: sidebar -->