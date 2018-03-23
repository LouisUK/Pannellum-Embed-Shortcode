<?php

/*
Plugin Name: Pannellum Embed Shortcode
Plugin URI: https://github.com/LouisUK/Pannellum-Embed-Shortcode
Description: WordPress shortcode to embed 360 images using Pannellum.
Version: 1.0
Author: Louis Barber
Author URI: https://github.com/louisuk
License: GPL
*/

if ( ! defined( 'ABSPATH' ) ) exit;

// Create the shortcode
function pannellum_embed_shortcode( $atts )
{
    // normalize attribute keys, lowercase
    $atts = array_change_key_case( (array)$atts, CASE_LOWER );

    $atts = shortcode_atts( array(
        'width'     => 600,
        'height'    => 400,
        'src'       => '',
        'preview'   => '',
        'title'   => '',
        'author'   => '',
        'player'    => plugins_url('/pannellum/pannellum.htm', __FILE__),
        'autoload'  => false,
    ), $atts );

    $autoload   = filter_var( $atts["autoload"], FILTER_VALIDATE_BOOLEAN );
    $width      = filter_var( $atts["width"], FILTER_VALIDATE_INT );
    $height     = filter_var( $atts["height"], FILTER_VALIDATE_INT );
    $preview    = esc_url( $atts["preview"] );
    $player     = esc_url( $atts["player"] );
    $src        = esc_url( $atts["src"] );
    $title      = sanitize_text_field( $atts["title"] );
    $author     = sanitize_text_field( $atts["author"] );

    // Add preview image before playing
    if( ! empty( $preview ) ) {
        $src .= '&amp;preview=' . $preview;
    }

    // Auto start player on load
    if( $autoload ) {
        $src .= '&amp;autoLoad=true';
    }

    // Panorama title
    if ( $title ) {
        $src .= '&amp;title=' . rawurlencode( $title );
    }

    // Panorama author
    if ( $author ) {
        $src .= '&amp;author=' . rawurlencode( $author );
    }

    if( ! empty( $src ) ) {
        $return_string = "<iframe width=\"{$width}\" height=\"{$height}\" allowfullscreen style=\"border-style:none;\" src=\"{$player}?panorama={$src}\"></iframe>";
    } else {
        $return_string = 'Pannellum - Nothing to display, please check your src url.';
    }

    return $return_string;
}


function pannellum_embed_shortcode_init()
{
    add_shortcode( 'pannellum', 'pannellum_embed_shortcode' );
}

add_action( 'init', 'pannellum_embed_shortcode_init' );