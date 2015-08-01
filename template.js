/**
 * grunt-cf-addon
 *
 * Based on https://github.com/10up/grunt-wp-plugin Copyright (c) 2013 Eric Mann, 10up
 * Licensed under the MIT License
 */

'use strict';

// Basic template description
exports.description = 'Create a Caldera Forms add-on plugin.';

// Template-specific notes to be displayed before question prompts.
exports.notes = '';

// Template-specific notes to be displayed after the question prompts.
exports.after = '';

// Any existing file or directory matching this wildcard will cause a warning.
exports.warnOn = '*';

// The actual init template
exports.template = function( grunt, init, done ) {
	init.process( {}, [
		// Prompt for these values.
		init.prompt( 'title', 'WP Plugin' ),
		{
			name   : 'prefix',
			message: 'PHP function prefix (alpha and underscore characters only)',
			default: 'cf-x'
		},
		init.prompt( 'description', 'X for Caldera Forms' ),
		init.prompt( 'homepage', 'https://calderawp.com' ),
		init.prompt( 'author_name', 'Josh Pollock for CalderaWP LLC' ),
		init.prompt( 'author_email', 'Josh@CalderaWP.com' ),
		init.prompt( 'author_url', 'https://CalderaWP.com' ),
		init.prompt( 'slug', 'cf-something' ),
	], function( err, props ) {
		props.keywords = [];
		props.version = '0.1.0';
		props.devDependencies = {
			"grunt": "~0.4.2",
			"grunt-cli": "~0.1.11",
			"grunt-contrib-clean": "^0.6.0",
			"grunt-contrib-compress": "^0.13.0",
			"grunt-contrib-copy": "^0.7.0",
			"grunt-git": "^0.3.3",
			"grunt-shell": "^1.1.1",
			"grunt-text-replace": "^0.4.0"
		};
		
		// Sanitize names where we need to for PHP/JS
		props.name = props.title.replace( /\s+/g, '-' ).toLowerCase();
		// Development prefix (i.e. to prefix PHP function names, variables)
		props.prefix = props.prefix.replace('/[^a-z_]/i', '').replace('-', '_' ).toLowerCase();
		// Development prefix in all caps (e.g. for constants)
		props.prefix_caps = props.prefix.toUpperCase();
		// An additional value, safe to use as a JavaScript identifier.
		props.js_safe_name = props.name.replace(/[\W_]+/g, '_').replace(/^(\d)/, '_$1');
		// An additional value that won't conflict with NodeUnit unit tests.
		props.js_test_safe_name = props.js_safe_name === 'test' ? 'myTest' : props.js_safe_name;
		props.js_safe_name_caps = props.js_safe_name.toUpperCase();

		props.text_domain = props.prefix.replace( '_', '-' );

		// Files to copy and process
		var files = init.filesToCopy( props );

		
		console.log( files );
		
		// Actually copy and process files
		init.copyAndProcess( files, props );
		
		// Generate package.json file
		init.writePackageJSON( 'package.json', props );
		
		// Done!
		done();
	});
};
