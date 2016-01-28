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
                  '../webroot/css/app.min.css': [
                      'css/theme.css',
                      'css/fx.css'
                  ]
              }
            },
            vendor:{

                files: {
                    '../webroot/css/vendor.min.css': [
                        'theme_assets/bs3/css/bootstrap.min.css',
                        'theme_assets/css/bootstrap-reset.css',
                        'theme_assets/font-awesome/css/font-awesome.css',
                        'theme_assets/3xw/css/fixes.css',
                        'theme_assets/css/style.css',
                        'theme_assets/css/style-responsive.css',
                        'css/tags/bootstrap-tagsinput.css'
                    ]
                }
            }
        },

        // JS
        uglify: {

            prod: {
                options: {
                    mangle: false
                },
                files: {
                  '../webroot/js/app.min.js': [
                      'js/app.js'
                  ],
                  '../webroot/js/attachment/core.min.js': [
                    'js/attachment/boostrap-modal-lock.js',
                    'js/attachment/better.js',
                    'js/attachment/attachment-upload-many-service.js',
                    'js/attachment/attachment-embed-service.js',
                    'js/attachment/attachment-choose-many-service.js',
                  ],
                  '../webroot/js/attachment/add.min.js': [
                    'js/attachment/attachment-add.js',
                  ],
                  '../webroot/js/attachment/index.min.js': [
                    'js/attachment/attachment-index.js',
                  ],
                  '../webroot/js/attachment/edit.min.js': [
                    'js/attachment/attachment-edit.js',
                  ]
                }
            },

            dev: {
                options: {
                    beautify: true,
                    mangle: false
                },
                files: {
                  '../webroot/js/app.min.js': [
                      'js/app.js'
                  ],
                  '../webroot/js/attachment/core.min.js': [
                    'js/attachment/boostrap-modal-lock.js',
                    'js/attachment/better.js',
                    'js/attachment/attachment-upload-many-service.js',
                    'js/attachment/attachment-embed-service.js',
                    'js/attachment/attachment-choose-many-service.js',
                  ],
                  '../webroot/js/attachment/add.min.js': [
                    'js/attachment/attachment-add.js',
                  ],
                  '../webroot/js/attachment/index.min.js': [
                    'js/attachment/attachment-index.js',
                  ],
                  '../webroot/js/attachment/edit.min.js': [
                    'js/attachment/attachment-edit.js',
                  ]
                }
            },

            vendor: {
                files: {
                    '../webroot/js/vendor.min.js': [
                        'theme_assets/js/jquery.js',
                        'theme_assets/js/jquery-ui/jquery-ui-1.10.1.custom.min.js',
                        'theme_assets/bs3/js/bootstrap.min.js',
                        'theme_assets/js/jquery.dcjqaccordion.2.7.js',
                        'theme_assets/js/jquery.scrollTo.min.js',
                        'theme_assets/js/jquery.nicescroll.js',
                        'theme_assets/js/scripts.js'
                    ],
                    '../webroot/js/angular/angular.1.2.20.min.js': [
                      'js/angular/angular.1.2.20.min.js',
                    ],
                    '../webroot/js/tags/core.min.js': [
                      'js/tags/bootstrap-tagsinput.js',
                      'js/tags/bootstrap-tagsinput-angular.js',
                    ]
                }
            }
        },

        // WATCH AND RUN TASKS
        watch: {
            scripts: {
                files: [
                  'js/**/**/*.js',
                  'js/**/*.js',
                  'js/*.js'
                ],
                tasks: ['uglify:dev'],
                options: {
                    nospawn: true
                }
            },
            css: {
                files: [
                  'css/**/**/*.css',
                  'css/**/*.css',
                  'css/*.css'
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
    grunt.registerTask('prod', ['cssmin:vendor', 'uglify:vendor','uglify:prod','cssmin:dev']);
}
