<?php
  include("template/header.php");

  // On boucle sur notre tableau $users qui contient tous les objets User créés à partir de la base de données
  
  foreach($users as $user){
 ?>

  <p>
    Pseudo : <?php echo $user->getPseudo(); ?>
  </p>
  <p>
    ID : <?php echo $user->getId(); ?>
  </p>

 <?php
 }

   include("template/footer.php");
  ?>
