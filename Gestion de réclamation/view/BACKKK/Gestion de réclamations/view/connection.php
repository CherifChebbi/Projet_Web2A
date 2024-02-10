<style>
    .message {
        padding: 10px;
        margin: 10px 0;
        border-radius: 5px;
        font-size: 18px;
        font-weight: bold;
        text-align: center;
    }
    .success {
        background-color: #3CB371;
        color: #FFFFFF;
    }
    .error {
        background-color: #FF6347;
        color: #FFFFFF;
    }
</style>
<script>
    function validateForm() {
        var id = document.forms["myForm"]["ID"].value;
        for (var i = 0; i < id.length; i++) {
            if (isNaN(id[i])) {
                alert("L'ID doit contenir uniquement des chiffres!");
                
                return false;
            }
        }
        return true;
    }
</script>
<?php
$servername = 'localhost';
$username = 'root';
$password ='';
$dbname = 'gestion de reclamation';
try {
    $pdo = new PDO(
        "mysql: host=$servername; dbname=$dbname",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC
        ]
    );
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: ". $e->getMessage();
}

if(isset($_POST['button'])){
    //extraction des informations envoyé dans des variables par la methode POST
    extract($_POST);
    //verifier que tous les champs ont été remplis
    if(isset($ID) &&isset($DATEE) && isset($SUBJECTT) && $MESSAGEE){
        //connexion à la base de donnée
        include '../config.php/config.php';
        //requête d'ajout avec vérification de la clé primaire
        $db = new PDO("mysql:host=localhost;dbname=gestion de reclamation;charset=utf8","root","");
        $check_query = $db->prepare("SELECT COUNT(*) FROM reclamation WHERE ID = :ID");
        $check_query->bindValue(':ID', $ID);
        $check_query->execute();
        $count = $check_query->fetchColumn();
        if ($count > 0) {
            // la clé primaire existe déjà, on affiche un message d'erreur
            $message = "La clé primaire existe déjà";
        } else {
            // la clé primaire n'existe pas, on peut insérer le nouvel enregistrement
            $query = $db->prepare("INSERT INTO reclamation VALUES(:ID,:DATEE,:SUBJECTT,:MESSAGEE)");
            $query->bindValue(':ID', $ID);
            $query->bindValue(':DATEE', $DATEE);
            $query->bindValue(':SUBJECTT', $SUBJECTT);
            $query->bindValue(':MESSAGEE', $MESSAGEE);
            $query->execute();
            if($db){//si la requête a été effectuée avec succès , on fait une redirection
                echo "<div class='message success'>La réclamation a été ajoutée avec succès</div>";
            }else {//si non
                $message = "reclamation non ajoutée";
           

            }
        }
    }else {
        //si non
        $message = "Veuillez remplir tous les champs !";
    }
    if (!ctype_digit($ID)) {
        
        $message = "noooo";
      }
  }
  

?>
