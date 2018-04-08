$(document).ready(function () {
   $('a.button-like').click(function () {
       var params = {
           'id': $(this).attr('data-id')
       };
       $.post('/post/default/like', params, function (data) {
            if(data.success){
                $('.likes-count').html(data.likesCount);
                //$('.button-like').addClass('disabled');
                //$('.button-unlike').removeClass('disabled');
            };
       });
       return false;
   });
    $('a.button-unlike').click(function () {
        var params = {
            'id': $(this).attr('data-id')
        };
        $.post('/post/default/unlike', params, function (data) {
            if(data.success){
                $('.likes-count').html(data.likesCount);
                //$('.button-like').removeClass('disabled');
                //$('.button-unlike').addClass('disabled');
            };
        });
        return false;
    });
});