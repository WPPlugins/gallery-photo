jQuery(document).ready(function(){
	var Juna_IT_Photo_Gallery=jQuery('#Juna_IT_Photo_Gallery').val();
	var Juna_IT_Photo_Gallery_Count_Images=jQuery('#Juna_IT_Photo_Gallery_Count_Images').val();
	var Juna_IT_Photo_Gallery_Image_Quantity=jQuery('#Juna_IT_Photo_Gallery_Image_Quantity').val();
	var Juna_IT_Photo_Gallery_Load_More_hidden=jQuery('#Juna_IT_Photo_Gallery_Load_More_hidden').val();
	if(Juna_IT_Photo_Gallery_Load_More_hidden!=='')
	{
		jQuery('.iticonsBS').hide();
	}
	else
	{
		jQuery('.iticonsBS').show('!important');
	}
	if(Juna_IT_Photo_Gallery=='none')
	{
		for(var i=1;i<=Juna_IT_Photo_Gallery_Count_Images;i++)
		{
			jQuery('.BSJIT'+i).show();
		}
	}
	else if(Juna_IT_Photo_Gallery=='done')
	{
		for(var i=1;i<=Juna_IT_Photo_Gallery_Image_Quantity;i++)
		{
			jQuery('.BSJIT'+i).show();
		}
	}
	else if(Juna_IT_Photo_Gallery=='Show')
	{
		for(var i=1;i<=Juna_IT_Photo_Gallery_Count_Images;i++)
		{
			jQuery('.BSJIT'+i).show();
		}
		jQuery('#Juna_IT_Photo_Gallery_Show_All').hide();
	}		
})
function RF(){
	var urlSrcImgBSIG = [];	
	jQuery('.urlSrcImgBSIG').each(function(){
		urlSrcImgBSIG.push(jQuery(this).val());
	})
	for(i=0;i<=urlSrcImgBSIG.length;i++){
		jQuery('.relBSIG'+i).css('height',jQuery('.absBSIG'+i).height());
	}
	for(i=0;i<=urlSrcImgBSIG.length-1;i++){
		jQuery('#relBSIG_Div'+i).anystretch(urlSrcImgBSIG[i]);
	}										
	jQuery(window).resize(function(){
		for(i=0;i<=urlSrcImgBSIG.length;i++){
			jQuery('.relBSIG'+i).css('height',jQuery('.absBSIG'+i).height());
		}
	})
}
RF();
function Juna_IT_Photo_Gallery_Fast_Backward_Clicked()
{
	var Juna_IT_Photo_Gallery_First_Page=jQuery('#Juna_IT_Photo_Gallery_First_Page').html();
	var Juna_IT_Photo_Gallery_End_Page=jQuery('#Juna_IT_Photo_Gallery_End_Page').html();
	if(parseInt(Juna_IT_Photo_Gallery_First_Page)>1)
	{
		var Juna_IT_Photo_Gallery_Count_Images=jQuery('#Juna_IT_Photo_Gallery_Count_Images').val();
		var Juna_IT_Photo_Gallery_Image_Quantity=jQuery('#Juna_IT_Photo_Gallery_Image_Quantity').val();
		setTimeout(function(){
			for(var i=1;i<=Juna_IT_Photo_Gallery_Count_Images;i++)
			{
				jQuery('.BSJIT'+i).hide();
			}
		},500);
		setTimeout(function(){
			for(var i=1;i<=Juna_IT_Photo_Gallery_Image_Quantity;i++)
			{
				jQuery('.BSJIT'+i).show();
				RF();
			}
			jQuery('#Juna_IT_Photo_Gallery_First_Page').html(1);
		},1000);
	}
}
function Juna_IT_Photo_Gallery_Chevron_Left_Clicked()
{
	var Juna_IT_Photo_Gallery_First_Page=jQuery('#Juna_IT_Photo_Gallery_First_Page').html();
	var Juna_IT_Photo_Gallery_End_Page=jQuery('#Juna_IT_Photo_Gallery_End_Page').html();
	if(parseInt(Juna_IT_Photo_Gallery_First_Page)>1)
	{
		var Juna_IT_Photo_Gallery_Count_Images=jQuery('#Juna_IT_Photo_Gallery_Count_Images').val();
		var Juna_IT_Photo_Gallery_Image_Quantity=jQuery('#Juna_IT_Photo_Gallery_Image_Quantity').val();
		var Juna_IT_Photo_Gallery_Images_Quantity_After=parseInt(Juna_IT_Photo_Gallery_Image_Quantity)*(parseInt(Juna_IT_Photo_Gallery_First_Page)-1);
		var Juna_IT_Photo_Gallery_Images_Quantity_Before=parseInt(Juna_IT_Photo_Gallery_Image_Quantity)*(parseInt(Juna_IT_Photo_Gallery_First_Page)-2)+1;
		setTimeout(function(){
			for(var i=1;i<=Juna_IT_Photo_Gallery_Count_Images;i++)
			{
				jQuery('.BSJIT'+i).hide();
			}
		},500);
		setTimeout(function(){
			for(var i=Juna_IT_Photo_Gallery_Images_Quantity_Before;i<=Juna_IT_Photo_Gallery_Images_Quantity_After;i++)
			{
				jQuery('.BSJIT'+i).show();
				RF();
			}
			var Juna_IT_Photo_Gallery_First_Page1=parseInt(Juna_IT_Photo_Gallery_First_Page)-1;
			jQuery('#Juna_IT_Photo_Gallery_First_Page').html(Juna_IT_Photo_Gallery_First_Page1);
		},1000);
	}
}
function Juna_IT_Photo_Gallery_Chevron_Right_Clicked()
{
	var Juna_IT_Photo_Gallery_First_Page=jQuery('#Juna_IT_Photo_Gallery_First_Page').html();
	var Juna_IT_Photo_Gallery_End_Page=jQuery('#Juna_IT_Photo_Gallery_End_Page').html();
	if(parseInt(Juna_IT_Photo_Gallery_First_Page)<parseInt(Juna_IT_Photo_Gallery_End_Page.substr(1)))
	{
		var Juna_IT_Photo_Gallery_Count_Images=jQuery('#Juna_IT_Photo_Gallery_Count_Images').val();
		var Juna_IT_Photo_Gallery_Image_Quantity=jQuery('#Juna_IT_Photo_Gallery_Image_Quantity').val();
		var Juna_IT_Photo_Gallery_Images_Quantity_After=parseInt(Juna_IT_Photo_Gallery_Image_Quantity)*(parseInt(Juna_IT_Photo_Gallery_First_Page)+1);
		var Juna_IT_Photo_Gallery_Images_Quantity_Before=parseInt(Juna_IT_Photo_Gallery_Image_Quantity)*parseInt(Juna_IT_Photo_Gallery_First_Page)+1;
		setTimeout(function(){
			for(var i=1;i<Juna_IT_Photo_Gallery_Count_Images;i++)
			{
				jQuery('.BSJIT'+i).hide();
			}
		},500);
		setTimeout(function(){
			for(var i=Juna_IT_Photo_Gallery_Images_Quantity_Before;i<=Juna_IT_Photo_Gallery_Images_Quantity_After;i++)
			{
				if(i<=Juna_IT_Photo_Gallery_Count_Images)
				{
					jQuery('.BSJIT'+i).show();
					RF();
				}
			}
			var Juna_IT_Photo_Gallery_First_Page1=parseInt(Juna_IT_Photo_Gallery_First_Page)+1;
			jQuery('#Juna_IT_Photo_Gallery_First_Page').html(Juna_IT_Photo_Gallery_First_Page1);
		},1000);
	}	
}
function Juna_IT_Photo_Gallery_Fast_Forward_Clicked()
{
	var Juna_IT_Photo_Gallery_First_Page=jQuery('#Juna_IT_Photo_Gallery_First_Page').html();
	var Juna_IT_Photo_Gallery_End_Page=jQuery('#Juna_IT_Photo_Gallery_End_Page').html();
	if(parseInt(Juna_IT_Photo_Gallery_First_Page)<parseInt(Juna_IT_Photo_Gallery_End_Page.substr(1)))
	{
		var Juna_IT_Photo_Gallery_Count_Images=jQuery('#Juna_IT_Photo_Gallery_Count_Images').val();
		var Juna_IT_Photo_Gallery_Image_Quantity=jQuery('#Juna_IT_Photo_Gallery_Image_Quantity').val();
		var Juna_IT_Photo_Gallery_Images_Quantity_Before=parseInt(Juna_IT_Photo_Gallery_Image_Quantity)*(parseInt(Juna_IT_Photo_Gallery_End_Page.substr(1))-1)+1;
		setTimeout(function(){
			for(var i=1;i<Juna_IT_Photo_Gallery_Count_Images;i++)
			{
				jQuery('.BSJIT'+i).hide();
			}
		},500);
		setTimeout(function(){
			for(var i=Juna_IT_Photo_Gallery_Images_Quantity_Before;i<=Juna_IT_Photo_Gallery_Count_Images;i++)
			{
				jQuery('.BSJIT'+i).show();
				RF();
			}
			var Juna_IT_Photo_Gallery_First_Page1=parseInt(Juna_IT_Photo_Gallery_End_Page.substr(1));
			jQuery('#Juna_IT_Photo_Gallery_First_Page').html(Juna_IT_Photo_Gallery_First_Page1);
		},1000);
	}
}
function Juna_IT_Photo_Gallery_Load_More_Clicked()
{
	var Juna_IT_Photo_Gallery_Count_Images=jQuery('#Juna_IT_Photo_Gallery_Count_Images').val();
	var Juna_IT_Photo_Gallery_Image_Quantity=jQuery('#Juna_IT_Photo_Gallery_Image_Quantity').val();
	var Juna_IT_Photo_Gallery_Image_Quantity_Hidden=jQuery('#Juna_IT_Photo_Gallery_Image_Quantity_Hidden').val();
	var Juna_IT_Photo_Gallery_Image_Quantity_Hidden1=parseInt(Juna_IT_Photo_Gallery_Image_Quantity_Hidden)+1;
	var Juna_IT_Photo_Gallery_Image_Quantity_Hidden2=parseInt(Juna_IT_Photo_Gallery_Image_Quantity_Hidden)+parseInt(Juna_IT_Photo_Gallery_Image_Quantity);
	setTimeout(function(){
		for(var i=Juna_IT_Photo_Gallery_Image_Quantity_Hidden1;i<=Juna_IT_Photo_Gallery_Image_Quantity_Hidden2;i++)
		{
			if(i<=parseInt(Juna_IT_Photo_Gallery_Count_Images))
			{
				jQuery('.BSJIT'+i).show();
				RF();
			}			
		}
		jQuery('#Juna_IT_Photo_Gallery_Image_Quantity_Hidden').val(Juna_IT_Photo_Gallery_Image_Quantity_Hidden2);	
		if(Juna_IT_Photo_Gallery_Image_Quantity_Hidden2>=parseInt(Juna_IT_Photo_Gallery_Count_Images))
		{
			jQuery('#Juna_IT_Photo_Gallery_Load_More').hide();
		}
		else
		{
			jQuery('#Juna_IT_Photo_Gallery_Load_More').show();
		}
	},1000);	
}