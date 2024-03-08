"use client";
import { useContext, useEffect, useReducer, useRef, useState } from "react";
import { getProductsAPI } from "@/api/api";
import { useSearchParams } from "next/navigation";
import ProductList from "@/SharedComponents/ProductList";

export default function Page() {
  const [products, setProducts] = useState([]);
  const currentPage = useRef(1);
  const [isLoading, setIsLoading] = useState(false);
  const [disableLoadMore, setDisableLoadMore] = useState(false);
  const params = useSearchParams().get("category");
  const getProducts = async () => {
    currentPage.current = 1;
    try {
      const response = await getProductsAPI("men", {
        category: params,
        page: currentPage.current.toString(),
      });
      if (response.status === 200) {
        const result = await response.json();
        setProducts(result.data);
        if (result.links.next) {
          setDisableLoadMore(false);
        } else {
          setDisableLoadMore(true);
        }
      }
    } catch (err) {
      console.log(err);
    }
  };
  const onClickLoadMore = async () => {
    setIsLoading(true);
    currentPage.current = currentPage.current + 1;
    const response = await getProductsAPI("men", {
      category: params,
      page: currentPage.current.toString(),
    });
    if (response.status === 200) {
      const result = await response.json();
      setProducts([...products, ...result.data]);
      if (result.links.next === null) {
        setDisableLoadMore(true);
      }
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
          {disableLoadMore ? null : isLoading ? (
            <p className="mt-6 text-lg text-center text-primary-7 font-semibold">
              Loading...
            </p>
          ) : (
            <p className="mt-6 text-lg text-center text-primary-7 font-semibold">
              <span className="cursor-pointer" onClick={onClickLoadMore}>
                Load More
              </span>
            </p>
          )}
        </>
      )}
    </>
  );
}
