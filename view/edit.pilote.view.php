<?php ob_start(); ?>

<form method="POST" action="<?= URL ?>pilotes/editvalid">
    <div class="form-group">
        <label for="nom">Nom du pilote</label>
        <input type="text" class="form-control" value="<?= $pilote->getNom() ?>" name="nom" id="nom">
    </div>
    <div class="form-group">
        <label for="prenom">Prénom du pilote</label>
        <input type="text" class="form-control" value="<?= $pilote->getPrenom() ?>" name="prenom" id="prenom">
    </div>
    <input type="hidden" name="id_pilote" value="<?= $pilote->getId_pilote()?>">
    <button type="submit" class="btn btn-primary">Ajouter</button>

</form>


<?php 
$content = ob_get_clean();
$title = "Edition de : " .$pilote->getNom(). " ". $pilote->getPrenom();
require_once "base.html.php" 



?>