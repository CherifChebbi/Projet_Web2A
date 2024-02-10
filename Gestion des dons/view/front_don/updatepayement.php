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
if(isset($_POST['button'])){
    //extraction des informations envoyé dans des variables par la methode POST
    extract($_POST);
    //verifier que tous les champs ont été remplis
    if(isset($id) &&isset($nomsoc) && isset($montant) && isset($paymet) && isset($walletid)){
            $id=$_POST['id'];
    $nomsociete=$_POST['nomsoc'];
    $montant=$_POST['montant'];
    $methode_payment=$_POST['paymet'];
    $wallet_id=$_POST['walletid'];

    

    
       // Vérification que l'id et le wallet_id existent
       $req_check = "SELECT * FROM payement WHERE id = :id AND wallet_id = :wallet_id";
       $stmt_check = $pdo->prepare($req_check);
       $stmt_check->execute(array(':id' => $id, ':wallet_id' => $wallet_id));
       $result_check = $stmt_check->fetch();
   
       if($result_check){
        $req="UPDATE payement SET id='$id', nomsociete='$nomsociete',montant='$montant' , methode_payment='$methode_payment', wallet_id='$wallet_id', datee='$datee' WHERE id='$id' AND wallet_id='$wallet_id'";
        $stmt = $pdo->prepare($req);
        if($stmt->execute()){

                echo "<script>alert('Le payement a été modifiée avec succès'); window.location.href='index.html';</script>";
            } else {
                echo "('Une erreur est survenue lors de la modification de le payement : " . $stmt->errorInfo()[2] . "')";
            }
        } else {
            echo "<script>alert('Veuillez verifier votre id ou votre wallet_id  '); window.location.href='index.html';</script>";
        }
    } else {
        echo "<script>alert('Missing input data')</script>";
    }
         
   
}

?>