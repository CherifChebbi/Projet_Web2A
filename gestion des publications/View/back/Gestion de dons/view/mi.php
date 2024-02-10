<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">





    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifier</title>
    <link rel="stylesheet" href="style.css">





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
 
 

-->





    <!-- cards row 2 -->
        <div class="flex flex-wrap mt-6 -mx-3">
          
            <div class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
         
   
        
</head>
<body>
    
<?php























































// connexion à la base de donnée
// on récupère le id dans le lien
$id = $_GET['id'];

// requête pour afficher les infos d'un employé
require_once '../config/config.php';
$dbh = new PDO("mysql:host=localhost;dbname=projet", 'root', '');

$stmt = $dbh->prepare("SELECT * FROM payement WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

// vérifier que le bouton ajouter a bien été cliqué
if(isset($_POST['button'])){
    // extraction des informations envoyé dans des variables par la methode POST
    extract($_POST);
    // vérifier que tous les champs ont été remplis
    if(isset($wallet_id) && isset($montant) && isset($nomsociete) && isset($datee) && $paymet ){
        // requête de modification
        $dbh = new PDO("mysql:host=localhost;dbname=projet", 'root', '');
        $stmt = $dbh->prepare("UPDATE payement SET wallet_id = :wallet_id, montant = :montant, nomsociete = :nomsociete, datee = :datee, methode_payment = :paymet WHERE id = :id");
        $stmt->bindParam(':wallet_id', $wallet_id);
        $stmt->bindParam(':montant', $montant);
        $stmt->bindParam(':nomsociete', $nomsociete);
        $stmt->bindParam(':datee', $datee);
        $stmt->bindParam(':paymet', $paymet);
        $stmt->bindParam(':id', $id);
        $result = $stmt->execute();
        
        if($result){ // si la requête a été effectuée avec succès, on fait une redirection
            echo "modification effectuee";
        } else { // sinon
            $message = "Payement non modifié";
        }
    } else {
        // sinon
        $message = "Veuillez remplir tous les champs !";
    }
}

    
    ?>
























    <div class="form">
        <a href="listpayement.php" class="back_btn"><img src="images/back.png"> Retour</a>

        <h2>Modifier le payement n°<?=$row['id']?> </h2>
        <p class="erreur_message">
           <?php 
              if(isset($message)){
                  echo $message ;
              }
           ?>
        </p>










        <form action="" method="POST">
            <label>Wallet id</label>
            <input type="text" name="wallet_id" value="<?=$row['wallet_id']?>">
            <label>Methode de payement</label>
            <select name="paymet" id="typee" >
              <option value="<?=$row['methode_payment']?>"><?=$row['methode_payment']?></option>
              <optgroup label="Changer votre methode de payement">
                <option value="Paypal">Paypal</option>
                <option value="Mastercard">Mastercard</option>
                <option value="Visa">Visa</option>
                <option value="Bitcoin">Bitcoin</option>
                <option value="AmericanExpress">AmericanExpress </option>
                <option value="Discover">Discover</option>
              </optgroup>
            </select>
            <label for="customRange3" class="form-label">Montant</label>
            <input type="range" class="form-range"  min="30" max="10000" step="20" id="ran" name="montant" onchange="chval()" onblur="chval()" value="<?=$row['montant']?>">
            <span id="hidd"></span>
            <script>
               document.getElementById("hidd").innerText = document.getElementById("ran").value + " dt"
              function chval(){
                document.getElementById("hidd").innerText = document.getElementById("ran").value +" dt"
              }
            </script>
            <label>nomsociete</label>
            <input type="text" name="nomsociete" pattern="[a-zA-Z ]+" value="<?=$row['nomsociete']?>">
            <label>date</label>
            <input type="date" name="datee" value="<?=$row['datee']?>">

            <input type="submit" value="Modifier" name="button">
        </form>
    </div>
</body>
</html>