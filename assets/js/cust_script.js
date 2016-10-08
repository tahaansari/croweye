$(document).on('click','#user_login',function(event){
    
    event.preventDefault();
    // alert("user clicked");
     
    var data = $('#user_form').serialize();

        $.ajax({

         type: 'POST',
         url: 'ajax/check_user.php',
         data: data,
         success:function(result){
              
            var result = JSON.parse(result);

            console.log(result);

            if(result['status'] == "success"){

                window.location.href = "admin/user_view.php";


            }else if(result['err_msg'] == "validation error"){
             
                  var data = result['data'];
                  $("#user_error_footer").html(data);

            }else if(result['err_msg'] == "wrong data"){
             
                  $("#user_error_footer").html("<li>Username/Password Incorrect</li>");

            }else{
                
                  $("#user_error_footer").html("<li>Failed</li>");
            }

             
        }

    })
});


$(document).on('click','#client_login',function(event){
    
    event.preventDefault();
    
    // alert("client clicked");
    
    var data = $('#client_form').serialize();

        $.ajax({

         type: 'POST',
         url: 'ajax/check_client.php',
         data: data,
         success:function(result){

            // console.log(result);
             
            var result = JSON.parse(result);

            // console.log(result);

            if(result['status'] == "success"){

                console.log('redirecting..');

                window.location.href = "admin/client_view.php";
                

            }else if(result['err_msg'] == "validation error"){
             
                  var data = result['data'];
                  $("#client_error_footer").html(data);

            }else if(result['err_msg'] == "wrong data"){
             
                  $("#client_error_footer").html("<li>Username/Password Incorrect</li>");

            }else{
                
                  $("#client_error_footer").html("<li>Failed</li>");
            }
             
        }

    })
});


var LoginModalController = {
    tabsElementName: ".logmod__tabs li",
    tabElementName: ".logmod__tab",
    inputElementsName: ".logmod__form .input",
    hidePasswordName: ".hide-password",
    
    inputElements: null,
    tabsElement: null,
    tabElement: null,
    hidePassword: null,
    
    activeTab: null,
    tabSelection: 0, // 0 - first, 1 - second
    
    findElements: function () {
        var base = this;
        
        base.tabsElement = $(base.tabsElementName);
        base.tabElement = $(base.tabElementName);
        base.inputElements = $(base.inputElementsName);
        base.hidePassword = $(base.hidePasswordName);
        
        return base;
    },
    
    setState: function (state) {
        var base = this,
            elem = null;
        
        if (!state) {
            state = 0;
        }
        
        if (base.tabsElement) {
            elem = $(base.tabsElement[state]);
            elem.addClass("current");
            $("." + elem.attr("data-tabtar")).addClass("show");
        }
  
        return base;
    },
    
    getActiveTab: function () {
        var base = this;
        
        base.tabsElement.each(function (i, el) {
           if ($(el).hasClass("current")) {
               base.activeTab = $(el);
           }
        });
        
        return base;
    },
   
    addClickEvents: function () {
        var base = this;
        
        base.hidePassword.on("click", function (e) {
            var $this = $(this),
                $pwInput = $this.prev("input");
            
            if ($pwInput.attr("type") == "password") {
                $pwInput.attr("type", "text");
                $this.text("Hide");
            } else {
                $pwInput.attr("type", "password");
                $this.text("Show");
            }
        });
 
        base.tabsElement.on("click", function (e) {
            var targetTab = $(this).attr("data-tabtar");
            
            e.preventDefault();
            base.activeTab.removeClass("current");
            base.activeTab = $(this);
            base.activeTab.addClass("current");
            
            base.tabElement.each(function (i, el) {
                el = $(el);
                el.removeClass("show");
                if (el.hasClass(targetTab)) {
                    el.addClass("show");
                }
            });
        });
        
        base.inputElements.find("label").on("click", function (e) {
           var $this = $(this),
               $input = $this.next("input");
            
            $input.focus();
        });
        
        return base;
    },
    
    initialize: function () {
        var base = this;
        
        base.findElements().setState().getActiveTab().addClickEvents();
    }
};

$(document).ready(function() {
    LoginModalController.initialize();
});


$(document).on('click','#trial_submit',function(event){

    event.preventDefault();
    // alert('clicked');

    var data = $("#trial_form").serialize();

    // alert(data);

    $.ajax({

        type:"POST",
        url:"ajax/trial.php",
        data:data,
        success:function(result){

            
            var js_obj = JSON.parse(result);

            console.log(js_obj);

            if(js_obj['status']=='success'){

                alert('Request Sent Successfully');
                $("input[type='text']").val("");
                $("input[type='email']").val("");
                $('#trial_error_footer').html('');
                Custombox.close();


            }else if(js_obj['err_msg'] == 'validation error'){

                // var data = js_obj['data'];
                $('#trial_error_footer').html(js_obj['data']);
                // alert('validation error');

            }else{


                $('#trial_error_footer').html('<li>Failed</li>');
                // alert('failed');
            }

        }


    })





})