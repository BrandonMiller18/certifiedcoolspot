<?php 
            
    $terms = get_terms( array(
        'taxonomy'   => 'locations',
        'hide_empty' => false,
        'number'     => 5,
    ) );?>
<div class="section-wrap tags">

    <a class="btn" role="button" href="#">All</a>

    <?php foreach( $terms as $term ) : ?>
    
    
    <a class="btn" role="button" href="">
        <?php echo $term->name;  ?>
    </a>
    
    
    
    <?php endforeach; ?>

</div>