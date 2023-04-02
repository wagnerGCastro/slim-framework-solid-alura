var gulp = require('gulp');
var phpcs = require('gulp-phpcs');


gulp.task('phpcs', function () {
  return gulp.src([
    'public/index.php',
    'src/app/*.php',
    'src/config/*.php',
    'src/routes/*.php',
    '!src/database/*.php',
    '!src/index.php',
    '!vendor/**/*.*',
    '!node_modules/**/*.*'
  ])

  // Validate files using PHP Code Sniffer
    .pipe(phpcs({
       bin: 'vendor/bin/phpcs',
      // standard: 'phpcs.xml',
      standard: 'PSR12',
      encoding: 'utf-8',
      warningSeverity: 0,
      // showSniffCode: 1,
      colors: 1
  }))

  // Log all problems that was found
    .pipe(phpcs.reporter('log'))
    .pipe(phpcs.reporter('file', { path: "code_sniffer_error.txt" }));
  });


// Sass CSS e JS: Executa tudo em tempo real quando há alteração nos arquivos  em development
gulp.task('watch', gulp.series( function() {
  gulp.watch([
    'public/index.php',
    'src/app/*.php',
    'src/config/*.php',
    'src/routes/*.php'
  ], gulp.parallel( ['phpcs']));
}));


/**
* Defautl:
*
* 1 - Executar sempre quando há alterações em arquivos .php
*
*/
gulp.task('default', gulp.series( ['watch'] ));
