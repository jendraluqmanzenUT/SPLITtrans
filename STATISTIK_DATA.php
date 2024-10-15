<!doctype html><head>
<title>DJBC DC - STATISTIK DATA</title>
</head>
<style>
.dataTables_wrapper .dataTables_processing {
	margin-top: -1px !important;
}
</style>
<!--########################################################################################################----------TAG ROOT-------------->
<div class="content-wrapper">
    <section class="content-header">
    	<h1>Data Statistik User<small><span class="w3-text-deep-blue"><b>#Beacukai</b></span><span class="w3-text-red"><b>makinbaik</b></span></small></h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Manajemen Admin </a></li>
            <li class="active"> Statistik Data </li>
        </ol>
    </section>
<section class="content">

<div class="row">
    <div class="col-xs-12">
  	<div class="box box-skin collapsed-box">
    <div class="box-header with-border bg-skin" data-widget="collapse"><i class="fa fa-plus"></i>
        <h3 class="box-title">Menu Pencarian Data</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
        </div>
    </div>
	<div class="box-body">
    
    </div>
    </div>
    </div>
</div>
<!--######################################################################################################################################-->
<div class="row">
    <div class="col-xs-12">
    <div class="box box-skin">
    <div class="box-header with-border bg-skin">
        <h3 class="box-title">Data Statistik User</h3>
    </div>
        <div class="box-body">
        <table id="TPer" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead class="thead-skin">
                <tr>
                    <th width="5%" class="pull-center">No</th>
                    <th width="20%" class="pull-center">Nama User</th>
                    <th width="10%" class="pull-center">IP User</th>
                    <th width="45%" class="pull-center">User Agent</th>
                    <th width="5%" class="pull-center">Hit</th>
                    <th width="15%" class="pull-center">Last Login</th>     
                </tr>
            </thead>
       		<tbody>&nbsp;</tbody>
    	</table>
        </div>
<div class="box-footer">
	<div class="w3-right">
        	<span class="w3-text-deep-blue"><b>#Beacukai</b></span><span class="w3-text-red"><b>makinbaik</b></span>
	</div>
</div>
</div>
</div>
</div>
<!--######################################################################################################################################-->
</section>
</div>
<script type="text/javascript">
$(document).ready(function() {
	var dataTable = $("#TPer").dataTable({
		"dom"		:'<"top"<"pull-right"f><"pull-left"l>>rt<"bottom"<"pull-left"i><"pull-right"p>>',
		"language"	: {
			search: "<i class='fa fa-search'></i> Global Search : ",
			searchPlaceholder: 'Filter Data Statistik',
			"zeroRecords": "Data Tidak Ditemukan",
			processing	: '<i class="fa fa-spinner fa-spin fa-3x fa-fw text-act"></i><br><br><span class="text-act">Loading, Please Wait......</span>'
		},
		"serverSide": true,
		"processing": true,
		"searching"	: true,
		'pagingType': 'simple_numbers',
		'paging'	: true,
        'ordering'	: true,
		'lengthMenu': [[20, 50, 100, 200], [20, 50, 100, 200]],
		"ajax":{
			url :"_ADMINISTRASI/Statistik_Data/DATA_CHAIN.php",
			type: "POST", 
			error: function (xhr, error, thrown) {
				console.log(xhr);
			}
		},
	 });
	 $('.search-data, #btn-search').on( 'keyup click change', function () { 
     	dataTable.fnDestroy();
     	$("#TPer").dataTable({
			"dom"		:'<"top"<"pull-right"f><"pull-left"l>>rt<"bottom"<"pull-left"i><"pull-right"p>>',
		"language"	: {
			search: "<i class='fa fa-search'></i> Global Search : ",
			searchPlaceholder: 'Filter Data Statistik',
			"zeroRecords": "Data Tidak Ditemukan",
			processing	: '<i class="fa fa-spinner fa-spin fa-3x fa-fw text-act"></i><br><br><span class="text-act">Loading, Please Wait......</span>'
						  },
		"columnDefs": [
                { "type": "numeric-comma", targets: 4 }
         ],
		"searching": true,
		'pagingType': 'simple_numbers',
		'serverSide': true,
		'processing': true,
		'paging'	: true,
        'ordering'	: true,
        'info'		: false,
		'lengthMenu': [[20, 50, 100, 200], [20, 50, 100, 200]],
            "ajax":{
              	url :"_ADMINISTRASI/Statistik_Data/DATA_CHAIN.php",
            	type: "POST", 
				data: function ( d ) {
                      d.nama_cari = $("#nama_cari").val();
					  d.nip_cari = $("#nip_cari").val();
					  d.email_cari = $("#email_cari").val();
					  d.tgl_login = $("#tgl_login").val();
					  d.strataII2 = $("#strataII2").val();
					  d.strataIII2 = $("#strataIII2").val();
					  d.strataIV2 = $("#strataIV2").val();
					  d.jabatan_cari = $("#jabatan_cari").val();
              	},
         		error: function (xhr, error, thrown) {
            	console.log(xhr);
 	            }
			},
		});
	});
	$('#btn-resetsearch').on('click', function() {
     	$('#TPer').DataTable().destroy();
     	var dataTable = $("#TPer").dataTable({
		"dom"		:'<"top"<"pull-right"f><"pull-left"l>>rt<"bottom"<"pull-left"i><"pull-right"p>>',
		"language"	: {
			search: "<i class='fa fa-search'></i> Global Search : ",
			searchPlaceholder: 'Filter Data Statistik',
			"zeroRecords": "Data Tidak Ditemukan",
			processing	: '<i class="fa fa-spinner fa-spin fa-3x fa-fw text-act"></i><br><br><span class="text-act">Loading, Please Wait......</span>'
		},
		"serverSide": true,
		"processing": true,
		"searching"	: true,
		'pagingType': 'simple_numbers',
		'paging'	: true,
        'ordering'	: true,
		'lengthMenu': [[20, 50, 100, 200], [20, 50, 100, 200]],
		"ajax":{
			url :"_ADMINISTRASI/Statistik_Data/DATA_CHAIN.php",
			type: "POST", 
			error: function (xhr, error, thrown) {
				console.log(xhr);
			}
		},
	 });
	});
});
</script>
<script>
$("#btn-resetsearch").click(function(){
		document.getElementById("myForm").reset();
		$('#strataII2').val('').trigger('change');
		$('#tgl_login').val('').trigger('change');
		$('#jabatan_cari').val('').trigger('change');
		var strataII2		= $('#strataII2');
		var strataIII2		= $('#strataIII2');
		var strataIV2		= $('#strataIV2');
		$(strataII2).val("");
		$(strataIII2).empty("");
		$(strataIV2).empty("");
		//$("#btn-search").click();
	});
</script>
<script>
$('.action2').change(function(){
	if($(this).val() != '')
			{
				var action2	= $(this).attr("id");
				var query2 	= $(this).val();
				var result2	= '';
				if 	(action2 == "strataII2")
			{
				result2 = 'strataIII2';
			}
			else
			{
				result2 = 'strataIV2';
			}
			$.ajax({
				url:	'_DEFINE_GET/_KantorDJBC/Get_Kantor.php',
				method:	'POST',
				data:{action2:action2, query2:query2},
				success:function(data){
				$('#'+result2).html(data);
				}	
			})
		}
 	});
</script>