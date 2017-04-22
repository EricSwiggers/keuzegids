module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    
    autoprefixer: {
            options: {
                //Set which browsers to prefix. See https://github.com/ai/browserslist for full list
                browsers: ['last 2 versions', 'ie 9', 'android 2.3', '> 5% in NL']
            },
            dist: {
                files: {
                   src: ["site/templates/styles/*.css"]
                },
            },
        },
    
    concat_css: {
    	options: {
                separator: "\n;"
    	},
    	all: {
      		src: ["site/templates/styles/*.css"],
      		dest: "site/templates/release/site.css"
    		},
  		},
    
    cssmin: {
  		target: {
    		files: [{
      			expand: true,
      			src: ['site/templates/release/site.css'],
      			ext: '.css'
    			}]
  			},
		},
				
		
	uglify: {
    	my_target: {
      		files: {
        		'site/templates/release/site.js': ['site/templates/scripts/jquery-1.12.1.min.js', 'site/templates/scripts/*.js'],
      		},
    	},
  	},
  	
  	watch: {
  		scripts: {
	    		files: ['site/templates/scripts/*.js'],
    			tasks: ['uglify'],
    			options: {
      				spawn: false,
    			},
  			},
  			
  		css: {
	  			files: ['site/templates/styles/*.css'],
    			tasks: ['concat_css'],
    			options: {
      				spawn: false,
    			},
  			},
  			
		},
  });

  // Load the plugin that provides the "uglify" task.
  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.loadNpmTasks('grunt-concat-css');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-watch');

  // Default task(s).
  grunt.registerTask('default', ['autoprefixer','concat_css','uglify','watch']);
  grunt.registerTask('build', ['autoprefixer','concat_css','cssmin', 'uglify']);

};