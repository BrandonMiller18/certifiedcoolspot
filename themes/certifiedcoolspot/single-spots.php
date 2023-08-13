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

                <?php $data = get_acf_fields();
                $website = $data['website'];
                $address = $data['address'];
                $year_founded = $data['year_founded'];
                $certified_since = $data['certified_since'];
                ?>

                <ul>
                    <?php if ($website) : echo "<li><strong>Website:</strong> ", "<a href='",$website,"'target='_blank'>",$website,"</a></li>"; endif; ?>
                    <?php if ($address) : echo "<li><strong>Address:</strong> ", $address,"</li>"; endif; ?>
                    <?php if ($year_founded) : echo "<li><strong>Founded:</strong> ", $year_founded, "</li>"; endif; ?>
                    <?php if ($certified_since) : echo "<li><strong>Certified Since:</strong> ", $certified_since, "</li>"; endif; ?>
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

    <div class="section">
                          
        <div class="section-wrap">
            <h2 class="section-heading">More Spots.</h2>
            <?php
                $args = array(
                    'offset' => 0,
                    'number_of_spots' => 3,
                );  
                get_template_part( 'includes/section', 'archive', $args );
            ?>
        </div>
           
    </div>

</div>



<?php get_footer();?>