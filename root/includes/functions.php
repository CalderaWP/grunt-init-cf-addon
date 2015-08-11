<?php
/**
 * Functions for {%= title %}
 *
 * @package   {%= prefix %}
 * @author    {%= author_name %} (email : {%= author_email %})
 * @license   GPL-2.0+
 * @link
 * @copyright 2015 {%= author_name %}
 */


/**
 * Registers the {%= title %} Processor
 *
 * @uses "caldera_forms_get_form_processors" filter
 *
 * @since 0.1.0
 * @param array		$processors		Array of current registered processors
 *
 * @return array	Array of registered processors
 */
function {%= prefix %}_register($processors){

	$processors['{%= prefix %}'] = array(
		"name"				=>	__( '{%= title %}', '{%= text_domain %}'),
		"description"		=>	__( '{%= description %}', '{%= text_domain %}'),
		"icon"				=>	{%= prefix_caps %}_URL . "icon.png",
		"author"			=>	'{%= author_name %}',
		"author_url"		=>	'{%= author_url %}',
		"pre_processor"		=>	'{%= prefix %}_pre_process',
		"processor"			=>  '{%= prefix %}_process',
		"template"			=>	{%= prefix_caps %}_PATH . "includes/config.php",

	);

	return $processors;

}

/**
 * Pre-Proccess {%= title %} proccessor
 *
 * @since 0.1.0
 *
 * @param array $config Processor config
 * @param array $form Form config
 *
 * @return array
 */
function {%= prefix %}_pre_process( $config, $form ) {

	return $config;
}


/**
 * Proccess {%= title %} proccessor
 *
 * @since 0.1.0
 *
 * @param array $config Processor config
 * @param array $form Form config
 *
 * @return array
 */
function {%= prefix %}_process( $config, $form ) {


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
