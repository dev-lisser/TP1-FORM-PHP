<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Partie POST des champs

    // Validation
    $errors = [];

    if (empty($nom)) {
        $errors[] = "Le champ 'Nom' est obligatoire.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "L'adresse email n'est pas valide.";
    }

    if (strlen($message) // Condition pour le message à compléter) {
        $errors[] = "Le message doit contenir au moins 15 caractères.";
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    } else {
        echo "<h2>Données reçues :</h2>";
        // Pour la vue des données reçues
        
    }
}
?>
