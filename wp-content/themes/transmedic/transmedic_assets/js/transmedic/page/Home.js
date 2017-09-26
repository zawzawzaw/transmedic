goog.provide('transmedic.page.Home');

goog.require('goog.events.Event');
goog.require('goog.events.EventTarget');

goog.require('manic.ui.HoverItem');
goog.require('manic.ui.AnimatedSVG');

goog.require('transmedic.page.Default')


/**
 * The Home constructor
 * @inheritDoc
 * @constructor
 * @extends {transmedic.page.Default}
 */
transmedic.page.Home = function(options, element) {

  transmedic.page.Default.call(this, options, element);
  this.options = $.extend(this.options, transmedic.page.Home.DEFAULT, options);

  

  this.has_home_latest_section = false;

  this.latest_column_01 = $('#page-home-latest-column-01-width');
  this.latest_column_02 =  $('#page-home-latest-column-02-width');
  this.latest_item_01 = $('#page-home-latest-item-01 .item-image');
  this.latest_item_02 = $('#page-home-latest-item-02 .item-image');
  this.latest_item_03 = $('#page-home-latest-item-03 .item-image');

  if (this.latest_column_01.length != 0 &&
      this.latest_column_02.length != 0 &&
      this.latest_item_01.length != 0 &&
      this.latest_item_02.length != 0 &&
      this.latest_item_03.length != 0) {

    this.has_home_latest_section = true;
  }


  /**
   * @type {manic.ui.HoverItem}
   */
  this.last_item_hover_01 = null;
  /**
   * @type {manic.ui.HoverItem}
   */
  this.last_item_hover_02 = null;
  /**
   * @type {manic.ui.HoverItem}
   */
  this.last_item_hover_03 = null;


  this.home_banner_image = $('#page-home-banner-image .manic-image-container');
  this.home_banner_copy = $('#page-home-banner-copy');



  this.has_map_animated = false;

  
  /**
   * @type {manic.ui.AnimatedSVG}
   */
  this.map_animated_svg = null;



  
  


  console.log('transmedic.page.Home: init');
};
goog.inherits(transmedic.page.Home, transmedic.page.Default);


/**
 * like jQuery options
 * @const {object}
 */
transmedic.page.Home.DEFAULT = {
};

/**
 * Home Event Constant
 * @const
 * @type {string}
 */
transmedic.page.Home.EVENT_01 = '';


//    ___ _   _ ___ _____
//   |_ _| \ | |_ _|_   _|
//    | ||  \| || |  | |
//    | || |\  || |  | |
//   |___|_| \_|___| |_|
//


/**
 * @override
 * @inheritDoc
 */
transmedic.page.Home.prototype.init = function() {
  transmedic.page.Home.superClass_.init.call(this);

  this.create_latest_section_hover();

  // this.create_nav_trigger();
  this.create_odometer();



  if ($('#home-map-animated-svg').length != 0) {
    this.map_animated_svg = $('#home-map-animated-svg').data('manic.ui.AnimatedSVG');
  }

  this.create_what_we_do_section_mobile();
  

  //$('body').toggleClass('home-expand-header-version');
  // this.create_odometer();
  
};


//    ____  ____  _____     ___  _____ _____
//   |  _ \|  _ \|_ _\ \   / / \|_   _| ____|
//   | |_) | |_) || | \ \ / / _ \ | | |  _|
//   |  __/|  _ < | |  \ V / ___ \| | | |___
//   |_|   |_| \_\___|  \_/_/   \_\_| |_____|
//




transmedic.page.Home.prototype.create_latest_section_hover = function(){

  if (this.has_home_latest_section == true) {

    this.last_item_hover_01 = new manic.ui.HoverItem({}, $('#page-home-latest-item-01'));
    this.last_item_hover_02 = new manic.ui.HoverItem({}, $('#page-home-latest-item-02'));
    this.last_item_hover_03 = new manic.ui.HoverItem({}, $('#page-home-latest-item-03'));
    
  }

};


transmedic.page.Home.prototype.create_nav_trigger = function(){

  if ($("#page-home-nav-trigger").length != 0){

    this.home_nav_trigger_scene = new ScrollMagic.Scene({
      'triggerHook': 0.0,
      'triggerElement': "#page-home-nav-trigger"
    });

    this.home_nav_trigger_scene.on('enter', function(event){
      this.body.removeClass('home-expand-header-version');
    }.bind(this));

    this.home_nav_trigger_scene.on('leave', function(event){
      this.body.addClass('home-expand-header-version');
    }.bind(this));

    // this.home_nav_trigger_scene.addIndicators();
    this.home_nav_trigger_scene.addTo(this.controller);

  }
  
  

};

transmedic.page.Home.prototype.create_odometer = function(){

  var arr = $('.odometer');
  var item = null;
  var temp_odometer = null;

  for (var i = 0, l=arr.length; i < l; i++) {
    // item = $(arr[i]);
    item = arr[i];

    temp_odometer = new Odometer({
      'el': item
    });
  }



  // create scene for home map animation
  
  if ($('#page-home-map-copy').length != 0) {


    var target_duration = $('#page-home-map-image .manic-image-container').height();

    this.home_map_scene = new ScrollMagic.Scene({
      // 'triggerHook': 0.5,
      'triggerHook': 0.25,
      'triggerElement': "#page-home-map-copy",
      'duration': target_duration
    });


    

    this.home_map_scene.on('enter', function(event){

      this.animate_map_odometer();

    }.bind(this));

    // this.home_map_scene.addIndicators();
    this.home_map_scene.addTo(this.controller);


    
  }
  



  

  // create map trigger 

};



transmedic.page.Home.prototype.create_what_we_do_section_mobile = function() {

  if(manic.IS_MOBILE || manic.IS_TABLET_PORTRAIT) {
    $("#page-home-whatwedo-item-slider").slick({
      'speed': 350,
      'dots': true,
      'arrows': false,
      'infinite': true,
      'slidesToShow': 1,
      'slidesToScroll': 1,
      'pauseOnHover': false,
      'autoplay': false,
      'autoplaySpeed': 4000
    });
  }

};


transmedic.page.Home.prototype.private_method_02 = function() {};


//    ____  _   _ ____  _     ___ ____
//   |  _ \| | | | __ )| |   |_ _/ ___|
//   | |_) | | | |  _ \| |    | | |
//   |  __/| |_| | |_) | |___ | | |___
//   |_|    \___/|____/|_____|___\____|
//


transmedic.page.Home.prototype.animate_map_odometer = function() {

  if (this.has_map_animated == false) {

    this.has_map_animated = true;

    var arr = $('#page-home-map-info-item-container .page-home-map-info-item');
    var item = null;
    var odometer = null;
    var value = '';

    for (var i = 0, l=arr.length; i < l; i++) {
      item = $(arr[i]);
      odometer = item.find('.item-number');
      value = item.attr('data-value');

      // odometer.html(value);
        
      // var target_delay = 0.1 + 0.35 * i;
      var target_delay = 0.4 + 0.35 * i;

      
      TweenMax.delayedCall(target_delay, item.addClass, ['animated-version'], item);
      TweenMax.delayedCall(target_delay + 0.3, odometer.html, [value], odometer);
      
    }



    // TweenMax.delayedCall(0.2, this.map_svg.trigger, ['play-svg'], this.map_svg);

    if (this.map_animated_svg != null) {
      // this.map_animated_svg.play_svg();
      TweenMax.delayedCall(1.4, this.map_animated_svg.play_svg, [], this.map_animated_svg);
      
    }

  } // end if
  

};


//    _______     _______ _   _ _____ ____
//   | ____\ \   / / ____| \ | |_   _/ ___|
//   |  _|  \ \ / /|  _| |  \| | | | \___ \
//   | |___  \ V / | |___| |\  | | |  ___) |
//   |_____|  \_/  |_____|_| \_| |_| |____/
//








/**
 * @param {object} event
 */
transmedic.page.Home.prototype.on_event_handler_02 = function(event) {
};



transmedic.page.Home.prototype.sample_method_calls = function() {

  // sample override
  transmedic.page.Home.superClass_.method_02.call(this);

  // sample event
  this.dispatchEvent(new goog.events.Event(transmedic.page.Home.EVENT_01));
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
transmedic.page.Home.prototype.update_page_layout = function() {

  if (manic.IS_MOBILE == false){

    var target_height = this.window_height - 145;

    this.home_banner_image.css({
      'height': target_height + 'px'
    });
    this.home_banner_copy.css({
      'height': target_height + 'px'
    });
  }

  transmedic.page.Home.superClass_.update_page_layout.call(this);

  this.update_home_latest_section_layout();


  if (this.map_animated_svg != null) {
    this.map_animated_svg.fit_to_layout();
  }


  /*
  if (manic.IS_MOBILE == true){

    this.banner_image.css({
      'height': this.window_height + 'px'
    });

  } else {

    this.banner_image.css({
      'height': ''
    });

  }
  */

}



transmedic.page.Home.prototype.update_home_latest_section_layout = function() {

  if (this.has_home_latest_section == true) {
    var column_01_width = this.latest_column_01.width();
    var column_02_width = this.latest_column_02.width();

    var space = this.window_width - (column_01_width + column_02_width + 20);
    
    var target_left = -1 * space / 2;
    var target_right = -1 * space / 2;
    
    if(manic.IS_MOBILE == false) {
      this.latest_item_01.css({
        'margin-left': target_left + 'px'
      });
      
      this.latest_item_02.css({
        'margin-right': target_right + 'px'
      });
      this.latest_item_03.css({
        'margin-right': target_right + 'px'
      });
    }
    
  }

  
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
transmedic.page.Home.prototype.scroll_to_target = function(str_param, str_param_2, str_param_3) {
  transmedic.page.Home.superClass_.scroll_to_target.call(this, str_param, str_param_2, str_param_3);
  

  
}

/**
 * @override
 * @inheritDoc
 */
transmedic.page.Home.prototype.on_scroll_to_no_target = function() {
  transmedic.page.Home.superClass_.on_scroll_to_no_target.call(this);

  
}



goog.exportSymbol('transmedic.page.Home', transmedic.page.Home);