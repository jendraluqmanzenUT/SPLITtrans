<?php
include "../../db_config.php";
include "../../session_browser.php";
function dateinput($tgl)	{
	$pecah=explode('/',$tgl);
	return "$pecah[2]-$pecah[1]-$pecah[0]";
};
date_default_timezone_set('Asia/Jakarta');
$waktu_input		= date("Y-m-d H:i:s");
$random				= date('ymd-Hms');
$jenis_per 			= $_POST['jenis_per'];
$bab_per 			= $_POST['bab_per'];
$subbab 			= $_POST['subbab'];
$posper 			= $_POST['posper'];
$subpos 			= $_POST['subpos'];
$judul_peraturan 	= trim($_POST['judul_per_baru']);
$tanggal_terbit 	= dateinput($_POST['terbit_per_baru']);
$file_peraturan 	= $_FILES['file_per_baru']['name'];
$tmp 				= $_FILES['file_per_baru']['tmp_name'];
$status_peraturan	= '0';
$status_cabut		= '0';
$detail_peraturan	= 'Berlaku';
$user_upload		= $nama;
if ($jenis_per=="1") 		{ $nomor_peraturan 	= trim($_POST['no_per_baru']); }
elseif ($jenis_per=="2") 	{ $nomor_peraturan 	= trim($_POST['no_per_baru']); }
elseif ($jenis_per=="3") 	{ $nomor_peraturan 	= trim($_POST['no_per_baru']); }
elseif ($jenis_per=="4") 	{ $nomor_peraturan 	= trim($_POST['no_per_baru']); }
elseif ($jenis_per=="5") 	{ $nomor_peraturan 	= trim($_POST['no_per_baru']); }
elseif ($jenis_per=="6") 	{ $nomor_peraturan 	= trim($_POST['no_per_baru']); }
elseif ($jenis_per=="7") 	{ $nomor_peraturan 	= trim($_POST['no_per_baru']); }
elseif ($jenis_per=="8") 	{ $nomor_peraturan 	= str_replace(' ', '', trim($_POST['no_per_baru'])); }
elseif ($jenis_per=="9") 	{ $nomor_peraturan 	= str_replace(' ', '', trim($_POST['no_per_baru'])); }
elseif ($jenis_per=="10") 	{ $nomor_peraturan 	= str_replace(' ', '', trim($_POST['no_per_baru'])); }
elseif ($jenis_per=="11") 	{ $nomor_peraturan 	= str_replace(' ', '', trim($_POST['no_per_baru'])); }
elseif ($jenis_per=="12") 	{ $nomor_peraturan 	= trim($_POST['no_per_baru']); }
elseif ($jenis_per=="13") 	{ $nomor_peraturan 	= trim($_POST['no_per_baru']); }
elseif ($jenis_per=="14") 	{ $nomor_peraturan 	= str_replace(' ', '', trim($_POST['no_per_baru'])); }
elseif ($jenis_per=="15") 	{ $nomor_peraturan 	= trim($_POST['no_per_baru']); }
elseif ($jenis_per=="16") 	{ $nomor_peraturan 	= str_replace(' ', '', trim($_POST['no_per_baru'])); }
elseif ($jenis_per=="17") 	{ $nomor_peraturan 	= trim($_POST['no_per_baru']); }
elseif ($jenis_per=="18") 	{ $nomor_peraturan 	= trim($_POST['no_per_baru']); }
elseif ($jenis_per=="19") 	{ $nomor_peraturan 	= trim($_POST['no_per_baru']); }
elseif ($jenis_per=="20") 	{ $nomor_peraturan 	= trim($_POST['no_per_baru']); }
elseif ($jenis_per=="21") 	{ $nomor_peraturan 	= trim($_POST['no_per_baru']); }
elseif ($jenis_per=="22") 	{ $nomor_peraturan 	= trim($_POST['no_per_baru']); }
elseif ($jenis_per=="23") 	{ $nomor_peraturan 	= trim($_POST['no_per_baru']); }


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

	$sql	=$pdoODBC->prepare("insert INTO td_peraturan_bravo (
						jenis_per,
						detail_jenis_per,
						kode_per1,
						detail_per1,
						kode_per2,
						detail_per2,
						kode_per3,
						detail_per3,
						kode_per4,
						detail_per4,
						status_peraturan,
						detail_status,
						status_cabut,
						tgl_sorting,
						no_per_asal,
						no_per_baru,
						judul_per_baru,
						terbit_per_baru,
						file_per_baru,
						tgl_upl_per_baru,
						user_per_baru,
						viewx)
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
						:user_per_baru,
						:viewx)");
		$sql->BindParam(':jenis_per',$jenis_per);
		$sql->BindParam(':detail_jenis_per',$detail_jenis_per);
		$sql->BindParam(':kode_per1',$bab_per);
		$sql->BindParam(':detail_per1',$detail_Per1inp);
		$sql->BindParam(':kode_per2',$subbab);
		$sql->BindParam(':detail_per2',$detail_Per2inp);
		$sql->BindParam(':kode_per3',$posper);
		$sql->BindParam(':detail_per3',$detail_Per3inp);
		$sql->BindParam(':kode_per4',$subpos);
		$sql->BindParam(':detail_per4',$detail_Per4inp);
		$sql->BindParam(':status_peraturan',$status_peraturan);
		$sql->BindParam(':detail_status',$detail_peraturan);
		$sql->BindParam(':status_cabut',$status_cabut);
		$sql->BindParam(':tgl_sorting',$tanggal_terbit);
		$sql->BindParam(':no_per_asal',$nomor_peraturan);
		$sql->BindParam(':no_per_baru',$nomor_peraturan);
		$sql->BindParam(':judul_per_baru',$judul_peraturan);
		$sql->BindParam(':terbit_per_baru',$tanggal_terbit);
		$sql->BindParam(':file_per_baru',$fotobaru);
		$sql->BindParam(':tgl_upl_per_baru',$waktu_input);
		$sql->BindParam(':user_per_baru',$user_upload);
		$sql->BindParam(':viewx',$status_peraturan);
		if ($sql->execute() and move_uploaded_file($tmp, $path)) {
		$sql_id = $pdoODBC->prepare(
			"SELECT
				id_per,kode_per1,kode_per2,kode_per3,kode_per4,no_per_asal,judul_per_baru,jenis_per
			FROM
				td_peraturan_bravo
			WHERE
				kode_per1=:kode_per1 and
				kode_per2=:kode_per2 and
				kode_per3=:kode_per3 and
				kode_per4=:kode_per4 and
				no_per_asal=:no_per_asal and
				judul_per_baru=:judul_per_baru and
				jenis_per=:jenis_per
			");
		$sql_id->bindParam(':kode_per1', $bab_per);
		$sql_id->bindParam(':kode_per2', $subbab);
		$sql_id->bindParam(':kode_per3', $posper);
		$sql_id->bindParam(':kode_per4', $subpos);
		$sql_id->bindParam(':no_per_asal', $nomor_peraturan);
		$sql_id->bindParam(':judul_per_baru', $judul_peraturan);
		$sql_id->bindParam(':jenis_per', $jenis_per);
		$sql_id->execute();
		$data_id = $sql_id->fetch();
		$id_rec = $data_id['id_per'];
		if ($sql_id->execute()) {
			$sql_ubah=$pdoODBC->prepare("insert INTO td_peraturan_bravo_detail (
					id_ubah,
					status_peraturan_ubah,
					detail_status_ubah,
					status_cabut_ubah,
					no_per_ubah,
					judul_per_ubah,
					terbit_per_ubah,
					file_per_ubah,
					tgl_upl_per_ubah,
					user_per_ubah,
					viewx)
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
					:user_per_ubah,
					:viewx)");
				$sql_ubah->BindParam(':id_ubah',$id_rec);
				$sql_ubah->BindParam(':status_peraturan_ubah',$status_peraturan);
				$sql_ubah->BindParam(':detail_status_ubah',$detail_peraturan);
				$sql_ubah->BindParam(':status_cabut_ubah',$status_cabut);
				$sql_ubah->BindParam(':no_per_ubah',$nomor_peraturan);
				$sql_ubah->BindParam(':judul_per_ubah',$judul_peraturan);
				$sql_ubah->BindParam(':terbit_per_ubah',$tanggal_terbit);
				$sql_ubah->BindParam(':file_per_ubah',$fotobaru);
				$sql_ubah->BindParam(':tgl_upl_per_ubah',$waktu_input);
				$sql_ubah->BindParam(':user_per_ubah',$user_upload);
				$sql_ubah->BindParam(':viewx',$status_peraturan);
				if ($sql_ubah->execute()) {
					ob_start();
					include "view.php";
					$html = ob_get_contents();
					ob_end_clean();

					$response = array(
						'status'=>'sukses',
						'pesan'=>'Data berhasil disimpan',
						'html'=>$html
					);
				} else {
					$response = array(
					'status'=>'gagal',
					'pesan'=>'Peraturan Gagal Diupload',
					);
				}
			} else {
				$response = array(
				'status'=>'gagal',
				'pesan'=>'Peraturan Gagal Diupload',
				);
			}
		} else {
			$response = array(
			'status'=>'gagal',
			'pesan'=>'Peraturan Gagal Diupload',
			);
		}


echo json_encode($response); // konversi variabel response menjadi JSON
?>
