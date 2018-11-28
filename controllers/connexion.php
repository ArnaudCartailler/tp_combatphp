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

if(isset($_POST['name']) && !empty($_POST['name']))
{
    $name = htmlspecialchars($_POST['name']);

    if(isset($_POST['add']))
    {
        if($characterManager->checkIfExist($name))
        {

            $message = "Le personnage existe déjà";
        }
                else
                    {   
                    $character = new Character([
                        'name'=> $name
                    ]);

                    $characterManager->add($character);

                    $_SESSION['character'] = $character;

                    header('Location : index.php');

                    }
    }

        elseif(isset($_POST['use']))
        {

            if($characterManager->checkIfExist($name)) 
            {
                
                $character = $characterManager->getCharacter($name);

                $_SESSION['character'] = $character;

                header('Location : index.php');

            }
                else
                {
                    $message = "Erreur";
                }
        }
}

include "../views/connexionView.php";

?>