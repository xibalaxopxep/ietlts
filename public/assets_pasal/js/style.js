
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

var c = function() {
    return({
        log: function(msg) {
          consoleDiv = document.getElementById('console');
          para = document.createElement('p');
          text = document.createTextNode(msg);
          para.appendChild(text);
          consoleDiv.appendChild(para);
        }
    });
}();

window.onload = function () {
    var toc = "";
    var level = 0;
    var maxLevel = 3;

    document.getElementById("contents").innerHTML =
        document.getElementById("contents").innerHTML.replace(
            /<h([\d])>([^<]+)<\/h([\d])>/gi,
            function (str, openLevel, titleText, closeLevel) {
                if (openLevel != closeLevel) {
				 c.log(openLevel)
                    return str + ' - ' + openLevel;
                }

                if (openLevel > level) {
                    toc += (new Array(openLevel - level + 1)).join("<ol>");
                } else if (openLevel < level) {
                    toc += (new Array(level - openLevel + 1)).join("</ol>");
                }

                level = parseInt(openLevel);

                var anchor = titleText.replace(/ /g, "_");
                toc += "<li><a href=\"#" + anchor + "\">" + titleText
                    + "</a></li>";

                return "<h" + openLevel + "><a name=\"" + anchor + "\">"
                    + titleText + "</a></h" + closeLevel + ">";
            }
        );

    if (level) {
        toc += (new Array(level + 1)).join("</ol>");
    }

    document.getElementById("toc").innerHTML += toc;
};
// function isScrolledIntoView(elem)
//{
//    var docViewTop = $(window).scrollTop();
//    var docViewBottom = docViewTop + $(window).height();
//    var elemTop = $(elem).offset().top;
//    var elemBottom = elemTop + $(elem).height();
//    return ((elemBottom >= docViewTop) && (elemTop <= docViewBottom) && (elemBottom <= docViewBottom) && (elemTop >= docViewTop));
//}
//
//$(window).scroll(function() {    
//    if(isScrolledIntoView($('#form-sidebar')))
//    {
//        console.log('visible');
//    }    
//});