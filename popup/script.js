$(document).ready(function(){
    var current = parseInt($.cookie('satire_edition'), 10);
    console.log('==================logging==================');
    console.log('before', current);
    if (!current) {
        current = 0;
    }

    if ($.cookie('satire_edition') == '2') {
        show();
        $.cookie('satire_edition', 3, { expires: 1 });
        return;
    }

    if ($.cookie('satire_edition') == '1') {
        $.cookie('satire_edition', 2, { expires: 1 });
        return;
    }

    if (!$.cookie('satire_edition')) {
        show();
        $.cookie('satire_edition', 1, { expires: 1 });
        return;
    }

    console.log('after', $.cookie('satire_edition'));

    function show() {
        $.get('http://ubyssey.ca/wp-content/themes/ubyssey2012/popup/content.html', function(data) {
            var height = $(document).height();
            $('.satire-overlay').css('height', height);
            $('.satire-overlay').html(data).show();
        });
    }
});
