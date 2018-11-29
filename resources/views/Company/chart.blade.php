<script>

window.onload = function() {
	var options = {
		exportEnabled: true,
		animationEnabled: true,
		title:{
			text: "Statistiques"
		},
		legend:{
			horizontalAlign: "right",
			verticalAlign: "center"
		},
		data: [{
			type: "pie",
			showInLegend: true,
			toolTipContent: "<b>{name}</b>: {y} (#percent%)",
			indexLabel: "{name}",
			legendText: "{name} (#percent%)",
			indexLabelPlacement: "inside",
			dataPoints: [
				{ y: parseFloat($('#delivery_requests').val()), name: "Livraisons" },
				{ y: parseFloat($('#sender_deliveries').val()), name: "Commandes" },
			]
		}]
	};
	$("#chartContainer").CanvasJSChart(options);
}
</script>
<div id="chartContainer" style="height: 100%; width: 100%;"></div> 
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>