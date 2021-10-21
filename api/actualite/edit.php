<?php
use Actualite\Entity\Actualite;
require_once('../../php/database/connexion.php');

require '../Entity/Actualite.php';
        $actualite = new Actualite;
        $actualite->setId($_POST['id']);
        $actualite->setTitre($_POST['titre']);
        $actualite->setDescription($_POST['description']);
        edit_actualite($actualite);
        function edit_actualite($actualite){
            $connexion = connect_bd();
            $target_dir = "../../uploads/";
            print_r($_FILES);
            $target_file = $target_dir . basename($_FILES["file"]["name"]);
            move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

            $query = "UPDATE actualite SET titre=:titre,description=:description,filename=:image WHERE id=:id";
            $stmt = $connexion->prepare($query);
            $stmt->bindParam(':id',$actualite->getId());
            $stmt->bindParam(':titre',$actualite->getTitre());
            $stmt->bindParam(':description',$actualite->getDescription());
            $stmt->bindParam(':image',basename($_FILES["file"]["name"]));
            $stmt->execute();

}