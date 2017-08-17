<?php
/**
 * The template for displaying the header 
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php bloginfo( 'name' ); ?></title>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php if( is_front_page()){?>
<section class="page">
<?php }elseif(is_page('about')){?>
<section class="page aboutPage">
<?php }elseif(is_page('contact')){?>
<section class="page contactPage">
<?php }elseif(is_page('templates')){?>
<section class="page templatePage">
<?php }else{?>
<section class="page aboutPage">
<?php } ?>
	<!-- Start : Header -->
	<header class="header">
    	<!-- Start : Header Top Panel -->
    	<div class="headerTop">
        	<div class="headerTopInn">
            	<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Resume Design Suite"><?php bloginfo( 'name' ); ?></a></h1>
                <nav class="headerTopRight">
                	<ul class="topMenu">
                    	<li class="slide"><a href="#" title="Login" class="btn-slide">Login</a></li>
                    	<li class="last"><a href="<?php echo site_url(); ?>/contact/" title="Help">Help</a></li>
                    </ul>
                    <div id="panel">
                    	<h2>Login</h2>
                        <input type="text" value="User Name" onfocus="if(this.value=='User Name'){this.value=''};" onblur="if(this.value==''){this.value='User Name'};" class="emailBox">
                        <input type="text" value="Password" onfocus="if(this.value=='Password'){this.value=''};" onblur="if(this.value==''){this.value='Password'};">
                        <input type="button" value="Submit" class="loginBtn">
                    </div>                	
                	<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'mainMenu' ) ); ?>                    
                </nav>
                <br class="spacer">
            </div>
        </div>
        <!-- Start : Header Mid Panel -->
        <div class="headerMid">
        	<div class="headerMidInn">
            <?php if( is_front_page()){?>
            	<div id="slider">
                    <ul>
                    <?php
                       $sliderrepeate='slider';
                      Suite_Print::sliderpost($sliderrepeate);
                    ?>				
                        <!-- <li><div><h2>Create a resume that looks like you hired a graphic designer to do it.</h2><img src="<?php //echo get_template_directory_uri(); ?>/images/ban-img-1.png" class="bannerImg" alt=""></div></li>
                        <li><div><h2>Create a resume that looks like you hired a graphic designer to do it.</h2><img src="<?php //echo get_template_directory_uri(); ?>/images/ban-img-1.png" class="bannerImg" alt=""></div></li> -->
                    </ul>
    			</div>
            <?php }elseif(is_page('about')){?>
                <h2 class="aboutHeading"><?php echo get_field('banner_text');?></h2>
            <?php }elseif(is_page('contact')){?>
                <h2 class="contactHeading"><?php echo get_field('banner_text');?> </h2>
            <?php }elseif(is_page('templates')){?>
                <h2 class="templateHeading"><?php echo get_field('banner_text');?></h2>
            <?php }else{?>
                <h2 class="aboutHeading">THIS IS THE PART WHERE<br>WE TELL YOU A LITTLE BIT ABOUT US.</h2>
            <?php } ?>

            </div>
        </div>
        <!-- Start : Header Bottom Panel -->
        <div class="headerBottom">
        	<div class="headerBottomInn">
            	<a href="<?php echo site_url().'/templates'; ?>" title="GET STARTED!" class="getstarted">GET STARTED!</a>
            </div>
        </div>
    </header>
	<!-- End : Header -->
    <!-- Start : Content Panel -->