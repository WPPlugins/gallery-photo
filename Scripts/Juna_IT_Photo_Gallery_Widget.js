jQuery(document).ready(function(){
	var BSTitleFontSize = parseInt(jQuery('.BSTitleFontSize').val());
	var BSDescFontSize = parseInt(jQuery('.BSDescFontSize').val());
	var BSLinkFontSize = parseInt(jQuery('.BSLinkFontSize').val());
	var BSIconsSize = parseInt(jQuery('.BSIconsSize').val());
	var FPGRoundWidth = parseInt(jQuery('.FPGRoundWidth').val());
	var FPGTitleFontSize = parseInt(jQuery('.FPGTitleFontSize').val());
	var FPGDescFontSize = parseInt(jQuery('.FPGDescFontSize').val());
	var FPGLinkFontSize = parseInt(jQuery('.FPGLinkFontSize').val());
	var FPGIconsSize = parseInt(jQuery('.FPGIconsSize').val());
	var ImgWidthTG = parseInt(jQuery('.ImgWidthTG').val());
	var ImgHeightTG = parseInt(jQuery('.ImgHeightTG').val());
	var ImgTitleTG = parseInt(jQuery('.ImgTitleTG').val());
	var ImgSlFS = parseInt(jQuery('.ImgSlFS').val());
	
	function response(){
		jQuery('.BSTIT').css('font-size',BSTitleFontSize*jQuery('.absBSIG').parent().width()/((jQuery('.absBSIG').parent().width()+150)));
		jQuery('.parBS').css('font-size',BSDescFontSize*jQuery('.absBSIG').parent().width()/((jQuery('.absBSIG').parent().width()+150)));
		jQuery('.BSLink').css('font-size',BSLinkFontSize*jQuery('.absBSIG').parent().width()/((jQuery('.absBSIG').parent().width()+150)));
		jQuery('.parBS').css('line-height',parseInt(jQuery('.parBS').css('font-size'))+2+'px');
		jQuery('#Juna_IT_Photo_Gallery_Show_All').css('font-size',BSIconsSize*jQuery('.absBSIG').parent().width()/((jQuery('.absBSIG').parent().width()+150)));
		
		jQuery('.box-1').css('max-width',FPGRoundWidth*jQuery('.box-1').parent().parent().width()/1000 +'px');
		jQuery('.headFPG').css('font-size',FPGTitleFontSize*jQuery('.box-1').width()/(jQuery('.box-1').width()+15) + 'px');
		jQuery('.descrFPG').css('font-size',FPGDescFontSize*jQuery('.box-1').width()/(jQuery('.box-1').width()+15) + 'px');
		jQuery('.descrFPG').css('line-height',jQuery('.descrFPG').css('font-size'));
		jQuery('.linkFPG').css('font-size',FPGLinkFontSize*jQuery('.box-1').width()/(jQuery('.box-1').width()+15) + 'px');
		jQuery('#Juna_IT_Photo_Gallery_Show_All_FPG').css('font-size',FPGIconsSize*jQuery('.box-1').width()/(jQuery('.box-1').width()+15) + 'px');
		
		if(jQuery('.box-1').parent().parent().width()<=600){
			jQuery('.box-1').css('max-width',FPGRoundWidth*jQuery('.box-1').parent().parent().width()/600 +'px');
			jQuery('.headFPG').css('font-size',FPGTitleFontSize*jQuery('.box-1').width()/(jQuery('.box-1').width()+15) + 'px');
			jQuery('.descrFPG').css('font-size',FPGDescFontSize*jQuery('.box-1').width()/(jQuery('.box-1').width()+15) + 'px');
			jQuery('.descrFPG').css('line-height',jQuery('.descrFPG').css('font-size'));
			jQuery('.linkFPG').css('font-size',FPGLinkFontSize*jQuery('.box-1').width()/(jQuery('.box-1').width()+15) + 'px');
			jQuery('#Juna_IT_Photo_Gallery_Show_All_FPG').css('font-size',FPGIconsSize*jQuery('.box-1').width()/(jQuery('.box-1').width()+15) + 'px');
		}
		if(jQuery('.box-1').parent().parent().width()<=350){
			jQuery('.box-1').css('max-width',FPGRoundWidth*jQuery('.box-1').parent().parent().width()/350 +'px');
			jQuery('.headFPG').css('font-size',FPGTitleFontSize*jQuery('.box-1').width()/(jQuery('.box-1').width()+15) + 'px');
			jQuery('.descrFPG').css('font-size',FPGDescFontSize*jQuery('.box-1').width()/(jQuery('.box-1').width()+15) + 'px');
			jQuery('.descrFPG').css('line-height',jQuery('.descrFPG').css('font-size'));
			jQuery('.linkFPG').css('font-size',FPGLinkFontSize*jQuery('.box-1').width()/(jQuery('.box-1').width()+15) + 'px');
			jQuery('#Juna_IT_Photo_Gallery_Show_All_FPG').css('font-size',FPGIconsSize*jQuery('.box-1').width()/(jQuery('.box-1').width()+15) + 'px');
		}
		jQuery('.highslide').css('width',ImgWidthTG*jQuery('.highslide').parent().width()/1000 +'px');
		jQuery('.highslide').css('height',ImgHeightTG*jQuery('.highslide').parent().width()/1000 +'px');
		jQuery('.TGTitle').css('font-size',ImgTitleTG*jQuery('.highslide').width()/((jQuery('.highslide').width()+15)));
		jQuery('#cboxSlideshow').css('font-size',ImgSlFS*jQuery(window).width()/((jQuery(window).width()+200)));
		jQuery('#cboxTitle').css('font-size',ImgSlFS*jQuery(window).width()/((jQuery(window).width()+200)));
		jQuery('#cboxCurrent').css('font-size',ImgSlFS*jQuery(window).width()/((jQuery(window).width()+200)));
		jQuery('#cboxNext15').css('width',parseInt(35)*jQuery(window).width()/((jQuery(window).width()+200)));
		jQuery('#cboxNext15').css('height',parseInt(60)*jQuery(window).width()/((jQuery(window).width()+200)));
		jQuery('#cboxPrevious15').css('width',parseInt(35)*jQuery(window).width()/((jQuery(window).width()+200)));
		jQuery('#cboxPrevious15').css('height',parseInt(60)*jQuery(window).width()/((jQuery(window).width()+200)));
		if(jQuery('.highslide').parent().width()<=600){
			jQuery('.highslide').css('width',ImgWidthTG*jQuery('.highslide').parent().width()/600 +'px');
			jQuery('.highslide').css('height',ImgHeightTG*jQuery('.highslide').parent().width()/600 +'px');
			jQuery('.TGTitle').css('font-size',ImgTitleTG*jQuery('.highslide').width()/((jQuery('.highslide').width()+15)));
		}
		if(jQuery('.highslide').parent().width()<=350){
			jQuery('.highslide').css('width',ImgWidthTG*jQuery('.highslide').parent().width()/350 +'px');
			jQuery('.highslide').css('height',ImgHeightTG*jQuery('.highslide').parent().width()/350 +'px');
			jQuery('.TGTitle').css('font-size',ImgTitleTG*jQuery('.highslide').width()/((jQuery('.highslide').width()+15)));
		}
	}
	response();
	jQuery(window).resize(function(){
		response();
	})
	
	
	
	var Juna_IT_Photo_Gallery_FPG=jQuery('#Juna_IT_Photo_Gallery_FPG').val();
	var Juna_IT_Photo_Gallery_Count_Images_FPG=jQuery('#Juna_IT_Photo_Gallery_Count_Images_FPG').val();
	var Juna_IT_Photo_Gallery_Image_Quantity_FPG=jQuery('#Juna_IT_Photo_Gallery_Image_Quantity_FPG').val();
	var Juna_IT_Photo_Gallery_Load_More_hidden_FPG=jQuery('#Juna_IT_Photo_Gallery_Load_More_hidden_FPG').val();
	if(Juna_IT_Photo_Gallery_Load_More_hidden_FPG!=='')
	{
		jQuery('.iticons_FPG').hide();
	}
	else
	{
		jQuery('.iticons_FPG').show('!important');
	}
	if(Juna_IT_Photo_Gallery_FPG=='none')
	{
		for(var i=1;i<=Juna_IT_Photo_Gallery_Count_Images_FPG;i++)
		{
			jQuery('.BoxFPG'+i).show();
		}
	}
	else if(Juna_IT_Photo_Gallery_FPG=='done')
	{
		for(var i=1;i<=Juna_IT_Photo_Gallery_Image_Quantity_FPG;i++)
		{
			jQuery('.BoxFPG'+i).show();
		}
	}
	else if(Juna_IT_Photo_Gallery_FPG=='Show')
	{
		for(var i=1;i<=Juna_IT_Photo_Gallery_Count_Images_FPG;i++)
		{
			jQuery('.BoxFPG'+i).show();
		}
		jQuery('#Juna_IT_Photo_Gallery_Show_All_FPG').hide();
	}	
	
	//Round Gallery
	
	var Juna_IT_Photo_Gallery_RG=jQuery('#Juna_IT_Photo_Gallery_RG').val();
	var Juna_IT_Photo_Gallery_Count_Images_RG=jQuery('#Juna_IT_Photo_Gallery_Count_Images_RG').val();
	var Juna_IT_Photo_Gallery_Image_Quantity_RG=jQuery('#Juna_IT_Photo_Gallery_Image_Quantity_RG').val();
	var Juna_IT_Photo_Gallery_Load_More_hidden_RG=jQuery('#Juna_IT_Photo_Gallery_Load_More_hidden_RG').val();
	if(Juna_IT_Photo_Gallery_Load_More_hidden_RG!=='')
	{
		jQuery('.iticons_RG').hide();
	}
	else
	{
		jQuery('.iticons_RG').show('!important');
	}
	if(Juna_IT_Photo_Gallery_RG=='none')
	{
		for(var i=1;i<=Juna_IT_Photo_Gallery_Count_Images_RG;i++)
		{
			jQuery('.hovhovR'+i).show();
		}
	}
	else if(Juna_IT_Photo_Gallery_RG=='done')
	{
		for(var i=1;i<=Juna_IT_Photo_Gallery_Image_Quantity_RG;i++)
		{
			jQuery('.hovhovR'+i).show();
		}
	}
	else if(Juna_IT_Photo_Gallery_RG=='Show')
	{
		for(var i=1;i<=Juna_IT_Photo_Gallery_Count_Images_RG;i++)
		{
			jQuery('.hovhovR'+i).show();
		}
		jQuery('#Juna_IT_Photo_Gallery_Show_All_RG').hide();
	}	
	
	//Tumbnails Gallery
	
	var Juna_IT_Photo_Gallery_TG=jQuery('#Juna_IT_Photo_Gallery_TG').val();
	var Juna_IT_Photo_Gallery_Count_Images_TG=jQuery('#Juna_IT_Photo_Gallery_Count_Images_TG').val();
	var Juna_IT_Photo_Gallery_Image_Quantity_TG=jQuery('#Juna_IT_Photo_Gallery_Image_Quantity_TG').val();
	var Juna_IT_Photo_Gallery_Load_More_hidden_TG=jQuery('#Juna_IT_Photo_Gallery_Load_More_hidden_TG').val();
	if(Juna_IT_Photo_Gallery_Load_More_hidden_TG!=='')
	{
		jQuery('.iticons_TG').hide();
	}
	else
	{
		jQuery('.iticons_TG').show('!important');
	}
	if(Juna_IT_Photo_Gallery_TG=='none')
	{
		for(var i=1;i<=Juna_IT_Photo_Gallery_Count_Images_TG;i++)
		{
			jQuery('.highslide'+i).show();
		}
	}
	else if(Juna_IT_Photo_Gallery_TG=='done')
	{
		for(var i=1;i<=Juna_IT_Photo_Gallery_Image_Quantity_TG;i++)
		{
			jQuery('.highslide'+i).show();
		}
	}
	else if(Juna_IT_Photo_Gallery_TG=='Show')
	{
		for(var i=1;i<=Juna_IT_Photo_Gallery_Count_Images_TG;i++)
		{
			jQuery('.highslide'+i).show();
		}
		jQuery('#Juna_IT_Photo_Gallery_Show_All_TG').hide();
	}
	
})

function Juna_IT_Photo_Gallery_Fast_Backward_Clicked_FPG()
{
	var Juna_IT_Photo_Gallery_First_Page_FPG=jQuery('#Juna_IT_Photo_Gallery_First_Page_FPG').html();
	var Juna_IT_Photo_Gallery_End_Page_FPG=jQuery('#Juna_IT_Photo_Gallery_End_Page_FPG').html();
	if(parseInt(Juna_IT_Photo_Gallery_First_Page_FPG)>1)
	{
		var Juna_IT_Photo_Gallery_Count_Images_FPG=jQuery('#Juna_IT_Photo_Gallery_Count_Images_FPG').val();
		var Juna_IT_Photo_Gallery_Image_Quantity_FPG=jQuery('#Juna_IT_Photo_Gallery_Image_Quantity_FPG').val();
		setTimeout(function(){
			for(var i=1;i<=Juna_IT_Photo_Gallery_Count_Images_FPG;i++)
			{
				jQuery('.BoxFPG'+i).hide();
			}
		},500);
		setTimeout(function(){
			for(var i=1;i<=Juna_IT_Photo_Gallery_Image_Quantity_FPG;i++)
			{
				jQuery('.BoxFPG'+i).show();
			}
			jQuery('#Juna_IT_Photo_Gallery_First_Page_FPG').html(1);
		},1000);
	}
}
function Juna_IT_Photo_Gallery_Chevron_Left_Clicked_FPG()
{
	var Juna_IT_Photo_Gallery_First_Page_FPG=jQuery('#Juna_IT_Photo_Gallery_First_Page_FPG').html();
	var Juna_IT_Photo_Gallery_End_Page_FPG=jQuery('#Juna_IT_Photo_Gallery_End_Page_FPG').html();
	if(parseInt(Juna_IT_Photo_Gallery_First_Page_FPG)>1)
	{
		var Juna_IT_Photo_Gallery_Count_Images_FPG=jQuery('#Juna_IT_Photo_Gallery_Count_Images_FPG').val();
		var Juna_IT_Photo_Gallery_Image_Quantity_FPG=jQuery('#Juna_IT_Photo_Gallery_Image_Quantity_FPG').val();
		var Juna_IT_Photo_Gallery_Images_Quantity_After_FPG=parseInt(Juna_IT_Photo_Gallery_Image_Quantity_FPG)*(parseInt(Juna_IT_Photo_Gallery_First_Page_FPG)-1);
		var Juna_IT_Photo_Gallery_Images_Quantity_Before_FPG=parseInt(Juna_IT_Photo_Gallery_Image_Quantity_FPG)*(parseInt(Juna_IT_Photo_Gallery_First_Page_FPG)-2)+1;
		setTimeout(function(){
			for(var i=1;i<=Juna_IT_Photo_Gallery_Count_Images_FPG;i++)
			{
				jQuery('.BoxFPG'+i).hide();
			}
		},500);
		setTimeout(function(){
			for(var i=Juna_IT_Photo_Gallery_Images_Quantity_Before_FPG;i<=Juna_IT_Photo_Gallery_Images_Quantity_After_FPG;i++)
			{
				jQuery('.BoxFPG'+i).show();
			}
			var Juna_IT_Photo_Gallery_First_Page1_FPG=parseInt(Juna_IT_Photo_Gallery_First_Page_FPG)-1;
			jQuery('#Juna_IT_Photo_Gallery_First_Page_FPG').html(Juna_IT_Photo_Gallery_First_Page1_FPG);
		},1000);
	}
}
function Juna_IT_Photo_Gallery_Chevron_Right_Clicked_FPG()
{
	var Juna_IT_Photo_Gallery_First_Page_FPG=jQuery('#Juna_IT_Photo_Gallery_First_Page_FPG').html();
	var Juna_IT_Photo_Gallery_End_Page_FPG=jQuery('#Juna_IT_Photo_Gallery_End_Page_FPG').html();
	if(parseInt(Juna_IT_Photo_Gallery_First_Page_FPG)<parseInt(Juna_IT_Photo_Gallery_End_Page_FPG.substr(1)))
	{
		var Juna_IT_Photo_Gallery_Count_Images_FPG=jQuery('#Juna_IT_Photo_Gallery_Count_Images_FPG').val();
		var Juna_IT_Photo_Gallery_Image_Quantity_FPG=jQuery('#Juna_IT_Photo_Gallery_Image_Quantity_FPG').val();
		var Juna_IT_Photo_Gallery_Images_Quantity_After_FPG=parseInt(Juna_IT_Photo_Gallery_Image_Quantity_FPG)*(parseInt(Juna_IT_Photo_Gallery_First_Page_FPG)+1);
		var Juna_IT_Photo_Gallery_Images_Quantity_Before_FPG=parseInt(Juna_IT_Photo_Gallery_Image_Quantity_FPG)*parseInt(Juna_IT_Photo_Gallery_First_Page_FPG)+1;
		setTimeout(function(){
			for(var i=1;i<Juna_IT_Photo_Gallery_Count_Images_FPG;i++)
			{
				jQuery('.BoxFPG'+i).hide();
			}
		},500);
		setTimeout(function(){
			for(var i=Juna_IT_Photo_Gallery_Images_Quantity_Before_FPG;i<=Juna_IT_Photo_Gallery_Images_Quantity_After_FPG;i++)
			{
				if(i<=Juna_IT_Photo_Gallery_Count_Images_FPG)
				{
					jQuery('.BoxFPG'+i).show();
				}
			}
			var Juna_IT_Photo_Gallery_First_Page1_FPG=parseInt(Juna_IT_Photo_Gallery_First_Page_FPG)+1;
			jQuery('#Juna_IT_Photo_Gallery_First_Page_FPG').html(Juna_IT_Photo_Gallery_First_Page1_FPG);
		},1000);
	}	
}
function Juna_IT_Photo_Gallery_Fast_Forward_Clicked_FPG()
{
	var Juna_IT_Photo_Gallery_First_Page_FPG=jQuery('#Juna_IT_Photo_Gallery_First_Page_FPG').html();
	var Juna_IT_Photo_Gallery_End_Page_FPG=jQuery('#Juna_IT_Photo_Gallery_End_Page_FPG').html();
	if(parseInt(Juna_IT_Photo_Gallery_First_Page_FPG)<parseInt(Juna_IT_Photo_Gallery_End_Page_FPG.substr(1)))
	{
		var Juna_IT_Photo_Gallery_Count_Images_FPG=jQuery('#Juna_IT_Photo_Gallery_Count_Images_FPG').val();
		var Juna_IT_Photo_Gallery_Image_Quantity_FPG=jQuery('#Juna_IT_Photo_Gallery_Image_Quantity_FPG').val();
		var Juna_IT_Photo_Gallery_Images_Quantity_Before_FPG=parseInt(Juna_IT_Photo_Gallery_Image_Quantity_FPG)*(parseInt(Juna_IT_Photo_Gallery_End_Page_FPG.substr(1))-1)+1;
		setTimeout(function(){
			for(var i=1;i<Juna_IT_Photo_Gallery_Count_Images_FPG;i++)
			{
				jQuery('.BoxFPG'+i).hide();
			}
		},500);
		setTimeout(function(){
			for(var i=Juna_IT_Photo_Gallery_Images_Quantity_Before_FPG;i<=Juna_IT_Photo_Gallery_Count_Images_FPG;i++)
			{
				jQuery('.BoxFPG'+i).show();
			}
			var Juna_IT_Photo_Gallery_First_Page1_FPG=parseInt(Juna_IT_Photo_Gallery_End_Page_FPG.substr(1));
			jQuery('#Juna_IT_Photo_Gallery_First_Page_FPG').html(Juna_IT_Photo_Gallery_First_Page1_FPG);
		},1000);
	}
}
function Juna_IT_Photo_Gallery_Load_More_Clicked_FPG()
{
	var Juna_IT_Photo_Gallery_Count_Images_FPG=jQuery('#Juna_IT_Photo_Gallery_Count_Images_FPG').val();
	var Juna_IT_Photo_Gallery_Image_Quantity_FPG=jQuery('#Juna_IT_Photo_Gallery_Image_Quantity_FPG').val();
	var Juna_IT_Photo_Gallery_Image_Quantity_Hidden_FPG=jQuery('#Juna_IT_Photo_Gallery_Image_Quantity_Hidden_FPG').val();
	var Juna_IT_Photo_Gallery_Image_Quantity_Hidden1_FPG=parseInt(Juna_IT_Photo_Gallery_Image_Quantity_Hidden_FPG)+1;
	var Juna_IT_Photo_Gallery_Image_Quantity_Hidden2_FPG=parseInt(Juna_IT_Photo_Gallery_Image_Quantity_Hidden_FPG)+parseInt(Juna_IT_Photo_Gallery_Image_Quantity_FPG);
	setTimeout(function(){
		for(var i=Juna_IT_Photo_Gallery_Image_Quantity_Hidden1_FPG;i<=Juna_IT_Photo_Gallery_Image_Quantity_Hidden2_FPG;i++)
		{
			if(i<=parseInt(Juna_IT_Photo_Gallery_Count_Images_FPG))
			{
				jQuery('.BoxFPG'+i).show();
			}			
		}
		jQuery('#Juna_IT_Photo_Gallery_Image_Quantity_Hidden_FPG').val(Juna_IT_Photo_Gallery_Image_Quantity_Hidden2_FPG);	
		if(Juna_IT_Photo_Gallery_Image_Quantity_Hidden2_FPG>=parseInt(Juna_IT_Photo_Gallery_Count_Images_FPG))
		{
			jQuery('#Juna_IT_Photo_Gallery_Load_More_FPG').hide();
		}
		else
		{
			jQuery('#Juna_IT_Photo_Gallery_Load_More_FPG').show();
		}
	},1000);	
}


//Raund Gallery


function Juna_IT_Photo_Gallery_Fast_Backward_Clicked_RG()
{
	var Juna_IT_Photo_Gallery_First_Page_RG=jQuery('#Juna_IT_Photo_Gallery_First_Page_RG').html();
	var Juna_IT_Photo_Gallery_End_Page_RG=jQuery('#Juna_IT_Photo_Gallery_End_Page_RG').html();
	if(parseInt(Juna_IT_Photo_Gallery_First_Page_RG)>1)
	{
		var Juna_IT_Photo_Gallery_Count_Images_RG=jQuery('#Juna_IT_Photo_Gallery_Count_Images_RG').val();
		var Juna_IT_Photo_Gallery_Image_Quantity_RG=jQuery('#Juna_IT_Photo_Gallery_Image_Quantity_RG').val();
		setTimeout(function(){
			for(var i=1;i<=Juna_IT_Photo_Gallery_Count_Images_RG;i++)
			{
				jQuery('.hovhovR'+i).hide();
			}
		},500);
		setTimeout(function(){
			for(var i=1;i<=Juna_IT_Photo_Gallery_Image_Quantity_RG;i++)
			{
				jQuery('.hovhovR'+i).show();
			}
			jQuery('#Juna_IT_Photo_Gallery_First_Page_RG').html(1);
		},1000);
	}
}
function Juna_IT_Photo_Gallery_Chevron_Left_Clicked_RG()
{
	var Juna_IT_Photo_Gallery_First_Page_RG=jQuery('#Juna_IT_Photo_Gallery_First_Page_RG').html();
	var Juna_IT_Photo_Gallery_End_Page_RG=jQuery('#Juna_IT_Photo_Gallery_End_Page_RG').html();
	if(parseInt(Juna_IT_Photo_Gallery_First_Page_RG)>1)
	{
		var Juna_IT_Photo_Gallery_Count_Images_RG=jQuery('#Juna_IT_Photo_Gallery_Count_Images_RG').val();
		var Juna_IT_Photo_Gallery_Image_Quantity_RG=jQuery('#Juna_IT_Photo_Gallery_Image_Quantity_RG').val();
		var Juna_IT_Photo_Gallery_Images_Quantity_After_RG=parseInt(Juna_IT_Photo_Gallery_Image_Quantity_RG)*(parseInt(Juna_IT_Photo_Gallery_First_Page_RG)-1);
		var Juna_IT_Photo_Gallery_Images_Quantity_Before_RG=parseInt(Juna_IT_Photo_Gallery_Image_Quantity_RG)*(parseInt(Juna_IT_Photo_Gallery_First_Page_RG)-2)+1;
		setTimeout(function(){
			for(var i=1;i<=Juna_IT_Photo_Gallery_Count_Images_RG;i++)
			{
				jQuery('.hovhovR'+i).hide();
			}
		},500);
		setTimeout(function(){
			for(var i=Juna_IT_Photo_Gallery_Images_Quantity_Before_RG;i<=Juna_IT_Photo_Gallery_Images_Quantity_After_RG;i++)
			{
				jQuery('.hovhovR'+i).show();
			}
			var Juna_IT_Photo_Gallery_First_Page1_RG=parseInt(Juna_IT_Photo_Gallery_First_Page_RG)-1;
			jQuery('#Juna_IT_Photo_Gallery_First_Page_RG').html(Juna_IT_Photo_Gallery_First_Page1_RG);
		},1000);
	}
}
function Juna_IT_Photo_Gallery_Chevron_Right_Clicked_RG()
{
	var Juna_IT_Photo_Gallery_First_Page_RG=jQuery('#Juna_IT_Photo_Gallery_First_Page_RG').html();
	var Juna_IT_Photo_Gallery_End_Page_RG=jQuery('#Juna_IT_Photo_Gallery_End_Page_RG').html();
	if(parseInt(Juna_IT_Photo_Gallery_First_Page_RG)<parseInt(Juna_IT_Photo_Gallery_End_Page_RG.substr(1)))
	{
		var Juna_IT_Photo_Gallery_Count_Images_RG=jQuery('#Juna_IT_Photo_Gallery_Count_Images_RG').val();
		var Juna_IT_Photo_Gallery_Image_Quantity_RG=jQuery('#Juna_IT_Photo_Gallery_Image_Quantity_RG').val();
		var Juna_IT_Photo_Gallery_Images_Quantity_After_RG=parseInt(Juna_IT_Photo_Gallery_Image_Quantity_RG)*(parseInt(Juna_IT_Photo_Gallery_First_Page_RG)+1);
		var Juna_IT_Photo_Gallery_Images_Quantity_Before_RG=parseInt(Juna_IT_Photo_Gallery_Image_Quantity_RG)*parseInt(Juna_IT_Photo_Gallery_First_Page_RG)+1;
		setTimeout(function(){
			for(var i=1;i<Juna_IT_Photo_Gallery_Count_Images_RG;i++)
			{
				jQuery('.hovhovR'+i).hide();
			}
		},500);
		setTimeout(function(){
			for(var i=Juna_IT_Photo_Gallery_Images_Quantity_Before_RG;i<=Juna_IT_Photo_Gallery_Images_Quantity_After_RG;i++)
			{
				if(i<=Juna_IT_Photo_Gallery_Count_Images_RG)
				{
					jQuery('.hovhovR'+i).show();
				}
			}
			var Juna_IT_Photo_Gallery_First_Page1_RG=parseInt(Juna_IT_Photo_Gallery_First_Page_RG)+1;
			jQuery('#Juna_IT_Photo_Gallery_First_Page_RG').html(Juna_IT_Photo_Gallery_First_Page1_RG);
		},1000);
	}	
}
function Juna_IT_Photo_Gallery_Fast_Forward_Clicked_RG()
{
	var Juna_IT_Photo_Gallery_First_Page_RG=jQuery('#Juna_IT_Photo_Gallery_First_Page_RG').html();
	var Juna_IT_Photo_Gallery_End_Page_RG=jQuery('#Juna_IT_Photo_Gallery_End_Page_RG').html();
	if(parseInt(Juna_IT_Photo_Gallery_First_Page_RG)<parseInt(Juna_IT_Photo_Gallery_End_Page_RG.substr(1)))
	{
		var Juna_IT_Photo_Gallery_Count_Images_RG=jQuery('#Juna_IT_Photo_Gallery_Count_Images_RG').val();
		var Juna_IT_Photo_Gallery_Image_Quantity_RG=jQuery('#Juna_IT_Photo_Gallery_Image_Quantity_RG').val();
		var Juna_IT_Photo_Gallery_Images_Quantity_Before_RG=parseInt(Juna_IT_Photo_Gallery_Image_Quantity_RG)*(parseInt(Juna_IT_Photo_Gallery_End_Page_RG.substr(1))-1)+1;
		setTimeout(function(){
			for(var i=1;i<Juna_IT_Photo_Gallery_Count_Images_RG;i++)
			{
				jQuery('.hovhovR'+i).hide();
			}
		},500);
		setTimeout(function(){
			for(var i=Juna_IT_Photo_Gallery_Images_Quantity_Before_RG;i<=Juna_IT_Photo_Gallery_Count_Images_RG;i++)
			{
				jQuery('.hovhovR'+i).show();
			}
			var Juna_IT_Photo_Gallery_First_Page1_RG=parseInt(Juna_IT_Photo_Gallery_End_Page_RG.substr(1));
			jQuery('#Juna_IT_Photo_Gallery_First_Page_RG').html(Juna_IT_Photo_Gallery_First_Page1_RG);
		},1000);
	}
}
function Juna_IT_Photo_Gallery_Load_More_Clicked_RG()
{
	var Juna_IT_Photo_Gallery_Count_Images_RG=jQuery('#Juna_IT_Photo_Gallery_Count_Images_RG').val();
	var Juna_IT_Photo_Gallery_Image_Quantity_RG=jQuery('#Juna_IT_Photo_Gallery_Image_Quantity_RG').val();
	var Juna_IT_Photo_Gallery_Image_Quantity_Hidden_RG=jQuery('#Juna_IT_Photo_Gallery_Image_Quantity_Hidden_RG').val();
	var Juna_IT_Photo_Gallery_Image_Quantity_Hidden1_RG=parseInt(Juna_IT_Photo_Gallery_Image_Quantity_Hidden_RG)+1;
	var Juna_IT_Photo_Gallery_Image_Quantity_Hidden2_RG=parseInt(Juna_IT_Photo_Gallery_Image_Quantity_Hidden_RG)+parseInt(Juna_IT_Photo_Gallery_Image_Quantity_RG);
	setTimeout(function(){
		for(var i=Juna_IT_Photo_Gallery_Image_Quantity_Hidden1_RG;i<=Juna_IT_Photo_Gallery_Image_Quantity_Hidden2_RG;i++)
		{
			if(i<=parseInt(Juna_IT_Photo_Gallery_Count_Images_RG))
			{
				jQuery('.hovhovR'+i).show();
			}			
		}
		jQuery('#Juna_IT_Photo_Gallery_Image_Quantity_Hidden_RG').val(Juna_IT_Photo_Gallery_Image_Quantity_Hidden2_RG);	
		if(Juna_IT_Photo_Gallery_Image_Quantity_Hidden2_RG>=parseInt(Juna_IT_Photo_Gallery_Count_Images_RG))
		{
			jQuery('#Juna_IT_Photo_Gallery_Load_More_RG').hide();
		}
		else
		{
			jQuery('#Juna_IT_Photo_Gallery_Load_More_RG').show();
		}
	},1000);	
}

//Tumbnails Gallery

function Juna_IT_Photo_Gallery_Fast_Backward_Clicked_TG()
{
	var Juna_IT_Photo_Gallery_First_Page_TG=jQuery('#Juna_IT_Photo_Gallery_First_Page_TG').html();
	var Juna_IT_Photo_Gallery_End_Page_TG=jQuery('#Juna_IT_Photo_Gallery_End_Page_TG').html();
	if(parseInt(Juna_IT_Photo_Gallery_First_Page_TG)>1)
	{
		var Juna_IT_Photo_Gallery_Count_Images_TG=jQuery('#Juna_IT_Photo_Gallery_Count_Images_TG').val();
		var Juna_IT_Photo_Gallery_Image_Quantity_TG=jQuery('#Juna_IT_Photo_Gallery_Image_Quantity_TG').val();
		setTimeout(function(){
			for(var i=1;i<=Juna_IT_Photo_Gallery_Count_Images_TG;i++)
			{
				jQuery('.highslide'+i).hide();
			}
		},500);
		setTimeout(function(){
			for(var i=1;i<=Juna_IT_Photo_Gallery_Image_Quantity_TG;i++)
			{
				jQuery('.highslide'+i).show();
			}
			jQuery('#Juna_IT_Photo_Gallery_First_Page_TG').html(1);
		},1000);
	}
}
function Juna_IT_Photo_Gallery_Chevron_Left_Clicked_TG()
{
	var Juna_IT_Photo_Gallery_First_Page_TG=jQuery('#Juna_IT_Photo_Gallery_First_Page_TG').html();
	var Juna_IT_Photo_Gallery_End_Page_TG=jQuery('#Juna_IT_Photo_Gallery_End_Page_TG').html();
	if(parseInt(Juna_IT_Photo_Gallery_First_Page_TG)>1)
	{
		var Juna_IT_Photo_Gallery_Count_Images_TG=jQuery('#Juna_IT_Photo_Gallery_Count_Images_TG').val();
		var Juna_IT_Photo_Gallery_Image_Quantity_TG=jQuery('#Juna_IT_Photo_Gallery_Image_Quantity_TG').val();
		var Juna_IT_Photo_Gallery_Images_Quantity_After_TG=parseInt(Juna_IT_Photo_Gallery_Image_Quantity_TG)*(parseInt(Juna_IT_Photo_Gallery_First_Page_TG)-1);
		var Juna_IT_Photo_Gallery_Images_Quantity_Before_TG=parseInt(Juna_IT_Photo_Gallery_Image_Quantity_TG)*(parseInt(Juna_IT_Photo_Gallery_First_Page_TG)-2)+1;
		setTimeout(function(){
			for(var i=1;i<=Juna_IT_Photo_Gallery_Count_Images_TG;i++)
			{
				jQuery('.highslide'+i).hide();
			}
		},500);
		setTimeout(function(){
			for(var i=Juna_IT_Photo_Gallery_Images_Quantity_Before_TG;i<=Juna_IT_Photo_Gallery_Images_Quantity_After_TG;i++)
			{
				jQuery('.highslide'+i).show();
			}
			var Juna_IT_Photo_Gallery_First_Page1_TG=parseInt(Juna_IT_Photo_Gallery_First_Page_TG)-1;
			jQuery('#Juna_IT_Photo_Gallery_First_Page_TG').html(Juna_IT_Photo_Gallery_First_Page1_TG);
		},1000);
	}
}
function Juna_IT_Photo_Gallery_Chevron_Right_Clicked_TG()
{
	var Juna_IT_Photo_Gallery_First_Page_TG=jQuery('#Juna_IT_Photo_Gallery_First_Page_TG').html();
	var Juna_IT_Photo_Gallery_End_Page_TG=jQuery('#Juna_IT_Photo_Gallery_End_Page_TG').html();
	if(parseInt(Juna_IT_Photo_Gallery_First_Page_TG)<parseInt(Juna_IT_Photo_Gallery_End_Page_TG.substr(1)))
	{
		var Juna_IT_Photo_Gallery_Count_Images_TG=jQuery('#Juna_IT_Photo_Gallery_Count_Images_TG').val();
		var Juna_IT_Photo_Gallery_Image_Quantity_TG=jQuery('#Juna_IT_Photo_Gallery_Image_Quantity_TG').val();
		var Juna_IT_Photo_Gallery_Images_Quantity_After_TG=parseInt(Juna_IT_Photo_Gallery_Image_Quantity_TG)*(parseInt(Juna_IT_Photo_Gallery_First_Page_TG)+1);
		var Juna_IT_Photo_Gallery_Images_Quantity_Before_TG=parseInt(Juna_IT_Photo_Gallery_Image_Quantity_TG)*parseInt(Juna_IT_Photo_Gallery_First_Page_TG)+1;
		setTimeout(function(){
			for(var i=1;i<Juna_IT_Photo_Gallery_Count_Images_TG;i++)
			{
				jQuery('.highslide'+i).hide();
			}
		},500);
		setTimeout(function(){
			for(var i=Juna_IT_Photo_Gallery_Images_Quantity_Before_TG;i<=Juna_IT_Photo_Gallery_Images_Quantity_After_TG;i++)
			{
				if(i<=Juna_IT_Photo_Gallery_Count_Images_TG)
				{
					jQuery('.highslide'+i).show();
				}
			}
			var Juna_IT_Photo_Gallery_First_Page1_TG=parseInt(Juna_IT_Photo_Gallery_First_Page_TG)+1;
			jQuery('#Juna_IT_Photo_Gallery_First_Page_TG').html(Juna_IT_Photo_Gallery_First_Page1_TG);
		},1000);
	}	
}
function Juna_IT_Photo_Gallery_Fast_Forward_Clicked_TG()
{
	var Juna_IT_Photo_Gallery_First_Page_TG=jQuery('#Juna_IT_Photo_Gallery_First_Page_TG').html();
	var Juna_IT_Photo_Gallery_End_Page_TG=jQuery('#Juna_IT_Photo_Gallery_End_Page_TG').html();
	if(parseInt(Juna_IT_Photo_Gallery_First_Page_TG)<parseInt(Juna_IT_Photo_Gallery_End_Page_TG.substr(1)))
	{
		var Juna_IT_Photo_Gallery_Count_Images_TG=jQuery('#Juna_IT_Photo_Gallery_Count_Images_TG').val();
		var Juna_IT_Photo_Gallery_Image_Quantity_TG=jQuery('#Juna_IT_Photo_Gallery_Image_Quantity_TG').val();
		var Juna_IT_Photo_Gallery_Images_Quantity_Before_TG=parseInt(Juna_IT_Photo_Gallery_Image_Quantity_TG)*(parseInt(Juna_IT_Photo_Gallery_End_Page_TG.substr(1))-1)+1;
		setTimeout(function(){
			for(var i=1;i<Juna_IT_Photo_Gallery_Count_Images_TG;i++)
			{
				jQuery('.highslide'+i).hide();
			}
		},500);
		setTimeout(function(){
			for(var i=Juna_IT_Photo_Gallery_Images_Quantity_Before_TG;i<=Juna_IT_Photo_Gallery_Count_Images_TG;i++)
			{
				jQuery('.highslide'+i).show();
			}
			var Juna_IT_Photo_Gallery_First_Page1_TG=parseInt(Juna_IT_Photo_Gallery_End_Page_TG.substr(1));
			jQuery('#Juna_IT_Photo_Gallery_First_Page_TG').html(Juna_IT_Photo_Gallery_First_Page1_TG);
		},1000);
	}
}
function Juna_IT_Photo_Gallery_Load_More_Clicked_TG()
{
	var Juna_IT_Photo_Gallery_Count_Images_TG=jQuery('#Juna_IT_Photo_Gallery_Count_Images_TG').val();
	var Juna_IT_Photo_Gallery_Image_Quantity_TG=jQuery('#Juna_IT_Photo_Gallery_Image_Quantity_TG').val();
	var Juna_IT_Photo_Gallery_Image_Quantity_Hidden_TG=jQuery('#Juna_IT_Photo_Gallery_Image_Quantity_Hidden_TG').val();
	var Juna_IT_Photo_Gallery_Image_Quantity_Hidden1_TG=parseInt(Juna_IT_Photo_Gallery_Image_Quantity_Hidden_TG)+1;
	var Juna_IT_Photo_Gallery_Image_Quantity_Hidden2_TG=parseInt(Juna_IT_Photo_Gallery_Image_Quantity_Hidden_TG)+parseInt(Juna_IT_Photo_Gallery_Image_Quantity_TG);
	setTimeout(function(){
		for(var i=Juna_IT_Photo_Gallery_Image_Quantity_Hidden1_TG;i<=Juna_IT_Photo_Gallery_Image_Quantity_Hidden2_TG;i++)
		{
			if(i<=parseInt(Juna_IT_Photo_Gallery_Count_Images_TG))
			{
				jQuery('.highslide'+i).show();
			}			
		}
		jQuery('#Juna_IT_Photo_Gallery_Image_Quantity_Hidden_TG').val(Juna_IT_Photo_Gallery_Image_Quantity_Hidden2_TG);	
		if(Juna_IT_Photo_Gallery_Image_Quantity_Hidden2_TG>=parseInt(Juna_IT_Photo_Gallery_Count_Images_TG))
		{
			jQuery('#Juna_IT_Photo_Gallery_Load_More_TG').hide();
		}
		else
		{
			jQuery('#Juna_IT_Photo_Gallery_Load_More_TG').show();
		}
	},1000);	
}