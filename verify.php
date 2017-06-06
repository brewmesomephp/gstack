<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>GamerStack - Networking for the Game Industry</title>
	<meta name="description" content="">
    <meta name="author" content="">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="page-top">

	<!-- start:main -->
	<div class="container text-center" id="main" >
		<div class="row text-center">
			<div class="col-md-offset-3 col-lg-6 col-md-12 col-sm-12 col-xs-12">
				<div id="content">
					<!-- start:navbar -->
					<nav class="navbar navbar-default navbar-static-top" role="navigation">
						<div class="navbar-header page-scroll">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="collapse navbar-collapse navbar-ex1-collapse">
							
							
						</div>
					</nav>
					<!-- end:navbar -->        
            
            
		<div class="main-content">
				        	 
				
                
                <ul class="timeline"  style="background-color:#fff;">
                          
            	
                <!-- start:awards -->
					        <li id="id-resume">
                                
					        	
					        	<h1 class="timeline-head">GamerStack Verification</h1>
                                
					        </li>
					        <li>
					          	<div class="timeline-badge primary"></div>
                                <div class="timeline-panel word-experience" id="form_content">
                                    <div id="alarm"></div>
                                    <div class="hr-left"></div>
                                    
					          		
                                    
                                    <?php
$complete = 0;
$servername = "localhost";    $username = "cm3rt"; $password = "Laceration6?"; $db = "gamerstack";
    

        try 
        {
            $dbs = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            // set the PDO error mode to exception
            $dbs->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }

if (!isset($_GET['resend']))
{
        //add a new item to DB
    if (isset($_GET['id']) && isset($_GET['hash'])) 
    {
        //
        
        include_once "functions.php";
        $user = get_user($_GET['id']);
        $user_hash = $user['hash'];
        $user_verified = $user['verified'];
        if($user_verified == '0')
        {
            if ($_GET['hash'] == $user_hash)
            {
                //verification completed
                $query = "UPDATE users SET verified = '1' WHERE id={$_GET['id']}";
                $sql = $dbs->prepare($query);
                $sql->execute();
                ?>
                    <h2>Verification Successful: <a href="login_ajax.php">Log In</a></h2>
                <?php
                $complete = 1;
                $headers = "From: Joe@gamerstack.io\r\n";
                $headers .= "Reply-To: Joe@gamerstack.io\r\n";
                $headers .= "BCC: Joe@gamerstack.io\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                $name = $user['name'];
                $to = $user['email'];
                $subject = "Welcome to GamerStack, $name!";
                ob_start();
                    if ($user['account'] == '1')
                        include "email/welcome_company.php";
                    else
                        include "email/welcome_candidate.php";
                $msg = ob_get_clean();
                mail($to, $subject, $msg, $headers);
            }
            else
            {
                //incorrect hash... resend email
                $incorrect = 1;
                $resend_link = "verify.php?resend=1&id={$_GET['id']}";
                ?>
                <h2 style="color:red">Verification Unsuccessful: <a href="<?=$resend_link?>">Resend Verification</a></h2>
                <?php
            }
        }
        else
        {
            $already_verified = 1;//already verified
            $complete = 1;
            ?>
                                    <h2>Email Already Verified: <a href="login_ajax.php">Log In</a></h2>
            <?php
            
        }
        
    }
}
else
{
    
    if (isset($_GET['id']))
    {
        include_once "functions.php";
        $user = get_user($_GET['id']);
        $hash = $user['hash'];
        $email = $user['email'];
        
        $to = $email;
        $subject = "GamerStack Email Verification";
        
        $headers = "From: Joe@gamerstack.io\r\n";
        $headers .= "Reply-To: Joe@gamerstack.io\r\n";
        $headers .= "BCC: Joe@gamerstack.io\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        
        
        //use this email
        
        include "email/verification.php";
        
        ob_start();
        send_mail($user['id'], $user['hash']);
        $msg = ob_get_clean();
        mail($to, $subject, $msg, $headers);
        
        
        ?>
        <h2>Email Verification Sent</h2>
        <h3>Your verification email should be arriving shortly.</h3>
                                    <h3><a href="login_ajax.php">Back to Log In</a></h3>
        <?php
    }
    else
    {
        
    }
    
}

if (isset($_POST['email']))
        {
            include_once "functions.php";
            $user = get_user_by_email($_POST['email']);
            $email = $user['email'];
            $hash = $user['hash'];
            $id = $user['id'];

            $to = $email;
            $subject = "GamerStack Email Verification";

            $headers = "From: Joe@gamerstack.io\r\n";
            $headers .= "Reply-To: Joe@gamerstack.io\r\n";
            $headers .= "BCC: Joe@gamerstack.io\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


            //use this email

            include "email/verification.php";

            ob_start();
            send_mail($user['id'], $user['hash']);
            $msg = ob_get_clean();
            mail($to, $subject, $msg, $headers);
            ?>
            <h2>Email Verification Sent</h2>
            <h3>Your verification email should be arriving shortly.</h3>

        <?php
            
        }
        elseif ($complete != 1)
            {
        ?>
                                    <h2>Enter your email to have your verification sent to you again.</h2>
             <form action="verify.php?request=1" method="post">
                 <label>Email: </label>
                <input type="text" name="email" class="input-lg" placeholder="email">
                <button type="submit" class="btn btn-lg btn-primary btn-success btn-block" id="submit_login">SUBMIT</button>
            </form>                    
        <?php
            
        }
?>
                                    
                                    
                                    
                                    
                                    
					        </li>
                    <!-- start:contact -->
				       
					        <!-- end:contact -->

                    
            </div>
        	
	</div>
    
    <div id="awards_div" ><p></p></div>
 
    
<!-- start:javascript -->
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/gamerstack.js"></script>
	<script src="js/portfolio.jquery.js"></script>
	<script src="js/jquery.easing.min.js"></script>
	<script src="js/scrolling-nav.js"></script>
	<script src="js/jquery.scrollUp.js"></script>
    <script src="js/jquery.jeditable.js"></script>
    
	 <!-- end:javascript -->
        <script>

     
            
            
</script>
            

</body>
</html>