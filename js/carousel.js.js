(function ($) {

  $.fn.carousel=function(){
    return this.each(function () {

        var $wrapper =$('>div', this),
            $slider = $wrapper.find('> ul'),
            $items = $slider.find('>li'),
            $single = $items.filter(':first'),

            singleWidth = $single.outerWidth(),
            visible = 3,
            currentPage = 1,
            pages = Math.cell($items.length/visible),
            containerWidth = visible * singleWidth;

        $(this).css({'width': containerWidth});


    });

  }

})(jQuery);
