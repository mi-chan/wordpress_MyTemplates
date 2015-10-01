<?php
require_once('wp_bootstrap_navwalker.php');

add_theme_support('menus');

register_nav_menus( array(
  'primary-main'     => __( 'Primary Menu Main', 'メインメニュー' ),
  'primary-sub'     => __( 'Primary Menu Sub', 'ドロップダウンメニュー' ),
) );

register_sidebar(
    array(
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    )
);


add_theme_support('post-thumbnails');

function get_categories_tree() {
    $post_categories = get_the_category();
    $cat_trees = array();
    $cat_counts = array();
    $cat_depth_max = 10;
    foreach ( $post_categories as $post_category ) {
        $depth = 0;
        $cat_IDs = array($post_category->cat_ID);
        $cat_obj = $post_category;
        while ( $depth < $cat_depth_max ) {
            if ( $cat_obj->category_parent == 0 ) {
                break;
            }
            $cat_obj = get_category($cat_obj->category_parent);
            array_unshift($cat_IDs, $cat_obj->cat_ID);
            $depth++;
        }
        array_push($cat_trees, $cat_IDs);
        array_push($cat_counts, count($cat_IDs));
    }
    $depth_max = max($cat_counts);
    $cat_key = array_search($depth_max, $cat_counts);
    $cat_tree = $cat_trees[$cat_key];
    return $cat_tree;
  }

  function bootstrap_pagination()
{
    global $wp_query;
    $paged = $wp_query->get( 'paged' );
    $posts_per_page = get_option('posts_per_page');
    if ( ( ! $paged || $paged < 2 ) && $wp_query->found_posts < $posts_per_page )
        return;

    $range = 5;
    $showitems = ($range * 2)+1;

    global $paged;
    if(empty($paged)) $paged = 1;

    if($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }

    if(1 != $pages)
    {
        echo '<ul class="pagination">';
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."'>&laquo;</a></li>";
        if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a></li>";

        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                echo ($paged == $i)? "<li class='active'><span class='current'>".$i."</span></li>":"<li><a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a></li>";
            }
        }

        if ($paged < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a></li>";
        if ($paged < $pages-1 && $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."'>&raquo;</a></li>";
        echo "</ul>\n";
    }
}
