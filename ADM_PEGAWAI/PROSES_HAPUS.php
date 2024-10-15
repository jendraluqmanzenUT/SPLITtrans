<?php
include "/../../db_config.php";
include "/../../session_browser.php";

$id	= $_POST['id'];

$sqlcek = $pdoMYSQL->prepare("SELECT * FROM users WHERE id=:id");
	$sqlcek->bindParam(':id', $id);
	$sqlcek->execute();
	$data = $sqlcek->fetch();

	$sql = $pdoMYSQL->prepare("DELETE FROM users WHERE id=:id");
	$sql->bindParam(':id', $id);
	if($sql->execute()) {
		$sql_od = $pdoODBC->prepare("DELETE FROM users WHERE id=:id");
		$sql_od->bindParam(':id', $id);
		if($sql_od->execute()) {
			ob_start();
			include "VIEW_SEARCH.php";
			$html = ob_get_contents();
			ob_end_clean();
			
			$response = array(
				'status'=>'sukses',
				'pesan'=>'User Berhasil Dihapus',
				'html'=>$html
			);
		} else {
			$response = array(
				'status'=>'gagal',
				'pesan'=>'User Gagal Dihapus [ SQL SERVER ]',
			);
		}
	} else {
		$response = array(
			'status'=>'gagal',
			'pesan'=>'User Gagal Dihapus [ MYSQL SERVER ]',
		);
	}
echo json_encode($response);
?>
