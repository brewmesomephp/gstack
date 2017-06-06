<?php
/*
Plugin Name: custom post page
Plugin URI: http://www.zeevm.co.il
Description: Creates a nice custom post page/post archive, uses a choosen category to show a grid list of posts with image, read more and the excerpt.
Version: 0.4
Author URI: ze'ev ma'ayan
Author URI: http://www.zeevm.co.il

/*  TM zeev.co.il */

    
add_action('init', 'm_process_post');
//limit number of words in the text under the img
function m_excerpt($m_limit) {
  $m_excerpt = explode(' ', get_the_m_excerpt(), $m_limit);
  if (count($m_excerpt)>=$m_limit) {
    array_pop($m_excerpt);
    $m_excerpt = implode(" ",$m_excerpt).'...';
  } else {
    $m_excerpt = implode(" ",$m_excerpt);
  }	
  $m_excerpt = preg_replace('`\[[^\]]*\]`','',$m_excerpt);
  return $m_excerpt;
}
 
function m_content($m_limit) {
  $m_content = explode(' ', get_the_m_content(), $m_limit);
  if (count($m_content)>=$m_limit) {
    array_pop($m_content);
    $m_content = implode(" ",$m_content).'...';
  } else {
    $m_content = implode(" ",$m_content);
  }	
  $m_content = preg_replace('/\[.+\]/','', $m_content);
  $m_content = apply_filters('m_the_content', $m_content); 
  $m_content = str_replace(']]>', ']]&gt;', $m_content);
  return $m_content;
}
//create shortcode things
function m_process_post(){ 
function m_button_shortcode( $m_atts, $m_content = null ) {
    $m_x = 0;
    
ob_start(); // begin output buffering
   extract( shortcode_atts( array(
      'cat' => 'cat',
	  'onpage' => 'onpage',
	  'words' => 'words'
      ), $m_atts ) );?>
	  <ul class="zeevul">
<?php
    query_posts( array ( 'cat' => $cat, 'posts_per_page' => $onpage));
if (have_posts()) : while (have_posts()) : the_post();

   
?>
          
		<div class="container">		
          
<div class="col-md-2">		
<h3><?php echo get_post_meta(get_the_ID())['days'][0]; ?></h3>
</div>			
<div class="col-md-2">
<p> <h3><?php the_title(); ?></h3></a>
          <br>
            <p class="fonts" style="margin-top:-20px;"></p>
          </div>
          <div class="col-md-6" >
            <p class="fonts" style="margin-top:20px;"><?php echo print_r(get_the_content()); ?></p>
          </div>
          <div class="col-md-2">
              <div style="width:120px;background-color:white;height:65px;">
                  <p class="fonts"  style="margin-top:20px;position:relative;top:30%;vertical-align:middle;text-align:center;">
                      <a target="_blank" href="<?php echo get_post_meta(get_the_ID())['link'][0]; ?>">REGISTER</a>
                  </p>
              </div>
          </div>
          
          
          </div>
<hr style="padding-bottom: 10px; padding-top: 10px;color:white;border-color:white;border-width:4px;">

<?php
endwhile;
wp_reset_query();
?><?php endif;
// style it up
 ?>
</ul>
<style>
    
    
    
    p.fonts
    {
        font-family: 'Source Sans Pro', sans-serif;
        font-size:18px;
        color:black;
    }
ul.zeevul {
width:100%;
    font-family: 'Source Sans Pro', sans-serif;
    position:relative;
    padding: 0;
    list-style-type: none;

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
        font-size:24px;
        font-family: 'Source Sans Pro', sans-serif;";
        
    }
    
    p.captiondate
    {
        color: #245959;
        font-size:13px;
        opacity: .9;
        margin-top:-4px;
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
 $m_output = ob_get_contents(); // end output buffering
    ob_end_clean(); // grab the buffer contents and empty the buffer
    return $m_output;
} 
function m_archive()  { return sheker();}
add_shortcode('custom-post-page', 'm_button_shortcode');
}?>