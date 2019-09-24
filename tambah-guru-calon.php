<?php
if ( $_SESSION['m_tambah_pelamar'] != '1' ) {
    echo '<script>document.location="logout.php";</script>';
}

$param_pelamar = isset( $_GET['step'] ) ? $_GET['step'] : '';
// $karyawan = $sdm->query( "SELECT * FROM karyawan" );
?>

<!-- Main Content -->
<div class="container-fluid">
    <div class="side-body my-class-mrg">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                    <li><i class="fa fa-laptop"></i>Dashboard</li>                          
                </ol>
            </div>
        </div>

        <div class="page-title">
            <span class="title">Isi Data Calon Guru</span>
            <a href="./" class="btn-back-to-menu-pelamar"><button type="button" class="btn btn-danger">Back to home</button></a>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="info-alert">
                    <?php
                    // session_destroy();
                    // echo $_SESSION['berkas2'];
                    // Check message ada atau tidak
                    if ( ! empty( $_SESSION['messages'] ) ) {
                        echo $_SESSION['messages']; // menampilkan pesan 
                        unset( $_SESSION['messages'] ); // menghapus pesan setelah refresh
                    }   
                    ?>  
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="card" style="box-shadow: none;">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <div class="step">
                            <ul class="nav nav-tabs nav-justified" role="tablist">
                                <li class="step-pelamar <?php if ( isset( $_GET['p'] ) == 'tambah-calon-guru' AND $param_pelamar == 'data-calon-guru' ) echo 'active'; ?>">
                                    <!-- <a href="./?p=tambah-calon-guru&step=data-calon-guru"> -->
                                        <div class="icon fa fa-credit-card"></div>
                                        <div class="step-title">
                                            <div class="title">Data Pelamar</div>
                                        </div>
                                    <!-- </a> -->
                                </li>
                                <li class="step-pelamar <?php if ( isset( $_GET['p'] ) == 'tambah-calon-guru' AND $param_pelamar == 'berkas-lamaran' AND isset( $_GET['keycode'] ) ) echo 'active'; ?>">
                                    <!-- <a href="./?p=tambah-calon-guru&step=berkas-lamaran"> -->
                                        <div class="icon fa fa-file"></div>
                                        <div class="step-title">
                                            <div class="title">Berkas Lamaran</div>
                                        </div>
                                    <!-- </a> -->
                                </li>
                                <li class="step-pelamar <?php if ( isset( $_GET['p'] ) == 'tambah-calon-guru' AND $param_pelamar == 'pertanyaan-calon-guru' ) echo 'active'; ?>">
                                    <!-- <a href="./?p=tambah-calon-guru&step=pertanyaan-calon-guru"> -->
                                        <div class="icon fa fa-question-circle"></div>
                                        <div class="step-title">
                                            <div class="title">Pertanyaan</div>
                                        </div>
                                    <!-- </a> -->
                                </li>
                            </ul>
                            <div class="tab-content">

                                <?php if ( isset( $_GET['p'] ) == 'tambah-calon-guru' AND $param_pelamar == 'data-calon-guru' ) { ?>

                                    <form name="myForm" action="action-insert.php" method="post" class="form-horizontal form-label-left" id="form-data-pelamar">
                                        <div class="tab-pane fade fade in active">
                                            <div class="col-xs-12 no-padding">
                                                <div class="card" style="box-shadow: none;">
                                                    <div class="card-header">
                                                        <div class="card-title">
                                                            <div class="title">DATA PRIBADI</div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body" style="padding-left: 0; padding-right: 0;">

                                                  <!--       <div class="form-group ">
                                                            <div class="col-lg-2">
                                                                <label>Jabatan</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <input type="text" name="jabatan" class="form-control" autocomplete="off" placeholder="Jabatan"> -->
                                                                <!-- <input type="hidden" name="kategori_jabatan" value="1"> -->
                                                            <!-- </div>
                                                        </div> -->

                                                        <input type="hidden" name="key_form" value="1"> <!-- form guru -->

                                                       <!--  <div class="form-group ">
                                                            <div class="col-lg-2">
                                                                <label>Unit</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <?php
                                                                // $query = $sdm->query( "SELECT * FROM master_unit WHERE status = '1' AND kategori_pegawai = '1'" );
                                                                // echo '<select id="myunit" name="id_master_unit" class="form-control norad valid">';
                                                                // echo '<option value="">-- Pilih --</option>';
                                                                // while ( $data_unit = $query->fetch_assoc() ) {
                                                                //     $id_unit = $data_unit['id_master_unit'];
                                                                //     $unit = $data_unit['nama_unit'];

                                                                //     echo "<option value=". $id_unit .">". $unit ."</option>";
                                                                // }
                                                                // echo '</select>';
                                                                ?>     
                                                            </div>
                                                        </div> -->

                                                        <!-- <input type="hidden" name="skr" value="5"> -->

                                                      <!--  <div class="form-group ">
                                                            <div class="col-lg-2">
                                                                <label>Jabatan</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <?php
                                                                // $query = $sdm->query( "SELECT * FROM master_jabatan" );
                                                                // echo '<select id="myjabatan" name="id_master_jabatan" class="form-control norad valid">';
                                                                // echo '<option>-- Pilih --</option>';
                                                                // while ( $data_jabatan = $query->fetch_assoc() ) {
                                                                //     $id_jabatan = $data_jabatan['id_master_jabatan'];
                                                                //     $jabatan = $data_jabatan['jabatan'];

                                                                //     echo "<option value=". $id_jabatan .">". $jabatan ."</option>";
                                                                // }
                                                                // echo '</select>';
                                                                ?>     
                                                            </div>
                                                        </div>
 -->
                                                       <!--  <div class="form-group" id="myjabatan"></div>
                                                        <div class="form-group" id="mysubjabatan"></div> -->
                                                       <!--  <div class="form-group ">
                                                            <div class="col-lg-2">
                                                                <label>Jabatan</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <select name="id_master_jabatan" id="myjabatan" class="form-control norad valid">
                                                                    <option value="">-- Pilih Unit Terlebih Dahulu --</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group" id="mysubjabatan"></div> -->
                                                         
                                                        <!-- <hr> -->
                                                        
                                                        <div class="col-md-10 no-padding">
                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                    <label>Nama Lengkap</label>
                                                                </div>
                                                                <div class="col-lg-9" style="margin-left: 35px;">
                                                                    <input type="text" name="nama_lengkap" class="form-control" autocomplete="off" placeholder="Nama Lengkap">
                                                                </div>
                                                            </div>

                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                    <label>Tempat Lahir</label>
                                                                </div>
                                                                <div class="col-lg-9" style="margin-left: 35px;">
                                                                    <input type="text" name="tempat_lahir" class="form-control" autocomplete="off" placeholder="Tempat Lahir">
                                                                </div>
                                                            </div>

                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                    <label>Tanggal Lahir</label>
                                                                </div>
                                                                <div class="col-lg-9" style="margin-left: 35px;">
                                                                    <input type="text" name="tanggal_lahir" class="form-control datepicker" autocomplete="off" placeholder="Tanggal Lahir">
                                                                </div>
                                                            </div>

                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                    <label>Jenis Kelamin</label>
                                                                </div>
                                                                <div class="col-lg-9" style="margin-left: 35px;">
                                                                    <div class="radio3 radio-check radio-success radio-inline">
                                                                        <input type="radio" id="radio5" name="jenis_kelamin" value="L">
                                                                        <label for="radio5">Laki - laki</label>
                                                                    </div>
                                                                    <div class="radio3 radio-check radio-success radio-inline">
                                                                        <input type="radio" id="radio6" name="jenis_kelamin" value="P">
                                                                        <label for="radio6">Perempuan</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="col-md-2" style="padding-left: 30px;">
                                                            <div class="form-group">
                                                                <!-- <label class="control-label" style="margin-right: 20px; width: 100%;">Pass Photo</label> -->
                                                                <div class="take-photo-webcame">
                                                                    <a href="#myModal-add-data" data-toggle="modal" class="btn btn-info btn-sm take-first"><i class="fa fa-camera" aria-hidden="true"></i> Ambil foto</a>

                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div id="results"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="clearfix"></div>

                                                        <div class="form-group ">
                                                            <div class="col-lg-2">
                                                                <label>Warganegara</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <?php
                                                                $query = $sdm->query( "SELECT * FROM warganegara" );
                                                                echo '<select id="id_warganegara" name="id_warganegara" class="form-control norad valid">';
                                                                echo '<option>-- Pilih --</option>';
                                                                while ( $warganegara = $query->fetch_assoc() ) {
                                                                    $id_warganegara = $warganegara['IDwn'];
                                                                    $warganegara = $warganegara['WargaNegara'];

                                                                    echo "<option value=". $id_warganegara .">". $warganegara ."</option>";
                                                                }
                                                                echo '</select>';
                                                                ?>     
                                                            </div>
                                                        </div>

                                                        <div class="form-group ">
                                                            <div class="col-lg-2">
                                                                <label>Suku</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <input type="text" name="suku" class="form-control" autocomplete="off" placeholder="Suku">
                                                            </div>
                                                        </div>

                                                         <div class="form-group ">
                                                            <div class="col-lg-2">
                                                                <label>Agama</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <?php
                                                                $query = $psbo->query( "SELECT * FROM dbpsbo.agama" );
                                                                echo '<select id="id_agama" name="id_agama" class="form-control norad valid">';
                                                                echo '<option>-- Pilih Agama --</option>';
                                                                while ( $agama = $query->fetch_assoc() ) {
                                                                    $id_agama = $agama['IDAgama'];
                                                                    $agama = $agama['Agama'];

                                                                    echo "<option value=". $id_agama .">". $agama ."</option>";
                                                                }
                                                                echo '</select>';
                                                                ?>      
                                                            </div>
                                                        </div>

                                                        <div class="form-group ">
                                                            <div class="col-lg-2">
                                                                <label>Golongan Darah</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <input type="text" name="gol_darah" class="form-control" autocomplete="off" placeholder="Golongan Darah">
                                                            </div>
                                                        </div>

                                                        <div class="form-group ">
                                                            <div class="col-lg-2">
                                                                <label>Status Perkawinan</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <select name="status_perkawinan" id="status_perkawinan" class="form-control select-option">
                                                                    <option> -- Pilih -- </option>
                                                                    <option value="1">Single / Belum Menikah</option>
                                                                    <option value="2">Menikah</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group ">
                                                            <div class="col-lg-2">
                                                                <label>Anak ke</label>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <input type="text" name="anak_ke" class="form-control" autocomplete="off" placeholder="Anak ke">
                                                            </div>
                                                            <div class="col-lg-1 text-center vertical-me">Dari</div>
                                                            <div class="col-lg-5">
                                                                <input type="text" name="jumlah_saudara" class="form-control" autocomplete="off" placeholder="Bersaudara">
                                                            </div>
                                                            <div class="col-lg-1 text-right vertical-me">Bersaudara</div>
                                                        </div>
                                                    </div> <!-- -->
                                                </div> <!-- -->
                                            </div> <!-- -->

                                            <div class="col-xs-12 no-padding">
                                                <div class="card" style="box-shadow: none;">
                                                    <div class="card-header">
                                                        <div class="card-title">
                                                            <div class="title">ALAMAT</div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body" style="padding-left: 0; padding-right: 0;">
                                                        <div class="form-group ">
                                                            <div class="col-lg-2">
                                                                <label>Alamat Domisili Saat Ini</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <textarea name="alamat_domisili" class="form-control" rows="3" placeholder="Alamat Domisili Saat Ini"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="form-group ">
                                                            <div class="col-lg-2">
                                                                 <label>Status Tempat Tinggal</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <select name="status_tempat_tinggal" id="status_tempat_tinggal" class="form-control select-option">
                                                                    <option value="0">-- Pilih --</option>
                                                                    <option value="1">Rumah Pribadi</option>
                                                                    <option value="2">Rumah Keluarga</option>
                                                                    <option value="3">Kontrak/ Kost</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group ">
                                                            <div class="col-lg-2">
                                                                 <label>No. Telepon Rumah</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <input type="text" name="telp_rumah" class="form-control" autocomplete="off" placeholder="Telepon Rumah">
                                                            </div>
                                                        </div>

                                                        <div class="form-group ">
                                                            <div class="col-lg-2">
                                                                 <label>No. Handphone</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <input type="text" name="handphone" class="form-control" autocomplete="off" placeholder="Handphone">
                                                            </div>
                                                        </div>

                                                        <div class="form-group ">
                                                            <div class="col-lg-2">
                                                                 <label>Email</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <input type="text" name="email" class="form-control" autocomplete="off" placeholder="Email">
                                                            </div>
                                                        </div>
                                                        
                                                        <hr>
                                                         <p class="help-block">#Dalam keadaan darurat, yang dapat dihubungi:</p>

                                                         <div class="form-group ">
                                                            <div class="col-lg-2">
                                                                 <label>Nama Lengkap</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <input type="text" name="nama_darurat" class="form-control" autocomplete="off" placeholder="Nama Lengkap">
                                                            </div>
                                                        </div>

                                                        <div class="form-group ">
                                                            <div class="col-lg-2">
                                                                 <label>Hubungan</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <input type="text" name="hubungan_darurat" class="form-control" autocomplete="off" placeholder="Hubungan">
                                                            </div>
                                                        </div>

                                                        <div class="form-group ">
                                                            <div class="col-lg-2">
                                                                <label>Alamat Lengkap</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <textarea name="alamat_darurat" class="form-control" rows="3" placeholder="Alamat Lengkap"></textarea>
                                                            </div>
                                                        </div>
                                                   

                                                    </div> <!-- -->
                                                </div> <!-- -->
                                            </div> <!-- -->

                                            <div class="col-xs-12 no-padding">
                                                <div class="card" style="box-shadow: none;">
                                                    <div class="card-header">
                                                        <div class="card-title">
                                                            <div class="title">DATA IDENTITAS</div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body" style="padding-left: 0; padding-right: 0;">
                                                        <p class="help-block">#KTP</p>

                                                        <div class="form-group ">
                                                            <div class="col-lg-4">
                                                                <label>Nomor KTP</label>
                                                                <input type="text" name="no_ktp" class="form-control" autocomplete="off" placeholder="No. KTP">
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <label>Dikeluarkan di</label>
                                                                <input type="text" name="ktp_dikeluarkan_di" class="form-control" autocomplete="off" placeholder="Dikeluarkan di">
                                                            </div>
                                                             <div class="col-lg-4">
                                                                <label>Berlaku sampai</label>
                                                                <input type="text" name="masa_berlaku_ktp" class="form-control" autocomplete="off" placeholder="Berlaku sampai">
                                                            </div>
                                                        </div>

                                                        <hr><p class="help-block">#SIM</p>

                                                        <div class="form-group ">
                                                            <div class="col-lg-4">
                                                                <label>Nomor SIM</label>
                                                                <input type="text" name="no_sim" class="form-control" autocomplete="off" placeholder="No. SIM">
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <label>Dikeluarkan di</label>
                                                                <input type="text" name="sim_dikeluarkan_di" class="form-control" autocomplete="off" placeholder="Dikeluarkan di">
                                                            </div>
                                                             <div class="col-lg-4">
                                                                <label>Berlaku sampai</label>
                                                                <input type="text" name="masa_berlaku_sim" class="form-control datepicker" autocomplete="off" placeholder="Berlaku sampai">
                                                            </div>
                                                        </div>

                                                        <hr><p class="help-block">#Passport</p>

                                                        <div class="form-group ">
                                                            <div class="col-lg-4">
                                                                <label>Nomor Passport</label>
                                                                <input type="text" name="no_passport" class="form-control" autocomplete="off" placeholder="No. Passport">
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <label>Dikeluarkan di</label>
                                                                <input type="text" name="passport_dikeluarkan_di" class="form-control" autocomplete="off" placeholder="Dikeluarkan di">
                                                            </div>
                                                             <div class="col-lg-4">
                                                                <label>Berlaku sampai</label>
                                                                <input type="text" name="masa_berlaku_passport" class="form-control datepicker" autocomplete="off" placeholder="Berlaku sampai">
                                                            </div>
                                                        </div>


                                                    </div> <!-- -->
                                                </div> <!-- -->
                                            </div> <!-- -->

                                            <div class="col-xs-12 no-padding">
                                                <div class="card" style="box-shadow: none;">
                                                    <div class="card-header">
                                                        <div class="card-title">
                                                            <div class="title">DATA KELUARGA</div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body" style="padding-left: 0; padding-right: 0;">

                                                        <div class="form-group ">
                                                            <div class="col-lg-2">
                                                                <label>Nama Suami/ Istri</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <input type="text" name="nama_suami_istri" class="form-control" autocomplete="off" placeholder="Nama Suami/ Istri">
                                                            </div>
                                                        </div>

                                                        <div class="form-group ">
                                                            <div class="col-lg-2">
                                                                <label>Pekerjaan Suami/ Istri</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <?php
                                                                $query = $psbo->query( "SELECT * FROM dbpsbo.pekerjaan" );
                                                                echo '<select id="pekerjaan_suami_istri" name="pekerjaan_suami_istri" class="form-control norad valid">';
                                                                echo '<option>-- Pilih --</option>';
                                                                while ( $rows = $query->fetch_assoc() ) {
                                                                    $id_pekerjaan_suami_istri = $rows['IDPekerjaan'];
                                                                    $pekerjaan_suami_istri = $rows['Pekerjaan'];

                                                                    echo "<option value=". $id_pekerjaan_suami_istri .">". $pekerjaan_suami_istri ."</option>";
                                                                }
                                                                echo '</select>';
                                                                ?>
                                                            </div>
                                                        </div>

                                                        <div class="form-group ">
                                                            <div class="col-lg-2">
                                                                <label>Jumlah Anak</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <input type="text" name="jumlah_anak" class="form-control" autocomplete="off" placeholder="Jumlah Anak">
                                                            </div>
                                                        </div>

                                                        <div class="form-group data_nama_anak1">
                                                            <div class="col-lg-2">
                                                                <label>Nama Anak</label>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" name="nama_anak1" class="form-control" autocomplete="off" placeholder="Nama Anak 1">
                                                            </div>
                                                            <div class="col-lg-1 text-right vertical-me">Usia: </div>
                                                            <div class="col-lg-2">
                                                                <input type="text" name="usia_anak1" class="form-control" autocomplete="off" placeholder="Usia">
                                                            </div>
                                                            <div class="col-lg-1">
                                                                <span class="add-child pull-right" id="add-child2"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                                                                <!-- <span class="min-child" id="min-child2"><i class="fa fa-minus-circle" aria-hidden="true"></i></span> -->
                                                            </div>
                                                        </div>

                                                        <div class="form-group data_nama_anak2">
                                                            <div class="col-lg-2">
                                                                <!-- <label>Nama Anak</label> -->
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" name="nama_anak2" class="form-control" autocomplete="off" placeholder="Nama Anak 2">
                                                            </div>
                                                            <div class="col-lg-1 text-right vertical-me">Usia: </div>
                                                            <div class="col-lg-2">
                                                                <input type="text" name="usia_anak2" class="form-control" autocomplete="off" placeholder="Usia">
                                                            </div>
                                                            <div class="col-lg-1">
                                                                <span class="add-child pull-right" id="add-child3"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group data_nama_anak3">
                                                            <div class="col-lg-2">
                                                                <!-- <label>Nama Anak</label> -->
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" name="nama_anak3" class="form-control" autocomplete="off" placeholder="Nama Anak 3">
                                                            </div>
                                                            <div class="col-lg-1 text-right vertical-me">Usia: </div>
                                                            <div class="col-lg-2">
                                                                <input type="text" name="usia_anak3" class="form-control" autocomplete="off" placeholder="Usia">
                                                            </div>
                                                            <div class="col-lg-1">
                                                                <span class="add-child pull-right" id="add-child4"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group data_nama_anak4">
                                                            <div class="col-lg-2">
                                                                <!-- <label>Nama Anak</label> -->
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" name="nama_anak4" class="form-control" autocomplete="off" placeholder="Nama Anak 4">
                                                            </div>
                                                            <div class="col-lg-1 text-right vertical-me">Usia: </div>
                                                            <div class="col-lg-2">
                                                                <input type="text" name="usia_anak4" class="form-control" autocomplete="off" placeholder="Usia">
                                                            </div>
                                                            <div class="col-lg-1">
                                                                <span class="add-child pull-right" id="add-child5"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group data_nama_anak5">
                                                            <div class="col-lg-2">
                                                                <!-- <label>Nama Anak</label> -->
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" name="nama_anak5" class="form-control" autocomplete="off" placeholder="Nama Anak 5">
                                                            </div>
                                                            <div class="col-lg-1 text-right vertical-me">Usia: </div>
                                                            <div class="col-lg-2">
                                                                <input type="text" name="usia_anak5" class="form-control" autocomplete="off" placeholder="Usia">
                                                            </div>
                                                            <!-- <div class="col-lg-1">
                                                                <span class="add-child" id="add-child5"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                                                            </div> -->
                                                        </div>

                                                    </div> <!-- -->
                                                </div> <!-- -->
                                            </div> <!-- -->

                                            <div class="col-xs-12 no-padding">
                                                <div class="card" style="box-shadow: none;">
                                                    <div class="card-header">
                                                        <div class="card-title">
                                                            <div class="title">DATA ORANG TUA DAN WALI</div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body" style="padding-left: 0; padding-right: 0;">
                                                        
                                                        <p class="help-block">#Data Ayah</p>

                                                        <div class="form-group ">
                                                            <div class="col-lg-2">
                                                                <label>Nama Ayah</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <input type="text" name="nama_ayah" class="form-control" autocomplete="off" placeholder="Nama Ayah">
                                                            </div>
                                                        </div>

                                                        <div class="form-group ">
                                                            <div class="col-lg-2">
                                                                <label>Kewarganegaraan</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <?php
                                                                $query = $sdm->query( "SELECT * FROM warganegara" );
                                                                echo '<select id="id_warganegara_ayah" name="id_warganegara_ayah" class="form-control norad valid">';
                                                                echo '<option>-- Pilih --</option>';
                                                                while ( $warganegara = $query->fetch_assoc() ) {
                                                                    $id_warganegara_ayah = $warganegara['IDwn'];
                                                                    $warganegara_ayah = $warganegara['WargaNegara'];

                                                                    echo "<option value=". $id_warganegara_ayah .">". $warganegara_ayah ."</option>";
                                                                }
                                                                echo '</select>';
                                                                ?>     
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group ">
                                                            <div class="col-lg-2">
                                                                <label>Alamat Rumah</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <textarea name="alamat_rumah_ayah" class="form-control" rows="3" placeholder="Alamat Rumah"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-lg-2">
                                                                <label>Tempat/ Tanggal Lahir</label>
                                                            </div>
                                                            <div class="col-lg-5">
                                                                <input type="text" name="tempat_lahir_ayah" class="form-control" autocomplete="off" placeholder="Tempat Lahir">
                                                            </div>
                                                             <div class="col-lg-5">
                                                                <input type="text" name="tanggal_lahir_ayah" class="form-control datepicker" id="tanggal_lahir_ayah" placeholder="Tanggal Lahir">
                                                            </div>
                                                        </div>   

                                                        <div class="form-group ">
                                                            <div class="col-lg-2">
                                                                <label>Pendidikan</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <?php
                                                                $query = $psbo->query( "SELECT * FROM dbpsbo.pendidikan" );
                                                                echo '<select id="id_pendidikan_ayah" name="id_pendidikan_ayah" class="form-control norad valid">';
                                                                echo '<option>-- Pilih --</option>';
                                                                while ( $pendidikan_ayah = $query->fetch_assoc() ) {
                                                                    $id_pendidikan_ayah = $pendidikan_ayah['IDPendidikan'];
                                                                    $pendidikan_ayah = $pendidikan_ayah['Pendidikan'];                                   

                                                                    echo "<option value=". $id_pendidikan_ayah .">". $pendidikan_ayah ."</option>";
                                                                }
                                                                echo '</select>';
                                                                ?>

                                                            </div>
                                                        </div>

                                                        <div class="form-group ">
                                                            <div class="col-lg-2">
                                                                <label>Pekerjaan</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <?php
                                                                $query = $psbo->query( "SELECT * FROM dbpsbo.pekerjaan" );
                                                                echo '<select id="id_pekerjaan_ayah" name="id_pekerjaan_ayah" class="form-control norad valid">';
                                                                echo '<option>-- Pilih --</option>';
                                                                while ( $pekerjaan_ayah = $query->fetch_assoc() ) {
                                                                    $id_pekerjaan_ayah = $pekerjaan_ayah['IDPekerjaan'];
                                                                    $pekerjaan_ayah = $pekerjaan_ayah['Pekerjaan'];

                                                                    echo "<option value=". $id_pekerjaan_ayah .">". $pekerjaan_ayah ."</option>";
                                                                }
                                                                echo '</select>';
                                                                ?>
                                                            </div>
                                                        </div>

                                                        <div class="form-group ">
                                                            <div class="col-lg-2">
                                                                <label>No. Telepon</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <input type="text" name="no_telp_ayah" class="form-control" autocomplete="off" placeholder="No. Telepon">
                                                            </div>
                                                        </div>

                                                        <div class="form-group ">
                                                            <div class="col-lg-2">
                                                                <label>Alamat Kantor</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <textarea name="alamat_kantor_ayah" class="form-control" rows="3" placeholder="Alamat Kantor"></textarea>
                                                            </div>
                                                        </div>

                                                        <hr>
                                                        <p class="help-block">#Data Ibu</p>

                                                        <div class="form-group ">
                                                            <div class="col-lg-2">
                                                                <label>Nama Ibu</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <input type="text" name="nama_ibu" class="form-control" autocomplete="off" placeholder="Nama Ibu">
                                                            </div>
                                                        </div>

                                                        <div class="form-group ">
                                                            <div class="col-lg-2">
                                                                <label>Kewarganegaraan</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <?php
                                                                $query = $sdm->query( "SELECT * FROM warganegara" );
                                                                echo '<select id="id_warganegara_ibu" name="id_warganegara_ibu" class="form-control norad valid">';
                                                                echo '<option>-- Pilih --</option>';
                                                                while ( $warganegara = $query->fetch_assoc() ) {
                                                                    $id_warganegara_ibu = $warganegara['IDwn'];
                                                                    $warganegara_ibu = $warganegara['WargaNegara'];

                                                                    echo "<option value=". $id_warganegara_ibu .">". $warganegara_ibu ."</option>";
                                                                }
                                                                echo '</select>';
                                                                ?>     
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group ">
                                                            <div class="col-lg-2">
                                                                <label>Alamat Rumah</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <textarea name="alamat_rumah_ibu" class="form-control" rows="3" placeholder="Alamat Rumah"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-lg-2">
                                                                <label>Tempat/ Tanggal Lahir</label>
                                                            </div>
                                                            <div class="col-lg-5">
                                                                <input type="text" name="tempat_lahir_ibu" class="form-control" autocomplete="off" placeholder="Tempat Lahir">
                                                            </div>
                                                             <div class="col-lg-5">
                                                                <input type="text" name="tanggal_lahir_ibu" class="form-control datepicker" id="tanggal_lahir_ibu"  placeholder="Tanggal Lahir">
                                                            </div>
                                                        </div>   

                                                        <div class="form-group ">
                                                            <div class="col-lg-2">
                                                                <label>Pendidikan</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <?php
                                                                $query = $psbo->query( "SELECT * FROM dbpsbo.pendidikan" );
                                                                echo '<select id="id_pendidikan_ibu" name="id_pendidikan_ibu" class="form-control norad valid">';
                                                                echo '<option>-- Pilih --</option>';
                                                                while ( $pendidikan_ibu = $query->fetch_assoc() ) {
                                                                    $id_pendidikan_ibu = $pendidikan_ibu['IDPendidikan'];
                                                                    $pendidikan_ibu = $pendidikan_ibu['Pendidikan'];

                                                                    echo "<option value=". $id_pendidikan_ibu .">". $pendidikan_ibu ."</option>";
                                                                }
                                                                echo '</select>';
                                                                ?>

                                                            </div>
                                                        </div>

                                                        <div class="form-group ">
                                                            <div class="col-lg-2">
                                                                <label>Pekerjaan</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <?php
                                                                $query = $psbo->query( "SELECT * FROM dbpsbo.pekerjaan" );
                                                                echo '<select id="id_pekerjaan_ibu" name="id_pekerjaan_ibu" class="form-control norad valid">';
                                                                echo '<option>-- Pilih --</option>';
                                                                while ( $pekerjaan_ibu = $query->fetch_assoc() ) {
                                                                    $id_pekerjaan_ibu = $pekerjaan_ibu['IDPekerjaan'];
                                                                    $pekerjaan_ibu = $pekerjaan_ibu['Pekerjaan'];
                                                                    
                                                                    echo "<option value=". $id_pekerjaan_ibu .">". $pekerjaan_ibu ."</option>";
                                                                }
                                                                echo '</select>';
                                                                ?>
                                                            </div>
                                                        </div>

                                                        <div class="form-group ">
                                                            <div class="col-lg-2">
                                                                <label>No. Telepon</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <input type="text" name="no_telp_ibu" class="form-control" autocomplete="off" placeholder="No. Telepon">
                                                            </div>
                                                        </div>

                                                        <div class="form-group ">
                                                            <div class="col-lg-2">
                                                                <label>Alamat Kantor</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <textarea name="alamat_kantor_ibu" class="form-control" rows="3" placeholder="Alamat Kantor"></textarea>
                                                            </div>
                                                        </div>

                                                        <hr>
                                                        <p class="help-block">#Data Wali</p>

                                                        <div class="form-group ">
                                                            <div class="col-lg-2">
                                                                <label>Nama Wali</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <input type="text" name="nama_wali" class="form-control" autocomplete="off" placeholder="Nama Wali">
                                                            </div>
                                                        </div>

                                                        <div class="form-group ">
                                                            <div class="col-lg-2">
                                                                <label>Kewarganegaraan</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <?php
                                                                $query = $sdm->query( "SELECT * FROM warganegara" );
                                                                echo '<select id="id_warganegara_wali" name="id_warganegara_wali" class="form-control norad valid">';
                                                                echo '<option>-- Pilih --</option>';
                                                                while ( $warganegara = $query->fetch_assoc() ) {
                                                                    $id_warganegara_wali = $warganegara['IDwn'];
                                                                    $warganegara_wali = $warganegara['WargaNegara'];
                                                                    
                                                                    echo "<option value=". $id_warganegara_wali .">". $warganegara_wali ."</option>";
                                                                }
                                                                echo '</select>';
                                                                ?>     
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group ">
                                                            <div class="col-lg-2">
                                                                <label>Alamat Rumah</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <textarea name="alamat_rumah_wali" class="form-control" rows="3" placeholder="Alamat Rumah"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-lg-2">
                                                                <label>Tempat/ Tanggal Lahir</label>
                                                            </div>
                                                            <div class="col-lg-5">
                                                                <input type="text" name="tempat_lahir_wali" class="form-control" autocomplete="off" placeholder="Tempat Lahir">
                                                            </div>
                                                             <div class="col-lg-5">
                                                                <input type="text" name="tanggal_lahir_wali" class="form-control datepicker" id="tanggal_lahir_wali" placeholder="Tanggal Lahir">
                                                            </div>
                                                        </div>   

                                                        <div class="form-group ">
                                                            <div class="col-lg-2">
                                                                <label>Pendidikan</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <?php
                                                                $query = $psbo->query( "SELECT * FROM dbpsbo.pendidikan" );
                                                                echo '<select id="id_pendidikan_wali" name="id_pendidikan_wali" class="form-control norad valid">';
                                                                echo '<option>-- Pilih --</option>';
                                                                while ( $pendidikan_wali = $query->fetch_assoc() ) {
                                                                    $id_pendidikan_wali = $pendidikan_wali['IDPendidikan'];
                                                                    $pendidikan_wali = $pendidikan_wali['Pendidikan'];
                                                                    
                                                                    echo "<option value=". $id_pendidikan_wali .">". $pendidikan_wali ."</option>";
                                                                }
                                                                echo '</select>';
                                                                ?>

                                                            </div>
                                                        </div>

                                                        <div class="form-group ">
                                                            <div class="col-lg-2">
                                                                <label>Pekerjaan</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <?php
                                                                $query = $psbo->query( "SELECT * FROM dbpsbo.pekerjaan" );
                                                                echo '<select id="id_pekerjaan_wali" name="id_pekerjaan_wali" class="form-control norad valid">';
                                                                echo '<option>-- Pilih --</option>';
                                                                while ( $pekerjaan_wali = $query->fetch_assoc() ) {
                                                                    $id_pekerjaan_wali = $pekerjaan_wali['IDPekerjaan'];
                                                                    $pekerjaan_wali = $pekerjaan_wali['Pekerjaan'];

                                                                    echo "<option value=". $id_pekerjaan_wali .">". $pekerjaan_wali ."</option>";
                                                                }
                                                                echo '</select>';
                                                                ?>
                                                            </div>
                                                        </div>

                                                        <div class="form-group ">
                                                            <div class="col-lg-2">
                                                                <label>No. Telepon</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <input type="text" name="no_telp_wali" class="form-control" autocomplete="off" placeholder="No. Telepon">
                                                            </div>
                                                        </div>

                                                        <div class="form-group ">
                                                            <div class="col-lg-2">
                                                                <label>Alamat Kantor</label>
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <textarea name="alamat_kantor_wali" class="form-control" rows="3" placeholder="Alamat Kantor"></textarea>
                                                            </div>
                                                        </div>

                                                    </div> <!-- -->
                                                </div> <!-- -->
                                            </div> <!-- -->

                                            <div class="col-xs-12 no-padding">
                                                <div class="card" style="box-shadow: none;">
                                                    <div class="card-header">
                                                        <div class="card-title">
                                                            <div class="title">DATA PENDIDIKAN</div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body" style="padding-left: 0; padding-right: 0;">
                                
                                                        <table class="table table-hover table-bordered" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr align="center">
                                                                    <td rowspan="2" style="line-height: 59px;">Nama Lembaga Pendidikan</td>
                                                                    <td rowspan="2" style="line-height: 59px;">Jenjang Pendidikan</td>
                                                                    <td rowspan="2" style="line-height: 59px;">Jurusan</td>
                                                                    <td rowspan="2" style="line-height: 59px;">Kota</td>
                                                                    <td colspan="2">Lama Pendidikan (Tahun)</td>
                                                                </tr>
                                                                <tr align="center">
                                                                    <td>Mulai</td>
                                                                    <td>Sampai</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><input type="text" name="nama_tk" class="form-control"></td>
                                                                    <td>TK</td>
                                                                    <td>-</td>
                                                                    <td><input type="text" name="tk_kota" class="form-control"></td>
                                                                    <td><input type="text" name="tk_masuk" class="form-control input-short-1"></td>
                                                                    <td><input type="text" name="tk_keluar" class="form-control input-short-1"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="text" name="nama_sd" class="form-control"></td>
                                                                    <td>SD</td>
                                                                    <td>-</td>
                                                                    <td><input type="text" name="sd_kota" class="form-control"></td>
                                                                    <td><input type="text" name="sd_masuk" class="form-control input-short-1"></td>
                                                                    <td><input type="text" name="sd_keluar" class="form-control input-short-1"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="text" name="nama_smp" class="form-control"></td>
                                                                    <td>SMP</td>
                                                                    <td>-</td>
                                                                    <td><input type="text" name="smp_kota" class="form-control"></td>
                                                                    <td><input type="text" name="smp_masuk" class="form-control input-short-1"></td>
                                                                    <td><input type="text" name="smp_keluar" class="form-control input-short-1"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="text" name="nama_slta" class="form-control"></td>
                                                                    <td>SMA / SMK / SLTA / Sederajat</td>
                                                                    <td><input type="text" name="slta_jurusan" class="form-control"></td>
                                                                    <td><input type="text" name="slta_kota" class="form-control"></td>
                                                                    <td><input type="text" name="slta_masuk" class="form-control input-short-1"></td>
                                                                    <td><input type="text" name="slta_keluar" class="form-control input-short-1"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="text" name="nama_d3" class="form-control"></td>
                                                                    <td>D3</td>
                                                                    <td><input type="text" name="d3_jurusan" class="form-control"></td>
                                                                    <td><input type="text" name="d3_kota" class="form-control"></td>
                                                                    <td><input type="text" name="d3_masuk" class="form-control input-short-1"></td>
                                                                    <td><input type="text" name="d3_keluar" class="form-control input-short-1"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="text" name="nama_s1" class="form-control"></td>
                                                                    <td>S1</td>
                                                                    <td><input type="text" name="s1_jurusan" class="form-control"></td>
                                                                    <td><input type="text" name="s1_kota" class="form-control"></td>
                                                                    <td><input type="text" name="s1_masuk" class="form-control input-short-1"></td>
                                                                    <td><input type="text" name="s1_keluar" class="form-control input-short-1"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="text" name="nama_s2" class="form-control"></td>
                                                                    <td>S2</td>
                                                                    <td><input type="text" name="s2_jurusan" class="form-control"></td>
                                                                    <td><input type="text" name="s2_kota" class="form-control"></td>
                                                                    <td><input type="text" name="s2_masuk" class="form-control input-short-1"></td>
                                                                    <td><input type="text" name="s2_keluar" class="form-control input-short-1"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="text" name="nama_s3" class="form-control"></td>
                                                                    <td>S3</td>
                                                                    <td><input type="text" name="s3_jurusan" class="form-control"></td>
                                                                    <td><input type="text" name="s3_kota" class="form-control"></td>
                                                                    <td><input type="text" name="s3_masuk" class="form-control input-short-1"></td>
                                                                    <td><input type="text" name="s3_keluar" class="form-control input-short-1"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                    </div> <!-- -->
                                                </div> <!-- -->
                                            </div> <!-- -->

                                            <div class="col-xs-12 no-padding">
                                                <div class="card" style="box-shadow: none;">
                                                    <div class="card-header">
                                                        <div class="card-title">
                                                            <div class="title">RIWAYAT PEKERJAAN</div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body" style="padding-left: 0; padding-right: 0;">
                                
                                                        <table class="table table-hover table-bordered" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr align="center">
                                                                    <td rowspan="2" style="line-height: 59px;">Nama Perusahaan</td>
                                                                    <td rowspan="2" style="line-height: 59px;">Alamat Perusahaan</td>
                                                                    <td rowspan="2" style="line-height: 59px;">Jenis Usaha</td>
                                                                    <td rowspan="2" style="line-height: 59px;">Jabatan</td>
                                                                    <td colspan="2">Lama Kerja (Tanggal / Tahun)</td>
                                                                    <td rowspan="2" style="line-height: 59px;">Alasan Berhenti</td>
                                                                </tr>
                                                                <tr align="center">
                                                                    <td>Mulai</td>
                                                                    <td>Sampai</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><input type="text" name="nama_perusahaan1" class="form-control"></td>
                                                                    <td><input type="text" name="alamat_perusahaan1" class="form-control"></td>
                                                                    <td><input type="text" name="jenis_usaha1" class="form-control"></td>
                                                                    <td><input type="text" name="riwayat_jabatan1" class="form-control"></td>
                                                                    <td><input type="text" name="riwayat_pekerjaan_mulai1" class="form-control input-short-1"></td>
                                                                    <td><input type="text" name="riwayat_pekerjaan_akhir1" class="form-control input-short-1"></td>
                                                                    <td><input type="text" name="alasan_berhenti1" class="form-control"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="text" name="nama_perusahaan2" class="form-control"></td>
                                                                    <td><input type="text" name="alamat_perusahaan2" class="form-control"></td>
                                                                    <td><input type="text" name="jenis_usaha2" class="form-control"></td>
                                                                    <td><input type="text" name="riwayat_jabatan2" class="form-control"></td>
                                                                    <td><input type="text" name="riwayat_pekerjaan_mulai2" class="form-control input-short-1"></td>
                                                                    <td><input type="text" name="riwayat_pekerjaan_akhir2" class="form-control input-short-1"></td>
                                                                    <td><input type="text" name="alasan_berhenti2" class="form-control"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="text" name="nama_perusahaan3" class="form-control"></td>
                                                                    <td><input type="text" name="alamat_perusahaan3" class="form-control"></td>
                                                                    <td><input type="text" name="jenis_usaha3" class="form-control"></td>
                                                                    <td><input type="text" name="riwayat_jabatan3" class="form-control"></td>
                                                                    <td><input type="text" name="riwayat_pekerjaan_mulai3" class="form-control input-short-1"></td>
                                                                    <td><input type="text" name="riwayat_pekerjaan_akhir3" class="form-control input-short-1"></td>
                                                                    <td><input type="text" name="alasan_berhenti3" class="form-control"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="text" name="nama_perusahaan4" class="form-control"></td>
                                                                    <td><input type="text" name="alamat_perusahaan4" class="form-control"></td>
                                                                    <td><input type="text" name="jenis_usaha4" class="form-control"></td>
                                                                    <td><input type="text" name="riwayat_jabatan4" class="form-control"></td>
                                                                    <td><input type="text" name="riwayat_pekerjaan_mulai4" class="form-control input-short-1"></td>
                                                                    <td><input type="text" name="riwayat_pekerjaan_akhir4" class="form-control input-short-1"></td>
                                                                    <td><input type="text" name="alasan_berhenti4" class="form-control"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="text" name="nama_perusahaan5" class="form-control"></td>
                                                                    <td><input type="text" name="alamat_perusahaan5" class="form-control"></td>
                                                                    <td><input type="text" name="jenis_usaha5" class="form-control"></td>
                                                                    <td><input type="text" name="riwayat_jabatan5" class="form-control"></td>
                                                                    <td><input type="text" name="riwayat_pekerjaan_mulai5" class="form-control input-short-1"></td>
                                                                    <td><input type="text" name="riwayat_pekerjaan_akhir5" class="form-control input-short-1"></td>
                                                                    <td><input type="text" name="alasan_berhenti5" class="form-control"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                    </div> <!-- -->
                                                </div> <!-- -->
                                            </div> <!-- -->

                                            <div class="col-xs-12 no-padding">
                                                <div class="card" style="box-shadow: none;">
                                                    <div class="card-header">
                                                        <div class="card-title">
                                                            <div class="title">PENGALAMAN ORGANISASI</div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body" style="padding-left: 0; padding-right: 0;">
                                
                                                        <table class="table table-hover table-bordered" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr align="center">
                                                                    <td>Organisasi</td>
                                                                    <td>Jenis Organisasi</td>
                                                                    <td>Jabatan</td>
                                                                    <td>Periode Keanggotaan (Tahun)</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><input type="text" name="organisasi1" class="form-control"></td>
                                                                    <td><input type="text" name="jenis_organisasi1" class="form-control"></td>
                                                                    <td><input type="text" name="jabatan_organisasi1" class="form-control"></td>
                                                                    <td><input type="text" name="periode_organisasi1" class="form-control"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="text" name="organisasi2" class="form-control"></td>
                                                                    <td><input type="text" name="jenis_organisasi2" class="form-control"></td>
                                                                    <td><input type="text" name="jabatan_organisasi2" class="form-control"></td>
                                                                    <td><input type="text" name="periode_organisasi2" class="form-control"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="text" name="organisasi3" class="form-control"></td>
                                                                    <td><input type="text" name="jenis_organisasi3" class="form-control"></td>
                                                                    <td><input type="text" name="jabatan_organisasi3" class="form-control"></td>
                                                                    <td><input type="text" name="periode_organisasi3" class="form-control"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="text" name="organisasi4" class="form-control"></td>
                                                                    <td><input type="text" name="jenis_organisasi4" class="form-control"></td>
                                                                    <td><input type="text" name="jabatan_organisasi4" class="form-control"></td>
                                                                    <td><input type="text" name="periode_organisasi4" class="form-control"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="text" name="organisasi5" class="form-control"></td>
                                                                    <td><input type="text" name="jenis_organisasi5" class="form-control"></td>
                                                                    <td><input type="text" name="jabatan_organisasi5" class="form-control"></td>
                                                                    <td><input type="text" name="periode_organisasi5" class="form-control"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                    </div> <!-- -->
                                                </div> <!-- -->
                                            </div> <!-- -->

                                            <div class="col-xs-12 no-padding">
                                                <div class="card" style="box-shadow: none;">
                                                    <div class="card-header">
                                                        <div class="card-title">
                                                            <div class="title">KEMAMPUAN BAHASA ASING</div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body" style="padding-left: 0; padding-right: 0;">
                                
                                                        <table class="table table-hover table-bordered" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr align="center">
                                                                    <td rowspan="2" style="line-height: 59px;">Bahasa</td>
                                                                    <td rowspan="2" style="line-height: 59px;">Digunakan Sejak Tahun</td>
                                                                    <td colspan="5">Membaca</td>
                                                                    <td colspan="5">Menulis</td>
                                                                    <td colspan="5">Berbicara</td>
                                                                </tr>
                                                                <tr align="center">
                                                                    <td>KS</td>
                                                                    <td>K</td>
                                                                    <td>C</td>
                                                                    <td>B</td>
                                                                    <td>BS</td>
                                                                    <td>KS</td>
                                                                    <td>K</td>
                                                                    <td>C</td>
                                                                    <td>B</td>
                                                                    <td>BS</td>
                                                                    <td>KS</td>
                                                                    <td>K</td>
                                                                    <td>C</td>
                                                                    <td>B</td>
                                                                    <td>BS</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td align="center"><input type="text" name="bahasa_asing1" class="form-control"></td>
                                                                    <td align="center"><input type="text" name="digunakan_sejak1" class="form-control"></td>
                                                                    <td align="center"><input type="radio" name="membaca1" value="KS"></td>
                                                                    <td align="center"><input type="radio" name="membaca1" value="K"></td>
                                                                    <td align="center"><input type="radio" name="membaca1" value="C"></td>
                                                                    <td align="center"><input type="radio" name="membaca1" value="B"></td>
                                                                    <td align="center"><input type="radio" name="membaca1" value="BS"></td>
                                                                    <td align="center"><input type="radio" name="menulis1" value="KS"></td>
                                                                    <td align="center"><input type="radio" name="menulis1" value="K"></td>
                                                                    <td align="center"><input type="radio" name="menulis1" value="C"></td>
                                                                    <td align="center"><input type="radio" name="menulis1" value="B"></td>
                                                                    <td align="center"><input type="radio" name="menulis1" value="BS"></td>
                                                                    <td align="center"><input type="radio" name="berbicara1" value="KS"></td>
                                                                    <td align="center"><input type="radio" name="berbicara1" value="K"></td>
                                                                    <td align="center"><input type="radio" name="berbicara1" value="C"></td>
                                                                    <td align="center"><input type="radio" name="berbicara1" value="B"></td>
                                                                    <td align="center"><input type="radio" name="berbicara1" value="BS"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center"><input type="text" name="bahasa_asing2" class="form-control"></td>
                                                                    <td align="center"><input type="text" name="digunakan_sejak2" class="form-control"></td>
                                                                    <td align="center"><input type="radio" name="membaca2" value="KS"></td>
                                                                    <td align="center"><input type="radio" name="membaca2" value="K"></td>
                                                                    <td align="center"><input type="radio" name="membaca2" value="C"></td>
                                                                    <td align="center"><input type="radio" name="membaca2" value="B"></td>
                                                                    <td align="center"><input type="radio" name="membaca2" value="BS"></td>
                                                                    <td align="center"><input type="radio" name="menulis2" value="KS"></td>
                                                                    <td align="center"><input type="radio" name="menulis2" value="K"></td>
                                                                    <td align="center"><input type="radio" name="menulis2" value="C"></td>
                                                                    <td align="center"><input type="radio" name="menulis2" value="B"></td>
                                                                    <td align="center"><input type="radio" name="menulis2" value="BS"></td>
                                                                    <td align="center"><input type="radio" name="berbicara2" value="KS"></td>
                                                                    <td align="center"><input type="radio" name="berbicara2" value="K"></td>
                                                                    <td align="center"><input type="radio" name="berbicara2" value="C"></td>
                                                                    <td align="center"><input type="radio" name="berbicara2" value="B"></td>
                                                                    <td align="center"><input type="radio" name="berbicara2" value="BS"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center"><input type="text" name="bahasa_asing3" class="form-control"></td>
                                                                    <td align="center"><input type="text" name="digunakan_sejak3" class="form-control"></td>
                                                                    <td align="center"><input type="radio" name="membaca3" value="KS"></td>
                                                                    <td align="center"><input type="radio" name="membaca3" value="K"></td>
                                                                    <td align="center"><input type="radio" name="membaca3" value="C"></td>
                                                                    <td align="center"><input type="radio" name="membaca3" value="B"></td>
                                                                    <td align="center"><input type="radio" name="membaca3" value="BS"></td>
                                                                    <td align="center"><input type="radio" name="menulis3" value="KS"></td>
                                                                    <td align="center"><input type="radio" name="menulis3" value="K"></td>
                                                                    <td align="center"><input type="radio" name="menulis3" value="C"></td>
                                                                    <td align="center"><input type="radio" name="menulis3" value="B"></td>
                                                                    <td align="center"><input type="radio" name="menulis3" value="BS"></td>
                                                                    <td align="center"><input type="radio" name="berbicara3" value="KS"></td>
                                                                    <td align="center"><input type="radio" name="berbicara3" value="K"></td>
                                                                    <td align="center"><input type="radio" name="berbicara3" value="C"></td>
                                                                    <td align="center"><input type="radio" name="berbicara3" value="B"></td>
                                                                    <td align="center"><input type="radio" name="berbicara3" value="BS"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        <p class="help-block">Keterangan : </p>
                                                        <ul>
                                                            <li>KS : Kurang Sekali</li>
                                                            <li>K : Kurang</li>
                                                            <li>C : Cukup</li>
                                                            <li>B : Baik</li>
                                                            <li>BS : Baik sekali</li>
                                                        </ul>
                                                    </div> <!-- -->
                                                </div> <!-- -->
                                            </div> <!-- -->
                                            <!-- <div class="form-group pull-right">
                                                <div class="col-lg-12">
                                                    <button type="submit" name="next-step-from-data-diri" class="btn btn-info">Selanjutnya ></button>
                                                </div>
                                            </div> -->
                                            <div class="form-group pull-right">
                                                <div class="col-lg-12">
                                                    <a href="javascript:history.back()" class="btn btn-danger">Batal</a>
                                                    <button type="submit" name="btn-add-data-pelamar" class="btn btn-info">Selanjutnya</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                <?php } elseif ( isset( $_GET['p'] ) == 'tambah-calon-guru' AND $param_pelamar == 'berkas-lamaran' AND isset( $_GET['keycode'] ) ) { ?>

                                     <form name="myForm" action="action-insert.php" method="post" class="form-horizontal form-label-left">
                                        <div class="tab-pane fade in active">
                                            <div class="col-xs-12 no-padding question-crew">
                                                <div class="card" style="box-shadow: none;">
                                                    <div class="card-header">
                                                        <div class="card-title">
                                                            <div class="title">KELENGKAPAN BERKAS CALON KARYAWAN</div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body" style="padding-left: 0; padding-right: 0;">
                                                        <?php 
                                                        if ( empty( $_SESSION['success_input_data_diri_guru'] ) ) :
                                                           if ( !empty( $_SESSION['admin_id_recruitment'] ) ) {
                                                                echo "<meta http-equiv='refresh' content='0; url=./'>"; 
                                                            }
                                                        endif;

                                                        echo '<input type="hidden" name="keycode" value='.$_GET['keycode'].'>';

                                                        // $data_berkas_for_check = $sdm->query( "SELECT * FROM kelengkapan_berkas WHERE id_calon_karyawan = '".base64_decode( $_GET['keycode'] )."'" );
                                                        // $check_berkas = $data_berkas_for_check->num_rows;

                                                        // if ( $check_berkas >= 1 ) {
                                                        //     echo "<meta http-equiv='refresh' content='0; url=./'>"; 
                                                        // }

                                                        $data_berkas = $sdm->query( "SELECT * FROM master_berkas WHERE kategori_pegawai = 'guru'" );
                                                        $no = 1; while ( $data = $data_berkas->fetch_assoc() ) { 
                                                        ?>
                                                            <div class="col-md-12 no-padding">
                                                                <input type="hidden" name="kelengkapan_berkas[]" value="<?php echo $data['kelengkapan_berkas']; ?>">
                                                                <div class="checkbox3 checkbox-inline checkbox-check checkbox-light">
                                                                    <input type="checkbox" id="berkas<?php echo $no; ?>" name="berkas[]" value="<?php echo $data['id_berkas']; ?>">

                                                                    <label for="berkas<?php echo $no; ?>"><?php echo $data['kelengkapan_berkas']; ?></label>
                                                                </div>
                                                            </div>
                                                        <?php $no++; } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group pull-right">
                                                <div class="col-lg-12">
                                                    <!-- <button type="button" class="btn btn-danger" onclick="window.history.go(-1);">Batal</button> -->
                                                    <button type="submit" name="next-step-from-berkas-guru" class="btn btn-info">Selanjutnya ></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                <?php } elseif ( isset( $_GET['p'] ) == 'tambah-calon-guru' AND $param_pelamar == 'pertanyaan-calon-guru' AND isset( $_GET['keycode'] ) ) { ?>

                                    <form name="myForm" action="action-insert.php" method="post" class="form-horizontal form-label-left" id="form-questions">
                                        <div class="tab-pane fade in active">
                                            <div class="col-xs-12 no-padding question-crew">
                                                <div class="card" style="box-shadow: none;">
                                                    <div class="card-header">
                                                        <div class="card-title">
                                                            <div class="title">PERTANYAAN UNTUK CALON KARYAWAN</div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body" style="padding-left: 0; padding-right: 0;">

                                                        <?php 
                                                        if ( empty( $_SESSION['success_input_berkas_guru'] ) ) :
                                                            if ( !empty( $_SESSION['admin_id_recruitment'] ) ) {
                                                                echo "<meta http-equiv='refresh' content='0; url=./'>"; 
                                                            }
                                                        endif;

                                                        $get_keycode        = $sdm->real_escape_string( anti_injection( base64_decode( $_GET['keycode'] ) ) );
                                                        $normal_keycode     = substr( $get_keycode, 0, -6 );
                                                        echo '<input type="hidden" name="keycode" value='.base64_encode( $normal_keycode.'pertanyaan-gr' ).'>';

                                                        $data_soal = $sdm->query( "SELECT * FROM master_soal WHERE kategori_pegawai = 'guru'" );
                                                        $no = 1; while ( $data = $data_soal->fetch_assoc() ) { 
                                                        ?>
                                                            <div class="form-group">
                                                                <div class="col-xs-12">
                                                                    <label style="font-size: 14px !important; width: 100%;"><?php echo '<span class="no">'.$no.'</span>&nbsp;'. $data['soal']; ?></label>
                                                                    <input type="hidden" name="id_soal[]" value="<?php echo $data['id_soal']; ?>">
                                                                    <textarea name="jawaban[]" class="form-control jawaban ckeditor" rows="3"></textarea>
                                                                </div>
                                                            </div>
                                                        <?php $no++; } ?>
                            
                                                    </div> <!-- -->
                                                </div> <!-- -->
                                            </div> <!-- -->
                                        </div>

                                        <div class="form-group pull-right">
                                            <div class="col-lg-12">
                                                <!-- <a href="action-delete.php" name="cancel-lamaran" class="btn btn-danger">Batal</a> -->
                                                <button type="submit" name="finish-step-from-question-teacher" class="btn btn-info finish-step-from-question-teacher">Finish</button>
                                            </div>
                                        </div>
                                    </form>

                                <?php } else {

                                    echo "<meta http-equiv='refresh' content='0; url=./?p=tambah-calon-guru&step=data-calon-guru'>"; 
                                } 
                                ?>
                            </div>
                        </div> <!-- end: step -->

                        
                    </div> <!-- end: card-body -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- START: POP-UP FOR ADD DATA -->
<div aria-hidden="true" role="dialog" tabindex="-1" id="myModal-add-data" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content my-modal-content">
            <div class="modal-header my-header-webcame">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Ambil Foto</h4>
            </div>
            <div class="modal-body my-body-webcame">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel-body">
                            <div class="content-photo">
                                
                                <div class="center-area-photo"></div>
                                <div class="center-line-vertical"></div>
                                <div class="center-line-horizontal"></div>
                                <div id="my_camera"></div>
                                <input type="button" class="btn btn-danger btn-take-pic btn-webcame" value="Ambil Foto" onClick="take_snapshot()">

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- END: POP-UP FOR ADD DATA -->


<script>
    // $(document).ready(function() {
    //     // jabatan
    //     $("#myunit").on('change', function() {
    //         var id_master_unit = $(this).val(); // this.value
    //         if (id_master_unit) {
    //             $.ajax({ 
    //                 url: 'jabatan-ajax.php',
    //                 data: { id_master_unit: id_master_unit },
    //                 type: 'post'
    //             }).done(function(responseData) {
    //                 $('#myjabatan').html(responseData);
    //                 $('#mysubjabatan').html(''); 
    //                 console.log('Done: ', responseData);
    //             }).fail(function() {
    //                 console.log('Failed');
    //             });
    //         } else {
    //             $('#myjabatan').html('<option value="">Pilih Unit Terlebih Dahulu</option>');
    //             $('#mysubjabatan').html(''); 
    //         }
    //     });

    //     // sub jabatan
    //     $("#myjabatan").on('change', function() {
    //         var id_master_jabatan = $(this).val(); // this.value
    //         // alert(id_master_jabatan);
    //         if (id_master_jabatan) {
    //             $.ajax({ 
    //                 url: 'jabatan-ajax.php',
    //                 data: { id_master_jabatan: id_master_jabatan },
    //                 type: 'post'
    //             }).done(function(responseData) {
    //                 $('#mysubjabatan').html(responseData);
    //                 console.log('Done: ', responseData);
    //             }).fail(function() {
    //                 console.log('Failed');
    //             });
    //         } else {
    //             $('#mysubjabatan').html('<option value="">Pilih Jabatan Terlebih Dahulu</option>'); 
    //         }
    //     });
    // });
</script>