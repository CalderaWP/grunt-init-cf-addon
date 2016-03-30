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
 * USE THIS FOR YOUR VALIDATION! Most payment processors and other 3rd party API integrations do their work at pre-process so they can break form processing if API returns an error.
 *
 * @since 0.1.0
 *
 * @param array $config Processor config
 * @param array $form Form config
 * @param string $process_id Unique process ID
 *
 * @return array
 */
function {%= prefix %}_pre_process( $config, $form, $process_id) {
	//create processor object
	$processor = new Caldera_Forms_Processor_Get_Data( $config, $form, cf_members_fields() );
	
	//get values from submission for this processor
	$values = $rocessor->get_values();
	
	/////////DO YOUR THING HERE -- Call 3rd party API, etc...
	/** If you have an error -- break excution be returning here an array like this:
		return array(
			'note' => 'Something bad happened',
			'type' => 'error'
		);
	**/
	
	/** Add values to data that will be cached between sessions **/
	global $transdata;
	$transdata[ $process_id ][ 'values' ] = $values;
	
	/** If validation passes DON'T RETURN ANYTHING! **/
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
	//you can get entry ID here
	$entry_id = Caldera_Forms::get_field_data( '_entry_id', $form );

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

