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
                <?php echo get_the_date(); ?> 【<?php the_category(', '); ?>】
              </div>
            </div>
            <div class="post-content">
              <?php the_content(); ?>
            </div>
          </div><!-- /post -->
          <nav>
            <ul class="pager">
              <li><?php previous_post_link('%link', '前の記事へ', TRUE); ?></li>
              <li><?php next_post_link('%link', '次の記事へ', TRUE); ?></li>
            </ul>
          </nav>
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

  </div><!--/.main-content-->
<?php get_footer(); ?>
