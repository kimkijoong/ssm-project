/*! DateRange.js © yamoo9.net, 2016 */
'use strict';

// let angular = require('angular');

angular.module('ButProjectApp')
.filter('dateRange', function(){

    return function(input, startDate, endDate) {
      var s_y, s_m, s_d, e_y, e_m, e_d, Dateboolean = false, TopicListData, TopicList = [];
      if(startDate && endDate){
        var s_date = startDate.split("-");
        var e_date = endDate.split("-");
        s_y = s_date[0];
        s_m = s_date[1];
        s_d = s_date[2];
        e_y = e_date[0];
        e_m = e_date[1];
        e_d = e_date[2];
        console.log(input);

        TopicListData = TopicList.topicData;
       angular.forEach(input, function(input){
         console.log(input);
         var date = input.public_date.split("-");
         var year = date[0];
         var month = date[1];
         var day = date[2].split(" ");
         day = day[0];
         console.log("1");
         if(year >= s_y && year <= e_y){
           console.log("2");
           Dateboolean = true;
           if(month >= s_m && month <= e_m){
             Dateboolean = true;
             if(day >= s_d && day <= e_d){
               Dateboolean = true;
             } else {
               Dateboolean = false;
             }
           } else {
             Dateboolean = false;
           }
         } else {
           Dateboolean = false;
         }
        // console.log("year : " + year + ", month : " + month + ", day : " + day);
        console.log(Dateboolean);
        if(Dateboolean){
          return TopicList.push(input);
        }

       });
      }
      return TopicList;
    };
});
