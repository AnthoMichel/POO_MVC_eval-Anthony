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
}



