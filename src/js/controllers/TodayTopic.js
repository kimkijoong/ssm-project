/*! TopicListController.js 2016 */
'use strict';

let angular = require('angular');

angular
  .module('ButProjectApp')
  .controller('TodayTopic', ['$scope', 'TodayTopicservice', function ($scope, TodayTopicservice) {

    $scope.TopicList = TodayTopicservice;

    console.log($scope.TopicList);
    // bipan 모델 데이터

  }]);
