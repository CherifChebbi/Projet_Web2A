<?php
include '../../config.php';
include 'Gestion de user/Model/personne.php';





class UserP
{
    public function listusers()
    {
        $sql = "SELECT * FROM tabuser";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }



    function deleteuser($id)
    {
        $sql = "DELETE FROM tabuser WHERE idUser = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addUser($user)
    {
        $sql = " INSERT INTO tabuser  
        VALUES (:Iduser, :Name, :Surname , :Age, :Gender ,:Semail, :Spassword , :Img)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'Iduser' => $user->getIduser(),
                'Name' => $user->getName(),
                'Surname' => $user->getsurname(),
                'Age' => $user->getAge(),
                'Gender' => $user->getGender(),
                'Semail' => $user->getSemail(),
                'Spassword' => $user->getSpassword(),
                'Img' => $user->getImg()   ,
                
   
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    

    function updateUser($user, $id)

    {
        $sql = "UPDATE tabuser SET Name = :Name, Surname = :Surname, Age = :Age, Gender = :Gender, Spassword = :Spassword, Img = :Img WHERE Iduser = :Iduser";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'Iduser' => $id,
                'Name' => $user->getName(),
                'Surname' => $user->getSurname(),
                'Age' => $user->getAge(),
                'Gender' => $user->getGender(),
                'Spassword' => $user->getSpassword(),
                'Img' => $user->getImg()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
    function countMales()
{
    $sql = "SELECT COUNT(*) as count FROM tabuser WHERE Gender = 'Male'";
    $db = config::getConnexion();
    try {
        $query = $db->query($sql);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result['count'];
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

function countMalesU12()
{
    $sql = "SELECT COUNT(*) as count FROM tabuser WHERE Gender = 'Male' AND Age < 12";
    $db = config::getConnexion();
    try {
        $query = $db->query($sql);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result['count'];
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

function countMalesP18()
{
    $sql = "SELECT COUNT(*) as count FROM tabuser WHERE Gender = 'Male' AND Age > 17";
    $db = config::getConnexion();
    try {
        $query = $db->query($sql);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result['count'];
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}


function countMalesP35()
{
    $sql = "SELECT COUNT(*) as count FROM tabuser WHERE Gender = 'Male' AND Age > 35";
    $db = config::getConnexion();
    try {
        $query = $db->query($sql);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result['count'];
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}







function countFemales()
{
    $sql = "SELECT COUNT(*) as count FROM tabuser WHERE Gender = 'Female'";
    $db = config::getConnexion();
    try {
        $query = $db->query($sql);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result['count'];
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}


    



function countFemalesU12()
{
    $sql = "SELECT COUNT(*) as count FROM tabuser WHERE Gender = 'Female' AND Age < 12";
    $db = config::getConnexion();
    try {
        $query = $db->query($sql);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result['count'];
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

function countFemalesP18()
{
    $sql = "SELECT COUNT(*) as count FROM tabuser WHERE Gender = 'Female' AND Age > 17";
    $db = config::getConnexion();
    try {
        $query = $db->query($sql);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result['count'];
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}


function countFemalesP35()
{
    $sql = "SELECT COUNT(*) as count FROM tabuser WHERE Gender = 'Female' AND Age > 35";
    $db = config::getConnexion();
    try {
        $query = $db->query($sql);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result['count'];
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}


function countUsers()
{
    $sql = "SELECT COUNT(*) as count FROM tabuser";
    $db = config::getConnexion();
    try {
        $query = $db->query($sql);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result['count'];
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}


function getUserByEmailAndPassword($email, $password) {
    $sql = "SELECT * FROM tabuser WHERE Semail = :email AND Spassword = :password";
    $db = config::getConnexion();
    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user ? new User($user['Iduser'], $user['Name'], $user['Surname'], $user['Age'], $user['Gender'], $user['Semail'], $user['Spassword'], $user['Img']) : null;
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

function getUserByEmail($email)
{
    $sql = "SELECT * FROM tabuser WHERE Semail = :email";
    $db = config::getConnexion();
    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}


    function showUser($id)
    {
        $sql = "SELECT * FROM tabuser WHERE idUser = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $user = $query->fetch();
            return $user;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
}