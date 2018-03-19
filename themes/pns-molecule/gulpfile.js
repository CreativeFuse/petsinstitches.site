'use strict';

/**
 * **************************
 * REQUIRE GULP DEPENDEPNCIES
 * **************************
 */

var gulp 			= require(	'gulp' ),
	config          = require(	'./gulp/config.js' ),
	requireDir      = require(	'require-dir' ),
	browsersync 	= require(	'browser-sync' ),
	reload     		= browsersync.reload;

/**
 * Automagically load all of our Gulp taks
 * within our defined filesystem
 */
requireDir('./gulp/tasks', { recurse: true });



/**
 * gulp
 * 
 * Define DEFAULT tasks to run on "gulp"
 */

gulp.task( 'default', [

		'styles::compile',
		'scripts::bundle',
		'scripts::isotope',
		'scripts::lightcase',
		'scripts::shiv',
		'svg::sprite',
		'svg::individual',
		'connect',
		'watch'

	], function() {

});


/**
 * gulp prod
 * 
 * Define productions tasks to 
 * run on "prod" to prep files
 * for a production environmemnt
 */

gulp.task( 'prod', [

		'styles::production'

	], function(){

});

