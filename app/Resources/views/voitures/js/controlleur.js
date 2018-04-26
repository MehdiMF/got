var app=angular.module("app",[]);

app.controller("controlleur", function($scope,$http){

  $scope.nom="Mehdi";

  $scope.change=function(){
	$scope.testNom="Mehdi";
  };
  
  $http.get('http://localhost:8000/voitures_disponibles')
     .then(function(response){
     $scope.cars=response.data.voitures;
     }

//var voiture={marque:"golf",modele:"tdi",couleur:"noire",matricule:"A4572",prixJour:300,disponibilite:"oui",datecircu:new Date()};
//var message="Bonjour";
//$http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
/*  $scope.send = function() {

    $http({
        url: 'http://localhost:8000/postData',
        method: 'POST',
        data: { 'message' : message }
    })
    .then(function(response) {
            // success
            return response;
    }, 
    function(response) { // optional
            // failed
    });
};*/


    
});