<?php
  include("template/header.php");

  // Si une variable $message existe
  if (isset($message))
  {
      echo '<p>' . $message . '</p>';
  }

 ?>

<form action="" method="POST">
<label for="name">Nom du personnage : </label><br>
<input id="name" name="name" type="text" placeholder="Ex: Coco l'asticot" required><br>
<input type="submit" name="add" value="Créer le personnage"><br>
<input type="submit" name="use" value="Utiliser le personnage">
</form>

 <?php
   include("template/footer.php");
  ?>