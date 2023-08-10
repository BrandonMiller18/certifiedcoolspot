<?php get_header();?>

<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Twitter Share button -->
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>



<?php 
$location = get_the_terms( $post->ID, 'locations' );
?>

<div class="page-wrap">
    
    <div class="post-grid">
        
        <div>
            <a class="breadcrumb" href="/spots">< Back to Spots</a>
            <div class="post-title">
                <h1><?php the_title(); ?></h1>
                <p>Location: <a href="/locations/<?php echo $location[0]->slug;  ?>"> <?php echo $location[0]->name ?></a></p>
            </div>
            <?php if(has_post_thumbnail()):?>
            <div class="post-image">
                <img src="<?php the_post_thumbnail_url('blog-large');?>" alt="<?php the_title();?>">
            </div>
            <?php endif ?>
            <div class="post-content">
                <?php echo the_content(); ?>
            </div>

        </div>

        <div>
            <div class="post-attr">
                <h2>About the spot.</h2>
                <ul>
                    <li>Website: </li>
                    <li>Address: </li>
                    <li>Founded: </li>
                    <li>Certified Since: </li>
                </ul>
                <div class="share">
                    <h3>Share this spot.</h3>
                    <p>Help others find this amazing spot by sharing it on your social media!</p>
                    <div>
                        <div class="fb-share-button" data-href="<?php echo the_permalink() ?>" data-layout="button_count"></div>
                        <div><a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="large" data-show-count="false">Tweet</a></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php
    $args = array(
        'post_type' => 'spots',
        'posts_per_page' => 3
    );
    $recent_spots = new WP_Query( $args ); ?>

    <?php if ( $recent_spots->have_posts() ) : ?>
    <div class="section">
                          
        <div class="section-wrap">
            <h2 class="section-heading">More Spots.</h2>
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
        </div>
            
    </div>
    <?php endif; ?>

</div>



<?php get_footer();?>