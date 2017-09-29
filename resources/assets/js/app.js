require('./vendors/vendors');
require('jquery');

$(function() {
  $('body').on('click', '.notifications__container--close', function(e) {
    $('.notifications__container').fadeOut();
  });
});
