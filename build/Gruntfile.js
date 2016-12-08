js_files = {
    '../src/Assets/script.js': [
        'bower_components/jquery/dist/jquery.js',
        'bower_components/uikit/js/uikit.js',
        'bower_components/uikit/js/components/datepicker.js',
        'bower_components/uikit/js/components/htmleditor.js',
        'bower_components/uikit/js/components/sortable.js',
        'bower_components/codemirror/lib/codemirror.js',
        './js/**/*.js'
    ]
};

module.exports = function(grunt) {
    grunt.initConfig({

        less: {
            main: {
                options: {
                    compress: true,
                },
                files: {
                    "../src/Assets/style.css": "less/main.less"
                }
            }
        },

        uglify: {
            main: {
                options: {
                    mangle: true,
                    compress: true,
                    sourceMap: false
                },
                files: js_files
            }
        },

        copy: {
            main: {
                files: [
                    { expand: true, cwd: 'bower_components/uikit/fonts', src: '*',
                        dest: '../src/Assets/fonts/' }
                ]
            }
        },

        watch: {
            less: {
                files: [ 'less/**/*.less' ],
                tasks: [ 'less' ],
                options: { livereload: false }
            },
            css: {
                files: [ '../_/**/*.css' ],
                tasks: [ ],
                options: { livereload: true }
            },
            js: {
                files: [ 'js/**/*.js' ],
                tasks: [ 'uglify:main' ],
                options: { livereload: true }
            },
            templates: {
                files: [ '../httpdocs/App/Views/**/*' ],
                options: { livereload: true }
            }
        }

    });

    // Plugin loading
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-copy');

    // Task definition
    grunt.registerTask('default', [ 'copy', 'main', 'watch' ]);
    grunt.registerTask('main', [ 'less:main', 'uglify:main' ]);

};
