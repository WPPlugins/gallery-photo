<?php
	add_action( 'wp_ajax_Edit_Juna_IT_Photo_Gallery_Click', 'Edit_Juna_IT_Photo_Gallery_Click_Callback' );
	add_action( 'wp_ajax_nopriv_Edit_Juna_IT_Photo_Gallery_Click', 'Edit_Juna_IT_Photo_Gallery_Click_Callback' );
	
	function Edit_Juna_IT_Photo_Gallery_Click_Callback()
	{
		$Edit_gallery_id = sanitize_text_field($_POST['foobar']);
		
		global $wpdb;
		$table_name  = $wpdb->prefix . "juna_it_photo_gallery_manager";
		$table_name1 = $wpdb->prefix . "juna_it_instal_photo_gallery";
		$table_name2 = $wpdb->prefix . "juna_it_instal_link_photo_gallery";

		$Juna_IT_Gallery_title=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id= %d", $Edit_gallery_id));

		$Juna_IT_Image_Gallery_Image_params=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE gallery_number= %d order by image_order_by", $Juna_IT_Gallery_title[0]->id));
		$Juna_IT_Image_Gallery_Link_params=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE gallery_number= %d  order by link_order_by", $Juna_IT_Gallery_title[0]->id));
		
		echo $Juna_IT_Gallery_title[0]->gallery_title . '^%^' . $Juna_IT_Gallery_title[0]->gallery_type . '^%^' . $Juna_IT_Gallery_title[0]->Juna_IT_Photo_Gallery_Show_Image_Type . '^%^' . $Juna_IT_Gallery_title[0]->Juna_IT_Photo_Gallery_Images_Quantity . '^%^' . count($Juna_IT_Image_Gallery_Image_params) . '^%^' . $Juna_IT_Gallery_title[0]->id . '^%^' . $Juna_IT_Image_params;
		
		for($i=0;$i<count($Juna_IT_Image_Gallery_Image_params);$i++)
		{
			$u = explode(')*^*(', $Juna_IT_Image_Gallery_Image_params[$i]->image_title);
			$y = implode('"', $u);
			$t = explode(")*&*(", $y);
			$Image_Title = implode("'", $t);
			
			$w = explode(')*^*(', $Juna_IT_Image_Gallery_Image_params[$i]->image_description);
			$s = implode('"', $w);
			$x = explode(")*&*(", $s);
			$Description_textarea = implode("'", $x);

			$Juna_IT_Image_params = $Image_Title . '$#$' . $Description_textarea . '$#$' . $Juna_IT_Image_Gallery_Image_params[$i]->image_url . '$#$' . $Juna_IT_Image_Gallery_Link_params[$i]->Link_URL . '$#$' . $Juna_IT_Image_Gallery_Link_params[$i]->image_ONT .')*(';
			echo $Juna_IT_Image_params;
		}
		die();
	}
	
	add_action( 'wp_ajax_Delete_Juna_IT_Photo_Gallery_Click', 'Delete_Juna_IT_Photo_Gallery_Click_Callback' );
	add_action( 'wp_ajax_nopriv_Delete_Juna_IT_Photo_Gallery_Click', 'Delete_Juna_IT_Photo_Gallery_Click_Callback' );

	function Delete_Juna_IT_Photo_Gallery_Click_Callback()
	{
		$Delete_gallery_id = sanitize_text_field($_POST['foobar']);
		
		global $wpdb;
		$table_name  = $wpdb->prefix . "juna_it_photo_gallery_manager";
		$table_name1 = $wpdb->prefix . "juna_it_instal_photo_gallery";

		$wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id= %d", $Delete_gallery_id));
		$wpdb->query($wpdb->prepare("DELETE FROM $table_name1 WHERE gallery_number= %d", $Delete_gallery_id));

		die();
	}
	
	
	add_action( 'wp_ajax_Search_Juna_IT_Photo_Gallery_Click', 'Search_Juna_IT_Photo_Gallery_Click_Callback' );
	add_action( 'wp_ajax_nopriv_Search_Juna_IT_Photo_Gallery_Click', 'Search_Juna_IT_Photo_Gallery_Click_Callback' );

	function Search_Juna_IT_Photo_Gallery_Click_Callback()
	{
		$Search_Juna_IT_Image_Gallery = strtolower(sanitize_text_field($_POST['foobar']));
		global $wpdb;		

		$table_name  = $wpdb->prefix . "juna_it_photo_gallery_manager";
		$table_name1 = $wpdb->prefix . "juna_it_instal_photo_gallery";

		$Searched_Juna_IT_Gallery=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id > %d",0));

		for($i=0;$i<count($Searched_Juna_IT_Gallery);$i++)
		{
			for($j=1;$j<strlen($Searched_Juna_IT_Gallery[$i]->gallery_title);$j++)
			{
				if($Search_Juna_IT_Image_Gallery==substr(strtolower($Searched_Juna_IT_Gallery[$i]->gallery_title),0,$j))
				{
					$Quantity_Gallery_Images=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE gallery_number=%d",$Searched_Juna_IT_Gallery[$i]->id));
					echo $Searched_Juna_IT_Gallery[$i]->id . ')&*&(' . $Searched_Juna_IT_Gallery[$i]->gallery_title . ')&*&('. $Searched_Juna_IT_Gallery[$i]->gallery_type . ')&*&('. count($Quantity_Gallery_Images) . ')*^*(';
				}
				else
				{
					echo "";
				}
			}
		}
		die();
	}
	
	add_action( 'wp_ajax_Edit_JITPhotoGallery_Effect_Click', 'Edit_JITPhotoGallery_Effect_Click_Callback' );
	add_action( 'wp_ajax_nopriv_Edit_JITPhotoGallery_Effect_Click', 'Edit_JITPhotoGallery_Effect_Click_Callback' );

	function Edit_JITPhotoGallery_Effect_Click_Callback()
	{
		$Edit_JITIGallery = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name4 = $wpdb->prefix . "juna_it_photo_effects_data";
		$table_name5 = $wpdb->prefix . "juna_it_photo_effects_1";

		$JIT_IGallery_Effect_Type=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE id=%d",$Edit_JITIGallery));

		if($JIT_IGallery_Effect_Type[0]->effect_type=='Lightbox Column Gallery'){
			$JIT_IGallery_Effect=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name5 WHERE Juna_IT_Image_Gallery_TN_Id=%d",$Edit_JITIGallery));
			
			$Juna_IT_Image_Gallery_Edit_Effect=$JIT_IGallery_Effect_Type[0]->effect_name . ')*+*(' . $JIT_IGallery_Effect_Type[0]->effect_type . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Image_Round_Bg_Color . ')*+*(' . 
				$JIT_IGallery_Effect[0]->Juna_IT_LCG_Image_Round_Border_Width . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Image_Round_Border_Style . ')*+*(' . 
				$JIT_IGallery_Effect[0]->Juna_IT_LCG_Image_Round_Border_Color . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Image_Round_Border_Radius . ')*+*(' . 
				$JIT_IGallery_Effect[0]->Juna_IT_LCG_Image_Round_Box_Shadow . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Image_Round_Shadow_Color . ')*+*(' . 
				$JIT_IGallery_Effect[0]->Juna_IT_LCG_Image_Round_Padding . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Image_Round_Hover_Rotate_Show . ')*+*(' . 
				$JIT_IGallery_Effect[0]->Juna_IT_LCG_Image_Round_Hover_Shadow_Show . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Image_Round_Hover_Zoom_Show . ')*+*(' . 
				$JIT_IGallery_Effect[0]->Juna_IT_LCG_Image_Border_Width . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Image_Border_Style . ')*+*(' . 
				$JIT_IGallery_Effect[0]->Juna_IT_LCG_Image_Border_Color . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Image_Border_Radius . ')*+*(' . 
				$JIT_IGallery_Effect[0]->Juna_IT_LCG_Image_Hover_Transparency . ')*+*(' . 
				$JIT_IGallery_Effect[0]->Juna_IT_LCG_Title_Color . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Title_Text_Shadow . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Title_Font_Size . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Title_Font_Family . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Title_Text_Align . ')*+*(' . 
				$JIT_IGallery_Effect[0]->Juna_IT_LCG_Title_Border_Style . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Title_Border_Width  . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Title_Border_Color . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Title_Descrp_Color . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Title_Descrp_Font_Size . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Title_Descrp_Font_Family . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Title_Descrp_Text_Align . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Link_Color . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Link_Font_Size . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Link_Font_Family . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Pop_Effect_Type . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Pop_Div_Color . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Pop_Div_Transparency . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Pop_Content_Width . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Pop_Title_Font_Size . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Pop_Title_Font_Family . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Pop_Title_Color . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Pop_Title_Text_Align . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Pop_Title_Border_Color . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Pop_Title_Border_Style . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Pop_Title_Border_Width . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Pop_Desc_Show . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Pop_Desc_Bg_Color . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Pop_Desc_Color . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Pop_Desc_Font_Size . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Pop_Desc_Font_Family . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Pop_Desc_Text_Align . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Slider_Autoplay_Show . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Slider_Pause_Time . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Slider_Icon_Size . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Del_Icon_Size . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Del_Icon_Color . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Del_Icon_Type . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Slider_Icon_Type . ')*+*(' . $JIT_IGallery_Effect[0]->Juna_IT_LCG_Link_Text;
		}
		echo $Juna_IT_Image_Gallery_Edit_Effect;
		die();
	}
	
	add_action( 'wp_ajax_Delete_JITPhotoGallery_Effect_Click', 'Delete_JITPhotoGallery_Effect_Click_Callback' );
	add_action( 'wp_ajax_nopriv_Delete_JITPhotoGallery_Effect_Click', 'Delete_JITPhotoGallery_Effect_Click_Callback' );

	function Delete_JITPhotoGallery_Effect_Click_Callback()
	{
		$Delete_JITIGallery = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name4 = $wpdb->prefix . "juna_it_photo_effects_data";
		$table_name5 = $wpdb->prefix . "juna_it_photo_effects_1";

		$JIT_IGallery_Effect_Type=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE id=%d",$Delete_JITIGallery));

		$wpdb->query($wpdb->prepare("DELETE FROM $table_name4 WHERE id= %d", $Delete_JITIGallery));

		if($JIT_IGallery_Effect_Type[0]->effect_type=='Lightbox Column Gallery')
		{
			$wpdb->query($wpdb->prepare("DELETE FROM $table_name5 WHERE Juna_IT_Image_Gallery_TN_Id=%d", $Delete_JITIGallery));
		}
		die();
	}
	


?>