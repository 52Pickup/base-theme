/*************************************************************************************
*  The Functions
**************************************************************************************/

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

/*************************************************************************************
*  Document ready
**************************************************************************************/

$(document).ready (function(){

	addBrowserClass();

});

/*************************************************************************************
*  After Document Loads
**************************************************************************************/
$(window).load (function(){
});