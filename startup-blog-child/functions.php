<?php

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}



//----------------------------------------------------------------------------------
// Return CSS based on the user's Customizer selected colors.
//----------------------------------------------------------------------------------
if ( ! function_exists( 'ct_startup_blog_override_colors' ) ) {
	function ct_startup_blog_override_colors() {

		$color_css       = '';
		$primary_color   = get_theme_mod( 'color_primary' );
		$secondary_color = get_theme_mod( 'color_secondary' );
		$bg_color        = get_theme_mod( 'color_background' );

		if ( $primary_color == '' ) {
			$primary_color = '#20a4e6';
		}
		if ( $secondary_color == '' ) {
			$secondary_color = '#17e6c3';
		}
		if ( $bg_color == '' ) {
			$bg_color = '#f0f5f8';
		}
		// Update all instances of the default blue color being used
		if ( $primary_color != '#20a4e6' ) {
			$color_css .= "a,a:link,a:visited,.menu-primary-items a:hover,.menu-primary-items a:active,.menu-primary-items a:focus,.menu-primary-items li.current-menu-item > a,.menu-secondary-items li.current-menu-item a,.menu-secondary-items li.current-menu-item a:link,.menu-secondary-items li.current-menu-item a:visited,.menu-secondary-items a:hover,.menu-secondary-items a:active,.menu-secondary-items a:focus,.toggle-navigation-secondary:hover,.toggle-navigation-secondary:active,.toggle-navigation-secondary.open,.widget li a:hover,.widget li a:active,.widget li a:focus,.widget_recent_comments li a,.widget_recent_comments li a:link,.widget_recent_comments li a:visited,.post-comments-link a:hover,.post-comments-link a:active,.post-comments-link a:focus,.post-title a:hover,.post-title a:active,.post-title a:focus {
			  color: $primary_color;
			}";
			$color_css .= "@media all and (min-width: 50em) { .menu-primary-items li.menu-item-has-children:hover > a,.menu-primary-items li.menu-item-has-children:hover > a:after,.menu-primary-items a:hover:after,.menu-primary-items a:active:after,.menu-primary-items a:focus:after,.menu-secondary-items li.menu-item-has-children:hover > a,.menu-secondary-items li.menu-item-has-children:hover > a:after,.menu-secondary-items a:hover:after,.menu-secondary-items a:active:after,.menu-secondary-items a:focus:after {
			  color: $primary_color;
			} }";
			$color_css .= "input[type=\"submit\"],.comment-pagination a:hover,.comment-pagination a:active,.comment-pagination a:focus,.site-header:before,.social-media-icons a:hover,.social-media-icons a:active,.social-media-icons a:focus,.pagination a:hover,.pagination a:active,.pagination a:focus,.featured-image > a:after,.entry:before,.post-tags a,.widget_calendar #prev a:hover,.widget_calendar #prev a:active,.widget_calendar #prev a:focus,.widget_calendar #next a:hover,.widget_calendar #next a:active,.widget_calendar #next a:focus,.bb-slider .image-container:after,.sticky-status span,.overflow-container .hero-image-header:before {
				background: $primary_color;
			}";
			$color_css .= ".woocommerce .single_add_to_cart_button, .woocommerce .checkout-button, .woocommerce .place-order .button {
				background: $primary_color !important;
			}";
			$color_css .= "@media all and (min-width: 50em) { .menu-primary-items ul:before,.menu-secondary-items ul:before {
				background: $primary_color;
			} }";
			$color_css .= "blockquote,.widget_calendar #today, .woocommerce-message, .woocommerce-info {
				border-color: $primary_color;
			}";
			$color_css .= ".toggle-navigation:hover svg g,.toggle-navigation.open svg g {
				fill: $primary_color;
			}";
			$color_css .= ".site-title a:hover,.site-title a:active,.site-title a:focus {
				color: $primary_color;
			}";
	
			// Create translucent variation and apply to hovers
			$red                 = hexdec( substr( $primary_color, 1, 2 ) );
			$green               = hexdec( substr( $primary_color, 3, 2 ) );
			$blue                = hexdec( substr( $primary_color, 5, 2 ) );
			$primary_color_hover = "rgba($red, $green, $blue, 0.6)";
			
			$color_css .= "a:hover,a:active,a:focus,.widget_recent_comments li a:hover,.widget_recent_comments li a:active,.widget_recent_comments li a:focus {
			  color: $primary_color_hover;
			}";
			$color_css .= "input[type=\"submit\"]:hover,input[type=\"submit\"]:active,input[type=\"submit\"]:focus,.post-tags a:hover,.post-tags a:active,.post-tags a:focus {
			  background: $primary_color_hover;
			}";
		}
		// Update gradients if either color has changed
		if ( $primary_color != '#20a4e6' || $secondary_color != '#17e6c3' ) {

			/*
			if ( is_rtl() ) {	
				$color_css .= ".rtl .site-header:before,.rtl .featured-image > a:after,.rtl .entryDummy:before,.rtl .bb-slider .image-container:after,.rtl .overflow-container .hero-image-header:before {
					background-image: -webkit-linear-gradient(left, $secondary_color, $primary_color);
					background-image: linear-gradient(to right, $secondary_color, $primary_color);
				}";
				$color_css .= "@media all and (min-width: 50em) { .rtl .menu-primary-items ul:before,.rtl .menu-secondary-items ul:before {
					background-image: -webkit-linear-gradient(left, $secondary_color, $primary_color);
					background-image: linear-gradient(to right, $secondary_color, $primary_color);
				} }";
			} else {
				$color_css .= ".site-header:before,.featured-image > a:after,.entryDummy:before,.bb-slider .image-container:after,.overflow-container .hero-image-header:before {
					background-image: -webkit-linear-gradient(left, $primary_color, $secondary_color);
					background-image: linear-gradient(to right, $primary_color, $secondary_color);
				}";
				$color_css .= "@media all and (min-width: 50em) { .menu-primary-items ul:before,.menu-secondary-items ul:before {
					background-image: -webkit-linear-gradient(left, $primary_color, $secondary_color);
					background-image: linear-gradient(to right, $primary_color, $secondary_color);
				} }";
			}
			*/
			
		}
		if ( $bg_color != '#f0f5f8' ) {
			$color_css .= "body {background: $bg_color;}";
		}
		return $color_css;
	}
}