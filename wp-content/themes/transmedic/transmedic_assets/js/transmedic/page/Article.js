goog.provide('transmedic.page.Article');

goog.require('goog.events.Event');
goog.require('goog.events.EventTarget');

goog.require('transmedic.page.Default')

/**
 * The Product constructor
 * @inheritDoc
 * @constructor
 * @extends {transmedic.page.Default}
 */
transmedic.page.Article = function(options, element) {

  transmedic.page.Default.call(this, options, element);
  this.options = $.extend(this.options, transmedic.page.Article.DEFAULT, options);

  // if class has parent
  //goog.events.EventTarget.call(this, options, element);
  //this.options = $.extend(this.options, transmedic.page.Article.DEFAULT, options);
  
  this.create_article_carousel();
  this.expandable_text();

  console.log('transmedic.page.Article: init');
};
goog.inherits(transmedic.page.Article, transmedic.page.Default);


/**
 * like jQuery options
 * @const {object}
 */
transmedic.page.Article.DEFAULT = {
  'option_01': '',
  'option_02': ''
};

/**
 * CLASSNAME Event Constant
 * @const
 * @type {string}
 */
transmedic.page.Article.EVENT_01 = '';

/**
 * CLASSNAME Event Constant
 * @const
 * @type {string}
 */
transmedic.page.Article.EVENT_02 = '';


//    ____  ____  _____     ___  _____ _____
//   |  _ \|  _ \|_ _\ \   / / \|_   _| ____|
//   | |_) | |_) || | \ \ / / _ \ | | |  _|
//   |  __/|  _ < | |  \ V / ___ \| | | |___
//   |_|   |_| \_\___|  \_/_/   \_\_| |_____|
//


transmedic.page.Article.prototype.create_article_carousel = function() {
  $("#page-article-image-carousel").slick({
    'speed': 350,
    'dots': false,
    'arrows': true,
    'infinite': true,
    'slidesToShow': 1,
    'slidesToScroll': 1,
    'pauseOnHover': false,
    'autoplay': false,
    'autoplaySpeed': 4000,  
    "asNavFor": '#page-article-image-carousel-nav',
    "responsive": [
      {
        "breakpoint": 991,
        "settings": {
          "centerMode": true,
          "centerPadding": "25px"
        }
      }
    ]
  });

  $('#page-article-image-carousel-nav').slick({
    "slidesToShow": 5,
    "slidesToScroll": 1,
    "asNavFor": '#page-article-image-carousel',
    "dots": false,
    "focusOnSelect": true,
    "arrows": false,
    "infinite": true,
    "centerMode": true,
    "centerPadding": 0,
  });

  // $('#page-article-image-carousel-nav').on('click', '.slick-slide', function (e) {
  //   e.stopPropagation();    
  //   var index = $(this).data("slick-index");    
  //   if ($('#page-article-image-carousel-nav').slick('slickCurrentSlide') !== index) {
  //     $('#page-article-image-carousel-nav').slick('slickGoTo', index-1);
  //   }
  // });
};
transmedic.page.Article.prototype.private_method_02 = function() {};
transmedic.page.Article.prototype.private_method_03 = function() {};
transmedic.page.Article.prototype.private_method_04 = function() {};
transmedic.page.Article.prototype.private_method_05 = function() {};
transmedic.page.Article.prototype.private_method_06 = function() {};


//    ____  _   _ ____  _     ___ ____
//   |  _ \| | | | __ )| |   |_ _/ ___|
//   | |_) | | | |  _ \| |    | | |
//   |  __/| |_| | |_) | |___ | | |___
//   |_|    \___/|____/|_____|___\____|
//


transmedic.page.Article.prototype.public_method_01 = function() {};
transmedic.page.Article.prototype.public_method_02 = function() {};
transmedic.page.Article.prototype.public_method_03 = function() {};
transmedic.page.Article.prototype.public_method_04 = function() {};
transmedic.page.Article.prototype.public_method_05 = function() {};
transmedic.page.Article.prototype.public_method_06 = function() {};


//    _______     _______ _   _ _____ ____
//   | ____\ \   / / ____| \ | |_   _/ ___|
//   |  _|  \ \ / /|  _| |  \| | | | \___ \
//   | |___  \ V / | |___| |\  | | |  ___) |
//   |_____|  \_/  |_____|_| \_| |_| |____/
//

/**
 * @param {object} event
 */
transmedic.page.Article.prototype.on_event_handler_01 = function(event) {
};

/**
 * @param {object} event
 */
transmedic.page.Article.prototype.on_event_handler_02 = function(event) {
};

/**
 * @param {object} event
 */
transmedic.page.Article.prototype.on_event_handler_03 = function(event) {
};

/**
 * @param {object} event
 */
transmedic.page.Article.prototype.on_event_handler_04 = function(event) {
};






transmedic.page.Article.prototype.sample_method_calls = function() {

  // sample override
  transmedic.page.Article.superClass_.method_02.call(this);

  // sample event
  this.dispatchEvent(new goog.events.Event(transmedic.page.Article.EVENT_01));
};