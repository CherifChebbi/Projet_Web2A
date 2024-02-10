


<html>
    <head>
        <style>
table {
    border-collapse: collapse;
    width: 100%;
  }
  
  th, td {
    text-align: left;
    padding: 8px;
    border: 1px solid black;
  }
  
  th {
    background-color: #ddd;
  }
  
  tr:nth-child(even) {
    background-color: #f2f2f2;
  }
  
  .btn {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 8px 16px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 4px;
  }
  
        </style>
    </head>
<body>
<table>
<tr>
<th>IDENTIFIANT</th>
<th>MESSAGE</th>
<th>POST_ID</th>


</tr>
<?php
$dsn = "mysql:host=localhost;dbname=projet_web";
$username = "root";
$password = "";
try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM reponse";
    $stmt = $pdo->query($sql);
    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td>" . $row["identifiant"] . "</td><td>" . $row["message"] . "</td><td>" . $row["post_id"] . "</td></tr>";
        }
    } else {
        echo "No Results";
    }
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$pdo = null;
?>

</table>
</body>
</html>
