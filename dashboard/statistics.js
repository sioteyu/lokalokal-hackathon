window.onload = function () {
	$.getJSON("http://172.104.54.168/items", function(items) {
	  console.log(items);
	})

	$.getJSON("http://172.104.54.168/products", function(products) {
		$.getJSON("http://172.104.54.168/items", function(items) {
		  console.log(items);
			var dataPoints = [];
			for (product of products) {
				dataPoints.push({label:product.product_name, y:0});
			}

			for (item of items) {
				dataPoints[item.product_id].y+=1;
			}

			var options1 = {
				animationEnabled: true,
				title: {
					text: "Coffee Sales"
				},
				data: [{
					type: "column",
					dataPoints: dataPoints
					}]
			};

			$("#resizable").resizable({
				create: function (event, ui) {
					//Create chart.
					$("#chartContainer1").CanvasJSChart(options1);
				},
				resize: function (event, ui) {
					//Update chart size according to its container size.
					$("#chartContainer1").CanvasJSChart().render();
				}
			});
		})
		})


// Construct options first and then pass it as a parameter


}
