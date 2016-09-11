module.exports = function(gulp, plugins, publicDir, assetsDir) {
    return function() {
        gulp.src([
                assetsDir + 'scss/style.scss',
                'bower_components/Font-Awesome/css/font-awesome.min.css',
            ])
            .pipe(plugins.plumber())
            .pipe(plugins.sass())
            .pipe(plugins.concat('style.css'))
            .pipe(plugins.minifyCss())
            .pipe(gulp.dest(publicDir + 'css'));
    };
};
