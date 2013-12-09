$(document).ready(function(){
    var current = parseInt($.cookie('satire_edition'), 10);
    if (!current) {
        current = 0;
    }

    //console.log('satire cookie before', current);
    var next = show(current);
    $.cookie('satire_edition', next, { expires: 1 });
    //console.log('satire cookie after', $.cookie('satire_edition'));

    function show(num) {
        if (num === 0) {
            $.get('http://ubyssey.ca/wp-content/themes/ubyssey2012/popup/content.html', function(data) {
                var height = $(document).height();
                $('.satire-overlay').css('height', height);
                $('.satire-overlay').html(data).show();
            });
        }
        return num + 1;
    }
});
