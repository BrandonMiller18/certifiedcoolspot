<?php 

$offset = $args['offset'];	// Get offset value used to not select most recent post
$posts = $args['number_of_spots'];	// Number of cards to display
$current_url = "$_SERVER[REQUEST_URI]";
$resp_code = http_response_code();
$slug = basename(parse_url($current_url, PHP_URL_PATH));

if ( strpos( $current_url, 'locations/') ) {
    $args = array(
        'post_type' => 'spots',
        'posts_per_page' => $posts,
        'paged' => $paged,
        'order' => 'DESC', 
        'orderby' => 'date',
        'offset' => $offset,
        'tax_query' => array(
            array(
                'taxonomy' => 'locations',
                'field' => 'slug',
                'terms' => $slug,
            ),
        ),
    );
} elseif ( $current_url !== "/" && $resp_code !== 404 ) {
    $args = array(
        'post_type' => 'spots',
        'posts_per_page' => $posts,
        'order' => 'DESC', 
        'orderby' => 'date',
        'post__not_in' => array($post->ID)
    ); 
} else {
    $args = array(
        'post_type' => 'spots',
        'posts_per_page' => $posts,
        'paged' => $paged,
        'order' => 'DESC', 
        'orderby' => 'date',
        'offset' => $offset,
    );
};
$recent_spots = new WP_Query( $args ); ?>

    <?php if ( $recent_spots->have_posts() ) : ?>
    <div class="more-spots-grid">
        <?php
        while ( $recent_spots->have_posts() ) : $recent_spots->the_post(); 
        $location = get_the_terms( $post->ID, 'locations' );
        ?>
        
            
        <div class="spot-card">
            <a href="<?php the_permalink() ?>">
                <img class="" src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title();?>">
            </a>
            <div>
                <h3><?php the_title(); ?></h3>    
                <?php if($location):?>
                <p class="spot-location">            
                        
                <?php echo $location[0]->name ?>
    
                </p>
                <?php endif; ?>
            </div>
            <div class="spot-content">
                <?php the_excerpt() ?>
                <a href="<?php the_permalink() ?>" class="" role="button">Keep reading >></a>
            </div>
        </div>
        

        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
            
    </div>

<?php else: endif; ?>