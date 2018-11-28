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

session_start();


$db = Database::DB();

$characterManager = new CharacterManager($db); 

if (!isset($_SESSION['character'])){

    header('Location: connexion.php');      

}
    else
    {
        $character = $_SESSION['character'];
    }

if(isset($_GET['id']))
{
    $id = (int) $_GET['id'];

    $opponent = $characterManager->getCharacter($id);
    $response = $character->attack($opponent);

    switch($response){
        case Character::ITS_ME:
            $message = "Tu te frappes ?!";
            break;
        case Character::HIT:
            $message = "L'adversaire a été touché !";
            $characterManager->update($opponent);
            break;
        case Character::KILL:
            $message = "L'ennemi est mort !";
            $characterManager->delete($opponent);
            break;
    }
} 
elseif (isset($_POST['logout']))
{
    session_destroy();
    header('Location : connexion.php');
    exit();
}

$characters = $characterManager->getCharacters();

include "../views/indexView.php";

?>