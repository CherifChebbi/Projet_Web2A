<link rel="stylesheet" href="styleee.css">
<?php
$dsn = 'mysql:host=localhost;dbname=projet_web';
$user = 'root';
$password = '';
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);
try {
    $pdo = new PDO($dsn, $user, $password, $options);
} catch (PDOException $e) {
    echo "La connexion a échoué : " . $e->getMessage();
}

if(isset($_POST['identifiant']) && isset($_POST['message']) ) {
    $identifiant=$_POST['identifiant'];
    $message=$_POST['message'];
    
    
    // Vérification que l'identifiant 
    $req_check = "SELECT * FROM reponse WHERE identifiant = :identifiant ";
    $stmt_check = $pdo->prepare($req_check);
    $stmt_check->execute(array(':identifiant' => $identifiant,));
    $result_check = $stmt_check->fetch();
    
    if($result_check){
        $req="UPDATE reponse SET identifiant='$identifiant', message='$message' WHERE identifiant='$identifiant' ;";
        $stmt = $pdo->prepare($req);
        if($stmt->execute()){
            echo "<div class='message success'>La réclamation a été modifiée avec succès</div>";
        } else {
            echo "<div class='message error'>Une erreur est survenue lors de la odification de la réclamation : " . $stmt->errorInfo()[2] . "</div>";
        }
    } else {
        echo "<div class='message error'>L'identifiant  spécifié n'existe pas</div>";
    }
} else {
    echo "Missing input data";
}


?>
