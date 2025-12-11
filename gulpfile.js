import {src, dest, watch, series} from "gulp";
import * as dartSass from "sass";
import gulpSass from "gulp-sass";
import terser from "gulp-terser";
import sharp from "sharp";
import path from "path";
import fs from "fs";
import {glob} from "glob";

const sass = gulpSass(dartSass);

export function js(done) {
    src("src/js/app.js")
        .pipe(terser())
        .pipe(dest("build/js"));
    done();
}

export function css(done) {
    src("src/scss/app.scss", {sourcemaps:true})
        .pipe(sass(
            {style: "compressed"}
        ).on("error", sass.logError))
        .pipe(dest("build/css", {sourcemaps:"."}));
    done();
}

export async function imagenes(done) {
    const srcDir = './src/img';
    const buildDir = './build/img';
    const images =  await glob('./src/img/**/*.{jpg,svg}')

    images.forEach(file => {
        const relativePath = path.relative(srcDir, path.dirname(file));
        const outputSubDir = path.join(buildDir, relativePath);
        procesarImagenes(file, outputSubDir);
    });
    done();
}

function procesarImagenes(file, outputSubDir) {
    if (!fs.existsSync(outputSubDir)) {
        fs.mkdirSync(outputSubDir, { recursive: true })
    }
    const baseName = path.basename(file, path.extname(file))
    const extName = path.extname(file)
    const outputFile = path.join(outputSubDir, `${baseName}${extName}`)

    if (extName === ".svg") {
        fs.copyFileSync(file, outputFile);
        return;
    }

    const outputFileWebp = path.join(outputSubDir, `${baseName}.webp`)
    const outputFileAvif = path.join(outputSubDir, `${baseName}.avif`)

    const options = { quality: 90 }
    sharp(file).jpeg(options).toFile(outputFile)
    sharp(file).webp(options).toFile(outputFileWebp)
    sharp(file).avif().toFile(outputFileAvif)
}

export function dev() {
    watch("src/scss/**/*.scss", css);
    watch("src/js/**/*.js", js);
    watch("src/img/**/*.{jpg,svg}", imagenes)
}

export default series(css, js, imagenes, dev);