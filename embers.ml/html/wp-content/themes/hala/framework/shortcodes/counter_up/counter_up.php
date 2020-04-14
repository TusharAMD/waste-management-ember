<?php
function Hala_counter_up_func($atts) {
    extract(shortcode_atts(array(
		'style' => 'style1',
        'icon' => '',
        'number' => '750',
        'title' => 'PROJECT COMPLETE',
        'el_class' => ''
    ), $atts));
    $class = array();
    $class[] = 'counter-number';
    $class[] = $style;
    $class[] = $el_class;
    ob_start();
    ?>
		
     <div class="<?php echo esc_attr(implode(' ', $class)); ?>">
		 <?php if($icon) echo '<i class="'.esc_attr($icon).'"></i>'; 
		  if($number) echo '<h3 class="counter">'.number_format($number).'</h3>'; ?>
         <div class="divider"></div>
		 <?php if($title) echo '<h4>'.esc_html($title).'</h4>'; ?>
	</div>
      
    <?php
    return ob_get_clean();
}
if(function_exists('hala_shortcode')) { hala_shortcode('counter_up', 'Hala_counter_up_func'); }