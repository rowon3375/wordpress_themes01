<!-- サイトマップ -->
<?php get_header(); ?>
<main>
  <div class="inner">
    <?php breadcrumb(); ?>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <h1><?php the_title(); ?></h1>

    <?php
    $defaults = array(
        'theme_location'  => 'main-menu',
        'menu'            => '',
        'container'       => 'div',
        'container_class' => '',
        'container_id'    => '',
        'menu_class'      => 'menu_inner',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul>%3$s',
        'depth'           => 0,
        'walker'          => ''
    );
    wp_nav_menu( $defaults );
    ?>
    <?php endwhile; endif; ?>
  </div>
</main>
<?php get_footer(); ?>
