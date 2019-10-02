
$(function(){
    $('#main-category').owlCarousel({
        loop:false,
        margin:30,
        dots : false,
        nav:true,
        navText: ["<i class='fas fa-chevron-left'></i>","<i class='fas fa-chevron-right'></i>"],
        responsive:{
            0:{
                items:2
            },
            700:{
                items:3
            },
            1000:{
                items:4
            }
        }
    });
});

$(function(){
    $('.owl-hot-product').owlCarousel({
        loop:false,
        margin:30,
        dots : false,
        nav:true,
        navText: ["<i class='fas fa-chevron-left'></i>","<i class='fas fa-chevron-right'></i>"],
        responsive:{
            0:{
                items:2
            },
            700:{
                items:3
            },
            1000:{
                items:4
            }
        }
    });
});

$(function(){
    $('.hot-product-tab').each(function() {
        if (!$(this).hasClass('has-content')) {
            $(this).hide();
        }
    });

    $('.tabs-link').click(function(){
        var tabs_link = $(this);
        var data_tab = $(this).attr('data-tab');
        $('.tabs-link').each(function(){
            if ($(this).hasClass('current')) {
                $(this).removeClass('current');
            }
        });
        $(this).addClass('current');

        $('.hot-product-tab').each(function() {
            if ($(this).attr('id') == data_tab){
                if (!$(this).hasClass('has-content')) {
                    $('.hot-product-tab').each(function() {
                        $(this).hide();
                        if ($(this).hasClass('has-content')) {
                            $(this).removeClass('has-content');
                        }
                    });
                    $(this).fadeIn('500');
                    $(this).addClass('has-content');
                }
            }
        });
    });
});

$(function(){
    $('.owl-news').owlCarousel({
        loop:false,
        margin:30,
        dots : false,
        nav:true,
        navText: ["<i class='fas fa-chevron-left'></i>","<i class='fas fa-chevron-right'></i>"],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });
});


$(function(){
    $("#loadmore").click(function(){
        $(this).hide();
        $(".loader").show();

        $.ajax({
            url : 'http://localhost/sport-project/laravel-antsport/api',
            type : 'get',
            dataType : 'json',
            success : function (result){
                var html = '';
                $.each (result, function (key, item){
                    html += '<div class="col-lg-3 col-md-4 col-6 new-product-content">';
                    html += '<a href="chi-tiet/'+item['pk_product_id']+'/'+item['unsigned_name']+'">';
                    html += '<div class="content-product">';
                    html += '<div class="img-product text-center">';
                    html += '<img src="public/upload/product/'+item['c_img']+'">';
                    html += '</div>';
                    html += '<div class="title-product">';
                    html += '<span title="'+item['c_name']+'">'+item["c_name"]+'</span>';
                    html += '<span>'+item['c_price']+'₫</span>';
                    html += '<span>';
                    html += '<span><i class="fas fa-share"></i>&nbsp;Chi tiết</span>';
                    html += '<i class="far fa-heart" style="float: right;"></i>';
                    html += '</span>';
                    html += '</div>';
                    html += '</div>';
                    html += '</a>';
                    html += '</div>';
                });
                setTimeout(function(){
                    $(".show-more").hide();
                    $("#new-product").append(html);
                },500);
            }
        });

    });
});

