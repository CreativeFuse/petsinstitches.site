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
// 
// Minify CSS in prep for production
// @returns minfied CSS without sourcemap
// 
// @note called MANUALLY before committing to master
// 

gulp.task('styles::production',['styles::compile'], function(){

	return gulp.src( config.paths.styles.dest + config.paths.styles.cssFile )

		//Handle Errors with Plumber & gulp-util
		.pipe(plumber(function(error) {
		    gutil.log(gutil.colors.red(error.message));
		    this.emit('end');
		}))

	    //Minify the current CSS FIle
	    .pipe(cleanCSS())

		//Run Autoprefixer
		.pipe(autoprefix('last 3 versions'))

	    //Output the final file
	    .pipe(gulp.dest( config.paths.styles.dest ))

	    //notify upon success
		.pipe(notify({ message: 'Production Stylesheet Minified!', onLast: true }));

});

