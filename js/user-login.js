    //form validation
  
    $('document').ready(function(){
    
        $("#user-login").validate({
          //rules
          debug: false,
          rules :
          {
            email:{
              required: true,
              email: true
            },
            password:{
                required: true,
                minlength: 8,
                maxlength: 20
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

          }
        });
      });