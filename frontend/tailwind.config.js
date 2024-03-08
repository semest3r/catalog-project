/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/pages/**/*.{js,ts,jsx,tsx,mdx}",
    "./src/components/**/*.{js,ts,jsx,tsx,mdx}",
    "./src/app/**/*.{js,ts,jsx,tsx,mdx}",
    "./src/SharedComponents/**/*.{js,ts,jsx,tsx,mdx}",
  ],
  theme: {
    extend: {
      backgroundImage: {
        "gradient-radial": "radial-gradient(var(--tw-gradient-stops))",
        "gradient-conic":
          "conic-gradient(from 180deg at 50% 50%, var(--tw-gradient-stops))",
      },
      colors: {
        primary: {
          1: "#F5F5F5",
          2: "#EBEBEB",
          3: "#E0E0E0",
          4: "#707070",
          5: "#5C5C5C",
          6: "#474747",
          7: "#333333",
        },
        base: {
          1: "#FFFFFF",
          2: "#0A0A0A",
        },
      },
    },
  },
  plugins: [],
};
