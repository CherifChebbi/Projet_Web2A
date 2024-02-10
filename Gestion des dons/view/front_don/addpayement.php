<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>we drive</title>
    <link rel="stylesheet" href="style.css">
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
<div id="invoiceholder">

<div id="headerimage"></div>
<div id="invoice" class="effect2">
  
  <div id="invoice-top">
  <div>
  <a>
    <img src="cultrvibes.png" alt="" style="width: 140px; height: 120px;">
  </a>
</div>
    <div class="info">
      <h2>Culture vibes</h2>
      <p> culture.vibes@gmail.com </br>
          +216 52649764
      </p>
    </div><!--End Info-->
    <div class="title">
      <h1> <?php echo "Payemnt_id	#". $_POST['id'] ; ?> </h1>
      <p>Issued: <?php echo date("Y-d-m")?> </br>
         Payment Due: <?php echo date("H-i-s")?>
      </p>
    </div><!--End Title-->
  </div><!--End InvoiceTop-->


  
  <div id="invoice-mid">
    
    <div class="clientlogo"></div>
    <div class="info">
      <h2> <?php echo $_POST["nomsoc"];?> </h2>
      <p>  <?php echo $_POST["nomsoc"];?> @gmail.com</br> 
      </br>
    </div>

    <div id="project">
      <h2>Remerciment</h2>
<p> <b>Culture Vibes</b>  vous exprimer notre gratitude pour votre généreuse donation. Votre soutien est très apprécié et contribuera grandement à des objectifs.</p>   
 </div>   

  </div><!--End Invoice Mid-->
  
  <div id="invoice-bot">
    
    <div id="table">
      <table>
        <tr class="tabletitle">
          <td class="item"><h2>Item Description</h2></td>
          
          <td class="subtotal"><h2>Sub-total</h2></td>
        </tr>
        
        <tr class="service">
          <td class="tableitem"><p class="itemtext">Montant</p></td>
         
          <td class="tableitem"><p class="itemtext"> <?php echo $_POST["montant"]." dt " ?> </p></td>
        </tr>
        
      
        
      
          
        <tr class="tabletitle">
          <td></td>
          <td></td>
          <td class="Rate"><h2>Total</h2></td>
          <td class="payment"><h2><?php echo $_POST["montant"]." dt " ?></h2></td>
        </tr>
        
      </table>
    </div><!--End Table-->
    
  <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
    <input type="hidden" name="cmd" value="_s-xclick">
    <input type="hidden" name="hosted_button_id" value="QRZ7QTM9XRPJ6">
    <input type="image" src="http://michaeltruong.ca/images/paypal.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
  </form>

    
    <div id="legalcopy">
      <p class="legal"><strong>Thank you for your business!</strong>  Payment is expected within 31 days; please process this invoice within that time. There will be a 5% interest charge per month on late invoices. 
      </p>
    </div>
    <div>
      <br>
      <br>
      <br>
      <input type="button" value="print" onclick="printC()">
    </div>
<script> function printC() {
    window.print();
  }</script>
    
    
  </div><!--End InvoiceBot-->
</div><!--End Invoice-->
</div><!-- End Invoice Holder-->
  
    <?php
//vérifier que le bouton ajouter a bien été cliqué
if(isset($_POST['button'])){
  //extraction des informations envoyé dans des variables par la methode POST
  extract($_POST);
  //verifier que tous les champs ont été remplis
  if(isset($id) &&isset($nomsoc) && isset($montant) && isset($paymet) && isset($walletid)){
      //connexion à la base de donnée
      //requête d'ajout avec vérification de la clé primaire
      $db = new PDO("mysql:host=localhost;dbname=projet_web;charset=utf8","root","");
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
          $query2 = $db->prepare("INSERT INTO facture (namee,montant,payement_id) VALUES(:namee,:montant,:payement_id)");
          $query2->bindValue(':namee', $nomsoc);
          $query2->bindValue(':montant', $montant);
          $query2->bindValue(':payement_id', $id);
          $query2->execute();
          if ($db) {
        echo "<script>alert('Le payement a été ajoutee avec succès '); ';</script>";
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
