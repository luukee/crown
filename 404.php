<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div id="site" class="why-join">
    <div class="top first-el bg bg-pos-top stadium-bg container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>404</h1>
            </div>
        </div>
    </div>

    <div class="default-template list-box-columns border-top container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12">
					<p>The page you requested cannot be found. The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
					<p><strong>Please try the following:</strong></p>
					<ul>
						<li>If you typed the page address in the Address bar, make sure that it is spelled correctly.</li>
						<li>Open the <a href="<?php  echo esc_url( home_url( '/' ) ); ?>">home page</a> and look for links to the information you want.</li>
						<li>Use the navigation bar on the left or top to find the link you are looking for.</li>
						<li>Click the Back button to try another link.</li>
					</ul>
					<p><strong>Sitemap:</strong></p>
					<?php echo do_shortcode('[pagelist]'); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer();
