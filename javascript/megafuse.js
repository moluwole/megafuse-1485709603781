
/*
  This script is meant for Megafuse Official Website
 */

(function() {
  $(function() {
    $('.menu').click(function() {
      $('.sidebar-menu').css('width', '300px');
      return false;
    });
    return $('.close-all').click(function() {
      $('.sidebar-menu').css('width', '0px');
      return false;
    });
  });

}).call(this);
