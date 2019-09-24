<?php
include "includes/conn.php";
require_once "includes/functions.php";


if ( isset( $_POST['id_master_sub_jabatan'] ) ) :
	$id_master_jabatan = $_POST['id_master_sub_jabatan'];
	$sub_jabatan_sql = $sdm->query( "SELECT * FROM master_sub_jabatan JOIN master_jabatan ON master_sub_jabatan.id_master_jabatan = master_jabatan.id_master_jabatan WHERE master_jabatan.id_master_jabatan = '$id_master_jabatan'" );
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
		echo '';
	}
endif;

// EDIT
// if ( isset( $_POST['edit_id_master_sub_jabatan'] ) ) :
// 	$id_master_jabatan = $_POST['edit_id_master_sub_jabatan'];
// 	$sub_jabatan_sql = $sdm->query( "SELECT * FROM sub_jabatan JOIN master_jabatan ON sub_jabatan.id_master_jabatan = master_jabatan.id_master_jabatan WHERE master_jabatan.id_master_jabatan = '$id_master_jabatan'" );
// 	$check_data_child = $sub_jabatan_sql->num_rows;


// 	if ( $check_data_child > 0 ) {
// 		echo '<option>-- Select Sub master_jabatan --</option>';
// 		while( $child_loop_master_jabatan = $sub_jabatan_sql->fetch_assoc() ) {
// 			$child_id_master_jabatan = $child_loop_master_jabatan['id_master_sub_jabatan'];
// 			$sub_jabatan_item = $child_loop_master_jabatan['sub_master_jabatan_name'];
// 			echo '<option value="'. $child_id_master_jabatan .'">'. $sub_jabatan_item .'</option>';
// 		}
// 	} else {
// 		echo '<option>-- Sub master_jabatan is empty --</option>';
// 	}
// endif;