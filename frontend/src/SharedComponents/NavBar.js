import Link from "next/link";

export default function NavBar() {
  return (
    <nav className="">
      <ul className="flex gap-4">
        <li>
          <Link href={"/men"} className="text-lg text-primary-7 font-semibold">
            Men
          </Link>
        </li>
        <li>
          <Link href={"/women"} className="text-lg text-primary-7 font-semibold">
            Women
          </Link>
        </li>
        <li>
          <Link href={"/collaboration"} className="text-lg text-primary-7 font-semibold">
            Collaboration
          </Link>
        </li>
      </ul>
    </nav>
  );
}
