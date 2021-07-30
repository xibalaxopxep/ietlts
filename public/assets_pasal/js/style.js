
$(document).ready(function() {
  $('.image-link').magnificPopup({type:'image'});
  $('.open-video').click(function (){
    var video = $(this).data("video");
    $('#video-player').attr('src','https://www.youtube.com/embed/'+video);
    $('.video-holder').show();
  });
  $('.video-holder').click(function(e){
    console.log(e);
    if(e.target.id != 'video-player'){
            $('.video-holder').hide();
            $('#video-player').attr('src','');
        }
  });
  $('.teacher-slide').owlCarousel({
    loop:true,
    margin:60,
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
 function isScrolledIntoView(elem)
{
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();
    var elemTop = $(elem).offset().top;
    var elemBottom = elemTop + $(elem).height();
    return ((elemBottom >= docViewTop) && (elemTop <= docViewBottom) && (elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}

$(window).scroll(function() {    
    if(isScrolledIntoView($('#form-sidebar')))
    {
        console.log('visible');
    }    
});