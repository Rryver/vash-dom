const {src, dest, watch, parallel, series} = require('gulp');

const less = require('gulp-less');
const path = require('path');
const concat = require('gulp-concat');
const browserSync = require('browser-sync').create();
const uglify = require('gulp-uglify-es').default;
const autoprefixer = require('gulp-autoprefixer');
const imagemin = require('gulp-imagemin');
const del = require('del');

function browsersync() {
    browserSync.init({
        server: {
            baseDir: 'web/'
        }
    });
}

function cleanDist() {
    return del('dist')
}

function images() {
    return src('web/images/**/*')
        .pipe(imagemin(
            [
                imagemin.gifsicle({interlaced: true}),
                imagemin.mozjpeg({quality: 75, progressive: true}),
                imagemin.optipng({optimizationLevel: 5}),
                imagemin.svgo({
                    plugins: [
                        {removeViewBox: true},
                        {cleanupIDs: false}
                    ]
                })
            ]
        ))
        .pipe(dest('dist/images'))
}

function scripts() {
    return src([
        //'node_modules/jquery/dist/jquery.js',
        '/web/js/main.js',
        //'web/js/image-plugin.js',
    ])
        .pipe(concat('main.min.js'))
        .pipe(uglify())
        .pipe(dest('web/js'))
        .pipe(browserSync.stream())
}


function styles() {
    return src('less/style.less')
        .pipe(less())
        .pipe(autoprefixer({
            overrideBrowserslist: ['last 10 version'],
            grid: true
        }))
        .pipe(dest('../web/css'))
        //.pipe(browserSync.stream())
}

function build() {
    return src([
        'web/css/style.min.css',
        'web/fonts/**/*',
        //'web/js/main.min.js',
        //'web/*.html'
    ], {base: 'web'})
        .pipe(dest('dist'))
}

function watching() {
    watch(['less/**/*.less'], styles);
    //watch(['js/**/*.js', '!web/js/main.min.js'], scripts);
    //watch(['web/*.html']).on('change', browserSync.reload);
}

exports.styles = styles;
exports.watching = watching;
exports.browsersync = browsersync;
//exports.scripts = scripts;
exports.images = images;
exports.cleanDist = cleanDist;


exports.build = series(cleanDist, images, build);
exports.default = parallel(styles, watching);


