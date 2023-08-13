<?php get_header();?>

<div class="page-wrap">
    <!-- Homepage Hero -->
    <div id="hero" class="hero home">
        <div>
            <h1 class="">Certified Cool Spots.</h1>
            <p class="">Some spots are just cerifiably cool...</p>
            <a href="#featured-spot" class="btn btn-accent layered-btn" role="button">Find Cool Spots</a>
        </div>
    </div>
    </div>
    <!-- End Homepage Hero -->
    
    <!-- Homepage Ribbon Callout -->
    <div class="ribbon">
            <div class="ribbon-callout">
                <h2 class="">Think you have a cool spot?
                    <div class="middle-underline-accent-two"></div>
                </h2>
                
                <p class="">Fill out the form and we might check it out! We also might not.</p>
            </div>
            <div class="ribbon-form">
                <form action="#" class="">
                    <div class="">
                        <label hidden="true" aria-hidden="true" for="Name">Spot</label>
                        <input class="full-width" type="text" name="Name" placeholder="Name of the spot">
                    </div>
                    <div class="form-items-row">
                        <label hidden="true" aria-hidden="true" for="city">City</label>
                        <input class="half-width" type="text" name="city" placeholder="Where can we find it?">
                        <label hidden="true" aria-hidden="true" for="city">Website</label>
                        <input class="half-width" type="text" name="city" placeholder="Website...">
                    </div>
                    <button type="submit" class="btn btn-accent layered-btn-sm">Submit</button>
                    
                </form>
            </div>
    </div>
    <!-- End Homepage Ribbon -->
    
    
    
    
    <!-- Loop for recent spots and latest spot -->
    
    <?php
    $args = array(
        'post_type' => 'spots',
        'posts_per_page' => 4,
        'offset' => 1,
    );
    $recent_spots = new WP_Query( $args ); ?>
    
    <!-- Most recent Spot -->
    <?php  get_template_part('includes/section', 'featured_spot') ?>
    <!-- end most recent spot -->

    

    <!-- locations callout -->

    <?php
    $args = array(
        'taxonomy' => 'locations',
        'hide_empty' => false,
    );

    $terms = get_terms($args);
    shuffle($terms);
    $locations = array_slice( $terms, 0, 3 );
    

    ?>

    <div class="locaitons-callout">
        <?php
        foreach ( $locations as $location ):
            // $term_meta = get_metadata('term');
            $term_id = $location->term_id;
            
            $image_id = get_term_meta($term_id, 'image', true);
            $image_data = wp_get_attachment_image_src($image_id, 'full');
            $image = $image_data[0];
        
        ?>
        <a location="<?php echo $location->name; ?>" href="<?php echo get_term_link($location) ?>" style="
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(<?php if( !empty( $image ) ) : echo $image; endif; ?>) center" class="location"">
        </a>
        <?php endforeach ?>
    </div>
    <!-- end locations callout -->

    <!-- recent spots -->
    <div class="section dark">
        
        <h2 class="section-heading">Recent Certified Cool Spots.</h2>  
        <div class="section-wrap flex-column">
            <?php
                $args = array(
                    'offset' => 1,
                    'number_of_spots' => 6,
                );  
                get_template_part('includes/section', 'archive', $args);
            ?>
            <a class="see-archive btn btn-accent layered-btn-sm" href="/spots">See all spots >></a>
        </div>
    
    
    
    </div>
    
<!-- End recent spots -->
</div>


<?php get_footer(); ?>