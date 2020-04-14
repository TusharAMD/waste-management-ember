<?php
global $hala_options;
$tb_product_page_title = isset($hala_options['tb_product_title_bar_bg']) ? $hala_options['tb_product_title_bar_bg'] : 1;
$tb_show_page_breadcrumb = isset($hala_options['tb_page_show_page_breadcrumb']) ? $hala_options['tb_page_show_page_breadcrumb'] : 1;
$subtext = isset($hala_options['title_bar_subtext']) ? $hala_options['title_bar_subtext'] : '';
$delimiter = isset($hala_options['page_breadcrumb_delimiter']) ? $hala_options['page_breadcrumb_delimiter'] : '/';
?>
<div class="skew-section page-header single-product">
<div class="hero parallax wrapper mo-title-bar-wrap">
    <div class="overlay"></div>
    <div class="container parallax-container reskew">
        <div class="text-center cd-intro mo-title-bar">
        <?php if($tb_product_page_title){  ?>
            <h2 class="mo-text-ellipsis"><?php echo Hala_woocommerce_page_title(); ?></h2>
            <?php if($subtext) echo '<h4>'.esc_html($subtext).'</h4>'; 
			 }
			 if($tb_show_page_breadcrumb){  ?>
            <div class="mo-path">
                <div class="mo-path-inner">
                    <?php echo Hala_page_breadcrumb($delimiter); ?>
                </div>
            </div>
        <?php } ?>
       </div>
    </div><!-- .mo-title-bar -->
  </div> <!-- .parallax-container -->
</div><!-- .hero.parallax -->