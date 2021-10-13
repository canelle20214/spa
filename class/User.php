<?php 

namespace App;

class User {

    private $id;

    private $firstname; 

    private $lastname;

    private $phone;

    private $mail; 

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

    public function get_Firstname() : string
    {
      return htmlentities($this->firstname);
    }

    public function get_Lastname() : string
    {
      return htmlentities($this->lastname);
    }

    public function get_Phone() : string
    {
      $pos = array(2,5,8,11);
      foreach($pos as $p){
        $phone = substr_replace($this->phone, " ", $p, 0);
      }
      return $phone;
    }

    public function get_InputPhone() : string
    {
      return $this->phone;
    }

    public function get_Mail() : string
    {
      return htmlentities($this->mail);
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