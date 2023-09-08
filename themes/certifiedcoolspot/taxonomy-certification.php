<?php get_header();

$term = get_queried_object();
// $tax = get_taxonomy( $queried_object->taxonomy );

?>

<div class="page-wrap">
    <div class="section dark divider-top-btm-accent">
        <h1><?php echo $term->name; ?></h1>
        <p>Check out all the <?php echo $term->name; ?>.</p>
    </div>

    <div class="section divider-bottom-accent-two">
        <?php  get_template_part('includes/section', 'certs') ?>
    </div>

    <div class="section">
        <div class="section-wrap">
            <?php 
            $args = array(
                'offset' => 0,
                'number_of_spots' => 6,
                'taxonomy' => 'certification',
            );
            get_template_part('includes/section', 'archive', $args);
            ?>
        </div>
    </div>

</div>


<?php get_footer();?>