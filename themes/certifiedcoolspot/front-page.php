<?php get_header();?>

<div class="page-wrap">
    <!-- Homepage Hero -->
    <div id="hero" class="hero home">
        <div>
            <h1 class="">Find cool spots here.</h1>
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
    $recent_spots = new WP_Query( $args );

    $latest_spot = new WP_Query(array(
        'post_type' => 'spots',
        'posts_per_page' => 1,
        ),);
    ?>
    
    <!-- Most recent Spot -->
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
     <!-- end most recent spot -->
    
    <!-- recent spots -->
    <div class="section dark">
        <div class="progress-bar-dark"></div>
        <h2 class="section-heading">More Certified Cool Spots.</h2>
            
            <?php if ( $recent_spots->have_posts() ) : ?>
            <div class="recent-spots">
                <?php
                while ( $recent_spots->have_posts() ) : $recent_spots->the_post(); 
                $location = get_the_terms( $post->ID, 'locations' );
                ?>
                
                    
                <div class="spot-card">
                    <h3 class=""><?php the_title(); ?></h3>    
                    <?php if($location):?>
                        <p class="spot-location">            
                        
                            <?php echo $location[0]->name ?>
    
                        </p>
                    <?php endif; ?>
                    <a href="<?php the_permalink() ?>">
                        <img class="" src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title();?>">
                    </a>
                    <div class="spot-content">
                        <?php the_excerpt() ?>
                        <a href="<?php the_permalink() ?>" class="btn btn-accent-two layered-btn-accent">Keep reading</a>
                    
                    
                    
                    </div>
                
                </div>
                
                
                <?php endwhile; ?>
            
                <?php wp_reset_postdata(); ?>
            
            </div>
            <?php endif; ?>
        </div>
    
    
    
    </div>
    
<!-- End recent spots -->
</div>


<?php get_footer(); ?>