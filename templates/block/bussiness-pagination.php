<div class="pagination">
    <?php 
        the_posts_pagination( array(
            'mid_size'  => 4,
            'prev_text' => __( '<i class="fas fa-chevron-left"></i>', 'textdomain' ),
            'next_text' => __( '<i class="fas fa-chevron-right"></i>', 'textdomain' ),
        ) );
    ?>
</div>