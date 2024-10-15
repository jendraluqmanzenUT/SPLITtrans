<!doctype html><head>
<title>SPLIT - ADM FAQ</title>
</head>
<!-- ########################################################----------TAG ROOT-------------->
<div class="content-wrapper">
    <section class="content-header">
    	<h1>Management FAQ Bravo<small><span class="w3-text-deep-blue"><b>#Beacukai</b></span><span class="w3-text-red"><b>makinbaik</b></span></small></h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Manajemen Admin</a></li>
            <li class="active">Administrasi FAQ</li>
        </ol>
    </section>
<section class="content">
<?
	$bab = '';
	$sql_get_1 = $pdoODBC->prepare("SELECT kode_FAQ1,detail_FAQ1 FROM td_kode_faq GROUP BY kode_FAQ1,detail_FAQ1 ORDER BY kode_FAQ1 ASC");
	$sql_get_1->execute();
	while($row_get_1 = $sql_get_1->fetch())
	{
	$bab .= '<option value="'.$row_get_1["kode_FAQ1"].'">'.$row_get_1["detail_FAQ1"].'</option>';
	}
	
	$babcase = '';
	$sql_get_2 = $pdoODBC->prepare("SELECT kode_FAQ1,detail_FAQ1 FROM td_kode_faq GROUP BY kode_FAQ1,detail_FAQ1 ORDER BY kode_FAQ1 ASC");
	$sql_get_2->execute();
	while($row_get_2 = $sql_get_2->fetch())
	{
	$babcase .= '<option value="'.$row_get_2["kode_FAQ1"].'">'.$row_get_2["detail_FAQ1"].'</option>';
	}
?>
<!--######################################################################################################################################-->
<div class="row">
    <div class="col-xs-12">
    <div class="box box-skin collapsed-box">
    <div class="box-header with-border bg-skin"data-widget="collapse"><i class="fa fa-plus"></i>
        <h3 class="box-title">Menu Pencarian Data</h3>
    </div>
        <div class="box-body">
        <form id="myForm">
        <table width="100%" border="0">
          <tbody>
            <tr>
              <td width="15%"><b>BAB</b></td>
              <td width="33%">
                <select type="text" class="form-control select2 dropfaqcari search-data" id="bab_cari" 
                    data-placeholder="Silahkan Pilih BAB FAQ" style="width:100%">
                    <option></option>
                    <? echo $babcase;?>
                </select>
              </td>
              <td width="5%">&nbsp;</td>
              <td width="15%"><b>PERTANYAAN</b></td>
              <td width="32%">
                <input id="pertanyaan_cari" type="text" class="form-control search-data" placeholder="Pertanyaan"/>
              </td>
            </tr>
            <tr>
              <td><b>TOPIK</b></td>
              <td>
                <select type="text" class="form-control select2 dropfaqcari search-data" id="topik_cari"
                    data-placeholder="Silahkan Pilih BAB FAQ Terlebih Dahulu" style="width:100%">
                    <option></option>
                </select>
              </td>
              <td>&nbsp;</td>
              <td><b>JAWABAN</b></td>
              <td><input id="jawaban_cari" type="text" class="form-control search-data"
                    placeholder="Jawaban"/></td>
            </tr>
            <tr>
              <td><b>SUBTOPIK</b></td>
              <td>
                <select type="text" class="form-control select2 search-data" id="subtopik_cari" 
                    data-placeholder="Silahkan Pilih BAB FAQ Terlebih Dahulu" style="width:100%">
                    <option></option>
                </select>
              </td>
              <td>&nbsp;</td>
              <td><b>DASAR HUKUM</b></td>
              <td><input id="daskum_cari" type="text" class="form-control search-data" placeholder="Dasar Hukum"/></td>
            </tr>
            <tr>
              <td><b>&nbsp;</b></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td></td>
              <td>
                <br>
                <button class="btn btn-primary" type="button" id="btn-search">Search</button>
               <!-- <input type="submit" name="submit" id="btn-search" value="Submit" class="btn btn-primary"> -->
                <input type="button"value="Reset" class="btn btn-warning" id="btn-resetcari">
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
        <h3 class="box-title">Management FAQ</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
        <div class="box-body">
        <div>
        <button type="button" id="btn-tambah" data-toggle="modal" data-target="#modal-faq" class="btn btn-success pull-right">
            <span class="glyphicon glyphicon-plus"></span> &nbsp;Tambah Data
        </button>
        <br>
        <br>
            <div id="view"><?php include "ADM_FAQ/VIEW_DATA.php"; ?></div>
        </div>
        </div>
<div class="modal fade" id="modal-faq" tabindex="-1" role="dialog" aria-labelledby="modal-faq-label">
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
		<form id="form-faq" class="Valid">
            <div class="form-group">
				<label>Nota Dinas Verifikasi</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-institution"></i></div>
                        <input type="text" class="form-control" required id="ndver" name="ndver" placeholder="Nomor Nota Dinas">
                </div>
			</div>
            <div class="form-group">
				<label>Tanggal Nota Dinas Verifikasi</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                        <input type="text" class="form-control" name="tgl_nd" id="tgl_nd" 
                    	data-inputmask="'alias': 'dd/mm/yyyy'" data-mask placeholder="Tanggal Nota Dinas">
                </div>
			</div>
            <div class="form-group">
            	<label for="eselonII">Bab</label>
                <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-folder-open-o"></i></div>
                    <select type="text" class="form-control select2 dropfaq" id="bab" name="bab" required 
                    data-placeholder="Silahkan Pilih BAB FAQ">
                        <option></option>
                        <?php echo $bab; ?>
                    </select>   
                </div>
			</div>
            <div class="form-group">
                <label for="eselonIII">Topik</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-folder-open-o"></i></div>
                        <select type="text" class="form-control select2 dropfaq" id="topik" name="topik" required
                        data-placeholder="Silahkan Pilih BAB FAQ Terlebih Dahulu">
                        	<option></option>
                        </select>
                </div>
            </div>
            <div class="form-group">
                <label for="eselonIV">Sub Topik</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-folder-open-o"></i></div>
                        <select type="text" class="form-control select2" id="subtopik" name="subtopik" required
                        data-placeholder="Silahkan Pilih BAB FAQ Terlebih Dahulu">
                        	<option></option>
                        </select>
                </div>
            </div> 	
            <div class="form-group">
                <label for="pertanyaanFAQ">Pertanyaan FAQ</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                    	<textarea type="text" class="form-control" required name="pertanyaan" id="pertanyaan" 
                        placeholder="Pertanyaan FAQ"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="jawabanFAQ">Jawaban FAQ</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-comment"></i></div>
                    	<textarea type="text" class="form-control editor" required name="jawaban" id="jawaban" 
                        placeholder="Jawaban FAQ" spellcheck="false" style="width: 100%; height:auto; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
            </div>
            <div class="form-group">
				<label for="daskum_FAQ">Dasar Hukum FAQ</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-institution"></i></div>
                        <input type="text" class="form-control" required id="daskum" name="daskum">
                </div>
			</div>
		</form>
        <button type="reset" id="btn-reset"></button>
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
        	<button type="button" class="btn btn-primary btn-val" id="btn-simpan">Simpan</button>
	        <button type="button" class="btn btn-primary btn-val" id="btn-ubah">Ubah</button>
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
				<input type="hidden" id="data-id">Apakah anda yakin ingin menghapus data ini?
			</div>
			<div class="modal-footer">
                <div class="pull-left" id="loading-hapus">
					<i class="fa fa-spinner fa-pulse fa-1x fa-fw text-act"></i>
					<span class="text-act"><b>Processing, Please Wait......</b></span>
				</div>
                <button type="button" class="btn btn-primary" id="btn-hapus">Ya</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
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
<script src="_ADMINISTRASI/Adm_FAQ/AJAX.js"></script>
<script>
$('#modal-faq').on('shown.bs.modal', function () {
  	$(".select2").select2();
});
$('.dropfaqcari').change(function(){
	if($(this).val() != '')
		{
				var dropfaqcari	= $(this).attr("id");
				var query_cari 	= $(this).val();
				var result_cari	= '';
			if 	(dropfaqcari == "bab_cari")
			{
				result_cari = 'topik_cari';
			}
			else
			{
				result_cari = 'subtopik_cari';
			}
			$.ajax({
				url:	'_DEFINE_GET/_GetKodeFAQ/Get_KodeFAQ.php',
				method:	'POST',
				data:{dropfaq:dropfaqcari, query:query_cari},
				success:function(data){
					$('#'+result_cari).html(data);
				}	
			})
		}
 	});
$('#modal-faq').on('show.bs.modal', function (event) {
	$('.dropfaq').change(function(){
	if($(this).val() != '')
		{
				var dropfaq	= $(this).attr("id");
				var query 	= $(this).val();
				var result 	= '';
			if 	(dropfaq == "bab")
			{
				result = 'topik';
			}
			else
			{
				result = 'subtopik';
			}
			$.ajax({
				url:	'_DEFINE_GET/_GetKodeFAQ/Get_KodeFAQ.php',
				method:	'POST',
				data:{dropfaq:dropfaq, query:query},
				success:function(data){
				$('#'+result).html(data);
				$('.'+result).html(data);
				}	
			})
		}
 	});
});
$('#modal-faq').on('show.bs.modal', function (event) {
    $('.editor').wysihtml5({
		toolbar: {
			"font-styles": false, // Font styling, e.g. h1, h2, etc.
            "emphasis": true, // Italics, bold, etc.
            "lists": true, // (Un)ordered lists, e.g. Bullets, Numbers.
            "html": true, // Button which allows you to edit the generated HTML.
            "link": false, // Button to insert a link.
            "image": false, // Button to insert an image.
            "color": false, // Button to change color of font
            "blockquote": true, // Blockquote
            "indent": true,
            "outdent": true,
			"size": "sm",
        },
		"useLineBreaks":  true,
		"events": {
			"blur": function() { 
				$('#form-faq').bootstrapValidator('revalidateField', 'jawaban');
			}
		}, 
	});
});
</script>
