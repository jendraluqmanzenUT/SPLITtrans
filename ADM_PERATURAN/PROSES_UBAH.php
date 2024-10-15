<?php
include "../../db_config.php";
include "../../session_browser.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
function dateinput($tgl)	{	
	$pecah=explode('/',$tgl);	
	return "$pecah[2]-$pecah[1]-$pecah[0]";
};
date_default_timezone_set('Asia/Jakarta');
$waktu_input		= date("Y-m-d H:i:s");
$random				= date('ymd-Hms');
$id					= $_POST['id'];
$jenis_per 			= $_POST['jenis_per2'];
$bab_per 			= $_POST['bab_per2'];
$subbab 			= $_POST['subbab2'];
$posper 			= $_POST['posper2'];
$subpos 			= $_POST['subpos2'];
$kat_perubahan		= $_POST['kat_perubahan'];
$jenis_perubahan		= substr($_POST['jenis_perubahan'], 2,2);
$jenis_perubahan_detail = $_POST['jenis_perubahan'];
//$nomor_peraturan 	= $_POST['no_per_edit'];
$judul_peraturan 	= $_POST['judul_per_edit'];
$tanggal_terbit 	= dateinput($_POST['terbit_per_edit']);
$file_peraturan 	= $_FILES['file_per_edit']['name'];
$file_peraturan2	= $_FILES['file_per_edit']['name'];
$tmp 				= $_FILES['file_per_edit']['tmp_name'];
$tmp2 				= $_FILES['file_per_edit']['tmp_name'];
$user_upload		= $nama;

$status_peraturan_tambah	= '0';
$status_cabut_tambah		= '0';
$detail_peraturan_tambah	= 'Berlaku';
$user_upload_tambah			= $nama;

if ($kat_perubahan=="1" or $kat_perubahan=="3") {
	if ($jenis_perubahan=="A") 	{ $status_peraturan = 'A'; $status_cabut= '1'; $detail_peraturan = 'Telah Dicabut';}
elseif ($jenis_perubahan=="0") 	{ $status_peraturan = '0'; $status_cabut= '0'; $detail_peraturan = 'Berlaku';}
elseif ($jenis_perubahan=="1") 	{ $status_peraturan = '1'; $status_cabut= '0'; $detail_peraturan = 'Perubahan Pertama';}
elseif ($jenis_perubahan=="2") 	{ $status_peraturan = '2'; $status_cabut= '0'; $detail_peraturan = 'Perubahan Kedua';}
elseif ($jenis_perubahan=="3") 	{ $status_peraturan = '3'; $status_cabut= '0'; $detail_peraturan = 'Perubahan Ketiga';}
elseif ($jenis_perubahan=="4") 	{ $status_peraturan = '4'; $status_cabut= '0'; $detail_peraturan = 'Perubahan Keempat';}
elseif ($jenis_perubahan=="5") 	{ $status_peraturan = '5'; $status_cabut= '0'; $detail_peraturan = 'Perubahan Kelima';}
elseif ($jenis_perubahan=="6") 	{ $status_peraturan = '6'; $status_cabut= '0'; $detail_peraturan = 'Perubahan Keenam';}
elseif ($jenis_perubahan=="7") 	{ $status_peraturan = '7'; $status_cabut= '0'; $detail_peraturan = 'Perubahan Ketujuh';}
elseif ($jenis_perubahan=="8") 	{ $status_peraturan = '8'; $status_cabut= '0'; $detail_peraturan = 'Perubahan Kedelapan';}
elseif ($jenis_perubahan=="9") 	{ $status_peraturan = '9'; $status_cabut= '0'; $detail_peraturan = 'Perubahan Kesembilan';}
elseif ($jenis_perubahan=="10") { $status_peraturan = '10'; $status_cabut= '0'; $detail_peraturan = 'Perubahan Kesepuluh';}
elseif ($jenis_perubahan=="11") { $status_peraturan = '11'; $status_cabut= '0'; $detail_peraturan = 'Perubahan Kesebelas';}
elseif ($jenis_perubahan=="12") { $status_peraturan = '12'; $status_cabut= '0'; $detail_peraturan = 'Perubahan Keduabelas';}
elseif ($jenis_perubahan=="13") { $status_peraturan = '13'; $status_cabut= '0'; $detail_peraturan = 'Perubahan Ketigabelas';}
elseif ($jenis_perubahan=="14") { $status_peraturan = '14'; $status_cabut= '0'; $detail_peraturan = 'Perubahan Keempatbelas';}
elseif ($jenis_perubahan=="15") { $status_peraturan = '15'; $status_cabut= '0'; $detail_peraturan = 'Perubahan Kelimabelas';}
} else {
	if ($jenis_perubahan=="1") 	{ $status_peraturan = 'A'; $status_cabut= '1'; $detail_peraturan = 'Telah Dicabut';}
}
if ($jenis_per=="1") 		{ $nomor_peraturan 	= trim($_POST['no_per_edit']); }
elseif ($jenis_per=="2") 	{ $nomor_peraturan 	= trim($_POST['no_per_edit']); }
elseif ($jenis_per=="3") 	{ $nomor_peraturan 	= trim($_POST['no_per_edit']); }
elseif ($jenis_per=="4") 	{ $nomor_peraturan 	= trim($_POST['no_per_edit']); }
elseif ($jenis_per=="5") 	{ $nomor_peraturan 	= trim($_POST['no_per_edit']); }
elseif ($jenis_per=="6") 	{ $nomor_peraturan 	= trim($_POST['no_per_edit']); }
elseif ($jenis_per=="7") 	{ $nomor_peraturan 	= trim($_POST['no_per_edit']); }
elseif ($jenis_per=="8") 	{ $nomor_peraturan 	= str_replace(' ', '', trim($_POST['no_per_edit'])); }
elseif ($jenis_per=="9") 	{ $nomor_peraturan 	= str_replace(' ', '', trim($_POST['no_per_edit'])); }
elseif ($jenis_per=="10") 	{ $nomor_peraturan 	= str_replace(' ', '', trim($_POST['no_per_edit'])); }
elseif ($jenis_per=="11") 	{ $nomor_peraturan 	= str_replace(' ', '', trim($_POST['no_per_edit'])); }
elseif ($jenis_per=="12") 	{ $nomor_peraturan 	= trim($_POST['no_per_edit']); }
elseif ($jenis_per=="13") 	{ $nomor_peraturan 	= trim($_POST['no_per_edit']); }
elseif ($jenis_per=="14") 	{ $nomor_peraturan 	= str_replace(' ', '', trim($_POST['no_per_edit'])); }
elseif ($jenis_per=="15") 	{ $nomor_peraturan 	= trim($_POST['no_per_edit']); }
elseif ($jenis_per=="16") 	{ $nomor_peraturan 	= str_replace(' ', '', trim($_POST['no_per_edit'])); }
elseif ($jenis_per=="17") 	{ $nomor_peraturan 	= trim($_POST['no_per_edit']); }
elseif ($jenis_per=="18") 	{ $nomor_peraturan 	= trim($_POST['no_per_edit']); }
elseif ($jenis_per=="19") 	{ $nomor_peraturan 	= trim($_POST['no_per_edit']); }
elseif ($jenis_per=="20") 	{ $nomor_peraturan 	= trim($_POST['no_per_edit']); }
elseif ($jenis_per=="21") 	{ $nomor_peraturan 	= trim($_POST['no_per_edit']); }
elseif ($jenis_per=="22") 	{ $nomor_peraturan 	= trim($_POST['no_per_edit']); }
elseif ($jenis_per=="23") 	{ $nomor_peraturan 	= trim($_POST['no_per_edit']); }

	if ($jenis_per=="1") 	{ $detail_jenis_per = "Undang-undang"; }
elseif ($jenis_per=="2") 	{ $detail_jenis_per = "Peraturan Pemerintah"; }
elseif ($jenis_per=="3") 	{ $detail_jenis_per = "Peraturan Presiden"; }
elseif ($jenis_per=="4") 	{ $detail_jenis_per = "Keputusan Presiden"; }
elseif ($jenis_per=="5") 	{ $detail_jenis_per = "Instruksi Presiden"; }
elseif ($jenis_per=="6") 	{ $detail_jenis_per = "Keputusan Menteri Keuangan"; }
elseif ($jenis_per=="7") 	{ $detail_jenis_per = "Peraturan Menteri Keuangan"; }
elseif ($jenis_per=="8") 	{ $detail_jenis_per = "Surat Edaran Menteri Keuangan"; }
elseif ($jenis_per=="9") 	{ $detail_jenis_per = "Keputusan Dirjen Bea Cukai"; }
elseif ($jenis_per=="10")	{ $detail_jenis_per = "Peraturan Dirjen Bea Cukai"; }
elseif ($jenis_per=="11") 	{ $detail_jenis_per = "Surat Edaran Dirjen Bea Cukai"; }
elseif ($jenis_per=="12") 	{ $detail_jenis_per = "Peraturan Menteri Perdagangan"; }
elseif ($jenis_per=="13") 	{ $detail_jenis_per = "Peraturan Menteri Perindustrian"; }
elseif ($jenis_per=="14") 	{ $detail_jenis_per = "Surat DJBC"; }
elseif ($jenis_per=="15") 	{ $detail_jenis_per = "Peraturan Instansi Lain"; }
elseif ($jenis_per=="16") 	{ $detail_jenis_per = "Instruksi Direktur Jenderal"; }
elseif ($jenis_per=="17") 	{ $detail_jenis_per = "Lain-Lain"; }
elseif ($jenis_per=="18") 	{ $detail_jenis_per = "Peraturan BPOM"; }
elseif ($jenis_per=="19") 	{ $detail_jenis_per = "Peraturan Menteri Pertanian"; }
elseif ($jenis_per=="20") { $detail_jenis_per = "Presentasi Peraturan"; }
elseif ($jenis_per=="21") { $detail_jenis_per = "Petunjuk Operasional"; }
elseif ($jenis_per=="22") { $detail_jenis_per = "Nota Dinas DJBC"; }
elseif ($jenis_per=="23") { $detail_jenis_per = "Keputusan Menteri Perdagangan"; }
	
	$sql_id = $pdoODBC->prepare("
			SELECT 
				id_per,kode_per1,kode_per2,kode_per3,kode_per4,no_per_asal,judul_per_baru 
			FROM 
				td_peraturan_bravo 
			WHERE
				kode_per1=:kode_per1 and
				kode_per2=:kode_per2 and
				kode_per3=:kode_per3 and
				kode_per4=:kode_per4 and
				no_per_asal=:no_per_asal and
				judul_per_baru=:judul_per_baru
			");
		$sql_id->bindParam(':kode_per1', $bab_per);
		$sql_id->bindParam(':kode_per2', $subbab);
		$sql_id->bindParam(':kode_per3', $posper);
		$sql_id->bindParam(':kode_per4', $subpos);
		$sql_id->bindParam(':no_per_asal', $nomor_peraturan);
		$sql_id->bindParam(':judul_per_baru', $judul_peraturan);
		$sql_id->execute(); 
		$data_id = $sql_id->fetch();
/*INSERT DETAIL BAB PER*/
	$sqlbabper	 	= $pdoMYSQL->prepare("SELECT kode_per1,detail_per1 FROM td_kode_peraturan WHERE kode_per1=:kode_per1");
	$sqlbabper->bindParam(':kode_per1', $bab_per);
	$sqlbabper->execute();
	$rowa=$sqlbabper->fetch();
	$detail_Per1inp	= $rowa['detail_per1'];
	
/*INSERT DETAIL SUBBAB*/
	$sqlsubbab	 	= $pdoMYSQL->prepare("SELECT kode_per2,detail_per2 FROM td_kode_peraturan WHERE kode_per2=:kode_per2");
	$sqlsubbab->bindParam(':kode_per2', $subbab);
	$sqlsubbab->execute();
	$rowb=$sqlsubbab->fetch();
	$detail_Per2inp	= $rowb['detail_per2'];
/*INSERT DETAIL POS*/
	$sqlpos	 	= $pdoMYSQL->prepare("SELECT kode_per3,detail_per3 FROM td_kode_peraturan WHERE kode_per3=:kode_per3");
	$sqlpos->bindParam(':kode_per3', $posper);
	$sqlpos->execute();
	$rowc=$sqlpos->fetch();
	$detail_Per3inp	= $rowc['detail_per3'];
/*INSERT DETAIL SUBPOS*/
	$sqlsubpos	 	= $pdoMYSQL->prepare("SELECT kode_per4,detail_per4 FROM td_kode_peraturan WHERE kode_per4=:kode_per4");
	$sqlsubpos->bindParam(':kode_per4', $subpos);
	$sqlsubpos->execute();
	$rowd=$sqlsubpos->fetch();
	$detail_Per4inp	= $rowd['detail_per4'];
	
$fotobaru = $random."-".$subpos."-".$file_peraturan;
$path = "../../_UPLOAD_DATA/PERATURAN/".$fotobaru;
$fotobaru2 = $random."--".$subpos."-".$file_peraturan2;
$path2 = "../../_UPLOAD_DATA/PERATURAN/".$fotobaru2;

	
	if ($kat_perubahan=="1"){
		/*
PERUBAHAN PERATURAN
	NAMBAH DATA KE td_peraturan_bravo_detail
	EDIT DATA KE td_peraturan_bravo
*/
		$sqlcek = $pdoODBC->prepare("SELECT id_per FROM td_peraturan_bravo WHERE id_per=:id_per");
		$sqlcek->bindParam(':id_per', $id);
		$sqlcek->execute();
		$data = $sqlcek->fetch();
		if ($jenis_perubahan=="0"){
			$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET jenis_per=:jenis_per, detail_jenis_per=:detail_jenis_per, kode_per1=:kode_per1, detail_per1=:detail_per1, kode_per2=:kode_per2, detail_per2=:detail_per2, kode_per3=:kode_per3, detail_per3=:detail_per3, kode_per4=:kode_per4, detail_per4=:detail_per4, status_peraturan=:status_peraturan, detail_status=:detail_status, tgl_sorting=:tgl_sorting, no_per_baru=:no_per_baru, no_per_data_cabut=:no_per_data_cabut, judul_per_baru=:judul_per_baru, terbit_per_baru=:terbit_per_baru, file_per_baru=:file_per_baru, tgl_upl_per_baru=:tgl_upl_per_baru, user_per_baru=:user_per_baru WHERE id_per=:id_per");
			$sql->bindParam(':jenis_per', $jenis_per);$sql->bindParam(':detail_jenis_per', $detail_jenis_per);
			$sql->bindParam(':kode_per1', $bab_per);$sql->bindParam(':detail_per1', $detail_Per1inp);
			$sql->bindParam(':kode_per2', $subbab);$sql->bindParam(':detail_per2', $detail_Per2inp);
			$sql->bindParam(':kode_per3', $posper);$sql->bindParam(':detail_per3', $detail_Per3inp);
			$sql->bindParam(':kode_per4', $subpos);$sql->bindParam(':detail_per4', $detail_Per4inp);
			$sql->bindParam(':status_peraturan', $status_peraturan);$sql->bindParam(':detail_status', $detail_peraturan);
			$sql->bindParam(':tgl_sorting', $tanggal_terbit);$sql->bindParam(':no_per_baru', $nomor_peraturan);
			$sql->bindParam(':judul_per_baru', $judul_peraturan);$sql->bindParam(':terbit_per_baru', $tanggal_terbit);
			$sql->bindParam(':file_per_baru', $fotobaru);$sql->bindParam(':tgl_upl_per_baru', $waktu_input);
			$sql->bindParam(':user_per_baru', $user_upload);$sql->bindParam(':id_per', $id);
		} elseif ($jenis_perubahan=="1"){
			$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET jenis_per=:jenis_per, detail_jenis_per=:detail_jenis_per, kode_per1=:kode_per1, detail_per1=:detail_per1, kode_per2=:kode_per2, detail_per2=:detail_per2, kode_per3=:kode_per3, detail_per3=:detail_per3, kode_per4=:kode_per4, detail_per4=:detail_per4, status_peraturan=:status_peraturan, detail_status=:detail_status, tgl_sorting=:tgl_sorting, no_per_baru=:no_per_baru, judul_per_baru=:judul_per_baru, no_per_ubah_1=:no_per_ubah_1, terbit_per_baru=:terbit_per_baru, file_per_baru=:file_per_baru, tgl_upl_per_baru=:tgl_upl_per_baru, user_per_baru=:user_per_baru WHERE id_per=:id_per");
			$sql->bindParam(':jenis_per', $jenis_per);$sql->bindParam(':detail_jenis_per', $detail_jenis_per);
			$sql->bindParam(':kode_per1', $bab_per);$sql->bindParam(':detail_per1', $detail_Per1inp);
			$sql->bindParam(':kode_per2', $subbab);$sql->bindParam(':detail_per2', $detail_Per2inp);
			$sql->bindParam(':kode_per3', $posper);$sql->bindParam(':detail_per3', $detail_Per3inp);
			$sql->bindParam(':kode_per4', $subpos);$sql->bindParam(':detail_per4', $detail_Per4inp);
			$sql->bindParam(':status_peraturan', $status_peraturan);$sql->bindParam(':detail_status', $detail_peraturan);
			$sql->bindParam(':tgl_sorting', $tanggal_terbit);$sql->bindParam(':no_per_baru', $nomor_peraturan);
			$sql->bindParam(':judul_per_baru', $judul_peraturan);$sql->bindParam(':terbit_per_baru', $tanggal_terbit);
			$sql->bindParam(':file_per_baru', $fotobaru);$sql->bindParam(':tgl_upl_per_baru', $waktu_input);
			$sql->bindParam(':user_per_baru', $user_upload);
			$sql->bindParam(':no_per_ubah_1', $nomor_peraturan);
			$sql->bindParam(':id_per', $id);
		} elseif ($jenis_perubahan=="2"){
			$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET jenis_per=:jenis_per, detail_jenis_per=:detail_jenis_per, kode_per1=:kode_per1, detail_per1=:detail_per1, kode_per2=:kode_per2, detail_per2=:detail_per2, kode_per3=:kode_per3, detail_per3=:detail_per3, kode_per4=:kode_per4, detail_per4=:detail_per4, status_peraturan=:status_peraturan, detail_status=:detail_status, tgl_sorting=:tgl_sorting, no_per_baru=:no_per_baru, judul_per_baru=:judul_per_baru, no_per_ubah_2=:no_per_ubah_2, terbit_per_baru=:terbit_per_baru, file_per_baru=:file_per_baru, tgl_upl_per_baru=:tgl_upl_per_baru, user_per_baru=:user_per_baru WHERE id_per=:id_per");
			$sql->bindParam(':jenis_per', $jenis_per);$sql->bindParam(':detail_jenis_per', $detail_jenis_per);
			$sql->bindParam(':kode_per1', $bab_per);$sql->bindParam(':detail_per1', $detail_Per1inp);
			$sql->bindParam(':kode_per2', $subbab);$sql->bindParam(':detail_per2', $detail_Per2inp);
			$sql->bindParam(':kode_per3', $posper);$sql->bindParam(':detail_per3', $detail_Per3inp);
			$sql->bindParam(':kode_per4', $subpos);$sql->bindParam(':detail_per4', $detail_Per4inp);
			$sql->bindParam(':status_peraturan', $status_peraturan);$sql->bindParam(':detail_status', $detail_peraturan);
			$sql->bindParam(':tgl_sorting', $tanggal_terbit);$sql->bindParam(':no_per_baru', $nomor_peraturan);
			$sql->bindParam(':judul_per_baru', $judul_peraturan);$sql->bindParam(':terbit_per_baru', $tanggal_terbit);
			$sql->bindParam(':file_per_baru', $fotobaru);$sql->bindParam(':tgl_upl_per_baru', $waktu_input);
			$sql->bindParam(':user_per_baru', $user_upload);
			$sql->bindParam(':no_per_ubah_2', $nomor_peraturan);
			$sql->bindParam(':id_per', $id);
		} elseif ($jenis_perubahan=="3"){
			$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET jenis_per=:jenis_per, detail_jenis_per=:detail_jenis_per, kode_per1=:kode_per1, detail_per1=:detail_per1, kode_per2=:kode_per2, detail_per2=:detail_per2, kode_per3=:kode_per3, detail_per3=:detail_per3, kode_per4=:kode_per4, detail_per4=:detail_per4, status_peraturan=:status_peraturan, detail_status=:detail_status, tgl_sorting=:tgl_sorting, no_per_baru=:no_per_baru, judul_per_baru=:judul_per_baru, no_per_ubah_3=:no_per_ubah_3, terbit_per_baru=:terbit_per_baru, file_per_baru=:file_per_baru, tgl_upl_per_baru=:tgl_upl_per_baru, user_per_baru=:user_per_baru WHERE id_per=:id_per");
			$sql->bindParam(':jenis_per', $jenis_per);$sql->bindParam(':detail_jenis_per', $detail_jenis_per);
			$sql->bindParam(':kode_per1', $bab_per);$sql->bindParam(':detail_per1', $detail_Per1inp);
			$sql->bindParam(':kode_per2', $subbab);$sql->bindParam(':detail_per2', $detail_Per2inp);
			$sql->bindParam(':kode_per3', $posper);$sql->bindParam(':detail_per3', $detail_Per3inp);
			$sql->bindParam(':kode_per4', $subpos);$sql->bindParam(':detail_per4', $detail_Per4inp);
			$sql->bindParam(':status_peraturan', $status_peraturan);$sql->bindParam(':detail_status', $detail_peraturan);
			$sql->bindParam(':tgl_sorting', $tanggal_terbit);$sql->bindParam(':no_per_baru', $nomor_peraturan);
			$sql->bindParam(':judul_per_baru', $judul_peraturan);$sql->bindParam(':terbit_per_baru', $tanggal_terbit);
			$sql->bindParam(':file_per_baru', $fotobaru);$sql->bindParam(':tgl_upl_per_baru', $waktu_input);
			$sql->bindParam(':user_per_baru', $user_upload);
			$sql->bindParam(':no_per_ubah_3', $nomor_peraturan);
			$sql->bindParam(':id_per', $id);
		} elseif ($jenis_perubahan=="4"){
			$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET jenis_per=:jenis_per, detail_jenis_per=:detail_jenis_per, kode_per1=:kode_per1, detail_per1=:detail_per1, kode_per2=:kode_per2, detail_per2=:detail_per2, kode_per3=:kode_per3, detail_per3=:detail_per3, kode_per4=:kode_per4, detail_per4=:detail_per4, status_peraturan=:status_peraturan, detail_status=:detail_status, tgl_sorting=:tgl_sorting, no_per_baru=:no_per_baru, judul_per_baru=:judul_per_baru, no_per_ubah_4=:no_per_ubah_4, terbit_per_baru=:terbit_per_baru, file_per_baru=:file_per_baru, tgl_upl_per_baru=:tgl_upl_per_baru, user_per_baru=:user_per_baru WHERE id_per=:id_per");
			$sql->bindParam(':jenis_per', $jenis_per);$sql->bindParam(':detail_jenis_per', $detail_jenis_per);
			$sql->bindParam(':kode_per1', $bab_per);$sql->bindParam(':detail_per1', $detail_Per1inp);
			$sql->bindParam(':kode_per2', $subbab);$sql->bindParam(':detail_per2', $detail_Per2inp);
			$sql->bindParam(':kode_per3', $posper);$sql->bindParam(':detail_per3', $detail_Per3inp);
			$sql->bindParam(':kode_per4', $subpos);$sql->bindParam(':detail_per4', $detail_Per4inp);
			$sql->bindParam(':status_peraturan', $status_peraturan);$sql->bindParam(':detail_status', $detail_peraturan);
			$sql->bindParam(':tgl_sorting', $tanggal_terbit);$sql->bindParam(':no_per_baru', $nomor_peraturan);
			$sql->bindParam(':judul_per_baru', $judul_peraturan);$sql->bindParam(':terbit_per_baru', $tanggal_terbit);
			$sql->bindParam(':file_per_baru', $fotobaru);$sql->bindParam(':tgl_upl_per_baru', $waktu_input);
			$sql->bindParam(':user_per_baru', $user_upload);
			$sql->bindParam(":no_per_ubah_4", $nomor_peraturan);
			$sql->bindParam(':id_per', $id);
		} elseif ($jenis_perubahan=="5"){
			$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET jenis_per=:jenis_per, detail_jenis_per=:detail_jenis_per, kode_per1=:kode_per1, detail_per1=:detail_per1, kode_per2=:kode_per2, detail_per2=:detail_per2, kode_per3=:kode_per3, detail_per3=:detail_per3, kode_per4=:kode_per4, detail_per4=:detail_per4, status_peraturan=:status_peraturan, detail_status=:detail_status, tgl_sorting=:tgl_sorting, no_per_baru=:no_per_baru, judul_per_baru=:judul_per_baru, no_per_ubah_5=:no_per_ubah_5, terbit_per_baru=:terbit_per_baru, file_per_baru=:file_per_baru, tgl_upl_per_baru=:tgl_upl_per_baru, user_per_baru=:user_per_baru WHERE id_per=:id_per");
			$sql->bindParam(':jenis_per', $jenis_per);$sql->bindParam(':detail_jenis_per', $detail_jenis_per);
			$sql->bindParam(':kode_per1', $bab_per);$sql->bindParam(':detail_per1', $detail_Per1inp);
			$sql->bindParam(':kode_per2', $subbab);$sql->bindParam(':detail_per2', $detail_Per2inp);
			$sql->bindParam(':kode_per3', $posper);$sql->bindParam(':detail_per3', $detail_Per3inp);
			$sql->bindParam(':kode_per4', $subpos);$sql->bindParam(':detail_per4', $detail_Per4inp);
			$sql->bindParam(':status_peraturan', $status_peraturan);$sql->bindParam(':detail_status', $detail_peraturan);
			$sql->bindParam(':tgl_sorting', $tanggal_terbit);$sql->bindParam(':no_per_baru', $nomor_peraturan);
			$sql->bindParam(':judul_per_baru', $judul_peraturan);$sql->bindParam(':terbit_per_baru', $tanggal_terbit);
			$sql->bindParam(':file_per_baru', $fotobaru);$sql->bindParam(':tgl_upl_per_baru', $waktu_input);
			$sql->bindParam(':user_per_baru', $user_upload);
			$sql->bindParam(":no_per_ubah_5", $nomor_peraturan);
			$sql->bindParam(':id_per', $id);
		} elseif ($jenis_perubahan=="6"){
			$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET jenis_per=:jenis_per, detail_jenis_per=:detail_jenis_per, kode_per1=:kode_per1, detail_per1=:detail_per1, kode_per2=:kode_per2, detail_per2=:detail_per2, kode_per3=:kode_per3, detail_per3=:detail_per3, kode_per4=:kode_per4, detail_per4=:detail_per4, status_peraturan=:status_peraturan, detail_status=:detail_status, tgl_sorting=:tgl_sorting, no_per_baru=:no_per_baru, judul_per_baru=:judul_per_baru, no_per_ubah_6=:no_per_ubah_6, terbit_per_baru=:terbit_per_baru, file_per_baru=:file_per_baru, tgl_upl_per_baru=:tgl_upl_per_baru, user_per_baru=:user_per_baru WHERE id_per=:id_per");
			$sql->bindParam(':jenis_per', $jenis_per);$sql->bindParam(':detail_jenis_per', $detail_jenis_per);
			$sql->bindParam(':kode_per1', $bab_per);$sql->bindParam(':detail_per1', $detail_Per1inp);
			$sql->bindParam(':kode_per2', $subbab);$sql->bindParam(':detail_per2', $detail_Per2inp);
			$sql->bindParam(':kode_per3', $posper);$sql->bindParam(':detail_per3', $detail_Per3inp);
			$sql->bindParam(':kode_per4', $subpos);$sql->bindParam(':detail_per4', $detail_Per4inp);
			$sql->bindParam(':status_peraturan', $status_peraturan);$sql->bindParam(':detail_status', $detail_peraturan);
			$sql->bindParam(':tgl_sorting', $tanggal_terbit);$sql->bindParam(':no_per_baru', $nomor_peraturan);
			$sql->bindParam(':judul_per_baru', $judul_peraturan);$sql->bindParam(':terbit_per_baru', $tanggal_terbit);
			$sql->bindParam(':file_per_baru', $fotobaru);$sql->bindParam(':tgl_upl_per_baru', $waktu_input);
			$sql->bindParam(':user_per_baru', $user_upload);
			$sql->bindParam(":no_per_ubah_6", $nomor_peraturan);
			$sql->bindParam(':id_per', $id);
		} elseif ($jenis_perubahan=="7"){
			$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET jenis_per=:jenis_per, detail_jenis_per=:detail_jenis_per, kode_per1=:kode_per1, detail_per1=:detail_per1, kode_per2=:kode_per2, detail_per2=:detail_per2, kode_per3=:kode_per3, detail_per3=:detail_per3, kode_per4=:kode_per4, detail_per4=:detail_per4, status_peraturan=:status_peraturan, detail_status=:detail_status, tgl_sorting=:tgl_sorting, no_per_baru=:no_per_baru, judul_per_baru=:judul_per_baru, no_per_ubah_7=:no_per_ubah_7, terbit_per_baru=:terbit_per_baru, file_per_baru=:file_per_baru, tgl_upl_per_baru=:tgl_upl_per_baru, user_per_baru=:user_per_baru WHERE id_per=:id_per");
			$sql->bindParam(':jenis_per', $jenis_per);$sql->bindParam(':detail_jenis_per', $detail_jenis_per);
			$sql->bindParam(':kode_per1', $bab_per);$sql->bindParam(':detail_per1', $detail_Per1inp);
			$sql->bindParam(':kode_per2', $subbab);$sql->bindParam(':detail_per2', $detail_Per2inp);
			$sql->bindParam(':kode_per3', $posper);$sql->bindParam(':detail_per3', $detail_Per3inp);
			$sql->bindParam(':kode_per4', $subpos);$sql->bindParam(':detail_per4', $detail_Per4inp);
			$sql->bindParam(':status_peraturan', $status_peraturan);$sql->bindParam(':detail_status', $detail_peraturan);
			$sql->bindParam(':tgl_sorting', $tanggal_terbit);$sql->bindParam(':no_per_baru', $nomor_peraturan);
			$sql->bindParam(':judul_per_baru', $judul_peraturan);$sql->bindParam(':terbit_per_baru', $tanggal_terbit);
			$sql->bindParam(':file_per_baru', $fotobaru);$sql->bindParam(':tgl_upl_per_baru', $waktu_input);
			$sql->bindParam(':user_per_baru', $user_upload);
			$sql->bindParam(":no_per_ubah_7", $nomor_peraturan);
			$sql->bindParam(':id_per', $id);
		} elseif ($jenis_perubahan=="8"){
			$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET jenis_per=:jenis_per, detail_jenis_per=:detail_jenis_per, kode_per1=:kode_per1, detail_per1=:detail_per1, kode_per2=:kode_per2, detail_per2=:detail_per2, kode_per3=:kode_per3, detail_per3=:detail_per3, kode_per4=:kode_per4, detail_per4=:detail_per4, status_peraturan=:status_peraturan, detail_status=:detail_status, tgl_sorting=:tgl_sorting, no_per_baru=:no_per_baru, judul_per_baru=:judul_per_baru, no_per_ubah_8=:no_per_ubah_8, terbit_per_baru=:terbit_per_baru, file_per_baru=:file_per_baru, tgl_upl_per_baru=:tgl_upl_per_baru, user_per_baru=:user_per_baru WHERE id_per=:id_per");
			$sql->bindParam(':jenis_per', $jenis_per);$sql->bindParam(':detail_jenis_per', $detail_jenis_per);
			$sql->bindParam(':kode_per1', $bab_per);$sql->bindParam(':detail_per1', $detail_Per1inp);
			$sql->bindParam(':kode_per2', $subbab);$sql->bindParam(':detail_per2', $detail_Per2inp);
			$sql->bindParam(':kode_per3', $posper);$sql->bindParam(':detail_per3', $detail_Per3inp);
			$sql->bindParam(':kode_per4', $subpos);$sql->bindParam(':detail_per4', $detail_Per4inp);
			$sql->bindParam(':status_peraturan', $status_peraturan);$sql->bindParam(':detail_status', $detail_peraturan);
			$sql->bindParam(':tgl_sorting', $tanggal_terbit);$sql->bindParam(':no_per_baru', $nomor_peraturan);
			$sql->bindParam(':judul_per_baru', $judul_peraturan);$sql->bindParam(':terbit_per_baru', $tanggal_terbit);
			$sql->bindParam(':file_per_baru', $fotobaru);$sql->bindParam(':tgl_upl_per_baru', $waktu_input);
			$sql->bindParam(':user_per_baru', $user_upload);
			$sql->bindParam(":no_per_ubah_8", $nomor_peraturan);
			$sql->bindParam(':id_per', $id);
		} elseif ($jenis_perubahan=="9"){
			$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET jenis_per=:jenis_per, detail_jenis_per=:detail_jenis_per, kode_per1=:kode_per1, detail_per1=:detail_per1, kode_per2=:kode_per2, detail_per2=:detail_per2, kode_per3=:kode_per3, detail_per3=:detail_per3, kode_per4=:kode_per4, detail_per4=:detail_per4, status_peraturan=:status_peraturan, detail_status=:detail_status, tgl_sorting=:tgl_sorting, no_per_baru=:no_per_baru, judul_per_baru=:judul_per_baru, no_per_ubah_9=:no_per_ubah_9, terbit_per_baru=:terbit_per_baru, file_per_baru=:file_per_baru, tgl_upl_per_baru=:tgl_upl_per_baru, user_per_baru=:user_per_baru WHERE id_per=:id_per");
			$sql->bindParam(':jenis_per', $jenis_per);$sql->bindParam(':detail_jenis_per', $detail_jenis_per);
			$sql->bindParam(':kode_per1', $bab_per);$sql->bindParam(':detail_per1', $detail_Per1inp);
			$sql->bindParam(':kode_per2', $subbab);$sql->bindParam(':detail_per2', $detail_Per2inp);
			$sql->bindParam(':kode_per3', $posper);$sql->bindParam(':detail_per3', $detail_Per3inp);
			$sql->bindParam(':kode_per4', $subpos);$sql->bindParam(':detail_per4', $detail_Per4inp);
			$sql->bindParam(':status_peraturan', $status_peraturan);$sql->bindParam(':detail_status', $detail_peraturan);
			$sql->bindParam(':tgl_sorting', $tanggal_terbit);$sql->bindParam(':no_per_baru', $nomor_peraturan);
			$sql->bindParam(':judul_per_baru', $judul_peraturan);$sql->bindParam(':terbit_per_baru', $tanggal_terbit);
			$sql->bindParam(':file_per_baru', $fotobaru);$sql->bindParam(':tgl_upl_per_baru', $waktu_input);
			$sql->bindParam(':user_per_baru', $user_upload);
			$sql->bindParam(":no_per_ubah_9", $nomor_peraturan);
			$sql->bindParam(':id_per', $id);
		} elseif ($jenis_perubahan=="10"){
			$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET jenis_per=:jenis_per, detail_jenis_per=:detail_jenis_per, kode_per1=:kode_per1, detail_per1=:detail_per1, kode_per2=:kode_per2, detail_per2=:detail_per2, kode_per3=:kode_per3, detail_per3=:detail_per3, kode_per4=:kode_per4, detail_per4=:detail_per4, status_peraturan=:status_peraturan, detail_status=:detail_status, tgl_sorting=:tgl_sorting, no_per_baru=:no_per_baru, judul_per_baru=:judul_per_baru, no_per_ubah_10=:no_per_ubah_10, terbit_per_baru=:terbit_per_baru, file_per_baru=:file_per_baru, tgl_upl_per_baru=:tgl_upl_per_baru, user_per_baru=:user_per_baru WHERE id_per=:id_per");
			$sql->bindParam(':jenis_per', $jenis_per);$sql->bindParam(':detail_jenis_per', $detail_jenis_per);
			$sql->bindParam(':kode_per1', $bab_per);$sql->bindParam(':detail_per1', $detail_Per1inp);
			$sql->bindParam(':kode_per2', $subbab);$sql->bindParam(':detail_per2', $detail_Per2inp);
			$sql->bindParam(':kode_per3', $posper);$sql->bindParam(':detail_per3', $detail_Per3inp);
			$sql->bindParam(':kode_per4', $subpos);$sql->bindParam(':detail_per4', $detail_Per4inp);
			$sql->bindParam(':status_peraturan', $status_peraturan);$sql->bindParam(':detail_status', $detail_peraturan);
			$sql->bindParam(':tgl_sorting', $tanggal_terbit);$sql->bindParam(':no_per_baru', $nomor_peraturan);
			$sql->bindParam(':judul_per_baru', $judul_peraturan);$sql->bindParam(':terbit_per_baru', $tanggal_terbit);
			$sql->bindParam(':file_per_baru', $fotobaru);$sql->bindParam(':tgl_upl_per_baru', $waktu_input);
			$sql->bindParam(':user_per_baru', $user_upload);
			$sql->bindParam(":no_per_ubah_10", $nomor_peraturan);
			$sql->bindParam(':id_per', $id);
		} elseif ($jenis_perubahan=="11"){
			$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET jenis_per=:jenis_per, detail_jenis_per=:detail_jenis_per, kode_per1=:kode_per1, detail_per1=:detail_per1, kode_per2=:kode_per2, detail_per2=:detail_per2, kode_per3=:kode_per3, detail_per3=:detail_per3, kode_per4=:kode_per4, detail_per4=:detail_per4, status_peraturan=:status_peraturan, detail_status=:detail_status, tgl_sorting=:tgl_sorting, no_per_baru=:no_per_baru, judul_per_baru=:judul_per_baru, no_per_ubah_11=:no_per_ubah_11, terbit_per_baru=:terbit_per_baru, file_per_baru=:file_per_baru, tgl_upl_per_baru=:tgl_upl_per_baru, user_per_baru=:user_per_baru WHERE id_per=:id_per");
			$sql->bindParam(':jenis_per', $jenis_per);$sql->bindParam(':detail_jenis_per', $detail_jenis_per);
			$sql->bindParam(':kode_per1', $bab_per);$sql->bindParam(':detail_per1', $detail_Per1inp);
			$sql->bindParam(':kode_per2', $subbab);$sql->bindParam(':detail_per2', $detail_Per2inp);
			$sql->bindParam(':kode_per3', $posper);$sql->bindParam(':detail_per3', $detail_Per3inp);
			$sql->bindParam(':kode_per4', $subpos);$sql->bindParam(':detail_per4', $detail_Per4inp);
			$sql->bindParam(':status_peraturan', $status_peraturan);$sql->bindParam(':detail_status', $detail_peraturan);
			$sql->bindParam(':tgl_sorting', $tanggal_terbit);$sql->bindParam(':no_per_baru', $nomor_peraturan);
			$sql->bindParam(':judul_per_baru', $judul_peraturan);$sql->bindParam(':terbit_per_baru', $tanggal_terbit);
			$sql->bindParam(':file_per_baru', $fotobaru);$sql->bindParam(':tgl_upl_per_baru', $waktu_input);
			$sql->bindParam(':user_per_baru', $user_upload);
			$sql->bindParam(":no_per_ubah_11", $nomor_peraturan);
			$sql->bindParam(':id_per', $id);
		} elseif ($jenis_perubahan=="12"){
			$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET jenis_per=:jenis_per, detail_jenis_per=:detail_jenis_per, kode_per1=:kode_per1, detail_per1=:detail_per1, kode_per2=:kode_per2, detail_per2=:detail_per2, kode_per3=:kode_per3, detail_per3=:detail_per3, kode_per4=:kode_per4, detail_per4=:detail_per4, status_peraturan=:status_peraturan, detail_status=:detail_status, tgl_sorting=:tgl_sorting, no_per_baru=:no_per_baru, judul_per_baru=:judul_per_baru, no_per_ubah_12=:no_per_ubah_12, terbit_per_baru=:terbit_per_baru, file_per_baru=:file_per_baru, tgl_upl_per_baru=:tgl_upl_per_baru, user_per_baru=:user_per_baru WHERE id_per=:id_per");
			$sql->bindParam(':jenis_per', $jenis_per);$sql->bindParam(':detail_jenis_per', $detail_jenis_per);
			$sql->bindParam(':kode_per1', $bab_per);$sql->bindParam(':detail_per1', $detail_Per1inp);
			$sql->bindParam(':kode_per2', $subbab);$sql->bindParam(':detail_per2', $detail_Per2inp);
			$sql->bindParam(':kode_per3', $posper);$sql->bindParam(':detail_per3', $detail_Per3inp);
			$sql->bindParam(':kode_per4', $subpos);$sql->bindParam(':detail_per4', $detail_Per4inp);
			$sql->bindParam(':status_peraturan', $status_peraturan);$sql->bindParam(':detail_status', $detail_peraturan);
			$sql->bindParam(':tgl_sorting', $tanggal_terbit);$sql->bindParam(':no_per_baru', $nomor_peraturan);
			$sql->bindParam(':judul_per_baru', $judul_peraturan);$sql->bindParam(':terbit_per_baru', $tanggal_terbit);
			$sql->bindParam(':file_per_baru', $fotobaru);$sql->bindParam(':tgl_upl_per_baru', $waktu_input);
			$sql->bindParam(':user_per_baru', $user_upload);
			$sql->bindParam(":no_per_ubah_12", $nomor_peraturan);
			$sql->bindParam(':id_per', $id);
		} elseif ($jenis_perubahan=="13"){
			$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET jenis_per=:jenis_per, detail_jenis_per=:detail_jenis_per, kode_per1=:kode_per1, detail_per1=:detail_per1, kode_per2=:kode_per2, detail_per2=:detail_per2, kode_per3=:kode_per3, detail_per3=:detail_per3, kode_per4=:kode_per4, detail_per4=:detail_per4, status_peraturan=:status_peraturan, detail_status=:detail_status, tgl_sorting=:tgl_sorting, no_per_baru=:no_per_baru, judul_per_baru=:judul_per_baru, no_per_ubah_13=:no_per_ubah_13, terbit_per_baru=:terbit_per_baru, file_per_baru=:file_per_baru, tgl_upl_per_baru=:tgl_upl_per_baru, user_per_baru=:user_per_baru WHERE id_per=:id_per");
			$sql->bindParam(':jenis_per', $jenis_per);$sql->bindParam(':detail_jenis_per', $detail_jenis_per);
			$sql->bindParam(':kode_per1', $bab_per);$sql->bindParam(':detail_per1', $detail_Per1inp);
			$sql->bindParam(':kode_per2', $subbab);$sql->bindParam(':detail_per2', $detail_Per2inp);
			$sql->bindParam(':kode_per3', $posper);$sql->bindParam(':detail_per3', $detail_Per3inp);
			$sql->bindParam(':kode_per4', $subpos);$sql->bindParam(':detail_per4', $detail_Per4inp);
			$sql->bindParam(':status_peraturan', $status_peraturan);$sql->bindParam(':detail_status', $detail_peraturan);
			$sql->bindParam(':tgl_sorting', $tanggal_terbit);$sql->bindParam(':no_per_baru', $nomor_peraturan);
			$sql->bindParam(':judul_per_baru', $judul_peraturan);$sql->bindParam(':terbit_per_baru', $tanggal_terbit);
			$sql->bindParam(':file_per_baru', $fotobaru);$sql->bindParam(':tgl_upl_per_baru', $waktu_input);
			$sql->bindParam(':user_per_baru', $user_upload);
			$sql->bindParam(":no_per_ubah_13", $nomor_peraturan);
			$sql->bindParam(':id_per', $id);
		} elseif ($jenis_perubahan=="14"){
			$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET jenis_per=:jenis_per, detail_jenis_per=:detail_jenis_per, kode_per1=:kode_per1, detail_per1=:detail_per1, kode_per2=:kode_per2, detail_per2=:detail_per2, kode_per3=:kode_per3, detail_per3=:detail_per3, kode_per4=:kode_per4, detail_per4=:detail_per4, status_peraturan=:status_peraturan, detail_status=:detail_status, tgl_sorting=:tgl_sorting, no_per_baru=:no_per_baru, judul_per_baru=:judul_per_baru, no_per_ubah_14=:no_per_ubah_14, terbit_per_baru=:terbit_per_baru, file_per_baru=:file_per_baru, tgl_upl_per_baru=:tgl_upl_per_baru, user_per_baru=:user_per_baru WHERE id_per=:id_per");
			$sql->bindParam(':jenis_per', $jenis_per);$sql->bindParam(':detail_jenis_per', $detail_jenis_per);
			$sql->bindParam(':kode_per1', $bab_per);$sql->bindParam(':detail_per1', $detail_Per1inp);
			$sql->bindParam(':kode_per2', $subbab);$sql->bindParam(':detail_per2', $detail_Per2inp);
			$sql->bindParam(':kode_per3', $posper);$sql->bindParam(':detail_per3', $detail_Per3inp);
			$sql->bindParam(':kode_per4', $subpos);$sql->bindParam(':detail_per4', $detail_Per4inp);
			$sql->bindParam(':status_peraturan', $status_peraturan);$sql->bindParam(':detail_status', $detail_peraturan);
			$sql->bindParam(':tgl_sorting', $tanggal_terbit);$sql->bindParam(':no_per_baru', $nomor_peraturan);
			$sql->bindParam(':judul_per_baru', $judul_peraturan);$sql->bindParam(':terbit_per_baru', $tanggal_terbit);
			$sql->bindParam(':file_per_baru', $fotobaru);$sql->bindParam(':tgl_upl_per_baru', $waktu_input);
			$sql->bindParam(':user_per_baru', $user_upload);
			$sql->bindParam(":no_per_ubah_14", $nomor_peraturan);
			$sql->bindParam(':id_per', $id);
		} elseif ($jenis_perubahan=="15"){
			$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET jenis_per=:jenis_per, detail_jenis_per=:detail_jenis_per, kode_per1=:kode_per1, detail_per1=:detail_per1, kode_per2=:kode_per2, detail_per2=:detail_per2, kode_per3=:kode_per3, detail_per3=:detail_per3, kode_per4=:kode_per4, detail_per4=:detail_per4, status_peraturan=:status_peraturan, detail_status=:detail_status, tgl_sorting=:tgl_sorting, no_per_baru=:no_per_baru, judul_per_baru=:judul_per_baru, no_per_ubah_15=:no_per_ubah_15, terbit_per_baru=:terbit_per_baru, file_per_baru=:file_per_baru, tgl_upl_per_baru=:tgl_upl_per_baru, user_per_baru=:user_per_baru WHERE id_per=:id_per");
			$sql->bindParam(':jenis_per', $jenis_per);$sql->bindParam(':detail_jenis_per', $detail_jenis_per);
			$sql->bindParam(':kode_per1', $bab_per);$sql->bindParam(':detail_per1', $detail_Per1inp);
			$sql->bindParam(':kode_per2', $subbab);$sql->bindParam(':detail_per2', $detail_Per2inp);
			$sql->bindParam(':kode_per3', $posper);$sql->bindParam(':detail_per3', $detail_Per3inp);
			$sql->bindParam(':kode_per4', $subpos);$sql->bindParam(':detail_per4', $detail_Per4inp);
			$sql->bindParam(':status_peraturan', $status_peraturan);$sql->bindParam(':detail_status', $detail_peraturan);
			$sql->bindParam(':tgl_sorting', $tanggal_terbit);$sql->bindParam(':no_per_baru', $nomor_peraturan);
			$sql->bindParam(':judul_per_baru', $judul_peraturan);$sql->bindParam(':terbit_per_baru', $tanggal_terbit);
			$sql->bindParam(':file_per_baru', $fotobaru);$sql->bindParam(':tgl_upl_per_baru', $waktu_input);
			$sql->bindParam(':user_per_baru', $user_upload);
			$sql->bindParam(":no_per_ubah_15", $nomor_peraturan);
			$sql->bindParam(':id_per', $id);
		}
			$sql_1	=$pdoODBC->prepare("insert INTO td_peraturan_bravo_detail (
				id_ubah,
				status_peraturan_ubah,
				detail_status_ubah,
				status_cabut_ubah,
				no_per_ubah,
				judul_per_ubah,
				terbit_per_ubah,
				file_per_ubah,
				tgl_upl_per_ubah,
				user_per_ubah) 
			values (
				:id_ubah,
				:status_peraturan_ubah,
				:detail_status_ubah,
				:status_cabut_ubah,
				:no_per_ubah,
				:judul_per_ubah,
				:terbit_per_ubah,
				:file_per_ubah,
				:tgl_upl_per_ubah,
				:user_per_ubah)");
			$sql_1->BindParam(':id_ubah',$id);
			$sql_1->BindParam(':status_peraturan_ubah',$status_peraturan);
			$sql_1->BindParam(':detail_status_ubah',$detail_peraturan);
			$sql_1->BindParam(':status_cabut_ubah',$status_cabut);
			$sql_1->BindParam(':no_per_ubah',$nomor_peraturan);
			$sql_1->BindParam(':judul_per_ubah',$judul_peraturan);
			$sql_1->BindParam(':terbit_per_ubah',$tanggal_terbit);
			$sql_1->BindParam(':file_per_ubah',$fotobaru);
			$sql_1->BindParam(':tgl_upl_per_ubah',$waktu_input);
			$sql_1->BindParam(':user_per_ubah',$user_upload);
		if ($sql->execute() and $sql_1->execute() and move_uploaded_file($tmp, $path)) {
			ob_start();
			include "view.php";
			$html = ob_get_contents();
			ob_end_clean();
						
			$response = array(
				'status'=>'sukses',
				'pesan'=>'Peraturan Berhasil Disimpan',
				'html'=>$html
				);
		} else {
			$response = array(
				'status'=>'Gagal',
				'pesan'=>'Peraturan Gagal Disimpan',
				'html'=>$html
				);
		}

	} elseif ($kat_perubahan=="2") {
		/*
PENCABUTAN PERATURAN
	NAMBAH DATA KE td_peraturan_bravo_detail
	EDIT DATA KE td_peraturan_bravo
*/
$sql_cont = "SELECT COUNT(*) FROM (SELECT * FROM td_peraturan_bravo WHERE no_per_asal = '$nomor_peraturan' AND jenis_per = '$jenis_per') AS D"; 
		$result = $pdoODBC->prepare($sql_cont); 
		$result->execute(); 
		$number_of_rows = $result->fetchColumn(); 
		if ($number_of_rows=="0") {
			$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET
					jenis_per=:jenis_per,
					detail_jenis_per=:detail_jenis_per,
					kode_per1=:kode_per1,
					detail_per1=:detail_per1,
					kode_per2=:kode_per2,
					detail_per2=:detail_per2,
					kode_per3=:kode_per3,
					detail_per3=:detail_per3,
					kode_per4=:kode_per4,
					detail_per4=:detail_per4,
					detail_status=:detail_status,
					tgl_sorting=:tgl_sorting,
					status_cabut=:status_cabut,
					no_per_baru=:no_per_baru,
					no_per_data_cabut=:no_per_data_cabut,
					judul_per_baru=:judul_per_baru,
					terbit_per_baru=:terbit_per_baru,
					file_per_baru=:file_per_baru,
					tgl_upl_per_baru=:tgl_upl_per_baru,
					user_per_baru=:user_per_baru
					WHERE id_per=:id_per
					");
					//tgl_sorting=:tgl_sorting,
				$sql->bindParam(':jenis_per', $jenis_per);
				$sql->bindParam(':detail_jenis_per', $detail_jenis_per);
				$sql->bindParam(':kode_per1', $bab_per);
				$sql->bindParam(':detail_per1', $detail_Per1inp);
				$sql->bindParam(':kode_per2', $subbab);
				$sql->bindParam(':detail_per2', $detail_Per2inp);
				$sql->bindParam(':kode_per3', $posper);
				$sql->bindParam(':detail_per3', $detail_Per3inp);
				$sql->bindParam(':kode_per4', $subpos);
				$sql->bindParam(':detail_per4', $detail_Per4inp);
				$sql->bindParam(':detail_status', $detail_peraturan);
				$sql->bindParam(':status_cabut', $status_cabut);
				$sql->bindParam(':tgl_sorting', $tanggal_terbit);
				$sql->bindParam(':no_per_baru', $nomor_peraturan);
				$sql->bindParam(':judul_per_baru', $judul_peraturan);
				$sql->bindParam(':terbit_per_baru', $tanggal_terbit);
				$sql->bindParam(':file_per_baru', $fotobaru);
				$sql->bindParam(':tgl_upl_per_baru', $waktu_input);
				$sql->bindParam(':user_per_baru', $user_upload);
				$sql->bindParam(':no_per_data_cabut', $nomor_peraturan);
				$sql->bindParam(':id_per', $id);
				
				$sql_1	=$pdoODBC->prepare("insert INTO td_peraturan_bravo_detail (
						id_ubah,
						status_peraturan_ubah,
						detail_status_ubah,
						status_cabut_ubah,
						no_per_ubah,
						judul_per_ubah,
						terbit_per_ubah,
						file_per_ubah,
						tgl_upl_per_ubah,
						user_per_ubah) 
					values (
						:id_ubah,
						:status_peraturan_ubah,
						:detail_status_ubah,
						:status_cabut_ubah,
						:no_per_ubah,
						:judul_per_ubah,
						:terbit_per_ubah,
						:file_per_ubah,
						:tgl_upl_per_ubah,
						:user_per_ubah)");
					$sql_1->BindParam(':id_ubah',$id);
					$sql_1->BindParam(':status_peraturan_ubah',$status_peraturan);
					$sql_1->BindParam(':detail_status_ubah',$detail_peraturan);
					$sql_1->BindParam(':status_cabut_ubah',$status_cabut);
					$sql_1->BindParam(':no_per_ubah',$nomor_peraturan);
					$sql_1->BindParam(':judul_per_ubah',$judul_peraturan);
					$sql_1->BindParam(':terbit_per_ubah',$tanggal_terbit);
					$sql_1->BindParam(':file_per_ubah',$fotobaru);
					$sql_1->BindParam(':tgl_upl_per_ubah',$waktu_input);
					$sql_1->BindParam(':user_per_ubah',$user_upload);
					if($sql->execute() and $sql_1->execute()) {
						$status_peraturan_ 	= "0";
						$detail_peraturan_ 	= "Berlaku";
						$status_cabut_		= "0";
						$sql_2 =$pdoODBC->prepare("insert INTO td_peraturan_bravo (
							jenis_per, detail_jenis_per, kode_per1, detail_per1, kode_per2, detail_per2, kode_per3,
							detail_per3, kode_per4, detail_per4, status_peraturan, detail_status, status_cabut, tgl_sorting,
							no_per_asal, no_per_baru, judul_per_baru, terbit_per_baru, file_per_baru, tgl_upl_per_baru,user_per_baru) 
						values (
							:jenis_per,
							:detail_jenis_per,
							:kode_per1,
							:detail_per1,
							:kode_per2,
							:detail_per2,
							:kode_per3,
							:detail_per3,
							:kode_per4,
							:detail_per4,
							:status_peraturan,
							:detail_status,
							:status_cabut,
							:tgl_sorting,
							:no_per_asal,
							:no_per_baru,
							:judul_per_baru,
							:terbit_per_baru,
							:file_per_baru,
							:tgl_upl_per_baru,
							:user_per_baru)");			
						
						$sql_2->BindParam(':jenis_per',$jenis_per);
						$sql_2->BindParam(':detail_jenis_per',$detail_jenis_per);
						$sql_2->BindParam(':kode_per1',$bab_per);
						$sql_2->BindParam(':detail_per1',$detail_Per1inp);
						$sql_2->BindParam(':kode_per2',$subbab);
						$sql_2->BindParam(':detail_per2',$detail_Per2inp);
						$sql_2->BindParam(':kode_per3',$posper);
						$sql_2->BindParam(':detail_per3',$detail_Per3inp);
						$sql_2->BindParam(':kode_per4',$subpos);
						$sql_2->BindParam(':detail_per4',$detail_Per4inp);
						$sql_2->BindParam(':status_peraturan',$status_peraturan_);
						$sql_2->BindParam(':detail_status',$detail_peraturan_);
						$sql_2->BindParam(':status_cabut',$status_cabut_);
						$sql_2->BindParam(':tgl_sorting',$tanggal_terbit);
						$sql_2->BindParam(':no_per_asal',$nomor_peraturan);
						$sql_2->BindParam(':no_per_baru',$nomor_peraturan);
						$sql_2->BindParam(':judul_per_baru',$judul_peraturan);
						$sql_2->BindParam(':terbit_per_baru',$tanggal_terbit);
						$sql_2->BindParam(':file_per_baru',$fotobaru2);
						$sql_2->BindParam(':tgl_upl_per_baru',$waktu_input);
						$sql_2->BindParam(':user_per_baru',$user_upload);
						if($sql_2->execute()) {
							$sqlcek23 = $pdoODBC->prepare("
							SELECT id_per 
							FROM td_peraturan_bravo WHERE no_per_asal=:no_per_asal AND judul_per_baru=:judul_per_baru");
							$sqlcek23->BindParam(':no_per_asal',$nomor_peraturan);
							$sqlcek23->BindParam(':judul_per_baru',$judul_peraturan);
							$sqlcek23->execute();
							$dataids = $sqlcek23->fetch();
							$idss = $dataids['id_per'];
							if ($idss!='') {
								$sql_3	=$pdoODBC->prepare("insert INTO td_peraturan_bravo_detail (
									id_ubah,
									status_peraturan_ubah,
									detail_status_ubah,
									status_cabut_ubah,
									no_per_ubah,
									judul_per_ubah,
									terbit_per_ubah,
									file_per_ubah,
									tgl_upl_per_ubah,
									user_per_ubah) 
								values (
									:id_ubah,
									:status_peraturan_ubah,
									:detail_status_ubah,
									:status_cabut_ubah,
									:no_per_ubah,
									:judul_per_ubah,
									:terbit_per_ubah,
									:file_per_ubah,
									:tgl_upl_per_ubah,
									:user_per_ubah)");
									
								$sql_3->BindParam(':id_ubah',$idss);
								$sql_3->BindParam(':status_peraturan_ubah',$status_peraturan_);
								$sql_3->BindParam(':detail_status_ubah',$detail_peraturan_);
								$sql_3->BindParam(':status_cabut_ubah',$status_cabut_);
								$sql_3->BindParam(':no_per_ubah',$nomor_peraturan);
								$sql_3->BindParam(':judul_per_ubah',$judul_peraturan);
								$sql_3->BindParam(':terbit_per_ubah',$tanggal_terbit);
								$sql_3->BindParam(':file_per_ubah',$fotobaru2);
								$sql_3->BindParam(':tgl_upl_per_ubah',$waktu_input);
								$sql_3->BindParam(':user_per_ubah',$user_upload);
								if ($sql_3->execute() and move_uploaded_file($tmp, $path) and copy($path,$path2)) {
									ob_start();
									include "view.php";
									$html = ob_get_contents();
									ob_end_clean();
										
									$response = array(
										'status'=>'sukses',
										'pesan'=>'Peraturan Berhasil Dicabut dan Peraturan Baru Berhasil Ditambahkan',
										'html'=>$html
									);
								} else {
								$response = array(
									'status'=>'Gagal',
									'pesan'=>'Peraturan Berhasil Dicabut Tapi Gagal Menambah Peraturan Baru',
									'html'=>$html
									);
								}
							} else {
								$response = array(
									'status'=>'Gagal',
									'pesan'=>'Peraturan Berhasil Dicabut Tapi Gagal Mendapatkan ID',
									'html'=>$html
									);
							}
						} else {
							$response = array(
									'status'=>'Gagal',
									'pesan'=>'Peraturan Berhasil Dicabut Tapi Gagal Ditambah',
									'html'=>$html
									);						
						}
					} else {
						$response = array(
									'status'=>'Gagal',
									'pesan'=>'Peraturan Gagal Dicabut dan Ditambah',
									'html'=>$html
									);
					}
			
			} else {
				$sqlcek = $pdoODBC->prepare("SELECT id_per FROM td_peraturan_bravo WHERE id_per=:id_per");
				$sqlcek->bindParam(':id_per', $id);
				$sqlcek->execute();
				$data = $sqlcek->fetch();
				$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET
						jenis_per=:jenis_per,
						detail_jenis_per=:detail_jenis_per,
						kode_per1=:kode_per1,
						detail_per1=:detail_per1,
						kode_per2=:kode_per2,
						detail_per2=:detail_per2,
						kode_per3=:kode_per3,
						detail_per3=:detail_per3,
						kode_per4=:kode_per4,
						detail_per4=:detail_per4,
						detail_status=:detail_status,
						tgl_sorting=:tgl_sorting,
						status_cabut=:status_cabut,
						no_per_baru=:no_per_baru,
						no_per_data_cabut=:no_per_data_cabut,
						judul_per_baru=:judul_per_baru,
						terbit_per_baru=:terbit_per_baru,
						file_per_baru=:file_per_baru,
						tgl_upl_per_baru=:tgl_upl_per_baru,
						user_per_baru=:user_per_baru
						WHERE id_per=:id_per
						");
						//tgl_sorting=:tgl_sorting,
					$sql->bindParam(':jenis_per', $jenis_per);
					$sql->bindParam(':detail_jenis_per', $detail_jenis_per);
					$sql->bindParam(':kode_per1', $bab_per);
					$sql->bindParam(':detail_per1', $detail_Per1inp);
					$sql->bindParam(':kode_per2', $subbab);
					$sql->bindParam(':detail_per2', $detail_Per2inp);
					$sql->bindParam(':kode_per3', $posper);
					$sql->bindParam(':detail_per3', $detail_Per3inp);
					$sql->bindParam(':kode_per4', $subpos);
					$sql->bindParam(':detail_per4', $detail_Per4inp);
					$sql->bindParam(':detail_status', $detail_peraturan);
					$sql->bindParam(':status_cabut', $status_cabut);
					$sql->bindParam(':tgl_sorting', $tanggal_terbit);
					$sql->bindParam(':no_per_baru', $nomor_peraturan);
					$sql->bindParam(':judul_per_baru', $judul_peraturan);
					$sql->bindParam(':terbit_per_baru', $tanggal_terbit);
					$sql->bindParam(':file_per_baru', $fotobaru);
					$sql->bindParam(':tgl_upl_per_baru', $waktu_input);
					$sql->bindParam(':user_per_baru', $user_upload);
					$sql->bindParam(':no_per_data_cabut', $nomor_peraturan);
					$sql->bindParam(':id_per', $id);
					
					$sql_1	=$pdoODBC->prepare("insert INTO td_peraturan_bravo_detail (
							id_ubah,
							status_peraturan_ubah,
							detail_status_ubah,
							status_cabut_ubah,
							no_per_ubah,
							judul_per_ubah,
							terbit_per_ubah,
							file_per_ubah,
							tgl_upl_per_ubah,
							user_per_ubah) 
						values (
							:id_ubah,
							:status_peraturan_ubah,
							:detail_status_ubah,
							:status_cabut_ubah,
							:no_per_ubah,
							:judul_per_ubah,
							:terbit_per_ubah,
							:file_per_ubah,
							:tgl_upl_per_ubah,
							:user_per_ubah)");
						$sql_1->BindParam(':id_ubah',$id);
						$sql_1->BindParam(':status_peraturan_ubah',$status_peraturan);
						$sql_1->BindParam(':detail_status_ubah',$detail_peraturan);
						$sql_1->BindParam(':status_cabut_ubah',$status_cabut);
						$sql_1->BindParam(':no_per_ubah',$nomor_peraturan);
						$sql_1->BindParam(':judul_per_ubah',$judul_peraturan);
						$sql_1->BindParam(':terbit_per_ubah',$tanggal_terbit);
						$sql_1->BindParam(':file_per_ubah',$fotobaru);
						$sql_1->BindParam(':tgl_upl_per_ubah',$waktu_input);
						$sql_1->BindParam(':user_per_ubah',$user_upload);
					if ($sql->execute() and $sql_1->execute() and move_uploaded_file($tmp, $path)) {
						ob_start();
						include "view.php";
						$html = ob_get_contents();
						ob_end_clean();
							
						$response = array(
							'status'=>'sukses',
							'pesan'=>'Peraturan Berhasil Dicabut dan Peraturan Tersebut Telah Ada',
							'html'=>$html
						);
					} else {
						$response = array(
							'status'=>'Gagal',
							'pesan'=>'Peraturan Gagal Dicabut',
							'html'=>$html
							);
					}
				
			}
/*
PERUBAHAN FILE
	NAMBAH DATA KE td_peraturan_bravo_detail
	EDIT DATA KE td_peraturan_bravo
*/			
	} elseif ($kat_perubahan=="3") {
		$sqlcek = $pdoODBC->prepare("SELECT id_per, status_peraturan,status_cabut FROM td_peraturan_bravo WHERE id_per=:id_per");
		$sqlcek->bindParam(':id_per', $id);
		$sqlcek->execute();
		$data = $sqlcek->fetch();
		
		$sqlcek1 = $pdoODBC->prepare("SELECT id_ubah, status_peraturan_ubah, status_cabut_ubah, file_per_ubah 
			FROM td_peraturan_bravo_detail 
			WHERE id_ubah=:id_ubah AND status_peraturan_ubah=:status_peraturan_ubah");
		$sqlcek1->bindParam(':id_ubah', $id);
		$sqlcek1->bindParam(':status_peraturan_ubah', $status_peraturan);
		$sqlcek1->execute();
		$data1 = $sqlcek1->fetch();
		
		if	($jenis_perubahan==$data['status_peraturan']) {
			if($jenis_perubahan=="0") {
				if(is_file("../../_UPLOAD_DATA/PERATURAN/".$data1['file_per_ubah'])) 
				unlink("../../_UPLOAD_DATA/PERATURAN/".$data1['file_per_ubah']);
				$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET
					jenis_per=:jenis_per,
					detail_jenis_per=:detail_jenis_per,
					kode_per1=:kode_per1,
					detail_per1=:detail_per1,
					kode_per2=:kode_per2,
					detail_per2=:detail_per2,
					kode_per3=:kode_per3,
					detail_per3=:detail_per3,
					kode_per4=:kode_per4,
					detail_per4=:detail_per4,
					status_peraturan=:status_peraturan,
					detail_status=:detail_status,
					status_cabut=:status_cabut,
					tgl_sorting=:tgl_sorting,
					no_per_asal=:no_per_asal,
					no_per_baru=:no_per_baru,
					judul_per_baru=:judul_per_baru,
					terbit_per_baru=:terbit_per_baru,
					file_per_baru=:file_per_baru,
					tgl_upl_per_baru=:tgl_upl_per_baru,
					user_per_baru=:user_per_baru
					WHERE id_per=:id_per
					");
				$sql->bindParam(':jenis_per', $jenis_per);
				$sql->bindParam(':detail_jenis_per', $detail_jenis_per);
				$sql->bindParam(':kode_per1', $bab_per);
				$sql->bindParam(':detail_per1', $detail_Per1inp);
				$sql->bindParam(':kode_per2', $subbab);
				$sql->bindParam(':detail_per2', $detail_Per2inp);
				$sql->bindParam(':kode_per3', $posper);
				$sql->bindParam(':detail_per3', $detail_Per3inp);
				$sql->bindParam(':kode_per4', $subpos);
				$sql->bindParam(':detail_per4', $detail_Per4inp);
				$sql->bindParam(':status_peraturan', $status_peraturan);
				$sql->bindParam(':detail_status', $detail_peraturan);
				$sql->bindParam(':status_cabut', $status_cabut);
				$sql->bindParam(':tgl_sorting', $tanggal_terbit);
				$sql->bindParam(':no_per_asal', $nomor_peraturan);
				$sql->bindParam(':no_per_baru', $nomor_peraturan);
				$sql->bindParam(':judul_per_baru', $judul_peraturan);
				$sql->bindParam(':terbit_per_baru', $tanggal_terbit);
				$sql->bindParam(':file_per_baru', $fotobaru);
				$sql->bindParam(':tgl_upl_per_baru', $waktu_input);
				$sql->bindParam(':user_per_baru', $user_upload);
				$sql->bindParam(':id_per', $id);	
				
				$sql_1 = $pdoODBC->prepare("UPDATE td_peraturan_bravo_detail SET
						status_peraturan_ubah=:status_peraturan_ubah,
						detail_status_ubah=:detail_status_ubah,
						status_cabut_ubah=:status_cabut_ubah,
						no_per_ubah=:no_per_ubah,
						judul_per_ubah=:judul_per_ubah,
						terbit_per_ubah=:terbit_per_ubah,
						file_per_ubah=:file_per_ubah,
						tgl_upl_per_ubah=:tgl_upl_per_ubah,
						user_per_ubah=:user_per_ubah
						WHERE id_ubah=:id_ubah AND status_peraturan_ubah=:status_peraturan_ubah2");
				$sql_1->BindParam(':status_peraturan_ubah',$status_peraturan);
				$sql_1->BindParam(':detail_status_ubah',$detail_peraturan);
				$sql_1->BindParam(':status_cabut_ubah',$status_cabut);
				$sql_1->BindParam(':no_per_ubah',$nomor_peraturan);
				$sql_1->BindParam(':judul_per_ubah',$judul_peraturan);
				$sql_1->BindParam(':terbit_per_ubah',$tanggal_terbit);
				$sql_1->BindParam(':file_per_ubah',$fotobaru);
				$sql_1->BindParam(':tgl_upl_per_ubah',$waktu_input);
				$sql_1->BindParam(':user_per_ubah',$user_upload);
				$sql_1->bindParam(':id_ubah', $id);
				$sql_1->BindParam(':status_peraturan_ubah2',$status_peraturan);
			if ($sql->execute() and $sql_1->execute() and move_uploaded_file($tmp, $path)) {
				ob_start();
				include "view.php";
				$html = ob_get_contents();
				ob_end_clean();
						
				$response = array(
					'status'=>'sukses',
					'pesan'=>'Peraturan Berhasil Dirubah',
					'html'=>$html
					);
				} else {
					$response = array(
					'status'=>'Gagal',
					'pesan'=>'Peraturan Gagal Dirubah',
					'html'=>$html
					);
				}
			} else {
				if(is_file("../../_UPLOAD_DATA/PERATURAN/".$data1['file_per_ubah'])) 
				unlink("../../_UPLOAD_DATA/PERATURAN/".$data1['file_per_ubah']);
				if ($jenis_perubahan=="1"){
					$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET
						jenis_per=:jenis_per, detail_jenis_per=:detail_jenis_per, kode_per1=:kode_per1, detail_per1=:detail_per1, kode_per2=:kode_per2, detail_per2=:detail_per2, kode_per3=:kode_per3, detail_per3=:detail_per3, kode_per4=:kode_per4, detail_per4=:detail_per4, status_peraturan=:status_peraturan, detail_status=:detail_status, status_cabut=:status_cabut, tgl_sorting=:tgl_sorting, no_per_baru=:no_per_baru, no_per_ubah_1=:no_per_ubah_1, judul_per_baru=:judul_per_baru, terbit_per_baru=:terbit_per_baru, file_per_baru=:file_per_baru, tgl_upl_per_baru=:tgl_upl_per_baru, user_per_baru=:user_per_baru WHERE id_per=:id_per");
					$sql->bindParam(':jenis_per', $jenis_per); $sql->bindParam(':detail_jenis_per', $detail_jenis_per);
					$sql->bindParam(':kode_per1', $bab_per); $sql->bindParam(':detail_per1', $detail_Per1inp);
					$sql->bindParam(':kode_per2', $subbab); $sql->bindParam(':detail_per2', $detail_Per2inp);
					$sql->bindParam(':kode_per3', $posper); $sql->bindParam(':detail_per3', $detail_Per3inp);
					$sql->bindParam(':kode_per4', $subpos); $sql->bindParam(':detail_per4', $detail_Per4inp);
					$sql->bindParam(':status_peraturan', $status_peraturan); $sql->bindParam(':detail_status', $detail_peraturan);
					$sql->bindParam(':status_cabut', $status_cabut); $sql->bindParam(':tgl_sorting', $tanggal_terbit);
					$sql->bindParam(':no_per_baru', $nomor_peraturan); $sql->bindParam(':judul_per_baru', $judul_peraturan);
					$sql->bindParam(':terbit_per_baru', $tanggal_terbit); $sql->bindParam(':file_per_baru', $fotobaru);
					$sql->bindParam(':tgl_upl_per_baru', $waktu_input); $sql->bindParam(':user_per_baru', $user_upload);
					$sql->bindParam(':no_per_ubah_1', $nomor_peraturan);
					$sql->bindParam(':id_per', $id);	
				} elseif ($jenis_perubahan=="2"){
					$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET
						jenis_per=:jenis_per, detail_jenis_per=:detail_jenis_per, kode_per1=:kode_per1, detail_per1=:detail_per1, kode_per2=:kode_per2, detail_per2=:detail_per2, kode_per3=:kode_per3, detail_per3=:detail_per3, kode_per4=:kode_per4, detail_per4=:detail_per4, status_peraturan=:status_peraturan, detail_status=:detail_status, status_cabut=:status_cabut, tgl_sorting=:tgl_sorting, no_per_baru=:no_per_baru, judul_per_baru=:judul_per_baru, no_per_ubah_2=:no_per_ubah_2, terbit_per_baru=:terbit_per_baru, file_per_baru=:file_per_baru, tgl_upl_per_baru=:tgl_upl_per_baru, user_per_baru=:user_per_baru WHERE id_per=:id_per");
					$sql->bindParam(':jenis_per', $jenis_per); $sql->bindParam(':detail_jenis_per', $detail_jenis_per);
					$sql->bindParam(':kode_per1', $bab_per); $sql->bindParam(':detail_per1', $detail_Per1inp);
					$sql->bindParam(':kode_per2', $subbab); $sql->bindParam(':detail_per2', $detail_Per2inp);
					$sql->bindParam(':kode_per3', $posper); $sql->bindParam(':detail_per3', $detail_Per3inp);
					$sql->bindParam(':kode_per4', $subpos); $sql->bindParam(':detail_per4', $detail_Per4inp);
					$sql->bindParam(':status_peraturan', $status_peraturan); $sql->bindParam(':detail_status', $detail_peraturan);
					$sql->bindParam(':status_cabut', $status_cabut); $sql->bindParam(':tgl_sorting', $tanggal_terbit);
					$sql->bindParam(':no_per_baru', $nomor_peraturan); $sql->bindParam(':judul_per_baru', $judul_peraturan);
					$sql->bindParam(':terbit_per_baru', $tanggal_terbit); $sql->bindParam(':file_per_baru', $fotobaru);
					$sql->bindParam(':tgl_upl_per_baru', $waktu_input); $sql->bindParam(':user_per_baru', $user_upload);
					$sql->bindParam(':no_per_ubah_2', $nomor_peraturan);
					$sql->bindParam(':id_per', $id);	
				} elseif ($jenis_perubahan=="3"){
					$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET
						jenis_per=:jenis_per, detail_jenis_per=:detail_jenis_per, kode_per1=:kode_per1, detail_per1=:detail_per1, kode_per2=:kode_per2, detail_per2=:detail_per2, kode_per3=:kode_per3, detail_per3=:detail_per3, kode_per4=:kode_per4, detail_per4=:detail_per4, status_peraturan=:status_peraturan, detail_status=:detail_status, status_cabut=:status_cabut, tgl_sorting=:tgl_sorting, no_per_baru=:no_per_baru, judul_per_baru=:judul_per_baru, no_per_ubah_3=:no_per_ubah_3, terbit_per_baru=:terbit_per_baru, file_per_baru=:file_per_baru, tgl_upl_per_baru=:tgl_upl_per_baru, user_per_baru=:user_per_baru WHERE id_per=:id_per");
					$sql->bindParam(':jenis_per', $jenis_per); $sql->bindParam(':detail_jenis_per', $detail_jenis_per);
					$sql->bindParam(':kode_per1', $bab_per); $sql->bindParam(':detail_per1', $detail_Per1inp);
					$sql->bindParam(':kode_per2', $subbab); $sql->bindParam(':detail_per2', $detail_Per2inp);
					$sql->bindParam(':kode_per3', $posper); $sql->bindParam(':detail_per3', $detail_Per3inp);
					$sql->bindParam(':kode_per4', $subpos); $sql->bindParam(':detail_per4', $detail_Per4inp);
					$sql->bindParam(':status_peraturan', $status_peraturan); $sql->bindParam(':detail_status', $detail_peraturan);
					$sql->bindParam(':status_cabut', $status_cabut); $sql->bindParam(':tgl_sorting', $tanggal_terbit);
					$sql->bindParam(':no_per_baru', $nomor_peraturan); $sql->bindParam(':judul_per_baru', $judul_peraturan);
					$sql->bindParam(':terbit_per_baru', $tanggal_terbit); $sql->bindParam(':file_per_baru', $fotobaru);
					$sql->bindParam(':tgl_upl_per_baru', $waktu_input); $sql->bindParam(':user_per_baru', $user_upload);
					$sql->bindParam(':no_per_ubah_3', $nomor_peraturan);
					$sql->bindParam(':id_per', $id);	
				} elseif ($jenis_perubahan=="4"){
					$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET
						jenis_per=:jenis_per, detail_jenis_per=:detail_jenis_per, kode_per1=:kode_per1, detail_per1=:detail_per1, kode_per2=:kode_per2, detail_per2=:detail_per2, kode_per3=:kode_per3, detail_per3=:detail_per3, kode_per4=:kode_per4, detail_per4=:detail_per4, status_peraturan=:status_peraturan, detail_status=:detail_status, status_cabut=:status_cabut, tgl_sorting=:tgl_sorting, no_per_baru=:no_per_baru, judul_per_baru=:judul_per_baru, no_per_ubah_4=:no_per_ubah_4, terbit_per_baru=:terbit_per_baru, file_per_baru=:file_per_baru, tgl_upl_per_baru=:tgl_upl_per_baru, user_per_baru=:user_per_baru WHERE id_per=:id_per");
					$sql->bindParam(':jenis_per', $jenis_per); $sql->bindParam(':detail_jenis_per', $detail_jenis_per);
					$sql->bindParam(':kode_per1', $bab_per); $sql->bindParam(':detail_per1', $detail_Per1inp);
					$sql->bindParam(':kode_per2', $subbab); $sql->bindParam(':detail_per2', $detail_Per2inp);
					$sql->bindParam(':kode_per3', $posper); $sql->bindParam(':detail_per3', $detail_Per3inp);
					$sql->bindParam(':kode_per4', $subpos); $sql->bindParam(':detail_per4', $detail_Per4inp);
					$sql->bindParam(':status_peraturan', $status_peraturan); $sql->bindParam(':detail_status', $detail_peraturan);
					$sql->bindParam(':status_cabut', $status_cabut); $sql->bindParam(':tgl_sorting', $tanggal_terbit);
					$sql->bindParam(':no_per_baru', $nomor_peraturan); $sql->bindParam(':judul_per_baru', $judul_peraturan);
					$sql->bindParam(':terbit_per_baru', $tanggal_terbit); $sql->bindParam(':file_per_baru', $fotobaru);
					$sql->bindParam(':tgl_upl_per_baru', $waktu_input); $sql->bindParam(':user_per_baru', $user_upload);
					$sql->bindParam(':no_per_ubah_4', $nomor_peraturan);
					$sql->bindParam(':id_per', $id);	
				} elseif ($jenis_perubahan=="5"){
					$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET
						jenis_per=:jenis_per, detail_jenis_per=:detail_jenis_per, kode_per1=:kode_per1, detail_per1=:detail_per1, kode_per2=:kode_per2, detail_per2=:detail_per2, kode_per3=:kode_per3, detail_per3=:detail_per3, kode_per4=:kode_per4, detail_per4=:detail_per4, status_peraturan=:status_peraturan, detail_status=:detail_status, status_cabut=:status_cabut, tgl_sorting=:tgl_sorting, no_per_baru=:no_per_baru, judul_per_baru=:judul_per_baru, no_per_ubah_5=:no_per_ubah_5, terbit_per_baru=:terbit_per_baru, file_per_baru=:file_per_baru, tgl_upl_per_baru=:tgl_upl_per_baru, user_per_baru=:user_per_baru WHERE id_per=:id_per");
					$sql->bindParam(':jenis_per', $jenis_per); $sql->bindParam(':detail_jenis_per', $detail_jenis_per);
					$sql->bindParam(':kode_per1', $bab_per); $sql->bindParam(':detail_per1', $detail_Per1inp);
					$sql->bindParam(':kode_per2', $subbab); $sql->bindParam(':detail_per2', $detail_Per2inp);
					$sql->bindParam(':kode_per3', $posper); $sql->bindParam(':detail_per3', $detail_Per3inp);
					$sql->bindParam(':kode_per4', $subpos); $sql->bindParam(':detail_per4', $detail_Per4inp);
					$sql->bindParam(':status_peraturan', $status_peraturan); $sql->bindParam(':detail_status', $detail_peraturan);
					$sql->bindParam(':status_cabut', $status_cabut); $sql->bindParam(':tgl_sorting', $tanggal_terbit);
					$sql->bindParam(':no_per_baru', $nomor_peraturan); $sql->bindParam(':judul_per_baru', $judul_peraturan);
					$sql->bindParam(':terbit_per_baru', $tanggal_terbit); $sql->bindParam(':file_per_baru', $fotobaru);
					$sql->bindParam(':tgl_upl_per_baru', $waktu_input); $sql->bindParam(':user_per_baru', $user_upload);
					$sql->bindParam(':no_per_ubah_5', $nomor_peraturan);
					$sql->bindParam(':id_per', $id);	
				} elseif ($jenis_perubahan=="6"){
					$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET
						jenis_per=:jenis_per, detail_jenis_per=:detail_jenis_per, kode_per1=:kode_per1, detail_per1=:detail_per1, kode_per2=:kode_per2, detail_per2=:detail_per2, kode_per3=:kode_per3, detail_per3=:detail_per3, kode_per4=:kode_per4, detail_per4=:detail_per4, status_peraturan=:status_peraturan, detail_status=:detail_status, status_cabut=:status_cabut, tgl_sorting=:tgl_sorting, no_per_baru=:no_per_baru, judul_per_baru=:judul_per_baru, no_per_ubah_6=:no_per_ubah_6, terbit_per_baru=:terbit_per_baru, file_per_baru=:file_per_baru, tgl_upl_per_baru=:tgl_upl_per_baru, user_per_baru=:user_per_baru WHERE id_per=:id_per");
					$sql->bindParam(':jenis_per', $jenis_per); $sql->bindParam(':detail_jenis_per', $detail_jenis_per);
					$sql->bindParam(':kode_per1', $bab_per); $sql->bindParam(':detail_per1', $detail_Per1inp);
					$sql->bindParam(':kode_per2', $subbab); $sql->bindParam(':detail_per2', $detail_Per2inp);
					$sql->bindParam(':kode_per3', $posper); $sql->bindParam(':detail_per3', $detail_Per3inp);
					$sql->bindParam(':kode_per4', $subpos); $sql->bindParam(':detail_per4', $detail_Per4inp);
					$sql->bindParam(':status_peraturan', $status_peraturan); $sql->bindParam(':detail_status', $detail_peraturan);
					$sql->bindParam(':status_cabut', $status_cabut); $sql->bindParam(':tgl_sorting', $tanggal_terbit);
					$sql->bindParam(':no_per_baru', $nomor_peraturan); $sql->bindParam(':judul_per_baru', $judul_peraturan);
					$sql->bindParam(':terbit_per_baru', $tanggal_terbit); $sql->bindParam(':file_per_baru', $fotobaru);
					$sql->bindParam(':tgl_upl_per_baru', $waktu_input); $sql->bindParam(':user_per_baru', $user_upload);
					$sql->bindParam(':no_per_ubah_6', $nomor_peraturan);
					$sql->bindParam(':id_per', $id);	
				} elseif ($jenis_perubahan=="7"){
					$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET
						jenis_per=:jenis_per, detail_jenis_per=:detail_jenis_per, kode_per1=:kode_per1, detail_per1=:detail_per1, kode_per2=:kode_per2, detail_per2=:detail_per2, kode_per3=:kode_per3, detail_per3=:detail_per3, kode_per4=:kode_per4, detail_per4=:detail_per4, status_peraturan=:status_peraturan, detail_status=:detail_status, status_cabut=:status_cabut, tgl_sorting=:tgl_sorting, no_per_baru=:no_per_baru, judul_per_baru=:judul_per_baru, no_per_ubah_7=:no_per_ubah_7, terbit_per_baru=:terbit_per_baru, file_per_baru=:file_per_baru, tgl_upl_per_baru=:tgl_upl_per_baru, user_per_baru=:user_per_baru WHERE id_per=:id_per");
					$sql->bindParam(':jenis_per', $jenis_per); $sql->bindParam(':detail_jenis_per', $detail_jenis_per);
					$sql->bindParam(':kode_per1', $bab_per); $sql->bindParam(':detail_per1', $detail_Per1inp);
					$sql->bindParam(':kode_per2', $subbab); $sql->bindParam(':detail_per2', $detail_Per2inp);
					$sql->bindParam(':kode_per3', $posper); $sql->bindParam(':detail_per3', $detail_Per3inp);
					$sql->bindParam(':kode_per4', $subpos); $sql->bindParam(':detail_per4', $detail_Per4inp);
					$sql->bindParam(':status_peraturan', $status_peraturan); $sql->bindParam(':detail_status', $detail_peraturan);
					$sql->bindParam(':status_cabut', $status_cabut); $sql->bindParam(':tgl_sorting', $tanggal_terbit);
					$sql->bindParam(':no_per_baru', $nomor_peraturan); $sql->bindParam(':judul_per_baru', $judul_peraturan);
					$sql->bindParam(':terbit_per_baru', $tanggal_terbit); $sql->bindParam(':file_per_baru', $fotobaru);
					$sql->bindParam(':tgl_upl_per_baru', $waktu_input); $sql->bindParam(':user_per_baru', $user_upload);
					$sql->bindParam(':no_per_ubah_7', $nomor_peraturan);
					$sql->bindParam(':id_per', $id);	
				} elseif ($jenis_perubahan=="8"){
					$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET
						jenis_per=:jenis_per, detail_jenis_per=:detail_jenis_per, kode_per1=:kode_per1, detail_per1=:detail_per1, kode_per2=:kode_per2, detail_per2=:detail_per2, kode_per3=:kode_per3, detail_per3=:detail_per3, kode_per4=:kode_per4, detail_per4=:detail_per4, status_peraturan=:status_peraturan, detail_status=:detail_status, status_cabut=:status_cabut, tgl_sorting=:tgl_sorting, no_per_baru=:no_per_baru, judul_per_baru=:judul_per_baru, no_per_ubah_8=:no_per_ubah_8, terbit_per_baru=:terbit_per_baru, file_per_baru=:file_per_baru, tgl_upl_per_baru=:tgl_upl_per_baru, user_per_baru=:user_per_baru WHERE id_per=:id_per");
					$sql->bindParam(':jenis_per', $jenis_per); $sql->bindParam(':detail_jenis_per', $detail_jenis_per);
					$sql->bindParam(':kode_per1', $bab_per); $sql->bindParam(':detail_per1', $detail_Per1inp);
					$sql->bindParam(':kode_per2', $subbab); $sql->bindParam(':detail_per2', $detail_Per2inp);
					$sql->bindParam(':kode_per3', $posper); $sql->bindParam(':detail_per3', $detail_Per3inp);
					$sql->bindParam(':kode_per4', $subpos); $sql->bindParam(':detail_per4', $detail_Per4inp);
					$sql->bindParam(':status_peraturan', $status_peraturan); $sql->bindParam(':detail_status', $detail_peraturan);
					$sql->bindParam(':status_cabut', $status_cabut); $sql->bindParam(':tgl_sorting', $tanggal_terbit);
					$sql->bindParam(':no_per_baru', $nomor_peraturan); $sql->bindParam(':judul_per_baru', $judul_peraturan);
					$sql->bindParam(':terbit_per_baru', $tanggal_terbit); $sql->bindParam(':file_per_baru', $fotobaru);
					$sql->bindParam(':tgl_upl_per_baru', $waktu_input); $sql->bindParam(':user_per_baru', $user_upload);
					$sql->bindParam(':no_per_ubah_8', $nomor_peraturan);
					$sql->bindParam(':id_per', $id);	
				} elseif ($jenis_perubahan=="9"){
					$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET
						jenis_per=:jenis_per, detail_jenis_per=:detail_jenis_per, kode_per1=:kode_per1, detail_per1=:detail_per1, kode_per2=:kode_per2, detail_per2=:detail_per2, kode_per3=:kode_per3, detail_per3=:detail_per3, kode_per4=:kode_per4, detail_per4=:detail_per4, status_peraturan=:status_peraturan, detail_status=:detail_status, status_cabut=:status_cabut, tgl_sorting=:tgl_sorting, no_per_baru=:no_per_baru, judul_per_baru=:judul_per_baru, no_per_ubah_9=:no_per_ubah_9, terbit_per_baru=:terbit_per_baru, file_per_baru=:file_per_baru, tgl_upl_per_baru=:tgl_upl_per_baru, user_per_baru=:user_per_baru WHERE id_per=:id_per");
					$sql->bindParam(':jenis_per', $jenis_per); $sql->bindParam(':detail_jenis_per', $detail_jenis_per);
					$sql->bindParam(':kode_per1', $bab_per); $sql->bindParam(':detail_per1', $detail_Per1inp);
					$sql->bindParam(':kode_per2', $subbab); $sql->bindParam(':detail_per2', $detail_Per2inp);
					$sql->bindParam(':kode_per3', $posper); $sql->bindParam(':detail_per3', $detail_Per3inp);
					$sql->bindParam(':kode_per4', $subpos); $sql->bindParam(':detail_per4', $detail_Per4inp);
					$sql->bindParam(':status_peraturan', $status_peraturan); $sql->bindParam(':detail_status', $detail_peraturan);
					$sql->bindParam(':status_cabut', $status_cabut); $sql->bindParam(':tgl_sorting', $tanggal_terbit);
					$sql->bindParam(':no_per_baru', $nomor_peraturan); $sql->bindParam(':judul_per_baru', $judul_peraturan);
					$sql->bindParam(':terbit_per_baru', $tanggal_terbit); $sql->bindParam(':file_per_baru', $fotobaru);
					$sql->bindParam(':tgl_upl_per_baru', $waktu_input); $sql->bindParam(':user_per_baru', $user_upload);
					$sql->bindParam(':no_per_ubah_9', $nomor_peraturan);
					$sql->bindParam(':id_per', $id);	
				} elseif ($jenis_perubahan=="10"){
					$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET
						jenis_per=:jenis_per, detail_jenis_per=:detail_jenis_per, kode_per1=:kode_per1, detail_per1=:detail_per1, kode_per2=:kode_per2, detail_per2=:detail_per2, kode_per3=:kode_per3, detail_per3=:detail_per3, kode_per4=:kode_per4, detail_per4=:detail_per4, status_peraturan=:status_peraturan, detail_status=:detail_status, status_cabut=:status_cabut, tgl_sorting=:tgl_sorting, no_per_baru=:no_per_baru, judul_per_baru=:judul_per_baru, no_per_ubah_10=:no_per_ubah_10, terbit_per_baru=:terbit_per_baru, file_per_baru=:file_per_baru, tgl_upl_per_baru=:tgl_upl_per_baru, user_per_baru=:user_per_baru WHERE id_per=:id_per");
					$sql->bindParam(':jenis_per', $jenis_per); $sql->bindParam(':detail_jenis_per', $detail_jenis_per);
					$sql->bindParam(':kode_per1', $bab_per); $sql->bindParam(':detail_per1', $detail_Per1inp);
					$sql->bindParam(':kode_per2', $subbab); $sql->bindParam(':detail_per2', $detail_Per2inp);
					$sql->bindParam(':kode_per3', $posper); $sql->bindParam(':detail_per3', $detail_Per3inp);
					$sql->bindParam(':kode_per4', $subpos); $sql->bindParam(':detail_per4', $detail_Per4inp);
					$sql->bindParam(':status_peraturan', $status_peraturan); $sql->bindParam(':detail_status', $detail_peraturan);
					$sql->bindParam(':status_cabut', $status_cabut); $sql->bindParam(':tgl_sorting', $tanggal_terbit);
					$sql->bindParam(':no_per_baru', $nomor_peraturan); $sql->bindParam(':judul_per_baru', $judul_peraturan);
					$sql->bindParam(':terbit_per_baru', $tanggal_terbit); $sql->bindParam(':file_per_baru', $fotobaru);
					$sql->bindParam(':tgl_upl_per_baru', $waktu_input); $sql->bindParam(':user_per_baru', $user_upload);
					$sql->bindParam(':no_per_ubah_10', $nomor_peraturan);
					$sql->bindParam(':id_per', $id);	
				} elseif ($jenis_perubahan=="11"){
					$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET
						jenis_per=:jenis_per, detail_jenis_per=:detail_jenis_per, kode_per1=:kode_per1, detail_per1=:detail_per1, kode_per2=:kode_per2, detail_per2=:detail_per2, kode_per3=:kode_per3, detail_per3=:detail_per3, kode_per4=:kode_per4, detail_per4=:detail_per4, status_peraturan=:status_peraturan, detail_status=:detail_status, status_cabut=:status_cabut, tgl_sorting=:tgl_sorting, no_per_baru=:no_per_baru, judul_per_baru=:judul_per_baru, no_per_ubah_11=:no_per_ubah_11, terbit_per_baru=:terbit_per_baru, file_per_baru=:file_per_baru, tgl_upl_per_baru=:tgl_upl_per_baru, user_per_baru=:user_per_baru WHERE id_per=:id_per");
					$sql->bindParam(':jenis_per', $jenis_per); $sql->bindParam(':detail_jenis_per', $detail_jenis_per);
					$sql->bindParam(':kode_per1', $bab_per); $sql->bindParam(':detail_per1', $detail_Per1inp);
					$sql->bindParam(':kode_per2', $subbab); $sql->bindParam(':detail_per2', $detail_Per2inp);
					$sql->bindParam(':kode_per3', $posper); $sql->bindParam(':detail_per3', $detail_Per3inp);
					$sql->bindParam(':kode_per4', $subpos); $sql->bindParam(':detail_per4', $detail_Per4inp);
					$sql->bindParam(':status_peraturan', $status_peraturan); $sql->bindParam(':detail_status', $detail_peraturan);
					$sql->bindParam(':status_cabut', $status_cabut); $sql->bindParam(':tgl_sorting', $tanggal_terbit);
					$sql->bindParam(':no_per_baru', $nomor_peraturan); $sql->bindParam(':judul_per_baru', $judul_peraturan);
					$sql->bindParam(':terbit_per_baru', $tanggal_terbit); $sql->bindParam(':file_per_baru', $fotobaru);
					$sql->bindParam(':tgl_upl_per_baru', $waktu_input); $sql->bindParam(':user_per_baru', $user_upload);
					$sql->bindParam(':no_per_ubah_11', $nomor_peraturan);
					$sql->bindParam(':id_per', $id);	
				} elseif ($jenis_perubahan=="12"){
					$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET
						jenis_per=:jenis_per, detail_jenis_per=:detail_jenis_per, kode_per1=:kode_per1, detail_per1=:detail_per1, kode_per2=:kode_per2, detail_per2=:detail_per2, kode_per3=:kode_per3, detail_per3=:detail_per3, kode_per4=:kode_per4, detail_per4=:detail_per4, status_peraturan=:status_peraturan, detail_status=:detail_status, status_cabut=:status_cabut, tgl_sorting=:tgl_sorting, no_per_baru=:no_per_baru, judul_per_baru=:judul_per_baru, no_per_ubah_12=:no_per_ubah_12, terbit_per_baru=:terbit_per_baru, file_per_baru=:file_per_baru, tgl_upl_per_baru=:tgl_upl_per_baru, user_per_baru=:user_per_baru WHERE id_per=:id_per");
					$sql->bindParam(':jenis_per', $jenis_per); $sql->bindParam(':detail_jenis_per', $detail_jenis_per);
					$sql->bindParam(':kode_per1', $bab_per); $sql->bindParam(':detail_per1', $detail_Per1inp);
					$sql->bindParam(':kode_per2', $subbab); $sql->bindParam(':detail_per2', $detail_Per2inp);
					$sql->bindParam(':kode_per3', $posper); $sql->bindParam(':detail_per3', $detail_Per3inp);
					$sql->bindParam(':kode_per4', $subpos); $sql->bindParam(':detail_per4', $detail_Per4inp);
					$sql->bindParam(':status_peraturan', $status_peraturan); $sql->bindParam(':detail_status', $detail_peraturan);
					$sql->bindParam(':status_cabut', $status_cabut); $sql->bindParam(':tgl_sorting', $tanggal_terbit);
					$sql->bindParam(':no_per_baru', $nomor_peraturan); $sql->bindParam(':judul_per_baru', $judul_peraturan);
					$sql->bindParam(':terbit_per_baru', $tanggal_terbit); $sql->bindParam(':file_per_baru', $fotobaru);
					$sql->bindParam(':tgl_upl_per_baru', $waktu_input); $sql->bindParam(':user_per_baru', $user_upload);
					$sql->bindParam(':no_per_ubah_12', $nomor_peraturan);
					$sql->bindParam(':id_per', $id);	
				} elseif ($jenis_perubahan=="13"){
					$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET
						jenis_per=:jenis_per, detail_jenis_per=:detail_jenis_per, kode_per1=:kode_per1, detail_per1=:detail_per1, kode_per2=:kode_per2, detail_per2=:detail_per2, kode_per3=:kode_per3, detail_per3=:detail_per3, kode_per4=:kode_per4, detail_per4=:detail_per4, status_peraturan=:status_peraturan, detail_status=:detail_status, status_cabut=:status_cabut, tgl_sorting=:tgl_sorting, no_per_baru=:no_per_baru, judul_per_baru=:judul_per_baru, no_per_ubah_13=:no_per_ubah_13, terbit_per_baru=:terbit_per_baru, file_per_baru=:file_per_baru, tgl_upl_per_baru=:tgl_upl_per_baru, user_per_baru=:user_per_baru WHERE id_per=:id_per");
					$sql->bindParam(':jenis_per', $jenis_per); $sql->bindParam(':detail_jenis_per', $detail_jenis_per);
					$sql->bindParam(':kode_per1', $bab_per); $sql->bindParam(':detail_per1', $detail_Per1inp);
					$sql->bindParam(':kode_per2', $subbab); $sql->bindParam(':detail_per2', $detail_Per2inp);
					$sql->bindParam(':kode_per3', $posper); $sql->bindParam(':detail_per3', $detail_Per3inp);
					$sql->bindParam(':kode_per4', $subpos); $sql->bindParam(':detail_per4', $detail_Per4inp);
					$sql->bindParam(':status_peraturan', $status_peraturan); $sql->bindParam(':detail_status', $detail_peraturan);
					$sql->bindParam(':status_cabut', $status_cabut); $sql->bindParam(':tgl_sorting', $tanggal_terbit);
					$sql->bindParam(':no_per_baru', $nomor_peraturan); $sql->bindParam(':judul_per_baru', $judul_peraturan);
					$sql->bindParam(':terbit_per_baru', $tanggal_terbit); $sql->bindParam(':file_per_baru', $fotobaru);
					$sql->bindParam(':tgl_upl_per_baru', $waktu_input); $sql->bindParam(':user_per_baru', $user_upload);
					$sql->bindParam(':no_per_ubah_13', $nomor_peraturan);
					$sql->bindParam(':id_per', $id);	
				} elseif ($jenis_perubahan=="14"){
					$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET
						jenis_per=:jenis_per, detail_jenis_per=:detail_jenis_per, kode_per1=:kode_per1, detail_per1=:detail_per1, kode_per2=:kode_per2, detail_per2=:detail_per2, kode_per3=:kode_per3, detail_per3=:detail_per3, kode_per4=:kode_per4, detail_per4=:detail_per4, status_peraturan=:status_peraturan, detail_status=:detail_status, status_cabut=:status_cabut, tgl_sorting=:tgl_sorting, no_per_baru=:no_per_baru, judul_per_baru=:judul_per_baru, no_per_ubah_14=:no_per_ubah_14, terbit_per_baru=:terbit_per_baru, file_per_baru=:file_per_baru, tgl_upl_per_baru=:tgl_upl_per_baru, user_per_baru=:user_per_baru WHERE id_per=:id_per");
					$sql->bindParam(':jenis_per', $jenis_per); $sql->bindParam(':detail_jenis_per', $detail_jenis_per);
					$sql->bindParam(':kode_per1', $bab_per); $sql->bindParam(':detail_per1', $detail_Per1inp);
					$sql->bindParam(':kode_per2', $subbab); $sql->bindParam(':detail_per2', $detail_Per2inp);
					$sql->bindParam(':kode_per3', $posper); $sql->bindParam(':detail_per3', $detail_Per3inp);
					$sql->bindParam(':kode_per4', $subpos); $sql->bindParam(':detail_per4', $detail_Per4inp);
					$sql->bindParam(':status_peraturan', $status_peraturan); $sql->bindParam(':detail_status', $detail_peraturan);
					$sql->bindParam(':status_cabut', $status_cabut); $sql->bindParam(':tgl_sorting', $tanggal_terbit);
					$sql->bindParam(':no_per_baru', $nomor_peraturan); $sql->bindParam(':judul_per_baru', $judul_peraturan);
					$sql->bindParam(':terbit_per_baru', $tanggal_terbit); $sql->bindParam(':file_per_baru', $fotobaru);
					$sql->bindParam(':tgl_upl_per_baru', $waktu_input); $sql->bindParam(':user_per_baru', $user_upload);
					$sql->bindParam(':no_per_ubah_14', $nomor_peraturan);
					$sql->bindParam(':id_per', $id);	
				} elseif ($jenis_perubahan=="15"){
					$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET
						jenis_per=:jenis_per, detail_jenis_per=:detail_jenis_per, kode_per1=:kode_per1, detail_per1=:detail_per1, kode_per2=:kode_per2, detail_per2=:detail_per2, kode_per3=:kode_per3, detail_per3=:detail_per3, kode_per4=:kode_per4, detail_per4=:detail_per4, status_peraturan=:status_peraturan, detail_status=:detail_status, status_cabut=:status_cabut, tgl_sorting=:tgl_sorting, no_per_baru=:no_per_baru, judul_per_baru=:judul_per_baru, no_per_ubah_15=:no_per_ubah_15, terbit_per_baru=:terbit_per_baru, file_per_baru=:file_per_baru, tgl_upl_per_baru=:tgl_upl_per_baru, user_per_baru=:user_per_baru WHERE id_per=:id_per");
					$sql->bindParam(':jenis_per', $jenis_per); $sql->bindParam(':detail_jenis_per', $detail_jenis_per);
					$sql->bindParam(':kode_per1', $bab_per); $sql->bindParam(':detail_per1', $detail_Per1inp);
					$sql->bindParam(':kode_per2', $subbab); $sql->bindParam(':detail_per2', $detail_Per2inp);
					$sql->bindParam(':kode_per3', $posper); $sql->bindParam(':detail_per3', $detail_Per3inp);
					$sql->bindParam(':kode_per4', $subpos); $sql->bindParam(':detail_per4', $detail_Per4inp);
					$sql->bindParam(':status_peraturan', $status_peraturan); $sql->bindParam(':detail_status', $detail_peraturan);
					$sql->bindParam(':status_cabut', $status_cabut); $sql->bindParam(':tgl_sorting', $tanggal_terbit);
					$sql->bindParam(':no_per_baru', $nomor_peraturan); $sql->bindParam(':judul_per_baru', $judul_peraturan);
					$sql->bindParam(':terbit_per_baru', $tanggal_terbit); $sql->bindParam(':file_per_baru', $fotobaru);
					$sql->bindParam(':tgl_upl_per_baru', $waktu_input); $sql->bindParam(':user_per_baru', $user_upload);
					$sql->bindParam(':no_per_ubah_15', $nomor_peraturan);
					$sql->bindParam(':id_per', $id);	
				}
				$sql_1 = $pdoODBC->prepare("UPDATE td_peraturan_bravo_detail SET
						status_peraturan_ubah=:status_peraturan_ubah,
						detail_status_ubah=:detail_status_ubah,
						status_cabut_ubah=:status_cabut_ubah,
						no_per_ubah=:no_per_ubah,
						judul_per_ubah=:judul_per_ubah,
						terbit_per_ubah=:terbit_per_ubah,
						file_per_ubah=:file_per_ubah,
						tgl_upl_per_ubah=:tgl_upl_per_ubah,
						user_per_ubah=:user_per_ubah
						WHERE id_ubah=:id_ubah AND status_peraturan_ubah=:status_peraturan_ubah2");
				$sql_1->BindParam(':status_peraturan_ubah',$status_peraturan);
				$sql_1->BindParam(':detail_status_ubah',$detail_peraturan);
				$sql_1->BindParam(':status_cabut_ubah',$status_cabut);
				$sql_1->BindParam(':no_per_ubah',$nomor_peraturan);
				$sql_1->BindParam(':judul_per_ubah',$judul_peraturan);
				$sql_1->BindParam(':terbit_per_ubah',$tanggal_terbit);
				$sql_1->BindParam(':file_per_ubah',$fotobaru);
				$sql_1->BindParam(':tgl_upl_per_ubah',$waktu_input);
				$sql_1->BindParam(':user_per_ubah',$user_upload);
				$sql_1->bindParam(':id_ubah', $id);
				$sql_1->BindParam(':status_peraturan_ubah2',$status_peraturan);
			if ($sql->execute() and $sql_1->execute() and move_uploaded_file($tmp, $path)) {
				ob_start();
				include "view.php";
				$html = ob_get_contents();
				ob_end_clean();
						
				$response = array(
					'status'=>'sukses',
					'pesan'=>'Peraturan Berhasil Dirubah',
					'html'=>$html
					);
				} else {
					$response = array(
					'status'=>'Gagal',
					'pesan'=>'Peraturan Gagal Dirubah',
					'html'=>$html
					);
				}
			}
		} else {
			if($jenis_perubahan=="A") {
				if($data['status_cabut']=="1") {
					if(is_file("../../_UPLOAD_DATA/PERATURAN/".$data1['file_per_ubah'])) 
					unlink("../../_UPLOAD_DATA/PERATURAN/".$data1['file_per_ubah']);
					$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET
						jenis_per=:jenis_per,
						detail_jenis_per=:detail_jenis_per,
						kode_per1=:kode_per1,
						detail_per1=:detail_per1,
						kode_per2=:kode_per2,
						detail_per2=:detail_per2,
						kode_per3=:kode_per3,
						detail_per3=:detail_per3,
						kode_per4=:kode_per4,
						detail_per4=:detail_per4,
						detail_status=:detail_status,
						status_cabut=:status_cabut,
						no_per_baru=:no_per_baru,
						no_per_data_cabut=:no_per_data_cabut,
						judul_per_baru=:judul_per_baru,
						terbit_per_baru=:terbit_per_baru,
						file_per_baru=:file_per_baru,
						tgl_upl_per_baru=:tgl_upl_per_baru,
						user_per_baru=:user_per_baru
						WHERE id_per=:id_per
						");
						//tgl_sorting=:tgl_sorting,
					$sql->bindParam(':jenis_per', $jenis_per);
					$sql->bindParam(':detail_jenis_per', $detail_jenis_per);
					$sql->bindParam(':kode_per1', $bab_per);
					$sql->bindParam(':detail_per1', $detail_Per1inp);
					$sql->bindParam(':kode_per2', $subbab);
					$sql->bindParam(':detail_per2', $detail_Per2inp);
					$sql->bindParam(':kode_per3', $posper);
					$sql->bindParam(':detail_per3', $detail_Per3inp);
					$sql->bindParam(':kode_per4', $subpos);
					$sql->bindParam(':detail_per4', $detail_Per4inp);
					$sql->bindParam(':detail_status', $detail_peraturan);
					$sql->bindParam(':status_cabut', $status_cabut);
					//$sql->bindParam(':tgl_sorting', $tanggal_terbit);
					$sql->bindParam(':no_per_baru', $nomor_peraturan);
					$sql->bindParam(':no_per_data_cabut', $nomor_peraturan);
					$sql->bindParam(':judul_per_baru', $judul_peraturan);
					$sql->bindParam(':terbit_per_baru', $tanggal_terbit);
					$sql->bindParam(':file_per_baru', $fotobaru);
					$sql->bindParam(':tgl_upl_per_baru', $waktu_input);
					$sql->bindParam(':user_per_baru', $user_upload);
					$sql->bindParam(':id_per', $id);	
					
					$sql_1 = $pdoODBC->prepare("UPDATE td_peraturan_bravo_detail SET
							status_peraturan_ubah=:status_peraturan_ubah,
							detail_status_ubah=:detail_status_ubah,
							status_cabut_ubah=:status_cabut_ubah,
							no_per_ubah=:no_per_ubah,
							judul_per_ubah=:judul_per_ubah,
							terbit_per_ubah=:terbit_per_ubah,
							file_per_ubah=:file_per_ubah,
							tgl_upl_per_ubah=:tgl_upl_per_ubah,
							user_per_ubah=:user_per_ubah
							WHERE id_ubah=:id_ubah AND status_peraturan_ubah=:status_peraturan_ubah2");
					$sql_1->BindParam(':status_peraturan_ubah',$status_peraturan);
					$sql_1->BindParam(':detail_status_ubah',$detail_peraturan);
					$sql_1->BindParam(':status_cabut_ubah',$status_cabut);
					$sql_1->BindParam(':no_per_ubah',$nomor_peraturan);
					$sql_1->BindParam(':judul_per_ubah',$judul_peraturan);
					$sql_1->BindParam(':terbit_per_ubah',$tanggal_terbit);
					$sql_1->BindParam(':file_per_ubah',$fotobaru);
					$sql_1->BindParam(':tgl_upl_per_ubah',$waktu_input);
					$sql_1->BindParam(':user_per_ubah',$user_upload);
					$sql_1->bindParam(':id_ubah', $id);
					$sql_1->BindParam(':status_peraturan_ubah2',$status_peraturan);
					if ($sql->execute() and $sql_1->execute() and move_uploaded_file($tmp, $path)) {
						ob_start();
						include "view.php";
						$html = ob_get_contents();
						ob_end_clean();
								
						$response = array(
							'status'=>'sukses',
							'pesan'=>'Peraturan Pencabutan Berhasil Dirubah',
							'html'=>$html
							);
						} else {
							$response = array(
							'status'=>'Gagal',
							'pesan'=>'Peraturan Pencabutan Gagal Dirubah',
							'html'=>$html
							);
						}
				} else { 
					$response = array(
						'status'=>'Gagal',
						'pesan'=>'Peraturan Pencabutan Gagal Dirubah Peraturan Belum Dicabut',
						'html'=>$html
					);
				}
			} elseif ($jenis_perubahan=="0") {
				if(is_file("../../_UPLOAD_DATA/PERATURAN/".$data1['file_per_ubah'])) 
				unlink("../../_UPLOAD_DATA/PERATURAN/".$data1['file_per_ubah']);
				$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET
					jenis_per=:jenis_per,
					detail_jenis_per=:detail_jenis_per,
					kode_per1=:kode_per1,
					detail_per1=:detail_per1,
					kode_per2=:kode_per2,
					detail_per2=:detail_per2,
					kode_per3=:kode_per3,
					detail_per3=:detail_per3,
					kode_per4=:kode_per4,
					detail_per4=:detail_per4,
					no_per_asal=:no_per_asal
					WHERE id_per=:id_per
					");
				$sql->bindParam(':jenis_per', $jenis_per);
				$sql->bindParam(':detail_jenis_per', $detail_jenis_per);
				$sql->bindParam(':kode_per1', $bab_per);
				$sql->bindParam(':detail_per1', $detail_Per1inp);
				$sql->bindParam(':kode_per2', $subbab);
				$sql->bindParam(':detail_per2', $detail_Per2inp);
				$sql->bindParam(':kode_per3', $posper);
				$sql->bindParam(':detail_per3', $detail_Per3inp);
				$sql->bindParam(':kode_per4', $subpos);
				$sql->bindParam(':detail_per4', $detail_Per4inp);
				$sql->bindParam(':no_per_asal', $nomor_peraturan);
				$sql->bindParam(':id_per', $id);	
				
				$sql_1 = $pdoODBC->prepare("UPDATE td_peraturan_bravo_detail SET
						status_peraturan_ubah=:status_peraturan_ubah,
						detail_status_ubah=:detail_status_ubah,
						status_cabut_ubah=:status_cabut_ubah,
						no_per_ubah=:no_per_ubah,
						judul_per_ubah=:judul_per_ubah,
						terbit_per_ubah=:terbit_per_ubah,
						file_per_ubah=:file_per_ubah,
						tgl_upl_per_ubah=:tgl_upl_per_ubah,
						user_per_ubah=:user_per_ubah
						WHERE id_ubah=:id_ubah AND status_peraturan_ubah=:status_peraturan_ubah2");
				$sql_1->BindParam(':status_peraturan_ubah',$status_peraturan);
				$sql_1->BindParam(':detail_status_ubah',$detail_peraturan);
				$sql_1->BindParam(':status_cabut_ubah',$status_cabut);
				$sql_1->BindParam(':no_per_ubah',$nomor_peraturan);
				$sql_1->BindParam(':judul_per_ubah',$judul_peraturan);
				$sql_1->BindParam(':terbit_per_ubah',$tanggal_terbit);
				$sql_1->BindParam(':file_per_ubah',$fotobaru);
				$sql_1->BindParam(':tgl_upl_per_ubah',$waktu_input);
				$sql_1->BindParam(':user_per_ubah',$user_upload);
				$sql_1->bindParam(':id_ubah', $id);
				$sql_1->BindParam(':status_peraturan_ubah2',$status_peraturan);
				if ($sql->execute() and $sql_1->execute() and move_uploaded_file($tmp, $path)) {
						ob_start();
						include "view.php";
						$html = ob_get_contents();
						ob_end_clean();
								
						$response = array(
							'status'=>'sukses',
							'pesan'=>'Peraturan Pencabutan Berhasil Dirubah',
							'html'=>$html
							);
						} else {
							$response = array(
							'status'=>'Gagal',
							'pesan'=>'Peraturan Pencabutan Gagal Dirubah',
							'html'=>$html
							);
						}
			} else {
				if ($jenis_perubahan=="1"){
					$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET no_per_ubah_1=:no_per_ubah_1 WHERE id_per=:id_per");
					$sql->bindParam(':no_per_ubah_1', $nomor_peraturan);
					$sql->bindParam(':id_per', $id);
				} elseif ($jenis_perubahan=="2"){
					$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET no_per_ubah_2=:no_per_ubah_2 WHERE id_per=:id_per");
					$sql->bindParam(':no_per_ubah_2', $nomor_peraturan);
					$sql->bindParam(':id_per', $id);
				} elseif ($jenis_perubahan=="3"){
					$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET no_per_ubah_3=:no_per_ubah_3 WHERE id_per=:id_per");
					$sql->bindParam(':no_per_ubah_3', $nomor_peraturan);
					$sql->bindParam(':id_per', $id);
				} elseif ($jenis_perubahan=="4"){
					$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET no_per_ubah_4=:no_per_ubah_4 WHERE id_per=:id_per");
					$sql->bindParam(':no_per_ubah_4', $nomor_peraturan);
					$sql->bindParam(':id_per', $id);
				} elseif ($jenis_perubahan=="5"){
					$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET no_per_ubah_5=:no_per_ubah_5 WHERE id_per=:id_per");
					$sql->bindParam(':no_per_ubah_5', $nomor_peraturan);
					$sql->bindParam(':id_per', $id);
				} elseif ($jenis_perubahan=="6"){
					$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET no_per_ubah_6=:no_per_ubah_6 WHERE id_per=:id_per");
					$sql->bindParam(':no_per_ubah_6', $nomor_peraturan);
					$sql->bindParam(':id_per', $id);
				} elseif ($jenis_perubahan=="7"){
					$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET no_per_ubah_7=:no_per_ubah_7 WHERE id_per=:id_per");
					$sql->bindParam(':no_per_ubah_7', $nomor_peraturan);
					$sql->bindParam(':id_per', $id);
				} elseif ($jenis_perubahan=="8"){
					$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET no_per_ubah_8=:no_per_ubah_8 WHERE id_per=:id_per");
					$sql->bindParam(':no_per_ubah_8', $nomor_peraturan);
					$sql->bindParam(':id_per', $id);
				} elseif ($jenis_perubahan=="9"){
					$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET no_per_ubah_9=:no_per_ubah_9 WHERE id_per=:id_per");
					$sql->bindParam(':no_per_ubah_9', $nomor_peraturan);
					$sql->bindParam(':id_per', $id);
				} elseif ($jenis_perubahan=="10"){
					$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET no_per_ubah_10=:no_per_ubah_10 WHERE id_per=:id_per");
					$sql->bindParam(':no_per_ubah_10', $nomor_peraturan);
					$sql->bindParam(':id_per', $id);
				} elseif ($jenis_perubahan=="11"){
					$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET no_per_ubah_11=:no_per_ubah_11 WHERE id_per=:id_per");
					$sql->bindParam(':no_per_ubah_11', $nomor_peraturan);
					$sql->bindParam(':id_per', $id);
				}  elseif ($jenis_perubahan=="12"){
					$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET no_per_ubah_12=:no_per_ubah_12 WHERE id_per=:id_per");
					$sql->bindParam(':no_per_ubah_12', $nomor_peraturan);
					$sql->bindParam(':id_per', $id);
				}  elseif ($jenis_perubahan=="13"){
					$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET no_per_ubah_13=:no_per_ubah_13 WHERE id_per=:id_per");
					$sql->bindParam(':no_per_ubah_13', $nomor_peraturan);
					$sql->bindParam(':id_per', $id);
				}  elseif ($jenis_perubahan=="14"){
					$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET no_per_ubah_14=:no_per_ubah_14 WHERE id_per=:id_per");
					$sql->bindParam(':no_per_ubah_14', $nomor_peraturan);
					$sql->bindParam(':id_per', $id);
				}  elseif ($jenis_perubahan=="15"){
					$sql = $pdoODBC->prepare("UPDATE td_peraturan_bravo SET no_per_ubah_15=:no_per_ubah_15 WHERE id_per=:id_per");
					$sql->bindParam(':no_per_ubah_15', $nomor_peraturan);
					$sql->bindParam(':id_per', $id);
				} 
				$sql_1 = $pdoODBC->prepare("UPDATE td_peraturan_bravo_detail SET
						status_peraturan_ubah=:status_peraturan_ubah,
						detail_status_ubah=:detail_status_ubah,
						status_cabut_ubah=:status_cabut_ubah,
						no_per_ubah=:no_per_ubah,
						judul_per_ubah=:judul_per_ubah,
						terbit_per_ubah=:terbit_per_ubah,
						file_per_ubah=:file_per_ubah,
						tgl_upl_per_ubah=:tgl_upl_per_ubah,
						user_per_ubah=:user_per_ubah
						WHERE id_ubah=:id_ubah AND status_peraturan_ubah=:status_peraturan_ubah2");
				$sql_1->BindParam(':status_peraturan_ubah',$status_peraturan);
				$sql_1->BindParam(':detail_status_ubah',$detail_peraturan);
				$sql_1->BindParam(':status_cabut_ubah',$status_cabut);
				$sql_1->BindParam(':no_per_ubah',$nomor_peraturan);
				$sql_1->BindParam(':judul_per_ubah',$judul_peraturan);
				$sql_1->BindParam(':terbit_per_ubah',$tanggal_terbit);
				$sql_1->BindParam(':file_per_ubah',$fotobaru);
				$sql_1->BindParam(':tgl_upl_per_ubah',$waktu_input);
				$sql_1->BindParam(':user_per_ubah',$user_upload);
				$sql_1->bindParam(':id_ubah', $id);
				$sql_1->BindParam(':status_peraturan_ubah2',$status_peraturan);
				if ($sql->execute() and $sql_1->execute() and move_uploaded_file($tmp, $path)) {
					ob_start();
					include "view.php";
					$html = ob_get_contents();
					ob_end_clean();
								
					$response = array(
						'status'=>'sukses',
						'pesan'=>'Peraturan Pencabutan Berhasil Dirubah',
						'html'=>$html
						);
				} else {
					$response = array(
						'status'=>'Gagal',
						'pesan'=>'Peraturan Pencabutan Gagal Dirubah',
						'html'=>$html
						);
					}
			}
		}
	}
echo json_encode($response);
}
?>
