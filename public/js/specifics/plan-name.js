/**
 * This script allows
 * - the plan name to be switched from regular text to input
 * - the resulting form to be submitted asynchronously
 * - in case of success it replaces the previous name with the new one
 */
var $planNameForm = $('#plan-name-form');
var $planTitle = $('#plan-title');
var previousTitle = $('#plan-name-input').val();

$('#button-plan-name-switcher').click(function() {
    $planNameForm.slideDown();
    $planTitle.slideUp();
});

$('#plan-name-form-submitter').click(function (event) {
    var url = $('#plan-name-form').attr('action');
    var $form = $('#plan-name-form');
    var newTitle = $('#plan-name-input').val();

    $.ajax({
        type: "POST",
        url: url,
        data: $form.serialize(), // serializes the form's elements.
        success: function()
        {
            $planNameForm.slideUp();
            $planTitle.slideDown();

            $planTitle.text($planTitle.text().replace(previousTitle, newTitle));

            ajax_flash_message('alert-success', 'Plan name successfully changed');
        },
        error: function () {
            $planNameForm.hide();
            $planTitle.show();
            ajax_flash_message('alert-danger', 'Fatal error');
        }
    });

    event.preventDefault();
});
