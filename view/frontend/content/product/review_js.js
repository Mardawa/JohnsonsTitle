$(document).ready(function () {


	var ogText = "";
	var ogTitle = "";
	var ogStar = "";
	var status = true;

	$("button.editReview").click(function () {
		if (status) {
			var toEditText = "#rText" + $(this).val(); // Review Text
			var r = "#r" + $(this).val(); // Review Container 
			var toEditTitle = "#rTitle" + $(this).val(); // Review Title
			var toEditStar = "#rStar" + $(this).val(); // Review Star 

			ogText = $(toEditText).text();
			ogTitle = $(toEditTitle).text();
			ogStar = $(toEditStar).html();

			$(toEditText).attr("contenteditable", "true");
			$(toEditTitle).attr("contenteditable", "true");
			$(r).toggleClass("bg-light");

			var toToggle = "#btn2" + $(this).val();
			$(toToggle).toggle();
			var starChange = "#starChange" + $(this).val();
			$(starChange).toggle();
			$(this).toggle();
		} else {
			alert("You can only edit 1 review at a time (suggestion gray out the other edit button ?)");
		}
	});

	$("button.editReview").click(function () {
		if (status) {
			var toEditStar = "#rStar" + $(this).val(); // Review Star 
			var numberStar = 0;
			$.post("/view/frontend/content/product/getReviewById.php", {
				id: $(this).val()
			}, function (data, status) {
				numberStar = data;
				numberStar = 1 * numberStar;
				//alert(numberStar);
				$(toEditStar).html(generateStar(numberStar));
			})
			status = false;
		}
	});

	$("button.cancelReview").click(function () {
		var toToggle = "#btnEdit" + $(this).val();
		$(toToggle).toggle();

		var toToggle2 = "#btn2" + $(this).val();
		$(toToggle2).toggle();

		var starChange = "#starChange" + $(this).val();
		$(starChange).toggle();

		var toEditText = "#rText" + $(this).val();
		var toEditTitle = "#rTitle" + $(this).val();
		var toEditStar = "#rStar" + $(this).val();
		var r = "#r" + $(this).val();

		$(toEditText).attr("contenteditable", "false");
		$(toEditTitle).attr("contenteditable", "false");
		$(r).toggleClass("bg-light");

		$(toEditText).text(ogText);
		$(toEditTitle).text(ogTitle);
		$(toEditStar).html(ogStar);

		status = true;
	});

	$("button.confirmReview").click(function () {
		var toToggle = "#btnEdit" + $(this).val();
		$(toToggle).toggle();

		var toToggle2 = "#btn2" + $(this).val();
		$(toToggle2).toggle();

		var starChange = "#starChange" + $(this).val();
		$(starChange).toggle();

		var toEditText = "#rText" + $(this).val();
		var toEditTitle = "#rTitle" + $(this).val();
		var r = "#r" + $(this).val();

		$(toEditText).attr("contenteditable", "false");
		$(toEditTitle).attr("contenteditable", "false");
		$(r).toggleClass("bg-light");
	});

	var newStarRating = 5;

	$("button.confirmReview").click(function () {
		var toEditText = "#rText" + $(this).val();
		var toEditTitle = "#rTitle" + $(this).val();

		var toEditStar = "#rStar" + $(this).val();
		newStarRating = 1 * newStarRating;
		//alert(newStarRating);
		$(toEditStar).html(generateStar(newStarRating));

		$.post("/view/frontend/content/product/edit_review_ajax.php", {
			id: $(this).val(),
			newText: $(toEditText).text(),
			newTitle: $(toEditTitle).text(),
			star: newStarRating
		}
			// ,function (data, status) {
			// alert(data + "status : " + status);
			// }
		)
		status = true;
	});

	$("select").change(function () {
		newStarRating = $(this).val();
		
	});



});

function generateStar(s) {
	var star1 = "<div class=\"btn-group\">";

	for (var i = 1; i <= s; i++) {
		star1 += "<i class=\"material-icons\">star</i>";
	}

	for (var i = s + 1; i <= 5; i++) {
		star1 += "<i class=\"material-icons\"> star_border</i>";
	}

	star1 += "</div>";
	return star1;
}