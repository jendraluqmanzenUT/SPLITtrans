<?php
// Include / load file koneksi.php
include "/../../db_config.php";
include "/../../session_browser.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$id = $_POST['id'];

$sqlcek = $pdoODBC->prepare("SELECT * FROM td_faq_bravo WHERE id=:id");
$sqlcek->bindParam(':id', $id);
$sqlcek->execute();
$data = $sqlcek->fetch();


$sql = $pdoODBC->prepare("DELETE FROM td_faq_bravo WHERE id=:id");
$sql->bindParam(':id', $id);
if ($sql->execute()) { 

ob_start();
include "VIEW_DATA.php";
$html = ob_get_contents();
ob_end_clean();

$response = array(
	'html'=>$html,
	'status'=>'sukses',
	'pesan'=>'Data berhasil dihapus',
);
} else {
		$response = array(
			'status'=>'gagal',
			'pesan'=>'Data gagal dihapus',
			'html'=>$html
		);
	}
echo json_encode($response);
}
?>
