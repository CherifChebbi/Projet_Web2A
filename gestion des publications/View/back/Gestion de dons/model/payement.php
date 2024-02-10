<?php
class payement{
    private $id;
    private $nomsociete;
    private $montant;
    private $methode_payment;
    private $wallet_id;
    private $datee;
    public function __construct($nomsociete, $montant,$methode_payment,$datee,$wallet_id){
        $this->nomsociete=$nomsociete;
        $this->montant=$montant;
        $this->methode_payment=$methode_payment;
        $this->wallet_id=$wallet_id;
        $this->datee=$datee;}

        public function getnomsociete(){
            return $this->nomsociete; 
        }
        public function getmontant(){
            return $this->montant; 
        }
        public function getmethode_payment(){
            return $this->methode_payment; 
        }
        public function getwallet_id(){
            return $this->wallet_id; 
        }
        public function getdatee(){
            return $this->datee; 
        }
        public function setnomsociete($nomsociete){
            $this->nomsociete=$nomsociete; 
        }
        public function setmontant($montant){
            $this->montant=$montant; 
        }
        public function setmethode_payment($methode_payment){
            $this->methode_payment=$commetnaire; 
        }
        public function setwallet_id($wallet_id){
            $this->wallet_id=$wallet_id; 
        }
        public function setdatee($datee){
            $this->datee=$datee; 
        }
        
}
?>