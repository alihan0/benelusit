<?php
session_start();
include '../config.php';

if($_POST){
	$isim = $_POST['isim'];
	$tag = strtoupper( substr($isim,0,3) );

	?>


	<form>
        <div class="row">
        <input class="col-6" id="tag" type="text" placeholder="[<?=$tag?>]">
        <input class="col-6"  id="isim" type="text" value="<?=$isim?>"></div>
        <input type="text" id="slogan"  placeholder="Slogan">
        <br>
        

         <a id="takim-kur-btn" class="btn btn-info mt-5" href="javascript:void(0)"><i class="fas fa-plus-square"></i> Takım kur</a>

    </form>


<script type="text/javascript">
	$("#takim-kur-btn").on("click", function(){
		var tag = $("#tag").val();
		var isim = $("#isim").val();
		var slogan = $("#slogan").val();
		var user_id = <?=$_SESSION['uid']?>;


	$.ajax({
		type : 'POST',
		url  : 'core/takim-kur.php',
		data : {tag:tag, isim:isim, slogan:slogan, user_id:user_id},
		dataType : 'JSON',
		success: function(r){
			toastr[r.t](r.m);
                        if(r.ok){
                            $("#takimkur-modal").modal("hide");
                             setTimeout(function(){
                                 window.location.reload(1);
                                }, 2000);
                        }
		}
	})
	/*	


		$.ajax({
			type : 'POST',
			url  : '../core/takim-kur.php',
			data : {"test":"tesst"},
			dataType : 'JSON',
			success: function(r){
                        toastr[r.t](r.m);
                        if(r.ok){
                            $("#takimkur-modal").modal("hide");
                             setTimeout(function(){
                                 window.location.reload(1);
                                }, 2000);
                        }
		}); */
	})
</script>

	<?php


}else{
	echo "yetkisiz erişim.";
}