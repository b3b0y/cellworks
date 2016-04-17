//Start of Login
window.bjQuery = window.jQuery


$(document).ready(function() {
    $(".button,").mouseenter(function() {
		$(".popup").fadeIn(500);
		
		$(".popup").mouseleave(function() {
			$(".popup").fadeOut(500);
		});
    });
});

//End of Login

$(document).ready(function() {
    $(".sett").mouseenter(function() {
		$("body").append();
		$(".dropset").fadeIn();
		
		$(".dropset").mouseleave(function() {
			$(".dropset").fadeOut();
		});
    });
});



