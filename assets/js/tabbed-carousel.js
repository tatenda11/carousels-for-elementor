jQuery( document ).ready(function( $ ) {
    $('.your-class').slick({
        centerMode:false,     
        draggable:false,    
        arrows:true,         
        slidesToShow:1,     
        slidesToScroll:1,   
        dots:true,
    });

    $('.carousel-wrapper').each(function(index){
        if(index > 0) {
            $(this).fadeOut();
        }
    }).promise().done( function(){ $('.tabbed-carousel-section').removeClass('hide')} );

    $('.carousel-tab-nav-button').click(function(e){
        e.preventDefault();
        $('.carousel-tab-nav-button').removeClass('active-slide-button');
        $(this).addClass('active-slide-button');
        var slideIndex = $(this).data('slide-index');
        $(".carousel-wrapper").hide();
        //$('.carousel-wrapper').addClass('hide');
        $('#section-'+ slideIndex).fadeIn(500);
    });
});