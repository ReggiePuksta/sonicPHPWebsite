module.exports = function(grunt) {

    grunt.initConfig({
        browserSync: {
            bsFile: {
                "src": ['**/*.html', '**/*.js', '**/*.css', '**/*.php']
            },
            options: {
                port: 4000,
                "proxy": "127.0.0.1:80/sonic_fusion",
                ghostMode: {
                            clicks: true,
                            location: true,
                            forms: true,
                            scroll: true
                },
                notify: false,
                open: false
            }
        }

    });
    grunt.loadNpmTasks('grunt-browser-sync');
    grunt.registerTask('default', ['browserSync']);
};
