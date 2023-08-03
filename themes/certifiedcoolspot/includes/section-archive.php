<?php 

if( have_posts() ): while( have_posts() ): the_post(); 
$location = get_the_terms( $post->ID, 'locations' );

?>

<div class="card m-3 p-2 spot-cards">
    <img class="card-img-top" src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title();?>">
    <div class="card-body">
    
    
        <h3 class="card-title"><?php the_title(); ?></h3>
        
        <?php if($location):?>
        <p>            
        
            <?php echo $location[0]->name ?>


            
        </p>
        <?php endif; ?>

        
        <p class="card-text">Here is some content.</p>
        <a href="<?php the_permalink() ?>" class="btn btn-primary">Go somewhere</a>
    
    
    
    </div>
            
</div>

<?php endwhile; else: endif; ?>