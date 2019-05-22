<?php
/**
 * Template Name: Team Page Template
 *
 */

$teambg = get_field('block_background_image');

get_header();
?>

<div id="site">
    <div class="team-block">
        <div class="top first-el bg bg-pos-top stadium-bg team-statement container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1>About Us</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-xs-12 col-xs-offset-0">
                    <?php if(get_field('top_title_text')) {?>
                        <p><?php the_field('top_title_text'); ?></p>
                    <?php 
                    }
                    ?>
                    <a href="#letter" class="btn btn-black fancybox"><?php the_field('top_button_text'); ?></a>
                    <?php 
                    if(get_field('fine_print')){
                        echo '<p class="fine-print">'.get_field('fine_print').'</p>';
                    }
                    ?>
                </div>
            </div>
        </div>

        <!-- <div class="statements-yellow-box bg stands-bg container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-xs-12 col-xs-offset-0">
                    <p>We started The Crown League because we love football, we love fantasy, and because we knew something big was missing from our experience as people who love sports: ownership.</p>
                    <a href="#letter" class="btn btn-black fancybox">Read our Founder's Statement</a>
                </div>
            </div>
        </div> -->

        <div class="executive-leadership-team border-top bg-white container-fluid">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <h2>Executive Leadership Team</h2>
                    </div>
                    <div class="row">
                        <?php
                        if( have_rows('add_team_member') ):
                        	$p=1; while( have_rows('add_team_member') ): the_row();
                                $memtitle = get_sub_field('name');
                                $memdesignation = get_sub_field('designation');
                        		$mempic = get_sub_field('profile_pic');
                        		$memdesc = get_sub_field('description');
                                ?>
                                <div class="col-md-6 col-xs-12 team-member">
                                    <div class="col-md-4 col-xs-12">
                                        <div style="background-image: url('<?php echo $mempic; ?>')" class="pic img-circle"></div>
                                    </div>
                                    <div class="col-md-8 col-xs-12">
                                        <?php if( $memtitle ): ?>
                                            <div class="team-content match-height">
                                                <div class="content">
                                                    <h3><?php echo $memtitle; ?></h3>
                                                    <span class="sub"><?php echo $memdesignation; ?></span>
                                                    <?php echo $memdesc; ?>
                                                </div>
                                            </div>
                            			<?php endif; ?>
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
                            endwhile;
                        endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="rest-team-block bg-white container-fluid">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <?php
                        if(get_field('rest_block_heading')){
                            echo '<h2>'.get_field('rest_block_heading').'</h2>';
                        }
                        if( have_rows('rest_members') ): ?>
                        	<ul id="teams" class="teams">
                            	<?php
                                $p = 1;
                                while( have_rows('rest_members') ): the_row();
                            		$rmimage = get_sub_field('member_image');
                                    $size = 'team-thumb';
                    	            $thumb = $rmimage['sizes'][ $size ];
                            		$rmdesc = get_sub_field('member_description');
                            		$rmname = get_sub_field('member_name');
                            		?>
                            		<li class="items col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            			<?php
                                        if( $rmimage ): ?>
                                            <div style="background-image: url('<?php echo $thumb; ?>')" class="pic img-circle"></div>
                            			<?php
                                        endif;
                                        ?>
                                        <div class="memdesc">
                                            <h4><?php echo $rmname; ?></h4>
                                            <p><?php echo $rmdesc; ?></p>
                                        </div>
                            		</li>
                            	    <?php
                                    // every two items we add a new Row
                                    if($p%4==0){ ?>
                                        <li class="line-break col-lg-12 col-md-12 hidden-xs"></li>
                                    <?php
                                    }
                                    $p++;
                                endwhile;
                                ?>
                        	</ul>
                        <?php endif; ?>
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
                        <?php echo do_shortcode(get_field('form_shorcode')); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<?php
get_footer();
?>
