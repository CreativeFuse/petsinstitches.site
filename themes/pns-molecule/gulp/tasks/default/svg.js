'use strict';

var gulp 		= require('gulp'),
	config 		= require('../../config'), // Load Configs

	// SVG
	svgmin 		= require(	'gulp-svgmin'),
	svgstore 	= require(	'gulp-svgstore'),

	// Gulp Utility Plugins
	clean 		= require(	'gulp-clean'),
	gutil 		= require(	'gulp-util' ),
	plumber 	= require(	'gulp-plumber' ),
	rename 		= require(	'gulp-rename'),

	// Browser Sync
	browsersync 	= require(	'browser-sync' ),
	reload     		= browsersync.reload;

	
/**
 * ***********************************
 * *******   	SVG  TASKS 	  ********
 * ***********************************
 */
	
 	// @ref https://medium.com/front-end-developers/icons-with-svg-s-minified-and-layered-using-gulp-cc023bdd7c50
 	// @ref http://mattsoria.com/killersvgworkflow/

	gulp.task('svg::sprite', function() {

		return gulp.src( config.paths.svg.sprite )

		 .pipe(svgmin())
		 .pipe(svgstore())
		 .pipe(rename( config.paths.svg.spriteName ))
		 .pipe(gulp.dest( config.paths.svg.dest ));

	});


	gulp.task('svg::individual', function() {

		return gulp.src( config.paths.svg.individual )

		 .pipe(svgmin())
		 .pipe(gulp.dest( config.paths.svg.dest ));

	});

