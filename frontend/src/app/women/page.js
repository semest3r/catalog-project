"use client";
import { useContext, useEffect, useReducer, useRef, useState } from "react";
import { getProductsAPI } from "@/api/api";
import { useSearchParams } from "next/navigation";
import ProductList from "@/SharedComponents/ProductList";

export default function Page() {
  const [products, setProducts] = useState([]);
  const currentPage = useRef(1);
  const [isLoading, setIsLoading] = useState(false);
  const params = useSearchParams().get("category");
  const getProducts = async () => {
    currentPage.current = 1;
    const response = await getProductsAPI("women", {
      category: params,
      page: currentPage.current.toString(),
    });
    if (response.status === 200) {
      const result = await response.json();
      setProducts(result.data);
    }
  };
  const onClickLoadMore = async () => {
    setIsLoading(true);
    currentPage.current = currentPage.current + 1;
    const response = await getProductsAPI("women", {
      category: params,
      page: currentPage.current.toString(),
    });
    if (response.status === 200) {
      const result = await response.json();
      setProducts([...products, ...result.data]);
      console.log(products);
    }
    setIsLoading(false);
  };
  useEffect(() => {
    getProducts();
  }, [params]);
  return (
    <>
      {products.length < 1 ? (
        "No more products"
      ) : (
        <>
          <ProductList products={products} />
          {isLoading ? (
            <p className="mt-6 text-lg text-center text-primary-7 font-semibold">
              Loading...
            </p>
          ) : (
            <p className="mt-6 text-lg text-center text-primary-7 font-semibold">
              <span onClick={onClickLoadMore}>Load More</span>
            </p>
          )}
        </>
      )}
    </>
  );
}
