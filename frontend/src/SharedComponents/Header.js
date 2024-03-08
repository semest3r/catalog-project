import Link from "next/link";
import NavBar from "./NavBar";

export default function SharedHeader({ children }) {
  return (
    <header>
      <div className="py-[3px] border border-l-0 border-r-0 border-primary-5">
        <div className="p-4 border-[3px] border-l-0 border-r-0 border-primary-4 sm:flex sm:justify-between sm:items-center space-y-4 sm:space-y-0">
          <h1 className="text-3xl text-primary-6 font-bold">
            <Link href={"/"}>StorySewn</Link>
          </h1>
          <NavBar />
        </div>
      </div>
      {children}
    </header>
  );
}
