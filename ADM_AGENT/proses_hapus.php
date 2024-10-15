<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

include "/../../db_config.php";
include "/../../session_browser.php";

$id = $_POST['id'];

$sqlcek = $pdoMYSQL->prepare("SELECT * FROM td_agent_bravo WHERE id=:id");
$sqlcek->bindParam(':id', $id);
$sqlcek->execute(); // Eksekusi / Jalankan query
$data = $sqlcek->fetch(); // Ambil data dari hasil eksekusi $sqlcek

		$sql = $pdoMYSQL->prepare("DELETE FROM td_agent_bravo WHERE id=:id");
		$sql->bindParam(':id', $id);
	if ($sql->execute()) {

		ob_start();
		include "view.php";
		$html = ob_get_contents();
		ob_end_clean();

		$response = array(
			'status'=>'sukses',
			'pesan'=>'Data berhasil dihapus', // Set pesan
			'html'=>$html // Set html
		);
	} else {
		$response = array(
			'status'=>'gagal', // Set status
			'pesan'=>'Data gagal disimpan', // Set pesan
			'html'=>$html // Set html
		);
	}
echo json_encode($response); // konversi variabel response menjadi JSON
}
?>
