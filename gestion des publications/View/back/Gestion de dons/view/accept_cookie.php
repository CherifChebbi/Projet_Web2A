<?php

if (!isset($_COOKIE['accept_cookie'])) {

    setcookie('accept_cookie', true, time() + (86400 * 30), '/', null, false, true);
}


header("location:listpayement.php");
?>
