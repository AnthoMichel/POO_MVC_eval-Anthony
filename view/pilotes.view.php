<?php ob_start(); ?>

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
        <td><a href="<?= URL ?>pilotes/edit/<?= $pilote->getId_pilote() ?>"><i class="fas fa-edit"></i></a></td>
        <td>
          <form action="<?= URL ?>pilotes/delete/<?= $pilote->getId_pilote() ?>" method="POST" onSubmit=" return confirm('Êtes-vous certain de vouloir supprimer ce jeu ?')">
            <button class="btn" type="submit"><i class="fas fa-trash"></i></button>
          </form>


        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
<a class="btn btn-success d-block w-25 m-auto" href="<?= URL ?>pilotes/add">Ajouter un pilote</a>




<?php
$content = ob_get_clean();
$title = "Bienvenue chez VTC1423";
require_once "base.html.php"



?>