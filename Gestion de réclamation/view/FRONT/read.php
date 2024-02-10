


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
    background-color: #f82249;
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
<th>ID</th>
<th>DATE</th>
<th>SUBJECT</th>
<th>MESSAGE</th>


</tr>
<?php
$dsn = "mysql:host=localhost;dbname=projet_web";
$username = "root";
$password = "";

try {
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM reclamation";
    $result = $conn->query($sql);

    if ($result->rowCount() > 0) {
        while ($row = $result->fetch()) {
            echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["DATEE"] . "</td><td>" . $row["SUBJECTT"] . "</td><td>" . $row["MESSAGEE"] . "</td></tr>";
        }
    } else {
        echo "No Results";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$conn = null;
?>

</table>
</body>
</html>
