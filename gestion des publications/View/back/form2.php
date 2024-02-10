<!DOCTYPE html>
<html>
<head>
    <title>Contact</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <?php
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        require 'phpmailereu/src/Exception.php';
        require 'phpmailereu/src/PHPMailer.php';
        require 'phpmailereu/src/SMTP.php';
    ?>
    <h1>Contact</h1>
    
    <form method="post" action="">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required>
        
        <label for="subject">Subject</label>
        <input type="text" name="subject" id="subject" required>
        
        <label for="message">Message</label>
        <textarea name="message" id="message" required></textarea>
        
        <br>
        
        <input type="submit" value="Envoye" name="btn">
    </form>
<?php
if (isset($_POST["btn"])){
    $conn = mysqli_connect("localhost", "root", "", "projet_web");
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    $x=$_GET['id'];
    $sql = "SELECT EMAIL FROM reclamation WHERE ID='$x'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $email = $row['EMAIL'];

    $name = $_POST["name"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    $mail = new PHPMailer(true);

    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username = "houssemferchichi20@gmail.com";
    $mail->Password = "pkcmuszvxmfdfadz";

    $mail->setFrom($email, $name);
    $mail->addAddress($email, $name);

    $mail->Subject = $subject;
    $mail->Body = $message;

    $mail->send();
    mysqli_close($conn);
    header("Location: .//");
}

?>
</body>
</html>