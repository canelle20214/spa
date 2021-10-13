<?php 

namespace App;

class Animal {

    private $id;
    private $name;
    private $sexe;
    private $birthday;
    private $specie;
    private $breed;
    private $description;
    private $status;
    private $arrived_at;

    function __construct()
    {
        return $this;
    }

    public function get_Id() : ?int
    {
      return $this->id;
    }

    public function get_Name() : string
    {
      return htmlentities($this->name);
    }

    public function get_Sexe() : string
    {
      return $this->sexe;
    }

    public function get_Birthday() : string
    {
      $date = new \DateTime($this->birthday);
      return "né(e) le " . $date->format('d-m-Y');
    }

    public function get_Specie() : string
    {
      return htmlentities($this->specie);
    }

    public function get_Breed() : string
    {
      return htmlentities($this->breed);
    }

    public function get_Description() : string
    {
      return htmlentities($this->description);
    }

    public function get_Status() : string
    {
      return $this->status;
    }

    public function get_StatusText() : string
    {
        switch($this->get_Status()){
            case 0:
                return "Cherche une famille";
            case 1:
                return "Réservé(e)";
            default:
                return "Adopté(e)";
        }
    }

    public function get_ArrivedAt() : string
    {
      $date = new \DateTime($this->arrived_at);
      return $date->format('d-m-Y H:i:s');
    }

    public function construct_Slug(int $id) : string
    {
      $nb = ($id * 16934) - 12 ;
      return strval($nb);
    }

}