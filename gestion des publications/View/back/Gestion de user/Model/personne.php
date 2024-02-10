<?php
    
    class User{
        private ?int $Iduser=null;
        private ?string $Name=null;
        private ?string $Surname=null;
        private ?int $Age=null;
        private?string $Gender=null;
        private ?string $Semail=null;
        private ?string $Spassword=null;
        private ?string $Img=null;
       


        public function __construct( $Iduser = null,$N,$Sn ,$A,$G, $Se, $Sp,$Img)
        {
            $this->Iduser=$Iduser;
            $this->Name=$N;
            $this->Surname=$Sn;
            $this->Age=$A;
            $this->Gender=$G;
            $this->Semail=$Se;
            $this->Spassword=$Sp;
            $this->Img=$Img;


           

        }




        public function getIduser()
        {
            return $this->Iduser;
        }







        public function getName()
        {
            return $this->Name;
        }

            


        /**
        * Set the value of Name
        *
        * @return  self
        */
        public function setName($Name)
        {
            $this->Name = $Name;

            return $this;
        }





        public function getSurname()
        {
            return $this->Surname;
        }
        

        
        
        /**
        * Set the value of Surname
        *
        * @return  self
        */
        public function setSurname($Surname)
        {
            $this->Surname = $Surname;
    
            return $this;
        }




        public function getSemail()
        {
            return $this->Semail;
        }




        /**
        * Set the value of Semail
        *
        * @return  self
        */
        public function setSemail($Semail)
        {
            $this->Semail = $Semail;

            return $this;
        }




        public function getSpassword()
        {
            return $this->Spassword;
        }


        /**
        * Set the value of Spassword
        *
        * @return  self
        */
        public function setSpassword($Spassword)
        {
            $this->Spassword = $Spassword;

            return $this;
        }







        public function getAge() 
        {
            return $this->Age;

        }

        /**
        * Set the value of Age
        *
        * @return  self
        */

        public function setAge($Age)
        {
            $this->Age = $Age;

            return $this;


        }

        public function getGender()

        {
            return $this->Gender;
        }


        /**
         * Set the value of img
         *
         * @return  self
         */
        public function setGender($Gender)
        {
            $this->Gender = $Gender;

            return $this;
        }




        public function getImg()
        {
            return $this->Img;
        }

        /**
         * Set the value of img
         *
         * @return  self
         */
        public function setImg($Img)
        {
            $this->Img = $Img;

            return $this;
        }
        




    }