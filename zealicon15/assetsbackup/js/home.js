// jQuery Selections
var $html = $('html'),
$container = $('#container'),
$prompt = $('#prompt'),
$toggle = $('.top-bar ul li a'),
$dataModal = $('#dataModal'),
$scene = $('#scene');

// Hide browser menu.
(function() {
    setTimeout(function(){window.scrollTo(0,0);},0);
})();

// Setup FastClick.
FastClick.attach(document.body);

// Add touch functionality.
if (Hammer.HAS_TOUCHEVENTS) {
    $container.hammer({drag_lock_to_axis: true});
    _.tap($html, 'a,button,[data-tap]');
}

// Add touch or mouse class to html element.
$html.addClass(Hammer.HAS_TOUCHEVENTS ? 'touch' : 'mouse');

// Resize handler.
(resize = function() {
    $scene[0].style.width = window.innerWidth + 'px';
    $scene[0].style.height = window.innerHeight + 'px';
    if (!$prompt.hasClass('hide')) {
        if (window.innerWidth < 600) {
            $toggle.addClass('hide');
        } else {
            $toggle.removeClass('hide');
        }
    }
})();

// Attach window listeners.
window.onresize = _.debounce(resize, 200);
window.onscroll = _.debounce(resize, 200);

function showDetails(elem) {
    $dataModal.removeClass('hide');
    elem.removeClass('i');
}

function hideDetails(elem) {
    $dataModal.addClass('hide');
    elem.addClass('i');
}

$(document).on('click','.closeModal',function(){
    $('.top-bar ul').find('li.active a').removeClass('i');
    $dataModal.addClass('hide');
});
// Listen for toggle click event.
$toggle.on('click', function(event) {
    clickedLink = $(this);
    activeLink = $(this).closest('ul').find('li.active a');
    show = clickedLink.attr('data-show');
    hide = activeLink.attr('data-show');
    if(show != hide){
        $dataModal.addClass('hide');
        if(!activeLink.hasClass('i')){$(this).addClass('i')}
        activeLink.parent().removeClass('active');
        clickedLink.parent().addClass('active');
        content = $('.'+show).html();
        setTimeout(function() {$('.panel').html(content);  }, 500);
        setTimeout(function() { $dataModal.removeClass('hide'); }, 600);
        return;
    }
    clickedLink.hasClass('i') ? showDetails(clickedLink) : hideDetails(clickedLink);
});

// Pretty simple huh?
$scene.parallax();

// Check for orientation support.
setTimeout(function() {
    if ($scene.data('mode') === 'cursor') {
        $prompt.removeClass('hide');
        if (window.innerWidth < 600) $toggle.addClass('hide');
        $prompt.on('click', function(event) {
            $prompt.addClass('hide');
            if (window.innerWidth < 600) {
                setTimeout(function() {
                    $toggle.removeClass('hide');
                },1200);
            }
        });
    }
},1000);
var audio = document.getElementById('background_audio');

document.getElementById('mute').addEventListener('click', function (e)
                                                 {
    e = e || window.event;
    audio.muted = !audio.muted;
    e.preventDefault();
}, false);

