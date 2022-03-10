$(document).ready(function() {

    $('#preload').hide();

    $('html').css({ 'overflow-y': 'auto' })
    $('body').css({ 'overflow': 'unset' })


});

$(document).ready(function() {
    $('.minus').click(function () {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 0 ? 0 : count;
        $input.val(count);
        $input.change();
        return false;
    });
    $('.plus').click(function () {
        var $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
    });
});

// function loading() {
//     document.getElementById('preload').style.display = 'none';
// }
$('.home-carousel-two').owlCarousel({
    nav: false,
    loop: true,
    autoplay: true,
    autoplayTimeout: 3500,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
    }
})

$('.custom-carousel').owlCarousel({
    loop: true,
    autoplay: true,
    autoplayTimeout: 3500,
    margin: 10,
    nav: false,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 3
        }
    }
})