<?php

class Commentaire
{
    
    private int $id;

    private int $id_pub;

    private string $contenu_com;

    private string $date_com;

    private string $user_id;

    private string $user;

    private string $user_img;

    public function commentaire(int $id_pub,string $contenu_com,string $date_com,string $user_id,string $user,string $user_img)
    {
        $this->id_pub = $id_pub;
        $this->contenu_com = $contenu_com;
        $this->date_com = $date_com;
        $this->user_id = $user_id;
        $this->user = $user;
        $this->user_img = $user_img;
    }

    //GETTERS :
    public function getid()
    {
        return $this->id;
    }
    public function getid_pub()
    {
        return $this->id_pub;
    }
    public function getContenu()
    {
        return $this->contenu_com;
    }
    public function getdate()
    {
        return $this->date_com;
    }
    public function getuser_id()
    {
        return $this->user_id;
    }
    public function getuser()
    {
        return $this->user;
    }
    public function getuser_img()
    {
        return $this->user_img;
    }

    //SETTERS :
    public function setid(int $id)
    {
        $this->id = $id;
    }
    public function setid_pub(int $id_pub)
    {
        $this->id_pub = $id_pub;
    }
    public function setContenu(string $contenu_com)
    {
        $this->contenu_com = $contenu_com;
    }
    public function setdate(string $date_com)
    {
        $this->date_com = $date_com;
    }
    public function setuser_id(string $user_id)
    {
        $this->user_id = $user_id;
    }
    public function setuser(string $user)
    {
        $this->user = $user;
    }
    public function setuser_img(string $user_img)
    {
        $this->user_img = $user_img;
    }
}

?>