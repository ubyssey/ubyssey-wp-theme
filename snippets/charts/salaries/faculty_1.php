<style>
	.chart{
		font-family: "lft-etica";
		font-weight: 300;
		font-size: 14px;
		width: 100%;
		padding: 0;
		margin-bottom: 30px;
	}

	path {
		fill: none;
		stroke: black;
		stroke-width: 1;
	}

	li.header {
		font-weight: 500;
	}

	ul.chart.bar li.bar, li.header {
		display: block;
		overflow-y: auto;
		overflow-x: hidden;
		position: relative;
		margin-bottom: 2px;
		margin-left: 10px;
		margin-right: 10px;
	}

	li.bar span {
		display: block;
		white-space: nowrap;
		background: rgb(219, 230, 240);
	}

	li.bar a, li.header a {
		text-decoration: none;
		color: inherit;
	}

	li.bar a:hover {
		background: rgba(0, 0, 0, 0.15);
	}

	li.bar label, li.header label {
		position: absolute;
		right: 0;
		top: 0;
	}

	li.bar a, li.bar label, li.header a, li.header label {
		padding: 8px;
		display: block;
	}
</style>
<ul class="chart bar faculty-average"></ul>

<script src="http://ubyssey.ca/wp-content/themes/theme/js/d3.min.js"></script>
<script src="http://ubyssey.ca/wp-content/themes/theme/js/accounting.min.js"></script>
<script src="http://ubyssey.ca/wp-content/themes/theme/js/faculties.js"></script>
