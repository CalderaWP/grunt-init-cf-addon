<?php
/**
 * Plugin Name: {%= title %}
 * Plugin URI:  {%= homepage %}
 * Description: {%= description %}
 * Version:     0.1.0
 * Author:      {%= author_name %}
 * Author URI:  {%= author_url %}
 * License:     GPLv2+
 * Text Domain: {%= text_domain %}
 * Domain Path: /languages
 */

/**
 * Copyright (c) {%= grunt.template.today('yyyy') %} {%= author_name %} (email : {%= author_email %}) for CalderaWP LLC
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2 or, at
 * your discretion, any later version, as published by the Free
 * Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */


/**
 * Define constants
 */
define( '{%= prefix_caps %}_VER', '0.1.0' );
define( '{%= prefix_caps %}_URL',     plugin_dir_url( __FILE__ ) );
define( '{%= prefix_caps %}_PATH',    dirname( __FILE__ ) . '/' );
define( '{%= prefix_caps %}_CORE',    dirname( __FILE__ )  );

/**
 * Default initialization for the plugin:
 * - Registers the default textdomain.
 */
function {%= prefix %}_init_text_domain() {
	load_plugin_textdomain( '{%= text_domain %}', FALSE, {%= prefix_caps %}_PATH . 'languages' );
}

/**
 * Include Files
 */
// load dependencies
include_once {%= prefix_caps %}_PATH . 'vendor/autoload.php';

// pull in the functions file
include {%= prefix_caps %}_PATH . 'includes/functions.php';

/**
 * Hooks
 */
//register text domain
add_action( 'init', '{%= prefix %}_init_text_domain()' );

// add filter to register addon with Caldera Forms
add_filter('caldera_forms_get_form_processors', '{%= prefix %}_register');

// filter to initialize the license system
add_action( 'admin_init', '{%= prefix %}_init_license' );


