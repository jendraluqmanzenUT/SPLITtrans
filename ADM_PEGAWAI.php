<title>SPLIT - ADM PEGAWAI</title>
<style>
.dataTables_wrapper .dataTables_processing {
	margin-top: 35px !important;
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
.pull-center{
	display:inline-block;
	text-align:center !important;
}
</style>
<div class="content-wrapper">
    <section class="content-header">
    	<h1>Management Pegawai<small><span class="w3-text-deep-blue"><b>#Beacukai</b></span><span class="w3-text-red"><b>makinbaik</b></span></small></h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Manajemen Admin </a></li>
            <li class="active"> Administrasi Pegawai </li>
        </ol>
    </section>
<section class="content">
<!-- RESULT PENCARIAN-->
<div class="row">
<div class="col-xs-12">
    <div class="box box-skin collapsed-box">
    <div class="box-header with-border bg-skin" data-widget="collapse"><i class="fa fa-plus"></i>
        <h3 class="box-title">Menu Pencarian Data</h3>
    </div>
<?
	$strataII2 = '';
	$query2 = "SELECT strataII,kode_es2 FROM td_daftar_kantor GROUP BY kode_es2 ORDER BY id_kantor ASC";
	$result2 = mysql_query($query2);
	while($row2 = mysql_fetch_array($result2))
	{
	$strataII2 .= '<option value="'.$row2["kode_es2"].'">'.$row2["strataII"].'</option>';
	}
?>
<div class="box-body">
<form id="myForm">
<table width="100%" border="0">
	<tbody>
        <tr>
			<td width="15%"><b>Nama Pegawai</b></td>
				<td width="25%">
                    <input id="nama_cari" type="text" class="form-control search-data" placeholder="Nama Pegawai"/>
              	</td>
          	<td width="5%">&nbsp;</td>
          	<td width="15%"><b>Kantor Eselon II</b></td>
				<td width="40%">
                	<select type="text" class="form-control select2 action2 search-data" id="strataII2" style="width: 100%;"
                    data-placeholder="Silahkan Pilih Unit Eselon II">
					<option></option>
					<?php echo $strataII2; ?>
                    </select>
              	</td>
        </tr>
        <tr>
			<td><b>NIP Pegawai</b></td>
            	<td>
					<input id="nip_cari" type="text" class="form-control search-data" placeholder="NIP Pegawai"/>
              	</td>
          	<td>&nbsp;</td>
          	<td><b>Kantor Eselon III</b></td>
          		<td>
                	<select type="text" class="form-control select2 action2 search-data" id="strataIII2" style="width: 100%;"
                    data-placeholder="Silahkan Pilih Unit Eselon II Terlebih Dahulu">
                    </select>
            	</td>
        </tr>
    	<tr>
      		<td><b>Email Pegawai</b></td>
			<td>
				<input id="email_cari" type="text" class="form-control search-data" placeholder="Email Pegawai"/>
			</td>
      		<td>&nbsp;</td>
      		<td><b>Kantor Eselon IV</b></td>
      		<td>
              	<select type="text" class="form-control select2 search-data" id="strataIV2" style="width: 100%;"
                	data-placeholder="Silahkan Pilih Unit Eselon III Terlebih Dahulu">
                    <option selected disabled></option>
                </select>
     		</td>
    	</tr>
    	<tr>
      		<td><b>Telepon/Handphone</b></td>
      			<td>
                	<input id="telp_cari" type="text" class="form-control search-data" placeholder="Nomor Telepon/Handphone"/>
                </td>
      		<td>&nbsp;</td>
      		<td><b>Jabatan</b></td>
      			<td>
					<select class="form-control select2 search-data" id="jabatan_cari" style="width: 100%;"
                		data-placeholder="Silahkan Pilih Jabatan">
                          <option></option>
                          <option value="Direktur Jenderal">Direktur Jenderal</option>
                          <option value="Direktur">Direktur</option>
                          <option value="Kepala Kantor Utama">Kepala Kantor Utama</option>
                          <option value="Kepala Kantor Wilayah">Kepala Kantor Wilayah</option>
                          <option value="Kepala Kantor Pelayanan">Kepala Kantor Pelayanan</option>
                          <option value="Kepala Sub Direktorat">Kepala Sub Direktorat</option>
                          <option value="Kepala Bidang">Kepala Bidang</option>
                          <option value="PFPD">PFPD</option>
			  <option value="Widyaiswara">Widyaiswara</option>
                          <option value="Kepala Bagian Umum">Kepala Bagian Umum</option>
                          <option value="Kepala Seksi">Kepala Seksi</option>
                          <option value="Kepala Sub Seksi">Kepala Sub Seksi</option>
                          <option value="Kepala Sub Bagian">Kepala Sub Bagian</option>
                          <option value="Analis Intelijen">Analis Intelijen</option>
                          <option value="Analis Penindakan">Analis Penindakan</option>
                          <option value="Koordinator Staff">Koordinator Staff</option>
                          <option value="Pelaksana Pemeriksa">Pelaksana Pemeriksa</option>
                          <option value="Pelaksana Administrasi">Pelaksana Administrasi</option>
                	</select>
                </td>
      	</tr>
        <tr>
			<td>&nbsp;</td>
          	<td>&nbsp;</td>
          	<td>&nbsp;</td>
          	<td>&nbsp;</td>
			<td>
				<br>
                <button class="btn btn-primary" type="button" id="btn-search">Search</button>
                <input type="button" onclick="myFunction()" value="Reset" class="btn btn-warning" id="btn-resetsearch">
			</td>
        </tr>
	</tbody>
</table>
</form>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-12">
    <div class="box box-skin">
    <div class="box-header with-border bg-skin">
        <h3 class="box-title">Data User Pegawai</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
<div class="box-body">
    <div>
        <button type="button" id="btn-tambah" data-toggle="modal" data-target="#modal-pegawai" class="btn btn-success pull-right"
        onclick="tambah();">
            <span class="glyphicon glyphicon-plus"></span> &nbsp;Tambah Data
        </button>
    <br>
    <br>
    	<div id="view_search" ><?php include "Adm_Pegawai/VIEW_SEARCH.php"; ?></div>
    </div>
</div>
</div>
</div>
<!--MODAL SIMPAN DAN UBAH-->
<div class="modal fade" id="modal-pegawai" tabindex="-1" role="dialog" aria-labelledby="modal-pegawai-label">
	<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">
				<span id="modal-title"></span>
			</h4>
		</div>
        <input type="hidden" class="form-control" name="data-id" id="data-id">
		<div class="modal-body" id="modal-body">
			<form id="form-pegawai">
				<fieldset>
                <div class="box-body box box-skin" align="center"><h4><b>Data Pegawai</b></h4></div>
					<div class="form-group">
						<label>Nama Pegawai</label>
						<div class="input-group"><div class="input-group-addon"><i class="fa fa-user"></i></div>
							<input type="text" class="form-control" name="nama_pegawai" id="nama_pegawai" placeholder="Nama Pegawai">
						</div>
					</div>
					<div class="form-group">
						<label>NIP Pegawai</label>
						<div class="input-group"><div class="input-group-addon"><i class="fa fa-exclamation"></i></div>
							<input type="text" class="form-control" name="nip_pegawai" id="nip_pegawai" placeholder="NIP Pegawai">
						</div>
					</div>
					<div class="form-group">
					<label>Email Pegawai <span style="font-size:12px; font-weight:normal">(Digunakan sebagai Login)</span></label>
						<div class="input-group"><div class="input-group-addon"><i class="fa fa-envelope"></i></div>
							<input type="text" class="form-control" name="email" id="email" placeholder="Email Pegawai">
						</div>
					</div>
					<div class="form-group">
					<label>Username</label>
						<div class="input-group"><div class="input-group-addon"><i class="fa fa-user-plus"></i></div>
							<input type="text" class="form-control" name="username" id="username" placeholder="Username" readonly disabled>
						</div>
					</div>
					<div class="form-group">
					<label>Password SSO CEISA</label>
                        <div class="input-group"><div class="input-group-addon"><i class="fa fa-unlock-alt"></i></div>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
							<span class="input-group-addon" id="showpass"><i class="fa fa-eye" id="ishowpass"></i></span>
                        </div>
					</div>
					<div class="form-group">
					<label>Confirm Password</label>
						<div class="input-group"><div class="input-group-addon"><i class="fa fa-lock"></i></div>
							<input type="password" class="form-control" name="confirmpwd" id="confirmpwd" placeholder="Confirm Password">
                             <span class="input-group-addon" id="showconfpass"><i class="fa fa-eye" id="iconfirmpwd"></i></span>
						</div>
					</div>
					<div class="form-group">
					<label>Nomor Handphone</label>
                        <div class="input-group"><div class="input-group-addon"><i class="fa fa-unlock-alt"></i></div>
                            <input type="text" class="form-control" name="telp" id="telp" placeholder="Nomor Handphone">
                        </div>
					</div>
					<div class="form-group">
					<label>Qoute Bea Cukai</label>
						<div class="input-group"><div class="input-group-addon"><i class="fa fa-lock"></i></div>
							<input type="text" class="form-control" name="qoute" id="qoute" placeholder="Qoute Personal"
                            value="Bea Cukai Makin Baik">
						</div>
					</div>
                <input type="button" name="next" class="next btn btn-primary" value="Next" />
                </fieldset>
                <fieldset>
                <div class="box-body box box-skin" align="center"><h4><b>Data Kantor</b></h4></div>
                    <div class="form-group">
                        <label for="tipologi">Tipologi Kantor</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-balance-scale"></i>
                        </div>
                            <select type="text" class="form-control select2 action" id="tipologi" required name="tipologi"
                            data-placeholder="Silahkan Pilih Tipologi Kantor" style="width:100%">
                            	<option></option>
                                <option value="Kantor Pusat">Kantor Pusat</option>
                                <option value="Kantor Wilayah">Kantor Wilayah</option>
                                <option value="Kantor Pelayanan Utama">Kantor Pelayanan Utama</option>
                                <option value="Kantor Pelayanan">Kantor Pelayanan</option>
                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="eselonII">Eselon II</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-institution"></i></div>
                                <select type="text" class="form-control select2 action" id="strataII" name="strataII" style="width: 100%;"
                                data-placeholder="Silahkan Pilih Unit Eselon II">
                                    <option></option>
                                </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="eselonIII">Eselon III</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-building"></i></div>
                                <select type="text" class="form-control select2 action" id="strataIII" name="strataIII"
                                style="width: 100%;"
                                data-placeholder="Silahkan Pilih Unit Eselon II Terlebih Dahulu">
                                <option></option>
                                </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="eselonIV">Eselon IV</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-building-o"></i></div>
                                <select type="text" class="form-control select2" id="strataIV" name="strataIV" style="width: 100%;"
                                data-placeholder="Silahkan Pilih Unit Eselon III Terlebih Dahulu">
                                <option></option>
                                </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Jabatan">Jabatan</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-sitemap"></i></div>
                                <select class="form-control select2" id="jabatan"  name="jabatan" style="width: 100%;"
                                data-placeholder="Silahkan Pilih Jabatan">
                                    <option></option>
                                    <option value="Direktur Jenderal">Direktur Jenderal</option>
                                    <option value="Direktur">Direktur</option>
                                    <option value="Kepala Kantor Utama">Kepala Kantor Utama</option>
                                    <option value="Kepala Kantor Wilayah">Kepala Kantor Wilayah</option>
                                    <option value="Kepala Kantor Pelayanan">Kepala Kantor Pelayanan</option>
                                    <option value="Kepala Sub Direktorat">Kepala Sub Direktorat</option>
                                    <option value="Kepala Bidang">Kepala Bidang</option>
                                    <option value="PFPD">PFPD</option>
				    <option value="Widyaiswara">Widyaiswara</option>
                                    <option value="Kepala Bagian Umum">Kepala Bagian Umum</option>
                                    <option value="Kepala Seksi">Kepala Seksi</option>
                                    <option value="Kepala Sub Seksi">Kepala Sub Seksi</option>
                                    <option value="Kepala Sub Bagian">Kepala Sub Bagian</option>
                                    <option value="Analis Intelijen">Analis Intelijen</option>
                                    <option value="Analis Penindakan">Analis Penindakan</option>
                                    <option value="Koordinator Staff">Koordinator Staff</option>
                                    <option value="Pelaksana Pemeriksa">Pelaksana Pemeriksa</option>
                                    <option value="Pelaksana Administrasi">Pelaksana Administrasi</option>
                                </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Pangol">Pangkat dan Golongan</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-group"></i></div>
                                <select class="form-control select2" id="pangol" name="pangol" style="width: 100%;"
                                data-placeholder="Silahkan Pilih Pangkat dan Golongan">
                                    <option></option>
                                    <option value="Pembina Utama / IV.e">Pembina Utama / IV.e</option>
                                    <option value="Pembina Utama Madya / IV.d">Pembina Utama Madya / IV.d</option>
                                    <option value="Pembina Utama Muda / IV.c">Pembina Utama Muda / IV.c</option>
                                    <option value="Pembina Tingkat I / IV.b">Pembina Tingkat I / IV.b</option>
                                    <option value="Pembina / IV.a">Pembina / IV.a</option>
                                    <option value="Penata Tingkat I / III.d">Penata Tingkat I / III.d</option>
                                    <option value="Penata  / III.c">Penata  / III.c</option>
                                    <option value="Penata Muda Tingkat I / III.b">Penata Muda Tingkat I / III.b</option>
                                    <option value="Penata Muda / III.a">Penata Muda / III.a</option>
                                    <option value="Pengatur Tingkat I / II.d">Pengatur Tingkat I / II.d</option>
                                    <option value="Pengatur / II.c">Pengatur / II.c</option>
                                    <option value="Pengatur Muda Tingkat I / II.b">Pengatur Muda Tingkat I / II.b</option>
                                    <option value="Pengatur Muda / II.a">Pengatur Muda / II.a</option>
                                </select>
                        </div>
                    </div>

                <input type="button" name="previous" class="previous btn btn-warning" value="Previous" />
                <input type="button" name="next" class="next btn btn-primary" value="Next" />
                </fieldset>
                <fieldset>
                <div class="box-body box box-skin" align="center"><h4><b>Data Authority</b></h4></div>
                <table class="table table-bordered table-striped">
                <tbody>
                <tr align="center">
                    <td width="5%"><b>No</b></td>
                    <td width="45%"><b>Detail Authorize User</b></td>
                    <td width="30%"><b>Authorize</b></td>
                    <td width="20%"><b>Ceklist</b></td>
                </tr>
<? if ($hak_akses=="admin" and $level >= 60) { ?>
                <tr><td align="center">-</td><td>Session Impor Umum</td><td>privimpor</td><td align="center"><label class="switch"><input type="checkbox" id="privimpor" name="privimpor"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Ekspor Umum</td><td>privekspor</td><td align="center"><label class="switch"><input type="checkbox" id="privekspor" name="privekspor"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Intelijen</td><td>privintelijen</td><td align="center"><label class="switch"><input type="checkbox" id="privintelijen" name="privintelijen"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Lembar Informasi</td><td>privli</td><td align="center"><label class="switch"><input type="checkbox" id="privli" name="privli"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Lembar Klasifikasi Informasi</td><td>privlki</td><td align="center"><label class="switch"><input type="checkbox" id="privlki" name="privlki"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Lembar Kerja Analis Intelijen</td><td>privlkai</td><td align="center"><label class="switch"><input type="checkbox" id="privlkai" name="privlkai"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Nota Hasil Intelijen</td><td>privnhi</td><td align="center"><label class="switch"><input type="checkbox" id="privnhi" name="privnhi"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Nota Informasi Penindakan</td><td>privnip</td><td align="center"><label class="switch"><input type="checkbox" id="privnip" name="privnip"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Analysing Point</td><td>privapoint</td><td align="center"><label class="switch"><input type="checkbox" id="privapoint" name="privapoint"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Data Intelijen</td><td>privrekapintel</td><td align="center"><label class="switch"><input type="checkbox" id="privrekapintel" name="privrekapintel"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Pemblokiran</td><td>privblokir</td><td align="center"><label class="switch"><input type="checkbox" id="privblokir" name="privblokir"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Edit Pemblokiran</td><td>priveditblokir</td><td align="center"><label class="switch"><input type="checkbox" id="priveditblokir" name="priveditblokir"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Survailance</td><td>privsurvailance</td><td align="center"><label class="switch"><input type="checkbox" id="privsurvailance" name="privsurvailance"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Targeting Intelijen</td><td>privatensiintel</td><td align="center"><label class="switch"><input type="checkbox" id="privatensiintel" name="privatensiintel"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Staff Intelijen</td><td>privstaffintel</td><td align="center"><label class="switch"><input type="checkbox" id="privstaffintel" name="privstaffintel"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Surat Tugas Pengumpulan Informasi</td><td>privstpi</td><td align="center"><label class="switch"><input type="checkbox" id="privstpi" name="privstpi"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Analis Penumpang</td><td>privanalispenumpang</td><td align="center"><label class="switch"><input type="checkbox" id="privanalispenumpang" name="privanalispenumpang"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Targeting Penumpang</td><td>privatensipenumpang</td><td align="center"><label class="switch"><input type="checkbox" id="privatensipenumpang" name="privatensipenumpang"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Analis Yacht</td><td>privanalisyacht</td><td align="center"><label class="switch"><input type="checkbox" id="privanalisyacht" name="privanalisyacht"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Targeting Yacht</td><td>privatensiyacht</td><td align="center"><label class="switch"><input type="checkbox" id="privatensiyacht" name="privatensiyacht"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Edit Data Yacht</td><td>privedityacht</td><td align="center"><label class="switch"><input type="checkbox" id="privedityacht" name="privedityacht"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Analis Pos Lintas Batas</td><td>privanalisplb</td><td align="center"><label class="switch"><input type="checkbox" id="privanalisplb" name="privanalisplb"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Atensi Pos Lintas Batas</td><td>privatensiplb</td><td align="center"><label class="switch"><input type="checkbox" id="privatensiplb" name="privatensiplb"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Edit Data Pos Lintas Batas</td><td>priveditplb</td><td align="center"><label class="switch"><input type="checkbox" id="priveditplb" name="priveditplb"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Penindakan</td><td>privpenindakan</td><td align="center"><label class="switch"><input type="checkbox" id="privpenindakan" name="privpenindakan"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Reekspor</td><td>privreekspor</td><td align="center"><label class="switch"><input type="checkbox" id="privreekspor" name="privreekspor"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session PIBK</td><td>privpibk</td><td align="center"><label class="switch"><input type="checkbox" id="privpibk" name="privpibk"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session SBP</td><td>privsbp</td><td align="center"><label class="switch"><input type="checkbox" id="privsbp" name="privsbp"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Edit Data SBP</td><td>priveditsbp</td><td align="center"><label class="switch"><input type="checkbox" id="priveditsbp" name="priveditsbp"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session PJT</td><td>privpjt</td><td align="center"><label class="switch"><input type="checkbox" id="privpjt" name="privpjt"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Customs Declaration</td><td>privcd</td><td align="center"><label class="switch"><input type="checkbox" id="privcd" name="privcd"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Staff Penindakan</td><td>privstaffpenindakan</td><td align="center"><label class="switch"><input type="checkbox" id="privstaffpenindakan" name="privstaffpenindakan"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Laporan Umum</td><td>privlaporan</td><td align="center"><label class="switch"><input type="checkbox" id="privlaporan" name="privlaporan"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Laporan PLB</td><td>privlaporanplb</td><td align="center"><label class="switch"><input type="checkbox" id="privlaporanplb" name="privlaporanplb"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Laporan Yacht</td><td>privlaporanyacht</td><td align="center"><label class="switch"><input type="checkbox" id="privlaporanyacht" name="privlaporanyacht"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Impor Data PIB</td><td>privimpordatapib</td><td align="center"><label class="switch"><input type="checkbox" id="privimpordatapib" name="privimpordatapib"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Impor Data PEB</td><td>privimpordatapeb</td><td align="center"><label class="switch"><input type="checkbox" id="privimpordatapeb" name="privimpordatapeb"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Impor Data SPKPBM</td><td>privimpordataspkpbm</td><td align="center"><label class="switch"><input type="checkbox" id="privimpordataspkpbm" name="privimpordataspkpbm"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Eksecutive</td><td>privexecutive</td><td align="center"><label class="switch"><input type="checkbox" id="privexecutive" name="privexecutive"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Eksecutive Report</td><td>privexelaporan</td><td align="center"><label class="switch"><input type="checkbox" id="privexelaporan" name="privexelaporan"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Eksecutive Montly</td><td>privexebulanan</td><td align="center"><label class="switch"><input type="checkbox" id="privexebulanan" name="privexebulanan"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Villar Data</td><td>privvillar</td><td align="center"><label class="switch"><input type="checkbox" id="privvillar" name="privvillar"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Pabean Yacht</td><td>privpabeanyacht</td><td align="center"><label class="switch"><input type="checkbox" id="privpabeanyacht" name="privpabeanyacht"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Jaminan Kepabeanan</td><td>privjaminan</td><td align="center"><label class="switch"><input type="checkbox" id="privjaminan" name="privjaminan"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Edit Data Jaminan Kepabeanan</td><td>priveditjaminan</td><td align="center"><label class="switch"><input type="checkbox" id="priveditjaminan" name="priveditjaminan"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Manifest</td><td>privmanifest</td><td align="center"><label class="switch"><input type="checkbox" id="privmanifest" name="privmanifest"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Manifest PLB</td><td>privmanifestplb</td><td align="center"><label class="switch"><input type="checkbox" id="privmanifestplb" name="privmanifestplb"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Manifest Yacht</td><td>privmanifestyacht</td><td align="center"><label class="switch"><input type="checkbox" id="privmanifestyacht" name="privmanifestyacht"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Impor Data Manifest</td><td>privimpordatamanifest</td><td align="center"><label class="switch"><input type="checkbox" id="privimpordatamanifest" name="privimpordatamanifest"><div class="slider"></div></label></td></tr>
<tr><td align="center">-</td><td>Session Edit Data Manifest</td><td>priveditmanifest</td><td align="center"><label class="switch"><input type="checkbox" id="priveditmanifest" name="priveditmanifest"><div class="slider"></div></label></td></tr>
<? }; ?>
<tr><td align="center">1</td><td><b>Session Pabean Umum</b></td><td>privpabean</td><td align="center"><label class="switch"><input type="checkbox" id="privpabean" name="privpabean"><div class="slider"></div></label></td></tr>
<tr><td align="center">2</td><td>Session Koordinator Pusat Agen Fasilitas</td><td>privkoordagenfasilitaspusat</td><td align="center"><label class="switch"><input type="checkbox" id="privkoordagenfasilitaspusat" name="privkoordagenfasilitaspusat"><div class="slider"></div></label></td></tr>
<tr><td align="center">3</td><td>Session Koordinator Agen Fasilitas</td><td>privkoordagenfasilitas</td><td align="center"><label class="switch"><input type="checkbox" id="privkoordagenfasilitas" name="privkoordagenfasilitas"><div class="slider"></div></label></td></tr>
<tr><td align="center">4</td><td>Session Agen Fasilitas Khusus</td><td>privagenfaskhusus</td><td align="center"><label class="switch"><input type="checkbox" id="privagenfaskhusus" name="privagenfaskhusus"><div class="slider"></div></label></td></tr>
<tr><td align="center">5</td><td>Session Agen Fasilitas</td><td>privagenfas</td><td align="center"><label class="switch"><input type="checkbox" id="privagenfas" name="privagenfas"><div class="slider"></div></label></td></tr>
<tr><td align="center">6</td><td>Session Staff Agen Fasilitas</td><td>privstaffagenfas</td><td align="center"><label class="switch"><input type="checkbox" id="privstaffagenfas" name="privstaffagenfas"><div class="slider"></div></label></td></tr>
<tr><td align="center">7</td><td>Session Pabean PLB</td><td>privpabeanplb</td><td align="center"><label class="switch"><input type="checkbox" id="privpabeanplb" name="privpabeanplb"><div class="slider"></div></label></td></tr>

<tr><td align="center">8</td><td><b>Session Penyuluhan dan Layanan Informasi</b></td><td>privpli</td><td align="center"><label class="switch"><input type="checkbox" id="privpli" name="privpli"><div class="slider"></div></label></td></tr>
<tr><td align="center">9</td><td>Session PPID Tingkat I</td><td>privppidtk1</td><td align="center"><label class="switch"><input type="checkbox" id="privppidtk1" name="privppidtk1"><div class="slider"></div></label></td></tr>
<tr><td align="center">10</td><td>Session PPID Tingkat II</td><td>privppidtk2</td><td align="center"><label class="switch"><input type="checkbox" id="privppidtk2" name="privppidtk2"><div class="slider"></div></label></td></tr>
<tr><td align="center">11</td><td>Session PPID Tingkat III</td><td>privppidtk3</td><td align="center"><label class="switch"><input type="checkbox" id="privppidtk3" name="privppidtk3"><div class="slider"></div></label></td></tr>
<tr><td align="center">12</td><td>Session Pejabat PPID</td><td>privppid</td><td align="center"><label class="switch"><input type="checkbox" id="privppid" name="privppid"><div class="slider"></div></label></td></tr>
<tr><td align="center">13</td><td>Session Staff PPID</td><td>privstaffppid</td><td align="center"><label class="switch"><input type="checkbox" id="privstaffppid" name="privstaffppid"><div class="slider"></div></label></td></tr>
<tr><td align="center">14</td><td>Session Client Coordinator</td><td>privclco</td><td align="center"><label class="switch"><input type="checkbox" id="privclco" name="privclco"><div class="slider"></div></label></td></tr>
<tr><td align="center">15</td><td>Session Team Leader</td><td>privtl</td><td align="center"><label class="switch"><input type="checkbox" id="privtl" name="privtl"><div class="slider"></div></label></td></tr>
<tr><td align="center">16</td><td>Session Staff PLI</td><td>privstaffpli</td><td align="center"><label class="switch"><input type="checkbox" id="privstaffpli" name="privstaffpli"><div class="slider"></div></label></td></tr>
<tr><td align="center">17</td><td>Session Contact Center</td><td>privcc</td><td align="center"><label class="switch"><input type="checkbox" id="privcc" name="privcc"><div class="slider"></div></label></td></tr>
<tr><td align="center">18</td><td>Session Customer Service</td><td>privcs</td><td align="center"><label class="switch"><input type="checkbox" id="privcs" name="privcs"><div class="slider"></div></label></td></tr>
<tr><td align="center">19</td><td>Session Umum</td><td>privumum</td><td align="center"><label class="switch"><input type="checkbox" id="privumum" name="privumum"><div class="slider"></div></label></td></tr>
<tr><td align="center">20</td><td>Session BTKI</td><td>privbtki</td><td align="center"><label class="switch"><input type="checkbox" id="privbtki" name="privbtki"><div class="slider"></div></label></td></tr>

                </tbody>
                </table>
                <input type="button" name="previous" class="previous btn btn-warning" value="Previous" />
                </fieldset>
                <button type="button" id="btn-hash" class="btn btn-success"
                   onclick="return regformhash(this.form,
                                   this.form.username,
                                   this.form.email,
                                   this.form.password,
                                   this.form.confirmpwd);"></button>
			</form>
		</div>
		<div class="modal-footer">
        	<div class="pull-left" id="loading-simpan">
				<i class="fa fa-spinner fa-pulse fa-1x fa-fw text-act"></i>
				<span class="text-act"><b>Processing, Please Wait......</b></span>
			</div>
			<div class="pull-left" id="loading-ubah">
				<i class="fa fa-spinner fa-pulse fa-1x fa-fw text-act"></i>
				<span class="text-act"><b>Processing, Please Wait......</b></span>
			</div>
			<button type="submit" class="btn btn-primary" id="btn-simpan">Simpan</button>
	        <button type="button" class="btn btn-primary" id="btn-ubah">Ubah</button>
			<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
		</div>
	</div>
	</div>
</div>
<!--MODAL DELETE-->
<div id="delete-modal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Konfirmasi</h4>
			</div>
			<div class="modal-body" id="modal-body">
				<input type="hidden" id="data-id">Apakah anda yakin ingin menghapus data ini?
			</div>
			<div class="modal-footer">
                <div class="pull-left" id="loading-hapus">
					<i class="fa fa-spinner fa-pulse fa-1x fa-fw text-act"></i>
					<span class="text-act"><b>Processing, Please Wait......</b></span>
				</div>
                <button type="button" class="btn btn-primary" id="btn-hapus">Hapus</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
			</div>
		</div>
	</div>
</div>
<!--MODAL ACTIVE-->
<div id="modal-active" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Konfirmasi</h4>
			</div>
			<div class="modal-body" id="modal-body">
				<input type="hidden" id="data-id">Apakah anda yakin ingin melakukan perekaman data ini?
			</div>
			<div class="modal-footer">
                <div class="pull-left" id="loading-hapus">
					<i class="fa fa-spinner fa-pulse fa-1x fa-fw text-act"></i>
					<span class="text-act"><b>Processing, Please Wait......</b></span>
				</div>

                <button type="button" class="btn btn-success" id="btn-active">Aktivasi</button>
                <button type="button" class="btn btn-warning" id="btn-disable">Disable</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
			</div>
		</div>
	</div>
</div>
</div>
</section>
</div>
<!-- ########################################################----------END MAIN DATA--------->
<?
if($id_wong=="1") {
?>
<script>
$("#showpass, #showconfpass").click(function() {
	var x = document.getElementById("password");
	var y = document.getElementById("confirmpwd");
	if (x.type === "password") {
		x.type = "text";
		y.type = "text";
		$("#ishowpass").removeClass('fa-eye');
		$("#ishowpass").addClass('fa-eye-slash');
		$("#iconfirmpwd").removeClass('fa-eye');
		$("#iconfirmpwd").addClass('fa-eye-slash');
	} else {
		x.type = "password";
		y.type = "password";
		$("#ishowpass").removeClass('fa-eye-slash');
		$("#ishowpass").addClass('fa-eye');
		$("#iconfirmpwd").removeClass('fa-eye-slash');
		$("#iconfirmpwd").addClass('fa-eye');
	}
});
</script>
<? } ?>
<script>
$("#email").keyup(function() {
	var value_e = $(this).val();
	var res = value_e.split("@",1);
	$("#username").val( res );
	}).keyup();
</script>
<script>
$('.action2').change(function(){
	if($(this).val() != '')
			{
				var action2	= $(this).attr("id");
				var query2 	= $(this).val();
				var result2	= '';
			if 	(action2 == "strataII2")
			{
				result2 = 'strataIII2';
			}
			else
			{
				result2 = 'strataIV2';
			}
			$.ajax({
				url:	'_DEFINE_GET/_KantorDJBC/Get_Kantor.php',
				method:	'POST',
				data:{action2:action2, query2:query2},
				success:function(data){
				$('#'+result2).html(data);
				}
			})
		}
 	});
</script>
<script>
$('#modal-pegawai').on('show.bs.modal', function () {
	$('.action').change(function(){
		if($(this).val() != '')
				{
					var action 	= $(this).attr("id");
					var query 	= $(this).val();
					var data_tk	= $("#tipologi").val();
					var result 	= '';
				if 	(action == "tipologi") {
					result = 'strataII';
					$('#strataII').val(null).trigger('change');
				}
				if 	(action == "strataII") {
					result = 'strataIII';
					$('#strataIII').val(null).trigger('change');
				}
				if 	(action == "strataIII") {
					result = 'strataIV';
					$('#strataIV').val(null).trigger('change');
				}
				$.ajax({
					url:	'_DEFINE_GET/_KantorDJBC/Get_Kantor_Tipologi.php',
					method:	'POST',
					data:{action:action, query:query, data_tk:data_tk},
					success:function(data){
					$('#'+result).html(data);
					}
				})
			}
		});
});
</script>
<script type="text/javascript">
Waves.attach('#snarl-note', ['waves-button', 'waves-float']);
	Snarl.setDefaultOptions({
    timeout: 10000
 });
$(document).ready(function() {
	$.notify({
		title: '<b>Pemberitahuan</b><br>',
		message: 'Pastikan data pegawai disesuaikan dengan penempatan mutasi. <br><span class="w3-text-deep-blue"><b>#Beacukai</b></span><span class="w3-text-red"><b>makinbaik</b></span>'
	},{
	type: 'pastel-info',
	newest_on_top: true,
	placement: {
	from: 'bottom',
	align: 'right'
	},
	animate:{
		enter: "animated fadeInUp",
		exit: "animated fadeOutDown"
	},
	delay: 10000,
	template: '<div data-notify="container" class="alert-success alert-dismissible col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
			        '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">&times;</button>' +
					'<span data-notify="title">{1}</span>' +
					'<span data-notify="message">{2}</span>' +
				'</div>'
	});
});
</script>
<script>
function tambah(){
var cek = '-0-';
$(':checkbox').val(cek);
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
</script>
<script src="_ADMINISTRASI/Adm_Pegawai/AJAX.js"></script>