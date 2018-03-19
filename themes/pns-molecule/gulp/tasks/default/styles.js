'use strict';

var gulp 		= require('gulp'),
	config 		= require('../../config'), // Load Configs

	// SASS
	sass 		= require(	'gulp-sass' ),
	autoprefix 	= require(	'gulp-autoprefixer'),
	sourcemaps 	= require(	'gulp-sourcemaps'),
	cleanCSS	= require(	'gulp-cleancss'),

	// Gulp Utility Plugins
	clean 		= require(	'gulp-clean'),
	gutil 		= require(	'gulp-util' ),
	plumber 	= require(	'gulp-plumber' ),
	rename 		= require(	'gulp-rename'),
	notify		= require(	'gulp-notify'),
	filter		= require(	'gulp-filter'),

	// Browser Sync
	browsersync = require('browser-sync'),
	reload 		= browsersync.reload;
/**
 * **************************
 * ****   SASS TASKS   *****
 * **************************
 */

/**
* 
* Task Handlers for SASS & CSS Files
* 
*/


	// 
	// Compile Sass & Generate Sourcemaps
	// @returns Non-minified CSS with sourcemap
	// 
	// @note runs automatically through 'default' task
	// 

	gulp.task('styles::compile', function(){

		return gulp.src( config.paths.styles.src )

				// Initialize Sourcemaps
				.pipe(sourcemaps.init())

				// Handle Errors with Plumber & gulp-util
				.pipe(plumber(function(error) {
				    gutil.log(gutil.colors.red(error.message));
				    this.emit('end');
				}))

				// Log Errors
				.pipe(sass().on('error', sass.logError))

				//rename the file
				.pipe( rename( config.paths.styles.cssFile ) )

				// Write the sourcemap
				.pipe(sourcemaps.write( config.paths.styles.destRoot ))

				// Output to final destination
				.pipe(gulp.dest( config.paths.styles.dest ))

				// the follwing filter lets through only files with a *.css extension
				.pipe(filter( config.paths.styles.filter ))

				// Inject Styles Live
				.pipe(reload({stream:true}))

				//notify upon success
				.pipe(notify({ message: 'SASS compiled!', onLast: true }))

	});

