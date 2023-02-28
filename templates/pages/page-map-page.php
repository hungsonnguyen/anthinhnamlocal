<?php get_header(); ?>

<div class="section__contact">
    <div class="section__breadcrumb">
        <div class="container">
            <?php the_breadcrumb(); ?>
        </div>
    </div>
</div>
<div>
    hello
</div>
<iframe src='https://kenhthoitiet.vn/iframe?term=32&days=3&hC=%23ffffff&hB=%23098d4b&bC=%23098d4b&tC=%2318211e&lC=%23dddddd' id='widgeturl' width='100%' height='330' scrolling='no' frameborder='0' allowtransparency='true' style='border:none;overflow:hidden;'></iframe>

<div class="section__google-map">
    <iframe src="<?php echo get_field( "link_google_map" );?>" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.78229113777!2d108.20976521536079!3d16.0248447448812!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142198b648d5517%3A0xd1d2995b29963166!2zMTEgVHLhuqduIFBoxrDhu5tjIFRow6BuaCwgS2h1w6ogVHJ1bmcsIEPhuqltIEzhu4csIMSQw6AgTuG6tW5nIDU1MDAwMCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1662454256817!5m2!1svi!2s" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
</div>

<?php get_footer(); ?>