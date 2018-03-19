'use strict';

var gulp 		= require('gulp'),
	config 		= require('../../config'), // Load Configs
	browsersync = require(	'browser-sync' ),
	reload     	= browsersync.reload;

/**
 * ***********************************
 * ****   BROWSER RELOAD TASKS   *****
 * ***********************************
 */


gulp.task('connect', function() {

	
	browsersync.init(config.options.server.watch , {

		// Read here http://www.browsersync.io/docs/options/
		proxy: config.options.server.localURL,

		ghostMode: {
		    clicks: false,
		    forms: false,
		    scroll: false
		},

		//Define a custom Port
		port: config.options.server.localPort,

		// Tunnel the Browsersync server through a random Public URL
		// tunnel: enableTunnel,

		// Attempt to use the URL "http://my-private-site.localtunnel.me"
		// tunnel: config.options.server.tunnelURL,

		// Inject CSS changes
		injectChanges: true

	});
});

