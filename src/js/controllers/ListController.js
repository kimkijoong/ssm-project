/*! ListController.js © yamoo9.net, 2016 */
'use strict';


angular
  .module('BipanListApp')
  .controller('ListController', ['$scope', 'test', function ($scope, test) {


    $scope.test_data = test;
    // bipan 모델 데이터
    $scope.movies = [
      {
        "category": "opening",
        "title": "캡틴 판타스틱",
        "english_title": "CaptainFantastic",
        "director": "맷 로스",
        "year": "2016",
        "duration": "118",
        "nation": "USA",
        "image": "http://www.bifan.kr/uploads/program/program_32016062010641.jpg"
      },
      {
        "category": "closing",
        "title": "서울역",
        "english_title": "Seoul Station",
        "director": "연상호",
        "year": "2016",
        "duration": "93",
        "nation": "Korea",
        "image": "http://www.bifan.kr/uploads/program/program_32016062110580.jpg"
      }
    ];

    // 컨트롤러 $scope 객체의 속성
    $scope.selected_index = null;
    $scope.selected_movie = null;

    // 컨트롤러 $scope 객체의 메소드
    $scope.selectMovie = function(movie, index) {
      $scope.selected_index = index;
      $scope.selected_movie = movie;
    };

  }]);
