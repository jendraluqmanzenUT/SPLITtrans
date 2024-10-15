<style type="text/css">
.hid {
	display:none !important}
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 25px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 7px;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 18px;
  width: 16px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #4CAF50;
}

input:focus + .slider {
  box-shadow: 0 0 1px #4CAF50;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 20px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
<script type="text/JavaScript" src="_ADMINISTRASI/adm_pegawai/js/sha512.js"></script> 
<script type="text/JavaScript" src="_ADMINISTRASI/adm_pegawai/js/forms.js"></script> 
<table class="table table-bordered table-responsive" id="T1" width="100%">
	<thead class="thead-skin">
		<tr>
			<th width="5%" class="text-center"><b>No</b></th>
			<th width="95%" class="text-center"><b>Data User SPLIT</b></th>
		</tr>
	</thead>
	<tbody>
	</tbody>
</table>
<script>
function edit(no){
	$("#btn-simpan").hide();
	$("#btn-ubah").show();
	$("#btn-hash").hide();
	$("#modal-title").html("Form Ubah data");
	var id = $("#id-value-" + no).val();
	var nama_pegawai =$("#nama-value-" + no).val();
	var nip_pegawai	=$("#nip-value-" + no).val();
	var email=$("#email-value-" + no).val();
	var username=$("#username-value-" + no).val();
	var sandi=$("#sandi-value-" + no).val();
	var telp=$("#telp-value-" + no).val();
	var qoute=$("#note-value-" + no).val();
	var tipologi=$("#tipologi-value-" + no).val();
	var strataII=$("#kantor_eselon2-value-" + no).val();
	var strataII_detail=$("#kantor_eselon2_detail-value-" + no).val();
	var strataIII=$("#kantor_eselon3-value-" + no).val();
	var strataIII_detail=$("#kantor_eselon3_detail-value-" + no).val();
	var strataIV=$("#kantor_eselon4-value-" + no).val();
	var strataIV_detail=$("#kantor_eselon4_detail-value-" + no).val();
	var jabatan=$("#jabatan-value-" + no).val();
	var pangol=$("#pangol-value-" + no).val();
	var privimpor=$("#privimpor-value-" + no).val();
	var privekspor=$("#privekspor-value-" + no).val();
	var privintelijen=$("#privintelijen-value-" + no).val();
	var privli=$("#privli-value-" + no).val();
	var privlki=$("#privlki-value-" + no).val();
	var privlkai=$("#privlkai-value-" + no).val();
	var privnhi=$("#privnhi-value-" + no).val();
	var privnip=$("#privnip-value-" + no).val();
	var privapoint=$("#privapoint-value-" + no).val();
	var privrekapintel=$("#privrekapintel-value-" + no).val();
	var privblokir=$("#privblokir-value-" + no).val();
	var priveditblokir=$("#priveditblokir-value-" + no).val();
	var privsurvailance=$("#privsurvailance-value-" + no).val();
	var privatensiintel=$("#privatensiintel-value-" + no).val();
	var privstaffintel=$("#privstaffintel-value-" + no).val();
	var privstpi=$("#privstpi-value-" + no).val();
	var privanalispenumpang=$("#privanalispenumpang-value-" + no).val();
	var privatensipenumpang=$("#privatensipenumpang-value-" + no).val();
	var privanalisyacht=$("#privanalisyacht-value-" + no).val();
	var privatensiyacht=$("#privatensiyacht-value-" + no).val();
	var privedityacht=$("#privedityacht-value-" + no).val();
	var privanalisplb=$("#privanalisplb-value-" + no).val();
	var privatensiplb=$("#privatensiplb-value-" + no).val();
	var priveditplb=$("#priveditplb-value-" + no).val();
	var privpenindakan=$("#privpenindakan-value-" + no).val();
	var privreekspor=$("#privreekspor-value-" + no).val();
	var privpibk=$("#privpibk-value-" + no).val();
	var privsbp=$("#privsbp-value-" + no).val();
	var priveditsbp=$("#priveditsbp-value-" + no).val();
	var privpjt=$("#privpjt-value-" + no).val();
	var privcd=$("#privcd-value-" + no).val();
	var privstaffpenindakan=$("#privstaffpenindakan-value-" + no).val();
	var privlaporan=$("#privlaporan-value-" + no).val();
	var privlaporanplb=$("#privlaporanplb-value-" + no).val();
	var privlaporanyacht=$("#privlaporanyacht-value-" + no).val();
	var privimpordatapib=$("#privimpordatapib-value-" + no).val();
	var privimpordatapeb=$("#privimpordatapeb-value-" + no).val();
	var privimpordataspkpbm=$("#privimpordataspkpbm-value-" + no).val();
	var privexecutive=$("#privexecutive-value-" + no).val();
	var privexelaporan=$("#privexelaporan-value-" + no).val();
	var privexebulanan=$("#privexebulanan-value-" + no).val();
	var privvillar=$("#privvillar-value-" + no).val();
	var privpabean=$("#privpabean-value-" + no).val();
	var privkoordagenfasilitaspusat=$("#privkoordagenfasilitaspusat-value-" + no).val();
	var privkoordagenfasilitas=$("#privkoordagenfasilitas-value-" + no).val();
	var privagenfaskhusus=$("#privagenfaskhusus-value-" + no).val();
	var privagenfas=$("#privagenfas-value-" + no).val();
	var privstaffagenfas=$("#privstaffagenfas-value-" + no).val();
	var privpabeanplb=$("#privpabeanplb-value-" + no).val();
	var privpabeanyacht=$("#privpabeanyacht-value-" + no).val();
	var privjaminan=$("#privjaminan-value-" + no).val();
	var priveditjaminan=$("#priveditjaminan-value-" + no).val();
	var privmanifest=$("#privmanifest-value-" + no).val();
	var privmanifestplb=$("#privmanifestplb-value-" + no).val();
	var privmanifestyacht=$("#privmanifestyacht-value-" + no).val();
	var privimpordatamanifest=$("#privimpordatamanifest-value-" + no).val();
	var priveditmanifest=$("#priveditmanifest-value-" + no).val();
	var privpli=$("#privpli-value-" + no).val();
	var privppidtk1=$("#privppidtk1-value-" + no).val();
	var privppidtk2=$("#privppidtk2-value-" + no).val();
	var privppidtk3=$("#privppidtk3-value-" + no).val();
	var privppid=$("#privppid-value-" + no).val();
	var privstaffppid=$("#privstaffppid-value-" + no).val();
	var privclco=$("#privclco-value-" + no).val();
	var privstaffpli=$("#privstaffpli-value-" + no).val();
	var privcc=$("#privcc-value-" + no).val();
	var privcs=$("#privcs-value-" + no).val();
	var privumum=$("#privumum-value-" + no).val();
	var privbtki=$("#privbtki-value-" + no).val();
	var privtl=$("#privtl-value-" + no).val();

	$("#data-id").val(id).attr("readonly","readonly")
	$("#nama_pegawai").val(nama_pegawai).trigger('input')
	$("#nip_pegawai").val(nip_pegawai).trigger('input')
	$("#email").val(email).trigger('input')
	$("#username").val(username).trigger('input')
	$("#password").val(sandi).trigger('input')
	$("#confirmpwd").val(sandi).trigger('input');
	$("#telp").val(telp).trigger('input');
	$("#qoute").val(qoute).trigger('input')
	
	//$("#tipologi").val(tipologi);
	$("#tipologi").append($("<option selected></option>").attr("value",tipologi).text(tipologi));
	$("#strataII").append($("<option selected></option>").attr("value",strataII).text(strataII_detail));
	$("#strataIII").append($("<option selected></option>").attr("value",strataIII).text(strataIII_detail));
	$("#strataIV").append($("<option selected></option>").attr("value",strataIV).text(strataIV_detail));
		
	$("#jabatan").val(jabatan).trigger('change');
	$("#pangol").val(pangol).trigger('change');
	$('#privimpor').val(privimpor);
	$('#privekspor').val(privekspor);
	$('#privintelijen').val(privintelijen);
	$('#privli').val(privli);
	$('#privlki').val(privlki);
	$('#privlkai').val(privlkai);
	$('#privnhi').val(privnhi);
	$('#privnip').val(privnip);
	$('#privapoint').val(privapoint);
	$('#privrekapintel').val(privrekapintel);
	$('#privblokir').val(privblokir);
	$('#priveditblokir').val(priveditblokir);
	$('#privsurvailance').val(privsurvailance);
	$('#privatensiintel').val(privatensiintel);
	$('#privstaffintel').val(privstaffintel);
	$('#privstpi').val(privstpi);
	$('#privanalispenumpang').val(privanalispenumpang);
	$('#privatensipenumpang').val(privatensipenumpang);
	$('#privanalisyacht').val(privanalisyacht);
	$('#privatensiyacht').val(privatensiyacht);
	$('#privedityacht').val(privedityacht);
	$('#privanalisplb').val(privanalisplb);
	$('#privatensiplb').val(privatensiplb);
	$('#priveditplb').val(priveditplb);
	$('#privpenindakan').val(privpenindakan);
	$('#privreekspor').val(privreekspor);
	$('#privpibk').val(privpibk);
	$('#privsbp').val(privsbp);
	$('#priveditsbp').val(priveditsbp);
	$('#privpjt').val(privpjt);
	$('#privcd').val(privcd);
	$('#privstaffpenindakan').val(privstaffpenindakan);
	$('#privlaporan').val(privlaporan);
	$('#privlaporanplb').val(privlaporanplb);
	$('#privlaporanyacht').val(privlaporanyacht);
	$('#privimpordatapib').val(privimpordatapib);
	$('#privimpordatapeb').val(privimpordatapeb);
	$('#privimpordataspkpbm').val(privimpordataspkpbm);
	$('#privexecutive').val(privexecutive);
	$('#privexelaporan').val(privexelaporan);
	$('#privexebulanan').val(privexebulanan);
	$('#privvillar').val(privvillar);
	$('#privpabean').val(privpabean);
	$('#privkoordagenfasilitaspusat').val(privkoordagenfasilitaspusat);
	$('#privkoordagenfasilitas').val(privkoordagenfasilitas);
	$('#privagenfaskhusus').val(privagenfaskhusus);
	$('#privagenfas').val(privagenfas);
	$('#privstaffagenfas').val(privstaffagenfas);
	$('#privpabeanplb').val(privpabeanplb);
	$('#privpabeanyacht').val(privpabeanyacht);
	$('#privjaminan').val(privjaminan);
	$('#priveditjaminan').val(priveditjaminan);
	$('#privmanifest').val(privmanifest);
	$('#privmanifestplb').val(privmanifestplb);
	$('#privmanifestyacht').val(privmanifestyacht);
	$('#privimpordatamanifest').val(privimpordatamanifest);
	$('#priveditmanifest').val(priveditmanifest);
	$('#privpli').val(privpli);
	$('#privppidtk1').val(privppidtk1);
	$('#privppidtk2').val(privppidtk2);
	$('#privppidtk3').val(privppidtk3);
	$('#privppid').val(privppid);
	$('#privstaffppid').val(privstaffppid);
	$('#privclco').val(privclco);
	$('#privstaffpli').val(privstaffpli);
	$('#privcc').val(privcc);
	$('#privcs').val(privcs);
	$('#privumum').val(privumum);
	$('#privbtki').val(privbtki);
	$('#privtl').val(privtl);
	
	if (privimpor=='-1-'){ $("#privimpor").prop('checked',true)}else{$("#privimpor").prop('checked',false)}
	if (privekspor=='-1-'){ $("#privekspor").prop('checked',true)}else{$("#privekspor").prop('checked',false)}
	if (privintelijen=='-1-'){ $("#privintelijen").prop('checked',true)}else{$("#privintelijen").prop('checked',false)}
	if (privli=='-1-'){ $("#privli").prop('checked',true)}else{$("#privli").prop('checked',false)}
	if (privlki=='-1-'){ $("#privlki").prop('checked',true)}else{$("#privlki").prop('checked',false)}
	if (privlkai=='-1-'){ $("#privlkai").prop('checked',true)}else{$("#privlkai").prop('checked',false)}
	if (privnhi=='-1-'){ $("#privnhi").prop('checked',true)}else{$("#privnhi").prop('checked',false)}
	if (privnip=='-1-'){ $("#privnip").prop('checked',true)}else{$("#privnip").prop('checked',false)}
	if (privapoint=='-1-'){ $("#privapoint").prop('checked',true)}else{$("#privapoint").prop('checked',false)}
	if (privrekapintel=='-1-'){ $("#privrekapintel").prop('checked',true)}else{$("#privrekapintel").prop('checked',false)}
	if (privblokir=='-1-'){ $("#privblokir").prop('checked',true)}else{$("#privblokir").prop('checked',false)}
	if (priveditblokir=='-1-'){ $("#priveditblokir").prop('checked',true)}else{$("#priveditblokir").prop('checked',false)}
	if (privsurvailance=='-1-'){ $("#privsurvailance").prop('checked',true)}else{$("#privsurvailance").prop('checked',false)}
	if (privatensiintel=='-1-'){ $("#privatensiintel").prop('checked',true)}else{$("#privatensiintel").prop('checked',false)}
	if (privstaffintel=='-1-'){ $("#privstaffintel").prop('checked',true)}else{$("#privstaffintel").prop('checked',false)}
	if (privstpi=='-1-'){ $("#privstpi").prop('checked',true)}else{$("#privstpi").prop('checked',false)}
	if (privanalispenumpang=='-1-'){ $("#privanalispenumpang").prop('checked',true)}else{$("#privanalispenumpang").prop('checked',false)}
	if (privatensipenumpang=='-1-'){ $("#privatensipenumpang").prop('checked',true)}else{$("#privatensipenumpang").prop('checked',false)}
	if (privanalisyacht=='-1-'){ $("#privanalisyacht").prop('checked',true)}else{$("#privanalisyacht").prop('checked',false)}
	if (privatensiyacht=='-1-'){ $("#privatensiyacht").prop('checked',true)}else{$("#privatensiyacht").prop('checked',false)}
	if (privedityacht=='-1-'){ $("#privedityacht").prop('checked',true)}else{$("#privedityacht").prop('checked',false)}
	if (privanalisplb=='-1-'){ $("#privanalisplb").prop('checked',true)}else{$("#privanalisplb").prop('checked',false)}
	if (privatensiplb=='-1-'){ $("#privatensiplb").prop('checked',true)}else{$("#privatensiplb").prop('checked',false)}
	if (priveditplb=='-1-'){ $("#priveditplb").prop('checked',true)}else{$("#priveditplb").prop('checked',false)}
	if (privpenindakan=='-1-'){ $("#privpenindakan").prop('checked',true)}else{$("#privpenindakan").prop('checked',false)}
	if (privreekspor=='-1-'){ $("#privreekspor").prop('checked',true)}else{$("#privreekspor").prop('checked',false)}
	if (privpibk=='-1-'){ $("#privpibk").prop('checked',true)}else{$("#privpibk").prop('checked',false)}
	if (privsbp=='-1-'){ $("#privsbp").prop('checked',true)}else{$("#privsbp").prop('checked',false)}
	if (priveditsbp=='-1-'){ $("#priveditsbp").prop('checked',true)}else{$("#priveditsbp").prop('checked',false)}
	if (privpjt=='-1-'){ $("#privpjt").prop('checked',true)}else{$("#privpjt").prop('checked',false)}
	if (privcd=='-1-'){ $("#privcd").prop('checked',true)}else{$("#privcd").prop('checked',false)}
	if (privstaffpenindakan=='-1-'){ $("#privstaffpenindakan").prop('checked',true)}else{$("#privstaffpenindakan").prop('checked',false)}
	if (privlaporan=='-1-'){ $("#privlaporan").prop('checked',true)}else{$("#privlaporan").prop('checked',false)}
	if (privlaporanplb=='-1-'){ $("#privlaporanplb").prop('checked',true)}else{$("#privlaporanplb").prop('checked',false)}
	if (privlaporanyacht=='-1-'){ $("#privlaporanyacht").prop('checked',true)}else{$("#privlaporanyacht").prop('checked',false)}
	if (privimpordatapib=='-1-'){ $("#privimpordatapib").prop('checked',true)}else{$("#privimpordatapib").prop('checked',false)}
	if (privimpordatapeb=='-1-'){ $("#privimpordatapeb").prop('checked',true)}else{$("#privimpordatapeb").prop('checked',false)}
	if (privimpordataspkpbm=='-1-'){ $("#privimpordataspkpbm").prop('checked',true)}else{$("#privimpordataspkpbm").prop('checked',false)}
	if (privexecutive=='-1-'){ $("#privexecutive").prop('checked',true)}else{$("#privexecutive").prop('checked',false)}
	if (privexelaporan=='-1-'){ $("#privexelaporan").prop('checked',true)}else{$("#privexelaporan").prop('checked',false)}
	if (privexebulanan=='-1-'){ $("#privexebulanan").prop('checked',true)}else{$("#privexebulanan").prop('checked',false)}
	if (privvillar=='-1-'){ $("#privvillar").prop('checked',true)}else{$("#privvillar").prop('checked',false)}
	if (privpabean=='-1-'){ $("#privpabean").prop('checked',true)}else{$("#privpabean").prop('checked',false)}
	if (privkoordagenfasilitaspusat=='-1-'){ $("#privkoordagenfasilitaspusat").prop('checked',true)}else{$("#privkoordagenfasilitaspusat").prop('checked',false)}
	if (privkoordagenfasilitas=='-1-'){ $("#privkoordagenfasilitas").prop('checked',true)}else{$("#privkoordagenfasilitas").prop('checked',false)}
	if (privagenfaskhusus=='-1-'){ $("#privagenfaskhusus").prop('checked',true)}else{$("#privagenfaskhusus").prop('checked',false)}
	if (privagenfas=='-1-'){ $("#privagenfas").prop('checked',true)}else{$("#privagenfas").prop('checked',false)}
	if (privstaffagenfas=='-1-'){ $("#privstaffagenfas").prop('checked',true)}else{$("#privstaffagenfas").prop('checked',false)}
	if (privpabeanplb=='-1-'){ $("#privpabeanplb").prop('checked',true)}else{$("#privpabeanplb").prop('checked',false)}
	if (privpabeanyacht=='-1-'){ $("#privpabeanyacht").prop('checked',true)}else{$("#privpabeanyacht").prop('checked',false)}
	if (privjaminan=='-1-'){ $("#privjaminan").prop('checked',true)}else{$("#privjaminan").prop('checked',false)}
	if (priveditjaminan=='-1-'){ $("#priveditjaminan").prop('checked',true)}else{$("#priveditjaminan").prop('checked',false)}
	if (privmanifest=='-1-'){ $("#privmanifest").prop('checked',true)}else{$("#privmanifest").prop('checked',false)}
	if (privmanifestplb=='-1-'){ $("#privmanifestplb").prop('checked',true)}else{$("#privmanifestplb").prop('checked',false)}
	if (privmanifestyacht=='-1-'){ $("#privmanifestyacht").prop('checked',true)}else{$("#privmanifestyacht").prop('checked',false)}
	if (privimpordatamanifest=='-1-'){ $("#privimpordatamanifest").prop('checked',true)}else{$("#privimpordatamanifest").prop('checked',false)}
	if (priveditmanifest=='-1-'){ $("#priveditmanifest").prop('checked',true)}else{$("#priveditmanifest").prop('checked',false)}
	if (privpli=='-1-'){ $("#privpli").prop('checked',true)}else{$("#privpli").prop('checked',false)}
	if (privppidtk1=='-1-'){ $("#privppidtk1").prop('checked',true)}else{$("#privppidtk1").prop('checked',false)}
	if (privppidtk2=='-1-'){ $("#privppidtk2").prop('checked',true)}else{$("#privppidtk2").prop('checked',false)}
	if (privppidtk3=='-1-'){ $("#privppidtk3").prop('checked',true)}else{$("#privppidtk3").prop('checked',false)}
	if (privppid=='-1-'){ $("#privppid").prop('checked',true)}else{$("#privppid").prop('checked',false)}
	if (privstaffppid=='-1-'){ $("#privstaffppid").prop('checked',true)}else{$("#privstaffppid").prop('checked',false)}
	if (privclco=='-1-'){ $("#privclco").prop('checked',true)}else{$("#privclco").prop('checked',false)}
	if (privstaffpli=='-1-'){ $("#privstaffpli").prop('checked',true)}else{$("#privstaffpli").prop('checked',false)}
	if (privcc=='-1-'){ $("#privcc").prop('checked',true)}else{$("#privcc").prop('checked',false)}
	if (privcs=='-1-'){ $("#privcs").prop('checked',true)}else{$("#privcs").prop('checked',false)}
	if (privumum=='-1-'){ $("#privumum").prop('checked',true)}else{$("#privumum").prop('checked',false)}
	if (privbtki=='-1-'){ $("#privbtki").prop('checked',true)}else{$("#privbtki").prop('checked',false)}
	if (privtl=='-1-'){ $("#privtl").prop('checked',true)}else{$("#privtl").prop('checked',false)}
	
	
	$('#privimpor').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privekspor').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privintelijen').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privli').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privlki').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privlkai').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privnhi').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privnip').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privapoint').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privrekapintel').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privblokir').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#priveditblokir').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privsurvailance').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privatensiintel').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privstaffintel').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privstpi').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privanalispenumpang').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privatensipenumpang').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privanalisyacht').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privatensiyacht').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privedityacht').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privanalisplb').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privatensiplb').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#priveditplb').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privpenindakan').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privreekspor').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privpibk').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privsbp').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#priveditsbp').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privpjt').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privcd').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privstaffpenindakan').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privlaporan').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privlaporanplb').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privlaporanyacht').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privimpordatapib').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privimpordatapeb').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privimpordataspkpbm').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privexecutive').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privexelaporan').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privexebulanan').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privvillar').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privpabean').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privkoordagenfasilitaspusat').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privkoordagenfasilitas').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privagenfaskhusus').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privagenfas').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privstaffagenfas').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privpabeanplb').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privpabeanyacht').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privjaminan').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#priveditjaminan').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privmanifest').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privmanifestplb').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privmanifestyacht').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privimpordatamanifest').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#priveditmanifest').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privpli').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privppidtk1').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privppidtk2').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privppidtk3').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privppid').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privstaffppid').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privclco').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privstaffpli').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privcc').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privcs').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privumum').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privbtki').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	$('#privtl').click(function(){if($(this).is( ":checked" )){$(this).val('-1-');} else {$(this).val('-0-');}});
	
}

function hapus(no){
	var id = $("#id-value-" + no).val(); 
	$("#data-id").val(id);
}
function active(no){
	$("#btn-disable").hide();
	$("#btn-active").show();
	var id = $("#id-value-" + no).val(); 
	$("#data-id").val(id);
}
function disable(no){
	$("#btn-active").hide();
	$("#btn-disable").show();
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
			searchPlaceholder: 'Filter Data Pegawai',
			"zeroRecords": "Data Pegawai Tidak Ditemukan",
			processing	: '<i class="fa fa-spinner fa-spin fa-3x fa-fw text-act"></i><br><br><span class="text-act">Loading, Please Wait......</span>'
						  },
		"columnDefs":[
			{ "searchable":false, "targets": 0}
		],
		"searching" : true,
		'pagingType': 'simple_numbers',
		'serverSide': true,
		'processing': true,
		"deferRender": true,
		'paging'	: true,
        'ordering'	: false,
        'info'		: true,
		'lengthMenu': [[20, 50, 100, 200], [20, 50, 100, 200]],
		"ajax":{
			url :"_ADMINISTRASI/ADM_PEGAWAI/DATA_CHAIN.php",
			type: "POST", 
			error: function (xhr, error, thrown) {
				console.log(xhr);
			}
		}
	 });
	 $('.search-data, #btn-search').on( 'keyup click change', function () { 
     	dataTable.fnDestroy();
     	$("#T1").dataTable({
			"dom"		:'<"top"<"pull-right"f><"pull-left"l>>rt<"bottom"<"pull-left"i><"pull-right"p>>',
		"language"	: {
			search: "<i class='fa fa-search'></i> Global Search : ",
			searchPlaceholder: 'Filter Data Pegawai',
			"zeroRecords": "Data Pegawai Tidak Ditemukan",
			processing	: '<i class="fa fa-spinner fa-spin fa-3x fa-fw text-act"></i><br><br><span class="text-act">Loading, Please Wait......</span>'
						  },
		"searching": true,
		"columnDefs":[
			{ "searchable":false, "targets": 0}
		],
		'pagingType': 'simple_numbers',
		'serverSide': true,
		'processing': true,
		"deferRender": true,
		'paging'	: true,
        'ordering'	: false,
        'info'		: true,
		'lengthMenu': [[20, 50, 100, 200], [20, 50, 100, 200]],
            "ajax":{
              	url :"_ADMINISTRASI/ADM_PEGAWAI/DATA_CHAIN.php",
            	type: "POST", 
                data: function ( d ) {
                      d.nama_cari = $("#nama_cari").val();
					  d.nip_cari = $("#nip_cari").val();
					  d.email_cari = $("#email_cari").val();
					  d.telp_cari = $("#telp_cari").val();
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
     	$('#T1').DataTable().destroy();
     	var dataTable = $("#T1").dataTable({
		"dom"		:'<"top"<"pull-right"f><"pull-left"l>>rt<"bottom"<"pull-left"i><"pull-right"p>>',
		"language"	: {
			search: "<i class='fa fa-search'></i> Global Search : ",
			searchPlaceholder: 'Filter Data Pegawai',
			"zeroRecords": "Data Pegawai Tidak Ditemukan",
			processing	: '<i class="fa fa-spinner fa-spin fa-3x fa-fw text-act"></i><br><br><span class="text-act">Loading, Please Wait......</span>'
						  },
		"columnDefs":[
			{ "searchable":false, "targets": 0}
		],
		"searching": true,
		'pagingType': 'simple_numbers',
		'serverSide': true,
		'processing': true,
		"deferRender": true,
		'paging'	: true,
        'ordering'	: false,
        'info'		: true,
		'lengthMenu': [[20, 50, 100, 200], [20, 50, 100, 200]],
		"ajax":{
			url :"_ADMINISTRASI/ADM_PEGAWAI/DATA_CHAIN.php",
			type: "POST", 
			error: function (xhr, error, thrown) {
				console.log(xhr);
			}
		}
	 });
	});
});
</script>