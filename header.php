<!DOCTYPE html>
<html lang="ja">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
<!-- title   -->
<?php if (is_front_page()) : ?>
	<title>ウェブサクシードTOPページ</title>
<?php else : ?>
	<title> <?php wp_title ( '｜' , true , 'right' ); bloginfo ( 'name' ); ?></title>   
<?php endif; ?>
<?php wp_head(); ?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="<?= wp_upload_dir()['baseurl'] ?>/icon.svg" type="image/svg+xml">
<link rel="apple-touch-icon" href="<?= wp_upload_dir()['baseurl'] ?>/apple-touch-icon.png">
<link rel="icon" type="image/png" href="<?= wp_upload_dir()['baseurl'] ?>/android-chrome-192×192.png">
<!-- Google Tag Manager -->
<!-- End Google Tag Manager -->
</head>

<!-- body -->
<body>
<!-- Google Tag Manager (noscript) -->
<!-- End Google Tag Manager (noscript) -->

    <!-- header -->
    <header>
        <div class="flex flex-between">
            <h1 class="logo"><a href="/" title="サイト名"><img src="<?= wp_upload_dir()['baseurl'] ?>/img/common/logo.png" alt="会社名"></a></h1>

            <div class="overlay"></div>

            <ul class="menu_inner flex flex-between">
                <?php
                $main_menu = wp_get_nav_menu_items('header_menu', array());
                $count = 0;
                $submenu = false;

                foreach($main_menu as $menu) {
                    if (!$menu->menu_item_parent) {
                        $parent_id = $menu->ID;
                        $has_child_class = '';

                        // 子メニューをもっているのか確認
                        foreach ($main_menu as $child_menu) {
                            if ($child_menu->menu_item_parent == $parent_id) {
                                $has_child_class = ' menu-item-has-children';
                                break;
                            }
                        }
                        echo '<li class="menu-item' . $has_child_class . '"><a href="' . $menu->url . '">' . $menu->title . '</a>';
                    }

                    // 子メニューあり
                    if ($parent_id == $menu->menu_item_parent) {
                        if (!$submenu) {
                            $submenu = true;
                            echo '<div class="menu_padding"><ul class="sub_menu">';
                        }
                        echo '<li><a href="' . $menu->url . '">' . $menu->title . '</a></li>';
                        if ($main_menu[$count + 1]->menu_item_parent != $parent_id && $submenu) {
                            echo '</ul></div>';
                            $submenu = false;
                        }
                    }

                    if (isset($main_menu[$count + 1]) && $main_menu[$count + 1]->menu_item_parent != $parent_id) {
                        echo '</li>';
                        $submenu = false;
                    }
                    $count++;
                }
                ?>
            </ul>

            <div class="contact_cta">
                <a href="/contact/">お問い合わせ</a>
            </div>

            <div class="hambuger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </header>

    <div id="side_contact">
        <a href="/contact/"><span>お問い合わせ</span></a>
    </div>