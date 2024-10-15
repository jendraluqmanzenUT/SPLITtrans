	<table class="display table table-bordered table-responsive" id="TPer" width="100%">
		<thead class="thead-skin">
			<tr>
				<th width="5%" class="text-center"><b>No</b></th>
				<th width="87%" class="text-center"><b>Data Peraturan</b></th>
				<th width="8%" class="text-center"><b>Action</b></th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
	<script>
		$(document).ready(function() {
			$("#TPer").DataTable({
				"dom": '<"top"<"pull-right"f><"pull-left"l>>rt<"bottom"<"pull-left"i><"pull-right"p>>',
				"language": {
					search: "<i class='fa fa-search'></i> Global Search : ",
					searchPlaceholder: 'Filter Data Peraturan',
					"zeroRecords": "Peraturan Tidak Ditemukan",
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
					url: "_ADMINISTRASI/ADM_PERATURAN/DATA_CHAIN.php",
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
						searchPlaceholder: 'Filter Data Peraturan',
						"zeroRecords": "Peraturan Tidak Ditemukan",
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
						url: "_ADMINISTRASI/ADM_PERATURAN/DATA_CHAIN.php",
						type: "POST",
						data: function(d) {
							d.jenis_cari = $("#jenis_cari").val();
							d.bab_cari = $("#bab_cari").val();
							d.subbab_cari = $("#subbab_cari").val();
							d.posper_cari = $("#posper_cari").val();
							d.subpos_cari = $("#subpos_cari").val();
							d.judul_cari = $("#judul_cari").val();
							d.nomor_cari = $("#nomor_cari").val();
							d.cari_all = $("#cari_all").val();
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
						searchPlaceholder: 'Filter Data Peraturan',
						"zeroRecords": "Peraturan Tidak Ditemukan",
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
						url: "_ADMINISTRASI/ADM_PERATURAN/DATA_CHAIN.php",
						type: "POST",
						error: function(xhr, error, thrown) {
							console.log(xhr);
						}
					},
				})
			})
		});
	</script>

	<script>
		function edit(no) {
			var id = $("#id-value-" + no).val();
			var jenis_per = $("#jenis_per-value-" + no).val();
			var detail_jenis_per = $("#detail_jenis_per-value-" + no).val();
			var kode_per1 = $("#kode_per1-value-" + no).val();
			var detail_per1 = $("#detail_per1-value-" + no).val();
			var kode_per2 = $("#kode_per2-value-" + no).val();
			var detail_per2 = $("#detail_per2-value-" + no).val();
			var kode_per3 = $("#kode_per3-value-" + no).val();
			var detail_per3 = $("#detail_per3-value-" + no).val();
			var kode_per4 = $("#kode_per4-value-" + no).val();
			var detail_per4 = $("#detail_per4-value-" + no).val();
			var detail_status = $("#detail_status-value-" + no).val();
			var no_per_baru = $("#no_per_baru-value-" + no).val();
			var judul_per_baru = $("#judul_per_baru-value-" + no).val();
			var kode_perubahan = $("#status_peraturan-value-" + no).val();
			var kode_cabut = $("#status_cabut-value-" + no).val();

			$("#data-id").val(id).attr("readonly", "readonly");
			$("#last_per").val(kode_perubahan).attr("readonly", "readonly");
			$("#kode_cabut").val(kode_cabut).attr("readonly", "readonly");
			$("#jenis_per2").val(jenis_per).trigger('change');
			$("#bab_per2").val(kode_per1);
			$("#subbab2").append($("<option selected></option>").attr("value", kode_per2).text(detail_per2));
			$("#posper2").append($("<option selected></option>").attr("value", kode_per3).text(detail_per3));
			$("#subpos2").append($("<option selected></option>").attr("value", kode_per4).text(detail_per4));
			$("#no_per_baru2").val(no_per_baru).attr("readonly", "readonly").trigger('change');
			$("#judul_per_baru2").val(judul_per_baru).attr("readonly", "readonly").trigger('change');
			$('#form-ubah').bootstrapValidator('updateStatus', 'bab_per2', 'NOT_VALIDATED').bootstrapValidator('validateField', 'bab_per2');
			$('#form-ubah').bootstrapValidator('updateStatus', 'subbab2', 'NOT_VALIDATED').bootstrapValidator('validateField', 'subbab2');
			$('#form-ubah').bootstrapValidator('updateStatus', 'posper2', 'NOT_VALIDATED').bootstrapValidator('validateField', 'posper2');
			$('#form-ubah').bootstrapValidator('updateStatus', 'subpos2', 'NOT_VALIDATED').bootstrapValidator('validateField', 'subpos2');
		}

		function hapus(no) {
			var id = $("#id-value-" + no).val();
			$("#id-cabut").val(id).attr("readonly", "readonly");
		}
	</script>
	<!--######  /.MODAL BACA PERATURAN -->
	<div class="modal fade" id="form-peraturan" role="dialog" aria-labelledby="peraturan-Label" aria-hidden="true">
		<div class="modal-dialog modal-vlg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"></h4>
				</div>
				<div class="modal-body">
					<div class="data-peraturan"></div>
				</div>
				<div class="modal-footer">
					<a class="btn btn-danger" data-dismiss="modal">Close</a>
				</div>
			</div>
		</div>
	</div>
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