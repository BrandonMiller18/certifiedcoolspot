<?php 
            
    $current_term = get_queried_object();

    $terms = get_terms( array(
        'taxonomy'   => 'certification',
        'hide_empty' => false,
        'number'     => 3,
        'exclude'    => $current_term->term_id,
    ) );?>
<div class="section-wrap tags">

    <?php foreach( $terms as $term ) : ?>
    
    
    <a class="btn" role="button" href="<?php echo get_term_link($term); ?>">
        <?php echo $term->name;  ?>
    </a>
    
    
    
    <?php endforeach; ?>

</div>