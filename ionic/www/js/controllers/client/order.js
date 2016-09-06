angular.module('starter.controllers').controller('ClientOrderCtrl', [
    '$scope', '$state','$ionicLoading','$localStorage','Order',
    function ($scope, $state,$ionicLoading,$localStorage,Order) {

        $scope.items=[];
        $ionicLoading.show({template:'Carregando...'});
        $scope.doRefresh=function () {
            getOrders().then(function(data){
                //console.log(data.data)
                $scope.items=data.data;
                $scope.$broadcast('scroll.refreshComplete');
            },function(dataError){
                $scope.$broadcast('scroll.refreshComplete');
            });
        }
        $scope.openOrderDetail(order)
        {
            $state.go('client.view_order',{id:order.id});
        }

        function getOrders()
        {
           return Order.query({
                id:null,
                orderby:'created_at',
                sortedBy:'desc'
            }).$promise;
        };


        getOrders().then(function(data){
            //console.log(data.data)
            $scope.items=data.data;
            $ionicLoading.hide();
            //console.log(data.data);
        },function(dataError){
            $ionicLoading.hide();
        });
}]);