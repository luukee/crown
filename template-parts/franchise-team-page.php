<?php
/**
 * Template Name: Franchise Team - Page Template
 *
 */
?>

<div id="site" class="franchise-team">
    <?php
    $modalId = 'pre-register-team';
    $top_background_image = get_field('top_background_image');
    $logo_lockup = get_field('logo_lockup');
    $helmet_image = get_field('helmet_image');
    $button_background_color = get_field('button_background_color');
    $button_text_color = get_field('button_text_color');
    $pre_register_from_code = get_field('pre_register_from_code');
    ?>
    <div class="top first-el bg bg-pos-top container-fluid" style="background-image: url('<?php echo $top_background_image; ?>');">
        <div class="container">
            <div class="row banner-images">
                <div class="col-md-6 col-xs-10">
                    <img src="<?php echo $logo_lockup['url']; ?>" alt="<?php echo $logo_lockup['alt']; ?>">
					<?php if( get_field('enable_button') ): ?>
                        <div class="text-center">
                            <a data-location="<?php the_field('team_location'); ?>" href="#<?php echo $modalId; ?>" class="btn fancybox pre-register" style="color: <?php echo $button_text_color; ?>; background-color: <?php echo $button_background_color; ?>;"><?php the_field('preregister_button_text'); ?></a>
                        </div>
            <?php endif; ?>
                </div>
                <div class="col-md-6 col-xs-10">
                    <img src="<?php echo $helmet_image['url']; ?>" alt="<?php echo $helmet_image['alt']; ?>">
                </div>
            </div>
        </div>
    </div>

    <div id="<?php echo $modalId; ?>" class="modal-form" style="display:none;">
        <h1>Pre-Register</h1>
        <?php echo do_shortcode($pre_register_from_code); ?>
    </div>



    <?php if( have_rows('manager_repeater') ): ?>

        <div class="manager bg container-fluid" style="background-image: url('<?php the_field('manager_background'); ?>')">
            <div class="container">
                <div class="row manager-title">
                    <div class="col-md-4 col-xs-12">
                        <!-- left blank block -->
                    </div>
                    <div class="col-md-8">

                        <!-- title block -->
                        <h3 style="color:<?php the_field('manager_title_color'); ?>"><?php the_field('manager_title'); ?> </h3>

                    </div>
                </div>
            </div>
            <div class="container">

            	<?php while( have_rows('manager_repeater') ): the_row();
            		// vars
            		$manager_name = get_sub_field('manager_name');
					$manager_name_color = get_sub_field('manager_name_color');
            		$manager_image = get_sub_field('manager_image');
            		$manager_position = get_sub_field('manager_position');
                    $manager_statement = get_sub_field('manager_statement');

            		?>
                <div class="row">

                        <div class="col-md-4 col-xs-12 text-center items">
                            <div style='background-image: url("<?php echo $manager_image['url']; ?>")' class="pic img-circle"></div>
					    </div>
						<div class="col-md-8 manager-info">
                            <?php if( $manager_name ): ?>
                                <h3 style="color: <?php echo $manager_name_color; ?>"><?php echo $manager_name; ?></h3>
                            <?php endif; ?>

                            <?php if( $manager_position ): ?>
                                <h4><?php echo $manager_position; ?></h4>
                            <?php endif; ?>

                            <?php if( $manager_statement ): ?>
                                <p><?php echo $manager_statement; ?></p>
                            <?php endif; ?>
                        </div>
					</div>
                    <?php endwhile; ?>

                </div>
            </div>

    <?php endif; ?>


    <?php if( have_rows('ambassador') ):?>

        <div class="ambassadors container-fluid">

            <div class="container">
                <h2 class="text-center" style="color:<?php the_field('ambassadors_title_color'); ?>"><?php the_field('ambassadors_title'); ?> </h2>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-xs-12">

                        <div class="teams row" style="border-bottom:1px solid <?php the_field('ambassador_bottom_border');?>">
                            <?php
                            $p=1; while( have_rows('ambassador') ): the_row();
                                $name = get_sub_field('ambassador_name');
                                $name_color = get_sub_field('ambassador_name_color');
                                $image = get_sub_field('ambassador_image');
                                $text = get_sub_field('ambassador_text');
                                ?>
                                <div class="items col-lg-3 col-md-3 col-xs-12">
                                    <?php
                                    if( $image ): ?>
                                        <div style="background-image: url('<?php echo $image; ?>')" class="pic img-circle"></div>
                                    <?php
                                    endif;
                                    ?>
                                    <div class="memdesc text-center">
                                        <h3 style="color:<?php echo $name_color; ?>"><?php echo $name; ?></h3>
                                        <p class="text-center"><?php echo $text; ?></p>
                                    </div>
                                </div>
                                <?php
                                // every four items we add a new Row
                                if($p%4==0){ ?>
                                    <div class="line-break col-lg-12"></div>
                                <?php
                                }
                                $p++;
                            endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php endif; ?>

	<div class="chart container-fluid">
		<div class="container">
			<h3 class="text-center" style="color:<?php the_field('chart_title_color'); ?>"><?php the_field('chart_title'); ?> </h3>
		</div>
		<div class="container">
			<div class="col-md-8 col-md-offset-2 col-sm-12">
				<?php

				$image = get_field('chart');

				if( !empty($image) ): ?>

				<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

				<?php endif; ?>
			</div>
		</div>
	</div>

    <div class="ecommerce-section container-fluid" style="background-image: url('<?php the_field('ecommerce_background'); ?>')">

        <div class="container">
            <h3 class="text-center" style="color:<?php the_field('ecommerce_title_color'); ?>"><?php the_field('ecommerce_title'); ?> </h3>
        </div>

        <?php if( have_rows('repeater') ): ?>

            <div id="carousel-example-generic" class="carousel ecommerce slide" data-ride="carousel">
                <!-- Indicators -->

                <ol class="carousel-indicators">
                    <?php
                    $active = 'active';
                    $num = 0;
                    while ( have_rows('repeater') ) : the_row();
                        ?>
                        <!-- <li data-target="#carousel-example-generic" data-slide-to="<?php // echo $num ?>" class="<?php // echo $active ?>"></li> -->
                        <?php
                        $active = '';
                        $num += 1;
                    endwhile; ?>
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner row" role="listbox">
                    <?php
                    $active = 'active';
                    while ( have_rows('repeater') ) : the_row();

                    $product_image01 = get_sub_field('product_image01');
                    $product_title01 = get_sub_field('product_title01');
                    $product_details01 = get_sub_field('details01');
                    $show_button01 = get_sub_field('show_button01');
    				$button_text01 = get_sub_field('button_text01');
    				$button_url01 = get_sub_field('button_url01');

                    $product_image02 = get_sub_field('product_image02');
                    $product_title02 = get_sub_field('product_title02');
                    $product_details02 = get_sub_field('details02');
                    $show_button02 = get_sub_field('show_button02');
    				$button_text02 = get_sub_field('button_text02');
    				$button_url02 = get_sub_field('button_url02');

                    $product_image03 = get_sub_field('product_image03');
                    $product_title03 = get_sub_field('product_title03');
                    $product_details03 = get_sub_field('details03');
                    $show_button03 = get_sub_field('show_button03');
    				$button_text03 = get_sub_field('button_text03');
    				$button_url03 = get_sub_field('button_url03');
                        ?>
                        <div class="item <?php echo $active ?> text-center col-md-4">
                            <img src="<?php echo $product_image01['url']; ?>" alt="<?php echo $product_image01['alt']; ?>">
                            <h4><?php echo $product_title01; ?></h4>
                            <p><?php echo $product_details01; ?></p>
    						<?php if( $show_button01 ): ?>
                            	<button href="<?php echo $button_url01; ?>" type="button" name="button"><?php echo $button_text01; ?></button>
    						<?php endif; ?>
                        </div><!-- /item -->
                        <div class="item <?php echo $active ?> text-center col-md-4">
                            <img src="<?php echo $product_image02['url']; ?>" alt="<?php echo $product_image02['alt']; ?>">
                            <h4><?php echo $product_title02; ?></h4>
                            <p><?php echo $product_details02; ?></p>
    						<?php if( $show_button02 ): ?>
                            	<button href="<?php echo $button_url01['url']; ?>" type="button" name="button"><?php echo $button_text02; ?></button>
    						<?php endif; ?>
                        </div><!-- /item -->
                        <div class="item <?php echo $active ?> text-center col-md-4">
                            <img src="<?php echo $product_image03['url']; ?>" alt="<?php echo $product_image03['alt']; ?>">
                            <h4><?php echo $product_title03; ?></h4>
                            <p><?php echo $product_details03; ?></p>
    						<?php if( $show_button03 ): ?>
                            	<button href="<?php echo $button_url03['url']; ?>" type="button" name="button"><?php echo $button_text03; ?></button>
    						<?php endif; ?>
                        </div><!-- /item -->
                        <?php $active = '';
                    endwhile;
                    ?>
                </div>

            </div>
        <?php endif; ?>
    </div>

    <div class="social container-fluid">
        <div class="container">
            <?php if(get_field('instagram_access_token')) {?>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <?php
                        echo do_shortcode('[instagram-feed accesstoken="' . the_field('manager_name') . '"]');
                        ?>
                    </div>
                </div>
            <?php
            }
            if(get_field('facebook')) { ?>
                <div class="row">
                    <h3 class="text-center" style="color:<?php the_field('social_title_color'); ?>"><?php the_field('social_title'); ?> </h3>
                </div>
                <div class="row">
                    <div class="col-md-3 col-md-offset-2 col-sm-4 col-sm-offset-0 col-xs-12">
                        <a class="facebook" target="_blank" href="https://facebook.com/<?php the_field('facebook'); ?>"><i></i> /<?php the_field('facebook'); ?></a>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <a class="twitter" target="_blank" href="https://twitter.com/<?php the_field('twitter'); ?>"><i></i> @<?php the_field('twitter'); ?></a>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <a class="instagram" target="_blank" href="https://instagram.com/<?php the_field('instagram'); ?>"><i></i> @<?php the_field('instagram'); ?></a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
