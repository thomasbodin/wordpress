var gulp = require('gulp'),
    sass = require('gulp-sass'),
    sassimport = require('gulp-sass-bulk-import'),
    scsslint = require('gulp-scsslint'),
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


var theme = 'wp-content/themes/__projectName__/';

var plumberErrorHandler = { errorHandler: notify.onError({
    title: 'Gulp',
    message: 'Error: <%= error.message %>'
})};

gulp.task('style', function () {
    return gulp.src([theme + 'style/src/**/*.scss', '!' + theme + 'style/src/vendor/bootstrap/**/*.scss'], {sourcemap: true})
        .pipe(scsslint('scsslint.yml'))
        .pipe(scsslint.reporter())
        .pipe(sassimport())
        .pipe(plumber(plumberErrorHandler))
        .pipe(sourcemaps.init())
        .pipe(sass({
            includePaths: [theme + 'style/src/']
        }).on('error', sass.logError))
        .pipe(autoprefixer({
            browsers: ['last 2 versions', 'ie 8', 'ie 9'],
            cascade: false
        }))
        .pipe(csso())
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(theme + 'style/build/'));
});

gulp.task('script', function () {
    return gulp.src(theme + 'script/src/**/*.js')
        .pipe(plumber(plumberErrorHandler))
        .pipe(jshint('.jshintrc', {fail: true}))
        .pipe(jshint.reporter(stylish))
        .pipe(sourcemaps.init())
        .pipe(concat('main.js'))
        .pipe(uglify())
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(theme + 'script/build/'));
});


gulp.task('img', function () {
    return gulp.src(theme + 'assets/img/src/*')
        .pipe(plumber(plumberErrorHandler))
        .pipe(imagemin({
            progressive: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()]
        }))
        .pipe(gulp.dest(theme + 'assets/img/'));
});


gulp.task('copy', function () {
    gulp.src('node_modules/bootstrap/dist/js/bootstrap.min.js')
        .pipe(gulp.dest(theme + 'js/build/'));

    gulp.src('node_modules/font-awesome/fonts/*')
        .pipe(gulp.dest(theme + 'assets/fonts/font-awesome/'));

    gulp.src('node_modules/jquery/dist/jquery.min.js')
        .pipe(gulp.dest(theme + 'js/build/'));

    gulp.src('node_modules/html5shiv/dist/html5shiv.min.js')
        .pipe(gulp.dest(theme + 'js/build/'));

    gulp.src('node_modules/respond.js/dest/respond.min.js')
        .pipe(gulp.dest(theme + 'js/build/'));
});


gulp.task('default', ['style', 'script', 'img', 'copy']);


gulp.task('watch', function () {
    gulp.watch(
        theme + 'style/src/**/*.scss', ['style']
    ).on('change', function(event){
        console.log('Le fichier ' + event.path + ' a ete modifie.');
    });

    gulp.watch(
        theme + 'script/src/**/*.js', ['script']
    ).on('change', function(event){
        console.log('Le fichier ' + event.path + ' a ete modifie.');
    }).on('error', notify.onError(function (error) {
        return error.message;
    }));

    gulp.watch(
        theme + 'assets/img/src/*.{png,jpg,gif}', ['img']
    ).on('change', function(event){
        console.log('L\'image ' + event.path + ' a ete ajoute/modifie.');
    });
});
