<?php
$id = $sdm->real_escape_string( anti_injection( base64_decode( $_GET['id'] ) ) );
$karyawan = $sdm->query( "SELECT * FROM karyawan WHERE nik = '$id'" );

$data = $karyawan->fetch_assoc();
$check_data = $karyawan->num_rows;
// var_dump($data);
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
            <span class="title">Edit Data Karyawan</span>
        </div>

        <div class="info-alert">
            <?php  
            // Check message ada atau tidak
            if ( ! empty( $_SESSION['messages'] ) ) {
                echo $_SESSION['messages']; // menampilkan pesan 
                unset( $_SESSION['messages'] ); // menghapus pesan setelah refresh
            }   
            ?>  
        </div>

        <form method="post" action="action-update.php?id=<?php echo base64_encode( $data['nik'] ); ?>">
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <div class="col-xs-12 no-padding">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    <div class="title">EDIT DATA KARYAWAN</div>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="form-group">
                                   <div class="row">
                                        <div class="col-lg-6">
                                            <label>NIK</label>
                                            <input type="text" name="nik" class="form-control" value="<?php echo $data['nik']; ?>">
                                        </div> 
                                        <div class="col-lg-6">
                                            <label>Nama Karyawan</label>
                                            <input type="text" name="nama_karyawan" class="form-control" value="<?php echo $data['karyawan']; ?>">
                                        </div>
                                    </div>
                                </div>
                                
                                 <div class="form-group">
                                   <div class="row">
                                        <div class="col-lg-6">
                                            <label>No. Telepon</label>
                                            <input type="text" name="telepon" class="form-control" value="<?php echo $data['telepon']; ?>">
                                        </div> 
                                        <div class="col-lg-6">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control" value="<?php echo $data['email']; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                   <div class="row">
                                        <div class="col-lg-3">
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
                                        <div class="col-lg-3">
                                            <label>Tempat Lahir</label>
                                            <input type="text" name="tempat_lahir" class="form-control" value="<?php echo $data['tempat_lahir']; ?>">
                                        </div>
                                        <div class="col-lg-3">
                                            <label>Tanggal Lahir</label>
                                            <?php
                                            if ( empty( $data['tanggal_lahir'] ) || $data['tanggal_lahir'] == '0000-00-00' ) {
                                                $tanggal_lahir = '';
                                            } else {
                                                $tanggal_lahir = date_format( date_create( $data['tanggal_lahir'] ), "d-m-Y" );
                                            }
                                            ?>
                                            <input type="text" name="tanggal_lahir" class="form-control datepicker" value="<?php echo $tanggal_lahir; ?>">
                                        </div>
                                        <div class="col-md-3">
                                            <label>Agama</label>
                                            <?php
                                            $query = $psbo->query( "SELECT * FROM dbpsbo.agama" );
                                            echo '<select id="agama" name="agama" class="form-control norad valid">';
                                            echo '<option>-- Pilih --</option>';
                                            while ( $agama = $query->fetch_assoc() ) {
                                                $id_agama = $agama['IDAgama'];
                                                $agama = $agama['Agama'];
                                                
                                                if ( $data['agama'] == $id_agama ) {
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
                                </div>

                                 <div class="form-group">
                                   <div class="row">
                                       <div class="col-md-6">
                                            <label>Alamat lengkap</label>
                                            <textarea name="alamat" class="form-control" rows="3"><?php echo $data['alamat']; ?></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Status Karyawan</label>
                                            <select name="status_karyawan" id="status_karyawan" class="form-control select-option">
                                                <?php if ( $data['status_karyawan'] == "1" ) : ?>
                                                    <option value="1" selected> Aktif </option>
                                                    <option value="2">Tidak Aktif</option>
                                                <?php elseif ( $data['status_karyawan'] == "2" ) : ?>
                                                    <option value="1">Aktif</option>
                                                    <option value="2" selected>Tidak Aktif</option>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix"></div>
                     
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 no-padding" style="margin-top: 30px;">
                        <div class="card">
                            <div class="card-header">
                                <!-- <div class="card-title">
                                    <div class="title">C. Data Orang Tua / Wali Murid</div>
                                </div> -->
                            </div>
                            <div class="card-body pull-right">
                                <div class="form-group btn-action-update">
                                    <button type="button" class="btn btn-danger" onClick="window.history.go(-1);"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back</button>
                                    <button type="submit" name="btn-update-karyawan" class="btn btn-info btn-update-pengguna-kelas-sdm"><i class="fa fa-coffee" aria-hidden="true"></i> Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
