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
    
 





    <!-- cards row 2 -->
        <div class="flex flex-wrap mt-6 -mx-3">
          
            <div class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
         
             
            <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/prashantchaudhary/ddslick/master/jquery.ddslick.min.js" ></script>

   
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script>
		$(document).ready(function(){
			$(".default_option" ).click(function(){
			  $(this).parent().toggleClass("active");
			})

			$(".select_ul li").click(function(){
			  var currentele = $(this).html();
			  $(".default_option li").html(currentele);
			  $(this).parents(".select_wrap").removeClass("active");
			})
		});
	</script>
</head>
<body>
  
    <?php
//vérifier que le bouton ajouter a bien été cliqué
if(isset($_POST['button'])){
  //extraction des informations envoyé dans des variables par la methode POST
  extract($_POST);
  //verifier que tous les champs ont été remplis
  if(isset($id) &&isset($nomsoc) && isset($montant) && isset($paymet) && isset($walletid)){
      //connexion à la base de donnée
      include '../config/config.php';
      //requête d'ajout avec vérification de la clé primaire
      $db = new PDO("mysql:host=localhost;dbname=projet;charset=utf8","root","");
      $check_query = $db->prepare("SELECT COUNT(*) FROM payement WHERE id = :id");
      $check_query->bindValue(':id', $id);
      $check_query->execute();
      $count = $check_query->fetchColumn();
      if ($count > 0) {
          // la clé primaire existe déjà, on affiche un message d'erreur
          $message = "La clé primaire existe déjà";
      } else {
          // la clé primaire n'existe pas, on peut insérer le nouvel enregistrement
          $query = $db->prepare("INSERT INTO payement VALUES(:id,:nomsociete,:montant,:methode_payment,:wallet_id,:datee)");
          $query->bindValue(':id', $id);
          $query->bindValue(':nomsociete', $nomsoc);
          $query->bindValue(':montant', $montant);
          $query->bindValue(':methode_payment', $paymet);
          $query->bindValue(':wallet_id', $walletid);
          $query->bindValue(':datee', $datee);
          $query->execute();
          if($db){//si la requête a été effectuée avec succès , on fait une redirection
              echo "payement ajouter avec succes";
          }else {//si non
              $message = "Employé non ajouté";
          }
      }
  }else {
      //si non
      $message = "Veuillez remplir tous les champs !";
  }
}

    
    ?>
    
    <div class="form">
        <a href="listpayement.php" class="back_btn"><img src="images/back.png"> Retour</a>
        <h2>Ajouter un payement</h2>
        <p class="erreur_message">
            <?php 
            // si la variable message existe , affichons son contenu
            if(isset($message)){
                echo $message;
            }
            ?>

        </p>
        <form action="" method="POST">
        <label>id</label>
            <input type="number" name="id"     pattern="[0-9]+">
            <label>Methode de payement</label>
            <select name="paymet" id="typee">
              <option value="Paypal">Paypal</option>
              <option value="Mastercard">Mastercard</option>
              <option value="Visa">Visa</option>
              <option value="Bitcoin">Bitcoin</option>
              <option value="AmericanExpress">AmericanExpress </option>
              <option value="Discover">Discover</option>
            </select>
            <label>Montant</label>
            
            <input type="range" class="form-range" id="ran" min="30" max="10000" step="20" name="montant" onchange="chval()" onblur="chval()">
            <span id="hidd"></span>
            <script>
               document.getElementById("hidd").innerText = document.getElementById("ran").value + " dt"
              function chval(){
                document.getElementById("hidd").innerText = document.getElementById("ran").value +" dt"
              }
            </script>
            <label>Wallet id</label>
            <input type="text" name="walletid"     pattern="[0-9]+">
            <label>Nom societe</label>
            <input type="text" name="nomsoc" pattern="[a-zA-Z ]+">
            <label>date</label>
            <input type="date" name="datee">
            <input type="submit" value="Ajouter" name="button">

            
</div>
        </form>
    </div>
</body>
</html>