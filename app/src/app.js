'use strict';

angular
    .module('ContainerApp', [
        'ngRoute'
    ])
    .config(function ($routeProvider) {
        $routeProvider
            .when('/', {
                templateUrl: 'src/main.html',
                controller: 'MainController as vm'
            })
            .otherwise({
                redirectTo: '/'
            });
    })
    
    .controller('MainController', function () {
    });

