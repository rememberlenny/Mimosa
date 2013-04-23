<?php
/**
 * Single Item Template
 *
 * This template is the default page template. It is used to display content when someone is viewing a
 * singular view of a post ('post' post_type).
 * @link http://codex.wordpress.org/Post_Types#Post
 *
 * @package WooFramework
 * @subpackage Template
 */

get_header();
?>     
  <!-- #content Starts -->
	<?php woo_content_before(); ?>
  <div id="content" class="col-full">    
  	<div id="main-sidebar-container">    
      <!-- #main Starts -->
      <?php woo_main_before(); ?>
      <div id="main" class="row"> 

      <?php
        woo_loop_before();
      ?>
        <hr> 
        <div class="large-8 column">
          <?php if(get_field('Showcase_Images')): ?>
          <ul>
            <?php while(has_sub_field('Showcase_Images')): ?>
              <li>
                <div class="list-image-wrap">
                <img src="<?php the_sub_field('Showcase_Images_Content'); ?>">
                </div>
              </li>
            <?php endwhile; ?>
          </ul>
          <?php endif; ?>
        </div>
        <div class="large-4 column">

          <h1 class="entry-title"><?php the_title(); ?></h1>
          <?php if(get_field('Sub-header_Under_Title')): ?>
            <?php the_field('Sub-header_Under_Title'); ?>
          <?php endif; ?>

        <hr>

          <?php if(get_field('Full_item_name')): ?>
            <?php the_field('Full_item_name'); ?>
          <?php endif; ?>

        <hr>

          <?php if(get_field('Itemized_list_of_points')): ?>
          <ul>
            <?php while(has_sub_field('Itemized_list_of_points')): ?>
              <li>
                <?php the_sub_field('Itemized_list_text'); ?>
              </li>
            <?php endwhile; ?>
          </ul>
          <?php endif; ?>      

        <hr>
       
            <div class="nav-entries">
                <p>Navigate To</p>
                <div class="fix"></div>
                <a href="<?php echo get_post_type_archive_link( 'fabrication' ); ?>">View All Fabrications</a>
                <div class="fix"></div>
                <?php previous_post_link('%link', 'Previous'); ?> 
                <div class="fix"></div>
                <?php next_post_link('%link', 'Next'); ?>
                <div class="fix"></div>
            </div>



        <hr>
        </div>                     
      
      <?php
      	woo_loop_after();
      ?>     
      </div><!-- /#main -->
      <?php woo_main_after(); ?>
      <?php // get_sidebar(); ?>
		</div><!-- /#main-sidebar-container -->         
		<?php // get_sidebar('alt'); ?>
    </div><!-- /#content -->
	<?php woo_content_after(); ?>

<?php get_footer(); ?>