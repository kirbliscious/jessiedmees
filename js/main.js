	/*----------------- 
		Functions 
	-----------------*/
	function freewall_horizontal(){
		var wall = new Freewall("#Freewall");
		wall.reset({
			selector: '.brick',
			cellW: 80,
			cellH: 80,
			gutterX:18,
			gutterY:18,
			animate: true,
			onResize: function() {
				wall.fitHeight($(window).height() - 15);
			}
		});
		// caculator height for IE7;
		wall.fitHeight($(window).height() - 0);
		$(window).trigger("resize");

		/*- Filters -*/
		$(".filter-label").click(function() {
			$(".modal").modal('hide');
			$(".filter-label").removeClass("active");
			var filter = $(this).addClass('active').data('filter');
			if (filter) {
				wall.filter(filter);

			} else {
				wall.unFilter();
			}
		});
	};

	function freewall_vertical(){
		var wall = new Freewall("#Freewall");

		wall.reset({
			selector: '.brick',
			cellW: 80,
			cellH: 'auto',
			gutterX:5,
			gutterY:5,
			fixSize: 0,
			animate: true,
			onResize: function() {
				wall.fitWidth();;
			}
		});
		wall.appendHoles(10).fitWidth();
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
	};

	/* Brick */
	var faderate;
	var max = .90, min = .50;
	
	function fade(){
		faderate = Math.random() * (max-min) + min;
	}

	/*----------------- 
		Variables
	-----------------*/
	var mobile = false;
	var $windowwidth = $(window).width();

	/*----------------- 
		Freewall 
	-----------------*/
	if ($windowwidth < 768){
		freewall_vertical();
	} else if( $windowwidth >= 768){
		freewall_horizontal();
	}

	/* Freewall - re-render on window resize */
	$(window).resize(function(){
		if (mobile == false && $windowwidth < 768){
			mobile = true;
			freewall_vertical();
		} else if (mobile == true && $windowwidth >=768 ){
			mobile = false;
			freewall_horizontal();
		}
	}).resize();

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

        // Swipe
        $(".modal").on("swipeleft",function(){
        	$(this).closest('.modal').modal('hide');
    		var category = $('.filter-label.active').text().toLowerCase();
    		var categoryclass = "."+category;
    		$(this).closest('.modal').nextAll(categoryclass).first().next().modal('show');
        });
    });

     /*----------------- 
		Modal
	-----------------*/
    $('.modal').on('show.bs.modal', function() {
	  var modal = this;
	  var hash = modal.id;
	  window.location.hash = hash;
	  window.onhashchange = function() {
	    if (!location.hash){
	      $(modal).modal('hide');
	    }
	  }
	});

	$('.modal').on('hide', function() {
	  var hash = this.id;
	  history.pushState('', document.title, window.location.pathname);
	});


    /*----------------- 
		Next / Previous
	-----------------*/
	/* Navigation - Next / Previous */
	$(document).on("click", ".next", function(event){
		$(this).closest('.modal').modal('hide');
    	var category = $('.filter-label.active').text().toLowerCase();
    	var categoryclass = "."+category;
    	console.log(categoryclass);

    	$(this).closest('.modal').nextAll("div.modal"+categoryclass+":first").modal('show');
	});

	$(document).on("click", ".previous", function(event){
    	var category = $('.filter-label.active').text().toLowerCase();
    	console.log(category);
    	var categoryclass = "."+category;
    	$(this).closest('.modal').prevAll("div.modal"+categoryclass+":first").modal('show');
    	$(this).closest('.modal').modal('hide');
	});







	

	

