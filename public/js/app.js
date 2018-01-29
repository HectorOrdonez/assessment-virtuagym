// Flashy nice messages
$('div.flash_message.alert').not('alert-important').delay(3000).slideUp(300);

// Submit buttons... actually submit stuff
$('.modal').find('.submit-button').click(function() {
    var $form = $(this).closest('form');

    $form.submit();
});
