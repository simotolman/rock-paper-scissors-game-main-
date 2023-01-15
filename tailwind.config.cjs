/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./index.html",
    "./src/**/*.{vue,js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {
      colors: {
        neutral: {
          darkText: "hsl(229, 25%, 31%)",
          scoreText: "hsl(229, 64%, 46%)",
          headerOutline: "hsl(217, 16%, 45%)",
        },
        primary: {
          scissorsFrom: "hsl(39, 89%, 49%)",
          scissorsTo: "hsl(40, 84%, 53%)",
          paperFrom: "hsl(230, 89%, 62%)",
          paperTo: "hsl(230, 89%, 65%)",
          rockFrom: "hsl(349, 71%, 52%)",
          rockTo: "hsl(349, 70%, 56%)",
          // - Lizard Gradient: hsl(261, 73%, 60%) to hsl(261, 72%, 63%)
          // - Cyan: hsl(189, 59%, 53%) to hsl(189, 58%, 57%)
        },
        background: {
          radialFrom: "hsl(214, 47%, 23%)",
          radialTo: "hsl(237, 49%, 15%)"
        }
      }
    },
    fontFamily: {
      'barlow': ['Barlow Semi Condensed', 'sans-serif'],
    }
  },
  plugins: [],
}
