'use strict';

let angular = require('angular');

angular.module('BipanListApp').service('test', ['$http' , function($http){
  $http.get('/Home/openSsmList_select').then(function successCallback (response){
    // console.log(response.data);
    _service.test_data = response.data;
  }, function errorCallback(response){

  });

  var _service = {
    'test_data' : []
  }
  return _service;

}]);
