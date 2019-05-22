<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

if(get_field('enable_owner')){
	$blockbg = get_field('block_background','options');
    ?>
	<div class="become-owner" <?php if($blockbg){ echo 'style="background: url('.$blockbg.') right center no-repeat"'; } ?>>
	    <div class="container cf">
	        <?php if(get_field('block_title','options')) { echo '<h3>'.get_field('block_title','options').'</h3>'; }

	        if(get_field('block_description','options')){ echo '<p>'.get_field('block_description','options').'</p>'; }

	        if(get_field('form_shortcode','options')){ echo do_shortcode(get_field('form_shortcode','options')); } ?>
	    </div>
	</div>
<?php } ?>

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="container">
		<!-- <div class="contact-area flex flex-justify-between flex-align-start"> -->
        <div class="row contact-area">
			<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 col-xs-offset-0">
                <div class="col-md-3 col-xs-12 company-info">
					<?php if(get_field('flogo','options')){ ?>
						<img src="<?php the_field('flogo','options'); ?>" alt="">
					<?php } ?>
					<?php if(get_field('we_are_content','options')){ ?>
						<!-- <p><?php the_field('we_are_content','options'); ?></p> -->
					<?php } ?>
				</div>
				<div class="col-md-6 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-12 col-xs-offset-0 contact-nav">
					<?php wp_nav_menu( array('theme_location' => 'footer', 'menu_id' => 'footer-menu')); ?>
				</div>
                <div class="col-md-3 col-xs-12">
					<a href="mailto:contact@thecrownleague.com" class="btn">Contact Us</a>
				</div>
			</div>
		</div>

		<div class="row footer-bottom">
			<?php if( have_rows('add_social_links','options') ): ?>
				<ul class="social-links">
    				<?php while( have_rows('add_social_links','options') ): the_row();
    					$icon = get_sub_field('icon');
    					$link = get_sub_field('link'); ?>
    					<li>
    						<?php if( $link ): ?>
    							<a href="<?php echo $link; ?>" target="_blank">
    						<?php endif; ?>
    							<img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt'] ?>" />
    						<?php if( $link ): ?>
    							</a>
    						<?php endif; ?>
    					</li>
    				<?php endwhile; ?>
				</ul>
			<?php endif; ?>

			<?php if(get_field('disclaimer_text','options')): ?>
				<div class="footer-disclaimer"><?php the_field('disclaimer_text','options'); ?></div>
			<?php endif; ?>

    		<p class="copy">&copy; <?php echo date('Y'); ?> <?php the_field('copyright_text','options'); ?></p>
		</div>
	</div>
</footer>
</div><!-- #wrapper -->
<?php wp_footer(); ?>

</body>
</html>
