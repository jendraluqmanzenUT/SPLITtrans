<style type="text/css">
.iframe-container {    
    padding-bottom: 60% !important;
    padding-top: 30px !important;
	align-content:center;
	width:98% !important;
	height: 0 !important; 
	overflow: hidden !important;
}
.iframe-container iframe,
.iframe-container object,
.iframe-container embed {
    position: absolute !important;
    top: 0 !important;
    left: 0px !important;
	right: 0px !important;
    width: 100% !important;
    height: 100% !important;
}
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
<table class="table table-bordered" id="T1" width="100%">
<thead class="bg-skin">
    <tr>
        <th width="5%" style="text-align: center;">No</th>
        <th width="95%" style="text-align: center;">Data User SPLIT</th>
    </tr>
</thead>
<tbody>
	<?php
		if(isset($nama_cari)){
			$namacari	 		= '%'.$nama_cari.'%';
			$nipcari	 		= '%'.$nip_cari.'%';
			$emailcari 			= '%'.$email_cari.'%';
			$telpcari	 		= '%'.$telp_cari.'%';
			
			if ($strataII2!="")	{
			$strCari=" $strCari AND kantor_eselon2='$strataII2'";
			} 
			if ($strataIII2!="")	{
				$strCari=" $strCari AND kantor_eselon3='$strataIII2'";
			} 
			if ($strataIV2!="")	{
				$strCari=" $strCari AND kantor_eselon4='$strataIV2'";
			} 
			if ($jabatan_cari!="")	{
				$strCari=" $strCari AND jabatan='$jabatan_cari'";
			}
			#ADMIN - KANTOR PUSAT - DIREKTUR KIAL - SEKSI PUSAT
			if ($hak_akses=="admin") { 
			$sql = $pdoMYSQL->prepare("SELECT * FROM users_register WHERE nama LIKE :nama AND nip LIKE :nip AND email LIKE :email AND telp LIKE :telp $strCari ORDER BY id ASC");
			}
			$sql->bindParam(':nama', $namacari);
			$sql->bindParam(':nip', $nipcari);
			$sql->bindParam(':email', $emailcari);
			$sql->bindParam(':telp', $telpcari);
			$sql->execute();
		}else{ 
		#ADMIN - KANTOR PUSAT - DIREKTUR KIAL - SEKSI PUSAT
		if ($hak_akses=="admin") {
		$sql = $pdoMYSQL->prepare("SELECT * FROM users_register ORDER BY id ASC");
		#KANWIL DJBC
		}
		$sql->execute(); // Eksekusi querynya
		}

		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		while($data = $sql->fetch()){ // Ambil semua data dari hasil eksekusi $sql
		if($data['status']=="1") { $status_user = 'Disable';} 
		elseif($data['status']=="2") { $status_user = 'Delete'; } 
		else { $status_user = 'Pengajuan Aktivasi'; }
		?>
    <tr>
    <td class="text-center"><? echo $no; ?>
		<input type="hidden" id="id-value-<? echo $no; ?>" value="<? echo $data['id']; ?>">
		<input type="hidden" id="nama-value-<? echo $no; ?>" value="<? echo $data['nama']; ?>">
        <input type="hidden" id="nip-value-<? echo $no; ?>" value="<? echo $data['nip']; ?>">
        <input type="hidden" id="username-value-<? echo $no; ?>" value="<? echo $data['username']; ?>">
        <input type="hidden" id="sandi-value-<? echo $no; ?>" value="<? echo $data['sandi']; ?>">
        <input type="hidden" id="password-value-<? echo $no; ?>" value="<? echo $data['password']; ?>">
        <input type="hidden" id="salt-value-<? echo $no; ?>" value="<? echo $data['salt']; ?>">
        <input type="hidden" id="kantor_eselon2-value-<? echo $no; ?>" value="<? echo $data['kantor_eselon2']; ?>">
        <input type="hidden" id="kantor_eselon2_detail-value-<? echo $no; ?>" value="<? echo $data['kantor_eselon2_detail']; ?>">
        <input type="hidden" id="kantor_eselon3-value-<? echo $no; ?>" value="<? echo $data['kantor_eselon3']; ?>">
        <input type="hidden" id="kantor_eselon3_detail-value-<? echo $no; ?>" value="<? echo $data['kantor_eselon3_detail']; ?>">
        <input type="hidden" id="kantor_eselon4-value-<? echo $no; ?>" value="<? echo $data['kantor_eselon4']; ?>">
        <input type="hidden" id="kantor_eselon4_detail-value-<? echo $no; ?>" value="<? echo $data['kantor_eselon4_detail']; ?>">
        <input type="hidden" id="tipologi-value-<? echo $no; ?>" value="<? echo $data['tipologi']; ?>">
        <input type="hidden" id="nama_kantor-value-<? echo $no; ?>" value="<? echo $data['nama_kantor']; ?>">
        <input type="hidden" id="alamat_kantor-value-<? echo $no; ?>" value="<? echo $data['alamat_kantor']; ?>">
        <input type="hidden" id="telp_kantor-value-<? echo $no; ?>" value="<? echo $data['telp_kantor']; ?>">
        <input type="hidden" id="jabatan-value-<? echo $no; ?>" value="<? echo $data['jabatan']; ?>">
        <input type="hidden" id="pangol-value-<? echo $no; ?>" value="<? echo $data['pangol']; ?>">
        <input type="hidden" id="email-value-<? echo $no; ?>" value="<? echo $data['email']; ?>">
        <input type="hidden" id="telp-value-<? echo $no; ?>" value="<? echo $data['telp']; ?>">
        <input type="hidden" id="note-value-<? echo $no; ?>" value="<? echo $data['note']; ?>">
        <input type="hidden" id="privimpor-value-<? echo $no; ?>" value="<? echo $data['privimpor']; ?>">
        <input type="hidden" id="privekspor-value-<? echo $no; ?>" value="<? echo $data['privekspor']; ?>">
        <input type="hidden" id="privintelijen-value-<? echo $no; ?>" value="<? echo $data['privintelijen']; ?>">
        <input type="hidden" id="privli-value-<? echo $no; ?>" value="<? echo $data['privli']; ?>">
        <input type="hidden" id="privlki-value-<? echo $no; ?>" value="<? echo $data['privlki']; ?>">
        <input type="hidden" id="privlkai-value-<? echo $no; ?>" value="<? echo $data['privlkai']; ?>">
        <input type="hidden" id="privnhi-value-<? echo $no; ?>" value="<? echo $data['privnhi']; ?>">
        <input type="hidden" id="privnip-value-<? echo $no; ?>" value="<? echo $data['privnip']; ?>">
        <input type="hidden" id="privapoint-value-<? echo $no; ?>" value="<? echo $data['privapoint']; ?>">
        <input type="hidden" id="privrekapintel-value-<? echo $no; ?>" value="<? echo $data['privrekapintel']; ?>">
        <input type="hidden" id="privblokir-value-<? echo $no; ?>" value="<? echo $data['privblokir']; ?>">
        <input type="hidden" id="priveditblokir-value-<? echo $no; ?>" value="<? echo $data['priveditblokir']; ?>">
        <input type="hidden" id="privsurvailance-value-<? echo $no; ?>" value="<? echo $data['privsurvailance']; ?>">
        <input type="hidden" id="privatensiintel-value-<? echo $no; ?>" value="<? echo $data['privatensiintel']; ?>">
        <input type="hidden" id="privstaffintel-value-<? echo $no; ?>" value="<? echo $data['privstaffintel']; ?>">
        <input type="hidden" id="privstpi-value-<? echo $no; ?>" value="<? echo $data['privstpi']; ?>">
        <input type="hidden" id="privanalispenumpang-value-<? echo $no; ?>" value="<? echo $data['privanalispenumpang']; ?>">
        <input type="hidden" id="privatensipenumpang-value-<? echo $no; ?>" value="<? echo $data['privatensipenumpang']; ?>">
        <input type="hidden" id="privanalisyacht-value-<? echo $no; ?>" value="<? echo $data['privanalisyacht']; ?>">
        <input type="hidden" id="privatensiyacht-value-<? echo $no; ?>" value="<? echo $data['privatensiyacht']; ?>">
        <input type="hidden" id="privedityacht-value-<? echo $no; ?>" value="<? echo $data['privedityacht']; ?>">
        <input type="hidden" id="privanalisplb-value-<? echo $no; ?>" value="<? echo $data['privanalisplb']; ?>">
        <input type="hidden" id="privatensiplb-value-<? echo $no; ?>" value="<? echo $data['privatensiplb']; ?>">
        <input type="hidden" id="priveditplb-value-<? echo $no; ?>" value="<? echo $data['priveditplb']; ?>">
        <input type="hidden" id="privpenindakan-value-<? echo $no; ?>" value="<? echo $data['privpenindakan']; ?>">
        <input type="hidden" id="privreekspor-value-<? echo $no; ?>" value="<? echo $data['privreekspor']; ?>">
        <input type="hidden" id="privpibk-value-<? echo $no; ?>" value="<? echo $data['privpibk']; ?>">
        <input type="hidden" id="privsbp-value-<? echo $no; ?>" value="<? echo $data['privsbp']; ?>">
        <input type="hidden" id="priveditsbp-value-<? echo $no; ?>" value="<? echo $data['priveditsbp']; ?>">
        <input type="hidden" id="privpjt-value-<? echo $no; ?>" value="<? echo $data['privpjt']; ?>">
        <input type="hidden" id="privcd-value-<? echo $no; ?>" value="<? echo $data['privcd']; ?>">
        <input type="hidden" id="privstaffpenindakan-value-<? echo $no; ?>" value="<? echo $data['privstaffpenindakan']; ?>">
        <input type="hidden" id="privlaporan-value-<? echo $no; ?>" value="<? echo $data['privlaporan']; ?>">
        <input type="hidden" id="privlaporanplb-value-<? echo $no; ?>" value="<? echo $data['privlaporanplb']; ?>">
        <input type="hidden" id="privlaporanyacht-value-<? echo $no; ?>" value="<? echo $data['privlaporanyacht']; ?>">
        <input type="hidden" id="privimpordatapib-value-<? echo $no; ?>" value="<? echo $data['privimpordatapib']; ?>">
        <input type="hidden" id="privimpordatapeb-value-<? echo $no; ?>" value="<? echo $data['privimpordatapeb']; ?>">
        <input type="hidden" id="privimpordataspkpbm-value-<? echo $no; ?>" value="<? echo $data['privimpordataspkpbm']; ?>">
        <input type="hidden" id="privexecutive-value-<? echo $no; ?>" value="<? echo $data['privexecutive']; ?>">
        <input type="hidden" id="privexelaporan-value-<? echo $no; ?>" value="<? echo $data['privexelaporan']; ?>">
        <input type="hidden" id="privexebulanan-value-<? echo $no; ?>" value="<? echo $data['privexebulanan']; ?>">
        <input type="hidden" id="privvillar-value-<? echo $no; ?>" value="<? echo $data['privvillar']; ?>">
        <input type="hidden" id="privpabean-value-<? echo $no; ?>" value="<? echo $data['privpabean']; ?>">
        <input type="hidden" id="privkoordagenfasilitaspusat-value-<? echo $no; ?>" value="<? echo $data['privkoordagenfasilitaspusat']; ?>">
        <input type="hidden" id="privkoordagenfasilitas-value-<? echo $no; ?>" value="<? echo $data['privkoordagenfasilitas']; ?>">
        <input type="hidden" id="privagenfaskhusus-value-<? echo $no; ?>" value="<? echo $data['privagenfaskhusus']; ?>">
        <input type="hidden" id="privagenfas-value-<? echo $no; ?>" value="<? echo $data['privagenfas']; ?>">
        <input type="hidden" id="privstaffagenfas-value-<? echo $no; ?>" value="<? echo $data['privstaffagenfas']; ?>">
        <input type="hidden" id="privpabeanplb-value-<? echo $no; ?>" value="<? echo $data['privpabeanplb']; ?>">
        <input type="hidden" id="privpabeanyacht-value-<? echo $no; ?>" value="<? echo $data['privpabeanyacht']; ?>">
        <input type="hidden" id="privjaminan-value-<? echo $no; ?>" value="<? echo $data['privjaminan']; ?>">
        <input type="hidden" id="priveditjaminan-value-<? echo $no; ?>" value="<? echo $data['priveditjaminan']; ?>">
        <input type="hidden" id="privmanifest-value-<? echo $no; ?>" value="<? echo $data['privmanifest']; ?>">
        <input type="hidden" id="privmanifestplb-value-<? echo $no; ?>" value="<? echo $data['privmanifestplb']; ?>">
        <input type="hidden" id="privmanifestyacht-value-<? echo $no; ?>" value="<? echo $data['privmanifestyacht']; ?>">
        <input type="hidden" id="privimpordatamanifest-value-<? echo $no; ?>" value="<? echo $data['privimpordatamanifest']; ?>">
        <input type="hidden" id="priveditmanifest-value-<? echo $no; ?>" value="<? echo $data['priveditmanifest']; ?>">
        <input type="hidden" id="privpli-value-<? echo $no; ?>" value="<? echo $data['privpli']; ?>">
        <input type="hidden" id="privppidtk1-value-<? echo $no; ?>" value="<? echo $data['privppidtk1']; ?>">
        <input type="hidden" id="privppidtk2-value-<? echo $no; ?>" value="<? echo $data['privppidtk2']; ?>">
        <input type="hidden" id="privppidtk3-value-<? echo $no; ?>" value="<? echo $data['privppidtk3']; ?>">
        <input type="hidden" id="privppid-value-<? echo $no; ?>" value="<? echo $data['privppid']; ?>">
        <input type="hidden" id="privstaffppid-value-<? echo $no; ?>" value="<? echo $data['privstaffppid']; ?>">
        <input type="hidden" id="privclco-value-<? echo $no; ?>" value="<? echo $data['privclco']; ?>">
        <input type="hidden" id="privstaffpli-value-<? echo $no; ?>" value="<? echo $data['privstaffpli']; ?>">
        <input type="hidden" id="privcc-value-<? echo $no; ?>" value="<? echo $data['privcc']; ?>">
        <input type="hidden" id="privcs-value-<? echo $no; ?>" value="<? echo $data['privcs']; ?>">
        <input type="hidden" id="privumum-value-<? echo $no; ?>" value="<? echo $data['privumum']; ?>">
        <input type="hidden" id="privbtki-value-<? echo $no; ?>" value="<? echo $data['privbtki']; ?>">
        <input type="hidden" id="privtl-value-<? echo $no; ?>" value="<? echo $data['privtl']; ?>">
    </td>
	<td>
		<ul class="timeline">
			<li class="red">
            <i class="fa fa-comments bg-skin"></i>
			<div class="timeline-item">
                <div style="padding: 2px 2px 10px 2px">
                    <div class="pull-right">
                        <span style="font-size:11px; font-family:source-sans-pro, Arial, sans-serif" class="time">
                        <i class="fa fa-clock-o"></i>&nbsp; <?php echo date('d-M-Y',strtotime($data['update_time'])); ?></span>
                    </div>
                   	<div class="pull-left">
                        <i class="fa fa-user"></i>&nbsp;&nbsp;<b><? echo $data['nama']; ?></b>&nbsp;&nbsp;
                        <i class="fa fa-chevron-right"></i>&nbsp;&nbsp;<? echo $data['nip']; ?>&nbsp;&nbsp;
                        <i class="fa fa-chevron-right"></i>&nbsp;&nbsp;<? echo $data['kantor_eselon2_detail']; ?>&nbsp;&nbsp;
                        <i class="fa fa-chevron-right"></i>&nbsp;&nbsp;<? echo $status_user; ?>
                    </div>
                </div>
				<br>
                <div class="nav-tabs-custom box box-skin">
                <div class="nav-tabs-custom tab-default">
                    <ul class="nav nav-tabs">
                        <li class="pull-right">
                            <div class="pull-right">
                            <a 	href="javascript:void();" data-toggle="modal" data-target="#modal-pegawai" 
                                onclick="edit(<?php echo $no;?>);" class="btn-sm btn-success" data-placement="bottom" title="Aktivasi">
                                <span class="glyphicon glyphicon-ok"></span>
                            </a>
                            <a 	href="javascript:void();" data-toggle="modal" data-target="#delete-modal"
                                onclick="hapus(<?php echo $no; ?>);" class="btn-sm bg-maroon" data-placement="bottom" title="Delete">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
                            </div>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active">
                            <table width="100%" class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td width="20%"><b>Pengajuan Session</b></td>
                                        <td width="4%">:</td>
                                        <td width="75%"><? echo $data['aju_session']; ?></td>
                                    </tr>
                                    <tr>
                                        <td width="20%"><b>Username</b></td>
                                        <td width="4%">:</td>
                                        <td width="75%"><? echo $data['username']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Kantor Eselon II</b></td>
                                        <td>:</td>
                                        <td><? echo $data['kantor_eselon2_detail']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Kantor Eselon III</b></td>
                                        <td>:</td>
                                        <td><? echo $data['kantor_eselon3_detail']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Kantor Eselon IV</b></td>
                                        <td>:</td>
                                        <td><? echo $data['kantor_eselon4_detail']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Jabatan</b></td>
                                        <td>:</td>
                                        <td><? echo $data['jabatan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Email</b></td>
                                        <td>:</td>
                                        <td><? echo $data['email']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Telepon/Handphone</b></td>
                                        <td>:</td>
                                        <td><? echo $data['telp']; ?></td>
                                    </tr>
                                </tbody>
                            </table>    
                        </div>
                    </div>
            	</div>
                </div>
			</div>
			</li>
		</ul>
    </td>
	</tr>
    <?php
			$no++; // Tambah 1 setiap kali looping
		}
		?>
</tbody>
</table>
<script>
var val = '-1-';
$('input:checkbox[value="' + val + '"]').attr('checked', true);
function edit(no){
	$("#btn-simpan").hide();
	$("#btn-ubah").show();
	$("#btn-hash").hide();
	var id = $("#id-value-" + no).val();
	var nama_pegawai =$("#nama-value-" + no).val();
	$("#modal-title").html("Form Aktivasi  " + nama_pegawai);
	var nip_pegawai	=$("#nip-value-" + no).val();
	var email=$("#email-value-" + no).val();
	var username=$("#username-value-" + no).val();
	var sandi=$("#sandi-value-" + no).val();
	var password=$("#password-value-" + no).val();
	var salt=$("#salt-value-" + no).val();
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

	$("#data-id").val(id).attr("readonly","readonly");
	$("#nama_pegawai").val(nama_pegawai).trigger('input');
	$("#nip_pegawai").val(nip_pegawai).trigger('input');
	$("#email").val(email).trigger('input');
	$("#username").val(username).trigger('input');
	$("#sandi").val(sandi).trigger('input');
	$("#password").val(password).trigger('input');
	$("#salt").val(salt).trigger('input');
	$("#telp").val(telp).trigger('input');
	$("#qoute").val(qoute).trigger('input');
	$("#tipologi").val(tipologi).trigger('change');
	$("#strataII").val(strataII).trigger('change');
	$("#strataIII").val(strataIII).trigger('change');
	$("#strataIV").val(strataIV).trigger('change');
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
</script>
<script>
$(document).ready(function() {
	 $('#T1').DataTable( {
	"dom"			:'<"top"<"pull-right"f><"pull-left"l>>rt<"bottom"<"pull-left"i><"pull-right"p>>',
		"language"		: {
    						search: "<i class='fa fa-search'></i> Global Search : ",
    						searchPlaceholder: 'Filter Data Layanan',
							"zeroRecords": "Data Tidak Ditemukan",
					  	  },
		"paging": true,
      	"lengthChange": true,
      	"searching": true,
	  	"ordering": true,
      	"info": true,
      	"autoWidth": true,
		"lengthMenu": [[100, 150, 200, -1], [100, 150, 200, "All"]],
		"columnDefs": [
                { "type": "numeric-comma", targets: 0 }
   		],
 	});
});
</script>