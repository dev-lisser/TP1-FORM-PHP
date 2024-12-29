<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['fichier']) && $_FILES['fichier']['error'] === UPLOAD_ERR_OK) {
        $fichier = $_FILES['fichier'];
        $typeAutorises = ['image/jpeg', 'image/png'];
        $tailleMax = 1 * 1024 * 1024; // 1 Mo

        $type = $fichier['type'];
        $taille = $fichier['size'];
        $tmpName = $fichier['tmp_name'];

        // Vérification du type
        if (!in_array($type, $typeAutorises)) {
			//Message pour avertir que seul les images JPEG et PNG sont acceptés^
        }

        // Vérification de la taille
        if ($taille > $tailleMax) {
		//Message pour avertir que la taille du fichier ne doit pas dépasser 1 Mo.
        }

        // Déplacement du fichier
        $dossierCible = 'uploads/';
        if (!is_dir($dossierCible)) {
            mkdir($dossierCible, 0777, true);
        }

 // Vérification et traitement du nom de fichier pour éviter les collisions
        $cheminComplet = $dossierCible . $nomFichier;
        $compteur = 1;
        while (file_exists($cheminComplet)) {
            $info = pathinfo($nomFichier);
            $nomSansExtension = $info['filename'];
            $extension = isset($info['extension']) ? '.' . $info['extension'] : '';
            $cheminComplet = $dossierCible . $nomSansExtension . '_' . $compteur . $extension;
            $compteur++;
        }

        if (move_uploaded_file($tmpName, $dossierCible . $nomFichier)) {
            // Message pour avertir que le fichier a bien été téléversé en indiquant également le nom du fichier 
        } else {
            echo "Erreur lors du téléversement.";
        }
    } else {
		//Message pour avertir qu'aucun fichier est téléversé !
    }
}
?>
