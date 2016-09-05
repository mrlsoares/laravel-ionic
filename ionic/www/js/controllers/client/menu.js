angular.module('starter.controllers').controller('ClientMenuCtrl', [
    '$scope', '$state','$ionicLoading','$localStorage','User',
    function ($scope, $state,$ionicLoading,$localStorage,User) {

        $scope.user={
            name:''
        }
        $ionicLoading.show({template:'Carregando...'});

        User.authenticated({},function (data) {
            //console.log(data.data);
            $scope.user=data.data;
            $ionicLoading.hide();
        },function (responseError) {
            //console.log(responseError);
            $ionicLoading.hide();
        });


}]);