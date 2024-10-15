<title>SPLIT - ADM LIBUR</title>
<!-- ########################################################----------TAG ROOT-------------->
<div class="content-wrapper">
    <section class="content-header">
    	<h1>Management Hari Libur Nasional<small><span class="w3-text-deep-blue"><b>#Beacukai</b></span><span class="w3-text-red"><b>makinbaik</b></span></small></h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Manajemen Admin</a></li>
            <li class="active">Administrasi Libur</li>
        </ol>
    </section>
<!-- -->
<!-- -->
<!-- -->
<section class="content">
<div class="box">
<!-- #########################################################----------JUDUL----------------->		
<div class="box-header with-border bg-skin">
	<h3 class="box-title">Form Libur Nasional</h3>
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fa fa-times"></i>
        </button>
    </div>
</div>
<!-- -->
<!-- -->
<!-- #########################################################----------JUDUL----------------->	            
<div class="box-body">
<?
		
		if (isset($_POST['submitButton'])) {
		$tgl_libur 		= $_POST['tgl_libur'];
		$ket_libur 		= $_POST['ket_libur'];
		$tgl_liburVal	= dateinput($tgl_libur);
		$sqldetail = "INSERT INTO td_libur (tgl_libur,ket_libur) VALUES ('$tgl_liburVal','$ket_libur')";
		
		$tambahdetail 	= mysql_query($sqldetail);
		
		if(!$tambahdetail )
		{
		echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                Data gagal ditambahkan
              </div>';
		} else {
		echo '<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Data Added Success !</h4>
					Data Anda berhasil ditambahkan.
				</div>';
		}
		}
				
?>
<div class="col-xs-4">
<div class="box box-skin">
<div class="box-header">
	<h4 align="center">Input Data Libur</h4>
</div>
<div class="box-body">
<form role="form" method="post" id="input_libur_form" action="" class="Valid" target="_self">
  <div class="form-group">
        <label for="tgl_libur">Tanggal Libur Nasional</label>
        <div class="input-group">
		<div class="input-group-addon">
		<i class="fa fa-sticky-note-o"></i>
		</div>
        <input type="text" class="form-control" name="tgl_libur" placeholder="Tanggal Libur" id="datepickerDD" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
        </div>
    </div> 
    <div class="form-group">
        <label for="ket_libur">Keterangan Libur</label>
        <div class="input-group">
		<div class="input-group-addon">
		<i class="fa fa-sticky-note-o"></i>
		</div>
        <input type="text" class="form-control" name="ket_libur"  placeholder="Keterangan Libur Nasional">
        </div>
    </div>
   <button type="submit" name="submitButton" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
<!-- #########################################################----------END DATA----------------->	 
<div class="col-xs-8">
<div class="box box-skin">
<div class="box-header">
	<h4 align="center">Data Libur Nasional</h4>
</div>
<div class="box-body">
<form name="myform" method="post" action="" target="_self">
<?
if ($_POST[tgl_awal]=="" and $_POST[tgl_akhir]=="")	{
	date_default_timezone_set('Asia/Jakarta');
	$tglval 	= date('d');
	$blnval 	= date('m');
	$thnval 	= date('Y');
	$tgl_awal 	= "01/01/$thnval";
	$tgl_akhir 	= "31/12/$thnval";
} else {
	$tgl_awal   = $_POST[tgl_awal];
	$tgl_akhir  = $_POST[tgl_akhir];
}
?>
<table width="100%" border="0" height="30">
<tbody>
	<tr>
		<td width="30%"><b>Periode Libur Nasional</b></td>
		<td width="35%" class="form-group">
			<input name="tgl_awal" type="text" value="<? echo $tgl_awal ?>" id="mydatepicker1" class="form-control" />
		</td>
		<td width="5%" align="center">s.d</td>
		<td width="35%">
			<input name="tgl_akhir" type="text" value="<? echo $tgl_akhir ?>" id="mydatepicker2" class="form-control"/>
		</td>
        <td width="10%">&nbsp;</td>
		<td width="5%">
        	<input name="submit" type="submit" value="Submit" id="Submit" class="btn btn-primary"/>
        </td>
	</tr>
</tbody>
</table>
</form>
</div>
<div class="box-body">
<!-- #########################################################----------TARIK DATA HARI LIBUR----------------->
<?
$tgl_awal_sql 	= dateinput($tgl_awal);	
$tgl_akhir_sql 	= dateinput($tgl_akhir);
?>
<table id="table1" class="table table-bordered table-hover">
<thead>
    <tr>
        <th width="5%">No</th>
        <th width="30%">Tanggal Libur</th>
        <th width="65%">Keterangan</th>
    </tr>
</thead>
<tbody>
<?
$tgl_awal_sql 	= dateinput($tgl_awal);	
$tgl_akhir_sql 	= dateinput($tgl_akhir);
$sqlppid 	= "SELECT * FROM td_libur WHERE tgl_libur >= '$tgl_awal_sql' AND tgl_libur <= '$tgl_akhir_sql' ORDER BY tgl_libur ASC";
if (isset($_POST['submit'])) {
$tgl_awal_sql 		= dateinput($_POST[tgl_awal]);
$tgl_akhir_sql 		= dateinput($_POST[tgl_akhir]);
$sqlppid 	= "SELECT * FROM td_libur WHERE tgl_libur >= '$tgl_awal_sql' AND tgl_libur <= '$tgl_akhir_sql' ORDER BY tgl_libur ASC";
};
$datappid 	= mysql_query( $sqlppid) or die(mysql_error());
$no =1;

while($row=mysql_fetch_array($datappid)){
		$id 				=$row['id_libur'];
		$tgl_libur 		=$row['tgl_libur'];
		$ket_libur 		=$row['ket_libur'];
	
?>		
	<tr>
		<td><?= $no; ?></td>
        <td><?= dateshow_3($tgl_libur); ?></td>
		<td><?= $ket_libur; ?></td>
	</tr>
<?
$no++;
}; 
?>
</tfoot>
</table>
<!-- #########################################################----------END DATA----------------->	    
</div>
</div>
</div>
</div>
<!-- -->
<!-- -->
<!-- #########################################################----------JUDUL----------------->	
<div class="box-footer">
<div class="w3-right">
	<span class="w3-text-deep-blue"><b>#Beacukai</b></span><span class="w3-text-red"><b>makinbaik</b></span>
</div>
</div>
<!-- -->
<!-- -->
</div>
</section>
</div>
<!-- ########################################################----------END MAIN DATA--------->
<script type="text/javascript">
$(document).ready(function()  {
	$('#datepickerDD')
        .mydatepicker({
            dateFormat: 'dd/mm/yy',
        })
        .on('change select', function() {
            // Revalidate the date field
            $('#input_libur_form').bootstrapValidator('revalidateField', 'tgl_libur');
        });
	
    $('#input_libur_form').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            tgl_libur: {
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
			ket_libur: {
                validators: {
                    notEmpty: {
                        message: 'Keterangan libur harus diisi'
                    },
					
                }
            },
	     },
		 
    });
	 $('#datepickerDD').on('change select', function(e) {
           $('#input_libur_form').bootstrapValidator('revalidateField', 'tgl_libur');
         });
});
</script>
