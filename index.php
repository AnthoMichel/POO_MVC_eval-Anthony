<?php 
define("URL" , str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http") . 
"://".$_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] ));

require_once "controller/CarController.php";
require_once "controller/PiloteController.php";

$carController = new CarController;
$piloteController = new PiloteController;

if (empty($_GET['page'])){
    require_once "view/home.view.php";
}else {
    $url = explode("/", filter_var($_GET['page'],FILTER_SANITIZE_URL));
    switch($url[0]){
        case "accueil" : require_once "view/home.view.php";
        break;
        case "cars" : 
            if (empty($url[1])){
                $carController->displayCars();
            } elseif ($url[1]==="add"){
                $carController->newCarForm();
            } elseif ($url[1]==="edit"){
                echo "Modifier une voiture";
            } elseif ($url[1]==="delete"){
                echo "Supprimer une voiture";
            }
        break;
        case "pilotes" : 
            if (empty($url[1])){
                $piloteController->displayPilotes();
            }elseif ($url[1]==="add"){
                echo "Ajouter un pilote";
            } elseif ($url[1]==="edit"){
                echo "Modifier un pilote";
            } elseif ($url[1]==="delete"){
                echo "Supprimer un pilote";
            }
        break;
        case "relation" : require_once "view/relations.view.php";
        break;
        
    }
}

?>