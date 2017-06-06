function gallery(){
        
         bootbox.alert({size:'small', message: '<div class="p_img" style="text-align:center"><h3>Register Now.</h3> <h4>It only takes 30 seconds</h4><a href="register.php" class="btn btn-danger btn-lg btn-huge lato" >Register Now</a> <br />\
            <a href="login_ajax.php">Log In</a>'}); 
        }
    
    setTimeout(function () {gallery();}, 10000);