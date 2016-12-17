/*! TopicListController.js 2016 */
'use strict';

let angular = require('angular');

angular
  .module('ButProjectApp')
  .controller('myTopicController', ['$scope', 'myTopicService', 'oneTopicService', function ($scope, myTopicService, oneTopicService) {

    $scope.PostList = myTopicService.postData;
    $scope.topicDetail = oneTopicService.oneTopicData;
    console.log($scope.PostList);


  }]);
