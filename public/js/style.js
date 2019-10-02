$(function(){
    $('.owl-footer').owlCarousel({
        loop:false,
        margin:30,
        dots : false,
        responsive:{
            0:{
                items:1,
                loop:true,
                autoplay:true,
                autoTimeout:5000,
            },
            600:{
                items:2,
                loop:true,
                autoplay:true,
                autoTimeout:5000,
            },
            1000:{
                items:3
            }
        }
    });
});

//opacity
$(function () {
    $('.nav-item').hover(function () {
        $('#opacity').css('display', 'block');
    }, function () {
        $('#opacity').css('display', 'none');
    })
});

// menu - responsive
function openNav() {
    document.getElementById("mySidenav").style.left = "0%";
    document.getElementById("opacity-responsive").style.display = "block";
}

function closeNav() {
    document.getElementById("mySidenav").style.left = "-75%";
    document.getElementById("opacity-responsive").style.display = "none";
}

$(document).ready(function(){
    $('.dropdown-btn').click(function(){
        // $(this).next().slideToggle(300);
        $(this).children('.dropdown-container').slideToggle(300);
    });
});

// scroll to top
var scrollTopButton = document.getElementById("scroll-top");
var html = document.documentElement;
window.onscroll = function() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        scrollTopButton.style.display = "block";
    } else {
        scrollTopButton.style.display = "none";
    }
};
scrollTopButton.onclick = function() {
    var timeLeft = html.scrollTop/20;
    var scrollByPixel = setInterval(function () {
        var percentSpent = (html.scrollTop/20 - timeLeft) / (html.scrollTop/20);
        if (timeLeft >= 0 ) {
            var newScrollTop = html.scrollTop * (1 - Math.pow(percentSpent, 5));
            html.scrollTop = newScrollTop;
            timeLeft--;
        }
        else if (timeLeft <= 0 && html.scrollTop >0){
            html.scrollTop=0;
        }
        else {
            clearInterval(scrollByPixel);
        }
    }, 1);
};


$(function(){
    $('.footer-widget > h4').find('i').click(function () {
        var footer_widget = $(this).parents('.footer-widget > h4');
        footer_widget.addClass('clicked');
        footer_widget.children('#down').toggle();
        footer_widget.children('#up').toggle();
        footer_widget.siblings('.list-menu').slideToggle(300);
        $('.footer-widget > h4').each(function () {
            if (!$(this).hasClass('clicked')) {
                $(this).children('#down').show();
                $(this).children('#up').hide();
                $(this).siblings('.list-menu').slideUp(300);
            }
            $(this).removeClass('clicked');
        })
    })
});

$(document).ready(function(){
    $("#search").keyup(function(){
        var search = $(this).val();
        $.get('tim-kiem-ajax/'+search,function(data){
            var html = '';
            $.each (data, function (key, item){
                html += '<a href="chi-tiet/'+item['pk_product_id']+'/'+item['unsigned_name']+'">';
                html += '<div class="search-product">';
                html += '<img src="public/upload/product/'+item['c_img']+'">';
                html += '<span title="'+item['c_name']+'">'+item["c_name"]+'</span>';
                html += '</div>';
                html += '</a>';
            });
            $("#search-ajax").html(html);
        });
    });

    $("#search").blur(function(){
        setTimeout(function(){
            $("#search-ajax").hide();
        },200);
    })
    .focus(function(){
        $("#search-ajax").show();
    });

});