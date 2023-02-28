<?php get_header(); ?>


<div class="section__contact">
    <div class="section__breadcrumb">
        <div class="container">
            <?php the_breadcrumb(); ?>
        </div>
    </div>
    <div class="container contact__info">
        <div class="row">
            <div class="col-12 col-md-2 col-lg-2"></div>
            <div class="col-12 col-md-8 col-lg-8">
                <div class="row">
                    <div class="col-md-12  d-flex justify-content-md-center col-lg-4 justify-content-lg-end align-items-center logo-info">
                        <img src="<?php echo esc_html(get_theme_mod('html_logo_header')); ?>" alt="logo">
                    </div>
                    <div class="col-md-12 col-lg-8 d-flex flex-column justify-content-center contact-content">
                        <h3>CÔNG TY CỔ PHẦN AN THỊNH NAM</h3>
                        <div class="d-flex flex-column">
                            <?php
                            if (have_rows('footer_setting', 5)) :
                                while (have_rows('footer_setting', 5)) : the_row();
                                    $image = get_sub_field('image');
                            ?>
                                    <p> <span>Trụ sở chính:</span><a href="<?php echo get_sub_field('link_gg_map_tru_so_chinh'); ?>" target="_blank"><?php echo get_sub_field('tru-so-chinh'); ?></a> </p>
                                    <p><span>Cửa hàng:</span> <a href="<?php echo get_sub_field('link_gg_map_cua_hang'); ?>" target="_blank"><?php echo get_sub_field('cua-hang'); ?></a> </p>
                                    <p><span>Hotline:</span> <a href="tel:<?php echo get_sub_field('holine_number1'); ?>"><?php echo get_sub_field('hotline1'); ?></a></p>
                                    <p><span>Email:</span> <a href="mailto:<?php echo get_sub_field('link_email'); ?>"><?php echo get_sub_field('email'); ?></a></p>
                            <?php
                                endwhile;
                            else :
                            // Do something...
                            endif;
                            ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-2 col-lg-2"></div>
        </div>

    </div>
    <div class="contact__form">
        <div class="container ">
            <div class="row">
                <div class="col-md-3 col-2"></div>
                <div class="col-12 col-md-6 col-8">
                    <div class="row">
                        <div class="col-lg-6 form-contact">
                            <?php echo do_shortcode('[contact-form-7 id="361" title="Form contact - Contact page"]') ?>
                        </div>
                        <div class="col-lg-6 contact-text">
                            <p style="color:#393939;font-size: 18px;font-weight: 500;margin: 0;padding-bottom: 13px;text-transform: uppercase;">Gửi tin nhắn cho chúng tôi</p>
                            <p style="font-weight: 400;font-size: 16px;margin: 0;padding-bottom: 80px">Các bạn có thông tin cần liên hệ, hoặc cần hợp tác, các bạn có thể liên hệ qua Zalo, Facebook, Fanpage hoặc để lại thông tin liên hệ ở đây, chúng tôi sẽ liên hệ lại ngay

                            </p>
                            <!-- <p style="font-size: 18px;font-weight: 700;color: #393939">AN Thinh NAM</p>
                            <div class="d-flex">
                                <a target="_blank" href="https://www.facebook.com/permalink.php?story_fbid=pfbid02MLMss3myiZmU5L1shE1mSshF49hbXhawGKhbTwoBarbVqbYTYQ7BMfZSnKPUQWbWl&id=102825134859279">
                                    <img class="mr-2" style="margin-right: 12px;" src="<?php echo get_template_directory_uri(); ?>/assets/images/sango-contact-facebook-icon.png" height="38" width="38" />
                                </a>
                                <img class="mr-2" style="margin-right: 12px;" src="<?php echo get_template_directory_uri(); ?>/assets/images/sango-contact-instagram-icon.png" height="38" width="39" />
                                <img class="mr-2" style="margin-right: 12px;" src="<?php echo get_template_directory_uri(); ?>/assets/images/sango-contact-youtube-icon.png" height="38" width="38" />
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-2"></div>
            </div>

        </div>
    </div>
</div>
<iframe src='https://kenhthoitiet.vn/iframe?term=32&days=3&hC=%23ffffff&hB=%23098d4b&bC=%23098d4b&tC=%2318211e&lC=%23dddddd' id='widgeturl' width='100%' height='330' scrolling='no' frameborder='0' allowtransparency='true' style='border:none;overflow:hidden;'></iframe>

<div class="section__google-map">
    <iframe src="<?php echo get_field( "link_google_map" );?>" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.78229113777!2d108.20976521536079!3d16.0248447448812!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142198b648d5517%3A0xd1d2995b29963166!2zMTEgVHLhuqduIFBoxrDhu5tjIFRow6BuaCwgS2h1w6ogVHJ1bmcsIEPhuqltIEzhu4csIMSQw6AgTuG6tW5nIDU1MDAwMCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1662454256817!5m2!1svi!2s" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
</div>

<?php get_footer(); ?>