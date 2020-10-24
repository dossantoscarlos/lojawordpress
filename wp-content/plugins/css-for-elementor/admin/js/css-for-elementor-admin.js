;
(function($) {
    'use strict';

    /**
     * All of the code for your admin-facing JavaScript source
     * should reside in this file.
     *
     * Note: It has been assumed you will write jQuery code here, so the
     * $ function reference has been prepared for usage within the scope
     * of this function.
     *
     * This enables you to define handlers, for when the DOM is ready:
     *
     * $(function() {
     *
     * });
     *
     * When the window is loaded:
     *
     * $( window ).load(function() {
     *
     * });
     *
     * ...and/or other possibilities.
     *
     * Ideally, it is not considered best practise to attach more than a
     * single DOM-ready or window-load handler for a particular page.
     * Although scripts in the WordPress core, Plugins and Themes may be
     * practising this, we should strive to set a better example in our own work.
     */


    $(document).ready(function($) {
        $('.cssfe-color-picker').each(function() {
            $(this).wpColorPicker();
        });
    });

    $(function() {
        $('#copy, input.cssef-css-class').click(function() {
            $('input.cssef-css-class').focus();
            $('input.cssef-css-class').select();
            document.execCommand('copy');
            $(".copied").text("Copied").show().fadeOut(4000);
        });
    })


    $(document).on('click', '#reviewAlreadyDid, #neverShowAgain', function(e) {
        e.preventDefault();
        var id = 'cssfe_install_time';

        var data = {
            'action': 'review_already_did',
            'id': id
        };
        // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
        jQuery.post(ajax_object.ajax_url, data, function(response) {
            $('.cssfe-review').fadeOut(1000);
        })

    });

    $(document).on('click', '#maybeLater, .cssfe-review .notice-dismiss', function(e) {
        e.preventDefault();
        var id = 'cssfe_install_time';

        var data = {
            'action': 'maybe_later_will_review',
            'id': id
        };
        // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
        jQuery.post(ajax_object.ajax_url, data, function(response) {
            $('.cssfe-review').fadeOut(1000);
        })

    });


    $('document').ready(function() {
        $('[data-toggle=tooltip]').tooltip();
    });

    (function(wp) {
        var MyCustomButton = function(props) {
            return wp.element.createElement(
                wp.editor.RichTextToolbarButton, {
                    icon: 'editor-code',
                    title: 'Sample output',
                    onClick: function() {
                        console.log('toggle format');
                    },
                }
            );
        }
        wp.richText.registerFormatType(
            'my-custom-format/sample-output', {
                title: 'Sample output',
                tagName: 'samp',
                className: null,
                edit: MyCustomButton,
            }
        );
    })(window.wp);

})(jQuery);