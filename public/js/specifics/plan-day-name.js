/**
 * This script allows
 * - all plan days's name to be switched from regular text to input
 * - the resulting forms to be submitted asynchronously
 * - in case of success it replaces the previous name with the new one
 */

// When clicking the switcher we need to hide the regular text and show the input
$('.day-name-switcher').click(function() {
    //var $previousTextField = $(this).parent().parent().find('.regular-text');
    var $textContainer = $(this).closest('.text-container');
    var $inputContainer = $textContainer.parent().find('.input-container');

    $textContainer.hide();
    $inputContainer.show();
});

$('.plan-day-name-submitter').click(function(event) {
    var $inputContainer = $(this).closest('.input-container');
    var $textContainer = $inputContainer.parent().find('.text-container');

    $textContainer.show();
    $inputContainer.hide();

    var $form = $inputContainer.find('form');
    var url = $form.attr('action');
    var newName = $inputContainer.find(".form-control").val();

    $.ajax({
        type: "POST",
        url: url,
        data: $form.serialize(), // serializes the form's elements.
        success: function()
        {
            $inputContainer.hide();
            $textContainer.show();

            $textContainer.find('.regular-text').html(newName);

            ajax_flash_message('alert-success', 'Day name successfully changed');
        },
        error: function () {
            $inputContainer.hide();
            $textContainer.show();
            ajax_flash_message('alert-danger', 'Fatal error');
        }
    });

    event.preventDefault();
});
