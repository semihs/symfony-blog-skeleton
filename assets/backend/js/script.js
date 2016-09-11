/**
 * Created by Noc.
 * User: semihs
 * Date: 23.12.2015
 * Time: 10:37
 */

$(document).ready(function() {
    var slug;
    $('.slug-generator').keyup(function () {
        var value = $(this).val();
        var targetSlug = $(this).data('slug-target');
        slug = getSlug(value, {
            "lang": "tr"
        });
        $(targetSlug).val(slug);
    });

});
