<?php
include '../controller/payementc.php';
$payementc = new payementc();
$payementc->deletepayement($_GET["id"]);
header('Location:listpayement.php');
?>