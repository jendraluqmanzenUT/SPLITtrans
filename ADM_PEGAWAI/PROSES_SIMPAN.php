<?php
include_once '../../db_config.php';
include_once '../../session_browser.php';
include_once 'includes/db_connect.php';
include_once 'includes/psl-config.php';
function injection($ultra){
$filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($ultra,ENT_QUOTES))));
return $filter_sql;
}
$error_msg = "";
if (isset($_POST['username'], $_POST['email'], $_POST['p'])) {
	if (!filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)) {
		$response = array(
			'status'=>'Gagal',
			'pesan'=>'Data Email Tidak Valid',
			'html'=>$html
			);
		$error_msg .= '1';
	};
	if (empty($error_msg)) {
		$nama_pegawai 		= ucwords(strtolower($_POST['nama_pegawai']));
		$nip_pegawai 		= injection(trim($_POST['nip_pegawai']));
		$username			= injection(trim($_POST['username']));
		$email_input		= $_POST['email'];
		$password 			= $_POST['p'];
		$sandi 				= $_POST['confirmpwd'];
		$telp_input			= $_POST['telp'];
		$qoute_input		= $_POST['qoute'];
		$tipologi_input		= $_POST['tipologi'];
		$strataII_input		= $_POST['strataII'];
		$strataIII_input 	= $_POST['strataIII'];
		$strataIV_input 	= $_POST['strataIV'];
		$jabatan_input		= $_POST['jabatan'];
		$pangol_input		= $_POST['pangol'];
		$default_foto		= "avatar5.jpg";
		
		$privimpor_inp 		= $_POST['privimpor'];
		$privekspor_inp 	= $_POST['privekspor'];
		$privintelijen_inp 	= $_POST['privintelijen'];
		$privli_inp 		= $_POST['privli'];
		$privlki_inp 		= $_POST['privlki'];
		$privlkai_inp 		= $_POST['privlkai'];
		$privnhi_inp 		= $_POST['privnhi'];
		$privnip_inp 		= $_POST['privnip'];
		$privapoint_inp 	= $_POST['privapoint'];
		$privrekapintel_inp = $_POST['privrekapintel'];
		$privblokir_inp 	= $_POST['privblokir'];
		$priveditblokir_inp = $_POST['priveditblokir'];
		$privsurvailance_inp = $_POST['privsurvailance'];
		$privatensiintel_inp = $_POST['privatensiintel'];
		$privstaffintel_inp = $_POST['privstaffintel'];
		$privstpi_inp = $_POST['privstpi'];
		$privanalispenumpang_inp = $_POST['privanalispenumpang'];
		$privatensipenumpang_inp = $_POST['privatensipenumpang'];
		$privanalisyacht_inp = $_POST['privanalisyacht'];
		$privatensiyacht_inp = $_POST['privatensiyacht'];
		$privedityacht_inp = $_POST['privedityacht'];
		$privanalisplb_inp = $_POST['privanalisplb'];
		$privatensiplb_inp = $_POST['privatensiplb'];
		$priveditplb_inp = $_POST['priveditplb'];
		$privpenindakan_inp = $_POST['privpenindakan'];
		$privreekspor_inp = $_POST['privreekspor'];
		$privpibk_inp = $_POST['privpibk'];
		$privsbp_inp = $_POST['privsbp'];
		$priveditsbp_inp = $_POST['priveditsbp'];
		$privpjt_inp = $_POST['privpjt'];
		$privcd_inp = $_POST['privcd'];
		$privstaffpenindakan_inp = $_POST['privstaffpenindakan'];
		$privlaporan_inp = $_POST['privlaporan'];
		$privlaporanplb_inp = $_POST['privlaporanplb'];
		$privlaporanyacht_inp = $_POST['privlaporanyacht'];
		$privimpordatapib_inp = $_POST['privimpordatapib'];
		$privimpordatapeb_inp = $_POST['privimpordatapeb'];
		$privimpordataspkpbm_inp = $_POST['privimpordataspkpbm'];
		$privexecutive_inp = $_POST['privexecutive'];
		$privexelaporan_inp = $_POST['privexelaporan'];
		$privexebulanan_inp = $_POST['privexebulanan'];
		$privvillar_inp = $_POST['privvillar'];
		$privpabean_inp = $_POST['privpabean'];
		$privkoordagenfasilitaspusat_inp = $_POST['privkoordagenfasilitaspusat'];
		$privkoordagenfasilitas_inp = $_POST['privkoordagenfasilitas'];
		$privagenfaskhusus_inp = $_POST['privagenfaskhusus'];
		$privagenfas_inp = $_POST['privagenfas'];
		$privstaffagenfas_inp = $_POST['privstaffagenfas'];
		$privpabeanplb_inp = $_POST['privpabeanplb'];
		$privpabeanyacht_inp = $_POST['privpabeanyacht'];
		$privjaminan_inp = $_POST['privjaminan'];
		$priveditjaminan_inp = $_POST['priveditjaminan'];
		$privmanifest_inp = $_POST['privmanifest'];
		$privmanifestplb_inp = $_POST['privmanifestplb'];
		$privmanifestyacht_inp = $_POST['privmanifestyacht'];
		$privimpordatamanifest_inp = $_POST['privimpordatamanifest'];
		$priveditmanifest_inp = $_POST['priveditmanifest'];
		$privpli_inp = $_POST['privpli'];
		$privppidtk1_inp = $_POST['privppidtk1'];
		$privppidtk2_inp = $_POST['privppidtk2'];
		$privppidtk3_inp = $_POST['privppidtk3'];
		$privppid_inp = $_POST['privppid'];
		$privstaffppid_inp = $_POST['privstaffppid'];
		$privclco_inp = $_POST['privclco'];
		$privstaffpli_inp = $_POST['privstaffpli'];
		$privcc_inp = $_POST['privcc'];
		$privcs_inp = $_POST['privcs'];
		$privumum_inp = $_POST['privumum'];
		$privbtki_inp = $_POST['privbtki'];
		$privtl_inp = $_POST['privtl'];
		date_default_timezone_set('Asia/Jakarta');
		$notif_status = '0';
		$notif_time = date('Y-m-d H:i:s');
				
		
		/*INSERT DETAIL STRATA II*/
		$sqlkantorII = $pdoMYSQL->prepare("SELECT kode_es2,strataII FROM td_daftar_kantor WHERE kode_es2=:kode_es2");
		$sqlkantorII->bindParam(':kode_es2', $strataII_input);
		$sqlkantorII->execute();
		while($rowII=$sqlkantorII->fetch()){
			$eselon2_detail_input	= $rowII['strataII'];
		}
		/*INSERT DETAIL STRATA III*/
		$sqlkantorIII = $pdoMYSQL->prepare("SELECT kode_es3,strataIII FROM td_daftar_kantor WHERE kode_es3=:kode_es3");
		$sqlkantorIII->bindParam(':kode_es3', $strataIII_input);
		$sqlkantorIII->execute();
		while($rowIII=$sqlkantorIII->fetch()){
			$eselon3_detail_input	= $rowIII['strataIII'];
		}
		/*INSERT DETAIL STRATA IV*/
		$sqlkantorIV = $pdoMYSQL->prepare("SELECT kode_es4,strataIV FROM td_daftar_kantor WHERE kode_es4=:kode_es4");
		$sqlkantorIV->bindParam(':kode_es4', $strataIV_input);
		$sqlkantorIV->execute();
		while($rowIV=$sqlkantorIV->fetch()){
			$eselon4_detail_input	= $rowIV['strataIV'];
		}
		
		/*INSERT ALAMAT KANTOR*/
		$sqlkantorV = $pdoMYSQL->prepare("SELECT kode_es4,alamat_kantor,telp_kantor FROM td_daftar_kantor WHERE kode_es4=:kode_es4");
		$sqlkantorV->bindParam(':kode_es4', $strataIV_input);
		$sqlkantorV->execute();
		while($rowV=$sqlkantorV->fetch()){
			$alamat_kantorINP	= $rowV['alamat_kantor'];
			$telp_kantorINP		= $rowV['telp_kantor'];
		}
		
		$tipologi_t	= $tipologi_input;
		if ($tipologi_t =="Kantor Pusat") { 
			$nama_kantor_input =$eselon2_detail_input;
		} elseif ($tipologi_t =="Kantor Wilayah") {
			$nama_kantor_input=$eselon2_detail_input;
		} elseif ($tipologi_t =="Kantor Pelayanan Utama") {
			$nama_kantor_input=$eselon2_detail_input;
		} else {
			$nama_kantor_input=$eselon3_detail_input;
		};
	
		$plus = trim(($privimpor_inp)+
					($privekspor_inp)+
					($privintelijen_inp)+
					($privli_inp)+
					($privlki_inp)+
					($privlkai_inp)+
					($privnhi_inp)+
					($privnip_inp)+
					($privapoint_inp)+
					($privrekapintel_inp)+
					($privblokir_inp)+
					($priveditblokir_inp)+
					($privsurvailance_inp)+
					($privatensiintel_inp)+
					($privstaffintel_inp)+
					($privstpi_inp)+
					($privanalispenumpang_inp)+
					($privatensipenumpang_inp)+
					($privanalisyacht_inp)+
					($privatensiyacht_inp)+
					($privedityacht_inp)+
					($privanalisplb_inp)+
					($privatensiplb_inp)+
					($priveditplb_inp)+
					($privpenindakan_inp)+
					($privreekspor_inp)+
					($privpibk_inp)+
					($privsbp_inp)+
					($priveditsbp_inp)+
					($privpjt_inp)+
					($privcd_inp)+
					($privstaffpenindakan_inp)+
					($privlaporan_inp)+
					($privlaporanplb_inp)+
					($privlaporanyacht_inp)+
					($privimpordatapib_inp)+
					($privimpordatapeb_inp)+
					($privimpordataspkpbm_inp)+
					($privexecutive_inp)+
					($privexelaporan_inp)+
					($privexebulanan_inp)+
					($privvillar_inp)+
					($privpabean_inp)+
					($privkoordagenfasilitaspusat_inp)+
					($privkoordagenfasilitas_inp)+
					($privagenfaskhusus_inp)+
					($privagenfas_inp)+
					($privstaffagenfas_inp)+
					($privpabeanplb_inp)+
					($privpabeanyacht_inp)+
					($privjaminan_inp)+
					($priveditjaminan_inp)+
					($privmanifest_inp)+
					($privmanifestplb_inp)+
					($privmanifestyacht_inp)+
					($privimpordatamanifest_inp)+
					($priveditmanifest_inp)+
					($privpli_inp)+
					($privppidtk1_inp)+
					($privppidtk2_inp)+
					($privppidtk3_inp)+
					($privppid_inp)+
					($privstaffppid_inp)+
					($privclco_inp)+
					($privstaffpli_inp)+
					($privcc_inp)+
					($privcs_inp)+
					($privumum_inp)+
					($privbtki_inp)+
					($privtl_inp),"-");
		
		$random_salt	= hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE));
		$password 		= hash('sha512', $password . $random_salt);
        $sql = $pdoMYSQL->prepare("insert INTO users (
			nama,
			nip,
			username,
			sandi,
			email,
			password,
			salt,
			telp,
			tipologi,
			nama_kantor,
			kantor_eselon2,
			kantor_eselon2_detail,
			kantor_eselon3,
			kantor_eselon3_detail,
			kantor_eselon4,
			kantor_eselon4_detail,
			alamat_kantor,
			telp_kantor,
			jabatan,
			pangol,
			note,
			foto_profile,
			update_by,
			level,
			privimpor,
			privekspor,
			privintelijen,
			privli,
			privlki,
			privlkai,
			privnhi,
			privnip,
			privapoint,
			privrekapintel,
			privblokir,
			priveditblokir,
			privsurvailance,
			privatensiintel,
			privstaffintel,
			privstpi,
			privanalispenumpang,
			privatensipenumpang,
			privanalisyacht,
			privatensiyacht,
			privedityacht,
			privanalisplb,
			privatensiplb,
			priveditplb,
			privpenindakan,
			privreekspor,
			privpibk,
			privsbp,
			priveditsbp,
			privpjt,
			privcd,
			privstaffpenindakan,
			privlaporan,
			privlaporanplb,
			privlaporanyacht,
			privimpordatapib,
			privimpordatapeb,
			privimpordataspkpbm,
			privexecutive,
			privexelaporan,
			privexebulanan,
			privvillar,
			privpabean,
			privkoordagenfasilitaspusat,
			privkoordagenfasilitas,
			privagenfaskhusus,
			privagenfas,
			privstaffagenfas,
			privpabeanplb,
			privpabeanyacht,
			privjaminan,
			priveditjaminan,
			privmanifest,
			privmanifestplb,
			privmanifestyacht,
			privimpordatamanifest,
			priveditmanifest,
			privpli,
			privppidtk1,
			privppidtk2,
			privppidtk3,
			privppid,
			privstaffppid,
			privclco,
			privstaffpli,
			privcc,
			privcs,
			privumum,
			privbtki,
			privtl,
			notif_status,
			notif_time,
			user_uniq) 
		values (
			:nama,
			:nip,
			:username,
			:sandi,
			:email,
			:password,
			:salt,
			:telp,
			:tipologi,
			:nama_kantor,
			:kantor_eselon2,
			:kantor_eselon2_detail,
			:kantor_eselon3,
			:kantor_eselon3_detail,
			:kantor_eselon4,
			:kantor_eselon4_detail,
			:alamat_kantor,
			:telp_kantor,
			:jabatan,
			:pangol,
			:note,
			:foto_profile,
			:update_by,
			:level,
			:privimpor,
			:privekspor,
			:privintelijen,
			:privli,
			:privlki,
			:privlkai,
			:privnhi,
			:privnip,
			:privapoint,
			:privrekapintel,
			:privblokir,
			:priveditblokir,
			:privsurvailance,
			:privatensiintel,
			:privstaffintel,
			:privstpi,
			:privanalispenumpang,
			:privatensipenumpang,
			:privanalisyacht,
			:privatensiyacht,
			:privedityacht,
			:privanalisplb,
			:privatensiplb,
			:priveditplb,
			:privpenindakan,
			:privreekspor,
			:privpibk,
			:privsbp,
			:priveditsbp,
			:privpjt,
			:privcd,
			:privstaffpenindakan,
			:privlaporan,
			:privlaporanplb,
			:privlaporanyacht,
			:privimpordatapib,
			:privimpordatapeb,
			:privimpordataspkpbm,
			:privexecutive,
			:privexelaporan,
			:privexebulanan,
			:privvillar,
			:privpabean,
			:privkoordagenfasilitaspusat,
			:privkoordagenfasilitas,
			:privagenfaskhusus,
			:privagenfas,
			:privstaffagenfas,
			:privpabeanplb,
			:privpabeanyacht,
			:privjaminan,
			:priveditjaminan,
			:privmanifest,
			:privmanifestplb,
			:privmanifestyacht,
			:privimpordatamanifest,
			:priveditmanifest,
			:privpli,
			:privppidtk1,
			:privppidtk2,
			:privppidtk3,
			:privppid,
			:privstaffppid,
			:privclco,
			:privstaffpli,
			:privcc,
			:privcs,
			:privumum,
			:privbtki,
			:privtl,
			:notif_status,
			:notif_time,
			:user_uniq)");
		$sql->BindParam(':nama',$nama_pegawai);
		$sql->BindParam(':nip',$nip_pegawai);
		$sql->BindParam(':username',$username);
		$sql->BindParam(':sandi',$sandi);
		$sql->BindParam(':email',$email_input);
		$sql->BindParam(':password',$password);
		$sql->BindParam(':salt',$random_salt);
		$sql->BindParam(':telp',$telp_input);
		$sql->BindParam(':tipologi',$tipologi_input);
		$sql->BindParam(':nama_kantor',$nama_kantor_input);
		$sql->BindParam(':kantor_eselon2',$strataII_input);
		$sql->BindParam(':kantor_eselon2_detail',$eselon2_detail_input);
		$sql->BindParam(':kantor_eselon3',$strataIII_input);
		$sql->BindParam(':kantor_eselon3_detail',$eselon3_detail_input);
		$sql->BindParam(':kantor_eselon4',$strataIV_input);
		$sql->BindParam(':kantor_eselon4_detail',$eselon4_detail_input);
		$sql->BindParam(':alamat_kantor',$alamat_kantorINP);
		$sql->BindParam(':telp_kantor',$telp_kantorINP);
		$sql->BindParam(':jabatan',$jabatan_input);
		$sql->BindParam(':pangol',$pangol_input);
		$sql->BindParam(':note',$qoute_input);
		$sql->BindParam(':foto_profile',$default_foto);
		$sql->BindParam(':update_by',$nama);
		$sql->BindParam(':level',$plus);
		$sql->BindParam(':privimpor',$privimpor_inp);
		$sql->BindParam(':privekspor',$privekspor_inp);
		$sql->BindParam(':privintelijen',$privintelijen_inp);
		$sql->BindParam(':privli',$privli_inp);
		$sql->BindParam(':privlki',$privlki_inp);
		$sql->BindParam(':privlkai',$privlkai_inp);
		$sql->BindParam(':privnhi',$privnhi_inp);
		$sql->BindParam(':privnip',$privnip_inp);
		$sql->BindParam(':privapoint',$privapoint_inp);
		$sql->BindParam(':privrekapintel',$privrekapintel_inp);
		$sql->BindParam(':privblokir',$privblokir_inp);
		$sql->BindParam(':priveditblokir',$priveditblokir_inp);
		$sql->BindParam(':privsurvailance',$privsurvailance_inp);
		$sql->BindParam(':privatensiintel',$privatensiintel_inp);
		$sql->BindParam(':privstaffintel',$privstaffintel_inp);
		$sql->BindParam(':privstpi',$privstpi_inp);
		$sql->BindParam(':privanalispenumpang',$privanalispenumpang_inp);
		$sql->BindParam(':privatensipenumpang',$privatensipenumpang_inp);
		$sql->BindParam(':privanalisyacht',$privanalisyacht_inp);
		$sql->BindParam(':privatensiyacht',$privatensiyacht_inp);
		$sql->BindParam(':privedityacht',$privedityacht_inp);
		$sql->BindParam(':privanalisplb',$privanalisplb_inp);
		$sql->BindParam(':privatensiplb',$privatensiplb_inp);
		$sql->BindParam(':priveditplb',$priveditplb_inp);
		$sql->BindParam(':privpenindakan',$privpenindakan_inp);
		$sql->BindParam(':privreekspor',$privreekspor_inp);
		$sql->BindParam(':privpibk',$privpibk_inp);
		$sql->BindParam(':privsbp',$privsbp_inp);
		$sql->BindParam(':priveditsbp',$priveditsbp_inp);
		$sql->BindParam(':privpjt',$privpjt_inp);
		$sql->BindParam(':privcd',$privcd_inp);
		$sql->BindParam(':privstaffpenindakan',$privstaffpenindakan_inp);
		$sql->BindParam(':privlaporan',$privlaporan_inp);
		$sql->BindParam(':privlaporanplb',$privlaporanplb_inp);
		$sql->BindParam(':privlaporanyacht',$privlaporanyacht_inp);
		$sql->BindParam(':privimpordatapib',$privimpordatapib_inp);
		$sql->BindParam(':privimpordatapeb',$privimpordatapeb_inp);
		$sql->BindParam(':privimpordataspkpbm',$privimpordataspkpbm_inp);
		$sql->BindParam(':privexecutive',$privexecutive_inp);
		$sql->BindParam(':privexelaporan',$privexelaporan_inp);
		$sql->BindParam(':privexebulanan',$privexebulanan_inp);
		$sql->BindParam(':privvillar',$privvillar_inp);
		$sql->BindParam(':privpabean',$privpabean_inp);
		$sql->BindParam(':privkoordagenfasilitaspusat',$privkoordagenfasilitaspusat_inp);
		$sql->BindParam(':privkoordagenfasilitas',$privkoordagenfasilitas_inp);
		$sql->BindParam(':privagenfaskhusus',$privagenfaskhusus_inp);
		$sql->BindParam(':privagenfas',$privagenfas_inp);
		$sql->BindParam(':privstaffagenfas',$privstaffagenfas_inp);
		$sql->BindParam(':privpabeanplb',$privpabeanplb_inp);
		$sql->BindParam(':privpabeanyacht',$privpabeanyacht_inp);
		$sql->BindParam(':privjaminan',$privjaminan_inp);
		$sql->BindParam(':priveditjaminan',$priveditjaminan_inp);
		$sql->BindParam(':privmanifest',$privmanifest_inp);
		$sql->BindParam(':privmanifestplb',$privmanifestplb_inp);
		$sql->BindParam(':privmanifestyacht',$privmanifestyacht_inp);
		$sql->BindParam(':privimpordatamanifest',$privimpordatamanifest_inp);
		$sql->BindParam(':priveditmanifest',$priveditmanifest_inp);
		$sql->BindParam(':privpli',$privpli_inp);
		$sql->BindParam(':privppidtk1',$privppidtk1_inp);
		$sql->BindParam(':privppidtk2',$privppidtk2_inp);
		$sql->BindParam(':privppidtk3',$privppidtk3_inp);
		$sql->BindParam(':privppid',$privppid_inp);
		$sql->BindParam(':privstaffppid',$privstaffppid_inp);
		$sql->BindParam(':privclco',$privclco_inp);
		$sql->BindParam(':privstaffpli',$privstaffpli_inp);
		$sql->BindParam(':privcc',$privcc_inp);
		$sql->BindParam(':privcs',$privcs_inp);
		$sql->BindParam(':privumum',$privumum_inp);
		$sql->BindParam(':privbtki',$privbtki_inp);
		$sql->BindParam(':privtl',$privtl_inp);
		$sql->BindParam(':notif_status',$notif_status);
		$sql->BindParam(':notif_time',$notif_time);
		$sql->BindParam(':user_uniq',$uniq_char);
		
		if ($sql->execute()) {
			$sql_od = $pdoODBC->prepare("insert INTO users (
				nama,
				nip,
				username,
				sandi,
				email,
				password,
				salt,
				telp,
				tipologi,
				nama_kantor,
				kantor_eselon2,
				kantor_eselon2_detail,
				kantor_eselon3,
				kantor_eselon3_detail,
				kantor_eselon4,
				kantor_eselon4_detail,
				alamat_kantor,
				telp_kantor,
				jabatan,
				pangol,
				note,
				foto_profile,
				update_by,
				level,
				privimpor,
				privekspor,
				privintelijen,
				privli,
				privlki,
				privlkai,
				privnhi,
				privnip,
				privapoint,
				privrekapintel,
				privblokir,
				priveditblokir,
				privsurvailance,
				privatensiintel,
				privstaffintel,
				privstpi,
				privanalispenumpang,
				privatensipenumpang,
				privanalisyacht,
				privatensiyacht,
				privedityacht,
				privanalisplb,
				privatensiplb,
				priveditplb,
				privpenindakan,
				privreekspor,
				privpibk,
				privsbp,
				priveditsbp,
				privpjt,
				privcd,
				privstaffpenindakan,
				privlaporan,
				privlaporanplb,
				privlaporanyacht,
				privimpordatapib,
				privimpordatapeb,
				privimpordataspkpbm,
				privexecutive,
				privexelaporan,
				privexebulanan,
				privvillar,
				privpabean,
				privkoordagenfasilitaspusat,
				privkoordagenfasilitas,
				privagenfaskhusus,
				privagenfas,
				privstaffagenfas,
				privpabeanplb,
				privpabeanyacht,
				privjaminan,
				priveditjaminan,
				privmanifest,
				privmanifestplb,
				privmanifestyacht,
				privimpordatamanifest,
				priveditmanifest,
				privpli,
				privppidtk1,
				privppidtk2,
				privppidtk3,
				privppid,
				privstaffppid,
				privclco,
				privstaffpli,
				privcc,
				privcs,
				privumum,
				privbtki,
				privtl,
				notif_status,
				notif_time,
				user_uniq) 
			values (
				:nama,
				:nip,
				:username,
				:sandi,
				:email,
				:password,
				:salt,
				:telp,
				:tipologi,
				:nama_kantor,
				:kantor_eselon2,
				:kantor_eselon2_detail,
				:kantor_eselon3,
				:kantor_eselon3_detail,
				:kantor_eselon4,
				:kantor_eselon4_detail,
				:alamat_kantor,
				:telp_kantor,
				:jabatan,
				:pangol,
				:note,
				:foto_profile,
				:update_by,
				:level,
				:privimpor,
				:privekspor,
				:privintelijen,
				:privli,
				:privlki,
				:privlkai,
				:privnhi,
				:privnip,
				:privapoint,
				:privrekapintel,
				:privblokir,
				:priveditblokir,
				:privsurvailance,
				:privatensiintel,
				:privstaffintel,
				:privstpi,
				:privanalispenumpang,
				:privatensipenumpang,
				:privanalisyacht,
				:privatensiyacht,
				:privedityacht,
				:privanalisplb,
				:privatensiplb,
				:priveditplb,
				:privpenindakan,
				:privreekspor,
				:privpibk,
				:privsbp,
				:priveditsbp,
				:privpjt,
				:privcd,
				:privstaffpenindakan,
				:privlaporan,
				:privlaporanplb,
				:privlaporanyacht,
				:privimpordatapib,
				:privimpordatapeb,
				:privimpordataspkpbm,
				:privexecutive,
				:privexelaporan,
				:privexebulanan,
				:privvillar,
				:privpabean,
				:privkoordagenfasilitaspusat,
				:privkoordagenfasilitas,
				:privagenfaskhusus,
				:privagenfas,
				:privstaffagenfas,
				:privpabeanplb,
				:privpabeanyacht,
				:privjaminan,
				:priveditjaminan,
				:privmanifest,
				:privmanifestplb,
				:privmanifestyacht,
				:privimpordatamanifest,
				:priveditmanifest,
				:privpli,
				:privppidtk1,
				:privppidtk2,
				:privppidtk3,
				:privppid,
				:privstaffppid,
				:privclco,
				:privstaffpli,
				:privcc,
				:privcs,
				:privumum,
				:privbtki,
				:privtl,
				:notif_status,
				:notif_time,
				:user_uniq)");
			$sql_od->BindParam(':nama',$nama_pegawai);
			$sql_od->BindParam(':nip',$nip_pegawai);
			$sql_od->BindParam(':username',$username);
			$sql_od->BindParam(':sandi',$sandi);
			$sql_od->BindParam(':email',$email_input);
			$sql_od->BindParam(':password',$password);
			$sql_od->BindParam(':salt',$random_salt);
			$sql_od->BindParam(':telp',$telp_input);
			$sql_od->BindParam(':tipologi',$tipologi_input);
			$sql_od->BindParam(':nama_kantor',$nama_kantor_input);
			$sql_od->BindParam(':kantor_eselon2',$strataII_input);
			$sql_od->BindParam(':kantor_eselon2_detail',$eselon2_detail_input);
			$sql_od->BindParam(':kantor_eselon3',$strataIII_input);
			$sql_od->BindParam(':kantor_eselon3_detail',$eselon3_detail_input);
			$sql_od->BindParam(':kantor_eselon4',$strataIV_input);
			$sql_od->BindParam(':kantor_eselon4_detail',$eselon4_detail_input);
			$sql_od->BindParam(':alamat_kantor',$alamat_kantorINP);
			$sql_od->BindParam(':telp_kantor',$telp_kantorINP);
			$sql_od->BindParam(':jabatan',$jabatan_input);
			$sql_od->BindParam(':pangol',$pangol_input);
			$sql_od->BindParam(':note',$qoute_input);
			$sql_od->BindParam(':foto_profile',$default_foto);
			$sql_od->BindParam(':update_by',$nama);
			$sql_od->BindParam(':level',$plus);
			$sql_od->BindParam(':privimpor',$privimpor_inp);
			$sql_od->BindParam(':privekspor',$privekspor_inp);
			$sql_od->BindParam(':privintelijen',$privintelijen_inp);
			$sql_od->BindParam(':privli',$privli_inp);
			$sql_od->BindParam(':privlki',$privlki_inp);
			$sql_od->BindParam(':privlkai',$privlkai_inp);
			$sql_od->BindParam(':privnhi',$privnhi_inp);
			$sql_od->BindParam(':privnip',$privnip_inp);
			$sql_od->BindParam(':privapoint',$privapoint_inp);
			$sql_od->BindParam(':privrekapintel',$privrekapintel_inp);
			$sql_od->BindParam(':privblokir',$privblokir_inp);
			$sql_od->BindParam(':priveditblokir',$priveditblokir_inp);
			$sql_od->BindParam(':privsurvailance',$privsurvailance_inp);
			$sql_od->BindParam(':privatensiintel',$privatensiintel_inp);
			$sql_od->BindParam(':privstaffintel',$privstaffintel_inp);
			$sql_od->BindParam(':privstpi',$privstpi_inp);
			$sql_od->BindParam(':privanalispenumpang',$privanalispenumpang_inp);
			$sql_od->BindParam(':privatensipenumpang',$privatensipenumpang_inp);
			$sql_od->BindParam(':privanalisyacht',$privanalisyacht_inp);
			$sql_od->BindParam(':privatensiyacht',$privatensiyacht_inp);
			$sql_od->BindParam(':privedityacht',$privedityacht_inp);
			$sql_od->BindParam(':privanalisplb',$privanalisplb_inp);
			$sql_od->BindParam(':privatensiplb',$privatensiplb_inp);
			$sql_od->BindParam(':priveditplb',$priveditplb_inp);
			$sql_od->BindParam(':privpenindakan',$privpenindakan_inp);
			$sql_od->BindParam(':privreekspor',$privreekspor_inp);
			$sql_od->BindParam(':privpibk',$privpibk_inp);
			$sql_od->BindParam(':privsbp',$privsbp_inp);
			$sql_od->BindParam(':priveditsbp',$priveditsbp_inp);
			$sql_od->BindParam(':privpjt',$privpjt_inp);
			$sql_od->BindParam(':privcd',$privcd_inp);
			$sql_od->BindParam(':privstaffpenindakan',$privstaffpenindakan_inp);
			$sql_od->BindParam(':privlaporan',$privlaporan_inp);
			$sql_od->BindParam(':privlaporanplb',$privlaporanplb_inp);
			$sql_od->BindParam(':privlaporanyacht',$privlaporanyacht_inp);
			$sql_od->BindParam(':privimpordatapib',$privimpordatapib_inp);
			$sql_od->BindParam(':privimpordatapeb',$privimpordatapeb_inp);
			$sql_od->BindParam(':privimpordataspkpbm',$privimpordataspkpbm_inp);
			$sql_od->BindParam(':privexecutive',$privexecutive_inp);
			$sql_od->BindParam(':privexelaporan',$privexelaporan_inp);
			$sql_od->BindParam(':privexebulanan',$privexebulanan_inp);
			$sql_od->BindParam(':privvillar',$privvillar_inp);
			$sql_od->BindParam(':privpabean',$privpabean_inp);
			$sql_od->BindParam(':privkoordagenfasilitaspusat',$privkoordagenfasilitaspusat_inp);
			$sql_od->BindParam(':privkoordagenfasilitas',$privkoordagenfasilitas_inp);
			$sql_od->BindParam(':privagenfaskhusus',$privagenfaskhusus_inp);
			$sql_od->BindParam(':privagenfas',$privagenfas_inp);
			$sql_od->BindParam(':privstaffagenfas',$privstaffagenfas_inp);
			$sql_od->BindParam(':privpabeanplb',$privpabeanplb_inp);
			$sql_od->BindParam(':privpabeanyacht',$privpabeanyacht_inp);
			$sql_od->BindParam(':privjaminan',$privjaminan_inp);
			$sql_od->BindParam(':priveditjaminan',$priveditjaminan_inp);
			$sql_od->BindParam(':privmanifest',$privmanifest_inp);
			$sql_od->BindParam(':privmanifestplb',$privmanifestplb_inp);
			$sql_od->BindParam(':privmanifestyacht',$privmanifestyacht_inp);
			$sql_od->BindParam(':privimpordatamanifest',$privimpordatamanifest_inp);
			$sql_od->BindParam(':priveditmanifest',$priveditmanifest_inp);
			$sql_od->BindParam(':privpli',$privpli_inp);
			$sql_od->BindParam(':privppidtk1',$privppidtk1_inp);
			$sql_od->BindParam(':privppidtk2',$privppidtk2_inp);
			$sql_od->BindParam(':privppidtk3',$privppidtk3_inp);
			$sql_od->BindParam(':privppid',$privppid_inp);
			$sql_od->BindParam(':privstaffppid',$privstaffppid_inp);
			$sql_od->BindParam(':privclco',$privclco_inp);
			$sql_od->BindParam(':privstaffpli',$privstaffpli_inp);
			$sql_od->BindParam(':privcc',$privcc_inp);
			$sql_od->BindParam(':privcs',$privcs_inp);
			$sql_od->BindParam(':privumum',$privumum_inp);
			$sql_od->BindParam(':privbtki',$privbtki_inp);
			$sql_od->BindParam(':privtl',$privtl_inp);
			$sql_od->BindParam(':notif_status',$notif_status);
			$sql_od->BindParam(':notif_time',$notif_time);
			$sql_od->BindParam(':user_uniq',$uniq_char);
			if($sql_od->execute()) {
				ob_start();
				include "view_search.php";
				$html = ob_get_contents();
				ob_end_clean();
				
				$response = array(
					'status'=>'sukses',
					'pesan'=>'Data Berhasil Disimpan', 
					'html'=>$html 
				);
			} else {
				$response = array(
					'status'=>'gagal',
					'pesan'=>'Data Gagal Disimpan [ SQL SERVER ]',
				);
			}
		} else {
			$response = array(
				'status'=>'gagal', 
				'pesan'=>'Data Gagal Disimpan [ MYSQL SERVER ]',
			);
		}
	}
echo json_encode($response);
}
?>
