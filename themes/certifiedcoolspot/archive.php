<?php get_header();?>




<div class="page-wrap">

    <div class="section dark divider-top-btm-accent archive-hero">
        <div>
            <h1 class="section-heading">Cool Spot Archive.</h1>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, quam!</p>
        </div>
    </div>
    
    
    <?php  get_template_part('includes/section', 'featured_spot') ?>

    <div class="section dark divider-top-btm-accent-two">
        <?php  get_template_part('includes/section', 'locations') ?>
    </div>

    <div class="section">
        <div class="section-wrap">
            <?php get_template_part('includes/section', 'archive') ?>
        </div>
    </div>




    <?php  previous_posts_link(); ?>
    <?php  next_posts_link(); ?>
</div>



<?php get_footer();?>