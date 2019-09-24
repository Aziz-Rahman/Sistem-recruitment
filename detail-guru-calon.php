<?php
// check session finish recruitment
if ( empty( $_SESSION['finish_recruitment'] ) ) :
    echo "<meta http-equiv='refresh' content='0; url=./'>"; 
endif;

$param_pelamar = isset( $_GET['step'] ) ? $_GET['step'] : '';

$kode   = $sdm->real_escape_string( anti_injection( base64_decode( $_GET['id'] ) ) );
$query  = $sdm->query( "SELECT * FROM calon_karyawan 
                        LEFT JOIN agama ON calon_karyawan.id_agama = agama.IDAgama  
                        LEFT JOIN warganegara ON calon_karyawan.id_warganegara = warganegara.IDwn 
                        LEFT JOIN dbpsbo.pekerjaan ON calon_karyawan.pekerjaan_suami_istri = dbpsbo.pekerjaan.IDPekerjaan  
                        WHERE calon_karyawan.id_calon_karyawan = '$kode'" );  
$data   = $query->fetch_assoc(); 


// Get data kelengkapan berkas for edit
// $data_berkas_sql = $sdm->query( "SELECT * FROM kelengkapan_berkas 
// LEFT JOIN master_berkas ON kelengkapan_berkas.id_berkas = master_berkas.id_berkas 
// LEFT JOIN calon_karyawan ON kelengkapan_berkas.id_calon_karyawan = calon_karyawan.id_calon_karyawan 
// WHERE calon_karyawan.id_calon_karyawan = '".$data['id_calon_karyawan']."'" 
// );
// $data_berkas = $data_berkas_sql->fetch_assoc(); 

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
                    <li><i class="fa fa-laptop"></i>Detail Calon Guru</li>                          
                </ol>
            </div>
        </div>

        <div class="page-title">
            <span class="title">Detail Calon Guru</span>
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

                        <!-- START: POP-UP FOR EDIT DATA PRIBADI -->
                        <div aria-hidden="true" aria-labelledby="myModalDataPribadiLabel<?php echo $data['id_calon_karyawan']; ?>" role="dialog" tabindex="-1" id="myModalDataPribadi<?php echo $data['id_calon_karyawan']; ?>" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                        <h4 class="modal-title">Edit Data Pribadi Calon Guru</h4>
                                    </div>
                                    <div class="modal-body">

                                        <form role="form" method="post" action="action-update.php?id=<?php echo base64_encode( $data['id_calon_karyawan'] ); ?>" class="form-horizontal form-label-left popup-edit-crew">

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Nama Lengkap</label>
                                                    <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['nama_lengkap']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-6" style="margin-bottom: 15px;">
                                                    <label>Tempat Lahir</label>
                                                    <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['tempat_lahir']; ?>">
                                                </div>
                                                <div class="col-lg-6" style="margin-bottom: 15px;">
                                                    <?php
                                                    if ( empty( $data['tanggal_lahir'] ) || $data['tanggal_lahir'] == '0000-00-00' ) {
                                                        $tanggal_lahir = '';
                                                    } else {
                                                        $tanggal_lahir = date_format( date_create( $data['tanggal_lahir'] ), "d-m-Y" );
                                                    }
                                                   ?>
                                                    <label>Tanggal Lahir</label>
                                                    <input type="text" name="tanggal_lahir" class="form-control datepicker" id="tanggal_lahir<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $tanggal_lahir; ?>">
                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <div class="col-lg-6" style="margin-bottom: 15px;">
                                                    <label for="">Jenis kelamin</label>
                                                    <div class="clearfix"></div>
                                                    <?php $checked = 'checked="checked"'; ?>
                                                    <div class="radio3 radio-check radio-success radio-inline">
                                                        <input type="radio" id="radio5" name="jenis_kelamin" value="L" <?php if ( $data['jenis_kelamin'] == 'L' ) echo $checked; ?>>
                                                        <label for="radio5">Laki - laki</label>
                                                    </div>
                                                    <div class="radio3 radio-check radio-success radio-inline">
                                                        <input type="radio" id="radio6" name="jenis_kelamin" value="P" <?php if ( $data['jenis_kelamin'] == 'P' ) echo $checked; ?>>
                                                        <label for="radio6">Perempuan</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Kewarganegaraan</label>
                                                    <?php
                                                    $query = $sdm->query( "SELECT * FROM warganegara" );
                                                    echo '<select id="id_warganegara" name="id_warganegara" class="form-control norad valid">';
                                                    echo '<option>-- Pilih --</option>';
                                                    while ( $warganegara = $query->fetch_assoc() ) {
                                                        $id_warganegara = $warganegara['IDwn'];
                                                        $warganegara = $warganegara['WargaNegara'];
                                                        
                                                        if ( $data['id_warganegara'] == $id_warganegara ) {
                                                           $selected = "selected";
                                                        } else {
                                                           $selected = null;
                                                        }

                                                        echo "<option value=". $id_warganegara ." $selected>". $warganegara ."</option>";
                                                    }
                                                    echo '</select>';
                                                    ?>
                                                </div> 
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Suku</label>
                                                    <input type="text" name="suku" class="form-control" id="suku<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['suku']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Agama</label>
                                                    <?php
                                                    $query = $sdm->query( "SELECT * FROM agama" );
                                                    echo '<select id="id_agama" name="id_agama" class="form-control norad valid">';
                                                    echo '<option>-- Pilih --</option>';
                                                    while ( $agama = $query->fetch_assoc() ) {
                                                        $id_agama = $agama['IDAgama'];
                                                        $agama = $agama['Agama'];
                                                        
                                                        if ( $data['id_agama'] == $id_agama ) {
                                                           $selected = "selected";
                                                        } else {
                                                           $selected = null;
                                                        }

                                                        echo "<option value=". $id_agama ." $selected>". $agama ."</option>";
                                                    }
                                                    echo '</select>';
                                                    ?>        
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Golongan Darah</label>
                                                    <input type="text" name="gol_darah" class="form-control" id="gol_darah<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['gol_darah']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Status Perkawinan</label>
                                                    <select name="status_perkawinan" id="status_perkawinan" class="form-control select-option">
                                                        <?php if ( empty( $data['status_perkawinan'] ) || $data['status_perkawinan'] == "0" ) : ?>
                                                            <option value="1">Single/ Belum menikah</option>
                                                            <option value="2">Menikah</option>
                                                        <?php elseif ( $data['status_perkawinan'] == "1" ) : ?>
                                                            <option value="1" selected>Single/ Belum menikah</option>
                                                            <option value="2">Menikah</option>
                                                        <?php elseif ( $data['status_perkawinan'] == "2" ) : ?>
                                                            <option value="1">Single/ Belum menikah</option>
                                                            <option value="2" selected>Menikah</option>
                                                        <?php endif; ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-6" style="margin-bottom: 15px;">
                                                    <label>Anak Ke</label>
                                                    <input type="text" name="anak_ke" class="form-control" id="anak_ke<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['anak_ke']; ?>">
                                                </div>
                                                <div class="col-lg-3" style="margin-bottom: 15px;">
                                                    <label>Dari</label>
                                                    <input type="text" name="jumlah_saudara" class="form-control" id="jumlah_saudara<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['jumlah_saudara']; ?>">
                                                </div>
                                                <div class="col-lg-3" style="margin-top: 30px;">
                                                    <span style="margin-bottom: 15px;">Bersaudara</span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <button type="submit" name="btn-update-data-diri-calon-karyawan" value="<?php echo $data['id_calon_karyawan']; ?>" class="update-class btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </form>

                                        <div class="clearfix"></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: POP-UP FOR EDIT DATA PRIBADI -->

                        <!-- START: POP-UP FOR EDIT DATA ALAMAT -->
                        <div aria-hidden="true" aria-labelledby="myModalAlamatLabel<?php echo $data['id_calon_karyawan']; ?>" role="dialog" tabindex="-1" id="myModalAlamat<?php echo $data['id_calon_karyawan']; ?>" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                        <h4 class="modal-title">Edit Alamat Calon Karyawan</h4>
                                    </div>
                                    <div class="modal-body">

                                        <form role="form" method="post" action="action-update.php?id=<?php echo base64_encode( $data['id_calon_karyawan'] ); ?>" class="form-horizontal form-label-left popup-edit-crew">
                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Alamat Domisili Saat Ini</label>
                                                    <input type="text" name="alamat_domisili" class="form-control" id="alamat_domisili<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['alamat_domisili']; ?>">
                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Status Tempat Tinggal</label>
                                                    <select name="status_tempat_tinggal" id="status_tempat_tinggal" class="form-control select-option">
                                                        <?php if ( empty( $data['status_tempat_tinggal'] ) || $data['status_tempat_tinggal'] == "0" ) : ?>
                                                            <option value="1">Rumah Pribadi</option>
                                                            <option value="2">Rumah Keluarga</option>
                                                            <option value="3">Kontrak/ Kost</option>
                                                        <?php elseif ( $data['status_tempat_tinggal'] == "1" ) : ?>
                                                            <option value="1" selected>Rumah Pribadi</option>
                                                            <option value="2">Rumah Keluarga</option>
                                                            <option value="3">Kontrak/ Kost</option>
                                                        <?php elseif ( $data['status_tempat_tinggal'] == "2" ) : ?>
                                                            <option value="1">Rumah Pribadi</option>
                                                            <option value="2" selected>Rumah Keluarga</option>
                                                            <option value="3">Kontrak/ Kost</option>
                                                        <?php elseif ( $data['status_tempat_tinggal'] == "3" ) : ?>
                                                            <option value="1">Rumah Pribadi</option>
                                                            <option value="2">Rumah Keluarga</option>
                                                            <option value="3" selected>Kontrak/ Kost</option>
                                                        <?php endif; ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>No. Telepon Rumah</label>
                                                    <input type="text" name="no_telp_rumah" class="form-control" id="no_telp_rumah<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['no_telp_rumah']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>No. Hp</label>
                                                    <input type="text" name="no_hp" class="form-control" id="no_hp<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['no_hp']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Email</label>
                                                    <input type="text" name="email" class="form-control" id="email<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['email']; ?>">
                                                </div>
                                            </div>

                                            <hr><p class="help-block">#Dalam keadaan darurat, yang dapat dihubungi:</p>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Nama Lengkap</label>
                                                    <input type="text" name="nama_darurat" class="form-control" id="nama_darurat<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['nama_darurat']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Hubungan</label>
                                                    <input type="text" name="hubungan_darurat" class="form-control" id="hubungan_darurat<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['hubungan_darurat']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Alamat</label>
                                                    <input type="text" name="alamat_darurat" class="form-control" id="alamat_darurat<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['alamat_darurat']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <button type="submit" name="btn-update-data-alamat-calon-karyawan" value="<?php echo $data['id_calon_karyawan']; ?>" class="update-class btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </form>

                                        <div class="clearfix"></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: POP-UP FOR EDIT DATA ALAMAT -->


                        <!-- START: POP-UP FOR EDIT DATA IDENTITAS -->
                        <div aria-hidden="true" aria-labelledby="myModalIdentitasLabel<?php echo $data['id_calon_karyawan']; ?>" role="dialog" tabindex="-1" id="myModalDataIdentitas<?php echo $data['id_calon_karyawan']; ?>" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                        <h4 class="modal-title">Edit Data Identitas Calon Karyawan</h4>
                                    </div>
                                    <div class="modal-body">

                                        <form role="form" method="post" action="action-update.php?id=<?php echo base64_encode( $data['id_calon_karyawan'] ); ?>" class="form-horizontal form-label-left popup-edit-crew">
                                            <p class="help-block">#KTP</p>
                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>No. KTP</label>
                                                    <input type="text" name="no_ktp" class="form-control" id="no_ktp<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['no_ktp']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Dikeluarkan di</label>
                                                    <input type="text" name="ktp_dikeluarkan_di" class="form-control" id="ktp_dikeluarkan_di<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['ktp_dikeluarkan_di']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Masa Berlaku KTP</label>
                                                    <?php  
                                                    $masa_berlaku_ktp = ''; 
                                                    if ( empty( $data['masa_berlaku_ktp'] ) || $data['masa_berlaku_ktp'] == '0000-00-00' ) {
                                                        $masa_berlaku_ktp = ''; 
                                                    } else {
                                                        $masa_berlaku_ktp =  date_format( date_create( $data['masa_berlaku_ktp'] ), "d-m-Y" );
                                                    }
                                                    ?>
                                                    <input type="text" name="masa_berlaku_ktp" class="form-control datepicker" id="masa_berlaku_ktp<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $masa_berlaku_ktp; ?>">
                                                </div>
                                            </div>

                                            <hr><p class="help-block">#SIM</p>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>No. SIM</label>
                                                    <input type="text" name="no_sim" class="form-control" id="no_sim<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['no_sim']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Dikeluarkan di</label>
                                                    <input type="text" name="sim_dikeluarkan_di" class="form-control" id="sim_dikeluarkan_di<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['sim_dikeluarkan_di']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Masa Berlaku SIM</label>
                                                    <?php  
                                                    $masa_berlaku_sim = ''; 
                                                    if ( empty( $data['masa_berlaku_sim'] ) || $data['masa_berlaku_sim'] == '0000-00-00' ) {
                                                        $masa_berlaku_sim = ''; 
                                                    } else {
                                                        $masa_berlaku_sim =  date_format( date_create( $data['masa_berlaku_sim'] ), "d-m-Y" );
                                                    }
                                                    ?>
                                                    <input type="text" name="masa_berlaku_sim" class="form-control datepicker" id="masa_berlaku_sim<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $masa_berlaku_sim; ?>">
                                                </div>
                                            </div>

                                            <hr><p class="help-block">#Passport</p>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>No. Passport</label>
                                                    <input type="text" name="no_passport" class="form-control" id="no_passport<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['no_passport']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Dikeluarkan di</label>
                                                    <input type="text" name="passport_dikeluarkan_di" class="form-control" id="passport_dikeluarkan_di<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['passport_dikeluarkan_di']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Masa Berlaku Passport</label>
                                                    <?php  
                                                    $masa_berlaku_passport = ''; 
                                                    if ( empty( $data['masa_berlaku_passport'] ) || $data['masa_berlaku_passport'] == '0000-00-00' ) {
                                                        $masa_berlaku_passport = ''; 
                                                    } else {
                                                        $masa_berlaku_passport =  date_format( date_create( $data['masa_berlaku_passport'] ), "d-m-Y" );
                                                    }
                                                    ?>
                                                    <input type="text" name="masa_berlaku_passport" class="form-control datepicker" id="masa_berlaku_passport<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $masa_berlaku_passport; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <button type="submit" name="btn-update-data-identitas-calon-karyawan" value="<?php echo $data['id_calon_karyawan']; ?>" class="update-class btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </form>

                                        <div class="clearfix"></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: POP-UP FOR EDIT DATA IDENTITAS -->

                        <!-- START: POP-UP FOR EDIT DATA KELUARGA -->
                        <div aria-hidden="true" aria-labelledby="myModalKeluargaLabel<?php echo $data['id_calon_karyawan']; ?>" role="dialog" tabindex="-1" id="myModalDataKeluarga<?php echo $data['id_calon_karyawan']; ?>" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                        <h4 class="modal-title">Edit Data Keluarga Calon Karyawan</h4>
                                    </div>
                                    <div class="modal-body">

                                        <form role="form" method="post" action="action-update.php?id=<?php echo base64_encode( $data['id_calon_karyawan'] ); ?>" class="form-horizontal form-label-left popup-edit-crew">
                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Nama Suami/ Istri</label>
                                                    <input type="text" name="nama_suami_istri" class="form-control" id="nama_suami_istri<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['nama_suami_istri']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Pekerjaan Suami/ Istri</label>
                                                    <?php
                                                    $query = $psbo->query( "SELECT * FROM dbpsbo.pekerjaan" );
                                                    echo '<select id="pekerjaan_suami_istri" name="pekerjaan_suami_istri" class="form-control norad valid">';
                                                    echo '<option>-- Pilih --</option>';
                                                    while ( $data_pekerjaan = $query->fetch_assoc() ) {
                                                        $IDPekerjaan = $data_pekerjaan['IDPekerjaan'];
                                                        $pekerjaan_suami_istri = $data_pekerjaan['Pekerjaan'];
                                                        
                                                        if ( $data['pekerjaan_suami_istri'] == $IDPekerjaan ) {
                                                           $selected = "selected";
                                                        } else {
                                                           $selected = null;
                                                        }

                                                        echo "<option value=". $IDPekerjaan ." $selected>". $pekerjaan_suami_istri ."</option>";
                                                    }
                                                    echo '</select>';
                                                    ?>     
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Jumlah Anak</label>
                                                    <input type="text" name="jumlah_anak" class="form-control" id="jumlah_anak<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['jumlah_anak']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group data_nama_anak1">
                                                <div class="col-lg-2">
                                                    <label>Nama Anak</label>
                                                </div>
                                                <div class="col-lg-6" style="margin-bottom: 15px;">
                                                    <input type="text" name="nama_anak1" class="form-control" autocomplete="off" value="<?php echo $data['nama_anak1']; ?>">
                                                </div>
                                                <div class="col-lg-1 text-right">Usia: </div>
                                                <div class="col-lg-2" style="margin-bottom: 15px;">
                                                    <input type="text" name="usia_anak1" class="form-control" autocomplete="off" value="<?php echo $data['usia_anak1']; ?>">
                                                </div>
                                                <?php if ( empty( $data['nama_anak2'] ) ) : ?>
                                                    <div class="col-lg-1">
                                                        <span class="add-child pull-right" id="add-child2"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                                                    </div>
                                                <?php endif; ?>
                                            </div>

                                            <div class="form-group <?php if ( empty( $data['nama_anak2'] ) ) echo 'data_nama_anak2'; ?>">
                                                <div class="col-lg-2">
                                                    <!-- <label>Nama Anak</label> -->
                                                </div>
                                                <div class="col-lg-6" style="margin-bottom: 15px;">
                                                    <input type="text" name="nama_anak2" class="form-control" autocomplete="off" value="<?php echo $data['nama_anak2']; ?>">
                                                </div>
                                                <div class="col-lg-1 text-right">Usia: </div>
                                                <div class="col-lg-2" style="margin-bottom: 15px;">
                                                    <input type="text" name="usia_anak2" class="form-control" autocomplete="off" value="<?php echo $data['usia_anak2']; ?>">
                                                </div>
                                                <?php if ( empty( $data['nama_anak3'] ) ) : ?>
                                                    <div class="col-lg-1">
                                                        <span class="add-child pull-right" id="add-child3"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                                                    </div>
                                                <?php endif; ?>
                                            </div>

                                            <div class="form-group <?php if ( empty( $data['nama_anak3'] ) ) echo 'data_nama_anak3'; ?>">
                                                <div class="col-lg-2">
                                                    <!-- <label>Nama Anak</label> -->
                                                </div>
                                                <div class="col-lg-6" style="margin-bottom: 15px;">
                                                    <input type="text" name="nama_anak3" class="form-control" autocomplete="off" value="<?php echo $data['usia_anak3']; ?>">
                                                </div>
                                                <div class="col-lg-1 text-right">Usia: </div>
                                                <div class="col-lg-2" style="margin-bottom: 15px;">
                                                    <input type="text" name="usia_anak3" class="form-control" autocomplete="off" value="<?php echo $data['usia_anak3']; ?>">
                                                </div>
                                                <?php if ( empty( $data['nama_anak4'] ) ) : ?>
                                                    <div class="col-lg-1">
                                                        <span class="add-child pull-right" id="add-child4"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                                                    </div>
                                                <?php endif; ?>
                                            </div>

                                            <div class="form-group <?php if ( empty( $data['nama_anak4'] ) ) echo 'data_nama_anak4'; ?>">
                                                <div class="col-lg-2">
                                                    <!-- <label>Nama Anak</label> -->
                                                </div>
                                                <div class="col-lg-6" style="margin-bottom: 15px;">
                                                    <input type="text" name="nama_anak4" class="form-control" autocomplete="off" value="<?php echo $data['nama_anak4']; ?>">
                                                </div>
                                                <div class="col-lg-1 text-right">Usia: </div>
                                                <div class="col-lg-2" style="margin-bottom: 15px;">
                                                    <input type="text" name="usia_anak4" class="form-control" autocomplete="off" value="<?php echo $data['usia_anak4']; ?>">
                                                </div>
                                                <?php if ( empty( $data['nama_anak5'] ) ) : ?>
                                                    <div class="col-lg-1">
                                                        <span class="add-child pull-right" id="add-child5"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                                                    </div>
                                                <?php endif; ?>
                                            </div>

                                            <div class="form-group <?php if ( empty( $data['nama_anak5'] ) ) echo 'data_nama_anak5'; ?>">
                                                <div class="col-lg-2">
                                                    <!-- <label>Nama Anak</label> -->
                                                </div>
                                                <div class="col-lg-6" style="margin-bottom: 15px;">
                                                    <input type="text" name="nama_anak5" class="form-control" autocomplete="off" value="<?php echo $data['nama_anak5']; ?>">
                                                </div>
                                                <div class="col-lg-1 text-right">Usia: </div>
                                                <div class="col-lg-2" style="margin-bottom: 15px;">
                                                    <input type="text" name="usia_anak5" class="form-control" autocomplete="off" value="<?php echo $data['usia_anak5']; ?>">
                                                </div>
                                                <!-- <div class="col-lg-1">
                                                    <span class="add-child" id="add-child5"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                                                </div> -->
                                            </div>
                                            
                                            <hr>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <button type="submit" name="btn-update-data-keluarga-calon-karyawan" value="<?php echo $data['id_calon_karyawan']; ?>" class="update-class btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </form>

                                        <div class="clearfix"></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: POP-UP FOR EDIT DATA KELUARGA -->


                        <!-- START: POP-UP FOR EDIT DATA  ORANG TUA/ WALI -->
                        <div aria-hidden="true" aria-labelledby="myModalOrtuLabel<?php echo $data['id_calon_karyawan']; ?>" role="dialog" tabindex="-1" id="myModalDataOrtu<?php echo $data['id_calon_karyawan']; ?>" class="modal fade">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                        <h4 class="modal-title">Edit Data Orang Tua/ Wali Calon Karyawan</h4>
                                    </div>
                                    <div class="modal-body">

                                        <form role="form" method="post" action="action-update.php?id=<?php echo base64_encode( $data['id_calon_karyawan'] ); ?>" class="form-horizontal form-label-left popup-edit-crew">
                                            <p class="help-block">#Data Ayah</p>
                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Nama Ayah</label>
                                                    <input type="text" name="nama_ayah" class="form-control" id="nama_ayah<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['nama_ayah']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Kewarganegaraan</label>
                                                    <?php
                                                    $query = $sdm->query( "SELECT * FROM warganegara" );
                                                    echo '<select id="id_warganegara_ayah" name="id_warganegara_ayah" class="form-control norad valid">';
                                                    echo '<option>-- Pilih --</option>';
                                                    while ( $warganegara_ayah = $query->fetch_assoc() ) {
                                                        $id_warganegara_ayah = $warganegara_ayah['IDwn'];
                                                        $warganegara = $warganegara_ayah['WargaNegara'];
                                                        
                                                        if ( $data['id_warganegara_ayah'] == $id_warganegara_ayah ) {
                                                           $selected = "selected";
                                                        } else {
                                                           $selected = null;
                                                        }

                                                        echo "<option value=". $id_warganegara_ayah ." $selected>". $warganegara ."</option>";
                                                    }
                                                    echo '</select>';
                                                    ?>
                                                </div> 
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Alamat Rumah</label>
                                                    <input type="text" name="alamat_rumah_ayah" class="form-control" id="alamat_rumah_ayah<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['alamat_rumah_ayah']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-6" style="margin-bottom: 15px;">
                                                    <label>Tempat Lahir</label>
                                                    <input type="text" name="tempat_lahir_ayah" class="form-control" id="tempat_lahir_ayah<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['tempat_lahir_ayah']; ?>">
                                                </div>
                                                <div class="col-lg-6" style="margin-bottom: 15px;">
                                                    <?php
                                                    if ( empty( $data['tanggal_lahir_ayah'] ) || $data['tanggal_lahir_ayah'] == '0000-00-00' ) {
                                                        $tanggal_lahir_ayah = '';
                                                    } else {
                                                        $tanggal_lahir_ayah = date_format( date_create( $data['tanggal_lahir_ayah'] ), "d-m-Y" );
                                                    }
                                                   ?>
                                                    <label>Tanggal Lahir</label>
                                                    <input type="text" name="tanggal_lahir_ayah" class="form-control datepicker" id="tanggal_lahir_ayah<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $tanggal_lahir_ayah; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Pendidikan</label>
                                                    <?php
                                                    $query = $psbo->query( "SELECT * FROM dbpsbo.pendidikan" );
                                                    echo '<select id="id_pendidikan_ayah" name="id_pendidikan_ayah" class="form-control norad valid">';
                                                    echo '<option>-- Pilih --</option>';
                                                    while ( $data_pendidikan_ayah = $query->fetch_assoc() ) {
                                                        $IDPendidikan_ayah = $data_pendidikan_ayah['IDPendidikan'];
                                                        $pendidikan_ayah = $data_pendidikan_ayah['Pendidikan'];
                                                        
                                                        if ( $data['id_pendidikan_ayah'] == $IDPendidikan_ayah ) {
                                                           $selected = "selected";
                                                        } else {
                                                           $selected = null;
                                                        }

                                                        echo "<option value=". $IDPendidikan_ayah ." $selected>". $pendidikan_ayah ."</option>";
                                                    }
                                                    echo '</select>';
                                                    ?>     
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Pekerjaan</label>
                                                    <?php
                                                    $query = $psbo->query( "SELECT * FROM dbpsbo.pekerjaan" );
                                                    echo '<select id="id_pekerjaan_ayah" name="id_pekerjaan_ayah" class="form-control norad valid">';
                                                    echo '<option>-- Pilih --</option>';
                                                    while ( $data_pekerjaan = $query->fetch_assoc() ) {
                                                        $IDPekerjaan = $data_pekerjaan['IDPekerjaan'];
                                                        $pekerjaan_ayah = $data_pekerjaan['Pekerjaan'];
                                                        
                                                        if ( $data['id_pekerjaan_ayah'] == $IDPekerjaan ) {
                                                           $selected = "selected";
                                                        } else {
                                                           $selected = null;
                                                        }

                                                        echo "<option value=". $IDPekerjaan ." $selected>". $pekerjaan_ayah ."</option>";
                                                    }
                                                    echo '</select>';
                                                    ?>     
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>No. Telepon</label>
                                                    <input type="text" name="no_telp_ayah" class="form-control" id="no_telp_ayah<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['no_telp_ayah']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Alamat Kantor</label>
                                                    <input type="text" name="alamat_kantor_ayah" class="form-control" id="alamat_kantor_ayah<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['alamat_kantor_ayah']; ?>">
                                                </div>
                                            </div>


                                            <hr><p class="help-block">#Data Ibu</p>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Nama Ibu</label>
                                                    <input type="text" name="nama_ibu" class="form-control" id="nama_ibu<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['nama_ibu']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Kewarganegaraan</label>
                                                    <?php
                                                    $query = $sdm->query( "SELECT * FROM warganegara" );
                                                    echo '<select id="id_warganegara_ibu" name="id_warganegara_ibu" class="form-control norad valid">';
                                                    echo '<option>-- Pilih --</option>';
                                                    while ( $warganegara_ibu = $query->fetch_assoc() ) {
                                                        $id_warganegara_ibu = $warganegara_ibu['IDwn'];
                                                        $warganegara = $warganegara_ibu['WargaNegara'];
                                                        
                                                        if ( $data['id_warganegara_ibu'] == $id_warganegara_ibu ) {
                                                           $selected = "selected";
                                                        } else {
                                                           $selected = null;
                                                        }

                                                        echo "<option value=". $id_warganegara_ibu ." $selected>". $warganegara ."</option>";
                                                    }
                                                    echo '</select>';
                                                    ?>
                                                </div> 
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Alamat Rumah</label>
                                                    <input type="text" name="alamat_rumah_ibu" class="form-control" id="alamat_rumah_ibu<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['alamat_rumah_ibu']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-6" style="margin-bottom: 15px;">
                                                    <label>Tempat Lahir</label>
                                                    <input type="text" name="tempat_lahir_ibu" class="form-control" id="tempat_lahir_ibu<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['tempat_lahir_ibu']; ?>">
                                                </div>
                                                <div class="col-lg-6" style="margin-bottom: 15px;">
                                                    <?php
                                                    if ( empty( $data['tanggal_lahir_ibu'] ) || $data['tanggal_lahir_ibu'] == '0000-00-00' ) {
                                                        $tanggal_lahir_ibu = '';
                                                    } else {
                                                        $tanggal_lahir_ibu = date_format( date_create( $data['tanggal_lahir_ibu'] ), "d-m-Y" );
                                                    }
                                                   ?>
                                                    <label>Tanggal Lahir</label>
                                                    <input type="text" name="tanggal_lahir_ibu" class="form-control datepicker" id="tanggal_lahir_ibu<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $tanggal_lahir_ibu; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Pendidikan</label>
                                                    <?php
                                                    $query = $psbo->query( "SELECT * FROM dbpsbo.pendidikan" );
                                                    echo '<select id="id_pendidikan_ibu" name="id_pendidikan_ibu" class="form-control norad valid">';
                                                    echo '<option>-- Pilih --</option>';
                                                    while ( $data_pendidikan_ibu = $query->fetch_assoc() ) {
                                                        $IDPendidikan_ibu = $data_pendidikan_ibu['IDPendidikan'];
                                                        $pendidikan_ibu = $data_pendidikan_ibu['Pendidikan'];
                                                        
                                                        if ( $data['id_pendidikan_ibu'] == $IDPendidikan_ibu ) {
                                                           $selected = "selected";
                                                        } else {
                                                           $selected = null;
                                                        }

                                                        echo "<option value=". $IDPendidikan_ibu ." $selected>". $pendidikan_ibu ."</option>";
                                                    }
                                                    echo '</select>';
                                                    ?>     
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Pekerjaan</label>
                                                    <?php
                                                    $query = $psbo->query( "SELECT * FROM dbpsbo.pekerjaan" );
                                                    echo '<select id="id_pekerjaan_ibu" name="id_pekerjaan_ibu" class="form-control norad valid">';
                                                    echo '<option>-- Pilih --</option>';
                                                    while ( $data_pekerjaan = $query->fetch_assoc() ) {
                                                        $IDPekerjaan = $data_pekerjaan['IDPekerjaan'];
                                                        $pekerjaan_ibu = $data_pekerjaan['Pekerjaan'];
                                                        
                                                        if ( $data['id_pekerjaan_ibu'] == $IDPekerjaan ) {
                                                           $selected = "selected";
                                                        } else {
                                                           $selected = null;
                                                        }

                                                        echo "<option value=". $IDPekerjaan ." $selected>". $pekerjaan_ibu ."</option>";
                                                    }
                                                    echo '</select>';
                                                    ?>     
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>No. Telepon</label>
                                                    <input type="text" name="no_telp_ibu" class="form-control" id="no_telp_ibu<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['no_telp_ibu']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Alamat Kantor</label>
                                                    <input type="text" name="alamat_kantor_ibu" class="form-control" id="alamat_kantor_ibu<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['alamat_kantor_ibu']; ?>">
                                                </div>
                                            </div>

                                            <hr><p class="help-block">#Data Wali</p>
                                            
                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Nama Wali</label>
                                                    <input type="text" name="nama_wali" class="form-control" id="nama_wali<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['nama_wali']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Kewarganegaraan</label>
                                                    <?php
                                                    $query = $sdm->query( "SELECT * FROM warganegara" );
                                                    echo '<select id="id_warganegara_wali" name="id_warganegara_wali" class="form-control norad valid">';
                                                    echo '<option>-- Pilih --</option>';
                                                    while ( $warganegara_wali = $query->fetch_assoc() ) {
                                                        $id_warganegara_wali = $warganegara_wali['IDwn'];
                                                        $warganegara = $warganegara_wali['WargaNegara'];
                                                        
                                                        if ( $data['id_warganegara_wali'] == $id_warganegara_wali ) {
                                                           $selected = "selected";
                                                        } else {
                                                           $selected = null;
                                                        }

                                                        echo "<option value=". $id_warganegara_wali ." $selected>". $warganegara ."</option>";
                                                    }
                                                    echo '</select>';
                                                    ?>
                                                </div> 
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Alamat Rumah</label>
                                                    <input type="text" name="alamat_rumah_wali" class="form-control" id="alamat_rumah_wali<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['alamat_rumah_wali']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-6" style="margin-bottom: 15px;">
                                                    <label>Tempat Lahir</label>
                                                    <input type="text" name="tempat_lahir_wali" class="form-control" id="tempat_lahir_wali<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['tempat_lahir_wali']; ?>">
                                                </div>
                                                <div class="col-lg-6" style="margin-bottom: 15px;">
                                                    <?php
                                                    if ( empty( $data['tanggal_lahir_wali'] ) || $data['tanggal_lahir_wali'] == '0000-00-00' ) {
                                                        $tanggal_lahir_wali = '';
                                                    } else {
                                                        $tanggal_lahir_wali = date_format( date_create( $data['tanggal_lahir_wali'] ), "d-m-Y" );
                                                    }
                                                   ?>
                                                    <label>Tanggal Lahir</label>
                                                    <input type="text" name="tanggal_lahir_wali" class="form-control datepicker" id="tanggal_lahir_wali<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $tanggal_lahir_wali; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Pendidikan</label>
                                                    <?php
                                                    $query = $psbo->query( "SELECT * FROM dbpsbo.pendidikan" );
                                                    echo '<select id="id_pendidikan_wali" name="id_pendidikan_wali" class="form-control norad valid">';
                                                    echo '<option>-- Pilih --</option>';
                                                    while ( $data_pendidikan_wali = $query->fetch_assoc() ) {
                                                        $IDPendidikan_wali = $data_pendidikan_wali['IDPendidikan'];
                                                        $pendidikan_wali = $data_pendidikan_wali['Pendidikan'];
                                                        
                                                        if ( $data['id_pendidikan_wali'] == $IDPendidikan_wali ) {
                                                           $selected = "selected";
                                                        } else {
                                                           $selected = null;
                                                        }

                                                        echo "<option value=". $IDPendidikan_wali ." $selected>". $pendidikan_wali ."</option>";
                                                    }
                                                    echo '</select>';
                                                    ?>     
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Pekerjaan</label>
                                                    <?php
                                                    $query = $psbo->query( "SELECT * FROM dbpsbo.pekerjaan" );
                                                    echo '<select id="id_pekerjaan_wali" name="id_pekerjaan_wali" class="form-control norad valid">';
                                                    echo '<option>-- Pilih --</option>';
                                                    while ( $data_pekerjaan = $query->fetch_assoc() ) {
                                                        $IDPekerjaan = $data_pekerjaan['IDPekerjaan'];
                                                        $pekerjaan_wali = $data_pekerjaan['Pekerjaan'];
                                                        
                                                        if ( $data['id_pekerjaan_wali'] == $IDPekerjaan ) {
                                                           $selected = "selected";
                                                        } else {
                                                           $selected = null;
                                                        }

                                                        echo "<option value=". $IDPekerjaan ." $selected>". $pekerjaan_wali ."</option>";
                                                    }
                                                    echo '</select>';
                                                    ?>     
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>No. Telepon</label>
                                                    <input type="text" name="no_telp_wali" class="form-control" id="no_telp_wali<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['no_telp_wali']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Alamat Kantor</label>
                                                    <input type="text" name="alamat_kantor_wali" class="form-control" id="alamat_kantor_wali<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['alamat_kantor_wali']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <button type="submit" name="btn-update-data-ortu-calon-karyawan" value="<?php echo $data['id_calon_karyawan']; ?>" class="update-class btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </form>

                                        <div class="clearfix"></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: POP-UP FOR EDIT DATA ORANG TUA/ WALI -->

                        <!-- START: POP-UP FOR EDIT DATA PENDIDIKAN -->
                        <div aria-hidden="true" aria-labelledby="myModalPendidikanLabel<?php echo $data['id_calon_karyawan']; ?>" role="dialog" tabindex="-1" id="myModalDataPendidikan<?php echo $data['id_calon_karyawan']; ?>" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                        <h4 class="modal-title">Edit Data Pendidikan Calon Karyawan</h4>
                                    </div>
                                    <div class="modal-body">

                                        <form role="form" method="post" action="action-update.php?id=<?php echo base64_encode( $data['id_calon_karyawan'] ); ?>" class="form-horizontal form-label-left popup-edit-crew">
                                            <p class="help-block">#TK</p>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Nama Lembaga Pendidikan</label>
                                                    <input type="text" name="nama_tk" class="form-control" id="nama_tk<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['nama_tk']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Kota</label>
                                                    <input type="text" name="tk_kota" class="form-control" id="tk_kota<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['tk_kota']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-6" style="margin-bottom: 15px;">
                                                    <label>Tanggal / Tahun Masuk</label>
                                                    <?php
                                                    // if ( empty( $data['tk_masuk'] ) || $data['tk_masuk'] == '0000-00-00' ) {
                                                    //     $tk_masuk = '';
                                                    // } else {
                                                    //     $tk_masuk = date_format( date_create( $data['tk_masuk'] ), "d-m-Y" );
                                                    // }
                                                   ?>
                                                    
                                                    <input type="text" name="tk_masuk" class="form-control" id="tk_masuk<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['tk_masuk']; //$tk_masuk; ?>">
                                                </div>
                                                <div class="col-lg-6" style="margin-bottom: 15px;">
                                                    <label>Tanggal / Tahun Keluar</label>
                                                    <?php
                                                    // if ( empty( $data['tk_keluar'] ) || $data['tk_keluar'] == '0000-00-00' ) {
                                                    //     $tk_keluar = '';
                                                    // } else {
                                                    //     $tk_keluar = date_format( date_create( $data['tk_keluar'] ), "d-m-Y" );
                                                    // }
                                                   ?>
                                                    
                                                    <input type="text" name="tk_keluar" class="form-control" id="tk_keluar<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['tk_keluar']; //$tk_keluar; ?>">
                                                </div>
                                            </div>

                                            <hr><p class="help-block">#SD</p>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Nama Lembaga Pendidikan</label>
                                                    <input type="text" name="nama_sd" class="form-control" id="nama_sd<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['nama_sd']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Kota</label>
                                                    <input type="text" name="sd_kota" class="form-control" id="sd_kota<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['sd_kota']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-6" style="margin-bottom: 15px;">
                                                    <label>Tanggal / Tahun Masuk</label>
                                                    <?php
                                                    // if ( empty( $data['sd_masuk'] ) || $data['sd_masuk'] == '0000-00-00' ) {
                                                    //     $sd_masuk = '';
                                                    // } else {
                                                    //     $sd_masuk = date_format( date_create( $data['sd_masuk'] ), "d-m-Y" );
                                                    // }
                                                   ?>
                                                    
                                                    <input type="text" name="sd_masuk" class="form-control" id="sd_masuk<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['sd_masuk']; //$sd_masuk; ?>">
                                                </div>
                                                <div class="col-lg-6" style="margin-bottom: 15px;">
                                                    <label>Tanggal / Tahun Keluar</label>
                                                    <?php
                                                    // if ( empty( $data['sd_keluar'] ) || $data['sd_keluar'] == '0000-00-00' ) {
                                                    //     $sd_keluar = '';
                                                    // } else {
                                                    //     $sd_keluar = date_format( date_create( $data['sd_keluar'] ), "d-m-Y" );
                                                    // }
                                                   ?>
                                                    
                                                    <input type="text" name="sd_keluar" class="form-control" id="sd_keluar<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['sd_keluar']; //$sd_keluar; ?>">
                                                </div>
                                            </div>

                                            <hr><p class="help-block">#SMP</p>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Nama Lembaga Pendidikan</label>
                                                    <input type="text" name="nama_smp" class="form-control" id="nama_smp<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['nama_smp']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Kota</label>
                                                    <input type="text" name="smp_kota" class="form-control" id="smp_kota<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['smp_kota']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-6" style="margin-bottom: 15px;">
                                                    <label>Tanggal / Tahun Masuk</label>
                                                    <?php
                                                    // if ( empty( $data['smp_masuk'] ) || $data['smp_masuk'] == '0000-00-00' ) {
                                                    //     $smp_masuk = '';
                                                    // } else {
                                                    //     $smp_masuk = date_format( date_create( $data['smp_masuk'] ), "d-m-Y" );
                                                    // }
                                                   ?>
                                                    
                                                    <input type="text" name="smp_masuk" class="form-control" id="smp_masuk<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['smp_masuk']; //$smp_masuk; ?>">
                                                </div>
                                                <div class="col-lg-6" style="margin-bottom: 15px;">
                                                    <label>Tanggal / Tahun Keluar</label>
                                                    <?php
                                                    // if ( empty( $data['smp_keluar'] ) || $data['smp_keluar'] == '0000-00-00' ) {
                                                    //     $smp_keluar = '';
                                                    // } else {
                                                    //     $smp_keluar = date_format( date_create( $data['smp_keluar'] ), "d-m-Y" );
                                                    // }
                                                   ?>
                                                    
                                                    <input type="text" name="smp_keluar" class="form-control" id="smp_keluar<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['smp_keluar']; //$smp_keluar; ?>">
                                                </div>
                                            </div>

                                            <hr><p class="help-block">#SMA / SMK / SLTA / Sederajat</p>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Nama Lembaga Pendidikan</label>
                                                    <input type="text" name="nama_slta" class="form-control" id="nama_slta<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['nama_slta']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Jurusan</label>
                                                    <input type="text" name="slta_jurusan" class="form-control" id="slta_jurusan<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['slta_jurusan']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Kota</label>
                                                    <input type="text" name="slta_kota" class="form-control" id="slta_kota<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['slta_kota']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-6" style="margin-bottom: 15px;">
                                                    <label>Tanggal / Tahun Masuk</label>
                                                    <?php
                                                    // if ( empty( $data['slta_masuk'] ) || $data['slta_masuk'] == '0000-00-00' ) {
                                                    //     $slta_masuk = '';
                                                    // } else {
                                                    //     $slta_masuk = date_format( date_create( $data['slta_masuk'] ), "d-m-Y" );
                                                    // }
                                                   ?>
                                                    
                                                    <input type="text" name="slta_masuk" class="form-control" id="slta_masuk<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['slta_masuk']; //$slta_masuk; ?>">
                                                </div>
                                                <div class="col-lg-6" style="margin-bottom: 15px;">
                                                    <label>Tanggal / Tahun Keluar</label>
                                                    <?php
                                                    // if ( empty( $data['slta_keluar'] ) || $data['slta_keluar'] == '0000-00-00' ) {
                                                    //     $slta_keluar = '';
                                                    // } else {
                                                    //     $slta_keluar = date_format( date_create( $data['slta_keluar'] ), "d-m-Y" );
                                                    // }
                                                   ?>
                                                    
                                                    <input type="text" name="slta_keluar" class="form-control" id="slta_keluar<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['slta_keluar']; //$slta_keluar; ?>">
                                                </div>
                                            </div>

                                            <hr><p class="help-block">#D3 (Diploma3)</p>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Nama Lembaga Pendidikan</label>
                                                    <input type="text" name="nama_d3" class="form-control" id="nama_d3<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['nama_d3']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Jurusan</label>
                                                    <input type="text" name="d3_jurusan" class="form-control" id="d3_jurusan<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['d3_jurusan']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Kota</label>
                                                    <input type="text" name="d3_kota" class="form-control" id="d3_kota<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['d3_kota']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-6" style="margin-bottom: 15px;">
                                                    <label>Tanggal / Tahun Masuk</label>
                                                    <?php
                                                    // if ( empty( $data['d3_masuk'] ) || $data['d3_masuk'] == '0000-00-00' ) {
                                                    //     $d3_masuk = '';
                                                    // } else {
                                                    //     $d3_masuk = date_format( date_create( $data['d3_masuk'] ), "d-m-Y" );
                                                    // }
                                                   ?>
                                                    
                                                    <input type="text" name="d3_masuk" class="form-control" id="d3_masuk<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['d3_masuk']; //$d3_masuk; ?>">
                                                </div>
                                                <div class="col-lg-6" style="margin-bottom: 15px;">
                                                    <label>Tanggal / Tahun Keluar</label>
                                                    <?php
                                                    // if ( empty( $data['d3_keluar'] ) || $data['d3_keluar'] == '0000-00-00' ) {
                                                    //     $d3_keluar = '';
                                                    // } else {
                                                    //     $d3_keluar = date_format( date_create( $data['d3_keluar'] ), "d-m-Y" );
                                                    // }
                                                   ?>
                                                    
                                                    <input type="text" name="d3_keluar" class="form-control" id="d3_keluar<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['d3_keluar']; //$d3_keluar; ?>">
                                                </div>
                                            </div>

                                            <hr><p class="help-block">#S1</p>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Nama Lembaga Pendidikan</label>
                                                    <input type="text" name="nama_s1" class="form-control" id="nama_s1<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['nama_s1']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Jurusan</label>
                                                    <input type="text" name="s1_jurusan" class="form-control" id="s1_jurusan<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['s1_jurusan']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Kota</label>
                                                    <input type="text" name="s1_kota" class="form-control" id="s1_kota<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['s1_kota']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-6" style="margin-bottom: 15px;">
                                                    <label>Tanggal / Tahun Masuk</label>
                                                    <?php
                                                    // if ( empty( $data['s1_masuk'] ) || $data['s1_masuk'] == '0000-00-00' ) {
                                                    //     $s1_masuk = '';
                                                    // } else {
                                                    //     $s1_masuk = date_format( date_create( $data['s1_masuk'] ), "d-m-Y" );
                                                    // }
                                                   ?>
                                                    
                                                    <input type="text" name="s1_masuk" class="form-control" id="s1_masuk<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['s1_masuk']; //$s1_masuk; ?>">
                                                </div>
                                                <div class="col-lg-6" style="margin-bottom: 15px;">
                                                    <label>Tanggal / Tahun Keluar</label>
                                                    <?php
                                                    // if ( empty( $data['s1_keluar'] ) || $data['s1_keluar'] == '0000-00-00' ) {
                                                    //     $s1_keluar = '';
                                                    // } else {
                                                    //     $s1_keluar = date_format( date_create( $data['s1_keluar'] ), "d-m-Y" );
                                                    // }
                                                   ?>
                                                    
                                                    <input type="text" name="s1_keluar" class="form-control" id="s1_keluar<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['s1_keluar']; //$s1_keluar; ?>">
                                                </div>
                                            </div>

                                            <hr><p class="help-block">#S2</p>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Nama Lembaga Pendidikan</label>
                                                    <input type="text" name="nama_s2" class="form-control" id="nama_s2<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['nama_s2']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Jurusan</label>
                                                    <input type="text" name="s2_jurusan" class="form-control" id="s2_jurusan<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['s2_jurusan']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Kota</label>
                                                    <input type="text" name="s2_kota" class="form-control" id="s2_kota<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['s2_kota']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-6" style="margin-bottom: 15px;">
                                                    <label>Tanggal / Tahun Masuk</label>
                                                    <?php
                                                    // if ( empty( $data['s2_masuk'] ) || $data['s2_masuk'] == '0000-00-00' ) {
                                                    //     $s2_masuk = '';
                                                    // } else {
                                                    //     $s2_masuk = date_format( date_create( $data['s2_masuk'] ), "d-m-Y" );
                                                    // }
                                                   ?>
                                                    
                                                    <input type="text" name="s2_masuk" class="form-control" id="s2_masuk<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['s2_masuk']; //$s2_masuk; ?>">
                                                </div>
                                                <div class="col-lg-6" style="margin-bottom: 15px;">
                                                    <label>Tanggal / Tahun Keluar</label>
                                                    <?php
                                                    // if ( empty( $data['s2_keluar'] ) || $data['s2_keluar'] == '0000-00-00' ) {
                                                    //     $s2_keluar = '';
                                                    // } else {
                                                    //     $s2_keluar = date_format( date_create( $data['s2_keluar'] ), "d-m-Y" );
                                                    // }
                                                   ?>
                                                    
                                                    <input type="text" name="s2_keluar" class="form-control" id="s2_keluar<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['s2_keluar']; //$s2_keluar; ?>">
                                                </div>
                                            </div>

                                            <hr><p class="help-block">#S3</p>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Nama Lembaga Pendidikan</label>
                                                    <input type="text" name="nama_s3" class="form-control" id="nama_s3<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['nama_s3']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Jurusan</label>
                                                    <input type="text" name="s3_jurusan" class="form-control" id="s3_jurusan<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['s3_jurusan']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Kota</label>
                                                    <input type="text" name="s3_kota" class="form-control" id="s3_kota<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['s3_kota']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-6" style="margin-bottom: 15px;">
                                                    <label>Tanggal / Tahun Masuk</label>
                                                    <?php
                                                    // if ( empty( $data['s3_masuk'] ) || $data['s3_masuk'] == '0000-00-00' ) {
                                                    //     $s3_masuk = '';
                                                    // } else {
                                                    //     $s3_masuk = date_format( date_create( $data['s3_masuk'] ), "d-m-Y" );
                                                    // }
                                                   ?>
                                                    
                                                    <input type="text" name="s3_masuk" class="form-control" id="s3_masuk<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['s3_masuk']; //$s3_masuk; ?>">
                                                </div>
                                                <div class="col-lg-6" style="margin-bottom: 15px;">
                                                    <label>Tanggal / Tahun Keluar</label>
                                                    <?php
                                                    // if ( empty( $data['s3_keluar'] ) || $data['s3_keluar'] == '0000-00-00' ) {
                                                    //     $s3_keluar = '';
                                                    // } else {
                                                    //     $s3_keluar = date_format( date_create( $data['s3_keluar'] ), "d-m-Y" );
                                                    // }
                                                   ?>
                                                    
                                                    <input type="text" name="s3_keluar" class="form-control" id="s3_keluar<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['s3_keluar']; //$s3_keluar; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <button type="submit" name="btn-update-data-pendidikan-calon-karyawan" value="<?php echo $data['id_calon_karyawan']; ?>" class="update-class btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </form>

                                        <div class="clearfix"></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: POP-UP FOR EDIT DATA PENDIDIKAN -->

                        <!-- START: POP-UP FOR EDIT RIWAYAT PEKERJAAN-->
                        <div aria-hidden="true" aria-labelledby="myModalRiwayatPekerjaanLabel<?php echo $data['id_calon_karyawan']; ?>" role="dialog" tabindex="-1" id="myModalRiwayatPekerjaan<?php echo $data['id_calon_karyawan']; ?>" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                        <h4 class="modal-title">Edit Riwayat Pekerjaan Calon Karyawan</h4>
                                    </div>
                                    <div class="modal-body">

                                        <form role="form" method="post" action="action-update.php?id=<?php echo base64_encode( $data['id_calon_karyawan'] ); ?>" class="form-horizontal form-label-left popup-edit-crew">
                                            <p class="help-block">#Riwayat Pekerjaan 1</p>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Nama Perusahaan</label>
                                                    <input type="text" name="nama_perusahaan1" class="form-control" id="nama_perusahaan1<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['nama_perusahaan1']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Alamat Perusahaan</label>
                                                    <input type="text" name="alamat_perusahaan1" class="form-control" id="alamat_perusahaan1<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['alamat_perusahaan1']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Jenis Usaha</label>
                                                    <input type="text" name="jenis_usaha1" class="form-control" id="jenis_usaha1<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['jenis_usaha1']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Jabatan</label>
                                                    <input type="text" name="riwayat_jabatan1" class="form-control" id="riwayat_jabatan1<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['riwayat_jabatan1']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-6" style="margin-bottom: 15px;">
                                                    <label>Tanggal / Tahun Masuk</label>
                                                    <?php
                                                    // if ( empty( $data['riwayat_pekerjaan_mulai1'] ) || $data['riwayat_pekerjaan_mulai1'] == '0000-00-00' ) {
                                                    //     $riwayat_pekerjaan_mulai1 = '';
                                                    // } else {
                                                    //     $riwayat_pekerjaan_mulai1 = date_format( date_create( $data['riwayat_pekerjaan_mulai1'] ), "d-m-Y" );
                                                    // }
                                                   ?>
                                                    <input type="text" name="riwayat_pekerjaan_mulai1" class="form-control" id="riwayat_pekerjaan_mulai1<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['riwayat_pekerjaan_mulai1']; ?>">
                                                </div>
                                                <div class="col-lg-6" style="margin-bottom: 15px;">
                                                    <label>Tanggal / Tahun Keluar</label>
                                                    <?php
                                                    // if ( empty( $data['riwayat_pekerjaan_akhir1'] ) || $data['riwayat_pekerjaan_akhir1'] == '0000-00-00' ) {
                                                    //     $riwayat_pekerjaan_akhir1 = '';
                                                    // } else {
                                                    //     $riwayat_pekerjaan_akhir1 = date_format( date_create( $data['riwayat_pekerjaan_akhir1'] ), "d-m-Y" );
                                                    // }
                                                   ?>
                                                    <input type="text" name="riwayat_pekerjaan_akhir1" class="form-control" id="riwayat_pekerjaan_akhir1<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['riwayat_pekerjaan_akhir1']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Alasan Berhenti</label>
                                                    <input type="text" name="alasan_berhenti1" class="form-control" id="alasan_berhenti1<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['alasan_berhenti1']; ?>">
                                                </div>
                                            </div>

                                            <hr><p class="help-block">#Riwayat Pekerjaan 2</p>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Nama Perusahaan</label>
                                                    <input type="text" name="nama_perusahaan2" class="form-control" id="nama_perusahaan2<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['nama_perusahaan2']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Alamat Perusahaan</label>
                                                    <input type="text" name="alamat_perusahaan2" class="form-control" id="alamat_perusahaan2<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['alamat_perusahaan2']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Jenis Usaha</label>
                                                    <input type="text" name="jenis_usaha2" class="form-control" id="jenis_usaha2<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['jenis_usaha2']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Jabatan</label>
                                                    <input type="text" name="riwayat_jabatan2" class="form-control" id="riwayat_jabatan2<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['riwayat_jabatan2']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-6" style="margin-bottom: 15px;">
                                                    <label>Tanggal / Tahun Masuk</label>
                                                    <?php
                                                    // if ( empty( $data['riwayat_pekerjaan_mulai2'] ) || $data['riwayat_pekerjaan_mulai2'] == '0000-00-00' ) {
                                                    //     $riwayat_pekerjaan_mulai2 = '';
                                                    // } else {
                                                    //     $riwayat_pekerjaan_mulai2 = date_format( date_create( $data['riwayat_pekerjaan_mulai2'] ), "d-m-Y" );
                                                    // }
                                                   ?>
                                                    <input type="text" name="riwayat_pekerjaan_mulai2" class="form-control" id="riwayat_pekerjaan_mulai2<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo  $data['riwayat_pekerjaan_mulai2']; ?>">
                                                </div>
                                                <div class="col-lg-6" style="margin-bottom: 15px;">
                                                    <label>Tanggal / Tahun Keluar</label>
                                                    <?php
                                                    // if ( empty( $data['riwayat_pekerjaan_akhir2'] ) || $data['riwayat_pekerjaan_akhir2'] == '0000-00-00' ) {
                                                    //     $riwayat_pekerjaan_akhir2 = '';
                                                    // } else {
                                                    //     $riwayat_pekerjaan_akhir2 = date_format( date_create( $data['riwayat_pekerjaan_akhir2'] ), "d-m-Y" );
                                                    // }
                                                   ?>
                                                    <input type="text" name="riwayat_pekerjaan_akhir2" class="form-control" id="riwayat_pekerjaan_akhir2<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['riwayat_pekerjaan_akhir2']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Alasan Berhenti</label>
                                                    <input type="text" name="alasan_berhenti2" class="form-control" id="alasan_berhenti2<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['alasan_berhenti2']; ?>">
                                                </div>
                                            </div>

                                            <hr><p class="help-block">#Riwayat Pekerjaan 3</p>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Nama Perusahaan</label>
                                                    <input type="text" name="nama_perusahaan3" class="form-control" id="nama_perusahaan3<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['nama_perusahaan3']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Alamat Perusahaan</label>
                                                    <input type="text" name="alamat_perusahaan3" class="form-control" id="alamat_perusahaan3<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['alamat_perusahaan3']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Jenis Usaha</label>
                                                    <input type="text" name="jenis_usaha3" class="form-control" id="jenis_usaha3<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['jenis_usaha3']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Jabatan</label>
                                                    <input type="text" name="riwayat_jabatan3" class="form-control" id="riwayat_jabatan3<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['riwayat_jabatan3']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-6" style="margin-bottom: 15px;">
                                                    <label>Tanggal / Tahun Masuk</label>
                                                    <?php
                                                    // if ( empty( $data['riwayat_pekerjaan_mulai3'] ) || $data['riwayat_pekerjaan_mulai3'] == '0000-00-00' ) {
                                                    //     $riwayat_pekerjaan_mulai3 = '';
                                                    // } else {
                                                    //     $riwayat_pekerjaan_mulai3 = date_format( date_create( $data['riwayat_pekerjaan_mulai3'] ), "d-m-Y" );
                                                    // }
                                                   ?>
                                                    <input type="text" name="riwayat_pekerjaan_mulai3" class="form-control" id="riwayat_pekerjaan_mulai3<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['riwayat_pekerjaan_mulai3']; ?>">
                                                </div>
                                                <div class="col-lg-6" style="margin-bottom: 15px;">
                                                    <label>Tanggal / Tahun Keluar</label>
                                                    <?php
                                                    // if ( empty( $data['riwayat_pekerjaan_akhir3'] ) || $data['riwayat_pekerjaan_akhir3'] == '0000-00-00' ) {
                                                    //     $riwayat_pekerjaan_akhir3 = '';
                                                    // } else {
                                                    //     $riwayat_pekerjaan_akhir3 = date_format( date_create( $data['riwayat_pekerjaan_akhir3'] ), "d-m-Y" );
                                                    // }
                                                   ?>
                                                    <input type="text" name="riwayat_pekerjaan_akhir3" class="form-control" id="riwayat_pekerjaan_akhir3<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['riwayat_pekerjaan_akhir3']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Alasan Berhenti</label>
                                                    <input type="text" name="alasan_berhenti3" class="form-control" id="alasan_berhenti3<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['alasan_berhenti3']; ?>">
                                                </div>
                                            </div>

                                            <hr><p class="help-block">#Riwayat Pekerjaan 4</p>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Nama Perusahaan</label>
                                                    <input type="text" name="nama_perusahaan4" class="form-control" id="nama_perusahaan4<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['nama_perusahaan4']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Alamat Perusahaan</label>
                                                    <input type="text" name="alamat_perusahaan4" class="form-control" id="alamat_perusahaan4<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['alamat_perusahaan4']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Jenis Usaha</label>
                                                    <input type="text" name="jenis_usaha4" class="form-control" id="jenis_usaha4<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['jenis_usaha4']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Jabatan</label>
                                                    <input type="text" name="riwayat_jabatan4" class="form-control" id="riwayat_jabatan4<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['riwayat_jabatan4']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-6" style="margin-bottom: 15px;">
                                                    <label>Tanggal / Tahun Masuk</label>
                                                    <?php
                                                    // if ( empty( $data['riwayat_pekerjaan_mulai4'] ) || $data['riwayat_pekerjaan_mulai4'] == '0000-00-00' ) {
                                                    //     $riwayat_pekerjaan_mulai4 = '';
                                                    // } else {
                                                    //     $riwayat_pekerjaan_mulai4 = date_format( date_create( $data['riwayat_pekerjaan_mulai4'] ), "d-m-Y" );
                                                    // }
                                                   ?>
                                                    <input type="text" name="riwayat_pekerjaan_mulai4" class="form-control" id="riwayat_pekerjaan_mulai4<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['riwayat_pekerjaan_mulai4']; ?>">
                                                </div>
                                                <div class="col-lg-6" style="margin-bottom: 15px;">
                                                    <label>Tanggal / Tahun Keluar</label>
                                                    <?php
                                                    // if ( empty( $data['riwayat_pekerjaan_akhir4'] ) || $data['riwayat_pekerjaan_akhir4'] == '0000-00-00' ) {
                                                    //     $riwayat_pekerjaan_akhir4 = '';
                                                    // } else {
                                                    //     $riwayat_pekerjaan_akhir4 = date_format( date_create( $data['riwayat_pekerjaan_akhir4'] ), "d-m-Y" );
                                                    // }
                                                   ?>
                                                    <input type="text" name="riwayat_pekerjaan_akhir4" class="form-control" id="riwayat_pekerjaan_akhir4<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['riwayat_pekerjaan_akhir4']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Alasan Berhenti</label>
                                                    <input type="text" name="alasan_berhenti4" class="form-control" id="alasan_berhenti4<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['alasan_berhenti4']; ?>">
                                                </div>
                                            </div>

                                            <hr><p class="help-block">#Riwayat Pekerjaan 5</p>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Nama Perusahaan</label>
                                                    <input type="text" name="nama_perusahaan5" class="form-control" id="nama_perusahaan5<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['nama_perusahaan5']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Alamat Perusahaan</label>
                                                    <input type="text" name="alamat_perusahaan5" class="form-control" id="alamat_perusahaan5<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['alamat_perusahaan5']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Jenis Usaha</label>
                                                    <input type="text" name="jenis_usaha5" class="form-control" id="jenis_usaha5<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['jenis_usaha5']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Jabatan</label>
                                                    <input type="text" name="riwayat_jabatan5" class="form-control" id="riwayat_jabatan5<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['riwayat_jabatan5']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-6" style="margin-bottom: 15px;">
                                                    <label>Tanggal / Tahun Masuk</label>
                                                    <?php
                                                    // if ( empty( $data['riwayat_pekerjaan_mulai5'] ) || $data['riwayat_pekerjaan_mulai5'] == '0000-00-00' ) {
                                                    //     $riwayat_pekerjaan_mulai5 = '';
                                                    // } else {
                                                    //     $riwayat_pekerjaan_mulai5 = date_format( date_create( $data['riwayat_pekerjaan_mulai5'] ), "d-m-Y" );
                                                    // }
                                                   ?>
                                                    <input type="text" name="riwayat_pekerjaan_mulai5" class="form-control" id="riwayat_pekerjaan_mulai5<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['riwayat_pekerjaan_mulai5']; ?>">
                                                </div>
                                                <div class="col-lg-6" style="margin-bottom: 15px;">
                                                    <label>Tanggal / Tahun Keluar</label>
                                                    <?php
                                                    // if ( empty( $data['riwayat_pekerjaan_akhir5'] ) || $data['riwayat_pekerjaan_akhir5'] == '0000-00-00' ) {
                                                    //     $riwayat_pekerjaan_akhir5 = '';
                                                    // } else {
                                                    //     $riwayat_pekerjaan_akhir5 = date_format( date_create( $data['riwayat_pekerjaan_akhir5'] ), "d-m-Y" );
                                                    // }
                                                   ?>
                                                    <input type="text" name="riwayat_pekerjaan_akhir5" class="form-control" id="riwayat_pekerjaan_akhir5<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['riwayat_pekerjaan_akhir5']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Alasan Berhenti</label>
                                                    <input type="text" name="alasan_berhenti5" class="form-control" id="alasan_berhenti5<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['alasan_berhenti5']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <button type="submit" name="btn-update-riwayat-pekerjaan-calon-karyawan" value="<?php echo $data['id_calon_karyawan']; ?>" class="update-class btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </form>

                                        <div class="clearfix"></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: POP-UP FOR EDIT RIWAYAT PEKERJAAN -->

                        <!-- START: POP-UP FOR EDIT PENGALAMAN ORGANISASI -->
                        <div aria-hidden="true" aria-labelledby="myModalPengalamanOrganisasiLabel<?php echo $data['id_calon_karyawan']; ?>" role="dialog" tabindex="-1" id="myModalPengalamanOrganisasi<?php echo $data['id_calon_karyawan']; ?>" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                        <h4 class="modal-title">Edit Pengalaman Organisasi</h4>
                                    </div>
                                    <div class="modal-body">

                                        <form role="form" method="post" action="action-update.php?id=<?php echo base64_encode( $data['id_calon_karyawan'] ); ?>" class="form-horizontal form-label-left popup-edit-crew">

                                            <p class="help-block">#PENGALAMAN ORGANISASI 1</p>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Organisasi</label>
                                                    <input type="text" name="organisasi1" class="form-control" id="organisasi1<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['organisasi1']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Jenis Organisasi</label>
                                                    <input type="text" name="jenis_organisasi1" class="form-control" id="jenis_organisasi1<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['jenis_organisasi1']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Jabatan</label>
                                                    <input type="text" name="jabatan_organisasi1" class="form-control" id="jabatan_organisasi1<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['jabatan_organisasi1']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Periode Keanggotaan (Tahun)</label>
                                                    <input type="text" name="periode_organisasi1" class="form-control" id="periode_organisasi1<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['periode_organisasi1']; ?>">
                                                </div>
                                            </div>

                                            <p class="help-block">#PENGALAMAN ORGANISASI 2</p>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Organisasi</label>
                                                    <input type="text" name="organisasi2" class="form-control" id="organisasi2<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['organisasi2']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Jenis Organisasi</label>
                                                    <input type="text" name="jenis_organisasi2" class="form-control" id="jenis_organisasi2<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['jenis_organisasi2']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Jabatan</label>
                                                    <input type="text" name="jabatan_organisasi2" class="form-control" id="jabatan_organisasi2<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['jabatan_organisasi2']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Periode Keanggotaan (Tahun)</label>
                                                    <input type="text" name="periode_organisasi2" class="form-control" id="periode_organisasi2<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['periode_organisasi2']; ?>">
                                                </div>
                                            </div>

                                            <p class="help-block">#PENGALAMAN ORGANISASI 3</p>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Organisasi</label>
                                                    <input type="text" name="organisasi3" class="form-control" id="organisasi3<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['organisasi3']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Jenis Organisasi</label>
                                                    <input type="text" name="jenis_organisasi3" class="form-control" id="jenis_organisasi3<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['jenis_organisasi3']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Jabatan</label>
                                                    <input type="text" name="jabatan_organisasi3" class="form-control" id="jabatan_organisasi3<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['jabatan_organisasi3']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Periode Keanggotaan (Tahun)</label>
                                                    <input type="text" name="periode_organisasi3" class="form-control" id="periode_organisasi3<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['periode_organisasi3']; ?>">
                                                </div>
                                            </div>

                                            <p class="help-block">#PENGALAMAN ORGANISASI 4</p>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Organisasi</label>
                                                    <input type="text" name="organisasi4" class="form-control" id="organisasi4<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['organisasi4']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Jenis Organisasi</label>
                                                    <input type="text" name="jenis_organisasi4" class="form-control" id="jenis_organisasi4<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['jenis_organisasi4']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Jabatan</label>
                                                    <input type="text" name="jabatan_organisasi4" class="form-control" id="jabatan_organisasi4<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['jabatan_organisasi4']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Periode Keanggotaan (Tahun)</label>
                                                    <input type="text" name="periode_organisasi4" class="form-control" id="periode_organisasi4<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['periode_organisasi4']; ?>">
                                                </div>
                                            </div>

                                            <p class="help-block">#PENGALAMAN ORGANISASI 5</p>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Organisasi</label>
                                                    <input type="text" name="organisasi5" class="form-control" id="organisasi5<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['organisasi5']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Jenis Organisasi</label>
                                                    <input type="text" name="jenis_organisasi5" class="form-control" id="jenis_organisasi5<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['jenis_organisasi5']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Jabatan</label>
                                                    <input type="text" name="jabatan_organisasi5" class="form-control" id="jabatan_organisasi5<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['jabatan_organisasi5']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Periode Keanggotaan (Tahun)</label>
                                                    <input type="text" name="periode_organisasi5" class="form-control" id="periode_organisasi5<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['periode_organisasi5']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <button type="submit" name="btn-update-pengalaman-organisasi-calon-karyawan" value="<?php echo $data['id_calon_karyawan']; ?>" class="update-class btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </form>

                                        <div class="clearfix"></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: POP-UP FOR EDIT PENGALAMAN ORGANISASI -->

                        <!-- START: POP-UP FOR EDIT KELENGKAPAN BERKAS SOAL -->
                        <div aria-hidden="true" aria-labelledby="myModalBerkasPelamarLabel<?php echo $data_soal['id_soal_pelamar'].$no; ?>" role="dialog" tabindex="-1" id="myModalBerkasPelamar<?php echo $data_soal['id_soal_pelamar'].$no; ?>" class="modal fade">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                        <h4 class="modal-title">Edit Kelengkapan Berkas Calon Guru</h4>
                                    </div>
                                    <div class="modal-body">

                                        <form role="form" method="post" action="action-update.php?id=<?php echo base64_encode( $data_soal['id_soal_pelamar'] ); ?>" class="form-horizontal form-label-left popup-edit-crew">

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <label>Jawaban:</label>
                                                    <textarea name="jawaban" class="form-control" rows="5"><?php echo $data_soal['jawaban']; ?></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <button type="submit" name="btn-update-berkas-calon-karyawan" value="<?php echo $data_soal['id_soal_pelamar']; ?>" class="update-class btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </form>

                                        <div class="clearfix"></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: POP-UP FOR EDIT KELENGKAPAN BERKAS SOAL -->

                        <!-- START: POP-UP FOR EDIT KEMAMPUAN BAHASA ASING -->
                        <div aria-hidden="true" aria-labelledby="myModalKemampuanBahasaAsingLabel<?php echo $data['id_calon_karyawan']; ?>" role="dialog" tabindex="-1" id="myModalKemampuanBahasaAsing<?php echo $data['id_calon_karyawan']; ?>" class="modal fade">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                        <h4 class="modal-title">Edit Kemampuan Bahasa Asing</h4>
                                    </div>
                                    <div class="modal-body">

                                        <form role="form" method="post" action="action-update.php?id=<?php echo base64_encode( $data['id_calon_karyawan'] ); ?>" class="form-horizontal form-label-left popup-edit-crew">

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
                                                        <td align="center"><input type="text" name="bahasa_asing1" class="form-control" id="bahasa_asing1<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['bahasa_asing1']; ?>"></td>
                                                        <td align="center"><input type="text" name="digunakan_sejak1" class="form-control" id="digunakan_sejak1<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['digunakan_sejak1']; ?>"></td>
                                                        <td align="center"><input type="radio" name="membaca1" value="KS" <?php if ( $data['membaca1'] == 'KS' ) echo 'checked="checked"'; ?>></td>
                                                        <td align="center"><input type="radio" name="membaca1" value="K" <?php if ( $data['membaca1'] == 'K' ) echo 'checked="checked"'; ?>></td>
                                                        <td align="center"><input type="radio" name="membaca1" value="C" <?php if ( $data['membaca1'] == 'C' ) echo 'checked="checked"'; ?>></td>
                                                        <td align="center"><input type="radio" name="membaca1" value="B" <?php if ( $data['membaca1'] == 'B' ) echo 'checked="checked"'; ?>></td>
                                                        <td align="center"><input type="radio" name="membaca1" value="BS" <?php if ( $data['membaca1'] == 'BS' ) echo 'checked="checked"'; ?>></td>
                                                        <td align="center"><input type="radio" name="menulis1" value="KS" <?php if ( $data['menulis1'] == 'KS' ) echo 'checked="checked"'; ?>></td>
                                                        <td align="center"><input type="radio" name="menulis1" value="K" <?php if ( $data['menulis1'] == 'K' ) echo 'checked="checked"'; ?>></td>
                                                        <td align="center"><input type="radio" name="menulis1" value="C" <?php if ( $data['menulis1'] == 'C' ) echo 'checked="checked"'; ?>></td>
                                                        <td align="center"><input type="radio" name="menulis1" value="B" <?php if ( $data['menulis1'] == 'B' ) echo 'checked="checked"'; ?>></td>
                                                        <td align="center"><input type="radio" name="menulis1" value="BS" <?php if ( $data['menulis1'] == 'BS' ) echo 'checked="checked"'; ?>></td>
                                                        <td align="center"><input type="radio" name="berbicara1" value="KS" <?php if ( $data['berbicara1'] == 'KS' ) echo 'checked="checked"'; ?>></td>
                                                        <td align="center"><input type="radio" name="berbicara1" value="K" <?php if ( $data['berbicara1'] == 'K' ) echo 'checked="checked"'; ?>></td>
                                                        <td align="center"><input type="radio" name="berbicara1" value="C" <?php if ( $data['berbicara1'] == 'C' ) echo 'checked="checked"'; ?>></td>
                                                        <td align="center"><input type="radio" name="berbicara1" value="B" <?php if ( $data['berbicara1'] == 'B' ) echo 'checked="checked"'; ?>></td>
                                                        <td align="center"><input type="radio" name="berbicara1" value="BS" <?php if ( $data['berbicara1'] == 'BS' ) echo 'checked="checked"'; ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <<td align="center"><input type="text" name="bahasa_asing2" class="form-control" id="bahasa_asing2<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['bahasa_asing2']; ?>"></td>
                                                        <td align="center"><input type="text" name="digunakan_sejak2" class="form-control" id="digunakan_sejak2<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['digunakan_sejak2']; ?>"></td>
                                                        <td align="center"><input type="radio" name="membaca2" value="KS" <?php if ( $data['membaca2'] == 'KS' ) echo 'checked="checked"'; ?>></td>
                                                        <td align="center"><input type="radio" name="membaca2" value="K" <?php if ( $data['membaca2'] == 'K' ) echo 'checked="checked"'; ?>></td>
                                                        <td align="center"><input type="radio" name="membaca2" value="C" <?php if ( $data['membaca2'] == 'C' ) echo 'checked="checked"'; ?>></td>
                                                        <td align="center"><input type="radio" name="membaca2" value="B" <?php if ( $data['membaca2'] == 'B' ) echo 'checked="checked"'; ?>></td>
                                                        <td align="center"><input type="radio" name="membaca2" value="BS" <?php if ( $data['membaca2'] == 'BS' ) echo 'checked="checked"'; ?>></td>
                                                        <td align="center"><input type="radio" name="menulis2" value="KS" <?php if ( $data['menulis2'] == 'KS' ) echo 'checked="checked"'; ?>></td>
                                                        <td align="center"><input type="radio" name="menulis2" value="K" <?php if ( $data['menulis2'] == 'K' ) echo 'checked="checked"'; ?>></td>
                                                        <td align="center"><input type="radio" name="menulis2" value="C" <?php if ( $data['menulis2'] == 'C' ) echo 'checked="checked"'; ?>></td>
                                                        <td align="center"><input type="radio" name="menulis2" value="B" <?php if ( $data['menulis2'] == 'B' ) echo 'checked="checked"'; ?>></td>
                                                        <td align="center"><input type="radio" name="menulis2" value="BS" <?php if ( $data['menulis2'] == 'BS' ) echo 'checked="checked"'; ?>></td>
                                                        <td align="center"><input type="radio" name="berbicara2" value="KS" <?php if ( $data['berbicara2'] == 'KS' ) echo 'checked="checked"'; ?>></td>
                                                        <td align="center"><input type="radio" name="berbicara2" value="K" <?php if ( $data['berbicara2'] == 'K' ) echo 'checked="checked"'; ?>></td>
                                                        <td align="center"><input type="radio" name="berbicara2" value="C" <?php if ( $data['berbicara2'] == 'C' ) echo 'checked="checked"'; ?>></td>
                                                        <td align="center"><input type="radio" name="berbicara2" value="B" <?php if ( $data['berbicara2'] == 'B' ) echo 'checked="checked"'; ?>></td>
                                                        <td align="center"><input type="radio" name="berbicara2" value="BS" <?php if ( $data['berbicara2'] == 'BS' ) echo 'checked="checked"'; ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center"><input type="text" name="bahasa_asing3" class="form-control" id="bahasa_asing3<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['bahasa_asing3']; ?>"></td>
                                                        <td align="center"><input type="text" name="digunakan_sejak3" class="form-control" id="digunakan_sejak3<?php echo $data['id_calon_karyawan']; ?>" value="<?php echo $data['digunakan_sejak3']; ?>"></td>
                                                        <td align="center"><input type="radio" name="membaca3" value="KS" <?php if ( $data['membaca3'] == 'KS' ) echo 'checked="checked"'; ?>></td>
                                                        <td align="center"><input type="radio" name="membaca3" value="K" <?php if ( $data['membaca3'] == 'K' ) echo 'checked="checked"'; ?>></td>
                                                        <td align="center"><input type="radio" name="membaca3" value="C" <?php if ( $data['membaca3'] == 'C' ) echo 'checked="checked"'; ?>></td>
                                                        <td align="center"><input type="radio" name="membaca3" value="B" <?php if ( $data['membaca3'] == 'B' ) echo 'checked="checked"'; ?>></td>
                                                        <td align="center"><input type="radio" name="membaca3" value="BS" <?php if ( $data['membaca3'] == 'BS' ) echo 'checked="checked"'; ?>></td>
                                                        <td align="center"><input type="radio" name="menulis3" value="KS" <?php if ( $data['menulis3'] == 'KS' ) echo 'checked="checked"'; ?>></td>
                                                        <td align="center"><input type="radio" name="menulis3" value="K" <?php if ( $data['menulis3'] == 'K' ) echo 'checked="checked"'; ?>></td>
                                                        <td align="center"><input type="radio" name="menulis3" value="C" <?php if ( $data['menulis3'] == 'C' ) echo 'checked="checked"'; ?>></td>
                                                        <td align="center"><input type="radio" name="menulis3" value="B" <?php if ( $data['menulis3'] == 'B' ) echo 'checked="checked"'; ?>></td>
                                                        <td align="center"><input type="radio" name="menulis3" value="BS" <?php if ( $data['menulis3'] == 'BS' ) echo 'checked="checked"'; ?>></td>
                                                        <td align="center"><input type="radio" name="berbicara3" value="KS" <?php if ( $data['berbicara3'] == 'KS' ) echo 'checked="checked"'; ?>></td>
                                                        <td align="center"><input type="radio" name="berbicara3" value="K" <?php if ( $data['berbicara3'] == 'K' ) echo 'checked="checked"'; ?>></td>
                                                        <td align="center"><input type="radio" name="berbicara3" value="C" <?php if ( $data['berbicara3'] == 'C' ) echo 'checked="checked"'; ?>></td>
                                                        <td align="center"><input type="radio" name="berbicara3" value="B" <?php if ( $data['berbicara3'] == 'B' ) echo 'checked="checked"'; ?>></td>
                                                        <td align="center"><input type="radio" name="berbicara3" value="BS" <?php if ( $data['berbicara3'] == 'BS' ) echo 'checked="checked"'; ?>></td>
                                                    </tr>
                                                </tbody>
                                            </table>
    
                                            <div class="form-group">
                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                    <button type="submit" name="btn-update-kemampuan-bahasa-asing-calon-karyawan" value="<?php echo $data['id_calon_karyawan']; ?>" class="update-class btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </form>

                                        <div class="clearfix"></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: POP-UP FOR EDIT KEMAMPUAN BAHASA ASING -->

                         <div class="card-body detail-calon-pelamar no-padding"> <!-- start: step -->
                            <div role="tabpanel">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#data-pelamar" aria-controls="data-pelamar" role="tab" data-toggle="tab"><div class="icon fa fa-credit-card"></div> Data Pelamar</a></li>
                                    <li role="presentation"><a href="#berkas-lamaran" aria-controls="berkas-lamaran" role="tab" data-toggle="tab"><div class="icon fa fa-file"></div> Berkas Lamaran</a></li>
                                    <li role="presentation"><a href="#jawaban-soal" aria-controls="jawaban-soal" role="tab" data-toggle="tab"><div class="icon fa fa-question-circle"></div> Pertanyaan</a></li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="data-pelamar">
                                        <form class="form-horizontal form-label-left">
                                            <div class="tab-pane fade fade in active">
                                                <div class="col-xs-12 no-padding data-detail">
                                                    <div class="card" style="box-shadow: none;">
                                                        <div class="card-header">
                                                            <div class="card-title">
                                                                <div class="title">DATA PRIBADI</div>
                                                                <div class="detail-btn-edit">
                                                                     <a href="#myModalDataPribadi<?php echo $data['id_calon_karyawan']; ?>" data-toggle="modal" class="btn btn-success btn-xs pull-right" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body" style="padding-left: 0; padding-right: 0;">
                                                            <?php 
                                                            $str = '';
                                                            $my_unit_sql = $sdm->query( "SELECT * FROM unit 
                                                                                        LEFT JOIN master_unit ON unit.id_master_unit = master_unit.id_master_unit
                                                                                        WHERE unit.id_calon_karyawan = '".$data['id_calon_karyawan']."'" );  
                                                            
                                                            $check_unit = $my_unit_sql->num_rows;

                                                            if ( $check_unit > 0 ) :
                                                            ?>

                                                                <div class="form-group ">
                                                                    <div class="col-lg-2">
                                                                        <label>Unit</label>
                                                                    </div>
                                                                    <div class="col-lg-10">
                                                                        <?php
                                                                        // $ssss = $my_query->fetch_assoc();
                                                                        echo ': ';
                                                                        while ( $list_unit = $my_unit_sql->fetch_assoc() ) {
                                                                            // echo rtrim( $list_unit['jabatan'],',' );
                                                                            $str .= $list_unit['nama_unit'].', '; 
                                                                        }
                                                                        echo rtrim( $str,", " );
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php
                                                            $str_jabatan = '';
                                                            // $str_sub_jabatan = '';
                                                            // $my_str_sub_jabatan = '';
                                                            // list jabatan
                                                            $my_list_jabatan = $sdm->query( "SELECT * FROM list_jabatan 
                                                                                            LEFT JOIN master_jabatan ON list_jabatan.id_master_jabatan = master_jabatan.id_master_jabatan
                                                                                            WHERE list_jabatan.id_calon_karyawan = '".$data['id_calon_karyawan']."'" ); 
                                                            $check_list_jabatan = $my_list_jabatan->num_rows;

                                                            if ( $check_list_jabatan > 0 ) :
                                                            ?>

                                                                <div class="form-group ">
                                                                    <div class="col-lg-2">
                                                                        <label>Jabatan</label>
                                                                    </div>
                                                                    <div class="col-lg-10">
                                                                        <?php

                                                                        // list sub jabatan
                                                                        // $list_sub_jabatan = $sdm->query( "SELECT * FROM list_sub_jabatan 
                                                                        //                                 LEFT JOIN master_jabatan ON list_sub_jabatan.id_master_jabatan = master_jabatan.id_master_jabatan
                                                                        //                                 LEFT JOIN list_jabatan ON list_jabatan.id_master_jabatan = master_jabatan.id_master_jabatan 
                                                                        //                                 WHERE list_sub_jabatan.id_calon_karyawan = '".$data['id_calon_karyawan']."'" );  
                                                                        // $check_list_sub_jabatan = $list_sub_jabatan->num_rows;

                                                                        echo ': ';
                                                                        // list jabatan

                                                                        while ( $list_jbtn = $my_list_jabatan->fetch_assoc() ) {
                                                                            // echo rtrim( $list_jbtn['jabatan'],',' );
                                                                            $str_jabatan .= $list_jbtn['jabatan'].', '; 
                                                                        }

                                                                        // list sub jabatan
                                                                        // if ( $check_list_sub_jabatan >= 1 ) {
                                                                        //     while ( $my_list_sub_jabatan = $list_sub_jabatan->fetch_assoc() ) {
                                                                        //         // echo rtrim( $list_sub_jabatan['jabatan'],',' );
                                                                        //         $str_sub_jabatan .= $my_list_sub_jabatan['jabatan'].', '; 
                                                                        //     }
                                                                        // }
                                                                        // $my_str_sub_jabatan = rtrim( $str_sub_jabatan,", " ); // sub jabatan
                                                                        // echo rtrim( $str_jabatan,", " ).' '.'('.$my_str_sub_jabatan.')'; // jabatan
                                                                        echo rtrim( $str_jabatan,", " );
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php 
                                                            $my_sub_jabatan = $sdm->query( "SELECT * FROM list_sub_jabatan 
                                                                                            LEFT JOIN master_sub_jabatan ON list_sub_jabatan.id_master_sub_jabatan = master_sub_jabatan.id_master_sub_jabatan
                                                                                            WHERE list_sub_jabatan.id_calon_karyawan = '".$data['id_calon_karyawan']."'" ); 
                                                            $check_list_sub_jabatan = $my_sub_jabatan->num_rows; 
                                                            $fetch_sub_list = $my_sub_jabatan->fetch_assoc();

                                                            if ( $check_list_sub_jabatan > 0 ) :
                                                            ?>
                
                                                                <div class="form-group ">
                                                                    <div class="col-lg-2">
                                                                        <label>Sub Jabatan (Posisi Khusus)</label>
                                                                    </div>
                                                                    <div class="col-lg-10">

                                                                        <?php
                                                                        echo ': ';
                                                                        $sss = '';
                                                                        // list jabatan
                                                                        
                                                                        while ( $list_jbtn = $my_sub_jabatan->fetch_assoc() ) {
                                                                            // echo rtrim( $list_jbtn['jabatan'],',' );
                                                                            $sss .= $list_jbtn['master_sub_jabatan'].', '; 
                                                                        }
                                                                       
                                                                        echo rtrim( $sss,", " );
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            
                                                            <div class="col-md-10 no-padding">
                                                                <div class="form-group ">
                                                                    <div class="col-lg-2">
                                                                        <label>Nama Lengkap</label>
                                                                    </div>
                                                                    <div class="col-lg-9" style="margin-left: 35px;">
                                                                        : <?php echo $data['nama_lengkap']; ?>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group ">
                                                                    <div class="col-lg-2">
                                                                        <label>Tempat & Tanggal Lahir</label>
                                                                    </div>
                                                                    <div class="col-lg-9" style="margin-left: 35px;">
                                                                        <?php
                                                                        // tanggal
                                                                        if ( empty( $data['tanggal_lahir'] ) || $data['tanggal_lahir'] == '0000-00-00' ) {
                                                                            $tanggal_lahir = '';
                                                                        } else {
                                                                            $tanggal_lahir = $data['tempat_lahir'].', '. date_format( date_create( $data['tanggal_lahir'] ), "d-m-Y" );
                                                                        }
                                                                        echo ': '.$tanggal_lahir; 
                                                                        ?>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group ">
                                                                    <div class="col-lg-2">
                                                                        <label>Jenis Kelamin</label>
                                                                    </div>
                                                                    <div class="col-lg-9" style="margin-left: 35px;">
                                                                        <?php  
                                                                        if ( $data['jenis_kelamin'] == 'L' ) {
                                                                            $jekel = 'Laki - laki';
                                                                        } else {
                                                                            $jekel = 'Perempuan';
                                                                        }
                                                                        echo ': '.$jekel;
                                                                        ?>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group ">
                                                                    <div class="col-lg-2">
                                                                        <label>Warganegara</label>
                                                                    </div>
                                                                    <div class="col-lg-9" style="margin-left: 35px;">
                                                                        <?php echo ': '.$data['WargaNegara']; ?>     
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-2 no-padding-right">
                                                                <?php if ( !empty( $data['foto'] ) ) : ?>
                                                                    <img src="img/profile/<?php echo $data['foto']; ?>" width="131" style="float: right;">
                                                                <?php else : ?>
                                                                   <div class="box-photo" style="border: 1px dotted #333; width: 113px; height: 151px; line-height: 151px; text-align: center; float: right">
                                                                        Foto 3 X 4
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>

                                                            <div class="clearfix"></div>

                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                    <label>Suku</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php echo ': '.$data['suku']; ?>
                                                                </div>
                                                            </div>

                                                             <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                    <label>Agama</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php echo ': '.$data['Agama']; ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                    <label>Golongan Darah</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php echo ': '.$data['gol_darah']; ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                    <label>Status Perkawinan</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php 
                                                                    if ( $data['status_perkawinan'] == '1' ) {
                                                                        $status_perkawinan = 'Single/ Belum menikah';
                                                                    } else {
                                                                        $status_perkawinan = 'Menikah';
                                                                    }
                                                                    echo ': '.$status_perkawinan; 
                                                                    ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                    <label>Anak ke</label>
                                                                </div>
                                                                <div class="col-lg-2">
                                                                    <?php echo ': '.$data['anak_ke']; ?>
                                                                </div>
                                                                <div class="col-lg-1 text-center">Dari</div>
                                                                <div class="col-lg-1">
                                                                    <?php echo ': '.$data['jumlah_saudara']; ?>
                                                                </div>
                                                                <div class="col-lg-1 text-right">Bersaudara</div>
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
                                                            <div class="detail-btn-edit">
                                                                 <a href="#myModalAlamat<?php echo $data['id_calon_karyawan']; ?>" data-toggle="modal" class="btn btn-success btn-xs pull-right" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="card-body" style="padding-left: 0; padding-right: 0;">
                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                    <label>Alamat Domisili Saat Ini</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php echo ': '.$data['alamat_domisili']; ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                     <label>Status Tempat Tinggal</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php 
                                                                    if ( $data['status_tempat_tinggal'] == '1' ) {
                                                                        $status_tempat_tinggal = 'Rumah Pribadi';
                                                                    } 
                                                                    elseif ( $data['status_tempat_tinggal'] == '2' ) {
                                                                        $status_tempat_tinggal = 'Rumah Keluarga';
                                                                    } 
                                                                    elseif ( $data['status_tempat_tinggal'] == '3' ) {
                                                                        $status_tempat_tinggal = 'Kontrak/ Kost';
                                                                    } 
                                                                    else {
                                                                        $status_tempat_tinggal = '';
                                                                    }
                                                                    echo ': '.$status_tempat_tinggal; 
                                                                    ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                     <label>No. Telepon Rumah</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php echo ': '.$data['no_telp_rumah']; ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                     <label>No. Handphone</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php echo ': '.$data['no_hp']; ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                     <label>Email</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php echo ': '.$data['email']; ?>
                                                                </div>
                                                            </div>
                                                            
                                                            <hr>
                                                            <p class="help-block">#Dalam keadaan darurat, yang dapat dihubungi:</p>

                                                             <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                     <label>Nama Lengkap</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php echo ': '.$data['nama_darurat']; ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                     <label>Hubungan</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php echo ': '.$data['hubungan_darurat']; ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                    <label>Alamat Lengkap</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php echo ': '.$data['alamat_darurat']; ?>
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
                                                            <div class="detail-btn-edit">
                                                                 <a href="#myModalDataIdentitas<?php echo $data['id_calon_karyawan']; ?>" data-toggle="modal" class="btn btn-success btn-xs pull-right" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
                                                            </div>
                                                    </div>
                                                        <div class="card-body" style="padding-left: 0; padding-right: 0;">
                                                            <p class="help-block">#KTP</p>

                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                     <label>Nomor KTP</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php echo ': '.$data['no_ktp']; ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                     <label>Dikeluarkan di</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php echo ': '.$data['ktp_dikeluarkan_di']; ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                    <label>Berlaku sampai</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php 
                                                                    if ( empty( $data['masa_berlaku_ktp'] ) || $data['masa_berlaku_ktp'] == '0000-00-00' ) {
                                                                        echo ': '; 
                                                                    } else {
                                                                        echo ': '.date_format( date_create( $data['masa_berlaku_ktp'] ), "d-m-Y" );; 
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>

                                                            <hr><p class="help-block">#SIM</p>

                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                     <label>Nomor SIM</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php echo ': '.$data['no_sim']; ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                     <label>Dikeluarkan di</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php echo ': '.$data['sim_dikeluarkan_di']; ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                    <label>Berlaku sampai</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php 
                                                                    if ( empty( $data['masa_berlaku_sim'] ) || $data['masa_berlaku_sim'] == '0000-00-00' ) {
                                                                        echo ': '; 
                                                                    } else {
                                                                        echo ': '.date_format( date_create( $data['masa_berlaku_sim'] ), "d-m-Y" );; 
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>

                                                            <hr><p class="help-block">#Passport</p>

                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                     <label>Nomor Passport</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php echo ': '.$data['no_passport']; ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                     <label>Dikeluarkan di</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php echo ': '.$data['passport_dikeluarkan_di']; ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                    <label>Berlaku sampai</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php 
                                                                    if ( empty( $data['masa_berlaku_passport'] ) || $data['masa_berlaku_passport'] == '0000-00-00' ) {
                                                                        echo ': '; 
                                                                    } else {
                                                                        echo ': '.date_format( date_create( $data['masa_berlaku_passport'] ), "d-m-Y" );; 
                                                                    }
                                                                    ?>
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
                                                            <div class="detail-btn-edit">
                                                                 <a href="#myModalDataKeluarga<?php echo $data['id_calon_karyawan']; ?>" data-toggle="modal" class="btn btn-success btn-xs pull-right" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="card-body" style="padding-left: 0; padding-right: 0;">

                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                    <label>Nama Suami/ Istri</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php echo ': '.$data['nama_suami_istri']; ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                    <label>Pekerjaan Suami/ Istri</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php echo ': '.$data['Pekerjaan']; ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                    <label>Jumlah Anak</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php echo ': '.$data['jumlah_anak']; ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                    <label>Nama Anak</label>
                                                                </div>
                                                                <div class="col-lg-2">
                                                                    <?php echo ': '.$data['nama_anak1']; ?>
                                                                </div>
                                                                <div class="col-lg-1 text-right">Usia : </div>
                                                                <div class="col-lg-2">
                                                                    <?php if ( !empty( $data['usia_anak1'] ) ) echo $data['usia_anak1']; ?>
                                                                </div>
                                                            </div>

                                                            <?php if ( !empty( $data['usia_anak2'] ) ) : ?>
                                                                <div class="form-group ">
                                                                    <div class="col-lg-2">
                                                                        <!-- <label>Nama Anak</label> -->
                                                                    </div>
                                                                    <div class="col-lg-2">
                                                                        <?php echo ': '.$data['nama_anak2']; ?>
                                                                    </div>
                                                                    <div class="col-lg-1 text-right">Usia : </div>
                                                                    <div class="col-lg-2">
                                                                        <?php echo $data['usia_anak2']; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if ( !empty( $data['usia_anak3'] ) ) : ?>
                                                                <div class="form-group ">
                                                                    <div class="col-lg-2">
                                                                        <!-- <label>Nama Anak</label> -->
                                                                    </div>
                                                                    <div class="col-lg-2">
                                                                        <?php echo ': '.$data['nama_anak3']; ?>
                                                                    </div>
                                                                    <div class="col-lg-1 text-right">Usia : </div>
                                                                    <div class="col-lg-2">
                                                                        <?php echo $data['usia_anak3']; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if ( !empty( $data['usia_anak4'] ) ) : ?>
                                                                <div class="form-group ">
                                                                    <div class="col-lg-2">
                                                                        <!-- <label>Nama Anak</label> -->
                                                                    </div>
                                                                    <div class="col-lg-2">
                                                                        <?php echo ': '.$data['nama_anak4']; ?>
                                                                    </div>
                                                                    <div class="col-lg-1 text-right">Usia : </div>
                                                                    <div class="col-lg-2">
                                                                        <?php echo $data['usia_anak4']; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if ( !empty( $data['usia_anak5'] ) ) : ?>
                                                                <div class="form-group ">
                                                                    <div class="col-lg-2">
                                                                        <!-- <label>Nama Anak</label> -->
                                                                    </div>
                                                                    <div class="col-lg-2">
                                                                        <?php echo ': '.$data['nama_anak5']; ?>
                                                                    </div>
                                                                    <div class="col-lg-1 text-right">Usia : </div>
                                                                    <div class="col-lg-2">
                                                                        <?php echo $data['usia_anak5']; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                        </div> <!-- -->
                                                    </div> <!-- -->
                                                </div> <!-- -->

                                                <div class="col-xs-12 no-padding">
                                                    <div class="card" style="box-shadow: none;">
                                                        <div class="card-header">
                                                            <div class="card-title">
                                                                <div class="title">DATA ORANG TUA DAN WALI</div>
                                                            </div>
                                                            <div class="detail-btn-edit">
                                                                 <a href="#myModalDataOrtu<?php echo $data['id_calon_karyawan']; ?>" data-toggle="modal" class="btn btn-success btn-xs pull-right" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="card-body" style="padding-left: 0; padding-right: 0;">
                                                            
                                                            <p class="help-block">#Data Ayah</p>

                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                    <label>Nama Ayah</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php echo ': '.$data['nama_ayah']; ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                    <label>Kewarganegaraan</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php
                                                                    $warganegara_ayah_sql     = $sdm->query( "SELECT WargaNegara FROM warganegara WHERE IDwn = '".$data['id_warganegara_ayah']."'" );
                                                                    $data_warganegara_ayah    = $warganegara_ayah_sql->fetch_assoc(); 
                                                                    echo ': '.$data_warganegara_ayah['WargaNegara'];
                                                                    ?>     
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                    <label>Alamat Rumah</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php echo ': '.$data['alamat_rumah_ayah']; ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="col-lg-2">
                                                                    <label>Tempat & Tanggal Lahir</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php
                                                                    // tanggal
                                                                    if ( empty( $data['tanggal_lahir_ayah'] ) || $data['tanggal_lahir_ayah'] == '0000-00-00' ) {
                                                                        $tanggal_lahir_ayah = '';
                                                                    } else {
                                                                        $tanggal_lahir_ayah = $data['tempat_lahir_ayah'].', '. date_format( date_create( $data['tanggal_lahir_ayah'] ), "d-m-Y" );
                                                                    }
                                                                    echo ': '.$tanggal_lahir_ayah; 
                                                                    ?>
                                                                </div>
                                                            </div>   

                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                    <label>Pendidikan</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php
                                                                    $pendidikan_ayah_sql     = $psbo->query( "SELECT Pendidikan FROM pendidikan WHERE IDPendidikan = '".$data['id_pendidikan_ayah']."'" );
                                                                    $data_pendidikan_ayah    = $pendidikan_ayah_sql->fetch_assoc(); 
                                                                    echo ': '.$data_pendidikan_ayah['Pendidikan'];
                                                                    ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                    <label>Pekerjaan</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php
                                                                    $pekerjaan_ayah_sql     = $psbo->query( "SELECT Pekerjaan FROM pekerjaan WHERE IDpekerjaan = '".$data['id_pekerjaan_ayah']."'" );
                                                                    $data_pekerjaan_ayah    = $pekerjaan_ayah_sql->fetch_assoc(); 
                                                                    echo ': '.$data_pekerjaan_ayah['Pekerjaan'];
                                                                    ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                    <label>No. Telepon</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php echo ': '.$data['no_telp_ayah']; ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                    <label>Alamat Kantor</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php echo ': '.$data['alamat_kantor_ayah']; ?>
                                                                </div>
                                                            </div>

                                                            <hr>
                                                            <p class="help-block">#Data Ibu</p>

                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                    <label>Nama Ibu</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php echo ': '.$data['nama_ibu']; ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                    <label>Kewarganegaraan</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php
                                                                    $warganegara_ibu_sql     = $sdm->query( "SELECT WargaNegara FROM warganegara WHERE IDwn = '".$data['id_warganegara_ibu']."'" );
                                                                    $data_warganegara_ibu    = $warganegara_ibu_sql->fetch_assoc(); 
                                                                    echo ': '.$data_warganegara_ibu['WargaNegara'];
                                                                    ?>    
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                    <label>Alamat Rumah</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php echo ': '.$data['alamat_rumah_ibu']; ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="col-lg-2">
                                                                    <label>Tempat/ Tanggal Lahir</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php
                                                                    // tanggal
                                                                    if ( empty( $data['tanggal_lahir_ibu'] ) || $data['tanggal_lahir_ibu'] == '0000-00-00' ) {
                                                                        $tanggal_lahir_ibu = '';
                                                                    } else {
                                                                        $tanggal_lahir_ibu = $data['tempat_lahir_ibu'].', '. date_format( date_create( $data['tanggal_lahir_ibu'] ), "d-m-Y" );
                                                                    }
                                                                    echo ': '.$tanggal_lahir_ibu; 
                                                                    ?>
                                                                </div>
                                                            </div>   

                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                    <label>Pendidikan</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php
                                                                    $pendidikan_ibu_sql     = $psbo->query( "SELECT Pendidikan FROM pendidikan WHERE IDPendidikan = '".$data['id_pendidikan_ibu']."'" );
                                                                    $data_pendidikan_ibu    = $pendidikan_ibu_sql->fetch_assoc(); 
                                                                    echo ': '.$data_pendidikan_ibu['Pendidikan'];
                                                                    ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                    <label>Pekerjaan</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php
                                                                    $pekerjaan_ibu_sql     = $psbo->query( "SELECT Pekerjaan FROM pekerjaan WHERE IDpekerjaan = '".$data['id_pekerjaan_ibu']."'" );
                                                                    $data_pekerjaan_ibu    = $pekerjaan_ibu_sql->fetch_assoc(); 
                                                                    echo ': '.$data_pekerjaan_ibu['Pekerjaan'];
                                                                    ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                    <label>No. Telepon</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php echo ': '.$data['no_telp_ibu']; ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                    <label>Alamat Kantor</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php echo ': '.$data['alamat_kantor_ibu']; ?>
                                                                </div>
                                                            </div>

                                                            <hr>
                                                            <p class="help-block">#Data Wali</p>

                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                    <label>Nama Wali</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php echo ': '.$data['nama_wali']; ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                    <label>Kewarganegaraan</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php
                                                                    $warganegara_wali_sql     = $sdm->query( "SELECT WargaNegara FROM warganegara WHERE IDwn = '".$data['id_warganegara_wali']."'" );
                                                                    $data_warganegara_wali    = $warganegara_wali_sql->fetch_assoc(); 
                                                                    echo ': '.$data_warganegara_wali['WargaNegara'];
                                                                    ?>    
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                    <label>Alamat Rumah</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php echo ': '.$data['alamat_rumah_wali']; ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="col-lg-2">
                                                                    <label>Tempat/ Tanggal Lahir</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php
                                                                    // tanggal
                                                                    if ( empty( $data['tanggal_lahir_wali'] ) || $data['tanggal_lahir_wali'] == '0000-00-00' ) {
                                                                        $tanggal_lahir_wali = '';
                                                                    } else {
                                                                        $tanggal_lahir_wali = $data['tempat_lahir_wali'].', '. date_format( date_create( $data['tanggal_lahir_wali'] ), "d-m-Y" );
                                                                    }
                                                                    echo ': '.$tanggal_lahir_wali; 
                                                                    ?>
                                                                </div>
                                                            </div>   

                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                    <label>Pendidikan</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php
                                                                    $pendidikan_wali_sql     = $psbo->query( "SELECT Pendidikan FROM pendidikan WHERE IDPendidikan = '".$data['id_pendidikan_wali']."'" );
                                                                    $data_pendidikan_wali    = $pendidikan_wali_sql->fetch_assoc(); 
                                                                    echo ': '.$data_pendidikan_wali['Pendidikan'];
                                                                    ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                    <label>Pekerjaan</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php
                                                                    $pekerjaan_wali_sql     = $psbo->query( "SELECT Pekerjaan FROM pekerjaan WHERE IDpekerjaan = '".$data['id_pekerjaan_wali']."'" );
                                                                    $data_pekerjaan_wali    = $pekerjaan_wali_sql->fetch_assoc(); 
                                                                    echo ': '.$data_pekerjaan_wali['Pekerjaan'];
                                                                    ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                    <label>No. Telepon</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php echo ': '.$data['no_telp_wali']; ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-group ">
                                                                <div class="col-lg-2">
                                                                    <label>Alamat Kantor</label>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <?php echo ': '.$data['alamat_kantor_wali']; ?>
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
                                                            <div class="detail-btn-edit">
                                                                 <a href="#myModalDataPendidikan<?php echo $data['id_calon_karyawan']; ?>" data-toggle="modal" class="btn btn-success btn-xs pull-right" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
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
                                                                        <td><?php echo $data['nama_tk']; ?></td>
                                                                        <td>TK</td>
                                                                        <td>-</td>
                                                                        <td><?php echo $data['tk_kota']; ?></td>
                                                                        <td>
                                                                            <?php
                                                                            // tanggal
                                                                            // if ( empty( $data['tk_masuk'] ) || $data['tk_masuk'] == '0000-00-00' ) {
                                                                            //     $tk_masuk = '';
                                                                            // } else {
                                                                            //     $tk_masuk = date_format( date_create( $data['tk_masuk'] ), "d-m-Y" );
                                                                            // }
                                                                            echo $data['tk_masuk']; 
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php
                                                                            // tanggal
                                                                            // if ( empty( $data['tk_keluar'] ) || $data['tk_keluar'] == '0000-00-00' ) {
                                                                            //     $tk_keluar = '';
                                                                            // } else {
                                                                            //     $tk_keluar = date_format( date_create( $data['tk_keluar'] ), "d-m-Y" );
                                                                            // }
                                                                            echo $data['tk_keluar'] ; 
                                                                            ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?php echo $data['nama_sd']; ?></td>
                                                                        <td>SD</td>
                                                                        <td>-</td>
                                                                        <td><?php echo $data['sd_kota']; ?></td>
                                                                        <td>
                                                                            <?php
                                                                            // tanggal
                                                                            // if ( empty( $data['sd_masuk'] ) || $data['sd_masuk'] == '0000-00-00' ) {
                                                                            //     $sd_masuk = '';
                                                                            // } else {
                                                                            //     $sd_masuk = date_format( date_create( $data['sd_masuk'] ), "d-m-Y" );
                                                                            // }
                                                                            echo $data['sd_masuk']; 
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php
                                                                            // tanggal
                                                                            // if ( empty( $data['sd_keluar'] ) || $data['sd_keluar'] == '0000-00-00' ) {
                                                                            //     $sd_keluar = '';
                                                                            // } else {
                                                                            //     $sd_keluar = date_format( date_create( $data['sd_keluar'] ), "d-m-Y" );
                                                                            // }
                                                                            echo $data['sd_keluar']; 
                                                                            ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?php echo $data['nama_smp']; ?></td>
                                                                        <td>SMP</td>
                                                                        <td>-</td>
                                                                        <td><?php echo $data['smp_kota']; ?></td>
                                                                        <td>
                                                                            <?php
                                                                            // tanggal
                                                                            // if ( empty( $data['smp_masuk'] ) || $data['smp_masuk'] == '0000-00-00' ) {
                                                                            //     $smp_masuk = '';
                                                                            // } else {
                                                                            //     $smp_masuk = date_format( date_create( $data['smp_masuk'] ), "d-m-Y" );
                                                                            // }
                                                                            echo $data['smp_masuk']; 
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php
                                                                            // tanggal
                                                                            // if ( empty( $data['smp_keluar'] ) || $data['smp_keluar'] == '0000-00-00' ) {
                                                                            //     $smp_keluar = '';
                                                                            // } else {
                                                                            //     $smp_keluar = date_format( date_create( $data['smp_keluar'] ), "d-m-Y" );
                                                                            // }
                                                                            echo $data['smp_keluar']; 
                                                                            ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?php echo $data['nama_slta']; ?></td>
                                                                        <td>SMA / SMK / SLTA / Sederajat</td>
                                                                        <td><?php echo $data['slta_jurusan']; ?></td>
                                                                        <td><?php echo $data['slta_kota']; ?></td>
                                                                        <td>
                                                                            <?php
                                                                            // tanggal
                                                                            // if ( empty( $data['slta_masuk'] ) || $data['slta_masuk'] == '0000-00-00' ) {
                                                                            //     $slta_masuk = '';
                                                                            // } else {
                                                                            //     $slta_masuk = date_format( date_create( $data['slta_masuk'] ), "d-m-Y" );
                                                                            // }
                                                                            echo $data['slta_masuk']; 
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php
                                                                            // tanggal
                                                                            // if ( empty( $data['slta_keluar'] ) || $data['slta_keluar'] == '0000-00-00' ) {
                                                                            //     $slta_keluar = '';
                                                                            // } else {
                                                                            //     $slta_keluar = date_format( date_create( $data['slta_keluar'] ), "d-m-Y" );
                                                                            // }
                                                                            echo$data['slta_keluar']; 
                                                                            ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?php echo $data['nama_d3']; ?></td>
                                                                        <td>D3</td>
                                                                        <td><?php echo $data['d3_jurusan']; ?></td>
                                                                        <td><?php echo $data['d3_kota']; ?></td>
                                                                        <td>
                                                                            <?php
                                                                            // tanggal
                                                                            // if ( empty( $data['d3_masuk'] ) || $data['d3_masuk'] == '0000-00-00' ) {
                                                                            //     $d3_masuk = '';
                                                                            // } else {
                                                                            //     $d3_masuk = date_format( date_create( $data['d3_masuk'] ), "d-m-Y" );
                                                                            // }
                                                                            echo $data['d3_masuk']; 
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php
                                                                            // tanggal
                                                                            // if ( empty( $data['d3_keluar'] ) || $data['d3_keluar'] == '0000-00-00' ) {
                                                                            //     $d3_keluar = '';
                                                                            // } else {
                                                                            //     $d3_keluar = date_format( date_create( $data['d3_keluar'] ), "d-m-Y" );
                                                                            // }
                                                                            echo $data['d3_keluar']; 
                                                                            ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?php echo $data['nama_s1']; ?></td>
                                                                        <td>S1</td>
                                                                        <td><?php echo $data['s1_jurusan']; ?></td>
                                                                        <td><?php echo $data['s1_kota']; ?></td>
                                                                        <td>
                                                                            <?php
                                                                            // tanggal
                                                                            // if ( empty( $data['s1_masuk'] ) || $data['s1_masuk'] == '0000-00-00' ) {
                                                                            //     $s1_masuk = '';
                                                                            // } else {
                                                                            //     $s1_masuk = date_format( date_create( $data['s1_masuk'] ), "d-m-Y" );
                                                                            // }
                                                                            echo $data['s1_masuk']; 
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php
                                                                            // tanggal
                                                                            // if ( empty( $data['s1_keluar'] ) || $data['s1_keluar'] == '0000-00-00' ) {
                                                                            //     $s1_keluar = '';
                                                                            // } else {
                                                                            //     $s1_keluar = date_format( date_create( $data['s1_keluar'] ), "d-m-Y" );
                                                                            // }
                                                                            echo $data['s1_keluar']; 
                                                                            ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?php echo $data['nama_s2']; ?></td>
                                                                        <td>S2</td>
                                                                        <td><?php echo $data['s2_jurusan']; ?></td>
                                                                        <td><?php echo $data['s2_kota']; ?></td>
                                                                        <td>
                                                                            <?php
                                                                            // tanggal
                                                                            // if ( empty( $data['s2_masuk'] ) || $data['s2_masuk'] == '0000-00-00' ) {
                                                                            //     $s2_masuk = '';
                                                                            // } else {
                                                                            //     $s2_masuk = date_format( date_create( $data['s2_masuk'] ), "d-m-Y" );
                                                                            // }
                                                                            echo $data['s2_masuk']; 
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php
                                                                            // tanggal
                                                                            // if ( empty( $data['s2_keluar'] ) || $data['s2_keluar'] == '0000-00-00' ) {
                                                                            //     $s2_keluar = '';
                                                                            // } else {
                                                                            //     $s2_keluar = date_format( date_create( $data['s2_keluar'] ), "d-m-Y" );
                                                                            // }
                                                                            echo $data['s2_keluar']; 
                                                                            ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?php echo $data['nama_s3']; ?></td>
                                                                        <td>S3</td>
                                                                        <td><?php echo $data['s3_jurusan']; ?></td>
                                                                        <td><?php echo $data['s3_kota']; ?></td>
                                                                        <td>
                                                                            <?php
                                                                            // tanggal
                                                                            // if ( empty( $data['s3_masuk'] ) || $data['s3_masuk'] == '0000-00-00' ) {
                                                                            //     $s3_masuk = '';
                                                                            // } else {
                                                                            //     $s3_masuk = date_format( date_create( $data['s3_masuk'] ), "d-m-Y" );
                                                                            // }
                                                                            echo $data['s3_masuk']; 
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php
                                                                            // tanggal
                                                                            // if ( empty( $data['s3_keluar'] ) || $data['s3_keluar'] == '0000-00-00' ) {
                                                                            //     $s3_keluar = '';
                                                                            // } else {
                                                                            //     $s3_keluar = date_format( date_create( $data['s3_keluar'] ), "d-m-Y" );
                                                                            // }
                                                                            echo $data['s3_keluar']; 
                                                                            ?>
                                                                        </td>
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
                                                            <div class="detail-btn-edit">
                                                                 <a href="#myModalRiwayatPekerjaan<?php echo $data['id_calon_karyawan']; ?>" data-toggle="modal" class="btn btn-success btn-xs pull-right" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
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
                                                                        <td><?php echo $data['nama_perusahaan1']; ?></td>
                                                                        <td><?php echo $data['alamat_perusahaan1']; ?></td>
                                                                        <td><?php echo $data['jenis_usaha1']; ?></td>
                                                                        <td><?php echo $data['riwayat_jabatan1']; ?></td>
                                                                        <?php
                                                                        // tanggal
                                                                        if ( empty( $data['riwayat_pekerjaan_mulai1'] ) || $data['riwayat_pekerjaan_mulai1'] == '0000-00-00' ) {
                                                                            $riwayat_pekerjaan_mulai1 = '';
                                                                        } else {
                                                                            $riwayat_pekerjaan_mulai1 = date_format( date_create( $data['riwayat_pekerjaan_mulai1'] ), "d-m-Y" );
                                                                        }
                                                                        echo '<td>'.$riwayat_pekerjaan_mulai1.'</td>';
                                      
                                                                        if ( empty( $data['riwayat_pekerjaan_akhir1'] ) || $data['riwayat_pekerjaan_akhir1'] == '0000-00-00' ) {
                                                                            $riwayat_pekerjaan_akhir1 = '';
                                                                        } else {
                                                                            $riwayat_pekerjaan_akhir1 = date_format( date_create( $data['riwayat_pekerjaan_akhir1'] ), "d-m-Y" );
                                                                        }
                                                                        echo '<td>'.$riwayat_pekerjaan_akhir1.'</td>';
                                                                        ?> 
                                                                        <td><?php echo $data['alasan_berhenti1']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?php echo $data['nama_perusahaan2']; ?></td>
                                                                        <td><?php echo $data['alamat_perusahaan2']; ?></td>
                                                                        <td><?php echo $data['jenis_usaha2']; ?></td>
                                                                        <td><?php echo $data['riwayat_jabatan2']; ?></td>
                                                                        <?php
                                                                        // tanggal
                                                                        if ( empty( $data['riwayat_pekerjaan_mulai2'] ) || $data['riwayat_pekerjaan_mulai2'] == '0000-00-00' ) {
                                                                            $riwayat_pekerjaan_mulai2 = '';
                                                                        } else {
                                                                            $riwayat_pekerjaan_mulai2 = date_format( date_create( $data['riwayat_pekerjaan_mulai2'] ), "d-m-Y" );
                                                                        }
                                                                        echo '<td>'.$riwayat_pekerjaan_mulai2.'</td>';
                                      
                                                                        if ( empty( $data['riwayat_pekerjaan_akhir2'] ) || $data['riwayat_pekerjaan_akhir2'] == '0000-00-00' ) {
                                                                            $riwayat_pekerjaan_akhir2 = '';
                                                                        } else {
                                                                            $riwayat_pekerjaan_akhir2 = date_format( date_create( $data['riwayat_pekerjaan_akhir2'] ), "d-m-Y" );
                                                                        }
                                                                        echo '<td>'.$riwayat_pekerjaan_akhir2.'</td>';
                                                                        ?> 
                                                                        <td><?php echo $data['alasan_berhenti2']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?php echo $data['nama_perusahaan3']; ?></td>
                                                                        <td><?php echo $data['alamat_perusahaan3']; ?></td>
                                                                        <td><?php echo $data['jenis_usaha3']; ?></td>
                                                                        <td><?php echo $data['riwayat_jabatan3']; ?></td>
                                                                        <?php
                                                                        // tanggal
                                                                        if ( empty( $data['riwayat_pekerjaan_mulai3'] ) || $data['riwayat_pekerjaan_mulai3'] == '0000-00-00' ) {
                                                                            $riwayat_pekerjaan_mulai3 = '';
                                                                        } else {
                                                                            $riwayat_pekerjaan_mulai3 = date_format( date_create( $data['riwayat_pekerjaan_mulai3'] ), "d-m-Y" );
                                                                        }
                                                                        echo '<td>'.$riwayat_pekerjaan_mulai3.'</td>';
                                      
                                                                        if ( empty( $data['riwayat_pekerjaan_akhir3'] ) || $data['riwayat_pekerjaan_akhir3'] == '0000-00-00' ) {
                                                                            $riwayat_pekerjaan_akhir3 = '';
                                                                        } else {
                                                                            $riwayat_pekerjaan_akhir3 = date_format( date_create( $data['riwayat_pekerjaan_akhir3'] ), "d-m-Y" );
                                                                        }
                                                                        echo '<td>'.$riwayat_pekerjaan_akhir3.'</td>';
                                                                        ?> 
                                                                        <td><?php echo $data['alasan_berhenti3']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?php echo $data['nama_perusahaan4']; ?></td>
                                                                        <td><?php echo $data['alamat_perusahaan4']; ?></td>
                                                                        <td><?php echo $data['jenis_usaha4']; ?></td>
                                                                        <td><?php echo $data['riwayat_jabatan4']; ?></td>
                                                                        <?php
                                                                        // tanggal
                                                                        if ( empty( $data['riwayat_pekerjaan_mulai4'] ) || $data['riwayat_pekerjaan_mulai4'] == '0000-00-00' ) {
                                                                            $riwayat_pekerjaan_mulai4 = '';
                                                                        } else {
                                                                            $riwayat_pekerjaan_mulai4 = date_format( date_create( $data['riwayat_pekerjaan_mulai4'] ), "d-m-Y" );
                                                                        }
                                                                        echo '<td>'.$riwayat_pekerjaan_mulai4.'</td>';
                                      
                                                                        if ( empty( $data['riwayat_pekerjaan_akhir4'] ) || $data['riwayat_pekerjaan_akhir4'] == '0000-00-00' ) {
                                                                            $riwayat_pekerjaan_akhir4 = '';
                                                                        } else {
                                                                            $riwayat_pekerjaan_akhir4 = date_format( date_create( $data['riwayat_pekerjaan_akhir4'] ), "d-m-Y" );
                                                                        }
                                                                        echo '<td>'.$riwayat_pekerjaan_akhir4.'</td>';
                                                                        ?> 
                                                                        <td><?php echo $data['alasan_berhenti4']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?php echo $data['nama_perusahaan5']; ?></td>
                                                                        <td><?php echo $data['alamat_perusahaan5']; ?></td>
                                                                        <td><?php echo $data['jenis_usaha5']; ?></td>
                                                                        <td><?php echo $data['riwayat_jabatan5']; ?></td>
                                                                        <?php
                                                                        // tanggal
                                                                        if ( empty( $data['riwayat_pekerjaan_mulai5'] ) || $data['riwayat_pekerjaan_mulai5'] == '0000-00-00' ) {
                                                                            $riwayat_pekerjaan_mulai5 = '';
                                                                        } else {
                                                                            $riwayat_pekerjaan_mulai5 = date_format( date_create( $data['riwayat_pekerjaan_mulai5'] ), "d-m-Y" );
                                                                        }
                                                                        echo '<td>'.$riwayat_pekerjaan_mulai5.'</td>';
                                      
                                                                        if ( empty( $data['riwayat_pekerjaan_akhir5'] ) || $data['riwayat_pekerjaan_akhir5'] == '0000-00-00' ) {
                                                                            $riwayat_pekerjaan_akhir5 = '';
                                                                        } else {
                                                                            $riwayat_pekerjaan_akhir5 = date_format( date_create( $data['riwayat_pekerjaan_akhir5'] ), "d-m-Y" );
                                                                        }
                                                                        echo '<td>'.$riwayat_pekerjaan_akhir5.'</td>';
                                                                        ?> 
                                                                        <td><?php echo $data['alasan_berhenti5']; ?></td>
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
                                                            <div class="detail-btn-edit">
                                                                 <a href="#myModalPengalamanOrganisasi<?php echo $data['id_calon_karyawan']; ?>" data-toggle="modal" class="btn btn-success btn-xs pull-right" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
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
                                                                        <td><?php echo $data['organisasi1']; ?></td>
                                                                        <td><?php echo $data['jenis_organisasi1']; ?></td>
                                                                        <td><?php echo $data['jabatan_organisasi1']; ?></td>
                                                                        <td><?php echo $data['periode_organisasi1']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?php echo $data['organisasi2']; ?></td>
                                                                        <td><?php echo $data['jenis_organisasi2']; ?></td>
                                                                        <td><?php echo $data['jabatan_organisasi2']; ?></td>
                                                                        <td><?php echo $data['periode_organisasi2']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?php echo $data['organisasi3']; ?></td>
                                                                        <td><?php echo $data['jenis_organisasi3']; ?></td>
                                                                        <td><?php echo $data['jabatan_organisasi3']; ?></td>
                                                                        <td><?php echo $data['periode_organisasi3']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?php echo $data['organisasi4']; ?></td>
                                                                        <td><?php echo $data['jenis_organisasi4']; ?></td>
                                                                        <td><?php echo $data['jabatan_organisasi4']; ?></td>
                                                                        <td><?php echo $data['periode_organisasi4']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?php echo $data['organisasi5']; ?></td>
                                                                        <td><?php echo $data['jenis_organisasi5']; ?></td>
                                                                        <td><?php echo $data['jabatan_organisasi5']; ?></td>
                                                                        <td><?php echo $data['periode_organisasi5']; ?></td>
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
                                                            <div class="detail-btn-edit">
                                                                 <a href="#myModalKemampuanBahasaAsing<?php echo $data['id_calon_karyawan']; ?>" data-toggle="modal" class="btn btn-success btn-xs pull-right" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
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
                                                                        <td align="center"><?php echo $data['bahasa_asing1']; ?></td>
                                                                        <td align="center"><?php echo $data['digunakan_sejak1']; ?></td>
                                                                        <td align="center"><?php if ( $data['membaca1'] == 'KS' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                        <td align="center"><?php if ( $data['membaca1'] == 'K' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                        <td align="center"><?php if ( $data['membaca1'] == 'C' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                        <td align="center"><?php if ( $data['membaca1'] == 'B' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                        <td align="center"><?php if ( $data['membaca1'] == 'BS' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                        <td align="center"><?php if ( $data['menulis1'] == 'KS' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                        <td align="center"><?php if ( $data['menulis1'] == 'K' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                        <td align="center"><?php if ( $data['menulis1'] == 'C' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                        <td align="center"><?php if ( $data['menulis1'] == 'B' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                        <td align="center"><?php if ( $data['menulis1'] == 'BS' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                        <td align="center"><?php if ( $data['berbicara1'] == 'KS' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                        <td align="center"><?php if ( $data['berbicara1'] == 'K' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                        <td align="center"><?php if ( $data['berbicara1'] == 'C' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                        <td align="center"><?php if ( $data['berbicara1'] == 'B' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                        <td align="center"><?php if ( $data['berbicara1'] == 'BS' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td align="center"><?php echo $data['bahasa_asing2']; ?></td>
                                                                        <td align="center"><?php echo $data['digunakan_sejak2']; ?></td>
                                                                        <td align="center"><?php if ( $data['membaca2'] == 'KS' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                        <td align="center"><?php if ( $data['membaca2'] == 'K' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                        <td align="center"><?php if ( $data['membaca2'] == 'C' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                        <td align="center"><?php if ( $data['membaca2'] == 'B' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                        <td align="center"><?php if ( $data['membaca2'] == 'BS' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                        <td align="center"><?php if ( $data['menulis2'] == 'KS' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                        <td align="center"><?php if ( $data['menulis2'] == 'K' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                        <td align="center"><?php if ( $data['menulis2'] == 'C' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                        <td align="center"><?php if ( $data['menulis2'] == 'B' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                        <td align="center"><?php if ( $data['menulis2'] == 'BS' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                        <td align="center"><?php if ( $data['berbicara2'] == 'KS' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                        <td align="center"><?php if ( $data['berbicara2'] == 'K' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                        <td align="center"><?php if ( $data['berbicara2'] == 'C' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                        <td align="center"><?php if ( $data['berbicara2'] == 'B' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                        <td align="center"><?php if ( $data['berbicara2'] == 'BS' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td align="center"><?php echo $data['bahasa_asing3']; ?></td>
                                                                        <td align="center"><?php echo $data['digunakan_sejak3']; ?></td>
                                                                        <td align="center"><?php if ( $data['membaca3'] == 'KS' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                        <td align="center"><?php if ( $data['membaca3'] == 'K' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                        <td align="center"><?php if ( $data['membaca3'] == 'C' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                        <td align="center"><?php if ( $data['membaca3'] == 'B' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                        <td align="center"><?php if ( $data['membaca3'] == 'BS' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                        <td align="center"><?php if ( $data['menulis3'] == 'KS' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                        <td align="center"><?php if ( $data['menulis3'] == 'K' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                        <td align="center"><?php if ( $data['menulis3'] == 'C' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                        <td align="center"><?php if ( $data['menulis3'] == 'B' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                        <td align="center"><?php if ( $data['menulis3'] == 'BS' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                        <td align="center"><?php if ( $data['berbicara3'] == 'KS' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                        <td align="center"><?php if ( $data['berbicara3'] == 'K' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                        <td align="center"><?php if ( $data['berbicara3'] == 'C' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                        <td align="center"><?php if ( $data['berbicara3'] == 'B' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                        <td align="center"><?php if ( $data['berbicara3'] == 'BS' ) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>

                                                            <p class="help-block">Keterangan : </p>
                                                            <p>KS : Kurang Sekali</p>
                                                            <p>K : Kurang</p>
                                                            <p>C : Cukup</p>
                                                            <p>B : Baik</p>
                                                            <p>BS : Baik sekali</p>

                                                        </div> <!-- -->
                                                    </div> <!-- -->
                                                </div> <!-- -->
                                                
                                            </div>
                                        </form>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="berkas-lamaran">
                                        <form action="action-update.php" method="post" class="form-horizontal form-label-left">
                                            <div class="tab-pane fade in active">
                                                <div class="col-xs-12 no-padding question-crew">
                                                    <div class="card" style="box-shadow: none;">
                                                        <div class="card-header">
                                                            <div class="card-title">
                                                                <div class="title">BERKAS CALON GURU</div>
                                                                <div class="detail-btn-edit">
                                                                     <a href="#myModal-change-berkas" data-toggle="modal" class="btn btn-success btn-xs pull-right" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body" style="padding-left: 0; padding-right: 0;">
                                                            <?php 
                                                            $no = 1;
                                                            $key = $sdm->real_escape_string( anti_injection( $data['id_calon_karyawan'] ) );
                                                            $master_berkas_sql = $sdm->query( "SELECT * FROM master_berkas WHERE kategori_pegawai = 'guru'" );

                                                            $data_berkas_sql = $sdm->query( "SELECT * FROM kelengkapan_berkas 
                                                                                            LEFT JOIN master_berkas ON kelengkapan_berkas.id_berkas = master_berkas.id_berkas  
                                                                                            LEFT JOIN calon_karyawan ON kelengkapan_berkas.id_calon_karyawan = calon_karyawan.id_calon_karyawan 
                                                                                            WHERE calon_karyawan.id_calon_karyawan = '$key' AND master_berkas.kategori_pegawai = 'guru'" 
                                                                                            );

                                                            $arr_one = '';
                                                            while ( $row = $data_berkas_sql->fetch_assoc() ) {
                                                                $arr_one[] = $row['id_berkas'];
                                                            }

                                                            while ( $row2 = $master_berkas_sql->fetch_assoc() ) {
                                                               
                                                                $checkit = '';

                                                                $id = $row2['id_berkas'];
                                                                if ( in_array( $id, $arr_one ) ) {
                                                                    $checkit = 'checked="checked"';
                                                                }
                                                                ?>
                                                                <div class="col-md-12 no-padding">
                                                                    <!-- <i class="fa fa-check" aria-hidden="true"></i> -->
                                                                    <div class="checkbox3 checkbox-inline checkbox-check checkbox-light">
                                                                        <input type="checkbox" id="berkas<?php echo $no; ?>" name="berkas[]" value="<?php echo $row2['id_berkas']; ?>" <?php echo $checkit; ?> disabled>
                                                                       <!--  <input type="hidden" name="id_kelengkapan_berkas[]" value="<?php //echo $row['id_kelengkapan_berkas']; ?>"> -->

                                                                        <label for="berkas<?php echo $no; ?>"><?php echo $row2['kelengkapan_berkas']; ?></label>
                                                                    </div>
                                                                </div>
                                                            <?php 
                                                            $no++; 
                                                            }  
                                                            ?>
                                                            <!-- <div class="form-group">
                                                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                                                    <button type="submit" name="btn-update-berkas-calon-karyawan" class="update-class btn btn-primary">Perbarui</button>
                                                                    <a href="#myModal-change-berkas" data-toggle="modal" class="update-class btn btn-primary">Edit</a>
                                                                </div>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="jawaban-soal">
                                        <!-- <form class="form-horizontal form-label-left"> -->
                                            <div class="tab-pane fade in active">
                                                <div class="col-xs-12 no-padding question-crew">
                                                    <div class="card" style="box-shadow: none;">
                                                        <div class="card-header">
                                                            <div class="card-title">
                                                                <div class="title">PERTANYAAN UNTUK CALON GURU</div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body" style="padding-left: 0; padding-right: 0;">

                                                            <?php 
                                                            $key = $sdm->real_escape_string( anti_injection( $data['id_calon_karyawan'] ) );
                                                            $data_soal_sql = $sdm->query( "SELECT * FROM soal_soal 
                                                                                            LEFT JOIN master_soal ON soal_soal.id_soal = master_soal.id_soal  
                                                                                            LEFT JOIN calon_karyawan ON soal_soal.id_calon_karyawan = calon_karyawan.id_calon_karyawan 
                                                                                            WHERE calon_karyawan.id_calon_karyawan = '$key' AND master_soal.kategori_pegawai = 'guru'
                                                                                            GROUP BY soal_soal.id_soal" 
                                                                                        );
                                                            $no = 1; while ( $data_soal = $data_soal_sql->fetch_assoc() ) { 

                                                            ?>
                                                                <div class="form-group">
                                                                    <div class="col-xs-12 no-padding">
                                                                        <label style="width:100%;font-size: 14px !important;">
                                                                            <?php echo '<span class="no">'.$no.'</span>&nbsp;'. $data_soal['soal']; ?>
                                                                        </label>
                                                                        <span><i><strong>Jawaban:</strong></i></span><br><br>
                                                                        <?php if ( !empty( $data_soal['jawaban'] ) ) echo $data_soal['jawaban']; else echo '......'; ?>
                                                                        <div class="detail-btn-edit detail-btn-edit2">
                                                                             <a href="#myModalPertanyaanPelamar<?php echo $data_soal['id_soal_pelamar'].$no; ?>" data-toggle="modal" class="btn btn-success btn-xs pull-right" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                        <hr>
                                                                    </div>
                                                                </div>

                                                                <!-- START: POP-UP FOR EDIT JAWABAN SOAL -->
                                                                <div aria-hidden="true" aria-labelledby="myModalPertanyaanPelamarLabel<?php echo $data_soal['id_soal_pelamar'].$no; ?>" role="dialog" tabindex="-1" id="myModalPertanyaanPelamar<?php echo $data_soal['id_soal_pelamar'].$no; ?>" class="modal fade">
                                                                    <div class="modal-dialog modal-lg">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                                                                <h4 class="modal-title">Edit Jawaban Untuk Calon Karyawan</h4>
                                                                            </div>
                                                                            <div class="modal-body">

                                                                                <form role="form" method="post" action="action-update.php?id=<?php echo base64_encode( $data_soal['id_soal_pelamar'] ); ?>" class="form-horizontal form-label-left popup-edit-crew">

                                                                                    <label style="width:100%;font-size: 14px !important;">
                                                                                        <?php echo '<span class="no-2">'.$no.'.</span>&nbsp;'. $data_soal['soal']; ?>
                                                                                    </label>

                                                                                    <div class="form-group">
                                                                                        <div class="col-lg-12" style="margin-bottom: 15px;">
                                                                                            <label>Jawaban:</label>
                                                                                            <textarea name="jawaban" class="form-control ckeditor" rows="8"><?php echo $data_soal['jawaban']; ?></textarea>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <div class="col-lg-12" style="margin-bottom: 15px;">
                                                                                            <button type="submit" name="btn-update-jawaban-soal-calon-karyawan" value="<?php echo $data_soal['id_soal_pelamar']; ?>" class="update-class btn btn-primary">Save changes</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </form>

                                                                                <div class="clearfix"></div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- END: POP-UP FOR EDIT JAWABAN SOAL -->
                                                            <?php $no++; } ?>
                                
                                                        </div> <!-- -->
                                                    </div> <!-- -->
                                                </div> <!-- -->
                                            </div>

                                        <!-- </form> -->
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end: step -->

                        <!-- <div class="form-group pull-right">
                            <div class="col-lg-12">
                                <a onClick="window.history.go(-1);" class="btn btn-info btn-sm" title="Kembali ke halaman sebelumnya"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back</a>
                            </div>
                        </div> -->
                    </div> <!-- end: card-body -->
                </div>
            </div>
        </div>
    </div>
</div>


<!-- START: POP-UP FOR ADD DATA -->
<div aria-hidden="true" role="dialog" tabindex="-1" id="myModal-change-berkas" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">EDIT KELENGKAPAN BERKAS LAMARAN</h4>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel-body">
                            <div class="form">

                               <form name="myForm" action="action-update.php" method="post" class="form-horizontal form-label-left">
                                    <div class="tab-pane fade in active">
                                        <div class="col-xs-12 no-padding question-crew">
                                            <div class="card" style="box-shadow: none;">

                                                <input type="hidden" name="id_calon_karyawan" value="<?php echo $data['id_calon_karyawan']; ?>">
                                                
                                                <div class="card-body" style="padding: 0;">
                                                    <?php 

                                                    $data_berkas = $sdm->query( "SELECT * FROM master_berkas WHERE kategori_pegawai = 'guru'" );
                                                    $no = 1; while ( $data = $data_berkas->fetch_assoc() ) { 
                                                    ?>
                                                        <div class="col-md-12 no-padding">
                                                            <input type="hidden" name="kelengkapan_berkas[]" value="<?php echo $data['kelengkapan_berkas']; ?>">
                                                            <div class="checkbox3 checkbox-inline checkbox-check checkbox-light">
                                                                <input type="checkbox" id="berkasModal<?php echo $no; ?>" name="berkas[]" value="<?php echo $data['id_berkas']; ?>">

                                                                <label for="berkasModal<?php echo $no; ?>"><?php echo $data['kelengkapan_berkas']; ?></label>
                                                            </div>
                                                        </div>
                                                    <?php $no++; } ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group pull-right">
                                            <div class="col-lg-12">
                                                <!-- <button type="button" class="btn btn-danger" onclick="window.history.go(-1);">Batal</button> -->
                                                <button type="submit" name="insert-new-berkas-pelamar-teacher" class="btn btn-info">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: POP-UP FOR ADD DATA -->