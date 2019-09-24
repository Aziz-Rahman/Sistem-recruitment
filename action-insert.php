<?php
include "includes/conn.php";
require_once "includes/functions.php";
date_default_timezone_set("Asia/Jakarta");

// include('php-image-magician/php_image_magician.php');

/**
* -------------------------------------
* Tambah tahun ajaran sdm
* -------------------------------------
*/
if ( isset( $_POST['btn-add-data-ta'] ) ) :
    $ta = $sdm->real_escape_string( anti_injection( trim( $_POST['tahun_ajaran'] ) ) );

    if ( empty( $ta ) ) {
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-exclamation-triangle"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    Data tidak lengkap !, silahkan ulangi.
                                    </div>';
    } else {
        $save = $sdm->query( "INSERT INTO tahun_ajaran( ta ) VALUES( '$ta' )" );

        if ( $save ) {
            
            echo "<script>window.history.go(-1);</script>";
            $_SESSION['messages'] = '<div class="alert alert-success alert-dismissible" role="alert"><i class="fa fa-check"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    Data berhasil disimpan
                                    </div>';
        } else {
            // die();
            echo "<script>window.history.go(-1);</script>";
            $_SESSION['messages'] = '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-exclamation-triangle"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    Gagal tersimpan !
                                    </div>';
        }
    }
endif;


/**
* -------------------------------------
* Tambah surat perjanjian 1 (pasal-pasal)
* -------------------------------------
*/
if ( isset( $_POST['btn-add-surat-perjanjian-1'] ) ) :
    $pasal = $sdm->real_escape_string( anti_injection( trim( $_POST['pasal'] ) ) );
    $judul = $sdm->real_escape_string( anti_injection( trim( $_POST['judul'] ) ) );
    $isi = $sdm->real_escape_string( $_POST['isi'] );
    $ta = $sdm->real_escape_string( anti_injection( $_POST['tahun_ajaran'] ) );

    $save = $sdm->query( "INSERT INTO surat_perjanjian1( pasal, judul, isi, tahun_ajaran, status ) VALUES( '$pasal', '$judul', '$isi', '$ta', '1' )" );

    if ( $save ) {
        
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-success alert-dismissible" role="alert"><i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Data berhasil disimpan
                                </div>';
    } else {
        // die();
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-exclamation-triangle"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Gagal tersimpan !
                                </div>';
    }
endif;



// /**
// * -------------------------------------
// * Tambah data karyawan
// * -------------------------------------
// */
// if ( isset( $_POST['btn-add-data-karyawan'] ) ) :
//     $nik             = $sdm->real_escape_string( anti_injection( $_POST['nik'] ) );
//     $nama_karyawan   = $sdm->real_escape_string( anti_injection( $_POST['nama_karyawan'] ) );
//     $jenis_kelamin   = isset( $_POST['jenis_kelamin'] ) ? $sdm->real_escape_string( anti_injection( $_POST['jenis_kelamin'] ) ) : '';
//     $tempat_lahir    = $sdm->real_escape_string( anti_injection( $_POST['tempat_lahir'] ) );
//     $tanggal_lahir   = $sdm->real_escape_string( anti_injection( $_POST['tanggal_lahir'] ) );
//     $agama           = $sdm->real_escape_string( anti_injection( $_POST['agama'] ) );
//     $telepon         = $sdm->real_escape_string( anti_injection( $_POST['telepon'] ) );
//     $email           = $sdm->real_escape_string( anti_injection( $_POST['email'] ) );
//     $alamat          = $sdm->real_escape_string( anti_injection( $_POST['alamat'] ) );
//     $unit            = $sdm->real_escape_string( anti_injection( $_POST['unit'] ) );
//     // $status_aktif = $sdm->real_escape_string( anti_injection( $_POST['status_aktif'] ) );


//     $save = $sdm->query( "INSERT INTO karyawan( nik, karyawan, telepon, email, alamat, agama, tempat_lahir, tanggal_lahir, jenis_kelamin, unit, status_aktif ) VALUES( '$nik', '$nama_karyawan', '$telepon', '$email', '$alamat', '$agama', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$unit', '1' )" );

//     if ( $save ) {
        
//         echo "<script>window.history.go(-1);</script>";
//         $_SESSION['messages'] = '<div class="alert alert-success alert-dismissible" role="alert"><i class="fa fa-check"></i>
//                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
//                                 Data berhasil disimpan
//                                 </div>';
//     } else {
//         // die();
//         echo "<script>window.history.go(-1);</script>";
//         $_SESSION['messages'] = '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-exclamation-triangle"></i>
//                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
//                                 Gagal tersimpan !
//                                 </div>';
//     }
// endif;



/**
* -------------------------------------
* Tambah data calon karyawan / guru
* -------------------------------------
*/
if ( isset( $_POST['btn-add-data-pelamar'] ) ) :
    // $no = 1;
    // foreach( $_POST['jawaban'] as $i ) {
    //     $_SESSION['jawaban'.$no] = $i;
    //     // echo $i . '<br><br>';
    //     // echo $_SESSION['jawaban'.$no].'<br>';
    // }

    // die();
     
    // DATA PRIBADI
    // $jabatan                 = $sdm->real_escape_string( anti_injection( $_POST['jabatan'] ) );
    $key_form                = $sdm->real_escape_string( anti_injection( $_POST['key_form'] ) );
    $nama_lengkap            = $sdm->real_escape_string( anti_injection( $_POST['nama_lengkap'] ) );
    $tempat_lahir            = $sdm->real_escape_string( anti_injection( $_POST['tempat_lahir'] ) );

    if ( empty( $_POST['tanggal_lahir'] ) || $_POST['tanggal_lahir'] == '0000-00-00' ) { $tanggal_lahir = '';
    } else { $tanggal_lahir  = $sdm->real_escape_string( date( "Y-m-d", strtotime( $_POST['tanggal_lahir'] ) ) ); }

    $jenis_kelamin           = isset( $_POST['jenis_kelamin'] ) ? $sdm->real_escape_string( anti_injection( $_POST['jenis_kelamin'] ) ) : '';
    $id_warganegara          = $sdm->real_escape_string( anti_injection( $_POST['id_warganegara'] ) );
    $suku                    = $sdm->real_escape_string( anti_injection( $_POST['suku'] ) );
    $id_agama                = $sdm->real_escape_string( anti_injection( $_POST['id_agama'] ) );
    $gol_darah               = $sdm->real_escape_string( anti_injection( $_POST['gol_darah'] ) );
    $status_perkawinan       = $sdm->real_escape_string( anti_injection( $_POST['status_perkawinan'] ) );
    $anak_ke                 = $sdm->real_escape_string( anti_injection( $_POST['anak_ke'] ) );
    $jumlah_saudara          = $sdm->real_escape_string( anti_injection( $_POST['jumlah_saudara'] ) );
    // $foto         = $sdm->real_escape_string( anti_injection( $_POST['foto'] ) );
    // ALAMAT
    $alamat_domisili         = $sdm->real_escape_string( anti_injection( $_POST['alamat_domisili'] ) );
    $status_tempat_tinggal   = $sdm->real_escape_string( anti_injection( $_POST['status_tempat_tinggal'] ) );
    $telp_rumah              = $sdm->real_escape_string( anti_injection( $_POST['telp_rumah'] ) );
    $handphone               = $sdm->real_escape_string( anti_injection( $_POST['handphone'] ) );
    $email                   = $sdm->real_escape_string( anti_injection( $_POST['email'] ) );
    $nama_darurat            = $sdm->real_escape_string( anti_injection( $_POST['nama_darurat'] ) );
    $hubungan_darurat        = $sdm->real_escape_string( anti_injection( $_POST['hubungan_darurat'] ) );
    $alamat_darurat          = $sdm->real_escape_string( anti_injection( $_POST['alamat_darurat'] ) );
    // DATA IDENTITAS
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

    // DATA KELUARGA
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
    // DATA ORANG TUA DAN WALI
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
    // DATA PENDIDIKAN
    $nama_tk                 = $sdm->real_escape_string( anti_injection( $_POST['nama_tk'] ) );
    $tk_kota                 = $sdm->real_escape_string( anti_injection( $_POST['tk_kota'] ) );

    // if ( empty( $_POST['tk_masuk'] ) || $_POST['tk_masuk'] == '0000-00-00' ) { $tk_masuk = '';
    // } else { $tk_masuk       = $sdm->real_escape_string( date( "Y-m-d", strtotime( $_POST['tk_masuk'] ) ) ); }

    // if ( empty( $_POST['tk_keluar'] ) || $_POST['tk_keluar'] == '0000-00-00' ) { $tk_keluar = '';
    // } else { $tk_keluar      = $sdm->real_escape_string( date( "Y-m-d", strtotime( $_POST['tk_keluar'] ) ) ); }
    
    $tk_masuk                = $sdm->real_escape_string( anti_injection( $_POST['tk_masuk'] ) );
    $tk_keluar               = $sdm->real_escape_string( anti_injection( $_POST['tk_keluar'] ) );

    $nama_sd                 = $sdm->real_escape_string( anti_injection( $_POST['nama_sd'] ) );
    $sd_kota                 = $sdm->real_escape_string( anti_injection( $_POST['sd_kota'] ) );

    // if ( empty( $_POST['sd_masuk'] ) || $_POST['sd_masuk'] == '0000-00-00' ) { $sd_masuk = '';
    // } else { $sd_masuk       = $sdm->real_escape_string( date( "Y-m-d", strtotime( $_POST['sd_masuk'] ) ) ); }

    // if ( empty( $_POST['sd_keluar'] ) || $_POST['sd_keluar'] == '0000-00-00' ) { $sd_keluar = '';
    // } else { $sd_keluar      = $sdm->real_escape_string( date( "Y-m-d", strtotime( $_POST['sd_keluar'] ) ) ); }
    
    $sd_masuk                = $sdm->real_escape_string( anti_injection( $_POST['sd_masuk'] ) );
    $sd_keluar               = $sdm->real_escape_string( anti_injection( $_POST['sd_keluar'] ) );

    $nama_smp                = $sdm->real_escape_string( anti_injection( $_POST['nama_smp'] ) );
    $smp_kota                = $sdm->real_escape_string( anti_injection( $_POST['smp_kota'] ) );
    
    // if ( empty( $_POST['smp_masuk'] ) || $_POST['smp_masuk'] == '0000-00-00' ) { $smp_masuk = '';
    // } else { $smp_masuk      = $sdm->real_escape_string( date( "Y-m-d", strtotime( $_POST['smp_masuk'] ) ) ); }

    // if ( empty( $_POST['smp_keluar'] ) || $_POST['smp_keluar'] == '0000-00-00' ) { $smp_keluar = '';
    // } else { $smp_keluar     = $sdm->real_escape_string( date( "Y-m-d", strtotime( $_POST['smp_keluar'] ) ) ); }
    
    $smp_masuk               = $sdm->real_escape_string( anti_injection( $_POST['smp_masuk'] ) );
    $smp_keluar              = $sdm->real_escape_string( anti_injection( $_POST['smp_keluar'] ) );

    $nama_slta               = $sdm->real_escape_string( anti_injection( $_POST['nama_slta'] ) );
    $slta_jurusan            = $sdm->real_escape_string( anti_injection( $_POST['slta_jurusan'] ) );
    $slta_kota               = $sdm->real_escape_string( anti_injection( $_POST['slta_kota'] ) );
    
    // if ( empty( $_POST['slta_masuk'] ) || $_POST['slta_masuk'] == '0000-00-00' ) { $slta_masuk = '';
    // } else { $slta_masuk     = $sdm->real_escape_string( date( "Y-m-d", strtotime( $_POST['slta_masuk'] ) ) ); }

    // if ( empty( $_POST['slta_keluar'] ) || $_POST['slta_keluar'] == '0000-00-00' ) { $slta_keluar = '';
    // } else { $slta_keluar    = $sdm->real_escape_string( date( "Y-m-d", strtotime( $_POST['slta_keluar'] ) ) ); }
    
    $slta_masuk              = $sdm->real_escape_string( anti_injection( $_POST['slta_masuk'] ) );
    $slta_keluar             = $sdm->real_escape_string( anti_injection( $_POST['slta_keluar'] ) );

    $nama_d3                 = $sdm->real_escape_string( anti_injection( $_POST['nama_d3'] ) );
    $d3_jurusan              = $sdm->real_escape_string( anti_injection( $_POST['d3_jurusan'] ) );
    $d3_kota                 = $sdm->real_escape_string( anti_injection( $_POST['d3_kota'] ) );
    
    // if ( empty( $_POST['d3_masuk'] ) || $_POST['d3_masuk'] == '0000-00-00' ) { $d3_masuk = '';
    // } else { $d3_masuk       = $sdm->real_escape_string( date( "Y-m-d", strtotime( $_POST['d3_masuk'] ) ) ); }

    // if ( empty( $_POST['d3_keluar'] ) || $_POST['d3_keluar'] == '0000-00-00' ) { $d3_keluar = '';
    // } else { $d3_keluar      = $sdm->real_escape_string( date( "Y-m-d", strtotime( $_POST['d3_keluar'] ) ) ); }
    
    $d3_masuk                = $sdm->real_escape_string( anti_injection( $_POST['d3_masuk'] ) );
    $d3_keluar               = $sdm->real_escape_string( anti_injection( $_POST['d3_keluar'] ) );

    $nama_s1                 = $sdm->real_escape_string( anti_injection( $_POST['nama_s1'] ) );
    $s1_jurusan              = $sdm->real_escape_string( anti_injection( $_POST['s1_jurusan'] ) );
    $s1_kota                 = $sdm->real_escape_string( anti_injection( $_POST['s1_kota'] ) );
    
    // if ( empty( $_POST['s1_masuk'] ) || $_POST['s1_masuk'] == '0000-00-00' ) { $s1_masuk = '';
    // } else { $s1_masuk       = $sdm->real_escape_string( date( "Y-m-d", strtotime( $_POST['s1_masuk'] ) ) ); }

    // if ( empty( $_POST['s1_keluar'] ) || $_POST['s1_keluar'] == '0000-00-00' ) { $s1_keluar = '';
    // } else { $s1_keluar      = $sdm->real_escape_string( date( "Y-m-d", strtotime( $_POST['s1_keluar'] ) ) ); }
    
    $s1_masuk                = $sdm->real_escape_string( anti_injection( $_POST['s1_masuk'] ) );
    $s1_keluar               = $sdm->real_escape_string( anti_injection( $_POST['s1_keluar'] ) );

    $nama_s2                 = $sdm->real_escape_string( anti_injection( $_POST['nama_s2'] ) );
    $s2_jurusan              = $sdm->real_escape_string( anti_injection( $_POST['s2_jurusan'] ) );
    $s2_kota                 = $sdm->real_escape_string( anti_injection( $_POST['s2_kota'] ) );
    
    // if ( empty( $_POST['s2_masuk'] ) || $_POST['s2_masuk'] == '0000-00-00' ) { $s2_masuk = '';
    // } else { $s2_masuk       = $sdm->real_escape_string( date( "Y-m-d", strtotime( $_POST['s2_masuk'] ) ) ); }

    // if ( empty( $_POST['s2_keluar'] ) || $_POST['s2_keluar'] == '0000-00-00' ) { $s2_keluar = '';
    // } else { $s2_keluar = $sdm->real_escape_string( date( "Y-m-d", strtotime( $_POST['s2_keluar'] ) ) ); }
    
    $s2_masuk                = $sdm->real_escape_string( anti_injection( $_POST['s2_masuk'] ) );
    $s2_keluar               = $sdm->real_escape_string( anti_injection( $_POST['s2_keluar'] ) );

    $nama_s3                 = $sdm->real_escape_string( anti_injection( $_POST['nama_s3'] ) );
    $s3_jurusan              = $sdm->real_escape_string( anti_injection( $_POST['s3_jurusan'] ) );
    $s3_kota                 = $sdm->real_escape_string( anti_injection( $_POST['s3_kota'] ) );
    
    // if ( empty( $_POST['s3_masuk'] ) || $_POST['s3_masuk'] == '0000-00-00' ) { $s3_masuk = '';
    // } else { $s3_masuk = $sdm->real_escape_string( date( "Y-m-d", strtotime( $_POST['s3_masuk'] ) ) ); }

    // if ( empty( $_POST['s3_keluar'] ) || $_POST['s3_keluar'] == '0000-00-00' ) { $s3_keluar = '';
    // } else { $s3_keluar = $sdm->real_escape_string( date( "Y-m-d", strtotime( $_POST['s3_keluar'] ) ) ); }
    
    $s3_masuk                = $sdm->real_escape_string( anti_injection( $_POST['s3_masuk'] ) );
    $s3_keluar               = $sdm->real_escape_string( anti_injection( $_POST['s3_keluar'] ) );

    // RIWAYAT PEKERJAAN
    $nama_perusahaan1        = $sdm->real_escape_string( anti_injection( $_POST['nama_perusahaan1'] ) );
    $alamat_perusahaan1      = $sdm->real_escape_string( anti_injection( $_POST['alamat_perusahaan1'] ) );
    $jenis_usaha1            = $sdm->real_escape_string( anti_injection( $_POST['jenis_usaha1'] ) );
    $riwayat_jabatan1        = $sdm->real_escape_string( anti_injection( $_POST['riwayat_jabatan1'] ) );

    // if ( empty( $_POST['riwayat_pekerjaan_mulai1'] ) || $_POST['riwayat_pekerjaan_mulai1'] == '0000-00-00' ) { $riwayat_pekerjaan_mulai1 = '';
    // } else { $riwayat_pekerjaan_mulai1 = $sdm->real_escape_string( date( "Y-m-d", strtotime( $_POST['riwayat_pekerjaan_mulai1'] ) ) ); }

    // if ( empty( $_POST['riwayat_pekerjaan_akhir1'] ) || $_POST['riwayat_pekerjaan_akhir1'] == '0000-00-00' ) { $riwayat_pekerjaan_akhir1 = '';
    // } else { $riwayat_pekerjaan_akhir1 = $sdm->real_escape_string( date( "Y-m-d", strtotime( $_POST['riwayat_pekerjaan_akhir1'] ) ) ); }
    $riwayat_pekerjaan_mulai1 = $sdm->real_escape_string( anti_injection( $_POST['riwayat_pekerjaan_mulai1'] ) );
    $riwayat_pekerjaan_akhir1 = $sdm->real_escape_string( anti_injection( $_POST['riwayat_pekerjaan_akhir1'] ) );

    $alasan_berhenti1        = $sdm->real_escape_string( anti_injection( $_POST['alasan_berhenti1'] ) );
    $nama_perusahaan2        = $sdm->real_escape_string( anti_injection( $_POST['nama_perusahaan2'] ) );
    $alamat_perusahaan2      = $sdm->real_escape_string( anti_injection( $_POST['alamat_perusahaan2'] ) );
    $jenis_usaha2            = $sdm->real_escape_string( anti_injection( $_POST['jenis_usaha2'] ) );
    $riwayat_jabatan2        = $sdm->real_escape_string( anti_injection( $_POST['riwayat_jabatan2'] ) );
    
    // if ( empty( $_POST['riwayat_pekerjaan_mulai2'] ) || $_POST['riwayat_pekerjaan_mulai2'] == '0000-00-00' ) { $riwayat_pekerjaan_mulai2 = '';
    // } else { $riwayat_pekerjaan_mulai2 = $sdm->real_escape_string( date( "Y-m-d", strtotime( $_POST['riwayat_pekerjaan_mulai2'] ) ) ); }

    // if ( empty( $_POST['riwayat_pekerjaan_akhir2'] ) || $_POST['riwayat_pekerjaan_akhir2'] == '0000-00-00' ) { $riwayat_pekerjaan_akhir2 = '';
    // } else { $riwayat_pekerjaan_akhir2 = $sdm->real_escape_string( date( "Y-m-d", strtotime( $_POST['riwayat_pekerjaan_akhir2'] ) ) ); }
    $riwayat_pekerjaan_mulai2 = $sdm->real_escape_string( anti_injection( $_POST['riwayat_pekerjaan_mulai2'] ) );
    $riwayat_pekerjaan_akhir2 = $sdm->real_escape_string( anti_injection( $_POST['riwayat_pekerjaan_akhir2'] ) );

    $alasan_berhenti2        = $sdm->real_escape_string( anti_injection( $_POST['alasan_berhenti2'] ) );
    $nama_perusahaan3        = $sdm->real_escape_string( anti_injection( $_POST['nama_perusahaan3'] ) );
    $alamat_perusahaan3      = $sdm->real_escape_string( anti_injection( $_POST['alamat_perusahaan3'] ) );
    $jenis_usaha3            = $sdm->real_escape_string( anti_injection( $_POST['jenis_usaha3'] ) );
    $riwayat_jabatan3        = $sdm->real_escape_string( anti_injection( $_POST['riwayat_jabatan3'] ) );
    
    // if ( empty( $_POST['riwayat_pekerjaan_mulai3'] ) || $_POST['riwayat_pekerjaan_mulai3'] == '0000-00-00' ) { $riwayat_pekerjaan_mulai3 = '';
    // } else { $riwayat_pekerjaan_mulai3 = $sdm->real_escape_string( date( "Y-m-d", strtotime( $_POST['riwayat_pekerjaan_mulai3'] ) ) ); }

    // if ( empty( $_POST['riwayat_pekerjaan_akhir3'] ) || $_POST['riwayat_pekerjaan_akhir3'] == '0000-00-00' ) { $riwayat_pekerjaan_akhir3 = '';
    // } else { $riwayat_pekerjaan_akhir3 = $sdm->real_escape_string( date( "Y-m-d", strtotime( $_POST['riwayat_pekerjaan_akhir3'] ) ) ); }
    $riwayat_pekerjaan_mulai3 = $sdm->real_escape_string( anti_injection( $_POST['riwayat_pekerjaan_mulai3'] ) );
    $riwayat_pekerjaan_akhir3 = $sdm->real_escape_string( anti_injection( $_POST['riwayat_pekerjaan_akhir3'] ) );

    $alasan_berhenti3        = $sdm->real_escape_string( anti_injection( $_POST['alasan_berhenti3'] ) );
    $nama_perusahaan4        = $sdm->real_escape_string( anti_injection( $_POST['nama_perusahaan4'] ) );
    $alamat_perusahaan4      = $sdm->real_escape_string( anti_injection( $_POST['alamat_perusahaan4'] ) );
    $jenis_usaha4            = $sdm->real_escape_string( anti_injection( $_POST['jenis_usaha4'] ) );
    $riwayat_jabatan4        = $sdm->real_escape_string( anti_injection( $_POST['riwayat_jabatan4'] ) );
    
    // if ( empty( $_POST['riwayat_pekerjaan_mulai4'] ) || $_POST['riwayat_pekerjaan_mulai4'] == '0000-00-00' ) { $riwayat_pekerjaan_mulai4 = '';
    // } else { $riwayat_pekerjaan_mulai4 = $sdm->real_escape_string( date( "Y-m-d", strtotime( $_POST['riwayat_pekerjaan_mulai4'] ) ) ); }

    // if ( empty( $_POST['riwayat_pekerjaan_akhir4'] ) || $_POST['riwayat_pekerjaan_akhir4'] == '0000-00-00' ) { $riwayat_pekerjaan_akhir4 = '';
    // } else { $riwayat_pekerjaan_akhir4 = $sdm->real_escape_string( date( "Y-m-d", strtotime( $_POST['riwayat_pekerjaan_akhir4'] ) ) ); }
    $riwayat_pekerjaan_mulai4 = $sdm->real_escape_string( anti_injection( $_POST['riwayat_pekerjaan_mulai4'] ) );
    $riwayat_pekerjaan_akhir4 = $sdm->real_escape_string( anti_injection( $_POST['riwayat_pekerjaan_akhir4'] ) );

    $alasan_berhenti4        = $sdm->real_escape_string( anti_injection( $_POST['alasan_berhenti4'] ) );
    $nama_perusahaan5        = $sdm->real_escape_string( anti_injection( $_POST['nama_perusahaan5'] ) );
    $alamat_perusahaan5      = $sdm->real_escape_string( anti_injection( $_POST['alamat_perusahaan5'] ) );
    $jenis_usaha5            = $sdm->real_escape_string( anti_injection( $_POST['jenis_usaha5'] ) );
    $riwayat_jabatan5        = $sdm->real_escape_string( anti_injection( $_POST['riwayat_jabatan5'] ) );
    
    // if ( empty( $_POST['riwayat_pekerjaan_mulai5'] ) || $_POST['riwayat_pekerjaan_mulai5'] == '0000-00-00' ) { $riwayat_pekerjaan_mulai5 = '';
    // } else { $riwayat_pekerjaan_mulai5 = $sdm->real_escape_string( date( "Y-m-d", strtotime( $_POST['riwayat_pekerjaan_mulai5'] ) ) ); }

    // if ( empty( $_POST['riwayat_pekerjaan_akhir5'] ) || $_POST['riwayat_pekerjaan_akhir5'] == '0000-00-00' ) { $riwayat_pekerjaan_akhir5 = '';
    // } else { $riwayat_pekerjaan_akhir5 = $sdm->real_escape_string( date( "Y-m-d", strtotime( $_POST['riwayat_pekerjaan_akhir5'] ) ) ); }
    $riwayat_pekerjaan_mulai5 = $sdm->real_escape_string( anti_injection( $_POST['riwayat_pekerjaan_mulai5'] ) );
    $riwayat_pekerjaan_akhir5 = $sdm->real_escape_string( anti_injection( $_POST['riwayat_pekerjaan_akhir5'] ) );

    $alasan_berhenti5        = $sdm->real_escape_string( anti_injection( $_POST['alasan_berhenti5'] ) );

    // PENGALAMAN ORGANISASI
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
    // KEMAMPUAN BAHASA ASING
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

    // jabatan, unit, dll
    // $id_master_unit           = $sdm->real_escape_string( anti_injection( $_POST['id_master_unit'] ) );
    // $id_master_jabatan        = $sdm->real_escape_string( anti_injection( $_POST['id_master_jabatan'] ) );
    // $id_master_sub_jabatan    = isset( $_POST['id_master_sub_jabatan'] ) ? $sdm->real_escape_string( anti_injection( $_POST['id_master_sub_jabatan'] ) ) : '';

    // tgl lamaran
    $tanggal_lamaran = date( 'Y-m-d' );

    $image1 = '';
 
    $img1 = isset( $_POST['img1'] ) ? $smp->real_escape_string( anti_injection( $_POST['img1'] ) ) : '';

    $path1 = '';

    // IMG1
    if ( !empty( $img1 ) ) :
        $img1 = str_replace( 'data:image/png;base64,', '', $img1 );
        $img1 = str_replace( ' ', '+', $img1 );
        $data1 = base64_decode( $img1 );
        $image1 = 'pelamar'.$key_form.date('YmdHis').'.png';
        $path1 = 'img/profile/'.$image1;

        // $magicianObj = new imageLib($path1);
        // $magicianObj -> resizeImage(150, 250);
        // $magicianObj -> saveImage($image1, 100);
    endif;


    $save = $sdm->query( "INSERT INTO calon_karyawan ( key_form, nama_lengkap, tempat_lahir, tanggal_lahir, jenis_kelamin, id_warganegara, suku, id_agama, gol_darah, status_perkawinan, anak_ke, jumlah_saudara, foto, alamat_domisili, status_tempat_tinggal, no_telp_rumah, no_hp, email, nama_darurat, hubungan_darurat, alamat_darurat, no_ktp, ktp_dikeluarkan_di, masa_berlaku_ktp, no_sim, sim_dikeluarkan_di, masa_berlaku_sim, no_passport, passport_dikeluarkan_di, masa_berlaku_passport, nama_suami_istri, pekerjaan_suami_istri, jumlah_anak, nama_anak1, usia_anak1, nama_anak2, usia_anak2, nama_anak3, usia_anak3, nama_anak4, usia_anak4, nama_anak5, usia_anak5, nama_ayah, id_warganegara_ayah, alamat_rumah_ayah, tempat_lahir_ayah, tanggal_lahir_ayah, id_pendidikan_ayah, id_pekerjaan_ayah, no_telp_ayah, alamat_kantor_ayah, nama_ibu, id_warganegara_ibu, alamat_rumah_ibu, tempat_lahir_ibu, tanggal_lahir_ibu, id_pendidikan_ibu, id_pekerjaan_ibu, no_telp_ibu, alamat_kantor_ibu, nama_wali, id_warganegara_wali, alamat_rumah_wali, tempat_lahir_wali, tanggal_lahir_wali, id_pendidikan_wali, id_pekerjaan_wali, no_telp_wali, alamat_kantor_wali, nama_tk, tk_kota, tk_masuk, tk_keluar, nama_sd, sd_kota, sd_masuk, sd_keluar, nama_smp, smp_kota, smp_masuk, smp_keluar, nama_slta, slta_jurusan, slta_kota, slta_masuk, slta_keluar, nama_d3, d3_jurusan, d3_kota, d3_masuk, d3_keluar, nama_s1, s1_jurusan, s1_kota, s1_masuk, s1_keluar, nama_s2, s2_jurusan, s2_kota, s2_masuk, s2_keluar, nama_s3, s3_jurusan, s3_kota, s3_masuk, s3_keluar, nama_perusahaan1, alamat_perusahaan1, jenis_usaha1, riwayat_jabatan1, riwayat_pekerjaan_mulai1, riwayat_pekerjaan_akhir1, alasan_berhenti1, nama_perusahaan2, alamat_perusahaan2, jenis_usaha2, riwayat_jabatan2, riwayat_pekerjaan_mulai2, riwayat_pekerjaan_akhir2, alasan_berhenti2, nama_perusahaan3, alamat_perusahaan3, jenis_usaha3, riwayat_jabatan3, riwayat_pekerjaan_mulai3, riwayat_pekerjaan_akhir3, alasan_berhenti3, nama_perusahaan4, alamat_perusahaan4, jenis_usaha4, riwayat_jabatan4, riwayat_pekerjaan_mulai4, riwayat_pekerjaan_akhir4, alasan_berhenti4, nama_perusahaan5, alamat_perusahaan5, jenis_usaha5, riwayat_jabatan5, riwayat_pekerjaan_mulai5, riwayat_pekerjaan_akhir5, alasan_berhenti5, organisasi1, organisasi2, organisasi3, organisasi4, organisasi5, jenis_organisasi1, jenis_organisasi2, jenis_organisasi3, jenis_organisasi4, jenis_organisasi5, jabatan_organisasi1, jabatan_organisasi2, jabatan_organisasi3, jabatan_organisasi4, jabatan_organisasi5, periode_organisasi1, periode_organisasi2, periode_organisasi3, periode_organisasi4, periode_organisasi5, bahasa_asing1, bahasa_asing2, bahasa_asing3, digunakan_sejak1, digunakan_sejak2, digunakan_sejak3, membaca1, membaca2, membaca3, menulis1, menulis2, menulis3, berbicara1, berbicara2, berbicara3, hasil_penerimaan, tanggal_lamaran ) VALUES( '$key_form', '$nama_lengkap', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$id_warganegara', '$suku', '$id_agama', '$gol_darah', '$status_perkawinan', '$anak_ke', '$jumlah_saudara', '$image1', '$alamat_domisili', '$status_tempat_tinggal', '$telp_rumah', '$handphone', '$email', '$nama_darurat', '$hubungan_darurat', '$alamat_darurat', '$no_ktp', '$ktp_dikeluarkan_di', '$masa_berlaku_ktp', '$no_sim', '$sim_dikeluarkan_di', '$masa_berlaku_sim', '$no_passport', '$passport_dikeluarkan_di', '$masa_berlaku_passport', '$nama_suami_istri', '$pekerjaan_suami_istri', '$jumlah_anak', '$nama_anak1', '$usia_anak1', '$nama_anak2', '$usia_anak2', '$nama_anak3', '$usia_anak3', '$nama_anak4', '$usia_anak4', '$nama_anak5', '$usia_anak5', '$nama_ayah', '$id_warganegara_ayah', '$alamat_rumah_ayah', '$tempat_lahir_ayah', '$tanggal_lahir_ayah', '$id_pendidikan_ayah', '$id_pekerjaan_ayah', '$no_telp_ayah', '$alamat_kantor_ayah', '$nama_ibu', '$id_warganegara_ibu', '$alamat_rumah_ibu', '$tempat_lahir_ibu', '$tanggal_lahir_ibu', '$id_pendidikan_ibu', '$id_pekerjaan_ibu', '$no_telp_ibu', '$alamat_kantor_ibu', '$nama_wali', '$id_warganegara_wali', '$alamat_rumah_wali', '$tempat_lahir_wali', '$tanggal_lahir_wali', '$id_pendidikan_wali', '$id_pekerjaan_wali', '$no_telp_wali', '$alamat_kantor_wali', '$nama_tk', '$tk_kota', '$tk_masuk', '$tk_keluar', '$nama_sd', '$sd_kota', '$sd_masuk', '$sd_keluar', '$nama_smp', '$smp_kota', '$smp_masuk', '$smp_keluar', '$nama_slta', '$slta_jurusan', '$slta_kota', '$slta_masuk', '$slta_keluar', '$nama_d3', '$d3_jurusan', '$d3_kota', '$d3_masuk', '$d3_keluar', '$nama_s1', '$s1_jurusan', '$s1_kota', '$s1_masuk', '$s1_keluar', '$nama_s2', '$s2_jurusan', '$s2_kota', '$s2_masuk', '$s2_keluar', '$nama_s3', '$s3_jurusan', '$s3_kota', '$s3_masuk', '$s3_keluar', '$nama_perusahaan1', '$alamat_perusahaan1', '$jenis_usaha1', '$riwayat_jabatan1', '$riwayat_pekerjaan_mulai1', '$riwayat_pekerjaan_akhir1', '$alasan_berhenti1', '$nama_perusahaan2', '$alamat_perusahaan2', '$jenis_usaha2', '$riwayat_jabatan2', '$riwayat_pekerjaan_mulai2', '$riwayat_pekerjaan_akhir2', '$alasan_berhenti2', '$nama_perusahaan3', '$alamat_perusahaan3', '$jenis_usaha3', '$riwayat_jabatan3', '$riwayat_pekerjaan_mulai3', '$riwayat_pekerjaan_akhir3', '$alasan_berhenti3', '$nama_perusahaan4', '$alamat_perusahaan4', '$jenis_usaha4', '$riwayat_jabatan4', '$riwayat_pekerjaan_mulai4', '$riwayat_pekerjaan_akhir4', '$alasan_berhenti4', '$nama_perusahaan5', '$alamat_perusahaan5', '$jenis_usaha5', '$riwayat_jabatan5', '$riwayat_pekerjaan_mulai5', '$riwayat_pekerjaan_akhir5', '$alasan_berhenti5', '$organisasi1', '$organisasi2', '$organisasi3', '$organisasi4', '$organisasi5', '$jenis_organisasi1', '$jenis_organisasi2', '$jenis_organisasi3', '$jenis_organisasi4', '$jenis_organisasi5', '$jabatan_organisasi1', '$jabatan_organisasi2', '$jabatan_organisasi3', '$jabatan_organisasi4', '$jabatan_organisasi5', '$periode_organisasi1', '$periode_organisasi2', '$periode_organisasi3', '$periode_organisasi4', '$periode_organisasi5', '$bahasa_asing1', '$bahasa_asing2', '$bahasa_asing3', '$digunakan_sejak1', '$digunakan_sejak2', '$digunakan_sejak3', '$membaca1', '$membaca2', '$membaca3', '$menulis1', '$menulis2', '$menulis3', '$berbicara1', '$berbicara2', '$berbicara3', '0', '$tanggal_lamaran' )" );


    if ( $save ) {

        // upload new file to directory
        // if ( !empty( $img1 ) ) {
        //     file_put_contents( $path1, $data1 );
        // }
        
        // upload new file to directory
        if ( !empty( $img1 ) ) {
            file_put_contents( $path1, $data1 );
            // resize image menjadi potrait (perbandingan 3 x 4 cm)
            smart_resize_image( $path1,
                                $string             = null,
                                $width              = 200, 
                                $height             = 267, 
                                $proportional       = false, 
                                $output             = 'file', 
                                $delete_original    = true, 
                                $use_linux_commands = false,
                                $quality = 100
                            );
        }

        // get last id
        $last_id = $sdm->insert_id;

        // insert unit, list_jabatan & list_sub_jabatan
        // $sdm->query( "INSERT INTO unit ( id_calon_karyawan, id_master_unit ) VALUES ( '$last_id', '$id_master_unit' )" );
        // $sdm->query( "INSERT INTO list_jabatan ( id_calon_karyawan, id_master_jabatan ) VALUES ( '$last_id', '$id_master_jabatan' )" );
        // $sdm->query( "INSERT INTO list_sub_jabatan ( id_calon_karyawan, id_master_sub_jabatan ) VALUES ( '$last_id', '$id_master_sub_jabatan' )" );


        $cucess_1 = 'good job add data teacher';
        $cucess_2 = 'good job add data crew';

        //   $get_list_jabatan = $sdm->query( "SELECT id_master_jabatan FROM list_jabatan WHERE id_calon_karyawan = '$last_id'" );
        // $data_list_jabatan = $get_list_jabatan->fetch_assoc();
        // $my_id_master_jabatan = $data_list_jabatan['id_master_jabatan'];

        // $get_data_pelamar_guru = $sdm->query( "SELECT kategori_jabatan FROM master_jabatan WHERE id_master_jabatan = '$my_id_master_jabatan'" );
        // // $get_data_pelamar_karyawan = $sdm->query( "SELECT kategori_jabatan FROM calon_karyawan WHERE id_calon_karyawan = '$last_id' AND kategori_jabatan = '2'" );
        // $data_row = $get_data_pelamar_guru->fetch_assoc();
        // $me_id_master_jabatan = $data_row['id_master_jabatan'];

        $get_data_pelamar_guru = $sdm->query( "SELECT key_form FROM calon_karyawan WHERE id_calon_karyawan = '$last_id' AND key_form = '1'" );
        // $get_data_pelamar_karyawan = $sdm->query( "SELECT kategori_jabatan FROM calon_karyawan WHERE id_calon_karyawan = '$last_id' AND kategori_jabatan = '2'" );

        $check_guru     = $get_data_pelamar_guru->num_rows;
        // $check_karyawan  = $get_data_pelamar_karyawan->num_rows;

        if ( $check_guru >= 1 ) {
            // create session success
            $_SESSION['success_input_data_diri_guru'] = $cucess_1;
            $_SESSION['key-step-success-data-diri-guru'] = $last_id;

            header('location:./?p=tambah-calon-guru&step=berkas-lamaran&keycode='.base64_encode($last_id.'pelamar'));
        } else {
            // create session success
            $_SESSION['success_input_data_diri_karyawan'] = $cucess_2;
            $_SESSION['key-step-success-data-diri-karyawan'] = $last_id;

            header('location:./?p=tambah-calon-karyawan&step=berkas-lamaran&keycode='.base64_encode($last_id.'pelamar'));
        }
    } else {
        // die();
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-exclamation-triangle"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Gagal tersimpan !
                                </div>';
    }
endif;

/**
* -------------------------------------
* Tambah data berkas calon karyawan
* -------------------------------------
*/
if ( isset( $_POST['next-step-from-berkas-karyawan'] ) ) :
    $berkas_array       = $_POST['berkas'];
    $data_berkas        = $_POST['kelengkapan_berkas'];
    $last_id            = $sdm->real_escape_string( anti_injection( base64_decode( $_POST['keycode'] ) ) );
    $id_calon_karyawan  = substr( $last_id, 0, -7 );
    $year               = date( 'Y' );

    for ( $i = 0; $i < count( $data_berkas ); $i++ ) {

        $berkas = $sdm->real_escape_string( anti_injection( $berkas_array[$i] ) );

        $save = $sdm->query( "INSERT INTO kelengkapan_berkas ( id_calon_karyawan, id_berkas, tahun ) VALUES ( '$id_calon_karyawan', '$berkas', '$year' )");
    }

    if ( $save ) {

        // $hit = count( $save );

        // echo "<script>alert('$hit'); window.location.href='./';</script>";

        $cucess = 'good job step 2';
        // create session success
        $_SESSION['success_input_berkas_karyawan'] = $cucess;
        $_SESSION['key-step-success-input-berkas-karyawan'] = $last_id;
        // unset sessi step sebelumnya
        unset( $_SESSION['success_input_data_diri_karyawan'] );
        unset( $_SESSION['key-step-success-data-diri-karyawan'] );

        header('location:./?p=tambah-calon-karyawan&step=pertanyaan-calon-karyawan&keycode='.base64_encode($last_id.'berkas'));
    }

endif;


/**
* -------------------------------------
* Tambah data berkas calon guru
* -------------------------------------
*/
if ( isset( $_POST['next-step-from-berkas-guru'] ) ) :
    $berkas_array       = $_POST['berkas'];
    $data_berkas        = $_POST['kelengkapan_berkas'];
    $last_id            = $sdm->real_escape_string( anti_injection( base64_decode( $_POST['keycode'] ) ) );
    $id_calon_karyawan  = substr( $last_id, 0, -7 );
    $year               = date( 'Y' );

    for ( $i = 0; $i < count( $data_berkas ); $i++ ) {

        $berkas = $sdm->real_escape_string( anti_injection( $berkas_array[$i] ) );

        $save = $sdm->query( "INSERT INTO kelengkapan_berkas ( id_calon_karyawan, id_berkas, tahun ) VALUES ( '$id_calon_karyawan', '$berkas', '$year' )");
    }

    if ( $save ) {

        $cucess = 'good job step 2';
        // create session success
        $_SESSION['success_input_berkas_guru'] = $cucess;
        $_SESSION['key-step-success-input-berkas-guru'] = $last_id;
        // unset sessi step sebelumnya
        unset( $_SESSION['success_input_data_diri_guru'] );
        unset( $_SESSION['key-step-success-data-diri-guru'] );

        header('location:./?p=tambah-calon-guru&step=pertanyaan-calon-guru&keycode='.base64_encode($last_id.'berkas'));
    }

endif;


/**
* -------------------------------------
* Tambah list jawaban soal calon karyawan ( FINISH STEP )
* -------------------------------------
*/
if ( isset( $_POST['finish-step-from-question-crew'] ) ) :
    $soal_array         = $_POST['id_soal'];
    $jawaban_array      = $_POST['jawaban'];
    $last_id            = $sdm->real_escape_string( anti_injection( base64_decode( $_POST['keycode'] ) ) );
    $id_calon_karyawan  = substr( $last_id, 0, -13 );
    $year               = date( 'Y' );

    for ( $i = 0; $i < count( $soal_array ); $i++ ) {

        $soal = $sdm->real_escape_string( anti_injection( $soal_array[$i] ) );
        $jawaban = $sdm->real_escape_string( $jawaban_array[$i] );

        if ( empty( $jawaban ) ) {
            echo "<script>alert('Jawaban harus diisi lengkap !'); window.history.go(-1);</script>";
            die();
        } else {

            $save = $sdm->query( "INSERT INTO soal_soal ( id_calon_karyawan, id_soal, jawaban, tahun ) VALUES ( '$id_calon_karyawan', '$soal', '$jawaban', '$year' )");
        }
    }

    if ( $save ) {

        $cucess = 'Finish !!!!!'.$id_calon_karyawan;
        // create session finish
        $_SESSION['finish_recruitment'] = $cucess;

        unset( $_SESSION['success_input_berkas_karyawan'] );
        unset( $_SESSION['key-step-success-input-berkas-karyawan'] );

        header('location:./?p=detail-calon-karyawan&id='.base64_encode( $id_calon_karyawan) );
        // header( 'location:./?p=pelamar' );
        $_SESSION['messages'] = '<div class="alert alert-success alert-dismissible" role="alert"><i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Data berhasil disimpan
                               </div>';
    }
endif;


/**
* -------------------------------------
* Tambah list jawaban soal calon guru ( FINISH STEP )
* -------------------------------------
*/
if ( isset( $_POST['finish-step-from-question-teacher'] ) ) :
    $soal_array         = $_POST['id_soal'];
    $jawaban_array      = $_POST['jawaban'];
    $last_id            = $sdm->real_escape_string( anti_injection( base64_decode( $_POST['keycode'] ) ) );
    $id_calon_karyawan  = substr( $last_id, 0, -13 );
    $year               = date( 'Y' );

    for ( $i = 0; $i < count( $soal_array ); $i++ ) {

        $soal = $sdm->real_escape_string( anti_injection( $soal_array[$i] ) );
        $jawaban = $sdm->real_escape_string( $jawaban_array[$i] );

        if ( empty( $jawaban ) ) {
            echo "<script>alert('Jawaban harus diisi lengkap !'); window.history.go(-1);</script>";
            die();
        } else {
            $save = $sdm->query( "INSERT INTO soal_soal ( id_calon_karyawan, id_soal, jawaban, tahun ) VALUES ( '$id_calon_karyawan', '$soal', '$jawaban', '$year' )");
        }
    }

    if ( $save ) {

        $cucess = 'Finish !!!!!'.$id_calon_karyawan;
        // create session finish
        $_SESSION['finish_recruitment'] = $cucess;

        unset( $_SESSION['success_input_berkas_guru'] );
        unset( $_SESSION['key-step-success-input-berkas_guru'] );

        // header( 'location:./?p=pelamar' );
        header('location:./?p=detail-calon-guru&id='.base64_encode( $id_calon_karyawan) );
        $_SESSION['messages'] = '<div class="alert alert-success alert-dismissible" role="alert"><i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Data berhasil disimpan
                               </div>';
    }
endif;

// =================

/**
* -------------------------------------
* Tambah list pertanyaan calon karyawan
* -------------------------------------
*/
if ( isset( $_POST['btn-add-data-question-crew'] ) ) :
    $pertanyaan  = $sdm->real_escape_string( $_POST['pertanyaan'] );
    $year        = date( 'Y' );


    $save = $sdm->query( "INSERT INTO master_soal( kategori_pegawai, soal, soal_tahun ) VALUES( 'karyawan', '$pertanyaan', '$year' )" );

    if ( $save ) {
        
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-success alert-dismissible" role="alert"><i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Data berhasil disimpan
                                </div>';
    } else {
        // die();
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-exclamation-triangle"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Gagal tersimpan !
                                </div>';
    }
endif;


/**
* -------------------------------------
* Tambah list pertanyaan calon guru
* -------------------------------------
*/
if ( isset( $_POST['btn-add-data-question-teacher'] ) ) :
    $pertanyaan  = $sdm->real_escape_string( $_POST['pertanyaan'] );
    $year        = date( 'Y' );

    $save = $sdm->query( "INSERT INTO master_soal( kategori_pegawai, soal, soal_tahun ) VALUES( 'guru', '$pertanyaan', '$year' )" );

    if ( $save ) {
        
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-success alert-dismissible" role="alert"><i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Data berhasil disimpan
                                </div>';
    } else {
        // die();
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-exclamation-triangle"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Gagal tersimpan !
                                </div>';
    }
endif;


/**
* -------------------------------------
* Tambah kelengkapan berkas calon guru
* -------------------------------------
*/
if ( isset( $_POST['btn-add-data-kelengkapan-berkas-teacher'] ) ) :
    $kelengkapan_berkas  = $sdm->real_escape_string( $_POST['kelengkapan_berkas'] );
    $year                = date( 'Y' );

    $save = $sdm->query( "INSERT INTO master_berkas( kategori_pegawai, kelengkapan_berkas, berkas_tahun ) VALUES( 'guru', '$kelengkapan_berkas', '$year' )" );

    if ( $save ) {
        
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-success alert-dismissible" role="alert"><i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Data berhasil disimpan
                                </div>';
    } else {
        // die();
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-exclamation-triangle"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Gagal tersimpan !
                                </div>';
    }
endif;


/**
* -------------------------------------
* Tambah kelengkapan berkas calon karyawan
* -------------------------------------
*/
if ( isset( $_POST['btn-add-data-kelengkapan-berkas-crew'] ) ) :
    $kelengkapan_berkas  = $sdm->real_escape_string( $_POST['kelengkapan_berkas'] );
    $year                = date( 'Y' );

    $save = $sdm->query( "INSERT INTO master_berkas( kategori_pegawai, kelengkapan_berkas, berkas_tahun ) VALUES( 'karyawan', '$kelengkapan_berkas', '$year' )" );

    if ( $save ) {
        
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-success alert-dismissible" role="alert"><i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Data berhasil disimpan
                                </div>';
    } else {
        // die();
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-exclamation-triangle"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Gagal tersimpan !
                                </div>';
    }
endif;


/**
* -------------------------------------
* Add master unit
* -------------------------------------
*/
if ( isset( $_POST['btn-add-data-master-unit'] ) ) :
    $nama_unit  = $sdm->real_escape_string( anti_injection( $_POST['nama_unit'] ) );

    if ( empty( $nama_unit ) ) {
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-exclamation-triangle"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    Data tidak lengkap !, silahkan ulangi.
                                    </div>';
    } else {
        $save = $sdm->query( "INSERT INTO master_unit ( nama_unit, status ) VALUES( '$nama_unit', '1' )" );

        if ( $save ) {
            
            echo "<script>window.history.go(-1);</script>";
            $_SESSION['messages'] = '<div class="alert alert-success alert-dismissible" role="alert"><i class="fa fa-check"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    Data berhasil disimpan
                                    </div>';
        } else {
            // die();
            echo "<script>window.history.go(-1);</script>";
            $_SESSION['messages'] = '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-exclamation-triangle"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    Gagal tersimpan !
                                    </div>';
        }
    }
endif;



/**
* -------------------------------------
* Add master jabatan
* -------------------------------------
*/
if ( isset( $_POST['btn-add-data-master-jabatan'] ) ) :
    $jabatan            = $sdm->real_escape_string( anti_injection( $_POST['jabatan'] ) );
    $kategori_jabatan   = $sdm->real_escape_string( anti_injection( $_POST['kategori_jabatan'] ) );
    $id_master_unit     = $sdm->real_escape_string( anti_injection( $_POST['id_master_unit'] ) );

    if ( empty( $jabatan ) || empty( $kategori_jabatan ) || empty( $id_master_unit ) ) {
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-exclamation-triangle"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    Data tidak lengkap !, silahkan ulangi.
                                    </div>';
    } else {
        $save = $sdm->query( "INSERT INTO master_jabatan( jabatan, kategori_jabatan, id_master_unit ) VALUES( '$jabatan', '$kategori_jabatan', '$id_master_unit' )" );

        if ( $save ) {
            
            echo "<script>window.history.go(-1);</script>";
            $_SESSION['messages'] = '<div class="alert alert-success alert-dismissible" role="alert"><i class="fa fa-check"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    Data berhasil disimpan
                                    </div>';
        } else {
            // die();
            echo "<script>window.history.go(-1);</script>";
            $_SESSION['messages'] = '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-exclamation-triangle"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    Gagal tersimpan !
                                    </div>';
        }
    }
endif;


/**
* -------------------------------------
* Add master sub jabatan
* -------------------------------------
*/
if ( isset( $_POST['btn-add-data-master-sub-jabatan'] ) ) :
    $master_sub_jabatan  = $sdm->real_escape_string( anti_injection( $_POST['master_sub_jabatan'] ) );
    $id_master_jabatan   = $sdm->real_escape_string( anti_injection( $_POST['id_master_jabatan'] ) );

    if ( empty( $master_sub_jabatan ) || empty( $id_master_jabatan ) ) {
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-exclamation-triangle"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    Data tidak lengkap !, silahkan ulangi.
                                    </div>';
    } else {
        $save = $sdm->query( "INSERT INTO master_sub_jabatan( id_master_jabatan, master_sub_jabatan ) VALUES( '$id_master_jabatan', '$master_sub_jabatan' )" );

        if ( $save ) {
            
            echo "<script>window.history.go(-1);</script>";
            $_SESSION['messages'] = '<div class="alert alert-success alert-dismissible" role="alert"><i class="fa fa-check"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    Data berhasil disimpan
                                    </div>';
        } else {
            // die();
            echo "<script>window.history.go(-1);</script>";
            $_SESSION['messages'] = '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-exclamation-triangle"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    Gagal tersimpan !
                                    </div>';
        }
    }
endif;


/**
* -------------------------------------
* Add position unit, jabatan, sub jabatan
* -------------------------------------
*/
if ( isset( $_POST['btn-add-data-position'] ) ) :
    $id_calon_karyawan      = $sdm->real_escape_string( anti_injection( $_POST['id_calon_karyawan'] ) );
    $id_master_unit         = $sdm->real_escape_string( anti_injection( $_POST['id_master_unit'] ) );
    $id_master_jabatan      = $sdm->real_escape_string( anti_injection( $_POST['id_master_jabatan'] ) );
    $id_master_sub_jabatan  = isset( $_POST['id_master_sub_jabatan'] ) ? $sdm->real_escape_string( anti_injection( $_POST['id_master_sub_jabatan'] ) ) : '';

    // echo $id_calon_karyawan.', ';
    // echo $id_master_unit.', ';
    // echo $id_master_jabatan.', ';
    // echo $id_master_sub_jabatan;

    // if ( empty( $class_name ) || empty( $level_class ) ) {
    //     echo "<script>window.history.go(-1);</script>";
    //     $_SESSION['messages'] = '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-exclamation-triangle"></i>
    //                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
    //                                 Data tidak lengkap !, silahkan ulangi.
    //                                 </div>';
    // } else {
    // 
    $save_list_sub_jabatan = '';
    
    // Save data
    $save_list_unit    = $sdm->query( "INSERT INTO unit( id_calon_karyawan, id_master_unit ) VALUES( '$id_calon_karyawan', '$id_master_unit' )" );
    $save_list_jabatan = $sdm->query( "INSERT INTO list_jabatan( id_calon_karyawan, id_master_jabatan ) VALUES( '$id_calon_karyawan', '$id_master_jabatan' )" );
    if ( !empty( $id_master_sub_jabatan ) ) :
        $save_list_sub_jabatan = $sdm->query( "INSERT INTO list_sub_jabatan( id_calon_karyawan, id_master_sub_jabatan ) VALUES( '$id_calon_karyawan', '$id_master_sub_jabatan' )" );
    else :
        $save_list_sub_jabatan = '';
    endif;

    if ( $save_list_unit && $save_list_jabatan ) {
         // die();
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-success alert-dismissible" role="alert"><i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Data berhasil disimpan
                                </div>';
    } else {
        // die();
        echo "<script>window.history.go(-1);</script>";
        $_SESSION['messages'] = '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-exclamation-triangle"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Gagal tersimpan !
                                </div>';
    }
    // }
endif;