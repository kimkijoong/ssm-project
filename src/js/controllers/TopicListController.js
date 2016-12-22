/*! TopicListController.js 2016 */
'use strict';


angular
  .module('ButProjectApp')
  .controller('TopicListController', ['$scope', 'TopicList', function ($scope, TopicList) {

    $scope.TopicList = TopicList;
    $scope.search = {};

    // console.log($scope.TopicList);
    // bipan 모델 데이터

  }]);
