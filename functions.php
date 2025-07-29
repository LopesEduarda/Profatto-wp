<?php

if (!defined('ABSPATH')) {
    exit;
}

function profatto_theme_setup() {

    add_theme_support('title-tag');

    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    add_theme_support('post-thumbnails');

    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    add_theme_support('customize-selective-refresh-widgets');
}
add_action('after_setup_theme', 'profatto_theme_setup');


function profatto_register_menus() {
    register_nav_menus(array(
        'primary' => __('Menu Principal', 'profatto'),
        'footer'  => __('Menu Rodapé', 'profatto'),
    ));
}
add_action('init', 'profatto_register_menus');


function profatto_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar Principal', 'profatto'),
        'id'            => 'sidebar-1',
        'description'   => __('Adicione widgets aqui.', 'profatto'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Widget 1', 'profatto'),
        'id'            => 'footer-1',
        'description'   => __('Widget do rodapé 1', 'profatto'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Widget 2', 'profatto'),
        'id'            => 'footer-2',
        'description'   => __('Widget do rodapé 2', 'profatto'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Widget 3', 'profatto'),
        'id'            => 'footer-3',
        'description'   => __('Widget do rodapé 3', 'profatto'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'profatto_widgets_init');

function profatto_scripts() {
    // Estilos principais
    wp_enqueue_style('profatto-style', get_stylesheet_uri(), array(), '1.0.0');

    // Google Fonts
    wp_enqueue_style('profatto-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap', array(), null);

    // Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css', array(), '6.0.0');

    // Scripts principais
    wp_enqueue_script('profatto-main', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true);

    wp_localize_script('profatto-main', 'profatto_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('profatto_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'profatto_scripts');

function profatto_body_classes($classes) {
    if (is_front_page()) {
        $classes[] = 'home-page';
    }

    if (is_active_sidebar('sidebar-1')) {
        $classes[] = 'has-sidebar';
    }

    return $classes;
}
add_filter('body_class', 'profatto_body_classes');

function profatto_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'profatto_excerpt_length');

function profatto_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'profatto_excerpt_more');

function profatto_custom_post_types() {
    register_post_type('projetos', array(
        'labels' => array(
            'name'               => __('Projetos', 'profatto'),
            'singular_name'      => __('Projeto', 'profatto'),
            'menu_name'          => __('Projetos', 'profatto'),
            'add_new'            => __('Adicionar Novo', 'profatto'),
            'add_new_item'       => __('Adicionar Novo Projeto', 'profatto'),
            'edit_item'          => __('Editar Projeto', 'profatto'),
            'new_item'           => __('Novo Projeto', 'profatto'),
            'view_item'          => __('Ver Projeto', 'profatto'),
            'search_items'       => __('Buscar Projetos', 'profatto'),
            'not_found'          => __('Nenhum projeto encontrado', 'profatto'),
            'not_found_in_trash' => __('Nenhum projeto encontrado na lixeira', 'profatto'),
        ),
        'public'       => true,
        'has_archive'  => true,
        'menu_icon'    => 'dashicons-portfolio',
        'supports'     => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite'      => array('slug' => 'projetos'),
    ));

    register_post_type('produtos', array(
        'labels' => array(
            'name'               => __('Produtos', 'profatto'),
            'singular_name'      => __('Produto', 'profatto'),
            'menu_name'          => __('Produtos', 'profatto'),
            'add_new'            => __('Adicionar Novo', 'profatto'),
            'add_new_item'       => __('Adicionar Novo Produto', 'profatto'),
            'edit_item'          => __('Editar Produto', 'profatto'),
            'new_item'           => __('Novo Produto', 'profatto'),
            'view_item'          => __('Ver Produto', 'profatto'),
            'search_items'       => __('Buscar Produtos', 'profatto'),
            'not_found'          => __('Nenhum produto encontrado', 'profatto'),
            'not_found_in_trash' => __('Nenhum produto encontrado na lixeira', 'profatto'),
        ),
        'public'       => true,
        'has_archive'  => true,
        'menu_icon'    => 'dashicons-cart',
        'supports'     => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite'      => array('slug' => 'produtos'),
    ));
}
add_action('init', 'profatto_custom_post_types');

function profatto_add_meta_boxes() {
    add_meta_box(
        'profatto_project_info',
        __('Informações do Projeto', 'profatto'),
        'profatto_project_info_callback',
        'projetos',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'profatto_add_meta_boxes');

function profatto_project_info_callback($post) {
    wp_nonce_field('profatto_save_meta_box_data', 'profatto_meta_box_nonce');

    $cliente = get_post_meta($post->ID, '_profatto_cliente', true);
    $local = get_post_meta($post->ID, '_profatto_local', true);
    $area = get_post_meta($post->ID, '_profatto_area', true);

    echo '<table class="form-table">';
    echo '<tr><th><label for="profatto_cliente">Cliente:</label></th>';
    echo '<td><input type="text" id="profatto_cliente" name="profatto_cliente" value="' . esc_attr($cliente) . '" class="regular-text" /></td></tr>';
    echo '<tr><th><label for="profatto_local">Local:</label></th>';
    echo '<td><input type="text" id="profatto_local" name="profatto_local" value="' . esc_attr($local) . '" class="regular-text" /></td></tr>';
    echo '<tr><th><label for="profatto_area">Área (m²):</label></th>';
    echo '<td><input type="text" id="profatto_area" name="profatto_area" value="' . esc_attr($area) . '" class="regular-text" /></td></tr>';
    echo '</table>';
}

function profatto_save_meta_box_data($post_id) {
    if (!isset($_POST['profatto_meta_box_nonce'])) {
        return;
    }

    if (!wp_verify_nonce($_POST['profatto_meta_box_nonce'], 'profatto_save_meta_box_data')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $fields = array('cliente', 'local', 'area');

    foreach ($fields as $field) {
        if (isset($_POST['profatto_' . $field])) {
            update_post_meta($post_id, '_profatto_' . $field, sanitize_text_field($_POST['profatto_' . $field]));
        }
    }
}
add_action('save_post', 'profatto_save_meta_box_data');

function profatto_newsletter_subscribe() {
    check_ajax_referer('profatto_nonce', 'nonce');

    $email = sanitize_email($_POST['email']);
    $nome = sanitize_text_field($_POST['nome']);

    if (!is_email($email)) {
        wp_die('Email inválido');
    }


    wp_send_json_success('Inscrição realizada com sucesso!');
}
add_action('wp_ajax_profatto_newsletter', 'profatto_newsletter_subscribe');
add_action('wp_ajax_nopriv_profatto_newsletter', 'profatto_newsletter_subscribe');


function profatto_customize_register($wp_customize) {
    $wp_customize->add_section('profatto_company_info', array(
        'title'    => __('Informações da Empresa', 'profatto'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('profatto_phone', array(
        'default'           => '(48) 3207-2222',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('profatto_phone', array(
        'label'   => __('Telefone', 'profatto'),
        'section' => 'profatto_company_info',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('profatto_address_1', array(
        'default'           => 'Rua das Flores, 123 - Centro, Florianópolis - SC',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('profatto_address_1', array(
        'label'   => __('Endereço Loja 1', 'profatto'),
        'section' => 'profatto_company_info',
        'type'    => 'textarea',
    ));

    $wp_customize->add_setting('profatto_address_2', array(
        'default'           => 'Av. Beira Mar, 456 - São José - SC',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('profatto_address_2', array(
        'label'   => __('Endereço Loja 2', 'profatto'),
        'section' => 'profatto_company_info',
        'type'    => 'textarea',
    ));

    $wp_customize->add_setting('profatto_hours', array(
        'default'           => 'Segunda a Sexta: 8h às 18h | Sábado: 8h às 12h',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('profatto_hours', array(
        'label'   => __('Horário de Funcionamento', 'profatto'),
        'section' => 'profatto_company_info',
        'type'    => 'text',
    ));
}
add_action('customize_register', 'profatto_customize_register');

function profatto_woocommerce_support() {
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'profatto_woocommerce_support');

function profatto_remove_unnecessary_features() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');

    remove_action('wp_head', 'wp_generator');

    remove_action('wp_head', 'rsd_link');

    remove_action('wp_head', 'wlwmanifest_link');

    remove_action('wp_head', 'wp_shortlink_wp_head');
}
add_action('init', 'profatto_remove_unnecessary_features');

function profatto_breadcrumbs() {
    if (is_front_page()) {
        return;
    }

    echo '<nav class="breadcrumbs">';
    echo '<a href="' . home_url() . '">Home</a>';

    if (is_category() || is_single()) {
        echo ' > ';
        the_category(' > ');
        if (is_single()) {
            echo ' > ';
            the_title();
        }
    } elseif (is_page()) {
        echo ' > ';
        the_title();
    }

    echo '</nav>';
}


function profatto_get_company_info($field) {
    return get_theme_mod('profatto_' . $field, '');
}

function profatto_fallback_menu() {
    echo '<ul class="nav-menu">';
    echo '<li><a href="' . home_url('/') . '">Home</a></li>';
    echo '<li><a href="' . home_url('/sobre') . '">Sobre Nós</a></li>';
    echo '<li><a href="' . home_url('/conteudos') . '">Conteúdos</a></li>';
    echo '<li><a href="' . home_url('/projetos') . '">Projetos ProFatto</a></li>';
    echo '<li><a href="' . home_url('/videos') . '">Vídeos</a></li>';
    echo '<li><a href="' . home_url('/experiencia') . '">ExperiênciaFatto</a></li>';
    echo '<li><a href="' . home_url('/imersao') . '">Imersão Jacuzzi</a></li>';
    echo '</ul>';
}


function profatto_footer_fallback_menu() {
    echo '<ul class="footer-menu">';
    echo '<li><a href="' . home_url('/') . '">HOME</a></li>';
    echo '<li><a href="' . home_url('/sobre') . '">SOBRE NÓS</a></li>';
    echo '<li><a href="' . home_url('/tendencias') . '">TENDÊNCIAS</a></li>';
    echo '<li><a href="' . home_url('/projetos') . '">PROJETOS PROFATTO</a></li>';
    echo '<li><a href="' . home_url('/experiencia') . '">EXPERIÊNCIA</a></li>';
    echo '<li><a href="' . home_url('/marcas') . '">MARCAS E PRODUTOS</a></li>';
    echo '<li><a href="' . home_url('/contato') . '">CONTATO</a></li>';
    echo '</ul>';
}

function profatto_additional_styles() {
    if (is_404()) {
        echo '<style>
            .error-404 {
                text-align: center;
                padding: 80px 0;
            }
            .error-number {
                font-size: 120px;
                font-weight: 700;
                color: var(--primary-color);
                line-height: 1;
                margin-bottom: 20px;
            }
            .error-content h2 {
                font-size: 32px;
                color: var(--text-dark);
                margin-bottom: 20px;
            }
            .error-content p {
                font-size: 18px;
                color: var(--text-light);
                margin-bottom: 40px;
            }
            .error-actions {
                display: flex;
                gap: 20px;
                justify-content: center;
                margin-bottom: 60px;
            }
            .btn-secondary {
                background: var(--text-light);
                color: var(--text-white);
                padding: 15px 30px;
                text-decoration: none;
                font-weight: 600;
                border-radius: 5px;
                transition: var(--transition);
                text-transform: uppercase;
                font-size: 14px;
            }
            .btn-secondary:hover {
                background: var(--primary-color);
                color: var(--text-white);
            }
            .error-suggestions {
                background: var(--bg-light);
                padding: 40px;
                border-radius: 10px;
                margin-bottom: 40px;
            }
            .error-suggestions h3 {
                color: var(--primary-color);
                margin-bottom: 20px;
            }
            .error-suggestions ul {
                list-style: none;
                padding: 0;
            }
            .error-suggestions li {
                margin-bottom: 10px;
            }
            .error-suggestions a {
                color: var(--text-dark);
                text-decoration: none;
                transition: var(--transition);
            }
            .error-suggestions a:hover {
                color: var(--primary-color);
            }
            .search-section {
                background: var(--primary-color);
                padding: 40px;
                border-radius: 10px;
                color: var(--text-white);
            }
            .search-section h3 {
                margin-bottom: 20px;
            }
            .search-form {
                display: flex;
                gap: 10px;
                max-width: 400px;
                margin: 0 auto;
            }
            .search-field {
                flex: 1;
                padding: 12px;
                border: none;
                border-radius: 5px;
                font-size: 16px;
            }
            .search-submit {
                background: var(--secondary-color);
                color: var(--text-white);
                border: none;
                padding: 12px 20px;
                border-radius: 5px;
                cursor: pointer;
                transition: var(--transition);
            }
            .search-submit:hover {
                background: var(--accent-color);
            }
        </style>';
    }

    if (is_single() || is_page()) {
        echo '<style>
            .entry-header {
                margin-bottom: 30px;
            }
            .entry-title {
                font-size: 36px;
                font-weight: 700;
                color: var(--primary-color);
                margin-bottom: 20px;
            }
            .entry-meta {
                display: flex;
                gap: 20px;
                font-size: 14px;
                color: var(--text-light);
                flex-wrap: wrap;
            }
            .entry-meta span {
                display: flex;
                align-items: center;
                gap: 5px;
            }
            .entry-meta i {
                color: var(--primary-color);
            }
            .entry-thumbnail {
                margin-bottom: 30px;
            }
            .entry-thumbnail img {
                width: 100%;
                height: auto;
                border-radius: 10px;
            }
            .entry-content {
                font-size: 16px;
                line-height: 1.8;
                color: var(--text-dark);
            }
            .entry-content p {
                margin-bottom: 20px;
            }
            .entry-content h2, .entry-content h3, .entry-content h4 {
                color: var(--primary-color);
                margin: 30px 0 15px;
            }
            .entry-footer {
                margin-top: 40px;
                padding-top: 20px;
                border-top: 1px solid var(--border-color);
            }
            .tags-links {
                margin-bottom: 20px;
            }
            .tags-links a {
                background: var(--bg-light);
                color: var(--text-dark);
                padding: 5px 10px;
                border-radius: 15px;
                text-decoration: none;
                font-size: 12px;
                margin-right: 5px;
                transition: var(--transition);
            }
            .tags-links a:hover {
                background: var(--primary-color);
                color: var(--text-white);
            }
            .post-navigation {
                margin: 40px 0;
                padding: 20px 0;
                border-top: 1px solid var(--border-color);
                border-bottom: 1px solid var(--border-color);
            }
            .nav-links {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            .nav-previous a, .nav-next a {
                color: var(--text-dark);
                text-decoration: none;
                font-weight: 500;
                transition: var(--transition);
            }
            .nav-previous a:hover, .nav-next a:hover {
                color: var(--primary-color);
            }
            .page-links {
                margin: 30px 0;
                text-align: center;
            }
            .page-links a {
                background: var(--bg-light);
                color: var(--text-dark);
                padding: 8px 12px;
                margin: 0 5px;
                text-decoration: none;
                border-radius: 5px;
                transition: var(--transition);
            }
            .page-links a:hover {
                background: var(--primary-color);
                color: var(--text-white);
            }
            .page-links .current {
                background: var(--primary-color);
                color: var(--text-white);
            }
        </style>';
    }

    if (is_archive() || is_search()) {
        echo '<style>
            .page-header {
                margin-bottom: 40px;
                text-align: center;
            }
            .page-title {
                font-size: 36px;
                font-weight: 700;
                color: var(--primary-color);
                margin-bottom: 10px;
            }
            .archive-description {
                font-size: 18px;
                color: var(--text-light);
            }
            .posts-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
                gap: 40px;
                margin-bottom: 40px;
            }
            .post-item {
                background: var(--text-white);
                border-radius: 10px;
                overflow: hidden;
                box-shadow: var(--shadow);
                transition: var(--transition);
            }
            .post-item:hover {
                transform: translateY(-5px);
                box-shadow: 0 5px 20px rgba(0,0,0,0.15);
            }
            .post-thumbnail {
                height: 200px;
                overflow: hidden;
            }
            .post-thumbnail img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: var(--transition);
            }
            .post-item:hover .post-thumbnail img {
                transform: scale(1.05);
            }
            .post-content {
                padding: 25px;
            }
            .post-content .entry-title {
                font-size: 20px;
                margin-bottom: 15px;
            }
            .post-content .entry-title a {
                color: var(--primary-color);
                text-decoration: none;
            }
            .post-content .entry-title a:hover {
                color: var(--secondary-color);
            }
            .post-content .entry-meta {
                margin-bottom: 15px;
            }
            .entry-summary {
                color: var(--text-light);
                line-height: 1.6;
                margin-bottom: 20px;
            }
            .read-more {
                color: var(--primary-color);
                text-decoration: none;
                font-weight: 600;
                transition: var(--transition);
            }
            .read-more:hover {
                color: var(--secondary-color);
            }
            .no-posts {
                text-align: center;
                padding: 60px 0;
            }
            .no-posts h2 {
                color: var(--primary-color);
                margin-bottom: 20px;
            }
            .no-posts p {
                color: var(--text-light);
                margin-bottom: 30px;
            }
        </style>';
    }
}
add_action('wp_head', 'profatto_additional_styles');


function profatto_back_to_top_styles() {
    echo '<style>
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: var(--primary-color);
            color: var(--text-white);
            border: none;
            border-radius: 50%;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: var(--transition);
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }
        .back-to-top.visible {
            opacity: 1;
            visibility: visible;
        }
        .back-to-top:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
        }
        @media (max-width: 768px) {
            .back-to-top {
                bottom: 20px;
                right: 20px;
                width: 45px;
                height: 45px;
                font-size: 16px;
            }
        }
    </style>';
}
add_action('wp_head', 'profatto_back_to_top_styles');


function profatto_hero_background() {
    if (is_front_page()) {
        $hero_image = get_template_directory_uri() . '/assets/firstImg.png';
                echo '<style>
            .hero-section {
                background: linear-gradient(rgba(26, 95, 60, 0.1), rgba(26, 95, 60, 0.1)),
                            url("' . esc_url($hero_image) . '") !important;
                background-size: cover !important;
                background-position: center !important;
            }

            .site-header {
                background: rgba(0, 0, 0, 0.1) !important;
                box-shadow: none !important;
            }

            .top-bar {
                background: transparent !important;
                border-bottom: none !important;
            }

            .main-header {
                background: transparent !important;
            }
        </style>';
    }
}
add_action('wp_head', 'profatto_hero_background');
