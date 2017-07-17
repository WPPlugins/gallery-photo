<?php
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
	global $wpdb;
	$table_name4 = $wpdb->prefix . "juna_it_photo_effects_data";
	$JIT_Photo_Gallery_Effects=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE id > %d",0));
?>
<form method = 'POST'>
	<div class='Juna_IT_Image_Gallery_Prop_Div_Main_opt' style='border-radius:10px;'>
		<a href="http://juna-it.com" target="_blank"<abbr title="Click to Visit" class='logo_link_right'>
			<img src="<?php echo plugins_url('/Images/logo-white.png',__FILE__) ?>" class="Juna_IT_Logo_Orange_Image">
		</a>
		<div class='JIT_IGallery_Main_Div1'>
			<span class='JIT_IGallery_Title_Span'>
				Effect Title:
			</span>
			<input type="text" class="JIT_IGallery_search_text" id="JIT_IGallery_search_text1" onclick="JIT_Photo_Gallery_Search()" placeholder="Search">
			<input type="button" class="JIT_IGallery_Reset_text" value="Reset" onclick="JIT_Photo_Gallery_Reset()">
			<span class="JIT_IGallery_not" id="JIT_IGallery_not1"></span>
		</div>
		<label class="Juna_IT_Image_Gallery_Setting_Image_Title_Label">Selected Gallery Type:</label>
		<span id='Juna_IT_Image_Gallery_Setting_Image_Title'>Lightbox Column Gallery</span>
		<div class="JIT_IGallery_Main_Div2">
			
			<input type="text" style="display: none;" name="JIT_IGallery_Hidden_ID" id="JIT_IGallery_Hidden_ID" value="">
			<input type="text" style="display: none;" name="JIT_IGallery_Hidden_EN" id="JIT_IGallery_Hidden_EN" value="">
			<input type="button" class="Juna_IT_Image_Gallery_Prop_Save" value="Back" onclick="JIT_Photo_Gallery_Cancel()">
		</div>
	</div>
	<div id="JIT_VGallery_Button_Div" class="JIT_VGallery_Button_Div" style='width:97%;'>
		<a href="http://juna-it.com/index.php/gallery-photo/" target="_blank" title="Click to Buy"><div class="JIT_VGallery_Full_Version_Image"></div></a>
		<span style="display:block;color:#ffffff;font-size:16px;">This is the free version of the plugin. Click "GET THE FULL VERSION" for more advanced options.</span><br>
		<span style="display:block;color:#ffffff;font-size:16px;margin-top:-15px;"> We appreciate every customer.</span>
	</div>
	<table class="JIT_IGallery_Main_Table">
		<tbody>
			<tr class="JIT_IGallery_first_row">
				<td class="JIT_IGallery_main_id_item"><b><i>No</i></b></td>
				<td class="JIT_IGallery_main_title_item"><b><i>Effect Name</i></b></td>
				<td class="JIT_IGallery_main_effect_item"><b><i>Effect Type</i></b></td>
				<td class="JIT_IGallery_main_actions_item"><b><i>Actions</i></b></td>
			</tr>
		</tbody>
	</table>
	<table class='JIT_IGallery_Effect_Table'>
		<?php for($i=0;$i<count($JIT_Photo_Gallery_Effects);$i++) {
			if($i<6){
				?>
				<tr>
					<td class='JIT_IGallery_id_item'><B><I><?php echo $i+1 ;?></I></B></td>
					<td class='JIT_IGallery_title_item'><B><I><?php echo $JIT_Photo_Gallery_Effects[$i]->effect_name;?></I></B></td>
					<td class='JIT_IGallery_effect_item'><B><I><?php echo $JIT_Photo_Gallery_Effects[$i]->effect_type;?></I></B></td>
					<td class='JIT_IGallery_edit_item' onclick="Edit_Photo_Gallery_Effect(<?php echo $JIT_Photo_Gallery_Effects[$i]->id;?>)"><B><I>Edit</I></B></td>
					<td><B><I>Delete</I></B></td>
				</tr>
			<?php } else{?>
				<tr>
					<td class='JIT_IGallery_id_item'><B><I><?php echo $i+1 ;?></I></B></td>
					<td class='JIT_IGallery_title_item'><B><I><?php echo $JIT_Photo_Gallery_Effects[$i]->effect_name;?></I></B></td>
					<td class='JIT_IGallery_effect_item'><B><I><?php echo $JIT_Photo_Gallery_Effects[$i]->effect_type;?></I></B></td>
					<td class='JIT_IGallery_edit_item' onclick="Edit_Photo_Gallery_Effect(<?php echo $JIT_Photo_Gallery_Effects[$i]->id;?>)"><B><I>Edit</I></B></td>
					<td class='JIT_IGallery_delete_item' onclick="Delete_Photo_Gallery_Effect(<?php echo $JIT_Photo_Gallery_Effects[$i]->id;?>)"><B><I>Delete</I></B></td>
				</tr>			
		<?php }}?>
	</table>
	<table class='JIT_IGallery_Effect_Table1'>
	</table>
	
	<img class="JIT_PG_FVI" id="JIT_PG_FVI_1" src="<?php echo plugins_url('/Images/photo-gallery-effect-1.png',__FILE__);?>">
	<img class="JIT_PG_FVI" id="JIT_PG_FVI_2" src="<?php echo plugins_url('/Images/photo-gallery-effect-2.png',__FILE__);?>">
	<img class="JIT_PG_FVI" id="JIT_PG_FVI_3" src="<?php echo plugins_url('/Images/photo-gallery-effect-3.png',__FILE__);?>">
	<img class="JIT_PG_FVI" id="JIT_PG_FVI_4" src="<?php echo plugins_url('/Images/photo-gallery-effect-4.png',__FILE__);?>">
	<img class="JIT_PG_FVI" id="JIT_PG_FVI_5" src="<?php echo plugins_url('/Images/photo-gallery-effect-5.png',__FILE__);?>">
	<img class="JIT_PG_FVI" id="JIT_PG_FVI_6" src="<?php echo plugins_url('/Images/photo-gallery-effect-5-1.png',__FILE__);?>">
</form>	