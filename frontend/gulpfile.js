var gulp = require('gulp');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
const { series } = require('gulp');

function js (cb){
    return gulp.src([
        './node_modules/vue/dist/vue.js',
        './node_modules/http-vue-loader/src/httpVueLoader.js',
        './node_modules/vue-router/dist/vue-router.js',
    ])
        // .pipe(uglify())
        .pipe(concat('bundle.js'))
        .pipe(gulp.dest('./js'))
}

exports.build = series(js);