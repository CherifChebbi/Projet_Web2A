<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <link rel="stylesheet" href="slyles.css">
  
</body>
</html>

<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "gestion de reclamation";

try {
  $dsn = "mysql:host=" . $host . ";dbname=" . $dbname;
  $pdo = new PDO($dsn, $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "connected";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['typee', 'note'],
         <?php
         $sql = "SELECT * FROM reclamation";
         $stmt = $pdo->query($sql);
         while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo"['".$result['DATEE']."',".$result['SUBJECTT']."],";
          }

         ?>
        ]);

        var options = {
          title: 'le typpe de l avis les leur note donner par utilisateur'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 600px; height: 300px;"></div>
  </body>
</html>
