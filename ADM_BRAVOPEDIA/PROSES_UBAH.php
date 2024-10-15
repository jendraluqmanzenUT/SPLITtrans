<?php
// Include / load file koneksi.php
include "/../../db_config.php";
include "/../../session_browser.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
function dateinput($tgl)	{	
	$pecah=explode('/',$tgl);	
	return "$pecah[2]-$pecah[1]-$pecah[0]";
};
// Ambil data yang dikirim dari form
$id 				= $_POST['id'];
date_default_timezone_set('Asia/Jakarta');
$waktu_input_ad		= date("Y-m-d H:i:s");
$tgl_nd			 	= dateinput($_POST['tgl_nd']);
$bab	 			= $_POST['bab'];
$topik				= $_POST['topik'];
$subtopik	 		= $_POST['subtopik'];
$pertanyaan		 	= $_POST['pertanyaan'];
$jawaban		 	= $_POST['jawaban'];
$daskum				= $_POST['daskum'];
$user_edit			= $nama;
$ket				= $_POST['stat_brav'];
$ndver				= $_POST['ndver'];
$ext				= "1";
	/*INSERT DETAIL BAB*/
	$sql_get_1 = $pdoODBC->prepare("SELECT kode_FAQ1,detail_FAQ1 FROM td_kode_faq WHERE kode_FAQ1=:kode_FAQ1");
	$sql_get_1->BindParam(':kode_FAQ1',$bab);
	$sql_get_1->execute();
	$row_get_1 = $sql_get_1->fetch();
	$detail_FAQ1inp	= $row_get_1['detail_FAQ1'];
	/*INSERT DETAIL TOPIK*/
	$sql_get_2 = $pdoODBC->prepare("SELECT kode_FAQ2,detail_FAQ2 FROM td_kode_faq WHERE kode_FAQ2=:kode_FAQ2");
	$sql_get_2->BindParam(':kode_FAQ2',$topik);
	$sql_get_2->execute();
	$row_get_2 = $sql_get_2->fetch();
	$detail_FAQ2inp	= $row_get_2['detail_FAQ2'];
	
	/*INSERT DETAIL SUBTOPIK*/
	$sql_get_3 = $pdoODBC->prepare("SELECT kode_FAQ3,detail_FAQ3 FROM td_kode_faq WHERE kode_FAQ3=:kode_FAQ3");
	$sql_get_3->BindParam(':kode_FAQ3',$subtopik);
	$sql_get_3->execute();
	$row_get_3 = $sql_get_3->fetch();
	$detail_FAQ3inp	= $row_get_3['detail_FAQ3'];
	
			
$sqlcek = $pdoODBC->prepare("SELECT * FROM td_bravopedia WHERE id=:id");
		$sqlcek->bindParam(':id', $id);
		$sqlcek->execute();
		$data = $sqlcek->fetch();

$sql = $pdoODBC->prepare("UPDATE td_bravopedia SET
				kode_bab=:kode_bab,
				bab_detail=:bab_detail,
				kode_topik=:kode_topik,
				topik_detail=:topik_detail,
				kode_subtopik=:kode_subtopik,
				subtopik_detail=:subtopik_detail,
				pertanyaan_bravopedia=:pertanyaan_bravopedia,
				jawaban_bravopedia=:jawaban_bravopedia,
				daskum_bravopedia=:daskum_bravopedia,
				dasver_bravopedia=:dasver_bravopedia,
				ket_bravopedia=:ket_bravopedia,
				user_input=:user_input,
				eksternal=:eksternal,
				tgl=:tgl,
				tglwaktu=:tglwaktu
				WHERE id=:id");
				
		$sql->BindParam(':kode_bab',$bab);
		$sql->BindParam(':bab_detail',$detail_FAQ1inp);
		$sql->BindParam(':kode_topik',$topik);
		$sql->BindParam(':topik_detail',$detail_FAQ2inp);
		$sql->BindParam(':kode_subtopik',$subtopik);
		$sql->BindParam(':subtopik_detail',$detail_FAQ3inp);
		$sql->BindParam(':pertanyaan_bravopedia',$pertanyaan);
		$sql->BindParam(':jawaban_bravopedia',$jawaban);
		$sql->BindParam(':daskum_bravopedia',$daskum);
		$sql->BindParam(':dasver_bravopedia',$ndver);
		$sql->BindParam(':ket_bravopedia',$ket);
		$sql->BindParam(':eksternal',$ext);
		$sql->BindParam(':user_input',$user_edit);
		$sql->BindParam(':tgl',$tgl_nd);
		$sql->BindParam(':tglwaktu',$waktu_input_ad);
		$sql->bindParam(':id', $id);
if ($sql->execute()) {
	ob_start();
	include "VIEW_DATA.php";
	$html = ob_get_contents();
	ob_end_clean();
	
	$response = array(
		'status'=>'sukses', // Set status
		'pesan'=>'Data berhasil disimpan', // Set pesan
		'html'=>$html // Set html
	);
} else {
	$response = array(
		'status'=>'gagal',
		'pesan'=>'Data gagal disimpan',
		'html'=>$html
	);
}
echo json_encode($response); // konversi variabel response menjadi JSON
}
?>
