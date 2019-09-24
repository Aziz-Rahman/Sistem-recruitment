<?php
include "includes/conn.php";
require_once "includes/functions.php";

// jabatan
if ( isset( $_POST['id_master_unit'] ) ) :
	$id_master_unit = $_POST['id_master_unit'];
	$jabatan_sql = $sdm->query( "SELECT * FROM master_jabatan JOIN master_unit ON master_jabatan.id_master_unit = master_jabatan.id_master_unit WHERE master_jabatan.id_master_unit = '$id_master_unit' GROUP BY master_jabatan.jabatan" );
	$check_data_child = $jabatan_sql->num_rows;


	if ( $check_data_child > 0 ) {
		// echo '<div class="col-lg-2"><label>Jabatan</label></div>';
		// echo '<div class="col-lg-10">';
		// 	echo '<select name="id_master_jabatan" id="id_master_jabatan" class="form-control" tabindex="-1">';                                           
				echo '<option>-- Pilih jabatan --</option>';
				while( $child_loop_master_jabatan = $jabatan_sql->fetch_assoc() ) {
					$child_id_master_jabatan = $child_loop_master_jabatan['id_master_jabatan'];
					$jabatan_item = $child_loop_master_jabatan['jabatan'];
					echo '<option value="'. $child_id_master_jabatan .'">'. $jabatan_item .'</option>';
				}
		// 	echo '</select>';
		// echo '</div>';
	} else {
		echo '';
	}
endif;


// sub jabatan
if ( isset( $_POST['id_master_jabatan'] ) ) :
	$id_master_jabatan = $_POST['id_master_jabatan'];
	$sub_jabatan_sql = $sdm->query( "SELECT * FROM master_sub_jabatan JOIN master_jabatan ON master_sub_jabatan.id_master_jabatan = master_jabatan.id_master_jabatan WHERE master_sub_jabatan.id_master_jabatan = '$id_master_jabatan'" );
	$check_data_child = $sub_jabatan_sql->num_rows;


	if ( $check_data_child > 0 ) {
		echo '<div class="col-lg-2"><label>Sub Jabatan</label></div>';
		echo '<div class="col-lg-10">';
			echo '<select name="id_master_sub_jabatan" id="id_master_sub_jabatan" class="form-control" tabindex="-1">';                                           
				echo '<option>-- Pilih Sub jabatan --</option>';
				while( $child_loop_master_jabatan = $sub_jabatan_sql->fetch_assoc() ) {
					$child_id_master_jabatan = $child_loop_master_jabatan['id_master_sub_jabatan'];
					$sub_jabatan_item = $child_loop_master_jabatan['master_sub_jabatan'];
					echo '<option value="'. $child_id_master_jabatan .'">'. $sub_jabatan_item .'</option>';
				}
			echo '</select>';
		echo '</div>';
	} else {
		// echo '<option>-- Sub jabatan tidak tersesia --</option>';
		echo '';
	}
endif;




// if(isset($_POST["id_master_unit"]) && !empty($_POST["id_master_unit"])){
//    	$id_master_unit = $_POST['id_master_unit'];
// 	$jabatan_sql = $sdm->query( "SELECT * FROM master_jabatan JOIN master_unit ON master_jabatan.id_master_unit = master_jabatan.id_master_unit WHERE master_jabatan.id_master_unit = '$id_master_unit' GROUP BY master_jabatan.jabatan" );
// 	$check_data_child = $jabatan_sql->num_rows;
    
//     //Display states list
//     if($check_data_child > 0){
//         echo '<option value="">Select state</option>';
//         while( $child_loop_master_jabatan = $jabatan_sql->fetch_assoc() ) {
//             $child_id_master_jabatan = $child_loop_master_jabatan['id_master_jabatan'];
// 					$jabatan_item = $child_loop_master_jabatan['jabatan'];
// 					echo '<option value="'. $child_id_master_jabatan .'">'. $jabatan_item .'</option>';
//         }
//     }else{
//         echo '<option value="">State not available</option>';
//     }
// }

// if(isset($_POST["id_master_jabatan"]) && !empty($_POST["id_master_jabatan"])){
// 	$id_master_jabatan = $_POST['id_master_jabatan'];
// 	$sub_jabatan_sql = $sdm->query( "SELECT * FROM master_sub_jabatan JOIN master_jabatan ON master_sub_jabatan.id_master_jabatan = master_jabatan.id_master_jabatan WHERE master_sub_jabatan.id_master_jabatan = '$id_master_jabatan'" );
// 	$check_data_child = $sub_jabatan_sql->num_rows;

//     //Display cities list
//     if($check_data_child > 0){
//         echo '<option value="">Select city</option>';
//         while( $child_loop_master_jabatan = $sub_jabatan_sql->fetch_assoc() ) {
//             $wwwwwwwww = $child_loop_master_jabatan['id_master_sub_jabatan'];
// 					$sub_jabatan_item = $child_loop_master_jabatan['master_sub_jabatan'];
// 					echo '<option value="'. $wwwwwwwww .'">'. $sub_jabatan_item .'</option>';
//         }
//     }else{
//         echo '<option value="">City not available</option>';
//     }
// }
