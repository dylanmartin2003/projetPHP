<?php
if (!isset($_POST['mail']) || !isset($_POST['nom']))
{
	echo('Il faut un email et un message pour soumettre le formulaire.');
	
	// Arrête l'exécution de PHP
    return;
}
if (isset($_FILES['screenshot']) AND $_FILES['screenshot']['error'] == 0)
{
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['screenshot']['size'] <= 8000000)
        {
                // Testons si l'extension est autorisée
                $fileInfo = pathinfo($_FILES['screenshot']['name']);
                $extension = $fileInfo['extension'];
                $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
                if (in_array($extension, $allowedExtensions))
                {
					// On peut valider le fichier et le stocker définitivement
					move_uploaded_file($_FILES['screenshot']['tmp_name'], 'uploads/' . basename($_FILES['screenshot']['name']));
					echo "L'envoi a bien été effectué !";
                }
		}
}
?>

<p> Mail : <?php echo htmlspecialchars($_POST['mail']); ?>

<p> Nom : <?php echo $_POST['nom']; ?> </p>