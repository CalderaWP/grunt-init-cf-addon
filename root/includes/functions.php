<?php
/**
 * Functions for {%= title %}
 *
 * @package   {%= prefix %}
 * @author    {%= author_name %} (email : {%= author_email %})
 * @license   GPL-2.0+
 * @link
 * @copyright 2016 {%= author_name %}
 */

/**
 * Load processor
 *
 * @since 0.1.0
 *
 * @uses "caldera_forms_pre_load_processors" action
 */
function {%= prefix %}_load(){

		{%= prefix %}_register_autload();
		new {%= class_prefix %}_Processor( {%= prefix %}_config(), {%= prefix %}_fields(), '%= text_domain %}' );

}

/**
 * {%= title %} for Caldera Forms configuration basics
 *
 * @since 0.1.0
 *
 * @return array	Processor configuration
 */
function {%= prefix %}_config(){

	return array(
		"name"				=>	__( '{%= title %}', '{%= text_domain %}'),
		"description"		=>	__( '{%= description %}', '{%= text_domain %}'),
		"icon"				=>	{%= prefix_caps %}_URL . "icon.png",
		"author"			=>	'{%= author_name %}',
		"author_url"		=>	'{%= author_url %}',
		"template"			=>	{%= prefix_caps %}_PATH . "includes/config.php",
	);


}


/**
 * Register add-on namespace with Caldera Forms autoloader
 *
 * @since 0.1.0
 */
function {%= prefix %}_register_autload(){

	Caldera_Forms_Autoloader::add_root( '{%= class_prefix %}', {%= prefix_caps %}_PATH . 'classes' );
}



/**
 * Initializes the licensing system
 *
 * @uses "admin_init" action
 *
 * @since 0.1.0
 */
function {%= prefix %}_init_license(){

	$plugin = array(
		'name'		=>	'{%= title %}',
		'slug'		=>	'{%= name %}',
		'url'		=>	'https://calderawp.com/',
		'version'	=>	{%= prefix_caps %}_VER,
		'key_store'	=>  '{%= prefix %}_license',
		'file'		=>  {%= prefix_caps %}_CORE,
	);

	new \calderawp\licensing_helper\licensing( $plugin );

}


/**
 * Add our example form
 *
 * @uses "caldera_forms_get_form_templates"
 *
 * @since 0.1.0
 *
 * @param array $forms Example forms.
 *
 * @return array
 */
function {%= prefix %}_example_form( $forms ) {
	$forms['{%= prefix %}']	= array(
		'name'	=>	__( '{%= title %} Example', '{%= text_domain %}' ),
		'template'	=>	include {%= prefix_caps %}_PATH . 'includes/templates/example.php'
	);

	return $forms;

}

/**
 * Get UI fields
 *
 * @since 0.1.0
 *
 * @return array
 */
function {%= prefix %}_fields() {
	return array(

	);
}
