$(document).ready(function()  {
	$("#loading-simpan, #loading-ubah, #loading-hapus, #btn-reset").hide();
	$("#btn-tambah").click(function(){ 
		$("#btn-ubah").hide(); 
		$("#btn-simpan").show();
		$("#modal-title").html("Form Simpan data");
	});
	$('#tgl_nd')
        .mydatepicker({
            dateFormat: 'dd/mm/yy',
     		changeMonth: false,
     		changeYear: false,
	 		beforeShow: function() {
				setTimeout(function(){
					$('.ui-mydatepicker').css('z-index', 99999999999999);
				}, 0);
			}
        })
        .on('change select', function() {
            // Revalidate the date field
            $('#form-faq').bootstrapValidator('revalidateField', 'tgl_nd');
		});
		$('#form-faq').bootstrapValidator({
			message: 'Pastikan sudah terisi',
			excluded: [':disabled'],
			fields: {
				tgl_nd: {
					validators: {
						notEmpty: {
							message: 'Tanggal harus diisi'
						},
						date: {
						   format: 'DD/MM/YYYY',
						   message: 'The format is dd/mm/yyyy',
						},
                  	}
				},
				ndver: {
					validators: {
						notEmpty: {
							message: 'Nomor nota dinas harus diisi'
						},
						
					}
				},
				bab: {
					validators: {
						notEmpty: {
							message: 'Bab FAQ harus diisi'
						},
						
					}
				},
				topik: {
					validators: {
						notEmpty: {
							message: 'Topik FAQ harus diisi'
						},
						
					}
				},
				subtopik: {
					validators: {
						notEmpty: {
							message: 'Sub Topik FAQ harus diisi'
						},
					}
				},
				pertanyaan: {
					validators: {
						notEmpty: {
							message: 'Pertanyaan FAQ harus diisi'
						},
					}
				},
				jawaban: {
					validators: {
						notEmpty: {
							message: 'Jawaban FAQ harus diisi'
						},
					}
				},
				daskum: {
					validators: {
						notEmpty: {
							message: 'Dasar hukum harus diisi'
						},
					}
				},
			 }, 
		});
		$('#tgl_nd').on('change select', function(e) {
			$('#form-faq').bootstrapValidator('revalidateField', 'tgl_nd');
		});
	$('#btn-simpan').click(function() {
	  	$('#form-faq').bootstrapValidator('validate');
   		if ($('#form-faq').bootstrapValidator('validate').has('.has-error').length) {
        	e.preventDefault();
      	} else {
		var data = new FormData();
			data.append('tgl_nd', $("#tgl_nd").val());
			data.append('ndver', $("#ndver").val()); 
			data.append('bab', $("#bab").val()); 
			data.append('topik', $("#topik").val()); 
			data.append('subtopik', $("#subtopik").val());
			data.append('pertanyaan', $("#pertanyaan").val());
			data.append('jawaban', $("#jawaban").val());
			data.append('daskum', $("#daskum").val());
			$("#loading-simpan").show();
			$.ajax({
				url: '_ADMINISTRASI/Adm_FAQ/PROSES_SIMPAN.php',
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
					$("#loading-simpan").hide();
					if(response.status == "sukses"){
						var notify = $.notify('<strong>Saving</strong> Do not close this page...', {
								type: 'success',
								allow_dismiss: false,
								showProgressbar: true,
								placement: {
									from: "bottom"
									},
								animate: {
									enter: 'animated zoomInDown',
									exit: 'animated zoomOutUp'
									},
								});
								setTimeout(function() {
									notify.update('message', '<strong>Saving</strong> Form Data.');
									}, 1000);
								setTimeout(function() {
									notify.update('message', '<strong>Checking</strong> for errors.');
									}, 2000);
								setTimeout(function() {
									notify.update('message', '<strong>Success</strong> Your page has been saved!.');
									}, 3000);
								setTimeout(function() {
									notify.update('message', '<strong>Success</strong> Wait for reload!.');
									}, 4000);
						$("#modal-faq").modal('hide'); 
						$("#view").html(response.html);
						//$("#pesan-sukses").html(response.pesan).fadeIn().delay(3000).fadeOut();								
					}else{
						new PNotify({
							title: 'Oh No!',
							text: response.pesan,
							type: 'error',
							styling: 'fontawesome'
							});
						}
				},
				error: function (xhr, ajaxOptions, thrownError) {
					alert(xhr.responseText);
				}
			});
		}
	});
	
	
	$('#btn-ubah').click(function() {
	  	$('#form-faq').bootstrapValidator('validate');
   		if ($('#form-faq').bootstrapValidator('validate').has('.has-error').length) {
        	e.preventDefault();
      	} else {
			var data = new FormData();				
			data.append('id', $("#data-id").val());
			data.append('tgl_nd', $("#tgl_nd").val());
			data.append('ndver', $("#ndver").val()); 
			data.append('bab', $("#bab").val()); 
			data.append('topik', $("#topik").val()); 
			data.append('subtopik', $("#subtopik").val());
			data.append('pertanyaan', $("#pertanyaan").val());
			data.append('jawaban', $("#jawaban").val());
			data.append('daskum', $("#daskum").val());
			$("#loading-ubah").show();
			
			$.ajax({
				url: '_ADMINISTRASI/Adm_FAQ/PROSES_UBAH.php',
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
								type: 'success',
								allow_dismiss: false,
								showProgressbar: true,
								placement: {
									from: "bottom"
									},
								animate: {
									enter: 'animated zoomInDown',
									exit: 'animated zoomOutUp'
									},
								});
								setTimeout(function() {
									notify.update('message', '<strong>Saving</strong> Form Data.');
									}, 1000);
								setTimeout(function() {
									notify.update('message', '<strong>Checking</strong> for errors.');
									}, 2000);
								setTimeout(function() {
									notify.update('message', '<strong>Success</strong> Your page has been saved!.');
									}, 3000);
								setTimeout(function() {
									notify.update('message', '<strong>Success</strong> Wait for reload!.');
									}, 4000);
						$("#view").html(response.html);						
						$("#modal-faq").modal('hide');
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
		}
	});
	
	$("#btn-hapus").click(function(){
		var data = new FormData();
		data.append('id', $("#data-id").val());
		$("#loading-hapus").show();
		$.ajax({
			url: '_ADMINISTRASI/Adm_FAQ/PROSES_HAPUS.php',
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
								'type': 'warning', 
								'message': '<strong>Success</strong> Your page has been saved!', 
								'progress': 25});
							}, 4500);
						$("#loading-hapus").hide();
						$("#view").html(response.html);						
						$("#delete-modal").modal('hide');
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
				alert("ERROR : "+xhr.responseText); // Munculkan alert
			}
		});
	});
	$('#modal-faq').on('hidden.bs.modal', function (e){ 
		$("#btn-reset").click(); 
		$(this).removeData('bs.modal');
		$('#form-faq').bootstrapValidator('resetForm', true);
		$('.wysihtml5-sandbox, .wysihtml5-toolbar').remove();
        $('#jawaban').show();
		$("#id").removeAttr('readonly');
		var bab			= $('select[name^="bab"]');
		var topik		= $('select[name^="topik"]');
		var subtopik	= $('select[name^="subtopik"]');
		$(bab).val("");
		$(topik).empty("");
		$(subtopik).empty("");
	});
	$("#btn-resetcari").click(function(){
		document.getElementById("myForm").reset();
		$('#bab_cari').val('').trigger('change');
		var bab			= $('#bab_cari');
		var topik		= $('#topik_cari');
		var subtopik	= $('#subtopik_cari');
		$(bab).val("");
		$(topik).empty("");
		$(subtopik).empty("");
		
	});
});