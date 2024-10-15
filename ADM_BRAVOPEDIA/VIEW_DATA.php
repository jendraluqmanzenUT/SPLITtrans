<table class="table table-bordered" id="TPer" width="100%">
	<thead class="thead-skin">
    	<tr>
        	<th width="5%" class="text-center"><b>No</b></th>
            <th width="85%" class="text-center"><b>Data Bravopedia</b></th>
            <th width="10%" class="text-center"><b>Action</b></th>
        </tr>
	</thead>
   	<tbody>
    </tbody>
</table>
<script>
function edit(no){
	$("#btn-simpan").hide();
	$("#btn-ubah").show();
	$("#modal-title").html("Form Ubah data");
	var id 						= $("#id-value-" + no).val();
	var tgl_layanan 			= $("#tgl_nd-value-" + no).val();
	var tgl_lay					= moment(tgl_layanan).format('DD/MM/YYYY');
	var ndver 					= $("#ndver-value-" + no).val();	
	var bab 					= $("#bab-value-" + no).val();
	var bab_det					= $("#bab_det-value-" + no).val();
	var topik					= $("#topik-value-" + no).val();
	var topik_det				= $("#topik_det-value-" + no).val();	
	var subtopik 				= $("#subtopik-value-" + no).val();
	var subtopik_det			= $("#subtopik_det-value-" + no).val();	
	var pertanyaan				= $("#pertanyaan-value-" + no).val();
	var jawaban					= $("#jawaban-value-" + no).val();
	var daskum					= $("#daskum-value-" + no).val();
	var stat					= $("#stat-value-" + no).val();
	
	$("#stat_brav").val(stat).trigger('change');
	$("#data-id").val(id).attr("readonly","readonly");
	$("#tgl_nd").val(tgl_lay).trigger('change');
	$("#ndver").val(ndver).trigger('input');
	$("#bab").append($("<option selected></option>").attr("value",bab).text(bab_det));
	$("#topik").append($("<option selected></option>").attr("value",topik).text(topik_det));
	$("#subtopik").append($("<option selected></option>").attr("value",subtopik).text(subtopik_det));
	$("#pertanyaan").val(pertanyaan).trigger('input');
	$("#daskum").val(daskum).trigger('input');
	$("#jawaban").val(jawaban).trigger('input');
	$('#form-faq').bootstrapValidator('updateStatus', 'bab', 'NOT_VALIDATED').bootstrapValidator('validateField', 'bab');
	$('#form-faq').bootstrapValidator('updateStatus', 'topik', 'NOT_VALIDATED').bootstrapValidator('validateField', 'topik');
	$('#form-faq').bootstrapValidator('updateStatus', 'subtopik', 'NOT_VALIDATED').bootstrapValidator('validateField', 'subtopik');
}

function hapus(no){
	var id = $("#id-value-" + no).val(); 
	$("#data-id").val(id);
}
</script>
<script type="text/javascript">
$(document).ready(function() {
	var dataTable = $("#TPer").dataTable({
		"dom"		:'<"top"<"pull-right"f><"pull-left"l>>rt<"bottom"<"pull-left"i><"pull-right"p>>',
		"language"	: {
			search: "<i class='fa fa-search'></i> Global Search : ",
			searchPlaceholder: 'Filter Data Bravopedia',
			"zeroRecords": "Data Bravopedia Tidak Ditemukan",
			processing	: '<i class="fa fa-spinner fa-spin fa-3x fa-fw text-act"></i><br><br><span class="text-act">Loading, Please Wait......</span>'
						  },
		"columnDefs": [
            {
                "targets": [ 0,2 ],
                "searchable": false
            }
        ],
		"searching": true,
		'pagingType': 'simple_numbers',
		'serverSide': true,
		'processing': true,
		'paging'	: true,
		"deferRender": true,
        'ordering'	: false,
        'info'		: false,
		'lengthMenu': [[20, 50, 100, 200], [20, 50, 100, 200]],
		"ajax":{
			url :"_ADMINISTRASI/Adm_Bravopedia/DATA_CHAIN.php",
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
			searchPlaceholder: 'Filter Data Bravopedia',
			"zeroRecords": "Data Bravopedia Tidak Ditemukan",
			processing	: '<i class="fa fa-spinner fa-spin fa-3x fa-fw text-act"></i><br><br><span class="text-act">Loading, Please Wait......</span>'
						  },
		"columnDefs": [
            {
                "targets": [ 0,2 ],
                "searchable": false
            }
        ],
		"searching": true,
		'pagingType': 'simple_numbers',
		'serverSide': true,
		'processing': true,
		'paging'	: true,
		"deferRender": true,
        'ordering'	: false,
        'info'		: false,
		'lengthMenu': [[20, 50, 100, 200], [20, 50, 100, 200,]],
            "ajax":{
              	url :"_ADMINISTRASI/Adm_Bravopedia/DATA_CHAIN.php",
            	type: "POST", 
                data: function ( d ) {
					  d.bab_cari = $("#bab_cari").val();
					  d.topik_cari = $("#topik_cari").val();
					  d.subtopik_cari = $("#subtopik_cari").val(); 
					  d.pertanyaan_cari = $("#pertanyaan_cari").val();
					  d.jawaban_cari = $("#jawaban_cari").val();
					  d.daskum_cari = $("#daskum_cari").val();
              	},
         		error: function (xhr, error, thrown) {
            	console.log(xhr);
 	            }
			},
		});
	});
});
</script>
