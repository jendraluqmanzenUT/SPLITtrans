<?php
include_once ("LIBRARY/CONFIG.php");
sec_session_start();
//kolom apa saja yang akan ditampilkan
$columns = array(
		'kode_bab',
	'bab_detail',
	'kode_topik',
	'topik_detail',
	'kode_subtopik',
	'subtopik_detail',
	'pertanyaan_bravopedia',
	'jawaban_bravopedia',
	'daskum_bravopedia',
	'ket_bravopedia',
	'eksternal',
	'dasver_bravopedia',
	'user_input',
	'rekam_bravopedia',
	'tgl'
	);

    $datatable->set_numbering_status(0);
	$datatable->set_order_by("id");
	$datatable->set_order_type("DESC");

//jika ada request filter
if (isset($_POST['bab_cari'])) {
	$prepared_data = array();
	$pertanyaan_cari_ 	= '%'.$_POST["pertanyaan_cari"].'%';
	$jawaban_cari_ 		= '%'.$_POST["jawaban_cari"].'%';
	$daskum_cari_ 		= '%'.$_POST["daskum_cari"].'%';
	if ($pertanyaan_cari_!="")	{
		$data_pertanyaan_cari		="WHERE pertanyaan_bravopedia LIKE ?";
		$prepare_pertanyaan_cari	= array("pertanyaan_bravopedia" => $pertanyaan_cari_);
		$prepared_data 				= array_merge($prepared_data,$prepare_pertanyaan_cari);
		}
	if ($jawaban_cari_!="")	{
		$data_jawaban_cari		="AND jawaban_bravopedia LIKE ?";
		$prepare_jawaban_cari	= array("jawaban_bravopedia" => $jawaban_cari_);
		$prepared_data 			= array_merge($prepared_data,$prepare_jawaban_cari);
		}
	if ($daskum_cari_!="")	{
		$data_das_cari			="AND daskum_bravopedia LIKE ?";
		$prepare_das_cari		= array("daskum_bravopedia" => $daskum_cari_);
		$prepared_data 			= array_merge($prepared_data,$prepare_das_cari);
		}
	if ($_POST["bab_cari"]!="")	{
		$strCari="$strCari AND kode_bab=?";
		$prepare_kode_bab_cari 	= array("kode_bab" => $_POST["bab_cari"]);
		$prepared_data 			= array_merge($prepared_data,$prepare_kode_bab_cari);
	}
	if ($_POST["topik_cari"]!="")	{
		$strCari="$strCari AND kode_topik=?";
		$prepare_kode_topik_cari	= array("kode_topik" => $_POST["topik_cari"]);
		$prepared_data 				= array_merge($prepared_data,$prepare_kode_topik_cari);
		}
	if ($_POST["subtopik_cari"]!="")	{
		$strCari="$strCari AND kode_subtopik=?";
		$prepare_subtopik_cari_cari	= array("kode_subtopik" => $_POST["subtopik_cari"]);
		$prepared_data 				= array_merge($prepared_data,$prepare_subtopik_cari_cari);
		}
	
	
	$query = $datatable->get_custom(
"SELECT
		*
	FROM
	td_bravopedia
$data_pertanyaan_cari $data_jawaban_cari $data_das_cari $strCari",$columns,$prepared_data);
	
} else {
	$query = $datatable->get_custom(
	"SELECT
		*
	FROM
	td_bravopedia",$columns);
}
	$data = array();
	$i=1;
	foreach ($query	as $value) {
	$ResultData = array();	

	$ResultData[] = "<div class='pull-center'>".$datatable->number($i)."</div>".
					"<input type='hidden' id='id-value-".$value->id."' value='".$value->id."'>".
                    "<input type='hidden' id='bab-value-".$value->id."' value='".$value->kode_bab."'>".
                    "<input type='hidden' id='bab_det-value-".$value->id."' value='".$value->bab_detail."'>".
                    "<input type='hidden' id='topik-value-".$value->id."' value='".$value->kode_topik."'>".
                    "<input type='hidden' id='topik_det-value-".$value->id."' value='".$value->topik_detail."'>".
                    "<input type='hidden' id='subtopik-value-".$value->id."' value='".$value->kode_subtopik."'>".
                    "<input type='hidden' id='subtopik_det-value-".$value->id."' value='".$value->subtopik_detail."'>".
                    "<input type='hidden' id='pertanyaan-value-".$value->id."' value='".$value->pertanyaan_bravopedia."'>".
                    "<input type='hidden' id='jawaban-value-".$value->id."' value='".$value->jawaban_bravopedia."'>".
                    "<input type='hidden' id='daskum-value-".$value->id."' value='".$value->daskum_bravopedia."'>".
					"<input type='hidden' id='ndver-value-".$value->id."' value='".$value->dasver_bravopedia."'>".
					"<input type='hidden' id='stat-value-".$value->id."' value='".$value->ket_bravopedia."'>".
                    "<input type='hidden' id='tgl_nd-value-".$value->id."' value='".$value->tgl."'>";
	$ResultData[] = 
		"<div class='col-md-12 row'>
			<ul class='timeline'>
			<li class='time-label'>
				<div class='pull-right'>
					<span style='font-size:11px; font-family:source-sans-pro, Arial, sans-serif' class='time'>
					<i class='fa fa-clock-o'></i>&nbsp;
					".date("d-m-Y", strtotime($value->tgl))."
					</span>
				</div>
				<span class='pull-left' style='font-weight:400; font-size:14px'>
					".$value->bab_detail."&nbsp;&nbsp;<i class='fa fa-angle-right'></i>&nbsp;&nbsp;
					".$value->topik_detail."&nbsp;&nbsp;<i class='fa fa-angle-right'></i>&nbsp;&nbsp;
					<b>".$value->subtopik_detail."</b>
				</span>
			</li>
			<li>
			<i class='fa fa-refresh fa-spin bg-skin'></i>
			<div class='timeline-item' style='margin-bottom:-39px'>
				<div class='timeline-header'>
					<b>".$value->pertanyaan_bravopedia."</b>
				</div>
				<div class='timeline-body'>
					".$value->jawaban_bravopedia."			
				</div>
				<div class='timeline-footer'>
					<div data-toggle='collapse' data-parent='#accordion' data-target='#collapse".$value->id."'>
						<a data-toggle='tooltip' title='click here' data-placement='top' class='text-act'>
						<b><i class='fa fa-spinner fa-spin'></i>&nbsp;Dasar Hukum</b>
						</a>
					</div>
					<div id='collapse".$value->id."' class='panel-collapse collapse box-primary'>
					". nl2br($value->daskum_bravopedia,true)."
					</div>
				</div>
			</div>
			</li>
			</ul>
		</div>
		";
	$ResultData[] = "<a href='javascript:void();' data-toggle='modal' data-target='#modal-faq' onclick='edit(".$value->id.");' class='btn btn-warning'><span class='glyphicon glyphicon-pencil'></span></a>"."&nbsp;".
	"<a href='javascript:void();' data-toggle='modal' data-target='#delete-modal' onclick='hapus(".$value->id.");' class='btn btn-danger'><span class='glyphicon glyphicon-erase'></span></a>";

	//memasukan array ke variable $data
	$data[] = $ResultData;
	$i++;
}
//set data
$datatable->set_data($data);
//create our json
$datatable->create_data();
