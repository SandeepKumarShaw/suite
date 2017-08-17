<?php
/**
* 
*/
class Suite_Print{

	public $x;

	public static function sliderpost($sliderrepeate){
		if ( have_rows($sliderrepeate) ) {
			while ( have_rows($sliderrepeate) ) {
             $slider_text = get_sub_field('slider_text');
             $slider_image = get_sub_field('slider_image'); 

			
		$x= '<li>
			<div>
				<h2>'.$slider_text.'</h2>
				<img src="'.$slider_image["url"].'" class="bannerImg" alt="">
			</div>
		</li>';
		
	    }
    }
    return $x;
  }

  /*public static function sliderpost($sliderrepeate){
		if ( have_rows($sliderrepeate) ) {
			while ( have_rows($sliderrepeate) ) {
             $slider_text = get_sub_field('slider_text');
             $slider_image = get_sub_field('slider_image'); 

		?>	
		<li>
			<div>
				<h2><?php echo $slider_text; ?></h2>
				<img src="<?php echo $slider_image['url'] ; ?>" class="bannerImg" alt="">
			</div>
		</li>
		<?php 
	    }
    }
  }*/
}