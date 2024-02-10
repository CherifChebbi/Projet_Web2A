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

if(isset($_POST['ID']) && isset($_POST['DATEE']) && isset($_POST['SUBJECTT'])&& isset($_POST['MESSAGEE'])) {
    $ID=$_POST['ID'];
    $DATEE=$_POST['DATEE'];
    $SUBJECTT=$_POST['SUBJECTT'];
    $MESSAGEE=$_POST['MESSAGEE'];
    
    // Vérification que l'ID et le SUBJECT existent
    $req_check = "SELECT * FROM RECLAMATION WHERE ID = :ID AND SUBJECTT = :SUBJECTT";
    $stmt_check = $pdo->prepare($req_check);
    $stmt_check->execute(array(':ID' => $ID, ':SUBJECTT' => $SUBJECTT));
    $result_check = $stmt_check->fetch();
    
    if($result_check){
        $req="UPDATE RECLAMATION SET ID='$ID', DATEE='$DATEE', MESSAGEE='$MESSAGEE' WHERE ID='$ID' AND SUBJECTT='$SUBJECTT';";
        $stmt = $pdo->prepare($req);
        if($stmt->execute()){
            echo "<div class='message success'>La réclamation a été modifiée avec succès</div>";
        } else {
            echo "<div class='message error'>Une erreur est survenue lors de la odification de la réclamation : " . $stmt->errorInfo()[2] . "</div>";
        }
    } else {
        echo "<div class='message error'>L'ID ou le SUBJECT spécifiés n'existent pas</div>";
    }
} else {
    echo "Missing input data";
}


?>
