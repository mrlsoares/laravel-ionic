angular.module('starter.controllers').controller('ClientOrderCtrl', [
    '$scope', '$state','$ionicLoading','$localStorage','Order',
    function ($scope, $state,$ionicLoading,$localStorage,Order) {

        $scope.items=[];
        $ionicLoading.show({template:'Carregando...'});

        Order.query({id:null},function(data){
            console.log(data.data)
            $scope.items=data.data;
            $ionicLoading.hide();
            //console.log(data.data);
        },function(dataError){
            $ionicLoading.hide();
        });

}]);