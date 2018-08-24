function pixflow_fitRowToHeight(){"use strict";var rowsInPage=$(".vc_row:not(.vc_inner)").length;$(".vc_row").each(function(){var flag=false,$this=$(this),contentHeight=$this.find(".wrap").height();if($this.hasClass("fit-to-height")){if(contentHeight>$(window).height()&&rowsInPage==1){$this.css({height:contentHeight+20})}else{if($(window).width()<1281&&$this.find("> .wrap").css("height").replace(/[^-\d\.]/g,"")*1>$(window).height()){flag=true}else{$this.css({height:$(window).height()})}}}})}window_resize_functions.pixflow_fitRowToHeight=[];document_ready_functions.pixflow_fitRowToHeight=[];function pixflow_rowTransitionalColor($row,firstColor,secondColor){"use strict";var $=jQuery,scrollPos=0,currentRow=$row,beginningColor=firstColor,endingColor=secondColor,percentScrolled,newRed,newGreen,newBlue,newColor;currentRow.css({"background-color":beginningColor});$(document).scroll(function(){var animationBeginPos=currentRow.offset().top,endPart=currentRow.outerHeight()<800?currentRow.outerHeight()/4:$(window).height(),animationEndPos=animationBeginPos+currentRow.outerHeight()-endPart;scrollPos=$(this).scrollTop();if(scrollPos>=animationBeginPos&&scrollPos<=animationEndPos){percentScrolled=(scrollPos-animationBeginPos)/(currentRow.outerHeight()-endPart);newRed=Math.abs(beginningColor.red()+(endingColor.red()-beginningColor.red())*percentScrolled);newGreen=Math.abs(beginningColor.green()+(endingColor.green()-beginningColor.green())*percentScrolled);newBlue=Math.abs(beginningColor.blue()+(endingColor.blue()-beginningColor.blue())*percentScrolled);newColor=new $.Color(newRed,newGreen,newBlue);currentRow.animate({backgroundColor:newColor},0)}else if(scrollPos>animationEndPos){currentRow.animate({backgroundColor:endingColor},0)}else if(scrollPos<animationBeginPos){currentRow.animate({backgroundColor:beginningColor},0)}})}function pixflow_rowParallax(){"use strict";if($(window).width()<=1280&&pixflow_isTouchDevice())return;$(".row-image").each(function(){var $this=$(this),isParallax=$this.attr("isParallax"),$dataSpeed=$this.parent().attr("data-speed");$(".row-image").each(function(){var $this=$(this),isParallax=$this.attr("isParallax");if(typeof isParallax!==typeof undefined&&isParallax!==false){}})})}window_load_functions.pixflow_rowParallax=[];responsive_functions.pixflow_rowParallax=[];function pixflow_btnSlide(btnId){"use strict";if(btnId=="staticValue"){var $shortcodeBtn=$(".shortcode-btn"),$btnSlide=$shortcodeBtn.find(".slide"),$btnSlideStandard=$shortcodeBtn.find(".slide.button-standard"),$btnSlideSmall=$shortcodeBtn.find(".slide.button-small"),$btnSlideTxt=$shortcodeBtn.find(".slide span"),$btnSlideStandardWidth,$btnSlideSmallWidth,btnIdTemp,$btnAttr;$btnSlide.each(function(){btnIdTemp=$(this),$btnSlideTxt=btnIdTemp.find("span");$btnSlideTxt.css({position:"relative",display:"table"});btnIdTemp.css({width:"auto"});if(btnIdTemp.hasClass("button-standard")){$btnSlideStandardWidth=btnIdTemp.outerWidth();$btnSlideStandard.css({width:"52px"})}else if(btnIdTemp.hasClass("button-small")){$btnSlideSmallWidth=btnIdTemp.outerWidth();$btnSlideSmall.css("width","40px")}$btnSlideTxt.css({position:"absolute",display:"table"});btnIdTemp.addClass("slide-transition");$btnSlideStandard.hover(function(){$(this).css({width:$btnSlideStandardWidth});$(this).find("span").css({opacity:1,left:"52px"})},function(){$(this).css("width","52px");$(this).find("span").css({opacity:0,left:"25px"})});$btnSlideSmall.hover(function(){$(this).css("width",$btnSlideSmallWidth);$(this).find("span").css({opacity:1,left:"40px"})},function(){$(this).css("width","40px");$(this).find("span").css({opacity:0,left:"17px"})})})}else{var $shortcodeBtn=$("#"+btnId),$btnSlide=$shortcodeBtn.find(".slide"),$btnSlideStandard=$shortcodeBtn.find(".slide.button-standard"),$btnSlideSmall=$shortcodeBtn.find(".slide.button-small"),$btnSlideTxt=$shortcodeBtn.find(".slide span"),$btnSlideStandardWidth,$btnSlideSmallWidth,btnIdTemp,$btnAttr;$btnSlideTxt.css({position:"relative",display:"inline-block"});$btnSlide.css("width","inherit");btnIdTemp=$("."+btnId);if(btnIdTemp.hasClass("button-standard")){$btnSlideStandardWidth=btnIdTemp.outerWidth(true);$btnSlideStandard.css("width","52px")}else if(btnIdTemp.hasClass("button-small")){$btnSlideSmallWidth=btnIdTemp.outerWidth(true);$btnSlideSmall.css("width","40px")}$btnSlideTxt.css({position:"absolute",display:"table"});btnIdTemp.addClass("slide-transition");$btnSlideStandard.hover(function(){$(btnIdTemp).css({width:$btnSlideStandardWidth});$(btnIdTemp).find("span").css({opacity:1,left:"52px"})},function(){$(btnIdTemp).css("width","52px");$(btnIdTemp).find("span").css({opacity:0,left:"25px"})});$btnSlideSmall.hover(function(){$(this).css("width",$btnSlideSmallWidth);$(this).find("span").css({opacity:1,left:"40px"})},function(){$(this).css("width","40px");$(this).find("span").css({opacity:0,left:"17px"})})}var width=$btnSlide.css("width"),$btnAnimation=$shortcodeBtn.find(".animation"),$btnText=$btnAnimation.find("span"),$btnIcon=$btnAnimation.find(".button-icon");if($(window).width()<1025){$btnSlide.click(function(){if($(this).css("width")==width){$(this).trigger("mouseenter");return false}})}}function pixflow_load_btn_slide(){if($(".shortcode-btn .slide").length)pixflow_btnSlide("staticValue")}window_load_functions.pixflow_load_btn_slide=[];function pixflow_title_slider(){"use strict";if(!$(".title-slider").length){return}$(".md-text-title").each(function(index,value){if($(this).find(".texts li").length<=1){$(this).removeData();return true}$(this).textillate({in:{effect:"fadeIn",delayScale:1.5,delay:65},out:{effect:"fadeOut",delayScale:1.5,delay:65},loop:true,type:"char",minDisplayTime:0,initialDelay:100});$(this).find("ul").css("display","block");var liHeight=0,tempVal=0;$(this).find("ul li").each(function(){liHeight=$(this).height();if(tempVal<liHeight){tempVal=liHeight}});$(this).find("ul").css("display","none");$(this).css("height",tempVal+"px")})}document_ready_functions.pixflow_title_slider=[];function pixflow_contactForm(){"use strict";var inputheight;if($(".contact-form").length<1){return}$(".wpcf7").on("invalid.wpcf7",function(e){$("span.wpcf7-not-valid-tip").each(function(){$(this).prev().css({"box-shadow":"0 0 2px 1px red"})})});$(".wpcf7-form .form-input input").click(function(){$(this).css({"box-shadow":"none"})})}document_ready_functions.pixflow_contactForm=[];window_resize_functions.pixflow_contactForm=[];function pixflow_contactFormAnimation(){"use strict";$(".input__field--hoshi").each(function(){var $this=$(this);$this.focus(function(){var $elem=$(this);$elem.parent(".wpcf7-form-control-wrap").addClass("focus");$elem.parents(".input").addClass("input--filled")});$this.focusout(function(){var $elem=$(this);$elem.parent(".wpcf7-form-control-wrap").removeClass("focus");if($elem.val().length<1){$elem.parents(".input").removeClass("input--filled")}});$this.keyup(function(){var $elem=$(this);if($elem.is(".wpcf7-not-valid")){$elem.removeClass("wpcf7-not-valid").removeAttr("style");$elem.next(".wpcf7-not-valid-tip").remove()}})})}document_ready_functions.pixflow_contactFormAnimation=[];