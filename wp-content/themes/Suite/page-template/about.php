<?php
/*
*Template Name: About
*/
get_header(); ?>
    <section class="contentPan">
      <article class="contentInn">
          <div class="aboutContent">
              <div class="aboutLeft">
                    <?php if( have_rows('about_middle_section') ): ?>   
                    <?php while( have_rows('about_middle_section') ): the_row();   
                    $title = get_sub_field('title');
                    $content = get_sub_field('content');       
                    ?>
                    <h2><?php echo $title; ?></h2>
                    <?php echo $content; ?>
                    <?php endwhile; ?>
                    <?php endif; ?>   
                </div>
                <div class="aboutRight">
                    <?php if( have_rows('about_right_section') ): ?>   
                    <?php while( have_rows('about_right_section') ): the_row();   
                    $title1 = get_sub_field('title1');
                    $content1 = get_sub_field('content1');       
                    ?>
                    <h2><?php echo $title1; ?></h2>
                    <?php echo $content1; ?>
                    <?php endwhile; ?>
                    <?php endif; ?>   
                </div>
                <br class="spacer">
            </div>
            <br class="spacer">
        </article>
    </section>
<?php get_footer(); ?>
