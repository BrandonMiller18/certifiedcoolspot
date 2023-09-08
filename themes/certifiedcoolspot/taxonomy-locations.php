<?php get_header();?>

<div class="page-wrap">
    <div class="section dark divider-top-btm-accent">
        <h1>Location Name</h1>
        <p>Check out all the certifiably cool spots we have found in [location].</p>
    </div>

    <div class="section">
        <div class="section-wrap">
            <?php 
            $args = array(
                'offset' => 0,
                'number_of_spots' => 6
            );
            get_template_part('includes/section', 'archive', $args);
            ?>
        </div>
    </div>

</div>


<?php get_footer();?>