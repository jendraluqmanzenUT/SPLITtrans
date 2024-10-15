$(document).ready(function()  {
	/*TAMBAH DATA*/
	$("#loading-simpan, #loading-ubah, #loading-hapus, #pesan-error, #pesan-sukses, #btn-reset").hide();
	$("#btn-tambah").click(function(){ 
		$("#btn-ubah").hide(); 
		$("#btn-simpan").show();
		$("#modal-title").html("Form Simpan data");
	});
    $('#form-AGENT').bootstrapValidator({
        message: 'Pastikan sudah terisi',
		excluded: ':disabled',
        fields: {
			nama_agent: {
                validators: {
                    notEmpty: {
                        message: 'Nama agent harus diisi'
                    },
					regexp: {
							regexp: /^[a-zA-Z\s]+$/i,
							message: 'Nama hanya berisi Huruf dan Spasi'
						}
					
                }
            },
			nip_agent: {
                validators: {
                    notEmpty: {
                        message: 'NIP agent harus diisi'
                    },
					numeric: {
						message: 'NIP hanya berisi angka saja'
					}
                }
            },
			position: {
                validators: {
                    notEmpty: {
                        message: 'Posisi agent harus diisi'
                    },
                },
            },
			tugas: {
                validators: {
                    notEmpty: {
                        message: 'Tugas agent harus diisi'
                    },
                }
            },
			status: {
                validators: {
                    notEmpty: {
                        message: 'Status agent harus diisi'
                    },
                }
            },
	     },
		 
    });
	// SIMPAN DATA
	$('#btn-simpan').click(function() {
	  	$('#form-AGENT').bootstrapValidator('validate');
   		if ($('#form-AGENT').bootstrapValidator('validate').has('.has-error').length) {
			e.preventDefault();
      	} else {
			var data = new FormData();
			data.append('nama_agent', $("#nama_agent").val());
			data.append('nip_agent', $("#nip_agent").val());
			data.append('position', $("#position").val());
			data.append('tugas', $("#tugas").val());
			data.append('status', $("#status").val());
			$("#loading-simpan").show();
			$.ajax({
				url: '_ADMINISTRASI/Adm_Agent/proses_simpan.php',
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
						//$("#modal-OPEN").modal('hide'); 
					if(response.status == "sukses"){
						$("#modal-OPEN").modal('hide'); 
						$("#view").html(response.html);
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
	//EDIT DATA
	$('#btn-ubah').click(function() {
	  	$('#form-AGENT').bootstrapValidator('validate');
   		if ($('#form-AGENT').bootstrapValidator('validate').has('.has-error').length) {
		        	e.preventDefault();
      	} else {
			var data = new FormData();
			data.append('id', $("#data-id").val());
			data.append('nama_agent', $("#nama_agent").val());
			data.append('nip_agent', $("#nip_agent").val());
			data.append('position', $("#position").val());
			data.append('tugas', $("#tugas").val());
			data.append('status', $("#status").val());
			$("#loading-ubah").show();
			$.ajax({
				url: '_ADMINISTRASI/Adm_Agent/proses_ubah.php',
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
						$("#modal-OPEN").modal('hide'); 
					if(response.status == "sukses"){
						$("#modal-OPEN").modal('hide'); 
						$("#view").html(response.html);
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
	//HAPUS DATA
	$("#btn-hapus").click(function(){
		var data = new FormData();
		data.append('id', $("#data-id").val()); 
		$("#loading-hapus").show(); 		
		$.ajax({
			url: '_ADMINISTRASI/Adm_Agent/proses_hapus.php',
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
						$("#loading-hapus").hide();
					if(response.status == "sukses"){
						$("#delete-modal").modal('hide'); 
						$("#view").html(response.html);
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
		});
	// MODAL DIALOG CLOSE
	$('#modal-OPEN').on('hidden.bs.modal', function (e){ 
		$("#btn-reset").click();
		$("#id").removeAttr('readonly');
		$(".select2").val('').trigger('change');
		$(this).removeData('bs.modal');
		$('#form-AGENT').bootstrapValidator('resetForm', true);
	});
});