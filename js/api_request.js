$(function(){
    var $users = $('#users');

    var $staffs = $('#staffs');

    $.ajax({
        url: 'https://randomuser.me/api/?results=3',
        dataType: 'json',
        success: function(data) {
          console.log(data);
          console.log(data.results);

          $.each(data.results,function(i,user){
                $users.append('<li>gender:' + user.name.title +' '+user.name.first +' '+user.name.last);
                $staffs.append('<div class="card2"><div class="image2 d-flex flex-column justify-content-center align-items-center"> <button class="btn btn-secondary"> <img src="'+user.picture.thumbnail+'" height="100" width="100" /></button> <span class="name mt-3">'+user.name.title +' '+user.name.first +' '+user.name.last+'</span> <span class="idd">'+user.email+'</span> <div class=" px-2 rounded mt-4 date "><span class="join">Joined May,2021</span> </div></div></div>');

/**/


          });
        }
      });

});