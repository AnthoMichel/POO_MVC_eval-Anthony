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
            } elseif ($url[1]==="cvalid"){
                $carController->newCarValidation();
            } elseif ($url[1]==="edit"){
                $carController->editCarForm($url[2]);
            } elseif ($url[1]==="editvalid"){
                $carController->editCarValidation();
            }elseif ($url[1]==="delete"){
                $carController->deleteCar($url[2]);
            }
        break;
        case "pilotes" : 
            if (empty($url[1])){
                $piloteController->displayPilotes();
            }elseif ($url[1]==="add"){
                $piloteController->newPiloteForm();
            }elseif ($url[1]==="pvalid"){
                $piloteController->newPiloteValidation();
            } elseif ($url[1]==="edit"){
                $piloteController->editPiloteForm($url[2]);
                
            }
             elseif ($url[1]==="editvalid"){
                
                $piloteController->editPiloteValidation();}
            // } elseif ($url[1]==="delete"){
            //     $piloteController->deletePilote($url[2]);
            // }
        break;
        case "relation" : require_once "view/relations.view.php";
        break;
        
    }
}

?>