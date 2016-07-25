<?php
/**
 * Processor config UI for {%= title %}
 *
 * @package   {%= prefix %}
 * @author    Josh Pollock {%= author_name %} (email : {%= author_email %})
 * @license   GPL-2.0+
 * @link
 * @copyright 2015 {%= author_name %} for CalderaWP LLC
 */



if ( class_exists( 'Caldera_Forms_Processor_UI' ) ) {

echo Caldera_Forms_Processor_UI::config_fields( {%= prefix %}_fields() );
}

