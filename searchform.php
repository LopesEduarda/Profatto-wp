<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label>
        <span class="screen-reader-text"><?php echo _x('Buscar por:', 'label', 'profatto'); ?></span>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Buscar...', 'placeholder', 'profatto'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
    </label>
    <button type="submit" class="search-submit">
        <i class="fas fa-search"></i>
        <span class="screen-reader-text"><?php echo _x('Buscar', 'submit button', 'profatto'); ?></span>
    </button>
</form>