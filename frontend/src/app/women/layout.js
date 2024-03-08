'use client';

import SharedFooter from "@/SharedComponents/Footer";
import SharedHeader from "@/SharedComponents/Header";
import { getCategoriesAPI } from "@/api/api";
import Link from "next/link";
import { useEffect, useState } from "react";

export default function LayoutWomen({ children }) {
  const [categories, setCategories] = useState([]);
  const getCategories = async () => {
    try {
      const response = await getCategoriesAPI('women');
      if (response.status === 200) {
        const result = await response.json();
        setCategories(result.data);
      }
    } catch (err) {
      console.log(err);
    }
  };
  useEffect(() => {
    getCategories();
  }, []);
  return (
    <div className="min-h-[calc(100vh-1rem)] max-h-full flex flex-col space-y-6">
      <SharedHeader>
        <div className="px-4 py-2 flex justify-between items-center border-b border-primary-3">
          <h3 className="text-lg text-primary-7 font-semibold">Women</h3>
          <ul className="flex gap-4">
            <li className="text-primary-7 font-medium"><Link href={'/women'}>View All</Link></li>
            {categories.map((category) => (
              <li key={category.slug} className="text-primary-7 font-medium"><Link href={`/women/?category=${category.slug}`}>{category.name}</Link></li>
            ))}
          </ul>
        </div>
      </SharedHeader>
      <main className="grow">{children}</main>
      <SharedFooter />
    </div>
  );
}
