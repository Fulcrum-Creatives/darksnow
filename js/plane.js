var canvas;
var planeImg;
var minAngle = -15;
var maxAngle = 15;
var currentAngle = 0;
var rotateInterval;
// var oldScroll = 0;
// var wasScrollingDown;
var waypoints = [0, 1500, 2500, 3500, 5000, 6500, 7500];
var currentZone = 0;
var zone;
var planeScale;
var hDelta=0;
var canFlip = false;

(function($) {

  $.plane = function(options) {
	
	var initialTop = 200;
	var initialLeft = -100; // 549;
	var initialScale = .1;
	var initialOpacity = .5;
	var top = initialTop;
	var left = initialLeft;
	
	var plane = this;
	
	function init() {
		planeScale = initialScale;
		
		// init the canvas
		canvas = new fabric.Canvas('anim-plane', { selection: false });
		
		// add the plane image to the canvas
		fabric.Image.fromURL('/wp-content/themes/darksnow/images/red-plane-right.png', function(img) {
			planeImg = img;
			img.setOpacity(initialOpacity);
			img.scaleX = img.scaleY = initialScale;
		    img.set('left', initialLeft).set('top', initialTop);
		    canvas.add(img);
		  });
	
		// this doesn't work, had to set the place as visible, but
		// off screen or if never responds to an opacity increase
		// planeImg.setOpacity(0);
	}
	
	
	plane.rotateDown = function(){
		planeImg.setAngle(maxAngle);
	};
	
	plane.rotateUp = function(){
		planeImg.setAngle(minAngle);
	};
	
	plane.goingRight = function(){
		planeImg.flipX = false;
		// ds_debug("goingRight, planeImg.left: " + planeImg.left);
	};
	
	plane.goingLeft = function(){
		planeImg.flipX = true;
		// ds_debug("goingLeft, planeImg.left: " + planeImg.left);
	};
	
	plane.getInitialTop = function(){
		return this.initialTop;
	}
	
	plane.getInitialLeft = function(){
		return this.initialLeft;
	}
	
	plane.getTop = function(){
		return this.top;
	}
	
	// plane.getLeft = function(){
	// 	return this.left;
	// }
	
	plane.getLeft = function(){
		var left = $('#anim-plane').css('marginLeft');
		return left;
	};
	
	plane.idle = function(){  
		
		canvas.forEachObject(function(obj) {
			var angle = planeImg.getAngle();
			
		});
		canvas.renderAll();
		
    };

	plane.hPlane = function(top, wasScrollingDown){    
	  
		var leg = 2000;
      	var horizontal_center = 600;
      	var maximum_offset = 800; // /400;
      	var initial_top = 500;
		var showPlaneTop = 1500;
	  	var phaseOne = 2500;
	  	var opacity;
	  	var maxPlaneTop = 9300;
  		
		// preventing scroll bounce errors before init finishes
		if(!planeImg instanceof Object) return;
		
		// if scroll isn't at least where we start showing the plane
		// then turn off the opacity
	  	if(top<showPlaneTop){
			planeImg.setOpacity(0);
			return;
	  	}
	  	else{
			// plane fades in from 1500 -> 1600 px
			opacity = (top - showPlaneTop)/100;
			if(opacity>1) opacity = 1;
			planeImg.setOpacity(opacity);
	
	  	}
		// plane stops left to right here
	  	// if(top>maxPlaneTop) return;
		
		var degrees = ((top - initial_top) / (leg / 2)) * (Math.PI/2);
		var offset = Math.sin(degrees) * maximum_offset;
		var planeLeft = horizontal_center + offset;
 				
		
		
		// if(planeLeft>(horizontal_center-100) && planeLeft<(horizontal_center+100)){
		// 	canFlip = true
		// }
		
		// ds_debug("planeLeft: " + planeLeft);
		// if(canFlip){
			if(parseInt(planeLeft) > planeImg.left){

				plane.goingRight();
				if(wasScrollingDown){
					plane.rotateDown();
				}
				else{
					plane.rotateUp();
				}
			}
			else{

				plane.goingLeft();
				if(wasScrollingDown){
					plane.rotateUp();
				}
				else{
					plane.rotateDown();
				}
			}
			// canFlip = false;
		// }
		
		planeImg.left = parseInt(planeLeft);
		
		var scale = initialScale;
		var adjusted;
		
		// ds_debug("top: " + top);
		
		// brute forcing the scale
		// plane starts small and gets bigger
		if(top > 1500 && top < 2500){
			planeScale = adjusted = ((((top-1500)/1000) + initialScale)*100)/100;
			planeImg.scaleX = adjusted;
			planeImg.scaleY = adjusted;
		}
		
		
		if(top > 6500 && top < 7500){
			adjusted = planeScale - ((((top-6000)/1000) + initialScale)*100)/100 + initialScale;
			if(adjusted>initialScale){
				planeImg.scaleX = adjusted;
				planeImg.scaleY = adjusted;
			}
			
		}
		
		canvas.renderAll();

    };
	
	plane.getOpacity = function(top, wasScrollingDown){
		return 1;
	};
	
	init();

    return plane;
  }

}	)(jQuery);