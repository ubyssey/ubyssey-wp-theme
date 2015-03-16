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
                React.createElement("div", {className: "up-next"}, 
                    React.createElement("span", {className: "label"}, "Current race"), React.createElement("br", null), 
                    React.createElement("div", {className: "race-block"}, 
                        React.createElement("div", {className: "name"}, React.createElement("h1", null, this.state.up_next.name)), 
                        React.createElement("div", {className: "results results-fade"}, React.createElement("h2", null,  this.state.up_next.completed ? this.state.up_next.results : "Results pending..."))
                    )
                )
            );
        }
    },
    render: function() {
        var completed = this.state.completed.map(function (race) {
            return (
                React.createElement("li", null, 
                    React.createElement("a", {href:  race.url}, 
                        React.createElement("div", {className: "race-block"}, 
                            React.createElement("div", {className: "name"}, React.createElement("h1", null, race.name)), 
                            React.createElement("div", {className: "results"}, React.createElement("h2", null, race.results))
                        )
                    )
                )
            );
        });
        var upcoming = this.state.upcoming.map(function (race) {
            return (
                React.createElement("li", null, 
                    React.createElement("a", {href:  race.url}, 
                        React.createElement("div", {className: "race-block upcoming"}, 
                            React.createElement("div", {className: "name"}, React.createElement("h1", null, race.name)), 
                            React.createElement("div", {className: "results"}, React.createElement("h2", null, "Results pending..."))
                        )
                    )
                )
            );
        });
        return (
            React.createElement("div", {className: "live-results"}, 
                React.createElement("div", {className: "results-header"}, 
                    React.createElement("h2", null, "AMS ELECTIONS RESULTS")
                ), 
                 this.renderUpNext(), 
                React.createElement("ul", {className: "results-completed"}, 
                    completed, 
                    upcoming
                )
            )
        )
    }
});

$(function(){
    React.render(
        React.createElement(ResultsFeed, null),
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