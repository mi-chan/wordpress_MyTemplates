<?php get_header(); ?>
  <div class="container main-content">
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
            </div>
            <div class="post-content">
              <?php the_content(); ?>
            </div>
          </div><!-- /post -->
<?php
endwhile;
else:
?>

<p>ページはありません！</p>

<?php
endif;
?>
        </div><!-- /posts -->
      </div><!--/.content-area-->
      <?php get_sidebar(); ?>
    </div>

  </div><!--/.main-content-->
<?php get_footer(); ?>
