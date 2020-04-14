<?php
/*
 * Layout Name: Default
 * Author: Hala Theme
 * Author URI: http://motivoweb.com
 * Param: tbbs_halaButtonParams
 */

/* Define variable */
$_id 		= sprintf( 'hala-element-%s', $atts['element_id'] );
$_class 	= sprintf( 'bs-button-layout-%s %s', str_replace( '.php', '', $atts['template_params']['template'] ), $atts['class'] );

if( ! function_exists( 'tbbs_ButtonLayoutItem_default' ) ) :
	function tbbs_ButtonLayoutItem_default( $atts, $id, $class )
	{
		extract( $atts['template_params'] );
		$text = $link['text'];
		$url = $link['url'];
		$icon = ( ! empty( $icon_font_class ) ) ? "<i class='{$icon_font_class}'></i>" : '';
		$position_btn = ( ! empty( $position ) ) ? "class='{$position}'" : '';	
	
		if( ! empty( $icon ) && $position_icon == 'right' ) $text = $text . $icon;
		else if( ! empty( $icon ) && $position_icon == 'left' ) $text = $icon . $text;
		$position_icon_class = ( ! empty( $icon ) ) ? $position_icon : '';

		return "
		<div {$position_btn}>
		<a 
		id='{$id}' 
		class='bt-button {$class} {$layout} btn-{$size} icon-{$position_icon_class}' 
		href='{$url}'>$text</a> </div>";
	}
endif;

echo call_user_func_array( 'tbbs_ButtonLayoutItem_default' , array( $atts, $_id, $_class ) );