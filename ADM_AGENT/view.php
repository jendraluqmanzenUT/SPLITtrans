	<table class="table table-bordered table-responsive" id="T1" width="100%">
       	<thead class="thead-skin">
           <tr>
              <th width="5%" class="pull-center"><b>No</b></th>
              <th width="25%" class="pull-center"><b>Nama Agent</b></th>
              <th width="30%" class="pull-center"><b>Position</b></th>
              <th width="15%" class="pull-center"><b>Skill</b></th>
              <th width="15%" class="pull-center"><b>Status</b></th>
              <th width="10%" class="pull-center"><b>Action</b></th>
            </tr>
       	</thead>
   	   	<tbody></tbody>
	</table>

<script>
function edit(no){
	$("#btn-simpan").hide();
	$("#btn-ubah").show();
	$("#modal-title").html("Form Ubah data");
	var id 				= $("#id-value-" + no).val();
	var nama_agent	 	= $("#nama_agent-value-" + no).val();
	var nip_agent 		= $("#nip_agent-value-" + no).val();	
	var position 		= $("#position-value-" + no).val();
	var tugas			= $("#tugas-value-" + no).val();
	var status			= $("#status-value-" + no).val();
		
	$("#data-id").val(id).attr("readonly",true);
	$("#nama_agent").val(nama_agent).trigger('input');
	$("#nip_agent").val(nip_agent).trigger('input');
	$("#position").val(position).trigger('change.select2');
	$('#form-AGENT')
		.bootstrapValidator('updateStatus', 'position', 'NOT_VALIDATED')
		.bootstrapValidator('validateField', 'position');  
	$("#tugas").append($("<option selected></option>").attr("value",tugas).text(tugas).trigger('change'));
	$("#form-AGENT")
		.bootstrapValidator('updateStatus', 'tugas', 'NOT_VALIDATED')
		.bootstrapValidator('validateField', 'tugas');  
	$("#status").val(status).trigger('change');
}
function hapus(no){
	var id = $("#id-value-" + no).val();
	$("#data-id").val(id);
}
</script>
<script type="text/javascript">
$(document).ready(function() {
var dataTable = $("#T1").dataTable({
	"dom"		:'<"top"<"pull-right"f><"pull-left"l>>rt<"bottom"<"pull-left"i><"pull-right"p>>',
	"language"	: {
		search: "<i class='fa fa-search'></i> Global Search : ",
    	searchPlaceholder: 'Filter Data Agent Bravo',
		"zeroRecords": "<b>Laporan Tidak Ditemukan</b>",
		processing	: '<i class="fa fa-spinner fa-spin fa-3x fa-fw text-act"></i><br><br><span class="text-act">Loading, Please Wait......</span>'
	},
	"searching"		: true,
	'pagingType'	: 'simple_numbers',
	'serverSide'	: true,
	'processing'	: true,
	'paging'		: true,
	'deferRender'	: true,
	'ordering'		: false,
	'info'			: false,
	"lengthMenu"	: [[20, 50, 100, 150], [20, 50, 100, 150]],
	"columnDefs"	: [
		{ "type": "numeric-comma", targets: 0 },
    ],
	"ajax":{
		url :"_ADMINISTRASI/ADM_AGENT/DATA_CHAIN.php",
		type: "POST"
	},
 });
});
</script>