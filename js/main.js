	/*----------------- 
		Freewall 
	-----------------*/
	$(function() {
		var wall = new Freewall("#Freewall");
		wall.reset({
			selector: '.brick',
			cellW: 160,
			cellH: 160,
			gutterX:0,
			gutterY:0,
			animate: true,
			onResize: function() {
				wall.fitHeight($(window).height() - 0);
			}
		});
		// caculator height for IE7;
		wall.fitHeight($(window).height() - 0);
		$(window).trigger("resize");


		/*- Filters -*/
		$(".filter-label").click(function() {
			$(".filter-label").removeClass("active");
			var filter = $(this).addClass('active').data('filter');
			if (filter) {
				wall.filter(filter);
			} else {
				wall.unFilter();
			}
		});
	});

	/*----------------- 
		Menu
	-----------------*/
    enquire.register("screen and (max-width : 768px)", function() {
        // On hamburger menu click, show nav
        $( '.menu-btn' ).click(function(){
            $('.filter-items').slideToggle();
            $('.menu-btn').addClass('btn-none');
        });

         // Close nav dropdown on item click
        $('.filter-label').click(function(){
            $('.filter-items').hide();
        });

  		//  var wall = new Freewall("#Freewall");
		// 	wall.reset({
		// 	selector: '.brick',
		// 	cellW: 160,
		// 	cellH: 160,
		// 	gutterX:0,
		// 	gutterY:0,
		// 	animate: true,
		// 	onResize: function() {
		// 		wall.fitHeight($(window).height() - 100);
		// 	}
		// });
		// // caculator height for IE7;
		// wall.fitHeight($(window).height() - 100);
		// $(window).trigger("resize");

    });
	 




	

	

