"use client";

import { getExclusiveProductsAPI } from "@/api/api";
import { useEffect, useState } from "react";

export default function ExclusiveSelection() {
  const [exclusiveProducts, setExclusiveProducts] = useState([]);
  const getExclusiveProducts = async () => {
    try {
      const response = await getExclusiveProductsAPI();
      if (response.status === 200) {
        const result = await response.json();
        setExclusiveProducts(result.data);
      }
    } catch (err) {
      console.log(err);
    }
  };
  useEffect(() => {
    getExclusiveProducts();
  }, []);
  return (
    <div className="space-y-6">
      <h1 className="text-center text-3xl text-primary-7 font-semibold">
        Exclusive Selection
      </h1>
      <div className="grid grid-cols-3 gap-4">
        {exclusiveProducts.map((value) => (
          <div className="bg-white">
            <img className="h-[560px] w-full object-cover" src={value.image_url} />
            <p className="py-2 text-center font-medium">{value.name}</p>
          </div>
        ))}
      </div>
    </div>
  );
}
