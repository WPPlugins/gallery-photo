<?php
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
?>
<script type="text/javascript">
	
	function Search_Button_Clicked_Photo()
	{
		setInterval(function(){
			var Juna_IT_Image_Searched_Gallery=jQuery('#image_search_text_field_photo').val();
			if(Juna_IT_Image_Searched_Gallery!='')
			{
				var ajaxurl = object.ajaxurl;
				var data = {
				action: 'Search_Juna_IT_Photo_Gallery_Click', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
				foobar: Juna_IT_Image_Searched_Gallery, // translates into $_POST['foobar'] in PHP
				};
				jQuery.post(ajaxurl, data, function(response) {
					if(response=='')
					{
						jQuery('#searched_image_gallery_does_not_exist_photo').html('* Requested Gallery does not exist!');
						jQuery('.Images_Table1_Photo').hide();
						jQuery('.Images_Table_Photo').show();
					}
					else
					{
						jQuery('#searched_image_gallery_does_not_exist_photo').html('');
						jQuery('.Images_Table_Photo').hide();
						jQuery('.Images_Table1_Photo').show();
						jQuery('.Images_Table1_Photo').empty();
						var searched_params=response.split(')*^*(');
						for(i=0;i<parseInt(searched_params.length-1);i++)
						{
							searched_params_callback=searched_params[i].split(')&*&(');
							jQuery('.Images_Table1_Photo').append("<tr><td class='image_id_item_photo'><B><I>"+parseInt(parseInt(i)+1)+"</I></B></td><td class='image_title_item_photo'><B><I>"+searched_params_callback[1]+"</I></B></td><td class='image_quantity_item_photo'><B><I>"+searched_params_callback[3]+"</I></B></td><td class='image_type_item_photo'><B><I>"+searched_params_callback[2]+"</I></B></td><td class='image_views_item_photo'><B><I>[Juna_Image_Gallery id="+searched_params_callback[0]+"]</I></B></td><td class='image_edit_item_photo' onclick='Edit_Image_Gallery_Photo("+searched_params_callback[0]+")'><B><I>Edit</I></B></td><td class='image_delete_item_photo' onclick='Delete_Image_Gallery_Photo("+searched_params_callback[0]+")'><B><I>Delete</I></B></td></tr>");
						}
					}
				});
			}
			else
			{
				jQuery('.Images_Table1_Photo').hide();
				jQuery('.Images_Table_Photo').show();
			}
		}, 600);
	}

	function Reset_Button_Clicked_Photo()
	{
		jQuery('#image_search_text_field_photo').val('');
		jQuery('#searched_image_gallery_does_not_exist_photo').html('');
		jQuery('.Images_Table1_Photo').hide();
		jQuery('.Images_Table_Photo').show();
	}
	function Add_Image_Button_Clicked_Photo()
	{
		jQuery('#bigContPhoto').fadeOut();
		setTimeout(function(){
			jQuery('#bigCont2_photo').fadeIn(); 
			jQuery('.Add_new_Image_Gallery_Save_button').fadeIn();
			jQuery('.Add_new_Photo_Gallery_Update_button').fadeOut();
		}, 500);
	}
	function Add_new_Image_Gallery_Cancel_button_clicked()
	{
		jQuery('#bigCont2_photo').fadeOut();
		jQuery('#Juna_IT_Photo_Gallery_Ul').empty();
		setTimeout(function(){
			jQuery('#bigContPhoto').fadeIn();
			jQuery('#Juna_IT_Photo_Gallery_Type').val('Lightbox Column Gallery');
			jQuery('#Juna_IT_Photo_Gallery_Show_Image_Type').val('Pageination');
			jQuery('#Juna_IT_Photo_Gallery_Images_Quantity').val('1');
			jQuery('#photo_title_text_field').val('');
			Juna_IT_Video_Gallery_Type_Changed();
			jQuery('#count_div_image_photo').val(0);
		}, 500);
	}
	var arr = [];
	function Edit_Image_Gallery_Photo(id)
	{
		jQuery('#bigContPhoto').fadeOut();
		setTimeout(function(){
			jQuery('#bigCont2_photo').fadeIn(); 
			jQuery('.Add_new_Photo_Gallery_Save_button').fadeOut();
			jQuery('.Add_new_Photo_Gallery_Update_button').fadeIn();
			var ajaxurl = object.ajaxurl;
			var data = {
			action: 'Edit_Juna_IT_Photo_Gallery_Click', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
			foobar: id, // translates into $_POST['foobar'] in PHP
			};
			jQuery.post(ajaxurl, data, function(response){
				var Gallery_title=response.split('^%^');
				jQuery('#photo_title_text_field').val(Gallery_title[0]);
				jQuery('#Juna_IT_Photo_Gallery_Type').val(Gallery_title[1]);
				jQuery('#Juna_IT_Photo_Gallery_Show_Image_Type').val(Gallery_title[2]);
				//Juna_IT_Video_Gallery_Show_Video_Type_Changed();
				jQuery('#Juna_IT_Photo_Gallery_Images_Quantity').val(Gallery_title[3]);
				//Juna_IT_Image_Gallery_Type_Changed();
				jQuery('#count_div_image_photo').val(Gallery_title[4]);
				var t=Array();
				var Juna_IT_Photo_Gallery_Hidden_Image_Src=jQuery('#Juna_IT_Photo_Gallery_Hidden_Image_Src').val();
				for(var y=1;y<=Gallery_title[4];y++)
				{
					jQuery('#Juna_IT_Photo_Gallery_Ul').append('<li id="Juna_IT_Photo_Gallery_Ul_Li_'+y+'" style="position:relative;margin-bottom:20px;"><div class="photo_description_div"><input type="hidden" class="Juna_IT_Photo_Gallery_order_id" id="Juna_IT_Photo_Gallery_order_id_'+y+'" name="Juna_IT_Image_Gallery_order_id_'+y+'" value=""><input type="hidden" class="Juna_IT_Link_Gallery_order_id" id="Juna_IT_Link_Gallery_order_id_'+y+'" name="Juna_IT_Link_Gallery_order_id_'+y+'" value=""><table class="Juna_IT_Photo_Gallery_Table"><tr><td>Title</td><td><input type="text" class="Juna_IT_Photo_Gallery_type_text" id="Image_Title_text_input_'+y+'" name="Image_title_'+y+'" required></td></tr><tr><td>Image Description</td><td><textarea class="Juna_IT_Photo_Gallery_textarea" rows="5" id="image_description_textarea_'+y+'" name="image_description_textarea_'+y+'"></textarea></td></tr><tr><td><a href="#" class="button insert-media add_media" data-editor="input_file_1_photo'+y+'" title="Add Media" id="input_file_'+y+'" onclick="Juna_IT_Photo_Gallery_Upload_Image('+y+')"><span class="wp-media-buttons-icon"></span>Add Media</a></td><td><input type="hidden" class="input_file_photo"  id="input_file_1_photo'+y+'"><input type="hidden" name="input_file_1_photo" id="input_file_2'+y+'"><input type="text" class="Juna_IT_Photo_Gallery_type_text" id="URL_for_Image_input_'+y+'" name="Image_url_'+y+'" readonly></td></tr><tr><td>Link</td><td><input type="text" class="Juna_IT_Photo_Gallery_type_text" id="input_Link_'+y+'" name="input_Link_'+y+'"></td></tr><tr><td>New Tab</td><td style="text-align:center;"><input type="text" style="display:none;" class="nTabAnswer" id="nTabAnswer_'+y+'" name="nTabAnswer_'+y+'" value="""><i class="NewTabYes2Photo junaiticons-style junaiticons-check" id="NewTabYes_'+y+'" onclick="cl1_photo('+y+')"></i><i class="NewTabNo2Photo junaiticons-style junaiticons-remove" id="NewTabNo_'+y+'" onclick="cl2_photo('+y+')"></i></td></tr></table></div><div class="image_photo_div" id="image_icon_div_'+y+'"><img style="width:300px; height:200px" src="<?php echo plugins_url('../Images/video-icon.png',__FILE__ );?>" class="Juna_IT_Photo_Gallery_Image" id="Juna_IT_Image_Gallery_Image_'+y+'" ></div><img src="<?php echo plugins_url( '../Images/Actions-edit-delete-icon.png',__FILE__ );?>" class="del_aicon_photo" onclick = "Juna_IT_Photo_Gallery_Remove_Button_Clicked('+y+')"></li>');
					t[t.length]=y;
				}
				Juna_IT_Photo_Gallery_Images_id=t.join(',');
				
				console.log(Juna_IT_Photo_Gallery_Images_id);
				jQuery('#Juna_IT_Photo_Gallery_Images_id').val(Juna_IT_Photo_Gallery_Images_id+',');
				jQuery('#Juna_IT_Photo_Gallery_Hidden_Id_Gallery').val(Gallery_title[5]);
				var Juna_IT_Image_params=Gallery_title[6].split(')*('); 
				for(var j=1;j<=Gallery_title[4];j++)
				{
					var Juna_IT_Input_params=Juna_IT_Image_params[j-1].split('$#$');
					jQuery('#Image_Title_text_input_'+j).val(Juna_IT_Input_params[0]);
					jQuery('#image_description_textarea_'+j).val(Juna_IT_Input_params[1]);
					jQuery('#URL_for_Image_input_'+j).val(Juna_IT_Input_params[2]);
					jQuery('#Juna_IT_Image_Gallery_Image_'+j).attr('src', Juna_IT_Input_params[2] );
					jQuery('#input_Link_'+j).val(Juna_IT_Input_params[3] );
					jQuery('#nTabAnswer_'+j).val(Juna_IT_Input_params[4] );
					//jQuery('#image_in_image_icon_'+j).attr('src', Juna_IT_Input_params[2]);
					if(jQuery('#nTabAnswer_'+j).val()=='_blank'){
						jQuery('#NewTabYes_'+j).css('color','#0073aa');
						jQuery('#NewTabNo_'+j).css('color','#999');
					}else{
						jQuery('#NewTabYes_'+j).css('color','#999');
						jQuery('#NewTabNo_'+j).css('color','#0073aa');
					}
				}
				
			})
		}, 500);
	}
	
	function Delete_Image_Gallery_Photo(id)
	{
		var ajaxurl = object.ajaxurl;
		var data = {
		action: 'Delete_Juna_IT_Photo_Gallery_Click', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
		foobar: id, // translates into $_POST['foobar'] in PHP
		};
		jQuery.post(ajaxurl, data, function(response) {
			location.reload();
		});
	}
	
	jQuery('#modal_content_absolute_photo').css('top','-100%');
	function Add_img_photo()
	{
		jQuery('.img_title_title_photo').val('');
		jQuery('.img_description_photo').val('');
		jQuery('.upload_img_photo').val('');
		jQuery('.img_link_photo').val('');
		jQuery('#modal_photo').fadeIn(); 
		setTimeout(function(){
			jQuery('#modal_content_absolute_photo').animate({top:'0px'})
		});
	}
	function cansel_modal_photo()
	{
		jQuery('#modal_content_absolute_photo').animate({top:'-100%'});
		setTimeout(function(){
			jQuery('#modal_photo').fadeOut(); 
		});
	}
	var z=0;
	var order_id = 0
	function add_img_clicked_photo()
	{
		if(jQuery('.img_title_title_photo').val() !== '' && jQuery('.upload_img_photo').val() !== ''){
			jQuery('#modal_content_absolute_photo').animate({top:'-100%'});
			setTimeout(function(){
				jQuery('#modal_photo').fadeOut(); 
				var x = jQuery('#count_div_image_photo').val();
				var y = parseInt(parseInt(x)+1);
				jQuery('#count_div_image_photo').val(y);
				jQuery('#Juna_IT_Photo_Gallery_Ul').append('<li id="Juna_IT_Photo_Gallery_Ul_Li_'+y+'" style="position:relative;margin-bottom:20px;"><div class="photo_description_div"><input type="hidden" class="Juna_IT_Photo_Gallery_order_id" id="Juna_IT_Photo_Gallery_order_id_'+y+'" name="Juna_IT_Image_Gallery_order_id_'+y+'" value=""><input type="hidden" class="Juna_IT_Link_Gallery_order_id" id="Juna_IT_Link_Gallery_order_id_'+y+'" name="Juna_IT_Link_Gallery_order_id_'+y+'" value=""><table class="Juna_IT_Photo_Gallery_Table"><tr><td>Title</td><td><input type="text" class="Juna_IT_Photo_Gallery_type_text" id="Image_Title_text_input_'+y+'" name="Image_title_'+y+'" required></td></tr><tr><td>Image Description</td><td><textarea class="Juna_IT_Photo_Gallery_textarea" rows="5" id="image_description_textarea_'+y+'" name="image_description_textarea_'+y+'"></textarea></td></tr><tr><td><a href="#" class="button insert-media add_media" data-editor="input_file_1_photo'+y+'" title="Add Media" id="input_file_'+y+'" onclick="Juna_IT_Photo_Gallery_Upload_Image('+y+')"><span class="wp-media-buttons-icon"></span>Add Media</a></td><td><input type="hidden" class="input_file_photo"  id="input_file_1_photo'+y+'"><input type="hidden" name="input_file_1_photo" id="input_file_2'+y+'"><input type="text" class="Juna_IT_Photo_Gallery_type_text" id="URL_for_Image_input_'+y+'" name="Image_url_'+y+'" readonly></td></tr><tr><td>Link</td><td><input type="text" class="Juna_IT_Photo_Gallery_type_text" id="input_Link_'+y+'" name="input_Link_'+y+'"></td></tr><tr><td>New Tab</td><td style="text-align:center;"><input type="text" style="display:none;" class="nTabAnswer" id="nTabAnswer_'+y+'" name="nTabAnswer_'+y+'" value="""><i class="NewTabYes2Photo junaiticons-style junaiticons-check" id="NewTabYes_'+y+'" onclick="cl1_photo('+y+')"></i><i class="NewTabNo2Photo junaiticons-style junaiticons-remove" id="NewTabNo_'+y+'" onclick="cl2_photo('+y+')"></i></td></tr></table></div><div class="image_photo_div" id="image_icon_div_'+y+'"><img style="width:300px; height:200px" src="<?php echo plugins_url('../Images/video-icon.png',__FILE__ );?>" class="Juna_IT_Photo_Gallery_Image" id="Juna_IT_Image_Gallery_Image_'+y+'" ></div><img src="<?php echo plugins_url( '../Images/Actions-edit-delete-icon.png',__FILE__ );?>" class="del_aicon_photo" onclick = "Juna_IT_Photo_Gallery_Remove_Button_Clicked('+y+')"></li>');
			
				jQuery("#Juna_IT_Photo_Gallery_Ul > li").each(function(){
					jQuery(this).find('.Juna_IT_Photo_Gallery_order_id').val(jQuery(this).index()+1);
					jQuery(this).find('.Juna_IT_Link_Gallery_order_id').val(jQuery(this).index()+1);
					//console.log(jQuery(this).index()+1);
				});
				arr.push(y);
				var text = jQuery('#Juna_IT_Photo_Gallery_Images_id').val();
				for(i=0;i<=arr.length-1;i++)
				{
					text=arr[i]+',';
				}
				jQuery('#Juna_IT_Photo_Gallery_Images_id').val(jQuery('#Juna_IT_Photo_Gallery_Images_id').val()+text);
				console.log(jQuery('#Juna_IT_Photo_Gallery_Images_id').val());
				var titl = jQuery('.img_title_title_photo').val();
				var title_description_description = jQuery('.img_description_photo').val();
				var src = jQuery('.upload_img_photo').val();
				var link = jQuery('.img_link_photo').val();
				var YesNoAnswerPhoto = jQuery('.YesNoAnswerPhoto').val();
				var s=src.split('/" rel="attachment wp-att-554"><img src="');
				jQuery('#Image_Title_text_input_'+y).val(titl);
				jQuery('#image_description_textarea_'+y).val(title_description_description);
				jQuery('#Juna_IT_Image_Gallery_Image_'+y).attr('src',src);
				jQuery('#URL_for_Image_input_'+y).val(src);
				jQuery('#input_Link_'+y).val(link);
				jQuery('#nTabAnswer_'+y).val(YesNoAnswerPhoto);
				if(jQuery('#nTabAnswer_'+y).val()=='_blank'){
					jQuery('#NewTabYes_'+y).css('color','#0073aa');
					jQuery('#NewTabNo_'+y).css('color','#999');
				}else{
					jQuery('#NewTabYes_'+y).css('color','#999');
					jQuery('#NewTabNo_'+y).css('color','#0073aa');
				}
			});
		}else{
			alert('Fill Title and Image URL!');
		}	
	}
	
	
	function cl1_photo(Answer){
		jQuery('#nTabAnswer_'+Answer).val('_blank');
		jQuery('#NewTabYes_'+Answer).css('color','#0073aa');
		jQuery('#NewTabNo_'+Answer).css('color','#999');
	}
	function cl2_photo(Answer){
		jQuery('#nTabAnswer_'+Answer).val('');
		jQuery('#NewTabYes_'+Answer).css('color','#999');
		jQuery('#NewTabNo_'+Answer).css('color','#0073aa');	
	}
	
	function Juna_IT_Photo_Gallery_Remove_Button_Clicked(number)
	{
		jQuery('#Juna_IT_Photo_Gallery_Ul_Li_'+number).fadeOut(500);
		jQuery('#Juna_IT_Photo_Gallery_Ul_Li_'+number).remove();
		var text=jQuery('#Juna_IT_Photo_Gallery_Images_id').val();
		var text_split=text.split(',');
		var index = text_split.indexOf(text_split[number]);	
		for(var i=0;i<text_split.length;i++)
		{
			if(text_split[i]==number)
			{
				text_split[i]=0;
			}
		}
		jQuery('#Juna_IT_Photo_Gallery_Images_id').val(text_split.join(","));
		console.log(text_split);
		order_id--;
		jQuery("#Juna_IT_Photo_Gallery_Ul > li").each(function(){
					jQuery(this).find('.Juna_IT_Photo_Gallery_order_id').val(jQuery(this).index()+1);
					jQuery(this).find('.Juna_IT_Link_Gallery_order_id').val(jQuery(this).index()+1);
				});
	}
	jQuery(function(){
	    jQuery('#Juna_IT_Photo_Gallery_Ul').sortable({
	      	update: function() {
	        	jQuery("#Juna_IT_Photo_Gallery_Ul > li").each(function(){
					jQuery(this).find('.Juna_IT_Photo_Gallery_order_id').val(jQuery(this).index()+1);
					jQuery(this).find('.Juna_IT_Link_Gallery_order_id').val(jQuery(this).index()+1);
				});    
	       	}
	    });	
	});
	
	function Juna_IT_Photo_Gallery_Uploaded_Image()
	{
		var nIntervId = setInterval(function(){
			if(jQuery('#input_file_111_Photo').val().indexOf('img')>0)
			{
				var s =jQuery('#input_file_111_Photo').val().split('src="'); 
				var src= s[1].split('"');
				if(jQuery('#input_file_111_Photo').val()==''){
					jQuery('#input_file_211_Photo').val(src[0]);
					jQuery('.upload_img').val(src[0]);
					if(jQuery('#input_file_211_Photo').val().length>0){
						clearInterval(nIntervId);
					}
				}else{
					jQuery('#input_file_111_Photo').val('');
					jQuery('#input_file_211_Photo').val(src[0]);
					jQuery('.upload_img_photo').val(src[0]);
					if(jQuery('#input_file_211_Photo').val().length>0){
						clearInterval(nIntervId);
					}
				}
			}
		})
	}
	function Juna_IT_Photo_Gallery_Upload_Image(a)
	{
		var nIntervIdd = setInterval(function(){
			if(jQuery('#input_file_1_photo'+a).val().indexOf('img')>0)
			{
				var s =jQuery('#input_file_1_photo'+a).val().split('src="'); 
				var src= s[1].split('"');
				if(jQuery('#input_file_1_photo'+a).val()==''){
					jQuery('#input_file_2'+a).val(src[0]);
					jQuery('#URL_for_Image_input_'+a).val(src[0]);
					jQuery('#Juna_IT_Image_Gallery_Image_'+a).attr('src',src[0]);
					if(jQuery('#input_file_2'+a).val().length>0){
						clearInterval(nIntervIdd);
					}
				}else{
					jQuery('#input_file_1_photo'+a).val('');
					jQuery('#input_file_2'+a).val(src[0]);
					jQuery('#URL_for_Image_input_'+a).val(src[0]);
					jQuery('#Juna_IT_Image_Gallery_Image_'+a).attr('src',src[0]);
					if(jQuery('#input_file_2'+a).val().length>0){
						clearInterval(nIntervIdd);
					}
				}
			}
		})
	}
	function NewTabYONPhoto(Answer){
		jQuery('.YesNoAnswerPhoto').val(Answer);

		if(Answer=='_blank')
		{
			jQuery('.NewTabYesPhoto').css('color','#0073aa');
			jQuery('.NewTabNoPhoto').css('color','#999');
		}
		else
		{
			jQuery('.NewTabYesPhoto').css('color','#999');
			jQuery('.NewTabNoPhoto').css('color','#0073aa');
		}
	}
</script>