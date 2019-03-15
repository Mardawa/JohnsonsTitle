$(document).ready(function () {

  $("button.deleteTitle").click(function () {
    $.post("/view/backend/ajax-request/title/delete_title_ajax.php",
      {
        id: $(this).val()
      },
      function (data, status) {
        location.reload();
      })
  });

  var ogText = "";

  $("button.editTitle").click(function () {
    var toEdit = "#title" + $(this).val();
    ogText = $(toEdit).text();
    $(toEdit).attr("contenteditable", "true");
    $(toEdit).toggleClass("table-active");
    var buttonToChange = "#td" + $(this).val();
    var toToggle = "#btn2" + $(this).val();
    $(toToggle).toggle();
    $(this).toggle();
  });

  $("button.cancelTitle").click(function () {
    var toToggle = "#btnEdit" + $(this).val();
    $(toToggle).toggle();
    var toToggle2 = "#btn2" + $(this).val();
    $(toToggle2).toggle();
    var toEdit = "#title" + $(this).val();
    $(toEdit).attr("contenteditable", "false");
    $(toEdit).toggleClass("table-active");
    $(toEdit).text(ogText);
  });

  $("button.confirmTitle").click(function () {
    var toToggle = "#btnEdit" + $(this).val();
    $(toToggle).toggle();
    var toToggle2 = "#btn2" + $(this).val();
    $(toToggle2).toggle();
    var toEdit = "#title" + $(this).val();
    $(toEdit).attr("contenteditable", "false");
    $(toEdit).toggleClass("table-active");
  });

  $("button.confirmTitle").click(function () {
    var toEdit = "#title" + $(this).val();
    $.post("/view/backend/ajax-request/title/edit_title_ajax.php",
      {
        id: $(this).val(),
        newTitle: $(toEdit).text(),
      },
      function (data, status) {
        alert(data + "  " + status);
      })
  });

});