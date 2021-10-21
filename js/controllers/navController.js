var routeAppControllers = angular.module('routeAppControllers', []);


// Controleur de la page accueil
routeAppControllers.controller('accueilCtrl', ['$scope',
    function($scope){
        $scope.affiche_actualite();
	}
]);

// Contrôleur de la page actualite
routeAppControllers.controller('actualiteCtrl', ['$scope',
    function($scope){
    }
]);

// Contrôleur de la page new-actualite
routeAppControllers.controller('new-actualiteCtrl', ['$scope',
    function($scope){
    }
]);

// Contrôleur de la page list-actualite
routeAppControllers.controller('list-actualiteCtrl', ['$scope',
    function($scope){
        $scope.affiche_actualite();
    }
]);



// Contrôleur de la page de catalogue
routeAppControllers.controller('catalogueCtrl', ['$scope',
    function($scope){
        $scope.message = "Laissez-nous un message sur la page de contact !";
        $scope.msg = "Bonne chance pour cette nouvelle appli !";
    }
]);

// Contrôleur de la page de dashboard
routeAppControllers.controller('dashboardCtrl', ['$scope',
    function($scope){
        console.log("accueil 3");
    }
]);

// Contrôleur de la page de new-catalogue
routeAppControllers.controller('new-catalogueCtrl', ['$scope',
    function($scope){
    }
]);

// Contrôleur de la page de list-catalogue
routeAppControllers.controller('list-catalogueCtrl', ['$scope',
    function($scope){
        $scope.affiche_catalogue();
    }
]);