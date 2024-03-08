"use client";
import SharedHeader from "@/SharedComponents/Header";
import SharedFooter from "@/SharedComponents/Footer";
import BgImage from "@/assets/img/landing-image.jpg";
import Link from "next/link";
import Value from "./Components/Value";
import ExclusiveSelection from "./Components/ExclusiveSelection";
export default function Page() {
  return (
    <div className="min-h-[calc(100vh-1rem)] max-h-full flex flex-col space-y-6">
      <SharedHeader />
      <main className="grow space-y-6">
        <div
          className="h-[470px] bg-primary-4 bg-center bg-cover bg-no-repeat flex justify-center items-center"
          style={{ backgroundImage: `url(${BgImage.src})` }}
        >
          <div className="w-[75%] py-12 mx-auto bg-primary-1/10 text-center space-y-4">
            <h1 className="text-3xl text-primary-1 font-bold">
              Preserving Memories & Exploring Stories
            </h1>
            <Link
              href={"/explore"}
              className="inline-block px-4 py-2 border-2 border-primary-1 text-primary-1 hover:bg-primary-1/15 hover:text-white"
            >
              Explore Your Favorites
            </Link>
          </div>
        </div>
        <Value />
        <ExclusiveSelection />
      </main>
      <SharedFooter />
    </div>
  );
}
