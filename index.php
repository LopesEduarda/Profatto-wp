<?php get_header(); ?>

<main id="primary" class="site-main">

    <section class="hero-section">
        <div class="hero-slider">
            <div class="hero-slide active">
                <div class="hero-content">
                    <h1 class="hero-title">Revestimentos e Louças de Alto Padrão</h1>
                    <div class="hero-divider">
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-dots">
            <span class="dot active"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
    </section>


    <section class="about-section">
        <div class="container">
            <div class="about-content">
                <div class="about-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/profatto.png" alt="ProFatto">
                </div>
                <div class="about-text">
                    <h2>Sobre <span style="color: #8B941F;">Nós</span></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                    <div class="stats-grid">
                        <div class="stat-item">
                            <span class="stat-number">+ 250</span>
                            <span class="stat-label">FORNECEDORES</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">+ 1.000</span>
                            <span class="stat-label">CLIENTES</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">+ 2.000</span>
                            <span class="stat-label">REVESTIMENTOS</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">+ 1.000</span>
                            <span class="stat-label">CLIENTES</span>
                        </div>
                    </div>

                    <a href="<?php echo esc_url(home_url('/sobre')); ?>" class="btn-primary">SAIBA MAIS</a>
                </div>
            </div>
        </div>
    </section>


    <section class="help-section">
        <div class="container">
            <h2 class="section-title">Como a <span style="color: #8B941F;">ProFatto</span> pode te ajudar</h2>
            <div class="help-grid">
                <div class="help-item">
                    <div class="help-number">1</div>
                    <div class="help-text">
                        <h3>Lorem Ipsum</h3>
                        <p>Lorem ipsum dolor sit amet consectetur. Massa vitae in sed pharetra. Id sit purus urna sed facilisis cursus fringilla.</p>
                    </div>
                </div>
                <div class="help-item">
                    <div class="help-number">2</div>
                    <div class="help-text">
                        <h3>Lorem Ipsum</h3>
                        <p>Lorem ipsum dolor sit amet consectetur. Massa vitae in sed pharetra. Id sit purus urna sed facilisis cursus fringilla.</p>
                    </div>
                </div>
                <div class="help-item">
                    <div class="help-number">3</div>
                    <div class="help-text">
                        <h3>Lorem Ipsum</h3>
                        <p>Lorem ipsum dolor sit amet consectetur. Massa vitae in sed pharetra. Id sit purus urna sed facilisis cursus fringilla.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="newsletter-section">
        <div class="container">
            <div class="newsletter-content">
                <div class="newsletter-text">
                    <h2>NEWSLETTER</h2>
                    <p>Cadastre-se e saiba em primeira mão as nossas principais novidades.</p>
                </div>
                <div class="newsletter-form">
                    <form id="newsletter-form" class="newsletter-form-inner">
                        <input type="text" name="nome" placeholder="Cadastre seu nome" required>
                        <input type="email" name="email" placeholder="Cadastre seu email" required>
                        <button type="submit" class="btn-newsletter">ENVIAR</button>
                    </form>
                </div>
            </div>
        </div>
    </section>


</main>

<?php get_footer(); ?>
