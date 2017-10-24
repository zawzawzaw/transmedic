goog.provide('transmedic.page.Career');

goog.require('goog.events.Event');
goog.require('goog.events.EventTarget');

goog.require('transmedic.page.Default')

goog.require('transmedic.component.JobListItem');

/**
 * The Product constructor
 * @inheritDoc
 * @constructor
 * @extends {transmedic.page.Default}
 */
transmedic.page.Career = function(options, element) {

  transmedic.page.Default.call(this, options, element);
  this.options = $.extend(this.options, transmedic.page.Career.DEFAULT, options);

  // if class has parent
  //goog.events.EventTarget.call(this, options, element);
  //this.options = $.extend(this.options, transmedic.page.Career.DEFAULT, options);

  console.log('transmedic.page.Career: init');

  this.create_jobs_list_item();
  this.create_location_tab();

};
goog.inherits(transmedic.page.Career, transmedic.page.Default);


/**
 * like jQuery options
 * @const {object}
 */
transmedic.page.Career.DEFAULT = {
  
};


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
transmedic.page.Career.prototype.init = function() {
  transmedic.page.Career.superClass_.init.call(this);

  this.create_pinned_scene();
  this.create_pinned_mobile_scene();

};



//    ____  ____  _____     ___  _____ _____
//   |  _ \|  _ \|_ _\ \   / / \|_   _| ____|
//   | |_) | |_) || | \ \ / / _ \ | | |  _|
//   |  __/|  _ < | |  \ V / ___ \| | | |___
//   |_|   |_| \_\___|  \_/_/   \_\_| |_____|
//

transmedic.page.Career.prototype.create_jobs_list_item = function() {
  var arr = $('.job-list-item');
  var job_list_item_el = null;
  var job_list_item = null;

  for (var i = 0; i < arr.length; i++) {
    var job_list_item_el = $(arr[i]);
    var job_list_item = new transmedic.component.JobListItem({}, job_list_item_el);
  }
};
transmedic.page.Career.prototype.create_location_tab = function() {
  var location_tab_item = $('#page-careers-job-filters-container ul li a');
  var location_filter_mobile = $("#location_filter");

  location_filter_mobile.on("change", this.on_location_filter_change.bind(this));
  
  location_tab_item.click(this.on_location_tab_item_click.bind(this));
};


transmedic.page.Career.prototype.create_pinned_scene = function() {


  if ($('#page-careers-job-filters-pin-container').length != 0) {

    this.sidebar_pinned_scene = new ScrollMagic.Scene({
      'triggerHook': 0.0,
      'offset': -60,   // height of desktop header
      'triggerElement': "#page-careers-job-filters-pin-trigger"
    });
    this.sidebar_pinned_scene.setPin('#page-careers-job-filters-pin-container');

    // this.sidebar_pinned_scene.addIndicators();
    this.sidebar_pinned_scene.addTo(this.controller);

  }
  


};


transmedic.page.Career.prototype.create_pinned_mobile_scene = function() {


  if ($('#page-careers-job-filters-pin-container-mobile').length != 0) {

    if (manic.IS_ACTUAL_MOBILE == true) {

      this.sidebar_pinned_scene = new ScrollMagic.Scene({
        'triggerHook': 0.0,
        'offset': -56,                 // height of the mobile header
        'triggerElement': "#page-careers-job-filters-pin-trigger-mobile"
      });
      
      this.sidebar_pinned_scene.setPin('#page-careers-job-filters-pin-container-mobile');

      // this.sidebar_pinned_scene.addIndicators();
      this.sidebar_pinned_scene.addTo(this.controller);
      
    }


  }

  

  
  

};



//    ____  _   _ ____  _     ___ ____
//   |  _ \| | | | __ )| |   |_ _/ ___|
//   | |_) | | | |  _ \| |    | | |
//   |  __/| |_| | |_) | |___ | | |___
//   |_|    \___/|____/|_____|___\____|
//



//    _______     _______ _   _ _____ ____
//   | ____\ \   / / ____| \ | |_   _/ ___|
//   |  _|  \ \ / /|  _| |  \| | | | \___ \
//   | |___  \ V / | |___| |\  | | |  ___) |
//   |_____|  \_/  |_____|_| \_| |_| |____/
//

/**
 * @param {object} event
 */
transmedic.page.Career.prototype.on_location_tab_item_click = function(event) {
  event.preventDefault();
  var href = $(event.currentTarget).attr("href");

  $('.active-tab').removeClass('active-tab');
  
  $(event.currentTarget).addClass('active-tab');
  $(href+"-positions").addClass('active-tab');

  this.update_page_layout();
};

/**
 * @param {object} event
 */
transmedic.page.Career.prototype.on_location_filter_change = function(event) {
  event.preventDefault();

  var location = $(event.currentTarget).val();

  $('.active-tab').removeClass('active-tab');
  $(location+"-positions").addClass('active-tab');

  this.update_page_layout();

};

