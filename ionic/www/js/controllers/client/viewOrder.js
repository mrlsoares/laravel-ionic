angular.module('starter.controllers').controller('ClientViewOrderCtrl', [
    '$scope', '$stateParams','Order','$ionicLoading','$localStorage',
    function ($scope, $stateParams,Order,$ionicLoading,$localStorage) {

        $scope.order={};
        $ionicLoading.show({template:'Carregando...'});

        order.get({id:$stateParams.id,include:"items,cupom"},function(data){
            $scope.order=data.data;
            $ionicLoading.hide();
            //console.log(data.data);
        },function(dataError){
            $ionicLoading.hide();
        });

}]);