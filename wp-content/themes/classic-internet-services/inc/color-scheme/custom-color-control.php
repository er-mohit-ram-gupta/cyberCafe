<?php

  $classic_internet_services_color_scheme_css = '';

  //---------------------------------Logo-Max-height--------- 
  $classic_internet_services_logo_width = get_theme_mod('classic_internet_services_logo_width');

  if($classic_internet_services_logo_width != false){

    $classic_internet_services_color_scheme_css .='.logo .custom-logo-link img{';

      $classic_internet_services_color_scheme_css .='width: '.esc_html($classic_internet_services_logo_width).'px;';

    $classic_internet_services_color_scheme_css .='}';
  }

   // slider hide css
  $classic_internet_services_hidcatslide = get_theme_mod('classic_internet_services_hide_categorysec', false);
    $classic_internet_services_pageboxes = get_theme_mod('classic_internet_services_pageboxes');
  
  if($classic_internet_services_hidcatslide != true || $classic_internet_services_pageboxes != true){
    $classic_internet_services_color_scheme_css .='.page-template-template-home-page .header{';
      $classic_internet_services_color_scheme_css .='position:static;';
    $classic_internet_services_color_scheme_css .='}';
  }

  /*---------------------------Slider Height ------------*/

    $classic_internet_services_slider_img_height = get_theme_mod('classic_internet_services_slider_img_height');
    if($classic_internet_services_slider_img_height != false){
        $classic_internet_services_color_scheme_css .='.slidesection img{';
            $classic_internet_services_color_scheme_css .='height: '.esc_attr($classic_internet_services_slider_img_height).' !important;';
        $classic_internet_services_color_scheme_css .='}';
    }

  /*--------------------------- Footer background image -------------------*/

    $classic_internet_services_footer_bg_image = get_theme_mod('classic_internet_services_footer_bg_image');
    if($classic_internet_services_footer_bg_image != false){
        $classic_internet_services_color_scheme_css .='#footer{';
            $classic_internet_services_color_scheme_css .='background: url('.esc_attr($classic_internet_services_footer_bg_image).')!important;';
        $classic_internet_services_color_scheme_css .='}';
    }

  /*--------------------------- Scroll to top positions -------------------*/

    $classic_internet_services_scroll_position = get_theme_mod( 'classic_internet_services_scroll_position','Right');
    if($classic_internet_services_scroll_position == 'Right'){
        $classic_internet_services_color_scheme_css .='#button{';
            $classic_internet_services_color_scheme_css .='right: 20px;';
        $classic_internet_services_color_scheme_css .='}';
    }else if($classic_internet_services_scroll_position == 'Left'){
        $classic_internet_services_color_scheme_css .='#button{';
            $classic_internet_services_color_scheme_css .='left: 20px;';
        $classic_internet_services_color_scheme_css .='}';
    }else if($classic_internet_services_scroll_position == 'Center'){
        $classic_internet_services_color_scheme_css .='#button{';
            $classic_internet_services_color_scheme_css .='right: 50%;left: 50%;';
        $classic_internet_services_color_scheme_css .='}';
    }