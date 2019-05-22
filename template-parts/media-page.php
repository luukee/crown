<?php
/**
 * Template Name: Media Page Template
 *
 */

get_header();
?>

<div id="site" class="media">
    <div class="top first-el bg bg-pos-top stadium-bg container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>Media + Press</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-xs-12 col-xs-offset-0">
                <p><?php the_field('yellow_bg_text'); ?></p>
            </div>
        </div>
        <div class="row">
            <div class="news-outlet">
                <?php
                if( have_rows('news_outlets') ):
                    while( have_rows('news_outlets') ): the_row();
                        // vars
                        $image = get_sub_field('news_image');
                        $title = get_sub_field('news_title');
                        ?>
                        <img alt="<?php echo $image; ?>" src="<?php echo $image; ?>" />
                    <?php
                    endwhile;
                endif;
                ?>
            </div>
        </div>
    </div>

    <?php // if(get_field('yellow_bg_text')) {?>
        <!-- <div class="statements-yellow-box bg stands-bg container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-xs-12 col-xs-offset-0">
                    <p><?php the_field('yellow_bg_text'); ?></p>
                </div>
            </div>
            <div class="row">
                <div class="news-outlet">
                    <?php
                    if( have_rows('news_outlets') ):
                    	while( have_rows('news_outlets') ): the_row();
                    		// vars
                    		$image = get_sub_field('news_image');
                    		$title = get_sub_field('news_title');
                    		?>
                            <img alt="<?php echo $image; ?>" src="<?php echo $image; ?>" />
                    	<?php
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
        </div> -->
    <?php // } ?>

    <div class="list-box-columns border-top container-fluid">
        <div class="row">
            <h2>MEDIA LIBRARY</h2>
        </div>
        <div class="row">
            <?php
            $p = 1;
            if( have_rows('add_videos') ):
            	while( have_rows('add_videos') ): the_row();
            		// vars
                    $vtitle = get_sub_field('video_title');
                    $icon = get_sub_field('video_icon');
                    $vcontent = get_sub_field('video_description');
                    $vimage = get_sub_field('video_image');
                    $sthumb = $vimage['sizes']['large'];
                    $vtype = get_sub_field('video_type');
                    $vfile = get_sub_field('video_file');
                    $vurl = get_sub_field('video_url');

                    if($vtype == "file"){
                        $playLink = '<a id="play-video" class="video-play-button fancybox fancybox.iframe" data-width="900" data-height="510" href="'.$vfile.'"><span></span></a>';
                    }else{
                        $playLink = '<a id="play-video" class="video-play-button fancybox fancybox.iframe" data-width="900" data-height="510" href="'.$vurl.'"><span></span></a>';
                    }
            		?>

                    <div class="visible-xs box image col-xs-12" style="background-image: url(<?php echo $sthumb; ?>);"><?php echo $playLink; ?></div>

                    <?php if($p%2!=0){ ?>
            		    <div class="box image image-left col-md-6 col-sm-6 hidden-xs" style="background-image: url(<?php echo $sthumb; ?>);"><?php echo $playLink; ?></div>
                    <? } ?>

            		<div class="box col-md-6 col-sm-6 col-xs-12 <?php if($p%2!=0){ echo "box-right"; } else { echo "box-left"; } ?>">
                        <h3>
                            <?php
                            if($icon){ ?>
                                <img src="<?php echo $icon; ?>" alt="<?php echo $title; ?>">
                            <?php
                            }
                            echo $vtitle; ?>
                        </h3>
                        <?php
                        if($vcontent) { ?>
                            <p><?php echo $vcontent; ?></p>
                        <?php } ?>
                    </div>

                    <?php if($p%2==0){ ?>
            		    <div class="box image image-right col-md-6 col-sm-6 hidden-xs" style="background-image: url(<?php echo $sthumb; ?>);"><?php echo $playLink; ?></div>
                    <? } ?>
            	    <?php
                    $p++;
                endwhile;
            endif;
            ?>
        </div>
    </div>

    <div class="team-block">
        <div class="executive-leadership-team bg-white border-top container-fluid">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <h2>PRESS RELEASES</h2>
                    </div>
                    <div class="row">
                        <?php
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $args = array(
                        	'post_type' => 'post',
                            'meta_key'	=> 'date',
                        	'orderby'	=> 'meta_value',
                        	'order'		=> 'ASC',
                            'paged'     => $paged
                        );
                        $the_query = new WP_Query( $args );

                        if ( $the_query->have_posts() ) {
                            $p = 1;
                        	while ( $the_query->have_posts() ) {
                                $the_query->the_post();
                                $date = get_field('date', false, false);
                                $date = new DateTime($date);
                                $postImage = get_field('post_image');
                                $postImageClass = '';
                                if(!$postImage){
                                    $postImage = get_template_directory_uri() . '/assets/images/footer-logo.png';
                                    $postImageClass = " default-image";
                                }
                                ?>
                                <div class="col-md-6 col-xs-12 team-member">
                                    <div class="col-md-4 col-xs-12">
                                        <div style="background-image: url('<?php echo esc_url($postImage); ?>')" class="pic<?php echo $postImageClass; ?>"></div>
                                    </div>
                                    <div class="col-md-8 col-xs-12">
                                        <div class="team-content match-height">
                                            <div class="content">
                                                <h3><?php echo get_the_title(); ?></h3>
                                                <span class="sub"><?php echo $date->format('F j, Y'); ?></span>
                                                <p><?php echo get_the_excerpt(); ?></p>
                                                <?php
                                                $newwindow = get_field('open_in_new_window');
                                                if(get_field('cta_text') && get_field('cta_link')){
                                                    if($newwindow){
                                                        echo '<a class="btn cta-btn" href="'.get_field('cta_link').'" target="_blank">'.get_field('cta_text').'</a>';
                                                    }else{
                                                        echo '<a class="btn cta-btn" href="'.get_field('cta_link').'">'.get_field('cta_text').'</a>';
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                // every two items we add a new Row
                                if($p%2==0){ ?>
                                    </div>
                                    <div class="row">
                                <?php
                                }
                                $p++;
                            }

                            $GLOBALS['wp_query']->max_num_pages = $the_query->max_num_pages;
                            ?>
                            <div class="blog-pagination">
                                <div class="container">
                                    <?php
                                    the_posts_pagination( array(
                                        'mid_size'  => 2,
                                        'prev_text' => __( 'Previous', 'twentyseventeen' ),
                                        'next_text' => __( 'Next', 'twentyseventeen' ),
                                    ) );
                                    ?>
                                </div>
                            </div>
                            <?php
                            wp_reset_postdata();
                        }
                        ?>
                    </div>
                </div>
            </div>
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
get_footer(); ?>
