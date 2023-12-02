<div id="page-top"><a href="#"></a></div>
<footer>
    <div class="flex flex-between inner">
        <div class="footer_right">
            <div class="logo">
                <a href="/" title="サイト名"><img src="<?= wp_upload_dir()['baseurl'] ?>/img/common/logo.png" alt="会社名"></a>
            </div>

            <ul class="sns flex">
                <li><a href="/"><img src="https://www.spin-tumugi.jp/wordpress/wp-content/uploads/facebook.png" alt="facebook"></a></li>
                <li><a href="/"><img src="https://www.spin-tumugi.jp/wordpress/wp-content/uploads/instagram.png" alt="インスタグラム"></a></li>
            </ul>
        </div>

        <div class="footer_left">
            <?php
                $defaults = array(
                    'theme_location'  => 'footer-menu',
                    'menu'            => '',
                    'container'       => 'div',
                    'container_class' => 'footer_menu',
                    'container_id'    => '',
                    'menu_class'      => 'menu_inner',
                    'menu_id'         => '',
                    'echo'            => true,
                    'fallback_cb'     => 'wp_page_menu',
                    'before'          => '',
                    'after'           => '',
                    'link_before'     => '',
                    'link_after'      => '',
                    'items_wrap'      => '<ul class="menu_inner flex flex-between">%3$s',
                    'depth'           => 0,
                    'walker'          => ''
                );
                wp_nav_menu( $defaults );
            ?>
        </div>
    </div>

    <div class="copy inner">
        <p>COPYRIGHT © SOURCE CREATE CO., LTD. ALL RIGHTS RESERVED</p>
    </div>
</footer>
</main>
</body>
</html>