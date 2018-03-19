'use strict';

var gulp 		= require('gulp'),
	config 		= require('../../config'), // Load Configs
	browsersync = require(	'browser-sync' ),
	reload     	= browsersync.reload;

/**
 * **************************
 * ****   WATCH TASKS   *****
 * **************************
 */

/**
 * Global Watch Task
 */

	gulp.task( 'watch', function() {

		// 
		// Watch our Scripts Bundle for changes
		// @callback 'scripts::bundle' task
		// 

		gulp.watch( config.paths.scripts.bundle , ['scripts::bundle']);

		// 
		// Watch our Scripts Bundle for changes
		// @callback 'scripts::bundle' task
		// 

		gulp.watch( config.paths.scripts.isotope , ['scripts::isotope']);


		// 
		// Watch our Lightcase Scripts for changes
		// @callback 'scripts::lightcase' task
		// 

		gulp.watch( config.paths.scripts.lightcase , ['scripts::lightcase']);
		

		// 
		// Watch all of our .scss files
		// @callback 'styles::compile' task
		// 

		gulp.watch( config.paths.styles.all , ['styles::compile']);


		// 
		// Watch all of our svg sprite files
		// @callback 'svg::sprite' task
		// 

		gulp.watch( config.paths.svg.sprite, ['svg::sprite']);

		// 
		// Watch all of our individual svg files
		// @callback 'svg::individual' task
		// 

		gulp.watch( config.paths.svg.individual, ['svg::individual']);


	});
