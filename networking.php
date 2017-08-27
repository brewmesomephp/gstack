<!DOCTYPE html>
<html>
<body>

<?php
if (isset($_POST['email'])){
    print "<h1>Thank you! You will receive my Business Card shortly</h1>";
}
else{
?>
    <img src="http://josephalai.com/cropped-me-2--e1503595782835.jpg" width="180" alt="img" style="border-width: 0;width: 100%;max-width: 180px;height: auto;border: 0;">
    <h1>Joseph Alai's Business Card</h1>
<form action="networking.php" method="post" target="_blank">
  First name: <input type="text" name="fname"><br>
  Email: <input type="text" name="email"><br>
  <input type="submit" value="Submit">
</form>

<p>Click on the submit button, and you will receive my Business Card in your email.</p>

</body>
</html>
<?php
}
if (isset($_POST['email'])){
    if ($_POST['fname'] != ""){
        $fname = ucfirst($_POST['fname']);
//        $subject = "Hey, $fname. ";
    }
    else{
        $subject = "";
    }

            $to = $_POST['email'];
            $subject .= "It's Joseph from Networking After Work :)";

            $headers = "From: joseph@josephalai.com\r\n";
            $headers .= "Reply-To: joseph@josephalai.com\r\n";
            $headers .= "Return-Path: joseph@josephalai.com\r\n";
            $headers .= "BCC: josephalai@gmail.com\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            
        
            ob_start();?>
            <!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <!--[if !mso]><!-->
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <!--<![endif]-->
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title></title>
    <style type="text/css">
    /* XYZLEAD.com Author: ARCBMC copywrite 2017 */
    
   /* Basics */</style><style>body {
	margin: 0 !important;
	padding: 0;
	background-color: #ffffff;
}
table {
	border-spacing: 0;
	font-family: sans-serif;
	color: #333333;
}
td {
	padding: 0;
}
img {
	border: 0;
}
div[style*="margin: 16px 0"] { 
	margin:0 !important;
}
.wrapper {
	width: 100%;
	table-layout: fixed;
	-webkit-text-size-adjust: 100%;
	-ms-text-size-adjust: 100%;
}
.webkit {
	max-width: 600px;
	margin: 0 auto;
}
.outer {
	Margin: 0 auto;
	width: 100%;
	max-width: 600px;
}
.inner {
	padding: 10px;
}
.xyzcontents {
	width: 100%;
}
p {
	Margin: 0;
}
a {
	color: #ee6a56;
	text-decoration: underline;
}
.h1 {
	font-size: 21px;
	font-weight: bold;
	Margin-bottom: 18px;
}
.h2 {
	font-size: 18px;
	font-weight: bold;
	Margin-bottom: 12px;
}
.full-width-image img {
	width: 100%;
	max-width: 600px;
	height: auto;
}

/* One column layout */
.one-column .xyzcontents {
	text-align: left;
}
.one-column p {
	font-size: 14px;
	Margin-bottom: 10px;
}

/*Two column layout*/
.two-column {
	text-align: center;
	font-size: 0;
}
.two-column .column {
	width: 100%;
	max-width: 300px;
	display: inline-block;
	vertical-align: top;
}
.two-column .xyzcontents {
	font-size: 14px;
	text-align: left;
}
.two-column img {
	width: 100%;
	max-width: 280px;
	height: auto;
}
.two-column .text {
	padding-top: 10px;
}

/*Three column layout*/
.three-column {
	text-align: center;
	font-size: 0;
	padding-top: 10px;
	padding-bottom: 10px;
}
.three-column .column {
	width: 100%;
	max-width: 200px;
	display: inline-block;
	vertical-align: top;
}
.three-column img {
	width: 100%;
	max-width: 180px;
	height: auto;
}
.three-column .xyzcontents {
	font-size: 14px;
	text-align: center;
}
.three-column .text {
	padding-top: 10px;
}

/* Left sidebar layout */
.left-sidebar {
	text-align: center;
	font-size: 0;
}
.left-sidebar .column {
	width: 100%;
	display: inline-block;
	vertical-align: middle;
}
.left-sidebar .left {
	max-width: 100px;
}
.left-sidebar .right {
	max-width: 500px;
}
.left-sidebar .img {
	width: 100%;
	max-width: 80px;
	height: auto;
}
.left-sidebar .xyzcontents {
	font-size: 14px;
	text-align: center;
}
.left-sidebar a {
	color: #85ab70;
}

/* Right sidebar layout */
.right-sidebar {
	text-align: center;
	font-size: 0;
}
.right-sidebar .column {
	width: 100%;
	display: inline-block;
	vertical-align: middle;
}
.right-sidebar .left {
	max-width: 100px;
}
.right-sidebar .right {
	max-width: 500px;
}
.right-sidebar .img {
	width: 100%;
	max-width: 80px;
	height: auto;
}
.right-sidebar .xyzcontents {
	font-size: 14px;
	text-align: center;
}
.right-sidebar a {
	color: #70bbd9;
}

/*Media Queries*/
@media screen and (max-width: 400px) {
	.two-column .column,
	.three-column .column {
		max-width: 100% !important;
	}
	.two-column img {
		max-width: 100% !important;
	}
	.three-column img {
		max-width: 50% !important;
	}
}

@media screen and (min-width: 401px) and (max-width: 620px) {
	.three-column .column {
		max-width: 33% !important;
	}
	.two-column .column {
		max-width: 50% !important;
	}
}</style><!--[if (gte mso 9)|(IE)]>
    <style type="text/css">
        table {border-collapse: collapse;}
    </style>
    <![endif]-->
</head>
<body style="padding: 0;background-color: #ffffff;margin: 0 !important;">
    <center class="wrapper" style="width: 100%;table-layout: fixed;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;">
        <div class="webkit" style="max-width: 600px;margin: 0 auto;">
        <!--[if (gte mso 9)|(IE)]>
    <table width="600" align="center">
    <tr>
    <td>
    <![endif]-->
    <table class="outer" align="center" style="border-spacing: 0;font-family: sans-serif;color: #333333;margin: 0 auto;width: 100%;max-width: 600px;"><div id="xyz-wrapper"><div id="xyz-wrapper-newsletter"><table class="xyz-row outer" align="center" data-id="15" style="border-spacing: 0px; font-family: sans-serif; color: rgb(51, 51, 51); margin: 0px auto; width: 100%; max-width: 600px; position: relative; left: 0px; top: 0px;">
		<tbody><tr>
					<td class="left-sidebar" style="padding-top: 0;padding-bottom: 0;padding-right: 0;padding-left: 0;text-align: center;font-size: 0;padding: 0;">
						<!--[if (gte mso 9)|(IE)]>
						<table width="100%" style="border-spacing:0;font-family:sans-serif;color:#333333;" >
						<tr>
						<td width="100" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
						<![endif]-->
						
						<!--[if (gte mso 9)|(IE)]>
						</td>
						</tr>
						</table>
						<![endif]-->
					</td>
				</tr>
                    </tbody></table>
        
        
        
        <table class="xyz-row outer" align="center" data-id="18" style="border-spacing: 0px; font-family: sans-serif; color: rgb(51, 51, 51); margin: 0px auto; width: 100%; max-width: 600px; position: relative; left: 0px; top: 0px;">
                <tbody><tr>
                </tr><tr>
                    <td class="three-column" style="padding-right: 0;padding-left: 0;text-align: center;font-size: 0;padding-top: 10px;padding-bottom: 10px;padding: 0;">
                        <!--[if (gte mso 9)|(IE)]>
        <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#333333;" >
        <tr>
        <td width="200" valign="top" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
        <![endif]-->
                        <div class="column" style="width:100%;max-width:200px;display:inline-block;vertical-align:top;">
                            <table width="100%" style="border-spacing: 0;font-family: sans-serif;color: #333333;">
                                <tbody><tr>
                                    <td class="inner" style="padding-top: 10px;padding-bottom: 10px;padding-right: 10px;padding-left: 10px;padding: 10px;">
                                        <table class="xyzcontents" style="border-spacing: 0;font-family: sans-serif;color: #333333;width: 100%;font-size: 14px;text-align: center;">
                                            <tbody><tr>
                                                <td class="" style="padding-top: 0;padding-bottom: 0;padding-right: 0;padding-left: 0;padding: 0;">
                                                    <img src="http://josephalai.com/cropped-me-2--e1503595782835.jpg" width="180" alt="img" style="border-width: 0;width: 100%;max-width: 180px;height: auto;border: 0;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text" style="padding-bottom: 0;padding-right: 0;padding-left: 0;padding-top: 10px;padding: 0;"></td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                            </tbody></table>
                        </div>
                        <!--[if (gte mso 9)|(IE)]>
        </td><td width="200" valign="top" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
        <![endif]-->
                        <div class="column" style="width:100%;max-width:200px;display:inline-block;vertical-align:top;">
                            <table width="100%" style="border-spacing: 0;font-family: sans-serif;color: #333333;">
                                <tbody><tr>
                                    <td class="inner" style="padding-top: 10px;padding-bottom: 10px;padding-right: 10px;padding-left: 10px;padding: 10px;">
                                        <table class="xyzcontents" style="border-spacing: 0;font-family: sans-serif;color: #333333;width: 100%;font-size: 14px;text-align: center;">
                                            <tbody><tr>
                                                <td class="" style="padding-top: 0;padding-bottom: 0;padding-right: 0;padding-left: 0;padding: 0;">
                                                    <h2>Joseph Alai</h2>
                                                    <h3>Internet Scientist <br>&amp; Consultant</h3>
                                                    <p style="margin: 0;"><a href="http://josephalai.com" style="color: #ee6a56;text-decoration: underline;">josephalai.com</a></p>
                                                    <p style="margin: 0;"><a href="tel:619.633.5801" style="color: #ee6a56;text-decoration: underline;">619.633.5801</a></p>
                                                    <p style="margin: 0;"><a href="mailto:joseph@josephalai.com" style="color: #ee6a56;text-decoration: underline;">joseph@josephalai.com</a></p></td>
                                                    
                                                </tr></tbody></table></td>
                                            </tr>
                                            <tr>
                                                <td class="text" style="padding-bottom: 0;padding-right: 0;padding-left: 0;padding-top: 10px;padding: 0;">
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </div></td>
                                </tr>
                            </tbody></table>
                        </div>
                        <!--[if (gte mso 9)|(IE)]>
        </td><td width="200" valign="top" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
        <![endif]-->
                        <div class="column" style="width:100%;max-width:200px;display:inline-block;vertical-align:top;text-align:center;">
                            <table width="100%" style="border-spacing: 0;font-family: sans-serif;color: #333333;">
                                <tbody><tr>
                                    <td class="inner" style="padding-top: 10px;padding-bottom: 10px;padding-right: 10px;padding-left: 10px;padding: 10px;">
                                        <table class="xyzcontents" style="border-spacing: 0;font-family: sans-serif;color: #333333;width: 100%;font-size: 14px;text-align: center;">
                                            <tbody><tr>
                                                <td class="" style="padding-top: 0;padding-bottom: 0;padding-right: 0;padding-left: 0;padding: 0;">
                                                     
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text" style="padding-bottom: 0;padding-right: 0;padding-left: 0;padding-top: 10px;padding: 0;">
                                                
                                                </td>
                                                   
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                            </tbody></table>
                        </div>
                        <!--[if (gte mso 9)|(IE)]>
        </td>
        </tr>
        </table>
        <![endif]-->
                    
                
            </div></table>
        
        
        
        
        
        
        
        <table class="xyz-row outer" align="center" data-id="22" style="border-spacing: 0px; font-family: sans-serif; color: rgb(51, 51, 51); margin: 0px auto; width: 100%; max-width: 600px; position: relative; left: 0px; top: 0px;">
                <tbody><tr>
                    <td class="one-column" style="padding-top: 0;padding-bottom: 0;padding-right: 0;padding-left: 0;padding: 0;">
                        <table width="100%" style="border-spacing: 0;font-family: sans-serif;color: #333333;">
                            <tbody><tr>
                                <td class="inner" style="padding-top: 10px;padding-bottom: 10px;padding-right: 10px;padding-left: 10px;padding: 10px;">
                                    <p class="h1" style="margin: 0;font-weight: bold;font-size: 14px;margin-bottom: 10px;">Internet Scientist &amp; Consultant</p>
                                    <p class="xyzcontents" style="margin: 0;width: 100%;font-size: 14px;margin-bottom: 10px;text-align: left;">With over 10 years of Application Development Experience, I  create Web Applications such as Dating Websites, Social Networks, Business Applications, Professional Networks, VR/AR Apps, Video Games, and other innovative and industry disruptive Web and Phone Applications.</p>
                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
      
               
            </tbody></table>
        
        <table class="xyz-row outer" align="center" data-id="18" style="border-spacing: 0px; font-family: sans-serif; color: rgb(51, 51, 51); margin: 0px auto; width: 100%; max-width: 600px; position: relative; left: 0px; top: 0px;">
                <tbody><tr>
                </tr><tr>
                    <td class="three-column" style="padding-right: 0;padding-left: 0;text-align: center;font-size: 0;padding-top: 10px;padding-bottom: 10px;padding: 0;">
                        <!--[if (gte mso 9)|(IE)]>
        <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#333333;" >
        <tr>
        <td width="200" valign="top" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
        <![endif]-->
                        <div class="column" style="width:100%;max-width:200px;display:inline-block;vertical-align:top;">
                            <table width="100%" style="border-spacing: 0;font-family: sans-serif;color: #333333;">
                                <tbody><tr>
                                    <td class="inner" style="padding-top: 10px;padding-bottom: 10px;padding-right: 10px;padding-left: 10px;padding: 10px;">
                                        <table class="xyzcontents" style="border-spacing: 0;font-family: sans-serif;color: #333333;width: 100%;font-size: 14px;text-align: center;">
                                            <tbody><tr>
                                                <td class="" style="padding-top: 0;padding-bottom: 0;padding-right: 0;padding-left: 0;padding: 0;">
                                                    <img src="http://josephalai.com/three-column-03.jpg" width="180" alt="img" style="border-width: 0;width: 100%;max-width: 180px;height: auto;border: 0;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text" style="padding-bottom: 0;padding-right: 0;padding-left: 0;padding-top: 10px;padding: 0;">ROI-Conscious</td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                            </tbody></table>
                        </div>
                        <!--[if (gte mso 9)|(IE)]>
        </td><td width="200" valign="top" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
        <![endif]-->
                        <div class="column" style="width:100%;max-width:200px;display:inline-block;vertical-align:top;">
                            <table width="100%" style="border-spacing: 0;font-family: sans-serif;color: #333333;">
                                <tbody><tr>
                                    <td class="inner" style="padding-top: 10px;padding-bottom: 10px;padding-right: 10px;padding-left: 10px;padding: 10px;">
                                        <table class="xyzcontents" style="border-spacing: 0;font-family: sans-serif;color: #333333;width: 100%;font-size: 14px;text-align: center;">
                                            <tbody><tr>
                                                <td class="" style="padding-top: 0;padding-bottom: 0;padding-right: 0;padding-left: 0;padding: 0;">
                                                    <img src="http://josephalai.com/three-column-01.jpg" width="180" alt="img" style="border-width: 0;width: 100%;max-width: 180px;height: auto;border: 0;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text" style="padding-bottom: 0;padding-right: 0;padding-left: 0;padding-top: 10px;padding: 0;">
Scalable Planning                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                            </tbody></table>
                        </div>
                        <!--[if (gte mso 9)|(IE)]>
        </td><td width="200" valign="top" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
        <![endif]-->
                        <div class="column" style="width:100%;max-width:200px;display:inline-block;vertical-align:top;">
                            <table width="100%" style="border-spacing: 0;font-family: sans-serif;color: #333333;">
                                <tbody><tr>
                                    <td class="inner" style="padding-top: 10px;padding-bottom: 10px;padding-right: 10px;padding-left: 10px;padding: 10px;">
                                        <table class="xyzcontents" style="border-spacing: 0;font-family: sans-serif;color: #333333;width: 100%;font-size: 14px;text-align: center;">
                                            <tbody><tr>
                                                <td class="" style="padding-top: 0;padding-bottom: 0;padding-right: 0;padding-left: 0;padding: 0;">
                                                    <img src="http://josephalai.com/three-column-02.jpg" width="180" alt="img" style="border-width: 0;width: 100%;max-width: 180px;height: auto;border: 0;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text" style="padding-bottom: 0;padding-right: 0;padding-left: 0;padding-top: 10px;padding: 0;">Desktop &amp; Mobile Apps/Websites</td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                            </tbody></table>
                        </div>
                        <!--[if (gte mso 9)|(IE)]>
        </td>
        </tr>
        </table>
        <![endif]-->
                    </td>
                </tr>
            </tbody></table><table class="xyz-row outer" align="center" data-id="20" style="border-spacing: 0px; font-family: sans-serif; color: rgb(51, 51, 51); margin: 0px auto; width: 100%; max-width: 600px; position: relative; left: 0px; top: 0px;">
                <tbody><tr>
                    <td class="one-column" style="padding-top: 0;padding-bottom: 0;padding-right: 0;padding-left: 0;padding: 0;">
                        <table width="100%" style="border-spacing: 0;font-family: sans-serif;color: #333333;">
                            <tbody><tr>
                                <td class="inner xyzcontents" style="padding-top: 10px;padding-bottom: 10px;padding-right: 10px;padding-left: 10px;width: 100%;text-align: left;padding: 10px;">If you've got a great idea, I'll help you sort through it, make a game plan, and execute it. I'll build it out, market it, and maintain it. You can turn your idea into passive income, your primary source of income, or make a fortune.</td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody></table><table class="xyz-row outer" align="center" data-id="20" style="border-spacing: 0px; font-family: sans-serif; color: rgb(51, 51, 51); margin: 0px auto; width: 100%; max-width: 600px; position: relative; left: 0px; top: 0px;">
                <tbody><tr>
                    <td class="one-column" style="padding-top: 0;padding-bottom: 0;padding-right: 0;padding-left: 0;padding: 0;">
                        <table width="100%" style="border-spacing: 0;font-family: sans-serif;color: #333333;">
                            <tbody><tr>
                                <td class="inner xyzcontents" style="padding-top: 10px;padding-bottom: 10px;padding-right: 10px;padding-left: 10px;width: 100%;text-align: left;padding: 10px;"><p align="right" style="margin: 0;font-size: 14px;margin-bottom: 10px;">It was truly a pleasure meeting you.<br>
<br>  
Regards,<br><br>

Joseph Alai</p>
                                <p>
                                    
                                    
                                    "The present is theirs; the future, for which I really worked, is mine." - Nikola Tesla</p>
                                <br /><br />
                                Refer me and get $100 off your website or app!</td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody></table>

                <!-- start 600px content-->
       




                <!-- full width image1 header-->
        

           

      
                
      
       </div></center></body></html>
       
            <?php $msg = ob_get_clean();




mail($to, $subject, $msg, $headers);
}

//mail([to],[subject],[message],[headers],"-f tim@timothy.tim -F Timothy Timmington");

?>