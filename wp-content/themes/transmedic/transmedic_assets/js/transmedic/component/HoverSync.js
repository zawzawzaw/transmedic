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



