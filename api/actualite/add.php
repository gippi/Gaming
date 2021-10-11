<?php
use Actualite\Entity\Actualite;
require_once('../../php/database/connexion.php');
require '../Entity/Actualite.php';


        $actualite = new Actualite;
        $actualite->setTitre($_POST['titre']);
        $actualite->setDescription($_POST['description']);
        $actualite->setStatut(0);
        add_actualite($actualite);
         

        function add_actualite(Actualite $actualite){
            $connexion = connect_bd();
            $data = file_get_contents('php://input');
            $data = json_decode($data);
            $target_dir = "../../uploads/";
            print_r($_FILES);
            $target_file = $target_dir . basename($_FILES["file"]["name"]);
            move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

            
            $query = "INSERT INTO actualite (titre, description, filename, statut, date_publication) VALUES (:titre, :description, :image, :statut, NOW())";
            $stmt = $connexion->prepare($query);
            $stmt->bindParam(':titre',$actualite->getTitre());
            $stmt->bindParam(':description',$actualite->getDescription());
            $stmt->bindParam(':statut',$actualite->getStatut());
            $stmt->bindParam(':image',basename($_FILES["file"]["name"])) ;
            $stmt->execute();

            if ($connexion->query($query) == TRUE) {
                echo "success" . $query . "<br>" ;
            } else {
               echo "Error: " . $query . "<br>" ;
            }
                     
                          
            
        }
        

        
?>




