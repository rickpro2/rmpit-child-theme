jQuery(document).ready(function ($) {
    $('#rmpit-checklist-form input[type="checkbox"]').on('change', function () {
        var label = $(this).closest('label');
        if ($(this).is(':checked')) {
            label.css({
                'text-decoration': 'line-through',
                'color': 'gray'
            });
        } else {
            label.css({
                'text-decoration': 'none',
                'color': 'inherit'
            });
        }
    });
});
