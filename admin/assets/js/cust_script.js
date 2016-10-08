var start_input = 1;
var count = 0;
$("#add_input").click(function(){
    
        count++;
	start_input++;
        $("#input_box").append("<div class='col-md-12' style='padding: 0;'>"
                
                               +"<div class='col-md-3'>"
                                +"<input onchange='readURL1(this)' style='display:none;margin:5px' type='file' name='files[]' id='"+start_input+"' class='inputfile inputfile-1' >"
                                +"<label for='"+start_input+"'>"
                                   +"<svg xmlns='http://www.w3.org/2000/svg' width='20' height='17' viewBox='0 0 20 17'>"
                                      +"<path d='M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z'>"
                                      +"</path>"
                                   +"</svg>"
                                   +"<span id='name"+start_input+"'>Select a file</span>"
                                +"</label>"
                             +"</div>"
                     
                            +"<div class='col-md-3' >"
                               +"<!--<b style='margin-top: 5px'>Page No:&nbsp;</b>-->"
                               +"<input id='pg1' type='text' placeholder='PgNo'  name='page[]' class='form-control input-sm'>"
                           + "</div>"

                            +"<div class='col-md-3' >"
                               +"<!--<b style='margin-top: 5px'>Position:</b>&nbsp;-->"
                               +"<select placeholder='Position' id='pos1' name='position[]'  class='form-control  input-sm'>"
                                + " <option value='default'>Default</option>"
                                + " <option value='top'>Top</option>"
                                +  "<option value='bottom'>Bottom</option>"
                                +  "<option value='left'>Left</option>"
                                 + "<option value='right'>Right</option>"
                                 + "<option value='center'>Center</option>"
                              + "</select>"
                           + "</div>"
                            
                            +"<div class='col-md-3' >"
                               +"<!--<b style='margin-top: 5px'>Position:</b>&nbsp;-->"
                              + "<select placeholder='Position' id='pos1' name='logo[]'  class='form-control  input-sm'>"
                                 + "<option value=''>Select logo</option>"
                                 + "<option value='y'>Yes</option>"
                                 + "<option value='n'>No</option>"
                             + " </select>"
                            +"</div>"
                            +"</div>");

        

        $("#image-box").append("<div id='img-div"+start_input+"' style='margin-bottom: 30px; display: none;' class='col-md-6'>"
                                +"<figure>"
                                   +"<a id='b-image"+start_input+"' href='../images/1.jpg' data-size='1024x1024'>"
                                      +"<img class='box-img' id='s-image"+start_input+"' src='#' alt='Image not loaded'/>"
                                   +"</a>"
                                   +"<!-- <figcaption itemprop='caption description'>Image caption  1</figcaption> -->"
                                +"</figure>"
                           +"</div>");

});	

function readURL1(input) {

    if (input.files && input.files[0]) {
        
        var reader = new FileReader();
        reader.onload = function (e){

            $('#name'+input.id).html(input.files[0].name);
            $('#s-image'+input.id).attr('src', e.target.result);

            $('#b-image'+input.id).attr('href', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]);
        $("#img-div"+input.id).css('display','block');
    }
}


jQuery(document).ready(function($) {  

    // site preloader -- also uncomment the div in the header and the css style for #preloader
    $(window).load(function(){
      $('#preloader').fadeOut('slow',function(){$(this).remove();});
    });

});