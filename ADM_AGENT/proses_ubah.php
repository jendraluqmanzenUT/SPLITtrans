<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
include "/../../db_config.php";
include "/../../session_browser.php";
function dateinput($tgl)	{	
	$pecah=explode('/',$tgl);	
	return "$pecah[2]-$pecah[1]-$pecah[0]";
};
// Ambil data yang dikirim dari form
date_default_timezone_set('Asia/Jakarta');
$id 			= $_POST['id'];
$waktu_input_ad	= date("Y-m-d H:i:s");
$nama_agent		= $_POST['nama_agent'];
$nip_agent		= $_POST['nip_agent'];
$position		= $_POST['position'];
$tugas			= $_POST['tugas'];
$status			= $_POST['status'];
$user_rekam		= $nama;
		
		$sqlcek = $pdoMYSQL->prepare("SELECT * FROM td_agent_bravo WHERE id=:id");
		$sqlcek->bindParam(':id', $id);
		$sqlcek->execute(); // Eksekusi / Jalankan query
		$data = $sqlcek->fetch(); // Ambil data dari hasil eksekusi $sqlcek
		
		
		$sql = $pdoMYSQL->prepare("UPDATE td_agent_bravo SET 				
				nama_agent=:nama_agent,
				nip_agent=:nip_agent,
				position=:position,
				tugas=:tugas,
				status=:status,
				update_by=:update_by,
				rekam_agent=:rekam_agent
				WHERE id=:id");
		$sql->BindParam(':nama_agent',$nama_agent);
		$sql->BindParam(':nip_agent',$nip_agent);
		$sql->BindParam(':position',$position);
		$sql->BindParam(':tugas',$tugas);
		$sql->BindParam(':status',$status);
		$sql->BindParam(':update_by',$user_rekam);
		$sql->BindParam(':rekam_agent',$waktu_input_ad);
		$sql->bindParam(':id', $id);
	if ($sql->execute()) {		
		// Load ulang view.php agar data diubah tadi bisa terubah di tabel pada view.php
		ob_start();
		include "view.php";
		$html = ob_get_contents();
		ob_end_clean();
		
		$response = array(
			'status'=>'sukses', // Set status
			'pesan'=>'Data berhasil diubah', // Set pesan
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
