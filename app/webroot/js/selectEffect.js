$(function() {
  $("select").hover(
    function() {
      $(this).parents("div.select").addClass("light-arror");
    },
    function() {
      $(this).parents("div.select").removeClass("light-arror");
    });
}());
