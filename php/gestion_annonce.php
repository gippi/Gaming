<?php
 
 if($_GET['action'] === 'insert_actualite'){
        functionenregistre_actualite();
    }
	
 if($_GET['action'] === 'select_actualite'){
    functionselect_actualite();
    }
	

	


	
 function functionenregistre_actualite() {
    include "connectdb.php";
	$data=json_decode(file_get_contents("php://input"));
    /*$nom_produit = $data->nom_produit;
    $prix_produit = $data->prix_produit;
    $description_produit = $data->description_produit;*/

	 $titre_actualite = $_POST['titre_actualite'];
	 $description_actualite = $_POST['description_actualite'];
	 	echo $description_actualite;
	$query = "INSERT INTO actualite (titre_actualite,description_actualite,date_publication) VALUES (:titre_actualite,:description_actualite, NOW())";
	$stmt = $dbhandle->prepare($query);
	$stmt->bindParam(':titre_actualite',$titre_actualite,PDO::PARAM_STR);
	$stmt->bindParam(':description_actualite',$description_actualite,PDO::PARAM_STR);
    $stmt->execute();
	
	if ($dbhandle->query($query) == TRUE) {
         echo "success" . $query . "<br>" ;
     } else {
        echo "Error: " . $query . "<br>" ;
     }
	
	}
	
	
	
	function functionselect_actualite() {
	    include "connectdb.php";
	    $data=json_decode(file_get_contents("php://input"));
        $query="SELECT actualite.titre_actualite,actualite.description_actualite, FROM actualite ORDER BY date_publication ASC";
		$rs=$dbhandle->query($query);
        while($row=$rs->fetch()){
        $data[]=$row;
        }
        print json_encode($data);
       }
	   
	 
	   
 ?>