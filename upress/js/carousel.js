jQuery(document).ready(function ($) {
var options = {
	$AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
	$AutoPlaySteps: 2,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
	$AutoPlayInterval: 2000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
	$PauseOnHover: 1,                               //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

	$ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
	$SlideDuration: 160,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
	$MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
	$SlideWidth: 200,                                   //[Optional] Width of every slide in pixels, default value is width of 'slides' container
	//$SlideHeight: 150,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
	$SlideSpacing: 3, 					                //[Optional] Space between each slide in pixels, default value is 0
	$DisplayPieces: 6,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
	$ParkingPosition: 0,                              //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
	$UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
	$PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
	$DragOrientation: 1,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

	$BulletNavigator: false,

	$ArrowNavigatorOptions: {
		$Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
		$ChanceToShow: 1,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
		$AutoCenter: 0,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
		$Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
	}
};

var home_carousel = new $JssorSlider$("home_carousel_container", options);

//responsive code begin
//you can remove responsive code if you don't want the slider scales while window resizes
function ScaleSlider() {
	var bodyWidth = document.body.clientWidth;
	if (bodyWidth)
		home_carousel.$ScaleWidth(Math.min(bodyWidth, 1125));
	else
		window.setTimeout(ScaleSlider, 30);
}
ScaleSlider();

$(window).bind("load", ScaleSlider);
$(window).bind("resize", ScaleSlider);
$(window).bind("orientationchange", ScaleSlider);
//responsive code end
});