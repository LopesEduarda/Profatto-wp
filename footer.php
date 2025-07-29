    </div><!-- #content -->

    <footer id="colophon" class="site-footer">
        <div class="footer-content">
            <div class="container">
                <div class="footer-grid">

                    <div class="footer-company">
                        <div class="footer-logo">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/logo.png" alt="ProFatto" class="footer-logo-img">
                        </div>
                        <div class="social-icons">
                            <a href="#" class="social-icon"><i class="fab fa-facebook"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-linkedin"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                        </div>
                        <div class="copyright">
                            Copyright 2023 <?php bloginfo('name'); ?>
                        </div>
                    </div>


                    <div class="footer-sitemap">
                        <h3>MAPA DO SITE</h3>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer',
                            'menu_class'     => 'footer-menu',
                            'container'      => false,
                            'fallback_cb'    => 'profatto_footer_fallback_menu',
                        ));
                        ?>
                    </div>


                    <div class="footer-locations">
                        <div class="store-location">
                            <h3>LOJA 01</h3>
                            <p class="store-name"><?php bloginfo('name'); ?> Florianópolis - SC</p>
                            <p class="store-address"><?php echo esc_html(profatto_get_company_info('address_1')); ?></p>
                            <p class="store-hours">Horário de atendimento: <?php echo esc_html(profatto_get_company_info('hours')); ?></p>
                            <p class="store-phone">Telefone: <?php echo esc_html(profatto_get_company_info('phone')); ?></p>
                        </div>

                        <div class="store-location">
                            <h3>LOJA 02</h3>
                            <p class="store-name"><?php bloginfo('name'); ?> São José - SC</p>
                            <p class="store-address"><?php echo esc_html(profatto_get_company_info('address_2')); ?></p>
                            <p class="store-hours">Horário de atendimento: <?php echo esc_html(profatto_get_company_info('hours')); ?></p>
                            <p class="store-phone">Telefone: <?php echo esc_html(profatto_get_company_info('phone')); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
