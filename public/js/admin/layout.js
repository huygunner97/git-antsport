
$(document).ready(function(){
    $('.dropdown-btn').click(function(){
        $(this).next().slideToggle(300);
        $(this).children('#down').toggle();
        $(this).children('#up').toggle();
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
        } else {
            $(this).addClass('active');
        }
    });
});

function openNav() {
    document.getElementById("mySidenav").style.left = "0%";
    document.getElementById("opacity-responsive").style.display = "block";
}

function closeNav() {
    document.getElementById("mySidenav").style.left = "-70%";
    document.getElementById("opacity-responsive").style.display = "none";
}
