<?php
$param = isset( $_GET['act'] ) ? $_GET['act'] : '';
if ( $_GET['p'] == 'master-jabatan' AND $param == 'unit-tk' ) {
  include './master-jabatan-tk.php'; 
}
elseif ( $_GET['p'] == 'master-jabatan' AND $param == 'unit-sd' ) {
  include './master-jabatan-sd.php'; 
}
elseif ( $_GET['p'] == 'master-jabatan' AND $param == 'unit-smp' ) {
  include './master-jabatan-smp.php'; 
}
elseif ( $_GET['p'] == 'master-jabatan' AND $param == 'unit-skr' ) {
  include './master-jabatan-skr.php'; 
}
// elseif ( $_GET['p'] == 'master-jabatan' AND $param == 'sub-jabatan' ) {
//   include './master-sub-jabatan.php'; 
// }
else {
  include './master-jabatan-tk.php'; 
}