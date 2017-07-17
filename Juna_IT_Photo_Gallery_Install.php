<?php
	global $wpdb;
	$table_name  = $wpdb->prefix . "juna_it_photo_gallery_manager";
	$table_name1 = $wpdb->prefix . "juna_it_instal_photo_gallery";
	$table_name2 = $wpdb->prefix . "juna_it_instal_link_photo_gallery";
	$table_name3 = $wpdb->prefix . "juna_it_photo_font_family";
	$table_name4 = $wpdb->prefix . "juna_it_photo_effects_data";
	$table_name5 = $wpdb->prefix . "juna_it_photo_effects_1";
	$table_name6 = $wpdb->prefix . "juna_it_photo_effects_2";
	$table_name7 = $wpdb->prefix . "juna_it_photo_effects_3";
	$table_name8 = $wpdb->prefix . "juna_it_photo_effects_4";
	$table_name9 = $wpdb->prefix . "juna_it_photo_effects_5";
	
	
	if( $wpdb->get_var('SHOW TABLES LIKE' . $table_name) != $table_name )
	{
		$sql='CREATE TABLE IF NOT EXISTS ' .$table_name.' (
			id INTEGER(10) UNSIGNED AUTO_INCREMENT,
			gallery_title VARCHAR(255) NOT NULL,
			gallery_type VARCHAR(255) NOT NULL,
			Juna_IT_Photo_Gallery_Show_Image_Type VARCHAR(255) NOT NULL,
			Juna_IT_Photo_Gallery_Images_Quantity INTEGER(10) NOT NULL,
			PRIMARY KEY (id))';

		$sql1='CREATE TABLE IF NOT EXISTS ' .$table_name1.' (
			id INTEGER(10) UNSIGNED AUTO_INCREMENT,
			image_title VARCHAR(255) NOT NULL,
			image_description LONGTEXT NOT NULL,
			image_url VARCHAR(255) NOT NULL,
			gallery_number INTEGER(10) NOT NULL,
			image_order_by INTEGER(10) NOT NULL,
			PRIMARY KEY (id))';
			
		$sql2='CREATE TABLE IF NOT EXISTS ' .$table_name2.' (
			id INTEGER(10) UNSIGNED AUTO_INCREMENT,
			Link_URL VARCHAR(255) NOT NULL,
			image_ONT VARCHAR(255) NOT NULL,
			gallery_number INTEGER(10) NOT NULL,
			link_order_by INTEGER(10) NOT NULL,
			PRIMARY KEY (id))';
			
		$sql4 = 'CREATE TABLE IF NOT EXISTS ' .$table_name4 . '(
			id INTEGER(10) UNSIGNED AUTO_INCREMENT,
			effect_name VARCHAR(255) NOT NULL, 
			effect_type VARCHAR(255) NOT NULL,
			PRIMARY KEY (id))';
		
		$sql5='CREATE TABLE IF NOT EXISTS ' .$table_name5.' (
			id INTEGER(10) UNSIGNED AUTO_INCREMENT,
			Juna_IT_LCG_Image_Round_Bg_Color VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Image_Round_Border_Width VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Image_Round_Border_Style VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Image_Round_Border_Color VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Image_Round_Border_Radius VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Image_Round_Box_Shadow VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Image_Round_Shadow_Color VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Image_Round_Padding VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Image_Round_Hover_Rotate_Show VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Image_Round_Hover_Shadow_Show VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Image_Round_Hover_Zoom_Show VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Image_Border_Width VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Image_Border_Style VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Image_Border_Color VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Image_Border_Radius VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Image_Hover_Transparency VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Title_Color VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Title_Text_Shadow VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Title_Font_Size VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Title_Font_Family VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Title_Text_Align VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Title_Border_Style VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Title_Border_Width VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Title_Border_Color VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Title_Descrp_Color VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Title_Descrp_Font_Size VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Title_Descrp_Font_Family VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Title_Descrp_Text_Align VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Link_Color VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Link_Font_Size VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Link_Font_Family VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Pop_Effect_Type VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Pop_Div_Color VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Pop_Div_Transparency VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Pop_Content_Width VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Pop_Title_Font_Size VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Pop_Title_Font_Family VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Pop_Title_Color VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Pop_Title_Text_Align VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Pop_Title_Border_Color VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Pop_Title_Border_Style VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Pop_Title_Border_Width VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Pop_Desc_Show VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Pop_Desc_Bg_Color VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Pop_Desc_Color VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Pop_Desc_Font_Size VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Pop_Desc_Font_Family VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Pop_Desc_Text_Align VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Slider_Autoplay_Show VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Slider_Pause_Time VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Slider_Icon_Size VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Del_Icon_Size VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Del_Icon_Color VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Slider_Icon_Type VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Del_Icon_Type VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Link_Text VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Page_Icon_Size VARCHAR(255) NOT NULL,
			Juna_IT_LCG_Page_Icon_Color VARCHAR(255) NOT NULL,
			Juna_IT_Image_Gallery_TN_Id VARCHAR(255) NOT NULL,
			PRIMARY KEY (id))';	
			
		$sql6='CREATE TABLE IF NOT EXISTS ' .$table_name6.' (
			id INTEGER(10) UNSIGNED AUTO_INCREMENT,
			Juna_IT_BS_Image_Height_Show VARCHAR(255) NOT NULL,
			Juna_IT_BS_Image_Height VARCHAR(255) NOT NULL,
			Juna_IT_BS_Image_Border_Width VARCHAR(255) NOT NULL,
			Juna_IT_BS_Image_Border_Style VARCHAR(255) NOT NULL,
			Juna_IT_BS_Image_Border_Color VARCHAR(255) NOT NULL,
			Juna_IT_BS_Image_Box_Shadow VARCHAR(255) NOT NULL,
			Juna_IT_BS_Image_Shadow_Color VARCHAR(255) NOT NULL,
			Juna_IT_BS_Image_Place_Between_Imgs VARCHAR(255) NOT NULL,
			Juna_IT_BS_Text_Content_Width VARCHAR(255) NOT NULL,
			Juna_IT_BS_Text_Content_Position VARCHAR(255) NOT NULL,
			Juna_IT_BS_Text_Content_Bg_Color VARCHAR(255) NOT NULL,
			Juna_IT_BS_Text_Content_Transparency VARCHAR(255) NOT NULL,
			Juna_IT_BS_Title_Font_Size VARCHAR(255) NOT NULL,
			Juna_IT_BS_Title_Font_Family VARCHAR(255) NOT NULL,
			Juna_IT_BS_Title_Color VARCHAR(255) NOT NULL,
			Juna_IT_BS_Title_Text_Shadow VARCHAR(255) NOT NULL,
			Juna_IT_BS_Title_Text_Align VARCHAR(255) NOT NULL,
			Juna_IT_BS_Title_Border_Width VARCHAR(255) NOT NULL,
			Juna_IT_BS_Title_Border_Color VARCHAR(255) NOT NULL,
			Juna_IT_BS_Title_Border_Style VARCHAR(255) NOT NULL,
			Juna_IT_BS_Desc_Font_Size VARCHAR(255) NOT NULL,
			Juna_IT_BS_Desc_Font_Family VARCHAR(255) NOT NULL,
			Juna_IT_BS_Desc_Color VARCHAR(255) NOT NULL,
			Juna_IT_BS_Desc_Texyt_Align VARCHAR(255) NOT NULL,
			Juna_IT_BS_Link_Font_Size VARCHAR(255) NOT NULL,
			Juna_IT_BS_Link_Font_Family VARCHAR(255) NOT NULL,
			Juna_IT_BS_Link_Color VARCHAR(255) NOT NULL,
			Juna_IT_BS_Link_Text VARCHAR(255) NOT NULL,
			Juna_IT_BS_Link_Border_Width VARCHAR(255) NOT NULL,
			Juna_IT_BS_Link_Border_Style VARCHAR(255) NOT NULL,
			Juna_IT_BS_Link_Border_Color VARCHAR(255) NOT NULL,
			Juna_IT_BS_Link_Border_Radius VARCHAR(255) NOT NULL,
			Juna_IT_BS_Pag_Icon_Size VARCHAR(255) NOT NULL,
			Juna_IT_BS_Pag_Icon_Color VARCHAR(255) NOT NULL,
			Juna_IT_Image_Gallery_TN_Id VARCHAR(255) NOT NULL,
			PRIMARY KEY (id))';	
			
		$sql7='CREATE TABLE IF NOT EXISTS ' .$table_name7.' (
			id INTEGER(10) UNSIGNED AUTO_INCREMENT,
			Juna_IT_FPG_Content_Hover_BG_Color VARCHAR(255) NOT NULL,
			Juna_IT_FPG_Content_Hover_BG_Op VARCHAR(255) NOT NULL,
			Juna_IT_FPG_Round_Bg_Color VARCHAR(255) NOT NULL,
			Juna_IT_FPG_Round_Max_Width VARCHAR(255) NOT NULL,
			Juna_IT_FPG_Round_Border_Width VARCHAR(255) NOT NULL,
			Juna_IT_FPG_Round_Border_Style VARCHAR(255) NOT NULL,
			Juna_IT_FPG_Round_Border_Color VARCHAR(255) NOT NULL,
			Juna_IT_FPG_Round_Box_Shadow VARCHAR(255) NOT NULL,
			Juna_IT_FPG_Round_Shadow_Color VARCHAR(255) NOT NULL,
			Juna_IT_FPG_Round_Border_Radius VARCHAR(255) NOT NULL,
			Juna_IT_FPG_Round_Padding VARCHAR(255) NOT NULL,
			Juna_IT_FPG_Round_Place_Between_Rounds VARCHAR(255) NOT NULL,
			Juna_IT_FPG_Title_Font_Siaze VARCHAR(255) NOT NULL,
			Juna_IT_FPG_Title_Font_Family VARCHAR(255) NOT NULL,
			Juna_IT_FPG_Title_Color VARCHAR(255) NOT NULL,
			Juna_IT_FPG_Title_Text_Shadow VARCHAR(255) NOT NULL,
			Juna_IT_FPG_Title_Shadow_Color VARCHAR(255) NOT NULL,
			Juna_IT_FPG_Img_Border_Width VARCHAR(255) NOT NULL,
			Juna_IT_FPG_Img_Border_Color VARCHAR(255) NOT NULL,
			Juna_IT_FPG_Img_Border_Radius VARCHAR(255) NOT NULL,
			Juna_IT_FPG_Img_Box_Shadow VARCHAR(255) NOT NULL,
			Juna_IT_FPG_Img_Shadow_Color VARCHAR(255) NOT NULL,
			Juna_IT_FPG_Desc_Show VARCHAR(255) NOT NULL,
			Juna_IT_FPG_Desc_Font_Size VARCHAR(255) NOT NULL,
			Juna_IT_FPG_Desc_Color VARCHAR(255) NOT NULL,
			Juna_IT_FPG_Desc_Font_Family VARCHAR(255) NOT NULL,
			Juna_IT_FPG_Link_Font_Size VARCHAR(255) NOT NULL,
			Juna_IT_FPG_Link_Font_Family VARCHAR(255) NOT NULL,
			Juna_IT_FPG_Link_Color VARCHAR(255) NOT NULL,
			Juna_IT_FPG_Link_Border_Width VARCHAR(255) NOT NULL,
			Juna_IT_FPG_Link_Border_Color VARCHAR(255) NOT NULL,
			Juna_IT_FPG_Link_Border_Style VARCHAR(255) NOT NULL,
			Juna_IT_FPG_Link_Border_Radius VARCHAR(255) NOT NULL,
			Juna_IT_FPG_Pag_Size VARCHAR(255) NOT NULL,
			Juna_IT_FPG_Pag_Color VARCHAR(255) NOT NULL,
			Juna_IT_FPG_Link_Text VARCHAR(255) NOT NULL,
			Juna_IT_Image_Gallery_TN_Id VARCHAR(255) NOT NULL,
			PRIMARY KEY (id))';	
			
		$sql8='CREATE TABLE IF NOT EXISTS ' .$table_name8.' (
			id INTEGER(10) UNSIGNED AUTO_INCREMENT,
			Juna_IT_RG_Content_Bg_Color VARCHAR(255) NOT NULL,
			Juna_IT_RG_Content_Border_Width VARCHAR(255) NOT NULL,
			Juna_IT_RG_Content_Border_Color VARCHAR(255) NOT NULL,
			Juna_IT_RG_Content_Border_Style VARCHAR(255) NOT NULL,
			Juna_IT_RG_Content_Box_Shadow VARCHAR(255) NOT NULL,
			Juna_IT_RG_Content_Shadow_Color VARCHAR(255) NOT NULL,
			Juna_IT_RG_Popup_Background VARCHAR(255) NOT NULL,
			Juna_IT_RG_Popup_Border_Width VARCHAR(255) NOT NULL,
			Juna_IT_RG_Popup_Border_Color VARCHAR(255) NOT NULL,
			Juna_IT_RG_Popup_Border_Style VARCHAR(255) NOT NULL,
			Juna_IT_RG_Popup_Box_Shadow VARCHAR(255) NOT NULL,
			Juna_IT_RG_Popup_Shadow_Color VARCHAR(255) NOT NULL,
			Juna_IT_RG_Popup_Img_Border_Width VARCHAR(255) NOT NULL,
			Juna_IT_RG_Popup_Img_Border_Color VARCHAR(255) NOT NULL,
			Juna_IT_RG_Popup_Img_Border_Style VARCHAR(255) NOT NULL,
			Juna_IT_RG_Popup_Img_Box_Shadow VARCHAR(255) NOT NULL,
			Juna_IT_RG_Popup_Img_Shadow_Color VARCHAR(255) NOT NULL,
			Juna_IT_RG_Popup_Img_Border_Radius VARCHAR(255) NOT NULL,
			Juna_IT_RG_Desc_Show VARCHAR(255) NOT NULL,
			Juna_IT_RG_Desc_Color VARCHAR(255) NOT NULL,
			Juna_IT_RG_Desc_Font_Size VARCHAR(255) NOT NULL,
			Juna_IT_RG_Desc_Font_Family VARCHAR(255) NOT NULL,
			Juna_IT_RG_Desc_Text_Align VARCHAR(255) NOT NULL,
			Juna_IT_RG_Image_Width VARCHAR(255) NOT NULL,
			Juna_IT_RG_Image_Height VARCHAR(255) NOT NULL,
			Juna_IT_RG_Image_Border_Width VARCHAR(255) NOT NULL,
			Juna_IT_RG_Image_Border_Color VARCHAR(255) NOT NULL,
			Juna_IT_RG_Image_Border_Style VARCHAR(255) NOT NULL,
			Juna_IT_RG_Image_Border_Radius VARCHAR(255) NOT NULL,
			Juna_IT_RG_Image_Place_Between_Images VARCHAR(255) NOT NULL,
			Juna_IT_RG_Image_Box_Shadow VARCHAR(255) NOT NULL,
			Juna_IT_RG_Image_Shadow_Color VARCHAR(255) NOT NULL,
			Juna_IT_RG_Image_Hover_Bg_color VARCHAR(255) NOT NULL,
			Juna_IT_RG_Image_Hover_Transparensy VARCHAR(255) NOT NULL,
			Juna_IT_RG_Image_Hover_Effect_Type VARCHAR(255) NOT NULL,
			Juna_IT_RG_Image_Hover_Text_Effect_Type VARCHAR(255) NOT NULL,
			Juna_IT_RG_Title_Font_Size VARCHAR(255) NOT NULL,
			Juna_IT_RG_Title_Font_Family VARCHAR(255) NOT NULL,
			Juna_IT_RG_Title_Color VARCHAR(255) NOT NULL,
			Juna_IT_RG_Line_Width VARCHAR(255) NOT NULL,
			Juna_IT_RG_Line_Color VARCHAR(255) NOT NULL,
			Juna_IT_RG_Line_Style VARCHAR(255) NOT NULL,
			Juna_IT_RG_VP_Text VARCHAR(255) NOT NULL,
			Juna_IT_RG_Del_Icon_Size VARCHAR(255) NOT NULL,
			Juna_IT_RG_Del_Icon_Color VARCHAR(255) NOT NULL,
			Juna_IT_RG_Pag_Size VARCHAR(255) NOT NULL,
			Juna_IT_RG_Pag_Color VARCHAR(255) NOT NULL,
			Juna_IT_RG_Del_Icon_Type VARCHAR(255) NOT NULL,
			Juna_IT_Image_Gallery_TN_Id VARCHAR(255) NOT NULL,
			PRIMARY KEY (id))';	
			
		$sql9='CREATE TABLE IF NOT EXISTS ' .$table_name9.' (
			id INTEGER(10) UNSIGNED AUTO_INCREMENT,
			Juna_IT_TG_Ims_Width VARCHAR(255) NOT NULL,
			Juna_IT_TG_Im_Height VARCHAR(255) NOT NULL,
			Juna_IT_TG_Im_Border_Width VARCHAR(255) NOT NULL,
			Juna_IT_TG_Im_Border_Color VARCHAR(255) NOT NULL,
			Juna_IT_TG_Im_Border_Style VARCHAR(255) NOT NULL,
			Juna_IT_TG_Im_Border_Radius VARCHAR(255) NOT NULL,
			Juna_IT_TG_Im_Box_Shadow VARCHAR(255) NOT NULL,
			Juna_IT_TG_Im_Shadow_Color VARCHAR(255) NOT NULL,
			Juna_IT_TG_Im_Place_Between_Imgs VARCHAR(255) NOT NULL,
			Juna_IT_TG_Im_Hover_Bg_Color VARCHAR(255) NOT NULL,
			Juna_IT_TG_Im_Hover_Transparency VARCHAR(255) NOT NULL,
			Juna_IT_TG_Im_Zoom_Effect_Type VARCHAR(255) NOT NULL,
			Juna_IT_TG_Im_Hover_Effect_Type VARCHAR(255) NOT NULL,
			Juna_IT_TG_Im_Zoom_Effect_Transition VARCHAR(255) NOT NULL,
			Juna_IT_TG_Im_Hover_Effect_Transition VARCHAR(255) NOT NULL,
			Juna_IT_TG_Im_Title_Color VARCHAR(255) NOT NULL,
			Juna_IT_TG_Im_Title_Font_Size VARCHAR(255) NOT NULL,
			Juna_IT_TG_Im_Title_Font_Family VARCHAR(255) NOT NULL,
			Juna_IT_TG_Im_Title_Bg_Color VARCHAR(255) NOT NULL,
			Juna_IT_TG_Im_Title_Effect_Type VARCHAR(255) NOT NULL,
			Juna_IT_TG_Im_Title_Effect_Transition VARCHAR(255) NOT NULL,
			Juna_IT_TG_Im_Line_Width VARCHAR(255) NOT NULL,
			Juna_IT_TG_Im_Line_Color VARCHAR(255) NOT NULL,
			Juna_IT_TG_Im_Line_Style VARCHAR(255) NOT NULL,
			Juna_IT_TG_Im_Line_Effect_Type VARCHAR(255) NOT NULL,
			Juna_IT_TG_Im_Line_Effect_Transition VARCHAR(255) NOT NULL,
			Juna_IT_TG_Im_Link_Text VARCHAR(255) NOT NULL,
			Juna_IT_TG_Im_Link_Font_Size VARCHAR(255) NOT NULL,
			Juna_IT_TG_Im_Link_Font_Family VARCHAR(255) NOT NULL,
			Juna_IT_TG_Im_Link_Color VARCHAR(255) NOT NULL,
			Juna_IT_TG_Im_Link_Border_Width VARCHAR(255) NOT NULL,
			Juna_IT_TG_Im_Link_Border_Color VARCHAR(255) NOT NULL,
			Juna_IT_TG_Im_Link_Border_Style VARCHAR(255) NOT NULL,
			Juna_IT_TG_Im_Link_Effect_Type VARCHAR(255) NOT NULL,
			Juna_IT_TG_Im_Link_Effect_Transition VARCHAR(255) NOT NULL,
			Juna_IT_TG_Pop_Overlay_Bg_Color VARCHAR(255) NOT NULL,
			Juna_IT_TG_Pop_Overlay_Transparency VARCHAR(255) NOT NULL,
			Juna_IT_TG_Pop_Content_Width VARCHAR(255) NOT NULL,
			Juna_IT_TG_Pop_Content_Height VARCHAR(255) NOT NULL,
			Juna_IT_TG_Pop_Content_Height_Show VARCHAR(255) NOT NULL,
			Juna_IT_TG_Pop_Content_Bg_Color VARCHAR(255) NOT NULL,
			Juna_IT_TG_Pop_Content_Border_Color VARCHAR(255) NOT NULL,
			Juna_IT_TG_Pop_Content_Border_Width VARCHAR(255) NOT NULL,
			Juna_IT_TG_Sl_Effect_Type VARCHAR(255) NOT NULL,
			Juna_IT_TG_Sl_Chenge_Time VARCHAR(255) NOT NULL,
			Juna_IT_TG_Sl_Slideshow_Time VARCHAR(255) NOT NULL,
			Juna_IT_TG_Sl_Slideshow_Show VARCHAR(255) NOT NULL,
			Juna_IT_TG_Sl_Slideshow_Auto_Show VARCHAR(255) NOT NULL,
			Juna_IT_TG_Sl_Slideshow_Star_Text VARCHAR(255) NOT NULL,
			Juna_IT_TG_Sl_Slideshow_Stop_Text VARCHAR(255) NOT NULL,
			Juna_IT_TG_Sl_SSH_Text_Font_Size VARCHAR(255) NOT NULL,
			Juna_IT_TG_Sl_SSH_Text_Font_Family VARCHAR(255) NOT NULL,
			Juna_IT_TG_Sl_SSH_Text_Color VARCHAR(255) NOT NULL,
			Juna_IT_TG_Sl_Icons_Size VARCHAR(255) NOT NULL,
			Juna_IT_TG_Sl_Icons_Type VARCHAR(255) NOT NULL,
			Juna_IT_TG_Pag_Icons_Color VARCHAR(255) NOT NULL,
			Juna_IT_TG_Pag_Icons_Size VARCHAR(255) NOT NULL,
			Juna_IT_Image_Gallery_TN_Id VARCHAR(255) NOT NULL,
			PRIMARY KEY (id))';	
			
		$sql3='CREATE TABLE IF NOT EXISTS ' .$table_name3.' (
			id INTEGER(10) UNSIGNED AUTO_INCREMENT,
			Font_family VARCHAR(255) NOT NULL,
			PRIMARY KEY (id))';
			
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
		dbDelta($sql1);
		dbDelta($sql2);
		dbDelta($sql3);
		dbDelta($sql4);
		dbDelta($sql5);
		dbDelta($sql6);
		dbDelta($sql7);
		dbDelta($sql8);
		dbDelta($sql9);
		DefaultData();
	}
	
	function DefaultData()
	{
		global $wpdb;
		$table_name  = $wpdb->prefix . "juna_it_photo_gallery_manager";
		$table_name1 = $wpdb->prefix . "juna_it_instal_photo_gallery";
		$table_name2 = $wpdb->prefix . "juna_it_instal_link_photo_gallery";
		$table_name3 = $wpdb->prefix . "juna_it_photo_font_family";
		$table_name4 = $wpdb->prefix . "juna_it_photo_effects_data";
		$table_name5 = $wpdb->prefix . "juna_it_photo_effects_1";
		$table_name6 = $wpdb->prefix . "juna_it_photo_effects_2";
		$table_name7 = $wpdb->prefix . "juna_it_photo_effects_3";
		$table_name8 = $wpdb->prefix . "juna_it_photo_effects_4";
		$table_name9 = $wpdb->prefix . "juna_it_photo_effects_5";
		
		$family_photo = array('Abadi MT Condensed Light','Aharoni','Aldhabi','Andalus','Angsana New',' AngsanaUPC','Aparajita','Arabic Typesetting','Arial','Arial Black',
	 		'Batang','BatangChe','Browallia New','BrowalliaUPC','Calibri','Calibri Light','Calisto MT','Cambria','Candara','Century Gothic','Comic Sans MS','Consolas',
	 		'Constantia','Copperplate Gothic','Copperplate Gothic Light','Corbel','Cordia New','CordiaUPC','Courier New','DaunPenh','David','DFKai-SB','DilleniaUPC',
			'DokChampa','Dotum','DotumChe','Ebrima','Estrangelo Edessa','EucrosiaUPC','Euphemia','FangSong','Franklin Gothic Medium','FrankRuehl','FreesiaUPC','Gabriola',
	 		'Gadugi','Gautami','Georgia','Gisha','Gulim','GulimChe','Gungsuh','GungsuhChe','Impact','IrisUPC','Iskoola Pota','JasmineUPC','KaiTi','Kalinga','Kartika',
	 		'Khmer UI','KodchiangUPC','Kokila','Lao UI','Latha','Leelawadee','Levenim MT','LilyUPC','Lucida Console','Lucida Handwriting Italic','Lucida Sans Unicode',
	 		'Malgun Gothic','Mangal','Manny ITC','Marlett','Meiryo','Meiryo UI','Microsoft Himalaya','Microsoft JhengHei','Microsoft JhengHei UI','Microsoft New Tai Lue',
			'Microsoft PhagsPa','Microsoft Sans Serif','Microsoft Tai Le','Microsoft Uighur','Microsoft YaHei','Microsoft YaHei UI','Microsoft Yi Baiti','MingLiU_HKSCS',
	 		'MingLiU_HKSCS-ExtB','Miriam','Mongolian Baiti','MoolBoran','MS UI Gothic','MV Boli','Myanmar Text','Narkisim','Nirmala UI','News Gothic MT','NSimSun','Nyala',
	 		'Palatino Linotype','Plantagenet Cherokee','Raavi','Rod','Sakkal Majalla','Segoe Print','Segoe Script','Segoe UI Symbol','Shonar Bangla','Shruti','SimHei','SimKai',
	 		'Simplified Arabic','SimSun','SimSun-ExtB','Sylfaen','Tahoma','Times New Roman','Traditional Arabic','Trebuchet MS','Tunga','Utsaah','Vani','Vijaya');
			
		$Juna_IT_Photo_Count_Fonts=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE id>%d",0));
		if(count($Juna_IT_Photo_Count_Fonts)==0)
	 	{
	 		foreach ($family_photo as $font_family) 
	 		{
	 			$wpdb->query($wpdb->prepare("INSERT INTO $table_name3 (id, Font_family) VALUES (%d, %s)", '', $font_family));
	 		}
	 	}
		
		$JIT_Photo_PS=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id>%d",0));
	 	if(count($JIT_Photo_PS)==0)
	 	{
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name (id, gallery_title, gallery_type, Juna_IT_Photo_Gallery_Show_Image_Type, Juna_IT_Photo_Gallery_Images_Quantity) 
	 			VALUES (%d, %s, %s, %s, %d)", '', 'Photo Gallery', 'Lightbox Column Gallery', 'Show All', 1));
	 	}
		
		$JIT_Photo_PSP=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE id>%d",0));
	 	if(count($JIT_Photo_PSP)==0)
	 	{
	 		$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, image_title, image_description, image_url, gallery_number, image_order_by) VALUES (%d, %s, %s, %s, %d, %d)", '', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, elementum vitae in blandit tempus, netus scelerisque at nullam semper, maecenas sollicitudin tortor dolor nunc, mollit mi condimentum vestibulum, nibh cras viverra. Luctus porttitor condimentum in enim leo pellentesque, mi facilisis turpis odio in tellus aliquam, urna gravida in ipsum natoque quis, egestas id ligula vulputate nascetur turpis, ipsum faucibus aliquam nunc dui at faucibus.', plugins_url('/Images/Demo Images/demo-1.jpg',__FILE__), 1, 1));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, image_title, image_description, image_url, gallery_number, image_order_by) VALUES (%d, %s, %s, %s, %d, %d)", '', 'Lorem Ipsum - 2', 'Lorem ipsum dolor sit amet, elementum vitae in blandit tempus, netus scelerisque at nullam semper, maecenas sollicitudin tortor dolor nunc, mollit mi condimentum vestibulum, nibh cras viverra. Luctus porttitor condimentum in enim leo pellentesque, mi facilisis turpis odio in tellus aliquam, urna gravida in ipsum natoque quis, egestas id ligula vulputate nascetur turpis, ipsum faucibus aliquam nunc dui at faucibus.',plugins_url('/Images/Demo Images/demo-2.jpg',__FILE__), 1, 2));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, image_title, image_description, image_url, gallery_number, image_order_by) VALUES (%d, %s, %s, %s, %d, %d)", '', 'Lorem Ipsum - 3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', plugins_url('/Images/Demo Images/demo-3.jpg',__FILE__), 1, 3));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, image_title, image_description, image_url, gallery_number, image_order_by) VALUES (%d, %s, %s, %s, %d, %d)", '', 'Lorem Ipsum - 13', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont anything embarrassing hidden in the middle of text.', plugins_url('/Images/Demo Images/demo-4.jpg',__FILE__), 1, 4));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, image_title, image_description, image_url, gallery_number, image_order_by) VALUES (%d, %s, %s, %s, %d, %d)", '', 'Lorem Ipsum - 4', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', plugins_url('/Images/Demo Images/demo-5.jpg',__FILE__), 1, 5));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, image_title, image_description, image_url, gallery_number, image_order_by) VALUES (%d, %s, %s, %s, %d, %d)", '', 'Lorem Ipsum - 6', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using , making it look like readable English.', plugins_url('/Images/Demo Images/demo-6.jpg',__FILE__), 1, 6));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, image_title, image_description, image_url, gallery_number, image_order_by) VALUES (%d, %s, %s, %s, %d, %d)", '', 'Lorem Ipsum - 8', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.', plugins_url('/Images/Demo Images/demo-7.jpg',__FILE__), 1, 7));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, image_title, image_description, image_url, gallery_number, image_order_by) VALUES (%d, %s, %s, %s, %d, %d)", '', 'Lorem Ipsum - 9', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.', plugins_url('/Images/Demo Images/demo-8.jpg',__FILE__), 1, 8));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, image_title, image_description, image_url, gallery_number, image_order_by) VALUES (%d, %s, %s, %s, %d, %d)", '', 'Lorem Ipsum - 10', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.', plugins_url('/Images/Demo Images/demo-9.jpg',__FILE__), 1, 9));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, image_title, image_description, image_url, gallery_number, image_order_by) VALUES (%d, %s, %s, %s, %d, %d)", '', 'Lorem Ipsum - 12', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont anything embarrassing hidden in the middle of text.', plugins_url('/Images/Demo Images/demo-10.jpg',__FILE__), 1, 10));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, image_title, image_description, image_url, gallery_number, image_order_by) VALUES (%d, %s, %s, %s, %d, %d)", '', 'Lorem Ipsum - 11', 'Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of, comes from a line in section 1.10.32.', plugins_url('/Images/Demo Images/demo-11.jpg',__FILE__), 1, 11));
		}
		
		$Juna_IT_PGallery_Count_PGE=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name5 WHERE id>%d",0));
		if(count($Juna_IT_PGallery_Count_PGE) == 0){
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name4 (id, effect_name, effect_type) VALUES (%d, %s, %s)", '', 'Lightbox Column Gallery', 'Lightbox Column Gallery'));
			$Juna_IT_Photo_Gallery_EN=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE effect_name=%s", 'Lightbox Column Gallery'));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name5 (id, Juna_IT_LCG_Image_Round_Bg_Color, Juna_IT_LCG_Image_Round_Border_Width, Juna_IT_LCG_Image_Round_Border_Style, Juna_IT_LCG_Image_Round_Border_Color, Juna_IT_LCG_Image_Round_Border_Radius, Juna_IT_LCG_Image_Round_Box_Shadow, Juna_IT_LCG_Image_Round_Shadow_Color, Juna_IT_LCG_Image_Round_Padding, Juna_IT_LCG_Image_Round_Hover_Rotate_Show, Juna_IT_LCG_Image_Round_Hover_Shadow_Show, Juna_IT_LCG_Image_Round_Hover_Zoom_Show, Juna_IT_LCG_Image_Border_Width, Juna_IT_LCG_Image_Border_Style, Juna_IT_LCG_Image_Border_Color, Juna_IT_LCG_Image_Border_Radius, Juna_IT_LCG_Image_Hover_Transparency, Juna_IT_LCG_Title_Color, Juna_IT_LCG_Title_Text_Shadow, Juna_IT_LCG_Title_Font_Size, Juna_IT_LCG_Title_Font_Family, Juna_IT_LCG_Title_Text_Align, Juna_IT_LCG_Title_Border_Style, Juna_IT_LCG_Title_Border_Width, Juna_IT_LCG_Title_Border_Color, Juna_IT_LCG_Title_Descrp_Color, Juna_IT_LCG_Title_Descrp_Font_Size, Juna_IT_LCG_Title_Descrp_Font_Family, Juna_IT_LCG_Title_Descrp_Text_Align, Juna_IT_LCG_Link_Color, Juna_IT_LCG_Link_Font_Size, Juna_IT_LCG_Link_Font_Family, Juna_IT_LCG_Pop_Effect_Type, Juna_IT_LCG_Pop_Div_Color, Juna_IT_LCG_Pop_Div_Transparency, Juna_IT_LCG_Pop_Content_Width, Juna_IT_LCG_Pop_Title_Font_Size, Juna_IT_LCG_Pop_Title_Font_Family, Juna_IT_LCG_Pop_Title_Color, Juna_IT_LCG_Pop_Title_Text_Align, Juna_IT_LCG_Pop_Title_Border_Color, Juna_IT_LCG_Pop_Title_Border_Style, Juna_IT_LCG_Pop_Title_Border_Width, Juna_IT_LCG_Pop_Desc_Show, Juna_IT_LCG_Pop_Desc_Bg_Color, Juna_IT_LCG_Pop_Desc_Color, Juna_IT_LCG_Pop_Desc_Font_Size, Juna_IT_LCG_Pop_Desc_Font_Family, Juna_IT_LCG_Pop_Desc_Text_Align, Juna_IT_LCG_Slider_Autoplay_Show, Juna_IT_LCG_Slider_Pause_Time, Juna_IT_LCG_Slider_Icon_Size, Juna_IT_LCG_Del_Icon_Size, Juna_IT_LCG_Del_Icon_Color, Juna_IT_LCG_Slider_Icon_Type, Juna_IT_LCG_Del_Icon_Type, Juna_IT_LCG_Link_Text, Juna_IT_Image_Gallery_TN_Id) 
				VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", 		 
				'', '#ffffff', '2', 'solid', '#dd8500', '0', '3', '#6d6d6d', '20', '', '', 'on', '0', 'solid', '#dd9933', '0', '80', '#dd8500', '1', '16', 'Arial', 'center', 'solid', '1', '#dd8500', '#000000', '13', 'Arial', 'center', '#dd8500', '15', 'Aldhabi', 'md-effect-2', '#ffffff', '58', '950', '16', 'Arial', '#000000', 'center', '#dd8500', 'solid', '1', 'on', '#ffffff', '#dd8500', '12', 'Arial', 'left', '', 'none', '35', '35', '#000000', '15', '3', 'View More . . .', $Juna_IT_Photo_Gallery_EN[0]->id));
		}
		
		$Juna_IT_PGallery_Count_BSE=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name6 WHERE id>%d",0));
		if(count($Juna_IT_PGallery_Count_BSE) == 0){
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name4 (id, effect_name, effect_type) VALUES (%d, %s, %s)", '', 'Block Style Photo Gallery', 'Block Style Photo Gallery'));
			$Juna_IT_Photo_Gallery_EN=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE effect_name=%s", 'Block Style Photo Gallery'));
			
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name6 (id, Juna_IT_BS_Image_Height_Show, Juna_IT_BS_Image_Height, Juna_IT_BS_Image_Border_Width, Juna_IT_BS_Image_Border_Style, Juna_IT_BS_Image_Border_Color, Juna_IT_BS_Image_Box_Shadow, Juna_IT_BS_Image_Shadow_Color, Juna_IT_BS_Image_Place_Between_Imgs, Juna_IT_BS_Text_Content_Width, Juna_IT_BS_Text_Content_Position, Juna_IT_BS_Text_Content_Bg_Color, Juna_IT_BS_Text_Content_Transparency, Juna_IT_BS_Title_Font_Size, Juna_IT_BS_Title_Font_Family, Juna_IT_BS_Title_Color, Juna_IT_BS_Title_Text_Shadow, Juna_IT_BS_Title_Text_Align, Juna_IT_BS_Title_Border_Width, Juna_IT_BS_Title_Border_Color, Juna_IT_BS_Title_Border_Style, Juna_IT_BS_Desc_Font_Size, Juna_IT_BS_Desc_Font_Family, Juna_IT_BS_Desc_Color, Juna_IT_BS_Desc_Texyt_Align, Juna_IT_BS_Link_Font_Size, Juna_IT_BS_Link_Font_Family, Juna_IT_BS_Link_Color, Juna_IT_BS_Link_Text, Juna_IT_BS_Link_Border_Width, Juna_IT_BS_Link_Border_Style, Juna_IT_BS_Link_Border_Color, Juna_IT_BS_Link_Border_Radius, Juna_IT_BS_Pag_Icon_Size, Juna_IT_BS_Pag_Icon_Color, Juna_IT_Image_Gallery_TN_Id) 
				VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", 		 
				'', '', 'auto', '0', 'solid', '#dd8500', '20', '#dd9933', '20', '60', 'right', '#000000', '50', '24', 'Arial', '#dd9933', '2', 'center', '2', '#dd9933', 'dotted', '17', 'Arial', '#ffffff', 'center', '20', 'Arial', '#dd8500', 'More', '2', 'solid', '#dd8500', '7', '20', '#dd9933', $Juna_IT_Photo_Gallery_EN[0]->id));	
		}
		$Juna_IT_PGallery_Count_FPG=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name7 WHERE id>%d",0));
		if(count($Juna_IT_PGallery_Count_FPG) == 0){
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name4 (id, effect_name, effect_type) VALUES (%d, %s, %s)", '', 'Fancy Photo Gallery', 'Fancy Photo Gallery'));
			$Juna_IT_Photo_Gallery_EN=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE effect_name=%s", 'Fancy Photo Gallery'));
			
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name7 (id, Juna_IT_FPG_Content_Hover_BG_Color, Juna_IT_FPG_Content_Hover_BG_Op, Juna_IT_FPG_Round_Bg_Color, Juna_IT_FPG_Round_Max_Width, Juna_IT_FPG_Round_Border_Width, Juna_IT_FPG_Round_Border_Style, Juna_IT_FPG_Round_Border_Color, Juna_IT_FPG_Round_Box_Shadow, Juna_IT_FPG_Round_Shadow_Color, Juna_IT_FPG_Round_Border_Radius, Juna_IT_FPG_Round_Padding, Juna_IT_FPG_Round_Place_Between_Rounds, Juna_IT_FPG_Title_Font_Siaze, Juna_IT_FPG_Title_Font_Family, Juna_IT_FPG_Title_Color, Juna_IT_FPG_Title_Text_Shadow, Juna_IT_FPG_Title_Shadow_Color, Juna_IT_FPG_Img_Border_Width, Juna_IT_FPG_Img_Border_Color, Juna_IT_FPG_Img_Border_Radius, Juna_IT_FPG_Img_Box_Shadow, Juna_IT_FPG_Img_Shadow_Color,  Juna_IT_FPG_Desc_Show, Juna_IT_FPG_Desc_Font_Size, Juna_IT_FPG_Desc_Color, Juna_IT_FPG_Desc_Font_Family, Juna_IT_FPG_Link_Font_Size, Juna_IT_FPG_Link_Font_Family, Juna_IT_FPG_Link_Color, Juna_IT_FPG_Link_Border_Width, Juna_IT_FPG_Link_Border_Color, Juna_IT_FPG_Link_Border_Style, Juna_IT_FPG_Link_Border_Radius, Juna_IT_FPG_Pag_Size, Juna_IT_FPG_Pag_Color, Juna_IT_FPG_Link_Text, Juna_IT_Image_Gallery_TN_Id) 
				VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", 		 
				'', '#000000', '5', '#ffffff', '202', '0', 'solid', '#dd9933', '17', '#dd9933', '0', '10', '10', '16', 'Arial', '#dd8500', '1', '#000000', '0', '#7a7a7a', '0', '10', '#dd8500', 'on', '12', '#dd8500', 'Arial', '15', 'Vijaya', '#dd8500', '1', '#dd8500', 'solid', '10', '15', '#dd9933', 'More . .', $Juna_IT_Photo_Gallery_EN[0]->id));
		}
		$Juna_IT_PGallery_Count_RG=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name8 WHERE id>%d",0));
		if(count($Juna_IT_PGallery_Count_RG) == 0){
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name4 (id, effect_name, effect_type) VALUES (%d, %s, %s)", '', 'Random Gallery', 'Random Gallery'));
			$Juna_IT_Photo_Gallery_EN=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE effect_name=%s", 'Random Gallery'));
			
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name8 (id, Juna_IT_RG_Content_Bg_Color, Juna_IT_RG_Content_Border_Width, Juna_IT_RG_Content_Border_Color, Juna_IT_RG_Content_Border_Style, Juna_IT_RG_Content_Box_Shadow, Juna_IT_RG_Content_Shadow_Color, Juna_IT_RG_Popup_Background, Juna_IT_RG_Popup_Border_Width, Juna_IT_RG_Popup_Border_Color, Juna_IT_RG_Popup_Border_Style, Juna_IT_RG_Popup_Box_Shadow, Juna_IT_RG_Popup_Shadow_Color, Juna_IT_RG_Popup_Img_Border_Width, Juna_IT_RG_Popup_Img_Border_Color, Juna_IT_RG_Popup_Img_Border_Style, Juna_IT_RG_Popup_Img_Box_Shadow, Juna_IT_RG_Popup_Img_Shadow_Color, Juna_IT_RG_Popup_Img_Border_Radius, Juna_IT_RG_Desc_Show, Juna_IT_RG_Desc_Color, Juna_IT_RG_Desc_Font_Size, Juna_IT_RG_Desc_Font_Family, Juna_IT_RG_Desc_Text_Align, Juna_IT_RG_Image_Width, Juna_IT_RG_Image_Height, Juna_IT_RG_Image_Border_Width, Juna_IT_RG_Image_Border_Color, Juna_IT_RG_Image_Border_Style, Juna_IT_RG_Image_Border_Radius, Juna_IT_RG_Image_Place_Between_Images, Juna_IT_RG_Image_Box_Shadow, Juna_IT_RG_Image_Shadow_Color, Juna_IT_RG_Image_Hover_Bg_color, Juna_IT_RG_Image_Hover_Transparensy, Juna_IT_RG_Image_Hover_Effect_Type, Juna_IT_RG_Image_Hover_Text_Effect_Type, Juna_IT_RG_Title_Font_Size, Juna_IT_RG_Title_Font_Family, Juna_IT_RG_Title_Color, Juna_IT_RG_Line_Width, Juna_IT_RG_Line_Color, Juna_IT_RG_Line_Style, Juna_IT_RG_VP_Text, Juna_IT_RG_Del_Icon_Size, Juna_IT_RG_Del_Icon_Color, Juna_IT_RG_Pag_Size, Juna_IT_RG_Pag_Color, Juna_IT_RG_Del_Icon_Type, Juna_IT_Image_Gallery_TN_Id) 
				VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", 		 
				'', '#ffffff', '0', '#dd3333', 'solid', '0', '#dd3333', '#000000', '0', '#dd9933', 'solid', '7', '#dd8500', '0', '#ffffff', 'solid', '7', '#dd9933', '0', 'on', '#ffffff', '12', 'Arial', 'center', '240', '150', '0', '#adadad', 'solid', '0', '10', '16', '#dd8500', '#dd8500', '60', 'overLayer2', 'infoTextTit1', '21', 'Vijaya', '#ffffff', '1', '#7a7a7a', 'solid', 'view picture', '20', '#dd8500', '18', '#000000', '3', $Juna_IT_Photo_Gallery_EN[0]->id));	
		}
		$Juna_IT_PGallery_Count_TG=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name9 WHERE id>%d",0));
		if(count($Juna_IT_PGallery_Count_TG) == 0){
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name4 (id, effect_name, effect_type) VALUES (%d, %s, %s)", '', 'Tumbnails Gallery', 'Tumbnails Gallery'));
			$Juna_IT_Photo_Gallery_EN=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE effect_name=%s", 'Tumbnails Gallery'));
			
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name9 (id, Juna_IT_TG_Ims_Width, Juna_IT_TG_Im_Height, Juna_IT_TG_Im_Border_Width, Juna_IT_TG_Im_Border_Color, Juna_IT_TG_Im_Border_Style, Juna_IT_TG_Im_Border_Radius, Juna_IT_TG_Im_Box_Shadow, Juna_IT_TG_Im_Shadow_Color, Juna_IT_TG_Im_Place_Between_Imgs, Juna_IT_TG_Im_Hover_Bg_Color, Juna_IT_TG_Im_Hover_Transparency,Juna_IT_TG_Im_Zoom_Effect_Type, Juna_IT_TG_Im_Hover_Effect_Type, Juna_IT_TG_Im_Zoom_Effect_Transition, Juna_IT_TG_Im_Hover_Effect_Transition, Juna_IT_TG_Im_Title_Color, Juna_IT_TG_Im_Title_Font_Size, Juna_IT_TG_Im_Title_Font_Family, Juna_IT_TG_Im_Title_Bg_Color, Juna_IT_TG_Im_Title_Effect_Type, Juna_IT_TG_Im_Title_Effect_Transition, Juna_IT_TG_Im_Line_Width, Juna_IT_TG_Im_Line_Color, Juna_IT_TG_Im_Line_Style, Juna_IT_TG_Im_Line_Effect_Type, Juna_IT_TG_Im_Line_Effect_Transition, Juna_IT_TG_Im_Link_Text, Juna_IT_TG_Im_Link_Font_Size, Juna_IT_TG_Im_Link_Font_Family, Juna_IT_TG_Im_Link_Color, Juna_IT_TG_Im_Link_Border_Width,  Juna_IT_TG_Im_Link_Border_Color, Juna_IT_TG_Im_Link_Border_Style, Juna_IT_TG_Im_Link_Effect_Type, Juna_IT_TG_Im_Link_Effect_Transition, Juna_IT_TG_Pop_Overlay_Bg_Color, Juna_IT_TG_Pop_Overlay_Transparency, Juna_IT_TG_Pop_Content_Width, Juna_IT_TG_Pop_Content_Height, Juna_IT_TG_Pop_Content_Height_Show, Juna_IT_TG_Pop_Content_Bg_Color, Juna_IT_TG_Pop_Content_Border_Color, Juna_IT_TG_Pop_Content_Border_Width, Juna_IT_TG_Sl_Effect_Type, Juna_IT_TG_Sl_Chenge_Time, Juna_IT_TG_Sl_Slideshow_Time, Juna_IT_TG_Sl_Slideshow_Show, Juna_IT_TG_Sl_Slideshow_Auto_Show, Juna_IT_TG_Sl_Slideshow_Star_Text, Juna_IT_TG_Sl_Slideshow_Stop_Text, Juna_IT_TG_Sl_SSH_Text_Font_Size, Juna_IT_TG_Sl_SSH_Text_Font_Family, Juna_IT_TG_Sl_SSH_Text_Color, Juna_IT_TG_Sl_Icons_Size, Juna_IT_TG_Sl_Icons_Type, Juna_IT_TG_Pag_Icons_Color, Juna_IT_TG_Pag_Icons_Size, Juna_IT_Image_Gallery_TN_Id) 
				VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", 		 
				'', '275', '190', '0', '#7f7f7f', 'solid', '0', '8', '#dd8500', '6', '#dd9933', '10', 'PImg2', 'overLayPop1', '3', '4', '#ffffff', '17', 'Vijaya', '#eeee22', 'overlayPopTitl10', '4', '1', '#dd9933', 'solid', 'overlayPopLine1', '7', 'View More',  '16', 'Vijaya', '#dd9933', '1', '#dd9933', 'solid', 'overlayPopLink7', '6', '#9e9e9e', '50', '50', 'auto', '', '#000000', '#000000', '5', 'elastic', '6', '5', 'on', 'on', 'Start Slideshow', 'Stop Slideshow', '15', 'Cambria', '#dd9933', '17', '15', '#000000', '17', $Juna_IT_Photo_Gallery_EN[0]->id));

			$wpdb->query($wpdb->prepare("INSERT INTO $table_name4 (id, effect_name, effect_type) VALUES (%d, %s, %s)", '', 'Tumbnails-Gallery', 'Tumbnails Gallery'));
			$Juna_IT_Photo_Gallery_EN=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE effect_name=%s", 'Tumbnails-Gallery'));

			$wpdb->query($wpdb->prepare("INSERT INTO $table_name9 (id, Juna_IT_TG_Ims_Width, Juna_IT_TG_Im_Height, Juna_IT_TG_Im_Border_Width, Juna_IT_TG_Im_Border_Color, Juna_IT_TG_Im_Border_Style, Juna_IT_TG_Im_Border_Radius, Juna_IT_TG_Im_Box_Shadow, Juna_IT_TG_Im_Shadow_Color, Juna_IT_TG_Im_Place_Between_Imgs, Juna_IT_TG_Im_Hover_Bg_Color, Juna_IT_TG_Im_Hover_Transparency,Juna_IT_TG_Im_Zoom_Effect_Type, Juna_IT_TG_Im_Hover_Effect_Type, Juna_IT_TG_Im_Zoom_Effect_Transition, Juna_IT_TG_Im_Hover_Effect_Transition, Juna_IT_TG_Im_Title_Color, Juna_IT_TG_Im_Title_Font_Size, Juna_IT_TG_Im_Title_Font_Family, Juna_IT_TG_Im_Title_Bg_Color, Juna_IT_TG_Im_Title_Effect_Type, Juna_IT_TG_Im_Title_Effect_Transition, Juna_IT_TG_Im_Line_Width, Juna_IT_TG_Im_Line_Color, Juna_IT_TG_Im_Line_Style, Juna_IT_TG_Im_Line_Effect_Type, Juna_IT_TG_Im_Line_Effect_Transition, Juna_IT_TG_Im_Link_Text, Juna_IT_TG_Im_Link_Font_Size, Juna_IT_TG_Im_Link_Font_Family, Juna_IT_TG_Im_Link_Color, Juna_IT_TG_Im_Link_Border_Width,  Juna_IT_TG_Im_Link_Border_Color, Juna_IT_TG_Im_Link_Border_Style, Juna_IT_TG_Im_Link_Effect_Type, Juna_IT_TG_Im_Link_Effect_Transition, Juna_IT_TG_Pop_Overlay_Bg_Color, Juna_IT_TG_Pop_Overlay_Transparency, Juna_IT_TG_Pop_Content_Width, Juna_IT_TG_Pop_Content_Height, Juna_IT_TG_Pop_Content_Height_Show, Juna_IT_TG_Pop_Content_Bg_Color, Juna_IT_TG_Pop_Content_Border_Color, Juna_IT_TG_Pop_Content_Border_Width, Juna_IT_TG_Sl_Effect_Type, Juna_IT_TG_Sl_Chenge_Time, Juna_IT_TG_Sl_Slideshow_Time, Juna_IT_TG_Sl_Slideshow_Show, Juna_IT_TG_Sl_Slideshow_Auto_Show, Juna_IT_TG_Sl_Slideshow_Star_Text, Juna_IT_TG_Sl_Slideshow_Stop_Text, Juna_IT_TG_Sl_SSH_Text_Font_Size, Juna_IT_TG_Sl_SSH_Text_Font_Family, Juna_IT_TG_Sl_SSH_Text_Color, Juna_IT_TG_Sl_Icons_Size, Juna_IT_TG_Sl_Icons_Type, Juna_IT_TG_Pag_Icons_Color, Juna_IT_TG_Pag_Icons_Size, Juna_IT_Image_Gallery_TN_Id) 
			VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", 		 
			'', '275', '190', '0', '#7f7f7f', 'solid', '0', '8', '#dd8500', '6', '#dd9933', '10', 'PImg6', 'overLayPop14', '3', '4', '#ffffff', '17', 'Vijaya', '#dd8500', 'overlayPopTitl7', '4', '0', '#dd9933', 'solid', 'overlayPopLine5', '5', 'View More',  '16', 'Vijaya', '#dd9933', '1', '#dd9933', 'solid', 'overlayPopLink4', '6', '#9e9e9e', '50', '50', 'auto', '', '#000000', '#000000', '5', 'elastic', '6', '5', 'on', '', 'Start Slideshow', 'Stop Slideshow', '15', 'Cambria', '#dd9933', '17', '15', '#000000', '17', $Juna_IT_Photo_Gallery_EN[0]->id));
		}
	}
?>