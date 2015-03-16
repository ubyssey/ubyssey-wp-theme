var ResultsFeed = React.createClass({displayName: "Gallery",
    getInitialState: function(){
        return {
            up_next: false,
            completed: [],
            upcoming: [],
        }
    },
    componentWillMount: function() {
        this.refresh();
        //this.timer = setInterval(this.refresh, 10000);
    },
    refresh: function() {
        $.getJSON( "http://ubyssey.ca/wp-content/themes/theme/custom/elections-results/results.php", function( data ) {
            this.setState(data);
        }.bind(this));
    },
    renderUpNext: function(){
        if ( this.state.up_next != false ){
            return (
                <div className='up-next'>
                    <span className='label'>Current race</span><br/>
                    <div className="race-block">
                        <div className="name"><h1>{this.state.up_next.name}</h1></div>
                        <div className="results results-fade"><h2>{ this.state.up_next.completed ? this.state.up_next.results : "Results pending..."}</h2></div>
                    </div>
                </div>
            );
        }
    },
    render: function() {
        var completed = this.state.completed.map(function (race) {
            return (
                <li>
                    <a href={ race.url }>
                        <div className="race-block">
                            <div className="name"><h1>{race.name}</h1></div>
                            <div className="results"><h2>{race.results}</h2></div>
                        </div>
                    </a>
                </li>
            );
        });
        var upcoming = this.state.upcoming.map(function (race) {
            return (
                <li>
                    <a href={ race.url }>
                        <div className="race-block upcoming">
                            <div className="name"><h1>{race.name}</h1></div>
                            <div className="results"><h2>Results pending...</h2></div>
                        </div>
                    </a>
                </li>
            );
        });
        return (
            <div className='live-results'>
                <div className='results-header'>
                    <h2>AMS ELECTIONS RESULTS</h2>
                </div>
                { this.renderUpNext() }
                <ul className='results-completed'>
                    {completed}
                    {upcoming}
                </ul>
            </div>
        )
    }
});

$(function(){
    React.render(
        <ResultsFeed />,
        document.getElementById('results-feed')
    );

    // $('.results-fade').bind('fade-cycle', function() {
    //     $(this).fadeTo('slow', 0.1, function() {
    //         $(this).fadeTo('slow', 1, function() {
    //             $(this).trigger('fade-cycle');
    //         });
    //     });
    // });

    // $('.results-fade').each(function(index, elem) {
    //     setTimeout(function() {
    //         $(elem).trigger('fade-cycle');
    //     }, index * 250);
    // });
 
});