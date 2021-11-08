$(function(){
    var $users = $('#users');
    var $staffs = $('#staffs');

    $.ajax({
        url: 'https://randomuser.me/api/?results=3',
        dataType: 'json',
        success: function(data) {
          //console.log(data);
          //console.log(data.results);

          $.each(data.results,function(i,user){
            const jsonTime = JSON.stringify(user.registered);
            const time = jsonTime.substring(9, 19);
            let joined = new Date(time.substring(0,4), (time.substring(5,7))-1, time.substring(8,10)) //Months number start from 0 (January)

                $staffs.append('<div class="card2"><div class="image2 d-flex flex-column justify-content-center align-items-center"> <button class="btn btn-secondary"> <img src="'
                +user.picture.thumbnail+'" height="100" width="100" /></button> <span class="name mt-3">'+user.name.title +' '+user.name.first +' '+user.name.last+'</span> <span class="idd">'
                +user.email+'</span> <div class=" px-2 rounded mt-4 date "><span class="join">Joined '+
                joined.toLocaleString('default', { month: 'long' })+', '+ joined.getFullYear()+'</span> </div></div></div>');

              //console.log(typeof d);            

          });
        }
      });

});