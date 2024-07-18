var routing = angular.module('routingApp',['ngRoute'])

routing.config(['$routeProvider', function($routeProvider) {
    const absolutePath = location.origin + location.pathname;
    $routeProvider
      .when('/userNew', { templateUrl: './app/views/content/userNew.php' })
      .when('/userList', { templateUrl: './app/views/content/userList.php' })
      .when( '/', { templateUrl: './app/views/content/home.php' })
      .when( '/dashboard', { templateUrl: './app/views/content/home.php' })
      .otherwise({ redirectTo: '/URL-No_encontrada', templateUrl: './app/views/content/userNew.php' });
}]);

routing.controller('registerController', function ($scope, $http) {
      $scope.submitForm = function() {
        if (!$scope.name || !$scope.email || !$scope.pass || !$scope.pass2 || $scope.pass2 !== $scope.pass) {
          Swal.fire({
            icon: "error",
            title: "Ha ocurrido un error",
            text: "Intente rellenar todos los campos por favor.",
          });
          return;
        }
  
        var formData = {
          modulo_user: 'registrar',
          name: $scope.name,
          email: $scope.email,
          pass: $scope.pass,
          pet: $scope.pet
        };
        
        $http.post('./app/controllers/registerController.php', formData)
          .then(function(response) {
            if (response.data.status === 'success') {
              Swal.fire({
                  icon: "success",
                  title: "Éxito",
                  text: response.data.message,
              }).then(() => {
                // Recargar la página después de cerrar la alerta de éxito
                window.location.reload();
              });
          } else {
              Swal.fire({
                  icon: "error",
                  title: "Error",
                  text: response.data.message,
              });
          }
          }, function(error) {
            console.error("Error:", error);
            Swal.fire({
              icon: "error",
              title: "Error",
              text: "Ha ocurrido un error al enviar los datos.",
            });
          });
      };
    });
