<?php
    require '../../controller/commandec.php';

    $commandec = new commandec();
    $commandec->supprimercommande($_GET['num']);
    header('Location:affichercommandeback.php');
?>