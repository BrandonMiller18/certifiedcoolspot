<?php get_header();?>

<div class="page-wrap">
    <div class="section">
        <div class="section-wrap">
            <h1>This page does not exist!</h1>
            <p>Instead of leaving our site, you should calm the fuck down. This site is under development. You are bound to find some errors. Here, instead of leaving, check out a few dope Certified Cool Spots.</p>
            <p>If you disagree with our opinion: fuck yourself, eat shit and die.</p>
        </div>
    </div>
    <!-- recent spots -->
    <div class="section dark divider-top-accent-two">
        
        <h2 class="section-heading">Recent Certified Cool Spots.</h2>  
        <div class="section-wrap flex-column">
            <?php
                $args = array(
                    'offset' => 0,
                    'number_of_spots' => 6,
                );  
                get_template_part('includes/section', 'archive', $args);
            ?>
            <a class="see-archive btn btn-accent layered-btn-sm" href="/spots">See all spots >></a>
        </div>
    
    
    
    </div>
    
    <!-- End recent spots -->
</div>


<?php get_footer();?>