// Language switcher functionality
jQuery(document).ready(function($) {
    // Handle nice-select option click
    $('.language .nice-select .option').on('click', function() {
        var lang = $(this).data('value');
        if(lang) {
            window.location.href = updateQueryStringParameter(window.location.href, 'lang', lang);
        }
    });

    // Handle regular select change
    $('.language-select').on('change', function() {
        var lang = $(this).val();
        if(lang) {
            window.location.href = updateQueryStringParameter(window.location.href, 'lang', lang);
        }
    });

    // Helper function to update URL parameters
    function updateQueryStringParameter(uri, key, value) {
        var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
        var separator = uri.indexOf('?') !== -1 ? "&" : "?";
        if (uri.match(re)) {
            return uri.replace(re, '$1' + key + "=" + value + '$2');
        }
        else {
            return uri + separator + key + "=" + value;
        }
    }
}); 