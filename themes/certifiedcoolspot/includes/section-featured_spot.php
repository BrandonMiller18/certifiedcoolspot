<?php
$latest_spot = new WP_Query(array(
        'post_type' => 'spots',
        'posts_per_page' => 1,
        ),);
?>
<div id="featured-spot" class="section">
    <h2 class="section-heading">Featured Spot.</h2>
        
    <div class="featured">
        <?php if ( $latest_spot->have_posts() ) : ?>

            <?php while ( $latest_spot->have_posts() ) : $latest_spot->the_post();
            $location = get_the_terms( $post->ID, 'locations' );?>
    
                <div class="featured-image">
                    <a href="<?php the_permalink() ?>"><img src="<?php the_post_thumbnail_url()  ?>" alt="<?php the_title();?>"></a>
                </div>
                <div class="featured-content">
                    <div class="featured-title">
                        <h3 class=""><?php the_title();?></h3>

                        <?php if($location):?>
                        <p class="spot-location"><?php echo $location[0]->name ?></p>
                        <?php endif; ?>
                    </div>

                    <?php the_excerpt() ?>
                    
                    <a href="<?php the_permalink() ?>" class="btn btn-accent-two layered-btn-accent" role="button">Keep reading</a>
                </div>

        <?php endwhile; endif; ?>


    </div>

</div>