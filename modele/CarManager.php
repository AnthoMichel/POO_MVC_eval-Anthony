<?php
require_once "Car.php";
require_once "Manager.php";


class CarManager extends Manager
{

    private $cars;

    public function addCar($car)
    {
        $this->cars[] = $car;
    }

    public function getCars()
    {
        return $this->cars;
    }

    public function loadCars()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM vehicule");
        $req->execute();
        $myCars = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach ($myCars as $car) {
            $v = new Car($car["id_vehicule"], $car["marque"], $car["modele"], $car["couleur"], $car["immatriculation"]);
            $this->addCar($v);
        }
    }

    public function newCarDB($marque, $modele, $couleur, $immatriculation)
    {
        $req = "INSERT INTO vehicule (marque, modele, couleur, immatriculation)
        VALUES (:marque, :modele, :couleur, :immatriculation)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":marque", $marque, PDO::PARAM_STR);
        $stmt->bindValue(":modele", $modele, PDO::PARAM_STR);
        $stmt->bindValue(":couleur", $couleur, PDO::PARAM_STR);
        $stmt->bindValue(":immatriculation", $immatriculation, PDO::PARAM_STR);
        $result = $stmt->execute();
        $stmt->closeCursor();

        if ($result) {
            $car = new Car($this->getBdd()->lastInsertId(), $marque, $modele, $couleur, $immatriculation);
            $this->addCar($car);
        }
    }


    public function getCarById($id){
        foreach ($this->cars as $car){
            if($car->getId_vehicule() == $id){
                return $car;
            }
        }
    }

    public function editCarDB($id, $marque, $modele, $couleur, $immatriculation){
        $req = "UPDATE vehicule SET marque = :marque, modele = :modele, couleur = :couleur, immatriculation = :immatriculation WHERE id = :id_vehicule";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":marque", $marque, PDO::PARAM_STR);
        $stmt->bindValue(":modele", $modele, PDO::PARAM_STR);
        $stmt->bindValue(":couleur", $couleur, PDO::PARAM_STR);
        $stmt->bindValue(":immatriculation", $immatriculation, PDO::PARAM_STR);
        $result = $stmt->execute();
        $stmt->closeCursor();
        
        if($result){
            $this->getCarById($id)->setMarque($marque);
            $this->getCarById($id)->setModele($modele);
            $this->getCarById($id)->setCouleur($couleur);
            $this->getCarById($id)->setImmatriculation($immatriculation);
        }
    }
}
