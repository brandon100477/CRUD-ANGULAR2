var controller = angular.module("crudAngular", ['ngRoute']);
controller.config(['$routeProvider', function($routeProvider) {
    $routeProvider
     .when('/', {
        templateUrl: '../../index.php'
      })
     .when('/register', {
        templateUrl: '../views/content/register.php'
      })
     .otherwise({
        redirectTo: '/'
      });
  }]);
controller.controller("mainController", function($scope, $http, $location) {
  var fullUrl = $location.absUrl();
  var urlSegments = fullUrl.split('/');

  // Determine the last segment of the URL (excluding query parameters)
  var lastSegment = urlSegments[urlSegments.length - 1].split('?')[0];

  if (lastSegment === 'register') {
    // Load the register.php content using $http.get
    $http.get('./app/views/content/register.php')
      .then(function(response) {
        $scope.registerContent = response.data;
      })
      .catch(function(error) {
        console.error('Error fetching register.php content:', error);
        // Optional: Handle the error gracefully (e.g., redirect to login)
      });
  } else {
    $location.path('/'); // Redirect to index.php
  }
});