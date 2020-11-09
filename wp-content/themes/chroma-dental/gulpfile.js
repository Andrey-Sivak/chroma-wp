const gulp = require('gulp');
const sass = require('gulp-sass');
const concat = require('gulp-concat');
const del = require('del');
const browserSync = require('browser-sync').create();
const imagemin = require('gulp-imagemin');
const webpack = require('webpack-stream');
const rename = require('gulp-rename');
const autoprefixer = require('autoprefixer');
const sourcemaps = require('gulp-sourcemaps');
const postcss = require('gulp-postcss');
const replace = require('gulp-replace');

let isDev = true;
let isProd = !isDev;

let webpackConfig = {
	output: {
		filename: 'main.js'
	},
	module: {
		rules: [
			{
				test: /\.js$/,
				loader: 'babel-loader',
				exclude: '/node_modules/' //исключения
			}
		]
	},
	mode: isDev ? 'development' : 'production'
};

function fonts() {
	return gulp.src('./assets/fonts/*')
		.pipe(gulp.dest('./dist/fonts'));
}

function scss() {
	return gulp.src('./assets/sass/**/*.scss')
		.pipe(sass.sync().on('error', sass.logError))
		.pipe(postcss([ autoprefixer() ]))
		.pipe(gulp.dest('assets/css'));
}

function styles() {
	return gulp.src('assets/css/*.css')
		.pipe(rename({ suffix: '.min' }))
		.pipe(replace(/([../]{3,})/g, '../'))
		.pipe(gulp.dest('./dist/css'))
		.pipe(browserSync.stream());
}

function scripts() {
	return gulp.src('assets/js/main.js')
		.pipe(webpack(webpackConfig))
		.pipe(gulp.dest('dist/js'))
		.pipe(browserSync.stream());
}

function libs() {
	return gulp.src('assets/libs/*')
		.pipe(gulp.dest('dist/libs'));
}

function img() {
	return gulp.src('./assets/img/**/**/**/*')
		/*.pipe(imagemin([
	    imagemin.gifsicle({interlaced: true}),
	    imagemin.mozjpeg({progressive: true}),
	    imagemin.optipng({optimizationLevel: 5})
		]))*/
		.pipe(gulp.dest('./dist/img'))
}

function svg() {
	return gulp.src('assets/img/*.svg')
		.pipe(gulp.dest('dist/img'));
}

function watch() {
	browserSync.init({
    server: {
      baseDir: './'
    }//,
    //proxy: 'test',
    //tunnel: true
  });
	gulp.watch('./assets/sass/**/*.scss', gulp.series( scss, styles ));
	gulp.watch('./assets/js/**/*.js', scripts);
	gulp.watch('./*.html', html);
}	

function clean() {
	return del(['dist/*']);
}

function html() {
	return gulp.src('*.html')
		.pipe(browserSync.stream());
}

// gulp.task('style', gulp.series( scss, styles ));
gulp.task('watch', watch);

gulp.task('img', img);
gulp.task('fonts', fonts);

let build = gulp.series(clean,
	gulp.parallel(gulp.series( scss, styles ), libs, scripts, img, svg, /*html,*/ fonts)
);

gulp.task('build', build);
gulp.task('dev', gulp.series('build', 'watch'));
