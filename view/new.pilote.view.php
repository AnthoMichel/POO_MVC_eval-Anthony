<?php ob_start(); ?>

<form method="POST" action="<?= URL ?>pilotes/pvalid">
<div class="form-group">
    <label for="nom">Nom du pilote</label>
    <input type="text" class="form-control" name="nom" id="nom">
</div>
<div class="form-group">
    <label for="prenom">Prénom du pilote</label>
    <input type="text" class="form-control" name="prenom" id="prenom">
</div>
<button type="submit" class="btn btn-primary">Ajouter</button>
</form>


<?php 
$content = ob_get_clean();
$title = "Bienvenue chez VTC1423";
require_once "base.html.php" 



?>