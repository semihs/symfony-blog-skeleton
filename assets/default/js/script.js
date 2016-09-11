/**
 * Created by Noc.
 * User: semihs
 * Date: 23.12.2015
 * Time: 10:37
 */

$(document).ready(function () {
    var colors = {
        'default': 'Default',
        'red': 'Red',
        'blue': 'Blue',
        'green': 'Green',
        'orange': 'Orange',
        'yellow': 'Yellow',
        'brown': 'Brown',
        'cyan': 'Cyan',
        'deep_orange': 'Dark Orange',
        'indigo': 'Indigo',
        'light_blue': 'Light Blue',
        'pink': 'Pink',
        'purple': 'Purple',
        'teal': 'Teal'
    };

    var container = $('<div class="p-a-1" style="z-index:9999;position:fixed;top:5rem;width:250px;right: 20px;"></div>');
    var select = $('<select id="style_switcher" class="mdb-select colorful-select dropdown-primary"></select>');
    var styleContainer = $('#style-container');
    select.on('change', function () {
        var theme = $(this).val();
        styleContainer.data('color', theme).attr('href', '/assets/' + styleContainer.data('theme-path') + '/css/' + theme + '.css')
    });
    container.append(select);
    $('body').append(container);
    $.each(colors, function (key) {
        $('<option>').val(key).text(colors[key]).appendTo('#style_switcher');
    });
    select.val(styleContainer.data('color'));
});
