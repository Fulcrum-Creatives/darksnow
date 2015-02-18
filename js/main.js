var plane;
var planePosition;
var oldPosition = 0;
var oldScroll = 0;
var wasScrollingDown;
var wasMovingRight;
// var waypoints = [0, 1500, 2500, 3500, 5000, 6500, 7500];
// var currentZone = 0;
// var zone;


function ds_debug(str){
	// if(testing=="yes"){
	// 	console.log(str);
	// }
}

function getRandomArbitary(min, max) {
    return Math.random() * (max - min) + min;
}

 function jitter() {
	var top = parseInt($('#newCockpit').position().top);
	var left = parseInt($('#newCockpit').position().left);
	
	var dleft = getRandomArbitary(0,0);
	var dtop = getRandomArbitary(0,0);
	
	$('#newCockpit').css('marginTop', (0 + dtop) + 'px');	
	$('#newCockpit').css('marginLeft', (60 + dleft) + 'px');
	
}
// window.onload = jitter;

var jitterInterval;
 $(document).ready(function(){
  // moves the therm down the screen

  $(function() {
	// $('#gcont').scrollingParallax({
	//     staticSpeed : .45,   
	//     disableIE6Animation : false
	//   });
	
	// if(testing=="yes"){
		
		var scrollorama = $.scrollorama({
		  	enablePin : false,
		  	blocks : '.scrollblock'
		});
	
		scrollorama.animate('#cloud1', {
		  duration : 2000,
		  property : 'left',
		  start : -200,
		  end : 1800
		});
	
		scrollorama.animate('#cloud2', {
		  duration : 1250,
		  property : 'left',
		  start : -500,
		  end : 1900
		});
	
		scrollorama.animate('#cloud3', {
		  duration : 1000,
		  property : 'left',
		  start : 1550,
		  end : -300
		});
	
		scrollorama.animate('#our-journey-begins', {
		  duration : 1500,
		  property : 'top',
		  start : 190,
		  end : 590
		});
			
		scrollorama.animate('#our-research-is-critical', {
		  duration : 1000,
		  property : 'top',
		  start : 300,
		  end : 800
		});
		
		scrollorama.animate('#the-problem', {
		  duration : 1000,
		  property : 'top',
		  start : 660,
		  end : 800
		});
		

		// scrollorama.animate('#melting-of-greenland', {
		//   duration : 600,
		//   property : 'top',
		//   start : 700,
		//   end : 900
		// });
		
		
	// }
	
	$('body').mousewheel(function(event, delta) {    
    	$.scrollTo.window().queue([]).stop();
    	if (delta < 0) {
      		$('body').stop().scrollTo({top:'+=100px', left:'+=0'}, 200);
    	} else{
      		$('body').stop().scrollTo({top:'-=100px', left:'+=0'}, 200);
		}
    	return false;
  	});

	// jitterInterval = setInterval("jitter()", 100);
		
	$("a.no-click, a.a-gauge").click(function(event){
		event.preventDefault();
	});
	
	$("#nav-supporters, #supporters-gauge a.a-gauge").click(function(event){
		scrollToElement(event, $("#supporters"));
	});
	
		$("#nav-in-the-news").click(function(event){
		scrollToElement(event, $("#in-the-news"));
	});
	
	$("#nav-givenow, #give-now-gauge a.a-gauge").click(function(event){
	 	scrollToElement(event, $("#field_1_1"));
	 });
	
	$("#nav-expedition, #expeditions-gauge a.a-gauge").click(function(event){
		scrollToElement(event, $("#expedition-plan-2013"));
	});
				
	$("#nav-about").click(function(event){
		scrollToElement(event, $("#our-journey-begins"));
	});
		
	function scrollToElement(event, element){
		event.preventDefault();
		$window    	= $(window);
		var w_height = $window.height();
		
		
		var elementTop = element.offset().top;
		var top = (elementTop - Math.round(w_height/2) +10);
		
		$.scrollTo( {top:top, left:0}, 800);
	}
		
	$(window).scroll(function() {
		scrollTherm()
		// if("yes"==testing){
			scrollPlane();
		// }
		
	});
	
	
	var readmoreDivs = $('.readmore-link');
	readmoreDivs.each(function() {
		$(this).colorbox({
			iframe:true,
			scrolling: true, 
			width:"80%", 
			height:"80%"
		});
	});

	
	var markerAnchors = $(".marker-text-link");
	markerAnchors.each(function() {
		$(this).click(function(event){
			event.preventDefault();
		})
	});
	
	var markerDivs = $('.title-overlay');
	markerDivs.each(function() {
		
		
		var $this = $(this);
		$(this).waypoint(function() {
			highlightDiv($this);
		},
		{
		   	offset: '50%'  // show at middle of the page
			
		});
		
	});
	
	function highIntenseDiv(ele){
		
	}
	
	function highlightDiv(ele){
		
		var newRel = ele.width() + "x" + ele.height();
		var markerExcerpt = $(ele).find(".marker-excerpt:first");
		var titleOverlay = markerExcerpt.parent();
		
		// is open
		if(titleOverlay.hasClass('expanded')){
			markerExcerpt.fadeOut('fast', function(){
				titleOverlay.removeClass('expanded', 1000);
			});
			
		}
		else{
			titleOverlay.addClass('expanded', 2000);
			markerExcerpt.fadeIn('slow');
			// $(ele).scrollingParallax({
			//     staticSpeed: .3
			// });
		}
		
	}
	
	function unlightDiv(ele){
		var marker = $(ele).find("a.marker-text-link:first");
		var markerExcerpt = $(ele).find(".marker-excerpt:first");
		var rel = markerExcerpt.attr("rel");
		var size = rel.split("x");
		
		markerExcerpt.parent().animate({
			width: size[0],
			height: size[1]
		});
		markerExcerpt.fadeOut('fast');
	}
	
	//if(testing=="yes"){
		plane = $.plane({ el:'#plane'});
	//}
	
  });

});

function scrollPlane() {
	
	var offset = $(document).scrollTop();
	var windowHeight = $(window).height();
	var docHeight = $(document).height();

	var planeLeft = plane.getLeft();
	planePosition = parseInt($('#anim-plane').offset().top) + parseInt(offset);
		
	wasScrollingDown = planePosition > oldScroll;
	plane.hPlane(planePosition, wasScrollingDown);
	var dif = planePosition - oldScroll;
	oldScroll = planePosition;
	
	// for(var i = currentZone - 1; i < waypoints.length; i++) {
	//   if(planePosition < waypoints[i]) {
	//     zone = i;
	//     break;
	//   }
	// }
	// 
	// if(currentZone != zone) {
	// 	ds_debug("currentZone: " + currentZone);
	//   	currentZone = zone;
	//   	var m = (wasScrollingDown) ? waypoints[currentZone - 1] : waypoints[currentZone];
	// 	ds_debug("m: " + m);
	// 	
	// }
	
	
}

function scrollTherm(){
	var $therm   	= $("#thermometer-wrapper"),
		$thermDiv   = $("#thermometer"),
	    $window    	= $(window),
		w_height 	= $window.height(),
	    offset     	= $therm.offset(),
	    topPadding 	= 15;
		
	if($("#thermometer-wrapper").length>0){
	
	    if ($window.scrollTop() > offset.top) {
			var thermMarginTop = $window.scrollTop() - offset.top + topPadding;

			// var marginClass = Math.round(thermMarginTop/THERM_STEP);
			// ds_debug("thermMarginTop: " + thermMarginTop + ", marginClass: " + marginClass);
			// $thermDiv.removeClass().addClass("thermometer-"+marginClass);

	        $therm.stop().animate({
	            marginTop: thermMarginTop
	        });

	    } else {
	        $therm.stop().animate({
	            marginTop: 0
	        });
	    }
	}
			
}

// end main.js