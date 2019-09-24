<?php
// session_start();
include "includes/conn.php";

// update status user offline
$id_user = $_SESSION['admin_id_recruitment'];
$get_data = $sdm->query( "UPDATE user SET user_online = '0' WHERE id_user = '$id_user'" );

// unset sessi menu
unset( $_SESSION['m_dashboard1'] );
unset( $_SESSION['m_dashboard2'] );
unset( $_SESSION['m_user'] );
unset( $_SESSION['m_master_pelamar'] );
unset( $_SESSION['m_pelamar'] );
unset( $_SESSION['m_tambah_pelamar'] );
unset( $_SESSION['m_detail_pelamar'] );
unset( $_SESSION['m_induk_karyawan'] );

// backend
unset( $_SESSION['admin_id_recruitment'] );

session_destroy();

header('location:login.php');
