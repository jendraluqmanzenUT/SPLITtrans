$(document).ready(function()  {
	$("#loading-simpan, #loading-ubah, #loading-hapus, #pesan-error, #pesan-sukses, #btn-reset").hide();
	$("#btn-tambah").click(function(){
		$("#btn-simpan").show(); 
		$("#modal-title").html("Form Simpan data");
	});
	$('#terbit_per_baru')
        .mydatepicker({
            dateFormat: 'dd/mm/yy',
     		changeMonth: true,
     		changeYear: true,
	 		beforeShow: function() {
				setTimeout(function(){
					$('.ui-mydatepicker').css('z-index', 99999999999999);
				}, 0);
			}
        })
        .on('change select', function() {
            // Revalidate the date field
            $('#form').bootstrapValidator('revalidateField', 'terbit_per_baru');
        });
	$('#terbit_per_edit')
        .mydatepicker({
            dateFormat: 'dd/mm/yy',
     		changeMonth: true,
     		changeYear: true,
	 		beforeShow: function() {
				setTimeout(function(){
					$('.ui-mydatepicker').css('z-index', 99999999999999);
				}, 0);
			}
        })
        .on('change select', function() {
            // Revalidate the date field
            $('#form-ubah').bootstrapValidator('revalidateField', 'terbit_per_edit');
        });
    $('#form').bootstrapValidator({
        message: 'Pastikan sudah terisi',
		excluded: [':disabled'],
        fields: {
			jenis_per: {
                validators: {
                    notEmpty: {
                        message: 'Jenis peraturan harus diisi'
                    },
					
                }
            },
			bab_per: {
                validators: {
                    notEmpty: {
                        message: 'Bab peraturan harus diisi'
                    },
					
                }
            },
			subbab: {
                validators: {
                    notEmpty: {
                        message: 'Sub bab peraturan harus diisi'
                    },
					
                }
            },
			posper: {
                validators: {
                    notEmpty: {
                        message: 'Pos peraturan harus diisi'
                    },
                }
            },
			subpos: {
                validators: {
                    notEmpty: {
                        message: 'Sub pos peraturan harus diisi'
                    },
                }
            },
			no_per_baru: {
                validators: {
                    notEmpty: {
                        message: 'Nomor peraturan harus diisi'
                    },
                }
            },
			judul_per_baru: {
                validators: {
                    notEmpty: {
                        message: 'Judul peraturan harus diisi'
                    },
                }
            },
			terbit_per_baru: {
                validators: {
					notEmpty: {
                        message: 'Tanggal harus diisi'
                    },
					date: {
					   format: 'DD/MM/YYYY',
					   message: 'The format is dd/mm/yyyy'
                 	}
                }
            },
			file_per_baru: {
                validators: {
                    notEmpty: {
                        message: 'Silahkan pilih file yang akan diupload'
                    },
					file: {
                        extension: 'pdf',
						type: 'application/pdf',
                        message: 'File yang diupload harus bertipe .pdf'
                    }
                }
            },		
	     }, 
    });
	$('#form-ubah').bootstrapValidator({	
        message: 'Pastikan sudah terisi',
		excluded: [':disabled'],
        fields: {
			jenis_per2: {
                validators: {
                    notEmpty: {
                        message: 'Jenis peraturan harus diisi'
                    },
					
                }
            },
			bab_per2: {
                validators: {
                    notEmpty: {
                        message: 'Bab peraturan harus diisi'
                    },
					
                }
            },
			subbab2: {
                validators: {
                    notEmpty: {
                        message: 'Sub bab peraturan harus diisi'
                    },
					
                }
            },
			posper2: {
                validators: {
                    notEmpty: {
                        message: 'Pos peraturan harus diisi'
                    },
                }
            },
			subpos2: {
                validators: {
                    notEmpty: {
                        message: 'Sub pos peraturan harus diisi'
                    },
                }
            },
			no_per_baru2: {
                validators: {
                    notEmpty: {
                        message: 'Nomor peraturan harus diisi'
                    },
                }
            },
			judul_per_baru2: {
                validators: {
                    notEmpty: {
                        message: 'Judul peraturan harus diisi'
                    },
                }
            },
			kat_perubahan: {
				validators: {
                    notEmpty: {
                        message: 'Silahkan pilih Kategori perubahan peraturan'
                    },
                }
            },
			jenis_perubahan: {
				validators: {
                    notEmpty: {
                        message: 'Silahkan pilih jenis perubahan peraturan'
                    },
                }
            },
			no_per_edit: {
                validators: {
                    notEmpty: {
                        message: 'Nomor peraturan perubahan harus diisi'
                    },
                }
            },
			judul_per_edit: {
                validators: {
                    notEmpty: {
                        message: 'Judul peraturan perubahan harus diisi'
                    },
                }
            },
			terbit_per_edit: {
                validators: {
					notEmpty: {
                        message: 'Tanggal harus diisi'
                    },
					date: {
					   format: 'DD/MM/YYYY',
					   message: 'The format is dd/mm/yyyy'
                 	}
                }
            },
			file_per_edit: {
                validators: {
                    notEmpty: {
                        message: 'Silahkan pilih file yang akan diupload'
                    },
					file: {
                        extension: 'pdf',
                        type: 'application/pdf',
                        message: 'File yang diupload harus bertipe .pdf'
                    }
                }
            },	
	     },
	});
	$('#terbit_per_baru').on('change select', function(e) {
    	$('#form').bootstrapValidator('revalidateField', 'terbit_per_baru');
    });
	$('#terbit_per_edit').on('change select', function(e) {
    	$('#form-ubah').bootstrapValidator('revalidateField', 'terbit_per_edit');
    });
	$('#btn-simpan').click(function() {
		$('#form').bootstrapValidator('validate');
		if ($('#form').bootstrapValidator('validate').has('.has-error').length) {
			new PNotify({
				title: 'Oh No!',
				text: 'Pastikan data terisi lengkap.',
				type: 'error',
				styling: 'fontawesome'
				});
        	e.preventDefault();
      	} else {
			var data = new FormData();
			data.append('jenis_per', $("#jenis_per").val());	
			data.append('bab_per', $("#bab_per").val());
			data.append('subbab', $("#subbab").val());
			data.append('posper', $("#posper").val());
			data.append('subpos', $("#subpos").val());
			data.append('no_per_baru', $("#no_per_baru").val());
			data.append('judul_per_baru', $("#judul_per_baru").val());
			data.append('terbit_per_baru', $("#terbit_per_baru").val());
			data.append('file_per_baru', $("#file_per_baru")[0].files[0]);
			$("#loading-simpan").show();
			$.ajax({			
				url: '_Administrasi/Adm_Peraturan/proses_simpan.php',
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
							'message': '<strong>Success</strong><br>'+response.pesan+'<br>Your page has been saved!', 
							'progress': 25});
						}, 4500);
						$("#modal-per-baru").modal('hide');
						$("#view").html(response.html);							
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
	$('#btn-ubah').click(function(e) {
		$('#form-ubah').bootstrapValidator('validate');
		if ($('#form-ubah').bootstrapValidator('validate').has('.has-error').length) {
			new PNotify({
				title: 'Oh No!',
				text: 'Pastikan data terisi lengkap.',
				type: 'error',
				styling: 'fontawesome'
				});
        	e.preventDefault();
      	} else {
			var data = new FormData();
			data.append('id', $("#data-id").val());
			data.append('jenis_per2', $("#jenis_per2").val());	
			data.append('bab_per2', $("#bab_per2").val());
			data.append('subbab2', $("#subbab2").val());
			data.append('posper2', $("#posper2").val());
			data.append('subpos2', $("#subpos2").val());
			data.append('no_per_baru2', $("#no_per_baru2").val());
			data.append('judul_per_baru2', $("#judul_per_baru2").val());
			data.append('kat_perubahan', $("#kat_perubahan").val());			
			data.append('jenis_perubahan', $("#jenis_perubahan").val());
			data.append('no_per_edit', $("#no_per_edit").val());
			data.append('judul_per_edit', $("#judul_per_edit").val());	
			data.append('terbit_per_edit', $("#terbit_per_edit").val());
			data.append('file_per_edit', $("#file_per_edit")[0].files[0]);
			$("#loading-ubah").show();
			$.ajax({			
				url: '_Administrasi/Adm_Peraturan/proses_ubah.php',
				type: 'POST',
				data: data, // Set data yang akan dikirim
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
							'message': '<strong>Success</strong><br>'+response.pesan+'<br>Your page has been saved!',  
							'progress': 25});
						}, 4500);
						$("#modal-per-ubah").modal('hide');
						$("#view").html(response.html);							
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
		data.append('id', $("#id-cabut").val());
		$("#loading-hapus").show();
		$.ajax({
			url: '_Administrasi/Adm_Peraturan/proses_hapus.php',
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
						'message': '<strong>Success</strong><br>'+response.pesan+'<br>Your page has been saved!', 
						'progress': 25});
					}, 4500);
				$("#loading-hapus").hide(); 
				$("#view").html(response.html);
				$("#delete-modal").modal('hide'); // Close / Tutup Modal Dialog
			},
			error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
				alert("ERROR : "+xhr.responseText); // Munculkan alert
			}
		});
	});
	// MODAL DIALOG CLOSE
	$('#modal-per-baru').on('hidden.bs.modal', function (){
		$("#id").removeAttr('readonly');
		$(this).removeData('bs.modal');
		$('#file_per_baru').val('').trigger('change');
		$("#jenis_per").val(null).trigger('change');
		$("#bab_per").val(null).trigger('change');
		$("#subbab").empty(null);
		$("#posper").empty(null);
		$("#subpos").empty(null);
		$("#btn-reset").click();
		$('#form').bootstrapValidator('resetForm', true);
	});
	$('#modal-per-ubah').on('hidden.bs.modal', function (){
		$('#file_per_edit').val('').trigger('change');
		$("#data-id").removeAttr('readonly');
		$(this).removeData('bs.modal');		
		$("#jenis_per2").val(null);
		$("#bab_per2").val(null);
		$("#subbab2").empty(null);
		$("#posper2").empty(null);
		$("#subpos2").empty(null);
		$("#kat_perubahan").val(null).trigger('change');
		$("#jenis_perubahan").empty(null);
		$("#btn-reset").click();
		$('#form-ubah').bootstrapValidator('resetForm', true);
	});
	$("#btn-reset-cari").click(function(){
		document.getElementById("myForm").reset();
		$('#jenis_cari').val('').trigger('change');
		$('#bab_cari').val('').trigger('change');
		$('#cari_all').val('').trigger('change');
		var bab_cari		= $('#bab_cari');
		var subbab_cari		= $('#subbab_cari');
		var posper_cari		= $('#posper_cari');
		var subpos_cari		= $('#subpos_cari');
		$(bab_cari).val("");
		$(subbab_cari).empty("");
		$(posper_cari).empty("");
		$(subpos_cari).empty("");
		
	});
});