<?php
/*
Template Name: Home-Page Template
*/
// including header
get_header();
get_template_part('landingpage/aboutme');
get_template_part('landingpage/jobexperience');
get_template_part('landingpage/service');
get_template_part('landingpage/counterstart');
get_template_part('landingpage/portfolio');
get_template_part('landingpage/testimonial');
get_template_part('landingpage/contact');


// including footer
get_footer();