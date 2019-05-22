<?php
/**
 * Template Name: Why Join - Page Template
 *
 */

$teambg = get_field('block_background_image');

get_header();
?>

<div id="site" class="why-join">
    <div class="top first-el bg bg-pos-top stadium-bg container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php if(get_field('top_main_title')) {?>
                        <h1><?php the_field('top_main_title'); ?></h1>
                    <?php 
                    }
                    if(get_field('top_title_text')) {?>
                        <p><?php the_field('top_title_text'); ?></p>
                    <?php 
                    }
                    if(get_field('fine_print')){
                        echo '<p class="fine-print">'.get_field('fine_print').'</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- <div class="row">
            <div class="container">
                <div class="row">
                    <div class="box-blur col-md-12 col-xs-12">
                        <?php
                        if( have_rows('box_left') ):
                        	while( have_rows('box_left') ): the_row();
                        		// vars
                        		$image = get_sub_field('box_image');
                        		$content = get_sub_field('box_text');
                        		?>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="img col-md-2 col-sm-2 col-xs-2">
                                        <img src="<?php echo $image; ?>" alt="Why Join us">
                                    </div>
                                    <div class="col-md-10 col-sm-10 col-xs-10">
                                        <p><?php echo $content; ?></p>
                                    </div>
                                </div>
                        	    <?php
                            endwhile;
                        endif;
                        if( have_rows('box_right') ):
                        	while( have_rows('box_right') ): the_row();
                        		// vars
                        		$image = get_sub_field('box_image');
                        		$content = get_sub_field('box_text');
                        		?>
                                <hr class="visible-xs" />
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="img col-md-2 col-sm-2 col-xs-2">
                                        <img src="<?php echo $image; ?>" alt="Why Join us">
                                    </div>
                                    <div class="col-md-10 col-sm-10 col-xs-10">
                                        <p><?php echo $content; ?></p>
                                    </div>
                                </div>
                        	    <?php
                            endwhile;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div> -->
    </div>

    <div class="list-box-columns border-top container-fluid">
        <div class="row">
            <?php
            $p = 1;
            if( have_rows('reasons') ):
            	while( have_rows('reasons') ): the_row();
            		// vars
            		$image = get_sub_field('reason_image');
                    $icon = get_sub_field('reason_icon');
            		$title = get_sub_field('reason_title');
            		$content = get_sub_field('reason_content');
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

    <?php if(get_field('block_heading')) {?>
        <div class="ownerform-block bg stands-bg container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <h5><?php the_field('block_heading'); ?></h5>
                        <?php echo do_shortcode(get_field('form_shortcode')); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<?php
get_footer();
?>
