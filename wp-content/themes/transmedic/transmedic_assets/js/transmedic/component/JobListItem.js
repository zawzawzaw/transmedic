goog.provide('transmedic.component.JobListItem');

goog.require('goog.events.Event');
goog.require('goog.events.EventTarget');

/**
 * The JobListItem constructor
 * @param {object} options The object extendable like jquery plugins
 * @param {element} element The jQuery element connected to class
 * @constructor
 * @extends {goog.events.EventTarget}
 */
transmedic.component.JobListItem = function(options, element) {

  goog.events.EventTarget.call(this);
  this.options = $.extend({}, transmedic.component.JobListItem.DEFAULT, options);
  this.element = element;

  // if class has parent
  //goog.events.EventTarget.call(this, options, element);
  //this.options = $.extend(this.options, transmedic.component.JobListItem.DEFAULT, options);
  

  /**
   * @type {Array.<jQuery>}
   */
  this.item_array = [];

  this.is_job_detail_expanded = false;
  this.view_detail_cta = this.element.find(".view-details-cta");
  this.job_detail_container = this.element.find(".job-list-item-content");
  this.job_list_item_title = this.element.find(".job-list-item-job-title-container h6");


  this.view_detail_cta.click(this.on_view_detail_click.bind(this));

  console.log('transmedic.component.JobListItem: init');
};
goog.inherits(transmedic.component.JobListItem, goog.events.EventTarget);


/**
 * like jQuery options
 * @const {object}
 */
transmedic.component.JobListItem.DEFAULT = {
  
};




//    ____  ____  _____     ___  _____ _____
//   |  _ \|  _ \|_ _\ \   / / \|_   _| ____|
//   | |_) | |_) || | \ \ / / _ \ | | |  _|
//   |  __/|  _ < | |  \ V / ___ \| | | |___
//   |_|   |_| \_\___|  \_/_/   \_\_| |_____|
//


transmedic.component.JobListItem.prototype.job_detail_expand = function() {
  if(this.is_job_detail_expanded==false) {
    this.is_job_detail_expanded = true;
    this.job_list_item_title.addClass("active");
    this.view_detail_cta.html('Hide details');
    this.job_detail_container.slideDown(500);
  }
};
transmedic.component.JobListItem.prototype.job_detail_collapse = function() {
  if(this.is_job_detail_expanded==true) {
    this.is_job_detail_expanded = false;
    this.job_list_item_title.removeClass("active");
    this.view_detail_cta.html('View details');
    this.job_detail_container.slideUp(500);
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
transmedic.component.JobListItem.prototype.on_view_detail_click = function(event) {
  event.preventDefault();

  if(this.is_job_detail_expanded==false) {
    this.job_detail_expand();
  } else {
    this.job_detail_collapse();
  }
};

