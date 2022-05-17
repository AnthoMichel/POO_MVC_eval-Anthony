<?php ob_start() ?>

<p>- Accueil - Liste de nos Véhicules</p>


<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID Véhicule</th>
      <th scope="col">Marque</th>
      <th scope="col">Modele</th>
      <th scope="col">Couleur</th>
      <th scope="col">Immatriculation</th>
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($cars as $car) : ?>
    <tr class="table-primary">
      <td><?= $car->getId_vehicule() ?></th>
      <td><?= $car->getMarque() ?></td>
      <td><?= $car->getModele() ?></td>
      <td><?= $car->getCouleur() ?></td>
      <td><?= $car->getImmatriculation() ?></td>
      <td><a href=""><i class="fas fa-edit"></i></a></td>
      <td><a href=""><i class="fas fa-trash"></i></a></td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>

<?php 
$content = ob_get_clean();

$title = "Bienvenue chez VTC1423";
require_once "base.html.php" 
?>