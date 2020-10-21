var gulp = require('gulp');
var gutil = require( 'gulp-util' );
var ftp = require( 'vinyl-ftp' );
var sftp = require('gulp-sftp');
var using = require('gulp-using');
var watch = require('gulp-watch');
var sass = require('gulp-sass');
var pipeErrorStop = require("pipe-error-stop");
var autoprefixer  = require('gulp-autoprefixer'),
		notify        = require("gulp-notify"),
		browserSync   = require('browser-sync'),
		browserSync2   = require('browser-sync').create(),
    cleancss      = require('gulp-clean-css');

var sourcemaps = require('gulp-sourcemaps');

const imageminFull = require('imagemin');
const imageminWebp = require('imagemin-webp');

const webp = require('gulp-webp');
var dwebp = require('dwebp-bin');

var cache = require('gulp-cache');
var imagemin = require('gulp-imagemin');
var imageminPngquant = require('imagemin-pngquant');
var imageminZopfli = require('imagemin-zopfli');
var imageminMozjpeg = require('imagemin-mozjpeg'); //need to run 'brew install libpng'
var imageminGiflossy = require('imagemin-giflossy');

const babel = require('gulp-babel');
var react = require('gulp-react');
var ftp = require( 'vinyl-ftp' );



gulp.task('browser-sync', function() {
	browserSync.init({
		proxy: "185.233.119.218",
        // files: 'index.html, *.css',
		port: 8082,
		online: true, // Work offline without internet connection
        https: true
		// tunnel: true, tunnel: 'projectname', // Demonstration page: http://projectname.localtunnel.me
	})
});


gulp.task('watchimages', function() {
	return watch('./public/img/**/*.{jpg,png}')
	.pipe(cache(imagemin([
            //png
            imageminPngquant({
                speed: 1,
                quality: 85 //lossy settings
            }),
            imageminZopfli({
                more: true
                // iterations: 50 // very slow but more effective
            }),
            //gif
            // imagemin.gifsicle({
            //     interlaced: true,
            //     optimizationLevel: 3
            // }),
            //gif very light lossy, use only one of gifsicle or Giflossy
            imageminGiflossy({
                optimizationLevel: 3,
                optimize: 3, //keep-empty: Preserve empty transparent frames
                lossy: 2
            }),
            //svg
            imagemin.svgo({
                plugins: [{
                    removeViewBox: false
                }]
            }),
            //jpg lossless
            imagemin.jpegtran({
                progressive: true
            }),
            //jpg very light lossy, use vs jpegtran
            imageminMozjpeg({
                quality: 85
            })
    ])))
	.pipe(gulp.dest('./public/minimg'))
// 	.pipe(webp({
//         quality: 85
//     }))
//     .pipe(gulp.dest('wp-content/themes/voxlink/webp'))
});


// gulp.task('minimages', function() {
// 	return gulp.src('./laravel/ezo/public/img/**/*.{jpg,png}')
// 	.pipe(cache(imagemin([
//             //png
//             imageminPngquant({
//                 speed: 1,
//                 quality: 85 //lossy settings
//             }),
//             imageminZopfli({
//                 more: true
//                 // iterations: 50 // very slow but more effective
//             }),
//             //gif
//             // imagemin.gifsicle({
//             //     interlaced: true,
//             //     optimizationLevel: 3
//             // }),
//             //gif very light lossy, use only one of gifsicle or Giflossy
//             imageminGiflossy({
//                 optimizationLevel: 3,
//                 optimize: 3, //keep-empty: Preserve empty transparent frames
//                 lossy: 2
//             }),
//             //svg
//             imagemin.svgo({
//                 plugins: [{
//                     removeViewBox: false
//                 }]
//             }),
//             //jpg lossless
//             imagemin.jpegtran({
//                 progressive: true
//             }),
//             //jpg very light lossy, use vs jpegtran
//             imageminMozjpeg({
//                 quality: 85
//             })
//     ])))
// 	.pipe(gulp.dest('./laravel/ezo/public/minimg'))
// // 	.pipe(webp({
// //         quality: 85
// //     }))
// //     .pipe(gulp.dest('wp-content/themes/voxlink/webp'))
// });


// gulp.task( 'deploy', function () {
 
//     var conn = ftp.create({
//         host:     'cm28913.tmweb.ru',
//         user:     'cm28913_user',
//         password: '771296771296',
//         log: gutil.log 
//     }); 
//     return watch(['./laravel/ezo/**/*.*','./laravel/ezo/**/.*.*',"!node_modules","!.c9"]) 
//         .pipe(conn.dest( '/public_html'))
 
// });

gulp.task( 'deploy2', function () {
 
    return watch(['app/*',"!node_modules","!.c9"]).pipe(sftp({
        host: '185.233.119.218',
        user: 'root',
        password: '5nG3cg9GYR3u',
        port: 2222,
        remotePath: '/var/www/hmh.expert/app'
    }));
 
});

gulp.task( 'deploy3', function () {
 
    return watch(['public/*',"!node_modules","!.c9"]).pipe(sftp({
        host: '185.233.119.218',
        user: 'root',
        password: '5nG3cg9GYR3u',
        port: 2222,
        remotePath: '/var/www/hmh.expert/public'
    }));
 
});

gulp.task( 'deploy4', function () {
 
    return watch(['resources/*',"!node_modules","!.c9"]).pipe(sftp({
        host: '185.233.119.218',
        user: 'root',
        password: '5nG3cg9GYR3u',
        port: 2222,
        remotePath: '/var/www/hmh.expert/resources'
    }));
 
});


gulp.task('watchstyles', function() {
	return watch('./**/*.scss')
	.pipe(sass({ outputStyle: 'expanded' }).on("error", notify.onError()))
	.pipe(autoprefixer(['last 15 versions']))
	.pipe(cleancss( {level: { 1: { specialComments: 0 } } })) // Opt., comment out when debugging
	.pipe(gulp.dest('./'))
	.pipe(browserSync.stream())
});


gulp.task('watch', ['watchimages', 'watchstyles']);
gulp.task('default', [/*'browser-sync',*/'watch', 'deploy2', 'deploy3', 'deploy4']);