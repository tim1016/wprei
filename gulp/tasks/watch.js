var gulp = require('gulp'),
    watch = require('gulp-watch'),
    browserSync = require('browser-sync').create(),
    settings = require('../settings');   
    
    gulp.task('watch', function() {
        browserSync.init({
          notify: false,
          proxy: settings.urlToPreview,
          ghostMode: false
        });
      
        gulp.watch(settings.themeLocation + '/*.php', function(){browserSync.reload();});
        gulp.watch(settings.themeLocation + '/css/*.css', function(){browserSync.reload();});
        gulp.watch([settings.themeLocation + '/js/modules/*.js', settings.themeLocation + '/js/*.js'], ['waitForScripts']);
        
    });

    gulp.task('waitForScripts', ['scripts'], function() {
        browserSync.reload();
    });
