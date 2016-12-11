/*! TodayTopic.js © yamoo9.net, 2016 */
'use strict';

// let angular = require('angular');

angular
  .module('ButProjectApp')
  .filter('todayTopic', function() {
    return function(input) {
      return input < 10 ? ('0' + input) : input;
    };
  });
