<?php
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
?>
<script type="text/javascript">
	function Edit_Photo_Gallery_Effect(Edit_ID)
	{
		jQuery('.JIT_IGallery_Main_Div1').fadeOut();
		jQuery('.JIT_IGallery_Main_Table').fadeOut();
		jQuery('.JIT_IGallery_Effect_Table').fadeOut();
		jQuery('.JIT_IGallery_Effect_Table1').fadeOut();
		jQuery('.Juna_IT_Image_Gallery_Setting_Image_Title_Label').fadeIn();
		jQuery('#Juna_IT_Image_Gallery_Setting_Image_Title').fadeIn();
		if(Edit_ID=='1')
		{
			jQuery('#Juna_IT_Image_Gallery_Setting_Image_Title').html('Lightbox Column Gallery');
		}else if(Edit_ID=='2'){
			jQuery('#Juna_IT_Image_Gallery_Setting_Image_Title').html('Block Style Photo Gallery');
		}else if(Edit_ID=='3'){
			jQuery('#Juna_IT_Image_Gallery_Setting_Image_Title').html('Fansy Photo Gallery');
		}else if(Edit_ID=='4'){
			jQuery('#Juna_IT_Image_Gallery_Setting_Image_Title').html('Random Gallery');
		}else if(Edit_ID=='5'){
			jQuery('#Juna_IT_Image_Gallery_Setting_Image_Title').html('Tumbnails Gallery');
		}else if(Edit_ID=='6'){
			jQuery('#Juna_IT_Image_Gallery_Setting_Image_Title').html('Tumbnails Gallery');
		}
		setTimeout(function(){
			jQuery('#JIT_PG_FVI_'+Edit_ID).fadeIn();
			jQuery('.JIT_IGallery_Main_Div2').fadeIn();
		},500)
	}
	function JIT_Photo_Gallery_Search()
	{

	}
	function JIT_Photo_Gallery_Reset()
	{

	}
	function JIT_Photo_Gallery_Cancel()
	{
		location.reload();
	}



</script>