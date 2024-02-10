<?php
include '../../config/config.php';
include '../../model/payement.php'; 

class payementc
{
    public function listpayement()
    {
        $sql="SELECT * FROM payement";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        }catch (Exception $e)
        {   die ('Error:'. $e->getMessage());}
    }

    public function deletepayement($id)
    {
        $sql = "DELETE FROM payement WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addpayement($payementc)
    {
        $sql = "INSERT INTO payement  (nomsociete,montant, methode_payment,wallet_id,datee) VALUES ( :nomsociete,:montant, :methode_payment,:wallet_id, :datee)";
        
        $db = config::getConnexion();
        try {
          
            $query = $db->prepare($sql);
            $query->execute([
                'nomsociete' => $payement->getnomsociete(),
                'montant' => $payement->getmontant(),
                'methode_payment' => $payement->getmethode_payment(),
                'wallet_id' => $payement->getwallet_id(),
                'datee' => $payement->getdatee()->format('Y/m/d')
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
	
    
    
}

?>