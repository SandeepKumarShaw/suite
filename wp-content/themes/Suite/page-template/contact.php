<?php
/*
 *Template Name: Contact Page
 */
get_header(); ?>
 <section class="contentPan">
    	<article class="contentInn">
        	<div class="contactContent">
            	<article class="contactLeft">
                	<?php echo do_shortcode(get_field('send_us_a_message')); ?>
                </article>
                <article class="contactRight">
                	<h2><?php the_field('faqs_title'); ?></h2>
                    <?php $data=""; echo Suite_Print::contactfaq($data); ?>
                </article>
                <br class="spacer">
            </div>
            <br class="spacer">
        </article>
    </section>
  <?php get_footer(); ?>