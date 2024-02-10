<?php
include '../../config/config.php';
include '../../model/facture.php'; 

class facturec
{
    public function listfacture()
    {
        $sql="SELECT * FROM facture";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        }catch (Exception $e)
        {   die ('Error:'. $e->getMessage());}
    }

    public function deletefacture($facture_id)
    {
        $sql = "DELETE FROM facture WHERE facture_id = :facture_id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':facture_id', $facture_id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addfacture($facturec)
    {
        $sql = "INSERT INTO facture  (facture_id,namee, descriptionn,payement_id) VALUES ( :facture_id,:namee, :descriptionn,:payement_id,)";
        
        $db = config::getConnexion();
        try {
          
            $query = $db->prepare($sql);
            $query->execute([
                'facture_id' => $facture->getfacture_id(),
                'name' => $facture->getname(),
                'description' => $facture->getdescription(),
                'payement_id' => $facture->getpayement_id(),
                
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
	
    
    
}

?>