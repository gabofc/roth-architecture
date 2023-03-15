// smothscroller
////******////



var imgs = document.images,
    len = imgs.length,
    counter = 0;

[].forEach.call( imgs, function( img ) {
    if(img.complete)
      incrementCounter();
    else
      img.addEventListener( 'load', incrementCounter, false );
} );

function incrementCounter() {
    counter++;
    if ( counter === len ) {
        
ScrollSmoother.create({
  content: "#smooth-content",
  wrapper: "#smooth-wrapper",
  smooth: 1, // how long (in seconds) it takes to "catch up" to the native scroll position
  effects: true, // looks for data-speed and data-lag attributes on elements
  normalizeScroll: false, // prevents address bar from showing/hiding on most devices, solves various other browser inconsistencies
  ignoreMobileResize: true // skips ScrollTrigger.refresh() on mobile resizes from address bar showing/hiding
});
		
		
    }
}


