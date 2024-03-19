<?php

require_once "Student.php";

// Définition des constantes pour les informations de connexion à la base de données
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'student_poo');

try {
    // Connexion à la base de données en utilisant PDO
    $connexion = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $student = new Student($connexion, $name, $class, $marks);
    // Appel de la méthode readStudent pour lire les étudiants
    $students = $student->readStudent();
    
    // Configuration de PDO pour afficher les erreurs de requête SQL
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Affichage d'un message de succès si la connexion est établie
    echo "Connexion réussie.";
} catch(PDOException $e) {
    // Affichage d'un message d'erreur et arrêt du script si la connexion échoue
    die("ERREUR: Impossible de se connecter. " . $e->getMessage());
}
?>
