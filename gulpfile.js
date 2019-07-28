var gulp = require('gulp');
var sass = require('gulp-sass');
var watch = require('gulp-watch');
var uglify = require('gulp-uglify');
var pump = require('pump');

// task para o sass
gulp.task('sass', function() {
	return gulp.src('sass/**/*.scss')
		.pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
		.pipe(gulp.dest('css'));
});

// Task para o uglify
gulp.task('uglify', function (cb) {
	pump([
		gulp.src('scripts/*.js'),
		uglify(),
		gulp.dest('js')
	], cb);
});

// task para watch
gulp.task('watch', function(){
	gulp.watch('sass/**/*.scss', ['sass']);
	gulp.watch('scripts/*.js', ['uglify']);
});

// task default gulp
gulp.task('default', ['sass', 'uglify', 'watch']);
