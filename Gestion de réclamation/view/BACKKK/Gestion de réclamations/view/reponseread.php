


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
$conn = mysqli_connect("localhost", "root", "", "gestion de reclamation");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM reponse";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["identifiant"] . "</td><td>" . $row["message"] . "</td><td>" . $row["post_id"] . "</td></tr>";
    }
} else {
    echo "No Results";
}
mysqli_close($conn);
?>
</table>
</body>
</html>
