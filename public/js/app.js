// Flashy nice messages
$('div.flash_message.alert').not('alert-important').delay(3000).slideUp(300);

// Submit buttons... actually submit stuff
$('.modal').find('.submit-button').click(function() {
    var $form = $(this).closest('form');

    $form.submit();
});
$('.dropdown').find('.submit-button').click(function() {
    var $form = $(this).closest('form');

    $form.submit();
});

function ajax_flash_message(type, message) {
    var $box = $('#ajax_flash_message');
    $box.addClass(type);

    $box.slideDown().delay(3000).slideUp(300, function() {
        $(this).removeClass(type);
    });
    $box.html(message);
}
