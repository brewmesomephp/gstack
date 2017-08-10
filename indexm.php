

<meta http-equiv="Cache-Control" content="max-age=200" />   

<meta http-equiv="Content-Type" value="application/xhtml+xml;charset=utf-8" />

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<!-- saved from url=(0047)http://www.leanbellybreakthrough.com/index.html -->

<html xmlns="http://www.w3.org/1999/xhtml" class="gr__leanbellybreakthrough_com"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"



<!-- Google Tag Manager -->

    <script>

        (function(w, d, s, l, i) {

            w[l] = w[l] || [];

            w[l].push({

                'gtm.start': new Date().getTime(),

                event: 'gtm.js'

            });

            var f = d.getElementsByTagName(s)[0],

                j = d.createElement(s),

                dl = l != 'dataLayer' ? '&l=' + l : '';

            j.async = true;

            j.src =

                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;

            f.parentNode.insertBefore(j, f);

        })(window, document, 'script', 'dataLayer', 'GTM-NKRJTB');

    </script>

    <!-- End Google Tag Manager -->



<!-- Facebook Pixel Code -->

<script>

!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?

n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;

n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;

t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,

document,'script','https://connect.facebook.net/en_US/fbevents.js');

fbq('init', '651271141703970');

fbq('track', 'PageView');

</script>

<noscript>

<img height="1" width="1" style="display:none"

src="https://www.facebook.com/tr?id=651271141703970&ev=PageView&noscript=1"

/>

</noscript>
    

<!-- DO NOT MODIFY -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.js'></script> 

<script type="text/javascript" src="https://cdn.jsdelivr.net/fancybox/2.1.5/helpers/jquery.fancybox-media.min.js"></script>

    <link rel='stylesheet' id='twentyfifteen-style-css22'  href='https://cdn.jsdelivr.net/fancybox/2.1.5/jquery.fancybox.min.css' type='text/css' media='all' />


    <style>

.hideitnow {

            display: none;

        }

        

        #countdown {

            width: 804px;

            position: relative;

            left: 50%;

            margin-left: -402px;

            z-index: 999;

            border-radius: 5px;

            display: none;

        }

        

        #countdown h2 {

            color: darkred;

            margin-bottom: 10px;

            ;

        }

        

        #countdown h3 {

            text-decoration: underline;

            color: #333;

            display: block;

            margin: 0;

            padding: 0;

            text-align: center;

        }

        

        #countdown .boxes {

            clear: both;

            margin-top: 40px;

            text-align: center;

        }

        

        #countdown .box {

            width: 120px;

            height: 140px;

            border: 5px solid #ccc;

            background: #fff;

            border-radius: 7px;

            display: inline-block;

            margin-right: 20px;

            color: #444444;

            text-align: center;

        }

        

        #countdown .box.last {

            margin-right: 0;

        }

        

        #countdown .box strong {

            font-size: 95px;

            line-height: 90px;

            display: block;

            margin-top: 20px;

        }

        

        #countdown .box span {

            font-size: 23px;

            font-weight: bold;

            color: #333;

        }

        

        #countdown-overlay {

            position: fixed;

            top: 0;

            left: 0;

            overflow: hidden;

            z-index: 8010;

            width: 100%;

            height: 100%;

            background: rgba(0, 0, 0, .5);

            z-index: 888;

        }

        

        [class*='close-'] {

            color: #fff;

            font: 14px/100% arial, sans-serif;

            position: absolute;

            right: -13px;

            top: -13px;

            text-decoration: none;

            text-shadow: 0 1px 0 #fff;

            background: red;

            padding: 10px;

            border-radius: 50px;

            padding-bottom: 12px;

            display: none;

        }

        

        .close-thik:after {

            content: '✖';

        }

</style>
    
    
<!-- End Facebook Pixel Code -->

<script>

        jQuery(document).ready(function(e) {



            redirect_page = readCookie('show_button');

            if (redirect_page == '' || redirect_page == null) {

                createCookie('show_button', 'ok', 365);

            } else {

                jQuery('.glblclass').removeClass('hideitnow');

                jQuery('#countdown').show();



            }





            jQuery(document).mousemove(function(e) {

                //console.log(e.pageY); 

                if (e.pageY <= 5) {

                    jQuery(".share_url").fancybox({

                        //'closeBtn' : false,

                        maxHeight: 600,

                        openEffect: 'none',

                        closeEffect: 'true',

                        helpers: {

                            overlay: {

                                closeClick: true

                            }, // prevents closing when clicking OUTSIDE fancybox 

                            title: {

                                type: 'over'

                            }

                        }

                    }).trigger('click');

                }

            });



            jQuery('.close-thik').click(function() {

                jQuery('#countdown-overlay').hide();

                jQuery('#countdown').hide();

            });



            jQuery('#countdown-overlay').click(function() {

                jQuery('#countdown-overlay').hide();

                jQuery('#countdown').hide();

            });



            setTimeout(function() {

                jQuery('.showit').show();

                jQuery('#countdown').show();

            }, 400000);





            setInterval(times, 1);



            function times() {

                var now = moment().tz("America/New_York");

                var then = moment().tz("America/New_York").endOf('day');

                var diff = then.diff(now);

                var duration = moment.duration(diff);

                jQuery("#hours strong").text(duration.hours());

                jQuery("#minutes strong").text(duration.minutes());

                jQuery("#seconds strong").text(duration.seconds());

            }

        });

    </script>

<script type="application/javascript">



function createCookie(name, value, days) {

				if (days) {

					var date = new Date();

					date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));

					var expires = "; expires=" + date.toGMTString();

				} else var expires = "";

				document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";

}

					

function readCookie(name) {

						var nameEQ = escape(name) + "=";

						var ca = document.cookie.split(';');

						for (var i = 0; i < ca.length; i++) {

							var c = ca[i];

							while (c.charAt(0) == ' ') c = c.substring(1, c.length);

							if (c.indexOf(nameEQ) == 0) return unescape(c.substring(nameEQ.length, c.length));

						}

						return null;

					}

		

function eraseCookie(name) {

			createCookie(name, "", -1);

		}



//createCookie('redirect_to_chat','ok',1000);



			



            	

            </script>

<!-- Start Visual Website Optimizer Asynchronous Code -->

<script type='text/javascript'>

var _vwo_code=(function(){

var account_id=67669,

settings_tolerance=2000,

library_tolerance=2500,

use_existing_jquery=false,

/* DO NOT EDIT BELOW THIS LINE */

f=false,d=document;return{use_existing_jquery:function(){return use_existing_jquery;},library_tolerance:function(){return library_tolerance;},finish:function(){if(!f){f=true;var a=d.getElementById('_vis_opt_path_hides');if(a)a.parentNode.removeChild(a);}},finished:function(){return f;},load:function(a){var b=d.createElement('script');b.src=a;b.type='text/javascript';b.innerText;b.onerror=function(){_vwo_code.finish();};d.getElementsByTagName('head')[0].appendChild(b);},init:function(){settings_timer=setTimeout('_vwo_code.finish()',settings_tolerance);var a=d.createElement('style'),b='body{opacity:0 !important;filter:alpha(opacity=0) !important;background:none !important;}',h=d.getElementsByTagName('head')[0];a.setAttribute('id','_vis_opt_path_hides');a.setAttribute('type','text/css');if(a.styleSheet)a.styleSheet.cssText=b;else a.appendChild(d.createTextNode(b));h.appendChild(a);this.load('//dev.visualwebsiteoptimizer.com/j.php?a='+account_id+'&u='+encodeURIComponent(d.URL)+'&r='+Math.random());return settings_timer;}};}());_vwo_settings_timer=_vwo_code.init();

</script>

<!-- End Visual Website Optimizer Asynchronous Code -->
  

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Success With Anthony 2017</title>

<link rel="stylesheet" href="http://swa2017.com/lbb/reset.css">

<link rel="stylesheet" href="http://swa2017.com/lbb/vslbase.css">

  <script src="http://swa2017.com/lbb/jquery-1.7.min.js.download"></script>

  	<style>

			.player {

				position: relative;

			}

			.player .over {

				position: absolute;

				bottom: 0;

				right: 0;

				z-index: 100;

				width: 20%;

				height: 20%;

			}

			.hbox p {

			font-size:15px;

			line-height:115%;

			}

		</style>







		

	



 <script src="http://swa2017.com/lbb/jquery.min.js.download"></script>	



<!-- jQuery !-->

	<!-- glue !-->

	<link rel="stylesheet" type="text/css" href="http://swa2017.com/lbb/jquery.glue.css">

	<script src="http://swa2017.com/lbb/jquery.glue.min.js.download"></script>

		<script>

		

		$(document).ready(function(){



			$.glue({

				layer: '#beforeyougo',

				maxamount: 1,

				cookie: false

			});

						

		});

		

	</script> 

</head>

<body class="vslbg" data-gr-c-s-loaded="true" style="background:url(http://swa2017.com/lbb/clouds.jpg) no-repeat center center fixed;">

    
<img src='http://admin.buildredirects.com/api/v1/conversions/4du1ir90/img_track?oid=15256&clickid=false' height='1' width='1' />
<img src='http://admin.buildredirects.com/api/v1/conversions/4du1ir90/img_track?oid=15258&clickid=false' height='1' width='1' />
<img src='http://admin.buildredirects.com/api/v1/conversions/4du1ir90/img_track?oid=15260&clickid=false' height='1' width='1' />
<img src='http://admin.buildredirects.com/api/v1/conversions/4du1ir90/img_track?oid=15262&clickid=false' height='1' width='1' />
<img src='http://admin.buildredirects.com/api/v1/conversions/4du1ir90/img_track?oid=15204&clickid=false' height='1' width='1' />
<img src='http://admin.buildredirects.com/api/v1/conversions/4du1ir90/img_track?oid=15208&clickid=false' height='1' width='1' />
<img src='http://admin.buildredirects.com/api/v1/conversions/4du1ir90/img_track?oid=15210&clickid=false' height='1' width='1' />
<img src='http://admin.buildredirects.com/api/v1/conversions/4du1ir90/img_track?oid=15212&clickid=false' height='1' width='1' />
<img src='http://admin.buildredirects.com/api/v1/conversions/4du1ir90/img_track?oid=17512&clickid=false' height='1' width='1' />
<img src='http://admin.buildredirects.com/api/v1/conversions/4du1ir90/img_track?oid=17514&clickid=false' height='1' width='1' />

    <!-- Google Tag Manager (noscript) -->

<noscript>

<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKRJTB"

	height="0" width="0" style="display:none;visibility:hidden"></iframe>

</noscript>

<!-- End Google Tag Manager (noscript) -->

    

    <div class=""><!--[if (!IE) | (gt IE 7)]-->

<div class="topheading" style="margin-bottom:-2%;"><img src="http://swa2017.com/lbb/headline-tx.png" style="max-width:100%;"></div>

    

<div class="vslwrap clearfix">

<div class="contentwrap">

<!--<div class="videocontainer"><script charset="ISO-8859-1" src="//fast.wistia.com/assets/external/E-v1.js" async></script>

                            <div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;">

                                <div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;">

                                    <div class="wistia_embed wistia_async_ddwv48nmxf videoFoam=true" style="height:100%;width:100%; background-color:#6282ad">&nbsp;</div>

                                </div>

                            </div>

                     

</div>-->

	<div class="yt-videocontainer">

<div class="videowrapper player"><div class="over"></div>

             <iframe src="http://www.youtube.com/embed/cxaYFLez4iU?ecver=2&controls=0&modestbranding=1" style="max-width:100% !important;" frameborder="0" width="640" height="360" frameborder="0"  allowfullscreen></iframe>

			 <!--<iframe width="696" height="392" src="//www.youtube.com/embed/pdBSewRlHP4?modestbranding=1&autoplay=1&controls=0&showinfo=0&rel=0" frameborder="0"></iframe>-->

			 </div>

		</div>
    
<!--    QUEESHA-->
    <p class="mini" style="text-align:center;font-size:16px;"><br><br><strong>Make sure you watch this video right to the end, as the end will surprise you!</strong></p>

	  <div id="countdown" class="showIt" style="display:block;">

            <a href="#" class="close-thik"></a>

            <h2>EARLY-BIRD LAUNCH SPECIAL</h2>

            <h3>ENDING TONIGHT AT 11:59PM ET</h3>

            <div class="boxes">

                <div class="box" id="hours">

                    <strong></strong>

                    <span>Hours</span>

                </div>

                <div class="box" id="minutes">

                    <strong></strong>

                    <span>Minutes</span>

                </div>

                <div class="box last" id="seconds">

                    <strong></strong>

                    <span>Seconds</span>

                </div>

            </div>

        </div>

      <div class="ctr hideitnow showit glblclass" style="padding-top:20px;text-align:center;">
          <br /><img src="http://d38t0hd6nnqnp9.cloudfront.net/mobile01/img/Red-Arrows-down_min_v1.png" /> </div>

      <p class="mini hideitnow showit glblclass" style="margin: 0 0 -14px !important;text-align:center;font-size:18px;"><strong>Signup Takes Less Than 60 Seconds</strong></p>

      <p class="mini hideitnow showit glblclass" style="margin-bottom:0;text-align:center;font-size:18px;">The Page Will Open In A New Window</p>
<!--    -->

	

<div id="link_id1" style="display: block;">
    <a href="https://swa.crmsecureorders.com/37"><img src="left.jpg" style="max-width:100%;"></a><br />
<a href="https://swa.crmsecureorders.com/5"><img src="cta495right.png" style="max-width:100%;"></a>
<!--
<a href="https://swa.crmsecureorders.com/37"><img src="http://swa2017.com/img/cta37left.png" style="max-width:100%;"></a>
<a href="https://swa.crmsecureorders.com/5"><img src="http://swa2017.com/img/cta495right.png" style="max-width:100%;"></a>
-->
     <h2>Get The Complete <span style="color: #3366ff;">Success With Anthony 2017</span> System For Just $37 lifetime or $4.95 a month. </h2>

		<!--  <p style="padding-top:2%;text-align: center;"><a href="https://swa.crmsecureorders.com/5"><img src="http://swa2017.com/lbb/bundle.png" alt="Lean Belly Breakthrough" style="max-width:100%;"></a></p>-->

</div>



<!-- HEADINGBOX -->

<!--

<div class="hboxwrap">

<div class="hbox-heading">WHAT YOU ARE ABOUT TO LEARN:</div>

<div class="hbox">

<div class="section group">

	<div class="col span_pic">

	<img src="vsl-images/pic-1.jpg">

	</div>

	<div class="col span_content">

	<p class="hbox-title">The Odd 2-Minute Ritual That Burns 1 Pound Of Belly Fat Daily...</p>

	<p>and why it will reverse type 2 diabetes, increase energy and boost sex drive.</p>

	</div>

	<div class="col span_pic">

	<img src="vsl-images/pic-2.jpg">

	</div>

	<div class="col span_content">

	<p class="hbox-title">The “Mirror Test” That Predicts Heart Attacks...</p>

	<p>and the important facial feature you must pay attention to.</p>

	</div>

</div>



<div class="section group">

	<div class="col span_pic">

	<img src="vsl-images/pic-3.jpg">

	</div>

	<div class="col span_content">

	<p class="hbox-title">The German Fat Burning Tonic...</p>

	<p>and how it melts away stubborn belly fat with results you can see in just one single day.</p>

	</div>

	<div class="col span_pic">

	<img src="vsl-images/pic-4.jpg">

	</div>

	<div class="col span_content">

	<p class="hbox-title">The Simple Method For Burning Off Dangerous “Visceral” Belly Fat...</p>

	<p>and how one simple 2-minute ritual melts away this deadly fat surrounding your internal organs making you look instantly slimmer while reducing risk of sudden death.</p>

	</div>

</div>

		



</div>

</div>

<!-- END OF HEADING BOX -->

<div id="warning"><strong><span class="red"><span class="highlight">***WARNING:</span> Due to the success stories happening every day with this brand new system,

please do not share this secret system with anyone! We can only allow this powerful information into a limited amount of hands</span></strong></div>	

    <br />        

    <h2>Testimonials</h2>

    <p align="center" style="font-size:26px;font-weight:900;">

    "I am over $2100 per month. Your training is awesome"

    <img src="http://swa2017.com/testimonials/1.png" style="max-width:100%;"><br /><br />

    "I made $398.80 today with ClickFunnels..."



    <img src="http://swa2017.com/testimonials/2.png" style="max-width:100%;"><br /><br />

    

    

"First $100k in a month..." <br />

    <img src="http://swa2017.com/testimonials/3.png" style="max-width:100%;text-align:center;"><br /><br />

    

    

"I just do exactly what you tell me...and BOOM... I'm over $1200 a month..."



    <img src="http://swa2017.com/testimonials/4.png" style="max-width:100%;"><br /><br />

    

    "$196.40 Current MMR + $157.60 Potential MMR! Thanks to Anthony!"



    <img src="http://swa2017.com/testimonials/5.png" style="max-width:100%;"><br /><br />

    

    "...$511.60 so far... :)"

    <img src="http://swa2017.com/testimonials/6.png" style="max-width:100%;"><br /><br />

    

"wow my first sale and many more to come"

    <img src="http://swa2017.com/testimonials/7.png" style="max-width:100%;"><br /><br />

        $9087 Monthly Recurring!

    <img src="http://swa2017.com/testimonials/8.png" style="max-width:100%;"><br /><br />
          </p>
<div id="link_id2" style="display: block; text-align:center;">
<a href="https://swa.crmsecureorders.com/37"><img src="left.jpg" style="max-width:100%;"></a><br />
<a href="https://swa.crmsecureorders.com/5"><img src="cta495right.png" style="max-width:100%;"></a>
     <h2>Get The Complete <span style="color: #3366ff;">Success With Anthony 2017</span> System For Just $37 lifetime or $4.95 a month. </h2>

		  <!-- <p style="padding-top:2%;text-align: center;"><a href="https://swa.crmsecureorders.com/5"><img src="http://swa2017.com/lbb/bundle.png" alt="Lean Belly Breakthrough" style="max-width:100%;"></a></p>-->

</div>


</div>

<!-- FOOTER ----->

<div id="footer">

<div class="footermenu"><span></span>

    <style> p{font-size:12px;}

    </style>

		<p>(c) 2017 SWA2017.com is a registered trademark of Morrison Publishing LLC. All other marks are the property of their respective owners. All rights reserved.</p>

<p><a href="mailto:Support@SWA2017.com">Support@SWA2017.com</a></p>

<p> Unauthorized duplication or publication of any materials from this site is expressly prohibited.<br>The results of the students show in this video are not typical of our average student.  <br><br>



 <a href="http://swa2017.com/terms.html" target="_blank">Terms & Conditions</a> | <a href="http://swa2017.com/earnings.html"target="_blank">Earnings Disclaimer</a> | <a href="http://swa2017.com/refund.html" target="_blank">Refund Policy</a>  | <a href="http://www.swamembers.com/">Members Area</a><br><br>

  



All trademarks, logos, and service marks displayed are registered and/or unregistered Trademarks of their respective owners. Every effort has been made to accurately represent the product(s) sold through this website and their potential. Any claims made or examples given are believed to be accurate, however, should not be relied on in any way in making a decision whether or not to purchase. The typical person who purchases these materials makes little to no money.  Any testimonials and examples used are exceptional results, don't apply to the average purchaser and are not intended to represent or guarantee that anyone will achieve the same or similar results. Each individual's success depends on his or her background, dedication, desire and motivation as well as other factors not always known and sometimes beyond control. There is no guarantee you will duplicate the results stated here. You recognize any business endeavor has inherent risk for loss of capital. By ordering the this product or any related products/services, you agree to all listed on this website. In some cases actors have been used. This is a new system and there are no typical results. This product does not guarantee income or success, and examples of the product owner's and other person's results do not represent an indication of future success or earnings.

</center>

</div>

<!--------- END OF FOOTER ---------->





<!--	



<div id="beforeyougo" style="display: none;top:10%;" class="glue_popup">

		<div class="glue_close" onclick="$.glue_close()">X</div>

		<div class="glue_content">

		<div class="ext"><img src="http://swa2017.com/lbb/exit.png" style="width:100%;">

		</div>

		<div class="pop-button"><a href="http://swa2017.com/hold/exitpop19.php" class="myButton">STAY</a></div>

		<div class="glue_close2" onclick="$.glue_close()">no thank you</div>

	</div>

-->





</div></div>







</div></div>

    

    

    <script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.13/moment-timezone-with-data-2012-2022.min.js"></script>

    

    <script> 

		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ 

		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), 

		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) 

		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga'); 

		ga('create', 'UA-84490332-6', 'auto'); 

		ga('send', 'pageview'); 

	</script>





<script>

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){

  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),

  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)

  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');



  ga('create', 'UA-99829025-1', 'auto');

  ga('send', 'pageview');



</script>

    

    </body></html>