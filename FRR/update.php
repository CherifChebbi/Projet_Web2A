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

if(isset($_POST['ID']) && isset($_POST['DATEE']) && isset($_POST['SUBJECTT'])&& isset($_POST['MESSAGEE'])&& isset($_POST['EMAIL'])) {
    $ID=$_POST['ID'];
    $DATEE=$_POST['DATEE'];
    $SUBJECTT=$_POST['SUBJECTT'];
    $MESSAGEE=$_POST['MESSAGEE'];
    $EMAIL=$_POST['EMAIL'];
    
    // Vérification que l'ID et le SUBJECT existent
    $req_check = "SELECT * FROM RECLAMATION WHERE ID = :ID AND SUBJECTT = :SUBJECTT";
    $stmt_check = $pdo->prepare($req_check);
    $stmt_check->execute(array(':ID' => $ID, ':SUBJECTT' => $SUBJECTT));
    $result_check = $stmt_check->fetch();
    
    if($result_check){
        $req="UPDATE RECLAMATION SET ID='$ID', DATEE='$DATEE', MESSAGEE='$MESSAGEE', EMAIL='$EMAIL' WHERE ID='$ID' AND SUBJECTT='$SUBJECTT';";
        $stmt = $pdo->prepare($req);
        if($stmt->execute()){
            echo "<script>alert('La reclamaion  a été modifiée avec succès'); window.location.href='index.html';</script>";
        } else {
            echo "('Une erreur est survenue lors de la modification de la reclaaion : " . $stmt->errorInfo()[2] . "')";
        }
    } else {
        echo "<script>alert('Veuillez verifier votre id ou votre subject  '); window.location.href='index.html';</script>";
    }
} else {
    echo "<script>alert('Missing input data')</script>";
}


?>









