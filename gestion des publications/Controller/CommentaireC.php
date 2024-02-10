<?php

require_once '../../config.php';
require_once '../../Model/Commentaire.php';

class CommentaireC extends Commentaire
{
    function showCommentaire($libelle)
    {
        $sql = "SELECT * FROM commentaire WHERE date_com LIKE '%" . $libelle . "%'";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $commentaire = $query->fetchAll();
            return $commentaire;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function AddCommentaire($Commentaire)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare('INSERT INTO commentaire values(NULL,:id_pub,:contenu_com,:date_com,:user_id,:user,:user_img) ');

            $query->bindValue(':id_pub', $Commentaire->getid_pub());
            $query->bindValue(':contenu_com', $Commentaire->getContenu());
            $query->bindValue(':date_com', $Commentaire->getdate());
            $query->bindValue(':user_id', $Commentaire->getuser_id());
            $query->bindValue(':user', $Commentaire->getuser());
            $query->bindValue(':user_img', $Commentaire->getuser_img());

            $query->execute();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    public function listCommentaire($id)
    {
        $sql="SELECT * FROM commentaire  WHERE id_pub=$id";
        $db=config::getConnexion();
        try{
            $query = $db->prepare($sql);
            $query->execute();

            $liste_com = $query->fetchAll();
            return $liste_com;
        } catch(Exception $e){
            die('Error:'.$e->getMessage());
        }
    }
    public function listCommentaire2()
    {
       
        $db=config::getConnexion();
        try{
            $query = $db->prepare('SELECT commentaire.*, publication.id_pub FROM commentaire JOIN publication ON commentaire.id_pub = publication.id_pub WHERE commentaire.id_pub = publication.id_pub ');
            $query->execute();

            $liste_com = $query->fetchAll();
            return $liste_com;
        } catch(Exception $e){
            die('Error:'.$e->getMessage());
        }
    }
    
    public function updateCommentaire($Commentaire)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare('UPDATE commentaire SET contenu_com=:contenu_com, date_com=:date_com WHERE id=:num LIMIT 1');
            $query->bindValue(':num', $Commentaire->getid());
            $query->bindValue(':contenu_com', $Commentaire->getContenu());
            $query->bindValue(':date_com', $Commentaire->getdate());
           
            $query->execute();
        } catch (PDOException $e) {
            echo 'On va regler ce probleme' . $e->getMessage();
        }

    }
  
    public function deleteCommentaire($id)
    {
        $db=config::getConnexion();
        $sql="DELETE FROM commentaire WHERE id=:id";
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