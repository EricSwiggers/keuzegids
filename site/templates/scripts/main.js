/*if (Cookies.get('language') == 0) {
    Cookies.set('language', 'english');
}*/


$(document).ready(function(){
	
	/*if( Cookies.get('language') == 'english' ){
		$('.languagebutton').removeClass('selected');
		$('button#english').addClass('selected');
	} else {
		$('.languagebutton').removeClass('selected');
		$('button#dutch').addClass('selected');
	}*/

	$(".project-video .TextformatterVideoEmbed iframe").each(function (index, value){
					window.videoSource = $(this).attr("src");
					console.log(videoSource);
					//$(this).attr("src","");
					//$(this).attr("src",videoSource);
				});	
	
	//=========================RESPONSIVE STUFF============================
	
		
	//Container & Mainvideo min-height;
		var headerH = $('#header').outerHeight(true);
		var footerH = $('#footer').outerHeight(true);
		var windowH = $(window).innerHeight();
		var containerH = windowH - headerH - footerH;
		$('#container').css('min-height', containerH);
		$('#main-video').css('min-height', containerH);

		
	 //IMG Quote same Height as holder
    	var quoteholderHeight = $('.quote-holder').outerHeight();
		quoteholderHeight = Math.round(quoteholderHeight);
		$('.quote-img').css('width', quoteholderHeight);
		$('.quote-img').css('height', quoteholderHeight);
		$('.quote-holder').css('min-height', quoteholderHeight);
	
		var barholderHeight = $('.bar-holder').outerHeight();
		$('.bar-extra').css('min-height', barholderHeight);
		$('.main-image').css('min-height', barholderHeight);
		
	//Heading 100% if buttonholder collides
	
		var headingW = $('.heading').width();
		var btnholderW = $('.button-holder').outerWidth(true);
		var rowW = $('.heading-holder').width();
		if(headingW + btnholderW > rowW ){
			$('.heading').css('width', '100%');
		};
	
	//Menu Full Height
		//var offsetFoo = $('#footer').offset().top;
		//$('#menu').css('min-height', offsetFoo);
	
	$(window).on('resize', function() {
		//Container min-height;
		var headerH = $('#header').outerHeight(true);
		var footerH = $('#footer').outerHeight(true);
		var windowH = $(window).innerHeight();
		var containerH = windowH - headerH - footerH;
		$('#container').css('min-height', containerH);
		
	//Heading 100% if buttonholder collides
		var headingW = $('.heading').width();
		var btnholderW = $('.button-holder').outerWidth(true);
		var rowW = $('.heading-holder').width();
		if(headingW + btnholderW > rowW ){
			$('.heading').css('width', '100%');
		};
	
	});
	
	//=========================Collapse children Main Menu==================================
	
	$('.level-2.has_children').append('<span class="collapse fa fa-chevron-down"></span>');
	$('li.level-3.current').closest('.level-2.has_children').append('<span class="collapse fa fa-chevron-up"></span>');
	
	$('.collapse').on('click', function() {
		if($(this).hasClass('fa-chevron-up')){
			$(this).siblings('ul').slideUp();
			$(this).removeClass('fa-chevron-up');
			$(this).addClass('fa-chevron-down');
		}
		else {
			
			$(this).siblings().slideDown();
			$(this).removeClass('fa-chevron-down');
			$(this).addClass('fa-chevron-up');
		}
	});
	
	
	//=========================Offcanvas Menu==================================
	
	
	$('#menu-btn').on('click', function(){
		
		if($(this).hasClass('opened')) {
			$(this).removeClass('opened');
			$('#menu').transition({
				left: '-100%',
				}, 500, 'ease', function(){
					$('#menu').css('display','none');
					});
		}
		else {
			
		$("html, body").animate({ scrollTop: 0 }, "slow");
		$(this).addClass('opened');
		$('#menu').css('display','block');
		$('#menu').transition({
			left: 0,
			}, 400, 'ease', function(){
				$('li.level-3.current').closest('.parent ul').slideDown();
				});
		}
	
		
	});
	
	$('#menu-close-btn').on('click', function(){
		$('#menu-btn').removeClass('opened');
		$('#menu').transition({
			left: '-100%',
			}, 500, 'ease', function(){
				$('#menu').css('display','none');
				});
	});

	
	
	
	//=========================BUTTONS STUFF==================================
	
	
	/*$('#english').on('click', function() {
		if(Cookies.get('language') != 'english'){
		Cookies.remove('language');
		Cookies.set('language', 'english');
		location.reload();
	
		}
	});
	$('#dutch').on('click', function() {
		if(Cookies.get('language') != 'default'){
		Cookies.remove('language');
		Cookies.set('language', 'default');
		location.reload();
		}
	});*/
	
	$('.bar-buttons').on('click', function(){
		
		var btnId = $(this).attr('id');	
		
		if($(this).hasClass('active')){
			
			$('.bar-extra').transition({right: '-100%'}, 600, 'ease');
			$(this).removeClass('active');
			$('.bar-holder').css('min-height' , '');
			$('.bar-main').css('min-height' , '');
			$('#bar-'+btnId).css('min-height' , '');
			
			//stop youtubevideo
			
			if($(this).attr('id') == 'projecten'){
				
				$(".project-video .TextformatterVideoEmbed iframe").each(function (index, value){
					window.videoSource = $(this).attr("src");
					console.log(videoSource);
					$(this).attr("src","");
					$(this).attr("src",videoSource);
				});			
   			}
		}
		else{
				
			
			//Buttons active or not
			$('.bar-buttons').removeClass('active');
			$(this).addClass('active');
			
			//Make Barholder same height as incoming bar.
			var slideBarHeight = $('#bar-'+btnId).outerHeight(true)+32;
			slidebarHeight = Math.round(slideBarHeight);
			$('.bar-holder').css('min-height' , slideBarHeight);
			$('.bar-main').css('min-height' , slideBarHeight);
			$('#bar-'+btnId).css('min-height' , slideBarHeight);
			
			
			//Slide-in Bar, other bars back
			$('.bar-extra').css('z-index', 0);
			$('#bar-'+btnId).css('z-index', 20).transition({right: '0'}, 600, 'ease', function(){
				$(this).prevAll('.bar-extra').css('right', '-100%');
				$(this).nextAll('.bar-extra').css('right', '-100%');
			});		
		}				
	});
	
	
	$('#video').on('click', function(){
		$('#main-video').fadeIn();
	});
	
	$('#video-close-btn').on('click', function(){
		
		$('#main-video').hide();
		
		$("#youtube-row .TextformatterVideoEmbed iframe").each(function (index, value){
					var videoUrl = $(this).attr("src");
					console.log(videoUrl);
					$(this).attr("src","");
					$(this).attr("src",videoUrl);
					
				});	
	});	
	
	$('.arrow-right').on('click', function(){
		$('.bar-extra').transition({right: '-100%'}, 600, 'ease');
		$('.bar-buttons').removeClass('active');
		$('.bar-holder').css('min-height' , '');
		$('.bar-main').css('min-height' , '');
			
		if($(this).parent().parent().attr('id') == 'bar-projecten'){
		var videoUrl = $(".TextformatterVideoEmbed iframe").attr("src");
		$(".TextformatterVideoEmbed iframe").attr("src","");
		$(".TextformatterVideoEmbed iframe").attr("src",videoUrl);
		}
	});
	
	//=========================Topbar fixed==================================

	$(window).scroll(function(){
		if($(window).scrollTop() > 50) {
		  $('#header').addClass('fixed');
		}
		else {
		   $('#header').removeClass('fixed');
		}
	});

	
	/*
	$(window).resize(function(){
		//IMG Quote same Height as holder
		
    	var quoteholderHeight = $('.quote-holder').outerHeight();
		$('.quote-img').css('width', quoteholderHeight);
		$('.quote-img').css('height', quoteholderHeight);
		
		var barholderHeight = $('.bar-holder').outerHeight();
		$('.bar-extra').css('min-height', barholderHeight);
		
		var headingW = $('.heading').width();
		var btnholderW = $('.button-holder').outerWidth(true);
		var rowW = $('.heading-holder').width();
		//if(headingW + btnholderW > rowW ){
			//$('.heading').css('width', '100%');
		//}
		//else{
			//$('.heading').css('width', 'auto');
		//}
	});
	*/
		
	equalize();
				
	$(window).on('resize', function(){
					equalize();
				});
	
	
	
	$('body').bind('touchstart', function() {});
	
});

function equalize() {
	var maxHeight = 0;
	if($(window).width() >= 419){				
	$(".person-inner").each(function(){
		if ($(this).height() > maxHeight) { maxHeight = $(this).height(); }
		});					
	$(".person-inner").height(maxHeight);
	}
	else {
		$(".person-inner").css('height', 'auto');
	}
}

