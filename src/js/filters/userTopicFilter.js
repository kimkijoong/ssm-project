angular
    .module('ButProjectApp')
    .filter('userTopicFilter', function() {
        return function(input) {
            var postSeq = [];
            var postData = [];
            for(var i = 0 ; i < input.length ; i++){
                postSeq.push(input[i].topic_seq);
            }
            console.log(postSeq);
            for(var i = 0 ; i < input.length ; i++){
                console.log(i + " : " + input[i].topic_seq);
                if(postSeq.indexOf(input[i].topic_seq) > 0){

                    postData.push(input[i]);
                } else {

                }
            }
            return input;
        };
    });
