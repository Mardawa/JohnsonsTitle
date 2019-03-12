$(document).ready(function () {


	var ogText ="";
	var ogTitle ="";
	var ogStar ="";

	$("button.editReview").click(function () {
		var toEditText = "#rText" + $(this).val(); // Review Text
		var r = "#r" + $(this).val(); // Review Container 
		var toEditTitle = "#rTitle" + $(this).val(); // Review Title
		var toEditStar = "#rStar" + $(this).val(); // Review Star 

		ogText = $(toEditText).text();
		ogTitle = $(toEditTitle).text();

		$(toEditText).attr("contenteditable", "true");
		$(toEditTitle).attr("contenteditable", "true");
		$(r).toggleClass("bg-light");

		var toToggle = "#btn2" + $(this).val();
		$(toToggle).toggle();
		$(this).toggle();
	});

	$("button.cancelReview").click(function () {
		var toToggle = "#btnEdit" + $(this).val();
		$(toToggle).toggle();

		var toToggle2 = "#btn2" + $(this).val();
		$(toToggle2).toggle();

		var toEditText = "#rText" + $(this).val();
		var toEditTitle = "#rTitle" + $(this).val();
		var r = "#r" + $(this).val();

		$(toEditText).attr("contenteditable", "false");
		$(toEditTitle).attr("contenteditable", "false");
		$(r).toggleClass("bg-light");

		$(toEditText).text(ogText);
		$(toEditTitle).text(ogTitle);
	});


});