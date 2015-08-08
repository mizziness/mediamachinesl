$(document).ready(function(){
	$("a[href='#']").on("click", function(){
		return false;
	});
	
	$(".disabled").on("click", function(){
		return false;
	});
	
	$("body.demo #featured a").on("click", function(){
		return false;
	});
	
	if ( $("#home").length <= 0 ) {
		var step = 420;
		var columns = Math.ceil($("#carousel-inner .media-box").length / 3);
		var pages = Math.ceil(columns / 2);
		var startPage = 1;
		var currentPage = 1;
		var totalWidth = columns * step;
		$("#carousel-inner").width(totalWidth);
		fixButtons();
		
		$(".next.nav-button").on("click", function(){
			if ( !$(this).hasClass("disabled") ) {
				currentPage++;
				$("#carousel-inner").animate({
					left: "-=" + step * 2
				}, 1000);
				fixButtons();
			};
		});
		
		$(".previous.nav-button").on("click", function(){
			if ( !$(this).hasClass("disabled") ) {
				currentPage--;
				$("#carousel-inner").animate({
					left: "+=" + step * 2
				}, 1000);
			};
			fixButtons();
		});
	
	} else {
		var step = 840;
		var pages = Math.ceil($("#new-releases-inner .new-box").length / 5);
		var startPage = 1;
		var currentPage = 1;
		var totalWidth = pages * step;
		$("#new-releases-inner").width(totalWidth);
		fixButtons();
		
		$(".next.nav-button").on("click", function(){
			if ( !$(this).hasClass("disabled") ) {
				currentPage++;
				$("#new-releases-inner").animate({
					left: "-=" + step
				}, 1000);
				fixButtons();
			};
		});
		
		$(".previous.nav-button").on("click", function(){
			if ( !$(this).hasClass("disabled") ) {
				currentPage--;
				$("#new-releases-inner").animate({
					left: "+=" + step
				}, 1000);
			};
			fixButtons();
		});
		
		
	}
	
	function fixButtons(){
		if ( currentPage < 1 ) { currentPage = 1; };
		if ( currentPage > pages ) { currentPage = pages; };
			$(".previous.nav-button").add(".next.nav-button").addClass("disabled");
		if ( currentPage == 1 && pages == 1 ) {
			
		} else if ( currentPage == 1 ) {
			$(".previous.nav-button").addClass("disabled");
			$(".next.nav-button").removeClass("disabled");
		} else if ( currentPage == pages ) {
			$(".next.nav-button").addClass("disabled");
			$(".previous.nav-button").removeClass("disabled");
		} else {
			$(".previous.nav-button").add(".next.nav-button").removeClass("disabled");
		};		
	};
	
	// Adult
	
	$("a#rtCategories").on("click", function(){
		$(".modal").fadeOut("slow");
		$("#adult-categories.modal").fadeIn("slow");
	});
	
	$("a#rtTags").on("click", function(){
		$(".modal").fadeOut("slow");
		$("#adult-tags.modal").fadeIn("slow");
	});
	
	$("a#rtStars").on("click", function(){
		$(".modal").fadeOut("slow");
		$("#adult-stars.modal").fadeIn("slow");
	});
	
	$("a.modal-close").on("click", function(){
		$(this).parents(".modal").fadeOut("slow");
	});
	
	// YouTube
	$("a#ytCategories").on("click", function(){
		$(".modal").fadeOut("slow");
		$("#youtube-categories.modal").fadeIn("slow");
	});
	$("a#ytChannels").on("click", function(){
		$(".modal").fadeOut("slow");
		$("#youtube-channels.modal").fadeIn("slow");
	});
	
	$("#youtube .search form").on("submit", function(e){
		e.preventDefault();
		var query = $(this).find(".yt-search").val();
		var href = $(this).attr("action") + "/" + query;
		window.location.href = href;
	});

});