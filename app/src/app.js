'use strict';

angular
    .module('ContainerApp', [
        'ngRoute',
        'ngResource'
    ])
    .constant('API_BASE_URL', 'http://37.60.230.241')
    
    .config(function ($routeProvider) {
        $routeProvider
            .when('/', {
                templateUrl: 'src/main.html',
                controller: 'MainController as vm'
            })
            .when('/tracking/:id', {
                templateUrl: 'src/map.html',
                controller: 'TrackingController as vm'
            })
            .otherwise({
                redirectTo: '/'
            });
    })
    
    .controller('MainController', function ($location, Container) {
        var vm = this;
        vm.newContainer = null;
        vm.error = null;
        
        vm.track = function (containerId) {
            $location.path('/tracking/' + containerId);
        };
        
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
    
    .controller('TrackingController', function ($routeParams, Container) {
        var vm = this;
        vm.error = null;
        
        Container.get({id: $routeParams.id}, containerLoaded, loadError);
        
        function containerLoaded(resource) {

            vm.container = resource;
        }
        
        function loadError(err) {
            vm.error = err;
        }
    })
    
    .directive('map', function () {
        return {
            scope: {
                marker: '=',
            },
            link: function (scope, element) {
                var map;
                
                if (document.readyState === "complete") {
                    initialize();
                } else {
                    google.maps.event.addDomListener(window, 'load', initialize);
                }
                
                function initialize() {
                    var mapCenter = new google.maps.LatLng(
                        scope.marker.latitude,
                        scope.marker.longitude
                    );
    
                    var mapOptions = {
                        center: mapCenter,
                        zoom: 11,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    };
    
                    map = new google.maps.Map(element[0], mapOptions);
    
                    var marker = new google.maps.Marker({
                        position: mapCenter,
                        map: map
                    });
                }
                
            }
        };
    })
    
    .factory('Container', function ($resource, API_BASE_URL) {
        return $resource(API_BASE_URL + "/containers/:id");
    });
