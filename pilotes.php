<?php ob_start(); 
require_once "Pilote.php";


require_once "PiloteManager.php";

$piloteManager = new PiloteManager;
$piloteManager->loadPilotes();
$pilotes= $piloteManager->getPilotes();
?>

<p>- Accueil - Liste de nos Pilotes</p>


<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID Pilote</th>
      <th scope="col">nom</th>
      <th scope="col">prenom</th>
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($pilotes as $pilote) : ?>
    <tr class="table-primary">
      <th scope="row"><?= $pilote->getId_pilote() ?></th>
      <td><?= $pilote->getNom() ?></td>
      <td><?= $pilote->getPrenom() ?></td>
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