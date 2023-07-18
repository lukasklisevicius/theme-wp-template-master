/** @type {import('tailwindcss').Config} */
const defaultTheme = require("tailwindcss/defaultTheme");


module.exports = {
  theme: {
    extend: {
      colors: {
        gray: {
          100: "#f0f0f0",
          400: "#8e9091",
        },
        secondary: "#d1aba6",
        'primary-text':"#727475",
      },
    },
    container: {
      center: true,
      padding: "1rem",
    },
    fontSize: {
      sm: "14px",
      base: "1rem",
      md: "1.25rem",
    },
    fontFamily: {
      sans: ["Open Sans"],
      body: ["Open Sans"],
      'headers': ['Playfair Display'],
      'Sig':['Aurelly Signature']
    },
  },
  plugins: [require("@tailwindcss/forms"), require("@tailwindcss/typography")],
  content: [
    "./templates/**/*.php",
    "./components/**/*.php",
    "./assets/**/*.js",
    "./*.php",
  ],
};
