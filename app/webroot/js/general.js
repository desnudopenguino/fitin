// autofocus on first visible field in modal
$('.modal').on('shown.bs.modal', function () {
  lastfocus = $(this);
  $(this).find('input[type!=hidden]:first').focus();
})
