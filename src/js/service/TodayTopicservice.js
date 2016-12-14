'use strict';

let angular = require('angular');

angular.module('ButProjectApp').service('TodayTopicservice', ['$http' , function($http){
  $http.get('/Home/TodayTopic').then(function successCallback (response){
    // console.log(response.data);
    _service.topicData = response.data;
    console.log(_service.topicData);
  }, function errorCallback(response){

  });

  var _service = {
    'topicData' : []
  }
  return _service;

}]);
