/**
 * grunt-init-sw4-template
 * http://shopware.de
 *
 * Copyright (c) 2013 "klarstil" Stephan Pohl, contributors
 * Licensed under the MIT license.
 */
module.exports = function (grunt) {
    "use strict";

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        less: {
            development: {
                files: {
                    "assets/styles/src/less.<%= pkg.name %>.css": "assets/styles/less/app.less"
                }
            },
            production: {
                options: {
                    yuicompress: true
                },
                files: {
                    "assets/styles/src/less.<%= pkg.name %>.css": "assets/styles/less/app.less"
                }
            }
        },

    
        cssmin : {
            combine : {
                files : {
                    "assets/styles/<%= pkg.name %>.css" : [ 'assets/styles/src/*.css' ]
                }
            }
        },

        concat: {
            options: {
                separator: ';'
            },
            dist: {
                src: [ 'assets/javascript/src/*.js', 'assets/javascript/components/**/*.js' ],
                dest: 'assets/javascript/jquery.<%= pkg.name %>.min.js'
            }
        },


        uglify: {
            options: {
               sourceMap: 'assets/javascript/jquery.<%= pkg.name %>.sourcemap.js',
                banner: '/*! <%= pkg.name %> <%= grunt.template.today("dd-mm-yyyy") %> */\n'
            },
            dist: {
                files: {
                    'assets/javascript/jquery.<%= pkg.name %>.min.js': [ 
                      //'<%= concat.dist.dest %>' 
                      'assets/jacascript/src/*.js'
                    ]
                }
            }
        },

        jshint: {
            files: [
                'Gruntfile.js',
                'assets/javascript/src/**/*.js'
            ],
            options: {
                // options here to override JSHint defaults
                globals: {
                    jQuery: true,
                    console: true,
                    module: true,
                    window: true,
                    document: true
                }
            }
        },

        'bower-install': {
            html: 'frontend/index/header.tpl'
        },



        watch: {
            files: [
                '<%= jshint.files %>',
                'assets/styles/src/*.css',
                'assets/styles/less/*.less',
                'assets/styles/less/effects/*.less'
            ],
            tasks: [ 'jshint', 'less:development', 'cssmin' ]
        }
    });

    // Common npm tasks
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-cssmin');

    // Bower npm tasks
    grunt.loadNpmTasks('grunt-bower-install-shopware');

    // Register custom tasks
    grunt.registerTask('default', [ 'jshint', 'less:production', 'cssmin', 'concat', 'uglify' ]);
    grunt.registerTask('build', [ 'jshint', 'less:production', 'cssmin', 'concat', 'uglify' ]);
};
