<?php
/*-----------------------------------------------*
  Styling Options
/*-----------------------------------------------*/
function th_load_css() {
	    global $hala_options;
        // Dark Version
		$th_theme_style =& $hala_options['th_theme_style'];
		if($th_theme_style != '' && $th_theme_style == 'dark'){
			wp_enqueue_style( 'main-dark-css', Hala_URI_PATH.'/assets/css/dark.css');
		}
        // Custom colors
		$th_theme_stylesheet =& $hala_options['th_select_stylesheet']; // Stylesheet select
		if ( $th_theme_stylesheet != '' && $th_theme_stylesheet !== 'default.css'){
			wp_enqueue_style('main-color-theme', Hala_URI_PATH . '/assets/css/colors/'.$th_theme_stylesheet);
		}
}
add_action('wp_enqueue_scripts', 'th_load_css');
/*-----------------------------------------------*
  Style Inline
/*-----------------------------------------------*/
function Hala_add_style_inline() {
	global $hala_options;
    $custom_style = null;
    if (isset($hala_options['custom_css_code']) && $hala_options['custom_css_code']) {
        $custom_style .= "{$hala_options['custom_css_code']}";
    }
	/* Body background */
    $tb_background_color =& $hala_options['tb_background']['background-color'];
    $tb_background_image =& $hala_options['tb_background']['background-image'];
    $tb_background_repeat =& $hala_options['tb_background']['background-repeat'];
    $tb_background_position =& $hala_options['tb_background']['background-position'];
    $tb_background_size =& $hala_options['tb_background']['background-size'];
    $tb_background_attachment =& $hala_options['tb_background']['background-attachment'];
	$custom_style .= "body{ background-color: $tb_background_color;}";
	if($tb_background_image){
		$custom_style .= "body{ background: url('$tb_background_image') $tb_background_repeat $tb_background_attachment $tb_background_position;background-size: $tb_background_size;}";
	}
	/* Title bar background */
    $tb_title_bar_bg_color =& $hala_options['tb_title_bar_bg']['background-color'];
    $title_bar_bg_image =& $hala_options['tb_title_bar_bg']['background-image'];
	$bg_title_bar = get_post_meta(get_the_ID(),'tb_bg_title_bar',true);
	if($bg_title_bar) {
		$title_bar_bg_image = $bg_title_bar;
	}
    $title_bar_bg_repeat =& $hala_options['tb_title_bar_bg']['background-repeat'];
    $title_bar_bg_position =& $hala_options['tb_title_bar_bg']['background-position'];
    $title_bar_bg_size =& $hala_options['tb_title_bar_bg']['background-size'];
    $title_bar_bg_attachment =& $hala_options['tb_title_bar_bg']['background-attachment'];
	
	$custom_style .= ".page .mo-title-bar-wrap { background-color: $tb_title_bar_bg_color;}";
	if($title_bar_bg_image){
		$custom_style .= ".page .mo-title-bar-wrap { background: url('$title_bar_bg_image') $title_bar_bg_repeat $title_bar_bg_attachment $title_bar_bg_position !important; background-size: $title_bar_bg_size  !important;}";
	}
	
	//$th_primary_color - $th_secondary_color 
    $th_main_color =& $hala_options['th_primary_color'];
    $th_second_color =& $hala_options['th_secondary_color'];
	if( $th_main_color !== '' && $th_second_color !== '' ){
		$custom_style .= "
		::-moz-selection { background:$th_main_color ; }
::selection { background:$th_main_color ; }
.button, .social-header li:hover, .loading span, .bg-primary, .separator_third span:before, .separator_third span:after, .divider.primary:before, .divider.primary:after, .wpb_content_element .wpb_tabs_nav li.ui-tabs-active a {
  background: $th_main_color ; }
.cd-nav li.cd-selected a, .cd-nav li:hover > a, .title-section h3 { color: $th_main_color ; }
@-moz-document url-prefix() {
  .icon-wrap i:before {
    color: $th_main_color ;
    -webkit-text-fill-color: $th_main_color ;
  }
}
.overlay, .vc_parallax .mo-vc-row-ovelay, .parallax.hero .mo-vc-row-ovelay, .mfp-bg, .modal,
.progress-bar, .bt-progress-style1.vc_progress_bar .vc_single_bar .vc_bar, .bt-progress-style3.vc_progress_bar .vc_single_bar .vc_bar {
  background: $th_main_color ;
  background: -webkit-linear-gradient(left, $th_main_color 0%, $th_second_color 100%) ;
  background: -moz-linear-gradient(left, $th_main_color 0%, $th_second_color 100%) ;
  background: -o-linear-gradient(left, $th_main_color 0%, $th_second_color 100%) ;
  background: -ms-linear-gradient(left, $th_main_color 0%, $th_second_color 100%) ;
  background: linear-gradient(to left, $th_main_color 0%, $th_second_color 100%) ;
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='$th_main_color', endColorstr='$th_second_color',GradientType=1 ) ;
}

.service .icon-wrap i::before {
  background: $th_main_color;
  background: -webkit-linear-gradient(left, $th_main_color 0%, $th_second_color 100%) ;
  background: -moz-linear-gradient(left, $th_main_color 0%, $th_second_color 100%);
  background: -o-linear-gradient(left, $th_main_color 0%, $th_second_color 100%);
  background: -ms-linear-gradient(left, $th_main_color 0%, $th_second_color 100%);
  background: linear-gradient(to left, $th_main_color 0%, $th_second_color 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='$th_main_color', endColorstr='$th_second_color',GradientType=1 );
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

figure.portfolio-effect, .format-video figure, .overlay-top, .team-member figure, .team-member-temp2 .team-member-details:after, .team-member-temp3:before, .team-member-temp3 .team-member-details-inner {
  background: $th_main_color ;
  background: -webkit-linear-gradient(top, $th_main_color 0%, $th_second_color 100%);
  background: -moz-linear-gradient(top, $th_main_color 0%, $th_second_color 100%);
  background: -o-linear-gradient(top, $th_main_color 0%, $th_second_color 100%);
  background: -ms-linear-gradient(top, $th_main_color 0%, $th_second_color 100%);
  background: linear-gradient(to top, $th_main_color 0%, $th_second_color 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='$th_main_color', endColorstr='$th_second_color',GradientType=1 );
}

.cd-headline.loading-bar .cd-words-wrapper::after {  background: $th_main_color ; }
.button:hover, .button:active, .button:focus {  border-color: $th_second_color ;  background-color: $th_second_color ; }
.separator span i:before, .separator span i:after {  border: 1px solid $th_main_color ; }
.separator_sec, .separator_third {  color: $th_main_color ; }
.separator_sec span, .separator_third span {  background: $th_main_color ; }

/* mo-header */
.mo-header-v2.mo-header-icon:hover:before, .mo-header-v2.mo-header-icon:hover:after, .mo-header-v2.mo-header-icon:hover span, .mo-header-v3.mo-header-icon:hover:before, .mo-header-v3.mo-header-icon:hover:after, .mo-header-v3.mo-header-icon:hover span {  background: $th_main_color ; }

.mo-header-v1 .widget .social-wrap > a:hover, .mo-header-v2 .widget .social-wrap > a:hover, .mo-header-v3 .widget .social-wrap > a:hover, .mo-header-v4 .widget .social-wrap > a:hover {  color: $th_main_color ;}
.mo-header-v1 .widget #menu-menu-top li a i, .mo-header-v1 .widget .mo-top-bar li a i, .mo-header-v2 .widget #menu-menu-top li a i, .mo-header-v2 .widget .mo-top-bar li a i, .mo-header-v3 .widget #menu-menu-top li a i, .mo-header-v3 .widget .mo-top-bar li a i, .mo-header-v4 .widget #menu-menu-top li a i, .mo-header-v4 .widget .mo-top-bar li a i {  color: $th_main_color ; }
.mo-header-v1 .widget #menu-menu-top li a i:hover, .mo-header-v1 .widget .mo-top-bar li a i:hover, .mo-header-v2 .widget #menu-menu-top li a i:hover, .mo-header-v2 .widget .mo-top-bar li a i:hover, .mo-header-v3 .widget #menu-menu-top li a i:hover, .mo-header-v3 .widget .mo-top-bar li a i:hover, .mo-header-v4 .widget #menu-menu-top li a i:hover, .mo-header-v4 .widget .mo-top-bar li a i:hover {  color: $th_main_color ; }
.mo-header-v1 .mo-search-header a.active, .mo-header-v4 .mo-search-header a.active {  background: $th_main_color ; }
.mo-header-v1 .mo-search-header a.active:before, .mo-header-v1 .mo-search-header a.active:after, .mo-header-v1 .mo-search-header a:hover, .mo-header-v4 .mo-search-header a.active:before, .mo-header-v4 .mo-search-header a.active:after, .mo-header-v4 .mo-search-header a:hover {  background: $th_main_color ; }

.mo-header-v3 .mo-search-header > a:hover, .mo-header-v2 .mo-search-header > a:hover, .mo-header-v2.mo-header-fixed .mo-header-menu .mo-search-header > a:hover, .mo-header-v3 .mo-toggle-menu:hover, .mo-header-v3.mo-header-fixed .mo-menu-list > ul > li > a:hover, .mo-header-v1 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul > li.mo-banner .mo-banner-wrap .mo-overlay > a:hover, .mo-header-v2 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul > li.mo-banner .mo-banner-wrap .mo-overlay > a:hover, .mo-header-v3 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul > li.mo-banner .mo-banner-wrap .mo-overlay > a:hover, .mo-header-v4 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul > li.mo-banner .mo-banner-wrap .mo-overlay > a:hover, .mo-header-v1.dot .mo-menu-list > ul > li:hover > a:before, .mo-header-v1.dot .mo-menu-list > ul > li:hover > a:after, .mo-header-v1.dot .mo-menu-list > ul > li.current-menu-item > a:before, .mo-header-v1.dot .mo-menu-list > ul > li.current-menu-item > a:after, .mo-header-v1.dot .mo-menu-list > ul > li.current-menu-ancestor > a:before, .mo-header-v1.dot .mo-menu-list > ul > li.current-menu-ancestor > a:after {  color: $th_main_color ; }

.mo-header-v1 .mo-search-header > a:hover, .mo-header-v4 .mo-search-header > a:hover,
.mo-header-v5 .mo-search-header > a:hover, .mo-header-v1.mo-header-fixed .mo-header-menu .mo-search-header > a:hover,
.mo-header-v4.mo-header-fixed .mo-header-menu .mo-search-header > a:hover, .mo-header-v1.line .mo-menu-list > ul > li > a:after, .mo-header-v2 .mo-menu-list > ul > li > a:before, .mo-header-v3 .mo-menu-list > ul > li > a:before, .mo-header-v1 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul > li.mo-banner .mo-banner-wrap .mo-overlay > a, .mo-header-v2 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul > li.mo-banner .mo-banner-wrap .mo-overlay > a, .mo-header-v3 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul > li.mo-banner .mo-banner-wrap .mo-overlay > a, .mo-header-v4 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul > li.mo-banner .mo-banner-wrap .mo-overlay > a {  background: $th_main_color ;}

.mo-header-v1 .mo-menu-list > ul > li:hover > a, .mo-header-v1 .mo-menu-list > ul > li.current-menu-item > a, .mo-header-v1 .mo-menu-list > ul > li.current-menu-ancestor > a, .mo-header-v2 .mo-menu-list > ul > li:hover > a, .mo-header-v2 .mo-menu-list > ul > li.current-menu-item > a, .mo-header-v2 .mo-menu-list > ul > li.current-menu-ancestor > a, .mo-header-v3 .mo-menu-list > ul > li:hover > a, .mo-header-v3 .mo-menu-list > ul > li.current-menu-item > a, .mo-header-v3 .mo-menu-list > ul > li.current-menu-ancestor > a, .mo-header-v4 .mo-menu-list > ul > li.current-menu-item > a.mo-header-v4 .mo-menu-list > ul > li:hover , .mo-header-v1 .mo-menu-list > ul > li.menu-item-has-children > ul > li:hover > a, .mo-header-v1 .mo-menu-list > ul > li.menu-item-has-children > ul > li.current-menu-item > a, .mo-header-v1 .mo-menu-list > ul > li.menu-item-has-children > ul > li.current-menu-ancestor > a, .mo-header-v2 .mo-menu-list > ul > li.menu-item-has-children > ul > li:hover > a, .mo-header-v2 .mo-menu-list > ul > li.menu-item-has-children > ul > li.current-menu-item > a, .mo-header-v2 .mo-menu-list > ul > li.menu-item-has-children > ul > li.current-menu-ancestor > a, .mo-header-v3 .mo-menu-list > ul > li.menu-item-has-children > ul > li:hover > a, .mo-header-v3 .mo-menu-list > ul > li.menu-item-has-children > ul > li.current-menu-item > a, .mo-header-v3 .mo-menu-list > ul > li.menu-item-has-children > ul > li.current-menu-ancestor > a, .mo-header-v4 .mo-menu-list > ul > li.menu-item-has-children > ul > li:hover > a, .mo-header-v4 .mo-menu-list > ul > li.menu-item-has-children > ul > li.current-menu-item > a, .mo-header-v4 .mo-menu-list > ul > li.menu-item-has-children > ul > li.current-menu-ancestor > a, .mo-header-v1 .mo-menu-list > ul > li.menu-item-has-children > ul > li.menu-item-has-children > ul > li:hover > a, .mo-header-v1 .mo-menu-list > ul > li.menu-item-has-children > ul > li.menu-item-has-children > ul > li.current-menu-item > a, .mo-header-v1 .mo-menu-list > ul > li.menu-item-has-children > ul > li.menu-item-has-children > ul > li.current-menu-ancestor > a, .mo-header-v2 .mo-menu-list > ul > li.menu-item-has-children > ul > li.menu-item-has-children > ul > li:hover > a, .mo-header-v2 .mo-menu-list > ul > li.menu-item-has-children > ul > li.menu-item-has-children > ul > li.current-menu-item > a, .mo-header-v2 .mo-menu-list > ul > li.menu-item-has-children > ul > li.menu-item-has-children > ul > li.current-menu-ancestor > a, .mo-header-v3 .mo-menu-list > ul > li.menu-item-has-children > ul > li.menu-item-has-children > ul > li:hover > a, .mo-header-v3 .mo-menu-list > ul > li.menu-item-has-children > ul > li.menu-item-has-children > ul > li.current-menu-item > a, .mo-header-v3 .mo-menu-list > ul > li.menu-item-has-children > ul > li.menu-item-has-children > ul > li.current-menu-ancestor > a, .mo-header-v4 .mo-menu-list > ul > li.menu-item-has-children > ul > li.menu-item-has-children > ul > li:hover > a, .mo-header-v4 .mo-menu-list > ul > li.menu-item-has-children > ul > li.menu-item-has-children > ul > li.current-menu-item > a, .mo-header-v4 .mo-menu-list > ul > li.menu-item-has-children > ul > li.menu-item-has-children > ul > li.current-menu-ancestor > a {  color: $th_main_color ; }

.mo-header-v1 .mo-menu-list > ul > li.menu-item-has-children > ul > li.menu-item-has-children .mb-dropdown-icon:hover:before, .mo-header-v2 .mo-menu-list > ul > li.menu-item-has-children > ul > li.menu-item-has-children .mb-dropdown-icon:hover:before, .mo-header-v3 .mo-menu-list > ul > li.menu-item-has-children > ul > li.menu-item-has-children .mb-dropdown-icon:hover:before, .mo-header-v4 .mo-menu-list > ul > li.menu-item-has-children > ul > li.menu-item-has-children .mb-dropdown-icon:hover:before, .mo-header-v1 .mo-menu-list > ul > li.menu-item-has-children .mb-dropdown-icon:hover:before, .mo-header-v2 .mo-menu-list > ul > li.menu-item-has-children ,.mb-dropdown-icon:hover:before, .mo-header-v3 .mo-menu-list > ul > li.menu-item-has-children , .mb-dropdown-icon:hover:before, .mo-header-v4 .mo-menu-list > ul > li.menu-item-has-children , .mb-dropdown-icon:hover:before, .mo-header-v4 .mo-header-top.t_motivo .icon_text .icocc .icon, .mo-header-v4 .mo-header-top.t_motivo.right-pcc .mo-search-header > a, .mo-header-v4 .mo-header-menu .mo-col-menu.has-menu-right-sidebar .mo-menu-list.motivo_cc > ul > li > ul > li:hover > a, .mo-header-v4 .mo-header-menu .mo-col-menu.has-menu-right-sidebar .mo-menu-list.motivo_cc > ul > li > ul > li.current-menu-item > a, .mo-header-v4 .mo-header-menu .mo-col-menu.has-menu-right-sidebar .mo-menu-list.motivo_cc > ul > li > ul > li.current-menu-ancestor > a, .mo-header-v4 .mo-header-menu .mo-col-menu.has-menu-right-sidebar .mo-menu-list.motivo_cc > ul > li.menu-item-has-children .nomega-menu-item > ul > li:hover > a, .mo-header-v4 .mo-header-menu .mo-col-menu.has-menu-right-sidebar .mo-menu-list.motivo_cc > ul > li.menu-item-has-children .nomega-menu-item > ul > li.current-menu-item > a, .mo-header-v4 .mo-header-menu .mo-col-menu.has-menu-right-sidebar .mo-menu-list.motivo_cc > ul > li.menu-item-has-children .nomega-menu-item > ul > li.current-menu-ancestor > a, .mo-header-v4 .mo-header-menu .mo-col-menu.has-menu-right-sidebar .header_socials .widget .social-wrap > a:hover, .mo-header-v1.mo-header-fixed .mo-header-menu .mo-search-header > a, .mo-header-v4.mo-header-fixed .mo-header-menu .mo-search-header > a, .mo-header-v4 .mo-header-menu .mo-col-menu.has-menu-right-sidebar .header_socials .widget #menu-menu-top > li > a > i, .mo-header-v4 .mo-header-menu .mo-col-menu.has-menu-right-sidebar .header_socials .widget .mo-top-bar > li > a > i, .mo-header-v4 .mo-header-menu .mo-col-menu.has-menu-right-sidebar .header_socials .widget #menu-menu-top > li > a:hover, .mo-header-v4 .mo-header-menu .mo-col-menu.has-menu-right-sidebar .header_socials .widget .mo-top-bar > li > a:hover { color:$th_main_color ; }

@media (min-width: 992px) {
  .mo-stick-active .mo-header-v4.mo-header-stick .mo-header-menu {  background: $th_main_color ;  }
}
.service .title-wrap h4 {  color: $th_main_color ;  }
.owl-about .owl-dot span, .owl-about .owl-dot span:hover { background-color: $th_main_color ;  
  border: 1px solid  $th_main_color ;  }
.owl-about .owl-dot.active span {  background-color: $th_main_color ;   border: 1px solid $th_main_color ; }

/* owl-dot */
.dots-nav-dark .owl-dot span {  background-color: transparent ;  border: 1px solid $th_main_color ; }
.dots-nav-dark .owl-dots .owl-dot.active span { background-color: $th_main_color ;  border: 1px solid $th_main_color ; }
.dots-nav-dark .owl-dot span {  background-color: transparent ;  border: 1px solid $th_main_color ; }
.dots-nav-dark .owl-nav .icon-wrap::after, .dots-nav-dark .owl-nav .icon-wrap::before, .dots-nav-dark .owl-nav span::after, .dots-nav-dark .owl-nav span::before {  background: $th_main_color ; }
.pie-primary .vc_pie_chart_back {  border-color: $th_main_color ; }
.pie-primary .vc_pie_chart_value, .pie-primary .wpb_pie_chart_heading { color: $th_main_color ; }

.wpb_accordion .wpb_accordion_wrapper .ui-accordion-header-active a, .service.style3 .icon-wrap, .progress-bar-tooltip, .bt-progress-style1.vc_progress_bar .vc_single_bar .vc_label .vc_inner .vc_label_units, .bt-progress-style2.vc_progress_bar .vc_single_bar .vc_bar, .bt-progress-style4.vc_progress_bar .vc_single_bar .vc_bar {  background: $th_main_color ; }

.service.style3:hover .icon-wrap {  background: $th_second_color ; }
.title-wrap h4, .service h4, .service.style3:hover h4, .service.style4 .step-number {  color: $th_main_color ; }
.timeline-box i {  color: $th_main_color ; }
.timeline-line span {  color: $th_main_color ; }
.timeline-line:hover:after {   background: $th_main_color ; }
@media all and (min-width: 650px) {
  .timeline-line:after {  border: 2px solid $th_main_color ;  }
}

.timeline-box:hover, .timeline-box:focus {
  -webkit-box-shadow: 0px 3px 0px 0px $th_main_color ;
  -moz-box-shadow: 0px 3px 0px 0px $th_main_color ;
  box-shadow: 0px 3px 0px 0px $th_main_color ;
}
.portfolio-filter a:after {  background: $th_main_color ; }
.portfolio-filter a:hover, .portfolio-filter a.active {  color: $th_main_color ; }
.team-member .team-details .divider:before, .team-member .team-details .divider:after { background-color: $th_main_color ; }
.team-member:hover .team-details {  background: $th_main_color ; }
.pricing-item h3, .pricing-item span.icon-plan i { color: $th_main_color ; }
.pricing-item .divider:before, .pricing-item .divider:after {  background-color: $th_main_color ; }
.pricing-item .button {  border: 2px solid $th_main_color ; color: $th_main_color ; }
.pricing-item .button:hover {  background: $th_main_color ; }
.pricing-item:hover .pricing-price {  color: $th_main_color ; }
.pricing-item.style2 h3, .pricing-item.style2 .pricing-price { color: $th_main_color ; }
.pricing-item.style2 span.icon-plan i {  color: $th_main_color ; }
.pricing-item.style2 span.icon-plan:before, .pricing-item.style2 span.icon-plan:after { border: 1px solid $th_main_color ; }
.pricing-item.style2.pricing-best .button {  background:$th_main_color !important; }
.item-post h5:hover a {  color: $th_main_color ; }
.item-post:hover h5 a { color:$th_main_color ; }
.nectar-love.loved i { color:$th_main_color ; }
.nectar-love.loved span { background-color:$th_main_color ; }
.nectar-love.loved:hover span:after {  border-color: transparent transparent $th_main_color transparent ; }
.post h5.post-title:hover > a, .page h5.post-title:hover > a { color: $th_main_color ; }
.bt-button.primary {  background:$th_main_color;  border-color:$th_main_color; }
.btn-post:hover , .btn-post:active , .btn-post:focus{ color:$th_main_color;  }
.mo-pagination .current, .mo-pagination a:focus, .mo-pagination a:hover, .mo-pagination span:focus, .mo-pagination span:hover { background:$th_main_color ; }
.social_links_widget a:hover, .tagcloud a:hover, .tagcloud a:active, .widget.widget_calendar .calendar_wrap table #today,
.sidebar .social-media-widget ul li a:hover, .sidebar .social-media-widget ul li a:active, .wpb_widgetised_column .social-media-widget ul li a:hover, .wpb_widgetised_column .social-media-widget ul li a:active {
  background:$th_main_color ; }

.widget_categories ul li a:hover, .widget_categories ul li a:hover:before, .widget_mo_post_list h5:hover a,  .posts_widget_list h4:hover a, .widget_archive ul li a:hover, .widget_categories ul li a:hover:before,
.widget_recent_entries ul li a:hover, .widget_recent_entries ul li a:hover:before, .widget_meta ul li a:hover, .widget_meta ul li a:hover:before, .widget_pages ul li a:hover, .widget_pages ul li a:hover:before, .widget_nav_menu ul li a:hover, .widget_nav_menu ul li a:hover:before, .widget_hala_twitter ul li a:hover, .widget_hala_twitter ul li a:hover:before,
.widget_recent_comments ul li a:hover, .widget_recent_comments ul li a:hover:before, .widget.widget_calendar .calendar_wrap table th, .widget_hala_twitter ul li a {  color: $th_main_color ;}

.post-detail .post-title, .post-pagi:hover h3, .comment-body a.comment-reply-link {  color: $th_main_color ; }
.comment-respond .comment-form .form-submit .submit { background: $th_main_color ; }
.comment-respond .comment-form .form-submit .submit:hover, .comment-respond .comment-form .form-submit .submit:active, .comment-respond .comment-form .form-submit .submit:focus {  border-color: $th_second_color ;  background-color: $th_second_color ; }
.mo-testimonial-carousel.tpl1 {  background: $th_main_color ; }
.mo-testimonial-carousel.tpl1:before { border-top: 300px solid $th_main_color ; }
.mo-testimonial-carousel.tpl1 p:after {  border-top: 12px solid $th_main_color ; }
.mo-testimonial-carousel.tpl3 p {  background-color: $th_main_color ; }
.client-logo {  background:$th_second_color ; }
.client-logo .mo-image-carousel-wrap:before {  border-bottom: 300px solid $th_second_color ; }
.tweets { background-color: $th_main_color ; }
.popup-gmaps:hover, .popup-gmaps:active, .popup-gmaps:focus { background-color: $th_main_color ; }
.input_field:focus { outline: none;   border-color: $th_main_color ;}
.input_field_light:focus, .input-filled .input_field_light {  border-color:$th_main_color ; }
.input_label_content:after, .to-top:hover {  color:$th_main_color ; }
footer .social-media-widget li:hover {  background:$th_main_color ; }

/* accordion */
.wpb_accordion .wpb_accordion_wrapper .ui-accordion-header-active a, .bt-accordion-style1.vc_tta.vc_general .vc_tta-panel.vc_active .vc_tta-panel-heading .vc_tta-panel-title > a, .wpb_content_element .wpb_tabs_nav li.ui-tabs-active a, .bt-tabs-style1.vc_tta-tabs.vc_tta .vc_tta-tabs-list .vc_tta-tab:before, .bt-accordion-style1.vc_tta.vc_general .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title > a:before, .bt-tabs-style1.vc_tta-tabs.vc_tta .vc_tta-panels-container .vc_tta-panels .vc_tta-panel.vc_active .vc_tta-panel-heading .vc_tta-panel-title > a, .bt-tabs-style4.vc_tta-tabs.vc_tta .vc_tta-tabs-list .vc_tta-tab.vc_active > a, .bt-tabs-style4.vc_tta-tabs.vc_tta .vc_tta-panels-container .vc_tta-panels .vc_tta-panel.vc_active .vc_tta-panel-heading .vc_tta-panel-title > a {  background: $th_main_color ; }

.bt-accordion-style2.vc_tta.vc_general .vc_tta-panel .vc_tta-panel-body .mo-content-inner > h3, .bt-accordion-style2.vc_tta.vc_general .vc_tta-panel.vc_active .vc_tta-panel-heading .vc_tta-panel-title > a,
.mo-faq-style1.vc_toggle_default.vc_toggle.vc_toggle_active .vc_toggle_title .vc_toggle_icon, .bt-tabs-style1.vc_tta-tabs.vc_tta .vc_tta-tabs-list .vc_tta-tab.vc_active > a, .bt-tabs-style2.vc_tta-tabs.vc_tta .vc_tta-tabs-list .vc_tta-tab > a:hover, .bt-tabs-style2.vc_tta-tabs.vc_tta .vc_tta-tabs-list .vc_tta-tab.vc_active > a, .bt-tabs-style2.vc_tta-tabs.vc_tta .vc_tta-panels-container .vc_tta-panels .vc_tta-panel.vc_active .vc_tta-panel-heading .vc_tta-panel-title > a, .bt-tabs-style3.vc_tta-tabs.vc_tta .vc_tta-panels-container .vc_tta-panels .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title > a:hover, .bt-tabs-style3.vc_tta-tabs.vc_tta .vc_tta-panels-container .vc_tta-panels .vc_tta-panel.vc_active .vc_tta-panel-heading .vc_tta-panel-title > a, .bt-tabs-style3.vc_tta-tabs.vc_tta .vc_tta-tabs-list .vc_tta-tab > a:hover, .bt-tabs-style3.vc_tta-tabs.vc_tta .vc_tta-tabs-list .vc_tta-tab.vc_active > a {  color: $th_main_color ; }

.bt-accordion-style3.vc_tta.vc_general .vc_tta-panel.vc_active .vc_tta-panel-heading .vc_tta-panel-title > a {
  border-top-color: $th_main_color ;
  border-right-color: $th_main_color ;
  border-left-color: $th_main_color ;
}

.bt-accordion-style3.vc_tta.vc_general .vc_tta-panel.vc_active .vc_tta-panel-body {
  border-right-color: $th_main_color ;
  border-bottom-color: $th_main_color ;
  border-left-color: $th_main_color ;
}

.bt-accordion-style4.vc_tta.vc_general .vc_tta-panel.vc_active .vc_tta-panel-heading .vc_tta-panel-title > a {
  border-top-color: $th_main_color ;
  border-right-color: $th_main_color ;
  border-left-color: $th_main_color ;
  background: $th_main_color ;
}

.bt-accordion-style4.vc_tta.vc_general .vc_tta-panel.vc_active .vc_tta-panel-body {
  border-right-color: $th_main_color ;
  border-bottom-color: $th_main_color ;
  border-left-color: $th_main_color ;
  background: $th_main_color ;
}

.mo-faq-style1.vc_toggle_default.vc_toggle.vc_toggle_active {  border-color: $th_main_color ; }
.bt-tabs-style1.vc_tta-tabs.vc_tta .vc_tta-tabs-list .vc_tta-tab:after { border-top: 0px solid $th_main_color ; }
.bt-tabs-style1.vc_tta-tabs.vc_tta .vc_tta-tabs-list .vc_tta-tab.vc_active:after { border-top: 5px solid $th_main_color ;}
.bt-tabs-style1.vc_tta-tabs.vc_tta .vc_tta-panels-container .vc_tta-panels .vc_tta-panel.vc_active .vc_tta-panel-heading {
  border-color: $th_main_color ;}

/* woocommerce */
.mo-product-carousel.tpl1 .product .mo-thumb .mo-overlay, .bs-masonry.bs-masonry-layout-creative .tbbs-masonry-grid .tbbs-grid-item.hala-woo-style2:before, .mo-products-grid.tpl1 article:before {
  background: $th_main_color ;
  background: -webkit-linear-gradient(top, $th_main_color 0%, $th_second_color 100%) ;
  background: -moz-linear-gradient(top, $th_main_color 0%, $th_second_color 100%) ;
  background: -o-linear-gradient(top, $th_main_color 0%, $th_second_color 100%) ;
  background: -ms-linear-gradient(top, $th_main_color 0%, $th_second_color 100%) ;
  background: linear-gradient(to top, $th_main_color 0%, $th_second_color 100%) ;
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='$th_main_color', endColorstr='$th_second_color',GradientType=1 );
}

.woocommerce-checkout .woocommerce #order_review #payment .place-order #place_order , .woocommerce-checkout .woocommerce .login .form-row input.button, .woocommerce-checkout .woocommerce .checkout_coupon .form-row input.button , .woocommerce-account .woocommerce form.login .form-row input.button, .woocommerce-account .woocommerce form.lost_reset_password .form-row input.button, .mo-cart-header > a.active , .mo-cart-header:hover , .mo-cart-header > a .cart_total , .woocommerce-account .woocommerce form input.button , .woocommerce-checkout .woocommerce .login .form-row input.button:hover, .woocommerce-checkout .woocommerce .checkout_coupon .form-row input.button:hover , .woocommerce-cart .main-content .woocommerce .return-to-shop > a:hover , .woocommerce-cart .main-content .woocommerce .wc-proceed-to-checkout .checkout-button , .woocommerce-cart .main-content .woocommerce table.shop_table tbody tr td.actions > .button , .woocommerce-cart .main-content .woocommerce table.shop_table tbody tr td.actions .coupon input.button:hover, .woocommerce-cart .main-content .woocommerce table.shop_table tbody tr td.product-item a.remove:hover , .single-product .mo-related .products .mo-product-items .grid .product .mo-thumb .mo-actions .added_to_cart , .single-product .mo-related .products .mo-product-items .grid .product .mo-thumb .mo-actions .add_to_cart_button  , .archive-product .list .product .mo-content .mo-actions .add_to_cart_button , .archive-product .list .product .mo-content .mo-actions .add_to_cart_button:hover , .archive-product .list .product .mo-content .mo-actions .added_to_cart:hover , .single-product .mo-product-item .mo-content .cart .single_add_to_cart_button ,	.single-product .mo-product-item .mo-content .cart .single_add_to_cart_button:hover , .single-product .mo-product-item .mo-content .mo-socials > li > a:hover , .single-product div.product .woocommerce-tabs ul.tabs > li.active > a , .archive-product .grid .product .mo-thumb .mo-actions .add_to_cart_button , .archive-product .grid .product .mo-thumb .mo-actions .added_to_cart , .bs-masonry.bs-masonry-layout-creative .tbbs-masonry-grid .tbbs-grid-item.hala-woo-style2 .mo-content ,	.bs-masonry.bs-masonry-layout-creative .tbbs-masonry-grid .tbbs-grid-item.hala-woo-style2 .mo-content .mo-action > li a:hover , .bs-masonry.bs-masonry-layout-creative .tbbs-masonry-grid .tbbs-grid-item.hala-woo-style2 .mo-content .mo-action > li a:hover , .mo-product-list-item .mo-content .mo-actions .add_to_cart_button:hover ,	.mo-product-list-item .mo-content .mo-actions .added_to_cart:hover , .mo-products-grid.tpl2 .product .mo-thumb .mo-actions .added_to_cart  , .mo-product-carousel .owl-controls .owl-nav .owl-prev:hover, .mo-product-carousel .owl-controls .owl-nav .owl-next:hover ,.mo-product-carousel.tpl2 .product .mo-overlay .mo-content .mo-title > a , .mo-product-carousel.tpl1 .product .mo-content , .mo-products-grid.tpl1 article .mo-content , .mo-products-grid.tpl1 article .mo-content .mo-action > li a:hover , .mo-products-grid.tpl2 .product .mo-thumb .mo-actions .add_to_cart_button , .woocommerce-product-search input[type=submit]:hover , .mo_mini_cart > a.mo-icon:hover span.cart_total , .woocommerce-account .woocommerce form input.button:hover , .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button , .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover , .sidebar-left .widget.woo-filter-attribute ul > li > a, .sidebar-right .widget.woo-filter-attribute ul > li > a , .woocommerce-product-search input[type=submit] , .woocommerce-checkout .woocommerce #order_review #payment .place-order #place_order:hover , .woocommerce-cart .main-content .woocommerce .wc-proceed-to-checkout .checkout-button:hover , .woocommerce-cart .main-content .woocommerce table.shop_table tbody tr td.actions > .button:hover , .single-product div.product .woocommerce-tabs #tab-reviews #reviews .comment-respond .comment-reply-title:before , .single-product div.product .woocommerce-tabs #tab-reviews #reviews .comment-form .form-submit input.submit , .single-product div.product .woocommerce-tabs #tab-reviews #reviews .comment-form .form-submit input.submit:hover , .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button , .mo-cart-content a.wc-forward , .single-product div.product .woocommerce-tabs #tab-reviews #reviews .comment-respond .comment-reply-title:after, .single-product div.product .woocommerce-tabs #tab-reviews #reviews .comment-respond .comment-reply-title:before {  background: $th_main_color ;}

.sidebar-left .widget.widget_product_categories > ul li.current-cat > a, .sidebar-left .widget.widget_product_categories > ul li:hover > a, .sidebar-right .widget.widget_product_categories > ul li.current-cat > a, .sidebar-right .widget.widget_product_categories > ul li:hover > a , .sidebar-left .widget.widget_product_categories > ul li.current-cat > a:before, .sidebar-left .widget.widget_product_categories > ul li:hover > a:before , .sidebar-right .widget.widget_product_categories > ul li.current-cat > a:before, .sidebar-right .widget.widget_product_categories > ul li:hover > a:before , .woocommerce .woocommerce-message > a:hover , .woocommerce .woocommerce-message:before , .sidebar-left .widget.widget_products ul > li > a:hover, .sidebar-right .widget.widget_products ul > li > a:hover ,  .mo-cart-header > a.active .cart_total , .mo-cart-header:hover > a .cart_total, .mo_mini_cart > a.mo-icon:hover , .mo-cart-content .cart_list.product_list_widget .mini_cart_item > a:hover , .mo-cart-header > a , .woocommerce-account .woocommerce form.login p.lost_password > a:hover, .woocommerce-account .woocommerce form.lost_reset_password p.lost_password > a:hover ,	 .woocommerce-account .woocommerce .myaccount_user > a:hover , woocommerce-account .woocommerce .addresses .title > a  , .woocommerce-checkout .woocommerce .woocommerce-info > a:hover, .woocommerce-checkout .woocommerce .login > p.lost_password > a:hover, .woocommerce-checkout .woocommerce .checkout_coupon > p.lost_password > a:hover , .woocommerce-checkout .woocommerce #order_review .order-review-heading, .woocommerce-checkout .woocommerce #order_review .payment-method-heading , .woocommerce-cart .main-content .woocommerce table.shop_table tbody tr td.product-quantity .quantity .qty-minus:hover, .woocommerce-cart .main-content .woocommerce table.shop_table tbody tr td.product-quantity .quantity .qty-plus:hover, .single-product .mo-related .products .mo-product-items .grid .product .mo-content h3:hover , .single-product .mo-related .products .mo-product-items .grid .product .mo-content .star-rating ,.single-product .mo-related .products .mo-product-items .grid .product .mo-content .star-rating:before , .woocommerce-cart .main-content .woocommerce table.shop_table tbody tr td.product-item a:hover , .single-product .mo-product-item .mo-content .star-rating ,	.single-product .mo-product-item .mo-content .star-rating:before  , .single-product div.product .woocommerce-tabs #tab-reviews #reviews #comments .commentlist li .comment-text .star-rating ,	.archive-product .list .product .mo-content h3:hover ,	.archive-product .list .product .mo-content .price-rating .star-rating  ,	.archive-product .grid .product .mo-content h3:hover , .archive-product .grid .product .mo-content .star-rating ,	.archive-product .grid .product .mo-content .star-rating:before ,	.mo-product-list-item .mo-content h3:hover , .mo-product-list-item .mo-content .price-rating .star-rating , .mo-product-list-item .mo-content .price-rating .star-rating:before , .mo-product-grid-item .mo-content h3:hover ,	.mo-product-grid-item .mo-content .star-rating , .mo-product-grid-item .mo-content .star-rating:before , .archive-product .mo-action-bar .woocommerce-ordering .mo-layout-view .mo-layout.active , .mo-single-add-to-cart .single_add_to_cart_button:hover , .bs-masonry.bs-masonry-layout-creative .tbbs-masonry-grid .tbbs-grid-item.hala-woo-style2 .mo-content .mo-title > a:hover ,	.bs-masonry.bs-masonry-layout-creative .tbbs-masonry-grid .tbbs-grid-item.hala-woo-style2 .mo-content .mo-categories ,	.bs-masonry.bs-masonry-layout-creative .tbbs-masonry-grid .tbbs-grid-item.hala-woo-style2 .mo-content .mo-categories a , .mo-products-grid.tpl2 .product .mo-content h3:hover ,	.mo-products-grid.tpl2 .product .mo-content .star-rating ,	.mo-products-grid.tpl2 .product .mo-content .star-rating:before , .bs-masonry.bs-masonry-layout-creative .tbbs-filter-wrap.hala-woo-style2 .tbbs-filter-item.tbbs-filter-current:after, .bs-masonry.bs-masonry-layout-creative .tbbs-filter-wrap.hala-woo-style2 .tbbs-filter-item:hover:after , .bs-masonry.bs-masonry-layout-creative .tbbs-filter-wrap.hala-woo-style2 .tbbs-filter-item.tbbs-filter-current > a, .bs-masonry.bs-masonry-layout-creative .tbbs-filter-wrap.hala-woo-style2 .tbbs-filter-item:hover > a , .mo-product-carousel.tpl1 .product .mo-content .mo-title > a:hover , .mo-product-carousel.tpl1 .product .mo-content .mo-categories a:hover, .mo-product-carousel.tpl1 .product:hover .mo-content .mo-title > a:hover ,  .mo-product-carousel.tpl1 .product:hover .mo-content .mo-categories a:hover ,.mo-products-grid.tpl1 article .mo-content .mo-categories , .mo-products-grid.tpl1 article .mo-content .mo-categories a , .single-product div.product .woocommerce-tabs #tab-reviews #reviews .comment-form .comment-form-rating .stars > span > a , .single-product .mo-product-item .mo-content .cart .quantity .qty-minus:hover, .single-product .mo-product-item .mo-content .cart .quantity .qty-plus:hover , .single-product div.product .woocommerce-tabs #tab-reviews #reviews #comments .commentlist li .comment-text .star-rating:before ,  .archive-product .list .product .mo-content .price-rating .star-rating:before{ color: $th_main_color ; }

.sidebar-left .widget.widget_price_filter .price_slider_wrapper .price_slider .ui-slider-handle, .sidebar-right .widget.widget_price_filter .price_slider_wrapper .price_slider .ui-slider-handle, .sidebar-left .widget.widget_price_filter .price_slider_wrapper .price_slider_amount .button:hover, .sidebar-right .widget.widget_price_filter .price_slider_wrapper .price_slider_amount .button:hover, .sidebar-left .widget.widget_product_categories > ul li.current-cat > span.count, .sidebar-left .widget.widget_product_categories > ul li:hover > span.count, .sidebar-right .widget.widget_product_categories > ul li.current-cat > span.count, .sidebar-right .widget.widget_product_categories > ul li:hover > span.count, .mo-product-carousel.tpl1 .product .mo-thumb .mo-overlay .mo-inner .mo-action > li > a:hover {  background: $th_main_color ;  border-color: $th_main_color ;}

.mo-product-carousel.tpl2 .product .mo-overlay .mo-content .mo-buy-product:before, .mo-product-carousel.tpl2 .product .mo-overlay .mo-content .mo-buy-product:after, .mo-products-grid.tpl2 .product .mo-thumb .mo-actions .lightbox-gallery:before, .mo-products-grid.tpl2 .product .mo-thumb .mo-actions .lightbox-gallery:after, .archive-product .grid .product .mo-thumb .mo-actions .lightbox-gallery:before, .archive-product .grid .product .mo-thumb .mo-actions .lightbox-gallery:after, .single-product .mo-related .products .mo-product-items .grid .product .mo-thumb .lightbox-gallery:before, .single-product .mo-related .products .mo-product-items .grid .product .mo-thumb .lightbox-gallery:after {  border: 1px solid $th_main_color ;}

.mo-product-carousel.tpl2 .product .mo-overlay .mo-content .mo-buy-product:after, .mo-products-grid.tpl2 .product .mo-thumb.mo-actions .lightbox-gallery:after, .archive-product .grid .product .mo-thumb .mo-actions .lightbox-gallery:after, .single-product .mo-related .products .mo-product-items .grid .product .mo-thumb .lightbox-gallery:after {  background: $th_main_color ; }

.single-product .mo-related > h3:after, .single-product .mo-related > h3:before {  background: $th_main_color ;}
.woocommerce-cart .main-content .woocommerce .return-to-shop > a, .single-product .mo-related .products .mo-product-items .grid .product .mo-thumb .onsale, .single-product .mo-product-item .mo-thumb .onsale, .archive-product .list .product .mo-thumb .onsale, .archive-product .grid .product .mo-thumb .onsale, .mo-product-list-item .mo-thumb .onsale, .mo-onsale-style1, .mo-product-grid-item .mo-thumb .onsale, .mo-single-add-to-cart .single_add_to_cart_button, .mo-products-grid.tpl1 article .mo-thumb .onsale, .bs-masonry.bs-masonry-layout-creative .tbbs-masonry-grid .tbbs-grid-item.hala-woo-style2 .onsale, .mo-products-grid.tpl2 .product .mo-thumb .onsale {  color: $th_main_color ;   border: 2px solid $th_main_color ; }

.mo-cart-content .buttons > a.checkout {  color:$th_main_color ;  border:1px solid $th_main_color ; }
.woocommerce .woocommerce-message, .mo-single-add-to-cart .quantity > input:focus, .mo-cart-content .buttons > a:hover {
  border-color: $th_main_color ; }
footer .social-media-widget li:hover {  background:$th_main_color ; }
		";
	}
	//tb_footer(v1)
	$tb_footer_v1_backgroud  =& $hala_options['tb_footer_backgroud']['background-color'];
    $tb_footer_v1_typography =& $hala_options['tb_footer_typography']['color'];
	if($tb_footer_v1_backgroud !== '' && $tb_footer_v1_typography !== '' ){
		$custom_style .= "
		 .footer_v1 #trianglePath1 {  fill: $tb_footer_v1_backgroud ;}
         .footer_v1 .love .path { stroke:$tb_footer_v1_typography  ;}
         .footer_v1 .mc4wp-form .submit-newsletter-icon { color:$tb_footer_v1_typography ;} 
         .footer_v1 input, .footer_v1 .input_field , .footer_v1 select , .footer_v1 .widget_calendar .calendar_wrap table caption, .footer_v1 .widget.widget_calendar .calendar_wrap table td, .footer_v1 .widget.widget_calendar .calendar_wrap table th{ border-color:$tb_footer_v1_typography  ;}
		";
	}
	//tb_footer(v2)
	$tb_footer_v2_backgroud  =& $hala_options['tb_footer_v2_backgroud']['background-color'];
    $tb_footer_v2_title_typography =& $hala_options['tb_footer_v2_title_typography']['color'];
	$tb_footer_v2_typography =& $hala_options['tb_footer_v2_typography']['color'];

	if($tb_footer_v2_backgroud !== '' && $tb_footer_v2_typography !== '' && $tb_footer_v2_title_typography !== '' ){
		$custom_style .= "
		 .footer_v2 #trianglePath1 { fill:$tb_footer_v2_backgroud ;}
         .footer_v2 .love .path { stroke:$tb_footer_v2_typography ;}
         .footer_v2 .mc4wp-form .submit-newsletter-icon { color:$tb_footer_v2_typography;} 
         .footer_v2 .wg-title:before, .footer_v2 .wg-title:after { background:$tb_footer_v2_title_typography ;}
         .footer_v2 input, .footer_v2 .input_field , .footer_v2 select , .footer_v2 .widget_calendar .calendar_wrap table caption, .footer_v2 .widget.widget_calendar .calendar_wrap table td, .footer_v2 .widget.widget_calendar .calendar_wrap table th , .footer_v2 .social-media-widget{ border-color:$tb_footer_v2_typography ;}
";
	}
    wp_add_inline_style( 'hala-wp-custom-style', $custom_style );
}
add_action( 'wp_enqueue_scripts', 'Hala_add_style_inline' );