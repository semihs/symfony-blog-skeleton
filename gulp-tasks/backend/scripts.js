module.exports = function (gulp, plugins, publicDir, assetsDir) {
    return function () {
        gulp.src([
            'bower_components/jquery/dist/jquery.min.js',
            'bower_components/tether/dist/js/tether.min.js',
            'bower_components/bootstrap/dist/js/bootstrap.min.js',
            'bower_components/speakingurl/speakingurl.min.js',
            assetsDir + 'js/script.js'
        ])
            .pipe(plugins.plumber())
            .pipe(plugins.concat('script.js'))
            .pipe(plugins.uglify())
            .pipe(gulp.dest(publicDir + 'js'));
    };
};