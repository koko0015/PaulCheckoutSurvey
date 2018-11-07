/**
 * JS Files to get the value from checkout form
 */

$(document).ready(function() {
    $('#CheckoutSurveyAnswer').change(function(){

        url = $('#CheckoutSurveyAnswer').attr('data-ajaxUrl');

        var answer = $(this).find("option:selected").attr('value');

        $.post( url, { answer: answer }, function( data ) {
            $.loadingIndicator.close();
        });
    });
});

$("#confirm--form").validate({
    focusInvalid: false,
    invalidHandler: function(form, validator) {

        if (!validator.numberOfInvalids())
            return;

        $('html, body').animate({
            scrollTop: $(validator.errorList[0].element).offset().top
        }, 1000);

    }
});