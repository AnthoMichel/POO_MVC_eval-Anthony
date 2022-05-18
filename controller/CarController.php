<?php 
require_once "./modele/CarManager.php";

class CarController {
    private $carManager;

    public function __construct(){
        $this->carManager = new CarManager;
        $this->carManager->loadCars();
    }

    public function displayCars(){
        $cars = $this->carManager->getCars();
        require_once "view/cars.view.php";
    }

    public function newCarForm(){
        require_once "view/new.car.view.php";
    }

    public function newCarValidation(){
        $this->carManager->newCarDB($_POST["marque"],$_POST["modele"], $_POST["couleur"], $_POST["immatriculation"]);
        header('Location:'.URL."cars");
    }

    public function editCarForm($id) {
        $car = $this->carManager->getCarById($id);
        require_once "./view/edit.car.view.php";
    }

    public function editCarValidation(){
        $this->carManager->editCarDB($_POST['id_vehicule'], $_POST['marque'], $_POST['modele'], $_POST['couleur'], $_POST['immatriculation']);
        header('Location:'.URL."cars");
    }
}



