var app=angular.module("app",[]);
app.controller("controlleur", function($scope,$http){
  $scope.nom="Mehdi";
      $http.get('http://localhost:8000/voitures_disponibles')
     .then(function(response){
     $scope.cars=response.data.voitures;
     }
     );

     $scope.dt=$scope.datecircu;

  $scope.voitures={ marque:'' , modele:'' , couleur:'' , matricule:'' , date_circu:'' , prixJour:'' , disponibilite :''};
    $scope.ajouterVoiture=function(){
    $scope.voitures.marque=$scope.marque;
    $scope.voitures.modele=$scope.modele;
    $scope.voitures.couleur=$scope.couleur;
    $scope.voitures.date_circu=$scope.date_circu;
    $scope.voitures.prixJour=$scope.prixJour;
    $scope.voitures.disponibilite=$scope.disponibilite;
    $scope.voitures.matricule=$scope.matricule;
   };            
   
   $scope.sh=false;
   $scope.formsh=function(){
   	$scope.sh=true;
   }
   var dateAsString = $filter('date')($scope.datecircu, "yyyy-MM-dd");
   $scope.dtstr=dateAsString;

   // Fonction post formulaire --------------------------------------------------------------------------------
$http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
$scope.send = function() {


    $http({
        url: 'http://localhost:8000/postData',
        method: 'POST',
        data: { 'marque' : $scope.marque, 'modele' : $scope.modele, 'matricule' : $scope.matricule,
                'couleur' : $scope.couleur, 'disponibilite' : $scope.disponibilite,
                'datecircu' :  dtc}
    })
    .then(function(response) {
            // success
            window.alert("Voiture ajoutée avec succès");
            return response;
    }, 
    function(response) { // optional
            // failed
    });
};

   //----------------------------------------------------------------------------------------------------------

});