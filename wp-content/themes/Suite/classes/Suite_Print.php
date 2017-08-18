<?php
/**
 *  Call Methods class
 *
 * Used like helpers class, to use diferent functionality from one place.
 * All methods are static, no objects are created, this is only for direct call.
 *
 * Used with Suite_Print::HelpMethod()
*/
class Suite_Print{

	public static function sliderpost($data){
	    if ( have_rows('slider_header') ) {
	        while( have_rows('slider_header') ) : the_row();
	            $slider_text = get_sub_field('slider_text_header');    
	            $slider_image = get_sub_field('slider_image_header');	            
	            $data .="<li>";
	            $data .="<div>";
	            $data .="<h2>".$slider_text."</h2>";
	            $data .="<img src='".$slider_image["url"]."' class='bannerImg' alt=''>";
	            $data .="</div>";
	            $data .="</li>";
	        endwhile;
	    }    
	    return $data;        
    }

    public static function contactfaq($data){
	    if ( have_rows('faqs_contents') ) {
	        while( have_rows('faqs_contents') ) : the_row();
	            $contactfaq = get_sub_field('content');          
	            $data .= $contactfaq;	           
	        endwhile;
	    }    
	    return $data;        
    }

}