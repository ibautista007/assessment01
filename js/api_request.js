$(function(){
    var $users = $('#users');

    $.ajax({
        url: 'https://randomuser.me/api/?results=3',
        dataType: 'json',
        success: function(data) {
          console.log(data);
          console.log(data.results);

          $.each(data.results,function(i,user){
                $users.append('<li>gender:' + user.gender)
          });
        }
      });

});