'use strict';

let angular = require('angular');

angular.module('ButProjectApp').service('PostListService', ['$http' , function($http){
  $http.get('/Home/PostList').then(function successCallback (response){
    // console.log(response.data);
    _service.postData = response.data;
  }, function errorCallback(response){

  });

  var _service = {
    'postData' : []
  }
  return _service;

}]);
