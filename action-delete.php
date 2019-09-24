<?php
include "includes/conn.php";
require_once "includes/functions.php";
date_default_timezone_set("Asia/Jakarta");

/**
* -------------------------------------
* Delete class tk
* -------------------------------------
*/
if ( isset( $_GET['del-class-tk'] ) ) :
    $id = $tk->real_escape_string( anti_injection( base64_decode( $_GET['del-class-tk'] ) ) );
    $delete = $tk->query( "DELETE FROM kelas WHERE id_kelas = '$id'" );

    if ( $delete ) {
        // die();a
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-success alert-dismissible" role="alert"><i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Data kelas berhasil dihapus
                                </div>';
    } else {
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-exclamation-triangle"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Gagal dihapus !
                                </div>';
    }

endif;


/**
* -------------------------------------
* Delete class sd
* -------------------------------------
*/
if ( isset( $_GET['del-class-sd'] ) ) :
    $id = $sd->real_escape_string( anti_injection( base64_decode( $_GET['del-class-sd'] ) ) );
    $delete = $sd->query( "DELETE FROM kelas WHERE id_kelas = '$id'" );

    if ( $delete ) {
        // die();a
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-success alert-dismissible" role="alert"><i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Data kelas berhasil dihapus
                                </div>';
    } else {
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-exclamation-triangle"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Gagal dihapus !
                                </div>';
    }

endif;


/**
* -------------------------------------
* Delete class smp
* -------------------------------------
*/
if ( isset( $_GET['del-class-smp'] ) ) :
    $id = $smp->real_escape_string( anti_injection( base64_decode( $_GET['del-class-smp'] ) ) );
    $delete = $smp->query( "DELETE FROM kelas WHERE id_kelas = '$id'" );

    if ( $delete ) {
        // die();a
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-success alert-dismissible" role="alert"><i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Data kelas berhasil dihapus
                                </div>';
    } else {
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-exclamation-triangle"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Gagal dihapus !
                                </div>';
    }

endif;


/**
* -------------------------------------
* Delete photo 1 siswa tk
* -------------------------------------
*/
if ( isset( $_POST['the_id_photo1_tk'] ) ) :
   
    $the_id = $tk->real_escape_string( anti_injection( $_POST['the_id_photo1_tk'] ) );
    $nis = substr( $the_id, 8 );

    $sql = $tk->query( "SELECT foto FROM siswa WHERE nis = '$nis'" );
    $data = $sql->fetch_assoc();

    $photo = $data['foto'];

    // file in directory
    $dir1 = 'img/profile/'.$photo;
    $path1 = '';

    if ( file_exists( $dir1 ) AND ( !empty( $data['foto' ] ) ) ) { // check if file exists and available in database
        unlink( $dir1 ); // then, remove file in directory
    }

    $delete_photo1 = $tk->query( "UPDATE siswa SET foto = '' WHERE nis = '$nis'" );

endif;


/**
* -------------------------------------
* Delete photo 2 siswa tk
* -------------------------------------
*/
if ( isset( $_POST['the_id_photo2_tk'] ) ) :
   
    $the_id = $tk->real_escape_string( anti_injection( $_POST['the_id_photo2_tk'] ) );
    $nis = substr( $the_id, 8 );

    $sql = $tk->query( "SELECT foto2 FROM siswa WHERE nis = '$nis'" );
    $data = $sql->fetch_assoc();

    $photo = $data['foto2'];

    // file in directory
    $dir2 = 'img/profile/'.$photo;
    $path2 = '';

    if ( file_exists( $dir2 ) AND ( !empty( $data['foto2' ] ) ) ) { // check if file exists and available in database
        unlink( $dir2 ); // then, remove file in directory
    }

    $delete_photo2 = $tk->query( "UPDATE siswa SET foto2 = '' WHERE nis = '$nis'" );

endif;


/**
* -------------------------------------
* Delete photo 1 siswa sd
* -------------------------------------
*/
if ( isset( $_POST['the_id_photo1_sd'] ) ) :
   
    $the_id = $sd->real_escape_string( anti_injection( $_POST['the_id_photo1_sd'] ) );
    $nis = substr( $the_id, 8 );

    $sql = $sd->query( "SELECT foto FROM siswa WHERE nis = '$nis'" );
    $data = $sql->fetch_assoc();

    $photo = $data['foto'];

    // file in directory
    $dir1 = 'img/profile/'.$photo;
    $path1 = '';

    if ( file_exists( $dir1 ) AND ( !empty( $data['foto' ] ) ) ) { // check if file exists and available in database
        unlink( $dir1 ); // then, remove file in directory
    }

    $delete_photo1 = $sd->query( "UPDATE siswa SET foto = '' WHERE nis = '$nis'" );

endif;


/**
* -------------------------------------
* Delete photo 2 siswa sd
* -------------------------------------
*/
if ( isset( $_POST['the_id_photo2_sd'] ) ) :
   
    $the_id = $sd->real_escape_string( anti_injection( $_POST['the_id_photo2_sd'] ) );
    $nis = substr( $the_id, 8 );

    $sql = $sd->query( "SELECT foto2 FROM siswa WHERE nis = '$nis'" );
    $data = $sql->fetch_assoc();

    $photo = $data['foto2'];

    // file in directory
    $dir2 = 'img/profile/'.$photo;
    $path2 = '';

    if ( file_exists( $dir2 ) AND ( !empty( $data['foto2' ] ) ) ) { // check if file exists and available in database
        unlink( $dir2 ); // then, remove file in directory
    }

    $delete_photo2 = $sd->query( "UPDATE siswa SET foto2 = '' WHERE nis = '$nis'" );

endif;


/**
* -------------------------------------
* Delete photo 1 siswa smp
* -------------------------------------
*/
if ( isset( $_POST['the_id_photo1_smp'] ) ) :
   
    $the_id = $smp->real_escape_string( anti_injection( $_POST['the_id_photo1_smp'] ) );
    $nis = substr( $the_id, 9 );

    $sql = $smp->query( "SELECT foto FROM siswa WHERE nis = '$nis'" );
    $data = $sql->fetch_assoc();

    $photo = $data['foto'];

    // file in directory
    $dir1 = 'img/profile/'.$photo;
    $path1 = '';

    if ( file_exists( $dir1 ) AND ( !empty( $data['foto' ] ) ) ) { // check if file exists and available in database
        unlink( $dir1 ); // then, remove file in directory
    }

    $delete_photo1 = $smp->query( "UPDATE siswa SET foto = '' WHERE nis = '$nis'" );

endif;


/**
* -------------------------------------
* Delete photo 2 siswa smp
* -------------------------------------
*/
if ( isset( $_POST['the_id_photo2_smp'] ) ) :
   
    $the_id = $smp->real_escape_string( anti_injection( $_POST['the_id_photo2_smp'] ) );
    $nis = substr( $the_id, 9 );

    $sql = $smp->query( "SELECT foto2 FROM siswa WHERE nis = '$nis'" );
    $data = $sql->fetch_assoc();

    $photo = $data['foto2'];

    // file in directory
    $dir2 = 'img/profile/'.$photo;
    $path2 = '';

    if ( file_exists( $dir2 ) AND ( !empty( $data['foto2' ] ) ) ) { // check if file exists and available in database
        unlink( $dir2 ); // then, remove file in directory
    }

    $delete_photo2 = $smp->query( "UPDATE siswa SET foto2 = '' WHERE nis = '$nis'" );

endif;


/**
* -------------------------------------
* Delete mata pelajaran tk
* -------------------------------------
*/
if ( isset( $_GET['del-mapel-tk'] ) ) :
    $id = $tk->real_escape_string( anti_injection( base64_decode( $_GET['del-mapel-tk'] ) ) );
    $delete = $tk->query( "DELETE FROM mata_pelajaran WHERE id_mapel = '$id'" );

    if ( $delete ) {
        // die();a
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-success alert-dismissible" role="alert"><i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Data kelas berhasil dihapus
                                </div>';
    } else {
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-exclamation-triangle"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Gagal dihapus !
                                </div>';
    }

endif;



/**
* -------------------------------------
* Delete mata pelajaran sd
* -------------------------------------
*/
if ( isset( $_GET['del-mapel-sd'] ) ) :
    $id = $sd->real_escape_string( anti_injection( base64_decode( $_GET['del-mapel-sd'] ) ) );
    $delete = $sd->query( "DELETE FROM mata_pelajaran WHERE id_mapel = '$id'" );

    if ( $delete ) {
        // die();a
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-success alert-dismissible" role="alert"><i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Data kelas berhasil dihapus
                                </div>';
    } else {
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-exclamation-triangle"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Gagal dihapus !
                                </div>';
    }

endif;


/**
* -------------------------------------
* Delete mata pelajaran smp
* -------------------------------------
*/
if ( isset( $_GET['del-mapel-smp'] ) ) :
    $id = $smp->real_escape_string( anti_injection( base64_decode( $_GET['del-mapel-smp'] ) ) );
    $delete = $smp->query( "DELETE FROM mata_pelajaran WHERE id_mapel = '$id'" );

    if ( $delete ) {
        // die();a
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-success alert-dismissible" role="alert"><i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Data kelas berhasil dihapus
                                </div>';
    } else {
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-exclamation-triangle"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Gagal dihapus !
                                </div>';
    }

endif;