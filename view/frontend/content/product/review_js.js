$(document).ready(function () {

	var ogText = "";
	var ogTitle = "";
	var ogStar = "";
	var status = true;
	var reviewID = -1;
	var nbStar = -1;

	$("button.editReview").click(function () {
		if (status) {
			reviewID = $(this).val();
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
			}, function (data) {
				numberStar = data;
				numberStar = 1 * numberStar;
				nbStar = numberStar;
				//alert(numberStar);
				$(toEditStar).html(generateStarButton(numberStar));
			})

			status = false;
		}
	});

	$("button.cancelReview").click(function () {
		var toToggle = "#btnEdit" + $(this).val();
		$(toToggle).toggle();

		var toToggle2 = "#btn2" + $(this).val();
		$(toToggle2).toggle();

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

		var toEditText = "#rText" + $(this).val();
		var toEditTitle = "#rTitle" + $(this).val();
		var r = "#r" + $(this).val();

		$(toEditText).attr("contenteditable", "false");
		$(toEditTitle).attr("contenteditable", "false");
		$(r).toggleClass("bg-light");
		status = true;
	});

	$("button.confirmReview").click(function () {
		
		var toEditText = "#rText" + $(this).val();
		var toEditTitle = "#rTitle" + $(this).val();
		var toEditStar = "#rStar" + reviewID;
		$(toEditStar).html(generateStar(nbStar));
		$.post("/view/frontend/content/product/edit_review_ajax.php", {
			id: $(this).val(),
			newText: $(toEditText).text(),
			newTitle: $(toEditTitle).text(),
			star: nbStar
		}
			// ,function (data, status) {
			// alert(data + "status : " + status);
			// }
		)

		status = true;
	});

	$("span").on("click","button",function(){
		//alert("span-button");
		nbStar = $(this).val()*1;
		var toEditStar = "#rStar" + reviewID;
		$(toEditStar).html(generateStarButton(nbStar));

	});

});

function generateStarButton(s) {
	var star1 = "<div id=\"starButton\" class=\"btn-group\">";

	for (var i = 1; i <= s; i++) {
		star1 += "<button value="+i+" class=\"btn\" style=\"background-color:transparent\" > <i class=\"material-icons\">star</i> </button>";
	}

	for (var i = s + 1; i <= 5; i++) {
		star1 += "<button value="+i+" class=\"btn\" style=\"background-color:transparent\" > <i class=\"material-icons\">star_border</i> </button>";
	}

	star1 += "</div>";
	return star1;
}

function generateStar(s){
	var star1 = "<span>";
	for (var i = 1; i <= s; i++) {
		star1 += "<i class=\"material-icons\">star</i>";
	}

	for (var i = s + 1; i <= 5; i++) {
		star1 += "<i class=\"material-icons\"> star_border</i>";
	}
	star1 += "</span>";
	return star1;
}