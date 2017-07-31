var fs = require('fs');
var path = require('path');
var merge = require('merge-stream');
var gulp = require('gulp');
var gutil = require('gulp-util');
var notify = require('gulp-notify');
var bower = require('bower');
var concat = require('gulp-concat');
var sass = require('gulp-ruby-sass');
var autoPrefixer = require('gulp-autoprefixer');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var clean = require('gulp-clean');
var sh = require('shelljs');
var minifyCss = require('gulp-minify-css');

var paths = {
    bower: './bower_components',
    sass: [
        './app/assets/scss/**/*.scss',
        './app/assets/scss/*.scss'
    ],
    js: [
        './app/assets/js/**/*.js',
        './app/assets/js/*.js'
    ],
    assets_js: './app/assets/js',
    assets_css: './app/assets/css/*.css',
    css: './public/css',
    vendor: './public/vendor'
};

gulp.task('default', ['routes', 'css', 'vendor', 'icons', 'vendor-css', 'vendor-js', 'datamaps-js' ,'js', 'admin-vendor-js', 'admin-css']);

gulp.task('sass', function() {

    return sass('./app/assets/scss/', {
        style: 'compressed',
        loadPath: [
            paths.bower + '/bootstrap-sass-official/assets/stylesheets',
            paths.bower + '/font-awesome/scss'
        ]
    })
        .on('error', notify.onError(function (error) {
            return 'Error: ' + error.message;
        }))
        .pipe(autoPrefixer({
            browsers: ['last 2 version'],
            cascade: false
        }))
        .pipe(gulp.dest(paths.css));

});


gulp.task('css', ['sass', 'vendor-css', 'admin-css'], function () {

    var folders = getFolders(paths.css);

    var tasks = folders.map(function (folder) {
        return gulp.src(path.join(paths.css, folder, '/*.css'))
            .pipe(concat(folder + '.css'))
            .pipe(gulp.dest(paths.css));
    });

    var productionTasks = folders.map(function (folder) {
        return gulp.src(path.join(paths.css, folder, '/*.css'))
            .pipe(concat(folder + '.min.css'))
            .pipe(minifyCss({compatibility: 'ie8'}))
            .pipe(gulp.dest(paths.css));
    });

    return merge(tasks, productionTasks);

});

function getFolders(dir) {
    return fs.readdirSync(dir)
        .filter(function (file) {
            return fs.statSync(path.join(dir, file)).isDirectory();
        });
}

gulp.task('vendor', function() {
    gulp.src([
        paths.bower + '/**/*{.min.css,.png,.ico,.gif}'
    ])
        .pipe(gulp.dest(paths.vendor));
});

gulp.task('js', function() {

    // make a single concat'd file for production
    gulp.src([
        paths.assets_js + '/i18n/strings.en.js'
    ])
        .pipe(concat('frontend.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./public/js'));

    // make individual files for local/staging
    gulp.src(paths.js).pipe(gulp.dest('./public/js'));
});



gulp.task('routes', function() {
    sh.exec('php artisan routes:javascript --env=local');
    gulp.src('./routes.js')
        .pipe(clean())
        .pipe(uglify())
        .pipe(gulp.dest('./public/js'));
});

gulp.task('watch', ['default'], function() {
    gulp.watch(paths.assets_css, ['css']);
    gulp.watch(paths.sass, ['css']);
    gulp.watch(paths.js, ['js']);
});