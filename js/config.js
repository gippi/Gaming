myApp.config(['$routeProvider',function($routeProvider,$locationProvider,$ocLazyLoadProvider) { 
        
    // Système de routage
    $routeProvider
    

    .when('/accueil', {
        templateUrl: 'partials/accueil.html',
        controller: 'accueilCtrl'
    })
    .when('/actualite', {
        templateUrl: 'partials/actualite/actualite.html',
        controller: 'actualiteCtrl'
    })
    .when('/new-actualite', {
        templateUrl: 'partials/actualite/new-actualite.html',
        controller: 'new-actualiteCtrl'
    })
    .when('/list-actualite', {
        templateUrl: 'partials/actualite/list-actualite.html',
        controller: 'list-actualiteCtrl'
    })
    .when('/catalogue', {
        templateUrl: 'partials/catalogue/catalogue.html',
        controller: 'catalogueCtrl'
    })
    .when('/new-catalogue', {
        templateUrl: 'partials/catalogue/new-catalogue.html',
        controller: 'new-catalogueCtrl'
    })
    .when('/list-catalogue', {
        templateUrl: 'partials/catalogue/list-catalogue.html',
        controller: 'list-catalogueCtrl'
    })
    .when('/dashboard', {
        templateUrl: 'partials/dashboard.html',
        controller: 'dashboardCtrl'
    })
}
]);

 