<?php
session_start();
$session_id = session_id();

// $mysqli = new mysqli( "localhost", "root", "", "db_indux" );
$psbo = new mysqli( "localhost", "root", "", "dbpsbo" );
$tk = new mysqli( "localhost", "root", "", "db_tk" );
$sd = new mysqli( "localhost", "root", "", "db_sd" );
$smp = new mysqli( "localhost", "root", "", "db_smp" );
$sdm = new mysqli( "localhost", "root", "", "db_sdm" );

// Check connection
if ( $psbo->connect_errno ) {
    die( "Connection failed: " . $psbo->connect_error );
}
if ( $tk->connect_errno ) {
    die( "Connection failed: " . $tk->connect_error );
}
if ( $sd->connect_errno ) {
    die( "Connection failed: " . $sd->connect_error );
}
if ( $smp->connect_errno ) {
    die( "Connection failed: " . $smp->connect_error );
}
if ( $sdm->connect_errno ) {
    die( "Connection failed: " . $sdm->connect_error );
}

// $mysqli->query( "UPDATE user SET user_online = '0' WHERE level = '1' OR level = '2' AND date_create < DATE_SUB( NOW(), INTERVAL 1 DAY )" );
