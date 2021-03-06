// Ionic Starter App

// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'
angular.module('starter.controllers', []);
angular.module('starter.services', []);
angular.module('starter.filters', []);
angular.module(
    'starter', [
                'ionic', 'starter.controllers', 'starter.services','starter.filters',
                'angular-oauth2', 'ngResource', 'ngCordova'])
    .constant('appConfig', {
        baseUrl: 'http://192.168.0.10:8000'
    })
    .run(function ($ionicPlatform) {
        //  console.log(meuValue);
        $ionicPlatform.ready(function () {
            if (window.cordova && window.cordova.plugins.Keyboard)
            {
                // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
                // for form inputs)
                cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);

                // Don't remove this line unless you know what you are doing. It stops the viewport
                // from snapping when text inputs are focused. Ionic handles this internally for
                // a much nicer keyboard experience.
               // cordova.plugins.Keyboard.disableScroll(true);
            }
            if (window.StatusBar) {
                StatusBar.styleDefault();
            }

        })

    })
    .config(function ($stateProvider, $urlRouterProvider, OAuthProvider, OAuthTokenProvider, appConfig, $provide) {

        OAuthProvider.configure({
            baseUrl: appConfig.baseUrl,
            clientId: 'Appid01',
            clientSecret: 'secret', // optional
            grantPath: '/oauth/access_token'
        });

        OAuthTokenProvider.configure({
            name: 'token',
            options: {
                secure: false
            }
        });


        $stateProvider

            .state('login', {
                url: '/login',
                controller: 'LoginCtrl',
                templateUrl: 'templates/login.html'
            })
            .state('home', {
                url: '/home',
                templateUrl: 'templates/home.html',
                controller: function ($scope) {

                }//'HomeCtrl',

            })
            .state('client', {
                abstract: true,
                url: '/client',
                templateUrl: 'templates/client/menu.html',
                controller: 'ClientMenuCtrl',
            })
            .state('client.order', {
                url: '/order',
                controller: 'ClientOrderCtrl',
                templateUrl: 'templates/client/order.html'
            })
            .state('client.view_order', {
                url: '/view_order:id',
                controller: 'ClientViewOrderCtrl',
                templateUrl: 'templates/client/view_order.html'
            })
            .state('client.checkout', {
                cache: false,
                url: '/checkout',
                controller: 'ClientCheckoutCtrl',
                templateUrl: 'templates/client/checkout.html'
            })
            .state('client.checkout_item_detail', {
                url: '/checkout/detail/:index',
                controller: 'ClientCheckoutDetailCtrl',
                templateUrl: 'templates/client/checkout_item_detail.html'
            })
            .state('client.checkout_successful', {
                cache: false,
                url: '/checkout/success',
                templateUrl: 'templates/client/checkout_successful.html',
                controller: 'ClientCheckoutSuccessfulCtrl',
            })
            .state('client.view_products', {
                url: '/view_products',
                controller: 'ClientViewProductCtrl',
                templateUrl: 'templates/client/view_products.html'
            })
            .state('deliveryman', {
                abstract: true,
                url: '/deliveryman',
                templateUrl: 'templates/deliveryman/menu.html',
                controller: 'DeliverymanMenuCtrl',
            })
            .state('deliveryman.order', {
                url: '/order',
                controller: 'DeliverymanOrderCtrl',
                templateUrl: 'templates/deliveryman/order.html'
            })
            .state('deliveryman.view_order', {
                cache: false,
                url: '/view_order:id',
                controller: 'DeliveryViewOrderCtrl',
                templateUrl: 'templates/deliveryman/view_order.html'
            })

            ;
        $urlRouterProvider.otherwise('/login');

        $provide.decorator('OAuthToken', ['$localStorage', '$delegate', function ($localStorage, $delegate) {
            //console.log($delegate);
            Object.defineProperties($delegate, {
                setToken: {
                    value: function (data) {
                        return $localStorage.setObject('token', data);
                    },
                    enumerable: true,
                    configurable: true,
                    writable: true
                },
                getToken: {
                    value: function () {
                        return $localStorage.getObject('token');
                    },
                    enumerable: true,
                    configurable: true,
                    writable: true
                },
                removeToken: {
                    value: function () {
                        $localStorage.setObject('token', null);
                    },
                    enumerable: true,
                    configurable: true,
                    writable: true
                }


            });
            return $delegate;

        }]);

    });
