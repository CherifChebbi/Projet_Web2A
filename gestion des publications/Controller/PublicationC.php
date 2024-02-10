<?php

require_once '../../config.php';
require_once '../../Model/Publication.php';

class PublicationC extends Publication
{

    function showPublication($libelle)
    {
        $sql = "SELECT * FROM publication WHERE date_pub LIKE '%" . $libelle . "%'";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $publication = $query->fetchAll();
            return $publication;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function AddPublication($Publication)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare('INSERT INTO publication values(NULL,:contenu,:date_pub,:user_id,:user,:user_img) ');

            $query->bindValue(':contenu', $Publication->getContenu());
            $query->bindValue(':date_pub', $Publication->getdate());
            $query->bindValue(':user_id', $Publication->getuser_id());
            $query->bindValue(':user', $Publication->getuser());
            $query->bindValue(':user_img', $Publication->getuser_img());

            $query->execute();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    //----------------------------------------//
    public function getPublications($start_index, $num_per_page)
     {
        // Connexion à la base de données
        $bdd =config::getConnexion();

        // Récupération des publications et de leur nombre de commentaires
        $query = "SELECT publication.id_pub, publication.contenu, publication.date_pub, publication.user_id, publication.user,publication.user_img,COUNT(commentaire.id) AS nb_commentaires
                FROM publication
                LEFT JOIN commentaire ON publication.id_pub = commentaire.id_pub
                GROUP BY publication.id_pub
                ORDER BY  date_pub DESC
                LIMIT $start_index, $num_per_page";
       
        try{
            $result = $bdd->query($query);
            return $result;
        } catch(Exception $e){
            die('Error:'.$e->getMessage());
        }
    }
    
    public function getTotalRecords() {
        $pdo = config::getConnexion();
        $stmt = $pdo->query('SELECT COUNT(*) FROM publication');
        return $stmt->fetchColumn();
    }
    //------------------------------------------//
    public function listPublication()
    {
        $sql="SELECT * FROM publication  ORDER BY date_pub DESC";
        $db=config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        } catch(Exception $e){
            die('Error:'.$e->getMessage());
        }
    }
    public function listPublication2()
    {
        // Connexion à la base de données
        $bdd =config::getConnexion();

        // Récupération des publications et de leur nombre de commentaires
        $query = "SELECT publication.id_pub, publication.contenu, publication.date_pub, publication.user_id,publication.user,publication.user_img, COUNT(commentaire.id) AS nb_commentaires
                FROM publication
                LEFT JOIN commentaire ON publication.id_pub = commentaire.id_pub
                GROUP BY publication.id_pub
                ORDER BY  date_pub DESC";
       
        try{
            $result = $bdd->query($query);
            return $result;
        } catch(Exception $e){
            die('Error:'.$e->getMessage());
        }
    }

    public function listPublication_id($id_pub)
    {
        $sql="SELECT * FROM publication  WHERE id_pub=$id_pub";
        $db=config::getConnexion();
        try{
            $query = $db->prepare($sql);
            $query->execute();

            $liste = $query->fetchAll();
            return $liste;
        } catch(Exception $e){
            die('Error:'.$e->getMessage());
        }
    }
    
    
    public function updatePublication($Publication)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare('UPDATE publication SET contenu=:contenu, date_pub=:date_pub WHERE id_pub=:num LIMIT 1');
            $query->bindValue(':num', $Publication->getid());
            $query->bindValue(':contenu', $Publication->getContenu());
            $query->bindValue(':date_pub', $Publication->getdate());
           
            $query->execute();
        } catch (PDOException $e) {
            echo 'On va regler ce probleme' . $e->getMessage();
        }

    }
  
    public function deletePublication($id)
    {
        $db=config::getConnexion();
        $sql="DELETE FROM publication WHERE id_pub=:id";
        $req=$db->prepare($sql);
        $req->bindValue(':id',$id);
        try{
            $req->execute();     
        } catch (Exception $e){
            $e->getMessage();
        }
    }
    
      
      
      

    
}

?>