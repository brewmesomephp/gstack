<?php
if(session_id() == ''){session_start();} if (empty($_SESSION)){header( 'Location: login_ajax.php' ) ;}include "connect.php"; 

include_once "functions.php";
if (!get_account_type($sess_id))
{
	header( 'Location: php_profile_ajax.php' ) ;
}
?>
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
	<div class="container" id="main" >
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-11 col-xs-15">
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
							<?php
                                include "navbar.php";
                                navbar($userid, $account);
                            ?>
							<ul class="nav navbar-nav navbar-right">
								<li class="page-scroll"><a href="#id-work">
									<i class="fa fa-angle-double-down"></i>
								</a></li>
							</ul>
						</div>
					</nav>
					<!-- end:navbar -->

					<!-- start:main content -->
					<div class="main-content">
                       
						<ul class="timeline">
							<?php include_once "check_percentage.php"; ?>

					        <!-- start:work -->
					        <li id="id-work">
								<div class="timeline-badge default"><i class="fa fa-briefcase"></i></div>
								<h1 class="timeline-head">WORK</h1>
                                <h5>
								<a href="php_company_profile_ajax.php">Profile</a> /
								<a href="company_achievements_ajax.php">Achievements</a> /
								<a href="company_portfolio_ajax.php">Portfolio</a> /
								<a href="jobs_ajax.php">Jobs</a> 
                            </h5>
							</li>
							<li>
					          	<div class="timeline-badge danger"></div>
					          	<div class="timeline-panel">
                                    
                                    
                                    
                                    
                                    <form enctype="multipart/form-data" id="myform">    
                                        <input type="text" class="form-control input-lg"  name="title" placeholder="Title..."/> 
                                        <input type="text" class="form-control input-lg"  name="caption" placeholder="Caption..."/> <br />
                                        <textarea  class="form-control input-lg" name="description" style="width:100%; height:100px;" placeholder="Description..."/></textarea>
                                        <br>

                                        <input type="text" name="youtube" class="form-control input-lg" placeholder="Youtube URL..."/> 


                                        <input type="file" class="form-control input-lg"  accept="image/*" name="fileToUpload" id="image" /> 
                                        <br>
                                        <input type="button" class="form-control input-lg upload"  value="Upload image" />
                                    </form>
                                    <progress value="0" max="100"></progress>
                                    <hr>
                                    
                                    
                                    
                                    
					            	<div class="timeline-body" id="content_here_please">
                                        
                                            
                                        <!--start insertion here-->
					            		
                                        <!--end insertion here-->
					            	</div>
					          	</div>
					        </li>
					        <!-- end:work -->

					        

					        <!-- start:contact -->
					        <?php
include_once "functions.php";
bug_report();
?>

					        <!-- end:contact -->
					    </ul>
					</div>
					<!-- end:main content -->
				</div>
			</div>
		</div>
	</div>
	<!-- end:main -->

	<!-- start:footer -->
	<footer>
		<div class="container-fluid">
			<div class="text-center">
				<p>Copyright &copy; 2017. All Rights Reserved.</p>
			</div>
		</div>
	</footer>
	<!-- end:footer -->

	<!-- start:javascript -->
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/gamerstack.js"></script>
	<script src="js/portfolio.jquery.js"></script>
	<script src="js/jquery.easing.min.js"></script>
	<script src="js/scrolling-nav.js"></script>
	<script src="js/jquery.scrollUp.js"></script>
    <script src="js/jquery.jeditable.js"></script>
	<script src="js/checkmail.js"></script> <!-- end:javascript -->
<?php
include_once "functions.php";
bug_report_js();
?>

<script>  
$(document).ready(function () { 
        $('body').on('click', '.upload', function(){
            // Get the form data. This serializes the entire form. pritty easy huh!
            var form = new FormData($('#myform')[0]);
            window.location='#myform';

            // Make the ajax call
            $.ajax({
                url: 'process_company_portfolio.php',
                type: 'POST',
                xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    if(myXhr.upload){
                        myXhr.upload.addEventListener('progress',progress, false);
                    }
                    return myXhr;
                },
                //add beforesend handler to validate or something
                //beforeSend: functionname,
                success: function (res) {
                    $('#content_here_please').html(res);
                },
                //add error handler for when a error occurs if you want!
                //error: errorfunction,
                data: form,
                // this is the important stuf you need to overide the usual post behavior
                cache: false,
                contentType: false,
                processData: false
            });
        });
    }); 

    // Yes outside of the .ready space becouse this is a function not an event listner!
    function progress(e){
        if(e.lengthComputable){
            //this makes a nice fancy progress bar
            $('progress').attr({value:e.loaded,max:e.total});
        }
    }
    
       
 $(document).on("click",".remove",function(e){
 var skill_number = this.id;

     window.location='#content_here_please';
     $.ajax({
    		   	type: "GET",
			url: "process_company_portfolio.php",
			data: 'id=' + skill_number,
        		success: function(msg){
                    
                        
 	          		  $("#content_here_please").html(msg)
 		        },
			error: function(){
				alert("failure");
				}
      			});
     
     
 });           
            
    $(document).ready(function() {
    $('#content_here_please').load('process_company_portfolio.php');
    return false;
});
            
    
    $( document ).ajaxComplete(function() {
  //$( "#skill_div" ).append( "Triggered ajaxComplete handler." );
    $(document).ready(function() {
        
    $('.thumbs').portfolio({
        cols: 3,
        transition: 'slideDown'
    });
});
        
});

    </script>
    
<script type="text/javascript" charset="utf-8">
    $(function() {
      $(".editable_textarea").editable("jeditable/post.php", { 
          indicator : "<img src='img/indicator.gif'>",
          type   : 'textarea',
          submitdata: { _method: "put" },
          select : true,
          submit : 'OK',
          cancel : 'cancel',
          cssclass : "editable"
      });
    });
</script>
    
    
</body>
</html>