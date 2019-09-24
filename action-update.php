<?php
include "includes/conn.php";
require_once "includes/functions.php";
date_default_timezone_set("Asia/Jakarta");


/**
* -------------------------------------
* Update data karyawan
* -------------------------------------
*/
if ( isset( $_POST['btn-update-karyawan'] ) ) :
    $id = $sdm->real_escape_string( anti_injection( base64_decode( $_GET['id'] ) ) );
    $nama_karyawan = $sdm->real_escape_string( anti_injection( $_POST['nama_karyawan'] ) );
    $telepon = $sdm->real_escape_string( anti_injection( $_POST['telepon'] ) );
    $email = $sdm->real_escape_string( anti_injection( $_POST['email'] ) );
    $jenis_kelamin = $sdm->real_escape_string( anti_injection( $_POST['jenis_kelamin'] ) );
    $tempat_lahir = $sdm->real_escape_string( anti_injection( $_POST['tempat_lahir'] ) );
    if ( empty( $_POST['tanggal_lahir'] ) || $_POST['tanggal_lahir'] == '0000-00-00' ) {
        $tanggal_lahir = '';
    } else {
        $tanggal_lahir = $tk->real_escape_string( date( "Y-m-d", strtotime( $_POST['tanggal_lahir'] ) ) );
    }
    $agama = $sdm->real_escape_string( anti_injection( $_POST['agama'] ) );
    $alamat = $sdm->real_escape_string( anti_injection( $_POST['alamat'] ) );
    $status_karyawan = $sdm->real_escape_string( anti_injection( $_POST['status_karyawan'] ) );
    // $date_create = date( 'Y-m-d' );

    // if ( $telepon == '0' || $nik == '0' || $ta == '0' ) {
    //     echo "<script>window.history.go(-1);</script>";
    //     $_SESSION['messages'] = '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-exclamation-triangle"></i>
    //                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
    //                                 Data tidak lengkap !, silahkan ulangi.
    //                                 </div>';
    // } else {

    $update = $sdm->query( "UPDATE karyawan SET nik = '$id', 
                                                karyawan = '$nama_karyawan', 
                                                telepon = '$telepon', 
                                                email = '$email', 
                                                alamat = '$alamat', 
                                                agama = '$agama',
                                                tempat_lahir = '$tempat_lahir', 
                                                tanggal_lahir = '$tanggal_lahir', 
                                                jenis_kelamin = '$jenis_kelamin', 
                                                status_karyawan = '$status_karyawan'
                                            WHERE nik = '$id'" );

    if ( $update ) {
        // die();
        echo "<script>window.history.go(-2);</script>";
        $_SESSION['messages'] = '<div class="alert alert-success alert-dismissible" role="alert"><i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Data berhasil diperbarui
                                </div>';
    } else {
        die();
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-exclamation-triangle"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Gagal diperbarui !
                                </div>';
    }
    // }
endif;


/**
* -------------------------------------
* Update data diri calon karyawan
* -------------------------------------
*/
if ( isset( $_POST['btn-update-data-diri-calon-karyawan'] ) ) :
    $id = $sdm->real_escape_string( anti_injection( base64_decode( $_GET['id'] ) ) );
    // $jabatan = $sdm->real_escape_string( anti_injection( $_POST['jabatan'] ) );
    $nama_lengkap = $sdm->real_escape_string( anti_injection( $_POST['nama_lengkap'] ) );
    $tempat_lahir = $sdm->real_escape_string( anti_injection( $_POST['tempat_lahir'] ) );
    if ( empty( $_POST['tanggal_lahir'] ) || $_POST['tanggal_lahir'] == '0000-00-00' ) {
        $tanggal_lahir = '';
    } else {
        $tanggal_lahir = $sdm->real_escape_string( date( "Y-m-d", strtotime( $_POST['tanggal_lahir'] ) ) );
    }
    $jenis_kelamin = $sdm->real_escape_string( anti_injection( $_POST['jenis_kelamin'] ) );
    $id_warganegara = $sdm->real_escape_string( anti_injection( $_POST['id_warganegara'] ) );
    $suku = $sdm->real_escape_string( anti_injection( $_POST['suku'] ) );
    $id_agama = $sdm->real_escape_string( anti_injection( $_POST['id_agama'] ) );
    $gol_darah = $sdm->real_escape_string( anti_injection( $_POST['gol_darah'] ) );
    $status_perkawinan = $sdm->real_escape_string( anti_injection( $_POST['status_perkawinan'] ) );
    $anak_ke = $sdm->real_escape_string( anti_injection( $_POST['anak_ke'] ) );
    $jumlah_saudara = $sdm->real_escape_string( anti_injection( $_POST['jumlah_saudara'] ) );

    $update = $sdm->query( "UPDATE calon_karyawan SET nama_lengkap = '$nama_lengkap', 
                                                        tempat_lahir = '$tempat_lahir', 
                                                        tanggal_lahir = '$tanggal_lahir', 
                                                        jenis_kelamin = '$jenis_kelamin', 
                                                        id_warganegara = '$id_warganegara',
                                                        suku = '$suku', 
                                                        id_agama = '$id_agama', 
                                                        gol_darah = '$gol_darah', 
                                                        status_perkawinan = '$status_perkawinan',
                                                        anak_ke = '$anak_ke',
                                                        jumlah_saudara = '$jumlah_saudara'
                                                WHERE id_calon_karyawan = '$id'" );

    if ( $update ) {
        // die();
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-success alert-dismissible" role="alert"><i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Data berhasil diperbarui
                                </div>';
    } else {
        // die();
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-exclamation-triangle"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Gagal diperbarui !
                                </div>';
    }
endif;


/**
* -------------------------------------
* Update data alamat calon karyawan
* -------------------------------------
*/
if ( isset( $_POST['btn-update-data-alamat-calon-karyawan'] ) ) :
    $id = $sdm->real_escape_string( anti_injection( base64_decode( $_GET['id'] ) ) );
    $alamat_domisili = $sdm->real_escape_string( anti_injection( $_POST['alamat_domisili'] ) );
    $status_tempat_tinggal = $sdm->real_escape_string( anti_injection( $_POST['status_tempat_tinggal'] ) );
    $no_telp_rumah = $sdm->real_escape_string( anti_injection( $_POST['no_telp_rumah'] ) );
    $no_hp = $sdm->real_escape_string( anti_injection( $_POST['no_hp'] ) );
    $email = $sdm->real_escape_string( anti_injection( $_POST['email'] ) );
    $nama_darurat = $sdm->real_escape_string( anti_injection( $_POST['nama_darurat'] ) );
    $hubungan_darurat = $sdm->real_escape_string( anti_injection( $_POST['hubungan_darurat'] ) );
    $alamat_darurat = $sdm->real_escape_string( anti_injection( $_POST['alamat_darurat'] ) );

    $update = $sdm->query( "UPDATE calon_karyawan SET alamat_domisili = '$alamat_domisili', 
                                                        status_tempat_tinggal = '$status_tempat_tinggal', 
                                                        no_telp_rumah = '$no_telp_rumah', 
                                                        no_hp = '$no_hp', 
                                                        email = '$email',
                                                        nama_darurat = '$nama_darurat',
                                                        hubungan_darurat = '$hubungan_darurat',
                                                        alamat_darurat = '$alamat_darurat'
                                                WHERE id_calon_karyawan = '$id'" );

    if ( $update ) {
        // die();
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-success alert-dismissible" role="alert"><i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Data berhasil diperbarui
                                </div>';
    } else {
        // die();
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-exclamation-triangle"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Gagal diperbarui !
                                </div>';
    }
endif;


/**
* -------------------------------------
* Update data identitas calon karyawan
* -------------------------------------
*/
if ( isset( $_POST['btn-update-data-identitas-calon-karyawan'] ) ) :
    $id                      = $sdm->real_escape_string( anti_injection( base64_decode( $_GET['id'] ) ) );
    $no_ktp                  = $sdm->real_escape_string( anti_injection( $_POST['no_ktp'] ) );
    $ktp_dikeluarkan_di      = $sdm->real_escape_string( anti_injection( $_POST['ktp_dikeluarkan_di'] ) );

    if ( empty( $_POST['masa_berlaku_ktp'] ) || $_POST['masa_berlaku_ktp'] == '0000-00-00' ) { $masa_berlaku_ktp = '';
    } else { $masa_berlaku_ktp = $sdm->real_escape_string( date( "Y-m-d", strtotime( $_POST['masa_berlaku_ktp'] ) ) ); }

    $no_sim                  = $sdm->real_escape_string( anti_injection( $_POST['no_sim'] ) );
    $sim_dikeluarkan_di      = $sdm->real_escape_string( anti_injection( $_POST['sim_dikeluarkan_di'] ) );

    if ( empty( $_POST['masa_berlaku_sim'] ) || $_POST['masa_berlaku_sim'] == '0000-00-00' ) { $masa_berlaku_sim = '';
    } else { $masa_berlaku_sim = $sdm->real_escape_string( date( "Y-m-d", strtotime( $_POST['masa_berlaku_sim'] ) ) ); }

    $no_passport             = $sdm->real_escape_string( anti_injection( $_POST['no_passport'] ) );
    $passport_dikeluarkan_di = $sdm->real_escape_string( anti_injection( $_POST['passport_dikeluarkan_di'] ) );

    if ( empty( $_POST['masa_berlaku_passport'] ) || $_POST['masa_berlaku_passport'] == '0000-00-00' ) { $masa_berlaku_passport = '';
    } else { $masa_berlaku_passport = $sdm->real_escape_string( date( "Y-m-d", strtotime( $_POST['masa_berlaku_passport'] ) ) ); }

    $update = $sdm->query( "UPDATE calon_karyawan SET no_ktp = '$no_ktp', 
                                                        ktp_dikeluarkan_di = '$ktp_dikeluarkan_di', 
                                                        masa_berlaku_ktp = '$masa_berlaku_ktp', 
                                                        no_sim = '$no_sim', 
                                                        sim_dikeluarkan_di = '$sim_dikeluarkan_di', 
                                                        masa_berlaku_sim = '$masa_berlaku_sim', 
                                                        no_passport = '$no_passport', 
                                                        passport_dikeluarkan_di = '$passport_dikeluarkan_di', 
                                                        masa_berlaku_passport = '$masa_berlaku_passport'
                                                WHERE id_calon_karyawan = '$id'" );

    if ( $update ) {
        // die();
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-success alert-dismissible" role="alert"><i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Data berhasil diperbarui
                                </div>';
    } else {
        // die();
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-exclamation-triangle"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Gagal diperbarui !
                                </div>';
    }
endif;


/**
* -------------------------------------
* Update data keluarga calon karyawan
* -------------------------------------
*/
if ( isset( $_POST['btn-update-data-keluarga-calon-karyawan'] ) ) :
    $id                      = $sdm->real_escape_string( anti_injection( base64_decode( $_GET['id'] ) ) );
    $nama_suami_istri        = $sdm->real_escape_string( anti_injection( $_POST['nama_suami_istri'] ) );
    $pekerjaan_suami_istri   = $sdm->real_escape_string( anti_injection( $_POST['pekerjaan_suami_istri'] ) );
    $jumlah_anak             = $sdm->real_escape_string( anti_injection( $_POST['jumlah_anak'] ) );
    $nama_anak1              = $sdm->real_escape_string( anti_injection( $_POST['nama_anak1'] ) );
    $nama_anak2              = $sdm->real_escape_string( anti_injection( $_POST['nama_anak2'] ) );
    $nama_anak3              = $sdm->real_escape_string( anti_injection( $_POST['nama_anak3'] ) );
    $nama_anak4              = $sdm->real_escape_string( anti_injection( $_POST['nama_anak4'] ) );
    $nama_anak5              = $sdm->real_escape_string( anti_injection( $_POST['nama_anak5'] ) );
    $usia_anak1              = $sdm->real_escape_string( anti_injection( $_POST['usia_anak1'] ) );
    $usia_anak2              = $sdm->real_escape_string( anti_injection( $_POST['usia_anak2'] ) );
    $usia_anak3              = $sdm->real_escape_string( anti_injection( $_POST['usia_anak3'] ) );
    $usia_anak4              = $sdm->real_escape_string( anti_injection( $_POST['usia_anak4'] ) );
    $usia_anak5              = $sdm->real_escape_string( anti_injection( $_POST['usia_anak5'] ) );

    $update = $sdm->query( "UPDATE calon_karyawan SET nama_suami_istri = '$nama_suami_istri', 
                                                    pekerjaan_suami_istri = '$pekerjaan_suami_istri',
                                                    jumlah_anak = '$jumlah_anak',
                                                    nama_anak1 = '$nama_anak1',
                                                    usia_anak1 = '$usia_anak1',
                                                    nama_anak2 = '$nama_anak2',
                                                    usia_anak2 = '$usia_anak2',
                                                    nama_anak3 = '$nama_anak3',
                                                    usia_anak3 = '$usia_anak3',
                                                    nama_anak4 = '$nama_anak4',
                                                    usia_anak4 = '$usia_anak4',
                                                    nama_anak5 = '$nama_anak5',
                                                    usia_anak5 = '$usia_anak5'
                                                WHERE id_calon_karyawan = '$id'" );

    if ( $update ) {
        // die();
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-success alert-dismissible" role="alert"><i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Data berhasil diperbarui
                                </div>';
    } else {
        // die();
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-exclamation-triangle"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Gagal diperbarui !
                                </div>';
    }
endif;


/**
* -------------------------------------
* Update data ortu/wali calon karyawan
* -------------------------------------
*/
if ( isset( $_POST['btn-update-data-ortu-calon-karyawan'] ) ) :
    $id                      = $sdm->real_escape_string( anti_injection( base64_decode( $_GET['id'] ) ) );
    $nama_ayah               = $sdm->real_escape_string( anti_injection( $_POST['nama_ayah'] ) );
    $id_warganegara_ayah     = $sdm->real_escape_string( anti_injection( $_POST['id_warganegara_ayah'] ) );
    $alamat_rumah_ayah       = $sdm->real_escape_string( anti_injection( $_POST['alamat_rumah_ayah'] ) );
    $tempat_lahir_ayah       = $sdm->real_escape_string( anti_injection( $_POST['tempat_lahir_ayah'] ) );

    if ( empty( $_POST['tanggal_lahir_ayah'] ) || $_POST['tanggal_lahir_ayah'] == '0000-00-00' ) { $tanggal_lahir_ayah = '';
    } else { $tanggal_lahir_ayah  = $sdm->real_escape_string( date( "Y-m-d", strtotime( $_POST['tanggal_lahir_ayah'] ) ) ); }

    $id_pendidikan_ayah      = $sdm->real_escape_string( anti_injection( $_POST['id_pendidikan_ayah'] ) );
    $id_pekerjaan_ayah       = $sdm->real_escape_string( anti_injection( $_POST['id_pekerjaan_ayah'] ) );
    $no_telp_ayah            = $sdm->real_escape_string( anti_injection( $_POST['no_telp_ayah'] ) );
    $alamat_kantor_ayah      = $sdm->real_escape_string( anti_injection( $_POST['alamat_kantor_ayah'] ) );
    $nama_ibu                = $sdm->real_escape_string( anti_injection( $_POST['nama_ibu'] ) );
    $id_warganegara_ibu      = $sdm->real_escape_string( anti_injection( $_POST['id_warganegara_ibu'] ) );
    $alamat_rumah_ibu        = $sdm->real_escape_string( anti_injection( $_POST['alamat_rumah_ibu'] ) );
    $tempat_lahir_ibu        = $sdm->real_escape_string( anti_injection( $_POST['tempat_lahir_ibu'] ) );

    if ( empty( $_POST['tanggal_lahir_ibu'] ) || $_POST['tanggal_lahir_ibu'] == '0000-00-00' ) { $tanggal_lahir_ibu = '';
    } else { $tanggal_lahir_ibu = $sdm->real_escape_string( date( "Y-m-d", strtotime( $_POST['tanggal_lahir_ibu'] ) ) ); }

    $id_pendidikan_ibu       = $sdm->real_escape_string( anti_injection( $_POST['id_pendidikan_ibu'] ) );
    $id_pekerjaan_ibu        = $sdm->real_escape_string( anti_injection( $_POST['id_pekerjaan_ibu'] ) );
    $no_telp_ibu             = $sdm->real_escape_string( anti_injection( $_POST['no_telp_ibu'] ) );
    $alamat_kantor_ibu       = $sdm->real_escape_string( anti_injection( $_POST['alamat_kantor_ibu'] ) );
    $nama_wali               = $sdm->real_escape_string( anti_injection( $_POST['nama_wali'] ) );
    $id_warganegara_wali     = $sdm->real_escape_string( anti_injection( $_POST['id_warganegara_wali'] ) );
    $alamat_rumah_wali       = $sdm->real_escape_string( anti_injection( $_POST['alamat_rumah_wali'] ) );
    $tempat_lahir_wali       = $sdm->real_escape_string( anti_injection( $_POST['tempat_lahir_wali'] ) );

    if ( empty( $_POST['tanggal_lahir_wali'] ) || $_POST['tanggal_lahir_wali'] == '0000-00-00' ) { $tanggal_lahir_wali = '';
    } else { $tanggal_lahir_wali  = $sdm->real_escape_string( date( "Y-m-d", strtotime( $_POST['tanggal_lahir_wali'] ) ) ); }

    $id_pendidikan_wali      = $sdm->real_escape_string( anti_injection( $_POST['id_pendidikan_wali'] ) );
    $id_pekerjaan_wali       = $sdm->real_escape_string( anti_injection( $_POST['id_pekerjaan_wali'] ) );
    $no_telp_wali            = $sdm->real_escape_string( anti_injection( $_POST['no_telp_wali'] ) );
    $alamat_kantor_wali      = $sdm->real_escape_string( anti_injection( $_POST['alamat_kantor_wali'] ) );

    $update = $sdm->query( "UPDATE calon_karyawan SET nama_ayah = '$nama_ayah', 
                                                    id_warganegara_ayah = '$id_warganegara_ayah',
                                                    alamat_rumah_ayah = '$alamat_rumah_ayah',
                                                    tempat_lahir_ayah = '$tempat_lahir_ayah',
                                                    tanggal_lahir_ayah = '$tanggal_lahir_ayah',
                                                    id_pendidikan_ayah = '$id_pendidikan_ayah',
                                                    id_pekerjaan_ayah = '$id_pekerjaan_ayah',
                                                    no_telp_ayah = '$no_telp_ayah',
                                                    alamat_kantor_ayah = '$alamat_kantor_ayah',
                                                    nama_ibu = '$nama_ibu', 
                                                    id_warganegara_ibu = '$id_warganegara_ibu',
                                                    alamat_rumah_ibu = '$alamat_rumah_ibu',
                                                    tempat_lahir_ibu = '$tempat_lahir_ibu',
                                                    tanggal_lahir_ibu = '$tanggal_lahir_ibu',
                                                    id_pendidikan_ibu = '$id_pendidikan_ibu',
                                                    id_pekerjaan_ibu = '$id_pekerjaan_ibu',
                                                    no_telp_ibu = '$no_telp_ibu',
                                                    alamat_kantor_ibu = '$alamat_kantor_ibu',
                                                    nama_wali = '$nama_wali', 
                                                    id_warganegara_wali = '$id_warganegara_wali',
                                                    alamat_rumah_wali = '$alamat_rumah_wali',
                                                    tempat_lahir_wali = '$tempat_lahir_wali',
                                                    tanggal_lahir_wali = '$tanggal_lahir_wali',
                                                    id_pendidikan_wali = '$id_pendidikan_wali',
                                                    id_pekerjaan_wali = '$id_pekerjaan_wali',
                                                    no_telp_wali = '$no_telp_wali',
                                                    alamat_kantor_wali = '$alamat_kantor_wali'
                                                WHERE id_calon_karyawan = '$id'" );

    if ( $update ) {
        // die();
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-success alert-dismissible" role="alert"><i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Data berhasil diperbarui
                                </div>';
    } else {
        // die();
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-exclamation-triangle"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Gagal diperbarui !
                                </div>';
    }
endif;


/**
* -------------------------------------
* Update data pendidikan calon karyawan
* -------------------------------------
*/
if ( isset( $_POST['btn-update-data-pendidikan-calon-karyawan'] ) ) :
    $id                      = $sdm->real_escape_string( anti_injection( base64_decode( $_GET['id'] ) ) );
    $nama_tk                 = $sdm->real_escape_string( anti_injection( $_POST['nama_tk'] ) );
    $tk_kota                 = $sdm->real_escape_string( anti_injection( $_POST['tk_kota'] ) );

    // if ( empty( $_POST['tk_masuk'] ) || $_POST['tk_masuk'] == '0000-00-00' ) { $tk_masuk = '';
    // } else { $tk_masuk       = $tk->real_escape_string( date( "Y-m-d", strtotime( $_POST['tk_masuk'] ) ) ); }

    // if ( empty( $_POST['tk_keluar'] ) || $_POST['tk_keluar'] == '0000-00-00' ) { $tk_keluar = '';
    // } else { $tk_keluar      = $tk->real_escape_string( date( "Y-m-d", strtotime( $_POST['tk_keluar'] ) ) ); }
    
    $tk_masuk                = $sdm->real_escape_string( anti_injection( $_POST['tk_masuk'] ) );
    $tk_keluar               = $sdm->real_escape_string( anti_injection( $_POST['tk_keluar'] ) );

    $nama_sd                 = $sdm->real_escape_string( anti_injection( $_POST['nama_sd'] ) );
    $sd_kota                 = $sdm->real_escape_string( anti_injection( $_POST['sd_kota'] ) );

    // if ( empty( $_POST['sd_masuk'] ) || $_POST['sd_masuk'] == '0000-00-00' ) { $sd_masuk = '';
    // } else { $sd_masuk       = $tk->real_escape_string( date( "Y-m-d", strtotime( $_POST['sd_masuk'] ) ) ); }

    // if ( empty( $_POST['sd_keluar'] ) || $_POST['sd_keluar'] == '0000-00-00' ) { $sd_keluar = '';
    // } else { $sd_keluar      = $tk->real_escape_string( date( "Y-m-d", strtotime( $_POST['sd_keluar'] ) ) ); }
    
    $sd_masuk                = $sdm->real_escape_string( anti_injection( $_POST['sd_masuk'] ) );
    $sd_keluar               = $sdm->real_escape_string( anti_injection( $_POST['sd_keluar'] ) );

    $nama_smp                = $sdm->real_escape_string( anti_injection( $_POST['nama_smp'] ) );
    $smp_kota                = $sdm->real_escape_string( anti_injection( $_POST['smp_kota'] ) );
    
    // if ( empty( $_POST['smp_masuk'] ) || $_POST['smp_masuk'] == '0000-00-00' ) { $smp_masuk = '';
    // } else { $smp_masuk      = $tk->real_escape_string( date( "Y-m-d", strtotime( $_POST['smp_masuk'] ) ) ); }

    // if ( empty( $_POST['smp_keluar'] ) || $_POST['smp_keluar'] == '0000-00-00' ) { $smp_keluar = '';
    // } else { $smp_keluar     = $tk->real_escape_string( date( "Y-m-d", strtotime( $_POST['smp_keluar'] ) ) ); }
    
    $smp_masuk               = $sdm->real_escape_string( anti_injection( $_POST['smp_masuk'] ) );
    $smp_keluar              = $sdm->real_escape_string( anti_injection( $_POST['smp_keluar'] ) );

    $nama_slta               = $sdm->real_escape_string( anti_injection( $_POST['nama_slta'] ) );
    $slta_jurusan            = $sdm->real_escape_string( anti_injection( $_POST['slta_jurusan'] ) );
    $slta_kota               = $sdm->real_escape_string( anti_injection( $_POST['slta_kota'] ) );
    
    // if ( empty( $_POST['slta_masuk'] ) || $_POST['slta_masuk'] == '0000-00-00' ) { $slta_masuk = '';
    // } else { $slta_masuk     = $tk->real_escape_string( date( "Y-m-d", strtotime( $_POST['slta_masuk'] ) ) ); }

    // if ( empty( $_POST['slta_keluar'] ) || $_POST['slta_keluar'] == '0000-00-00' ) { $slta_keluar = '';
    // } else { $slta_keluar    = $tk->real_escape_string( date( "Y-m-d", strtotime( $_POST['slta_keluar'] ) ) ); }
    
    $slta_masuk              = $sdm->real_escape_string( anti_injection( $_POST['slta_masuk'] ) );
    $slta_keluar             = $sdm->real_escape_string( anti_injection( $_POST['slta_keluar'] ) );

    $nama_d3                 = $sdm->real_escape_string( anti_injection( $_POST['nama_d3'] ) );
    $d3_jurusan              = $sdm->real_escape_string( anti_injection( $_POST['d3_jurusan'] ) );
    $d3_kota                 = $sdm->real_escape_string( anti_injection( $_POST['d3_kota'] ) );
    
    // if ( empty( $_POST['d3_masuk'] ) || $_POST['d3_masuk'] == '0000-00-00' ) { $d3_masuk = '';
    // } else { $d3_masuk       = $tk->real_escape_string( date( "Y-m-d", strtotime( $_POST['d3_masuk'] ) ) ); }

    // if ( empty( $_POST['d3_keluar'] ) || $_POST['d3_keluar'] == '0000-00-00' ) { $d3_keluar = '';
    // } else { $d3_keluar      = $tk->real_escape_string( date( "Y-m-d", strtotime( $_POST['d3_keluar'] ) ) ); }
    
    $d3_masuk                = $sdm->real_escape_string( anti_injection( $_POST['d3_masuk'] ) );
    $d3_keluar               = $sdm->real_escape_string( anti_injection( $_POST['d3_keluar'] ) );

    $nama_s1                 = $sdm->real_escape_string( anti_injection( $_POST['nama_s1'] ) );
    $s1_jurusan              = $sdm->real_escape_string( anti_injection( $_POST['s1_jurusan'] ) );
    $s1_kota                 = $sdm->real_escape_string( anti_injection( $_POST['s1_kota'] ) );
    
    // if ( empty( $_POST['s1_masuk'] ) || $_POST['s1_masuk'] == '0000-00-00' ) { $s1_masuk = '';
    // } else { $s1_masuk       = $tk->real_escape_string( date( "Y-m-d", strtotime( $_POST['s1_masuk'] ) ) ); }

    // if ( empty( $_POST['s1_keluar'] ) || $_POST['s1_keluar'] == '0000-00-00' ) { $s1_keluar = '';
    // } else { $s1_keluar      = $tk->real_escape_string( date( "Y-m-d", strtotime( $_POST['s1_keluar'] ) ) ); }
    
    $s1_masuk                = $sdm->real_escape_string( anti_injection( $_POST['s1_masuk'] ) );
    $s1_keluar               = $sdm->real_escape_string( anti_injection( $_POST['s1_keluar'] ) );

    $nama_s2                 = $sdm->real_escape_string( anti_injection( $_POST['nama_s2'] ) );
    $s2_jurusan              = $sdm->real_escape_string( anti_injection( $_POST['s2_jurusan'] ) );
    $s2_kota                 = $sdm->real_escape_string( anti_injection( $_POST['s2_kota'] ) );
    
    // if ( empty( $_POST['s2_masuk'] ) || $_POST['s2_masuk'] == '0000-00-00' ) { $s2_masuk = '';
    // } else { $s2_masuk       = $tk->real_escape_string( date( "Y-m-d", strtotime( $_POST['s2_masuk'] ) ) ); }

    // if ( empty( $_POST['s2_keluar'] ) || $_POST['s2_keluar'] == '0000-00-00' ) { $s2_keluar = '';
    // } else { $s2_keluar = $tk->real_escape_string( date( "Y-m-d", strtotime( $_POST['s2_keluar'] ) ) ); }
    
    $s2_masuk                = $sdm->real_escape_string( anti_injection( $_POST['s2_masuk'] ) );
    $s2_keluar               = $sdm->real_escape_string( anti_injection( $_POST['s2_keluar'] ) );

    $nama_s3                 = $sdm->real_escape_string( anti_injection( $_POST['nama_s3'] ) );
    $s3_jurusan              = $sdm->real_escape_string( anti_injection( $_POST['s3_jurusan'] ) );
    $s3_kota                 = $sdm->real_escape_string( anti_injection( $_POST['s3_kota'] ) );
    
    // if ( empty( $_POST['s3_masuk'] ) || $_POST['s3_masuk'] == '0000-00-00' ) { $s3_masuk = '';
    // } else { $s3_masuk = $tk->real_escape_string( date( "Y-m-d", strtotime( $_POST['s3_masuk'] ) ) ); }

    // if ( empty( $_POST['s3_keluar'] ) || $_POST['s3_keluar'] == '0000-00-00' ) { $s3_keluar = '';
    // } else { $s3_keluar = $tk->real_escape_string( date( "Y-m-d", strtotime( $_POST['s3_keluar'] ) ) ); }
    
    $s3_masuk                = $sdm->real_escape_string( anti_injection( $_POST['s3_masuk'] ) );
    $s3_keluar               = $sdm->real_escape_string( anti_injection( $_POST['s3_keluar'] ) );

    $update = $sdm->query( "UPDATE calon_karyawan SET nama_tk = '$nama_tk', 
                                                    tk_kota = '$tk_kota',
                                                    tk_masuk = '$tk_masuk',
                                                    tk_keluar = '$tk_keluar',
                                                    nama_sd = '$nama_sd', 
                                                    sd_kota = '$sd_kota',
                                                    sd_masuk = '$sd_masuk',
                                                    sd_keluar = '$sd_keluar',
                                                    nama_smp = '$nama_smp', 
                                                    smp_kota = '$smp_kota',
                                                    smp_masuk = '$smp_masuk',
                                                    smp_keluar = '$smp_keluar',
                                                    nama_slta = '$nama_slta',
                                                    slta_jurusan = '$slta_jurusan',
                                                    slta_kota = '$slta_kota',
                                                    slta_masuk = '$slta_masuk',
                                                    slta_keluar = '$slta_keluar',
                                                    nama_d3 = '$nama_d3',
                                                    d3_jurusan = '$d3_jurusan',
                                                    d3_kota = '$d3_kota',
                                                    d3_masuk = '$d3_masuk',
                                                    d3_keluar = '$d3_keluar',
                                                    nama_s1 = '$nama_s1',
                                                    s1_jurusan = '$s1_jurusan',
                                                    s1_kota = '$s1_kota',
                                                    s1_masuk = '$s1_masuk',
                                                    s1_keluar = '$s1_keluar',
                                                    nama_s2 = '$nama_s2',
                                                    s2_jurusan = '$s2_jurusan',
                                                    s2_kota = '$s2_kota',
                                                    s2_masuk = '$s2_masuk',
                                                    s2_keluar = '$s2_keluar',
                                                    nama_s3 = '$nama_s3',
                                                    s3_jurusan = '$s3_jurusan',
                                                    s3_kota = '$s3_kota',
                                                    s3_masuk = '$s3_masuk',
                                                    s3_keluar = '$s3_keluar'
                                                WHERE id_calon_karyawan = '$id'" );

    if ( $update ) {
        // die();
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-success alert-dismissible" role="alert"><i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Data berhasil diperbarui
                                </div>';
    } else {
        // die();
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-exclamation-triangle"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Gagal diperbarui !
                                </div>';
    }
endif;


/**
* -------------------------------------
* Update data riwayat pekerjaan calon karyawan
* -------------------------------------
*/
if ( isset( $_POST['btn-update-riwayat-pekerjaan-calon-karyawan'] ) ) :
    $id                      = $sdm->real_escape_string( anti_injection( base64_decode( $_GET['id'] ) ) );
    $nama_perusahaan1        = $sdm->real_escape_string( anti_injection( $_POST['nama_perusahaan1'] ) );
    $alamat_perusahaan1      = $sdm->real_escape_string( anti_injection( $_POST['alamat_perusahaan1'] ) );
    $jenis_usaha1            = $sdm->real_escape_string( anti_injection( $_POST['jenis_usaha1'] ) );
    $riwayat_jabatan1        = $sdm->real_escape_string( anti_injection( $_POST['riwayat_jabatan1'] ) );

    // if ( empty( $_POST['riwayat_pekerjaan_mulai1'] ) || $_POST['riwayat_pekerjaan_mulai1'] == '0000-00-00' ) { $riwayat_pekerjaan_mulai1 = '';
    // } else { $riwayat_pekerjaan_mulai1 = $tk->real_escape_string( date( "Y-m-d", strtotime( $_POST['riwayat_pekerjaan_mulai1'] ) ) ); }

    // if ( empty( $_POST['riwayat_pekerjaan_akhir1'] ) || $_POST['riwayat_pekerjaan_akhir1'] == '0000-00-00' ) { $riwayat_pekerjaan_akhir1 = '';
    // } else { $riwayat_pekerjaan_akhir1 = $tk->real_escape_string( date( "Y-m-d", strtotime( $_POST['riwayat_pekerjaan_akhir1'] ) ) ); }
    $riwayat_pekerjaan_mulai1 = $sdm->real_escape_string( anti_injection( $_POST['riwayat_pekerjaan_mulai1'] ) );
    $riwayat_pekerjaan_akhir1 = $sdm->real_escape_string( anti_injection( $_POST['riwayat_pekerjaan_akhir1'] ) );

    $alasan_berhenti1        = $sdm->real_escape_string( anti_injection( $_POST['alasan_berhenti1'] ) );
    $nama_perusahaan2        = $sdm->real_escape_string( anti_injection( $_POST['nama_perusahaan2'] ) );
    $alamat_perusahaan2      = $sdm->real_escape_string( anti_injection( $_POST['alamat_perusahaan2'] ) );
    $jenis_usaha2            = $sdm->real_escape_string( anti_injection( $_POST['jenis_usaha2'] ) );
    $riwayat_jabatan2        = $sdm->real_escape_string( anti_injection( $_POST['riwayat_jabatan2'] ) );
    
    // if ( empty( $_POST['riwayat_pekerjaan_mulai2'] ) || $_POST['riwayat_pekerjaan_mulai2'] == '0000-00-00' ) { $riwayat_pekerjaan_mulai2 = '';
    // } else { $riwayat_pekerjaan_mulai2 = $tk->real_escape_string( date( "Y-m-d", strtotime( $_POST['riwayat_pekerjaan_mulai2'] ) ) ); }

    // if ( empty( $_POST['riwayat_pekerjaan_akhir2'] ) || $_POST['riwayat_pekerjaan_akhir2'] == '0000-00-00' ) { $riwayat_pekerjaan_akhir2 = '';
    // } else { $riwayat_pekerjaan_akhir2 = $tk->real_escape_string( date( "Y-m-d", strtotime( $_POST['riwayat_pekerjaan_akhir2'] ) ) ); }
    $riwayat_pekerjaan_mulai2 = $sdm->real_escape_string( anti_injection( $_POST['riwayat_pekerjaan_mulai2'] ) );
    $riwayat_pekerjaan_akhir2 = $sdm->real_escape_string( anti_injection( $_POST['riwayat_pekerjaan_akhir2'] ) );

    $alasan_berhenti2        = $sdm->real_escape_string( anti_injection( $_POST['alasan_berhenti2'] ) );
    $nama_perusahaan3        = $sdm->real_escape_string( anti_injection( $_POST['nama_perusahaan3'] ) );
    $alamat_perusahaan3      = $sdm->real_escape_string( anti_injection( $_POST['alamat_perusahaan3'] ) );
    $jenis_usaha3            = $sdm->real_escape_string( anti_injection( $_POST['jenis_usaha3'] ) );
    $riwayat_jabatan3        = $sdm->real_escape_string( anti_injection( $_POST['riwayat_jabatan3'] ) );
    
    // if ( empty( $_POST['riwayat_pekerjaan_mulai3'] ) || $_POST['riwayat_pekerjaan_mulai3'] == '0000-00-00' ) { $riwayat_pekerjaan_mulai3 = '';
    // } else { $riwayat_pekerjaan_mulai3 = $tk->real_escape_string( date( "Y-m-d", strtotime( $_POST['riwayat_pekerjaan_mulai3'] ) ) ); }

    // if ( empty( $_POST['riwayat_pekerjaan_akhir3'] ) || $_POST['riwayat_pekerjaan_akhir3'] == '0000-00-00' ) { $riwayat_pekerjaan_akhir3 = '';
    // } else { $riwayat_pekerjaan_akhir3 = $tk->real_escape_string( date( "Y-m-d", strtotime( $_POST['riwayat_pekerjaan_akhir3'] ) ) ); }
    $riwayat_pekerjaan_mulai3 = $sdm->real_escape_string( anti_injection( $_POST['riwayat_pekerjaan_mulai3'] ) );
    $riwayat_pekerjaan_akhir3 = $sdm->real_escape_string( anti_injection( $_POST['riwayat_pekerjaan_akhir3'] ) );

    $alasan_berhenti3        = $sdm->real_escape_string( anti_injection( $_POST['alasan_berhenti3'] ) );
    $nama_perusahaan4        = $sdm->real_escape_string( anti_injection( $_POST['nama_perusahaan4'] ) );
    $alamat_perusahaan4      = $sdm->real_escape_string( anti_injection( $_POST['alamat_perusahaan4'] ) );
    $jenis_usaha4            = $sdm->real_escape_string( anti_injection( $_POST['jenis_usaha4'] ) );
    $riwayat_jabatan4        = $sdm->real_escape_string( anti_injection( $_POST['riwayat_jabatan4'] ) );
    
    // if ( empty( $_POST['riwayat_pekerjaan_mulai4'] ) || $_POST['riwayat_pekerjaan_mulai4'] == '0000-00-00' ) { $riwayat_pekerjaan_mulai4 = '';
    // } else { $riwayat_pekerjaan_mulai4 = $tk->real_escape_string( date( "Y-m-d", strtotime( $_POST['riwayat_pekerjaan_mulai4'] ) ) ); }

    // if ( empty( $_POST['riwayat_pekerjaan_akhir4'] ) || $_POST['riwayat_pekerjaan_akhir4'] == '0000-00-00' ) { $riwayat_pekerjaan_akhir4 = '';
    // } else { $riwayat_pekerjaan_akhir4 = $tk->real_escape_string( date( "Y-m-d", strtotime( $_POST['riwayat_pekerjaan_akhir4'] ) ) ); }
    $riwayat_pekerjaan_mulai4 = $sdm->real_escape_string( anti_injection( $_POST['riwayat_pekerjaan_mulai4'] ) );
    $riwayat_pekerjaan_akhir4 = $sdm->real_escape_string( anti_injection( $_POST['riwayat_pekerjaan_akhir4'] ) );

    $alasan_berhenti4        = $sdm->real_escape_string( anti_injection( $_POST['alasan_berhenti4'] ) );
    $nama_perusahaan5        = $sdm->real_escape_string( anti_injection( $_POST['nama_perusahaan5'] ) );
    $alamat_perusahaan5      = $sdm->real_escape_string( anti_injection( $_POST['alamat_perusahaan5'] ) );
    $jenis_usaha5            = $sdm->real_escape_string( anti_injection( $_POST['jenis_usaha5'] ) );
    $riwayat_jabatan5        = $sdm->real_escape_string( anti_injection( $_POST['riwayat_jabatan5'] ) );
    
    // if ( empty( $_POST['riwayat_pekerjaan_mulai5'] ) || $_POST['riwayat_pekerjaan_mulai5'] == '0000-00-00' ) { $riwayat_pekerjaan_mulai5 = '';
    // } else { $riwayat_pekerjaan_mulai5 = $tk->real_escape_string( date( "Y-m-d", strtotime( $_POST['riwayat_pekerjaan_mulai5'] ) ) ); }

    // if ( empty( $_POST['riwayat_pekerjaan_akhir5'] ) || $_POST['riwayat_pekerjaan_akhir5'] == '0000-00-00' ) { $riwayat_pekerjaan_akhir5 = '';
    // } else { $riwayat_pekerjaan_akhir5 = $tk->real_escape_string( date( "Y-m-d", strtotime( $_POST['riwayat_pekerjaan_akhir5'] ) ) ); }
    $riwayat_pekerjaan_mulai5 = $sdm->real_escape_string( anti_injection( $_POST['riwayat_pekerjaan_mulai5'] ) );
    $riwayat_pekerjaan_akhir5 = $sdm->real_escape_string( anti_injection( $_POST['riwayat_pekerjaan_akhir5'] ) );

    $alasan_berhenti5        = $sdm->real_escape_string( anti_injection( $_POST['alasan_berhenti5'] ) );

    $update = $sdm->query( "UPDATE calon_karyawan SET nama_perusahaan1 = '$nama_perusahaan1', 
                                                    alamat_perusahaan1 = '$alamat_perusahaan1',
                                                    jenis_usaha1 = '$jenis_usaha1',
                                                    riwayat_jabatan1 = '$riwayat_jabatan1',
                                                    riwayat_pekerjaan_mulai1 = '$riwayat_pekerjaan_mulai1', 
                                                    riwayat_pekerjaan_akhir1 = '$riwayat_pekerjaan_akhir1',
                                                    alasan_berhenti1 = '$alasan_berhenti1',
                                                    nama_perusahaan2 = '$nama_perusahaan2', 
                                                    alamat_perusahaan2 = '$alamat_perusahaan2',
                                                    jenis_usaha2 = '$jenis_usaha2',
                                                    riwayat_jabatan2 = '$riwayat_jabatan2',
                                                    riwayat_pekerjaan_mulai2 = '$riwayat_pekerjaan_mulai2', 
                                                    riwayat_pekerjaan_akhir2 = '$riwayat_pekerjaan_akhir2',
                                                    alasan_berhenti2 = '$alasan_berhenti2',
                                                    nama_perusahaan3 = '$nama_perusahaan3', 
                                                    alamat_perusahaan3 = '$alamat_perusahaan3',
                                                    jenis_usaha3 = '$jenis_usaha3',
                                                    riwayat_jabatan3 = '$riwayat_jabatan3',
                                                    riwayat_pekerjaan_mulai3 = '$riwayat_pekerjaan_mulai3', 
                                                    riwayat_pekerjaan_akhir3 = '$riwayat_pekerjaan_akhir3',
                                                    alasan_berhenti3 = '$alasan_berhenti3',
                                                    nama_perusahaan4 = '$nama_perusahaan4', 
                                                    alamat_perusahaan4 = '$alamat_perusahaan4',
                                                    jenis_usaha4 = '$jenis_usaha4',
                                                    riwayat_jabatan4 = '$riwayat_jabatan4',
                                                    riwayat_pekerjaan_mulai4 = '$riwayat_pekerjaan_mulai4', 
                                                    riwayat_pekerjaan_akhir4 = '$riwayat_pekerjaan_akhir4',
                                                    alasan_berhenti4 = '$alasan_berhenti4',
                                                    nama_perusahaan5 = '$nama_perusahaan5', 
                                                    alamat_perusahaan5 = '$alamat_perusahaan5',
                                                    jenis_usaha5 = '$jenis_usaha5',
                                                    riwayat_jabatan5 = '$riwayat_jabatan5',
                                                    riwayat_pekerjaan_mulai5 = '$riwayat_pekerjaan_mulai5', 
                                                    riwayat_pekerjaan_akhir5 = '$riwayat_pekerjaan_akhir5',
                                                    alasan_berhenti5 = '$alasan_berhenti5'
                                                WHERE id_calon_karyawan = '$id'" );

    if ( $update ) {
        // die();
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-success alert-dismissible" role="alert"><i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Data berhasil diperbarui
                                </div>';
    } else {
        // die();
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-exclamation-triangle"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Gagal diperbarui !
                                </div>';
    }
endif;


/**
* -------------------------------------
* Update data pengalaman organisasi calon karyawan
* -------------------------------------
*/
if ( isset( $_POST['btn-update-pengalaman-organisasi-calon-karyawan'] ) ) :
    $id                      = $sdm->real_escape_string( anti_injection( base64_decode( $_GET['id'] ) ) );
    $organisasi1              = $sdm->real_escape_string( anti_injection( $_POST['organisasi1'] ) );
    $organisasi2              = $sdm->real_escape_string( anti_injection( $_POST['organisasi2'] ) );
    $organisasi3              = $sdm->real_escape_string( anti_injection( $_POST['organisasi3'] ) );
    $organisasi4              = $sdm->real_escape_string( anti_injection( $_POST['organisasi4'] ) );
    $organisasi5              = $sdm->real_escape_string( anti_injection( $_POST['organisasi5'] ) );
    $jenis_organisasi1        = $sdm->real_escape_string( anti_injection( $_POST['jenis_organisasi1'] ) );
    $jenis_organisasi2        = $sdm->real_escape_string( anti_injection( $_POST['jenis_organisasi2'] ) );
    $jenis_organisasi3        = $sdm->real_escape_string( anti_injection( $_POST['jenis_organisasi3'] ) );
    $jenis_organisasi4        = $sdm->real_escape_string( anti_injection( $_POST['jenis_organisasi4'] ) );
    $jenis_organisasi5        = $sdm->real_escape_string( anti_injection( $_POST['jenis_organisasi5'] ) );
    $jabatan_organisasi1      = $sdm->real_escape_string( anti_injection( $_POST['jabatan_organisasi1'] ) );
    $jabatan_organisasi2      = $sdm->real_escape_string( anti_injection( $_POST['jabatan_organisasi2'] ) );
    $jabatan_organisasi3      = $sdm->real_escape_string( anti_injection( $_POST['jabatan_organisasi3'] ) );
    $jabatan_organisasi4      = $sdm->real_escape_string( anti_injection( $_POST['jabatan_organisasi4'] ) );
    $jabatan_organisasi5      = $sdm->real_escape_string( anti_injection( $_POST['jabatan_organisasi5'] ) );
    $periode_organisasi1      = $sdm->real_escape_string( anti_injection( $_POST['periode_organisasi1'] ) );
    $periode_organisasi2      = $sdm->real_escape_string( anti_injection( $_POST['periode_organisasi2'] ) );
    $periode_organisasi3      = $sdm->real_escape_string( anti_injection( $_POST['periode_organisasi3'] ) );
    $periode_organisasi4      = $sdm->real_escape_string( anti_injection( $_POST['periode_organisasi4'] ) );
    $periode_organisasi5      = $sdm->real_escape_string( anti_injection( $_POST['periode_organisasi5'] ) );

    $update = $sdm->query( "UPDATE calon_karyawan SET organisasi1 = '$organisasi1', 
                                                    organisasi2 = '$organisasi2',
                                                    organisasi3 = '$organisasi3',
                                                    organisasi4 = '$organisasi4',
                                                    organisasi5 = '$organisasi5', 
                                                    jenis_organisasi1 = '$jenis_organisasi1',
                                                    jenis_organisasi2 = '$jenis_organisasi2',
                                                    jenis_organisasi3 = '$jenis_organisasi3',
                                                    jenis_organisasi5 = '$jenis_organisasi5',
                                                    jenis_organisasi5 = '$jenis_organisasi5',
                                                    jabatan_organisasi1 = '$jabatan_organisasi1',
                                                    jabatan_organisasi2 = '$jabatan_organisasi2',
                                                    jabatan_organisasi3 = '$jabatan_organisasi3',
                                                    jabatan_organisasi4 = '$jabatan_organisasi4',
                                                    jabatan_organisasi5 = '$jabatan_organisasi5',
                                                    periode_organisasi1 = '$periode_organisasi1',
                                                    periode_organisasi2 = '$periode_organisasi2',
                                                    periode_organisasi3 = '$periode_organisasi3',
                                                    periode_organisasi4 = '$periode_organisasi4',
                                                    periode_organisasi5 = '$periode_organisasi5'
                                                WHERE id_calon_karyawan = '$id'" );

    if ( $update ) {
        // die();
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-success alert-dismissible" role="alert"><i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Data berhasil diperbarui
                                </div>';
    } else {
        // die();
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-exclamation-triangle"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Gagal diperbarui !
                                </div>';
    }
endif;


/**
* -------------------------------------
* Update data kemampuan bahasa asing calon karyawan
* -------------------------------------
*/
if ( isset( $_POST['btn-update-kemampuan-bahasa-asing-calon-karyawan'] ) ) :
    $id                       = $sdm->real_escape_string( anti_injection( base64_decode( $_GET['id'] ) ) );
    $bahasa_asing1            = $sdm->real_escape_string( anti_injection( $_POST['bahasa_asing1'] ) );
    $bahasa_asing2            = $sdm->real_escape_string( anti_injection( $_POST['bahasa_asing2'] ) );
    $bahasa_asing3            = $sdm->real_escape_string( anti_injection( $_POST['bahasa_asing3'] ) );
    $digunakan_sejak1         = $sdm->real_escape_string( anti_injection( $_POST['digunakan_sejak1'] ) );
    $digunakan_sejak2         = $sdm->real_escape_string( anti_injection( $_POST['digunakan_sejak2'] ) );
    $digunakan_sejak3         = $sdm->real_escape_string( anti_injection( $_POST['digunakan_sejak3'] ) );
    $membaca1                 = isset( $_POST['membaca1'] ) ? $sdm->real_escape_string( anti_injection( $_POST['membaca1'] ) ) : '';
    $membaca2                 = isset( $_POST['membaca2'] ) ? $sdm->real_escape_string( anti_injection( $_POST['membaca2'] ) ) : '';
    $membaca3                 = isset( $_POST['membaca3'] ) ? $sdm->real_escape_string( anti_injection( $_POST['membaca3'] ) ) : '';
    $menulis1                 = isset( $_POST['menulis1'] ) ? $sdm->real_escape_string( anti_injection( $_POST['menulis1'] ) ) : '';
    $menulis2                 = isset( $_POST['menulis2'] ) ? $sdm->real_escape_string( anti_injection( $_POST['menulis2'] ) ) : '';
    $menulis3                 = isset( $_POST['menulis3'] ) ? $sdm->real_escape_string( anti_injection( $_POST['menulis3'] ) ) : '';
    $berbicara1               = isset( $_POST['berbicara1'] ) ? $sdm->real_escape_string( anti_injection( $_POST['berbicara1'] ) ): '';
    $berbicara2               = isset( $_POST['berbicara2'] ) ? $sdm->real_escape_string( anti_injection( $_POST['berbicara2'] ) ) : '';
    $berbicara3               = isset( $_POST['berbicara3'] ) ? $sdm->real_escape_string( anti_injection( $_POST['berbicara3'] ) ) : '';


    $update = $sdm->query( "UPDATE calon_karyawan SET bahasa_asing1 = '$bahasa_asing1', 
                                                    bahasa_asing2 = '$bahasa_asing2',
                                                    bahasa_asing3 = '$bahasa_asing3',
                                                    digunakan_sejak1 = '$digunakan_sejak1',
                                                    digunakan_sejak2 = '$digunakan_sejak2', 
                                                    digunakan_sejak3 = '$digunakan_sejak3',
                                                    membaca1 = '$membaca1',
                                                    membaca2 = '$membaca2',
                                                    membaca3 = '$membaca3',
                                                    menulis1 = '$menulis1',
                                                    menulis2 = '$menulis2',
                                                    menulis3 = '$menulis3',
                                                    berbicara1 = '$berbicara1',
                                                    berbicara2 = '$berbicara2',
                                                    berbicara3 = '$berbicara3'
                                                WHERE id_calon_karyawan = '$id'" );

    if ( $update ) {
        // die();
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-success alert-dismissible" role="alert"><i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Data berhasil diperbarui
                                </div>';
    } else {
        // die();
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-exclamation-triangle"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Gagal diperbarui !
                                </div>';
    }
endif;


/**
* -------------------------------------
* Update data list berkas calon karyawan
* -------------------------------------
*/
if ( isset( $_POST['btn-update-berkas-calon-karyawan'] ) ) :
    $berkas_array           = isset( $_POST['berkas'] ) ? $_POST['berkas'] : '';
    $id_kelengkapan_berkas  = isset( $_POST['id_kelengkapan_berkas'] ) ? $_POST['id_kelengkapan_berkas'] : '';

    for ( $i = 0; $i < count( $id_kelengkapan_berkas ); $i++ ) {

        $berkas = $sdm->real_escape_string( $berkas_array[$i] );
        $the_id_berkas = $sdm->real_escape_string( $id_kelengkapan_berkas[$i] );

        // echo $the_id_berkas;
        // die();
        $update = $sdm->query( "UPDATE kelengkapan_berkas SET id_berkas = '$berkas' WHERE id_kelengkapan_berkas = '$the_id_berkas'" );
    }

    if ( $update ) {
        die();
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-success alert-dismissible" role="alert"><i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Data berhasil diperbarui
                                </div>';
    } else {
        // die();
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-exclamation-triangle"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Gagal diperbarui !
                                </div>';
    }
endif;


/**
* -------------------------------------
* Update data list jawaban calon calon karyawan
* -------------------------------------
*/
if ( isset( $_POST['btn-update-jawaban-soal-calon-karyawan'] ) ) :
    $id                       = $sdm->real_escape_string( anti_injection( base64_decode( $_GET['id'] ) ) );
    $jawaban                  =  $sdm->real_escape_string( $_POST['jawaban'] );


    $update = $sdm->query( "UPDATE soal_soal SET jawaban = '$jawaban' WHERE id_soal_pelamar = '$id'" );

    if ( $update ) {
        // die();
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-success alert-dismissible" role="alert"><i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Data berhasil diperbarui
                                </div>';
    } else {
        // die();
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-exclamation-triangle"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Gagal diperbarui !
                                </div>';
    }
endif;


/**
* -------------------------------------
* Update data master berkas calon karyawan
* -------------------------------------
*/
if ( isset( $_POST['btn-update-master-kelengkapan-berkas'] ) ) :
    $id                 = $sdm->real_escape_string( anti_injection( base64_decode( $_GET['id'] ) ) );
    $kelengkapan_berkas = $sdm->real_escape_string( anti_injection( $_POST['kelengkapan_berkas'] ) );
    $status_aktif       = $sdm->real_escape_string( anti_injection( $_POST['status_aktif'] ) );
    $berkas_tahun       = date( 'Y' );


    $update = $sdm->query( "UPDATE master_berkas SET kelengkapan_berkas = '$kelengkapan_berkas', 
                                                    berkas_tahun        = '$berkas_tahun', 
                                                    status              = '$status_aktif' 
                                                WHERE id_berkas         = '$id'" );

    if ( $update ) {
        // die();
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-success alert-dismissible" role="alert"><i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Data berhasil diperbarui
                                </div>';
    } else {
        // die();
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-exclamation-triangle"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Gagal diperbarui !
                                </div>';
    }
endif;


/**
* -------------------------------------
* Update data master pertanyaan
* -------------------------------------
*/
if ( isset( $_POST['btn-update-master-pertanyaan-pelamar'] ) ) :
    $id             = $sdm->real_escape_string( anti_injection( base64_decode( $_GET['id'] ) ) );
    $soal           = $sdm->real_escape_string( anti_injection( $_POST['soal'] ) );
    $status_aktif   = $sdm->real_escape_string( anti_injection( $_POST['status_aktif'] ) );
    $soal_tahun     = date( 'Y' );


    $update = $sdm->query( "UPDATE master_soal SET soal         = '$soal', 
                                                    soal_tahun  = '$soal_tahun', 
                                                    status      = '$status_aktif' 
                                                WHERE id_soal   = '$id'" );

    if ( $update ) {
        // die();
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-success alert-dismissible" role="alert"><i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Data berhasil diperbarui
                                </div>';
    } else {
        // die();
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-exclamation-triangle"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Gagal diperbarui !
                                </div>';
    }
endif;


/**
* -------------------------------------
* Update data hasil keputusan penerimaan
* -------------------------------------
*/
if ( isset( $_POST['hasil-keputusan-penerimaan-pegawai'] ) ) :
    $id                 = $sdm->real_escape_string( anti_injection( base64_decode( $_GET['id'] ) ) );
    $hasil_penerimaan   = $sdm->real_escape_string( anti_injection( $_POST['hasil_penerimaan'] ) );
    $tanggal_keputusan  = date( 'Y-m-d' );

    // definition
    $get_data_karyawan = '';
    $get_data_calon_karyawan = '';
    
    $update = $sdm->query( "UPDATE calon_karyawan SET hasil_penerimaan = '$hasil_penerimaan', tanggal_keputusan = '$tanggal_keputusan' WHERE id_calon_karyawan = '$id'" );

    if ( $update ) {

        // data karyawan
        $karyawan   = $sdm->real_escape_string( anti_injection( $_POST['karyawan'] ) );
        $no_hp      = $sdm->real_escape_string( anti_injection( $_POST['no_hp'] ) );
        $email      = $sdm->real_escape_string( anti_injection( $_POST['email'] ) );

        $get_year = substr( date( 'Y' ), -2 );
        $get_month  = date( 'm' );

        $get_data_karyawan = $sdm->query( "SELECT max(nik) AS `max_id` FROM `karyawan`" );  
        // var_dump($get_data_karyawan);
        $number = '';
        $fetch_data = $get_data_karyawan->fetch_assoc();
        $check_data = $get_data_karyawan->num_rows;
        $maxid  = $fetch_data['max_id'];
        $last_id = substr( $maxid, 4 );

        if ( empty( $check_data ) ) {
        $number = 1;
        } else {
        $the_code = $last_id;
        $number = $the_code + 1;
        }

        $nik = $get_year.$get_month.$number;

        if ( $hasil_penerimaan == '1' ) :
            $get_data_calon_karyawan = $sdm->query( "SELECT hasil_penerimaan FROM `calon_karyawan`" );  
            $fetch_data_calon        = $get_data_calon_karyawan->fetch_assoc();

            if ( $fetch_data_calon['hasil_penerimaan'] == 1 ) {
                $transfer = $sdm->query( "INSERT INTO karyawan ( nik, karyawan, telepon, email, status_karyawan ) VALUES ( '$nik', '$karyawan', '$no_hp', '$email', '1' )" );
            }
        endif;

        // die();
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-success alert-dismissible" role="alert"><i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Data berhasil diperbarui
                                </div>';
    } else {
        // die();
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-exclamation-triangle"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Gagal diperbarui !
                                </div>';
    }
endif;


/**
* -------------------------------------
* Update / insert baru data berkas lamaran untuk karyawan
* -------------------------------------
*/
if ( isset( $_POST['insert-new-berkas-pelamar-crew'] ) ) :
    $berkas_array       = $_POST['berkas'];
    $data_berkas        = $_POST['kelengkapan_berkas'];
    $id_calon_karyawan  = $_POST['id_calon_karyawan'];
    $year               = date( 'Y' );

    // delete data lama
    $sdm->query( "DELETE FROM kelengkapan_berkas WHERE id_calon_karyawan = '$id_calon_karyawan'" );

    for ( $i = 0; $i < count( $data_berkas ); $i++ ) {

        $berkas = $sdm->real_escape_string( anti_injection( $berkas_array[$i] ) );

        $save = $sdm->query( "INSERT INTO kelengkapan_berkas ( id_calon_karyawan, id_berkas, tahun ) VALUES ( '$id_calon_karyawan', '$berkas', '$year' )");
    }

    if ( $save ) {
        header("location:./?p=detail-calon-karyawan&id=".base64_encode($id_calon_karyawan));
    }

endif;


/**
* -------------------------------------
* Update / insert baru data berkas lamaran untuk guru
* -------------------------------------
*/
if ( isset( $_POST['insert-new-berkas-pelamar-teacher'] ) ) :
    $berkas_array       = $_POST['berkas'];
    $data_berkas        = $_POST['kelengkapan_berkas'];
    $id_calon_karyawan  = $_POST['id_calon_karyawan'];
    $year               = date( 'Y' );

    // delete data lama
    $sdm->query( "DELETE FROM kelengkapan_berkas WHERE id_calon_karyawan = '$id_calon_karyawan'" );

    for ( $i = 0; $i < count( $data_berkas ); $i++ ) {

        $berkas = $sdm->real_escape_string( anti_injection( $berkas_array[$i] ) );

        $save = $sdm->query( "INSERT INTO kelengkapan_berkas ( id_calon_karyawan, id_berkas, tahun ) VALUES ( '$id_calon_karyawan', '$berkas', '$year' )");
    }

    if ( $save ) {
        header("location:./?p=detail-calon-guru&id=".base64_encode($id_calon_karyawan));
    }

endif;