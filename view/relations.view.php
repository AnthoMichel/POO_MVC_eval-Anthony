<?php ob_start(); 

require_once "Relation.php";
require_once "RelationManager.php";

$relationManager = new RelationManager;
$relationManager->loadRelations();
$relations= $relationManager->getRelations();
?>

<p>- Accueil - Liste des relation Pilote - Véhicule</p>



<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID associé</th>
      <th scope="col">Conducteur</th>
      <th scope="col">Vehicule</th>
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr class="table-primary">
      <th scope="row"><?= $relation->getId_association() ?></th>
      <td><?= $relation->getId_vehicule() ?></td>
      <td><?= $relation->getId_conducteur() ?></td>
      <td><a href=""><i class="fas fa-edit"></i></a></td>
      <td><a href=""><i class="fas fa-trash"></i></a></td>
    </tr>
  </tbody>
</table>






<?php 
$content = ob_get_clean();
$title = "Bienvenue chez VTC1423";
require_once "base.html.php" 



?>