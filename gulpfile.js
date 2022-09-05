
const gulp = require('gulp');
const sass = require("gulp-sass")(require("sass"));
const browserSync = require('browser-sync');


// sassコンパイル
gulp.task('sass', (done) => {
    gulp.src("scss/style.scss")
        .pipe(sass({
            outputStyle: 'expanded'
        })
        )
        .on("error", sass.logError)
        .pipe(gulp.dest("css"));
    done();
});

// リロードするlocal
gulp.task('browser-sync', function () {
    browserSync({
        proxy: "samplephp.local",
        notify: false,                  // ブラウザ更新時に出てくる通知を非表示にする
        open: "external",
    });
});

// // リロード設定
gulp.task('browser-reload', (done) => {
    browserSync.reload();
    done();
});

// 監視ファイル
gulp.task('watch-files', (done) => {
    gulp.watch("header.php", gulp.task('browser-reload'));
    gulp.watch("front-page.php", gulp.task('browser-reload'));
    gulp.watch("index.php", gulp.task('browser-reload'));
    gulp.watch("footer.php", gulp.task('browser-reload'));
    gulp.watch("functions.php", gulp.task('browser-reload'));
    gulp.watch("404.php", gulp.task('browser-reload'));

    gulp.watch("css/style.css", gulp.task('browser-reload'));
    gulp.watch("scss/style.scss", gulp.task('sass'));
    gulp.watch("js/script.js", gulp.task('browser-reload'));
    done();
});

// タスク実行
gulp.task('default', gulp.series(gulp.parallel('watch-files', 'browser-sync', 'sass'), (done) => {
    done();
}));