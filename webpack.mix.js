const mix = require("laravel-mix");
require("laravel-mix-blade-reload");
mix.js("resources/js/app.js", "public/js").bladeReload({
    path: "resources/views/**/*.blade.php",
    debug: false,
});
