<?php

require_once "config.php";
require_once "Student.php";
// Vérification si l'ID de l'étudiant à supprimer est passé dans la requête GET
if(isset($_GET['id'])) {
    // Récupération de l'ID de l'étudiant à supprimer
    $id = $_GET['id'];
    
    // Appel de la méthode deleteStudent pour supprimer l'étudiant
    $student->deleteStudent($id);
    
    // Redirection vers la page index.php après la suppression réussie
    header("Location: index.php");
    exit(); // Assurez-vous d'arrêter l'exécution du script après la redirection
} else {
    // Gérer le cas où l'ID de l'étudiant n'est pas disponible dans la requête GET
    echo "ID de l'étudiant non spécifié.";
}
?>
