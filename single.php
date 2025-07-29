<?php get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <?php profatto_breadcrumbs(); ?>

        <?php
        while (have_posts()) :
            the_post();
        ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>

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

                <?php if (has_post_thumbnail()) : ?>
                    <div class="entry-thumbnail">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content">
                    <?php
                    the_content();

                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Páginas:', 'profatto'),
                        'after'  => '</div>',
                    ));
                    ?>
                </div>

                <footer class="entry-footer">
                    <?php if (has_tag()) : ?>
                        <div class="tags-links">
                            <i class="fas fa-tags"></i>
                            <?php the_tags('', ', '); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (get_edit_post_link()) : ?>
                        <div class="edit-link">
                            <?php
                            edit_post_link(
                                sprintf(
                                    wp_kses(
                                        __('Editar <span class="screen-reader-text">"%s"</span>', 'profatto'),
                                        array(
                                            'span' => array(
                                                'class' => array(),
                                            ),
                                        )
                                    ),
                                    wp_kses_post(get_the_title())
                                ),
                                '<span class="edit-link">',
                                '</span>'
                            );
                            ?>
                        </div>
                    <?php endif; ?>
                </footer>
            </article>


            <nav class="post-navigation">
                <div class="nav-links">
                    <div class="nav-previous">
                        <?php previous_post_link('%link', '<i class="fas fa-chevron-left"></i> %title'); ?>
                    </div>
                    <div class="nav-next">
                        <?php next_post_link('%link', '%title <i class="fas fa-chevron-right"></i>'); ?>
                    </div>
                </div>
            </nav>


            <?php
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            ?>

        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>