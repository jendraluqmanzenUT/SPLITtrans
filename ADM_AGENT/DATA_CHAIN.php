<?php
include_once ("LIBRARY/CONFIG.php");
sec_session_start();
$columns = array(
	'nama_agent',
	'nip_agent',
	'position',
	'tugas',
	'status',
	);
	$datatable->set_numbering_status(0);
	$datatable->set_order_by("status");
	$datatable->set_order_type("ASC");
	
$query = $datatable->get_custom("SELECT * FROM td_agent_bravo",$columns);
$data = array();
$i=1;
foreach ($query	as $value) {
$ResultData = array();	
	$ResultData[] = "<div class='pull-center'>".$datatable->number($i)."</div>".
		"<input type='hidden' id='id-value-".$value->id."' value='".$value->id."' readonly>".
		"<input type='hidden' id='nama_agent-value-".$value->id."' value='".$value->nama_agent."' readonly>".
		"<input type='hidden' id='nip_agent-value-".$value->id."' value='".$value->nip_agent."' readonly>".
		"<input type='hidden' id='position-value-".$value->id."' value='".$value->position."' readonly>".
		"<input type='hidden' id='tugas-value-".$value->id."' value='".$value->tugas."' readonly>".
		"<input type='hidden' id='status-value-".$value->id."' value='".$value->status."' readonly>";
	$ResultData[] = "<div class='pull-left'>".$value->nama_agent."</div>";
	$ResultData[] = "<div class='pull-left'>".$value->position."</div>";
	$ResultData[] = "<div class='pull-center'>".$value->tugas."</div>";
	$ResultData[] = "<div class='pull-center'>".$value->status."</div>";
	$ResultData[] = 
	"
	<div class='pull-center'>
	<a 	href='javascript:void();' data-toggle='modal' data-target='#modal-OPEN' 
		onclick='edit(".$value->id.");' class='btn btn-warning'>
		<span class='glyphicon glyphicon-pencil'></span>
	</a>
	<a 	href='javascript:void();' data-toggle='modal' data-target='#delete-modal'
		onclick='hapus(".$value->id.");' class='btn btn-danger'>
		<span class='glyphicon glyphicon-erase'></span>
	</a>
	</div>
	";
	$data[] = $ResultData;
	$i++;
}
$datatable->set_data($data);
$datatable->create_data();
