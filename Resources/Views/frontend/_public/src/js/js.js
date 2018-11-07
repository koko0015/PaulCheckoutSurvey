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


$.plugin('gaInvalidCheckboxJump', {


    /**
     * Default settings for the plugin
     * @type {Object}
     */
    defaults: {
        /**
         * Class to add on invalid
         */
        errorClass: 'has--error'
    },

    /**
     * Initializes the plugin and sets up the necessary event listeners.
     */
    init: function () {
        var me = this;
        me.applyDataAttributes();
        me.$jumpLabel = $("label[for=" + me.$el[0].id + "]");
        me._on(me.$el, 'invalid', $.proxy(me.jumpToInvalid, me));
        me._on(me.$el, 'change', $.proxy(me.onElementChange, me));
    },

    jumpToInvalid: function () {
        var me = this;

        window.scroll(0, me.$el.offset().top - (window.innerHeight / 2));
        me.$jumpLabel.addClass(me.opts.errorClass);
    },
    onElementChange:function(){
        var me = this;
        me.$jumpLabel.removeClass(me.opts.errorClass);
    }
});

$('*[data-ga-invalid-jump="true"]').gaInvalidCheckboxJump();