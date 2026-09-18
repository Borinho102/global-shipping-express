<?php

    $warehouse_cargo_theme_css= "";

    /*--------------------------- Scroll To Top Positions -------------------*/

    $warehouse_cargo_scroll_position = get_theme_mod( 'warehouse_cargo_scroll_top_position','Right');
    if($warehouse_cargo_scroll_position == 'Right'){
        $warehouse_cargo_theme_css .='#button{';
            $warehouse_cargo_theme_css .='right: 20px;';
        $warehouse_cargo_theme_css .='}';
    }else if($warehouse_cargo_scroll_position == 'Left'){
        $warehouse_cargo_theme_css .='#button{';
            $warehouse_cargo_theme_css .='left: 20px;';
        $warehouse_cargo_theme_css .='}';
    }else if($warehouse_cargo_scroll_position == 'Center'){
        $warehouse_cargo_theme_css .='#button{';
            $warehouse_cargo_theme_css .='right: 50%;left: 50%;';
        $warehouse_cargo_theme_css .='}';
    }

    /*--------------------------- Slider Image Opacity -------------------*/

    $warehouse_cargo_slider_img_opacity = get_theme_mod( 'warehouse_cargo_slider_opacity_color','');
    if($warehouse_cargo_slider_img_opacity == '0'){
        $warehouse_cargo_theme_css .='.slider-box img{';
            $warehouse_cargo_theme_css .='opacity:0';
        $warehouse_cargo_theme_css .='}';
        }else if($warehouse_cargo_slider_img_opacity == '0.1'){
        $warehouse_cargo_theme_css .='.slider-box img{';
            $warehouse_cargo_theme_css .='opacity:0.1';
        $warehouse_cargo_theme_css .='}';
        }else if($warehouse_cargo_slider_img_opacity == '0.2'){
        $warehouse_cargo_theme_css .='.slider-box img{';
            $warehouse_cargo_theme_css .='opacity:0.2';
        $warehouse_cargo_theme_css .='}';
        }else if($warehouse_cargo_slider_img_opacity == '0.3'){
        $warehouse_cargo_theme_css .='.slider-box img{';
            $warehouse_cargo_theme_css .='opacity:0.3';
        $warehouse_cargo_theme_css .='}';
        }else if($warehouse_cargo_slider_img_opacity == '0.4'){
        $warehouse_cargo_theme_css .='.slider-box img{';
            $warehouse_cargo_theme_css .='opacity:0.4';
        $warehouse_cargo_theme_css .='}';
        }else if($warehouse_cargo_slider_img_opacity == '0.5'){
        $warehouse_cargo_theme_css .='.slider-box img{';
            $warehouse_cargo_theme_css .='opacity:0.5';
        $warehouse_cargo_theme_css .='}';
        }else if($warehouse_cargo_slider_img_opacity == '0.6'){
        $warehouse_cargo_theme_css .='.slider-box img{';
            $warehouse_cargo_theme_css .='opacity:0.6';
        $warehouse_cargo_theme_css .='}';
        }else if($warehouse_cargo_slider_img_opacity == '0.7'){
        $warehouse_cargo_theme_css .='.slider-box img{';
            $warehouse_cargo_theme_css .='opacity:0.7';
        $warehouse_cargo_theme_css .='}';
        }else if($warehouse_cargo_slider_img_opacity == '0.8'){
        $warehouse_cargo_theme_css .='.slider-box img{';
            $warehouse_cargo_theme_css .='opacity:0.8';
        $warehouse_cargo_theme_css .='}';
        }else if($warehouse_cargo_slider_img_opacity == '0.9'){
        $warehouse_cargo_theme_css .='.slider-box img{';
            $warehouse_cargo_theme_css .='opacity:0.9';
        $warehouse_cargo_theme_css .='}';
        }