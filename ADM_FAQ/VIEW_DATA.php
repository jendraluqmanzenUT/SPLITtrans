<table class="table table-bordered" id="TPer" width="100%">
	<thead class="thead-skin">
		<tr>
			<th width="5%" class="text-center"><b>No</b></th>
			<th width="85%" class="text-center"><b>Data FAQ Bravo</b></th>
			<th width="10%" class="text-center"><b>Action</b></th>
		</tr>
	</thead>
	<tbody>
	</tbody>
</table>
<script>
	function edit(no) {
		$("#btn-simpan").hide();
		$("#btn-ubah").show();
		$("#modal-title").html("Form Ubah data");
		var id = $("#id-value-" + no).val();
		var tgl_layanan = $("#tgl_nd-value-" + no).val();
		var tgl_lay = moment(tgl_layanan).format('DD/MM/YYYY');
		var ndver = $("#ndver-value-" + no).val();
		var bab = $("#bab-value-" + no).val();
		var bab_det = $("#bab_det-value-" + no).val();
		var topik = $("#topik-value-" + no).val();
		var topik_det = $("#topik_det-value-" + no).val();
		var subtopik = $("#subtopik-value-" + no).val();
		var subtopik_det = $("#subtopik_det-value-" + no).val();
		var pertanyaan = $("#pertanyaan-value-" + no).val();
		var jawaban = $("#jawaban-value-" + no).val();
		var daskum = $("#daskum-value-" + no).val();

		$("#data-id").val(id).attr("readonly", "readonly");
		$("#tgl_nd").val(tgl_lay).trigger('change');
		$("#ndver").val(ndver).trigger('input');
		$("#bab").val(bab);
		$("#topik").append($("<option selected></option>").attr("value", topik).text(topik_det));
		$("#subtopik").append($("<option selected></option>").attr("value", subtopik).text(subtopik_det));
		$("#pertanyaan").val(pertanyaan).trigger('input');
		$("#daskum").val(daskum).trigger('input');
		$("#jawaban").val(jawaban).trigger('input');
		$('#form-faq').bootstrapValidator('updateStatus', 'bab', 'NOT_VALIDATED').bootstrapValidator('validateField', 'bab');
		$('#form-faq').bootstrapValidator('updateStatus', 'topik', 'NOT_VALIDATED').bootstrapValidator('validateField', 'topik');
		$('#form-faq').bootstrapValidator('updateStatus', 'subtopik', 'NOT_VALIDATED').bootstrapValidator('validateField', 'subtopik');
	}

	function hapus(no) {
		var id = $("#id-value-" + no).val();
		$("#data-id").val(id);
	}
</script>

<script>
	$(document).ready(function() {
		$("#TPer").DataTable({
			"dom": '<"top"<"pull-right"f><"pull-left"l>>rt<"bottom"<"pull-left"i><"pull-right"p>>',
			"language": {
				search: "<i class='fa fa-search'></i> Global Search : ",
				searchPlaceholder: 'Filter Data FAQ',
				"zeroRecords": "FAQ Tidak Ditemukan",
				processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw text-act"></i><br><br><span class="text-act">Loading, Please Wait......</span>'
			},
			"searching": true,
			"pagingType": 'simple_numbers',
			"serverSide": true,
			"processing": true,
			"paging": true,
			"deferRender": true,
			"ordering": false,
			"info": false,
			"lengthMenu": [
				[20, 50, 100, 200],
				[20, 50, 100, 200]
			],
			"ajax": {
				url: "_ADMINISTRASI/ADM_FAQ/DATA_CHAIN.php",
				type: "POST",
				error: function(xhr, error, thrown) {
					console.log(xhr);
				}
			},
		})
		$('.search-data, #btn-search').on('keyup click change', function() {
			$("#TPer").DataTable().destroy();
			$("#TPer").dataTable({
				"dom": '<"top"<"pull-right"f><"pull-left"l>>rt<"bottom"<"pull-left"i><"pull-right"p>>',
				"language": {
					search: "<i class='fa fa-search'></i> Global Search : ",
					searchPlaceholder: 'Filter Data FAQ',
					"zeroRecords": "FAQ Tidak Ditemukan",
					processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw text-act"></i><br><br><span class="text-act">Loading, Please Wait......</span>'
				},
				"searching": true,
				"pagingType": 'simple_numbers',
				"serverSide": true,
				"processing": true,
				"paging": true,
				"deferRender": true,
				"ordering": false,
				"info": false,
				"lengthMenu": [
					[20, 50, 100, 200],
					[20, 50, 100, 200]
				],
				"ajax": {
					url: "_ADMINISTRASI/ADM_FAQ/DATA_CHAIN.php",
					type: "POST",
					data: function(d) {
						d.bab_cari = $("#bab_cari").val();
						d.topik_cari = $("#topik_cari").val();
						d.subtopik_cari = $("#subtopik_cari").val();
						d.pertanyaan_cari = $("#pertanyaan_cari").val();
						d.jawaban_cari = $("#jawaban_cari").val();
						d.daskum_cari = $("#daskum_cari").val();
					},
					error: function(xhr, error, thrown) {
						console.log(xhr);
					}
				},

			})
		})
		$('#btn-reset-cari').on('click', function() {
			$("#TPer").DataTable().destroy();
			var datatable = $("#TPer").DataTable({
				"dom": '<"top"<"pull-right"f><"pull-left"l>>rt<"bottom"<"pull-left"i><"pull-right"p>>',
				"language": {
					search: "<i class='fa fa-search'></i> Global Search : ",
					searchPlaceholder: 'Filter Data FAQ',
					"zeroRecords": "FAQ Tidak Ditemukan",
					processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw text-act"></i><br><br><span class="text-act">Loading, Please Wait......</span>'
				},
				"searching": true,
				"pagingType": 'simple_numbers',
				"serverSide": true,
				"processing": true,
				"paging": true,
				"deferRender": true,
				"ordering": false,
				"info": false,
				"lengthMenu": [
					[20, 50, 100, 200],
					[20, 50, 100, 200]
				],
				"ajax": {
					url: "_ADMINISTRASI/ADM_FAQ/DATA_CHAIN.php",
					type: "POST",
					error: function(xhr, error, thrown) {
						console.log(xhr);
					}
				},
			})
		})
	});
</script>
<!--######  /.MODAL BACA PERATURAN -->
	<script>
		$(document).ready(function() {
			$('#form-peraturan').on('show.bs.modal', function(event) {
				var button = $(event.relatedTarget)
				var id = button.data('id')
				var status = button.data('rubah')
				var modal = $(this)
				modal.find('.modal-body input#id').val(id)
				$.ajax({
					type: 'post',
					url: "_Administrasi/Adm_Peraturan/get_pdf.php",
					data: {
						id: id,
						status: status
					},
					success: function(data) {
						$('.data-peraturan').html(data);
					}
				});
			});
		});
	</script>
