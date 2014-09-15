/*--------------------------------------------------------------
THE FUNCTIONS
--------------------------------------------------------------*/
/**
  * @desc checks if current element exists
  * @param none
  * @return int - the number of elements present, > 0 = element exists
*/
jQuery.fn.exists = function(){ return this.length > 0; }

/**
  * @desc Adds browser class to html
  * @param none
  * @return none
*/
function addBrowserClass(){
  
  var chrome = $.browser.mozilla();
  var firefox = $.browser.firefox();
  var safari = $.browser.safari();

  if (chrome){ $('html').addClass('chrome'); }
  if (firefox){ $('html').addClass('firefox'); }
  if (safari){ $('html').addClass('safari'); }

}

/**
  * @desc checks if current element is on screen or within viewport
  * @param none
  * @return int - the coordinates of the window vs. the element
*/
jQuery.fn.isOnScreen = function(){
       
    var win = $(window);
       
    var viewport = {
        top : win.scrollTop(),
        left : win.scrollLeft()
    };
    viewport.right = viewport.left + win.width();
    viewport.bottom = viewport.top + win.height();
      
    var elemtHeight = this.height()/2;// Get half of the height of current element
    elemtHeight = Math.round(elemtHeight);// Round it to whole humber
       
    var bounds = this.offset();// Coordinates of current element
    bounds.top = bounds.top + elemtHeight;// Top is redefined as half of current element's height
    bounds.right = bounds.left + this.outerWidth();
    bounds.bottom = bounds.top + this.outerHeight();
             
    return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
     
}

/*--------------------------------------------------------------
DOCUMENT READY
--------------------------------------------------------------*/
$(document).ready (function(){

	addBrowserClass();

});

/*--------------------------------------------------------------
AFTER DOCUMENT LOADS
--------------------------------------------------------------*/
$(window).load (function(){
});