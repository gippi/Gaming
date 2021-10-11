myApp.controller("actualiteController",function($scope, $http, $timeout, fileUpload, $location){
    
  $scope.previewPhoto = function(event){
    var files=event.target.files;
    var file=files[files.length-1];
    var reader=new FileReader();
    reader.onload=function(e){
    $scope.$apply(function(){
    $scope.photo=e.target.result;
    })
    }
    reader.readAsDataURL(file);
    }

  var REST_SERVICE_URI = 'http://localhost/Actualite';

  $scope.data = [];
 
  $scope.info=true;
  $scope.close_info=function(){
  $scope.info=false;
  }

  $scope.affiche_edit_actualite = function(data){
    $('#fiche_contact').slideToggle();
    $scope.actualite = data;
    
  }

  


  $scope.affiche_actualite = function(){
    $http.get(REST_SERVICE_URI + '/api/actualite/list.php') 
    .success(function(data){
    if (data!='err'){
    $scope.listeActualite=data;
    } 
    }) 
    }

 
  
  
  $scope.creer_actualite = function(){
    var uploadUrl = REST_SERVICE_URI + '/api/actualite/add.php';
     fileUpload.post(uploadUrl,$scope.actualite);
       $scope.actualite='';
       $scope.affiche_actualite();
    };

  
 
  $scope.affiche_delete_actualite = function(data){
    var result = confirm("Voulez vous vraiment supprimer cette actualité?");
   if (result) {
    $http({
      url: REST_SERVICE_URI + '/api/actualite/delete.php?id='+data.id,
      method: 'DELETE',
    }).then(function(){
      $scope.affiche_actualite();
    })
     }
    }




  $scope.alertajout=function(){
    $scope.alert_ajouter=true;
    $timeout(function(){
    $scope.alert_ajouter=false;
    },1000);
    }

    //10 seconds delay
    $timeout( function(){
      $scope.bienvenu = "Bienvenu dans le dashbord!";
    }, 5000 );

    //time
    $scope.time = 0;
  
    //timer callback
    var timer = function() {
        if( $scope.time < 5000 ) {
            $scope.time += 1000;
            $timeout(timer, 1000);
        }
    }
    
    //run!!
    $timeout(timer, 1000);  

   });