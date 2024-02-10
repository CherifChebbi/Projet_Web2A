<?php
    require '../../controller/articleC.php';

    $articleC = new articleC();
    $articleC->supprimerarticle($_GET['id']);
    header('Location:afficherArticles.php');
?>