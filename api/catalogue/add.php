<?php
use Actualite\Entity\Catalogue;
require_once('../../php/database/connexion.php');
require '../Entity/Catalogue.php';


        $catalogue = new Catalogue;
        $data=json_decode(file_get_contents("php://input"));
        $catalogue->setTitre($data->titre);
        $catalogue->setDescription($data->description);
        add_catalogue($catalogue);
         

        function add_catalogue(Catalogue $catalogue){
            $connexion = connect_bd();
            $query = "INSERT INTO catalogue (titre, description, created_at) VALUES (:titre, :description, NOW())";
            $stmt = $connexion->prepare($query);
            $stmt->bindParam(':titre',$catalogue->getTitre());
            $stmt->bindParam(':description',$catalogue->getDescription());
            $stmt->execute();

            if ($connexion->query($query) == TRUE) {
                echo "success" . $query . "<br>" ;
            } else {
               echo "Error: " . $query . "<br>" ;
            }
                     
                          
            
        }
        

        
?>




