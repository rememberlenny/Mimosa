<?php
/**
 * Template Name: Home
 *
 * The magazine page template displays your posts with a "magazine"-style
 * content slider at the top and a grid of posts below it. 
 *
 * @package WooFramework
 * @subpackage Template
 */

 global $woo_options, $post; 
 get_header();

 if ( is_paged() ) $is_paged = true; else $is_paged = false;
 
 $page_template = woo_get_page_template();
?>

    <!-- #content Starts -->
	<?php woo_content_before(); ?>
    <div id="content" class="col-full magazine">
    	<div id="main-sidebar-container">
        <div class="row">
          <div class="column">
            <hr>
            <?php woo_main_before(); ?>
            <hr>
          </div>
        </div>
    <div id="main">
      <div class="fabrication row thumb-wraps">  
        <div class="column large-3">
          <a href="<?php echo get_post_type_archive_link( 'fabrication' ); ?>"><h2 class="subheader">Fabrication</h2></a>

          <p>A Quick view of our most up-to-date projects.</p>
        </div>
        <?php 
        rewind_posts();
        $mypost = array( 'showposts' => 3, 'post_type' => 'fabrication' );
        $my_query = new WP_Query( $mypost ); ?>

        <?php if ( have_posts() ) : ?>

        <?php /* Start the Loop */ ?>
        <?php while ( $my_query->have_posts()) :  $my_query->the_post(); ?>

        <div class="large-3 column thumb-display" <?php post_class(); ?> id="post-<?php the_ID(); ?>">
            <a href="<?php the_permalink(); ?>">
              <div class="thumbnail-height-limit">
                <?php the_post_thumbnail( 'small'); ?>
              </div>
              <h3 class=" entry-title"><?php the_title(); ?></h3>
            </a>
        </div>
        
        <?php endwhile; ?>

        <?php else : ?>
        <?php get_template_part( 'content', 'none' ); ?>

        <?php endif; // end have_posts() check 
        wp_reset_query();?>
        </div>
        <hr>
        <div class="design row thumb-wraps ">
        <div class="column large-3">
          <a href="<?php echo get_post_type_archive_link( 'design' ); ?>"><h2 class="subheader">Design</h2></a> 
          <p>A Quick view of our most up-to-date projects.</p>
        </div>
        <?php 
        rewind_posts();
        $mypost = array( 'showposts' => 3, 'post_type' => 'design' );
        $my_query = new WP_Query( $mypost ); ?>

        <?php if ( have_posts() ) : ?>

        <?php /* Start the Loop */ ?>
        <?php while ( $my_query->have_posts()) :  $my_query->the_post(); ?>

        <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
            <a href="<?php the_permalink(); ?>">
            <div class="large-3 column thumb-display">
              <div class="thumbnail-height-limit">
                <?php the_post_thumbnail( 'small'); ?>
              </div>
            <h3 class=" entry-title"><?php the_title(); ?></h3>
            </div>
            </a>
        </div>
        
        <?php endwhile; ?>

        <?php else : ?>
        <?php get_template_part( 'content', 'none' ); ?>

        <?php endif; // end have_posts() check 
        wp_reset_query();?>
        </div>
      </div><!-- /#main -->
      <?php woo_main_after(); ?>

      <?php // get_sidebar(); ?>
            
		</div><!-- /#main-sidebar-container -->         

  	<?php get_sidebar( 'alt' ); ?>

    </div><!-- /#content -->
	<?php woo_content_after(); ?>
    
		
<?php get_footer(); ?>