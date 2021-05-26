    //form validation
  
    $('document').ready(function(){
    
        $("#add-patient").validate({
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
            phone:{
                required: true,
                maxlength: 10,
                minlength: 10, 
            },
            location:{
                required: true,
                maxlength: 256 
            },
            email:{
              required: true,
              email: true
            },
          },
          messages:{
            //for custom messages
            email: {
              required: "Email is required",
              email: "Please enter a valid email address"
            },
          }
        });
      });