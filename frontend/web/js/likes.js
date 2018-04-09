$(document).ready(function () {
   $('a.button-like').click(function () {
       var params = {
           'id': $(this).attr('data-id')
       };
       $.post('/post/default/like', params, function (data) {
            if(data.success){
                $('.likes-count').html(data.likesCount);
                $('a.button-like').hide();
                $('a.button-unlike').show();
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
                $('a.button-like').show();
                $('a.button-unlike').hide();
            };
        });
        return false;
    });
});