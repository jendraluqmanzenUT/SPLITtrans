$(document).ready(function(){
	$("#loading-simpan, #loading-ubah, #loading-hapus, #btn-reset").hide();
			
	$('#btn-ubah').click(function() {	
		var data = new FormData();
			data.append('id', $("#data-id").val());
			data.append('nama_pegawai', $("#nama_pegawai").val());
			data.append('nip_pegawai', $("#nip_pegawai").val());
			data.append('email', $("#email").val());
			data.append('username', $("#username").val()); 
			data.append('sandi', $("#sandi").val());
			data.append('password', $("#password").val());
			data.append('salt', $("#salt").val());		
			data.append('telp', $("#telp").val());
			data.append('qoute', $("#qoute").val());	
			data.append('tipologi', $("#tipologi").val());
			data.append('strataII', $("#strataII").val());
			data.append('strataIII', $("#strataIII").val());
			data.append('strataIV', $("#strataIV").val());
			data.append('jabatan', $("#jabatan").val());
			data.append('pangol', $("#pangol").val());
			data.append('privimpor', $("#privimpor").val());
			data.append('privekspor', $("#privekspor").val());
			data.append('privintelijen', $("#privintelijen").val());
			data.append('privli', $("#privli").val());
			data.append('privlki', $("#privlki").val());
			data.append('privlkai', $("#privlkai").val());
			data.append('privnhi', $("#privnhi").val());
			data.append('privnip', $("#privnip").val());
			data.append('privapoint', $("#privapoint").val());
			data.append('privrekapintel', $("#privrekapintel").val());
			data.append('privblokir', $("#privblokir").val());
			data.append('priveditblokir', $("#priveditblokir").val());
			data.append('privsurvailance', $("#privsurvailance").val());
			data.append('privatensiintel', $("#privatensiintel").val());
			data.append('privstaffintel', $("#privstaffintel").val());
			data.append('privstpi', $("#privstpi").val());
			data.append('privanalispenumpang', $("#privanalispenumpang").val());
			data.append('privatensipenumpang', $("#privatensipenumpang").val());
			data.append('privanalisyacht', $("#privanalisyacht").val());
			data.append('privatensiyacht', $("#privatensiyacht").val());
			data.append('privedityacht', $("#privedityacht").val());
			data.append('privanalisplb', $("#privanalisplb").val());
			data.append('privatensiplb', $("#privatensiplb").val());
			data.append('priveditplb', $("#priveditplb").val());
			data.append('privpenindakan', $("#privpenindakan").val());
			data.append('privreekspor', $("#privreekspor").val());
			data.append('privpibk', $("#privpibk").val());
			data.append('privsbp', $("#privsbp").val());
			data.append('priveditsbp', $("#priveditsbp").val());
			data.append('privpjt', $("#privpjt").val());
			data.append('privcd', $("#privcd").val());
			data.append('privstaffpenindakan', $("#privstaffpenindakan").val());
			data.append('privlaporan', $("#privlaporan").val());
			data.append('privlaporanplb', $("#privlaporanplb").val());
			data.append('privlaporanyacht', $("#privlaporanyacht").val());
			data.append('privimpordatapib', $("#privimpordatapib").val());
			data.append('privimpordatapeb', $("#privimpordatapeb").val());
			data.append('privimpordataspkpbm', $("#privimpordataspkpbm").val());
			data.append('privexecutive', $("#privexecutive").val());
			data.append('privexelaporan', $("#privexelaporan").val());
			data.append('privexebulanan', $("#privexebulanan").val());
			data.append('privvillar', $("#privvillar").val());
			data.append('privpabean', $("#privpabean").val());
			data.append('privkoordagenfasilitaspusat', $("#privkoordagenfasilitaspusat").val());
			data.append('privkoordagenfasilitas', $("#privkoordagenfasilitas").val());
			data.append('privagenfaskhusus', $("#privagenfaskhusus").val());
			data.append('privagenfas', $("#privagenfas").val());
			data.append('privstaffagenfas', $("#privstaffagenfas").val());
			data.append('privpabeanplb', $("#privpabeanplb").val());
			data.append('privpabeanyacht', $("#privpabeanyacht").val());
			data.append('privjaminan', $("#privjaminan").val());
			data.append('priveditjaminan', $("#priveditjaminan").val());
			data.append('privmanifest', $("#privmanifest").val());
			data.append('privmanifestplb', $("#privmanifestplb").val());
			data.append('privmanifestyacht', $("#privmanifestyacht").val());
			data.append('privimpordatamanifest', $("#privimpordatamanifest").val());
			data.append('priveditmanifest', $("#priveditmanifest").val());
			data.append('privpli', $("#privpli").val());
			data.append('privppidtk1', $("#privppidtk1").val());
			data.append('privppidtk2', $("#privppidtk2").val());
			data.append('privppidtk3', $("#privppidtk3").val());
			data.append('privppid', $("#privppid").val());
			data.append('privstaffppid', $("#privstaffppid").val());
			data.append('privclco', $("#privclco").val());
			data.append('privstaffpli', $("#privstaffpli").val());
			data.append('privcc', $("#privcc").val());
			data.append('privcs', $("#privcs").val());
			data.append('privumum', $("#privumum").val());
			data.append('privbtki', $("#privbtki").val());
			data.append('privtl', $("#privtl").val());
	
			$("#loading-ubah").show();
			$.ajax({
				url: '_ADMINISTRASI/Aktivasi_User/PROSES_UBAH.php',
				type: 'POST',
				data: data,
				processData: false,
				contentType: false,
				dataType: "json",
				beforeSend: function(e) {
					if(e && e.overrideMimeType) {
						e.overrideMimeType("application/json;charset=UTF-8");
					}
				},
				success: function(response){
					$("#loading-ubah").hide();
					if(response.status == "sukses"){
						var notify = $.notify('<strong>Saving</strong> Do not close this page...', {
							allow_dismiss: false,
							showProgressbar: true,
							placement: {
									from: "bottom"
									},
							z_index: 20000,
						});
						setTimeout(function() {
							notify.update({
							'type': 'success', 
							'message': '<strong>Success</strong> Your page has been saved!', 
							'progress': 25});
						}, 4500);
						$("#modal-pegawai").modal('hide');
						$("#view_search").html(response.html);
						//$("#pesan-sukses").html(response.pesan).fadeIn().delay(3000).fadeOut();								
					} else { 
						new PNotify({
							title: 'Oh No!',
							text: response.pesan,
							type: 'error',
							styling: 'fontawesome'
							});
					}
				},
				error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
					alert(xhr.responseText); // Munculkan alert
				}
			});
	});
	
	$("#btn-hapus").click(function(){
		var data = new FormData();
		data.append('id', $("#data-id").val());
		$("#loading-hapus").show();
		$.ajax({
			url: '_ADMINISTRASI/Aktivasi_User/PROSES_HAPUS.php',
			type: 'POST',
			data: data,
			processData: false,
			contentType: false,
			dataType: "json",
			beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(response){ 
				var notify = $.notify('<strong>Saving</strong> Do not close this page...', {
					allow_dismiss: false,
					showProgressbar: true,
					placement: {
						from: "bottom"
						},
					z_index: 20000,
					});
					setTimeout(function() {
						notify.update({
						'type': 'warning', 
						'message': '<strong>Success</strong> Your page has been saved!', 
						'progress': 25});
					}, 4500);
				$("#loading-hapus").hide(); 
				$("#view_search").html(response.html);
				$("#delete-modal").modal('hide'); // Close / Tutup Modal Dialog
			},
			error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
				alert("ERROR : "+xhr.responseText); // Munculkan alert
			}
		});
	});
	
	$("#btn-search").click(function(){
		$(this).html("Searching...").attr("disabled", "disabled");
		$.ajax({
			url: '_ADMINISTRASI/Aktivasi_User/SEARCH.php',
			type: 'POST',
			data: 
			{
				nama_cari: $("#nama_cari").val(),
				nip_cari: $("#nip_cari").val(),
				email_cari: $("#email_cari").val(),
				telp_cari: $("#telp_cari").val(),
				strataII2: $("#strataII2").val(),
				strataIII2: $("#strataIII2").val(),
				strataIV2: $("#strataIV2").val(),
				jabatan_cari: $("#jabatan_cari").val(),
			},
			dataType: "json",
			beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(response){ 
				$("#btn-search").html("Search").removeAttr("disabled");
				$("#view_search").html(response.hasil);
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert(xhr.responseText);
			}
		});
	});
	$("#btn-resetsearch").click(function(){
		document.getElementById("myForm").reset();
		$('#strataII2').val('').trigger('change');
		$('#jabatan_cari').val('').trigger('change');
		var strataII2		= $('#strataII2');
		var strataIII2		= $('#strataIII2');
		var strataIV2		= $('#strataIV2');
		$(strataII2).val("");
		$(strataIII2).empty("");
		$(strataIV2).empty("");
		$("#btn-search").click();
	});
	$('#modal-pegawai').on('hide.bs.modal', function (e){ 
		$("#btn-reset").click();
		$("#id").removeAttr('readonly');
		$("#p").empty("");
		$(this).find(':input, textarea, :file, .input-group-addon').each(function() {
    		$(this).removeClass('input-error');
    	});
		$(this).find(':checkbox').prop('checked',false);
		$('#tipologi').val('').trigger('change');
		$('#jabatan').val('').trigger('change');
		$('#pangol').val('').trigger('change');
		$('#strataII').val('').trigger('change');
		
		$("#strataII option:last").remove();
		$("#strataIII option").remove();
		$("#strataIV option").remove();
			
		var strataII		= $('select[name^="strataII"]');
		var strataIII		= $('#strataIII');
		var strataIV		= $('#strataIV');
		$(strataII).val("");
		$(strataIII).empty("");
		$(strataIV).empty("");
		$('#form-pegawai').bootstrapValidator('resetForm', true);
		
		$(this).find($("fieldset").hide());
		$(this).find($("fieldset:first").show());
		  
	});

});
