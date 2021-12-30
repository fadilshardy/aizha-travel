const colors = require("tailwindcss/colors");

module.exports = {
    corePlugins: {
        preflight: false,
    },
    mode: "jit",
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            spacing: {
                "1/2": "50%",
                "1/3": "33.333333%",
                "2/3": "66.666667%",
                "1/4": "25%",
                "2/4": "50%",
                "3/4": "75%",
                "1/5": "20%",
                "2/5": "40%",
                "3/5": "60%",
                "4/5": "80%",
                "1/6": "16.666667%",
                "2/6": "33.333333%",
                "3/6": "50%",
                "4/6": "66.666667%",
                "5/6": "83.333333%",
                "1/12": "8.333333%",
                "2/12": "16.666667%",
                "3/12": "25%",
                "4/12": "33.333333%",
                "5/12": "41.666667%",
                "6/12": "50%",
                "7/12": "58.333333%",
                "8/12": "66.666667%",
                "9/12": "75%",
                "10/12": "83.333333%",
                "11/12": "91.666667%",
            },
        },
        colors: {
            // Now we build the full color palette, using all colors available
            // as shown at this link: https://tailwindcss.com/docs/customizing-colors#color-palette-reference
            transparent: "transparent",
            current: "currentColor",
            black: "#000",
            white: "#fff",
            bluegray: colors.slate,
            gray: colors.gray,
            truegray: colors.neutral,
            warmgray: colors.stone,
            red: colors.red,
            orange: colors.orange,
            amber: colors.amber,
            yellow: colors.amber,
            lime: colors.lime,
            green: colors.green,
            emerald: colors.emerald,
            teal: colors.teal,
            cyan: colors.cyan,
            lightblue: colors.sky,
            blue: colors.blue,
            indigo: colors.indigo,
            violet: colors.violet,
            purple: colors.purple,
            fuchsia: colors.fuchsia,
            pink: colors.pink,
            rose: colors.rose,
        },
    },
    variants: {
        extend: {},
    },
    plugins: [
        require("@tailwindcss/typography"),

        require("@themesberg/flowbite/plugin"),

        require("@tailwindcss/line-clamp"),
    ],
};
