<style type="text/css">
.iframe-container {    
    padding-bottom: calc(100vh - 220px) !important;
    padding-top: 0px !important;
	align-content:center;
	width:100% !important;
	height: 0 !important; 
	overflow: auto !important;
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
</style>
<style>
.img1 {
    position: absolute;
    z-index: +1
}
#overlay1 {
    position: absolute;
    width: 98%;
    height: 100%;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0,0,0,0);
    z-index: +2;
    cursor: pointer;
}
</style>

<?
if (!isset($_POST['id'])) {
	exit;
} else {
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	include_once("../../db_config.php");
	//include_once("../../session_browser.php");
	$ids 	= strip_tags($_POST['id']);
	$status = strip_tags($_POST['status']);
		$sqldisposisi 	= 
		"SELECT 
			id_ubah, status_peraturan_ubah, file_per_ubah 
		FROM 
			td_peraturan_bravo_detail 
		WHERE 
			id_ubah=:id_ubah AND 
			status_peraturan_ubah=:status_peraturan_ubah";
		$sql	=$pdoODBC->prepare($sqldisposisi);
		$sql->BindParam(':id_ubah',$ids);
		$sql->BindParam(':status_peraturan_ubah',$status);
		$sql->execute();
		$data_id = $sql->fetch();
		$file 	= "_UPLOAD_DATA/PERATURAN/".$data_id['file_per_ubah'];

	?>
    <div id="overlay"></div>
	<div class="iframe-container embed media">
            <object data='<?= $file?>' type="application/pdf" style="opacity:1.0" class="img1"></object>
    </div>
    
	<script type="text/javascript">
    	$(function () {
        	$('.media').media();
    	});
	</script>
<? }; ?>
<? }; ?>

