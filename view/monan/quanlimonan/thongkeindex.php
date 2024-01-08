<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="view/assets/img/favicon.ico" type="image/x-icon" rel="icon" />
    <title>Thống kê</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-image: url('view/assets/img/food background15.jpg');
            background-size: auto auto;
            /* background-repeat: no-repeat; */
        }

        .chart-container {
            width: 45%;
            height: 580px;
            margin: 20px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            overflow: hidden;
            background-color: rgba(251, 251, 251, 0.95);
        }

        canvas {
            width: 100% !important;
            height: 100% !important;
        }

        .chart-title {
            text-align: center;
            font-size: 20px;
            margin: 10px 0;
            color: #333;
        }

        h1 {
            /* margin-top: 20px; */
            color: black;
            text-align: center;
            font-family: 'montserrat';
            font-style: italic;
            background-color: rgba(251, 251, 251, 0.8);
            border: none;
            font-size: 40px;
            
        }

        .charts-container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
        }
        a {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 14px; 
            padding: 8px 12px; 
            background-color: rgba(255, 0, 0, 0.8);
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
        }

    </style>
</head>

<body>

    <div class="charts-container">
        <h1>WELCOME TO STATISTICAL CHARTS FOR KITCHEN PRO</h1>
        <a href="https://kitchenpro1111.000webhostapp.com/?controller=quan_li">THOÁT</a>

        <!--Div của thống kê doanh thu-->
        <div class="chart-container">
            <canvas id="revenueChart"></canvas>
        </div>

        <!--Div của thống kê món ăn-->
        <div class="chart-container">
            <canvas id="foodChart"></canvas>
        </div>
    </div>

    <script>
        // Script doanh thu
        const labels = <?php echo json_encode($month) ?>;
        const data = {
            labels: labels,
            datasets: [{
                label: 'REVENUE CHART',
                data: <?php echo json_encode($amount) ?>,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgb(255, 99, 132)',
                borderWidth: 1
            }]
        };
        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
        };
        var revenueChart = new Chart(
            document.getElementById('revenueChart'),
            config
        );
        // Hết script doanh thu

        // Script món ăn
        const labels2 = <?php echo json_encode($foodname) ?>;
        const data2 = {
            labels: labels2,
            datasets: [{
                label: 'FOOD CHART',
                data: <?php echo json_encode($quantity) ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgb(54, 162, 235)',
                borderWidth: 1
            }]
        };
        const config2 = {
            type: 'bar',
            data: data2,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
        };
        var foodChart = new Chart(
            document.getElementById('foodChart'),
            config2
        );
    </script>
</body>

</html>
