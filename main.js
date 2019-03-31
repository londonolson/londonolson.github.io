
var formApp = angular.module('formApp', []);
function formController($scope, $http) {
    $scope.formData = {};
    $scope.processForm = function() {
        $http({
            method  : 'POST',
            url     : 'process.php',
            data    : $.param($scope.formData),
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  
        })
            .success(function(data) {
                console.log(data);
                if (!data.success) {
                    $scope.errorName = data.errors.name;
                    $scope.errorAdults = data.errors.adults;
                    $scope.errorChildren = data.errors.children;
                    $scope.errorCheckInDate = data.errors.checkInDate;
                    $scope.errorCheckOutDate = data.errors.checkOutDate;
                    $scope.errorPhone = data.errors.phone;
                    $scope.errorDestination = data.errors.destination;

                } else {
                    $scope.message = data.message;
                    $scope.errorName = '';
                    $scope.errorAdults = '';
                    $scope.errorChildren = '';
                    $scope.errorCheckInDate = '';
                    $scope.errorCheckOutDate = '';
                    $scope.errorPhone = '';
                    $scope.errorDestination = '';
                }
            });
    };
}