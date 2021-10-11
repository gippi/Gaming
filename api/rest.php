<?php
 
 if($_GET['action'] === 'insert_actualite'){
   functionenregistre_actualite();
   }

 if($_GET['action'] === 'select_actualite'){
   functionselect_actualite();
   }

 if($_GET['action'] === 'edit_actualite'){
    functionedit_actualite();
   }

 if($_GET['action'] === 'delete_actualite'){
    functiondelete_actualite();
   }

 if($_GET['action'] === 'select_actualite_by_id'){
   functionselect_actualite_by_id();
   }

 function functionenregistre_actualite() {
   include "../php/connectdb.php";
   $data = file_get_contents('php://input');
   $data = json_decode($data);
   $target_dir = "../uploads/";
   print_r($_FILES);
   $target_file = $target_dir . basename($_FILES["file"]["name"]);
   move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

   $titre_actualite = $_POST['titre_actualite'];
   $description_actualite = $_POST['description_actualite'];
   $statut = 0;

	 $query = "INSERT INTO actualite (titre_actualite,description_actualite,statut,filename,date_publication) VALUES (:titre_actualite,:description_actualite,:statut, '".basename($_FILES["file"]["name"])."', NOW())";
	 $stmt = $dbhandle->prepare($query);
	 $stmt->bindParam(':titre_actualite',$titre_actualite,PDO::PARAM_STR);
   $stmt->bindParam(':description_actualite',$description_actualite,PDO::PARAM_STR);
   $stmt->bindParam(':statut',$statut,PDO::PARAM_INT) ;
   $stmt->execute();
	
	if ($dbhandle->query($query) == TRUE) {
         echo "success" . $query . "<br>" ;
     } else {
        echo "Error: " . $query . "<br>" ;
     }
}


function functionedit_actualite() {
   include "../php/connectdb.php";
   $data = file_get_contents('php://input');
   $data = json_decode($data);
   //var_dump($data->titre_actualite);die;
   /*if ($data){
   echo "succes";
   var_dump($data);die;
   }else{
    throw new Exception('error');
   }*/
   $query = "UPDATE actualite SET titre_actualite=:titre_actualite,description_actualite=:description_actualite,statut=:statut, WHERE id_actualite=:id_actualite";
   $stmt = $dbhandle->prepare($query);
   $stmt->bindParam(':id_actualite',$data->id_actualite,PDO::PARAM_STR);
   $stmt->bindParam(':titre_actualite',$data->titre_actualite,PDO::PARAM_STR);
   $stmt->bindParam(':description_actualite',$data->description_actualite,PDO::PARAM_STR);
   $stmt->bindParam(':statut',$data->statut,PDO::PARAM_INT);
   $stmt->execute();
  }
   
  function functiondelete_actualite() {
    include "../php/connectdb.php";
    $data = file_get_contents('php://input');
    $data = json_decode($data);
    
    
      $query="DELETE FROM actualite WHERE  id_actualite=:id_actualite"; 
      $stmt = $dbhandle->prepare($query);
      $stmt->bindParam(':id_actualite',$data->id_actualite,PDO::PARAM_STR);
      $stmt->execute(); 
    }

function functionselect_actualite() {
   include "../php/connectdb.php";
   $data=json_decode(file_get_contents("php://input"));
   $query="SELECT actualite.id_actualite,actualite.titre_actualite,actualite.description_actualite,actualite.statut,actualite.filename, DATE_FORMAT(date_publication, '%d/%m/%Y') AS date_publication FROM actualite ORDER BY date_publication DESC";
   $rs=$dbhandle->query($query);
   while($row=$rs->fetch()){
   $data[]=$row;
   }
   print json_encode($data);
   }

function functionselect_actualite_by_id(){
   include "../php/connectdb.php";
   $data = file_get_contents('php://input');
   $data = json_decode($data);
   $query = "SELECT * FROM actualite WHERE id_actualite =:id_actualite"; 
   $stmt = $dbhandle->prepare($query);
   $stmt->bindParam(':id_actualite',$data->id_actualite,PDO::PARAM_STR);
   $stmt->execute(); 
   $tab = $stmt->fetchAll(PDO::FETCH_ASSOC);
   print_r(json_encode($tab));
   } 

 ?>