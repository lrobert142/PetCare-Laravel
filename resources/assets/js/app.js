require('./vendors/vendors');
require('jquery');

$(function() {
  $('body').on('click', '.notifications__container--close', function(e) {
    $('.notifications__container').fadeOut();
  });

  $('body').on('click', '.pet__card--delete input[type=submit]', function(e) {
    var shouldDelete = confirm("Are you sure you want to delete this pet?");
    if (!shouldDelete) {
      e.preventDefault();
    }
  });

  $('body').on('click', '.weighing--delete input[type=submit]', function(e) {
    var shouldDelete = confirm("Are you sure you want to delete this weighing record?");
    if (!shouldDelete) {
      e.preventDefault();
    }
  });
});
