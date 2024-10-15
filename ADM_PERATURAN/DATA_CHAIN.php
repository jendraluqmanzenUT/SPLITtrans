<?php
include_once ("LIBRARY/CONFIG.php");
sec_session_start();
//kolom apa saja yang akan ditampilkan
$columns = array(
	'detail_jenis_per', 'detail_per1','detail_per2','detail_per3','detail_per4','status_peraturan','detail_status','status_cabut','tgl_sorting','no_per_asal','no_per_baru','judul_per_baru', 'terbit_per_baru','tgl_upl_per_baru','user_per_baru','no_per_ubah_1','no_per_ubah_2','no_per_ubah_3','no_per_ubah_4', 'no_per_ubah_5','no_per_ubah_6','no_per_ubah_7','no_per_ubah_8','no_per_ubah_9','no_per_ubah_10','no_per_ubah_11','no_per_ubah_12',
	'no_per_ubah_13','no_per_ubah_14','no_per_ubah_15','no_per_data_cabut', 'no_per_gabung');

    $datatable->set_numbering_status(0);
	$datatable->set_order_by("tgl_sorting");
	$datatable->set_order_type("desc");

//jika ada request filter
if ($_POST['bab_cari']!="" or $_POST['judul_cari']!="" or $_POST['nomor_cari']!="" or $_POST['cari_all']!="" or $_POST['jenis_cari']!="" ) {
	$prepared_data = array();
	$nomorPer_ 	= $_POST["nomor_cari"].'%';
	$judulPer_ 	= '%'.$_POST["judul_cari"].'%';
	if ($_POST["nomor_cari"]!="")	{
		$data_nomor_cari		="WHERE no_per_gabung LIKE ?";
		$prepare_nomor_cari		= array("no_per_gabung" => $nomorPer_);
		$prepared_data 			= array_merge($prepared_data,$prepare_nomor_cari);
		}
	if ($_POST["judul_cari"]!="")	{
		$data_judul_cari		="AND judul_per_baru LIKE ?";
		$prepare_judul_cari		= array("judul_per_baru" => $judulPer_);
		$prepared_data 			= array_merge($prepared_data,$prepare_judul_cari);
		}
	if ($_POST["cari_all"]!="")	{
		$strCari				= "$strCari AND kode_per3=?";
		$prepare_jenis_cari1 	= array("kode_per3" => $_POST["cari_all"]);
		$prepared_data 			= array_merge($prepared_data,$prepare_jenis_cari1);
	}
	if ($_POST["jenis_cari"]!="")	{
		$strCari				= "$strCari AND jenis_per=?";
		$prepare_jenis_cari 	= array("jenis_per" => $_POST["jenis_cari"]);
		$prepared_data 			= array_merge($prepared_data,$prepare_jenis_cari);
	}
	if ($_POST["bab_cari"]!="")	{
		$strCari				="$strCari AND kode_per1=?";
		$prepare_bab_cari 		= array("kode_per1" => $_POST["bab_cari"]);
		$prepared_data 			= array_merge($prepared_data,$prepare_bab_cari);
		}
	if ($_POST["subbab_cari"]!="")	{
		$strCari				="$strCari AND kode_per2=?";
		$prepare_subbab_cari	= array("kode_per2" => $_POST["subbab_cari"]);
		$prepared_data 			= array_merge($prepared_data,$prepare_subbab_cari);
		}
	if ($_POST["posper_cari"]!="")	{
		$strCari				="$strCari AND kode_per3=?";
		$prepare_posper_cari	= array("kode_per3" => $_POST["posper_cari"]);
		$prepared_data 			= array_merge($prepared_data,$prepare_posper_cari);
		}
	if ($_POST["subpos_cari"]!="")	{
		$strCari				="$strCari AND kode_per4=?";
		$prepare_subpos_cari	= array("kode_per4" => $_POST["subpos_cari"]);
		$prepared_data 			= array_merge($prepared_data,$prepare_subpos_cari);
		}
	$query = $datatable->get_custom("
	SELECT
	* 
FROM
	(
SELECT
	id_per,
	(
	COALESCE(no_per_asal, '-') + ' | ' + COALESCE(no_per_baru, '-') + ' | ' + COALESCE(no_per_ubah_1, '-') + ' | ' + COALESCE(no_per_ubah_2, '-') + ' | ' + COALESCE(no_per_ubah_3, '-') + ' | ' + COALESCE(no_per_ubah_4, '-') + ' | ' + COALESCE(no_per_ubah_5, '-') + ' | ' + COALESCE(no_per_ubah_6, '-') + ' | ' + COALESCE(no_per_ubah_7, '-') + ' | ' + COALESCE(no_per_ubah_8, '-') + ' | ' + COALESCE(no_per_ubah_9, '-') + ' | ' + COALESCE(no_per_ubah_10, '-') + ' | ' + COALESCE(no_per_ubah_11, '-') + ' | ' + COALESCE(no_per_ubah_12, '-') + ' | ' + COALESCE(no_per_ubah_13, '-') + ' | ' + COALESCE(no_per_ubah_14, '-') + ' | ' + COALESCE(no_per_ubah_15, '-') 
	) AS no_per_gabung 
FROM
	td_peraturan_bravo 
	) AS TD_PLUS
	INNER JOIN ( SELECT * FROM td_peraturan_bravo ) AS TD_AWAL ON TD_PLUS.id_per = TD_AWAL.id_per $data_judul_cari $data_nomor_cari $strCari",$columns,$prepared_data);
} elseif (isset($_POST['reset_data'])) {
	$query = $datatable->get_custom(
	"SELECT
	* 
FROM
	(
SELECT
	id_per,
	(
	COALESCE(no_per_asal, '-') + ' | ' + COALESCE(no_per_baru, '-') + ' | ' + COALESCE(no_per_ubah_1, '-') + ' | ' + COALESCE(no_per_ubah_2, '-') + ' | ' + COALESCE(no_per_ubah_3, '-') + ' | ' + COALESCE(no_per_ubah_4, '-') + ' | ' + COALESCE(no_per_ubah_5, '-') + ' | ' + COALESCE(no_per_ubah_6, '-') + ' | ' + COALESCE(no_per_ubah_7, '-') + ' | ' + COALESCE(no_per_ubah_8, '-') + ' | ' + COALESCE(no_per_ubah_9, '-') + ' | ' + COALESCE(no_per_ubah_10, '-') + ' | ' + COALESCE(no_per_ubah_11, '-') + ' | ' + COALESCE(no_per_ubah_12, '-') + ' | ' + COALESCE(no_per_ubah_13, '-') + ' | ' + COALESCE(no_per_ubah_14, '-') + ' | ' + COALESCE(no_per_ubah_15, '-') 
	) AS no_per_gabung 
FROM
	td_peraturan_bravo 
	) AS TD_PLUS
	INNER JOIN ( SELECT * FROM td_peraturan_bravo ) AS TD_AWAL ON TD_PLUS.id_per = TD_AWAL.id_per",$columns);
} else {
	$query = $datatable->get_custom(
	"SELECT
	* 
FROM
	(
SELECT
	id_per,
	(
	COALESCE(no_per_asal, '-') + ' | ' + COALESCE(no_per_baru, '-') + ' | ' + COALESCE(no_per_ubah_1, '-') + ' | ' + COALESCE(no_per_ubah_2, '-') + ' | ' + COALESCE(no_per_ubah_3, '-') + ' | ' + COALESCE(no_per_ubah_4, '-') + ' | ' + COALESCE(no_per_ubah_5, '-') + ' | ' + COALESCE(no_per_ubah_6, '-') + ' | ' + COALESCE(no_per_ubah_7, '-') + ' | ' + COALESCE(no_per_ubah_8, '-') + ' | ' + COALESCE(no_per_ubah_9, '-') + ' | ' + COALESCE(no_per_ubah_10, '-') + ' | ' + COALESCE(no_per_ubah_11, '-') + ' | ' + COALESCE(no_per_ubah_12, '-') + ' | ' + COALESCE(no_per_ubah_13, '-') + ' | ' + COALESCE(no_per_ubah_14, '-') + ' | ' + COALESCE(no_per_ubah_15, '-') 
	) AS no_per_gabung 
FROM
	td_peraturan_bravo 
	) AS TD_PLUS
	INNER JOIN ( SELECT * FROM td_peraturan_bravo ) AS TD_AWAL ON TD_PLUS.id_per = TD_AWAL.id_per",$columns);
}
	$data = array();
	$i=1;
	foreach ($query	as $value) {
	$ResultData = array();	

if($value->status_peraturan=="0")	{
	if ($value->status_cabut=="1") {
		$DATA = $value->no_per_baru."&nbsp;Pencabutan Atas&nbsp;".$value->no_per_asal;
		$CABUT = "<a href='#form-peraturan' class='btn btn-danger btn-xs' data-toggle='modal' 
			data-id=".$value->id_per." data-rubah='A'>
        	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Read Pencabutan</span></a>";
		$STAT_CABUT = "<span style='color:red'><b>[Telah Dicabut]</b></span>";
	} else {
		$DATA = $value->no_per_asal;
		$CABUT = ""; $STAT_CABUT = "";
	}
	
	$PERATURAN = "<a href='#form-peraturan' class='btn btn-primary btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='0'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Read</span></a>&nbsp;";
} elseif ($value->status_peraturan=="1") {
	if ($value->status_cabut=="1") {
		$DATA = $value->no_per_baru."&nbsp;Pencabutan Atas&nbsp;".$value->no_per_asal;
		$CABUT = "<a href='#form-peraturan' class='btn btn-danger btn-xs' data-toggle='modal' 
			data-id=".$value->id_per." data-rubah='A'>
        	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Read Pencabutan</span></a>";
		$STAT_CABUT = "<span style='color:red'><b>[Telah Dicabut]</b></span>";
	} else {
		$DATA = $value->no_per_baru."&nbsp;".$value->detail_status."&nbsp;".Atas."&nbsp;".$value->no_per_asal;
		$CABUT = ""; $STAT_CABUT = "";
	}
	$PERATURAN ="<a href='#form-peraturan' class='btn btn-primary btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='0'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Read</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='1'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Pertama</span></a>&nbsp;";
} elseif ($value->status_peraturan=="2") {
	if ($value->status_cabut=="1") {
		$DATA = $value->no_per_baru."&nbsp;Pencabutan Atas&nbsp;".$value->no_per_asal;
		$CABUT = "<a href='#form-peraturan' class='btn btn-danger btn-xs' data-toggle='modal' 
			data-id=".$value->id_per." data-rubah='A'>
        	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Read Pencabutan</span></a>";
		$STAT_CABUT = "<span style='color:red'><b>[Telah Dicabut]</b></span>";
	} else {
		$DATA = $value->no_per_baru."&nbsp;".$value->detail_status."&nbsp;".Atas."&nbsp;".$value->no_per_asal;
		$CABUT = ""; $STAT_CABUT = "";
	}
	$PERATURAN = "<a href='#form-peraturan' class='btn btn-primary btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='0'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Read</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='1'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Pertama</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='2'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kedua</span></a>&nbsp;";
} elseif ($value->status_peraturan=="3") {
	if ($value->status_cabut=="1") {
		$DATA = $value->no_per_baru."&nbsp;Pencabutan Atas&nbsp;".$value->no_per_asal;
		$CABUT = "<a href='#form-peraturan' class='btn btn-danger btn-xs' data-toggle='modal' 
			data-id=".$value->id_per." data-rubah='A'>
        	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Read Pencabutan</span></a>";
		$STAT_CABUT = "<span style='color:red'><b>[Telah Dicabut]</b></span>";
	} else {
		$DATA = $value->no_per_baru."&nbsp;".$value->detail_status."&nbsp;".Atas."&nbsp;".$value->no_per_asal;
		$CABUT = ""; $STAT_CABUT = "";
	}	
	$PERATURAN = "<a href='#form-peraturan' class='btn btn-primary btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='0'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Read</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='1'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Pertama</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='2'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kedua</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='3'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Ketiga</span></a>&nbsp;";
} elseif ($value->status_peraturan=="4") {
	if ($value->status_cabut=="1") {
		$DATA = $value->no_per_baru."&nbsp;Pencabutan Atas&nbsp;".$value->no_per_asal;
		$CABUT = "<a href='#form-peraturan' class='btn btn-danger btn-xs' data-toggle='modal' 
			data-id=".$value->id_per." data-rubah='A'>
        	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Read Pencabutan</span></a>";
		$STAT_CABUT = "<span style='color:red'><b>[Telah Dicabut]</b></span>";
	} else {
		$DATA = $value->no_per_baru."&nbsp;".$value->detail_status."&nbsp;".Atas."&nbsp;".$value->no_per_asal;
		$CABUT = ""; $STAT_CABUT = "";
	}	
	$PERATURAN = "<a href='#form-peraturan' class='btn btn-primary btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='0'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Read</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='1'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Pertama</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='2'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kedua</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='3'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Ketiga</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='4'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Keempat</span></a>&nbsp;";
} elseif ($value->status_peraturan=="5") {
	if ($value->status_cabut=="1") {
		$DATA = $value->no_per_baru."&nbsp;Pencabutan Atas&nbsp;".$value->no_per_asal;
		$CABUT = "<a href='#form-peraturan' class='btn btn-danger btn-xs' data-toggle='modal' 
			data-id=".$value->id_per." data-rubah='A'>
        	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Read Pencabutan</span></a>";
		$STAT_CABUT = "<span style='color:red'><b>[Telah Dicabut]</b></span>";
	} else {
		$DATA = $value->no_per_baru."&nbsp;".$value->detail_status."&nbsp;".Atas."&nbsp;".$value->no_per_asal;
		$CABUT = ""; $STAT_CABUT = "";
	}	
	$PERATURAN = "<a href='#form-peraturan' class='btn btn-primary btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='0'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Read</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='1'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Pertama</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='2'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kedua</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='3'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Ketiga</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='4'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Keempat</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='5'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kelima</span></a>&nbsp;";
} elseif ($value->status_peraturan=="6") {
	if ($value->status_cabut=="1") {
		$DATA = $value->no_per_baru."&nbsp;Pencabutan Atas&nbsp;".$value->no_per_asal;
		$CABUT = "<a href='#form-peraturan' class='btn btn-danger btn-xs' data-toggle='modal' 
			data-id=".$value->id_per." data-rubah='A'>
        	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Read Pencabutan</span></a>";
		$STAT_CABUT = "<span style='color:red'><b>[Telah Dicabut]</b></span>";
	} else {
		$DATA = $value->no_per_baru."&nbsp;".$value->detail_status."&nbsp;".Atas."&nbsp;".$value->no_per_asal;
		$CABUT = ""; $STAT_CABUT = "";
	}	
	$PERATURAN = "<a href='#form-peraturan' class='btn btn-primary btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='0'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Read</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='1'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Pertama</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='2'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kedua</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='3'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Ketiga</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='4'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Keempat</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='5'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kelima</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='6'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Keenam</span></a>&nbsp;";
} elseif ($value->status_peraturan=="7") {
	if ($value->status_cabut=="1") {
		$DATA = $value->no_per_baru."&nbsp;Pencabutan Atas&nbsp;".$value->no_per_asal;
		$CABUT = "<a href='#form-peraturan' class='btn btn-danger btn-xs' data-toggle='modal' 
			data-id=".$value->id_per." data-rubah='A'>
        	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Read Pencabutan</span></a>";
		$STAT_CABUT = "<span style='color:red'><b>[Telah Dicabut]</b></span>";
	} else {
		$DATA = $value->no_per_baru."&nbsp;".$value->detail_status."&nbsp;".Atas."&nbsp;".$value->no_per_asal;
		$CABUT = ""; $STAT_CABUT = "";
	}	
	$PERATURAN = "<a href='#form-peraturan' class='btn btn-primary btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='0'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Read</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='1'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Pertama</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='2'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kedua</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='3'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Ketiga</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='4'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Keempat</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='5'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kelima</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='6'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Keenam</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='7'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Ketujuh</span></a>&nbsp;";
} elseif ($value->status_peraturan=="8") {
	if ($value->status_cabut=="1") {
		$DATA = $value->no_per_baru."&nbsp;Pencabutan Atas&nbsp;".$value->no_per_asal;
		$CABUT = "<a href='#form-peraturan' class='btn btn-danger btn-xs' data-toggle='modal' 
			data-id=".$value->id_per." data-rubah='A'>
        	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Read Pencabutan</span></a>";
		$STAT_CABUT = "<span style='color:red'><b>[Telah Dicabut]</b></span>";
	} else {
		$DATA = $value->no_per_baru."&nbsp;".$value->detail_status."&nbsp;".Atas."&nbsp;".$value->no_per_asal;
		$CABUT = ""; $STAT_CABUT = "";
	}	 
	$PERATURAN = "<a href='#form-peraturan' class='btn btn-primary btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='0'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Read</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='1'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Pertama</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='2'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kedua</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='3'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Ketiga</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='4'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Keempat</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='5'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kelima</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='6'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Keenam</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='7'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Ketujuh</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='8'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kedelapan</span></a>&nbsp;";
} elseif ($value->status_peraturan=="9") {
	if ($value->status_cabut=="1") {
		$DATA = $value->no_per_baru."&nbsp;Pencabutan Atas&nbsp;".$value->no_per_asal;
		$CABUT = "<a href='#form-peraturan' class='btn btn-danger btn-xs' data-toggle='modal' 
			data-id=".$value->id_per." data-rubah='A'>
        	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Read Pencabutan</span></a>";
		$STAT_CABUT = "<span style='color:red'><b>[Telah Dicabut]</b></span>";
	} else {
		$DATA = $value->no_per_baru."&nbsp;".$value->detail_status."&nbsp;".Atas."&nbsp;".$value->no_per_asal;
		$CABUT = ""; $STAT_CABUT = "";
	}	
	$PERATURAN = "<a href='#form-peraturan' class='btn btn-primary btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='0'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Read</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='1'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Pertama</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='2'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kedua</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='3'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Ketiga</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='4'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Keempat</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='5'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kelima</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='6'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Keenam</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='7'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Ketujuh</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='8'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kedelapan</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='9'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kesembilan</span></a>&nbsp;";
} elseif ($value->status_peraturan=="10") {
	if ($value->status_cabut=="1") {
		$DATA = $value->no_per_baru."&nbsp;Pencabutan Atas&nbsp;".$value->no_per_asal;
		$CABUT = "<a href='#form-peraturan' class='btn btn-danger btn-xs' data-toggle='modal' 
			data-id=".$value->id_per." data-rubah='A'>
        	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Read Pencabutan</span></a>";
		$STAT_CABUT = "<span style='color:red'><b>[Telah Dicabut]</b></span>";
	} else {
		$DATA = $value->no_per_baru."&nbsp;".$value->detail_status."&nbsp;".Atas."&nbsp;".$value->no_per_asal;
		$CABUT = ""; $STAT_CABUT = "";
	}	
	$PERATURAN = "<a href='#form-peraturan' class='btn btn-primary btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='0'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Read</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='1'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Pertama</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='2'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kedua</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='3'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Ketiga</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='4'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Keempat</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='5'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kelima</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='6'>
      	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Keenam</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='7'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Ketujuh</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='8'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kedelapan</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='9'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kesembilan</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='10'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kesepuluh</span></a>&nbsp;";
} elseif ($value->status_peraturan=="11") {
	if ($value->status_cabut=="1") {
		$DATA = $value->no_per_baru."&nbsp;Pencabutan Atas&nbsp;".$value->no_per_asal;
		$CABUT = "<a href='#form-peraturan' class='btn btn-danger btn-xs' data-toggle='modal' 
			data-id=".$value->id_per." data-rubah='A'>
        	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Read Pencabutan</span></a>";
		$STAT_CABUT = "<span style='color:red'><b>[Telah Dicabut]</b></span>";
	} else {
		$DATA = $value->no_per_baru."&nbsp;".$value->detail_status."&nbsp;".Atas."&nbsp;".$value->no_per_asal;
		$CABUT = ""; $STAT_CABUT = "";
	}	
	$PERATURAN = "<a href='#form-peraturan' class='btn btn-primary btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='0'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Read</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='1'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Pertama</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='2'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kedua</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='3'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Ketiga</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='4'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Keempat</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='5'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kelima</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='6'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Keenam</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='7'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Ketujuh</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='8'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kedelapan</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='9'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kesembilan</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='10'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kesepuluh</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='11'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kesebelas</span></a>&nbsp;";
} elseif ($value->status_peraturan=="12") {
	if ($value->status_cabut=="1") {
		$DATA = $value->no_per_baru."&nbsp;Pencabutan Atas&nbsp;".$value->no_per_asal;
		$CABUT = "<a href='#form-peraturan' class='btn btn-danger btn-xs' data-toggle='modal' 
			data-id=".$value->id_per." data-rubah='A'>
        	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Read Pencabutan</span></a>";
		$STAT_CABUT = "<span style='color:red'><b>[Telah Dicabut]</b></span>";
	} else {
		$DATA = $value->no_per_baru."&nbsp;".$value->detail_status."&nbsp;".Atas."&nbsp;".$value->no_per_asal;
		$CABUT = ""; $STAT_CABUT = "";
	}	
	$PERATURAN = "<a href='#form-peraturan' class='btn btn-primary btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='0'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Read</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='1'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Pertama</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='2'>
        	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kedua</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='3'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Ketiga</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='4'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Keempat</span></a>&nbsp;".
			"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='5'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kelima</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='6'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Keenam</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='7'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Ketujuh</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='8'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kedelapan</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='9'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kesembilan</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='10'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kesepuluh</span></a>&nbsp;".
			"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='11'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kesebelas</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='12'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Keduabelas</span></a>&nbsp;";
	
} elseif ($value->status_peraturan=="13") {
	if ($value->status_cabut=="1") {
		$DATA = $value->no_per_baru."&nbsp;Pencabutan Atas&nbsp;".$value->no_per_asal;
		$CABUT = "<a href='#form-peraturan' class='btn btn-danger btn-xs' data-toggle='modal' 
			data-id=".$value->id_per." data-rubah='A'>
        	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Read Pencabutan</span></a>";
		$STAT_CABUT = "<span style='color:red'><b>[Telah Dicabut]</b></span>";
	} else {
		$DATA = $value->no_per_baru."&nbsp;".$value->detail_status."&nbsp;".Atas."&nbsp;".$value->no_per_asal;
		$CABUT = ""; $STAT_CABUT = "";
	}	
	$PERATURAN = "<a href='#form-peraturan' class='btn btn-primary btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='0'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Read</span></a>&nbsp;".
			"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='1'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Pertama</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='2'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kedua</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='3'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Ketiga</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='4'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Keempat</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='5'>
        	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kelima</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='6'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Keenam</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='7'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Ketujuh</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='8'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kedelapan</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='9'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kesembilan</span></a>&nbsp;".
			"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='10'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kesepuluh</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='11'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kesebelas</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='12'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Keduabelas</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='13'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Ketigabelas</span></a>&nbsp;";	
} elseif ($value->status_peraturan=="14") {
	if ($value->status_cabut=="1") {
		$DATA = $value->no_per_baru."&nbsp;Pencabutan Atas&nbsp;".$value->no_per_asal;
		$CABUT = "<a href='#form-peraturan' class='btn btn-danger btn-xs' data-toggle='modal' 
			data-id=".$value->id_per." data-rubah='A'>
        	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Read Pencabutan</span></a>";
		$STAT_CABUT = "<span style='color:red'><b>[Telah Dicabut]</b></span>";
	} else {
		$DATA = $value->no_per_baru."&nbsp;".$value->detail_status."&nbsp;".Atas."&nbsp;".$value->no_per_asal;
		$CABUT = "";
		$STAT_CABUT = "";
	}	
	$PERATURAN = "<a href='#form-peraturan' class='btn btn-primary btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='0'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Read</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='1'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Pertama</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='2'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kedua</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='3'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Ketiga</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='4'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Keempat</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='5'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kelima</span></a>&nbsp;".
			"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='6'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Keenam</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='7'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Ketujuh</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='8'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kedelapan</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='9'>
        	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kesembilan</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='10'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kesepuluh</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
			data-id=".$value->id_per." data-rubah='11'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kesebelas</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='12'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Keduabelas</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='13'>
        	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Ketigabelas</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='14'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Keempatbelas</span></a>&nbsp;";
} elseif ($value->status_peraturan=="15") {
	if ($value->status_cabut=="1") {
		$DATA = $value->no_per_baru."&nbsp;Pencabutan Atas&nbsp;".$value->no_per_asal;
		$CABUT = "<a href='#form-peraturan' class='btn btn-danger btn-xs' data-toggle='modal' 
			data-id=".$value->id_per." data-rubah='A'>
        	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Read Pencabutan</span></a>";
		$STAT_CABUT = "<span style='color:red'><b>[Telah Dicabut]</b></span>";
	} else {
		$DATA = $value->no_per_baru."&nbsp;".$value->detail_status."&nbsp;".Atas."&nbsp;".$value->no_per_asal;
		$CABUT = "";
		$STAT_CABUT = "";
	}	
	$PERATURAN = "<a href='#form-peraturan' class='btn btn-primary btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='0'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Read</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='1'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Pertama</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='2'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kedua</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='3'>
        	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Ketiga</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='4'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Keempat</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='5'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kelima</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='6'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Keenam</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='7'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Ketujuh</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='8'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kedelapan</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='9'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kesembilan</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='10'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kesepuluh</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='11'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kesebelas</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='12'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Keduabelas</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='13'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Ketigabelas</span></a>&nbsp;".
			"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='14'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Keempatbelas</span></a>&nbsp;".
		"<a href='#form-peraturan' class='btn btn-success btn-xs' data-toggle='modal' 
		data-id=".$value->id_per." data-rubah='15'>
       	<span class='pull-left'><i class='fa fa-file-pdf-o' style='color:#FFF;'></i>&nbsp;&nbsp;Perubahan Kelimabelas</span></a>&nbsp;";
}
	$ResultData[] = "<div class='pull-center'>".$datatable->number($i)."</div>".
					"<input type='hidden' id='id-value-".$value->id_per."' value='".$value->id_per."'>".
					"<input type='hidden' id='jenis_per-value-".$value->id_per."' value='".$value->jenis_per."'>".
					"<input type='hidden' id='detail_jenis_per-value-".$value->id_per."' value='".$value->detail_jenis_per."'>".
					"<input type='hidden' id='kode_per1-value-".$value->id_per."' value='".$value->kode_per1."'>".
					"<input type='hidden' id='detail_per1-value-".$value->id_per."' value='".$value->detail_per1."'>".
					"<input type='hidden' id='kode_per2-value-".$value->id_per."' value='".$value->kode_per2."'>".
					"<input type='hidden' id='detail_per2-value-".$value->id_per."' value='".$value->detail_per2."'>".
					"<input type='hidden' id='kode_per3-value-".$value->id_per."' value='".$value->kode_per3."'>".
					"<input type='hidden' id='detail_per3-value-".$value->id_per."' value='".$value->detail_per3."'>".
					"<input type='hidden' id='kode_per4-value-".$value->id_per."' value='".$value->kode_per4."'>".
					"<input type='hidden' id='detail_per4-value-".$value->id_per."' value='".$value->detail_per4."'>".
					"<input type='hidden' id='detail_status-value-".$value->id_per."' value='".$value->detail_status."'>".
					"<input type='hidden' id='no_per_asal-value-".$value->id_per."' value='".$value->no_per_asal."'>".
					"<input type='hidden' id='no_per_baru-value-".$value->id_per."' value='".$value->no_per_baru."'>".
					"<input type='hidden' id='judul_per_baru-value-".$value->id_per."' value='".$value->judul_per_baru."'>".
					"<input type='hidden' id='status_peraturan-value-".$value->id_per."' value='".(($value->status_peraturan)+1)."'>".
					"<input type='hidden' id='status_per-value-".$value->id_per."' value='".$value->status_peraturan."'>".
					"<input type='hidden' id='status_cabut-value-".$value->id_per."' value='".$value->status_cabut."'>";
	$ResultData[] = 
		"<div class='col-md-12 row'>
			<ul class='timeline'>
			<li class='time-label'>
				<div class='pull-right'>
					<span style='font-size:11px; font-family:source-sans-pro, Arial, sans-serif' class='time'>
					<i class='fa fa-clock-o'></i>&nbsp;&nbsp;
					".date("d-m-Y", strtotime($value->tgl_sorting))."
					</span>
				</div>
				<span class='pull-left' style='font-weight:400; font-size:14px'>
					".$value->detail_per1."&nbsp;&nbsp;<i class='fa fa-angle-right'></i>&nbsp;&nbsp;&nbsp;
					".$value->detail_per2."&nbsp;&nbsp;<i class='fa fa-angle-right'></i>&nbsp;&nbsp;&nbsp;
					".$value->detail_per3."&nbsp;&nbsp;<i class='fa fa-chevron-right'></i>&nbsp;&nbsp;&nbsp;
					<b>".$value->detail_per4."</b>
				</span>
			</li>
			<li><i class='fa fa-refresh fa-spin bg-skin'></i>
			<div class='timeline-item' style='margin-bottom:-30px'>
				<div class='timeline-header' style='margin-top:-10px; font-style:italic'>
					".$value->detail_jenis_per."&nbsp;&nbsp;".$STAT_CABUT."
				</div>
				<h3 class='timeline-header'>
					<b>".$DATA."</b>
				</h3>
				<div class='timeline-body'>
					".$value->judul_per_baru."			
				</div>
				<div class='timeline-footer'>
					".$PERATURAN."".$CABUT."
					<input type='hidden' id='no_per_ubah_1-value-".$value->id_per."' value='".$value->no_per_ubah_1."'>
					<input type='hidden' id='no_per_ubah_2-value-".$value->id_per."' value='".$value->no_per_ubah_2."'>
					<input type='hidden' id='no_per_ubah_3-value-".$value->id_per."' value='".$value->no_per_ubah_3."'>
					<input type='hidden' id='no_per_ubah_4-value-".$value->id_per."' value='".$value->no_per_ubah_4."'>
					<input type='hidden' id='no_per_ubah_5-value-".$value->id_per."' value='".$value->no_per_ubah_5."'>
					<input type='hidden' id='no_per_ubah_6-value-".$value->id_per."' value='".$value->no_per_ubah_6."'>
					<input type='hidden' id='no_per_ubah_7-value-".$value->id_per."' value='".$value->no_per_ubah_7."'>
					<input type='hidden' id='no_per_ubah_8-value-".$value->id_per."' value='".$value->no_per_ubah_8."'>
					<input type='hidden' id='no_per_ubah_9-value-".$value->id_per."' value='".$value->no_per_ubah_9."'>
					<input type='hidden' id='no_per_ubah_10-value-".$value->id_per."' value='".$value->no_per_ubah_10."'>
					<input type='hidden' id='no_per_ubah_11-value-".$value->id_per."' value='".$value->no_per_ubah_11."'>
					<input type='hidden' id='no_per_ubah_12-value-".$value->id_per."' value='".$value->no_per_ubah_12."'>
					<input type='hidden' id='no_per_ubah_13-value-".$value->id_per."' value='".$value->no_per_ubah_13."'>
					<input type='hidden' id='no_per_ubah_14-value-".$value->id_per."' value='".$value->no_per_ubah_14."'>
					<input type='hidden' id='no_per_ubah_15-value-".$value->id_per."' value='".$value->no_per_ubah_15."'>
					<input type='hidden' id='no_per_data_cabut-value-".$value->id_per."' value='".$value->no_per_data_cabut."'>	
				</div>
			</div>
			</li>
			</ul>
			<span class='pull-right time' style='font-size:11px; font-family:source-sans-pro, Arial, sans-serif; margin-top:5px'>
					Upload By : ".$value->user_per_baru."
			</span>
		</div>
		";
	$ResultData[] = "<div class='pull-center'><a href='javascript:void();' data-toggle='modal' data-target='#modal-per-ubah' onclick='edit(".$value->id_per.");' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span></a>"."&nbsp;".
	"<a href='javascript:void();' data-toggle='modal' data-target='#delete-modal' onclick='hapus(".$value->id_per.");' class='btn btn-danger'><span class='glyphicon glyphicon-erase'></span></a></div>";

	//memasukan array ke variable $data
	$data[] = $ResultData;
	$i++;
}
//set data
$datatable->set_data($data);
//create our json
$datatable->create_data();
