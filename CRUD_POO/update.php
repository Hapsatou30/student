<?php
// Inclusion du fichier de connexion à la base de données
require_once "config.php";
require_once "Student.php";

// Vérification si les données du formulaire ont été envoyées
if(isset($_POST["submit"])){
    // Récupération des données du formulaire
    $id = $_GET["id"]; // Récupérer l'ID de l'étudiant à partir de la requête GET
    $name = $_POST["name"];
    $grade = $_POST["grade"];
    $marks = $_POST["marks"];
    // Appel de la méthode updateStudent pour mettre à jour les données de l'étudiant
    $student->updateStudent($id, $name, $grade, $marks);

    // Redirection vers la page index.php après la mise à jour réussie
    header("Location: index.php");
    exit(); // Assurez-vous d'arrêter l'exécution du script après la redirection
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - MYSQL - CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>

<body>
<section>
    <h1 style="text-align: center;margin: 50px 0;">Update Data</h1>
    <div class="container">
        <?php  
            // Requête pour sélectionner les données de l'étudiant à partir de l'ID fourni dans la requête GET
            $sql_query = "SELECT * FROM results WHERE id = :id";
            
            // Préparation de la requête
            $stmt = $connexion->prepare($sql_query);
            
            // Liaison des valeurs aux paramètres
            $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
            
            // Exécution de la requête
            if ($stmt->execute()) {
                // Récupération des résultats de la requête
                $student = $stmt->fetch(PDO::FETCH_ASSOC);
                // Récupération des données de l'étudiant
                $Id = $student['id'];
                $Name = $student['name'];
                $Grade = $student['class'];
                $Marks = $student['marks'];
            } else {
                // Gestion de l'erreur en cas d'échec de l'exécution de la requête
                echo "Erreur lors de la récupération des données de l'étudiant.";
            }
            ?>
        <form action="update.php?id=<?php echo $Id; ?>" method="post">
            <div class="row">
                <div class="form-group col-lg-4">
                    <label for="">Student Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?php echo $Name ?>" required>
                </div>
                <div class="form-group col-lg-3">
                    <label for="">Grade</label>
                    <select name="grade" id="grade" class="form-control" required>
                        <option value="">Select a Grade</option>
                        <option value="grade6" <?php if($Grade == "grade6"){ echo "selected"; } ?>>Grade 6</option>
                        <option value="grade7" <?php if($Grade == "grade7"){ echo "selected"; } ?>>Grade 7</option>
                        <option value="grade8" <?php if($Grade == "grade8"){ echo "selected"; } ?>>Grade 8</option>
                        <option value="grade9" <?php if($Grade == "grade9"){ echo "selected"; } ?>>Grade 9</option>
                        <option value="grade10" <?php if($Grade == "grade10"){ echo "selected"; } ?>>Grade 10</option>
                    </select>
                </div>
                <div class="form-group col-lg-3">
                    <label for="">Marks</label>
                    <input type="text" name="marks" id="marks" class="form-control" value="<?php echo $Marks ?>" required>
                </div>
                <div class="form-group col-lg-2" style="display: grid;align-items: flex-end;">
                    <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Update">
                </div>
            </div>
        </form>
       
    </div>
</section>

</body>
</html>
