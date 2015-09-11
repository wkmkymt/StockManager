$(function() {
  var oldIndex = 0;
  var currentIndex = oldIndex;
  var replaceFormat = ["Order", "[Order]["];
  var $formTmp = $(".itemForm").html();

  $("#addFormBtn").on("click", function() {
    var $newForm = $formTmp;
    currentIndex++;

    for(var i = 0; i < replaceFormat.length; i++)
      $newForm = $newForm.split(replaceFormat[i] + oldIndex).join(replaceFormat[i] + currentIndex);

    $("#itemArea").append($("<div>")
                          .addClass("itemForm")
                          .html($newForm));
  });
}());
