<?php
include "LIBRARY/CONFIG.php";
sec_session_start();
//kolom apa saja yang akan ditampilkan
$columns = array(
	'id','nama','nip','username','sandi','password','salt','status','hak_akses','kantor_eselon2','kantor_eselon2_detail','kantor_eselon3',
	'kantor_eselon3_detail','kantor_eselon4','kantor_eselon4_detail','tipologi','nama_kantor','alamat_kantor','telp_kantor','jabatan',
	'pangol','email','telp','note','foto_profile','privimpor','privekspor','privintelijen','privli','privlki','privlkai','privnhi',
	'privnip','privapoint','privrekapintel','privblokir','priveditblokir','privsurvailance','privatensiintel','privstaffintel','privstpi',
	'privanalispenumpang','privatensipenumpang','privanalisyacht','privatensiyacht','privedityacht','privanalisplb','privatensiplb',
	'priveditplb','privpenindakan','privreekspor','privpibk','privsbp','priveditsbp','privpjt','privcd','privstaffpenindakan','privlaporan',
	'privlaporanplb','privlaporanyacht','privimpordatapib','privimpordatapeb','privimpordataspkpbm','privexecutive','privexelaporan',
	'privexebulanan','privvillar','privpabean','privkoordagenfasilitaspusat','privkoordagenfasilitas','privagenfaskhusus','privagenfas',
	'privstaffagenfas','privpabeanplb','privpabeanyacht','privimpordatamanifest','privjaminan','priveditjaminan','privmanifest',
	'privmanifestplb','privmanifestyacht','priveditmanifest','privpli','privppidtk1','privppidtk2','privppidtk3','privppid','privstaffppid',
	'privclco','privstaffpli','privcc','privcs','privumum','privbtki','privtl','level','notif_status',
	'notif_time');

    $datatable->set_numbering_status(0);
	$datatable->set_order_by("users.id");
	$datatable->set_order_type("desc");

//jika ada request filter
if (isset($_POST['nama_cari'])) {
	$prepared_data = array();
	$nama_cari_ 	= '%'.$_POST["nama_cari"].'%';
	$nip_cari_ 		= '%'.$_POST["nip_cari"].'%';
	$email_cari_ 	= '%'.$_POST["email_cari"].'%';
	$telp_cari_ 	= '%'.$_POST["telp_cari"].'%';
	
	if ($nama_cari_!="")	{
		$data_nama_cari			= "WHERE nama LIKE ?";
		$prepare_nama_cari		= array("nama" => $nama_cari_);
		$prepared_data 			= array_merge($prepared_data,$prepare_nama_cari);
		}
	if ($nip_cari_!="")	{
		$data_nip_cari			= "AND nip LIKE ?";
		$prepare_nip_cari		= array("nip" => $nip_cari_);
		$prepared_data 			= array_merge($prepared_data,$prepare_nip_cari);
		}
	if ($email_cari_!="")	{
		$data_email_cari		= "AND email LIKE ?";
		$prepare_email_cari		= array("email" => $email_cari_);
		$prepared_data 			= array_merge($prepared_data,$prepare_email_cari);
		}
	if ($telp_cari_!="")	{
		$data_telp_cari			= "AND telp LIKE ?";
		$prepare_telp_cari		= array("telp" => $telp_cari_);
		$prepared_data 			= array_merge($prepared_data,$prepare_telp_cari);
		}
	if ($_POST["strataII2"]!="")	{
		$strCari="$strCari AND kantor_eselon2=?";
		$prepare_stII_cari 		= array("kantor_eselon2" => $_POST["strataII2"]);
		$prepared_data 			= array_merge($prepared_data,$prepare_stII_cari);
	}
	if ($_POST["strataIII2"]!="")	{
		$strCari="$strCari AND kantor_eselon3=?";
		$prepare_stIII_cari 	= array("kantor_eselon3" => $_POST["strataIII2"]);
		$prepared_data 			= array_merge($prepared_data,$prepare_stIII_cari);
		}
	if ($_POST["strataIV2"]!="")	{
		$strCari="$strCari AND kantor_eselon4=?";
		$prepare_stIV_cari		= array("kantor_eselon4" => $_POST["strataIV2"]);
		$prepared_data 			= array_merge($prepared_data,$prepare_stIV_cari);
		}
	if ($_POST["jabatan_cari"]!="")	{
		$strCari="$strCari AND jabatan=?";
		$prepare_jabatan_cari	= array("jabatan" => $_POST["jabatan_cari"]);
		$prepared_data 			= array_merge($prepared_data,$prepare_jabatan_cari);
		}
		
	$query = $datatable->get_custom(
"SELECT
	*
FROM
	users $data_nama_cari $data_nip_cari $data_email_cari $data_telp_cari $strCari",$columns,$prepared_data);
	
} else {
	$query = $datatable->get_custom("SELECT * FROM users",$columns);
}
$data = array();
$i=1;
foreach ($query	as $value) {
$ResultData = array();	
	if	($value->status=='1') {	$status_user = 'Disable';}
elseif	($value->status=='2') {	$status_user = 'Delete';}
else{$status_user = 'Active'; }

if($_SESSION['akses']=="admin" and $_SESSION['ex_level']>=60) { 
$ADM_EDIT = 
"<a href='javascript:void();' data-toggle='modal' data-target='#modal-pegawai' 
	onclick='edit(".$value->id.");' class='btn-sm btn-info' data-placement='bottom' title='Edit'>
	<span class='glyphicon glyphicon-pencil'></span>
</a>".
"<a href='javascript:void();' data-toggle='modal' data-target='#delete-modal'
	onclick='hapus(".$value->id.");' class='btn-sm bg-maroon' data-placement='bottom' title='Delete'>
	<span class='glyphicon glyphicon-trash'></span>
</a>".
"<a href='javascript:void();' data-toggle='modal' data-target='#modal-active'
	onclick='active(".$value->id.");' class='btn-sm btn-success' data-placement='bottom' title='Active'>
	<span class='glyphicon glyphicon-ok'></span>
</a>".
"<a href='javascript:void();' data-toggle='modal' data-target='#modal-active'
	onclick='disable(".$value->id.");' class='btn-sm btn-danger' data-placement='bottom' title='Disable'>
	<span class='glyphicon glyphicon-remove'></span>
</a>";
} else {
$ADM_EDIT = 
"<a href='javascript:void();' data-toggle='modal' data-target='#modal-pegawai' 
	onclick='edit(".$value->id.");' class='btn-sm btn-info' data-placement='bottom' title='Edit'>
	<span class='glyphicon glyphicon-pencil'></span>
</a>";
};
if ($value->privimpor=='-1-') { $VAL1= 'checked'; } else { $VAL1= ''; }
if ($value->privekspor=='-1-') { $VAL2= 'checked'; } else { $VAL2= ''; }
if ($value->privintelijen=='-1-') { $VAL3= 'checked'; } else { $VAL3= ''; }
if ($value->privli=='-1-') { $VAL4= 'checked'; } else { $VAL4= ''; }
if ($value->privlki=='-1-') { $VAL5= 'checked'; } else { $VAL5= ''; }
if ($value->privlkai=='-1-') { $VAL6= 'checked'; } else { $VAL6= ''; }
if ($value->privnhi=='-1-') { $VAL7= 'checked'; } else { $VAL7= ''; }
if ($value->privnip=='-1-') { $VAL8= 'checked'; } else { $VAL8= ''; }
if ($value->privapoint=='-1-') { $VAL9= 'checked'; } else { $VAL9= ''; }
if ($value->privrekapintel=='-1-') { $VAL10= 'checked'; } else { $VAL10= ''; }
if ($value->privblokir=='-1-') { $VAL11= 'checked'; } else { $VAL11= ''; }
if ($value->priveditblokir=='-1-') { $VAL12= 'checked'; } else { $VAL12= ''; }
if ($value->privsurvailance=='-1-') { $VAL13= 'checked'; } else { $VAL13= ''; }
if ($value->privatensiintel=='-1-') { $VAL14= 'checked'; } else { $VAL14= ''; }
if ($value->privstaffintel=='-1-') { $VAL15= 'checked'; } else { $VAL15= ''; }
if ($value->privstpi=='-1-') { $VAL16= 'checked'; } else { $VAL16= ''; }
if ($value->privanalispenumpang=='-1-') { $VAL17= 'checked'; } else { $VAL17= ''; }
if ($value->privatensipenumpang=='-1-') { $VAL18= 'checked'; } else { $VAL18= ''; }
if ($value->privanalisyacht=='-1-') { $VAL19= 'checked'; } else { $VAL19= ''; }
if ($value->privatensiyacht=='-1-') { $VAL20= 'checked'; } else { $VAL20= ''; }
if ($value->privedityacht=='-1-') { $VAL21= 'checked'; } else { $VAL21= ''; }
if ($value->privanalisplb=='-1-') { $VAL22= 'checked'; } else { $VAL22= ''; }
if ($value->privatensiplb=='-1-') { $VAL23= 'checked'; } else { $VAL23= ''; }
if ($value->priveditplb=='-1-') { $VAL24= 'checked'; } else { $VAL24= ''; }
if ($value->privpenindakan=='-1-') { $VAL25= 'checked'; } else { $VAL25= ''; }
if ($value->privreekspor=='-1-') { $VAL26= 'checked'; } else { $VAL26= ''; }
if ($value->privpibk=='-1-') { $VAL27= 'checked'; } else { $VAL27= ''; }
if ($value->privsbp=='-1-') { $VAL28= 'checked'; } else { $VAL28= ''; }
if ($value->priveditsbp=='-1-') { $VAL29= 'checked'; } else { $VAL29= ''; }
if ($value->privpjt=='-1-') { $VAL30= 'checked'; } else { $VAL30= ''; }
if ($value->privcd=='-1-') { $VAL31= 'checked'; } else { $VAL31= ''; }
if ($value->privstaffpenindakan=='-1-') { $VAL32= 'checked'; } else { $VAL32= ''; }
if ($value->privlaporan=='-1-') { $VAL33= 'checked'; } else { $VAL33= ''; }
if ($value->privlaporanplb=='-1-') { $VAL34= 'checked'; } else { $VAL34= ''; }
if ($value->privlaporanyacht=='-1-') { $VAL35= 'checked'; } else { $VAL35= ''; }
if ($value->privimpordatapib=='-1-') { $VAL36= 'checked'; } else { $VAL36= ''; }
if ($value->privimpordatapeb=='-1-') { $VAL37= 'checked'; } else { $VAL37= ''; }
if ($value->privimpordataspkpbm=='-1-') { $VAL38= 'checked'; } else { $VAL38= ''; }
if ($value->privexecutive=='-1-') { $VAL39= 'checked'; } else { $VAL39= ''; }
if ($value->privexelaporan=='-1-') { $VAL40= 'checked'; } else { $VAL40= ''; }
if ($value->privexebulanan=='-1-') { $VAL41= 'checked'; } else { $VAL41= ''; }
if ($value->privvillar=='-1-') { $VAL42= 'checked'; } else { $VAL42= ''; }
if ($value->privpabean=='-1-') { $VAL43= 'checked'; } else { $VAL43= ''; }
if ($value->privkoordagenfasilitaspusat=='-1-') { $VAL44= 'checked'; } else { $VAL44= ''; }
if ($value->privkoordagenfasilitas=='-1-') { $VAL45= 'checked'; } else { $VAL45= ''; }
if ($value->privagenfaskhusus=='-1-') { $VAL46= 'checked'; } else { $VAL46= ''; }
if ($value->privagenfas=='-1-') { $VAL47= 'checked'; } else { $VAL47= ''; }
if ($value->privstaffagenfas=='-1-') { $VAL48= 'checked'; } else { $VAL48= ''; }
if ($value->privpabeanplb=='-1-') { $VAL49= 'checked'; } else { $VAL49= ''; }
if ($value->privpabeanyacht=='-1-') { $VAL50= 'checked'; } else { $VAL50= ''; }
if ($value->privimpordatamanifest=='-1-') { $VAL51= 'checked'; } else { $VAL51= ''; }
if ($value->privjaminan=='-1-') { $VAL52= 'checked'; } else { $VAL52= ''; }
if ($value->priveditjaminan=='-1-') { $VAL53= 'checked'; } else { $VAL53= ''; }
if ($value->privmanifest=='-1-') { $VAL54= 'checked'; } else { $VAL54= ''; }
if ($value->privmanifestplb=='-1-') { $VAL55= 'checked'; } else { $VAL55= ''; }
if ($value->privmanifestyacht=='-1-') { $VAL56= 'checked'; } else { $VAL56= ''; }
if ($value->priveditmanifest=='-1-') { $VAL57= 'checked'; } else { $VAL57= ''; }
if ($value->privpli=='-1-') { $VAL58= 'checked'; } else { $VAL58= ''; }
if ($value->privppidtk1=='-1-') { $VAL59= 'checked'; } else { $VAL59= ''; }
if ($value->privppidtk2=='-1-') { $VAL60= 'checked'; } else { $VAL60= ''; }
if ($value->privppidtk3=='-1-') { $VAL61= 'checked'; } else { $VAL61= ''; }
if ($value->privppid=='-1-') { $VAL62= 'checked'; } else { $VAL62= ''; }
if ($value->privstaffppid=='-1-') { $VAL63= 'checked'; } else { $VAL63= ''; }
if ($value->privclco=='-1-') { $VAL64= 'checked'; } else { $VAL64= ''; }
if ($value->privstaffpli=='-1-') { $VAL65= 'checked'; } else { $VAL65= ''; }
if ($value->privcc=='-1-') { $VAL66= 'checked'; } else { $VAL66= ''; };
if ($value->privcs=='-1-') { $VAL67= 'checked'; } else { $VAL67= ''; };
if ($value->privumum=='-1-') { $VAL68= 'checked'; } else { $VAL68= ''; };
if ($value->privbtki=='-1-') { $VAL69= 'checked'; } else { $VAL69= ''; };
if ($value->privtl=='-1-') { $VAL70= 'checked'; } else { $VAL70= ''; };
if($_SESSION['akses']=="admin" and $_SESSION['ex_level']>=60) { 
$data_session = 
"
<tr>
	<td align='center'>-</td>
	<td>Session Impor Umum</td>
	<td></td>
	<td align='center'><label class='switch'>".
		"<input type='checkbox' id='val' id='valprivimpor' class='preference' value='".$value->privimpor."' ".$VAL1." readonly disabled>"."
			<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>-</td>
	<td>Session Ekspor Umum</td>
	<td></td>
	<td align='center'><label class='switch'>".
		"<input type='checkbox' id='val' id='valprivekspor' class='preference' value='".$value->privekspor."' ".$VAL2." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>-</td>
	<td>Session Intelijen</td>
	<td></td>
	<td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivintelijen' class='preference' value='".$value->privintelijen."' ".$VAL3." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>-</td>
	<td>Session Lembar Informasi</td>
	<td></td>
	<td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivli' class='preference' value='".$value->privli."' ".$VAL4." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>-</td>
	<td>Session Lembar Klasifikasi Informasi</td>
	<td></td>
	<td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivlki' class='preference' value='".$value->privlki."' ".$VAL5." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>-</td>
	<td>Session Lembar Kerja Analis Intelijen</td>
	<td></td>
	<td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivlkai' class='preference' value='".$value->privlkai."' ".$VAL6." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>-</td>
	<td>Session Nota Hasil Intelijen</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivnhi' class='preference' value='".$value->privnhi."' ".$VAL7." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>-</td>
	<td>Session Nota Informasi Penindakan</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivnip' class='preference' value='".$value->privnip."' ".$VAL8." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>-</td>
	<td>Session Analysing Point</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivapoint' class='preference' value='".$value->privapoint."' ".$VAL9." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>-</td>
<td>Session Data Intelijen</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivrekapintel' class='preference' value='".$value->privrekapintel."' ".$VAL10." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>-</td>
	<td>Session Pemblokiran</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivblokir' class='preference' value='".$value->privblokir."' ".$VAL11." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>-</td>
	<td>Session Edit Pemblokiran</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valpriveditblokir' class='preference' value='".$value->priveditblokir."' ".$VAL12." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>-</td>
	<td>Session Survailance</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivsurvailance' class='preference' value='".$value->privsurvailance."' ".$VAL13." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>-</td>
	<td>Session Targeting Intelijen</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivatensiintel' class='preference' value='".$value->privatensiintel."' ".$VAL14." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>-</td>
	<td>Session Staff Intelijen</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivstaffintel' class='preference' value='".$value->privstaffintel."' ".$VAL15." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>-</td>
	<td>Session Surat Tugas Pengumpulan Informasi</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivstpi' class='preference' value='".$value->privstpi."' ".$VAL16." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>-</td>
	<td>Session Analis Penumpang</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivanalispenumpang' class='preference' value='".$value->privanalispenumpang."' ".$VAL17." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>-</td>
	<td>Session Targeting Penumpang</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivatensipenumpang' class='preference' value='".$value->privatensipenumpang."' ".$VAL18." readonly disabled>"."
		<div class='slider'></div></label>
	</td></tr>
<tr>
	<td align='center'>-</td>
	<td>Session Analis Yacht</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivanalisyacht' class='preference' value='".$value->privanalisyacht."' ".$VAL19." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>-</td>
	<td>Session Targeting Yacht</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivatensiyacht' class='preference' value='".$value->privatensiyacht."' ".$VAL20." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>-</td>
	<td>Session Edit Data Yacht</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivedityacht' class='preference' value='".$value->privedityacht."' ".$VAL21." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>-</td>
	<td>Session Analis Pos Lintas Batas</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivanalisplb' class='preference' value='".$value->privanalisplb."' ".$VAL22." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>-</td>
	<td>Session Atensi Pos Lintas Batas</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivatensiplb' class='preference' value='".$value->privatensiplb."' ".$VAL23." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>-</td>
	<td>Session Edit Data Pos Lintas Batas</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valpriveditplb' class='preference' value='".$value->priveditplb."' ".$VAL24." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>-</td>
	<td>Session Penindakan</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivpenindakan' class='preference' value='".$value->privpenindakan."' ".$VAL25." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>-</td>
	<td>Session Reekspor</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivreekspor' class='preference' value='".$value->privreekspor."' ".$VAL26." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>-</td>
	<td>Session PIBK</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivpibk' class='preference' value='".$value->privpibk."' ".$VAL27." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>-</td>
	<td>Session SBP</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivsbp' class='preference' value='".$value->privsbp."' ".$VAL28." readonly disabled>"."
		<div class='slider'></div></label>
	</td></tr>
<tr>
	<td align='center'>-</td>
	<td>Session Edit Data SBP</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valpriveditsbp' class='preference' value='".$value->priveditsbp."' ".$VAL29." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>-</td>
	<td>Session PJT</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivpjt' class='preference' value='".$value->privpjt."' ".$VAL30." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>-</td>
	<td>Session Customs Declaration</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivcd' class='preference' value='".$value->privcd."' ".$VAL31." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>-</td>
	<td>Session Staff Penindakan</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivstaffpenindakan' class='preference' value='".$value->privstaffpenindakan."' ".$VAL32." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>-</td>
	<td>Session Laporan Umum</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivlaporan' class='preference' value='".$value->privlaporan."' ".$VAL33." readonly disabled>"."
		<div class='slider'></div></label>
	</td></tr>
<tr>
	<td align='center'>-</td>
	<td>Session Laporan PLB</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivlaporanplb' class='preference' value='".$value->privlaporanplb."' ".$VAL34." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>-</td>
	<td>Session Laporan Yacht</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivlaporanyacht' class='preference' value='".$value->privlaporanyacht."' ".$VAL35." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>-</td>
	<td>Session Impor Data PIB</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivimpordatapib' class='preference' value='".$value->privimpordatapib."' ".$VAL36." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>-</td>
	<td>Session Impor Data PEB</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivimpordatapeb' class='preference' value='".$value->privimpordatapeb."' ".$VAL37." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>-</td>
	<td>Session Impor Data SPKPBM</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivimpordataspkpbm' class='preference' value='".$value->privimpordataspkpbm."' ".$VAL38." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>-</td>
	<td>Session Eksecutive</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivexecutive' class='preference' value='".$value->privexecutive."' ".$VAL39." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>-</td>
	<td>Session Eksecutive Report</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivexelaporan' class='preference' value='".$value->privexelaporan."' ".$VAL40." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>-</td>
	<td>Session Eksecutive Montly</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivexebulanan' class='preference' value='".$value->privexebulanan."' ".$VAL41." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>-</td>
	<td>Session Villar Data</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivvillar' class='preference' value='".$value->privvillar."' ".$VAL42." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>-</td>
	<td>Session Pabean Yacht</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivpabeanyacht' class='preference' value='".$value->privpabeanyacht."' ".$VAL50." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>-</td>
	<td>Session Jaminan Kepabeanan</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivjaminan' class='preference' value='".$value->privjaminan."' ".$VAL51." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>-</td>
	<td>Session Edit Data Jaminan Kepabeanan</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valpriveditjaminan' class='preference' value='".$value->priveditjaminan."' ".$VAL52." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr> 
<tr>
	<td align='center'>-</td>
	<td>Session Manifest</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivmanifest' class='preference' value='".$value->privmanifest."' ".$VAL53." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>-</td>
	<td>Session Manifest Yacht</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivmanifestyacht' class='preference' value='".$value->privmanifestyacht."' ".$VAL55." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>-</td>
	<td>Session Impor Data Manifest</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivimpordatamanifest' class='preference' value='".$value->privimpordatamanifest."' ".$VAL56." readonly disabled>"."
		<div class='slider'></div></label>
	</td></tr>
<tr><td align='center'>-</td>
	<td>Session Edit Data Manifest</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valpriveditmanifest' class='preference' value='".$value->priveditmanifest."' ".$VAL57." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>-</td>
	<td>Session Manifest PLB</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivmanifestplb' class='preference' value='".$value->privmanifestplb."' ".$VAL54." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
";
} else {
$data_session = "";
}


$ResultData[] = "<div class='text-center'>".$datatable->number($i)."</div>".
"<input type='hidden' id='id-value-".$value->id."' value='".$value->id."' disabled readonly>".
"<input type='hidden' id='nama-value-".$value->id."' value='".$value->nama."' disabled readonly>".
"<input type='hidden' id='nip-value-".$value->id."' value='".$value->nip."' disabled readonly>".
"<input type='hidden' id='username-value-".$value->id."' value='".$value->username."' disabled readonly>".
"<input type='hidden' id='sandi-value-".$value->id."' value=".$value->sandi." disabled readonly>".
"<input type='hidden' id='kantor_eselon2-value-".$value->id."' value='".$value->kantor_eselon2."' disabled readonly>".
"<input type='hidden' id='kantor_eselon2_detail-value-".$value->id."' value='".$value->kantor_eselon2_detail."' disabled readonly>".
"<input type='hidden' id='kantor_eselon3-value-".$value->id."' value='".$value->kantor_eselon3."' disabled readonly>".
"<input type='hidden' id='kantor_eselon3_detail-value-".$value->id."' value='".$value->kantor_eselon3_detail."' disabled readonly>".
"<input type='hidden' id='kantor_eselon4-value-".$value->id."' value='".$value->kantor_eselon4."'>".
"<input type='hidden' id='kantor_eselon4_detail-value-".$value->id."' value='".$value->kantor_eselon4_detail."' disabled readonly>".
"<input type='hidden' id='tipologi-value-".$value->id."' value='".$value->tipologi."' disabled readonly>".
"<input type='hidden' id='nama_kantor-value-".$value->id."' value='".$value->nama_kantor."' disabled readonly>".
"<input type='hidden' id='alamat_kantor-value-".$value->id."' value='".$value->alamat_kantor."' disabled readonly>".
"<input type='hidden' id='telp_kantor-value-".$value->id."' value='".$value->telp_kantor."' disabled readonly>".
"<input type='hidden' id='jabatan-value-".$value->id."' value='".$value->jabatan."' disabled readonly>".
"<input type='hidden' id='pangol-value-".$value->id."' value='".$value->pangol."' disabled readonly>".
"<input type='hidden' id='email-value-".$value->id."' value='".$value->email."' disabled readonly>".
"<input type='hidden' id='telp-value-".$value->id."' value='".$value->telp."' disabled readonly>".
"<input type='hidden' id='note-value-".$value->id."' value='".$value->note."' disabled readonly>".
"<input type='hidden' id='privimpor-value-".$value->id."' value='".$value->privimpor."'>".
"<input type='hidden' id='privekspor-value-".$value->id."' value='".$value->privekspor."'>".
"<input type='hidden' id='privintelijen-value-".$value->id."' value='".$value->privintelijen."'>".
"<input type='hidden' id='privli-value-".$value->id."' value='".$value->privli."'>".
"<input type='hidden' id='privlki-value-".$value->id."' value='".$value->privlki."'>".
"<input type='hidden' id='privlkai-value-".$value->id."' value='".$value->privlkai."'>".
"<input type='hidden' id='privnhi-value-".$value->id."' value='".$value->privnhi."'>".
"<input type='hidden' id='privnip-value-".$value->id."' value='".$value->privnip."'>".
"<input type='hidden' id='privapoint-value-".$value->id."' value='".$value->privapoint."'>".
"<input type='hidden' id='privrekapintel-value-".$value->id."' value='".$value->privrekapintel."'>".
"<input type='hidden' id='privblokir-value-".$value->id."' value='".$value->privblokir."'>".
"<input type='hidden' id='priveditblokir-value-".$value->id."' value='".$value->priveditblokir."'>".
"<input type='hidden' id='privsurvailance-value-".$value->id."' value='".$value->privsurvailance."'>".
"<input type='hidden' id='privatensiintel-value-".$value->id."' value='".$value->privatensiintel."'>".
"<input type='hidden' id='privstaffintel-value-".$value->id."' value='".$value->privstaffintel."'>".
"<input type='hidden' id='privstpi-value-".$value->id."' value='".$value->privstpi."'>".
"<input type='hidden' id='privanalispenumpang-value-".$value->id."' value='".$value->privanalispenumpang."'>".
"<input type='hidden' id='privatensipenumpang-value-".$value->id."' value='".$value->privatensipenumpang."'>".
"<input type='hidden' id='privanalisyacht-value-".$value->id."' value='".$value->privanalisyacht."'>".
"<input type='hidden' id='privatensiyacht-value-".$value->id."' value='".$value->privatensiyacht."'>".
"<input type='hidden' id='privedityacht-value-".$value->id."' value='".$value->privedityacht."'>".
"<input type='hidden' id='privanalisplb-value-".$value->id."' value='".$value->privanalisplb."'>".
"<input type='hidden' id='privatensiplb-value-".$value->id."' value='".$value->privatensiplb."'>".
"<input type='hidden' id='priveditplb-value-".$value->id."' value='".$value->priveditplb."'>".
"<input type='hidden' id='privpenindakan-value-".$value->id."' value='".$value->privpenindakan."'>".
"<input type='hidden' id='privreekspor-value-".$value->id."' value='".$value->privreekspor."'>".
"<input type='hidden' id='privpibk-value-".$value->id."' value='".$value->privpibk."'>".
"<input type='hidden' id='privsbp-value-".$value->id."' value='".$value->privsbp."'>".
"<input type='hidden' id='priveditsbp-value-".$value->id."' value='".$value->priveditsbp."'>".
"<input type='hidden' id='privpjt-value-".$value->id."' value='".$value->privpjt."'>".
"<input type='hidden' id='privcd-value-".$value->id."' value='".$value->privcd."'>".
"<input type='hidden' id='privstaffpenindakan-value-".$value->id."' value='".$value->privstaffpenindakan."'>".
"<input type='hidden' id='privlaporan-value-".$value->id."' value='".$value->privlaporan."'>".
"<input type='hidden' id='privlaporanplb-value-".$value->id."' value='".$value->privlaporanplb."'>".
"<input type='hidden' id='privlaporanyacht-value-".$value->id."' value='".$value->privlaporanyacht."'>".
"<input type='hidden' id='privimpordatapib-value-".$value->id."' value='".$value->privimpordatapib."'>".
"<input type='hidden' id='privimpordatapeb-value-".$value->id."' value='".$value->privimpordatapeb."'>".
"<input type='hidden' id='privimpordataspkpbm-value-".$value->id."' value='".$value->privimpordataspkpbm."'>".
"<input type='hidden' id='privexecutive-value-".$value->id."' value='".$value->privexecutive."'>".
"<input type='hidden' id='privexelaporan-value-".$value->id."' value='".$value->privexelaporan."'>".
"<input type='hidden' id='privexebulanan-value-".$value->id."' value='".$value->privexebulanan."'>".
"<input type='hidden' id='privvillar-value-".$value->id."' value='".$value->privvillar."'>".
"<input type='hidden' id='privpabean-value-".$value->id."' value='".$value->privpabean."'>".
"<input type='hidden' id='privkoordagenfasilitaspusat-value-".$value->id."' value='".$value->privkoordagenfasilitaspusat."'>".
"<input type='hidden' id='privkoordagenfasilitas-value-".$value->id."' value='".$value->privkoordagenfasilitas."'>".
"<input type='hidden' id='privagenfaskhusus-value-".$value->id."' value='".$value->privagenfaskhusus."'>".
"<input type='hidden' id='privagenfas-value-".$value->id."' value='".$value->privagenfas."'>".
"<input type='hidden' id='privstaffagenfas-value-".$value->id."' value='".$value->privstaffagenfas."'>".
"<input type='hidden' id='privpabeanplb-value-".$value->id."' value='".$value->privpabeanplb."'>".
"<input type='hidden' id='privpabeanyacht-value-".$value->id."' value='".$value->privpabeanyacht."'>".
"<input type='hidden' id='privjaminan-value-".$value->id."' value='".$value->privjaminan."'>".
"<input type='hidden' id='priveditjaminan-value-".$value->id."' value='".$value->priveditjaminan."'>".
"<input type='hidden' id='privmanifest-value-".$value->id."' value='".$value->privmanifest."'>".
"<input type='hidden' id='privmanifestplb-value-".$value->id."' value='".$value->privmanifestplb."'>".
"<input type='hidden' id='privmanifestyacht-value-".$value->id."' value='".$value->privmanifestyacht."'>".
"<input type='hidden' id='privimpordatamanifest-value-".$value->id."' value='".$value->privimpordatamanifest."'>".
"<input type='hidden' id='priveditmanifest-value-".$value->id."' value='".$value->priveditmanifest."'>".
"<input type='hidden' id='privpli-value-".$value->id."' value='".$value->privpli."'>".
"<input type='hidden' id='privppidtk1-value-".$value->id."' value='".$value->privppidtk1."'>".
"<input type='hidden' id='privppidtk2-value-".$value->id."' value='".$value->privppidtk2."'>".
"<input type='hidden' id='privppidtk3-value-".$value->id."' value='".$value->privppidtk3."'>".
"<input type='hidden' id='privppid-value-".$value->id."' value='".$value->privppid."'>".
"<input type='hidden' id='privstaffppid-value-".$value->id."' value='".$value->privstaffppid."'>".
"<input type='hidden' id='privclco-value-".$value->id."' value='".$value->privclco."'>".
"<input type='hidden' id='privstaffpli-value-".$value->id."' value='".$value->privstaffpli."'>".
"<input type='hidden' id='privcc-value-".$value->id."' value='".$value->privcc."'>".
"<input type='hidden' id='privcs-value-".$value->id."' value='".$value->privcs."'>".
"<input type='hidden' id='privumum-value-".$value->id."' value='".$value->privumum."'>".
"<input type='hidden' id='privbtki-value-".$value->id."' value='".$value->privbtki."'>".
"<input type='hidden' id='privtl-value-".$value->id."' value='".$value->privtl."'>";

	
$ResultData[] =	
"
<ul class='timeline'>
<li class='red' style='margin-left:-20px'>
<i class='fa fa-user bg-skin pull-center'></i>
	<div class='timeline-item'>
	<div style='padding: 2px 2px 10px 2px'>
		<div class='pull-right'>
			<span style='font-size:11px; font-family:source-sans-pro, Arial, sans-serif' class='time'>
			<i class='fa fa-clock-o'></i>&nbsp;".date('d-M-Y',strtotime($value->update_time))."</span>
		</div>
		<div class='pull-left'>
			<i class='fa fa-user'></i>&nbsp;&nbsp;<b>".$value->nama."</b>&nbsp;&nbsp;
			<i class='fa fa-chevron-right'></i>&nbsp;&nbsp;".$value->nip."&nbsp;&nbsp;
			<i class='fa fa-chevron-right'></i>&nbsp;&nbsp;".$value->nama_kantor."&nbsp;&nbsp;
			<i class='fa fa-chevron-right'></i>&nbsp;&nbsp;".$status_user."
		</div>
	</div>
	<br>
	<div class='nav-tabs-custom box box-skin'>
		<div class='nav-tabs-custom tab-default'>
			<ul class='nav nav-tabs'>
				<li class='active'><a href='#tab_1".$value->id."' data-toggle='tab'>Data Kantor Pegawai</a></li>
                <li><a href='#tab_2".$value->id."' data-toggle='tab'>Data Authority</a></li>
                <li class='pull-right'>
                <p>
                <div class='pull-right'>
					".$ADM_EDIT."
				</div>
                </li>
			</ul>
			<div class='tab-content' style='margin-bottom:-40px'>
				<div class='tab-pane active' id='tab_1".$value->id."'>
                	<table width='100%' class='table table-bordered'>
						<tbody>
							<tr>
                                <td width='20%'><b>Username</b></td>
                                <td width='2%'>:</td>
                                <td width='78%'>".$value->nama."</td>
                            </tr>
                            <tr>
                                <td><b>Kantor Eselon II</b></td>
                                <td>:</td>
                                <td>".$value->kantor_eselon2_detail."</td>
							</tr>
                            <tr>
                                <td><b>Kantor Eselon III</b></td>
                                <td>:</td>
                                <td>".$value->kantor_eselon3_detail."</td>
                            </tr>
                            <tr>
                                <td><b>Kantor Eselon IV</b></td>
                                <td>:</td>
                                <td>".$value->kantor_eselon4_detail."</td>
                            </tr>
                            <tr>
                                <td><b>Jabatan</b></td>
                                <td>:</td>
                                <td>".$value->jabatan."</td>
                            </tr>
                            <tr>
                                <td><b>Email</b></td>
                                <td>:</td>
                                <td>".$value->email."</td>
                            </tr>
                            <tr>
                                <td><b>Telepon/Handphone</b></td>
                                <td>:</td>
                                <td>".$value->telp."</td>
                            </tr>
						</tbody>
					</table>
                </div>
                <div class='tab-pane' id='tab_2".$value->id."'>
<table class='table table-bordered table-striped'>
<tbody>
<tr align='center'>
	<td width='5%'><b>No</b></td>
    <td width='45%'><b>Detail Authorize User</b></td>
    <td width='30%'><b>Authorize</b></td>
    <td width='20%'><b>Ceklist</b></td>
</tr>
".$data_session."
<tr>
	<td align='center'>1</td>
	<td><b>Session Pabean Umum</b></td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivpabean' class='preference' value='".$value->privpabean."' ".$VAL43." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>2</td>
	<td>Session Koordinator Pusat Agen Fasilitas</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivkoordagenfasilitaspusat' class='preference' value='".$value->privkoordagenfasilitaspusat."' ".$VAL44." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>3</td>
	<td>Session Koordinator Agen Fasilitas</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivkoordagenfasilitas' class='preference' value='".$value->privkoordagenfasilitas."' ".$VAL45." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>4</td>
	<td>Session Agen Fasilitas Khusus</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivagenfaskhusus' class='preference' value='".$value->privagenfaskhusus."' ".$VAL46." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>5</td>
	<td>Session Agen Fasilitas</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivagenfas' class='preference' value='".$value->privagenfas."' ".$VAL47." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>6</td>
	<td>Session Pabean PLB</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivpabeanplb' class='preference' value='".$value->privpabeanplb."' ".$VAL49." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>7</td>
	<td>Session Staff Agen Fasilitas</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivstaffagenfas' class='preference' value='".$value->privstaffagenfas."' ".$VAL48." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>8</td>
	<td><b>Session Penyuluhan dan Layanan Informasi</b></td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivpli' class='preference' value='".$value->privpli."' ".$VAL58." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>9</td>
	<td>Session PPID Tingkat I</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivppidtk1' class='preference' value='".$value->privppidtk1."' ".$VAL59." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>10</td>
	<td>Session PPID Tingkat II</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivppidtk2' class='preference' value='".$value->privppidtk2."' ".$VAL60." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>11</td>
	<td>Session PPID Tingkat III</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivppidtk3' class='preference' value='".$value->privppidtk3."' ".$VAL61." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>12</td>
	<td>Session Pejabat PPID</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivppid' class='preference' value='".$value->privppid."' ".$VAL62." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>13</td>
	<td>Session Staff PPID</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivstaffppid' class='preference' value='".$value->privstaffppid."' ".$VAL63." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>14</td>
	<td>Session Client Coordinator</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivclco' class='preference' value='".$value->privclco."' ".$VAL64." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>15</td>
	<td>Session Team Leader</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivtl' class='preference' value='".$value->privtl."' ".$VAL70." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>16</td>
	<td>Session Staff PLI</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivstaffpli' class='preference' value='".$value->privstaffpli."' ".$VAL65." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>17</td>
	<td>Session Contact Center</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivcc' class='preference' value='".$value->privcc."' ".$VAL66." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>

<tr>
	<td align='center'>18</td>
	<td>Session Customer Service</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivcs' class='preference' value='".$value->privcs."' ".$VAL67." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>19</td>
	<td>Session Umum</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivumum' class='preference' value='".$value->privumum."' ".$VAL68." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
<tr>
	<td align='center'>20</td>
	<td>Session BTKI</td>
	<td></td><td align='center'><label class='switch'>".
		"<input type='checkbox' id='valprivbtki' class='preference' value='".$value->privbtki."' ".$VAL69." readonly disabled>"."
		<div class='slider'></div></label>
	</td>
</tr>
</tbody>
</table>
                </div>
			</div>
		</div>
	</div>
	</div>
</li>
</ul>
";

	//memasukan array ke variable $data
	$data[] = $ResultData;
	$i++;
}
//set data
$datatable->set_data($data);
//create our json
$datatable->create_data();
