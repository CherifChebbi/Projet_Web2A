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

// Vérification de l'existence de payement
$id = $_POST['id'];
$sql = "SELECT * FROM payement WHERE id = :id";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
if ($stmt->rowCount() > 0) {
    // payement existe, on peut le supprimer
    $sql = "DELETE FROM payement WHERE id = :id";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    if ($stmt->execute()) {

        echo "<script>alert('Le payement a été supprimée avec succès '); window.location.href='index.html';</script>";
    } else {
        echo "<div class='message error'>Une erreur est survenue lors de la suppression de le payement : " . $stmt->errorInfo()[2] . "</div>";
    }
} else {
    // payement n'existe pas, on affiche un message d'erreur
    
    echo "<script>alert('Veuillez verifier votre id  '); window.location.href='index.html';</script>";
}

// Fermeture de la connexion à la base de données
$dbh = null;
?>