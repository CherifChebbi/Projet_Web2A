<?php


include 'Gestion de user/Controller/personne.php';

if (isset($_POST['query'])) {
    $search = $_POST['query'];
    $db = config::getConnexion();
    $stmt = $db->prepare("SELECT * FROM tabuser WHERE Gender  LIKE CONCAT('%',:search,'%') OR Iduser LIKE CONCAT('%',:search,'%') OR Name LIKE CONCAT('%',:search,'%') OR Surname LIKE CONCAT('%',:search,'%')  OR Semail LIKE CONCAT('%',:search,'%') OR Age LIKE CONCAT('%',:search,'%') " );
    $stmt->bindParam(':search', $search, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $db = config::getConnexion();
    $stmt = $db->prepare("SELECT * FROM tabuser");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

if (count($result) > 0) {
    $output = "<table border='1' align='center' width='70%' class='table table-bordered table-striped'>
                    <tr>
                        <th>Id user</th>
                        <th>First name</th>
                        <th>surname</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Image</th>
                        <th>Update</th>
                        <th>Delete</th>
                        <th>view</th>
                    </tr>";

    foreach ($result as $row) {
        $output .= "<tr>
                        <td>" . $row['Iduser'] . "</td>
                        <td>" . $row['Name'] . "</td>
                        <td>" . $row['Surname'] . "</td>
                        <td>" . $row['Age'] . "</td>
                        <td>" . $row['Gender'] . "</td>
                        <td>" . $row['Semail'] . "</td>
                        <td>" . $row['Spassword'] . "</td>
                        <td><img src='data:image/png;base64," . base64_encode($row['Img']) . "' alt='User image'></td>
                        <td><a href='updateuser.php?Iduser=" . $row['Iduser'] . "' class='btn btn-secondary m-2'>Update</a></td>
                        <td><a href='deleteuser.php?Iduser=" . $row['Iduser'] . "' class='btn btn-danger m-2'>Delete</a></td>
                        <td><a href='viewuser.php?Iduser=" . $row['Iduser'] . "' class='btn btn-info m-2'>View</a></td>

                    </tr>";
    }

    $output .= "</table>";

    echo $output;
} else {
    echo "<h3>No record found</h3>";
}

?>
