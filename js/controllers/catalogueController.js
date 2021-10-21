myApp.controller("catalogueController",function($scope, $http, $timeout, fileUpload, $location){
    
    
  
    var REST_SERVICE_URI = 'http://localhost/Actualite';
  
    $scope.data = [];
   
    $scope.info=true;
    $scope.close_info=function(){
    $scope.info=false;
    }
  
    
  
    $scope.affiche_catalogue = function(){
      $http.get(REST_SERVICE_URI + '/api/catalogue/list.php') 
      .success(function(data){
      if (data!='err'){
      $scope.listeCatalogue=data;
      } 
      }) 
      }
  
   
    
    
    $scope.creer_catalogue = function(){
        $http({
            url: REST_SERVICE_URI + '/api/catalogue/add.php',
            method: 'POST',
            data: $scope.catalogue
        }).then(function(data){
            $scope.catalogue='';
         $scope.affiche_catalogue();
      })
    };
  
    
   
    $scope.affiche_delete_catalogue = function(data){
      var result = confirm("Voulez vous vraiment supprimer ce catalogue?");
     if (result) {
      $http({
        url: REST_SERVICE_URI + '/api/catalogue/delete.php?id='+data.id,
        method: 'DELETE',
      }).then(function(){
        $scope.affiche_catalogue();
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