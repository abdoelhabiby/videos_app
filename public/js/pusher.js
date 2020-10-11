$(function() {



    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('2c9bbe2e60d7a5bca5b6', {
        cluster: 'mt1'
    });



    var user_add_comment = pusher.subscribe('comment-noti');

    user_add_comment.bind('comment-event', function(data) {
        alert(JSON.stringify(data));
    });


});