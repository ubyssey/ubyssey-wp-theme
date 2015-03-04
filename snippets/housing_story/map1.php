	<style>
		.map1 rect, .map1 polygon, .map1 path {
			fill: grey;
			stroke: grey;
			stroke-width: 1px;
			-webkit-transition: fill 0.5s; /* For Safari 3.1 to 6.0 */
	    	transition: fill 0.5s;
		}

		.map1 rect:hover, .map1 polygon:hover, .map1 path:hover {
			opacity: 0.75;
		}

		.map1 {
			height: 625px;
		}

		h2.diagram-title {
			font-family: "lft-etica";
			margin: 10px 0 15px 0;
			text-align: center;
		}

		p.diagram-description {
			width: 65%;
			line-height: 1.5em;
			text-align: center;
			color: #8C8A8A;
			margin: 0 auto;
			font-family: "lft-etica";
		}

		#map_1 {
			width: 750px;
			height: 525px;
		}

		.map-container {
			width: 985px;
			overflow: hidden;
			margin: 40px auto;
		}

		.map, .map-options {
			float: left;
		}

		.map-options {
			padding-top: 100px;
			padding-left: 20px;
			width: 215px;
		}

		.map-options ul {
		    list-style: none;
		    padding:0;
		    margin:0;
		}

		.map-options ul li {
			margin: 5px 0;
			line-height: 25px;
			font-family: "lft-etica";
		}

		.map-options ul li.active, .map-options ul li:hover {
			background: rgb(216, 216, 216);
		}

		.map-options ul li a {
			text-decoration: none;
			width: 100%;
			display: inline-block;
			padding: 10px;
			color: #222;
		}

		.map-options li span {
			vertical-align: middle;
		}

		.map-options li.population .block {
			background: rgb(240, 59, 32);
		}

		.map-options li.cost .block {
			background: #2c7fb8;
		}

		.map-options li.commute .block {
			background: #238443;
		}

		.map-options li.roommates .block {
			background: rgb(197, 27, 138);
		}

		.legend {
			text-align: center;
			display: none;
		}

		.legend .item {
			display: inline-block;
			margin-right: 25px;
			line-height: 25px;
			font-family: "lft-etica";
			color: #222;
		}

		.legend .item span {
			vertical-align: middle;
		}

		.legend .low .block {
			display: inline-block;
			margin-right: 5px;
			width: 25px;
			height: 25px;
			background: black;
			vertical-align: middle;
		}

		div.block {
			display: inline-block;
			margin-right: 5px;
			width: 25px;
			height: 25px;
			background: rgb(123, 123, 123);
			vertical-align: middle;
		}

		.commute-info {
			display: none;
			width: 600px;
			margin-left: auto;
			margin-right: auto;
			margin-top: -20px;
		}

		#commute-slider {
		}

		.slider-labels {
			padding: 10px 0;
			font-size: 14px;
			font-family: "lft-etica";
		}

		.slider-values {
			text-align: center;
			margin-bottom: 25px;
			font-size: 14px;
			font-family: "lft-etica";
		}

		.slider-left {
			float: left;
		}

		.slider-right {
			float: right;
		}

		.value-block {
			display: inline-block;
			margin-right: 30px;
		}

		.value-block .value {
			font-size: 28px;
		}

		#tooltip {
			position: absolute;
			z-index: 1000;
			line-height: 150%;
			background: white;
			padding: 5px 8px;
			border: solid 1px rgb(76, 76, 76);
			font-family: "lft-etica";
			font-size: 12px;
			display: none;
		}

		#map_2 {
			width: 750px;
			height: 570px;
		}
		.housing-map-data {
			width: 100%;
			height: 135px;
			font-family: 'lft-etica';
			margin: 0 auto;
		}
		.zone-data {
			text-align: center;
		}
		text {
			fill: rgb(97, 97, 97);
		}
		path {
			fill: rgb(202, 202, 202);
		}
		path.active, path.clickable.active:hover {
			fill: rgb(100, 100, 100);
			-webkit-transition: fill 0.35s; /* For Safari 3.1 to 6.0 */
	    	transition: fill 0.35s;
		}
		path.clickable:hover {
			fill: rgb(150, 150, 150);
			cursor: pointer;
		}

		.housing-map-data .value-block .desc {
			margin-bottom: 10px;
		}

		.housing-map-data .value-block .value {
			margin-bottom: 10px;
		}

		.housing-map-data .value-block {
			width: 115px;
		}

		.housing-map-data .value-block.labels {
			color: #8C8A8A;
			width: auto;
		}

		.zone-data {
			display: none;
		}

		.map-wrap {
			overflow-y: auto;
			overflow-x: hidden;
		}

		#schools-chart {
			margin: 25px 0;
			overflow-y: hidden;
			height: 332px;
		}

		#schools-chart .school {
			margin-right: 4px;
			display: inline-block;
			vertical-align: bottom;
			position: relative;
			overflow: show;
		}

		#schools-chart .bar {
			width: 50px;
			background: blue;
			padding-top: 10px;
			text-align: center;
			font-family: "lft-etica";
			font-size: 14px;
			color: white;
			-webkit-transition: height 0.5s; /* For Safari 3.1 to 6.0 */
	    	transition: height 0.5s;
		}

		#schools-chart .label-con {
			height: 100px;
			position: relative;
			top: 100px;
		}

		#schools-chart .label {
			position: absolute;
			right: -35px;
			transform: rotate(-65deg);
			-ms-transform:rotate(-65deg); /* IE 9 */
			  -moz-transform:rotate(-65deg); /* Firefox */
			  -webkit-transform:rotate(-65deg); /* Safari and Chrome */
			  -o-transform:rotate(-65deg); /* Opera */
			width: 200px;
			text-align: right;
			font-family: "lft-etica";
			font-size: 14px;
		}

		#schools-chart .label.inactive {
			opacity: 0.5;
		}

		.school-toggle {
			font-family: "lft-etica";
			text-decoration: none;
			padding: 15px 20px;
			margin: 0;
			color: #222;
			display: inline-block;
			border-style: solid;
			border-color: rgb(161, 161, 161);
			border-width: 1px 0 1px 1px;
		}

		.school-toggle:last-child {
			border-width: 1px 1px 1px 1px;
		}

		.school-toggle:hover, .school-toggle.active {
			background: rgb(228, 228, 228);
		}

		.school-controls {
			overflow: auto;
		}

		.school-controls .left {
			float: left;
		}

		.school-controls .right {
			float: right;
		}


	</style>

	<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.2/themes/ui-lightness/jquery-ui.css">
<div class="map-container" style="height: 800px;">
<h2 class="diagram-title">Where do students live?</h2>
<p class="diagram-description">This interactive heat map shows where students live, how much they pay in rent, their commute times and number of roommates. Click the coloured boxes to display the different data. Hover over the map for more information. For the commute time option, drag the slider to show data by time spent on the bus.</p>
<div class="map map1">
	<svg version="1.1" id="map_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
		 width="839px" height="525px" viewBox="0 0 839 525" enable-background="new 0 0 839 525" xml:space="preserve">
	<g>
		<path id="zone-v5j" d="M717.5,413.75v99.819c0.955,0.334,1.811,0.625,2.527,0.854C734.694,519.955,747.217,529.219,760,538h68l-0.001-124.25
			H717.5z"/>
		<path id="zone-v6r" d="M265,253.5v-62.574c-1.67-0.261-3.319-0.594-4.923-1.067c-5.033-1.485-10.451-0.694-15.308-4.741
			c-2.67-2.223-8.491-2.921-13.578-0.24c-4.196,2.211-9.682,2.66-14.585,2.619c-3.778-0.031-6.188-3.209-7.992-6.872
			c-1.135-2.306-3.87-3.964-6.158-5.512c-1.58-1.069-4.441-0.922-5.303-2.246c-2.293-3.52-5.278-2.25-7.967-1.733
			c-4.931,0.947-9.709,2.866-14.662,3.46c-3.264,0.392-6.844-0.433-10.05-1.45c-1.981-0.629-3.653-2.163-5.474-3.349V253.5H265z"/>
		<path id="zone-v6k" d="M337.5,253.5v-88.815c-1.073,2.242-2.059,4.454-3.212,6.572c-1.114,2.047-2.468,3.961-3.665,5.964
			c-4.22,7.059-6.383,7.659-13.686,3.748c-4.199-2.248-14.343-0.867-17.491,2.068c-2.868,2.673-6.167,4.822-9.469,6.358
			c-4.713,2.188-9.683,3.135-15.354,2.567c-3.197-0.32-6.45-0.54-9.623-1.036V253.5H337.5z"/>
		<path id="zone-v6j" d="M337.5,321H379V196.109c-7.008-3.145-2.144-14.633-3.626-19.682c-0.754-3.134-0.743-5.441-1.815-7.009
			c-1.666-2.436-4.181-4.27-6.134-6.533c-4.265-4.945-7.872-4.803-11.618,0.24c-2.296-1.169-4.521-2.302-7.11-3.622
			c-1.703,7.144-7.297,3.506-10.979,4.726c-0.074,0.153-0.144,0.304-0.217,0.456V253.5V321z"/>
		<polygon id="zone-v6l" points="337.5,253.5 265,253.5 265,321 309,321 337.5,321 	"/>
		<path id="zone-v6h" d="M414,321V208.5c-3.513-1.079-8.025-0.651-11.604,0.542c-6.37,2.123-7.997,1.905-11.305-5.019
			c3.283,0.272,6.327,0.524,9.371,0.775c0.291-0.457,0.583-0.914,0.874-1.371c-3.766-5.122-7.387-10.361-11.397-15.282
			c-1.006-1.233-3.387-2.164-4.904-1.902c-1.21,0.21-2.607,2.32-2.957,3.813c-0.502,2.143-0.128,4.492-0.128,6.795
			c-1.167-0.117-2.134-0.376-2.95-0.742V321H414z"/>
		<path id="zone-v6t" d="M159,253.5v-83.705c-0.395-0.257-0.794-0.504-1.208-0.715c-2.275-1.16-4.761-1.904-5.887-2.34
			c-4.847-1.164-8.426-1.972-11.973-2.901c-1.452-0.38-2.8-1.185-4.259-1.507c-2.412-0.533-3.845,0.024-4.094,3.055l-3.405,0.005
			c-2.43-0.98-4.694-1.353-6.239-2.61c-6.123-4.98-13.787-5.543-20.541-4.67c-5.855,0.757-11.661,1.067-16.562-0.909
			c-11.898-4.798-22.239,0.187-31.77,4.988c-7.652,3.854-13.811,11.05-19.941,17.428c-5.027,5.229-7.742,12.624-14.929,15.905
			c-0.65,0.297-1.23,1.132-1.487,1.846c-2.159,6.003-4.944,11.907-6.063,18.109l1.387,9.677c5.747,6.939,11.404,14.018,16.349,21.537
			c3.914,5.951,6.474,12.777,10.193,18.875c2.054,3.366,3.937,6.28,4.361,10.526c0.317,3.179,2.719,7.073,5.389,8.927
			c0.256,0.177,0.516,0.348,0.773,0.525L112,253.5H159z"/>
		<path id="zone-v6s" d="M145,330.5l64.5,23L210,321h55v-67.5H159h-47l-62.906,32.046c9.059,6.223,18.617,11.723,27.911,17.616
			c3.761,2.385,7.408,4.97,10.969,7.648c6.999,5.263,13.801,10.791,20.876,15.946c4.933,3.595,10.26,6.647,15.266,10.148
			c3.591,2.511,6.943,5.362,10.616,8.229l0,0.002h0L145,330.5z"/>
		<path id="zone-v6n" d="M309,321h-44h-55l-0.5,32.5l-64.5-23l-10.268,14.637l-0.001,0.001l-10.843,37.393c0,0,24.944,12.479,37.378,18.583
			c6.356,3.12,12.665,6.421,19.256,8.962c18.885,7.281,39.152,10.751,57.046,20.813c10.529,5.92,21.458,10.763,33.726,11.926
			c5.332,0.506,10.106,1.816,15.795,2.685c3.766,1.595,16.319,4.202,19.603,6.392c0.773,0.516,1.542,1.036,2.309,1.56V392V321z"/>
		<polygon id="zone-v6m" points="379,321 337.5,321 309,321 309,392 414,392 414,321 	"/>
		<path id="zone-v5z" d="M414,392h35.5V193.609c-5.152,2.148-10.351,8.998-11.604,13.867c-0.276,1.069-2.801,2.733-3.652,2.834
			c-1.204,0.142-4.79-0.634-5.251-1.55c-2.183-4.336-5.134-2.778-7.77-1.095c-2.294,1.465-3.757,2.012-6.834,0.944
			c-0.125-0.043-0.262-0.069-0.39-0.109V321V392z"/>
		<path id="zone-v6p" d="M449.5,392H414H309v61.45c9.759,6.659,18.949,13.998,25.505,24.293c2.554,4.009,6.026,8.586,10.146,10.235
			c12.823,5.132,24.081,12.19,33.728,22.008c7.978,8.119,24.559,9.654,33.961,3.209c6.25-4.285,15.784-10.818,21.905-15.279
			c2.715-2.18,10.678-6.533,15.255-8.007V399.5V392z"/>
		<path id="zone-v5x" d="M477,399.5h-27.5v90.409c1.021-0.329,1.877-0.518,2.465-0.504c6.916,0.165,13.786,1.791,20.708,2.133
			c4.388,0.215,6.065,0.682,10.502,0.818c4.187,0.128,10.961-0.039,14.877-0.988c18.281-4.436,36.212-10.404,54.117-16.263
			c1.993-0.652,3.933-1.081,5.831-1.303V399.5H477z"/>
		<path id="zone-v5y" d="M449.5,399.5H477v-68V261v-52.5v-18.851l-1.145-0.044c-4.075,0.285-8.211-0.391-12.278-0.056
			c-2.534,0.208-4.991,1.373-7.478,2.129c-1.381,0.42-2.725,1.15-4.128,1.276c-0.812,0.073-1.641,0.31-2.472,0.655V392V399.5z"/>
		<rect id="zone-v5w" x="477" y="331.5" width="81" height="68"/>
		<rect id="zone-v5v" x="477" y="261" width="81" height="70.5"/>
		<rect id="zone-v5t" x="477" y="208.5" width="81" height="52.5"/>
		<path id="zone-v6a" d="M558,208.5v-6.75v-90.542c-1.317-0.312-2.646-0.628-4.006-0.95v9.882c-1.877-7.799-1.877-7.799-5.152-7.292v8.311
			c-1.642-5.511-4.922-4.435-8.688-2.472c-0.082,1.491-0.172,3.121-0.258,4.683c-8.334,3.149-8.334,3.149-10.077,7.743v-14.768
			c-11.087-1.902-4.581,7.423-7.838,11.085c0-2.896-0.001-5.356,0-7.816c0.005-7.163-1.962-8.873-9.733-8.185
			c-0.129,1.338-0.265,2.733-0.422,4.355c-5.926-2.691-11.565-5.314-17.258-7.816c-4.785-2.103-6.521-1.079-6.482,3.952
			c0.03,3.883,0.434,7.763,0.594,10.395c-2.066,2.268-1.865,2.046-2.68,2.941c-2.115-0.682-5.655,0.39-7.633-0.168
			c-0.385-0.108-0.889-0.125-1.367-0.141v48.925v0.006c0.701,0.043,1.421,0.116,2.177,0.237v9.009
			c0.923,0.169,6.823,0.042,6.823,0.042V190l-9-0.351V208.5H558z"/>
		<path id="zone-downtown" d="M477,124.948c-0.684-0.022-1.312-0.043-1.444-0.325c-2.569-5.55-5.796-1.674-8.701-1.404
			c-1.462-0.931-3.666-2.096-4.472-1.467c-5.139,4.015-5.324,4.085-9.149-2.041c3.616-2.201,7.234-4.403,11.336-6.899
			c-5.362-1.771-10.11-1.849-12.226,2.789c-1.64,3.597-3.291,1.632-3.854,1.85c-1.073-2.387-1.432-4.292-2.565-5.415
			c-1.351-1.338-3.319-2.108-5.115-2.919c-0.916-0.414-2.446-0.899-3.001-0.463c-4.556,3.585-7.987,1.295-11.465-1.771
			c-1.304-1.15-2.896-1.971-4.357-2.942c0.002,0.507,0.004,1.015,0.006,1.522c-2.304,0.575-5.306,2.333-6.765,1.473
			c-2.886-1.699-7.279-2.634-6.994-7.872c0.064-1.186-2.987-3.253-4.868-3.644c-2.085-0.433-4.474,0.592-6.729,0.982
			c-0.105-0.34-1.923-2.966-2.028-3.306c-2.133-2.252-3.96-4.196-5.803-6.125c-0.873-0.914-2.686-2.235-2.501-2.627
			c0.813-1.718,1.901-3.976,3.44-4.544c3.708-1.369,7.724-1.901,12.396-2.945c1.402,1.535,3.578,3.919,5.97,6.537
			c1.963-2.329,3.333-4.485,5.218-6.006c1.251-1.01,3.268-1.533,4.879-1.414c0.659,0.049,1.492,2.33,1.642,3.663
			c0.268,2.382,0.075,4.817,0.075,7.142c6.11,0.959,8.423-2.793,10.952-6.299c1.19-1.65,2.316-4.023,3.959-4.55
			c6.796-2.183,6.83-7.13,6.244-12.204c-3.413,0.768-7.15,2.878-9.809,1.938c-5.447-1.927-10.304-5.515-15.43-8.371
			c-2.338-1.303-4.659-3.32-7.131-3.565c-5.298-0.525-8.062-3.402-10.655-7.668c-2.105-3.465-5.497-6.141-8.26-9.219
			c-1.438-1.601-3.508-3.122-3.988-5.012c-2.156-8.488-6.308-15.972-11.354-22.907c-1.845-2.535-5.57-5.949-7.814-5.54
			c-7.552,1.377-14.991,3.869-22.154,6.736c-7.647,3.061-8.78,13.32-16.818,16.35c-0.434,0.164-0.53,1.484-0.607,2.283
			c-0.399,4.13-0.643,8.278-1.132,12.397c-0.564,4.755,0.257,10.819-2.359,13.932c-4.524,5.383-3.592,10.362-2.87,16.087
			c0.516,4.104,2.524,5.585,6.278,4.895c3.562-0.655,5.348,0.956,6.914,3.947c1.166,2.222,2.874,5.121,4.926,5.72
			c4.347,1.271,4.207,4.288,5.453,7.601c2.131,5.658,4.719,12.344,9.263,15.568c4.963,3.52,9.804,5.82,9.774,13.438
			c0,4.747-0.936,10.955,0.396,13.96c3.385,7.647,7.58,14.986,12.006,22.104c2.785,4.479,8.577,13.373,12.796,18.601
			c3.3,2.441,9.219,9.123,12.395,11.737c2.964,2.439,5.64,5.912,9.046,6.949c3.911,1.191,8.485,0.219,12.772,0.153
			c1.233-0.019,2.52-0.425,3.688-0.191c5.704,1.141,8.105-1.261,7.004-7.43c2.584-0.397,5.233-1.379,7.735-1.087
			c9.798,1.142,17.201-4.516,24.167-9.487c3.964-2.829,7.378-4.031,11.688-3.764l0.003-0.006V124.948z"/>
		<path id="zone-v5l" d="M618.5,201.75V99.423c-1.548,0.884-3.247,1.832-5.379,2.908c-2.767,1.396-9.521,0.763-6.746,7.038
			c-0.932,0.883-1.834,1.736-2.73,2.585c-2.336,2.211-9.639,4.392-12.367,6.975c-0.304-3.386-0.446-4.982-0.593-6.618
			c-2.626-0.201-5.295,0.318-7.155-0.676c-7.011-3.745-7.076-3.852-7.762,3.788c-5.783-1.372-11.569-2.744-17.768-4.215v90.542H618.5
			z"/>
		<path id="zone-v5k" d="M717.5,201.75V92.732c-2.695,0.281-5.264,0.551-7.003,0.551c-9.41,2.686-18.681,5.212-27.847,8.062
			c-1.598,0.496-2.769,2.36-4.136,3.592c0.104,0.603,0.205,1.206,0.309,1.809c-4.005-1.451-8.563-2.145-11.859-4.561
			c-3.369-2.471-6.437-4.321-10.63-4.2c-1.447,0.042-3.407,0.233-4.272-0.571c-3.997-3.715-7.692-7.743-13.74-3.778
			c-0.055,0.036-0.283-0.151-0.404-0.263c-3.061-2.828-5.677-0.644-8.571,0.538c-4.83,1.972-7.481,3.59-10.846,5.512V201.75H717.5z"
			/>
		<path id="zone-v5c" d="M717.5,255.5h110.499L827.998,91c-1.111-0.597-2.157-1.456-3.343-1.741c-3.102-0.747-6.84-2.619-9.296-1.59
			c-8.778,3.677-17.418,7.772-24.884,14.034c-3.516,2.95-7.861,5.018-12.062,6.998c-1.648,0.778-4.716,1.088-5.779,0.12
			c-4.183-3.811-9.916-3.519-14.463-6.228c-3.111-1.852-6.496-3.436-9.96-4.452c-4.655-1.366-9.548-1.902-14.25-3.132
			c-2.197-0.573-4.114-2.563-6.284-2.813c-2.369-0.272-6.399,0.143-10.177,0.537V201.75V255.5z"/>
		<polygon id="zone-v5n" points="618.5,201.75 558,201.75 558,208.5 558,261 558,331.5 618.5,331.5 618.5,287 	"/>
		<path id="zone-v5p" d="M618.5,331.5H558v68v74.303c5.881-0.688,11.37,0.634,16.841,3.659c4.026,2.227,7.924,4.881,12.216,6.385
			c3.834,1.345,12.697,2.537,16.596,3.521c6.018,1.519,10.106,2.537,14.848,2.854V380.5V331.5z"/>
		<polygon id="zone-v5m" points="717.5,287 717.5,255.5 717.5,201.75 618.5,201.75 618.5,287 	"/>
		<polygon id="zone-v5r" points="717.5,287 618.5,287 618.5,331.5 618.5,380.5 717.5,380.5 717.5,345.5 	"/>
		<path id="zone-v5s" d="M717.5,380.5h-99v109.721c2.724,0.183,5.66,0.135,9.306-0.188c3.803-0.336,7.699-0.402,11.484,0.023
			c7.191,0.811,14.552,1.31,21.448,3.305c11.021,3.188,21.703,7.553,32.568,11.301c5.292,1.825,17.367,6.52,24.193,8.908V413.75
			V380.5z"/>
		<polygon id="zone-v5g"points="717.5,287 717.5,345.5 827.999,345.5 827.999,255.5 717.5,255.5 	"/>
		<polygon id="zone-v5h" points="717.5,380.5 717.5,413.75 827.999,413.75 827.999,345.5 717.5,345.5 	"/>
	</g>
	</svg>
	<div class="map-data">
		<div class="legend">
			<div class="item low">
				<div class="block"></div>
				<span></span>
			</div>
			<div class="item high">
				<div class="block"></div>
				<span></span>
			</div>
		</div>
		<div class="commute-info">
			<div class="slider-values">
				<div class="value-block">
					<div class="value"><span id="cur-slider-value"></span> minutes</div>
					<div class="desc">Commute time to UBC (by bus)</div>
				</div>
				<div class="value-block">
					<div class="value"><span id="cur-percentage">0</span>%</div>
					<div class="desc">Percentage of students</div>
				</div>
			</div>
			<div id="commute-slider"></div>
			<div class="slider-labels">
				<div class="slider-left">1 minute</div>
				<div class="slider-right">90 minutes</div>
			</div>
		</div>
	</div>
	
</div>
<div class="map-options">
	<ul>
		<li class="population active"><a class="toggle-heat-map" data-type="population" href="#"><div class="block"></div> <span>Population</span></a></li>
		<li class="cost"><a class="toggle-heat-map" data-type="cost" href="#"><div class="block"></div> <span>Cost</span></a></li>
		<li class="commute"><a class="toggle-commute" data-type="commute" href="#"><div class="block"></div> <span>Commute time</span></a></li>
		<li class="roommates"><a class="toggle-heat-map" data-type="roommates" href="#"><div class="block"></div> <span>Number of roommates</span></a></li>
</div>

</div>
