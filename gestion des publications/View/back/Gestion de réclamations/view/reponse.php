<link rel="stylesheet" href="sstyle.css">

<?php
$pdo = new PDO("mysql:host=localhost;dbname=projet_web","root","");

$post = isset($_GET['id']) ? $_GET['id'] : null;

include '../config.php/config.php';

if (isset($_POST['post_comment'])) {
    $identifiant = $_POST['identifiant'];
    $message = $_POST['message'];
    $post = $_GET['id'];

    $sql = "INSERT INTO reponse (identifiant, message, post_id) VALUES (:identifiant, :message, :post)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['identifiant' => $identifiant, 'message' => $message, 'post' => $post]);

    if ($stmt->rowCount() > 0) {
        echo "";
    } else {
        echo "Error: " . $sql . "<br>" . $pdo->errorInfo();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>réponse</title>
</head>
<body>

    <div class="wrapper">
    <h2>Ajouter une réponse</h2>
        <form action="" method="post" class="form">
            <input type="text" class="identifiant" name="identifiant" placeholder="identifiant">
            <br>
            <textarea name="message" cols="30" rows="10" class="message" placeholder="Message"></textarea>
            <br>
            <button type="submit" class="btn" name="post_comment">Post reponse</button>
        </form>
    </div>

    <div class="content">
        <?php

        $post = isset($_GET['ID']) ? $_GET['ID'] : null;

        $sql = "SELECT * FROM reponse where post_id=:post";    
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['post' => $post]);

        if ($stmt->rowCount() > 0) {


              $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

              foreach ($comments as $comment) {
        ?>
        
        <h3><?php echo $comment['name']; ?></h3>
        <p id="message"><?php echo $comment['message']; ?></p>

        <?php } } ?>
    </div>
</body>
</html>