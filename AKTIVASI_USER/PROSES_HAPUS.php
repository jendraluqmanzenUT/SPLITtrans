<?php
// Include / load file koneksi.php
include "/../../db_config.php";
include "/../../session_browser.php";

$id	= $_POST['id'];

$sqlcek = $pdoMYSQL->prepare("SELECT * FROM users_register WHERE id=:id");
$sqlcek->bindParam(':id', $id);
$sqlcek->execute();
$data = $sqlcek->fetch();


$sql = $pdoMYSQL->prepare("DELETE FROM users_register WHERE id=:id");
$sql->bindParam(':id', $id);
$sql->execute();

		
	ob_start();
	include "VIEW_SEARCH.php";
	$html = ob_get_contents();
	ob_end_clean();
	
	$response = array(
		'status'=>'sukses', // Set status
		'pesan'=>'Data berhasil dihapus', // Set pesan
		'html'=>$html // Set html
	);
echo json_encode($response); // konversi variabel response menjadi JSON
?>
