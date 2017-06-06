<?php
/*
Plugin Name: personalities
Plugin URI: http://www.zeevm.co.il
Description: Creates a nice personalities/post archive, uses a choosen category to show a grid list of posts with image, read more and the excerpt.
Version: 0.4
Author URI: ze'ev ma'ayan
Author URI: http://www.zeevm.co.il

/*  TM zeev.co.il */

    
add_action('init', 'p_process_post');
//limit number of words in the text under the img
function p_excerpt($p_limit) {
  $p_excerpt = explode(' ', get_the_p_excerpt(), $p_limit);
  if (count($p_excerpt)>=$p_limit) {
    array_pop($p_excerpt);
    $p_excerpt = implode(" ",$p_excerpt).'...';
  } else {
    $p_excerpt = implode(" ",$p_excerpt);
  }	
  $p_excerpt = preg_replace('`\[[^\]]*\]`','',$p_excerpt);
  return $p_excerpt;
}
 
function p_content($p_limit) {
  $p_content = explode(' ', get_the_p_content(), $p_limit);
  if (count($p_content)>=$p_limit) {
    array_pop($p_content);
    $p_content = implode(" ",$p_content).'...';
  } else {
    $p_content = implode(" ",$p_content);
  }	
  $p_content = preg_replace('/\[.+\]/','', $p_content);
  $p_content = apply_filters('p_the_content', $p_content); 
  $p_content = str_replace(']]>', ']]&gt;', $p_content);
  return $p_content;
}
//create shortcode things
function p_process_post(){ 
function p_button_shortcode( $p_atts, $p_content = null ) {
    $p_x = 0;
    
ob_start(); // begin output buffering
   extract( shortcode_atts( array(
      'cat' => 'cat',
	  'onpage' => 'onpage',
	  'words' => 'words'
      ), $p_atts ) );?>
	  <ul class="zeevul">
<?php
    query_posts( array ( 'cat' => $cat, 'posts_per_page' => $onpage));
if (have_posts()) : while (have_posts()) : the_post();

   
?>
          <div class="container">
		<div class="col-md-4">		
          
					<?php
                if(has_post_thumbnail()) { ?>
            
                    <div class="entry-thumbnail">
                       
                        <?php the_post_thumbnail();?>
                        
                    </div>
            <?php } else { ?>
                
                <div class="entry-thumbnail">
                    <img src="<?php echo plugins_url(); ?>/post-gallery-and-archive/default-img.png" alt="Image Unavailable" />
                </div>
            <?php } ?>
          </div>
          <div class="col-md-8">
              <p> <h2 class="posttitle" style=""><?php the_title(); ?></h2></p>

              
<p class="captiondate"><?php print get_the_content(); ?></p>
          </div>
          </div>
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
.entry-thumbnail
{
margin-top:30px;
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
 $p_output = ob_get_contents(); // end output buffering
    ob_end_clean(); // grab the buffer contents and empty the buffer
    return $p_output;
} 
Function p_archive()  { return sheker();}
add_shortcode('personalities', 'p_button_shortcode');
}?>