(function($, window){
	$(document).ready(function(){
		var windowWidth = $(window).width();
		$("#main-menu .navbar-nav li .caret-wrapper").on("click", function(e){
			if( windowWidth < 992 ){
				$(this).parent().toggleClass("open");
			}
		});
		$(window).resize(function(){
			windowWidth = $(window).width();
			if(windowWidth > 992 ){
				$("#main-menu .navbar-nav>li").removeClass("open");
			}
		});
		// Search Bar Animation for Mobile
		$('#buttonsearch').click(function(){
			$('#formsearch').slideToggle( "fast",function(){
				$( '#content' ).toggleClass( "moremargin" );
			} );
			$('#searchbox').focus()
			$('.openclosesearch').toggle();
		});
		// Country List Top Bar Modal
		$('#myCountryListModal').appendTo("body");
		$('#myCountryListModalMobile').appendTo("body");
		// Product Page Radio Button Toggle Show/Hide Market Related Product
		$('.products_searchForm input[type="radio"]').click(function() {
			var inputValue = $(this).attr("value");
			var targetBox = $("." + inputValue);
			$(".products-grouping").not(targetBox).hide();
			$(targetBox).show();
			// alert("Radio button " + inputValue + " is selected");
		});
		// Input Radio Button when selected adds checked attribute to target for CSS
		$("input[type='radio']").click(function(){
			$("input[type='radio']").removeAttr("checked");
			$(this).attr({"checked":true}).prop({"checked":true});
		});
	});
	// Fixed Footer Icon Rise to Top
	$(document).ready(function(){
		$(document).on("click", ".scrollLink", function (n) {
			n.preventDefault(),
			$("html, body").animate({
				scrollTop: $("#call-to-action").offset().top
			}, 2e3);
		});
	});
	$(document).ready(function(){
		$('#myCarousel').carousel({
			interval: 5000
		});
	});
	// JS Dialog Box Pop-Up for Locations, Products, TopBar Global Link, and markets
	$(document).ready(function(){
		jQuery.noConflict();
		var elems = document.getElementsByClassName('confirmation');
		var siteTitle = $("meta[property='og:site_name']").attr("content");

		var confirmIt = function (e) {
			if (!confirm(' You are now leaving the ' +  siteTitle +  ' website. The following pages are developed and managed by The SNF Group, the global parent company of '  +  siteTitle + ' Products, services, and information provided by The SNF Group may not be relevant or available for ' +  siteTitle + '. Please contact your regional subsidiary for specific availability.')) e.preventDefault();
		};
		for (var i = 0, l = elems.length; i < l; i++) {
			elems[i].addEventListener('click', confirmIt, false);
		}
	});

})(jQuery, window);