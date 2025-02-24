<?php
    // demarrer une session
    session_start();

    // recuperation des informations
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // recuperation des valeurs dans les champs inputs
        $name = htmlspecialchars(filter_input(INPUT_POST, 'name'));
        $email = htmlspecialchars(filter_input(INPUT_POST, 'email'));
        $message = htmlspecialchars(filter_input(INPUT_POST, 'commataire'));

        // condition verification
        if($name !== '' && $email !== '' && $message !== '' ) {
            // stockage message dans la session
            $_SESSION['message'] = "merci $name";

            // concatenation des valeurs en une variable
            $texte = "nom : $name\nemail : $email\nmessage : $message";
            
            // on definit le chemin du fichier
            $file = __DIR__ . '/commentaire.txt';

            // on ecrit le contenu dans le fichier
            file_put_contents($file, $texte);

            header("Location: form.php");
            exit();
        } else {
            $_SESSION['message'] = "un probleme est survenue";
        }
    }
?>

<!-- affichage de la confirmation du deploiement -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <h1>Success</h1>
    <p>Les informations sont bien enregistrer.</p>
</body>
</html>
