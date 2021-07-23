$(document).ready(function(){
    $(window).scroll(function(){
        if(this.scrollY > 20){
            $('.navigasi').addClass("sticky");
        }else{
            $('.navigasi').removeClass("sticky");
        }

        if(this.scrollY > 20){
            $('.kotak-cari').addClass("sticky");
        }else{
            $('.kotak-cari').removeClass("sticky");
        }

        if(this.scrollY > 20){
            $('.menu-btn').addClass("sticky");
        }else{
            $('.menu-btn').removeClass("sticky");
        }

        if(this.scrollY > 500){
            $('.scroll-atas-btn').addClass("show");
        }else{
            $('.scroll-atas-btn').removeClass("show");
        }

    })

    // slide-up script
    $('.scroll-atas-btn').click(function(){
        $('html').animate({scrollTop: 0});
        // removing smooth scroll on slide-up button click
        $('html').css("scrollBehavior", "auto");
    });

    // toggle menu/navbar script
    $('.menu-btn').click(function(){
        $('.navigasi .pesanan').toggleClass("active");
        $('.menu-btn i').toggleClass("active");
    });


    // typing text animation script
    var typed = new Typed(".typing", {
        strings: ["Developer", "Blogger", "Gamer"],
        typeSpeed: 80,
        backSpeed: 40,
        loop: true
    });
});

