//$(document).ready(function() {
    $(function () {
        var electionDay = new Date();
        electionDay = new Date(2014, 1 - 1, 26);
        $('.countdown').countdown({
            until: electionDay,
            labels: [
                'years',
                'months',
                'weeks',
                'days',
                'hrs',
                'mins',
                'secs'
            ],
            labels1: [
                'year',
                'month',
                'week',
                'day',
                'hr',
                'min',
                'sec'
            ]
        });
    });
//});
