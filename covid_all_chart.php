<?php
include('koneksi.php');
$label = ["India", "Japan", "S.Korea", "Turkey", "Vietnam", "Taiwan", "Iran", "Indonesia", "Malaysia", "Israel"];

    for ($country = 1; $country < 11; $country++) {
        $query = mysqli_query($koneksi, "select total_cases from covid_data where id='$country'");
        $row = $query->fetch_array();
        $total_cases[] = $row['total_cases'];}
    
    for ($country = 1; $country < 11; $country++) {
        $query = mysqli_query($koneksi, "select total_deaths from covid_data where id='$country'");
        $row = $query->fetch_array();
        $total_deaths[] = $row['total_deaths'];}
    
    for ($country = 1; $country < 11; $country++) {
        $query = mysqli_query($koneksi, "select total_recovered from covid_data where id='$country'");
        $row = $query->fetch_array();        
        $total_recovered[] = $row['total_recovered'];}
    
    for ($country = 1; $country < 11; $country++) {
        $query = mysqli_query($koneksi, "select total_tests from covid_data where id='$country'");
        $row = $query->fetch_array();
        $total_tests[] = $row['total_tests'];}
    
    for ($country = 1; $country < 11; $country++) {
        $query = mysqli_query($koneksi, "select active_cases from covid_data where id='$country'");
        $row = $query->fetch_array();
        $active_cases[] = $row['active_cases'];}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Grafik Covid - Bar Chart</title>
    
</head>
<body>
    <div style="width: 800px;height: 800px">
        <h1>Total Kasus Kematian COVID-19</h1>
        <canvas id="myChart"></canvas>
    </div>
    <div style="width: 800px;height: 800px">
        <h1>Total Kasus Sembuh COVID-19</h1>
        <canvas id="myChart5"></canvas>
    </div>
    <div id="canvas-holder" style="width: 800px;height: 800px">
        <h1>Total Kasus Aktif COVID-19</h1>
        <canvas id="myChart2"></canvas>
    </div>
    <div id="canvas-holder" style="width: 800px;height: 800px">
        <h1>Total Kasus COVID-19</h1>
        <canvas id="myChart3"></canvas>
    </div>    
    <div style="width: 800px;height: 800px">
        <h1>Total Tes COVID-19</h1>
        <canvas id="myChart4"></canvas>
    </div>

    <script src="Chart.js" type="text/javascript"></script>

<script>
        var ctx4 = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx4, {
            type: 'line',
            data: {
            labels: <?php echo json_encode($label); ?>,
            datasets: [{
            label: 'Grafik Total Deaths Covid-19',
            data: <?php echo json_encode($total_deaths); ?>,
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
        });

        var ctx4 = document.getElementById("myChart5").getContext('2d');
        var myChart4 = new Chart(ctx4, {
            type: 'line',
            data: {
            labels: <?php echo json_encode($label); ?>,
            datasets: [{
            label: 'Grafik Total Recovered Covid-19',
            data: <?php echo json_encode($total_recovered); ?>,
            fill: false,
            borderColor: 'rgb(54, 162, 235)',
            tension: 0.1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
        });

        var ctx2 = document.getElementById("myChart2").getContext('2d');
        var myChart2 = new Chart(ctx2, {
            type: 'doughnut',
			data: {
				datasets: [{
					data:<?php echo json_encode($active_cases); ?>,
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(0, 255, 254, 0.2)',
					'rgba(115, 255, 216, 0.2)',
					'rgba(210, 105, 30, 0.2)',
					'rgba(128, 0, 128, 0.2)',
					'rgba(0, 0, 205, 0.2)',
					'rgba(40, 178, 170, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(0, 255, 254, 1)',
					'rgba(115, 255, 216, 1)',
					'rgba(210, 105, 30, 1)',
					'rgba(128, 0, 128, 1)',
					'rgba(0, 0, 205, 1)',
					'rgba(40, 178, 170, 1)'
					],
					label: 'Persentase Active Cases COVID-19'
				}],
				labels: <?php echo json_encode($label); ?>},
			options: {
				responsive: true
			}
		});

        var ctx3 = document.getElementById("myChart3").getContext('2d');
        var myChart3 = new Chart(ctx3, {
        type: 'pie',
        data: {
            datasets: [{
                data: <?php echo json_encode($total_cases); ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 99, 255, 0.2)',
                    'rgba(54, 162, 64, 0.2)',
                    'rgba(255, 206, 153, 0.2)',
                    'rgba(75, 192, 128, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 99, 255, 1)',
                    'rgba(54, 162, 64, 1)',
                    'rgba(255, 206, 153, 1)',
                    'rgba(75, 192, 128, 1)'
                ],
                label: 'Grafik Total Cases Cases Covid-19'
            }],
            labels: <?php echo json_encode($label); ?>
        },
        options: {
            responsive: true
        }
    });

        var ctx4 = document.getElementById("myChart4").getContext('2d');
        var myChart4 = new Chart(ctx4, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($label); ?>,
                datasets: [{
                    label: 'Grafik Total Tests Covid-19',
                    data: <?php echo json_encode($total_tests); ?>,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>

</html>