<?php get_header();?>





<?php if(has_post_thumbnail()):?>

<?php endif ?>

<?php 
$location = get_the_terms( $post->ID, 'locations' );
?>


<div class="">
    <img height="500" src="<?php the_post_thumbnail_url('blog-large');?>" alt="<?php the_title();?>">
    
    
</div>

<div class="container">
<h1><?php the_title(); ?></h1>
    <p>Location: <a href="/locations/<?php echo $location[0]->slug;  ?>"> <?php echo $location[0]->name ?></a></p>
    <p><?php  the_content();  ?></p>
    <p></p>
</div>


<?php get_footer();?>