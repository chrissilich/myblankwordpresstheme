

jQuery(document).ready(function(){
	var $ = jQuery;
	$(".collapsible").each(function() {
		$(this).find("h1, h2, h3, h4, h5, h6").first().on("click", function() {
			$(this).parent().siblings().removeClass("show");
			$(this).parent().toggleClass("show");
		})
	})
});