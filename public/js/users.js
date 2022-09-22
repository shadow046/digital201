
$(document).ready( function () { //The ready() method specifies what happens when a ready event occurs.
    $('#users_table').DataTable(
      {
        dom:'lfrtip',
        processing:true,
        serverSide:false,
        ajax: {
        url: '/users/listOfUsers',//route-name
      },
      columns: [
          {data: 'name'},//data column name
          {data: 'email'}
      ]
      }
  );    
});

$('#users_form').hide();

$('#addUserBtn').on('click',function(){
  $('#users_form').fadeIn('slow');
  $('#users_list').hide();
  $('#addUserBtn').hide();
});

$('#btnSave').on('click', function(){
  var name = $.trim($('#name').val());//.trim()function removes all newlines, spaces (including non-breaking spaces)
  var email = $.trim($('#email').val());
  var password = $('#password').val();

  $.ajax({
      url:"/users/save", //route name (web.php)
      type:"POST",//requests data from the server
      headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')//For anti forgery
      },
      data:{
          name:name,
          email:email,
          password:password
      },
      success: function(data){
          if(data == 'true'){
              Swal.fire("SAVE SUCCESS","","success");//Alert when the statement is true
              setTimeout(function(){window.location.reload()},2000);//It will reload the page
          }
          else{
              Swal.fire("SAVE FAILED","","error");
              setTimeout(function(){window.location.reload()},2000);//It will reload the page
          }
      },
      error: function(data){
          if(data.status == 401){
            window.location.reload();
          }
          alert(data.responseText);
      }
  });
});


$('#users_table tbody').on('click', 'tr', function(){
  
    var id = $(this).attr('id');
    $.ajax({
        url: "/users/fetch",
        method: 'get',
        data:{id:id},
        dataType:'json',

        success:function(data){
            $('#name').val(data.name);
            $('#email').val(data.email);
            $('#hidden_id').val(data.id);
        }
    });
});