/*! DateRange.js © yamoo9.net, 2016 */
'use strict';

// let angular = require('angular');

angular.module('ButProjectApp').filter('dateRange',['TopicList', function(dateRange, TopicList){

    return function(input, startDate, endDate) {
      var s_y, s_m, s_d, e_y, e_m, e_d;

      console.log(startDate);
       angular.forEach(input, function(TopicList){
         var date = TopicList.public_date.split("-");
         var year = date[0];
         var month = date[1];
         var day = date[2].split(" ");
         day = day[0];
        // console.log("year : " + year + ", month : " + month + ", day : " + day);
        if(TopicList.public_date >= startDate && TopicList.public_date <= endDate)   {
        }

       });

    };
}]);
