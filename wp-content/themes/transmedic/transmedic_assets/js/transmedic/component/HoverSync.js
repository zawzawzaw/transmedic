goog.provide('transmedic.component.HoverSync');

goog.require('goog.events.Event');
goog.require('goog.events.EventTarget');

/**
 * The HoverSync constructor
 * @param {object} options The object extendable like jquery plugins
 * @param {element} element The jQuery element connected to class
 * @constructor
 * @extends {goog.events.EventTarget}
 */
transmedic.component.HoverSync = function(options, element) {

  goog.events.EventTarget.call(this);
  this.options = $.extend({}, transmedic.component.HoverSync.DEFAULT, options);
  this.element = element;

  // if class has parent
  //goog.events.EventTarget.call(this, options, element);
  //this.options = $.extend(this.options, transmedic.component.HoverSync.DEFAULT, options);
  

  /**
   * @type {Array.<jQuery>}
   */
  this.item_array = [];

  this.selector = this.options['selector'];
  this.item_elements = this.element.find(this.selector);


  var arr = this.element.find(this.selector);
  var item = null;

  for (var i = 0, l=arr.length; i < l; i++) {
    item = $(arr[i]);
    item.mouseover(this.on_item_mouseover.bind(this));
    item.mouseout(this.on_item_mouseout.bind(this));

    this.item_array[i] = item;
  }


  


  console.log('transmedic.component.HoverSync: init');
};
goog.inherits(transmedic.component.HoverSync, goog.events.EventTarget);


/**
 * like jQuery options
 * @const {object}
 */
transmedic.component.HoverSync.DEFAULT = {
  'selector': '.hover-sync'
};

/**
 * HoverSync Event Constant
 * @const
 * @type {string}
 */
transmedic.component.HoverSync.EVENT_01 = '';

/**
 * HoverSync Event Constant
 * @const
 * @type {string}
 */
transmedic.component.HoverSync.EVENT_02 = '';


//    ____  ____  _____     ___  _____ _____
//   |  _ \|  _ \|_ _\ \   / / \|_   _| ____|
//   | |_) | |_) || | \ \ / / _ \ | | |  _|
//   |  __/|  _ < | |  \ V / ___ \| | | |___
//   |_|   |_| \_\___|  \_/_/   \_\_| |_____|
//


transmedic.component.HoverSync.prototype.private_method_01 = function() {};
transmedic.component.HoverSync.prototype.private_method_02 = function() {};
transmedic.component.HoverSync.prototype.private_method_03 = function() {};
transmedic.component.HoverSync.prototype.private_method_04 = function() {};
transmedic.component.HoverSync.prototype.private_method_05 = function() {};
transmedic.component.HoverSync.prototype.private_method_06 = function() {};


//    ____  _   _ ____  _     ___ ____
//   |  _ \| | | | __ )| |   |_ _/ ___|
//   | |_) | | | |  _ \| |    | | |
//   |  __/| |_| | |_) | |___ | | |___
//   |_|    \___/|____/|_____|___\____|
//


transmedic.component.HoverSync.prototype.public_method_01 = function() {};
transmedic.component.HoverSync.prototype.public_method_02 = function() {};
transmedic.component.HoverSync.prototype.public_method_03 = function() {};
transmedic.component.HoverSync.prototype.public_method_04 = function() {};
transmedic.component.HoverSync.prototype.public_method_05 = function() {};
transmedic.component.HoverSync.prototype.public_method_06 = function() {};


//    _______     _______ _   _ _____ ____
//   | ____\ \   / / ____| \ | |_   _/ ___|
//   |  _|  \ \ / /|  _| |  \| | | | \___ \
//   | |___  \ V / | |___| |\  | | |  ___) |
//   |_____|  \_/  |_____|_| \_| |_| |____/
//

/**
 * @param {object} event
 */
transmedic.component.HoverSync.prototype.on_item_mouseover = function(event) {

  this.item_elements.addClass('selected');
  
};

/**
 * @param {object} event
 */
transmedic.component.HoverSync.prototype.on_item_mouseout = function(event) {
  this.item_elements.removeClass('selected');
};

/**
 * @param {object} event
 */
transmedic.component.HoverSync.prototype.on_event_handler_03 = function(event) {
};

/**
 * @param {object} event
 */
transmedic.component.HoverSync.prototype.on_event_handler_04 = function(event) {
};






transmedic.component.HoverSync.prototype.sample_method_calls = function() {

  // sample override
  transmedic.component.HoverSync.superClass_.method_02.call(this);

  // sample event
  this.dispatchEvent(new goog.events.Event(transmedic.component.HoverSync.EVENT_01));
};