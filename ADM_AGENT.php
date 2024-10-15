<title>SPLIT - ADM AGENT BRAVO</title>
<!-- ########################################################----------TAG ROOT-------------->
<div class="content-wrapper">
    <section class="content-header">
    	<h1>Management Agent Bravo Bea Cukai<small><span class="w3-text-deep-blue"><b>#Beacukai</b></span><span class="w3-text-red"><b>makinbaik</b></span></small></h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Manajemen Admin</a></li>
            <li class="active">Administrasi Agent Bravo</li>
        </ol>
    </section>
<!-- -->
<!-- -->
<!-- -->
<section class="content">
<div class="box">
<!-- #########################################################----------JUDUL----------------->		
<div class="box-header with-border bg-skin">
	<h3 class="box-title">Administrasi Agent Bravo 1500225</h3>
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
<div>
<button type="button" id="btn-tambah" data-toggle="modal" data-target="#modal-OPEN" class="btn btn-success pull-right">
	<span class="glyphicon glyphicon-plus"></span> &nbsp;Tambah Agent
</button>
<br>
<br>
<div id="view"><?php include "Adm_Agent/view.php"; ?></div>
</div>
</div>
<div class="modal fade" id="modal-OPEN" tabindex="-1" role="dialog" aria-labelledby="modal-Label">
    <div class="modal-dialog" role="document">
       	<div class="modal-content">
           	<div class="modal-header">
               	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span></button>
               	<h4 class="modal-title" id="modal-title"></h4>
           	</div>
         	<div class="modal-body" id="modal-body">
           	<form id="form-AGENT" class="Valid">
            <input type="hidden" class="form-control" name="data-id" id="data-id">
            	<div class="form-group">
                    <label>Nama Agent</label>
                    <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                    </div>
                        <input type="text" class="form-control" name="nama_agent" id="nama_agent" placeholder="Nama Agent">
                    </div>
            	</div>
                <div class="form-group">
                    <label>NIP</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-bookmark-o"></i>
                        </div>
                        <input type="text" class="form-control" required name="nip_agent" id="nip_agent" placeholder="NIP Agent">
                    </div>
                </div>
                <div class="form-group">
                    <label>Posisi</label>
                    <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-star"></i>
                    </div>
                        <select type="text" class="form-control select2 dropper" id="position" required name="position"
                        data-placeholder="Silahkan Pilih Posisi Agent" style="width:100%">
                            <option></option>
                            <option value="Inbound">Inbound</option>
                            <option value="Outbound">Outbound</option>
                            <option value="Manajemen Layanan dan Penjamin Kualitas">Manajemen Layanan dan Penjamin Kualitas</option>
                            <option value="Layanan Informasi">Layanan Informasi</option>
                        </select>
                        
                    </div>
            	</div>
                <div class="form-group">
                    <label>Tugas</label>
                    <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-shield"></i>
                    </div>
                        <select type="text" class="form-control select2" id="tugas" required name="tugas" 
                        data-placeholder="Silahkan Pilih Tugas Agent" style="width:100%">
                        	<option></option>
                        </select>
                        
                    </div>
            	</div>
                <div class="form-group">
                    <label>Status</label>
                    <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-info"></i>
                    </div>
                        <select type="text" class="form-control select2" id="status" required name="status"
                        data-placeholder="Silahkan Pilih Status Agent" style="width:100%">
                            <option></option>
                            <option value="Active">Active</option>
                            <option value="Non Active">Non Active</option>
                        </select>
                        
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
                <button type="button" class="btn btn-primary btn-val" id="btn-simpan">Simpan</button>
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
				<input type="hidden" id="data-id">Apakah anda yakin ingin menghapus data ini?
			</div>
			<div class="modal-footer">
                <div id="loading-hapus" class="pull-left">
					<i class="fa fa-spinner fa-pulse fa-1x fa-fw text-act"></i>
					<span class="text-act"><b>Processing, Please Wait......</b></span>
				</div>
                <button type="button" class="btn btn-primary" id="btn-hapus">Ya</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
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
<!-- Load file ajax.js yang ada di folder js -->
<script src="_Administrasi/Adm_Agent/ajax.js"></script>
<script>
$("#modal-OPEN").on('shown.bs.modal', function () {
	$('.dropper').change(function(){
	if($(this).val() != '')
			{
				var dropper	= $(this).attr("id");
				var query 	= $(this).val();
				var result 	= '';
				if 	(dropper == "position")	{ result = 'tugas'; }
			$.ajax({
				url:	'_DEFINE_GET/_GetJenisAgent/Get_KodeAgent.php',
				method:	'POST',
				data:{dropper:dropper, query:query},
				success:function(data){
				$('#'+result).html(data);
				}	
			})
		}
 	});
});
</script>