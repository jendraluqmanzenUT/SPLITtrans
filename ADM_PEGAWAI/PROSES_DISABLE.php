<?php
include "/../../db_config.php";
include "/../../session_browser.php";

$id 				= $_POST['id'];
$status_data		= "1";

	$sqlcek = $pdoMYSQL->prepare("SELECT * FROM users WHERE id=:id");
	$sqlcek->bindParam(':id', $id);
	$sqlcek->execute();
	$data = $sqlcek->fetch();

	$sql = $pdoMYSQL->prepare("UPDATE users SET status=:status WHERE id=:id");
	$sql->bindParam(':status', $status_data);
	$sql->bindParam(':id', $id);
	if($sql->execute()) {
		$sql_od = $pdoODBC->prepare("UPDATE users SET status=:status WHERE id=:id");
		$sql_od->bindParam(':status', $status_data);
		$sql_od->bindParam(':id', $id);
		if($sql_od->execute()) {
			ob_start();
			include "VIEW_SEARCH.php";
			$html = ob_get_contents();
			ob_end_clean();
			
			$response = array(
				'status'=>'sukses',
				'pesan'=>'Disable User Berhasil',
				'html'=>$html
			);
		} else {
			$response = array(
				'status'=>'gagal',
				'pesan'=>'Disable User Gagal [ SQL SERVER ]',
			);
		}
	} else {
		$response = array(
			'status'=>'gagal',
			'pesan'=>'Disable User Gagal [ MYSQL SERVER ]',
		);
	}
echo json_encode($response);
?>
