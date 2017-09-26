goog.provide('transmedic.page.Product');

goog.require('goog.events.Event');
goog.require('goog.events.EventTarget');

goog.require('transmedic.page.Default')

/**
 * The Product constructor
 * @inheritDoc
 * @constructor
 * @extends {transmedic.page.Default}
 */
transmedic.page.Product = function(options, element) {

  transmedic.page.Default.call(this, options, element);
  this.options = $.extend(this.options, transmedic.page.Product.DEFAULT, options);

  // if class has parent
  //goog.events.EventTarget.call(this, options, element);
  //this.options = $.extend(this.options, transmedic.page.Product.DEFAULT, options);
  



  this.create_product_view_tabs();
  


  console.log('transmedic.page.Product: init');
};
goog.inherits(transmedic.page.Product, transmedic.page.Default);


/**
 * like jQuery options
 * @const {object}
 */
transmedic.page.Product.DEFAULT = {
  'option_01': '',
  'option_02': ''
};

/**
 * CLASSNAME Event Constant
 * @const
 * @type {string}
 */
transmedic.page.Product.EVENT_01 = '';

/**
 * CLASSNAME Event Constant
 * @const
 * @type {string}
 */
transmedic.page.Product.EVENT_02 = '';


//    ____  ____  _____     ___  _____ _____
//   |  _ \|  _ \|_ _\ \   / / \|_   _| ____|
//   | |_) | |_) || | \ \ / / _ \ | | |  _|
//   |  __/|  _ < | |  \ V / ___ \| | | |___
//   |_|   |_| \_\___|  \_/_/   \_\_| |_____|
//


transmedic.page.Product.prototype.create_product_view_tabs = function() {
  $(".change-tab").click(this.on_tab_change.bind(this));
};
transmedic.page.Product.prototype.private_method_02 = function() {};
transmedic.page.Product.prototype.private_method_03 = function() {};
transmedic.page.Product.prototype.private_method_04 = function() {};
transmedic.page.Product.prototype.private_method_05 = function() {};
transmedic.page.Product.prototype.private_method_06 = function() {};


//    ____  _   _ ____  _     ___ ____
//   |  _ \| | | | __ )| |   |_ _/ ___|
//   | |_) | | | |  _ \| |    | | |
//   |  __/| |_| | |_) | |___ | | |___
//   |_|    \___/|____/|_____|___\____|
//


transmedic.page.Product.prototype.public_method_01 = function() {};
transmedic.page.Product.prototype.public_method_02 = function() {};
transmedic.page.Product.prototype.public_method_03 = function() {};
transmedic.page.Product.prototype.public_method_04 = function() {};
transmedic.page.Product.prototype.public_method_05 = function() {};
transmedic.page.Product.prototype.public_method_06 = function() {};


//    _______     _______ _   _ _____ ____
//   | ____\ \   / / ____| \ | |_   _/ ___|
//   |  _|  \ \ / /|  _| |  \| | | | \___ \
//   | |___  \ V / | |___| |\  | | |  ___) |
//   |_____|  \_/  |_____|_| \_| |_| |____/
//

/**
 * @param {object} event
 */
transmedic.page.Product.prototype.on_tab_change = function(event) {
  var selected_view = $(event.currentTarget).attr("data-view");

  $(".change-tab").removeClass("active");
  $(event.currentTarget).addClass("active");

  $(".products-brands-tabs").removeClass('active-tab');
  $("#page-products-brands-"+selected_view+"-view-tab").addClass('active-tab');
};

/**
 * @param {object} event
 */
transmedic.page.Product.prototype.on_event_handler_02 = function(event) {
};

/**
 * @param {object} event
 */
transmedic.page.Product.prototype.on_event_handler_03 = function(event) {
};

/**
 * @param {object} event
 */
transmedic.page.Product.prototype.on_event_handler_04 = function(event) {
};






transmedic.page.Product.prototype.sample_method_calls = function() {

  // sample override
  transmedic.page.Product.superClass_.method_02.call(this);

  // sample event
  this.dispatchEvent(new goog.events.Event(transmedic.page.Product.EVENT_01));
};