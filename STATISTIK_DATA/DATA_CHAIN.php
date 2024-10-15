<?php
include_once ("LIBRARY/CONFIG.php");
sec_session_start();
$columns = array(
	'NAMA_USER',
	'IP_USERS',
	'BROWSER',
	'TANGGAL_LOG',
	'HITS_DATA',
	);
	
	$datatable->set_numbering_status(4);
	$datatable->set_order_by("TANGGAL_LOG");
	$datatable->set_order_type("desc");
	
	$query = $datatable->get_custom(
	"SELECT * FROM view_user_activity",$columns);
	$data = array();
	$i=1;
	foreach ($query	as $value) {
		$ResultData = array();
	
		$ResultData[] = "<div class='pull-center'>".$datatable->number($i)."</div>";
		$ResultData[] = $value->NAMA_USER;
		$ResultData[] = $value->IP_USERS;
		$ResultData[] = $value->BROWSER;
		$ResultData[] = "<div class='pull-center'>".$value->HITS_DATA."</div>";
		$ResultData[] = date("d-m-Y H:i:s", strtotime($value->TANGGAL_LOG));
	
		$data[] = $ResultData;
		$i++;
	}
$datatable->set_data($data);
$datatable->create_data();
