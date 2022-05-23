const gulp = require('gulp');
const webp = require('gulp-webp');

gulp.task('default', () => {
  gulp.src('public/assets/images/png/*.png').pipe(webp()).pipe(gulp.dest('public/assets/images/'));
});
