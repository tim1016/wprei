var gulp = require('gulp'),
    watch = require('gulp-watch'),
    browserSync = require('browser-sync').create(),
    settings = require('../settings');   
    
gulp.task('watch', function() {
   
   browserSync.init({
      server: {
      baseDir: "app"}
   });

  watch(settings.themeLocation + '**/*.php', function() {
    browserSync.reload();
  });

//  watch(settings.styleAssets + '**/*.css', function() {
//    gulp.start('cssInject');
//  });
  
//  watch(settings.scriptAssets + '**/*.js', function() {
//    gulp.start('scriptsRefresh');
//  });
  
  

}); 
/*
gulp.task('cssInject', ['styles'], function(){
   return gulp.src(settings.finalStyles)
   .pipe(browserSync.stream());
});

gulp.task('scriptsRefresh', ['scripts'],function(){
  browserSync.reload();
})

*/
