function addCommas(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}
function initialHash() {
  'use strict';
  window.location.href = "#";
}

function handleTouch(e) {
    var x = e.changedTouches[0].clientX;
  var total = this.clientWidth;
  var position = x - total;
  if ( position < 0 ) this.style.left = (x-total) + 'px'
  else if (position >= 0) this.style.left = 0 + 'px'
}
function handleTouchEnd(e) {
    var x = e.changedTouches[0].clientX;
  var total = this.clientWidth;
  var position = x - total;
  this.style.left = "";
  if ( position <= -total*0.5 ) initialHash();
}//
//document.querySelector('.menu-mobile').addEventListener('touchstart', handleTouch, false)
//document.querySelector('.menu-mobile').addEventListener('touchmove', handleTouch, false)
document.querySelector('.menu-mobile').addEventListener('touchend', handleTouchEnd, false)
//document.getElementById('menu-mobile').addEventListener('click', initialHash, false);
$(document).ready(function() {
      $('.mobile-link').click(function (e)
    {
        e.preventDefault();
        $(this).parent().find( "ul" ).css( "height", "auto" );
    });
    $('.menu-mobile-navigation').click(function ()
    {
        $('.menu-mobile-container').show();
        $('.menu-mobile').css('left','0');
    });
     $('.menu-mobile-container').click(function(e){
    if(e.target.id == 'menu-mobile-container'){
            $('.menu-mobile-container').hide();
        }
  });
    $('.radio').change(function ()
    {
       $('html, body').animate({
                    scrollTop: $("#form").offset().top - 200
                }, 200); 
    });
    $('#course_id').on('change', function() {
        var course_id = $('#course_id').val();
        var sale_price = $('#course-'+course_id).data('sale-price');
        
        var price = $('#course-'+course_id).data('price');
        sale_price = addCommas(sale_price);
        price = addCommas(price);
        $('.new-price').html('<span>'+sale_price+' VNĐ</span>');
        $('.old-price').html('<span style="text-decoration: line-through;">'+price+' VNĐ</span>');
    });
    $('.radio-btn').click(function ()
    {
       $('.pick-course').val($(this).data('course_id'));
       $('.your_local').val($(this).data('address_id'));  
       $('html, body').animate({
                    scrollTop: $("#form").offset().top - 100
                }, 200); 
    });
  $('.image-link').magnificPopup({type:'image'});
  $('.video-holder').click(function(e){
    console.log(e);
    if(e.target.id != 'video-player'){
            $('.video-holder').hide();
            $('#video-player').attr('src','');
        }
  });
  $('.open-video').click(function (){
     $(this).parent().find('.open-video-2').trigger('click');
    });
  $('.open-video-2').click(function (){
    var video = $(this).data("video");
    $(this).append('<iframe width="560" height="315" src="https://www.youtube.com/embed/'+video+'" autoplay="1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
  });
  $('.teacher-slide').owlCarousel({
    loop:true,
    margin:75,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    nav:true,
    navText: ["<img src='/assets_pasal/icon/arrow-left.png'>","<img src='/assets_pasal/icon/arrow-right.png'>"],
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
        },
        600:{
            items:2,
        },
        1000:{
            items:3,
        }
    }
});
  $('.video-slide').owlCarousel({
    loop:true,
    margin:25,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    nav:true,
    navText: ["<img src='/assets_pasal/icon/arrow-left.png'>","<img src='/assets_pasal/icon/arrow-right.png'>"],
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
        },
        600:{
            items:2,
        },
        1000:{
            items:4,
        }
    }
});
$('.testimonial-slide').owlCarousel({
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
        },
        600:{
            items:2,
        },
        1000:{
            items:3,
        }
    }
});
$('.news-slide').owlCarousel({
    loop:true,
    margin:20,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
        },
        600:{
            items:2,
        },
        1000:{
            items:3,
        }
    }
});
 });    


if ($('#toc').length ){
    
    var headings = $(".content h1,.content h2,.content h3,.content h4")
   $(".content-detail h1,.content-detail h2,.content-detail h3,.content-detail h4").each(function (index)
   {
    if ($(this).is('h1'))
    {
      $('#toc').append('<a class="h1" href="#'+$( this ).text().split(' ').join('-')+'">'+$( this ).text()+'</a>');
    }
    if ($(this).is('h2'))
    {
      $('#toc').append('<a class="h2" href="#'+$( this ).text().split(' ').join('-')+'">'+$( this ).text()+'</a>');
    }if ($(this).is('h3'))
    {
      $('#toc').append('<a class="h3" href="#'+$( this ).text().split(' ').join('-')+'">'+$( this ).text()+'</a>');
    }
    if ($(this).is('h4'))
    {
      $('#toc').append('<a class="h4" href="#'+$( this ).text().split(' ').join('-')+'">'+$( this ).text()+'</a>');
    }
    $(this).attr("id",$( this ).text().split(' ').join('-'));

   });


}
$(window).scroll(function() {   
    if ($('.form-sidebar').length ){
    if(isScrolledIntoView($('.form-sidebar')))
    {   var current_width = $('.form-sidebar').width();
        $('.form-sidebar').width(current_width);
        $('.form-sidebar').addClass('fixed');
    }   
    if(isScrolledIntoView($('#ads-sidebar')))
    {  
        $('.form-sidebar').removeClass('fixed');
    }
    }
    // Get the header
    var header = document.getElementById("header-top");
    
    // Get the offset position of the navbar
    var sticky = header.offsetTop;
    if (window.pageYOffset > sticky) {
        header.classList.add("fixed-top");
      } else {
        header.classList.remove("fixed-top");
      }
});