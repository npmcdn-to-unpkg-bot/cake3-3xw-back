module.exports = function (grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    // CSS
    cssmin: {
      dev:{
        options: {
          shorthandCompacting: false,
          roundingPrecision: -1
        },
        files: {
          'webroot/css/front.min.css': [
            'webroot/css/src/front.css'
          ],
          'webroot/css/admin.min.css': [
            'webroot/css/src/admin.css'
          ]
        }
      },
      vendor:{

        files: {
          'webroot/css/vendor.min.css': [
            'webroot/css/vendor/bootstrap/Supernice.css',
            'webroot/css/vendor/font-awesome/font-awesome.css',
            'webroot/css/src/vendor-fix.css',
          ]
        }
      }
    },

    // JS
    uglify: {

      dev: {
        options: {
          beautify: true,
          mangle: false
        },
        files: {
          'webroot/js/front.min.js': [
            'webroot/js/src/front.js'
          ],
          'webroot/js/admin.min.js': [
            'webroot/js/src/admin.js'
          ]
        }
      },

      vendor: {
        files: {
          'webroot/js/vendor.min.js': [
            'webroot/js/vendor/jquery/jquery-1.12.3.js',
            'webroot/js/vendor/bootstrap/bootstrap.js',
          ]
        }
      }
    },

    // WATCH AND RUN TASKS
    watch: {
      scripts: {
        files: [
          'webroot/js/src/**/*.js',
          //'webroot/js/**/*.js'
        ],
        tasks: ['uglify:dev'],
        options: {
          nospawn: true
        }
      },
      css: {
        files: [
          'webroot/css/src/**/*.css',
          //'webroot/css/**/*.css'
        ],
        tasks: ['cssmin:dev']
      }
    }
  });

  // tasks from npm
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');

  // our tasks
  grunt.registerTask('default', 'watch');
  grunt.registerTask('vendor', ['cssmin:vendor', 'uglify:vendor']);
  grunt.registerTask('dev', ['cssmin:vendor', 'uglify:vendor','uglify:dev','cssmin:dev']);
}
