js_files = {
    '../src/Assets/script.js': [
        'node_modules/jquery/dist/jquery.js',
        'node_modules/uikit/dist/js/uikit.js',
        'node_modules/uikit/dist/js/uikit-icons.js',
        'node_modules/tinymce/tinymce.js',
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
                    { expand: true, cwd: 'bower_components/tinymce', src: '**/*', dest: '../src/Assets/tinymce/' }
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
