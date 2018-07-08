goog.provide('transmedic.page.New');

goog.require('goog.events.Event');
goog.require('goog.events.EventTarget');

goog.require('transmedic.page.Default')

/**
 * The Product constructor
 * @inheritDoc
 * @constructor
 * @extends {transmedic.page.Default}
 */
transmedic.page.New = function(options, element) {

  transmedic.page.Default.call(this, options, element);
  this.options = $.extend(this.options, transmedic.page.New.DEFAULT, options);

  // if class has parent
  //goog.events.EventTarget.call(this, options, element);
  //this.options = $.extend(this.options, transmedic.page.New.DEFAULT, options);
  this.expandable_text();  
  this.create_feature_carousel();
  this.create_filters();
  this.create_mobile_filters();  

  this.append_html = "";  
  this.current_page = 1;
  this.news_per_page = 12;    
  this.current_category = "all";
  this.counter_i = 0;
  this.counter_a = 0;

  this.news_template = Handlebars.compile($("#news-template").html());

  this.load_more_news = $("#page-news-load-more-cta-container a");  

  $.getJSON(home_url+'/post-json', function(data) {

    this.all_news_json = data;

    this.news_count = this.all_news_json.news.length;
    this.total_news_page = this.news_count/this.news_per_page;
    this.total_news_page = Math.ceil(this.total_news_page);

    if(window.location.hash && window.location.hash !== '#all') {
      this.current_category = window.location.hash;
      this.current_category = this.current_category.slice(1);
      this.get_filter_news();

      $(".active-cat").removeClass("active-cat");
      $("a[href="+window.location.hash+"]").addClass("active-cat");

      $('html, body').animate({
        scrollTop: $("#page-news-filter-section").offset().top - 50
      }, 800);

      this.load_more_news.hide();

    } else {
      this.get_all_news();
    }
    
    this.create_load_more_btn();

  }.bind(this));  

  console.log('transmedic.page.New: init');

  // $("body").on('DOMSubtreeModified', ".goog-menu-button-caption", function() { 
  //   $("#news_filter").trigger("change");
  // });
};
goog.inherits(transmedic.page.New, transmedic.page.Default);


/**
 * like jQuery options
 * @const {object}
 */
transmedic.page.New.DEFAULT = {
  'option_01': '',
  'option_02': ''
};

/**
 * CLASSNAME Event Constant
 * @const
 * @type {string}
 */
transmedic.page.New.EVENT_01 = '';

/**
 * CLASSNAME Event Constant
 * @const
 * @type {string}
 */
transmedic.page.New.EVENT_02 = '';


//    ____  ____  _____     ___  _____ _____
//   |  _ \|  _ \|_ _\ \   / / \|_   _| ____|
//   | |_) | |_) || | \ \ / / _ \ | | |  _|
//   |  __/|  _ < | |  \ V / ___ \| | | |___
//   |_|   |_| \_\___|  \_/_/   \_\_| |_____|
//


transmedic.page.New.prototype.create_feature_carousel = function() {
  $("#page-news-featured-section-content").slick({
    'speed': 350,
    'dots': true,
    'arrows': false,
    'infinite': false,
    'slidesToShow': 1,
    'slidesToScroll': 1,
    'pauseOnHover': false,
    'autoplay': false,
    'autoplaySpeed': 4000
  });
  
  $("#page-news-featured-carousel").slick({
    'speed': 350,
    'dots': true,
    'arrows': false,
    'infinite': false,
    'slidesToShow': 1,
    'slidesToScroll': 1,
    'pauseOnHover': false,
    'autoplay': false,
    'autoplaySpeed': 4000
  });
};

transmedic.page.New.prototype.create_filters = function() {

  this.filter_categories_arr = $("#page-news-filter-list li a");
  this.filter_categories_arr.click(this.on_category_click.bind(this));

};

transmedic.page.New.prototype.create_mobile_filters = function() {

  this.filter_categories_mobile = $("#news_filter");

  // console.log(this.filter_categories_mobile.val())
  this.filter_categories_mobile.on('change', this.on_category_change.bind(this));

};

transmedic.page.New.prototype.create_load_more_btn = function() {

  this.load_more_news.click(this.on_load_more_news_click.bind(this));

};

transmedic.page.New.prototype.append_to_news_container = function(i) {

  var data = this.all_news_json.news[i];

  var news_html = this.news_template(data);

  if(data) {
    if(data.tag == this.current_category || this.current_category == 'all') {

      var a = i + 1;
      this.counter_a = this.counter_i + 1;

      // console.log('counter_i:'+this.counter_i);
      // console.log('counter_a:'+this.counter_a);
      // console.log(this.total_news_page);

      if(this.counter_i==0) {
        // console.log('i=0');
        this.append_html += '<div class="row '+this.counter_a+'">'+news_html;
      }
      else if (this.counter_a % 3 === 0) {
        // console.log('a%3');
        this.append_html += news_html+'</div><div class="row '+this.counter_a+'">';
      }
      else if(this.counter_i == this.news_per_page - 1) {
        // console.log('i=12-1');
        // console.log(this.current_category);
        this.append_html += news_html+'</div>';
      } 
      else {
        this.append_html += news_html;
      }
      this.counter_i++;

      // hide load more 

      if(!this.all_news_json.news[i+1]) {
        this.load_more_news.hide();
      }

    }
  } else {
    this.load_more_news.hide();
  }

  // console.log(this.append_html);

  $("#page-default-news-item-container").html(this.append_html);

  this.expandable_text();  
  
  $(window).on('resize', function(){
    this.expandable_text();  
  }.bind(this));

};

transmedic.page.New.prototype.get_all_news = function() {  

  $("#page-default-news-item-container").html("");

  this.append_html = "";

  this.counter_i = 0;
  this.counter_a = 0;

  for (var i = 0; i < this.news_per_page; i++) {
    this.append_to_news_container(i);
  }
  
};

transmedic.page.New.prototype.get_more_news = function() {

  // console.log(this.current_page);
  // console.log(this.news_per_page);

  var starting_index = this.current_page * this.news_per_page;  

  if(this.current_page == this.total_news_page - 1) {
    var ending_index = this.news_count;  
  } else {
    var ending_index = starting_index + this.news_per_page;  
  }  

  // this.counter_i = 0;
  // this.counter_a = 0;

  for (var i = starting_index; i < ending_index; i++) {
    this.append_to_news_container(i);
  }

  this.current_page++;
};

transmedic.page.New.prototype.get_filter_news = function() {  

  var news_template = Handlebars.compile($("#news-template").html());

  $("#page-default-news-item-container").html("");

  this.append_html = "";
  var counter_i = 0;
  var counter_a = 0;

  this.counter_i = 0;
  this.counter_a = 0;

  if(this.current_category=="all") {
    this.current_page = 1; // reset
    var starting_index = 0;
    var ending_index = starting_index + this.news_per_page;
  } else {
    var starting_index = 0;
    var ending_index = this.news_count;
  }

  for (var i = starting_index; i < ending_index; i++) {
    this.append_to_news_container(i);
  }

};
transmedic.page.New.prototype.private_method_05 = function() {};
transmedic.page.New.prototype.private_method_06 = function() {};


//    ____  _   _ ____  _     ___ ____
//   |  _ \| | | | __ )| |   |_ _/ ___|
//   | |_) | | | |  _ \| |    | | |
//   |  __/| |_| | |_) | |___ | | |___
//   |_|    \___/|____/|_____|___\____|
//


transmedic.page.New.prototype.public_method_01 = function() {};
transmedic.page.New.prototype.public_method_02 = function() {};
transmedic.page.New.prototype.public_method_03 = function() {};
transmedic.page.New.prototype.public_method_04 = function() {};
transmedic.page.New.prototype.public_method_05 = function() {};
transmedic.page.New.prototype.public_method_06 = function() {};


//    _______     _______ _   _ _____ ____
//   | ____\ \   / / ____| \ | |_   _/ ___|
//   |  _|  \ \ / /|  _| |  \| | | | \___ \
//   | |___  \ V / | |___| |\  | | |  ___) |
//   |_____|  \_/  |_____|_| \_| |_| |____/
//

/**
 * @param {object} event
 */
transmedic.page.New.prototype.on_category_click = function(event) {
  this.current_category = $(event.currentTarget).attr("href");
  this.current_category = this.current_category.slice(1);

  $(".active-cat").removeClass("active-cat");
  $(event.currentTarget).addClass("active-cat");

  if(this.current_category!=='all') {
    this.load_more_news.hide();
  } else {
    this.load_more_news.show();
  }

  this.get_filter_news();

};

/**
 * @param {object} event
 */
transmedic.page.New.prototype.on_category_change = function(event) {
  this.current_category = $(event.currentTarget).val();  

  $(".active-cat").removeClass("active-cat");
  $(event.currentTarget).addClass("active-cat");

  if(this.current_category!=='all') {
    this.load_more_news.hide();
  } else {
    this.load_more_news.show();
  }

  this.get_filter_news();

};

/**
 * @param {object} event
 */
transmedic.page.New.prototype.on_load_more_news_click = function(event) {
  event.preventDefault();
  this.get_more_news();
};

/**
 * @param {object} event
 */
transmedic.page.New.prototype.on_event_handler_03 = function(event) {
};

/**
 * @param {object} event
 */
transmedic.page.New.prototype.on_event_handler_04 = function(event) {
};






transmedic.page.New.prototype.sample_method_calls = function() {

  // sample override
  transmedic.page.New.superClass_.method_02.call(this);

  // sample event
  this.dispatchEvent(new goog.events.Event(transmedic.page.New.EVENT_01));
};