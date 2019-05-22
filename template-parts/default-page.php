<?php
/**
 * Template Name: Custom Default - Page Template
 *
 */

get_header();
?>

<div id="site" class="why-join">
    <div class="top first-el bg bg-pos-top stadium-bg container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
    </div>

    <div class="default-template list-box-columns border-top container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <?php
        			if ( have_posts() ) :
        				/* Start the Loop */
        				while ( have_posts() ) : the_post();
        					the_content();
        				endwhile;
        			endif;
        			?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>
