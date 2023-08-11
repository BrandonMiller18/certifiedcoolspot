<?php 

$args = array(
    'post_type' => 'spots',
    'posts_per_page' => 6,
    'paged' => $paged,
    'order' => 'DESC', 
    'orderby' => 'date'
);
$recent_spots = new WP_Query( $args ); ?>

    <?php if ( $recent_spots->have_posts() ) : ?>
    <div class="more-spots-grid">
        <?php
        $i = 0;
        while ( $recent_spots->have_posts() ) : $recent_spots->the_post(); 
        $location = get_the_terms( $post->ID, 'locations' );
        ?>
        
            
        <div class="spot-card">
            <a href="<?php the_permalink() ?>">
                <img class="" src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title();?>">
            </a>
            <div>
                <h3 class=""><?php the_title(); ?></h3>    
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