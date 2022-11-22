const colors = require("tailwindcss/colors");
const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./vendor/filament/**/*.blade.php",
        "./vendor/usernotnull/tall-toasts/config/**/*.php",
        "./vendor/usernotnull/tall-toasts/resources/views/**/*.blade.php",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                danger: colors.rose,
                primary: colors.green,
                success: colors.green,
                warning: colors.yellow,
                info: colors.purple,
                alert: colors.red,
                // green: "#379d50",
                // green_hover: "#40b65d",
                green_selected: "#256b36",
                green_menu_hover: "#2e8443",
                sans: ["DM Sans", ...defaultTheme.fontFamily.sans],
            },
            screens: {
                cstm: "1100px",
                rm: "855px",
            },
            height: {
                208: "208%",
            },
            boxShadow: {
                "3xl": "9px 9px 11px -7px rgba(0,0,0,0.75)",
            },
            backgroundColor: ["active", "visited"],
        },
    },
    variants: {
        extend: {
            backgroundColor: ["active"],
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
        require("tailwindcss-rtl"),
    ],
};
