/*! TopicListController.js 2016 */
'use strict';


angular
  .module('ButProjectApp')
  .controller('PostListController', ['$scope', 'PostListService', function ($scope, PostListService) {

    var user_seq = document.querySelector(".user_seq");
    $scope.PostList = PostListService;
    $scope.filter_user = {
      user_seq : user_seq.attributes[3].value
    };


  }]);
