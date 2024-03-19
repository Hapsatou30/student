<?php 
    class Student{

        private $connexion;
        public $name,
               $class,
               $marks;

        public function __construct($connexion,$name,$class,$marks)
        {
            $this->connexion = $connexion;
            $this-> name= $name;
            $this-> class= $class;
            $this-> marks= $marks;
        }  
        
        public function getName()
        {
           return $this ->name; 
        } 

        public function getClass()
        {
           return $this ->class; 
        } 

        public function getMarks()
        {
           return $this ->marks; 
        } 

        public function setName($name)
        {
            return $this ->name = $name;
        }

        public function setClass($class)
        {
            return $this ->class = $class;
        }

        public function setMarks($marks)
        {
            return $this ->marks = $marks;
        }


        public function addStudent($name, $class, $marks)
        {
            try {
                // Requête SQL d'insertion avec des paramètres
                $sql = "INSERT INTO results (name, class, marks) VALUES (:name, :class, :marks)";
                
                // Préparation de la requête
                $stmt = $this->connexion->prepare($sql);
                
                // Liaison des valeurs aux paramètres
                $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                $stmt->bindParam(':class', $class, PDO::PARAM_STR);
                $stmt->bindParam(':marks', $marks, PDO::PARAM_INT);
                
                // Exécution de la requête
                $stmt->execute();
                // Redirection vers la page index.php après une insertion réussie
                header("Location: index.php");
                exit(); // Assurez-vous d'arrêter l'exécution du script après la redirection
            } catch(PDOException $e) {
                // Gestion de l'erreur en la lançant à l'extérieur de la méthode
                throw new Exception("ERREUR: Impossible d'insérer des données. " . $e->getMessage());
            }
        }

        public function readStudent()
        {
            try {
                // Requête SQL pour sélectionner tous les étudiants
                $sql = "SELECT * FROM results";
                
                // Préparation de la requête
                $stmt = $this->connexion->prepare($sql);
                
                // Exécution de la requête
                $stmt->execute();
                
                // Récupération des résultats dans un tableau associatif
                $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                // Retourne les étudiants
                return $students;
            } catch(PDOException $e) {
                // Gestion de l'erreur en la lançant à l'extérieur de la méthode
                throw new Exception("ERREUR: Impossible de lire les données des étudiants. " . $e->getMessage());
            }
        }

        public function updateStudent($id, $name, $class, $marks)
        {
            try {
                // Requête SQL de mise à jour avec des paramètres
                $sql = "UPDATE results SET name = :name, class = :class, marks = :marks WHERE id = :id";
                
                // Préparation de la requête
                $stmt = $this->connexion->prepare($sql);
                
                // Liaison des valeurs aux paramètres
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                $stmt->bindParam(':class', $class, PDO::PARAM_STR);
                $stmt->bindParam(':marks', $marks, PDO::PARAM_INT);
                
                // Exécution de la requête
                $stmt->execute();
                
                // Retourne true si la mise à jour a réussi
                return true;
                 // Redirection vers la page index.php après une insertion réussie
                 header("Location: index.php");
                 exit(); // Assurez-vous d'arrêter l'exécution du script après la redirection
            } catch(PDOException $e) {
                // Gestion de l'erreur en la lançant à l'extérieur de la méthode
                throw new Exception("ERREUR: Impossible de mettre à jour les données de l'étudiant. " . $e->getMessage());
            }
        }

        public function deleteStudent($id)
        {
            try {
                // Requête SQL de suppression avec des paramètres
                $sql = "DELETE FROM results WHERE id = :id";
                
                // Préparation de la requête
                $stmt = $this->connexion->prepare($sql);
                
                // Liaison de la valeur de l'ID au paramètre
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                
                // Exécution de la requête
                $stmt->execute();
                
                // Retourne true si la suppression a réussi
                return true;
            } catch(PDOException $e) {
                // Gestion de l'erreur en la lançant à l'extérieur de la méthode
                throw new Exception("ERREUR: Impossible de supprimer l'étudiant. " . $e->getMessage());
            }
        }



        
    }
?>