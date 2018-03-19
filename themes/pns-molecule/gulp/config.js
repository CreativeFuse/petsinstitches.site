//
// Gulp Tasks
// 

module.exports = {

	/**
	 * Gulp Plugin Options
	 */

	options:{

		server:{

			localURL	: 'pns.dev',
			tunnelURL	: 'petsinstitches',
			localPort	: 3000,
			watch		: [

							'**/*.php',
							'**/*.{png,jpg,gif}',
							'**/*.js'
			]

		}

	},

	// Define paths for our build

	paths:{


		task:{

			dir 	: './gulp/tasks/',

			base 	: './gulp/tasks/base/',
			default	: './gulp/tasks/default/',
			build	: './gulp/tasks/build/',

			// Base Tasks
			clean 	: './gulp/tasks/base/clean.js',
			connect	: './gulp/tasks/base/connect.js',
			watch	: './gulp/tasks/base/watch.js',


			// Default Tasks
			styles	: './gulp/tasks/default/styles.js',
			scripts	: './gulp/tasks/default/scripts.js',
			svg		: './gulp/tasks/default/svg.js',

			// Build Tasks

		},


		project:{

			src		: 'framework/assets/src/',
			dest	: 'framework/assets/dist/',
			bower	: 'bower_components/',
			node	: 'node_modules/',

		},


		/**
		 * Script Files
		 */

		scripts:{

			src		: 	'framework/assets/src/js/',
			dest	: 	'framework/assets/dist/js/',
			node	: 	'node_modules',
			bower	: 	'bower_components',


			//
			// The scriptsBundle handles any JS that we add a .bundle suffix to in our src/js/
			// These scripts will always load globally and are concatenated into one file.
			// 

			bundle	:  [


				'framework/assets/src/js/**/*.bundle.js'
				
			],


			//
			// Add additional scripts below that are  intentionally NOT to be
			// included in our bundle, because we want to be able to precisely
			// control how and when wordpress is loading them :))
			// 
			// The CSS Associated with these scripts is loaded via appropriately
			// name SCSS _partials.
			// 

			shiv:[

				'framework/assets/src/js/html5shiv.js',
			],

			isotope : [

				'bower_components/isotope/dist/isotope.pkgd.js',
				'framework/assets/src/js/isotope-init.js',
			],


			lightcase : [

				'framework/assets/src/js/pns-lightcase.js',
				'framework/assets/src/js/pns-lightcase-init.js',
			],

			// Scripts to ignore

			scriptsIgnore: 'framework/assets/src/js/**/*.min.js',

		},

		/**
		 * Style Files
		 */
	
		styles:{

			src			: 'framework/assets/src/scss/main.scss',
			dest		: './',
			destRoot	: './',
			filter		: [

							'**/*.css'

			],
			
			all				: 'framework/assets/src/scss/**/*.scss',
			scssFile		: 'main.scss',
			cssFile			: 'style.css'



		},


		svg:{

			src			: 'framework/assets/src/svgs/',
			srcSprite	: 'framework/assets/src/svgs/build/',
			dest		: 'framework/assets/dist/svgs/',

			all			: 'framework/assets/src/svgs/**/*.svg',
			individual	: 'framework/assets/src/svgs/*.svg',
			sprite		: 'framework/assets/src/svgs/build/**/*.svg',
			spriteName	: 'icons.svg'

		},

		img:{

			src		: 'framework/assets/src/imgs/',
			dest	: 'framework/assets/dist/imgs/',
			all		: 'framework/assets/src/imgs/**/*.{jpg,gif,png}'

		},


		fonts: {

			src		: 'framework/assets/src/fonts/',
			dest	: 'framework/assets/dist/fonts/',
			all		: 'framework/assets/src/fonts/**/*.{ttf,otf}'
			
		} 

	}

};