<?php
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
require '../../_JS/PHPMailer/src/Exception.php';
require '../../_JS/PHPMailer/src/PHPMailer.php';
require '../../_JS/PHPMailer/src/SMTP.php';
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
			'status'=>'Gagal', // Set status
			'pesan'=>'Data Email Tidak Valid', // Set pesan
			'html'=>$html // Set html
			);
		$error_msg .= '1';
	};
	if (empty($error_msg)) {
		$id 				= $_POST['id'];
		$sql_get = $pdoMYSQL->prepare("SELECT sandi FROM users WHERE id=:id ORDER BY id DESC");
		$sql_get->bindParam(':id', $id);
		$sql_get->execute();
		$data_get = $sql_get->fetch();
		$status_sandi	= $data_get["sandi"];
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
		$privimpor_inp = $_POST['privimpor'];
		$privekspor_inp = $_POST['privekspor'];
		$privintelijen_inp = $_POST['privintelijen'];
		$privli_inp = $_POST['privli'];
		$privlki_inp = $_POST['privlki'];
		$privlkai_inp = $_POST['privlkai'];
		$privnhi_inp = $_POST['privnhi'];
		$privnip_inp = $_POST['privnip'];
		$privapoint_inp = $_POST['privapoint'];
		$privrekapintel_inp = $_POST['privrekapintel'];
		$privblokir_inp = $_POST['privblokir'];
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

		$random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE));
		$password 	= hash('sha512', $password . $random_salt);
		$sqlcek = $pdoMYSQL->prepare("SELECT * FROM users WHERE id=:id");
		$sqlcek->bindParam(':id', $id);
		$sqlcek->execute(); // Eksekusi / Jalankan query
		$data = $sqlcek->fetch(); // Ambil data dari hasil eksekusi $sqlcek

        $sql = $pdoMYSQL->prepare("UPDATE users SET
				nama=:nama,
				nip=:nip,
				username=:username,
				sandi=:sandi,
				email=:email,
				password=:password,
				salt=:salt,
				telp=:telp,
				tipologi=:tipologi,
				nama_kantor=:nama_kantor,
				kantor_eselon2=:kantor_eselon2,
				kantor_eselon2_detail=:kantor_eselon2_detail,
				kantor_eselon3=:kantor_eselon3,
				kantor_eselon3_detail=:kantor_eselon3_detail,
				kantor_eselon4=:kantor_eselon4,
				kantor_eselon4_detail=:kantor_eselon4_detail,
				alamat_kantor=:alamat_kantor,
				telp_kantor=:telp_kantor,
				jabatan=:jabatan,
				pangol=:pangol,
				note=:note,
				foto_profile=:foto_profile,
				update_by=:update_by,
				level=:level,
				privimpor=:privimpor,
				privekspor=:privekspor,
				privintelijen=:privintelijen,
				privli=:privli,
				privlki=:privlki,
				privlkai=:privlkai,
				privnhi=:privnhi,
				privnip=:privnip,
				privapoint=:privapoint,
				privrekapintel=:privrekapintel,
				privblokir=:privblokir,
				priveditblokir=:priveditblokir,
				privsurvailance=:privsurvailance,
				privatensiintel=:privatensiintel,
				privstaffintel=:privstaffintel,
				privstpi=:privstpi,
				privanalispenumpang=:privanalispenumpang,
				privatensipenumpang=:privatensipenumpang,
				privanalisyacht=:privanalisyacht,
				privatensiyacht=:privatensiyacht,
				privedityacht=:privedityacht,
				privanalisplb=:privanalisplb,
				privatensiplb=:privatensiplb,
				priveditplb=:priveditplb,
				privpenindakan=:privpenindakan,
				privreekspor=:privreekspor,
				privpibk=:privpibk,
				privsbp=:privsbp,
				priveditsbp=:priveditsbp,
				privpjt=:privpjt,
				privcd=:privcd,
				privstaffpenindakan=:privstaffpenindakan,
				privlaporan=:privlaporan,
				privlaporanplb=:privlaporanplb,
				privlaporanyacht=:privlaporanyacht,
				privimpordatapib=:privimpordatapib,
				privimpordatapeb=:privimpordatapeb,
				privimpordataspkpbm=:privimpordataspkpbm,
				privexecutive=:privexecutive,
				privexelaporan=:privexelaporan,
				privexebulanan=:privexebulanan,
				privvillar=:privvillar,
				privpabean=:privpabean,
				privkoordagenfasilitaspusat=:privkoordagenfasilitaspusat,
				privkoordagenfasilitas=:privkoordagenfasilitas,
				privagenfaskhusus=:privagenfaskhusus,
				privagenfas=:privagenfas,
				privstaffagenfas=:privstaffagenfas,
				privpabeanplb=:privpabeanplb,
				privpabeanyacht=:privpabeanyacht,
				privjaminan=:privjaminan,
				priveditjaminan=:priveditjaminan,
				privmanifest=:privmanifest,
				privmanifestplb=:privmanifestplb,
				privmanifestyacht=:privmanifestyacht,
				privimpordatamanifest=:privimpordatamanifest,
				priveditmanifest=:priveditmanifest,
				privpli=:privpli,
				privppidtk1=:privppidtk1,
				privppidtk2=:privppidtk2,
				privppidtk3=:privppidtk3,
				privppid=:privppid,
				privstaffppid=:privstaffppid,
				privclco=:privclco,
				privstaffpli=:privstaffpli,
				privcc=:privcc,
				privcs=:privcs,
				privumum=:privumum,
				privbtki=:privbtki,
				privtl=:privtl
				WHERE id=:id");

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
		$sql->bindParam(':id', $id);
		if($sql->execute()) {
			$sql_od = $pdoODBC->prepare("UPDATE users SET
				nama=:nama,
				nip=:nip,
				username=:username,
				sandi=:sandi,
				email=:email,
				password=:password,
				salt=:salt,
				telp=:telp,
				tipologi=:tipologi,
				nama_kantor=:nama_kantor,
				kantor_eselon2=:kantor_eselon2,
				kantor_eselon2_detail=:kantor_eselon2_detail,
				kantor_eselon3=:kantor_eselon3,
				kantor_eselon3_detail=:kantor_eselon3_detail,
				kantor_eselon4=:kantor_eselon4,
				kantor_eselon4_detail=:kantor_eselon4_detail,
				alamat_kantor=:alamat_kantor,
				telp_kantor=:telp_kantor,
				jabatan=:jabatan,
				pangol=:pangol,
				note=:note,
				foto_profile=:foto_profile,
				update_by=:update_by,
				level=:level,
				privimpor=:privimpor,
				privekspor=:privekspor,
				privintelijen=:privintelijen,
				privli=:privli,
				privlki=:privlki,
				privlkai=:privlkai,
				privnhi=:privnhi,
				privnip=:privnip,
				privapoint=:privapoint,
				privrekapintel=:privrekapintel,
				privblokir=:privblokir,
				priveditblokir=:priveditblokir,
				privsurvailance=:privsurvailance,
				privatensiintel=:privatensiintel,
				privstaffintel=:privstaffintel,
				privstpi=:privstpi,
				privanalispenumpang=:privanalispenumpang,
				privatensipenumpang=:privatensipenumpang,
				privanalisyacht=:privanalisyacht,
				privatensiyacht=:privatensiyacht,
				privedityacht=:privedityacht,
				privanalisplb=:privanalisplb,
				privatensiplb=:privatensiplb,
				priveditplb=:priveditplb,
				privpenindakan=:privpenindakan,
				privreekspor=:privreekspor,
				privpibk=:privpibk,
				privsbp=:privsbp,
				priveditsbp=:priveditsbp,
				privpjt=:privpjt,
				privcd=:privcd,
				privstaffpenindakan=:privstaffpenindakan,
				privlaporan=:privlaporan,
				privlaporanplb=:privlaporanplb,
				privlaporanyacht=:privlaporanyacht,
				privimpordatapib=:privimpordatapib,
				privimpordatapeb=:privimpordatapeb,
				privimpordataspkpbm=:privimpordataspkpbm,
				privexecutive=:privexecutive,
				privexelaporan=:privexelaporan,
				privexebulanan=:privexebulanan,
				privvillar=:privvillar,
				privpabean=:privpabean,
				privkoordagenfasilitaspusat=:privkoordagenfasilitaspusat,
				privkoordagenfasilitas=:privkoordagenfasilitas,
				privagenfaskhusus=:privagenfaskhusus,
				privagenfas=:privagenfas,
				privstaffagenfas=:privstaffagenfas,
				privpabeanplb=:privpabeanplb,
				privpabeanyacht=:privpabeanyacht,
				privjaminan=:privjaminan,
				priveditjaminan=:priveditjaminan,
				privmanifest=:privmanifest,
				privmanifestplb=:privmanifestplb,
				privmanifestyacht=:privmanifestyacht,
				privimpordatamanifest=:privimpordatamanifest,
				priveditmanifest=:priveditmanifest,
				privpli=:privpli,
				privppidtk1=:privppidtk1,
				privppidtk2=:privppidtk2,
				privppidtk3=:privppidtk3,
				privppid=:privppid,
				privstaffppid=:privstaffppid,
				privclco=:privclco,
				privstaffpli=:privstaffpli,
				privcc=:privcc,
				privcs=:privcs,
				privumum=:privumum,
				privbtki=:privbtki,
				privtl=:privtl
				WHERE id=:id");

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
		$sql_od->bindParam(':id', $id);
		if($sql_od->execute()) {
			if($status_sandi!=$sandi) {
		  		$mail = new PHPMailer(true);
		  		try {
					$mail->isSMTP();
					$mail->SMTPAuth = true;
					$mail->Host = '10.241.29.65';
					$mail->Username = 'bravobeacukai@customs.go.id';
					$mail->Password = 'Spl1tDJBC#';
					//Set the SMTP port number - likely to be 25, 465 or 587
					$mail->SMTPSecure = 'ssl';
					$mail->Port = 465;
					$mail->CharSet = 'utf-8';
					$mail->smtpConnect(
						array(
							"ssl" => array(
								"verify_peer" => false,
								"verify_depth" => 3,
								"verify_peer_name" => false,
								"allow_self_signed" => true
								)
							)
					);
					$mail->setFrom('bravobeacukai@customs.go.id', 'SPLIT (Sistem Pendukung Layanan Informasi Terpadu)');
					$mail->addAddress($email_input, $nama_pegawai);
					$mail->isHTML(true);
					$mail->Subject = 'Pemberitahuan Perubahan [Reset] Akun SPLIT';
					$mail->Body =
					'
					<span style="font-family:source-sans-pro, Arial, sans-serif; font-size:12px;">
					Salam Bravo Bea Cukai,
					<br>
					Terima Kasih telah menggunakan layanan Aplikasi SPLIT (Sistem Pendukung Layanan Informasi Terpadu).
					<br><br>
					Akun SPLIT Anda berhasil dilakukan perubahan. silahkan login dengan username dan password yang tertera di bawah ini.
					<br>
					<span style="font-family:source-sans-pro, Arial, sans-serif; font-size:12px; font-style:italic; color:#000000">
					<table width="30%" border="0">
					  <tbody>
						<tr>
						  <td scope="col" width="10%"><b>Username</b></td>
						  <td scope="col" width="20%">:&nbsp;&nbsp; '.$email_input.'</td>
						</tr>
						<tr>
						  <td scope="col"><b>Password</b></td>
						  <td scope="col">:&nbsp;&nbsp; '.$sandi.'</td>
						</tr>
					  </tbody>
					</table>
					</span>
					Dalam rangka tindakan pengamanan terhadap akun SPLIT silahkan melakukan perubahan password dalam hal terjadi aktivitas
					yang mencurigakan.
					<br><br>
					Demikian kami sampaikan atas perhatiannya dan kerjasamanya kami ucapkan terima kasih.
					<br><br><br>
					<b>Salam Hormat</b>
					</span>
					<br>
					<span style="color:#132AE3"><b>#Beacukai</b></span><span style="color:#F10004"><b>makinbaik</b></span>
					<br><br><br>

					<span style="font-family:source-sans-pro, Arial, sans-serif; font-size:11px; font-style:italic; color:#8E8E8E">
					<b>PENTING</b><br>
					"Sesuai dengan Keputusan Menteri Keuangan Nomor 512/KMK.01/2009 tentang Kebijakan dan Standar Penggunaan Akun dan Kata Sandi,
					 Surat Elektronik, dan Internet di Lingkungan Departemen Keuangan bahwa Unit TIK eselon I yang memiliki sistem nama domain
					 masing-masing menambahkan pernyataan disclaimer pada setiap Surat Elektronik untuk mencegah tuntutan hukum atas penggunaan
					 Surat Elektronik , maka email ini (termasuk seluruh lampirannya bila ada) hanya ditujukan kepada penerima sebagaimana dimaksud
					 pada tujuan email ini. Email ini dapat berisi informasi atau hal-hal yang secara hukum bersifat rahasia.
					 Jika terdapat kesalahan pengiriman (Anda bukan penerima yang dituju), maka Anda tidak diperkenankan untuk memanfaatkan,
					 menyebarkan, mendistribusikan, atau menggandakan email ini beserta seluruh lampirannya. Mohon kerjasamanya untuk segera
					 menghubungi Pusintek di alamat email yang tercantum di atas serta menghapus e-mail ini beserta seluruh lampirannya.
					 Semua pendapat yang ada dalam e-mail ini merupakan pendapat pribadi dari pengirim yang bersangkutan dan tidak serta merta
					 mencerminkan pandangan Kementerian Keuangan"
					</span>
					';
				$mail->send();
				}	catch (Exception $e) {
				   $response = array(
					  'status'=>'gagal', // Set status
					  'pesan'=>'Message could not be sent. Mailer Error: ', $mail->ErrorInfo, // Set pesan
					  'html'=>$html // Set html
				  );
				}
			}
			ob_start();
			include "view_search.php";
			$html = ob_get_contents();
			ob_end_clean();

			$response = array(
				'status'=>'sukses',
				'pesan'=>'Data Berhasil Dirubah',
				'html'=>$html
			);
		} else {
			$response = array(
				'status'=>'gagal',
				'pesan'=>'Data Gagal Dirubah [SQL SERVER]',
			);
		}
		} else {
			$response = array(
				'status'=>'gagal',
				'pesan'=>'Data Gagal Dirubah [MYSQL SERVER]',
			);
		}
	}
echo json_encode($response);
}
?>
