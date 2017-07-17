var contentWidthLCG = parseInt(jQuery('.contentWidthLCG').val());
				var popTitleLCG = parseInt(jQuery('.popTitleLCG').val());
				var popDescLCG = parseInt(jQuery('.popDescLCG').val());
				var popSliderIconLCG = parseInt(jQuery('.popSliderIconLCG').val());
				function LCGResponsive(){
					if(jQuery(window).width()<=(contentWidthLCG+50)){
						jQuery('.md-content').css('width',(jQuery(window).width()-50)+'px');
						jQuery('.descrpHeader').css('font-size',popTitleLCG*(jQuery(window).width()-50)/(jQuery(window).width()+100)+'px');
						jQuery('.descrpHeader').css('line-height',jQuery('.descrpHeader').css('font-size')+3+'px');
						jQuery('.descrpDesc').css('font-size',popDescLCG*(jQuery(window).width()-50)/(jQuery(window).width()+100)+3+'px');
						jQuery('.descrpDesc').css('line-height',jQuery('.descrpDesc').css('font-size'));
					}
					if(jQuery(window).width()<=500){
						jQuery('.slIcLCG').css('width',popSliderIconLCG*jQuery(window).width()/(jQuery(window).width()+150));
					}
				}
				LCGResponsive();
				jQuery(window).resize(function(){
					LCGResponsive();
				})
				
				var autoplayPauseTimeLCG = parseInt(jQuery('.autoplayPauseTimeLCG').val());
				var autoplayShowLCG = jQuery('.autoplayShowLCG').val();
				function SlEffect(){
					jQuery('#descrp').animate({'opacity':'0.4'},500);
					jQuery('.prevClickImgSlider').hide();
					jQuery('.nextClickImgSlider').hide();
					jQuery('.slImg').animate({'opacity':'0.4',},500, function(){
						jQuery('.slImg').attr('src',urlSrcImg[x]);
						jQuery('.descrpDesc').text(textDescArray[x]);
						jQuery('.descrpHeader').text(titleArray[x]);
						jQuery('.slImg').animate({'opacity':'1','margin-left':'0px','margin-right':'0px'},500);
						var y1=jQuery('.slImg').height();
						jQuery('.md-content').css('height',y1);
						jQuery('.descrpDesc').css('height',(y1-jQuery('.descrpHeader').height()-20)+'px');
						jQuery('#descrp').animate({'opacity':'1'},500);
						setTimeout(function(){
							jQuery('.prevClickImgSlider').show();
							jQuery('.nextClickImgSlider').show();
						},500)
					})
				}
				
				if(jQuery('#descrp').css('display')=='none'){
					jQuery('.prevClickImgSlider').css('left','20%');
					jQuery('.nextClickImgSlider').css('right','20%');
				}
				var x
				var urlSrcImg = [];	
				jQuery('.imageimg').each(function(){
					urlSrcImg.push(jQuery(this).attr('src'));
				})
				var textDescArray = [];	
				jQuery('.descrText').each(function(){
					textDescArray.push(jQuery(this).val());
				})
				var titleArray = [];	
				jQuery('.CTitle').each(function(){
					titleArray.push(jQuery(this).text());
				})
				
				var y=false;
				jQuery(".md-content").hover(function(){
					y=true;
				}, function(){
					y=false;
				});
				var z;
				
				function sInterval(){
					z=setInterval(function(){
						if(autoplayShowLCG == 'on'){
							if(y==true){
								return;
							}
							x++;
							if(x==urlSrcImg.length){
								x=0;
							}
							SlEffect();
						}
					},autoplayPauseTimeLCG*urlSrcImg.length*500)
				}
				function click_popup_slider(img_src,img_header,img_desc){
					jQuery('.slImg').attr('src',img_src);
					x = urlSrcImg.indexOf(jQuery('.slImg').attr('src'));
					jQuery('.descrpHeader').text(img_header);
					jQuery('.descrpDesc').text(img_desc);
					setTimeout(function(){
						sInterval();
					},500)
				}
				jQuery('.md-overlay').click(function(){
					clearInterval(z);
				})
				jQuery('.md-close').click(function(){
					clearInterval(z);
				})
				
				function nextClickImgSlider(){
					clearInterval(z);
					x++;
					if(x==urlSrcImg.length){
						x=0;
					}
					SlEffect();
					setTimeout(function(){
						sInterval();
					},500)
				}
				function prevClickImgSlider(){
					clearInterval(z);
					x--;
					if(x==-1){
						x=urlSrcImg.length-1;
					}
					SlEffect();
					setTimeout(function(){
						sInterval();
					},500)
				}
				jQuery('.grid').click(function(){
					var y=jQuery('.slImg').height()
					jQuery('.md-content').css('height',y);
					jQuery('.descrpDesc').css('height',(y-jQuery('.descrpHeader').height()-20)+'px');
				})