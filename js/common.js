/*******************************
            hambuger
********************************/
$(function() {  
    $('.hambuger').click(function() {
      $(this).toggleClass('active');
      $('.menu_inner').toggleClass('active');
      $('body').toggleClass('fixed');
      $('.overlay').toggleClass('active');
    });
  
    $('.overlay').on('click', function () {  
      $(this).removeClass('active');
      $('.menu_inner').removeClass('active');
      $('body').removeClass('fixed');
      $('.hambuger').removeClass('active');
    });
});

$(function() {
    var currentUrl = window.location.pathname;

    $('.menu_inner menu-item a').each(function () {
        var linkHref = $(this).attr('href');

        if (currentUrl === linkHref) {
        $(this).addClass('now');
        }
    });
});

$(function() {
  if ($(window).width() <= 993) {
    $('.menu_inner .menu-item-has-children').click(function() {
        $('.menu_padding').slideToggle();
    });
  }
});


/*******************************
        スムーズスクロール
********************************/
$(function() {
  $('a[href^="#"]').on('click', function () {
    var href = $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top;
    $("html, body").animate({scrollTop: position - 90}, 550, "swing");
    return false;
  });
});


/*******************************
            page-top
********************************/
$(function() {
  $('#page-top').on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({
      scrollTop: 0
    });
  });
});


$(function(){
  var pagetop = $('#page-top');
  pagetop.hide();
  $(window).scroll(function () {
     if ($(this).scrollTop() > 100) {
          pagetop.fadeIn();
     } else {
          pagetop.fadeOut();
     }
  });
  pagetop.click(function () {
     $('body, html').animate({ scrollTop: 0 }, 500);
     return false;
  });
});