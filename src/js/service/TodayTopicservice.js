'use strict';


angular.module('ButProjectApp').service('TodayTopicservice', ['$http' , function($http){
  $http.get('/Home/TodayTopic').then(function successCallback (response){
    // console.log(response.data);
    // console.log(_service.topicData);
    for(var i = 0; i < response.data.length ; i++){
      var category = response.data[i]["group_concat(category)"].split(",");
      var topic = response.data[i]["group_concat(topic)"].split(",");
      var seq = response.data[i]["group_concat(seq)"].split(",");
      var day = response.data[i]["new_public_date"].split("-");
      _service.topicData.push({
        category1 : category[0],
        category2 : category[1],
        topic1 : topic[0],
        topic2 : topic[1],
        seq1 : seq[0],
        seq2 : seq[1],
        public_date : response.data[i]["new_public_date"],
        day : day[2]
      });

    }
  }, function errorCallback(response){

  });


  var _service = {
    'topicData' : []
  }
  return _service;

}]);
