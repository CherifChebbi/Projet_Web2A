
<?php
$conn = mysqli_connect("localhost", "root", "", "gestion de reclamation");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id=$_POST['retour'];
$sql = "SELECT * FROM reponse where post_id='$id'";
$result = mysqli_query($conn, $sql);
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
mysqli_close($conn);
?>
</table>

    