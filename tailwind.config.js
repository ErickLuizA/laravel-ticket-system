const colors = require("tailwindcss/colors");
module.exports = {
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    colors: {
      ...colors,
      primary: "#34A853",
      onPrimary: "#FFFFFF",
      secondary: "#1A1B1F",
      onSecondary: "#FFFFFF",
      secondaryVariant: "#131313",
      onSecondaryVariant: "#FFFFFF",
      surface: "#393838",
      onSurface: "#FFFFFF",
      danger: colors.red["400"],
      warn: colors.amber["400"],
      info: colors.blue["400"],
      success: colors.green["400"]
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
