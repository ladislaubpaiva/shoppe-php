import { task, src, dest } from 'gulp';
import webp from 'gulp-webp';

task('default', () => {
  src('public/assets/images/png/*.png').pipe(webp()).pipe(dest('public/assets/images/'));
});
