'use strict';

angular
    .module('ContainerApp', [
        'ngRoute',
        'ngResource'
    ])
    .constant('API_BASE_URL', 'http://37.60.230.241/bgphp15-hackathon/api')
    
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
    
    .controller('MainController', function (Container) {
        var vm = this;
        vm.newContainer = null;
        vm.error = null;
        
        vm.registerNew = function () {
            vm.newContainer = null;
            vm.error = null;
            
            var newContainer = new Container();

            newContainer.$save().then(saveSuccess, saveError);
            
            function saveSuccess(data) {
                vm.newContainer = data;
            }
            
            function saveError(err) {
                vm.error = err;
            }
        };
    })
    
    .factory('Container', function ($resource, API_BASE_URL) {
        return $resource(API_BASE_URL + "/containers/:id");
    });

