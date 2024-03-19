<?php
require_once "Student.php";
// Inclusion du fichier de connexion à la base de données
require_once "config.php";

// Vérification si le formulaire a été soumis
if(isset($_POST['submit'])){
    // Récupération des données du formulaire
    $name = $_POST['name'];
    $grade = $_POST['grade'];
    $marks = $_POST['marks'];

    // Vérification si les champs ne sont pas vides
    if($name != "" && $grade != "" && $marks != "" ){
        // Appel de la méthode addStudent pour ajouter l'étudiant à la base de données
        $student->addStudent($name, $grade, $marks);
    }
}
?>
