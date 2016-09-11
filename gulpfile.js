var gulp = require('gulp'),
    plugins = require('gulp-load-plugins')(),
    publicDir = 'web/assets/',
    assetsDir = 'assets/',
    theme, taskName, themePublicDir, themeAssetDir,
    themes = ['default', 'backend'],
    defaultTasks = [];

for (var i = 0; i < themes.length; i++) {
    theme = themes[i];
    taskName = theme + '-theme';
    themePublicDir = publicDir + theme + '/';
    themeAssetDir = assetsDir + theme + '/';
    defaultTasks.push(taskName);

    gulp.task(taskName + ':styles', require('./gulp-tasks/' + theme + '/styles')(gulp, plugins, themePublicDir, themeAssetDir));
    gulp.task(taskName + ':scripts', require('./gulp-tasks/' + theme + '/scripts')(gulp, plugins, themePublicDir, themeAssetDir));
    gulp.task(taskName + ':copy', require('./gulp-tasks/' + theme + '/copy')(gulp, plugins, themePublicDir, themeAssetDir));
    gulp.task(taskName, [taskName + ':styles', taskName + ':scripts', taskName + ':copy']);

    gulp.watch([themeAssetDir + '/**/*.{sass,scss}', themeAssetDir + '/**/*.css'], [taskName + ':styles']);
    gulp.watch([themeAssetDir + '/**/*.js'], [taskName + ':scripts']);
}

gulp.task('default', defaultTasks, function() {});
