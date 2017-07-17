<?php
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
?>
<style type="text/css">
	#modal_photo{
		position:fixed;
		top: 0;
		right: 0;
		bottom: 0;
		left: 0;
		z-index: 1050;
		background:rgba(0,0,0,0.7);
		display:none;
		overflow:hidden;
	}
	#modal_content_photo{
		position:relative;
		margin-top:20px;
		margin-left:auto;
		margin-right:auto;
		width:600px;
		height:570px;
		z-index:9999;
	}
	#modal_content_absolute_photo{
		position:absolute;
		top:0px;
		left:0px;
		width:100%;
		height:100%;
		background:#fff;
		border-radius:5px;
	}
	#modal_content_header_photo{
		padding:20px;
		background-color: #0073aa;
		text-align:center;
		color:#fff;
		border-radius:5px 5px 0px 0px;
		font-family:Gabriola;
		font-size:35px;
	}
	#image_content_photo{
		padding:20px;
   
	}
	.img_title_title_photo,.img_link_photo{
		display: block;
		width: 100%;
		height: 34px;
		padding: 6px 12px;
		font-size: 14px;
		line-height: 1.42857143;
		color: #555;
		background-color: #fff;
		background-image: none;
		border: 1px solid #ccc;
		border-radius: 4px;
		
	}
	.img_description_photo{
		display: block;
		width: 100%;
		height: 64px;
		padding: 6px 12px;
		font-size: 14px;
		line-height: 1.42857143;
		color: #555;
		background-color: #fff;
		background-image: none;
		border: 1px solid #ccc;
		border-radius: 4px;
	}
	.NewTabYesPhoto,.NewTabNoPhoto{
		margin-left:5px;
		margin-right:5px;
		font-size:20px;
		color:#999;
		cursor:pointer;
	}
	.NewTabYes2Photo,.NewTabNo2Photo{
		margin-left:5px;
		margin-right:5px;
		font-size:20px;
		color:#999;
		cursor:pointer;
	}
	.label_photo{
		color:#0073aa;
		font-size:18px;
		font-family:Gabriola;
	}
	#uplPhoto{
		text-align:center;
		padding:20px;
	}
	
	hr{
		height:5px !important;
		background:#0073aa !important;
	}
	
	.upload_img_photo{
		width:100%;
		border-radius:4px;
	}
	
	
	.cansel_but_photo{
		float:left;
		color: #fff;
		background-color: #d9534f;
		border-color: #d43f3a;
		display: inline-block;
		padding: 6px 12px;
		margin-bottom: 0;
		font-size: 14px;
		font-weight: 400;
		line-height: 1.42857143;
		text-align: center;
		white-space: nowrap;
		vertical-align: middle;
		background-image: none;
		border: 1px solid transparent;
		border-radius: 4px;
		cursor:pointer;
		margin-left:20px;
	}
	.cansel_but_photo:hover{
		color: #fff;
		background-color: #c9302c;
		border-color: #ac2925;
	}
	.save_but_photo{
		float:right;
		color: #fff;
		background-color: #337ab7;
		border-color: #2e6da4;
		display: inline-block;
		padding: 6px 12px;
		margin-bottom: 0;
		font-size: 14px;
		font-weight: 400;
		line-height: 1.42857143;
		text-align: center;
		white-space: nowrap;
		vertical-align: middle;
		background-image: none;
		border: 1px solid transparent;
		border-radius: 4px;
		cursor:pointer;
		margin-right:20px;
	}
	.save_but_photo:hover{
		color: #fff;
		background-color: #286090;
		border-color: #204d74;
	}

	#bigContPhoto{
		margin-top:30px;
		width:98%;
		
	}
	.Juna_IT_Photo_Gallery_Content{
		position: relative;
		margin-top: 30px;
		width: 99%;
		min-height: 120px;
		background-color: #0073aa;
		border-radius: 10px;
		padding: 5px;
	}
	.Juna_IT_Logo_Orange_Photo_Gallery{
		width:130px;
		height:80px;
	}
	.Photo_Title_Span{
		color: white;
		margin-left: 25px;
		font-size: 25px;
		font-family: Gabriola;
	}
	.photo_title_text_field{
		height: 25px;
		margin-top: -10px;
		border-radius: 3px;
	}
	.image_search_text_field_photo{
		height: 25px;
		margin-top: -10px;
		border-radius: 3px;
	}
	.Reset_but_photo{
		width: 100px;
		background-color: #0073aa;
		color: white;
		border: 2px solid #0073aa;
		border-radius: 3px;
		box-shadow: 0px 0px 30px white;
		margin-left: 5px;
		cursor: pointer;
	}
	#Photo_url{
		border-radius:4px;
	}
	
	.Add_Image_button_photo{
		cursor: pointer;
		width: 120px;
		background-color: #0073aa;
		color: #f68935;
		border: 2px solid #f68935;
		border-radius: 3px;
		box-shadow: 0px 0px 30px #f68935;
		margin-right: 25px;
		margin-top: -5px;
		float: right;
	}
	.Add_new_Photo_Gallery_Save_button,.Add_new_Photo_Gallery_Cansel_button,.Add_new_Photo_Gallery_Update_button{
		cursor: pointer;
		width: 70px;
		background-color: #0073aa;
		color: #f68935;
		border: 2px solid #f68935;
		border-radius: 3px;
		box-shadow: 0px 0px 30px #f68935;
		margin-right: 25px;
		margin-top: -15px;
		float: right;
	}
	.searched_image_gallery_does_not_exist_photo{
		color: white;
		font-family: Gabriola;
		font-size: 25px;
		margin-left: 15px;
		
	}
	.Image_Main_Table_Photo{
		width: 100%;
		margin: 15px 0 0 0;
		height: 40px;
		border: 1px solid #0073aa;
		border-radius: 5px;
		padding: 2px;
	}
	.first_row_photo{
		background: #0073aa !important;
		color: white;
		text-align: center;
		font-family: Gabriola;
		font-size: 20px;
	}
	.Images_Table_Photo,.Images_Table1_Photo{
		width: 100%;
		padding: 2px;
		border: 1px solid #0073aa;
		border-radius: 5px;
		margin-top: 1px;
		background-color: #c0c0c0;
	}
	.Images_Table_Photo tr:nth-child(odd), .Images_Table1_Photo tr:nth-child(odd){
		background: #f0f0f0 !important;
		color: #717171;
		text-align: center;
		font-size: 14px;
		height: 30px;
	}
	.Images_Table_Photo tr:nth-child(even),.Images_Table1_Photo tr:nth-child(even){
		background: #e4e3e3 !important;
		color: #717171;
		text-align: center;
		font-size: 14px;
		height: 30px;
	}
	.image_id_item_photo,.image_main_id_item_photo{
		width:5%;
	}
	.image_title_item_photo,.image_main_title_item_photo{
		width:25%;
	}
	.image_quantity_item_photo,.image_main_quantity_item_photo{
		width:10%;
	}
	.image_type_item_photo,.image_main_type_item_photo{
		width:20%;
	}
	.image_views_item_photo,.image_main_views_item_photo{
		width:25%;
	}
	.image_main_actions_item_photo{
		width:15%;
	}
	.image_edit_item_photo{
		width:7%;
	}
	.image_delete_item_photo{
		width:8%;
	}
	
	.image_edit_item_photo,.image_delete_item_photo{
		text-decoration: underline;
		color: #b12201;
		cursor:pointer;
	}
	.image_edit_item_photo:hover{
		color:#f68935 !important;
	}
	.image_delete_item_photo:hover{
		color:#000;
	}
	
	
	
	
	#bigCont2_photo{
		margin-top:30px;
		width:98%;
		display:none;
	}
	
	.Juna_IT_Photo_Gallery_Sub1_Page3{
		border:1px solid #0073aa; 
		margin-top:15px;
		background-color:#ffffff;
		border-radius:10px; 
		padding:5px;
		width: 1020px;
	}
	.Juna_IT_Photo_Gallery_Sub1_Page3_Table
	{
		width: 1010px;
	}
	.Juna_IT_Photo_Gallery_Sub1_Page3_Table tr:nth-child(odd)
	{
		background-color: #edecec;
		text-align: center;
		font-size: 14px;
		font-family: Consolas;
	}
	.Juna_IT_Photo_Gallery_Sub1_Page3_Table tr:nth-child(even)
	{
		background-color: #f5f5f5;
		text-align: center;
	}
	.Juna_IT_Photo_Gallery_Sub1_Page3_Table td:nth-child(1)
	{
		width: 40%;
	}
	.Juna_IT_Photo_Gallery_Sub1_Page3_Table td:nth-child(2), .Juna_IT_Photo_Gallery_Sub1_Page3_Table td:nth-child(3)
	{
		width: 30%;
	}
	.Add_New_Photo_Gallery
	{
		margin-top: 20px;
		border-radius: 15px;
		border: 1px solid #0073aa;
		padding: 0 15px 15px 15px;
		width: 1000px; 
		background-color: #ffffff;
		
	}
	#Juna_IT_Photo_Gallery_Ul li
	{
		cursor: all-scroll;
		
	}
	#Juna_IT_Photo_Gallery_Ul li:nth-child(even)
	{
		background-color: #f5f5f5;
		height:240px;
	}
	#Juna_IT_Photo_Gallery_Ul li:nth-child(odd)
	{
		background-color: #edecec;
		height:240px;
	}
	#Juna_IT_Photo_Gallery_Ul li:hover .Juna_IT_Photo_Gallery_Table
	{
		border-right: 1px dotted #0073aa;
	}
	.photo_description_div
	{
		float:right;
		width: 680px;
		height: 222px;
	}
	.Juna_IT_Photo_Gallery_type_text
	{
		width: 99%;
	}
	.Juna_IT_Photo_Gallery_textarea
	{
		width: 99%;
		resize: none;
	}
	.image_photo_div
	{
		width:300px;
		border:1px solid #e4e3e3;
	}	
	.Juna_IT_Photo_Gallery_Remove_Button_Div
	{
		height:20px;
		width:100%;
	}
	.Juna_IT_Photo_Gallery_Remove_Button_Div:hover
	{
		height: 100%;
		opacity: 1;
	}
	.Juna_IT_Photo_Gallery_Image
	{
		cursor: pointer;
		opacity: 0.3;
		transition-duration:1s;
	}
	.Juna_IT_Photo_Gallery_Image:hover
	{
		opacity: 1;
	}
	.Juna_IT_Photo_Gallery_Table {
		height: 95%;
		width: 100%;
		position: relative;
		transition-duration: 0.1s;
		border-right: 1px dotted #ffffff;
	}
	.Juna_IT_Photo_Gallery_Table td:nth-child(odd) {
		width: 30%;
		text-align: center;
		font-size: 15px;
		color: #0073aa;
	}
	.Juna_IT_Photo_Gallery_Table td:nth-child(even) {
		width: 70%;
	}
	.Image_Title_Span_Photo{
		color: white;
		margin-left: 25px;
		font-size: 25px;
		font-family: Gabriola;
	}
	
	.del_aicon_photo{
		position:absolute;
		width:15px;
		height:15px;
		top:-5px;
		right:-5px;
		cursor:pointer;
	}
	#add_image_gallery_photo{
		position:relative;
		height:204px;
		border:3px dashed #0073aa;;
		width: 1025px;
		margin-top:20px;
		border-radius:10px;
	}
	#add_icon_photo{
		position:relative;
		width:15.5%;
		text-align:center;
		top:50%;
		transform:translateY(-50%);
		margin-left:auto;
		margin-right:auto;
		cursor:pointer;
	}
	
	#add_photo{
		position:relative;
		width:80px;
		height:80px;
		
		
		margin-left:auto;
		margin-right:auto;
	}
	#add_photo>.front_photo{
		position:absolute;
		transform:perspective(600px) rotateY(0deg);
		background:#cdcdcd;
		color:white;
		width:100%;
		height:100%;
		cursor:pointer;
		border-radius:50%;
		backface-visibility:hidden;
		transition:transform .5s linear 0s;
	}
	#add_photo>.back_photo{
		position:absolute;
		transform:perspective(600px) rotateY(180deg);
		background:#0073aa;
		color:white;
		width:100%;
		height:100%;
		cursor:pointer;
		border-radius:50%;
		backface-visibility:hidden;
		transition:transform .5s linear 0s;
	}
	.back_photo,.front_photo{
		position:relative;
	}
	
	.back_photo>span{
		width:70px;
		font-size:100px;
		position:relative;
		top:33%;
	}
	.front_photo>span{
		width:70px;
		font-size:100px;
		position:relative;
		top:33%;
	
	}
	
	#add_photo:hover > .front_photo{
		transform:perspective(600px) rotateY(-180deg);
	}
	#add_photo:hover > .back_photo{
		transform:perspective(600px) rotateY(0deg);
	}
	
	.info_photo{
		position:relative;
		display:inline-block;
		padding:5px 24px;
		
		color:#fff !important;
		text-decoration:none;
		text-transform:uppercase;
		
	}
	.info_photo:before{
		position:absolute;
		content:"";
		width:0px;
		height:100%;
		right:0px;
		top:0px;
		background:#0073aa;
		z-index:-1;
		transition:all 0.5s;
	}
	.info_photo:after{
		position:absolute;
		content:"";
		width:100%;
		height:100%;
		left:0px;
		top:0px;
		background:#cdcdcd;
		z-index:-2;
	}
	.info_photo:hover:before{
		width:100%;
		left:0px;
		color:#fff !important;
	}
	#add_icon_photo:hover .front_photo{
		transform:perspective(600px) rotateY(-180deg) !important;
	}
	
	#add_icon_photo:hover .back_photo{
		transform:perspective(600px) rotateY(0deg) !important;
	}
	#add_icon_photo:hover .info_photo:before{
		width:100%;
		left:0px;
		color:#fff !important;
	}
	.JIT_VGallery_Short_Table
	{
		width: 100%;
		text-align: center;
		color:#ffffff;
		font-style: bold;
		font-weight: 900;
	}
	.JIT_VGallery_Short_Table td:nth-child(1)
	{
		width: 20%;
		padding: 5px;
		background-color: #0073aa;
	}
	.JIT_VGallery_Short_Table td:nth-child(2)
	{
		width: 40%;
		padding: 5px;
		background-color: #0073aa;
	}
	.JIT_VGallery_Short_Table td:nth-child(3)
	{
		width: 40%;
		padding: 5px;
		background-color: #0073aa;
	}
</style>
