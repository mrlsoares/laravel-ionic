angular.module('starter.controllers',[])
.controller('HomeCtrl',function($scope,$state){
        $scope.state=$state.current;


    })