<?php

// On enregistre notre autoload.

function chargerClasse($classname)
{
    if(file_exists('../model/'. $classname.'.php'))
    {
        require '../model/'. $classname.'.php';
    }
    else 
    {
        require '../entities/' . $classname . '.php';
    }
}

spl_autoload_register('chargerClasse');

// On instancie un manager pour nos users
// En argument, on lui passe l'objet PDO retourné par la méthode DB(), de la classe Database

$userManager = new UserManager(Database::DB());

// On instancie la classe User pour créer un nouvel objet $newUser
// On passe en argument un tableau associatif
// L'objet n'est pas encore enregistré en base de données. Il existe uniquement dans notre code PHP

$newUser = new User([
    "pseudo" => "Albert"
]);

// C'est notre manager qui se charge d'enregistrer notre nouvel objet $newUser en base de données

$userManager->addUser($newUser);

// On récupère tous les users de la base de données grâce à notre manager
// On les stocke dans la variable $users

$users = $userManager->getUsers();

// On appelle enfin notre vue pour afficher nos users

include "../views/indexVue.php";

 ?>
