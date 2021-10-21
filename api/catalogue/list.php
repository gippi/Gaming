<?php

require_once('../../php/database/connexion.php');
require '../Entity/Catalogue.php';

        list_catalogue();

        function list_catalogue(){
        $connexion = connect_bd();
        $data=json_decode(file_get_contents("php://input"));
        $query="SELECT catalogue.id,catalogue.titre,catalogue.description, DATE_FORMAT(created_at, '%d/%m/%Y') AS created_at FROM catalogue ORDER BY created_at DESC";
        $rs=$connexion->query($query);
        while($row=$rs->fetch()){
        $data[]=$row;
        }
        print json_encode($data);
    }