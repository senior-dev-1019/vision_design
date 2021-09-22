$(document).ready(function(){
    $(document).on('click','._jsExpandMenu', function(e){
       $('._jsExpandMenuBar').toggleClass("a3-menu-show");
       $('.main-header').toggleClass("a3-menu-show");
       if($('.main-header').hasClass("a3-menu-show")){
         $('.collapsible_ul').removeClass('active');
       }
    });
 });
/* add in menu class  */

(function($){
    $(function(){ 
        // scroll is still position
        var scroll = $(document).scrollTop();
        var headerHeight = $('.main-header').outerHeight();
        //console.log(headerHeight);
        $(window).scroll(function() {
          // scrolled is new position just obtained
          var scrolled = $(document).scrollTop();
          // optionally emulate non-fixed positioning behaviour
          if (scrolled > headerHeight){
            $('.main-header').addClass('off-canvas');
          } else {
            $('.main-header').removeClass('off-canvas');
          }
            if (scrolled > scroll){
                 // scrolling down
             $('.main-header').removeClass('fixed');
              } else {
              //scrolling up
             $('.main-header').addClass('fixed');
            }       
          scroll = $(document).scrollTop(); 
         });
    });
})(jQuery);

/* header scrool effects class  */
new WOW().init();
/* wow fanction  */
$(document).ready(function() {
    $("#owl-demo").owlCarousel({
        autoplay:true,
        autoPlay: 3000,
        loop: true,
        navigation : false,
        navigationText: ["<i class='fas fa-arrow-left'></i>","<i class='fas fa-arrow-right'></i>"],
        items : 7,
        responsive: {
        0: {
          items: 2
        },
        600: {
          items: 5
        },
        1000: {
          items: 7
        }
      }
    });
  });

  $(document).ready(function() {
    $("#owl-demo-1").owlCarousel({
        autoplay:true,
        autoPlay: 3000,
        loop:true,
        margin:50,
        dots:false,
        nav: true,
        navText: ["<i class='fas fa-arrow-left'></i>","<i class='fas fa-arrow-right'></i>"],
        responsive: {
        0: {
          items: 1,
          margin:10,
        },
        768: {
          items: 1,
        },
        1000: {
          items: 2,
          stagePadding: 0,
        }
      }

    });

  });
  $(document).ready(function() {
    $("#clientlogo").owlCarousel({
        autoplay:true,
        autoPlay: 3000,
        loop:true,
        margin:20,
        dots:false,
        nav: false,
        navText: ["<i class='fas fa-arrow-left'></i>","<i class='fas fa-arrow-right'></i>"],
        responsive: {
        0: {
          items: 2,
          margin:10,
        },
        768: {
          items: 4,
        },
        1000: {
          items: 6,
          stagePadding: 0,
        }
      }

    });

  });

  $(document).ready(function() {
    $("#memories").owlCarousel({
        autoplay:true,
        autoPlay: 3000,
        loop:true,
        margin:20,
        dots:false,
        nav: false,
        navText: ["<i class='fas fa-arrow-left'></i>","<i class='fas fa-arrow-right'></i>"],
        responsive: {
        0: {
          items: 1,
          margin:10,
        },
        768: {
          items: 2,
        },
        1000: {
          items: 3,
          stagePadding: 0,
        }
      }

    });

  });

  $(document).ready(function() {
    $("#owl-demo-4").owlCarousel({
        autoplay:true,
        autoPlay: 3000,
        loop:true,
        margin:10,
        dots:false,
        nav: false,
        navText: ["<i class='fas fa-arrow-left'></i>","<i class='fas fa-arrow-right'></i>"],
        responsive: {
        0: {
          items: 2,
          margin:10,
        },
        768: {
          items: 2,
        },
        1000: {
          items: 3,
          stagePadding: 0,
        }
      }
    });
  });

  $(document).ready(function() {
    $("#owl-demo-5").owlCarousel({
        autoplay:true,
        autoPlay: 3000,
        loop:true,
        margin:10,
        dots:false,
        nav: false,
        navText: ["<i class='fas fa-arrow-left'></i>","<i class='fas fa-arrow-right'></i>"],
        responsive: {
        0: {
          items: 2,
          margin:10,
        },
        768: {
          items: 2,
        },
        1000: {
          items: 3,
          stagePadding: 0,
        }
      }
    });
  });

  $(document).ready(function() {
    var owl = $('#owl-demo2');
    owl.owlCarousel({
      autoplay:true,
      autoPlay: 3000,
      stagePadding: 300,
      margin: 40,
      nav: false,
      dots:false,
      loop: true,
      center:true,
      responsive: {
        0: {
          items: 1,
          stagePadding: 30,
          margin: 10,
        },
        768: {
          items: 1,
          stagePadding: 20,
          margin: 10,
        },
        1000: {
          items: 1,
          stagePadding: 200,
          margin: 20,
        },
        1200: {
          items: 1,
          stagePadding: 300
        }
      }
    });
  });
/* add slider owl */


var mq = window.matchMedia( "(min-width: 991px)" );
if (mq.matches) {
  $(window).scroll(function(event){
      $(".dropdown-menu").removeClass("show");
      $(".dropdown-toggle").removeClass("show");
      $('#it-services .dropdown-menu').removeClass("active");
      $('#it-services .dropdown-toggle').removeClass("active");
    });
  /* removie in menu class */
  $('.dropdown-toggle').click(function(){
      $('.dropdown-menu').slideToggle("slow");
  });
  $(document).ready(function() {
    $('.navbar-nav').on('click.bs.dropdown', function (e) {
        $('#it-services .dropdown-menu').removeClass("active");
        $('#it-services .dropdown-toggle').removeClass("active");
        if($(e.target).hasClass('pillsclick')) {
          e.stopPropagation();
          e.preventDefault();
        }
    });
  });
};

// var mqs = window.matchMedia( "(max-width: 991px)" );
// if (mqs.matches) {
//   $(window).scroll(function(event){
//       $(".dropdown-menu").removeClass("show");
//       $("#navbarSupportedContent").removeClass("show");
//       $(".dropdown-toggle").removeClass("show");
//     });
//   /* removie in menu class */
//   $('.dropdown-toggle').click(function(){
//       $('.dropdown-menu').slideToggle("slow");
//   });
// };

var mq = window.matchMedia( "(max-width: 991px)" );
if (mq.matches) {
  $(document).ready(function() {
    $('#pills-home').removeClass('show');
    $('#pills-home').removeClass('active');
    $('#pills-home-tab').removeClass('active');
  });
};

$('.backto-menu').click(function(){
  $('.tab-pane').removeClass("show");
  $('.tab-pane').removeClass("active");
});

$('#pills-tab .nav-item').click(function(){
  $('#it-services .dropdown-menu').addClass("active");
  $('#it-services .dropdown-toggle').addClass("active");
});

  var myCarousel = document.querySelector('#carouselExampleCaptions')
      var carousel = new bootstrap.Carousel(myCarousel, {
      interval: 3000,
      wrap: true
  });

/* toggle class */
/* remove extra style in blog page */
  $(document).ready(function() {
    $("#remove-extra-style").removeAttr("style");
  });
/* remove extra style in blog page */
