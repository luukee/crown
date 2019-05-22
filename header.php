<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php wp_head(); ?>
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '681307295551250');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=681307295551250&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-123722525-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-123722525-1');
</script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<!-- Twitter universal website tag code -->
<script>
!function(e,t,n,s,u,a){e.twq||(s=e.twq=function(){s.exe?s.exe.apply(s,arguments):s.queue.push(arguments);
},s.version='1.1',s.queue=[],u=t.createElement(n),u.async=!0,u.src='//static.ads-twitter.com/uwt.js',
a=t.getElementsByTagName(n)[0],a.parentNode.insertBefore(u,a))}(window,document,'script');
// Insert Twitter Pixel ID and Standard Event data below
twq('init','o1sl6');
twq('track','PageView');
</script>
<!-- End Twitter universal website tag code -->

</head>

<body <?php body_class(); ?>>
<?php
if(get_field('hotbar_text','options')){
    echo '<div class="hotbar desk flex flex-justify-center flex-align-center">
        <p>'.get_field('hotbar_text','options').'</p>';
        if(get_field('hotbar_cta_link','options') && get_field('hotbar_cta_text','options')){
            echo '<a class="cta-btn" href="'.get_field('hotbar_cta_link','options').'" target="_blank">'.get_field('hotbar_cta_text','options').'</a>';
        }
    echo '</div>';
}
if(get_field('hotbar_text_mobile','options')){
    echo '<div class="hotbar mob flex flex-justify-center flex-align-center">
        <p>'.get_field('hotbar_text_mobile','options').'</p>';
    echo '</div>';
}
// LETTER
if(get_field('letter_popup_content','options')):
    echo '<div id="letter" style="display:none;">'.get_field('letter_popup_content','options').'</div>';
endif;
?>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-brand">
                <?php the_custom_logo(); ?>
            </div>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <?php
                $args = array(
                    'menu'              => "2", // (int|string|WP_Term) Desired menu. Accepts a menu ID, slug, name, or object.
                    'menu_class'        => "nav navbar-nav", // (string) CSS class to use for the ul element which forms the menu. Default 'menu'.
                    'menu_id'           => "top-menu", // (string) The ID that is applied to the ul element which forms the menu. Default is the menu slug, incremented.
                    'container'         => "", // (string) Whether to wrap the ul, and what to wrap it with. Default 'div'.
                    'container_class'   => "", // (string) Class that is applied to the container. Default 'menu-{menu slug}-container'.
                    'container_id'      => "", // (string) The ID that is applied to the container.
                );
                wp_nav_menu( $args );
                ?>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div id="wrapper" class="site">
