import { Inter, Playfair_Display } from "next/font/google";
import "./globals.css";

const inter = Playfair_Display({ subsets: ["latin"] });

export default function RootLayout({ children }) {
  return (
    <html lang="en">
      <body className={`${inter.className} p-4 pb-0 bg-primary-1 max-w-7xl mx-auto`}>{children}</body>
    </html>
  );
}
