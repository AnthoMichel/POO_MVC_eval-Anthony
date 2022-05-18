<?php ob_start(); ?>

<form method="POST" action="<?= URL ?>cars/cvalid">
    <div class="form-group">
        <label for="marque">Marque de la voiture</label>
        <input type="text" class="form-control" name="marque" id="marque">
    </div>
    <div class="form-group">
        <label for="modele">Modele de la voiture</label>
        <input type="text" class="form-control" name="modele" id="modele">
    </div>
    <div class="form-group">
        <label for="couleur">Couleur de la voiture</label>
        <input type="text" class="form-control" name="couleur" id="couleur">
    </div>
    <div class="form-group">
        <label for="imatriculation">Immatriculation de la voiture</label>
        <input type="text" class="form-control" name="imatriculation" id="imatriculation">
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>

</form>


<?php
$content = ob_get_clean();
$title = "Ajouter une voiture";
require_once "base.html.php"



?>