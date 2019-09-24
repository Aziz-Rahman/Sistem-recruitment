<?php
if ( $_SESSION['admin_id_recruitment'] != '2' ) {
    echo "<script>window.location.href='./';</script>";
}
?>

<div class="container-fluid" style="margin-top: 10px;">
    <div class="side-body padding-top my-class-mrg">
        <!-- <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-info">
                    <div class="panel-heading">Sistem pendaftaran guru / karyawan baru</div>
                    <div class="panel-body">
                       <p>Selamat datang di sistem pendaftaran guru / karyawan baru. Silahkan pilih menu pendaftaran dibawah ini.</p>

                    </div>
                </div>
            </div>
        </div> -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card summary-inline">
                    <div class="card-body">
                        <div class="content" style="width:100%;">
                            <div class="title" style="text-align: center; font-size: 20px; margin-top: 0;">Sistem Penerimaan Pegawai</div>
                            <div class="sub-title" style="text-align: center;">Selamat datang di sistem penerimaan guru & karyawan Sekolah Pah Tsung</div>
                        </div>
                        <div class="clear-both"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xs-12 animated fadeInLeft" style="margin-top: 30px;">
                <?php 
                if ( !empty( $_SESSION['success_input_data_diri_guru'] ) ) {
                    echo '<a href="./?p=tambah-calon-guru&step=berkas-lamaran&keycode='.base64_encode( $_SESSION['key-step-success-data-diri-guru'] ).'">'; 
                }
                elseif ( !empty( $_SESSION['success_input_berkas_guru'] ) ) {
                    echo '<a href="./?p=tambah-calon-guru&step=pertanyaan-calon-guru&keycode='.base64_encode( $_SESSION['key-step-success-input-berkas-guru'] ).'">'; 
                }
                else {
                    echo '<a href="./?p=tambah-calon-guru&step=data-calon-guru">'; 
                }
                ?>
                <!-- <a href="./?p=tambah-calon-guru&step=data-calon-guru"> -->
                    <div class="card red summary-inline">
                        <div class="card-body">
                            <i class="icon fa fa-plus-circle fa-4x"></i>
                            <div class="content">
                                <div class="title" style="margin-top: 6px;">Guru</div>
                                <div class="sub-title">Menu pendaftaran untuk calon guru</div>
                            </div>
                            <div class="clear-both"></div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-xs-12 animated fadeInRight" style="margin-top: 30px;">
                <!-- <a href="./?p=tambah-calon-karyawan&step=data-calon-karyawan"> -->
                <?php 
                if ( !empty( $_SESSION['success_input_data_diri_karyawan'] ) ) {
                    echo '<a href="./?p=tambah-calon-karyawan&step=berkas-lamaran&keycode='.base64_encode( $_SESSION['key-step-success-data-diri-karyawan'] ).'">'; 
                }
                elseif ( !empty( $_SESSION['success_input_berkas_karyawan'] ) ) {
                    echo '<a href="./?p=tambah-calon-karyawan&step=pertanyaan-calon-karyawan&keycode='.base64_encode( $_SESSION['key-step-success-input-berkas-karyawan'] ).'">'; 
                }
                else {
                    echo '<a href="./?p=tambah-calon-karyawan&step=data-calon-karyawan">'; 
                }
                ?>
                    <div class="card blue summary-inline">
                        <div class="card-body">
                            <i class="icon fa fa-plus-circle fa-4x"></i>
                            <div class="content">
                                <div class="title" style="margin-top: 6px;">Karyawan</div>
                                <div class="sub-title">Menu pendaftaran untuk calon karyawan</div>
                            </div>
                            <div class="clear-both"></div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- //////////////////////////// -->

<!--             <div class="col-lg-6 col-xs-12 animated bounceInUp" style="margin-top: 30px;">
                <?php 
                // if ( !empty( $_SESSION['succes_input_final_1'] ) ) {
                //     $a_1 = '<a href="./?p=tambah-calon-guru&step=berkas-lamaran&keycode='.base64_encode( $_SESSION['key-step-test-guru-1'] ).'">'; 
                //     $a_2 = '</a>';
                // }
                // else {
                //     $a_1 = ''; 
                //     $a_2 = '';
                // }

                // echo $a_1;
                ?>
                    <div class="card green summary-inline">
                        <div class="card-body">
                            <i class="fa fa-unlock fa-4x" aria-hidden="true"></i>
                            <!-- <i class="fa fa-lock fa-4x" aria-hidden="true"></i> -->
           <!--                  <div class="content">
                                <div class="title">Psikotes Calon Guru</div>
                            </div>
                            <div class="clear-both"></div>
                        </div>
                    </div>
                <?php //echo $a_2; ?>
            </div> -->

          <!--   <div class="col-lg-6 col-xs-12 animated bounceInDown" style="margin-top: 30px;">
                <?php 
                // if ( !empty( $_SESSION['succes_input_final_2'] ) ) {
                //     $a_3 = '<a href="./?p=tambah-calon-guru&step=berkas-lamaran&keycode='.base64_encode( $_SESSION['key-step-test-guru-2'] ).'">';
                //     $a_4 = '</a>';
                // }
                // else {
                //     $a_3 =  '';
                //     $a_4 =  ''; 
                // }

                // echo $a_3;
                ?>
                    <div class="card yellow summary-inline">
                        <div class="card-body">
                            <i class="fa fa-lock fa-4x" aria-hidden="true"></i>
                            <div class="content">
                                <div class="title">Psikotes Calon Karyawan</div>
                            </div>
                            <div class="clear-both"></div>
                        </div>
                    </div>
                <?php // echo $a_4; ?>
            </div> -->


            <!-- <div class="col-lg-12 animated bounceInDown" style="margin-top: 30px;">
                <?php 
                // if ( !empty( $_SESSION['succes_input_final_2'] ) ) {
                //     $a_3 = '<a href="./?p=tambah-calon-guru&step=berkas-lamaran&keycode='.base64_encode( $_SESSION['key-step-test-guru-2'] ).'">';
                //     $a_4 = '</a>';
                // }
                // else {
                //     $a_3 =  '';
                //     $a_4 =  ''; 
                // }

                // echo $a_3;
                ?>
                    <div class="card red summary-inline">
                        <div class="card-body">
                            <i class="fa fa-lock fa-4x" aria-hidden="true"></i>
                            <div class="content">
                                <div class="title">Psikotes Calon Karyawan</div>
                            </div>
                            <div class="clear-both"></div>
                        </div>
                    </div>
                <?php // echo $a_4; ?>
            </div> -->
        </div> <!-- end: .row -->

        
    </div>
</div>