<?php
/**
 * The template for displaying the footer 
 */
?>
<!-- Start : Bottom Panel -->
   <!-- Start : Footer -->
    <footer class="footer">
    	<div class="footerInn">
        	<div class="footerLeft">
            	<h2>Newsletter Sign-Up<span></span></h2>
                <form action="#" method="post">
                	<input type="text" value="Your Email Address" onfocus="if(this.value=='Your Email Address'){this.value=''};" onblur="if(this.value==''){this.value='Your Email Address'};" class="emailBox">
                    <input type="submit" value="SUBMIT" class="btn">
                </form>
            </div>
            <div class="socialBox">
            	<a href="<?php echo get_option('of_lyffb'); ?>" title="Facebook"  target="_blank" class="facebook">Facebook</a>
            	<a href="<?php echo get_option('of_lyfhl'); ?>" title="Twitter"  target="_blank" class="twitter">Twitter</a>
            </div>
            <br class="spacer">
            <p><?php echo get_option('of_lyfcpr'); ?></p>
            <br class="spacer">
        </div>
    </footer>
    <!-- Start : Footer -->
</section>
<?php wp_footer(); ?>

</body>
</html>
