var routing = angular.module('routingApp',['ngRoute']) //app principal.

//configuración de enrutamiento.
routing.config(['$routeProvider', function($routeProvider) {
  $routeProvider
    .when('/userNew', { templateUrl: './app/views/content/userNew.php' })
    .when('/userList', { templateUrl: './app/views/content/userList.php' })
    .when( '/', { templateUrl: './app/views/content/home.php' })
    .when( '/dashboard', { templateUrl: './app/views/content/home.php' })
    .when( '/Update/:id', { templateUrl: './app/views/content/update.php' })
    .otherwise({ redirectTo: '/URL-No_encontrada', templateUrl: './app/views/content/userNew.php' });
}]);

//Controlador para registrar datos después del inicio de sesión.
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
    //Solicitud POST al controlador php para registrar datos.
    $http.post('./app/controllers/registerController.php', formData).then(function(response) {
      if (response.data.status === 'success') {
        Swal.fire({
          icon: "success",
          title: "Éxito",
          text: response.data.message,
        }).then(() => {
          window.location.reload(); // Recargar la página después de cerrar la alerta de éxito
        });
      }else {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: response.data.message,
        });
      }
    }, function(error) { //Control de errores.
      console.error("Error:", error);
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Ha ocurrido un error al enviar los datos.",
      });
    });
  };
});

//Controlador para enlistar, actualizar y/o eliminar datos en la tabla.
routing.controller('listController', function ($scope, $http) {
  $scope.data = [];
  $http.post('./app/controllers/listController.php').then(function(response) {
    $scope.data = response.data;
  }, function(error) {
      console.error('Error:', error);
  });
  $scope.deleteItem = function(itemId) {
    Swal.fire({
      icon: 'warning',
      title: 'Advertencia',
      text: 'Estas apunto de eliminar el dato: ' + itemId,
      confirmButtonText: 'Si, por favor.'
    }).then((result) => {
      if (result.isConfirmed) {          
        $http.post('./app/controllers/deleteController.php', itemId).then(function(response) { //Solicitud al controlador php para eliminar un dato.
          if (response.data.status === 'success') {
            Swal.fire({
              icon: "success",
              title: "Éxito",
              text: response.data.message,
            }).then(() => {
                window.location.reload(); // Recargar la página después de cerrar la alerta de éxito
            });
          }else {
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
      }
    });
  }
});

//Controlador para mostrar datos antes de actualizarlos.
routing.controller('preUpdateController',['$scope','$http', '$routeParams', function ($scope, $http, $routeParams) {
  var userId = $routeParams.id;
  $http.get('./app/controllers/preUpdateController.php?id=' + userId).then(function(response) {
    $scope.user = response.data; 
  }, function(error) {
    console.error('Error:', error);
  });
  $scope.submitForm = function() {
    var formData = {
      modulo_user: 'actualizar',
      id: $scope.user[0][0].id,
      name: $scope.user[0][0].name,
      email: $scope.user[0][0].email,
      pet: $scope.user[0][0].pet
    };
    //Solicitud para actualizar el dato.
    $http.post('./app/controllers/updateController.php', formData)
    .then(function(response) {
      if (response.data.status === 'success') {
        Swal.fire({
          icon: "success",
          title: "Éxito",
          text: response.data.message,
        }).then(() => {
          window.location.reload(); // Recargar la página después de cerrar la alerta de éxito
        });
      }else {
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
  }
}]);
