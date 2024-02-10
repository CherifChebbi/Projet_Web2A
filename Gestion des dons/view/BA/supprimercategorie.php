<?php
    require '../../Controller/categorieC.php';

    $categorieC = new categorieC();
    $categorieC->supprimercategorie($_GET['idc_categorie']);
    header('Location:affichercategories.php');
?>