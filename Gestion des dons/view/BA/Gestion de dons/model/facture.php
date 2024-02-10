<?php
class facture{
    private $facture_id;
    private $name;
    private $description;
    private $payement_id;
    
    public function __construct($name, $description,$payement_id){
        $this->name=$name;
        $this->description=$description;
        $this->payement_id=$payement_id;
       
       }

        public function getname(){
            return $this->name; 
        }
        public function getdescription(){
            return $this->description; 
        }
        public function getpayement_id(){
            return $this->payement_id; 
        }
        
        public function setname($name){
            $this->name=$name; 
        }
        public function setdescription($description){
            $this->description=$description; 
        }
        public function setpayement_id($payement_id){
            $this->payement_id=$payement_id; 
        }
       
        
}
?>