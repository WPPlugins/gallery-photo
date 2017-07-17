<?php
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
?>
<style type="text/css">
	.onoffswitch 
	{
   		position: relative; 
   		width: 80px;
		float:left;
		margin-top:5px;
		margin-left:5px;
    	-webkit-user-select:none;
    	-moz-user-select:none; 
    	-ms-user-select: none;
  	}
	.onoffswitch-checkbox 
	{
	    display: none !important;
	}
	.onoffswitch-label 
	{
	    display: block; 
	    overflow: hidden; 
	    cursor: pointer;
	    border: 1px solid #0073aa; 
	    border-radius: 15px;
	    height: 25px;
	}
	.onoffswitch-inner 
	{
	    display: block; 
	    width: 200%; 
	    margin-left: -100%;
	    transition: margin 0.3s ease-in 0s;
	}
	.onoffswitch-inner:before, .onoffswitch-inner:after 
	{
	    display: block; 
	    float: left; 
	    width: 50%; 
	    height: 25px; 
	    padding: 0; 
	    line-height: 25px;
	    font-size: 14px; 
	    color: white; 
	    font-family: 
	    Trebuchet, Arial, sans-serif; 
	    font-weight: bold;
	    box-sizing: border-box;
	}
	.onoffswitch-inner:before 
	{
	    content: "Yes";
	    padding-left: 10px;
	    background-color: #0073aa; 
	    color: #FFFFFF;
	}
	.onoffswitch-inner:after 
	{
	    content: "No";
	    padding-right: 10px;
	    background-color: #ffffff; 
	    color: #0073aa;
	    text-align: right;
	}
	.onoffswitch-switch 
	{
	    display: block; 
	    width: 18px; 
	    margin: 6px;
	    background: #0073aa;
	    position: absolute; 
	    top: 0; 
	    bottom: 0;
	    right: 45px;
	    border: 1px solid #999999; 
	    border-radius: 20px;
	    transition: all 0.3s ease-in 0s; 
	}
	.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner 
	{
	    margin-left: 0;
	}
	.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch 
	{
	    right: 0px; 
	    background: #ffffff;
	}
	
	
	input[type=range] 
	{
		-webkit-appearance: none;
		width: 50%;
		margin: 14px 5px;
	}
	input[type=range]:focus 
	{
		outline: none;
	}
	input[type=range]::-webkit-slider-runnable-track 
	{
		width: 100%;
		height: 6px;
		cursor: pointer;
		box-shadow: 2.1px 2.1px 15px #c0c0c0, 0px 0px 2.1px #cdcdcd;
		background: #0073aa;
		border-radius: 25px;
		border: 0px solid #010101;
	}
	input[type=range]::-webkit-slider-thumb 
	{
	  	box-shadow: 4.4px 4.4px 6px #c0c0c0, 0px 0px 4.4px #cdcdcd;
		border: 0px solid rgba(0, 0, 0, 0);
		height: 20px;
		width: 11px;
		border-radius: 50px;
		background: #ffffff;
		cursor: pointer;
		-webkit-appearance: none;
		margin-top: -7px;
	}
	input[type=range]:focus::-webkit-slider-runnable-track 
	{
	  	background: #0073aa;
	}
	input[type=range]::-moz-range-track 
	{
		width: 100%;
	  	height: 8.4px;
	  	cursor: pointer;
	  	box-shadow: 2.1px 2.1px 15px #c0c0c0, 0px 0px 2.1px #cdcdcd;
	  	background: #0073aa;
	  	border-radius: 25px;
	  	border: 0px solid #010101;
	}
	input[type=range]::-moz-range-thumb 
	{
	  	box-shadow: 4.4px 4.4px 6px #c0c0c0, 0px 0px 4.4px #cdcdcd;
	  	border: 0px solid rgba(0, 0, 0, 0);
	  	height: 29px;
	  	width: 11px;
	  	border-radius: 50px;
	  	background: #ffffff;
	  	cursor: pointer;
	}
	input[type=range]::-ms-track 
	{
	  	width: 100%;
	  	height: 8.4px;
	  	cursor: pointer;
	  	background: transparent;
	  	border-color: transparent;
	  	color: transparent;
	}
	input[type=range]::-ms-fill-lower 
	{
	  	background: #0073aa;
	  	border: 0px solid #010101;
	  	border-radius: 50px;
	  	box-shadow: 2.1px 2.1px 15px #c0c0c0, 0px 0px 2.1px #cdcdcd;
	}
	input[type=range]::-ms-fill-upper 
	{
	  	background: #0073aa;
	  	border: 0px solid #010101;
	  	border-radius: 50px;
	  	box-shadow: 2.1px 2.1px 15px #c0c0c0, 0px 0px 2.1px #cdcdcd;
	}
	input[type=range]::-ms-thumb 
	{
	  	box-shadow: 4.4px 4.4px 6px #c0c0c0, 0px 0px 4.4px #cdcdcd;
	  	border: 0px solid rgba(0, 0, 0, 0);
	  	height: 29px;
	  	width: 11px;
	  	border-radius: 50px;
	  	background: #ffffff;
	  	cursor: pointer;
	  	height: 8.4px;
	}
	input[type=range]:focus::-ms-fill-lower 
	{
	 	background: #0073aa;
	}
	input[type=range]:focus::-ms-fill-upper 
	{
	 	background: #0073aa;
	}


	.logo_link_right {
		display: inline-block;
		width: 120px;
		height: 65px;
		float:right;
		margin-top: 5px;
		margin-right: 5px;
	}
	.Juna_IT_Image_Gallery_Prop_Div_Main_opt {
		position: relative;
		margin-top: 30px;
		min-height: 120px;
		width: 97%;
		border-radius: 25px 25px 0px 0px;
		background-color: #0073aa;
		padding: 5px;
	}
	.JIT_IGallery_Main_Div1,.JIT_IGallery_Main_Div2{
		margin-top:85px;
		min-height:10px;
		overflow:auto;
	}
	.JIT_IGallery_Main_Div2{
		display:none;
	}
	.JIT_IGallery_Title_Span{
		color:#fff;
		font-family:Gabriola;
		font-size:25px;
		margin-left:5px;
		margin-bottom:15px;
	}
	.JIT_IGallery_search_text {
		height: 25px;
		margin-top: -10px;
		border-radius: 3px;
		margin-bottom:15px;
	}
	.JIT_IGallery_Reset_text {
		width: 100px;
		background-color: #0073aa;
		color: white;
		border: 2px solid #0073aa;
		border-radius: 3px;
		box-shadow: 0px 0px 30px white;
		margin-left: 5px;
		margin-bottom:15px;
		cursor: pointer;
	}
	.JIT_IGallery_not {
		color: white;
		font-family: Gabriola;
		font-size: 25px;
		margin-left: 15px;
	}
	.JIT_IGallery_Add_Button {
		cursor: pointer;
		width: 120px;
		background-color: #0073aa;
		color: #f68935;
		border: 1px solid #f68935;
		border-radius: 3px;
		box-shadow: 0px 0px 30px #f68935;
		margin-right: 5px;
		float: right;
	}
	.JIT_IGallery_Main_Table,.JIT_IGallery_Effect_Table,.JIT_IGallery_Effect_Table1 {
		width: 98.5%;
		margin: 15px 0 0 0;
		height: 40px;
		border: 1px solid #0073aa;
		border-radius: 5px;
		padding: 2px;
	}
	.JIT_IGallery_Effect_Table1{
		display:none;
	}
	.JIT_IGallery_Effect_Table,.JIT_IGallery_Effect_Table1{
		background:#c0c0c0;
		margin-top:5px !important;
	}
	.JIT_IGallery_Effect_Table tr:nth-child(odd), .JIT_IGallery_Effect_Table1 tr:nth-child(odd) {
		background: #f0f0f0 !important;
		color: #717171;
		text-align: center;
		font-size: 14px;
		height: 30px;
	}
	.JIT_IGallery_Effect_Table tr:nth-child(even), .JIT_IGallery_Effect_Table1 tr:nth-child(even) {
		background: #e4e3e3 !important;
		color: #717171;
		text-align: center;
		font-size: 14px;
		height: 30px;
	}
	.JIT_IGallery_first_row {
		background: #0073aa !important;
		color: white;
		text-align: center;
		font-family: Gabriola;
		font-size: 20px;
	}
	.JIT_IGallery_main_id_item, .JIT_IGallery_id_item {
		width: 5%;
	}
	.JIT_IGallery_main_title_item, .JIT_IGallery_title_item {
		width: 35%;
	}
	.JIT_IGallery_main_effect_item, .JIT_IGallery_effect_item {
		width: 30%;
	}
	.JIT_IGallery_main_actions_item {
		width: 30%;
	}
	.JIT_IGallery_edit_item, .JIT_IGallery_delete_item {
		width: 15%;
		text-decoration: underline;
		color: #b12201;
		cursor:pointer;
	}
	
	.Juna_IT_Image_Gallery_Setting_Image_Title_Label
	{
		position:absolute;
		font-family: Gabriola;
		font-size: 25px;
		color: white;
		margin-left: 15px;
		margin-top:10px;
		top:5px;
		display:none;
	}	
	#Juna_IT_Image_Gallery_Setting_Image_Title
	{
		position:absolute;
		top:15px;
		left:175px;
		width: 250px;
		line-height:30px
		background-color: #0073aa;
		border:none;
		color:white;
		font-family: Gabriola;
		font-size: 25px;
		margin-left: 15px;
		display:none;
	}
	.Juna_IT_Image_Gallery_Prop_Save{
		float: right;
		width: 120px;
		background-color: #0073aa;
		color: #f68935;
		border: 1px solid #f68935;
		border-radius: 3px;
		box-shadow: 0px 0px 30px #f68935;
		cursor: pointer;
		margin-right: 20px;
		
	}
	.JIT_IGallery_Main_Fieldset1
	{
		border:1px solid #0073aa;
		border-radius:10px;
		background-color: #ffffff;
		margin-top: 15px;
		width: 795px;
		padding: 5px;
		display: none;
	}
	.JIT_IGallery_Table_Type
	{
		width: 100%;
	}
	.JIT_IGallery_Table_Type tr:nth-child(odd)
	{
		background-color: #edecec;
		text-align: center;
		font-size: 14px;
		font-family: Consolas;
	}
	.JIT_IGallery_Table_Type tr:nth-child(even)
	{
		background-color: #f5f5f5;
		text-align: center;
	}
	.JIT_IGallery_Table_Type td:nth-child(1)
	{
		width: 50%;
	}
	.JIT_IGallery_Table_Type td:nth-child(2)
	{
		width: 50%;
	}
	.JIT_IGallery_EN
	{
		height: 25px;
		border-radius: 3px;
		width: 200px;
	}
	
	
	
	
	
	
	
	
	

	.Juna_IT_Image_Gallery_Prop_Div_Main{
		position:relative;
		margin-top: 30px;
		min-height: 100px;
		width: 97%;
		border-radius: 25px 25px 0px 0px;
		background-color: #0073aa;
		padding: 5px;
	}
	.logo_link{
		display:inline-block;
		width:120px;
		height:65px;
		margin-top:5px;
		margin-left:5px;
	}
	.Juna_IT_Logo_Orange_Image{
		width:100%;
		height:100%
	}
	#Juna_IT_Image_Gallery_Setting_Image_Title{
		
		color:#fff;
		font-family:Gabriola;
		font-size:25px;
	}
	#Juna_IT_Image_Gallery_Setting_Image_Title2{
		
		color:#fff;
		font-family:Gabriola;
		font-size:25px;
	}
	#Content_Image_Title{
		position:absolute;
		top:15px;
		right:15px;
		width:300px;
		text-align:right;
	}
	
	
	.JIT_PG_FVI
	{
		margin-top: 10px;
		width: 60%;
		display: none;
	}
	.JIT_VGallery_Button_Div
	{
		margin-top: 15px;
		border-radius: 5px;
		text-align: center;
		padding: 5px;
		width: 99%;
		background-color: #f68935;
	}
	.JIT_VGallery_Full_Version_Image
	{
		height: 50px;
		width: 250px;
		background-image: url("<?php echo plugins_url('../Images/full-version.png',__FILE__);?>");
		background-size: 250px 50px;
		background-repeat: no-repeat;
		background-position: center;
		margin: 0 auto;
		transition-duration:1s; 
	}
	.JIT_VGallery_Full_Version_Image:hover
	{
		background-image: url("<?php echo plugins_url('../Images/full-version-1.png',__FILE__);?>");
	}
	
	
	
	
	@media all and (max-width:600px){
	
		.Juna_IT_Image_Gallery_Setting_Image_Title_Label{
			top:50px;
			font-size:18px;
		}
		#Juna_IT_Image_Gallery_Setting_Image_Title{
			top:60px;
			font-size:18px;
			left:130px;
		}
		.logo_link_right{
			width:100px;
			height:45px;
		}
		.JIT_IGallery_Main_Fieldset1{
			width:321px !important;
		}
		
		.JIT_IGallery_EN {
			width: 180px;
		}
	}
	
</style>