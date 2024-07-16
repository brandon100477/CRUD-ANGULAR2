(function() {
  var app = angular.module('crudAngular', []);

  app.controller('mainController', function ($scope) {
    $scope.submitForm = function() {
      // Perform validation and form submission logic here (optional)

      // Example: Basic validation check
      if (!$scope.name || !$scope.email || !$scope.pass || !$scope.pass2 || $scope.pass2 !== $scope.pass) {
        Swal.fire({
          icon: "error",
          title: "Ha ocurrido un error",
          text: "Intente rellenar todos los campos por favor.",
        });
        return;
      }

      // You can now submit the form using PHP if you wish
    };
  });
})();