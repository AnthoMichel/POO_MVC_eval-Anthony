<?php
require_once "Car.php";
require_once "Manager.php";


class CarManager extends Manager {

    private $cars;

    public function addCar($car){
        $this->cars[]= $car;
    }

    public function getCars(){
        return $this->cars;
    }

    public function loadCars(){
        $req = $this->getBdd()->prepare("SELECT * FROM vehicule");
        $req->execute();
        $myCars = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($myCars as $car){
            $v = new Car($car["id_vehicule"], $car["marque"], $car["modele"], $car["couleur"], $car["immatriculation"]);
            $this->addCar($v);
        }
    }

}