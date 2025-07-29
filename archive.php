<?php get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <?php profatto_breadcrumbs(); ?>

        <header class="page-header">
            <?php
            the_archive_title('<h1 class="page-title">', '</h1>');
            the_archive_description('<div class="archive-description">', '</div>');
            ?>
        </header>

        <?php if (have_posts()) : ?>
            <div class="posts-grid">
                <?php
                while (have_posts()) :
                    the_post();
                ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium'); ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <div class="post-content">
                            <header class="entry-header">
                                <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>

                                <div class="entry-meta">
                                    <span class="posted-on">
                                        <i class="fas fa-calendar"></i>
                                        <?php echo get_the_date(); ?>
                                    </span>
                                    <span class="byline">
                                        <i class="fas fa-user"></i>
                                        <?php the_author(); ?>
                                    </span>
                                    <?php if (has_category()) : ?>
                                        <span class="cat-links">
                                            <i class="fas fa-folder"></i>
                                            <?php the_category(', '); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </header>

                            <div class="entry-summary">
                                <?php the_excerpt(); ?>
                            </div>

                            <footer class="entry-footer">
                                <a href="<?php the_permalink(); ?>" class="read-more">
                                    Ler mais <i class="fas fa-arrow-right"></i>
                                </a>
                            </footer>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <?php
            // Pagination
            the_posts_pagination(array(
                'mid_size'  => 2,
                'prev_text' => '<i class="fas fa-chevron-left"></i> Anterior',
                'next_text' => 'Próximo <i class="fas fa-chevron-right"></i>',
            ));
            ?>

        <?php else : ?>
            <div class="no-posts">
                <h2>Nenhum conteúdo encontrado</h2>
                <p>Desculpe, não encontramos nenhum conteúdo que corresponda aos seus critérios.</p>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn-primary">Voltar ao início</a>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>