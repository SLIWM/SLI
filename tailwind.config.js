/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./index.html", "./home.html", "./nav.html"],
  corePlugins: {
    preflight: false
  },
  blocklist: ["container"],
  theme: {
    extend: {}
  },
  plugins: []
};