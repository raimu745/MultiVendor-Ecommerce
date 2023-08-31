$(document).ready(function(){
   

    // remove side item

    $('nav-item').removeClass('active');
    $('nav-link').removeClass('active');

    // $('.nav-link').click(function() {
    //     $('.nav-link').removeClass('active');
    //     $(this).addClass('active');
    // });

    // $('#sidebar ul li').click(function() {
    //     // Remove 'active' class from all menu items
    //     $('#sidebar ul li').removeClass('active');
        
    //     // Add 'active' class to the clicked menu item
    //     $(this).addClass('active');
    // });

$('#cpassword').keyup(function(){

let cpassword = $('#cpassword').val();
// alert(cpassword);

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

   $.ajax({

    url: "/check_cpassword",
    type: "Get",
    data: {cpassword :cpassword},
    success: function (response) {
        // console.log(response);
        if(response == 'true'){
            $('#msgpass').html('<font color="green">Your Password Is Correct');
        }else{
            $('#msgpass').html('<font color="red">Your Password Is Incorrect');
        }
    }
   });


});

//   update status
$('.status').click(function(){
    var val = $(this).text();
    var id = $(this).attr('id');
    // alert(id);
  
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
     
        type : 'Post',
        url : "/updateStatus",
        data : {val : val , id : id},
        success :  function(data){
            var newText = data.val == 0 ? 'Inactive' : 'Active';
                $('#' + id).text(newText);
            // console.log(data.val);
            // if(data.val == 0){
            //     $('#id').text('Inactive');
            // }else{
            //     $('#id').text('Active');
            // }
        },error: function(data){
            // console.log('error');
        }


    });
 
     });

    //  section update status

    //   update status
$('.status').click(function(){
    var val = $(this).text();
    var id = $(this).attr('id');
    // alert(id);
  
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
     
        type : 'Post',
        url : "/updateSectionStatus",
        data : {val : val , id : id},
        success :  function(data){
            var newText = data.val == 0 ? 'Inactive' : 'Active';
                $('#' + id).text(newText);
            // console.log(data.val);
            // if(data.val == 0){
            //     $('#id').text('Inactive');
            // }else{
            //     $('#id').text('Active');
            // }
        },error: function(data){
            // console.log('error');
        }


    });
 
     });

     $('.editSection').click(function(e){
        e.preventDefault();
        //  alert('hi');
        var id = $(this).attr('id');
        $('#editModal').modal('show');
        // alert(id);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
           $.ajax({
        
            url: "editSection/"+id,
            type: "post",
            data: {id :id},
            success: function (response) {
                $('#hEdit').val(id);
                $('#name').val(response.section.name);
               
            }
           });
        
     });

    //  update the section

    $('#update').click(function(e){

       e.preventDefault();

      var uid = $('#hEdit').val();
      var uname = $('#name').val();
    //   alert(uname);
   
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
       $.ajax({
    
        url: "updateSection/"+uid,
        type: "post",
        data: {uid :uid ,uname : uname},
        success: function (response) {
           
            
            // console.log(response.section);
            $('#editModal').modal('hide');
            location.reload();

        }
       });


    });

  // Category satus update 


   //   update status
$('.status').click(function(){
    var val = $(this).text();
    var id = $(this).attr('id');
    // alert(id);
  
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
     
        type : 'Post',
        url : "/updateCategoryStatus",
        data : {val : val , id : id},
        success :  function(data){
            var newText = data.val == 0 ? 'Inactive' : 'Active';
                $('#' + id).text(newText);
            // console.log(data.val);
            // if(data.val == 0){
            //     $('#id').text('Inactive');
            // }else{
            //     $('#id').text('Active');
            // }
        },error: function(data){
            // console.log('error');
        }


    });
 
     });
// on change section get category start 
     $('#section_id').change(function(){
         let sid = $(this).val();
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
        $.ajax({
         
            type : 'Post',
            url : "/getcat",
            data : {id : sid},
            success :  function(data){
                var categories = data.category;
                var options = '<option value="">Main Category</option>';
                for (var i = 0; i < categories.length; i++) {
                    options += '<option value="' + categories[i].id + '">' + categories[i].cname + '</option>';
                }

                $('#categorySelect').html(options);
                
            },error: function(data){
                console.log('error');
            } 
        });
     });
// on change section get category end

// update Products status

  //   update status
  $('.status').click(function(){
    var val = $(this).text();
    var id = $(this).attr('id');
    // alert(id);
  
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
     
        type : 'Post',
        url : "/updateProductsStatus",
        data : {val : val , id : id},
        success :  function(data){
            var newText = data.val == 0 ? 'Inactive' : 'Active';
                $('#' + id).text(newText);
            console.log(data.val);
            
        },error: function(data){
            // console.log('error');
        }


    });
 
     });


});// document ready