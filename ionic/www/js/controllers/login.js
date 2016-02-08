angular.module('starter.controllers',[])
    .controller('LoginCtrl',[
        '$scope','OAuth','$cookies','$ionicPopup',function($scope,OAuth,$cookies,$ionicPopup){
       // $scope.state=$state.current;
        $scope.user={
            username:'',
            password:''
        };
        $scope.login=function(){
            OAuth.getAccessToken($scope.user).then(
                function(data)
                {
                   // console.log(data);
                   // console.log($cookies.getObject('token'));
                    
                },
                function(responseError)
                {
                    $ionicPopup.alert({
                        title:'Advertência',
                        template:'Login e/ou senha inválidos '
                    });
                }
            )
        }

    }])