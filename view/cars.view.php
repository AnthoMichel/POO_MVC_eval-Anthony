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
      <td><a href="<?= URL ?>cars/edit/<?= $car->getId_vehicule() ?>"><i class="fas fa-edit"></i></a></td>
      <td>
      <form action="<?= URL ?>cars/delete/<?= $car->getId_vehicule() ?>" method="POST" 
                            onSubmit=" return confirm('Êtes-vous certain de vouloir supprimer ce jeu ?')">
                <button class="btn" type="submit"><i class="fas fa-trash"></i></button>
            </form>      
      </td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>

  <a class="btn btn-success d-block w-25 m-auto" href="<?= URL ?>cars/add">Ajouter une voiture</a>



<?php 
$content = ob_get_clean();

$title = "Bienvenue chez VTC1423";
require_once "base.html.php" 
?>