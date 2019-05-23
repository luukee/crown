<?php
/**
 * Template Name: Franchises - Page Template
 *
 */
get_header();
?>

<div id="site" class="franchises">
    <div class="top first-el bg bg-pos-top stadium-bg container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
					<?php if(get_field('banner_title')) {?>
                    	<h1><?php the_field('banner_title'); ?></h1>
					<?php } ?>
                    <?php if(get_field('top_title_text')) {?>
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
    </div>

    <div class="teams container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <ul class="team-filter">
                        <li class="<?php the_field('all_teams'); ?>">
                            <a href="#" data-filter="all">ALL TEAMS</a>
                        </li>
                        <li class="<?php the_field('western_division'); ?>">
                            <a href="#" data-filter="western-division">WESTERN DIVISION</a>
                        </li>
                        <li class="<?php the_field('eastern_division'); ?>">
                            <a href="#" data-filter="eastern-division">EASTERN DIVISION</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-12 col-xs-12">
                    <?php
                    $args = array(
                        'orderby' => 'date',
	                    'order'   => 'ASC',
                        'post_type' => 'teams',
                        'post_status' => 'publish',
                        'posts_per_page' => '-1'
                    );
                    $modalMapId = 'pre-register';
                    $teams_loop = new WP_Query( $args );
                    $defaultImage = get_template_directory_uri() . '/assets/images/team-default.png';
                    if ( $teams_loop->have_posts() ) :
                        while ( $teams_loop->have_posts() ) : $teams_loop->the_post(); ?>
                            <div class="team col-md-3 col-sm-3 col-xs-6 all <?php the_field('division'); ?>">
                                <?php
                                $postid = get_the_ID();
                                $preRegisterCode = get_field('pre_register_from_code');
                                $modalId = 'pre-register';
                                $comingSoon = get_field('team_coming_soon');
                                $team_button = get_field('team_button');
                                $helmet_link = get_field('helmet_link');
                                $team_badge_image = get_field('team_badge_image');
                                $team_badge_class = '';
                                if($preRegisterCode){
                                    $modalId .= '-'.$postid;
                                    if($team_button === 'custom'){
                                        $modalMapId = $modalId;
                                    }
                                }
                                if(!$team_badge_image){
                                    $team_badge_image = $defaultImage;
                                    $team_badge_class = ' class="team-default"';
                                }
                                ?>

                                <?php if ($helmet_link){ ?>
                                    <a href="<?php echo get_permalink(); ?>">
                                        <img<?php echo $team_badge_class; ?> src="<?php echo $team_badge_image; ?>" alt="<?php the_title(); ?>">
                                    </a>
                                <?php } else { ?>
                                    <img<?php echo $team_badge_class; ?> src="<?php echo $team_badge_image; ?>" alt="<?php the_title(); ?>">
                                <?php } ?>

                                <?php
                                if (!$comingSoon) {
                                    // REAL TEAM ?>
                                    <h3><?php the_title(); ?></h3>
                                <?php
                                } else {
                                    // COMING SOON TEAM ?>
                                    <h3>COMING SOON</h3>
                                    <?php
                                } ?>
                                <p><?php the_field('team_location'); ?></p>
                                <?php if ($team_button === 'view'){ ?>
                                    <a href="<?php echo get_permalink(); ?>" class="btn">VIEW</a>
                                <?php
                                } else if ($team_button === 'preregister'){ ?>
                                    <a data-location="<?php the_field('team_location'); ?>" href="#<?php echo $modalId; ?>" class="btn fancybox pre-register">Pre-Register</a>
                                <?php
                                } else if ($team_button === 'custom'){ ?>
                                    <a data-location="" href="#<?php echo $modalId; ?>" class="btn fancybox pre-register custom"><?php echo the_field('team_custom_button_text');?></a>
                                <?php
                                }
                                ?>
                            </div>
                            <?php
                            if ( ($team_button === 'preregister' || $team_button === 'custom') && $preRegisterCode){ ?>
                                <div id="<?php echo $modalId; ?>" class="modal-form" style="display:none;">
                                    <h1>
                                        <?php
                                        if($team_button === 'preregister'){
                                            echo "Pre-Register";
                                        }
                                        else{
                                            echo "Vote";
                                        }
                                        ?>
                                    </h1>
                                    <?php echo do_shortcode($preRegisterCode); ?>
                                </div>
                                <?php
                            }

                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="map container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <h3><?php the_field('map_title'); ?></h3>
                    <?php
                    $activateModal = get_field('activate_map_pre_register_modal');
                    if($activateModal === 'true'){ ?>
                        <a href="#<?php echo $modalMapId; ?>" class="fancybox pre-register custom">
                    <?php
                    }
                        echo do_shortcode('[vision id="1"]');
                    if($activateModal){?>
                        </a>
                    <?php
                    }
                    ?>
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
get_footer();
?>
