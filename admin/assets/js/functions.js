// to enable the popup



function open_view(para1,para2,para3){

  // alert(para1+" "+para2+" "+para3);

  $.ajax({

      type:"POST",
      url:"ajax/get_image.php",
      data:"id="+para1+"&date="+para2+"&industry="+para3,
      success:function(result){

          // console.log(result);
          $('#image-box').html(result);
          $('#myModal').modal('show');

          // data-toggle='modal' data-target='#myModal'


      }

  })


}



function search_change(){
    
      // alert('para');

      var from = document.getElementById('from_datepicker').value;
      var to = document.getElementById('to_datepicker').value;
      
      var data = "from="+from+"&to="+to;
      
//      alert(data);
      
      $.ajax({
          
          type:'POST',
          url: "ajax/get_search.php",
          data: data,
          success:function(result){
              

               console.log(result);
               // alert(result);
              $('#dynamic_values').html(result);
            }
          
          })
      }





function search_click(){
      
//    alert("clicked");
      var data = $('#filterForm').serialize();
      
      $.ajax({
          
          type:'POST',
          url: "ajax/get_search_click.php",
          data: data,
          success:function(result){
              

              console.log(result);

              if(result==0){

                  alert('Select Publication');
              }else{

                $("#dynamic_values").html(result);   
              }

              
          }
          
      })
    
}



function pub_changed(pub,edi,lan,sup){
    
    $.ajax({
        
        type:"POST",    
        url:"ajax/get_edi_lan_sup.php",
        data: "publication="+pub,
        success:function (result){
            
            var js_obj = JSON.parse(result);
//            console.log(obj[2]);
//            alert(obj[2]);

            document.getElementById(edi).innerHTML = js_obj[0];
            
            
            document.getElementById(lan).innerHTML = js_obj[1];
            
            if(js_obj[2]){    
                document.getElementById(sup).innerHTML = js_obj[2];
            }
            
        }
    })
}

function get_client(ind,client){
    
//  alert("changed");
    $.ajax({
        
        type:"POST",
        url:"ajax/get_client.php",
        data: "industry="+ind,
        success:function(result){
            
            var js_obj = JSON.parse(result);
            document.getElementById(client).innerHTML = js_obj;
            
        }  
    })
}

function get_city(state,city){
    
//    alert(state);

      var state = "state="+state;   
      
      $.ajax({
          
          type: 'POST',
          url:'ajax/get_city.php',
          data: {data:state},
          success:function(result){
              
//              alert(result);
              var js_obj = JSON.parse(result);
//              alert(js_obj);
              document.getElementById(city).innerHTML = js_obj;
              
          }
          
          
      })
}

  

function delete_news(para){


  // alert(para);

  var row = para.slice(4);

  // alert(row);

  if(confirm("Are You Sure")){

    $.ajax({

      type:"POST",
      url:"ajax/del_news.php",
      data:"data="+row,
      success:function(result){

        if(result == 1){

            alert("Deleted Successfuly");
            $("#row_"+row).css('display','none');

        }else{

            alert("Failed");

        }
 

      }



    })


  }
}



function delete_client(para){

  var data = para.slice(4);

  if(confirm("Are You Sure")){

      $.ajax({


      type:"POST",
      url:"ajax/del_client.php",
      data:"data="+data,
      success:function(result){

         if(result == 1){

            alert("Deleted Successfuly");
            $("#row_"+data).css('display','none');

        }else{

            alert("Failed");

        }
 



      }


  })

    // delete_ok();

  }
}



function update_client(id,period){

    // alert('clicked');

    var id = id.slice(3);

    var period = $('#'+period).val();


    // alert(id+" "+period);
     
    $.ajax({

      type:"POST",
      url:"ajax/update_client.php",
      // dataType:'json',
      data:"id="+id+"&&period="+period,
      success:function(result){

        console.log(result);

        var result  = JSON.parse(result);

        if(result['status']=='success'){

            alert("Package Updated Successfull");

            $('#start_'+id).html(result.c_pkg_pur_date);
            $('#end_'+id).html(result.c_pkg_exp_date);

            $('#period_'+id).val('');


        }
        
        



      }


  })

}





function update_user(para){

  var id = para.slice(3);
  var status = document.getElementById('status_'+id).innerHTML;

  // alert(id+" "+status);

  $.ajax({


      type:"POST",
      url:"ajax/update_user.php",
      data:"id="+id+"&&status="+status,
      success:function(result){


        // console.log(result);

        if(result ==1){

          if(status=='Active'){

            alert('user deactivated');
            document.getElementById('status_'+id).innerHTML = 'Deactive';
            document.getElementById(para).innerHTML = '<b>ACTIVATE</b>';


          }else{

            alert('user activated');
            document.getElementById('status_'+id).innerHTML = 'Active';
            document.getElementById(para).innerHTML = '<b>DEACTIVATE</b>';


          }

        }else{


          alert('failed');

        }



      }


  })


}

function delete_user(para){

        // alert(para);

  var id=para.slice(4);

  if(confirm("Are You Sure")){


      $.ajax({


      type:"POST",
      url:"ajax/del_user.php",
      data:"id="+id,
      success:function(result){

         // alert('hello'+result);

          var js_obj = JSON.parse(result);

          if(js_obj['status']=="success"){

              alert('User Removed');

              $('#tr_'+id).css('display','none');

          }else{

            alert('Failed');

          }

      }


  })
    // delete_ok();

  }
}





$('#add_client').on('click', function( e ) {


    // alert('clicked');

    Custombox.open({
        target: '#add_client_box',
        effect: 'fadein'
    });
    e.preventDefault();
});

$('#add_user').on('click', function( e ) {


    // alert('clicked');

    Custombox.open({
        target: '#add_user_box',
        effect: 'fadein'
    });
    e.preventDefault();
});

$(document).on('click','#client_form_submit',function(e){

  e.preventDefault();
  alert("clicked");

  // var data = $('#client_form').serialize();
  // alert(data);










})


$(document).on("click","#add_user_submit",function(event){
    
    event.preventDefault();

    // alert("add user clicked");

    var data = $("#add_user_form").serialize();

    // alert(data);

    $.ajax({
                
        type: 'POST',
        url: "ajax/add_user.php",
        data: data,
        success:function(result){
            

            console.log(result);
            
            var js_obj = JSON.parse(result);

            console.log(js_obj);

            if(js_obj['status'] == 'success'){
                
                alert("Inserted Successfuly");
                $("input[type='text']").val("");
                $("select").each(function() { this.selectedIndex = 0 });
                
             }else if(js_obj['status'] == 'failed'){
                
                 if(js_obj['err_msg'] == 'validation error'){



                    $(".custombox-modal-container").css('marginTop','50px');
                    $("#user_error_footer").html(js_obj['data']);

                    // $("#add_user").trigger( "click" );

                    
                    // $("#user_error_footer").html("<li>Hello</li>");

                    // alert(js_obj['data']);
                    
                    
                }else{
                    
                    alert("Failed");
                    
                }
                
                
            }
            
        }
          
    })
//
})

$(document).on("click","#add_client_submit",function(event){
    
    
    event.preventDefault();
    // alert("add client clicked");

    var data = $("#add_client_form").serialize();

    $.ajax({
        
        type: 'POST',
        url: "ajax/add_client.php",
        data: data,
        success:function(result){




            // console.log(result);

            var js_obj = JSON.parse(result);
            // console.log(js_obj);

            if(js_obj['status'] == 'success'){
                
                alert("Inserted Successfuly");
                $("input[type='text']").val("");
                $("select").each(function() { this.selectedIndex = 0 });
                
            }else if(js_obj['status'] == 'failed'){
                
                if(js_obj['err_msg'] == 'validation error'){
                    


                   $(".custombox-modal-container").css('marginTop','50px'); 
                   $("#client_error_footer").html(js_obj['data']);
                    
                    
                }else{
                    
                    alert("Failed");
                    
                }
            }
        }
        
    })
})






 
// pre-submit callback 
// function showRequest(formData, jqForm, options) { 
//     // formData is an array; here we use $.param to convert it to a string to display it 
//     // but the form plugin does this for you automatically when it submits the data 
//     var queryString = $.param(formData); 
 
//     // jqForm is a jQuery object encapsulating the form element.  To access the 
//     // DOM element for the form do this: 
//     // var formElement = jqForm[0]; 
 
//     alert('About to submit: \n\n' + queryString); 
 
//     // here we could return false to prevent the form from being submitted; 
//     // returning anything other than false will allow the form submit to continue 
//     return true; 
// } 
 
// post-submit callback 
function showResponse(responseText, statusText, xhr, $form)  { 
    // for normal html responses, the first argument to the success callback 
    // is the XMLHttpRequest object's responseText property 
 
    // if the ajaxForm method was passed an Options Object with the dataType 
    // property set to 'xml' then the first argument to the success callback 
    // is the XMLHttpRequest object's responseXML property 
 
    // if the ajaxForm method was passed an Options Object with the dataType 
    // property set to 'json' then the first argument to the success callback 
    // is the json data object returned by the server 
 
    // alert('status: ' + statusText + '\n\nresponseText: \n' + responseText + 
    //     '\n\nThe output div should have already been updated with the responseText.');


      var js_obj = JSON.parse(responseText);

      if(js_obj['status'] == 'success'){

          alert("Inserted Successfuly");

          // $('#from-data').find('input:text').val("");
          // $('#from-data').find('textarea').val("");          
          // $('#from-data').find('select').val("");
          // $('.filter-option').html("");
          

          // $('img').attr('src', '');
          // $('#from-data').find('input:file').val('');

          window.location.href = "user_view.php";


      }else if(js_obj['err_msg'] == 'validation error'){

          $('#data_error_footer').html(js_obj['data']);

      }else{

        alert('failed');
      }






}




$(document).on("click","#data_submit",function(){



    var options = { 
        // target:        '#output1',   // target element(s) to be updated with server response 
        // beforeSubmit:  showRequest,  // pre-submit callback 
        success:       showResponse // post-submit callback 
 
        // other available options: 
        //url:       url         // override for form's 'action' attribute 
        //type:      type        // 'get' or 'post', override for form's 'method' attribute 
        //dataType:  null        // 'xml', 'script', or 'json' (expected server response type) 
        // clearForm: true        // clear all form fields after successful submit 
        // resetForm: true        // reset the form after successful submit 
 
        // $.ajax options can be used here too, for example: 
        //timeout:   3000 
    }; 
 
    // bind form using 'ajaxForm' 
    $('#from_data').ajaxForm(options); 

    // alert('clicked');

    


          // $( "li.item-a" )
          // .closest( "li" )
          // .css( "background-color", "red" );

  
      

});



// pre-submit callback 
// function showUpdateRequest(formData, jqForm, options) { 
//     // formData is an array; here we use $.param to convert it to a string to display it 
//     // but the form plugin does this for you automatically when it submits the data 
//     var queryString = $.param(formData); 
 
//     // jqForm is a jQuery object encapsulating the form element.  To access the 
//     // DOM element for the form do this: 
//     // var formElement = jqForm[0]; 
 
//     alert('About to submit: \n\n' + queryString); 



 
//     // here we could return false to prevent the form from being submitted; 
//     // returning anything other than false will allow the form submit to continue 
//     return true; 
// } 
 
// post-submit callback 
function showUpdateResponse(responseText, statusText, xhr, $form)  { 
    // for normal html responses, the first argument to the success callback 
    // is the XMLHttpRequest object's responseText property 
 
    // if the ajaxForm method was passed an Options Object with the dataType 
    // property set to 'xml' then the first argument to the success callback 
    // is the XMLHttpRequest object's responseXML property 
 
    // if the ajaxForm method was passed an Options Object with the dataType 
    // property set to 'json' then the first argument to the success callback 
    // is the json data object returned by the server 
 
    // alert('status: ' + statusText + '\n\nresponseText: \n' + responseText + 
    //     '\n\nThe output div should have already been updated with the responseText.');


      // console.log(responseText);
      // return false;


      var js_obj = JSON.parse(responseText);

      if(js_obj['status'] == 'success'){

          alert("Update Successfuly");

          // $('#from-data').find('input:text').val("");
          // $('#from-data').find('textarea').val("");          
          // $('#from-data').find('select').val("");
          // $('.filter-option').html("");
          

          // $('img').attr('src', '');
          // $('#from-data').find('input:file').val('');

          location.reload();


      }else if(js_obj['err_msg'] == 'validation error'){

          $('#data_error_footer').html(js_obj['data']);

      }else{

        alert('failed');
      }

}


$(document).on("click","#update_submit",function(){



  // alert("called");
  // return false;


    var options = { 
        // target:        '#output1',   // target element(s) to be updated with server response 
        // beforeSubmit:  showUpdateRequest,  // pre-submit callback 
        success:       showUpdateResponse // post-submit callback 
 
        // other available options: 
        //url:       url         // override for form's 'action' attribute 
        //type:      type        // 'get' or 'post', override for form's 'method' attribute 
        //dataType:  null        // 'xml', 'script', or 'json' (expected server response type) 
        // clearForm: true        // clear all form fields after successful submit 
        // resetForm: true        // reset the form after successful submit 
 
        // $.ajax options can be used here too, for example: 
        //timeout:   3000 
    }; 
 
    // bind form using 'ajaxForm'





    $('#update_data').ajaxForm(options); 


    // alert('clicked');

    


          // $( "li.item-a" )
          // .closest( "li" )
          // .css( "background-color", "red" );

  
      

});