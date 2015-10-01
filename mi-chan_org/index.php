  <?php get_header(); ?>
    <div class="container main-content">
      <div id="breadcrumb">
    <?php get_template_part('breadcrumb'); ?>
</div>
      <div class="row">
        <div class="col-md-9 content-area">
          <div class="posts">
            <?php
                if (have_posts()) :
                    while (have_posts()) :
                        the_post();
                ?>
            <div class="post">
              <div class="post-header page-header">
                <h1>
                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h1>
                <div class="post-meta">
                  <?php echo get_the_date(); ?> 【カテゴリー：<?php if (the_category(', '))  the_category(); ?>】【タグ：<?php if (get_the_tags()) the_tags(); ?>】
                </div>
              </div>
              <div class="row post-content">
                <div class="col-xs-4">
                  <?php if (has_post_thumbnail()) : ?>
                  <?php the_post_thumbnail(array(200, 200)); ?>
                  <?php else: ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/img/noimage.png" width="200" height="200">
                  <?php endif; ?>
                </div>
                <div id="posts_title" class="col-xs-8">
                  <?php
                  the_content('<br>続きを読む &raquo;</br>');
                  ?>
                </div>
              </div>
            </div><!-- /post -->
<?php
  endwhile;
else:
?>

<p>記事はありません！</p>

<?php
endif;
?>
          </div><!-- /posts -->
        </div><!--/.content-area-->
        <?php get_sidebar(); ?>
      </div>
    <nav class="container-fluid text-center">
<?php bootstrap_pagination(); ?>
    </nav>
    </div><!--/.main-content-->
  <?php get_footer(); ?>
