<?php 

namespace App;

class Admin {

    private $id;

    private $login; 

    private $password;
    
    private $inserted_at; 


    function __construct()
    {
        return $this;
    }

    public function get_Id() : ?int
    {
      return $this->id;
    }

    public function get_Login() : string
    {
      return htmlentities($this->login);
    }

    public function get_Password() : string
    {
      return $this->password;
    }

    public function get_InsertedAt() : string
    {
      $date = new \DateTime($this->inserted_at);
      return $date->format('d-m-Y H:i:s');
    }

}