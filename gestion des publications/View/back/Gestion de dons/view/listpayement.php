
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="./assets/img/favicon.png" />
    <title>we drive</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Main Styling -->
    <link href="./assets/css/argon-dashboard-tailwind.css?v=1.0.1" rel="stylesheet" />
  </head>

  <body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">

    <div class="absolute w-full bg-primary dark:hidden min-h-75"></div>
    
    <!-- sidenav  -->
 
 
 







    <!-- cards row 2 -->
        <div class="flex flex-wrap mt-6 -mx-3">
          
            <div class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
         
             
            <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/prashantchaudhary/ddslick/master/jquery.ddslick.min.js" ></script>

   
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	
  <?php
include '../controller/payementc.php';
$payementc= new payementc();
$list=$payementc->listpayement() ?>
<!DOCTYPE html>
<html lang="en" 
>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Employés</title>
    <link rel="stylesheet" href="style.css">


<html>

<head></head>

   
<div class="container">




    <table border="1" align="center" width="70%">
    <tr>
        <th>id </th>
        <th>Societe</th>
        <th>Montant</th>
        <th>Payement</th>
        <th>Wallet</th>
        <th>Date</th>
        <th>Supprimer</th>

        </tr>
      
    
<?php
foreach ($list as $payement){?>
<tr>
<td><?=$payement['id'];?></td>
    <td><?=$payement['nomsociete'];?></td>
    <td><?=$payement['montant'];?></td>
    <td><?=$payement['methode_payment'];?></td>
    <td><?=$payement['wallet_id'];?></td>
    <td><?=$payement['datee'];?></td>
    <td><a href="deletepayement.php?id=<?=$payement['id']?>"><img src="images/trash.png"></a></td>



<?php


}
?>



        </div>


         
 


    </form>
    <?php require "cookies.php"?>
<?php if($showcookie) { ?>
<div class="cookie-alert">
By continuing to browse this site, you accept the use of cookies
 to offer you content and services tailored to your centers of interest.<br /><a href="accept_cookie.php">OK</a>
        </div>
<?php } ?>
</body>
</html>
              

              <!-- Control buttons -->
              <button btn-next class="absolute z-10 w-10 h-10 p-2 text-lg text-white border-none opacity-50 cursor-pointer hover:opacity-100 far fa-chevron-right active:scale-110 top-6 right-4"></button>
              <button btn-prev class="absolute z-10 w-10 h-10 p-2 text-lg text-white border-none opacity-50 cursor-pointer hover:opacity-100 far fa-chevron-left active:scale-110 top-6 right-16"></button>
            </div>
          </div>
        </div>


