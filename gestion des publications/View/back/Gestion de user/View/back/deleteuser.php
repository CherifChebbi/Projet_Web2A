<?php
include 'Gestion de user/Controller/personne.php';
$UserP= new UserP();
$UserP->deleteuser($_GET["Iduser"]);
header('Location:userslist.php');
