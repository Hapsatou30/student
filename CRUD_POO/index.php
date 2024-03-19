<?php
// Inclure le fichier contenant la classe Student
require_once "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Déclaration des métadonnées -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Titre de la page -->
    <title>PHP - MYSQL - CRUD</title>
    <!-- Inclusion du CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- Inclusion du JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</head>

<body>
    <!-- Section principale de la page -->
    <section>
        <!-- Titre principal -->
        <h1 style="text-align: center;margin: 50px 0;">PHP CRUD operations with MySQL</h1>
        <!-- Conteneur principal -->
        <div class="container">
            <!-- Formulaire d'ajout de données avec la méthode POST et l'action "adddata.php" -->
            <form action="adddata.php" method="post">
               <!-- Ligne du formulaire avec les champs -->
               <div class="row">
                    <!-- Champ pour le nom de l'étudiant -->
                    <div class="form-group col-lg-4">
                        <label for="">Student Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <!-- Champ pour le grade de l'étudiant -->
                    <div class="form-group  col-lg-3">
                        <label for="">Grade</label>
                        <select name="grade" id="grade" class="form-control" required>
                            <!-- Option pour sélectionner le grade -->
                            <option value="">Select a Grade</option>
                            <option value="grade6">Grade 6</option>
                            <option value="grade7">Grade 7</option>
                            <option value="grade8">Grade 8</option>
                            <option value="grade9">Grade 9</option>
                            <option value="grade10">Grade 10</option>
                        </select>
                    </div>
                    <!-- Champ pour les notes de l'étudiant -->
                    <div class="form-group col-lg-3">
                        <label for="">Marks</label>
                        <input type="number" name="marks" id="marks" class="form-control" required>
                    </div>
                    <!-- Bouton de soumission du formulaire -->
                    <div class="form-group col-lg-2" style="display: grid;align-items:  flex-end;">
                        <input type="submit" name="submit" id="submit" class="btn btn-primary">
                    </div>
               </div>
            </form>
        </div>
    </section>
<section style="margin: 50px 0;">
    <!-- Conteneur principal -->
    <div class="container">
        <!-- Tableau pour afficher les données -->
        <table class="table table-dark">
            <thead>
                <!-- En-têtes de colonne -->
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Studen Name</th>
                    <th scope="col">Grade</th>
                    <th scope="col">Marks</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student) { ?>
                <!-- Affichage des données dans les lignes du tableau -->
                <tr class="trow">
                    <td><?php echo $student['id']; ?></td>
                    <td><?php echo $student['name']; ?></td>
                    <td><?php echo $student['class']; ?></td>
                    <td><?php echo $student['marks']; ?></td>
                    <!-- Bouton pour éditer les données avec un lien vers updatedata.php -->
                    <td><a href="update.php?id=<?php echo $student['id']; ?>" class="btn btn-primary">Edit</a></td>
                    <!-- Bouton pour supprimer les données avec un lien vers deletedata.php -->
                    <td><a href="delete.php?id=<?php echo $student['id']; ?>" class="btn btn-danger">Delete</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>

</body>

</html>
