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

// Prevent specific inputs to submit forms on enter
$(document).ready(function() {
    $('input.disabled-enter').keydown(function(event){
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });
});

function ajax_flash_message(type, message) {
    var $box = $('#ajax_flash_message');
    $box.addClass(type);

    $box.slideDown().delay(3000).slideUp(300, function() {
        $(this).removeClass(type);
    });
    $box.html(message);
}
