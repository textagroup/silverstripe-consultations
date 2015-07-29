<h2>$ReportTitle</h2>
<canvas id="gauge"></canvas>
<script type="text/javascript">
	var opts = {
		lines: 1, // The number of lines to draw
		angle: 0.25, // The length of each line
		lineWidth: 0.46, // The line thickness
		pointer: {
			length: 0.7, // The radius of the inner circle
			strokeWidth: 0.057, // The rotation offset
			color: '#000000' // Fill color
		},
		limitMax: 'false',   // If true, the pointer will not go past the end of the gauge
		colorStart: '#6FADCF',   // Colors
		colorStop: '#8FC0DA',    // just experiment with them
		strokeColor: '#E0E0E0',   // to see which ones work best for you
		generateGradient: true
	};
	var target = document.getElementById('gauge'); // your canvas element
	var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
	gauge.maxValue = $maxValue; // set max gauge value
	gauge.animationSpeed = 50; // set animation speed (32 is default value)
	gauge.set($gaugeSet); // set actual value
</script>
