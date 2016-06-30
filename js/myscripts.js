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

// mobile menu button and form focus bug fix. Break into two if need be.
function OG(){
    $('.mobile-menu-btn').click(function(){
    $(this).find('span').toggleClass('active');
    $(this).siblings('.mobile-menu-container').toggleClass('active');
    return false;
  });
  //fix for form focus bug on iphones
  if("iPad"==navigator.platform||"iPhone"==navigator.platform||"iPod"==navigator.platform||"Linux armv6l"==navigator.platform){var $body=jQuery("body");$(document).on("focus","input",function(){$body.addClass("fixfixed")}).on("blur","input",function(){$body.removeClass("fixfixed")})}
}

// this simply finds the page height and sets the chosen element to be full height of the screen
function fullHeight(theElement){
  var pgHeight = $(window).height();
  $(theElement).css('height', pgHeight);
  $(window).resize(function(){
      var pgHeight = $(window).height();
      $(theElement).css('height', pgHeight);
  });
}

//clicking this element will cause the screen to animate the size of the screen
function scrollClick(toClick){
  var pageHeight = $(window).height();
  $(toClick).click(function(){
    $("html, body").animate({ scrollTop: pageHeight + 'px' }, 1000);
  });
}

// This function gets the element, and the parent element and roughly centers it in the middle of the screen. You could probbaly change the -5 to be something else, or even improve this?
function cEf(theParent, blockSize){
  var cent = $(theParent).height();
  var theBlock = $(blockSize).height();
  $(blockSize).css('marginTop',(((cent - theBlock)/2)-5) + 'px');
}

//creates labels when none are in use on older browsers. IE9 special!
  function placeholder(){
    if(typeof document.createElement("input").placeholder == 'undefined') {
      $('[placeholder]').focus(function() {
        var input = $(this);
        if (input.val() == input.attr('placeholder')) {
          input.val('');
          input.removeClass('placeholder');
        }
      }).blur(function() {
        var input = $(this);
        if (input.val() == '' || input.val() == input.attr('placeholder')) {
          input.addClass('placeholder');
          input.val(input.attr('placeholder'));
        }
      }).blur().parents('form').submit(function() {
        $(this).find('[placeholder]').each(function() {
          var input = $(this);
          if (input.val() == input.attr('placeholder')) {
            input.val('');
          }
      })
    });
  }
}

/*--------------------------------------------------------------
DOCUMENT READY
--------------------------------------------------------------*/
$(document).ready (function(){
	addBrowserClass();
  OG();
});

/*--------------------------------------------------------------
AFTER DOCUMENT LOADS
--------------------------------------------------------------*/
$(window).load (function(){
});