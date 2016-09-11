module.exports = function (gulp, plugins, publicDir, assetsDir) {
    return function () {
        gulp.src(assetsDir + 'img/*').pipe(gulp.dest(publicDir + 'img'));
        gulp.src(['bower_components/Font-Awesome/fonts/*']).pipe(gulp.dest(publicDir + 'fonts'));
        gulp.src(['bower_components/bootstrap/fonts/*']).pipe(gulp.dest(publicDir + 'fonts'));
    };
};