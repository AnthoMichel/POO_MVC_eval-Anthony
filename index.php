<?php 


if (empty($_GET['page'])){
    require_once "view/home.view.php";
}else {
    switch($_GET['page']){
        case "accueil" : require_once "view/home.view.php";
        break;
        case "cars" : require_once "view/cars.view.php";
        break;
        case "pilotes" : require_once "view/pilotes.view.php";
        break;
        case "relation" : require_once "view/relations.view.php";
        break;
        
    }
}

?>