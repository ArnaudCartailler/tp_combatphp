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
  
  foreach($fighters as $user){

 ?>

  <p>
    Pseudo : <?php echo $user->getPseudo(); ?>
  </p>

  <p>
    Health: <?php echo $user->getDamage(); ?>
  </p>



    <fieldset>

      <legend>Qui frapper ?</legend>
      <p>
<?php

$fighters = $userManager->getUsers($user->getPseudo());

if (empty($fighters))
{
  echo 'Personne à frapper !';
}

else

{

  foreach ($fighters as $user)
    echo '<a href="?frapper=', $user->id(), '">', htmlspecialchars($user->pseudo()), '</a> (damage : ', $user->damage(), ')<br />';
}

?>
      </p>
    </fieldset>


<?php

  }

   include("template/footer.php");
 
?>