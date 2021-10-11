<?php

require_once('../../php/database/connexion.php');
require '../Entity/Actualite.php';

        list_actualite();

        function list_actualite(){
        $connexion = connect_bd();
        $data=json_decode(file_get_contents("php://input"));
        $query="SELECT actualite.id,actualite.titre,actualite.description,actualite.statut,actualite.filename, DATE_FORMAT(date_publication, '%d/%m/%Y') AS date_publication FROM actualite ORDER BY date_publication DESC";
        $rs=$connexion->query($query);
        while($row=$rs->fetch()){
        $data[]=$row;
        }
        print json_encode($data);
    }