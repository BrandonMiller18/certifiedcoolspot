<?php get_header();?>




<div class="page-wrap">

    <div class="section dark divider-top-btm-accent">
        <div>
            <h1 class="section-heading">Cool Spot Archive.</h1>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, quam!</p>
        </div>
    </div>
    
    
    <?php  get_template_part('includes/section', 'featured_spot') ?>

    <div class="section divider-bottom-accent-two">
        <?php  get_template_part('includes/section', 'locations') ?>
    </div>

    <div class="section">
        <div class="section-wrap">
            <?php 
            $args = array(
                'offset' => 1,
                'number_of_spots' => 6
            );
            get_template_part('includes/section', 'archive', $args);
            ?>
        </div>
    </div>

</div>



<?php get_footer();?>