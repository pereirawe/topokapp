angular.module('DeployApp', [])
.controller('DeployController', [
    '$scope','$http',
    function($scope,$http) {
        
        $scope.getStatusRespond = function(){
            $scope.content = [];
            $http({
                method: 'GET',
                url:'./Service/?action'
            }).then(function successCallback(response) {
                $scope.content = response.data
                console.log(response.data)
            }, function errorCallback(response) {
                return response
                console.log(error)
            });
        }
        $scope.getStatusRespond(); 

        $scope.getDeployRespond = function(){
            $scope.content = [];
            $http({
                method: 'GET',
                url:'./Service/?action=deploy'
            }).then(function successCallback(response) {
                $scope.content = response.data

                if(response.data.message != "Already up-to-date.\n"){
                    $http({
                        method: 'GET',
                        url:'../Telegram/?action=deployMessage'
                    }).then(function successCallback(response) {
                        $scope.content.telegram = 'Notified';
                    });
                }

                console.log(response.data)
            }, function errorCallback(response) {
                return response
                console.log(error)
            });
        }

        $scope.getDeployForceRespond = function(){
            $scope.content = [];
            $http({
                method: 'GET',
                url:'./Service/?action=deployForce'
            }).then(function successCallback(response) {
                $scope.content = response.data

                isUpToDate = response.data.message.search("Already up-to-date.") 
                if( isUpToDate <= 0 ){
                    $http({
                        method: 'GET',
                        url:'../Telegram/?action=deployMessage'
                    }).then(function successCallback(response) {
                        $scope.content.telegram = 'Notified';
                    });
                }
                console.log(response.data)
            }, function errorCallback(response) {
                return response
                console.log(error)
            });
        }

        
    }
])
.filter('capitalize', function() {
    return function(input) {
      return (!!input) ? input.charAt(0).toUpperCase() + input.substr(1).toLowerCase() : '';
    }
});