(function(){
    var mpSliderBtn = $('.go-to-down'),
        lightSlider = $(".lightSlider"),
        noveltySlider = $('#noveltySlider'),
        viwedSlider = $('#viwedSlider'),
        masterWorksSlider = $('.master-works'),
        serviceSlider = $('.service-slider__content');

    mpSliderBtn.on('click', function(e){
        e.preventDefault();
        var scroll_el = $(this);
        var id  = $(this).attr('href'),
            top = $(id).offset().top;
        $('body,html').animate({scrollTop: top}, 1000);
        return false;
    });

    lightSlider.lightSlider({
        item: 4,
        pager: false
    });

    noveltySlider.lightSlider({
        item: 3,
        controls: false
    });

    viwedSlider.lightSlider({
        item: 3,
        controls: false
    });

    masterWorksSlider.lightSlider({
        item: 5,
        pager: false,
        slideMargin: 0
    });

    serviceSlider.lightSlider({
        item: 1,
        controls: false
    });

    //Инициализация слайдера главной страницы
    $(".carousel-inner").find('.item').filter(':first').addClass('active');
})();