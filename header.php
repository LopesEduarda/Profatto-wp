<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Pular para o conteúdo', 'profatto'); ?></a>

    <header id="masthead" class="site-header">

        <div class="top-bar">
            <div class="container">
                                    <div class="top-bar-content">
                        <div class="top-bar-contact">
                            <span class="phone-number">
                                <i class="fab fa-whatsapp"></i>
                                <?php echo esc_html(profatto_get_company_info('phone')); ?>
                            </span>
                            <div class="social-icons">
                                <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                            </div>
                            <a href="<?php echo esc_url(home_url('/contato')); ?>" class="contact-btn">
                                CONTATO
                            </a>
                        </div>
                    </div>
            </div>
        </div>


        <div class="main-header">
            <div class="container">
                <div class="header-content">
                                    <div class="logo-nav-container">
                    <div class="site-branding">
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="custom-logo-link">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/logo.png" alt="<?php bloginfo('name'); ?>" class="custom-logo">
                            </a>
                        </div>

                                            <nav id="site-navigation" class="main-navigation">
                            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                                <span class="hamburger">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </span>
                            </button>

                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'primary',
                                'menu_id'        => 'primary-menu',
                                'menu_class'     => 'nav-menu',
                                'container'      => false,
                                'fallback_cb'    => 'profatto_fallback_menu',
                            ));
                            ?>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="content" class="site-content">
