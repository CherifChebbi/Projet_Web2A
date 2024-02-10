<link rel="stylesheet" href="styleee.css">
<?php
// Connexion à la base de données
$dsn = 'mysql:host=localhost;dbname=gestion de reclamation';
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
        echo "<div class='message success'>La réclamation a été supprimée avec succès</div>";
    } else {
        echo "<div class='message error'>Une erreur est survenue lors de la suppression de la réclamation : " . $stmt->errorInfo()[2] . "</div>";
    }
} else {
    // L'identifiant n'existe pas, on affiche un message d'erreur
    echo "<div class='message error'>L'identifiant spécifié n'existe pas</div>";
}

// Fermeture de la connexion à la base de données
$dbh = null;
?>
