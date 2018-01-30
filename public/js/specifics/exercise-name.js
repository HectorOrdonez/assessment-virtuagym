$('.exercise-name-switcher').click(function() {
    console.log('switching!');
    var $textContainer = $(this).closest('.exercise-text-container');
    var $inputContainer = $textContainer.parent().find('.exercise-input-container');

    $textContainer.hide();
    $inputContainer.show();
});

$('.exercise-name-submitter').click(function(event) {
    var $inputContainer = $(this).closest('.exercise-input-container');
    var $textContainer = $inputContainer.parent().find('.exercise-text-container');

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

            ajax_flash_message('alert-success', 'Exercise successfully changed');
        },
        error: function () {
            $inputContainer.hide();
            $textContainer.show();
            ajax_flash_message('alert-danger', 'Fatal error');
        }
    });

    event.preventDefault();
});
