    //form validation
  
    $('document').ready(function(){
    
        $("#user-registration").validate({
          //rules
          debug: false,
          rules :
          {
            firstname:{
              required: true,
              maxlength: 256
            },
            
            lastname:{
              required: true,
              maxlength: 256
            },
            email:{
              required: true,
              email: true
            },
            password:{
                required: true,
                minlength: 8,
                maxlength: 20
            },
            password2:{
                required: true,
                equalTo: '#password'
            }
          },
          messages:{
            //for custom messages
            email: {
              required: "Email is required",
              email: "Please enter a valid email address"
            },
            password: {
              required: "Password is required",
              minlength: "password at least 8 characters",
              maxlength:"Too long!",
            },
            password2: {
                required: "please retype your password",
                equalTo: "Your password doesn't match the one above!"},

          }
        });
      });