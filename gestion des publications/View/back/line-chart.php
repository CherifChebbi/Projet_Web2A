<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Graphique à ligne unique</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <canvas id="line-chart"></canvas>
  <script>
    var ctx = document.getElementById("line-chart").getContext("2d");
    var lineChart = new Chart(ctx, {
      type: 'line',
      data: <?php echo json_encode($chartData); ?>
    });
  </script>
</body>
</html>