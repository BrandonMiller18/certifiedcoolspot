
<div class="section footer">

<?php
    $args = array(
        'taxonomy' => 'locations',
        'hide_empty' => false,
    );

    $locations = get_terms( $args );

    $args = array(
        'post_type' => 'spots',
        'posts_per_page' => 6
    );
    $recent_spots = new WP_Query( $args );
?>

    <div>
        <h3 class="section-heading">Locations</h3>
        <ul>
            <?php foreach ($locations as $location) : ?>
                <li><a href="<?php echo get_term_link($location) ?>"><?php echo $location->name ?></a></li> 
            <?php endforeach;?>
        </ul>
    </div>
    <div>
        <h3 class="section-heading">Recent Spots</h3>
        <ul>
        <?php if ( $recent_spots->have_posts() ) : 
            while ( $recent_spots->have_posts() ) : $recent_spots->the_post();
        ?>    
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php endwhile; endif; ?>
        </ul>
    </div>
    <div>
        <h3 class="section-heading">Cool links</h3>
        <ul>
            <li><a href="/about">About Us</a></li>
            <li><a href="/contact">Contact Us</a></li>
            <li><a href="/submit-a-spot">Submit a Spot</a></li>
        </ul>
    </div>
    <div>
        <a href="/"><img src="<?php bloginfo('template_directory');?>/images/logo.png" class=""></a>
        <ul>
            <li><a href="https://www.instagram.com/certifiedcoolspot/" target="_blank"><i class="fa-brands fa-instagram fa-2xl"></i></a></li>
            <li><a href="https://www.tiktok.com/@certifiedcoolspot" target="_blank"><i class="fa-brands fa-tiktok fa-2xl"></i></a></li>
            <li><a href="https://www.twitter.com/certcoolspot/" target="_blank"><i class="fa-brands fa-twitter fa-2xl"></i></a></li>
        </ul>
    </div>

</div>


<?php wp_footer();?>

</body>
</html>