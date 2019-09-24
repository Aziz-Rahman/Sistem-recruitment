<?php
$karyawan = $sdm->query( "SELECT * FROM karyawan" );
?>


<!-- Main Content -->
<div class="container-fluid">
    <div class="side-body">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                    <li><i class="fa fa-laptop"></i>Dashboard</li>                          
                </ol>
            </div>
        </div>

        <div class="page-title">
            <span class="title">Data Calon Karyawan</span>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="info-alert">
                    <?php  
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
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <form name="myForm" action="action-insert.php" method="post" class="form-horizontal form-label-left">
                            <div class="step">
                                <ul class="nav nav-tabs nav-justified" role="tablist">
                                    <li role="step" class="active">
                                        <a href="#step1" id="step1-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">
                                            <div class="icon fa fa-file"></div>
                                            <div class="step-title">
                                                <div class="title">Berkas Lamaran</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li role="step">
                                        <a href="#step2" role="tab" id="step2-tab" data-toggle="tab" aria-controls="profile">
                                            <div class="icon fa fa-credit-card"></div>
                                            <div class="step-title">
                                                <div class="title">Data Pelamar</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li role="step">
                                        <a href="#step3" role="tab" id="step3-tab" data-toggle="tab" aria-controls="profile">
                                            <div class="icon fa fa-question-circle"></div>
                                            <div class="step-title">
                                                <div class="title">Pertanyaan</div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="step1" aria-labelledby="home-tab">
                                        <div class="col-md-12 no-padding">
                                            <div class="checkbox3 checkbox-inline checkbox-check checkbox-light">
                                                <input type="checkbox" value="surat_lamaran">
                                                <label>
                                                    Surat lamaran pekerjaan yang ditujukan kepada Unit HRD Sekolah Pah Tsung
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-12 no-padding">
                                            <div class="checkbox3 checkbox-inline checkbox-check checkbox-light">
                                                <input type="checkbox">
                                                <label>
                                                    Curiculum Vitae (CV) dan pas foto (3x4)cm sebanyak 1 lembar ditempel di Curiculum Vitae (CV)
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-12 no-padding">
                                            <div class="checkbox3 checkbox-inline checkbox-check checkbox-light">
                                                <input type="checkbox">
                                                <label>
                                                    Fotocopy surat keterangan lulus (SKL) dari Universitas atau Sekolah 
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-12 no-padding">
                                            <div class="checkbox3 checkbox-inline checkbox-check checkbox-light">
                                                <input type="checkbox">
                                                <label>
                                                    Identitas diri dibuktikan dengan fotocopy KTP 1 lembar
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-12 no-padding">
                                            <div class="checkbox3 checkbox-inline checkbox-check checkbox-light">
                                                <input type="checkbox">
                                                <label>
                                                    Sehat jasmani dan rohani, dibuktikan dengan surat keterangan sehat dari dokter/ RS
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-12 no-padding">
                                            <div class="checkbox3 checkbox-inline checkbox-check checkbox-light">
                                                <input type="checkbox">
                                                <label>
                                                    Fotocopy Ijazah yang sudah dilegalisir sesuai dengan kualifikasi masing-masing
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-12 no-padding">
                                            <div class="checkbox3 checkbox-inline checkbox-check checkbox-light">
                                                <input type="checkbox">
                                                <label>
                                                    Fotocopy Transkrip Nilai yang dilegalisir
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-12 no-padding">
                                            <div class="checkbox3 checkbox-inline checkbox-check checkbox-light">
                                                <input type="checkbox">
                                                <label>
                                                    Fotocopy Sertifikat Komputer dan Sertifikat penunjang kemampuan lainnya
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-12 no-padding">
                                            <div class="checkbox3 checkbox-inline checkbox-check checkbox-light">
                                                <input type="checkbox">
                                                <label>
                                                    Fotocopy Surat Pengalaman Kerja/ Referensi Kerja
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-12 no-padding">
                                            <div class="checkbox3 checkbox-inline checkbox-check checkbox-light">
                                                <input type="checkbox">
                                                <label>
                                                    Fotocopy Surat Surat Lainya
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="step2" aria-labelledby="profile-tab">
                                        <div class="col-xs-12 no-padding">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="card-title">
                                                        <div class="title">DATA PRIBADI</div>
                                                    </div>
                                                </div>
                                                <div class="card-body" style="padding-left: 0; padding-right: 0;">

                                                    <div class="form-group ">
                                                        <div class="col-lg-2">
                                                            <label>Jabatan</label>
                                                        </div>
                                                        <div class="col-lg-10">
                                                            <input type="text" name="jabatan" class="form-control" autocomplete="off" placeholder="Jabatan">
                                                        </div>
                                                    </div>

                                                    <div class="form-group ">
                                                        <div class="col-lg-2">
                                                            <label>Nama Lengkap</label>
                                                        </div>
                                                        <div class="col-lg-10">
                                                            <input type="text" name="nama_lengkap" class="form-control" autocomplete="off" placeholder="Nama Lengkap">
                                                        </div>
                                                    </div>

                                                    <div class="form-group ">
                                                        <div class="col-lg-2">
                                                            <label>Tempat Lahir</label>
                                                        </div>
                                                        <div class="col-lg-10">
                                                            <input type="text" name="tempat_lahir" class="form-control" autocomplete="off" placeholder="Tempat Lahir">
                                                        </div>
                                                    </div>

                                                    <div class="form-group ">
                                                        <div class="col-lg-2">
                                                            <label>Tanggal Lahir</label>
                                                        </div>
                                                        <div class="col-lg-10">
                                                            <input type="text" name="tanggal_lahir" class="form-control datepicker" autocomplete="off" placeholder="Tanggal Lahir">
                                                        </div>
                                                    </div>

                                                    <div class="form-group ">
                                                        <div class="col-lg-2">
                                                            <label>Jenis Kelamin</label>
                                                        </div>
                                                        <div class="col-lg-10">
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
                                                                <option value="0" selected> -- Pilih -- </option>
                                                                <option value="1">Singke / Belum Menikah</option>
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
                                                        <div class="col-lg-1 text-center">Dari</div>
                                                        <div class="col-lg-5">
                                                            <input type="text" name="jumlah_saudara" class="form-control" autocomplete="off" placeholder="Bersaudara">
                                                        </div>
                                                        <div class="col-lg-1 text-right">Bersaudara</div>
                                                    </div>
                                                </div> <!-- -->
                                            </div> <!-- -->
                                        </div> <!-- -->

                                        <div class="col-xs-12 no-padding">
                                            <div class="card">
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
                                            <div class="card">
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
                                                            <input type="text" name="masa_berlaku_ktp" class="form-control datepicker" autocomplete="off" placeholder="Berlaku sampai">
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
                                            <div class="card">
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

                                                    <div class="form-group ">
                                                        <div class="col-lg-2">
                                                            <label>Nama Anak</label>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <input type="text" name="nama_anak1" class="form-control" autocomplete="off" placeholder="Nama Anak 1">
                                                        </div>
                                                        <div class="col-lg-1 text-right">Usia: </div>
                                                        <div class="col-lg-2">
                                                            <input type="text" name="usia_anak1" class="form-control" autocomplete="off" placeholder="Usia">
                                                        </div>
                                                    </div>

                                                    <div class="form-group ">
                                                        <div class="col-lg-2">
                                                            <!-- <label>Nama Anak</label> -->
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <input type="text" name="nama_anak2" class="form-control" autocomplete="off" placeholder="Nama Anak 2">
                                                        </div>
                                                        <div class="col-lg-1 text-right">Usia: </div>
                                                        <div class="col-lg-2">
                                                            <input type="text" name="usia_anak2" class="form-control" autocomplete="off" placeholder="Usia">
                                                        </div>
                                                    </div>

                                                    <div class="form-group ">
                                                        <div class="col-lg-2">
                                                            <!-- <label>Nama Anak</label> -->
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <input type="text" name="nama_anak3" class="form-control" autocomplete="off" placeholder="Nama Anak 3">
                                                        </div>
                                                        <div class="col-lg-1 text-right">Usia: </div>
                                                        <div class="col-lg-2">
                                                            <input type="text" name="usia_anak3" class="form-control" autocomplete="off" placeholder="Usia">
                                                        </div>
                                                    </div>

                                                </div> <!-- -->
                                            </div> <!-- -->
                                        </div> <!-- -->

                                         <div class="col-xs-12 no-padding">
                                            <div class="card">
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
                                            <div class="card">
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
                                                                <td colspan="2">Lama Pendidikan</td>
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
                                            <div class="card">
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
                                                                <td colspan="2">Lama Kerja</td>
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
                                                                <td><input type="text" name="riwayat_pekerjaan_mulai1" class="form-control input-short-1 datepicker"></td>
                                                                <td><input type="text" name="riwayat_pekerjaan_akhir1" class="form-control input-short-1 datepicker"></td>
                                                                <td><input type="text" name="alasan_berhenti1" class="form-control"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="text" name="nama_perusahaan2" class="form-control"></td>
                                                                <td><input type="text" name="alamat_perusahaan2" class="form-control"></td>
                                                                <td><input type="text" name="jenis_usaha2" class="form-control"></td>
                                                                <td><input type="text" name="riwayat_jabatan2" class="form-control"></td>
                                                                <td><input type="text" name="riwayat_pekerjaan_mulai2" class="form-control input-short-1 datepicker"></td>
                                                                <td><input type="text" name="riwayat_pekerjaan_akhir2" class="form-control input-short-1 datepicker"></td>
                                                                <td><input type="text" name="alasan_berhenti2" class="form-control"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="text" name="nama_perusahaan3" class="form-control"></td>
                                                                <td><input type="text" name="alamat_perusahaan3" class="form-control"></td>
                                                                <td><input type="text" name="jenis_usaha3" class="form-control"></td>
                                                                <td><input type="text" name="riwayat_jabatan3" class="form-control"></td>
                                                                <td><input type="text" name="riwayat_pekerjaan_mulai3" class="form-control input-short-1 datepicker"></td>
                                                                <td><input type="text" name="riwayat_pekerjaan_akhir3" class="form-control input-short-1 datepicker"></td>
                                                                <td><input type="text" name="alasan_berhenti3" class="form-control"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="text" name="nama_perusahaan4" class="form-control"></td>
                                                                <td><input type="text" name="alamat_perusahaan4" class="form-control"></td>
                                                                <td><input type="text" name="jenis_usaha4" class="form-control"></td>
                                                                <td><input type="text" name="riwayat_jabatan4" class="form-control"></td>
                                                                <td><input type="text" name="riwayat_pekerjaan_mulai4" class="form-control input-short-1 datepicker"></td>
                                                                <td><input type="text" name="riwayat_pekerjaan_akhir4" class="form-control input-short-1 datepicker"></td>
                                                                <td><input type="text" name="alasan_berhenti4" class="form-control"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="text" name="nama_perusahaan5" class="form-control"></td>
                                                                <td><input type="text" name="alamat_perusahaan5" class="form-control"></td>
                                                                <td><input type="text" name="jenis_usaha5" class="form-control"></td>
                                                                <td><input type="text" name="riwayat_jabatan5" class="form-control"></td>
                                                                <td><input type="text" name="riwayat_pekerjaan_mulai5" class="form-control input-short-1 datepicker"></td>
                                                                <td><input type="text" name="riwayat_pekerjaan_akhir5" class="form-control input-short-1 datepicker"></td>
                                                                <td><input type="text" name="alasan_berhenti5" class="form-control"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                </div> <!-- -->
                                            </div> <!-- -->
                                        </div> <!-- -->

                                        <div class="col-xs-12 no-padding">
                                            <div class="card">
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
                                            <div class="card">
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
                                                    <p>KS : Kurang Sekali</p>
                                                    <p>K : Kurang</p>
                                                    <p>C : Cukup</p>
                                                    <p>B : Baik</p>
                                                    <p>BS : Baik sekali</p>

                                                </div> <!-- -->
                                            </div> <!-- -->
                                        </div> <!-- -->

                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="step3" aria-labelledby="dropdown1-tab">
                                        <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
                                    </div>
                                </div>
                            </div> <!-- end: step -->

                            <div class="form-group pull-right">
                                <div class="col-lg-12">
                                    <button type="button" class="btn btn-danger" onclick="window.history.go(-1);">Batal</button>
                                    <button type="submit" name="btn-add-data-calon-karyawan" class="btn btn-info">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div> <!-- end: card-body -->
                </div>
            </div>
        </div>
    </div>
</div>
