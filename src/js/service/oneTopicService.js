'use strict';

let angular = require('angular');

angular.module('ButProjectApp').service('oneTopicService', ['$http' , function($http){
  $http.get('/Home/myTopicOne').then(function successCallback (response){
    // console.log(response.data);
    _service.oneTopicData = response.data;
  }, function errorCallback(response){

  });

  var _service = {
    'oneTopicData' : []
  }
  return _service;

}]);
