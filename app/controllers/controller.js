(function() {
  var app = angular.module('crudAngular', []);
//Controlador para registrar datos.
  app.controller('mainController', function ($scope, $http) {
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
      //Petición al controlador php y manejo de errores.
      $http.post('./app/controllers/registerController.php', formData)
        .then(function(response) {
          if (response.data.status === 'success') {
            Swal.fire({
                icon: "success",
                title: "Éxito",
                text: response.data.message,
            }).then(() => {
              // Recargar la página después de cerrar la alerta de éxito y así registrar otro dato.
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
})();