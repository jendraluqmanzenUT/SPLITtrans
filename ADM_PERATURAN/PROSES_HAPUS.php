<?php
include "/../../db_config.php";
include "/../../session_browser.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$id	= $_POST['id'];
	$sql = $pdoODBC->prepare("DELETE FROM td_peraturan_bravo WHERE id_per=:id_per");
	$sql->bindParam(':id_per', $id);
	if ($sql->execute()) {
		$sql_tarik = $pdoODBC->prepare("SELECT * FROM td_peraturan_bravo_detail WHERE id_ubah=:id_ubah");
		$sql_tarik->bindParam(':id_ubah', $id);
		$sql_tarik->execute();
			while($data_tarik = $sql_tarik->fetch()){
				unlink("../../_UPLOAD_DATA/PERATURAN/".$data_tarik['file_per_ubah']);
			}
		$sql2 = $pdoODBC->prepare("DELETE FROM td_peraturan_bravo_detail WHERE id_ubah=:id_ubah");
		$sql2->bindParam(':id_ubah', $id);
		if ($sql2->execute()) {
			$sql_last_1 = $pdoODBC->prepare("SELECT max(id_per) AS last_id FROM td_peraturan_bravo");
			$sql_last_1->execute();
			$data_1 = $sql_last_1->fetch();
			$last_data_1 = $data_1["last_id"];
			if ($last_data_1=="") {
				$last_id_1 = "0";
			} else {
				$last_id_1 = $last_data_1;
			}
			$sql_reset_1 = $pdoODBC->prepare("DBCC CHECKIDENT (td_peraturan_bravo, RESEED, $last_id_1)");
			if ($sql_reset_1->execute()) {
				ob_start();
				include "view.php";
				$html = ob_get_contents();
				ob_end_clean();
			
				$response = array(
					'status'=>'sukses',
					'pesan'=>'Peraturan berhasil dihapus',
					'html'=>$html
				);
			} else {
				$response = array(
					'status'=>'gagal',
					'pesan'=>'Data ID Utama gagal direset',
					'html'=>$html
				);
			}
		} else {
			$response = array(
				'status'=>'gagal',
				'pesan'=>'Peraturan gagal dihapus',
				'html'=>$html
			);
		}
	} else {
		$response = array(
			'status'=>'gagal',
			'pesan'=>'Peraturan gagal dihapus',
			'html'=>$html
		);
	}
} else {
	$response = array(
		'status'=>'gagal',
		'pesan'=>'Unauthorized Access',
		'html'=>$html
	);
}
echo json_encode($response);	
?>
