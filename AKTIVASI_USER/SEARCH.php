<?php
// Include / load file koneksi.php
include "/../../db_config.php";
include "/../../session_browser.php";
date_default_timezone_set('Asia/Jakarta');
$waktu_input	= date("Y-m-d H:m:s");
$nama_cari		= $_POST['nama_cari'];
$nip_cari 		= $_POST['nip_cari'];
$email_cari		= $_POST['email_cari'];
$telp_cari	 	= $_POST['telp_cari'];
$strataII2		= $_POST['strataII2'];
$strataIII2		= $_POST['strataIII2'];
$strataIV2		= $_POST['strataIV2'];
$jabatan_cari	= $_POST['jabatan_cari'];
ob_start();
include "VIEW_SEARCH.php";
$html = ob_get_contents(); // Masukan isi dari view.php ke dalam variabel $html
ob_end_clean();

// Buat array dengan index hasil dan value nya $html
// Lalu konversi menjadi JSON
echo json_encode(array('hasil'=>$html));
?>
