<?php

    
require_once('../../php/database/connexion.php');
        
        $connexion = connect_bd();
        $query="DELETE FROM actualite WHERE  id=:id"; 
        $stmt = $connexion->prepare($query);
        $stmt->bindParam(':id',$id = $_GET['id'],PDO::PARAM_INT);
        $stmt->execute(); 
        
