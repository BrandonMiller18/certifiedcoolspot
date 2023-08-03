<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <?php wp_head();?>
</head>
<body <?php body_class();?>>


<header>

    <a href="/"><img src="<?php bloginfo('template_directory');?>/images/logo.png" class=""></a>

        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'top-menu',
                )
        ); ?>








</header>
        
