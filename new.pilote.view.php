<?php ob_start(); ?>

<form method="POST" action="<?= URL ?>pilotes/pvalid"></form>


<?php 
$content = ob_get_clean();
$title = "Bienvenue chez VTC1423";
require_once "base.html.php" 



?>