var gulp = require('gulp'),
    less = require('gulp-less'),
    path = require('path'),
    csso = require('gulp-csso'),
    autoprefixer = require('gulp-autoprefixer'),
    concat = require('gulp-concat'),
    sourcemaps = require('gulp-sourcemaps'),
    jshint = require('gulp-jshint'),
    stylish = require('jshint-stylish'),
    uglify = require('gulp-uglify'),
    imagemin = require('gulp-imagemin'),
    pngquant = require('imagemin-pngquant'),
    notify = require('gulp-notify'),
    plumber = require('gulp-plumber');


var assets = 'wp-content/themes/__projectName__/assets/';

var plumberErrorHandler = { errorHandler: notify.onError({
    title: 'Gulp',
    message: 'Error: <%= error.message %>'
})};


gulp.task('css', function () {
    return gulp.src(assets + 'css/src/main.less')
        .pipe(plumber(plumberErrorHandler))
        .pipe(less({
            paths: [ path.join(__dirname, 'less', 'includes') ]
        }))
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(csso())
        .pipe(gulp.dest(assets + 'css/build/'));
});


gulp.task('js', function () {
    return gulp.src(assets + 'js/src/**/*.js')
        .pipe(plumber(plumberErrorHandler))
        .pipe(jshint('.jshintrc', {fail: true}))
        .pipe(jshint.reporter(stylish))
        .pipe(sourcemaps.init())
        .pipe(concat('main.js'))
        .pipe(uglify())
        .pipe(sourcemaps.write('maps'))
        .pipe(gulp.dest(assets + 'js/build/'));
});


gulp.task('img', function () {
    return gulp.src(assets + 'img/src/*')
        .pipe(plumber(plumberErrorHandler))
        .pipe(imagemin({
            progressive: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()]
        }))
        .pipe(gulp.dest(assets + 'img/'));
});


gulp.task('copy', function () {
    gulp.src('node_modules/bootstrap/dist/css/bootstrap.css')
        .pipe(gulp.dest(assets + 'css/src/vendors/'));

    gulp.src('node_modules/font-awesome/fonts/*')
        .pipe(gulp.dest(assets + 'fonts/font-awesome/'));

    gulp.src('node_modules/jquery/dist/jquery.min.js')
        .pipe(gulp.dest(assets + 'js/build/'));

    gulp.src('node_modules/html5shiv/dist/html5shiv.min.js')
        .pipe(gulp.dest(assets + 'js/build/'));

    gulp.src('node_modules/respond.js/dest/respond.min.js')
        .pipe(gulp.dest(assets + 'js/build/'));
});


gulp.task('default', ['css', 'js', 'img', 'copy']);


gulp.task('watch', function () {
    gulp.watch(
        assets + 'css/src/**/*.less', ['css']
    ).on('change', function(event){
        console.log('Le fichier ' + event.path + ' a ete modifie.');
    });

    gulp.watch(
        assets + 'js/src/**/*.js', ['js']
    ).on('change', function(event){
        console.log('Le fichier ' + event.path + ' a ete modifie.');
    }).on('error', notify.onError(function (error) {
        return error.message;
    }));

    gulp.watch(
        assets + 'img/src/*.{png,jpg,gif}', ['img']
    ).on('change', function(event){
        console.log('L\'image ' + event.path + ' a ete ajoute/modifie.');
    });
});
