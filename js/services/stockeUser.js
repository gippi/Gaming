myApp.service('stockeUtilisateur', function() {
   var utilisateur ={};
 
    return {
        getUtilisateur: function() {
            return utilisateur;
        },
        setUtilisateur: function(value) {
            utilisateur = value;
        }
    };
})