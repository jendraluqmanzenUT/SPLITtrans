<!doctype html><head>
<title>SPLIT - ADM PERATURAN</title>
</head>
<!--########################################################################################################----------TAG ROOT-------------->
<div class="content-wrapper">
<section class="content-header">
    	<h1>Management Peraturan Bravo<small><span class="w3-text-deep-blue"><b>#Beacukai</b></span><span class="w3-text-red"><b>makinbaik</b></span></small></h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Manajemen Admin</a></li>
            <li class="active">Administrasi Peraturan</li>
        </ol>
    </section>
<section class="content">
<!--######################################################################################################################################-->
<div class="row">
    <div class="col-xs-12">
    <div class="box box-skin collapsed-box">
    <div class="box-header with-border bg-skin" data-widget="collapse"><i class="fa fa-plus"></i>
        <h3 class="box-title">Menu Pencarian Data</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
        </div>
    </div>
    <?
	$bab_per 	= '';
	$sql_per 	= $pdoMYSQL->prepare("SELECT kode_per1,detail_per1 FROM td_kode_peraturan GROUP BY kode_per1 ORDER BY id ASC");
	$sql_per->execute();
	while($row = $sql_per->fetch())	{
		$bab_per .= '<option value="'.$row["kode_per1"].'">'.$row["detail_per1"].'</option>';
	}

?>
	<div class="box-body">
        <form id="myForm">
        <table width="100%" border="0">
          <tbody>
            <tr>
              	<td width="8%"><b>BAB</b></td>
				<td width="34%">
                  	<select type="text" class="form-control select2 dropper_per search-data" id="bab_cari"
                        data-placeholder="Silahkan Pilih Kategori Peraturan" style="width:100%">
						<option></option>
						<?php echo $bab_per; ?>
					</select>
				</td>
              	<td width="4%">&nbsp;</td>
              	<td width="15%"><b>KATEGORI ALL</b></td>
              	<td width="43%">
                	<select type="text" class="form-control select2 search-data" id="cari_all"
                        data-placeholder="Silahkan Pilih Kategori Peraturan" style="width:100%">
						<option></option>
<?
$tk_per1 		= "SELECT kode_per1,detail_per1 FROM td_kode_peraturan GROUP BY kode_per1 ORDER BY id ASC";
$sql_tk_per1 	= $pdoMYSQL->prepare("$tk_per1");
$sql_tk_per1->execute();
while($data_tk_per1	= $sql_tk_per1->fetch())
{
$call_kode_per1		= $data_tk_per1['kode_per1'];
$call_detail_per1	= $data_tk_per1['detail_per1'];
?>
	<?
    $tk_per2= "SELECT kode_per2,detail_per2 FROM td_kode_peraturan WHERE kode_per1='$call_kode_per1' GROUP BY kode_per2 ORDER BY id ASC";
    $sql_tk_per2 = $pdoMYSQL->prepare("$tk_per2");
    $sql_tk_per2->execute();
    while($data_tk_per2	= $sql_tk_per2->fetch())
    {
    $call_kode_per2		= $data_tk_per2['kode_per2'];
    $call_detail_per2	= $data_tk_per2['detail_per2'];
    ?>
    <optgroup label="<?=$call_detail_per1;?>&nbsp;-&nbsp;<?= $call_detail_per2 ?>">
		<?
        $tk_per3= "SELECT kode_per3,detail_per3 FROM td_kode_peraturan WHERE kode_per2='$call_kode_per2' GROUP BY kode_per3 ORDER BY id ASC";
        $sql_tk_per3 = $pdoMYSQL->prepare("$tk_per3");
        $sql_tk_per3->execute();
        while($data_tk_per3	= $sql_tk_per3->fetch())
        {
        $call_kode_per3		= $data_tk_per3['kode_per3'];
        $call_detail_per3	= $data_tk_per3['detail_per3'];
        ?>
        <option value=<?= $call_kode_per3; ?>>-&nbsp;-&nbsp;<u><?= $call_detail_per3 ?></u></option>
        <?
        }
	?>
	</optgroup>
	<?
	}
}
?>
					</select>
            	</td>
            </tr>
            <tr>
              <td><b>SUB BAB</b></td>
              <td>
                 <select type="text" class="form-control select2 dropper_per  search-data" id="subbab_cari"
                        data-placeholder="Silahkan Pilih Kategori Peraturan Terlebih Dahulu" style="width:100%">
                        <option></option>
                 </select>
              </td>
              <td>&nbsp;</td>
              <td><b>JENIS PERATURAN</b></td>
              <td>
                <select type="text" class="form-control select2  search-data" id="jenis_cari"
                        data-placeholder="Silahkan Pilih Jenis Peraturan" style="width:100%">
                    <option></option>
                    <option value="1">Undang-undang</option>
                    <option value="2">Peraturan Pemerintah</option>
                    <option value="3">Peraturan Presiden</option>
                    <option value="4">Keputusan Presiden</option>
                    <option value="5">Instruksi Presiden</option>
                    <option value="6">Keputusan Menteri Keuangan</option>
                    <option value="7">Peraturan Menteri Keuangan</option>
                    <option value="8">SE Menteri Keuangan</option>
                    <option value="9">Keputusan Dirjen Bea Cukai</option>
                    <option value="10">Peraturan Dirjen Bea Cukai</option>
                    <option value="11">SE Dirjen Bea Cukai</option>
                    <option value="12">Peraturan Menteri Perdagangan</option>
                    <option value="13">Peraturan Menteri Perindustrian</option>
                    <option value="18">Peraturan BPOM</option>
                    <option value="19">Peraturan Menteri Pertanian</option>
                    <option value="14">Surat DJBC</option>
                    <option value="15">Peraturan Instansi Lain</option>
                    <option value="16">Instruksi Direktur Jenderal</option>
                    <option value="17">Lain-Lain</option>
                    <option value="18">Peraturan BPOM</option>
                    <option value="19">Peraturan Menteri Pertanian</option>
                    <option value="20">Presentasi Peraturan</option>
                    <option value="21">Petunjuk Operasional</option>
                    <option value="22">Nota Dinas DJBC</option>
                    <option value="23">Keputusan Menteri Perdagangan</option>
                </select>
            </td>
            </tr>
            <tr>
              <td><b>POS</b></td>
              <td>
                  <select type="text" class="form-control select2 dropper_per search-data" id="posper_cari"
                        data-placeholder="Silahkan Pilih Kategori Peraturan Terlebih Dahulu" style="width:100%">
                      	<option></option>
                  </select>
              </td>
              <td>&nbsp;</td>
              <td><b>NOMOR PERATURAN</b></td>
              <td>
                <input type="text" id="nomor_cari" class="form-control search-data" placeholder="Nomor Peraturan"/>
              </td>
            </tr>
            <tr>
              <td><b>SUB POS</b></td>
              <td>
                <select type="text" class="form-control select2 search-data" id="subpos_cari"
                        data-placeholder="Silahkan Pilih Kategori Peraturan Terlebih Dahulu" style="width:100%">
                        <option></option>
                </select>
              </td>
              <td>&nbsp;</td>
              <td><b>JUDUL PERATURAN</b></td>
              <td><input id="judul_cari" type="text" class="form-control search-data" placeholder="Judul Peraturan"/></td>
			</tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="2">
              	<button class="btn btn-primary" type="button" id="btn-search">Search</button>
                <button class="btn btn-warning" type="reset" id="btn-reset-cari">Reset</button>
              </td>
            </tr>
          </tbody>
        </table>
        </form>
	</div>
    </div>
    </div>
</div>
<!--######################################################################################################################################-->
<div class="row">
    <div class="col-xs-12">
    <div class="box box-skin">
    <div class="box-header with-border bg-skin">
        <h3 class="box-title">Peraturan Customs Excise Knowledge Base</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
        <div class="box-body">
<div>
	<button type="button" id="btn-tambah" data-toggle="modal" data-target="#modal-per-baru" class="btn btn-success pull-right">
	<span class="glyphicon glyphicon-plus"></span> &nbsp;Tambah Data
	</button>
	<br>
    <br>
	<div id="view"><?php include "Adm_Peraturan/VIEW.php"; ?></div>
</div>

<div class="modal fade" id="modal-per-baru" tabindex="-1" role="dialog" aria-labelledby="form-modallabel">
	<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">
				<span id="modal-title"></span>
			</h4>
		</div>
		<div class="modal-body" id="modal-body">
		<div id="pesan-error" class="alert alert-danger"></div>
		<form id="form">
        <div class="form-group">
            <label for="bab_per">Jenis Peraturan</label>
            <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-folder-open-o"></i>
            </div>
                <select type="text" class="form-control select2" id="jenis_per" required name="jenis_per"
                data-placeholder="Silahkan Pilih Jenis Peraturan" style="width:100%">
					<option value=""></option>
                    <option value="1">Undang-undang</option>
                    <option value="2">Peraturan Pemerintah</option>
                    <option value="3">Peraturan Presiden</option>
                    <option value="4">Keputusan Presiden</option>
                    <option value="5">Instruksi Presiden</option>
                    <option value="6">Keputusan Menteri Keuangan</option>
                    <option value="7">Peraturan Menteri Keuangan</option>
                    <option value="8">SE Menteri Keuangan</option>
                    <option value="9">Keputusan Dirjen Bea Cukai</option>
                    <option value="10">Peraturan Dirjen Bea Cukai</option>
                    <option value="11">SE Dirjen Bea Cukai</option>
                    <option value="12">Peraturan Menteri Perdagangan</option>
                    <option value="13">Peraturan Menteri Perindustrian</option>
                    <option value="18">Peraturan BPOM</option>
                    <option value="19">Peraturan Menteri Pertanian</option>
                    <option value="14">Surat DJBC</option>
                    <option value="15">Peraturan Instansi Lain</option>
                    <option value="16">Instruksi Direktur Jenderal</option>
                    <option value="17">Lain-Lain</option>
                    <option value="18">Peraturan BPOM</option>
                    <option value="19">Peraturan Menteri Pertanian</option>
                    <option value="20">Presentasi Peraturan</option>
                    <option value="21">Petunjuk Operasional</option>
                    <option value="22">Nota Dinas DJBC</option>
                    <option value="23">Keputusan Menteri Perdagangan</option>
                </select>

            </div>
        </div>
        <div class="form-group">
            <label for="bab_per">Bab Peraturan</label>
            <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-folder-open-o"></i>
            </div>
                <select type="text" class="form-control select2 dropper" id="bab_per" required name="bab_per"
                data-placeholder="Silahkan Pilih Kategori Peraturan" style="width:100%">
					<option></option>
					<?php echo $bab_per; ?>
                </select>

            </div>
        </div>
        <div class="form-group">
            <label for="subbab">Subbab Peraturan</label>
            <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-folder-open-o"></i>
            </div>
                <select type="text" class="form-control select2 dropper" id="subbab" required name="subbab"
                data-placeholder="Silahkan Pilih Kategori Peraturan Terlebih Dahulu" style="width:100%">
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="posper">Pos Peraturan</label>
            <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-folder-open-o"></i>
            </div>
                <select type="text" class="form-control select2 dropper" id="posper" required name="posper"
                data-placeholder="Silahkan Pilih Kategori Peraturan Terlebih Dahulu" style="width:100%">
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="subpos">Subpos Peraturan</label>
            <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-folder-open-o"></i>
            </div>
                <select type="text" class="form-control select2" id="subpos" required name="subpos"
                data-placeholder="Silahkan Pilih Kategori Peraturan Terlebih Dahulu" style="width:100%">
                </select>
            </div>
        </div>
	    <div class="form-group">
        	<label for="NomorPeraturan">Nomor Peraturan</label>
            <div class="input-group">
                <div class="input-group-addon">
            		<i class="fa fa-institution"></i>
            	</div>
                <input type="text" class="form-control" required name="no_per_baru" id="no_per_baru" spellcheck="false"
                placeholder="Nomor Peraturan">
            </div>
    	</div>
    	<div class="form-group">
        <label for="judul_peraturan">Judul Peraturan</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-institution"></i>
                </div>
                <textarea type="text" class="form-control" required name="judul_per_baru" id="judul_per_baru" spellcheck="false"
                placeholder="Judul Peraturan"></textarea>
            </div>
    	</div>
        <div class="form-group">
        <label for="tanggal_terbit">Tanggal Terbit</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-institution"></i>
                </div>
                <input type="text" class="form-control" required name="terbit_per_baru" id="terbit_per_baru" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask placeholder="Tanggal Pengesahan">
            </div>
    	</div>
        <div class="form-group">
        <label for="judul_peraturan">Upload Peraturan</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-file-pdf-o"></i>
                </div>
                <input type="file" id="file_per_baru" name="file_per_baru" class="filestyle"
                data-placeholder="Tidak Ada File yang Dipilih" data-btnClass="btn-primary">
            </div>
    	</div>
		<button type="reset" id="btn-reset"></button>
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

        	<button type="button" class="btn btn-primary" id="btn-simpan">Simpan</button>
			<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
		</div>
	</div>
	</div>
</div>
<!--MODAL PERUBAHAN -->
<div class="modal fade" id="modal-per-ubah" tabindex="-1" role="dialog" aria-labelledby="form-modallabel">
	<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">Form Perubahan Peraturan</h4>
		</div>
		<div class="modal-body" id="modal-body">
		<div id="pesan-error" class="alert alert-danger"></div>
		<form id="form-ubah">
		<input type="hidden" class="form-control" name="data-id" id="data-id">
        <input type="hidden" class="form-control" name="last_per" id="last_per">
        <input type="hidden" class="form-control" name="kode_cabut" id="kode_cabut">
        <div class="form-group">
            <label for="bab_per">Jenis Peraturan</label>
            <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-folder-open-o"></i>
            </div>
                <select type="text" class="form-control select2" id="jenis_per2" required name="jenis_per2"
                data-placeholder="Silahkan Pilih Jenis Peraturan" style="width:100%">
                    <option value=""></option>
                    <option value="1">Undang-undang</option>
                    <option value="2">Peraturan Pemerintah</option>
                    <option value="3">Peraturan Presiden</option>
                    <option value="4">Keputusan Presiden</option>
                    <option value="5">Instruksi Presiden</option>
                    <option value="6">Keputusan Menteri Keuangan</option>
                    <option value="7">Peraturan Menteri Keuangan</option>
                    <option value="8">SE Menteri Keuangan</option>
                    <option value="9">Keputusan Dirjen Bea Cukai</option>
                    <option value="10">Peraturan Dirjen Bea Cukai</option>
                    <option value="11">SE Dirjen Bea Cukai</option>
                    <option value="12">Peraturan Menteri Perdagangan</option>
                    <option value="13">Peraturan Menteri Perindustrian</option>
                    <option value="18">Peraturan BPOM</option>
                    <option value="19">Peraturan Menteri Pertanian</option>
                    <option value="14">Surat DJBC</option>
                    <option value="15">Peraturan Instansi Lain</option>
                    <option value="16">Instruksi Direktur Jenderal</option>
                    <option value="17">Lain-Lain</option>
                    <option value="18">Peraturan BPOM</option>
                    <option value="19">Peraturan Menteri Pertanian</option>
                    <option value="20">Presentasi Peraturan</option>
                    <option value="21">Petunjuk Operasional</option>
                    <option value="22">Nota Dinas DJBC</option>
                    <option value="23">Keputusan Menteri Perdagangan</option>
                </select>

            </div>
        </div>
        <div class="form-group">
            <label for="bab_per">Bab Peraturan</label>
            <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-folder-open-o"></i>
            </div>
                <select type="text" class="form-control select2 dropper2" id="bab_per2" required name="bab_per2"
                data-placeholder="Silahkan Pilih Kategori Peraturan" style="width:100%">
					<?php echo $bab_per; ?>
                </select>

            </div>
        </div>
        <div class="form-group">
            <label for="subbab">Subbab Peraturan</label>
            <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-folder-open-o"></i>
            </div>
                <select type="text" class="form-control select2 dropper2" id="subbab2" required name="subbab2"
                data-placeholder="Silahkan Pilih Kategori Peraturan Terlebih Dahulu" style="width:100%">
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="posper">Pos Peraturan</label>
            <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-folder-open-o"></i>
            </div>
                <select type="text" class="form-control select2 dropper2" id="posper2" required name="posper2"
                data-placeholder="Silahkan Pilih Kategori Peraturan Terlebih Dahulu" style="width:100%">
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="subpos">Subpos Peraturan</label>
            <div class="input-group">
            <div class="input-group-addon">

                <i class="fa fa-folder-open-o"></i>
            </div>
                <select type="text" class="form-control select2" id="subpos2" required name="subpos2"
                data-placeholder="Silahkan Pilih Kategori Peraturan Terlebih Dahulu" style="width:100%">
                </select>
            </div>
        </div>
	    <div class="form-group">
        	<label for="NomorPeraturan">Nomor Peraturan</label>
            <div class="input-group">
                <div class="input-group-addon">
            		<i class="fa fa-institution"></i>
            	</div>
                <input type="text" class="form-control" required name="no_per_baru2" id="no_per_baru2" spellcheck="false"
                placeholder="Nomor Peraturan">
            </div>
    	</div>
    	<div class="form-group">
        <label for="judul_peraturan">Judul Peraturan</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-institution"></i>
                </div>
                <textarea type="text" class="form-control" required name="judul_per_baru2" id="judul_per_baru2" spellcheck="false"
                placeholder="Judul Peraturan"></textarea>
            </div>
    	</div>
        <div class="form-group">
            <label for="bab_per">Kategori Perubahan</label>
            <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-folder-open-o"></i>
            </div>
                <select type="text" class="form-control select2 dropper3" id="kat_perubahan" required name="kat_perubahan"
                data-placeholder="Silahkan Pilih Kategori Perubahan" style="width:100%">
                	<option value=""></option>
                    <option value="1">Perubahan Peraturan</option>
                    <option value="2">Pencabutan Perubahan</option>
                    <option value="3">Perubahan File</option>
                </select>

            </div>
        </div>
        <div class="form-group">
            <label for="bab_per">Jenis Perubahan</label>
            <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-folder-open-o"></i>
            </div>
                <select type="text" class="form-control select2" id="jenis_perubahan" required name="jenis_perubahan"
                data-placeholder="Silahkan Pilih Jenis Perubahan" style="width:100%">
                	<option></option>
                </select>

            </div>
        </div>
		<div class="form-group">
        	<label for="NomorPeraturan">Nomor Peraturan Perubahan</label>
            <div class="input-group">
                <div class="input-group-addon">
            		<i class="fa fa-institution"></i>
            	</div>
                <input type="text" class="form-control" required name="no_per_edit" id="no_per_edit" spellcheck="false"
                placeholder="Nomor Peraturan Perubahan">
            </div>
    	</div>
    	<div class="form-group">
        <label for="judul_peraturan">Judul Peraturan Perubahan</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-institution"></i>
                </div>
                <textarea type="text" class="form-control" required name="judul_per_edit" id="judul_per_edit" spellcheck="false"
                placeholder="Judul Peraturan Perubahan"></textarea>
            </div>
    	</div>
        <div class="form-group">
        <label for="tanggal_terbit">Tanggal Terbit</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-institution"></i>
                </div>
                <input type="text" class="form-control" required name="terbit_per_edit" id="terbit_per_edit" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask placeholder="Tanggal Pengesahan Peraturan Perubahan">
            </div>
    	</div>
        <div class="form-group">
        <label for="judul_peraturan">Upload Peraturan</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-file-pdf-o"></i>
                </div>
                <input type="file" id="file_per_edit" name="file_per_edit" class="filestyle"
                data-placeholder="Tidak Ada File yang Dipilih" data-btnClass="btn-primary">
            </div>
    	</div>
		<button type="reset" id="btn-reset"></button>
		</form>
		</div>
		<div class="modal-footer">
			<div class="pull-left" id="loading-ubah">
				<i class="fa fa-spinner fa-pulse fa-1x fa-fw text-act"></i>
				<span class="text-act"><b>Processing, Please Wait......</b></span>
			</div>

        	<button type="button" class="btn btn-primary" id="btn-ubah">Ubah</button>
			<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
		</div>
	</div>
	</div>
</div>
<div id="delete-modal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Konfirmasi</h4>
			</div>
			<div class="modal-body" id="modal-body">
           		<input type="hidden" class="form-control" name="id-cabut" id="id-cabut">
                Apakah anda yakin ingin menghapus data ini?
			</div>
			<div class="modal-footer">
                <div class="pull-left" id="loading-hapus">
					<i class="fa fa-spinner fa-pulse fa-1x fa-fw text-act"></i>
					<span class="text-act"><b>Processing, Please Wait......</b></span>
				</div>
                <button type="button" class="btn btn-danger" id="btn-hapus">Ya</button>
                <button type="button" class="btn btn-warning" data-dismiss="modal">Tidak</button>
			</div>
		</div>
	</div>
</div>

</div>
    <div class="box-footer">
    	<div class="w3-right">
        	<span class="w3-text-deep-blue"><b>#Beacukai</b></span><span class="w3-text-red"><b>makinbaik</b></span>
    	</div>
    </div>
    </div>
    </div>
</div>
<!--######################################################################################################################################-->
</section>
</div>
<!-- ########################################################----------END MAIN DATA--------->
<script>
$('.dropper_per').change(function(){
	if($(this).val() != '')
		{
		var dropper_per	= $(this).attr("id");
		var query_per 	= $(this).val();
		var result_per 	= '';
			if 	(dropper_per == "bab_cari")		{ result_per = 'subbab_cari'; $('#subbab_cari').val(null).trigger('change');};
			if 	(dropper_per == "subbab_cari")	{ result_per = 'posper_cari'; $('#posper_cari').val(null).trigger('change');};
			if 	(dropper_per == "posper_cari")	{ result_per = 'subpos_cari'; $('#subpos_cari').val(null).trigger('change');};
			$.ajax({
				url:	'_DEFINE_GET/_GetKodePER/Get_KodePER.php',
				method:	'POST',
				data:{dropper:dropper_per, query:query_per},
				success:function(data){
					$('#'+result_per).html(data);
			}
		})
	}
});
$('#modal-per-baru').on('show.bs.modal', function (event) {
	$('.dropper').change(function(){
	if($(this).val() != '')
		{
				var dropper	= $(this).attr("id");
				var query 	= $(this).val();
				var result 	= '';
				if 	(dropper == "bab_per")	{ result = 'subbab'; $('#subbab').val(null).trigger('change');};
				if 	(dropper == "subbab")	{ result = 'posper'; $('#posper').val(null).trigger('change');};
				if 	(dropper == "posper")	{ result = 'subpos'; $('#subpos').val(null).trigger('change');};
			$.ajax({
				url:	'_DEFINE_GET/_GetKodePER/Get_KodePER.php',
				method:	'POST',
				data:{dropper:dropper, query:query},
				success:function(data){
				$('#'+result).html(data);
				$('.'+result).html(data);
				}
			})
		}
 	});
});
</script>
<script>
$('#modal-per-ubah').on('show.bs.modal', function (event) {
	$('.dropper2').change(function(){
	if($(this).val() != '')
		{
				var dropper2	= $(this).attr("id");
				var query2		= $(this).val();
				var result2 	= '';
				if 	(dropper2 == "bab_per2"){ result2 = 'subbab2'; $('#subbab2').val(null).trigger('change');};
				if 	(dropper2 == "subbab2")	{ result2 = 'posper2'; $('#posper2').val(null).trigger('change');};
				if 	(dropper2 == "posper2")	{ result2 = 'subpos2'; $('#subpos2').val(null).trigger('change');};
			$.ajax({
				url:	'_DEFINE_GET/_GetKodePER/Get_KodePER.php',
				method:	'POST',
				data:{dropper2:dropper2, query2:query2},
				success:function(data){
					$('#'+result2).html(data);
				}
			})
		}
 	});
});
</script>
<script>
$('#modal-per-ubah').on('show.bs.modal', function (event) {
	$('.dropper3').change(function(){
	if($(this).val() != '')
		{
				var last_per 	= $("#last_per").val();
				var kode_cabut 	= $("#kode_cabut").val();
				var dropper3	= $(this).attr("id");
				var query3		= $(this).val();
				var result3 	= '';
				if 	(dropper3 == "kat_perubahan"){ result3 = 'jenis_perubahan'; $('#jenis_perubahan').val(null).trigger('change');};
			$.ajax({
				url:	'_DEFINE_GET/_GetKodePER/Get_KodeUpl.php',
				method:	'POST',
				data:{dropper3:dropper3, query3:query3, last_per:last_per, kode_cabut:kode_cabut},
				success:function(data){
					$('#'+result3).html(data);
				}
			})
		}
 	});
});
</script>
<script>
$('#terbit_per_baru, #terbit_per_edit').mydatepicker({
    autoclose: true,
	dateFormat: 'dd/mm/yy',
	changeYear: true,
	changeMonth: true,
    beforeShow: function() {
        setTimeout(function(){
            $('.ui-mydatepicker').css('z-index', 99999999999999);
        }, 0);
    }
});
</script>
<script src="_Administrasi/Adm_Peraturan/AJAX.js"></script>