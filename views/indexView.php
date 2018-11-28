<?php
  include("template/header.php")
 ?>

<form action="index.php" method="POST">
  <input type="submit" name="logout" value="Changer de personnage">
</form>

<?php 

// Si une variable $message existe
if(isset($message))
{
  echo '<p>' . $message . '</p>';
}
?>

<p>Personnage utilisé : <?php echo $character->getName(); ?></p>
<p>Liste des personnages à attaquer :</p>
<ul>
  <?php
    // On liste tous les personnages
    foreach($characters as $character)
    {
      ?>

      <li><a href="index.php?id=<?= $character->getId(); ?>"><?= $character->getName() . ' - Dégâts : ' . $character->getDamages() ;?></a></li>

      <?php
    }
  ?>
</ul>

 <?php
   include("template/footer.php")
  ?>
