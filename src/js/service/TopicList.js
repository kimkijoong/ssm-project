'use strict';


angular.module('ButProjectApp').service('TopicList', ['$http' , function($http){
  $http.get('/Home/TopicList').then(function successCallback (response){
    // console.log(response.data);
    _service.topicData = response.data;
  }, function errorCallback(response){

  });

  var _service = {
    'topicData' : []
  }
  return _service;

}]);
