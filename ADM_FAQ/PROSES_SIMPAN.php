<?php
include "/../../db_config.php";
include "/../../session_browser.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
function dateinput($tgl)	{
	$pecah=explode('/',$tgl);
	return "$pecah[2]-$pecah[1]-$pecah[0]";
};
date_default_timezone_set('Asia/Jakarta');
$waktu_input_ad		= date("Y-m-d H:i:s");
$tgl_nd			 	= dateinput($_POST['tgl_nd']);
$ndver	 			= $_POST['ndver'];
$bab	 			= $_POST['bab'];
$topik				= $_POST['topik'];
$subtopik	 		= $_POST['subtopik'];
$pertanyaan		 	= $_POST['pertanyaan'];
$jawaban		 	= $_POST['jawaban'];
$daskum				= $_POST['daskum'];
$user_edit			= $nama;
$ket				= "1";
$date_edit = date("Y-m-d H:i:s");
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

$sql	=$pdoODBC->prepare("insert INTO td_faq_bravo (
			kode_bab,
			bab_detail,
			kode_topik,
			topik_detail,
			kode_subtopik,
			subtopik_detail,
			pertanyaan_faq,
			jawaban_faq,
			daskum_faq,
			ket_faq,
			eksternal,
			daskum_verifikasi,
			user_input,
			tgl,
			date_edit)
		values (
			:kode_bab,
			:bab_detail,
			:kode_topik,
			:topik_detail,
			:kode_subtopik,
			:subtopik_detail,
			:pertanyaan_faq,
			:jawaban_faq,
			:daskum_faq,
			:ket_faq,
			:eksternal,
			:daskum_verifikasi,
			:user_input,
			:tgl,
			:date_edit)");
		$sql->BindParam(':kode_bab',$bab);
		$sql->BindParam(':bab_detail',$detail_FAQ1inp);
		$sql->BindParam(':kode_topik',$topik);
		$sql->BindParam(':topik_detail',$detail_FAQ2inp);
		$sql->BindParam(':kode_subtopik',$subtopik);
		$sql->BindParam(':subtopik_detail',$detail_FAQ3inp);
		$sql->BindParam(':pertanyaan_faq',$pertanyaan);
		$sql->BindParam(':jawaban_faq',$jawaban);
		$sql->BindParam(':daskum_faq',$daskum);
		$sql->BindParam(':ket_faq',$ket);
		$sql->BindParam(':eksternal',$ket);
		$sql->BindParam(':daskum_verifikasi',$ndver);
		$sql->BindParam(':user_input',$user_edit);
		$sql->BindParam(':tgl',$tgl_nd);
		$sql->BindParam(':date_edit',$date_edit);
if ($sql->execute()) {
	ob_start();
	include "VIEW_DATA.php";
	$html = ob_get_contents();
	ob_end_clean();

	// Buat variabel reponse yang nantinya akan diambil pada proses ajax ketika sukses
	$response = array(
		'status'=>'sukses',
		'pesan'=>'Data berhasil disimpan',
		'html'=>$html
	);
	} else {
		$response = array(
			'status'=>'gagal',
			'pesan'=>'Data gagal disimpan',
			'html'=>$html
		);
	}
echo json_encode($response);
}
?>
