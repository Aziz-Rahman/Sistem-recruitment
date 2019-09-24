<?php

$page = isset( $_GET['p'] ) ? $_GET['p'] : '';

if ( $page == "" || $page == "homepage" ) {
	include "homepage.php";
}
elseif ( $page == "tambah-calon-karyawan" ) {
	include "tambah-karyawan-calon.php";
}
elseif ( $page == "edit-calon-karyawan" ) {
	include "edit-karyawan-calon.php";
}
elseif ( $page == "tambah-calon-guru" ) {
	include "tambah-guru-calon.php";
}
elseif ( $page == "detail-calon-karyawan" ) {
	include "detail-karyawan-calon.php";
}
elseif ( $page == "detail-calon-guru" ) {
	include "detail-guru-calon.php";
}
else {
	include "404.php";
}
