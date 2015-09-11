$(function() {

  // Check All Action
  $("#checkAll").on("change", function() {
    $(".deleteFlag").prop("checked", this.checked);
  });

  // Check Action
  $(".deleteFlag, #checkAll").on("change", function() {
    // Change Style
    if($(this).prop("checked"))
      $(this).attr("checked", "");
    else
      $(this).removeAttr("checked");

    // Show Delete Navigation
    var delay = 100;
    if($(".deleteFlag:checked").length)
      $("#deleteNav").animate({"opacity": "1"}, delay);
    else
      $("#deleteNav").animate({"opacity": "0"}, delay);
  });

  // Click Delete Button Action
  $("#deleteNav a").on("click", function() {
    var deleteList = {"deleteFlag": {}};
    $(".deleteFlag:checked").each(function($index) {
      deleteList["deleteFlag"][$index] = $(this).attr("value");
    });

    var currentLocation = location.pathname.replace("/StockManager/", "");
    if(confirm("本当に削除してもよろしいですか？")) {
      $.ajax({
        type: "POST",
        url: currentLocation + "/delete",
        data: deleteList,
        datatype: "jsonp"
      })
        .done(function() {
          location.reload();
        });
    }
  });

}());
