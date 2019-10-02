// menu page detail
$(document).ready(function(){
    $('.dropdown-btn_detail').click(function(){
        $(this).addClass('clicked');
        $(this).next().slideToggle(300);
        $(this).children('#down').toggle();
        $(this).children('#up').toggle();
        $('.dropdown-btn_detail').each(function () {
            if (!$(this).hasClass('clicked')) {
                $(this).children('#down').show();
                $(this).children('#up').hide();
                $(this).next().slideUp(300);
            }
            $(this).removeClass('clicked');
        })
    });
});

// product detail
$(document).ready(function(){
    var img = $('#img').attr('src');

    $('.small_img > img').each(function(){
        var img_small = $(this).attr('src');
        $(this).hover(function(){
            $('#img-zoom').attr('src', img_small);
        });
    });
    $('.small_img').mouseleave(function(){
        $('.img-zoom').hide(700);
    });
    $('.small_img').mouseenter(function(){
        $('.img-zoom').show(700);
    });
});

var width = $(window).width();
if (width <= 800){
    $('.category > .filter > form ').attr('id', 'no-submit');
    $('.category_responsive > .filter > form ').attr('id', 'submit');
}
else{
    $('.category > .filter > form ').attr('id', 'submit');
    $('.category_responsive > .filter > form ').attr('id', 'no-submit');
}
$(window).resize(function(){
    var width = $(window).width();
    if (width <= 800){
        $('.category > .filter > form ').attr('id', 'no-submit');
        $('.category_responsive > .filter > form ').attr('id', 'submit');
    }
    else{
        $('.category > .filter > form ').attr('id', 'submit');
        $('.category_responsive > .filter > form ').attr('id', 'no-submit');
    }
});

$(document).ready(function(){
    $('.classify > input').click(function(){
        if ($(this).prop('checked') == true) {
            $('.classify > input').each(function(){
                $(this).prop('checked', false);
            });
            $(this).prop('checked', true);
        }
    });

    $('.filter > form > input').click(function(){
        if ($(this).prop('checked') == true) {
            $('.filter > form > input').each(function(){
                $(this).prop('checked', false);
            });
            $(this).prop('checked', true);
            // auto submit form
            $('.filter').find('#submit').submit();
        }
    });
});
