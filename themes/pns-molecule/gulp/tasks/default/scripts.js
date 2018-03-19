'use strict';

var gulp 		= require('gulp'),
	config 		= require('../../config'), // Load Configs

	// SCRIPTS
	uglify 			= require(	'gulp-uglify'),
	jshint 			= require(	'gulp-jshint'),
	jstylish 		= require(	'jshint-stylish'),
	sourcemaps 		= require(	'gulp-sourcemaps'),
	concat 			= require(	'gulp-concat'),

	// Gulp Utility Plugins
	clean 		= require(	'gulp-clean'),
	gutil 		= require(	'gulp-util' ),
	plumber 	= require(	'gulp-plumber' ),
	rename 		= require(	'gulp-rename'),
	notify		= require(	'gulp-notify'),
	filter		= require(	'gulp-filter'),

	// Browser Sync
	browserSync = require('browser-sync'),
	reload 		= browserSync.reload;

/**
 * **************************
 * ****   SCRIPT TASKS   ****
 * **************************
 */

 	/**
 	 * Task handlers for our JS Files
 	 */
	

 	//
	// Bundle All Scripts that are to be concatenated and 
	// placed in the footer
	// 
	// @note runs automatically through 'default' task
	// 

	gulp.task('scripts::bundle', function(){

		return gulp.src( config.paths.scripts.bundle )

			.pipe(jshint())

			.pipe(jshint.reporter('jshint-stylish'))

			//Handle Errors with Plumber & gulp-util
			.pipe(plumber(function(error) {

			    gutil.log(gutil.colors.red(error.message));
			    this.emit('end');

			}))

			// Concatenate all files into one bundled file
			.pipe(concat('core.js'))

			//rename the file and add defined suffix
			.pipe(rename({suffix:'.bundle.min'}))

			//minify the file
			.pipe(uglify())

			//Place the file in its final destination
			.pipe(gulp.dest( config.paths.scripts.dest ))

			// notify upon success
			.pipe(notify({ message: 'Scripts compiled!', onLast: true }));

	});

	//
	// Minify and output Isotope to handle Live sorting grids
	// 
	// We handle it separately because it doesn;t load globally,
	// it loads conditionally, therefor it is NOT part of our bundle.
	// 
	// @note runs automatically through 'default' task
	// 

	gulp.task('scripts::isotope', function(){

		return gulp.src( config.paths.scripts.isotope )

			//Handle Errors with Plumber & gulp-util
			.pipe(plumber(function(error) {
			    gutil.log(gutil.colors.red(error.message));
			    this.emit('end');

			}))

			// Concatenate all files into one bundled file
			.pipe(concat('pns-isotope.js'))

			//rename the file
			.pipe(rename({suffix:'.min'}))

			//minify the file
			.pipe(uglify())

			//Place the file in its final destination
			.pipe(gulp.dest( config.paths.scripts.dest ))

	});


	//
	// Minify and output Lightcase Scripts to handle our lightboxes
	// 
	// We handle it separately because it doesn;t load globally,
	// it loads conditionally, therefor it is NOT part of our bundle.
	// 
	// @note runs automatically through 'default' task
	// 

	gulp.task('scripts::lightcase', function(){

		return gulp.src( config.paths.scripts.lightcase )

			//Handle Errors with Plumber & gulp-util
			.pipe(plumber(function(error) {
			    gutil.log(gutil.colors.red(error.message));
			    this.emit('end');

			}))

			// Concatenate all files into one bundled file
			.pipe(concat('pns-lightcase.js'))

			//rename the file
			.pipe(rename({suffix:'.min'}))

			//minify the file
			.pipe(uglify())

			//Place the file in its final destination
			.pipe(gulp.dest( config.paths.scripts.dest ))

	});



	//
	// Minify and output HTML5 Shiv in dist/js/
	// 
	// We handle it separately because it doesn;t load globally,
	// it loads conditionally, therefor it is NOT part of our bundle.
	// 
	// @note runs automatically through 'default' task
	// 

	gulp.task('scripts::shiv', function(){

		gulp.src( config.paths.scripts.shiv )

			//Handle Errors with Plumber & gulp-util
			.pipe(plumber(function(error) {
			    gutil.log(gutil.colors.red(error.message));
			    this.emit('end');

			}))

			//rename the file
			.pipe(rename({suffix:'.min'}))

			//minify the file
			.pipe(uglify())

			//Place the file in its final destination
			.pipe(gulp.dest( config.paths.scripts.dest ))

	});

