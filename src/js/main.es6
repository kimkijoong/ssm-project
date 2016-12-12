/*! main.js © yamoo9.net, 2016 */

// ------------------------------------
// 빌드 시에 아래 주석을 해제한 후, 빌드
// ------------------------------------
// require('jquery');
let angular = require('angular');

let bipan = angular.module('ButProjectApp', []);

// Controllers
require('./controllers/TopicListController'); // 모든 주제를 service(TopicList)로부터 전달받아 뷰에 전달해준다.
require('./controllers/TodayTopic'); //오늘의 주제를 service(TodayTopicservice)로부터 전달받아 뷰에 전달해준다.
require('./controllers/PostListController'); //모든 글감을 service(PostListService)로부터 전달받아 뷰에 전달해준다.
//Service
require('./service/TopicList');
require('./service/TodayTopicservice'); //서버에 오늘의 주제를 요청하여 전달받는다.
require('./service/PostListService'); //서버에 오늘의 주제를 요청하여 전달받는다.
// Filters
require('./filters/DateRangeFilter');
