<?php get_header(); ?>
<section class="banner">
    <?php  
    $image = get_field('banner');
    if( !empty( $image ) ): ?>
    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
    <?php endif; ?>
    <div class="breadcrumb d-flex">
        <a href=" <?php echo home_url() ?> "> CMILAN / </a><p>&nbsp;TƯ VẤN</p>
    </div>
</section>
<div class="support">
    <!-- đại lý  -->
    <div class="support__dealer">
        <div class="container"> 
            <div class="row">
                <div class="col-12">
                    <div class="text-center mb-3">
                        <h3 class="fw-bold">ĐẶT CÂU HỎI CHO CHÚNG TÔI</h3>
                    </div>
                    <p class="text-center">Nếu có bất kỳ câu hỏi nào cần tư vấn, vui lòng hoàn thành form thông tin bên dưới để được giải đáp!</p>
                    <?php echo do_shortcode('[contact-form-7 id="64" title="Form Tư vấn"]') ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>