'use strict';

let angular = require('angular');

angular.module('ButProjectApp').service('oneTopicService', ['$http' , function($http){
  $http.get('/Home/oneTopic').then(function successCallback (response){
    // console.log(response.data);
    _service.postData = response.data;
  }, function errorCallback(response){

  });

  var _service = {
    'postData' : []
  }
  return _service;

}]);
