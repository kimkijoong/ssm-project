/*! TopicListController.js 2016 */
'use strict';

let angular = require('angular');

angular
  .module('ButProjectApp')
  .controller('myTopicController', ['$scope', 'myTopicService', function ($scope, myTopicService) {

    $scope.PostList = myTopicService;
    console.log(myTopicService);


  }]);
