/* Configuration Variables */

// Project Dependencies
var gulp = require('gulp'),
  gulpif = require('gulp-if'),
  postcss = require('gulp-postcss'),
  minifyCss = require('gulp-minify-css'),
  pkg = require('./package.json');

// Paths
var path = {
  css: "web/app/themes/nerdpress/css/style.css",
  dist: "web/app/themes/nerdpress/",
  watch: "web/app/themes/nerdpress/css/**/*"
}

// PostCSS Plugins
var processors = [
  require('postcss-import')(),
  require('postcss-custom-properties')(),
  require('postcss-calc')({
    precision: 10
  }),
  require('autoprefixer')()
]

// Build CSS
var css = function (options) {
  return gulp.src(options.src)
    .pipe(postcss(processors))
    .pipe(gulp.dest(options.dest))
    .pipe(gulpif(options.minify, minifyCss(options.minifyCss)))
    .pipe(gulpif(options.minify, gulp.dest(options.dest)))
}

console.log(path.css);

// create production build
gulp.task('dist', function () {
  css({
    src: path.css,
    minify: true,
    pkgname: false,
    minifyCss: {
      advanced: true,
      aggressiveMerging: true,
      benchmark: false,
      compatibility: '*',
      debug: false,
      keepBreaks: false,
      mediaMerging: true,
      roundingPrecision: 10,
      shorthandCompacting: false
    },
    dest: path.dist
  })
})

/* Server Tasks*/
// Watch Development Directory -- Reload Browser If LiveReload Is Enabled
gulp.task('watch', function () {
  gulp.watch(path.watch, ['dist'])
})

/* Default Task */
// Build Development Version, Watch It For Changes, Serve It, Open It In Web Browser
gulp.task('default', ['watch'])