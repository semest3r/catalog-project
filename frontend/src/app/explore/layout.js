"use client";

import SharedFooter from "@/SharedComponents/Footer";
import SharedHeader from "@/SharedComponents/Header";

export default function LayoutMen({ children }) {
  return (
    <div className="min-h-[calc(100vh-1rem)] max-h-full flex flex-col space-y-6">
      <SharedHeader>
        <div className="px-4 py-2 flex justify-between items-center border-b border-primary-3">
          <h3 className="text-lg text-primary-7 font-semibold">Explore</h3>
        </div>
      </SharedHeader>
      <main className="grow">{children}</main>
      <SharedFooter />
    </div>
  );
}
