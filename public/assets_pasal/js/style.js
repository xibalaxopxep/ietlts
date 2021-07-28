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
 });    