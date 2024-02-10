<?php
include '../controller/facturec.php';
$facturec = new facturec();
$facturec->deletefacture($_GET["facture_id"]);
header('Location:listfacture.php');
?>