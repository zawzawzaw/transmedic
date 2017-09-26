goog.provide('transmedic.page.Default');

goog.require('goog.events.Event');
goog.require('goog.events.EventTarget');

goog.require('manic.page.Page');

goog.require('manic.ui.BoxItem');
goog.require('manic.ui.Dropdown');





goog.require('transmedic.component.HeaderDesktop');
// goog.require('transmedic.component.HeaderMobile');

goog.require('transmedic.component.HoverSync');


/**
 * The Default Page constructor
 * @inheritDoc
 * @constructor
 * @extends {manic.page.Page}
 */
transmedic.page.Default = function(options, element) {

  manic.page.Page.call(this, options);
  this.options = $.extend(this.options, transmedic.page.Default.DEFAULT, options);


  /*
  if ($('body').hasClass('chinese-version')) {
    manic.SITE_LANGUAGE = 'cn';
  }
  if ($('body').hasClass('bahasa-version')) {
    manic.SITE_LANGUAGE = 'in';
  }
  */
  

  //   __     ___    ____
  //   \ \   / / \  |  _ \
  //    \ \ / / _ \ | |_) |
  //     \ V / ___ \|  _ <
  //      \_/_/   \_\_| \_\
  //

  /**
   * @type {Array.<manic.ui.Dropdown>}
   */
  this.dropdown_array = [];

  /**
   * @type {Array.<manic.ui.Dropdown>}
   */
  this.dropdown_dictionary = [];


  /**
   * @type {transmedic.component.HeaderDesktop}
   */
  this.header_desktop = null;

  /**
    * @type {transmedic.component.HeaderMobile}
    */
  this.header_mobile = null;

  this.page_wrapper = $('#page-wrapper');
  this.page_wrapper_content = $('#page-wrapper-content');

  // min height variables
  this.is_page_min_height = false;
  if( this.body.hasClass('min-height-version') == true ){
    this.is_page_min_height = true;
  }

  this.is_page_min_height_mobile = false;
  if( this.body.hasClass('min-height-mobile-version') == true ){
    this.is_page_min_height_mobile = true;
  }



  // console.log('transmedic.page.Default: init');
};
goog.inherits(transmedic.page.Default, manic.page.Page);


/**
 * like jQuery options
 * @const {object}
 */
transmedic.page.Default.DEFAULT = {
};


//    ___ _   _ ___ _____
//   |_ _| \ | |_ _|_   _|
//    | ||  \| || |  | |
//    | || |\  || |  | |
//   |___|_| \_|___| |_|
//

transmedic.page.Default.prototype.init = function() {
  transmedic.page.Default.superClass_.init.call(this);

  this.create_header_desktop();

  this.create_hover_sync_items();

  this.create_dropdown();
  
  // this.create_header_mobile();
  // 
  // 


  /*
  if ($('#desktop-header').length != 0) {
    this.desktop_header = new rippledot.component.DesktopHeader({}, $('#desktop-header'));
  }
  if ($('#desktop-sidebar').length != 0) {
    this.desktop_sidebar = new rippledot.component.DesktopSidebar({}, $('#desktop-sidebar'));
  }

  if ($('#desktop-aside').length != 0) {
    this.desktop_aside = new rippledot.component.DesktopAside({}, $('#desktop-aside'));
  }


  if ($('#mobile-header').length != 0 && $('#mobile-header-expand-container').length != 0){
    this.mobile_header = new rippledot.component.MobileHeader({}, $('#mobile-header'));

    this.mobile_header.update_layout();

    goog.events.listen(this.mobile_header, rippledot.component.MobileHeader.ON_CLOSE_MENU, function(event){

      this.update_page_layout();
      
    }.bind(this));

    

    
    

  }
  

  this.create_box_item();
  */


  // console.log('transmedic.page.Default: init');

};


//     ____ ____  _____    _  _____ _____
//    / ___|  _ \| ____|  / \|_   _| ____|
//   | |   | |_) |  _|   / _ \ | | |  _|
//   | |___|  _ <| |___ / ___ \| | | |___
//    \____|_| \_\_____/_/   \_\_| |_____|
//

transmedic.page.Default.prototype.create_header_desktop = function(){

  
  
  if ($('#header-desktop').length != 0) {
    this.header_desktop = new transmedic.component.HeaderDesktop({}, $('#header-desktop'));
  }
  

};

transmedic.page.Default.prototype.create_header_mobile = function(){

  if ($('#header-mobile').length != 0 && $('#header-mobile-expand').length != 0) {

    this.header_mobile = new transmedic.component.HeaderMobile({}, $('#header-mobile'));

    goog.events.listen(this.header_mobile, transmedic.component.HeaderMobile.ON_CLOSE_MENU, function(event){

      this.update_page_layout();

    }.bind(this));
        
  }

  

};



transmedic.page.Default.prototype.create_hover_sync_items = function() {

  /**
   * @type {transmedic.component.HoverSync}
   */
  var hover_sync = null; 

  var arr = $('.hover-sync-item');
  var item = null;

  for (var i = 0, l=arr.length; i < l; i++) {
    item = $(arr[i]);
    hover_sync = new transmedic.component.HoverSync({}, item);
  }

};


transmedic.page.Default.prototype.expandable_text = function() {
  var minimized_elements = $('.minimize-text');
    
  minimized_elements.each(function(){
      // var t = $(this).text();                          // this is just TEXT !!!!!
      var t = $(this).html();
      var maxLength = $(this).data('length');

      if(manic.IS_TABLET_LANDSCAPE == true) {
        maxLength = $(this).data('tablet-length');
      }

      if(manic.IS_TABLET_PORTRAIT == true) {
        maxLength = $(this).data('mobile-length');
      }

      if(manic.IS_MOBILE == true) {
        maxLength = $(this).data('mobile-length');
      }

      console.log(maxLength)

      if(t.length < maxLength) return;

      // http://stackoverflow.com/questions/18087416/split-string-in-half-by-word
      // var middle = length;
      // var before = t.lastIndexOf(' ', middle);
      // var after = t.indexOf(' ', middle + 1);

      // if (middle - before < after - middle) {
      //     middle = before;
      // } else {
      //     middle = after;
      // }

      // var s1 = t.substr(0, middle);
      // var s2 = t.substr(middle + 1);

      //trim the string to the maximum length
      var trimmedString = t.substr(0, maxLength);

      //re-trim if we are in the middle of a word
      trimmedString = trimmedString.substr(0, Math.min(trimmedString.length, trimmedString.lastIndexOf(" ")))

      if (t.length > maxLength)
        $(this).html(trimmedString+'...');
      else
        $(this).html(t);
            
  });

}

transmedic.page.Default.prototype.create_dropdown = function() {
  var arr = $('.manic-dropdown').not('.manic-dropdown-instanciated');
  var item = null;
  var item_id = "";

  /**
   * @type {manic.ui.Dropdown}
   */
  var dropdown = null;

  for (var i = 0, l = arr.length ; i < l; i++) {
    item = $(arr[i]);
    item.addClass('manic-dropdown-instanciated');

    item_id = '' + item.find('select').attr('id');

    dropdown = new manic.ui.Dropdown({}, item);
    this.dropdown_array[this.dropdown_array.length] = dropdown;

    this.dropdown_dictionary[item_id] = dropdown;
  }
};



//    _        _ __   _____  _   _ _____
//   | |      / \\ \ / / _ \| | | |_   _|
//   | |     / _ \\ V / | | | | | | | |
//   | |___ / ___ \| || |_| | |_| | | |
//   |_____/_/   \_\_| \___/ \___/  |_|
//


/**
 * @override
 * @inheritDoc
 */
transmedic.page.Default.prototype.update_page_layout = function(){
  transmedic.page.Default.superClass_.update_page_layout.call(this);

  if (manic.IS_ACTUAL_MOBILE == true) {
    this.body.addClass('actual-mobile-version');
  } else {
    this.body.removeClass('actual-mobile-version');
  }

  if (this.is_page_min_height == true && manic.IS_MOBILE == false) {
    var target_height = this.page_wrapper.height() - this.desktop_footer_element.outerHeight();

    this.page_wrapper_content.css({
      'min-height': target_height + 'px'
    });
  }


  if (this.is_page_min_height_mobile == true && manic.IS_MOBILE == true) {
    var target_height = this.page_wrapper.height() - this.mobile_header_element.outerHeight();

    console.log(target_height);

    this.page_wrapper_content.css({
      'min-height': target_height + 'px'
    });
  }

  
  /*
  if (manic.IS_MOBILE_HEADER == false) {

  } else {

  }
  */
 

  


  /*

  // update mobile header min height
  // if (manic.IS_MOBILE && goog.isDefAndNotNull(this.mobile_header)) {
  if (manic.IS_ACTUAL_MOBILE && goog.isDefAndNotNull(this.mobile_header)) {
    this.mobile_header.update_layout();
  }





  // update min height
  if (this.is_page_min_height == true && manic.IS_MOBILE == false) {

   var target_height = this.window_height - this.desktop_footer_element.outerHeight();

    this.min_height_target.css({
      'min-height': target_height + 'px'
    });
  }

  if (this.is_page_min_height_mobile == true && manic.IS_MOBILE == true) {

    // var target_height = this.window_height - this.mobile_header_element.outerHeight();
    var target_height = this.window_height;

    this.min_height_target_mobile.css({
      'min-height': target_height + 'px'
    });
  }



  */




};




//    _   _    _    ____  _   _ _____  _    ____ ____
//   | | | |  / \  / ___|| | | |_   _|/ \  / ___/ ___|
//   | |_| | / _ \ \___ \| |_| | | | / _ \| |  _\___ \
//   |  _  |/ ___ \ ___) |  _  | | |/ ___ \ |_| |___) |
//   |_| |_/_/   \_\____/|_| |_| |_/_/   \_\____|____/
//


/**
 * @override
 * @inheritDoc
 */
transmedic.page.Default.prototype.scroll_to_target = function(str_param, str_param_2, str_param_3) {
  transmedic.page.Default.superClass_.scroll_to_target.call(this, str_param, str_param_2, str_param_3);
  

  
}

/**
 * @override
 * @inheritDoc
 */
transmedic.page.Default.prototype.on_scroll_to_no_target = function() {
  transmedic.page.Default.superClass_.on_scroll_to_no_target.call(this);

  
}




goog.exportSymbol('transmedic.page.Default', transmedic.page.Default);