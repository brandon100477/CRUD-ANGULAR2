(function() {
    var app = angular.module('angularLogin', []);
    // Controlador para verificar el inicio de sesión.
    app.controller('loginController', function ($scope, $http) {
      $scope.submitForm = function() {
        if (!$scope.email || !$scope.pass) {
          Swal.fire({
            icon: "error",
            title: "Ha ocurrido un error",
            text: "Intente rellenar todos los campos por favor.",
          });
          return;
        }
        var formData = { //Diccionario de datos para enviarlos al php.
            modulo_user: 'login',
            email: $scope.email,
            pass: $scope.pass,
          };
          $http.post('./app/controllers/loginController.php', formData)
          .then(function(response) { //confirmar y mostrar la respuesta del controlador php.
            if (response.data.status === 'success') {
              Swal.fire({
                  icon: "success",
                  title: "Éxito",
                  text: response.data.message,
              }).then(() => {
                window.location.href = response.data.redirectUrl; //URL donde va a ingresar después de iniciar sesión.
              });
          } else { 
              Swal.fire({
                  icon: "error",
                  title: "Error",
                  text: response.data.message,
              });
          }
          }, function(error) { //Control de errores al momento de la solicitud.
            console.error("Error:", error);
            Swal.fire({
              icon: "error",
              title: "Error",
              text: "Ha ocurrido un error al enviar los datos.",
            });
          });

    }});
  })();