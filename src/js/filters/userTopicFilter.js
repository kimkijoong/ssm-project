angular
    .module('ButProjectApp')
    .filter('userTopicFilter', function() {
        return function(input) {
            var postSeq = [];
            var postData = [];
            // for(var i = 0 ; i < input.length ; i++){
            //     postSeq.push(input[i].topic_seq);
            // }
            // console.log(postSeq);
            for(var i = 0 ; i < input.length ; i++){
                if(postSeq.indexOf(Number(input[i].topic_seq)) > 0){
                    postData.push(input[i]);
                    postSeq.push(Number(input[i].topic_seq));
                } else {

                }
            }
            console.log(postSeq);
            console.log(postData);
            return input;
        };
    });
