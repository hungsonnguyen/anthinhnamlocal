<?php get_header(); ?>
<section class="banner">
    <?php  
    $image = get_field('banner');
    if( !empty( $image ) ): ?>
    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
    <?php endif; ?>
    <div class="breadcrumb d-flex">
        <a href=" <?php echo home_url() ?> "> CMILAN / </a><p>&nbsp;ĐẠI LÝ</p>
    </div>
</section>
<div class="support">
    <!-- đại lý  -->
    <div class="support__dealer">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title-mid-dealer text-center mb-3">
                        <h3>ĐĂNG KÝ TRỞ THÀNH ĐẠI LÝ CỦA  CMILAN - SƠN CHUẨN Ý</h3>
                    </div>
                    <p class="text-center">Để trở thành đại lý của chúng tôi, vui lòng hoàn thành form thông tin bên dưới để được thông tin chi tiết!</p>
                    <?php echo do_shortcode('[contact-form-7 id="61" title="Form đại lý"]') ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>