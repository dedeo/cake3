$(document).ready(function(){

	/*Home Slider */
	var count = false;
    if ($(".slider-list .item").length > 1){
      count = true;
    }else {
      count = false;
    }
    var homeSlider = $(".home-slider .slider-list");
    homeSlider.owlCarousel({
		items: 1,
		singleItem: true,
		loop: count,
		nav:false,
		dots:false,
		autoplay:true,
		autoplayTimeout:4000
	});

	homeSlider.append("<div class='owl-custom-nav'><div class='owl-custom-next'><i class='fa fa-chevron-right' aria-hidden='true'></i></div><div class='owl-custom-prev'><i class='fa fa-chevron-left' aria-hidden='true'></i></div></div>");

    // Custom Navigation Events
    homeSlider.find(".owl-custom-next").click(function(){
      homeSlider.trigger('next.owl.carousel');
    });

    homeSlider.find(".owl-custom-prev").click(function(){
      homeSlider.trigger('prev.owl.carousel');
    });

	/*end Home Slider*/

	/*Date picker search*/
	$( "#tanggal-berangkat" ).datepicker({
            minDate: 0,
            maxDate: 31
        });

});