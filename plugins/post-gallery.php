<?php
/*
Plugin Name: post gallery
Plugin URI: http://www.zeevm.co.il
Description: Creates a nice post gallery/post archive, uses a choosen category to show a grid list of posts with image, read more and the excerpt.
Version: 0.4
Author URI: ze'ev ma'ayan
Author URI: http://www.zeevm.co.il

/*  TM zeev.co.il */

    
add_action('init', 'process_post');
//limit number of words in the text under the img
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}
 
function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }	
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}
//create shortcode things
function process_post(){ 
function button_shortcode( $atts, $content = null ) {
    $x = 0;
    
ob_start(); // begin output buffering
   extract( shortcode_atts( array(
      'cat' => 'cat',
	  'onpage' => 'onpage',
	  'words' => 'words'
      ), $atts ) );?>
	  <ul class="zeevul">
<?php
    query_posts( array ( 'cat' => $cat, 'posts_per_page' => $onpage));
if (have_posts()) : while (have_posts()) : the_post();

   
?>
		<div class="col-md-4">		
          
					<?php
                if(has_post_thumbnail()) { ?>
            <div class="overlaid">
                
                <p class="themonth"><?php $month = strtoupper(get_the_time( 'M' )); echo $month; ?></p>
                    <p class="thedate"><?php echo intval(get_the_time('d'));?></p>
            </div>
                    <div class="entry-thumbnail thumbnail">
                        <a href="/?page_id=157"><?php the_post_thumbnail();?></a>
                        
                    </div>
            <?php } else { ?>
                
                <div class="entry-thumbnail thumbnail">
                    <a href="/?page_id=157"><img src="<?php echo plugins_url(); ?>/post-gallery-and-archive/default-img.png" alt="Image Unavailable" /></a>
                </div>
            <?php } ?>

<p> <a class="posttitle" href="/?page_id=157" style=""><?php the_title(); ?></h2></a><p class="captiondate"><?php echo get_post_meta(get_the_ID())['days'][0]; ?> </p>

          </div>
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
    .thumbnail {
    width: 325px;
    height: 325px;
    overflow: hidden;
    position: relative;
}

.thumbnail img.wp-post-image {
    position: absolute;
    margin: auto; 
    min-height: 100%;
    min-width: 100%;

    /* For the following settings we set 100%, but it can be higher if needed 
    See the answer's update */
    left: -100%;
    right: -100%;
    top: -100%;
    bottom: -100%;
}
</style>
<?php
 $output = ob_get_contents(); // end output buffering
    ob_end_clean(); // grab the buffer contents and empty the buffer
    return $output;
} 
Function archive()  { return sheker();}
add_shortcode('post-gallery', 'button_shortcode');
}?>