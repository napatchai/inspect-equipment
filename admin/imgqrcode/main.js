$(window).on('scroll', function(){
    if($(window).scrollTop()){
        $('nav').addClass('navactive');
        $('.search').removeClass('search1');
    }else{
        $('nav').removeClass('navactive');
        $('.search').addClass('search1');
    }
});