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

/**
  * @desc checks if current element is 100% visible within viewport
  * @param none
  * @return int - the coordinates of the window vs. the element
*/
jQuery.fn.isFullyVisible = function(){
       
    var win = $(window);
       
    var viewport = {
        top : win.scrollTop(),
        left : win.scrollLeft()
    };
    viewport.right = viewport.left + win.width();
    viewport.bottom = viewport.top + win.height();
      
    var elemtHeight = this.height();// Get the full height of current element
    elemtHeight = Math.round(elemtHeight);// Round it to whole humber
       
    var bounds = this.offset();// Coordinates of current element
    bounds.top = bounds.top + elemtHeight;// Top is redefined as half of current element's height
    bounds.right = bounds.left + this.outerWidth();
    bounds.bottom = bounds.top + this.outerHeight();
             
    return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
     
}

/**
  * @desc create equal height columns
  * @param object - the elements to apply equal heights to
  * @return none
*/
jQuery.fn.equalHeights = function(){
  var colSelector = this.selector;// Get the selector of the object
  var newHeight;
  var colHeights = [];
  $(colSelector).each(function(){
    var singleCol = $(this).outerHeight();// Get the outerHeight of a single column
    colHeights.push(singleCol);// Push the single height into the array
    newHeight = Math.max.apply(Math,colHeights);// Get the tallest column from the array
  });
  $(colSelector).css('height', newHeight+'px');// Apply the tallest height to all columns
}

/*--------------------------------------------------------------
DOCUMENT READY
--------------------------------------------------------------*/
$(document).ready (function(){

	addBrowserClass();

  $('.mobile-menu-btn').click(function(){
    $(this).find('span').toggleClass('active');
    $(this).siblings('.mobile-menu-container').toggleClass('active');
    return false;
  });
  //fix for form focus bug on iphones
  if("iPad"==navigator.platform||"iPhone"==navigator.platform||"iPod"==navigator.platform||"Linux armv6l"==navigator.platform){var $body=jQuery("body");$(document).on("focus","input",function(){$body.addClass("fixfixed")}).on("blur","input",function(){$body.removeClass("fixfixed")})}
});

/*--------------------------------------------------------------
AFTER DOCUMENT LOADS
--------------------------------------------------------------*/
$(window).load (function(){
});