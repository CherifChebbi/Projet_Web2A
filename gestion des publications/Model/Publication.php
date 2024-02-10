<?php

class Publication
{
    private int $id_pub;

    private string $Contenu;

    private string $date_pub;

    private string $user_id;

    private string $user;

    private string $user_img;

    public function publication(string $Contenu,string $date_pub,string $user_id,string $user,string $user_img)
    {
        $this->Contenu = $Contenu;
        $this->date_pub = $date_pub;
        $this->user_id = $user_id;
        $this->user = $user;
        $this->user_img = $user_img;
    }

    //GETTERS :
    public function getid()
    {
        return $this->id;
    }
    public function getContenu()
    {
        return $this->Contenu;
    }
    public function getdate()
    {
        return $this->date_pub;
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
    public function setContenu(string $Contenu)
    {
        $this->Contenu = $Contenu;
    }
    public function setdate(string $date_pub)
    {
        $this->date_pub = $date_pub;
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