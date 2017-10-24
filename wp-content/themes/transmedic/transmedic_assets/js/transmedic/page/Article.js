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
  

  this.has_pinned_sidebar = false;
  this.sidebar_height = 0;
  this.sidebar_fixed_scene = null;

  this.create_article_carousel();
  this.expandable_text();

  this.social_share();
  this.iframe_videos();

  // .transmedic-slick-slider {
  //   .slick-prev, .slick-next {
  //     top: calc(~'50% - 20px')!important; // - default-image-desc height
  //   }  
  // }
  // var newHeight = ($("#page-article-image-carousel").height()/2) - $(".default-image-desc").height() + 20;

  // console.log($("#page-article-image-carousel").height())
  // console.log($(".default-image-desc").height())
  // console.log(newHeight)

  // $(".transmedic-slick-slider .slick-prev, .transmedic-slick-slider .slick-next").css("top", newHeight);


  // On before slide change
  $('#page-article-image-carousel').on('afterChange', function(slick, currentSlide){    
    var caption = $("#page-article-image-carousel").find(".slick-active").attr("data-caption");
    $("#page-article-image-carousel-caption").find(".default-image-desc").html(caption);
  });  

  

  console.log('transmedic.page.Article: init');
};
goog.inherits(transmedic.page.Article, transmedic.page.Default);


/**
 * like jQuery options
 * @const {object}
 */
transmedic.page.Article.DEFAULT = {
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
transmedic.page.Article.prototype.init = function() {
  transmedic.page.Article.superClass_.init.call(this);

  this.create_article_sidebar_sticky();

};

//    ____  ____  _____     ___  _____ _____
//   |  _ \|  _ \|_ _\ \   / / \|_   _| ____|
//   | |_) | |_) || | \ \ / / _ \ | | |  _|
//   |  __/|  _ < | |  \ V / ___ \| | | |___
//   |_|   |_| \_\___|  \_/_/   \_\_| |_____|
//


transmedic.page.Article.prototype.create_article_carousel = function() {

  var carousel_item_count = $("#page-article-image-carousel").find(".carousel-item").length;
  var mobile_slider_settings = {};

  if(carousel_item_count > 1) {
    mobile_slider_settings = {
      "centerMode": true,
      "centerPadding": "25px"
    };  
  } else {
    $("#page-article-image-carousel").find(".carousel-item").css("margin", "0 20px");
  }

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
    // "asNavFor": '#page-article-image-carousel-nav',
    "responsive": [
      {
        "breakpoint": 991,
        "settings": mobile_slider_settings
      }
    ]
  });

  $('#page-article-image-carousel-nav').slick({
    "slidesToShow": 5,
    "slidesToScroll": 1,
    // "asNavFor": '#page-article-image-carousel',
    "dots": false,
    "focusOnSelect": true,
    "arrows": false,
    "infinite": true,
    "centerMode": true,
    "centerPadding": 0
  });

};

transmedic.page.Article.prototype.create_article_sidebar_sticky = function() {

  if ($('#page-article-sidebar-fixed-container').length != 0) {

    this.has_pinned_sidebar = true;

    this.sidebar_height = $('#page-article-sidebar-container').outerHeight();

    var target_duration = this.document_height - 60 - 70 - 50 - 60 - 27 - this.sidebar_height;   
    // 60 = footer height, 
    // 70 = margin from footer
    // 50 = article page padding top
    // 60 = header height
    // 27 = grey line from item

    

    this.sidebar_fixed_scene = new ScrollMagic.Scene({
      'triggerHook': 0,
      // 'triggerHook': 1,
      'duration': target_duration
      // 'triggerElement': '#page-article-sidebar-fixed-container'
      // 'triggerElement': '#page-home-nav-trigger'
    });
    this.sidebar_fixed_scene.setPin("#page-article-sidebar-container");
    this.sidebar_fixed_scene.addTo(this.controller);
    // this.sidebar_fixed_scene.addIndicators({name:'testing'});

  }
  
};

transmedic.page.Article.prototype.popup_center = function(pageURL, title, w, h) {
    var left = (screen.width/2)-(w/2);
    var top = (screen.height/2)-(h/2);
    var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
    return targetWin;
};

transmedic.page.Article.prototype.social_share = function() {
  $("#facebook-share").click(function(e){
    e.preventDefault();
    FB.ui({
      method: 'share',
      display: 'popup',
      href: window.location.href
    }, function(response){});
  });

  $("#twitter-share").click(function(e){
    e.preventDefault();
    var share_url = $(e.currentTarget).data("url");
    this.popup_center(share_url,'', 500, 500);
  }.bind(this));

  $("#linkedin-share").click(function(e){
    e.preventDefault();
    var share_url = $(e.currentTarget).data("url");
    this.popup_center(share_url,'', 500, 500);
  }.bind(this));

  $("#weibo-share").click(function(e){
    e.preventDefault();
    var share_url = $(e.currentTarget).data("url");
    this.popup_center(share_url,'', 500, 500);
  }.bind(this));
};

transmedic.page.Article.prototype.iframe_videos = function() {
  var $allVideos = $("iframe[src*='//player.vimeo.com'], iframe[src*='//www.youtube.com'], object, embed"),
    $fluidEl = $("figure");
        
  $allVideos.each(function() {
  
    $(this)
      // jQuery .data does not work on object/embed elements
      .attr('data-aspectRatio', this.height / this.width)
      .removeAttr('height')
      .removeAttr('width');
  
  });
  
  $(window).resize(function() {
     
    $allVideos.each(function() {
    
      var $el = $(this);
        var newWidth = $el.parents('figure').width();
      $el
          .width(newWidth)
          .height(newWidth * $el.attr('data-aspectRatio'));
    
    });
  
  }).resize();
}

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
transmedic.page.Article.prototype.update_page_layout = function(){
  transmedic.page.Article.superClass_.update_page_layout.call(this);


  if (this.has_pinned_sidebar == true) {
    this.sidebar_height = $('#page-article-sidebar-container').outerHeight();

    var target_duration = this.document_height - 60 - 70 - 50 - 60 - 27 - this.sidebar_height;

    this.sidebar_fixed_scene.duration(target_duration);
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

