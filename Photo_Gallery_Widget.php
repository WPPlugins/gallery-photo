<?php
	class  Juna_IT_Photo_Gallery extends WP_Widget
	{
		function __construct()
 	  	{
 			$params=array('name'=>'Juna_IT_Photo_Gallery','description'=>'This is the widget of Juna IT Photo Gallery plugin');
			parent::__construct('Juna_IT_Photo_Gallery','',$params);
 	  	}
		function form($instance)
 		{
 			$Juna_IT_Image_Gallery_Name=$instance['gallery_title'];
		   	?>
		   	<div>			  
			   	<p>
			   		Gallery Name:
			   		<select name="<?php echo $this->get_field_name('gallery_title'); ?>" class="widefat" > 
				   		<?php
				   			global $wpdb;
				   			$table_name  = $wpdb->prefix . "juna_it_photo_gallery_manager";
				   			$gallery_name=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id > %d", 0));

				   			foreach ($gallery_name as $gallery_title)
				   			{
				   				?><option value="<?php echo $gallery_title->id;?>"><?php echo $gallery_title->gallery_title;?></option><?php 
				   			}
				   		?>			   		
			   		</select>
			   	</p>		   
		   	</div>
		   	<?php
 		}
		function widget($args,$instance)
 		{
			extract($args);			
			$Juna_IT_Image_Gallery_Name=empty($instance['gallery_title']) ? '' : $instance['gallery_title'];
			global $wpdb;
			
			$table_name  = $wpdb->prefix . "juna_it_photo_gallery_manager";
			$table_name1 = $wpdb->prefix . "juna_it_instal_photo_gallery";
			$table_name2 = $wpdb->prefix . "juna_it_instal_link_photo_gallery";

			$table_name4 = $wpdb->prefix . "juna_it_photo_effects_data";
			$table_name5 = $wpdb->prefix . "juna_it_photo_effects_1";
			$table_name6 = $wpdb->prefix . "juna_it_photo_effects_2";
			$table_name7 = $wpdb->prefix . "juna_it_photo_effects_3";
			$table_name8 = $wpdb->prefix . "juna_it_photo_effects_4";
			$table_name9 = $wpdb->prefix . "juna_it_photo_effects_5";

			$JIT_IG_GP=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id=%d", $Juna_IT_Image_Gallery_Name));
			$JIT_IG_IP1=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE gallery_number=%s", $Juna_IT_Image_Gallery_Name));
			$JIT_IG_IP2=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE gallery_number=%s", $Juna_IT_Image_Gallery_Name));

			$Juna_IT_Image_Gallery_General_Set=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE effect_name=%s", $JIT_IG_GP[0]->gallery_type));
			
			if($Juna_IT_Image_Gallery_General_Set[0]->effect_type=='Lightbox Column Gallery')
			{
				$Juna_IT_Image_Gallery_Draw_Image_Effect=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name5 WHERE Juna_IT_Image_Gallery_TN_Id=%s", $Juna_IT_Image_Gallery_General_Set[0]->id));
			}
			else if($Juna_IT_Image_Gallery_General_Set[0]->effect_type=='Block Style Photo Gallery'){
				$Juna_IT_Image_Gallery_Draw_Image_Effect=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name6 WHERE Juna_IT_Image_Gallery_TN_Id=%s", $Juna_IT_Image_Gallery_General_Set[0]->id));
			}
			else if($Juna_IT_Image_Gallery_General_Set[0]->effect_type=='Fancy Photo Gallery'){
				$Juna_IT_Image_Gallery_Draw_Image_Effect=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name7 WHERE Juna_IT_Image_Gallery_TN_Id=%s", $Juna_IT_Image_Gallery_General_Set[0]->id));
			}
			else if($Juna_IT_Image_Gallery_General_Set[0]->effect_type=='Random Gallery'){
				$Juna_IT_Image_Gallery_Draw_Image_Effect=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name8 WHERE Juna_IT_Image_Gallery_TN_Id=%s", $Juna_IT_Image_Gallery_General_Set[0]->id));
				
			}
			else if($Juna_IT_Image_Gallery_General_Set[0]->effect_type=='Tumbnails Gallery'){
				$Juna_IT_Image_Gallery_Draw_Image_Effect=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name9 WHERE Juna_IT_Image_Gallery_TN_Id=%s", $Juna_IT_Image_Gallery_General_Set[0]->id));
			}
 		 	$Juna_IT_Image_Gallery_Show_Image_Type=$JIT_IG_GP[0]->Juna_IT_Photo_Gallery_Show_Image_Type;
 		 	$Juna_IT_Image_Gallery_Image_Quantity=$JIT_IG_GP[0]->Juna_IT_Photo_Gallery_Images_Quantity;
 		 	$Juna_IT_Image_Gallery_Count_Images=count($JIT_IG_IP1);
			
			if($Juna_IT_Image_Gallery_Show_Image_Type == 'Show All'){
				$Juna_IT_Image_Gallery_Quantity=$Juna_IT_Image_Gallery_Count_Images;
 		 		$Juna_IT_Image_Gallery_Per_Page_First='';
 		 		$Juna_IT_Image_Gallery_Per_Page_Second='';
 		 		$Juna_IT_Image_Gallery='Show';
 		 		$Juna_IT_Image_Gallery_Load_More='';
	 		 	$Juna_IT_Image_Gallery_Load_More_hidden='';
			}
			else if($Juna_IT_Image_Gallery_Show_Image_Type=="Pageination")
 		 	{
 		 		if($Juna_IT_Image_Gallery_Image_Quantity>=$Juna_IT_Image_Gallery_Count_Images)
 		 		{
 		 			$Juna_IT_Image_Gallery_Quantity=$Juna_IT_Image_Gallery_Count_Images;
	 		 		$Juna_IT_Image_Gallery_Per_Page_First=1;
	 		 		$Juna_IT_Image_Gallery_Per_Page_Second='/1';
	 		 		$Juna_IT_Image_Gallery='none';
	 		 		$Juna_IT_Image_Gallery_Load_More='';
	 		 		$Juna_IT_Image_Gallery_Load_More_hidden='';
 		 		} 	
 		 		else
 		 		{
 		 			$Juna_IT_Image_Gallery_Quantity=$Juna_IT_Image_Gallery_Count_Images;
	 		 		$Juna_IT_Image_Gallery_Per_Page_First=1;
	 		 		$Juna_IT_Image_Gallery_fg=$Juna_IT_Image_Gallery_Count_Images/$Juna_IT_Image_Gallery_Image_Quantity;
	 		 		$Juna_IT_Image_Gallery_Per_Page_Second='/'.ceil($Juna_IT_Image_Gallery_fg);
	 		 		$Juna_IT_Image_Gallery='done';
	 		 		$Juna_IT_Image_Gallery_Load_More='';
	 		 		$Juna_IT_Image_Gallery_Load_More_hidden='';
 		 		}	 		
 		 	}
 		 	else if($Juna_IT_Image_Gallery_Show_Image_Type=="Load More")
 		 	{
 		 		if($Juna_IT_Image_Gallery_Image_Quantity>=$Juna_IT_Image_Gallery_Count_Images)
 		 		{
 		 			$Juna_IT_Image_Gallery_Quantity=$Juna_IT_Image_Gallery_Count_Images;
	 		 		$Juna_IT_Image_Gallery_Per_Page_First='';
	 		 		$Juna_IT_Image_Gallery_Per_Page_Second='';
	 		 		$Juna_IT_Image_Gallery='none';
	 		 		$Juna_IT_Image_Gallery_Load_More='';
	 		 		$Juna_IT_Image_Gallery_Load_More_hidden='none';
 		 		} 	
 		 		else
 		 		{
 		 			$Juna_IT_Image_Gallery_Quantity=$Juna_IT_Image_Gallery_Count_Images;
	 		 		$Juna_IT_Image_Gallery_Per_Page_First='';
	 		 		$Juna_IT_Image_Gallery_Per_Page_Second='';
	 		 		$Juna_IT_Image_Gallery='done';
	 		 		$Juna_IT_Image_Gallery_Load_More='Load More...';
	 		 		$Juna_IT_Image_Gallery_Load_More_hidden='done';	 		 		
 		 		}
 		 	}
			for($j=0;$j<count($JIT_IG_IP1);$j++)
 		 	{
 		 		$u = explode(')*^*(', $JIT_IG_IP1[$j]->image_title);
				$y = implode('"', $u);
				$t = explode(")*&*(", $y);
				$Juna_IT_Image_Gallery_Images_Title[$j] = implode("'", $t);

				$w = explode(')*^*(', $JIT_IG_IP1[$j]->image_description);
				$s = implode('"', $w);
				$x = explode(")*&*(", $s);
				$Juna_IT_Image_Gallery_Images_Description[$j] = implode("'", $x);

 		 		$Juna_IT_Image_Gallery_Images_URL[$j]=$JIT_IG_IP1[$j]->image_url;
 		 	}
			for($j=0;$j<count($JIT_IG_IP2);$j++){
				$Juna_IT_Image_Gallery_Images_Link[$j]=$JIT_IG_IP2[$j]->Link_URL;
				$Juna_IT_Image_Gallery_Images_Ont[$j]=$JIT_IG_IP2[$j]->image_ONT;
			}
			
			
			
			if($Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Image_Round_Hover_Rotate_Show=='on'){
				$Juna_IT_Image_Gallery_Rotate=1;
			}else{
				$Juna_IT_Image_Gallery_Rotate=0;
			}
			if($Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Image_Round_Hover_Shadow_Show=='on'){
				$Juna_IT_Image_Gallery_Shadow=0.9;
			}else{
				$Juna_IT_Image_Gallery_Shadow=1;
			}
			if($Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Image_Round_Hover_Zoom_Show=='on'){
				$Juna_IT_Image_Gallery_Zoom=8;
			}else{
				$Juna_IT_Image_Gallery_Zoom=0;
			}
			
			if($Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Pop_Desc_Show=='on'){
				$Juna_IT_Image_Gallery_Desc = 'block';
				$Juna_IT_Image_Gallery_Float = 'left';
			}else{
				$Juna_IT_Image_Gallery_Desc = 'none';
				$Juna_IT_Image_Gallery_Float = 'none';
			}
			
			if($Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Del_Icon_Type=='1'){
				$Juna_IT_Image_LCG_Del_Icon_Type = 'junaiticons-close';
			}else if($Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Del_Icon_Type=='2'){
				$Juna_IT_Image_LCG_Del_Icon_Type = 'junaiticons-times-circle-o';
			}else if($Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Del_Icon_Type=='3'){
				$Juna_IT_Image_LCG_Del_Icon_Type = 'junaiticons-times-circle';
			}
			
			
			//Block Style Photo Gallery
			
			if($Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Image_Height_Show==''){
				$Juna_IT_BS_Image_Height = 'auto';
			}else{
				$Juna_IT_BS_Image_Height = $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Image_Height + 'px !important';
			}
			
			//Fansy Photo Gallery
			
			if($Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Desc_Show=='on'){
				$Juna_IT_FPG_Desc = 'block';
			}else{
				$Juna_IT_FPG_Desc = 'none';
			}
			
			//Random Gallery
			
			if($Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Desc_Show=='on'){
				$Juna_IT_RG_Desc = 'block';
			}else{
				$Juna_IT_RG_Desc = 'none';
			}
			
			if($Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Del_Icon_Type=='1'){
				$Juna_IT_Image_RG_Del_Icon_Type = 'junaiticons-close';
			}else if($Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Del_Icon_Type=='2'){
				$Juna_IT_Image_RG_Del_Icon_Type = 'junaiticons-times-circle-o';
			}else if($Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Del_Icon_Type=='3'){
				$Juna_IT_Image_RG_Del_Icon_Type = 'junaiticons-times-circle';
			}
			
			//Tumbnails Gallery
			
			if($Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Sl_Slideshow_Show=='on'){
				$Juna_IT_TG_Sl_Slideshow_Show = 'true';
			}else{
				$Juna_IT_TG_Sl_Slideshow_Show = 'false';
			}
			if($Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Sl_Slideshow_Auto_Show=='on'){
				$Juna_IT_TG_Sl_Slideshow_Auto_Show = 'true';
			}else{
				$Juna_IT_TG_Sl_Slideshow_Auto_Show = 'false';
			}
			if($Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Sl_Slideshow_Time=='none'){
				$Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Sl_Slideshow_Time='2';
			}
			
			if($Juna_IT_Image_Gallery_General_Set[0]->effect_type=='Lightbox Column Gallery')
 		 	{
			?>
				<style>
					.grid:hover{
						transform:rotate(<?php echo $Juna_IT_Image_Gallery_Rotate; ?>deg);
						opacity:<?php echo $Juna_IT_Image_Gallery_Shadow; ?>;
						z-index:2;
					}
					.imageimg{
						transition:all 0.4s;
					}
					.grid:hover .imageimg{
						max-width:<?php echo 100+$Juna_IT_Image_Gallery_Zoom; ?>% !important;
						margin-left:<?php echo -($Juna_IT_Image_Gallery_Zoom)/2; ?>%;
						margin-top:<?php echo -($Juna_IT_Image_Gallery_Zoom)/2; ?>%;
						opacity:<?php echo ($Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Image_Hover_Transparency)/100; ?>;
					}
					
					.descrpDesc::-webkit-scrollbar {
						width: 0.5em;
					}

					.descrpDesc::-webkit-scrollbar-track {
						-webkit-box-shadow: inset 0 0 6px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Pop_Desc_Bg_Color; ?>;
					}

					.descrpDesc::-webkit-scrollbar-thumb {
						background-color: <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Pop_Desc_Color; ?>;
						outline: <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Pop_Desc_Color; ?>;
					}
				</style>
			
				<script src='<?php echo plugins_url('/Scripts/blocksit.min.js',__FILE__) ?>'></script>
				<script>
				jQuery(document).ready(function() {
					var currentWidth = 0;
					//blocksit define
					jQuery(window).load( function() {
						var winWidth = jQuery('.widh_width').parent().width();
							var conWidth;
							conWidth = winWidth;
							if(winWidth<320){
								col = 1
							} else if(winWidth < 660) {
								col = 2
							} else if(winWidth < 880) {
								col = 3
							} else if(winWidth < 1100) {
								col = 4
							} else {
								col = 5
							}
							
							currentWidth = conWidth;
							jQuery('#container22').css('width',currentWidth);
							jQuery('#container22').BlocksIt({
								numOfCol: col,
								offsetX: 8,
								offsetY: 8
							});
					});
					
					//window resize
					
					jQuery(window).resize(function() {
						var winWidth = jQuery('.widh_width').parent().width();
						var conWidth;
						conWidth = winWidth
						if(winWidth<320){
							col=1;
						} else if(winWidth < 660) {
							col = 2
						} else if(winWidth < 880) {
							col = 3
						} else if(winWidth < 1100) {
							col = 4;
						} else {
							col = 5;
						}
						
						if(conWidth != currentWidth) {
							currentWidth = conWidth;
							jQuery('#container22').width(conWidth);
							jQuery('#container22').BlocksIt({
								numOfCol: col,
								offsetX: 8,
								offsetY: 8
							});
						}
					});
				});
				</script>
				<div class="md-modal <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Pop_Effect_Type; ?>" id="modal-2">
					<i class="md-close <?php echo $Juna_IT_Image_LCG_Del_Icon_Type; ?>" style='font-size:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Del_Icon_Size; ?>px;right:<?php echo -($Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Del_Icon_Size)/2; ?>px;top:<?php echo -($Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Del_Icon_Size)/2; ?>px;color:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Del_Icon_Color; ?>;'></i>
					<div class="md-content" style='width:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Pop_Content_Width; ?>px;'>
						
						<span class='prevClickImgSlider' onclick='prevClickImgSlider()'>
							<img src='<?php echo plugins_url('/Images/icon-15.png',__FILE__) ?>' style='width:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Slider_Icon_Size; ?>px;' class='slIconsLeft slIcLCG' />
						</span>
						<span class='nextClickImgSlider' onclick='nextClickImgSlider()'>
							<img class='slIconsRight slIcLCG' src="<?php echo plugins_url('/Images/icon-15-15.png',__FILE__) ?>" style='width:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Slider_Icon_Size; ?>px;' />
						</span>
						<img class='slImg'  style='float:<?php echo $Juna_IT_Image_Gallery_Float; ?>;'  src="" />	
						<div id='descrp' style='display:<?php echo $Juna_IT_Image_Gallery_Desc; ?>;background:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Pop_Desc_Bg_Color; ?>;'>
							<h2 class='descrpHeader' style='margin-top:5px;font-size:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Pop_Title_Font_Size; ?>px;font-family:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Pop_Title_Font_Family; ?>;color:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Pop_Title_Color; ?>;text-align:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Pop_Title_Text_Align; ?>;'>
								Lorem Ipsum
							</h2>
							<div class='borderDesc' style='border-top:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Pop_Title_Border_Width; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Pop_Title_Border_Style; ?> <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Pop_Title_Border_Color; ?>;margin-bottom:2px;'></div>
							<p class='descrpDesc' style='color:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Pop_Desc_Color; ?>;font-size:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Pop_Desc_Font_Size; ?>px;font-family:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Pop_Desc_Font_Family; ?>;text-align:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Pop_Desc_Text_Align; ?>;'>
							</p>
						</div>
					</div>
				</div>
				<section id="wrapper22" style='margin:0px;'>
					<div id="container22" class='widh_width'>
						<?php
						for($j=0;$j<$Juna_IT_Image_Gallery_Count_Images;$j++)
						{
						?>
						<div class="grid md-trigger GRLCG<?php echo $j+1; ?>" data-modal="modal-2" style='background:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Image_Round_Bg_Color; ?>;border:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Image_Round_Border_Width; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Image_Round_Border_Style; ?> <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Image_Round_Border_Color; ?>;border-radius:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Image_Round_Border_Radius; ?>%;box-shadow:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Image_Round_Box_Shadow; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Image_Round_Box_Shadow; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Image_Round_Box_Shadow; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Image_Round_Shadow_Color; ?>;padding:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Image_Round_Padding; ?>px;' onclick='click_popup_slider("<?php echo $Juna_IT_Image_Gallery_Images_URL[$j];?>","<?php echo $Juna_IT_Image_Gallery_Images_Title[$j]; ?>","<?php echo $Juna_IT_Image_Gallery_Images_Description[$j]; ?>")'>
						<input type='text' style='display:none;' class='descrText' value='<?php echo $Juna_IT_Image_Gallery_Images_Description[$j]; ?>'>
							<div class="imgholder imgholder<?php echo $j+1; ?>">
								<img class='imageimg imageimg<?php echo $j+1; ?>' style='border:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Image_Border_Width; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Image_Border_Style; ?> <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Image_Border_Color; ?>;border-radius:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Image_Border_Radius; ?>%;' src="<?php echo $Juna_IT_Image_Gallery_Images_URL[$j];?>" />
							</div>
							<strong class='CTitle' style='color:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Title_Color; ?>;text-shadow:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Title_Text_Shadow; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Title_Text_Shadow; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Title_Text_Shadow; ?>px;font-size:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Title_Font_Size; ?>px;font-family:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Title_Font_Family; ?>;text-align:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Title_Text_Align; ?>;border-bottom:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Title_Border_Width; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Title_Border_Style; ?> <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Title_Border_Color; ?>;'><?php echo $Juna_IT_Image_Gallery_Images_Title[$j]; ?></strong>
							<p style='display:<?php echo $Juna_IT_Image_Gallery_Desc; ?>;color:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Title_Descrp_Color; ?>;font-size:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Title_Descrp_Font_Size; ?>px;font-family:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Title_Descrp_Font_Family; ?>;text-align:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Title_Descrp_Text_Align; ?>;'><?php echo substr($Juna_IT_Image_Gallery_Images_Description[$j],0,25); ?>...</p>
							<?php if($Juna_IT_Image_Gallery_Images_Link[$j] !== '' && $Juna_IT_Image_Gallery_Images_Link[$j] !== null){?>
								<div class="meta" style=''><a style='text-decoration:none;color:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Link_Color; ?>;font-size:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Link_Font_Size; ?>px;font-family:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Link_Font_Family; ?>;' href='<?php echo $Juna_IT_Image_Gallery_Images_Link[$j]; ?>' target='<?php echo $Juna_IT_Image_Gallery_Images_Ont[$j]; ?>'><?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Link_Text; ?></a></div>
							<?php }?>
						</div>
						<?php
						}
						?>
					</div>
				</section>
				
				<div class="md-overlay" style='background:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Pop_Div_Color; ?>;opacity:<?php echo ($Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Pop_Div_Transparency)/100; ?>;'>
					
				</div>
				<input type='text' style='display:none' class='autoplayPauseTimeLCG' value='<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Slider_Pause_Time; ?>' >
				<input type='text' style='display:none' class='autoplayShowLCG' value='<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Slider_Autoplay_Show; ?>' >
				<input type='text' style='display:none' class='contentWidthLCG' value='<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Pop_Content_Width; ?>' >
				<input type='text' style='display:none' class='popTitleLCG' value='<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Pop_Title_Font_Size; ?>' >
				<input type='text' style='display:none' class='popDescLCG' value='<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Pop_Desc_Font_Size; ?>' >
				<input type='text' style='display:none' class='popSliderIconLCG' value='<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Slider_Icon_Size; ?>' >
				<input type='text' style='display:none' class='popSliderIconTypeLCG' value='<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Slider_Icon_Type; ?>' >
				
				<script>
					var popSliderIconTypeLCG = jQuery('.popSliderIconTypeLCG').val();
					for(i=1;i<=18;i++){
						if(popSliderIconTypeLCG == i){
							jQuery('.slIconsLeft').attr('src',"<?php echo plugins_url('/Images/Icons Image/icon-'.       $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Slider_Icon_Type .'.png',__FILE__); ?>");
							jQuery('.slIconsRight').attr('src',"<?php echo plugins_url('/Images/Icons Image/icon-'.       $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Slider_Icon_Type .'-'. $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_LCG_Slider_Icon_Type .'.png',__FILE__); ?>");
						}
					}
				</script>
			<script src='<?php echo plugins_url('/Scripts/LCGPopSl.js',__FILE__) ?>'></script>
			<script src='<?php echo plugins_url('/Scripts/classie.js',__FILE__) ?>'></script>
			<script src='<?php echo plugins_url('/Scripts/modalEffects.js',__FILE__) ?>'></script>
			<?php
			}
			else if($Juna_IT_Image_Gallery_General_Set[0]->effect_type=='Block Style Photo Gallery')
 		 	{
			?>
				<style type="text/css" media="screen">
					.psRelBSIG { border:10px solid #999; margin:5px; }
					.relBSIG {position:relative;z-index:3; background:red; opacity:0.4; border:none; margin:0 <?php if($Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Text_Content_Position == 'left'){
						echo 100-$Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Text_Content_Width;
					}else if($Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Text_Content_Position == 'right'){
						echo 0;
					}else if($Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Text_Content_Position == 'center'){
						echo (100-$Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Text_Content_Width)/2;
					}  ?>% 0 <?php if($Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Text_Content_Position == 'left'){
						echo 0;
					}else if($Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Text_Content_Position == 'right'){
						echo 100-$Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Text_Content_Width;
					}else if($Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Text_Content_Position == 'center'){
						echo (100-$Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Text_Content_Width)/2;
					}  ?>% !important; padding:2% 2% !important;}
					.absBSIG {position:absolute; border:none; z-index:3; margin:0 <?php if($Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Text_Content_Position == 'left'){
						echo 100-$Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Text_Content_Width;
					}else if($Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Text_Content_Position == 'right'){
						echo 0;
					}else if($Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Text_Content_Position == 'center'){
						echo (100-$Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Text_Content_Width)/2;
					}  ?>% 0 <?php if($Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Text_Content_Position == 'left'){
						echo 0;
					}else if($Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Text_Content_Position == 'right'){
						echo 100-$Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Text_Content_Width;
					}else if($Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Text_Content_Position == 'center'){
						echo (100-$Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Text_Content_Width)/2;
					}  ?>% !important; margin-left:2px;top:50% !important;transform:translateY(-50%);padding:2% 2%;}
					.blSImg{
						max-width:none !important;
					}
					.parBS::-webkit-scrollbar {
						width: 0.5em;
					}

					.parBS::-webkit-scrollbar-track {
						-webkit-box-shadow: inset 0 0 6px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Text_Content_Bg_Color; ?>;
					}

					.parBS::-webkit-scrollbar-thumb {
						background-color: <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Desc_Color; ?>;
						outline: <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Desc_Color; ?>;
					}
				</style>
				<?php
				for($j=0;$j<$Juna_IT_Image_Gallery_Count_Images;$j++)
				{
				?>
				<div style='display:none;position:relative;height:<?php echo $Juna_IT_BS_Image_Height; ?>px;overflow:hidden;border:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Image_Border_Width; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Image_Border_Style; ?> <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Image_Border_Color; ?>;box-shadow:0px 0px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Image_Box_Shadow; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Image_Shadow_Color; ?>;margin:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Image_Place_Between_Imgs; ?>px;' class="div01 psRelBSIG BSJIT<?php echo $j+1;?>" id='relBSIG_Div<?php echo $j; ?>'>
					<div class='relBSIG relBSIG<?php echo $j; ?>' style='background:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Text_Content_Bg_Color; ?>;opacity:<?php echo ($Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Text_Content_Transparency)/100; ?>'>
						<input type='text' class='urlSrcImgBSIG' style='display:none;' value='<?php echo $Juna_IT_Image_Gallery_Images_URL[$j];?>'>
					</div>
					<div class='absBSIG absBSIG<?php echo $j; ?>' style='position:absolute;top:0px;opacity:1;background:none;height:<?php echo $Juna_IT_BS_Image_Height; ?>px;'>
						<h2 class='BSTIT' style='margin:10px;font-size:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Title_Font_Size; ?>px;color:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Title_Color; ?>;font-family:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Title_Font_Family; ?>;text-shadow:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Title_Text_Shadow; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Title_Text_Shadow; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Title_Text_Shadow; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Title_Color; ?>;text-align:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Title_Text_Align; ?>;border-bottom:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Title_Border_Width; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Title_Border_Style; ?> <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Title_Border_Color; ?>;'><?php echo $Juna_IT_Image_Gallery_Images_Title[$j]; ?></h2>
						<p class='parBS' style='margin:0px 10px 10px 10px;height:55%;overflow-x:hidden;font-size:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Desc_Font_Size; ?>px;font-family:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Desc_Font_Family; ?>;color:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Desc_Color; ?>;text-align:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Desc_Texyt_Align; ?>'><?php echo $Juna_IT_Image_Gallery_Images_Description[$j]; ?></p>
						<?php if($Juna_IT_Image_Gallery_Images_Link[$j] !== '' && $Juna_IT_Image_Gallery_Images_Link[$j] !== null){?>
						<p style='text-align:center;'>
							<a class='BSLink' style='text-decoration:none;font-size:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Link_Font_Size; ?>px;color:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Link_Color; ?>;font-family:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Link_Font_Family; ?>;border:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Link_Border_Width; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Link_Border_Style; ?> <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Link_Border_Color; ?>;padding:5px 10px;border-radius:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Link_Border_Radius; ?>%;' href='<?php echo $Juna_IT_Image_Gallery_Images_Link[$j]; ?>' target='<?php echo $Juna_IT_Image_Gallery_Images_Ont[$j]; ?>'><?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Link_Text; ?></a>
						</p>
						<?php } ?>
					</div>
				</div>
				<?php
				}
				?>
				<div id="Juna_IT_Photo_Gallery_Show_All" style="margin-top:15px;float:left;font-size:20px;color:black;text-align:center;width:100%;font-size:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Pag_Icon_Size; ?>px;color:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Pag_Icon_Color; ?>;">
					<input type="text" style='display:none;' value="<?php echo $Juna_IT_Image_Gallery;?>" id="Juna_IT_Photo_Gallery">
					<input type="text" style='display:none;' value="<?php echo $Juna_IT_Image_Gallery_Count_Images;?>" id="Juna_IT_Photo_Gallery_Count_Images">
					<input type="text" style='display:none;' value="<?php echo $Juna_IT_Image_Gallery_Image_Quantity;?>" id="Juna_IT_Photo_Gallery_Image_Quantity">
					<input type="text" style='display:none;' value="<?php echo $Juna_IT_Image_Gallery_Image_Quantity;?>" id="Juna_IT_Photo_Gallery_Image_Quantity_Hidden">
					<input type="text" style='display:none;' value="<?php echo $Juna_IT_Image_Gallery_Load_More_hidden;?>" id="Juna_IT_Photo_Gallery_Load_More_hidden">
					<input type="text" style='display:none;' id="Juna_IT_Photo_Gallery_Hidden_Type" value="Block Style Photo Gallery">
					<i class='iticonsBS junaiticons-style junaiticons-fast-backward' onclick="Juna_IT_Photo_Gallery_Fast_Backward_Clicked()"></i>
					<i class='iticonsBS junaiticons-style junaiticons-chevron-left' onclick="Juna_IT_Photo_Gallery_Chevron_Left_Clicked()"></i>
					<span class='BSCount' id="Juna_IT_Photo_Gallery_First_Page"><?php echo $Juna_IT_Image_Gallery_Per_Page_First;?></span><span class='BSCount' id="Juna_IT_Photo_Gallery_End_Page"><?php echo $Juna_IT_Image_Gallery_Per_Page_Second;?></span><span id="Juna_IT_Photo_Gallery_Load_More" onclick="Juna_IT_Photo_Gallery_Load_More_Clicked()"><?php echo $Juna_IT_Image_Gallery_Load_More;?></span>
					<i class='iticonsBS junaiticons-style junaiticons-chevron-right' onclick="Juna_IT_Photo_Gallery_Chevron_Right_Clicked()"></i>
					<i class='iticonsBS junaiticons-style junaiticons-fast-forward' onclick="Juna_IT_Photo_Gallery_Fast_Forward_Clicked()"></i>
				</div>
				<input type='text' style='display:none;' class='BSTitleFontSize' value='<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Title_Font_Size; ?>'>
				<input type='text' style='display:none;' class='BSDescFontSize' value='<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Desc_Font_Size; ?>'>
				<input type='text' style='display:none;' class='BSLinkFontSize' value='<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Link_Font_Size; ?>'>
				<input type='text' style='display:none;' class='BSIconsSize' value='<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_BS_Link_Font_Size; ?>'>
				<script src="<?php echo plugins_url('/Scripts/jquery.anystretch.min.js',__FILE__) ?>"></script>
				<script src="<?php echo plugins_url('/Scripts/BSPagination.js',__FILE__) ?>"></script>
			<?php
			}
			else if($Juna_IT_Image_Gallery_General_Set[0]->effect_type=='Fancy Photo Gallery')
 		 	{
			?>
				<style>
					#overlayCSSTR{
						position:absolute;
						width:100%;
						height:100%;
						left:0;
						top:0;
						z-index:7;
						background:rgb(0,0,0);
						background:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Content_Hover_BG_Color; ?>;
						filter: alpha(opacity=50);
						
						transition: background-color 0.7s;
						-moz-transition: background-color 0.7s;
						-webkit-transition: background-color 0.7s;
						-o-transition: background-color 0.7s;
					}
					#overlayCSSTR:hover{
						background:rgb(0,0,0);
						background:rgba(0,0,0,0);
						z-index:0;
						filter: alpha(opacity=0);
					}
					.descrFPG::-webkit-scrollbar {
						width: 0.5em;
					}

					.descrFPG::-webkit-scrollbar-track {
						-webkit-box-shadow: inset 0 0 6px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Round_Bg_Color; ?>;
					}

					.descrFPG::-webkit-scrollbar-thumb {
						background-color: <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Desc_Color; ?>;
						outline: <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Desc_Color; ?>;
					}
				</style>
				<section id="wrapperCSSTR">
					<div id="holderCSSTR">
					<?php
					for($j=0;$j<$Juna_IT_Image_Gallery_Count_Images;$j++)
					{
					?>
						<div class="box box-1 BoxFPG<?php echo $j+1; ?>" style="display:none;background:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Round_Bg_Color; ?>;max-width:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Round_Max_Width; ?>px;border:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Round_Border_Width; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Round_Border_Style; ?> <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Round_Border_Color; ?>;box-shadow:0px 0px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Round_Box_Shadow; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Round_Shadow_Color; ?>;border-radius:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Round_Border_Radius; ?>px;padding:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Round_Padding; ?>px;margin:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Round_Place_Between_Rounds; ?>px;">
							<h3 class='headFPG' style='font-size:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Title_Font_Siaze; ?>px;font-family:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Title_Font_Family; ?>;color:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Title_Color; ?>;text-shadow:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Title_Text_Shadow; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Title_Text_Shadow; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Title_Text_Shadow; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Title_Shadow_Color; ?>;'><?php echo $Juna_IT_Image_Gallery_Images_Title[$j]; ?></h3>
							<div class="image">
								<img style='width:100%;padding:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Img_Border_Width; ?>px;background:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Img_Border_Color; ?>;border-radius:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Img_Border_Radius; ?>%;box-shadow:0px 0px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Img_Box_Shadow; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Img_Shadow_Color; ?>;' src="<?php echo $Juna_IT_Image_Gallery_Images_URL[$j];?>" alt="Love Light" />
							</div>
							<?php if($Juna_IT_Image_Gallery_Images_Link[$j] !== '' && $Juna_IT_Image_Gallery_Images_Link[$j] !== null){ ?>
							<p style='text-align:right;'>
								<a class='linkFPG' href='<?php echo $Juna_IT_Image_Gallery_Images_Link[$j]; ?>' target='<?php echo $Juna_IT_Image_Gallery_Images_Ont[$j]; ?>' style='text-decoration:none;font-size:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Link_Font_Size; ?>px;font-family:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Link_Font_Family; ?>;color:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Link_Color; ?>;border:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Link_Border_Width; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Link_Border_Style; ?> <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Link_Border_Color; ?>;border-radius:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Link_Border_Radius; ?>%;padding:2px 5px;'><?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Link_Text; ?></a>
							</p>
							<?php } ?>
							<div class="description descrFPG" style='display:<?php echo $Juna_IT_FPG_Desc; ?>;text-align:justify;font-size:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Desc_Font_Size; ?>px;color:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Desc_Color; ?>;font-family:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Desc_Font_Family; ?>;'>
								<?php echo $Juna_IT_Image_Gallery_Images_Description[$j]; ?>
							</div>
						</div>
					<?php
					}
					?>
						<div class="clearfix"></div>
					</div>

					<div id="overlayCSSTR" style='opacity:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Content_Hover_BG_Op/100; ?>;'></div>
				</section>
				<div id="Juna_IT_Photo_Gallery_Show_All_FPG" style="margin-top:15px;float:left;font-size:20px;color:black;text-align:center;width:100%;font-size:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Pag_Size; ?>px;color:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Pag_Color; ?>;">
					<input type="text" style='display:none;' value="<?php echo $Juna_IT_Image_Gallery;?>" id="Juna_IT_Photo_Gallery_FPG">
					<input type="text" style='display:none;' value="<?php echo $Juna_IT_Image_Gallery_Count_Images;?>" id="Juna_IT_Photo_Gallery_Count_Images_FPG">
					<input type="text" style='display:none;' value="<?php echo $Juna_IT_Image_Gallery_Image_Quantity;?>" id="Juna_IT_Photo_Gallery_Image_Quantity_FPG">
					<input type="text" style='display:none;' value="<?php echo $Juna_IT_Image_Gallery_Image_Quantity;?>" id="Juna_IT_Photo_Gallery_Image_Quantity_Hidden_FPG">
					<input type="text" style='display:none;' value="<?php echo $Juna_IT_Image_Gallery_Load_More_hidden;?>" id="Juna_IT_Photo_Gallery_Load_More_hidden_FPG">
					<input type="text" style='display:none;' id="Juna_IT_Photo_Gallery_Hidden_Type_FPG" value="Fansy Photo Gallery">
					<i class='iticons_FPG junaiticons-style junaiticons-fast-backward' onclick="Juna_IT_Photo_Gallery_Fast_Backward_Clicked_FPG()"></i>
					<i class='iticons_FPG junaiticons-style junaiticons-chevron-left' onclick="Juna_IT_Photo_Gallery_Chevron_Left_Clicked_FPG()"></i>
					<span class='BSCount' id="Juna_IT_Photo_Gallery_First_Page_FPG"><?php echo $Juna_IT_Image_Gallery_Per_Page_First;?></span><span class='BSCount' id="Juna_IT_Photo_Gallery_End_Page_FPG"><?php echo $Juna_IT_Image_Gallery_Per_Page_Second;?></span><span id="Juna_IT_Photo_Gallery_Load_More_FPG" onclick="Juna_IT_Photo_Gallery_Load_More_Clicked_FPG()"><?php echo $Juna_IT_Image_Gallery_Load_More;?></span>
					<i class='iticons_FPG junaiticons-style junaiticons-chevron-right' onclick="Juna_IT_Photo_Gallery_Chevron_Right_Clicked_FPG()"></i>
					<i class='iticons_FPG junaiticons-style junaiticons-fast-forward' onclick="Juna_IT_Photo_Gallery_Fast_Forward_Clicked_FPG()"></i>
				</div>
				<input type='text' style='display:none;' class='FPGRoundWidth' value='<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Round_Max_Width; ?>'>
				<input type='text' style='display:none;' class='FPGTitleFontSize' value='<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Title_Font_Siaze; ?>'>
				<input type='text' style='display:none;' class='FPGDescFontSize' value='<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Desc_Font_Size; ?>'>
				<input type='text' style='display:none;' class='FPGLinkFontSize' value='<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Link_Font_Size; ?>'>
				<input type='text' style='display:none;' class='FPGIconsSize' value='<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_FPG_Pag_Size; ?>'>
			<?php
			}
			else if($Juna_IT_Image_Gallery_General_Set[0]->effect_type=='Random Gallery')
 		 	{
			?>
				<style>
					.infoTextTit1{
						position:relative;
						top:50%;
						transform:translateY(-150%);
						-webkit-transform:translateY(-150%);
						transition:all 0.4s;
					}
					.hovhovR:hover .infoTextTit1{
						transform:translateY(-50%) !important;
						-webkit-transform:translateY(-50%) !important;
						transition:all 0.4s;
					}
					.infoTextTit2{
						position:relative;
						top:50%;
						transform:translateY(50%);
						-webkit-transform:translateY(50%);
						transition:all 0.4s;
					}
					.hovhovR:hover .infoTextTit2{
						transform:translateY(-50%) !important;
						-webkit-transform:translateY(-50%) !important;
						transition:all 0.4s;
					}
					.infoTextTit3{
						position:relative;
						top:50%;
						left:50%;
						transform:translateY(-50%)  translateX(-50%);
						-webkit-transform:translateY(-50%) translateX(-50%);
						overflow:hidden;
						width:0%;
						height:0%;
						transition:all 0.4s;
					}
					.hovhovR:hover .infoTextTit3{		
						width:100%;
						height:50%;
						transform:translateY(-50%)  translateX(-50%);
						-webkit-transform:translateY(-50%) translateX(-50%);
						transition:all 0.4s;
					}
					.infoTextTit4{
						position:relative;
						top:50%;
						left:50%;
						transform:translateY(-50%)  translateX(-150%);
						-webkit-transform:translateY(-50%) translateX(-150%);
						overflow:hidden;
						transition:all 0.4s;
					}
					.hovhovR:hover .infoTextTit4{		
						transform:translateY(-50%)  translateX(-50%);
						-webkit-transform:translateY(-50%) translateX(-50%);
						transition:all 0.4s;
					}
					.infoTextTit5{
						position:relative;
						top:50%;
						left:50%;
						transform:translateY(-50%)  translateX(100%);
						-webkit-transform:translateY(-50%) translateX(100%);
						overflow:hidden;
						transition:all 0.4s;
					}
					.hovhovR:hover .infoTextTit5{		
						transform:translateY(-50%)  translateX(-50%);
						-webkit-transform:translateY(-50%) translateX(-50%);
						transition:all 0.4s;
					}
					.infoTextTit6{
						position:relative;
						top:50%;
						transform:translateY(-50%);
						-webkit-transform:translateY(-50%);
						transition:all 0.4s;
					}
					.hovhovR:hover .infoTextTit6{
						transform:translateY(-50%) !important;
						-webkit-transform:translateY(-50%) !important;
						transition:all 0.4s;
					}
					.hovhovR{
						overflow:hidden !important;
					}
					.overLayer1{
						width: <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Width; ?>px;
						height: <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Height; ?>px;
						position: absolute;
						text-align: center;
						background:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Hover_Bg_color; ?> !important;
						margin-top:0px !important;
						opacity: 0;
						top: <?php echo -($Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Height); ?>px;
						left:  <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Place_Between_Images; ?>px;
						z-index: 4;
						transition: all 0.3s linear;
					}
					.hovhovR:hover .overLayer1{
						opacity:<?php echo ($Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Hover_Transparensy)/100; ?>;
						top:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Place_Between_Images; ?>px;
					}
					.overLayer2{
						width: <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Width; ?>px;
						height: 0px;
						position: absolute;
						text-align: center;
						background:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Hover_Bg_color; ?> !important;
						margin-top:0px !important;
						opacity: 0;
						top: 50%;
						left:  <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Place_Between_Images; ?>px;
						z-index: 4;
						transition: all 0.3s linear;
					}
					.hovhovR:hover .overLayer2{
						opacity:<?php echo ($Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Hover_Transparensy)/100; ?>;
						top:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Place_Between_Images; ?>px;
						height:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Height; ?>px;
					}
					.overLayer3{
						width: 0px;
						height: <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Height; ?>px;
						position: absolute;
						text-align: center;
						background:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Hover_Bg_color; ?> !important;
						margin-top:0px !important;
						opacity: 0;
						top: <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Place_Between_Images; ?>px;
						left: 50%;
						z-index: 4;
						transition: all 0.3s linear;
					}
					.hovhovR:hover .overLayer3{
						opacity:<?php echo ($Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Hover_Transparensy)/100; ?>;
						left:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Place_Between_Images; ?>px;
						width:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Width; ?>px;
					}
					.overLayer4{
						width: 0px;
						height: <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Height; ?>px;
						position: absolute;
						text-align: center;
						background:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Hover_Bg_color; ?> !important;
						margin-top:0px !important;
						opacity: 0;
						top: <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Place_Between_Images; ?>px;
						right: 0px;
						z-index: 4;
						transition: all 0.3s linear;
					}
					.hovhovR:hover .overLayer4{
						opacity:<?php echo ($Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Hover_Transparensy)/100; ?>;
						left:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Place_Between_Images; ?>px;
						width:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Width; ?>px;
					}
					.overLayer5{
						width: 0px;
						height: <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Height; ?>px;
						position: absolute;
						text-align: center;
						background:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Hover_Bg_color; ?> !important;
						margin-top:0px !important;
						opacity: 0;
						top: <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Place_Between_Images; ?>px;
						left: <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Place_Between_Images; ?>px;
						z-index: 4;
						transition: all 0.3s linear;
					}
					.hovhovR:hover .overLayer5{
						opacity:<?php echo ($Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Hover_Transparensy)/100; ?>;
						width:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Width; ?>px;
					}
					.overLayer6{
						width: 0px;
						height: 0px;
						position: absolute;
						text-align: center;
						background:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Hover_Bg_color; ?> !important;
						margin-top:0px !important;
						opacity: 0;
						top: 50%;
						left: 50%;
						z-index: 4;
						transition: all 0.3s linear;
					}
					.hovhovR:hover .overLayer6{
						opacity:<?php echo ($Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Hover_Transparensy)/100; ?>;
						left:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Place_Between_Images; ?>px;
						top:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Place_Between_Images; ?>px;
						width:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Width; ?>px;
						height:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Height; ?>px;
					}
					.overLayer{
						background:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Hover_Bg_color; ?> !important;
						width:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Width; ?>px !important;
						height:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Height; ?>px !important;
						left:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Place_Between_Images; ?>px !important;
						margin-top:0px !important;
					}
					.hovhovR:hover .overLayer{
						opacity:<?php echo ($Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Hover_Transparensy)/100; ?> !important;
					}
					
					#contSecRG #fullPreview img{
						max-width: 960px;
						width: 100%;
						margin: 0 auto;
						display: block;
						border:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Popup_Img_Border_Width; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Popup_Img_Border_Color; ?> <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Popup_Img_Border_Style; ?> !important;
						box-shadow:0px 0px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Popup_Img_Box_Shadow; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Popup_Img_Shadow_Color; ?>;
						border-radius:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Popup_Img_Border_Radius; ?>%;
					}
					#contSecRG #fullPreview .fullCaption{
						display:<?php echo $Juna_IT_RG_Desc; ?> !important;
						color:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Desc_Color; ?> !important;
						font-size:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Desc_Font_Size; ?>px !important;
						font-family:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Desc_Font_Family; ?> !important;
						line-height:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Desc_Font_Size; ?>px !important;
						text-align:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Desc_Text_Align; ?> !important;
					}
					#contSecRG #fullPreview figure {
						width: 30px;
						height: 30px;
						position: absolute;
						top: -10px !important;
						right: 0px !important;
						font-size:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Del_Icon_Size; ?>px !important;
						color:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Del_Icon_Color; ?> !important;
						cursor: pointer;
					}
				</style>
				 <section id='contSecRG' style='padding-right:15px;background:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Content_Bg_Color; ?>;border:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Content_Border_Width; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Content_Border_Color; ?> <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Content_Border_Style; ?>;box-shadow:0px 0px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Content_Box_Shadow; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Content_Shadow_Color; ?>'>
					<ul id="gallery" style='list-style:none;'>
					<li id="fullPreview" style='background:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Popup_Background; ?>;border:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Popup_Border_Width; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Popup_Border_Color; ?> <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Popup_Border_Style; ?>;box-shadow:0px 0px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Popup_Box_Shadow; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Popup_Shadow_Color; ?>;'></li>
					<?php
					for($j=0;$j<$Juna_IT_Image_Gallery_Count_Images;$j++)
					{
					?>
						<li class='hovhovR hovhovR<?php echo $j+1; ?>' style='overflow:hidden;display:none;'>
							<a href="<?php echo $Juna_IT_Image_Gallery_Images_URL[$j];?>" style='width:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Width; ?>px;height:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Height; ?>px;left:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Place_Between_Images; ?>px;top:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Place_Between_Images; ?>px;'></a>
							<img data-original="<?php echo $Juna_IT_Image_Gallery_Images_URL[$j];?>" src="<?php echo $Juna_IT_Image_Gallery_Images_URL[$j];?>" alt="Fish" style="display: inline;width:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Width; ?>px;height:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Height; ?>px;border:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Border_Width; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Border_Color; ?> <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Border_Style; ?>;border-radius:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Border_Radius; ?>%;margin:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Place_Between_Images; ?>px;box-shadow:0px 0px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Box_Shadow; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Shadow_Color; ?>">			
							<div class="<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Hover_Effect_Type; ?>" style='border-radius:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Border_Radius; ?>%;margin-top:-2px;'></div>
							<div class="infoLayer" style='width:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Width; ?>px;height:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Height; ?>px;left:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Place_Between_Images; ?>px;top:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Place_Between_Images; ?>px;'>
								<div class='<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Image_Hover_Text_Effect_Type; ?>'>
									<h2 class='infoTitlHeader' style='font-size:15px;color:#fff;width:85%;margin-left:auto;margin-right:auto;border-bottom:1px solid #fff;font-size:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Title_Font_Size; ?>px;font-family:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Title_Font_Family; ?>;color:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Title_Color; ?>;border-bottom:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Line_Width; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Line_Color; ?> <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Line_Style; ?>;margin-top:0px;margin-bottom:5px;'>
										<?php echo $Juna_IT_Image_Gallery_Images_Title[$j]; ?> 
									</h2>
									<p class='titlInfoVP' style='margin:0px;color:#fff;font-size:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Title_Font_Size; ?>px;font-family:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Title_Font_Family; ?>;color:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Title_Color; ?>;' >
										<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_VP_Text; ?>
									</p>
								</div>
							</div>
							<p class="projectInfo">
								<?php echo $Juna_IT_Image_Gallery_Images_Description[$j]; ?>
							</p>
						</li>
					<?php
					}
					?>
					</ul>
					<div id="Juna_IT_Photo_Gallery_Show_All_RG" style="margin:0px;float:left;font-size:20px;color:black;text-align:center;width:100%;font-size:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Pag_Size; ?>px;color:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_RG_Pag_Color; ?>;">
						<input type="text" style='display:none;' value="<?php echo $Juna_IT_Image_Gallery;?>" id="Juna_IT_Photo_Gallery_RG">
						<input type="text" style='display:none;' value="<?php echo $Juna_IT_Image_Gallery_Count_Images;?>" id="Juna_IT_Photo_Gallery_Count_Images_RG">
						<input type="text" style='display:none;' value="<?php echo $Juna_IT_Image_Gallery_Image_Quantity;?>" id="Juna_IT_Photo_Gallery_Image_Quantity_RG">
						<input type="text" style='display:none;' value="<?php echo $Juna_IT_Image_Gallery_Image_Quantity;?>" id="Juna_IT_Photo_Gallery_Image_Quantity_Hidden_RG">
						<input type="text" style='display:none;' value="<?php echo $Juna_IT_Image_Gallery_Load_More_hidden;?>" id="Juna_IT_Photo_Gallery_Load_More_hidden_RG">
						<input type="text" style='display:none;' id="Juna_IT_Photo_Gallery_Hidden_Type_RG" value="Random Gallery">
						<i class='iticons_RG junaiticons-style junaiticons-fast-backward' onclick="Juna_IT_Photo_Gallery_Fast_Backward_Clicked_RG()"></i>
						<i class='iticons_RG junaiticons-style junaiticons-chevron-left' onclick="Juna_IT_Photo_Gallery_Chevron_Left_Clicked_RG()"></i>
						<span class='BSCount' id="Juna_IT_Photo_Gallery_First_Page_RG"><?php echo $Juna_IT_Image_Gallery_Per_Page_First;?></span><span class='BSCount' id="Juna_IT_Photo_Gallery_End_Page_RG"><?php echo $Juna_IT_Image_Gallery_Per_Page_Second;?></span><span id="Juna_IT_Photo_Gallery_Load_More_RG" onclick="Juna_IT_Photo_Gallery_Load_More_Clicked_RG()"><?php echo $Juna_IT_Image_Gallery_Load_More;?></span>
						<i class='iticons_RG junaiticons-style junaiticons-chevron-right' onclick="Juna_IT_Photo_Gallery_Chevron_Right_Clicked_RG()"></i>
						<i class='iticons_RG junaiticons-style junaiticons-fast-forward' onclick="Juna_IT_Photo_Gallery_Fast_Forward_Clicked_RG()"></i>
					</div>
				</section>
				
				<input type='text' style='display:none;' class='RGIconsType' value='<?php echo $Juna_IT_Image_RG_Del_Icon_Type; ?>'>
				<script src="<?php echo plugins_url('/Scripts/least.min.js',__FILE__) ?>"></script>
				<script>
					jQuery(document).ready(function(){
						jQuery('#gallery').least();
					});
				</script>   
			<?php
			}
			else if($Juna_IT_Image_Gallery_General_Set[0]->effect_type=='Tumbnails Gallery')
 		 	{
			?>
			
				<script>
					jQuery(document).ready(function(){
						//Examples of how to assign the Colorbox event to elements
						jQuery(".group1").colorbox({rel:'group1'});
						jQuery(".group2").colorbox({rel:'group2', transition:"fade"});
						jQuery(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
						jQuery(".group4").colorbox({rel:'group4', slideshow:<?php echo $Juna_IT_TG_Sl_Slideshow_Show; ?>,transition:"<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Sl_Effect_Type; ?>", width:"<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Pop_Content_Width; ?>%", height:"<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Pop_Content_Height; ?>%",speed:100*parseInt(<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Sl_Chenge_Time; ?>),slideshowSpeed: 1000*parseInt(<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Sl_Slideshow_Time; ?>),slideshowAuto: <?php echo $Juna_IT_TG_Sl_Slideshow_Auto_Show; ?>,slideshowStart: "<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Sl_Slideshow_Star_Text; ?>",slideshowStop: "<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Sl_Slideshow_Stop_Text; ?>",});

						
						
						//Example of preserving a JavaScript event for inline calls.
						jQuery("#click").click(function(){ 
							jQuery('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
							return false;
						});
					});
				</script>
				<style>
				
				#cboxNext19{position:absolute; top:50%; right:5px; margin-top:-32px; background:url(<?php echo plugins_url('/Images/controls.png',__FILE__) ?>) no-repeat top right; width:28px; height:65px; text-indent:-9999px;}
				#cboxNext19:hover{background-position:bottom right;}
				#cboxNext1{position:absolute; top:50%; right:5px; margin-top:-32px; background:url("<?php echo plugins_url('/Images/Icons Image/icon-1-1.png',__FILE__) ?>") no-repeat; width:40px; height:40px; text-indent:-9999px;background-position:100% 100%;}
				#cboxNext2{position:absolute; top:50%; right:5px; margin-top:-32px; background:url("<?php echo plugins_url('/Images/Icons Image/icon-2-2.png',__FILE__) ?>") no-repeat; width:40px; height:40px; text-indent:-9999px;background-position:100% 100%;}
				#cboxNext3{position:absolute; top:50%; right:5px; margin-top:-32px; background:url("<?php echo plugins_url('/Images/Icons Image/icon-3-3.png',__FILE__) ?>") no-repeat; width:40px; height:40px; text-indent:-9999px;background-position:100% 100%;}
				#cboxNext4{position:absolute; top:50%; right:5px; margin-top:-32px; background:url("<?php echo plugins_url('/Images/Icons Image/icon-4-4.png',__FILE__) ?>") no-repeat; width:40px; height:40px; text-indent:-9999px;background-position:100% 100%;}
				#cboxNext5{position:absolute; top:50%; right:5px; margin-top:-32px; background:url("<?php echo plugins_url('/Images/Icons Image/icon-5-5.png',__FILE__) ?>") no-repeat; width:40px; height:40px; text-indent:-9999px;background-position:100% 100%;}
				#cboxNext6{position:absolute; top:50%; right:5px; margin-top:-32px; background:url("<?php echo plugins_url('/Images/Icons Image/icon-6-6.png',__FILE__) ?>") no-repeat; width:40px; height:40px; text-indent:-9999px;background-position:100% 100%;}
				#cboxNext7{position:absolute; top:50%; right:5px; margin-top:-32px; background:url("<?php echo plugins_url('/Images/Icons Image/icon-7-7.png',__FILE__) ?>") no-repeat; width:40px; height:40px; text-indent:-9999px;background-position:100% 100%;}
				#cboxNext8{position:absolute; top:50%; right:5px; margin-top:-32px; background:url("<?php echo plugins_url('/Images/Icons Image/icon-8-8.png',__FILE__) ?>") no-repeat; width:40px; height:40px; text-indent:-9999px;background-position:100% 100%;}
				#cboxNext9{position:absolute; top:50%; right:5px; margin-top:-32px; background:url("<?php echo plugins_url('/Images/Icons Image/icon-9-9.png',__FILE__) ?>") no-repeat; width:40px; height:40px; text-indent:-9999px;background-position:100% 100%;}
				#cboxNext10{position:absolute; top:50%; right:5px; margin-top:-32px; background:url("<?php echo plugins_url('/Images/Icons Image/icon-10-10.png',__FILE__) ?>") no-repeat; width:40px; height:40px; text-indent:-9999px;background-position:100% 100%;}
				#cboxNext11{position:absolute; top:50%; right:5px; margin-top:-32px; background:url("<?php echo plugins_url('/Images/Icons Image/icon-11-11.png',__FILE__) ?>") no-repeat; width:40px; height:40px; text-indent:-9999px;background-position:100% 100%;}
				#cboxNext12{position:absolute; top:50%; right:5px; margin-top:-32px; background:url("<?php echo plugins_url('/Images/Icons Image/icon-12-12.png',__FILE__) ?>") no-repeat; width:40px; height:40px; text-indent:-9999px;background-position:100% 100%;}
				#cboxNext13{position:absolute; top:50%; right:5px; margin-top:-32px; background:url("<?php echo plugins_url('/Images/Icons Image/icon-13-13.png',__FILE__) ?>") no-repeat; width:40px; height:40px; text-indent:-9999px;background-position:100% 100%;}
				#cboxNext14{position:absolute; top:50%; right:5px; margin-top:-32px; background:url("<?php echo plugins_url('/Images/Icons Image/icon-14-14.png',__FILE__) ?>") no-repeat; width:40px; height:40px; text-indent:-9999px;background-position:100% 100%;}
				#cboxNext15{position:absolute; top:50%; right:5px;transform:translateY(-50%);-webkit-transform:translateY(-50%); background:url("<?php echo plugins_url('/Images/Icons Image/icon-15-15.png',__FILE__) ?>") no-repeat; padding-right:0px;  width:35px; height:60px; text-indent:-9999px;background-size:100% 100%;}
				#cboxNext16{position:absolute; top:50%; right:5px; margin-top:-32px; background:url("<?php echo plugins_url('/Images/Icons Image/icon-16-16.png',__FILE__) ?>") no-repeat; width:40px; height:40px; text-indent:-9999px;background-position:100% 100%;}
				#cboxNext17{position:absolute; top:50%; right:5px; margin-top:-32px; background:url("<?php echo plugins_url('/Images/Icons Image/icon-17-17.png',__FILE__) ?>") no-repeat; width:40px; height:40px; text-indent:-9999px;background-position:100% 100%;}
				#cboxNext18{position:absolute; top:50%; right:5px; margin-top:-32px; background:url("<?php echo plugins_url('/Images/Icons Image/icon-18-18.png',__FILE__) ?>") no-repeat; width:40px; height:40px; text-indent:-9999px;background-position:100% 100%;}
				
				#cboxPrevious19{position:absolute; top:50%; left:5px; margin-top:-32px; background:url(<?php echo plugins_url('/Images/controls.png',__FILE__) ?>) no-repeat top left; width:28px; height:65px; text-indent:-9999px;}
				#cboxPrevious19:hover{background-position:bottom left;}
				
				#cboxPrevious1{position:absolute; top:50%; left:-18px;padding-left:0px; margin-top:-32px; background:url("<?php echo plugins_url('/Images/Icons Image/icon-1.png',__FILE__) ?>") no-repeat; width:40px; height:40px; text-indent:-9999px;background-position:100% 100%;}
				#cboxPrevious2{position:absolute; top:50%; left:-18px;padding-left:0px; margin-top:-32px; background:url("<?php echo plugins_url('/Images/Icons Image/icon-2.png',__FILE__) ?>") no-repeat; width:40px; height:40px; text-indent:-9999px;background-position:100% 100%;}
				#cboxPrevious3{position:absolute; top:50%; left:-18px;padding-left:0px; margin-top:-32px; background:url("<?php echo plugins_url('/Images/Icons Image/icon-3.png',__FILE__) ?>") no-repeat; width:40px; height:40px; text-indent:-9999px;background-position:100% 100%;}
				#cboxPrevious4{position:absolute; top:50%; left:-18px;padding-left:0px; margin-top:-32px; background:url("<?php echo plugins_url('/Images/Icons Image/icon-4.png',__FILE__) ?>") no-repeat; width:40px; height:40px; text-indent:-9999px;background-position:100% 100%;}
				#cboxPrevious4{position:absolute; top:50%; left:-18px;padding-left:0px; margin-top:-32px; background:url("<?php echo plugins_url('/Images/Icons Image/icon-4.png',__FILE__) ?>") no-repeat; width:40px; height:40px; text-indent:-9999px;background-position:100% 100%;}
				#cboxPrevious5{position:absolute; top:50%; left:-18px;padding-left:0px; margin-top:-32px; background:url("<?php echo plugins_url('/Images/Icons Image/icon-5.png',__FILE__) ?>") no-repeat; width:28px; width:40px; height:40px; text-indent:-9999px;background-position:100% 100%;}
				#cboxPrevious6{position:absolute; top:50%; left:-18px;padding-left:0px; margin-top:-32px; background:url("<?php echo plugins_url('/Images/Icons Image/icon-6.png',__FILE__) ?>") no-repeat; width:40px; height:40px; text-indent:-9999px;background-position:100% 100%;}
				#cboxPrevious7{position:absolute; top:50%; left:-18px;padding-left:0px; margin-top:-32px; background:url("<?php echo plugins_url('/Images/Icons Image/icon-7.png',__FILE__) ?>") no-repeat; width:40px; height:40px; text-indent:-9999px;background-position:100% 100%;}
				#cboxPrevious8{position:absolute; top:50%; left:-18px;padding-left:0px; margin-top:-32px; background:url("<?php echo plugins_url('/Images/Icons Image/icon-8.png',__FILE__) ?>") no-repeat; width:40px; height:40px; text-indent:-9999px;background-position:100% 100%;}
				#cboxPrevious9{position:absolute; top:50%; left:-18px;padding-left:0px; margin-top:-32px; background:url("<?php echo plugins_url('/Images/Icons Image/icon-9.png',__FILE__) ?>") no-repeat; width:40px; height:40px; text-indent:-9999px;background-position:100% 100%;}
				#cboxPrevious10{position:absolute; top:50%; left:-18px;padding-left:0px; margin-top:-32px; background:url("<?php echo plugins_url('/Images/Icons Image/icon-10.png',__FILE__) ?>") no-repeat; width:40px; height:40px; text-indent:-9999px;background-position:100% 100%;}
				#cboxPrevious11{position:absolute; top:50%; left:-18px;padding-left:0px; margin-top:-32px; background:url("<?php echo plugins_url('/Images/Icons Image/icon-11.png',__FILE__) ?>") no-repeat; width:40px; height:40px; text-indent:-9999px;background-position:100% 100%;}
				#cboxPrevious12{position:absolute; top:50%; left:-18px;padding-left:0px; margin-top:-32px; background:url("<?php echo plugins_url('/Images/Icons Image/icon-12.png',__FILE__) ?>") no-repeat; width:40px; height:40px; text-indent:-9999px;background-position:100% 100%;}
				#cboxPrevious13{position:absolute; top:50%; left:-18px;padding-left:0px; margin-top:-32px; background:url("<?php echo plugins_url('/Images/Icons Image/icon-13.png',__FILE__) ?>") no-repeat; width:40px; height:40px; text-indent:-9999px;background-position:100% 100%;}
				#cboxPrevious14{position:absolute; top:50%; left:-18px;padding-left:0px; margin-top:-32px; background:url("<?php echo plugins_url('/Images/Icons Image/icon-14.png',__FILE__) ?>") no-repeat;  width:40px; height:40px; text-indent:-9999px;background-position:100% 100%;}
				#cboxPrevious15{position:absolute; top:50%; left:5px;padding-left:0px;transform:translateY(-50%);-webkit-transform:translateY(-50%);  background:url("<?php echo plugins_url('/Images/Icons Image/icon-15.png',__FILE__) ?>") no-repeat; width:35px; height:60px; text-indent:-9999px;background-size:100% 100%;}
				#cboxPrevious16{position:absolute; top:50%; left:-18px;padding-left:0px; margin-top:-32px; background:url("<?php echo plugins_url('/Images/Icons Image/icon-16.png',__FILE__) ?>") no-repeat; width:40px; height:40px; text-indent:-9999px;background-position:100% 100%;}
				#cboxPrevious17{position:absolute; top:50%; left:-18px;padding-left:0px; margin-top:-32px; background:url("<?php echo plugins_url('/Images/Icons Image/icon-17.png',__FILE__) ?>") no-repeat; width:40px; height:40px; text-indent:-9999px;background-position:100% 100%;}
				#cboxPrevious18{position:absolute; top:50%; left:-18px;padding-left:0px; margin-top:-32px; background:url("<?php echo plugins_url('/Images/Icons Image/icon-18.png',__FILE__) ?>") no-repeat; width:40px; height:40px; text-indent:-9999px;background-position:100% 100%;}
				
				#cboxClose{position:absolute; top:5px; right:5px; display:block; background:url(<?php echo plugins_url('/Images/controls.png',__FILE__) ?>) no-repeat top center; width:38px; height:19px; text-indent:-9999px;}
				#cboxLoadingGraphic{background:url(<?php echo plugins_url('/Images/loading_1.gif',__FILE__) ?>) no-repeat center center;}
				#cboxOverlay{background:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Pop_Overlay_Bg_Color; ?>; opacity: <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Pop_Overlay_Transparency/100; ?> !important; filter: alpha(opacity = 90);}
				#cboxLoadedContent{border:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Pop_Content_Border_Width; ?>px solid <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Pop_Content_Border_Color; ?>; background:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Pop_Content_Bg_Color; ?>;}
				#cboxSlideshow{position:absolute; top:100%; right:10px; color:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Sl_SSH_Text_Color; ?>;font-size:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Sl_SSH_Text_Font_Size; ?>px;font-family:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Sl_SSH_Text_Font_Family; ?>;}
				#cboxTitle{position:absolute; top:-25px; left:0; color:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Sl_SSH_Text_Color; ?>;font-size:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Sl_SSH_Text_Font_Size; ?>px;font-family:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Sl_SSH_Text_Font_Family; ?>;}
				#cboxCurrent{position:absolute; top:-25px; right:0px; color:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Sl_SSH_Text_Color; ?>;font-size:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Sl_SSH_Text_Font_Size; ?>px;font-family:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Sl_SSH_Text_Font_Family; ?>;}
				
				
				
				
				
				
				
				
				
				
				
				.highslide {
					position:relative !important;
					outline: none !important;
					text-decoration: none;
					display:block;
					float:left !important;
				
					overflow:hidden !important;
				}
				.highslide:hover{
					cursor:pointer;
				}
				.PImg1{
					position:relative !important;
					width:120% !important;
					height:120% !important;
					left:-10% !important;
					top:-10% !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Effect_Transition/10; ?>s linear !important;
				}
				.highslide:hover .PImg1{
					width:100% !important;
					height:100% !important;
					left:0% !important;
					top:0% !important;
				}
				.PImg2{
					position:relative !important;
					width:100% !important;
					height:100% !important;
					left:0% !important;
					top:0% !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Effect_Transition/10; ?>s linear !important;
				}
				.highslide:hover .PImg2{
					width:120% !important;
					height:120% !important;
					left:-10% !important;
					top:-10% !important;
				}
				.PImg3{
					position:relative !important;
					width:120% !important;
					height:100% !important;
					left:-20% !important;
					top:0% !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Effect_Transition/10; ?>s linear !important;
				}
				.highslide:hover .PImg3{
					left:0% !important;
				}
				.PImg4{
					position:relative !important;
					width:120% !important;
					height:100% !important;
					right:0% !important;
					top:0% !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Effect_Transition/10; ?>s linear !important;
				}
				.highslide:hover .PImg4{
					right:20% !important;
				}
				.PImg5{
					position:relative !important;
					width:100% !important;
					height:120% !important;
					left:0% !important;
					top:-20% !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Effect_Transition/10; ?>s linear !important;
				}
				.highslide:hover .PImg5{
					top:0% !important;
				}
				.PImg6{
					position:relative !important;
					width:100% !important;
					height:120% !important;
					left:0% !important;
					top:0% !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Effect_Transition/10; ?>s linear !important;
				}
				.highslide:hover .PImg6{
					top:-20% !important;
				}
				.PImg7{
					position:relative !important;
					width:100% !important;
					height:100% !important;
					left:0% !important;
					top:0% !important;
				}
				

				
				.overLayPop1{
					position:absolute !important;
					top:0% !important;
					left:0% !important;
					width:100% !important;
					height:100% !important;
					background:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Bg_Color; ?> !important;
					opacity:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Transparency/100; ?> !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Effect_Transition/10; ?>s linear !important;
				}
				.highslide:hover .overLayPop1{
					background:#000 !important;
				}
				
				.overLayPop2{
					position:absolute !important;
					top:0% !important;
					left:0% !important;
					width:100% !important;
					height:100% !important;
					background:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Bg_Color; ?> !important;
					opacity:0 !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Effect_Transition/10; ?>s linear !important;
				}
				.highslide:hover .overLayPop2{
					opacity:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Transparency/100; ?> !important;
				}
				.overLayPop3{
					position:absolute !important;
					top:0% !important;
					left:100% !important;
					width:100% !important;
					height:100% !important;
					background:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Bg_Color; ?> !important;
					opacity:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Transparency/100; ?> !important;
					transform:rotate(-90deg) !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Effect_Transition/10; ?>s linear !important;
				}
				.highslide:hover .overLayPop3{
					left:0% !important;
					top:0% !important;
					transform:rotate(0deg) !important;
				}
				.overLayPop4{
					position:absolute !important;
					top:0% !important;
					left:100% !important;
					width:100% !important;
					height:100% !important;
					background:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Bg_Color; ?> !important;
					opacity:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Transparency/100; ?> !important;
					transform:rotateY(-180deg) !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Effect_Transition/10; ?>s linear !important;
				}
				.highslide:hover .overLayPop4{
					left:0% !important;
					top:0% !important;
					transform:rotateY(0deg) !important;
				}
				.overLayPop5{
					position:absolute !important;
					top:50% !important;
					left:50% !important;
					width:0% !important;
					height:0% !important;
					background:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Bg_Color; ?> !important;
					opacity:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Transparency/100; ?> !important;
					transform:translateY(-50%) translateX(-50%) rotate(-180deg) !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Effect_Transition/10; ?>s linear !important;
				}
				.highslide:hover .overLayPop5{
					left:0% !important;
					top:0% !important;
					width:100% !important;
					height:100% !important;
					transform:rotate(0deg) !important;
				}
				.overLayPop6{
					position:absolute !important;
					top:50% !important;
					left:50% !important;
					width:0% !important;
					height:0% !important;
					background:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Bg_Color; ?> !important;
					opacity:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Transparency/100; ?> !important;
					transform:translateY(-50%) translateX(-50%) rotateX(-180deg) !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Effect_Transition/10; ?>s linear !important;
				}
				.highslide:hover .overLayPop6{
					width:100% !important;
					height:100% !important;
					transform:translateY(-50%) translateX(-50%) rotateX(0deg) !important;
				}
				.overLayPop7{
					position:absolute !important;
					top:50% !important;
					left:50% !important;
					width:0% !important;
					height:0% !important;
					background:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Bg_Color; ?> !important;
					opacity:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Transparency/100; ?> !important;
					transform:translateY(-50%) translateX(-50%) rotateY(-180deg) !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Effect_Transition/10; ?>s linear !important;
				}
				.highslide:hover .overLayPop7{
					width:100% !important;
					height:100% !important;
					transform:translateY(-50%) translateX(-50%) rotateY(0deg) !important;
				}
				.overLayPop8{
					position:absolute !important;
					top:50% !important;
					left:50% !important;
					width:0% !important;
					height:0% !important;
					background:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Bg_Color; ?> !important;
					opacity:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Transparency/100; ?> !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Effect_Transition/10; ?>s linear !important;
				}
				.highslide:hover .overLayPop8{
					left:0% !important;
					top:0% !important;
					width:100% !important;
					height:100% !important;
				}
				.overLayPop9{
					position:absolute !important;
					top:50% !important;
					left:0% !important;
					width:100% !important;
					height:0% !important;
					background:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Bg_Color; ?> !important;
					visibility:hidden !important;
					opacity:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Transparency/100; ?> !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Effect_Transition/10; ?>s linear !important;
				}
				.highslide:hover .overLayPop9{
					top:0% !important;
					height:100% !important;
					visibility:visible !important;
				}
				.overLayPop10{
					position:absolute !important;
					top:0% !important;
					left:50% !important;
					width:0% !important;
					height:100% !important;
					background:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Bg_Color; ?> !important;
					opacity:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Transparency/100; ?> !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Effect_Transition/10; ?>s linear !important;
				}
				.highslide:hover .overLayPop10{
					left:0% !important;
					width:100% !important;
				}
				.overLayPop11{
					position:absolute !important;
					top:-100% !important;
					left:0% !important;
					width:100% !important;
					height:100% !important;
					background:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Bg_Color; ?> !important;
					opacity:0 !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Effect_Transition/10; ?>s linear !important;
				}
				.highslide:hover .overLayPop11{
					top:0% !important;
					opacity:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Transparency/100; ?> !important;
				}
				.overLayPop12{
					position:absolute !important;
					top:0% !important;
					left:0% !important;
					width:100% !important;
					height:100% !important;
					border:20px solid <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Bg_Color; ?> !important;
					opacity:0 !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Effect_Transition/10; ?>s linear !important;
				}
				.highslide:hover .overLayPop12{
					opacity:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Transparency/100; ?> !important;
				}
				.overLayPop13{
					position:absolute !important;
					top:0% !important;
					left:0% !important;
					width:100% !important;
					height:100% !important;
					border:20px solid <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Bg_Color; ?> !important;
					opacity:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Transparency/100; ?> !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Effect_Transition/10; ?>s linear !important;
				}
				.overLayPop14{
					position:absolute !important;
					top:0% !important;
					left:0% !important;
					width:100% !important;
					height:100% !important;
					background:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Bg_Color; ?> !important;
					opacity:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Transparency/100; ?> !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Effect_Transition/10; ?>s linear !important;
				}
				
				.overlayPopTitl1{
					position:absolute !important;
					top:-55% !important;
					width:100% !important;
					font-size:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Title_Font_Size; ?>px !important;
					color:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Title_Color; ?> !important;
					padding:5px 0px !important;
					text-align:center !important;
					background:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Title_Bg_Color; ?> !important;
					opacity:0.7 !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Title_Effect_Transition/10; ?>s linear !important;
				}
				.highslide:hover .overlayPopTitl1{
					top:5% !important;
				}
				.overlayPopTitl2{
					position:absolute !important;
					top:5% !important;
					left:100% !important;
					transform:rotate(-90deg) !important;
					width:100% !important;
					font-size:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Title_Font_Size; ?>px !important;
					color:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Title_Color; ?> !important;
					padding:5px 0px !important;
					text-align:center !important;
					background:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Title_Bg_Color; ?> !important;
					opacity:0.7 !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Title_Effect_Transition/10; ?>s linear !important;
				}
				.highslide:hover .overlayPopTitl2{
					left:0% !important;
					transform:rotate(0deg) !important;
				}
				.overlayPopTitl3{
					position:absolute !important;
					top:10% !important;
					left:15% !important;
					width:70% !important;
					font-size:12px !important;
					color:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Title_Color; ?> !important;
					padding:0px 0px !important;
					text-align:center !important;
					background:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Title_Bg_Color; ?> !important;
					opacity:0 !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Title_Effect_Transition/10; ?>s linear !important;
				}
				.highslide:hover .overlayPopTitl3{
					left:0% !important;
					top:5% !important;
					width:100% !important;
					font-size:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Title_Font_Size; ?>px !important;
					opacity:0.7 !important;
					padding:5px 0px !important;
				}
				
				.overlayPopTitl4{
					position:absolute !important;
					top:25% !important;
					left:0% !important;
					width:100% !important;
					font-size:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Title_Font_Size; ?>px !important;
					color:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Title_Color; ?> !important;
					padding:5px 0px !important;
					text-align:center !important;
					background:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Title_Bg_Color; ?> !important;
					opacity:0.7 !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Title_Effect_Transition/10; ?>s linear !important;
				}
				.highslide:hover .overlayPopTitl4{
					top:5% !important;
				}
				.overlayPopTitl5{
					position:absolute !important;
					top:5% !important;
					width:100% !important;
					font-size:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Title_Font_Size; ?>px !important;
					color:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Title_Color; ?> !important;
					padding:5px 0px !important;
					text-align:center !important;
					background:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Title_Bg_Color; ?> !important;
					opacity:0.7 !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Title_Effect_Transition/10; ?>s linear !important;
				}
				.overlayPopTitl6{
					position:absolute !important;
					top:50% !important;
					left:0% !important;
					width:100% !important;
					display:inline !important;
					padding:0px !important;
					margin:0px !important;
					transform:translateY(-50%) !important;
					font-size:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Title_Font_Size; ?>px !important;
					color:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Title_Color; ?> !important;
					text-align:center !important;
					opacity:1 !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Title_Effect_Transition/10; ?>s linear !important;
				}
				.highslide:hover .overlayPopTitl6{
					font-size:8px !important;
					opacity:0 !important;
				}
				.overlayPopTitl7{
					position:absolute !important;
					top:100% !important;
					left:0% !important;
					width:100% !important;
					background:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Title_Bg_Color; ?> !important;
					font-size:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Title_Font_Size; ?>px !important;
					color:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Title_Color; ?> !important;
					text-align:center !important;
					transform:translateY(0%);
					opacity:0.7 !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Title_Effect_Transition/10; ?>s linear !important;
				}
				.highslide:hover .overlayPopTitl7{
					transform:translateY(-100%);
				}
				.overlayPopTitl8{
					position:absolute !important;
					top:50% !important;
					right:0% !important;
					width:85% !important;
					display:inline !important;
					padding:0px !important;
					margin:0px !important;
					transform:translateY(-50%) !important;
					font-size:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Title_Font_Size; ?>px !important;
					color:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Title_Color; ?> !important;
					text-align:left !important;
					opacity:1 !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Title_Effect_Transition/10; ?>s linear !important;
				}
				.overlayPopTitl9{
					position:absolute !important;
					top:40% !important;
					left:0% !important;
					width:100% !important;
					display:inline !important;
					padding:0px !important;
					margin:0px !important;
					transform:translateY(-50%) !important;
					font-size:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Title_Font_Size; ?>px !important;
					color:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Title_Color; ?> !important;
					text-align:center !important;
					opacity:1 !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Title_Effect_Transition/10; ?>s linear !important;
				}
				.overlayPopTitl10{
					position:absolute !important;
					top:20% !important;
					left:0% !important;
					width:0% !important;
					display:inline !important;
					padding:0px !important;
					margin:0px !important;
					left:50% !important;
					font-size:0px !important;
					color:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Title_Color; ?> !important;
					text-align:center !important;
					opacity:1 !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Title_Effect_Transition/10; ?>s linear !important;
				}
				.highslide:hover .overlayPopTitl10{
					width:100% !important;
					top:30% !important;
					left:0% !important;
					font-size:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Title_Font_Size; ?>px !important;
				}
				.overlayPopTitl11{
					position:absolute !important;
					top:20% !important;
					left:10% !important;
					width:40% !important;
					display:inline !important;
					transform:translateX(0%) !important;
					padding:0px !important;
					margin:0px !important;
					font-size:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Title_Font_Size; ?>px !important;
					color:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Title_Color; ?> !important;
					text-align:center !important;
					opacity:0 !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Title_Effect_Transition/10; ?>s linear !important;
				}
				.highslide:hover .overlayPopTitl11{
					top:30% !important;
					left:50% !important;
					transform:translateX(-50%) !important;
					opacity:1 !important;
				}
				
				.overlayPopLine1{
					position:absolute !important;
					width:10% !important;
					height:10% !important;
					border:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Line_Width; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Line_Color; ?> <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Line_Style; ?> !important;
					top:50% !important;
					left:50% !important;
					opacity:0 !important;
					transform:translateY(-50%) translateX(-50%) !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Line_Effect_Transition/10; ?>s linear !important;
				}
				.highslide:hover .overlayPopLine1{
					width:90% !important;
					height:90% !important;
					opacity:1 !important;
				}
				
				.overlayPopLine2{
					position:absolute !important;
					width:110% !important;
					height:110% !important;
					border:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Line_Width; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Line_Color; ?> <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Line_Style; ?> !important;
					top:50% !important;
					left:50% !important;
					opacity:0 !important;
					transform:translateY(-50%) translateX(-50%) !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Line_Effect_Transition/10; ?>s linear !important;
				}
				.highslide:hover .overlayPopLine2{
					width:90% !important;
					height:90% !important;
					opacity:1 !important;
				}
				.overlayPopLine3{
					position:absolute !important;
					width:90% !important;
					height:90% !important;
					border:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Line_Width; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Line_Color; ?> <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Line_Style; ?> !important;
					border-right:0px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Line_Color; ?> <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Line_Style; ?> !important;
					top:50% !important;
					left:40% !important;
					opacity:0 !important;
					transform:translateY(-50%) translateX(-50%) !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Line_Effect_Transition/10; ?>s linear !important;
				}
				.highslide:hover .overlayPopLine3{
					left:50% !important;
					opacity:1 !important;
				}
				.overlayPopLine4{
					position:absolute !important;
					width:0% !important;
					height:0% !important;
					border:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Line_Width; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Line_Color; ?> <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Line_Style; ?> !important;
					top:50% !important;
					left:10% !important;
					opacity:0 !important;
					transform:translateY(-50%) translateX(0%) !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Line_Effect_Transition/10; ?>s linear !important;
				}
				.highslide:hover .overlayPopLine4{
					width:80% !important;
					opacity:1 !important;
				}
				.overlayPopLine5{
					position:absolute !important;
					width:0% !important;
					height:90% !important;
					border-top:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Line_Width; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Line_Color; ?> <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Line_Style; ?> !important;
					border-bottom:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Line_Width; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Line_Color; ?> <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Line_Style; ?> !important;
					top:50% !important;
					left:50% !important;
					opacity:0 !important;
					transform:translateY(-50%) translateX(-50%) !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Line_Effect_Transition/10; ?>s linear !important;
				}
				.highslide:hover .overlayPopLine5{
					width:80% !important;
					opacity:1 !important;
				}
				.overlayPopLine6{
					position:absolute !important;
					width:120px !important;
					height:120px !important;
					border:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Line_Width; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Line_Color; ?> <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Line_Style; ?> !important;
					border-radius:50% !important;
					top:100% !important;
					left:100% !important;
					opacity:0 !important;
					transform:translateY(-50%) translateX(-50%) !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Line_Effect_Transition/10; ?>s linear !important;
				}
				.highslide:hover .overlayPopLine6{
					top:50% !important;
					left:50% !important;
					opacity:1 !important;
				}
				.overlayPopLine7{
					position:absolute !important;
					width:0px !important;
					height:0px !important;
					border:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Line_Width; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Line_Color; ?> <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Line_Style; ?> !important;
					top:50% !important;
					left:50% !important;
					opacity:0 !important;
					transform:translateY(-50%) translateX(-50%) rotate(0deg) !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Line_Effect_Transition/10; ?>s linear !important;
				}
				.highslide:hover .overlayPopLine7{
					width:100px !important;
					height:100px !important;
					transform:translateY(-50%) translateX(-50%) rotate(45deg) !important;
					opacity:1 !important;
				}
				
				.overlayPopLink1{
					position:absolute !important;
					top:40% !important;
					left:50% !important;
					transform:translateX(-50%) !important;
					font-size:0px !important;
					color:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Link_Color; ?> !important;
					padding:5px 0px !important;
					text-align:center !important;
					opacity:1 !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Link_Effect_Transition/10; ?>s linear !important;
				}
				.highslide:hover .overlayPopLink1{
					font-size:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Link_Font_Size; ?>px !important;
				}
				.overlayPopLink2{
					position:absolute !important;
					top:40% !important;
					left:50% !important;
					transform:translateX(-50%) !important;
					font-size:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Link_Font_Size+10; ?>px !important;
					color:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Link_Color; ?> !important;
					padding:5px 0px !important;
					text-align:center !important;
					opacity:0 !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Link_Effect_Transition/10; ?>s linear !important;
				}
				.highslide:hover .overlayPopLink2{
					font-size:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Link_Font_Size; ?>px !important;
					opacity:1 !important;
				}
				.overlayPopLink3{
					position:absolute !important;
					top:70% !important;
					left:5% !important;
					font-size:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Link_Font_Size; ?>px !important;
					color:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Link_Color; ?> !important;
					padding:5px 0px !important;
					text-align:center !important;
					opacity:0 !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Link_Effect_Transition/10; ?>s linear !important;
				}
				.highslide:hover .overlayPopLink3{
					left:15% !important;
					opacity:1 !important;
				}
				.overlayPopLink4{
					position:absolute !important;
					top:50% !important;
					left:90% !important;
					transform:translateX(-50%) !important;
					font-size:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Link_Font_Size; ?>px !important;
					color:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Link_Color; ?> !important;
					padding:5px 0px !important;
					text-align:center !important;
					opacity:0 !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Link_Effect_Transition/10; ?>s linear !important;
				}
				.highslide:hover .overlayPopLink4{
					left:50% !important;
					opacity:1 !important;
				}
				.overlayPopLink5{
					position:absolute !important;
					top:80% !important;
					left:50% !important;
					transform:translateX(-50%) !important;
					font-size:0px !important;
					color:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Link_Color; ?> !important;
					padding:5px 0px !important;
					text-align:center !important;
					opacity:0 !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Link_Effect_Transition/10; ?>s linear !important;
				}
				.highslide:hover .overlayPopLink5{
					top:50% !important;
					font-size:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Link_Font_Size; ?>px !important;
					opacity:1 !important;
				}
				.overlayPopLink6{
					position:absolute !important;
					top:50% !important;
					left:40% !important;
					transform:translateX(-50%) !important;
					font-size:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Link_Font_Size; ?>px !important;
					color:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Link_Color; ?> !important;
					padding:5px 0px !important;
					text-align:center !important;
					opacity:0 !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Link_Effect_Transition/10; ?>s linear !important;
				}
				.highslide:hover .overlayPopLink6{
					left:50% !important;
					opacity:1 !important;
				}
				.overlayPopLink7{
					position:absolute !important;
					top:60% !important;
					left:50% !important;
					transform:translateX(-50%) !important;
					font-size:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Link_Font_Size; ?>px !important;
					color:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Link_Color; ?> !important;
					padding:0px 7px !important;
					border:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Link_Border_Width; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Link_Border_Color; ?> <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Link_Border_Style; ?> !important;
					text-align:center !important;
					opacity:0 !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Link_Effect_Transition/10; ?>s linear !important;
				}
				.highslide:hover .overlayPopLink7{
					opacity:1 !important;
				}
				.overlayPopLink8{
					position:absolute !important;
					top:-100% !important;
					left:50% !important;
					transform:translateX(-50%) !important;
					font-size:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Link_Font_Size; ?>px !important;
					color:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Link_Color; ?> !important;
					padding:0px 7px !important;
					border:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Link_Border_Width; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Link_Border_Color; ?> <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Link_Border_Style; ?> !important;
					text-align:center !important;
					opacity:1 !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Link_Effect_Transition/10; ?>s linear !important;
				}
				.highslide:hover .overlayPopLink8{
					opacity:1 !important;
					top:60% !important;
				}
				.overlayPopLink9{
					position:absolute !important;
					top:60% !important;
					left:50% !important;
					transform:translateX(-50%) !important;
					font-size:0px !important;
					color:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Link_Color; ?> !important;
					padding:0px 7px !important;
					border:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Link_Border_Width; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Link_Border_Color; ?> <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Link_Border_Style; ?> !important;
					text-align:center !important;
					opacity:0 !important;
					transition: all <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Link_Effect_Transition/10; ?>s linear !important;
				}
				.highslide:hover .overlayPopLink9{
					opacity:1 !important;
					font-size:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Link_Font_Size; ?>px !important;
				}
				
				.TGLink:hover{
					text-decoration:none;
				}
				.TGLink:focus{
					border:none;
				}
				
			</style>
			<div class="highslide-gallery" style='margin-left:auto;margin-right:auto;'>
				<?php
				for($j=0;$j<$Juna_IT_Image_Gallery_Count_Images;$j++)
				{
				?>
				<div class='highslide highslide<?php echo $j+1; ?>' style='display:none;height:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Height; ?>px;border:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Border_Width; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Border_Color; ?> <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Border_Style; ?>;border-radius:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Border_Radius; ?>%;box-shadow: 0px 0px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Box_Shadow; ?>px <?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Shadow_Color; ?>;margin:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Place_Between_Imgs; ?>px;'>
					<img class='<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Zoom_Effect_Type; ?>' style='max-width:none;border-radius:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Border_Radius; ?>%;' src='<?php echo $Juna_IT_Image_Gallery_Images_URL[$j];?>' alt='<?php echo $Juna_IT_Image_Gallery_Images_Title[$j]; ?>' />
					<div class='<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Hover_Effect_Type; ?> group4' href='<?php echo $Juna_IT_Image_Gallery_Images_URL[$j];?>' title='<?php echo $Juna_IT_Image_Gallery_Images_Title[$j]; ?>' style='border-radius:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Border_Radius; ?>%;z-index:1;'>
						
					</div>	
					<h2 class='<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Title_Effect_Type; ?> TGTitle' style='font-family:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Title_Font_Family; ?>;margin:0px;z-index:2;'>
						<?php echo $Juna_IT_Image_Gallery_Images_Title[$j]; ?> 
					</h2>
					<div class='<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Line_Effect_Type; ?>'>
						
					</div>
					<?php if($Juna_IT_Image_Gallery_Images_Link[$j] !== '' && $Juna_IT_Image_Gallery_Images_Link[$j] !== null){ ?>
					<a href='<?php echo $Juna_IT_Image_Gallery_Images_Link[$j]; ?>' target='<?php echo $Juna_IT_Image_Gallery_Images_Ont[$j]; ?>' class='<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Link_Effect_Type; ?> TGLink' style='font-family:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Link_Font_Family; ?>;text-decoration:none;z-index:2;border:none;'>
						<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Link_Text; ?>
					</a>
					<?php } ?>
				</div>
				<?php
				}
				?>
			</div>
			<div id="Juna_IT_Photo_Gallery_Show_All_TG" style="margin:0px;float:left;font-size:20px;color:black;text-align:center;width:100%;font-size:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Pag_Icons_Size; ?>px;color:<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Pag_Icons_Color; ?>;">
				<input type="text" style='display:none;' value="<?php echo $Juna_IT_Image_Gallery;?>" id="Juna_IT_Photo_Gallery_TG">
				<input type="text" style='display:none;' value="<?php echo $Juna_IT_Image_Gallery_Count_Images;?>" id="Juna_IT_Photo_Gallery_Count_Images_TG">
				<input type="text" style='display:none;' value="<?php echo $Juna_IT_Image_Gallery_Image_Quantity;?>" id="Juna_IT_Photo_Gallery_Image_Quantity_TG">
				<input type="text" style='display:none;' value="<?php echo $Juna_IT_Image_Gallery_Image_Quantity;?>" id="Juna_IT_Photo_Gallery_Image_Quantity_Hidden_TG">
				<input type="text" style='display:none;' value="<?php echo $Juna_IT_Image_Gallery_Load_More_hidden;?>" id="Juna_IT_Photo_Gallery_Load_More_hidden_TG">
				<input type="text" style='display:none;' id="Juna_IT_Photo_Gallery_Hidden_Type_TG" value="Random Gallery">
				<i class='iticons_TG junaiticons-style junaiticons-fast-backward' onclick="Juna_IT_Photo_Gallery_Fast_Backward_Clicked_TG()"></i>
				<i class='iticons_TG junaiticons-style junaiticons-chevron-left' onclick="Juna_IT_Photo_Gallery_Chevron_Left_Clicked_TG()"></i>
				<span class='BSCount' id="Juna_IT_Photo_Gallery_First_Page_TG"><?php echo $Juna_IT_Image_Gallery_Per_Page_First;?></span><span class='BSCount' id="Juna_IT_Photo_Gallery_End_Page_TG"><?php echo $Juna_IT_Image_Gallery_Per_Page_Second;?></span><span id="Juna_IT_Photo_Gallery_Load_More_TG" onclick="Juna_IT_Photo_Gallery_Load_More_Clicked_TG()"><?php echo $Juna_IT_Image_Gallery_Load_More;?></span>
				<i class='iticons_TG junaiticons-style junaiticons-chevron-right' onclick="Juna_IT_Photo_Gallery_Chevron_Right_Clicked_TG()"></i>
				<i class='iticons_TG junaiticons-style junaiticons-fast-forward' onclick="Juna_IT_Photo_Gallery_Fast_Forward_Clicked_TG()"></i>
			</div>
			<input type='text' style='display:none' class='ImgWidthTG' value='<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Ims_Width; ?>'>
			<input type='text' style='display:none' class='ImgHeightTG' value='<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Height; ?>'>
			<input type='text' style='display:none' class='ImgTitleTG' value='<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Im_Title_Font_Size; ?>'>
			<input type='text' style='display:none' class='ImgSlIconsTypeTG' value='<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Sl_Icons_Type; ?>'>
			<input type='text' style='display:none' class='ImgSlFS' value='<?php echo $Juna_IT_Image_Gallery_Draw_Image_Effect[0]->Juna_IT_TG_Sl_SSH_Text_Font_Size; ?>'>
			<script src="<?php echo plugins_url('/Scripts/jquery.colorbox.js',__FILE__) ?>"></script>
			<script>
				
			</script>
			<?php
			}
 		}
	}
?>