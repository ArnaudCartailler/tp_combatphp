<?php
  include("template/header.php");

  ?>
    <form action="../controllers/index.php" method="post" enctype="multipart/form-data">

    <input type="text" name="pseudo" required />
    <button type="submit" name="create" value="create"> Create </button>
    <button type="submit" name="use" value="use"> Use </button>
    
  </form>

  <?php
  // On boucle sur notre tableau $users qui contient tous les objets User créés à partir de la base de données
  
  foreach($users as $user){
 ?>

  <p>
    Pseudo : <?php echo $fighter->getPseudo(); ?>
  </p>

  <p>
    Health: <?php echo $fighter->getDamage(); ?>
  </p>


<?php

  }
  
   include("template/footer.php");
 
?>