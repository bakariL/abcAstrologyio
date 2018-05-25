function validateEmail($email) {
    
    if($email ==='')
        return false;
    
      var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
      return emailReg.test( $email );
}

function newsletterSubscribeEmail($email){ 
         
    $.ajax({
        type: "POST",
        url: theme_uri + "/php/newsletterSubscribe.php",        
        data: {
            email: $email       
        },
        success: function(reply){
            $(".popup.join-newsletter.form").hide();                        
            $(".popup.join-newsletter.success .bottom .email b").text($email);
            $(".popup.join-newsletter.success").show(); 
            $(".newsletter form .cta").removeClass("loading");
            $(".popup.join-newsletter.form .cta").removeClass("loading"); 
            $("body").addClass("unscrollable");   
        },
        error: function(reply){
            $(".popup.join-newsletter.form").hide();    
            $(".popup.join-newsletter.error").show();
            $(".newsletter form .cta").removeClass("loading");
            $(".popup.join-newsletter.form .cta").removeClass("loading");
            $("body").addClass("unscrollable");
        }
    })
}

function contactEmail($name, $email, $message){ 
    
    
    $.ajax({
        type: "POST",
        url: theme_uri + "/php/contactEmail.php",        
        data: {   
            name: $name,       
            email: $email,       
            message: $message,       
        },
        success: function(reply){
            $(".popup.contact.success .bottom .name").html($name);            
            $(".popup.contact.form").hide();
            $(".popup.contact.success").show(); 
            $(".popup.contact.form .cta").removeClass("loading");           
        },
        error: function(reply){
            $(".popup.contact.form").hide();
            $(".popup.contact.error").show();
            $(".popup.contact.form .cta").removeClass("loading");
        }
    })
}

function horoscopeReadingEmail($firstname, $lastname, $birthday, $gender, $city, $state, $country, $email){ 
    
    
    $.ajax({
        type: "POST",
        url: theme_uri + "/php/horoscopeReading.php",        
        data: {
            firstname: $firstname,       
            lastname: $lastname,       
            birthday: $birthday,     
            gender: $gender,            
            city: $city,       
            state: $state,       
            country: $country,       
            email: $email,       
        },
        success: function(reply){
            $(".popup.reading.success .bottom .first-name").html($firstname);            
            $(".popup.reading.form").hide();
            $(".popup.reading.success").show(); 
            $(".popup.reading.form .cta").removeClass("loading");           
        },
        error: function(reply){
            $(".popup.reading.form").hide();
            $(".popup.reading.error").show();
            $(".popup.reading.form .cta").removeClass("loading");
        }
    })
}

function sendFreeReportEmail($userID, $reportID, $firstname, $lastname, $email, $birthday, $gender){ 
    
    
    $.ajax({
        type: "POST",
        url: theme_uri + "/php/freeReportRequest.php",      
        data: {
            userID: $userID,       
            reportID: $reportID,   
            firstname: $firstname,       
            lastname: $lastname,       
            birthday: $birthday,     
            gender: $gender,           
            email: $email,       
        },
        error: function(reply){
            console.log(reply);
        }
    });
}

function sendFreeReportReadyEmail($userID, $reportID, $firstname, $lastname, $email, $birthday, $gender){ 
    
    
    $.ajax({
        type: "POST",
        url: theme_uri + "/php/freeReportReady.php",      
        data: {
            userID: $userID,       
            reportID: $reportID,   
            firstname: $firstname,       
            lastname: $lastname,       
            birthday: $birthday,     
            gender: $gender,           
            email: $email,       
        },
        error: function(reply){
            console.log(reply);
        }
    });
}

function createFreeReportUser($firstname, $lastname, $email, $birthday, $gender){ 
        
    var data = {
            action: 'CREATE_FREE_REPORT_USER',
            firstname: $firstname,
            lastname: $lastname,
            email: $email,
            birthday: $birthday,
            gender: $gender,
    };

    jQuery.post(
        ajaxurl, 
        data, 
        function(response) {
            
            if(response === "ERROR")
                $(".popup.free-report.error").show();
            else{
            
                $user = JSON.parse(response);
                $userID = $user.ID;
                $reportID = $user.reportID;
                sendFreeReportEmail($userID, $reportID, $firstname, $lastname, $email, $birthday, $gender);
                
                if($(".popup.free-report.success h1 .first-name").text() === "")
                    $(".popup.free-report.success h1 .first-name").text($firstname);
                $(".popup.free-report.success").show();
                $()
            }
            
            $(".free-report form .cta").removeClass("loading");
        
    });
}

function selectSaturnReport($userID, $reportidentifier, $reportID){
    
    var data = {
            action: 'SELECT_SATURN_REPORT',
            userID: $userID,
            reportIdentifier: $reportIdentifier,
            reportID: $reportID,
    };

    jQuery.post(
        ajaxurl, 
        data, 
        function(response) {
            if(response === "ERROR")
                $(".popup.free-report.error").show();
            else{
                            
                $user = JSON.parse(response);
                sendFreeReportReadyEmail($user.ID, $user.reportID, $user.firstname, $user.lastname, $user.email, $user.birthday, $user.gender);
                
                $(".popup.free-report.success .bottom .name").html($user.firstname+" "+$user.lastname);
                $(".popup.free-report.success").show();
            }
        
    });
    
}

function viewReportSignup($userID, $firstname, $lastname, $email, $password, $phone){

        
    var data = {
            action: 'VIEW_REPORT_SIGNUP',
            userID: $userID,
            firstname: $firstname,
            lastname: $lastname,
            email: $email,
            password: $password,
            phone: $phone,
    };

    jQuery.post(
        ajaxurl, 
        data, 
        function(response) {
            if(response === "ERROR")
                $(".popup.free-report.error").show();
            else{
                $(".popup.free-report.success .cta").click(function(e){
                    e.preventDefault();                
                    window.location = login_uri; 
                })
                $(".popup.free-report.success").show();  
            }
        
    });
    
}

$(document).ready(function(){
    
    $(".why-saturn hr").hide().nextAll("p").addClass("more");
    
    $(".why-saturn .text .read-more").click(function(){
        
        $(this).closest(".text").addClass("expanded");
        
    });
    
    $(".why-saturn .text .show-less").click(function(){
        
        $(this).closest(".text").removeClass("expanded");
        
    });
    
    
    $(".popup .top .close, .popup .cta.close").click(function(){
        $(this).closest(".popup").hide();
        $(this).closest(".popup").find(".error").removeClass("error");
        $(this).closest(".popup").find(".loading").removeClass("loading");
        $("body").removeClass("unscrollable");
    });
    
    $(".how-it-works .subscription .cta").click(function(e){
        e.preventDefault();
        $(".popup.join-newsletter.form").show();
        $("body").addClass("unscrollable");
    });
    
    $(".how-it-works .reading .cta").click(function(e){
        e.preventDefault();
        $(".popup.reading.form").show();
        $("body").addClass("unscrollable");
    }); 
    
    $(".contactUsLink").click(function(e){
        e.preventDefault();
        $(".popup.contact.form").show();
    });
    
    
    $(".newsletter form .cta").click(function(e){
        e.preventDefault();
        $email = $(this).closest("form").find("input[type='email']").val(); 
        
        if(!validateEmail($email)){
            $(".newsletter form input").addClass("error");
        }
        else{        
            $(".newsletter form input").removeClass("error");
            $(this).addClass("loading");
            $email = $(this).closest("form").find("input[type='email']").val();  
            newsletterSubscribeEmail($email);
        }
    });
    
    $(".popup.join-newsletter.form .cta").click(function(e){
        e.preventDefault();
        $email = $(this).closest("form").find("input[type='email']").val();  
        
        if(!validateEmail($email)){
            $(".popup.join-newsletter.form input").addClass("error");
        }
        else{
            $(".popup.join-newsletter.form input").removeClass("error");
            $(this).addClass("loading");      
            newsletterSubscribeEmail($email);            
        }
    });        
    
    $(".popup.reading.form .cta").click(function(e){
        e.preventDefault();
        
        $form = $(this).closest("form");
        $errors = 0;
        
        $form.find("input, select").each(function(){
           if(!$(this).val()){
               $(this).addClass("error");
               $errors++;
           }
            else
               $(this).removeClass("error");
        });
        
        if($errors)
            return;
            
        $firstname = $form.find("#reading-firstname").val();   
        $lastname = $form.find("#reading-lastname").val();   
        $birthday = $form.find("#reading-birthyear").val()+'-'+$(".popup.reading.form #reading-birthmonth").val()+'-'+$(".popup.reading.form #reading-birthday").val()+' '+$(".popup.reading.form #reading-birthhour").val()+':'+$(".popup.reading.form #reading-birthminute").val();   
        $gender = $form.find("#reading-gender").val();   
        $city = $form.find("#reading-city").val();   
        $state = $form.find("#reading-state").val();   
        $country = $form.find("#reading-country option:selected").text();   
        $email = $form.find("#reading-email").val(); 
        
        
        if(!validateEmail($email))
            $form.find("#reading-email").addClass("error");
        else{
            $(this).addClass("loading");
            horoscopeReadingEmail($firstname, $lastname, $birthday, $gender, $city, $state, $country, $email);
        }
    });
    
    $(".popup.contact.form .cta").click(function(e){
        e.preventDefault();
        
        $form = $(this).closest("form");
        $errors = 0;
        
        $form.find("input, textarea").each(function(){
           if(!$(this).val()){
               $(this).addClass("error");
               $errors++;
           }
            else
               $(this).removeClass("error");
        });
        
        if($errors)
            return;
            
        $name = $form.find("#contact-name").val();   
        $email = $form.find("#contact-email").val(); 
        $message = $form.find("#contact-message").val(); 
                
        
        if(!validateEmail($email))
            $form.find("#contact-email").addClass("error");
        else{
            $(this).addClass("loading");
            contactEmail($name, $email, $message);
        }
        
    })
    
    
    $(".free-report form .cta").click(function(e){
        e.preventDefault();      
                
        $form = $(this).closest("form");
        $errors = 0;
        
        $form.find("input, select").each(function(){
           if(!$(this).val()){
               $(this).addClass("error");
               $errors++;
           }
            else
               $(this).removeClass("error");
        });
    
        $firstname = $(".free-report #report-firstname").val();   
        $lastname = $(".free-report #report-lastname").val();     
        $birthday = $(".free-report #report-birthyear").val()+'-'+$(".free-report #report-birthmonth").val()+'-'+$(".free-report #report-birthday").val();   
        $gender = $(".free-report #report-gender").val();    
        $email = $(".free-report #report-email").val();  
        
        if(!validateEmail($email))
            $form.find("#report-email").addClass("error");
        else{
            $(this).addClass("loading");
            createFreeReportUser($firstname, $lastname, $email, $birthday, $gender);
        }

    });
    
    $(".select-reports .cta").click(function(e){ 
        e.preventDefault();
        
        $form = $(this).closest(".form.select-reports");
        
        $reportID = $form.find("#reports").val();
        $userID = $form.find("#user").val();
        $reportIdentifier = $form.find("#identifier").val();
        
        selectSaturnReport($userID, $reportIdentifier, $reportID);
    })
    
    $(".view-report-signup form .cta").click(function(e){
        e.preventDefault();
        
        $isError = false;
        $(".view-report-signup #firstname, .view-report-signup #lastname, .view-report-signup #email, .view-report-signup #password, .view-report-signup #passwordConfirm, .view-report-signup #phone").each(function(){
            if(!$(this).val()){
                $(this).addClass("error");
                $(this).next('.input-error').text("Required.");
                $isError = true;
            } else {
                $(this).removeClass("error");
                $(this).next('.input-error').text('');
            }
        })
        
        $userID = $(".view-report-signup #user").val();
        $firstname = $(".view-report-signup #firstname").val();   
        $lastname = $(".view-report-signup #lastname").val();   
        $email = $(".view-report-signup #email").val();  
        $password = $(".view-report-signup #password").val();  
        $passwordConfirm = $(".view-report-signup #passwordConfirm").val();  
        $phone = $(".view-report-signup #phone").val();  
        
        
        emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if(!emailReg.test( $email )){
              $(".view-report-signup #email").addClass("error").next('.input-error').text("Invalid email!");
              $isError = true;
        }else{            
              $(".view-report-signup #email").removeClass("error").next('.input-error').text("");
        }
        
        phoneReg = /^[0-9\-\(\)\s\.\,]+$/;        
        if(!phoneReg.test( $phone )){
              $(".view-report-signup #phone").addClass("error").next('.input-error').text("Invalid phone number!");
              $isError = true;
        } else{
              $(".view-report-signup #phone").removeClass("error").next('.input-error').text("");
        }
        
        if($password.length < 8){
            $(".view-report-signup #password").addClass("error").next('.input-error').text("Password too short! Minimum 8 characters.");
            $isError = true;
        } else
            $(".view-report-signup #password").removeClass("error").next('.input-error').text("");
            if($password != $passwordConfirm){
                $(".view-report-signup #password, .view-report-signup #passwordConfirm").addClass("error").next('.input-error').text("Passwords do not match!");
                $isError = true;
            } else{
                $(".view-report-signup #password, .view-report-signup #passwordConfirm").removeClass("error").next('.input-error').text("");
                
            }
        
         
        
        if(!$isError)   
            viewReportSignup($userID, $firstname, $lastname, $email, $password, $phone);
        
        
    })
    
    $("input, select").change(function(){
        $(this).removeClass("error");
    })
    
});