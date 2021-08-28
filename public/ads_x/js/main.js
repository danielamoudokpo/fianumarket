/* =================================
------------------------------------
	Divisima | eCommerce Template
	Version: 1.0
 ------------------------------------
 ====================================*/


'use strict';


$(window).on('load', function() {
	/*------------------
		Preloder
	--------------------*/
	$(".loader").fadeOut();
	$("#preloder").delay(400).fadeOut("slow");

});

(function($) {
	/*------------------
		Navigation
	--------------------*/
	$('.main-menu').slicknav({
		prependTo:'.main-navbar .container',
		closedSymbol: '<i class="flaticon-right-arrow"></i>',
		openedSymbol: '<i class="flaticon-down-arrow"></i>'
	});


	/*------------------
		ScrollBar
	--------------------*/
	$(".cart-table-warp, .product-thumbs").niceScroll({
		cursorborder:"",
		cursorcolor:"#afafaf",
		boxzoom:false
	});


	/*------------------
		Category menu
	--------------------*/
	$('.category-menu > li').hover( function(e) {
		$(this).addClass('active');
		e.preventDefault();
	});
	$('.category-menu').mouseleave( function(e) {
		$('.category-menu li').removeClass('active');
		e.preventDefault();
	});


	/*------------------
		Background Set
	--------------------*/
	$('.set-bg').each(function() {
		var bg = $(this).data('setbg');
		$(this).css('background-image', 'url(' + bg + ')');
	});



	/*------------------
		Hero Slider
	--------------------*/
	var hero_s = $(".hero-slider");
    hero_s.owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        items: 1,
        dots: true,
        animateOut: 'fadeOut',
    	animateIn: 'fadeIn',
        navText: ['<i class="flaticon-left-arrow-1"></i>', '<i class="flaticon-right-arrow-1"></i>'],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        onInitialized: function() {
        	var a = this.items().length;
            $("#snh-1").html("<span>1</span><span>" + a + "</span>");
        }
    }).on("changed.owl.carousel", function(a) {
        var b = --a.item.index, a = a.item.count;
    	$("#snh-1").html("<span> "+ (1 > b ? b + a : b > a ? b - a : b) + "</span><span>" + a + "</span>");

    });

	hero_s.append('<div class="slider-nav-warp"><div class="slider-nav"></div></div>');
	$(".hero-slider .owl-nav, .hero-slider .owl-dots").appendTo('.slider-nav');



	/*------------------
		Brands Slider
	--------------------*/
	$('.product-slider').owlCarousel({
		loop: true,
		nav: true,
		dots: false,
		margin : 30,
		autoplay: true,
		navText: ['<i class="flaticon-left-arrow-1"></i>', '<i class="flaticon-right-arrow-1"></i>'],
		responsive : {
			0 : {
				items: 1,
			},
			480 : {
				items: 2,
			},
			768 : {
				items: 3,
			},
			1200 : {
				items: 4,
			}
		}
	});


	/*------------------
		Popular Services
	--------------------*/
	$('.popular-services-slider').owlCarousel({
		loop: true,
		dots: false,
		margin : 40,
		autoplay: true,
		nav:true,
		navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
		responsive : {
			0 : {
				items: 1,
			},
			768 : {
				items: 2,
			},
			991: {
				items: 3
			}
		}
	});


	/*------------------
		Accordions
	--------------------*/
	$('.panel-link').on('click', function (e) {
		$('.panel-link').removeClass('active');
		var $this = $(this);
		if (!$this.hasClass('active')) {
			$this.addClass('active');
		}
		e.preventDefault();
	});


	/*-------------------
		Range Slider
	--------------------- */
	var rangeSlider = $(".price-range"),
		minamount = $("#minamount"),
		maxamount = $("#maxamount"),
		minPrice = rangeSlider.data('min'),
		maxPrice = rangeSlider.data('max');
	rangeSlider.slider({
		range: true,
		min: minPrice,
		max: maxPrice,
		values: [minPrice, maxPrice],
		slide: function (event, ui) {
			minamount.val(ui.values[0]);
			maxamount.val(ui.values[1]);
		},
		stop: function(event, ui) {
			// console.log(event);
			$('.filter_data').empty();
			load_data($("#minamount").val(),$("#maxamount").val());
		}
	});
	minamount.val( rangeSlider.slider("values", 0));
	maxamount.val(rangeSlider.slider("values", 1));

// 
// function collision($div1, $div2) {
//     var x1 = $div1.offset().left;
//     var w1 = 40;
//     var r1 = x1 + w1;
//     var x2 = $div2.offset().left;
//     var w2 = 40;
//     var r2 = x2 + w2;
//     if (r1 < x2 || x1 > r2)
//         return false;
//     return true;
// }

// $(function () {

// 	var price_range = $('.price-range');
// 	// var price_range2 = $('.price-range');
// 	var price_range_both = $('.price-range-both');
	
// 	// price_range2.on('slideStop', function(val) {
// 	//     console.log(val);
// 	//     load_data($("#minamount").val(),$("#maxamount").val());
// 	// })
// 	/*------------------- Price Range Slider  -------------------*/
// 	if (price_range.length > 0) {
	
// 		// slider call
	
// 		price_range.slider({
// 			range: true,
// 			min: 1000,
// 			max: 99000,
// 			values: [1000,99000],
// 			slide: function (event, ui) {
	
// 				$('.ui-slider-handle:eq(0) .price-range-min').html(ui.values[0] + ' Fcfa' );
// 				$('.ui-slider-handle:eq(1) .price-range-max').html(ui.values[1] + ' Fcfa');
// 				price_range_both.html('<i>' + ui.values[0] + ' - </i> Fcfa' + ui.values[1]);
// 				$("#minamount").val(ui.values[0]);
// 				$("#maxamount").val(ui.values[1]);
// 				//
				
// 				if (ui.values[0] === ui.values[1]) {
// 					$('.price-range-both i').css('display', 'none');
// 				} else {
// 					$('.price-range-both i').css('display', 'inline');
// 					// load_data(ui.values[0],ui.values[1]);
// 				}
	
// 				//
	
// 				if (collision($('.price-range-min'), $('.price-range-max')) === true) {
// 					$('.price-range-min, .price-range-max').css('opacity', '0');
// 					price_range_both.css('display', 'block');
// 				} else {
// 					$('.price-range-min, .price-range-max').css('opacity', '1');
// 					price_range_both.css('display', 'none');
// 				}
	
// 			},
// 			stop: function(event, ui) {
// 				// console.log(event);
// 				$('.filter_data').empty();
// 				load_data($("#minamount").val(),$("#maxamount").val());
// 			}
// 		});
// 		$('.ui-slider-range').append('<span class="price-range-both value"><i>' + price_range.slider('values', 0) + ' - </i>' + price_range.slider('values', 1) + '</span>');
// 		$('.ui-slider-handle:eq(0)').append('<span class="price-range-min value">' + price_range.slider('values', 0) + '</span>');
// 		$('.ui-slider-handle:eq(1)').append('<span class="price-range-max value">   ' + price_range.slider('values', 1) + '</span>');
// 		// load_data(ui.values[0],ui.values[1]);
// 	}
// 	});
	
// 
	/*-------------------
		Quantity change
	--------------------- */
    var proQty = $('.pro-qty');
	proQty.prepend('<span class="dec qtybtn">-</span>');
	proQty.append('<span class="inc qtybtn">+</span>');
	proQty.on('click', '.qtybtn', function () {
		var $button = $(this);
		var oldValue = $button.parent().find('input').val();
		if ($button.hasClass('inc')) {
			var newVal = parseFloat(oldValue) + 1;
		} else {
			// Don't allow decrementing below zero
			if (oldValue > 0) {
				var newVal = parseFloat(oldValue) - 1;
			} else {
				newVal = 0;
			}
		}
		$button.parent().find('input').val(newVal);
	});



	/*------------------
		Single Product
	--------------------*/
	$('.product-thumbs-track > .pt').on('click', function(){
		$('.product-thumbs-track .pt').removeClass('active');
		$(this).addClass('active');
		var imgurl = $(this).data('imgbigurl');
		var bigImg = $('.product-big-img').attr('src');
		if(imgurl != bigImg) {
			$('.product-big-img').attr({src: imgurl});
			$('.zoomImg').attr({src: imgurl});
		}
	});


	$('.product-pic-zoom').zoom();



})(jQuery);
