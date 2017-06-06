<?php
/*
Plugin Name: testimony
Plugin URI: http://www.zeevm.co.il
Description: Creates a nice testimony/post archive, uses a choosen category to show a grid list of posts with image, read more and the excerpt.
Version: 0.4
Author URI: ze'ev ma'ayan
Author URI: http://www.zeevm.co.il

/*  TM zeev.co.il */

    
add_action('init', 't_process_post');
//limit number of words in the text under the img
function t_excerpt($t_limit) {
  $t_excerpt = explode(' ', get_the_t_excerpt(), $t_limit);
  if (count($t_excerpt)>=$t_limit) {
    array_pop($t_excerpt);
    $t_excerpt = implode(" ",$t_excerpt).'...';
  } else {
    $t_excerpt = implode(" ",$t_excerpt);
  }	
  $t_excerpt = preg_replace('`\[[^\]]*\]`','',$t_excerpt);
  return $t_excerpt;
}
 
function t_content($t_limit) {
  $t_content = explode(' ', get_the_t_content(), $t_limit);
  if (count($t_content)>=$t_limit) {
    array_pop($t_content);
    $t_content = implode(" ",$t_content).'...';
  } else {
    $t_content = implode(" ",$t_content);
  }	
  $t_content = preg_replace('/\[.+\]/','', $t_content);
  $t_content = apply_filters('t_the_content', $t_content); 
  $t_content = str_replace(']]>', ']]&gt;', $t_content);
  return $t_content;
}
//create shortcode things
function t_process_post(){ 
function t_button_shortcode( $t_atts, $t_content = null ) {
    $t_x = 0;
    
ob_start(); // begin output buffering
   extract( shortcode_atts( array(
      'cat' => 'cat',
	  'onpage' => 'onpage',
	  'words' => 'words'
      ), $t_atts ) );?>
	  <ul class="zeevul">
<?php
    query_posts( array ( 'cat' => $cat, 'posts_per_page' => $onpage));
if (have_posts()) : while (have_posts()) : the_post();

   
?>
          <div class="container">
		
          <div class="col-md-12">

              
<p class="captiondate"><?php print get_the_content(); ?></p>
                            <p> <h3 class="posttitle" style=""><?php the_title(); ?></h3></p>

          </div>
          </div>
<hr>
<hr>
<?php
endwhile;
wp_reset_query();
?><?php endif;
// style it up
 ?>
</ul>
<style>
ul.zeevul {
width:100%;
    font-family: 'Source Sans Pro', sans-serif;
    position:relative;
    padding: 0;
    list-style-type: none;

}
    
.thumby
    {
        max-width: 200px;
    }

ul.zeevul li {
list-style:none!important;
display:inline-block;
vertical-align: bottom;
width:30%;
margin-left:1%;
margin-top:50px;
padding: 0 0 0 0;
}
    
p.thedate{
 margin-top:-26px;
    font-size:34px;
    
    
}
    
p.themonth{
 font-size:16px;
    margin-top:6px;
    
}
    
div.overlaid
{
    width:70px;
    height:70px;
    background-color:#ffffff;
    color:black;
    display: block;
float: right;  
z-index: 3;
position: absolute; /*newly added*/
right: 30px; /*newly added*/
top: 15px;/*newly added*/
    cursor:pointer;
    text-align:center;
}
    
    a.posttitle
    {
        color:#145959;
        font-size:28px;
        font-family: 'Source Sans Pro', sans-serif;";
        
    }
    
    p.captiondate
    {
        color: #000000;
        font-size:18px;
        opacity: .9;
        margin-top:-4px;
        font-family: 'Source Sans Pro', sans-serif;";
    }
    
ul.zeevul li img{
width:100%;
opacity: 1;
transition: opacity .25s ease-in-out;
-moz-transition: opacity .25s ease-in-out;
-webkit-transition: opacity .25s ease-in-out;
    position:relative;
    right:0px;
    z-index:0;
}
ul.zeevul li img:hover{
opacity:0.6;
filter:alpha(opacity=60);
}
@media screen and (max-width: 1024px){
ul.zeevul li {
width:100%;
margin-left:0;
margin-top:5px;
}
}
</style>
<?php
 $t_output = ob_get_contents(); // end output buffering
    ob_end_clean(); // grab the buffer contents and empty the buffer
    return $t_output;
} 
Function t_archive()  { return sheker();}
add_shortcode('testimony', 't_button_shortcode');
}?>