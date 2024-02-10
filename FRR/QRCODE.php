
      <style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
  border-bottom: 1px solid #ddd;
}

th {
  background-color: #f2f2f2;
  color: #333;
}

.bttnnn {
  display: inline-block;
  padding: 8px 16px;
  font-size: 16px;
  font-weight: bold;
  text-align: center;
  text-decoration: none;
  background-color: #009CFF;
  color: white;
  border-radius: 4px;
}

.bttnnn:hover {
  background-color: #F3F6F9;
}

.bttnnn:active {
  background-color: #104370;
}

</style>


<?php
$conn = mysqli_connect("localhost", "root", "", "projet_web");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id=$_POST['retour'];
$sql = "SELECT * FROM reponse where post_id='$id'";
$result = mysqli_query($conn, $sql);
if ($_POST["aa"] == "r2"){
  echo"<table>
  <tr>
  <th>IDENTIFIANT</th>
  <th>MESSAGE</th>
  <th>POST_ID</th>
  
  
  </tr>";
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["identifiant"] . "</td><td>" . $row["message"] . "</td><td>" . $row["post_id"] . "</td></tr>";
    }
  } else {
      echo "No Results";
  }
}else{
  $row = mysqli_fetch_assoc($result);
  $msg = $row['message'];
  include('phpqrcode/qrlib.php');

  $tempDir = 'Qr_temp/';

  $codeContents = "Votre Reponse est: ".$msg;

  $fileName = '005_file_'.md5($codeContents).'.png';

  $pngAbsoluteFilePath = $tempDir.$fileName;
  $urlRelativeFilePath = $tempDir.$fileName;

  // generating
  if (!file_exists($pngAbsoluteFilePath)) {
      QRcode::png($codeContents, $pngAbsoluteFilePath);
  }
  echo '<hr />';

  echo '<img src="'.$urlRelativeFilePath.'" />';
}


mysqli_close($conn);
?>
</table>

    