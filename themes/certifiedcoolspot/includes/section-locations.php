<?php 
    $current_url = "$_SERVER[REQUEST_URI]";
    
    if ( $current_url != '/spots/' ) {
        $current_term = get_queried_object();
        $terms = get_terms( array(
            'taxonomy'   => 'locations',
            'hide_empty' => false,
            'number'     => 5,
            'exclude'    => $current_term->term_id,
        ) );
    } else {
        $terms = get_terms( array(
            'taxonomy'   => 'locations',
            'hide_empty' => false,
            'number'     => 5,
        ) );
    }

    // var_dump($current_term);

    ?>


<div class="section-wrap tags">

    <?php foreach( $terms as $term ) : ?>
    
    
    <a class="btn" role="button" href="<?php echo get_term_link($term); ?>">
        <?php echo $term->name;  ?>
    </a>
    
    
    
    <?php endforeach; ?>

</div>