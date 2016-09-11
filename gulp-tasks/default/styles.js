module.exports = function(gulp, plugins, publicDir, assetsDir) {
    return function() {
        var colors = [
            'default',
            'red',
            'blue',
            'green',
            'orange',
            'yellow',
            'brown',
            'cyan',
            'deep_orange',
            'indigo',
            'light_blue',
            'pink',
            'purple',
            'teal'
        ];

        for (var i = 0; i < colors.length; i++) {
            gulp.src([
                    assetsDir + 'scss/' + colors[i] + '.scss',
                    'bower_components/Font-Awesome/css/font-awesome.min.css',
                ])
                .pipe(plugins.plumber())
                .pipe(plugins.sass())
                .pipe(plugins.concat(colors[i] + '.css'))
                .pipe(plugins.minifyCss())
                .pipe(gulp.dest(publicDir + 'css'));
        }
    };
};
