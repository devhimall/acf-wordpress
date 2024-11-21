<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Starter_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<!-- Header Start -->
	<div class="top-header" id="top-header">
		<div class="container text-center">
			<div class="row">
				<div class="col-md-12">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/profile-pic.jpg" alt="Anamul Hasan" />
				</div>

				<div class="col-md-12">
					<h1>I'm Poppy Jackson</h1>
				</div>

				<div class="col-md-12">
					<p>Web Designer, Web Developer, Front End Developer, Apps Developer, Graphic Designer</p>
					<h2></h2>
				</div>
			</div>
		</div>
	</div>
	<!-- Header End -->

	<!-- Nav Start -->
        <div class="header">
            <div class="container">

                <div class="logo pull-left">
                    <h1><a href="index.html">MyFolio</a></h1>
                </div>

                <nav id="nav-menu-container">
                    <!-- <ul class="nav-menu">
                        <li><a href="#top-header">Home</a></li>
                        <li><a href="#about">About me</a></li>
                        <li><a href="#experience">Experience</a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="#portfolio">Portfolio</a></li>
                        <li class="menu-has-children"><a href="#">Drop Down</a>
                            <ul>
                                <li><a href="#">Drop Down 1</a></li>
                                <li><a href="#">Drop Down 2</a></li>
                                <li class="menu-has-children"><a href="#">Drop Down 3</a>
                                    <ul>
                                        <li><a href="#">Drop Down 1</a></li>
                                        <li><a href="#">Drop Down 2</a></li>
                                        <li><a href="#">Drop Down 3</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#contact">Contact me</a></li>
                    </ul> -->
    					<?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'primary-menu',
                                    'menu_id'        => 'primary-menu',
                                    'container'      => false,
                                    'menu_class'     => 'nav-menu'
                                )
                            );
                            ?>            
				</nav>

                <nav class="nav social-nav pull-right d-none d-lg-inline">
                    <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-linkedin"></i></a>
                </nav>
            </div>
        </div>
        <!-- Nav End -->
