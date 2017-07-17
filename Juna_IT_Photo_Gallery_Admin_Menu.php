<?php
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
	global $wpdb;
	wp_enqueue_media();
	wp_enqueue_script( 'custom-header' );
	add_filter( 'upload_size_limit', 'PBP_increase_upload' );
	function PBP_increase_upload(  )
	{
	 	return 10240000;
	}
	$table_name  = $wpdb->prefix . "juna_it_photo_gallery_manager";
	$table_name1 = $wpdb->prefix . "juna_it_instal_photo_gallery";
	$table_name2 = $wpdb->prefix . "juna_it_instal_link_photo_gallery";
	$table_name4 = $wpdb->prefix . "juna_it_photo_effects_data";
	
	if(isset($_POST['Add_new_Photo_Gallery_Save_button']))
	{
		$photo_title_text_field=sanitize_text_field($_POST['photo_title_text_field']);
		Juna_IT_Photo_Gallery_Delete_Gallery($photo_title_text_field);
		$Juna_IT_Photo_Gallery_Type=sanitize_text_field($_POST['Juna_IT_Photo_Gallery_Type']);
		$Juna_IT_Photo_Gallery_Show_Image_Type=sanitize_text_field($_POST['Juna_IT_Photo_Gallery_Show_Image_Type']);
		$Juna_IT_Photo_Gallery_Images_Quantity=sanitize_text_field($_POST['Juna_IT_Photo_Gallery_Images_Quantity']);
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name (id, gallery_title, gallery_type, Juna_IT_Photo_Gallery_Show_Image_Type, Juna_IT_Photo_Gallery_Images_Quantity) VALUES (%d, %s, %s, %s, %d)", '', $photo_title_text_field, $Juna_IT_Photo_Gallery_Type, $Juna_IT_Photo_Gallery_Show_Image_Type, $Juna_IT_Photo_Gallery_Images_Quantity));
		$Gallery_number=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE gallery_title=%s ", $photo_title_text_field));
		$Juna_IT_Photo_Gallery_Images_id=sanitize_text_field($_POST['Juna_IT_Photo_Gallery_Images_id']);
		$Juna_IT_Photo_Gallery_Images_id_split=explode(',',$Juna_IT_Photo_Gallery_Images_id);
		for($i=0;$i<=count($Juna_IT_Photo_Gallery_Images_id_split);$i++)
		{
			if($Juna_IT_Photo_Gallery_Images_id_split[$i]!=0)
			{
				$Photo_title=sanitize_text_field($_POST['Image_title_'.$Juna_IT_Photo_Gallery_Images_id_split[$i]]);
				$Photo_description_textarea = sanitize_text_field($_POST['image_description_textarea_'.$Juna_IT_Photo_Gallery_Images_id_split[$i]]);
				$Photo_url=sanitize_text_field($_POST['Image_url_'.$Juna_IT_Photo_Gallery_Images_id_split[$i]]);				
				$Juna_IT_Image_Gallery_order_id=sanitize_text_field($_POST['Juna_IT_Image_Gallery_order_id_'.$Juna_IT_Photo_Gallery_Images_id_split[$i]]);			
				$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, image_title, image_description, image_url, gallery_number, image_order_by) VALUES (%d, %s, %s, %s, %d, %d)", '', $Photo_title, $Photo_description_textarea, $Photo_url, $Gallery_number[0]->id,$Juna_IT_Image_Gallery_order_id));
				
				$Link_URL=sanitize_text_field($_POST['input_Link_'.$Juna_IT_Photo_Gallery_Images_id_split[$i]]);
				$nTabAnswer=sanitize_text_field($_POST['nTabAnswer_'.$Juna_IT_Photo_Gallery_Images_id_split[$i]]);
				$Juna_IT_Link_Gallery_order_id=sanitize_text_field($_POST['Juna_IT_Link_Gallery_order_id_'.$Juna_IT_Photo_Gallery_Images_id_split[$i]]);
				$wpdb->query($wpdb->prepare("INSERT INTO $table_name2 (id, Link_URL, image_ONT, gallery_number, link_order_by) VALUES (%d, %s, %s, %d, %d)", '', $Link_URL, $nTabAnswer, $Gallery_number[0]->id, $Juna_IT_Link_Gallery_order_id));
			}			
		}
	}
	else if(isset($_POST['Add_new_Photo_Gallery_Update_button']))
	{
		$Juna_IT_Photo_Gallery_Hidden_Id_Gallery=sanitize_text_field($_POST['Juna_IT_Photo_Gallery_Hidden_Id_Gallery']);
		$photo_title_text_field=sanitize_text_field($_POST['photo_title_text_field']);

		$Juna_IT_Photo_Gallery_Type=sanitize_text_field($_POST['Juna_IT_Photo_Gallery_Type']);
		$Juna_IT_Photo_Gallery_Show_Image_Type=sanitize_text_field($_POST['Juna_IT_Photo_Gallery_Show_Image_Type']);
		$Juna_IT_Photo_Gallery_Images_Quantity=sanitize_text_field($_POST['Juna_IT_Photo_Gallery_Images_Quantity']);
		
		Juna_IT_Photo_Gallery_Delete_Gallery($photo_title_text_field);

		$wpdb->replace( $table_name, array('id' => $Juna_IT_Photo_Gallery_Hidden_Id_Gallery,
			'gallery_title' => $photo_title_text_field,
			'gallery_type' => $Juna_IT_Photo_Gallery_Type,
			'Juna_IT_Photo_Gallery_Show_Image_Type' => $Juna_IT_Photo_Gallery_Show_Image_Type,
			'Juna_IT_Photo_Gallery_Images_Quantity' => $Juna_IT_Photo_Gallery_Images_Quantity,), 
		array('%d', '%s', '%s', '%s', '%d',));
		$Juna_IT_Photo_Gallery_Images_id=sanitize_text_field($_POST['Juna_IT_Photo_Gallery_Images_id']);
		$Juna_IT_Photo_Gallery_Images_id_split=explode(',',$Juna_IT_Photo_Gallery_Images_id);
		for($i=0;$i<=count($Juna_IT_Photo_Gallery_Images_id_split);$i++)
		{
			if($Juna_IT_Photo_Gallery_Images_id_split[$i]!=0)
			{
				$Photo_title=sanitize_text_field($_POST['Image_title_'.$Juna_IT_Photo_Gallery_Images_id_split[$i]]);
				$Photo_description_textarea = sanitize_text_field($_POST['image_description_textarea_'.$Juna_IT_Photo_Gallery_Images_id_split[$i]]);
				$Photo_url=sanitize_text_field($_POST['Image_url_'.$Juna_IT_Photo_Gallery_Images_id_split[$i]]);				
				$Juna_IT_Image_Gallery_order_id=sanitize_text_field($_POST['Juna_IT_Image_Gallery_order_id_'.$Juna_IT_Photo_Gallery_Images_id_split[$i]]);		
				$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, image_title, image_description, image_url, gallery_number, image_order_by) VALUES (%d, %s, %s, %s, %d, %d)", '', $Photo_title, $Photo_description_textarea, $Photo_url, $Juna_IT_Photo_Gallery_Hidden_Id_Gallery, $Juna_IT_Image_Gallery_order_id));
				
				$Link_URL=sanitize_text_field($_POST['input_Link_'.$Juna_IT_Photo_Gallery_Images_id_split[$i]]);
				$nTabAnswer=sanitize_text_field($_POST['nTabAnswer_'.$Juna_IT_Photo_Gallery_Images_id_split[$i]]);
				$Juna_IT_Link_Gallery_order_id=sanitize_text_field($_POST['Juna_IT_Link_Gallery_order_id_'.$Juna_IT_Photo_Gallery_Images_id_split[$i]]);
				$wpdb->query($wpdb->prepare("INSERT INTO $table_name2 (id, Link_URL, image_ONT, gallery_number, link_order_by) VALUES (%d, %s, %s, %d, %d)", '', $Link_URL, $nTabAnswer, $Juna_IT_Photo_Gallery_Hidden_Id_Gallery, $Juna_IT_Link_Gallery_order_id));
			}			
		}
	}
	$Gallery_title_table=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id > %d",0));
	$Gallery_effects=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE id > %d",0));
?>
<div id='modal_photo'>
	<div id='modal_content_photo'>
		<div id='modal_content_absolute_photo'>
			<div id='modal_content_header_photo'>
				Add Image
			</div>
			<div id='image_content_photo'>
				<label class='label_photo'>
					Title:
				</label>
				<input type='text'  class='img_title_title_photo' /><br />
				<label class='label_photo'>
					Title Description:
				</label>
				<textarea class='img_description_photo'>
					
				</textarea><br />
				<label class='label_photo'>
					Link:
				</label>
				<input type='text'  class='img_link_photo' /><br />
				<label class='label_photo'>
					New Tab:
				</label>
				<i class='NewTabYesPhoto junaiticons-style junaiticons-check' onclick='NewTabYONPhoto("_blank")'></i>
				<i class='NewTabNoPhoto junaiticons-style junaiticons-remove' onclick='NewTabYONPhoto("")'></i>
				<input type='text' style='display:none;' class='YesNoAnswerPhoto' value='' />
			</div>
			<hr />
				<div id='uplPhoto'>
					<div id="wp-content-media-buttons" class="wp-media-buttons" >													
						<a href="#" class="button insert-media add_media" data-editor="input_file_111_Photo" title="Add Media" id="" onclick="Juna_IT_Photo_Gallery_Uploaded_Image()">
							<span class="wp-media-buttons-icon"></span>Add Media
						</a><br /><br />
						<input type="hidden" class="input_file_photo"  id="input_file_111_Photo">	
						<input type='hidden' name="input_file_1_photo" id="input_file_211_Photo">
						<input type='text' class='upload_img_photo' readonly />
					</div>
				</div>
			<hr />
			<div id='saveCanselPhoto'>
				<input type='button' class='cansel_but_photo' value='Cancel' onclick='cansel_modal_photo()' />
				<input type='button' class='save_but_photo' value='Save' onclick='add_img_clicked_photo()' />
			</div>
		</div>
	</div>
</div>

<div id='bigContPhoto'>
	<div class='Juna_IT_Photo_Gallery_Content'>
		<a href="<?php echo plugins_url('/Images/logo-white.png',__FILE__);?>" target="_blank"<abbr title="Click to Visit"><img src="http://juna-it.com/image/logo-orange.png" class="Juna_IT_Logo_Orange_Photo_Gallery"></a>
			<br><br>
		<span class="Image_Title_Span_Photo">Name:</span> 
		<input type="text"   class="image_search_text_field_photo" id="image_search_text_field_photo"   onclick='Search_Button_Clicked_Photo()' placeholder="Search">
		<input type="button" class="Reset_but_photo"      value="Reset"   onclick='Reset_Button_Clicked_Photo()'                       >
		<span class="searched_image_gallery_does_not_exist_photo" id="searched_image_gallery_does_not_exist_photo"></span>
		<input type="button" class="Add_Image_button_photo" id='Add_Image1_photo' value="Add New Gallery" onclick="Add_Image_Button_Clicked_Photo()"                >
	</div>
	<div class="JIT_VGallery_Short_Div" style='margin-top:5px;'>
			<table class="JIT_VGallery_Short_Table">
				<tr>
					<td>Shortcode</td>
					<td>Copy & paste the shortcode directly into any WordPress post or page.</td>
					<td><?php echo 'Example:  [Juna_Photo_Gallery id="1"]';?></td>
				</tr>
				<tr>
					<td>Templete Include</td>
					<td>Copy & paste this code into a template file to include the slideshow within your theme.</td>
					<td><input type="text" value='<?php echo 'Example:   <?php echo do_shortcode("[Juna_Photo_Gallery id="1"]");?>';?>' style="width:100%;background-color:#0073aa;color:#ffffff;border:none;text-align: center" readonly></td>
				</tr>
			</table>
		</div>
	<table class = 'Image_Main_Table_Photo'>
		<tr class="first_row_photo">
			<td class='image_main_id_item_photo'><B><I>No</I></B></td>
			<td class='image_main_title_item_photo'><B><I>Gallery Title</I></B></td>
			<td class='image_main_quantity_item_photo'><B><I>Quantity</I></B></td>
			<td class='image_main_type_item_photo'><B><I>Type</I></B></td>
			<td class='image_main_views_item_photo'><B><I>Shortcode</I></B></td>
			<td class='image_main_actions_item_photo'><B><I>Actions</I></B></td>
		</tr>
	</table>
	<table class = 'Images_Table_Photo'>
		<?php for($i=0;$i<count($Gallery_title_table);$i++) {
			$Quantity_Image_table=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE gallery_number=(SELECT id FROM $table_name WHERE gallery_title= %s) ", $Gallery_title_table[$i]->gallery_title ));
		?>
		<tr>
			<td class='image_id_item_photo'><B><I><?php echo $i+1 ;?></I></B></td>
			<td class='image_title_item_photo'><B><I><?php echo $Gallery_title_table[$i]->gallery_title ; ?></I></B></td>
			<td class='image_quantity_item_photo'><B><I><?php echo count($Quantity_Image_table); ?></I></B></td>
			<td class='image_type_item_photo'><B><I><?php echo $Gallery_title_table[$i]->gallery_type; ?></I></B></td>
			<td class='image_views_item_photo'><B><I title ='Copy & paste the shortcode directly into any WordPress post or page.'><?php echo '[Juna_Photo_Gallery id="'.$Gallery_title_table[$i]->id.'"]' ; ?></I></B></td>
			<td class='image_edit_item_photo' onclick='Edit_Image_Gallery_Photo(<?php echo $Gallery_title_table[$i]->id ; ?>)' ><B><I>Edit</I></B></td>
			<td class='image_delete_item_photo' onclick='Delete_Image_Gallery_Photo(<?php echo $Gallery_title_table[$i]->id ; ?>)'  ><B><I>Delete</I></B></td>
		</tr>
		<?php } ?>
	</table>
	<table class = 'Images_Table1_Photo' style='display:none;'></table>
</div>
<form method="POST" enctype="multipart/form-data">
	<div id = 'bigCont2_photo'>
		<div class='Juna_IT_Photo_Gallery_Content'>
			<a href="http://juna-it.com" target="_blank"<abbr title="Click to Visit"><img src="<?php echo plugins_url('/Images/logo-white.png',__FILE__) ?>" class="Juna_IT_Logo_Orange_Photo_Gallery"></a>
				<br><br>
			<span class="Image_Title_Span_Photo">Gallery Name:</span> 
			<input type="text"   class="photo_title_text_field" id="photo_title_text_field" name='photo_title_text_field'                    required>
			<input type="submit" class="Add_new_Photo_Gallery_Cansel_button" id='update_but_photo'    value="Cancel" name="" onclick="Add_new_Image_Gallery_Cancel_button_clicked()">
			<input type="submit" class="Add_new_Photo_Gallery_Save_button"  id='save_but_photo'     value="Save"   name="Add_new_Photo_Gallery_Save_button">
			<input type="submit" class="Add_new_Photo_Gallery_Update_button"    value="Update" name="Add_new_Photo_Gallery_Update_button">
			<input type="hidden" id="count_div_image_photo" value="0" name="count_div_image_photo">
			<input type="hidden" id="Juna_IT_Photo_Gallery_Images_id" value="" name="Juna_IT_Photo_Gallery_Images_id">
			<input type="hidden" id="Juna_IT_Photo_Gallery_Hidden_Id_Gallery"   name="Juna_IT_Photo_Gallery_Hidden_Id_Gallery">
			<input type="hidden" id="Juna_IT_Photo_Gallery_Hidden_Image_Src" value="<?php echo plugins_url('Images/',__FILE__);?>">
		</div>
		<div class="Juna_IT_Photo_Gallery_Sub1_Page3">
			<table class="Juna_IT_Photo_Gallery_Sub1_Page3_Table">
				<tr>
					<td>Gallery Type:</td>
					<td>Displaying Content:</td>
					<td>Image Per Page:</td>
				</tr>
				<tr>
					<td>
						<select name="Juna_IT_Photo_Gallery_Type" id="Juna_IT_Photo_Gallery_Type"                           >
							<?php for($i=0;$i<count($Gallery_effects);$i++){?>
								<option value="<?php echo $Gallery_effects[$i]->effect_name;?>"><?php echo $Gallery_effects[$i]->effect_name;?></option>
							<?php }?>
						</select>
					</td>
					<td>
						<select name="Juna_IT_Photo_Gallery_Show_Image_Type" id="Juna_IT_Photo_Gallery_Show_Image_Type"                                    >
							<option value="Pageination" selected>Pageination</option>
							<option value="Load More">Load More</option>
							<option value="Show All">Show All</option>
						</select>
					</td>
					<td>
						<input type="text" name="Juna_IT_Photo_Gallery_Images_Quantity" id="Juna_IT_Photo_Gallery_Images_Quantity" value="1">
					</td>
				</tr>
			</table>			
		</div>
		<div id='add_image_gallery_photo'>
			<div id='add_icon_photo' onclick='Add_img_photo()'>
				<div id='add_photo'>
					<div class='back_photo'>
						<span>+</span>
					</div>
					<div class='front_photo'>
						<span>+</span>
					</div>
				</div><br />
				<a href='#' class='info_photo'>
					Add New Image
				</a>
			</div>
		</div>
		<div id="Add_New_Photo_Gallery" class="Add_New_Photo_Gallery">
			<ul id="Juna_IT_Photo_Gallery_Ul">
			</ul>
		</div>
	</div>
</form>
<?php
	function Juna_IT_Photo_Gallery_Delete_Gallery($gallery_title)
	{
		global $wpdb;
		$table_name  = $wpdb->prefix . "juna_it_photo_gallery_manager";
		$table_name1 = $wpdb->prefix . "juna_it_instal_photo_gallery";
		$table_name2 = $wpdb->prefix . "juna_it_instal_link_photo_gallery";
		$Juna_IT_Image_Gallery_Delete_Count=$wpdb->get_var($wpdb->prepare("SELECT count(*) FROM $table_name WHERE gallery_title= %s", $gallery_title));
		$Juna_IT_Image_Gallery_Delete_id=$wpdb->get_var($wpdb->prepare("SELECT id FROM $table_name WHERE gallery_title= %s limit 1", $gallery_title));
		if($Juna_IT_Image_Gallery_Delete_Count!=0)
		{
			$wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE gallery_title= %s", $gallery_title));
			$results=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE gallery_number= %d", $Juna_IT_Image_Gallery_Delete_id));
			$results2=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE gallery_number= %d", $Juna_IT_Image_Gallery_Delete_id));
			for($i=0;$i<count($results);$i++)
			{		
				$wpdb->query($wpdb->prepare("DELETE FROM $table_name1 WHERE id= %d", $results[$i]->id));
			}
			for($i=0;$i<count($results2);$i++)
			{		
				$wpdb->query($wpdb->prepare("DELETE FROM $table_name2 WHERE id= %d", $results2[$i]->id));
			}
		}
		else
		{
			return;
		}
	}
?>