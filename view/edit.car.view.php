<?php ob_start(); ?>

<form method="POST" action="<?= URL ?>cars/editvalid">
    <div class="form-group">
        <label for="marque">Marque de la voiture</label>
        <input type="text" class="form-control" value="<?= $car->getMarque() ?>" name="marque" id="marque">
    </div>
    <div class="form-group">
        <label for="modele">Modele de la voiture</label>
        <input type="text" class="form-control" value="<?= $car->getModele() ?>" name="modele" id="modele">
    </div>
    <div class="form-group">
        <label for="couleur">Couleur de la voiture</label>
        <input type="text" class="form-control" value="<?= $car->getCouleur() ?>" name="couleur" id="couleur">
    </div>
    <div class="form-group">
        <label for="immatriculation">Immatriculation de la voiture</label>
        <input type="text" class="form-control" value="<?= $car->getImmatriculation() ?>" name="immatriculation" id="immatriculation">
    </div>
    <input type="hidden" name="id_car" value="<?= $car->getId_vehicule()?>">
    <button type="submit" class="btn btn-primary">Ajouter</button>

</form>


<?php 
$content = ob_get_clean();
$title = "Edition de : ".$car->getMarque(). " " .$car->getModele();
require_once "base.html.php" 



?>