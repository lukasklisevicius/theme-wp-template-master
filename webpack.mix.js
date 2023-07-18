const mix = require("laravel-mix");
const tailwindcss = require("tailwindcss");
const ImageminPlugin = require("imagemin-webpack-plugin").default;
const CopyPlugin = require("copy-webpack-plugin");
const imageminMozjpeg = require("imagemin-mozjpeg");

mix
  .sass("assets/scss/app.scss", "dist/css/app.css")
  .options({
    processCssUrls: false,
    postCss: [tailwindcss("tailwind.config.js")],
  })
  .sourceMaps();

mix.js(["./assets/js/app.js"], "./dist/js/app.js");

mix.copyDirectory("assets/fonts", "dist/fonts");
mix.copyDirectory("assets/library", "dist/css");

if (mix.inProduction()) {
  mix.webpackConfig({
    plugins: [
      //Compress images
      new CopyPlugin({
        patterns: [{ from: "assets/img", to: "dist/img/" }],
      }),
      new ImageminPlugin({
        test: /\.(jpe?g|png|gif|svg)$/i,
        pngquant: {
          quality: "65-80",
        },
        plugins: [
          imageminMozjpeg({
            quality: 65,
            //Set the maximum memory to use in kbytes
            maxMemory: 1000 * 512,
          }),
        ],
      }),
    ],
  });
} else {
  mix.copyDirectory("assets/img", "dist/img");
}
