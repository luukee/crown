<?php
/**
 * Displays content for front page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

$hblockbg =  get_field('content_block_background'); ?>

<div id="site" class="home-page">
    <div class="main-top">
        <div class="top first-el bg bg-pos-top stadium-bg container-fluid">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 col-xs-12">
                            <?php
                            if(get_field('content_block_heading')) {
                                echo '<h1>'.get_field('content_block_heading').'</h1>';
                            }
                            if(get_field('content_block_content')) {
                                echo get_field('content_block_content');
                            }
                            ?>
                        </div>
                        <div class="video col-md-5 col-xs-12">
                            <?php
                            $popvideourl = get_field( 'popup_video_id');
                            ?>
                            <img src="<?= get_template_directory_uri(); ?>/assets/images/crown-league-logo.png" alt="The Crown League">
                            <div class="playbtn cf">
                                <a class="video-play-button fancybox" data-width="900" data-height="510" href="<?php echo $popvideourl; ?>">
                                    <i class="play"></i> <span class="video-text">Learn More</span>
                                </a>
                            </div>
                        </div>
                        <?php
                        if(get_field('fine_print')){
                            echo '<div class="col-md-12"><p class="fine-print">'.get_field('fine_print').'</p></div>';
                        } 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if(get_field('top_block_heading')) {?>
        <div class="ownerform-block bg stands-bg container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <h5><?php the_field('top_block_heading'); ?></h5>
                        <?php echo do_shortcode(get_field('top_form_shortcode')); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="list-box-columns container-fluid">
        <div class="row">
            <?php
            $p = 1;
            if( have_rows('add_features') ):
            	while( have_rows('add_features') ): the_row();
            		// vars
            		$image = get_sub_field('feature_image');
                    $icon = get_sub_field('feature_icon');
                    $title = get_sub_field('feature_title');
            		$content = get_sub_field('feature_content');
                    $link = get_sub_field('feature_link');
                    $linkTitle = get_sub_field('feature_link_title');
            		?>

                    <div class="visible-xs box image col-xs-12" style="background-image: url(<?php echo $image; ?>);"></div>

                    <?php if($p%2!=0){ ?>
            		    <div class="box image image-left col-md-6 col-sm-6 hidden-xs" style="background-image: url(<?php echo $image; ?>);"></div>
                    <? } ?>

            		<div class="box col-md-6 col-sm-6 col-xs-12 <?php if($p%2!=0){ echo "box-right"; } else { echo "box-left"; } ?>">
                        <h2>
                            <?php
                            if($icon){ ?>
                                <img src="<?php echo $icon; ?>" alt="<?php echo $title; ?>">
                            <?php
                            }
                            echo $title; ?>
                        </h2>
                        <p><?php echo $content; ?></p>
                        <a href="<?php echo $link; ?>"><?php echo $linkTitle; ?> <i class="arrow"></i></a>
                    </div>

                    <?php if($p%2==0){ ?>
            		    <div class="box image image-right col-md-6 col-sm-6 hidden-xs" style="background-image: url(<?php echo $image; ?>);"></div>
                    <? } ?>
            	    <?php
                    $p++;
                endwhile;
            endif;
            ?>
        </div>
    </div>
</div>
