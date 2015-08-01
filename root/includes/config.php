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
?>


<div class="caldera-config-group">
	<label for="id">
		<?php _e('Something', '{%= text_domain %}'); ?>
	</label>
	<div class="caldera-config-field">
		<input type="text" class="block-input field-config magic-tag-enabled" id="id" name="{{_name}}[id]" value="{{id}}">
	</div>
</div>
