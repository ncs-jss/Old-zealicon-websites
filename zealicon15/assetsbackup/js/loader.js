$(document).ready(function() {
  var counter = 0;

  // Start the changing images
  stopImages = setInterval(function() {
    if(counter == 4) { 
      counter = 0; 
    }
    changeImage(counter);
    counter++;
  }, 3000);

  // Set the percentage off
  loading();
});

function changeImage(counter) {
  var images = [
    '<img src="assets/images/bot.png" alt="">',
    '<img src="assets/images/tabla-2.png" alt="">',
    '<img src="assets/images/note.png" alt="">',
    '<img src="assets/images/rocket.png" alt="">'
  ];

  $(".loader .image").html(""+ images[counter] +"");
}

function loading(){
  var num = 0;
  var max = 100;
  for(i=0; i<=max; i++) {
    setTimeout(function() { 
      $('.loader span').html(num+'%');
      if(num == max) {
        clearInterval(stopImages);
        $('.loader').fadeOut('normal',function(){$('.button').fadeIn()});
      }
      num++;
    },i*130);
  };

}

$(document).on('click', '.showWrapper', function(event) {
  $('.demo-1').fadeOut('slow',function(){
    $(this).remove();
    $('.wrapper').fadeIn('slow')
  });
});