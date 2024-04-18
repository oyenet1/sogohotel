import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // "resources/css/app.css",
                "resources/css/bootstrap.min.css",
                "resources/css/animate.css",
                "resources/css/owl.carousel.min.css",
                "resources/css/aos.css",
                "resources/css/bootstrap-datepicker.css",
                "resources/css/jquery.timepicker.css",
                "resources/css/fancybox.min.css",
                "resources/css/style.css",
                "resources/fonts/ionicons/css/ionicons.min.css",
                "resources/fonts/fontawesome/css/font-awesome.min.css",
                "resources/js/app.js",
                "resources/js/aos.js",
                "resources/js/bootstrap.min.js",
                "resources/js/bootstrap-datepicker.js",
                "resources/js/main.js",
                "resources/js/jquery-3.3.1.min.js",
                "resources/js/jquery-migrate-3.0.1.min.js",
                "resources/js/jquery.fancybox.min.js",
                "resources/js/jquery.magnific-popup.min.js",
                "resources/js/jquery.stellar.min.js",
                "resources/js/jquery.timepicker.min.js",
                "resources/js/jquery.validate.min.js",
                "resources/js/jquery.waypoints.min.js",
                "resources/js/owl.carousel.min.js",
                "resources/js/popper.min.js",
            ],
            refresh: true,
        }),
    ],
});
