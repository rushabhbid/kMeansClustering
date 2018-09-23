<?php
$dataPoints = array(
			array("label"=> "Cluster 1 [Mean : ".$m1."]", "y"=> $lcc1),
			array("label"=> "Cluster 1 [Mean : ".$m2."]", "y"=> $lcc2),
			array("label"=> "Cluster 1 [Mean : ".$m3."]", "y"=> $lcc3),
			);
	
?>
<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	title:{
		text: "Confidence Analysis Representation   "
	},
	subtitles: [{
		text: "Unit: Persons"
	}],
	data: [{
		type: "pie",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{label} - #percent%",
		yValueFormatString: "#,##0",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<br><br>
<div id="chartContainer" style="height: 370px; width: 83%;" align = "center"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>                       