	
	/***************sms report chart*********************/
		
	var randomScalingFactor = function() {
			return Math.round(Math.random() * 100);
		};  
		
 

		
			$("#chart_bar").append('<canvas id="bar-chart-grouped" width="800" height="450"></canvas>');
		var barConfig = {
			type: 'bar',
			/* lineThickness: '1', */
			data: {
      labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
	  
      datasets: [
        {
          label: "Franchisor Graph",
          backgroundColor: "#949494",
          data: [3, 2, 5, 6.5, 2, 5, 3, 2, 4, 7, 2, 1]
        }
      ]
    },
      options: {
      title: {
        display: true,
       
      },
	    scales: {
                yAxes: [{
                    ticks: {
                        max: 7,
                        min: 0,
                        stepSize: 1
                    }
					
                }],
				
				 xAxes: [{
            barPercentage: 0.7
        }]
            }
    }
		};
		

		
		



		 window.onload = function() {
			 var ctx1 = document.getElementById('bar-chart-grouped')
			 if (ctx1!=null)
			 {
			var ctx1 = ctx1.getContext('2d');
			window.myDoughnut = new Chart(ctx1, barConfig);
			 }
	
	      		
		};
		
		


		

		/***************end sms report chart*********************/