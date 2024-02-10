<link rel="stylesheet" href="styleee.css">
<?php
// Connexion à la base de données
$dsn = 'mysql:host=localhost;dbname=projet_web';
$user = 'root';
$password = '';
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);
try {
    $dbh = new PDO($dsn, $user, $password, $options);
} catch (PDOException $e) {
    echo "La connexion a échoué : " . $e->getMessage();
}

// Vérification de l'existence de l'identifiant
$ID = $_POST['ID'];
$sql = "SELECT * FROM reclamation WHERE ID = :ID";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':ID', $ID, PDO::PARAM_INT);
$stmt->execute();
if ($stmt->rowCount() > 0) {
    // L'identifiant existe, on peut le supprimer
    $sql = "DELETE FROM reclamation WHERE ID = :ID";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':ID', $ID, PDO::PARAM_INT);
    if ($stmt->execute()) {
      echo "<script>alert('La réclamation a été supprimée avec succès '); window.location.href='index.html';</script>";
    } else {
        echo "<div class='message error'>Une erreur est survenue lors de la suppression de la réclamation : " . $stmt->errorInfo()[2] . "</div>";
    }
} else {
    // réclamation n'existe pas, on affiche un message d'erreur
    
    echo "<script>alert('Veuillez verifier votre id  '); window.location.href='index.html';</script>";
}

// Fermeture de la connexion à la base de données
$dbh = null;
?>











<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>we drive</title>
  </head>
    
             
            <link rel="stylesheet" href="style.css">
   
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
          if ($db) {
            echo "<script>alert('Payement ajouté avec succès'); window.location.href='index.html';</script>";
          } else {
            echo "<script>alert('Erreur : Payement non ajouté');</script>";
          }
          
        
      }
  }else {
      //si non
      $message = "Veuillez remplir tous les champs !";
  }
}

    
    ?>
    
   
    <script>
      function myDef(){
        let a = document.getElementById("").value;
      }
    </script>
</body>
</html>


