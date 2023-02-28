<?php
get_header();
$queried_object = get_queried_object();
global $post;
?>
<section class="banner">
    <?php
    $image = get_field('banner');
    if (!empty($image)) : ?>
        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
    <?php endif; ?>
    <div class="breadcrumb d-flex">
        <a href=""> CMILAN /</a>
        <p>&nbsp;LIÊN HỆ</p>
    </div>
</section>
<div class="page-contact pt-4 pt-lg-5">
    <div class="container">
        <div class="text-center">
            <p class="title-contact d-inline-block">
                THÔNG TIN LIÊN HỆ
            </p>
        </div>
        <div class="page-contact__inf">
            <div class="row gy-5">
                <div class="col-12 col-lg-5 text-center d-flex align-items-center mt-0 mt-lg-5">
                    <img style="object-fit:contain;" src="<?php bloginfo('template_directory') ?>/assets/images/logo-contact.png" alt="logocontact">
                </div>
                <div class="col-12 col-lg-7 mt-2 mt-lg-5">
                    <h4 class="mb-4">Công ty Cổ Phần Xuất Nhập Khẩu Green Home</h4>
                    <a target="_blank" href="https://www.google.com/maps/place/9+Tr%E1%BA%A7n+H%C6%B0ng+%C4%90%E1%BA%A1o,+Trung+Tr%E1%BA%A1ch,+B%E1%BB%91+Tr%E1%BA%A1ch,+Qu%E1%BA%A3ng+B%C3%ACnh,+Vi%E1%BB%87t+Nam/@17.5793939,106.5355396,17z/data=!4m2!3m1!1s0x31475881d2a30791:0x5c959c68a98f1c99?hl=vi&gl=US"><i class="fas fa-map-marker-alt"></i> <span> Trụ sở: số 9 Trần Hưng Đạo, TT.Hoàn Lão, H.Bố Trạch, T.Quảng Bình</span></a>
                    <a href="tel:0916773888"><i class="fas fa-phone-alt"></i> <span> Tel: 0916.773.888
                        </span></a>
                    <a href="mailto:info@cmilanpaint.com"><i class="far fa-envelope"></i> <span> Email:
                            info@cmilanpaint.com </span></a>
                </div>
            </div>
        </div>
    </div>
    <div style="background-color: #F9F9F9;">
        <div class="container">
            <div class="page-contact__form">
                <div class="row">
                    <div class="col-12 col-md-7">
                        <?php echo do_shortcode('[contact-form-7 id="60" title="Form liên hệ 1"]') ?>
                    </div>
                    <div class="col-12 col-md-5">
                        <h5>Gửi tin nhắn cho chúng tôi</h5>
                        <p>Các bạn có thông tin cần liên hệ, hoặc cần hợp tác, các bạn có thể liên hệ qua Zalo,
                            Facebook, Fanpage hoặc để lại thông tin liên hệ ở đây, chúng tôi sẽ liên hệ lại ngay
                        </p>
                        <h5>Green house</h5>
                        <div class="icon d-flex">
                            <a target="_blank" href="https://www.facebook.com/V%E1%BA%ADt-li%E1%BB%87u-x%C3%A2y-d%E1%BB%B1ng-Thanh-Th%E1%BA%BF-109956838138353/"><img src="<?php bloginfo('template_url'); ?>/assets/images/fa-contact.png"></a>
                            <a href="#"><img src="<?php bloginfo('template_url'); ?>/assets/images/ins-contact.png"></a>
                            <a href="#"><img src="<?php bloginfo('template_url'); ?>/assets/images/yt-contact.png"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-contact__map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15336.610809115135!2d108.2063702!3d16.0575638!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2eda130280d6e7fc!2zUk9TQSBCT05JVEEgxJDDgCBO4bq0Tkc!5e0!3m2!1svi!2s!4v1649149397845!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>

<?php get_footer(); ?>