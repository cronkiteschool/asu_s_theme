(function( $ ) {
  
// Dropdown toggle
$('#site-navigation > #primary-menu > .menu-item-has-children > a').click(function(){
  $(this).next('.sub-menu').toggle();
});

$(document).click(function(e) {
  var target = e.target;
  if (!$(target).is('a') && !$(target).parents().is('.menu-item-has-children')) {
    $('.sub-menu').hide();
  }
});

})( jQuery );
