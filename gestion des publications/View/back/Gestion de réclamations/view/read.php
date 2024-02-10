


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
<th>ID</th>
<th>DATEE</th>
<th>SUBJECTT</th>
<th>MESSAGEE</th>
<th>REPONSE</th>

</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "projet_web");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM reclamation";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["DATEE"] . "</td><td>" . $row["SUBJECTT"] . "</td><td>" . $row["MESSAGEE"] . "</td><td><a href='reponse.php?id=" . $row["ID"] . "' class='btn'>réponse</a></td></tr>";
    }
} else {
    echo "No Results";
}
mysqli_close($conn);
?>
</table>
</body>
</html>
