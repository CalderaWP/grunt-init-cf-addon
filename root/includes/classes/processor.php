<?php

/**
 * Class {%= class_prefix %}_Processor the main processor class for {% title %}

 * @package   {%= prefix %}
 * @author    {%= author_name %} (email : {%= author_email %})
 * @license   GPL-2.0+
 * @link
 * @copyright 2016 {%= author_name %}
 */
 */

class {%= class_prefix %}_Processor extends Caldera_Forms_Processor_Processor {

	/**
	 * @inheritdoc
	 */
	public function pre_processor( array $config, array $form, $proccesid ) {

		//Get values for all configuration fields and check for errors
		$this->set_data_object_initial( $config, $form );

		//see if we have any errors, if so return them now before doing anything else
		$errors = $this->data_object->get_errors();
		if ( ! empty( $errors ) ) {
			return $errors;

		}

		$this->setup_transata( $proccesid );

		/** @TODO Do your processing -- 3rd-oarty API calss, additional validation, whatever -- here. */
		/** If you need a value from current form based on configuration, use $value = $this->data_object->get_value( 'config-field-id' ); */
		/** If you need to add an error use $this->data_object->add_error( __( 'Something is wrong', 'text-domain' ) ); */

		//check again for errors, if so return.
		// IMPORTANT: Don't return anything here besides errors, returning in pre-process stops form submission.
		$errors = $this->data_object->get_errors();
		if ( ! empty( $errors ) ) {
			return $errors;

		}
	}

	/**
	 * @inheritdoc
	 */
	public function processor( array $config, array $form, $proccesid ) {
		/** This runs after validation, you don't have to do anything special  */
		/** This runs before entries are saved, so if you need to modify field data, for example to hash a password or credit card number, do it here  */

		global  $transdata;
		$this->set_data_object_from_transdata( $proccesid );

		//If you need it, all values for this processor can be retrieved this way:
		$data = $this->data_object->get_values();

		//If you need it, field config for this processer can be retrieved this way:
		$fields = $this->data_object->get_fields();

		//add additional values to the saved meta, add it to this array before returning
		return $transdata[ $proccesid ][ 'meta' ];
	}

}