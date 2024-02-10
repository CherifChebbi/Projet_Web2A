<?php
include '../../Controller/personne.php';
$UserP= new UserP();
$UserP->deleteuser($_GET["Iduser"]);
header('Location:userslist.php');
