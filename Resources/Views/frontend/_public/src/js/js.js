/**
 * JS Files to get the value from checkout form
 */


/*$( "select" )
    .change(function () {
        var str = "";
        $( "select option:selected" ).each(function() {
            //str += $( this ).text() + " ";
            str = $( this ).text();
        });

        url = $('#CheckoutSurveyAnswer').attr('data-ajaxUrl');

        $.post( url, { answer: str }, function( data ) {
            $.loadingIndicator.close();
        });
    })
    .change();*/


$(document).ready(function() {
    $('#CheckoutSurveyAnswer').change(function(){

        url = $('#CheckoutSurveyAnswer').attr('data-ajaxUrl');

        var answer = $(this).find("option:selected").attr('value');

        $.post( url, { answer: answer }, function( data ) {
            $.loadingIndicator.close();
        });
    });
});