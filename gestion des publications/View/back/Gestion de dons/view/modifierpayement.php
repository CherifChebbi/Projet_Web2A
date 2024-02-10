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
 include '../config/config.php';
         //connexion à la base de donnée
        
         //on récupère le id dans le lien
          $id= $_GET['id'];
          //requête pour afficher les infos d'un employé
          $db = new PDO("mysql:host=localhost;dbname=projet;charset=utf8","root","");
          $query = $db->prepare($db , "SELECT * FROM payement WHERE id = $id");

       //vérifier que le bouton ajouter a bien été cliqué
       if(isset($_POST['button'])){
           //extraction des informations envoyé dans des variables par la methode POST
           extract($_POST);
           //verifier que tous les champs ont été remplis
           if(isset($typee) && isset($note) && isset($commentaire) && $datee ){
               //requête de modification
               $db = new PDO("mysql:host=localhost;dbname=projet;charset=utf8","root","");
               $query = $db->prepare("INSERT INTO payement VALUES(:id,:typee,:note,:commentaire,:datee)");
               $query->bindValue(':id', $id);
               $query->bindValue(':typee', $typee);
               $query->bindValue(':note', $note);
               $query->bindValue(':commentaire', $commentaire);
               $query->bindValue(':datee', $datee);
               $query->execute();
               if($db){//si la requête a été effectuée avec succès , on fait une redirection
                   header("location: listpayement.php");
               }else {//si non

                   
                   $message = "Employé non modifié";
               }

          }else {
              //si non
              $message = "Veuillez remplir tous les champs !";
          }
      }
   
    
    ?>

    <div class="form">
        <a href="listpayement.php" class="back_btn"><img src="images/back.png"> Retour</a>

        <h2>Modifier l'payement : <?=$row['typee']?> </h2>
        <p class="erreur_message">
           <?php 
              if(isset($message)){
                  echo $message ;
              }
           ?>
        </p>
        <form action="" method="POST">
            <label>type</label>
            <input type="text" name="typee" value="<?=$row['typee']?>">
            <label>note</label>
            <label for="customRange3" class="form-label">donner une note sur 5</label>
<input type="range" class="form-range" min="0" max="5" step="0.5" name="note"<?=$row['note']?>">>
            <label>commentaire</label>
            <input type="text" name="commentaire" value="<?=$row['commentaire']?>">
            <label>date</label>
            <input type="date" name="datee" value="<?=$row['datee']?>">

            <input type="submit" value="Modifier" name="button">
        </form>
    </div>
</body>
</html>